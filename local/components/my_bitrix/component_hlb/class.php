<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Main\Loader;
use Bitrix\Main\UI\PageNavigation;
use Bitrix\Main\Entity;

class HLBlock extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule("highloadblock")) {
            ShowError(GetMessage("NO_MODULE"));
            return;
        }
        /* $this->test();*/
        $this->viewListData();
        $this->IncludeComponentTemplate();
    }

    protected function viewListData()
    {
        //Начало
        $hldata = HighloadBlockTable::getById($this->arParams['HL_BLOCK_ID'])->fetch();
        $hlentity_class = HighloadBlockTable::compileEntity($hldata)->getDataClass();

        $count_row = $this->arParams['COUNT_ROW_PAGE'];
        $fieldSort = $this->arParams['FIELD_SORT'];
        $sortOrder = $this->arParams['SORT_ORDER'];

        $nav = new PageNavigation('page');
        $nav->allowAllRecords(true)->setPageSize($count_row)->initFromUri();

        $filter = ['!UF_PRICE' => ''];

        $itemList = $hlentity_class::getList(
            array(
                'select' => ['*'],
                'filter' => $filter,
                "count_total" => true,
                'order' => [$fieldSort => $sortOrder],
                "offset" => $nav->getOffset(),
                "limit" => $nav->getLimit(),
            )
        );

        $nav->setRecordCount($itemList->getCount());
        $this->arResult['NAV'] = $nav;
     /*   $result = new CDBResult($itemList);
        debugFun($result->NavPrint(''));*/
        while ($item = $itemList->fetch()) {
            $this->arResult['ITEMS'][] = $item;
        }
    }

    protected function test()
    {
        $hlblock_id = $this->arParams['HL_BLOCK_ID'];
        if (empty($hlblock_id)) {
            ShowError('Ошибка! ID не установлен');
            return;
        }

        $hlblock = HighloadBlockTable::getById($hlblock_id)->fetch();
        if (empty($hlblock)) {
            ShowError('Highload блок не найден');
            return;
        }

        $entity = HighloadBlockTable::compileEntity($hlblock);

// Получаем список пользовательских полей HL-блок
        global $USER_FIELD_MANAGER;
        $fields = $USER_FIELD_MANAGER->GetUserFields('HLBLOCK_' . $hlblock['ID']);

// Проверка поля сортировки
        if (isset($arParams['FIELD_ORDER']) && isset($fields[$arParams['FIELD_SORT']])) {
            $sortId = $arParams['FIELD_SORT'];
        }

// Проверка порядка сортировки
        if (isset($arParams['SORT_ORDER']) && in_array($arParams['SORT_ORDER'], array('ASC', 'DESC'), true)) {
            $sortType = $arParams['SORT_ORDER'];
        }

// Пагинация
        if (isset($arParams['COUNT_ROW_PAGE']) && $arParams['COUNT_ROW_PAGE'] > 0) {
            $pagenId = isset($arParams['PAGEN_ID']) && trim($arParams['PAGEN_ID']) != '' ? trim($arParams['PAGEN_ID']) : 'page';
            $perPage = intval($arParams['COUNT_ROW_PAGE']);
            $nav = new PageNavigation($pagenId);
            $nav->allowAllRecords(true)
                ->setPageSize($perPage)
                ->initFromUri();
        } else {
            $arParams['ROWS_PER_PAGE'] = 0;
        }

// Запрос в базу
        $fieldSort = $this->arParams['FIELD_SORT'];
        $sortOrder = $this->arParams['SORT_ORDER'];
        $mainQuery = new Entity\Query($entity);
        $mainQuery->setSelect(['*']);
        $mainQuery->setOrder([$fieldSort => $sortOrder]);

        if ($perPage > 0) {
            $mainQueryCnt = $mainQuery;
            $result = $mainQueryCnt->exec();
            $result = new CDBResult($result);
            $nav->setRecordCount($result->selectedRowsCount());
            $this->arResult['nav_object'] = $nav;
            unset($mainQueryCnt, $result);

            $mainQuery->setLimit($nav->getLimit());
            $mainQuery->setOffset($nav->getOffset());
        }

        $result = $mainQuery->exec();
        $result = new CDBResult($result);

// Сборка результатов
        $rows = array();
        $tableColumns = array();
        while ($row = $result->fetch()) {
            /*debugFun($row);*/
            foreach ($row as $k => $v) {
                $arUserField = $fields[$k];
                debugFun($arUserField);
                if ($k == 'ID') {
                    $tableColumns['ID'] = true;
                    continue;
                }
                /* if ($arUserField['SHOW_IN_LIST'] != 'Y')
                 {
                     continue;
                 }*/

                $html = call_user_func_array(
                // Bitrix\Main\UserField\Types\StringType::
                    array($arUserField['USER_TYPE']['CLASS_NAME'], 'getadminlistviewhtml'),
                    array(
                        $arUserField,
                        array(
                            'NAME' => 'FIELDS[' . $row['ID'] . '][' . $arUserField['FIELD_NAME'] . ']',
                            'VALUE' => htmlspecialcharsbx(is_array($v) ? implode(', ', $v) : $v)
                        )
                    )
                );

                $tableColumns[$k] = true;
                $row[$k] = $html;
            }

            $rows[] = $row;
        }
        $this->arResult['rows'] = $rows;
        $this->arResult['fields'] = $fields;
        $this->arResult['tableColumns'] = $tableColumns;
        $this->arResult['sort_id'] = $sortId;
        $this->arResult['sort_type'] = $sortType;

        debugFun($this->arResult);
    }
}