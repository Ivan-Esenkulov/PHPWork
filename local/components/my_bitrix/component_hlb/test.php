<?php
// из класса class.php
//начало
/*$rsData = $hlentity::getList(array(
            'select' => array('ID', 'UF_NAME', 'UF_XML_ID', 'UF_PRICE'),
            'order' => array('ID' => 'ASC'),
            'limit' => '2',
            'offset' => '3'
        ));
        while ($arItem = $rsData->fetch()) {
            $this->arResult['ITEMS'][] = $arItem;
        }*/


//Конец

/*var_dump($this->arParams);*/


// Получаем информацию о высоконагрузочном блоке
$hlblock_id = $this->arParams['HL_BLOCK_ID'];
if (empty($hlblock_id)) {
    ShowError('Ошибка! ID не установлен');
    return;
}

$hlblock = HL\HighloadBlockTable::getById($hlblock_id)->fetch();
if (empty($hlblock)) {
    ShowError('Highload блок не найден');
    return;
}

$entity = HL\HighloadBlockTable::compileEntity($hlblock);

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
if (isset($arParams['COUNT_ROW_PAGE']) && $arParams['COUNT_ROW_PAGE']>0)
{
    $pagenId = isset($arParams['PAGEN_ID']) && trim($arParams['PAGEN_ID']) != '' ? trim($arParams['PAGEN_ID']) : 'page';
    $perPage = intval($arParams['COUNT_ROW_PAGE']);
    $nav = new \Bitrix\Main\UI\PageNavigation($pagenId);
    $nav->allowAllRecords(true)
        ->setPageSize($perPage)
        ->initFromUri();
}
else
{
    $arParams['ROWS_PER_PAGE'] = 0;
}

// Запрос в базу
$mainQuery = new Entity\Query($entity);
$mainQuery->setSelect(['*']);
$mainQuery->setOrder([$sortId => $sortType]);

if ($perPage > 0)
{
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
while ($row = $result->fetch())
{
    foreach ($row as $k => $v)
    {
        $arUserField = $fields[$k];

        if ($k == 'ID')
        {
            $tableColumns['ID'] = true;
            continue;
        }
        if ($arUserField['SHOW_IN_LIST'] != 'Y')
        {
            continue;
        }

        $html = call_user_func_array(
            array($arUserField['USER_TYPE']['CLASS_NAME'], 'getadminlistviewhtml'),
            array(
                $arUserField,
                array(
                    'NAME' => 'FIELDS['.$row['ID'].']['.$arUserField['FIELD_NAME'].']',
                    'VALUE' => htmlspecialcharsbx(is_array($v) ? implode(', ', $v) : $v)
                )
            )
        );

        $tableColumns[$k] = true;
        $row[$k] = $html;
    }

    $rows[] = $row;
}

debugFun($fields);
//конец

