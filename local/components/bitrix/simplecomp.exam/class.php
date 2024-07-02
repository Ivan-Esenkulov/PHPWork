<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
class MyComponentCatalog extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->logicComponent();
        $this->IncludeComponentTemplate();
    }

    public function logicComponent()
    {
        if (!Loader::includeModule("iblock")) {
            return;
        }

        $arFilter = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID_2'],
            'ACTIVE' => 'Y'
        ];

        $arSelector = [
            'ID',
            'NAME',
            'CODE',
            'PROPERTIES',
            'DESCRIPTION',
            'IBLOCK_SECTION_ID',
            'UF_NEWS_LINK',
        ];

        $objectElement1 = CIBlockElement::GetList(
            ["SORT"=>"ASC"],
            $arFilter,
            false,
            false,
            $arSelector
        );
        while ($resElem = $objectElement1->GetNext()) {
            $propObj = CIBlockElement::GetProperty($this->arParams['IBLOCK_ID_2'], $resElem['ID'], ['id' => 'asc'], ['ID' => [2, 6, 7]]);
            while ($prop = $propObj->Fetch()) {
                $resElem['PROPERTIES'][] = $prop;
            }
            $this->arResult['ITEMS'][] = $resElem;
        }

        $objectSection1 = CIBlockSection::GetList(
            ["SORT"=>"ASC"],
            $arFilter,
            false,
            $arSelector,
            false
        );
        while ($section = $objectSection1->GetNext()) {
            /*$this->arResult['IBLOCK_ID_1_SECTION'][] = $res;*/

            foreach ($this->arResult['ITEMS'] as $item) {
                if ($item['IBLOCK_SECTION_ID'] == $section['ID']) {
                    $section['ELEMENTS'][] = $item;
                }
            }
            $this->arResult['IBLOCK_ID_2_SECTION'][] = $section;
        }

        $arFilter = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID_1'],
            'ACTIVE' => 'Y'
        ];

        $arSelector = [
            'ID',
            'NAME',
            'ACTIVE_FROM',
        ];

        $objectElement1 = CIBlockElement::GetList(
            ["SORT"=>"ASC"],
            $arFilter,
            false,
            false,
            $arSelector
        );
        while ($resElem = $objectElement1->GetNext()) {
            $this->arResult['IBLOCK_ID_1_ELEMENT'][] = $resElem;
        }

        foreach ($this->arResult['IBLOCK_ID_1_ELEMENT'] as &$news) {
            foreach ($this->arResult['IBLOCK_ID_2_SECTION'] as $sectionCatalog) {
                if (in_array($news['ID'], $sectionCatalog['UF_NEWS_LINK'])) {
                    $news['NEWS_WITH_SECTIONS'][] = $sectionCatalog;
                }
            }
        }
        unset($news);
        unset($this->arResult['IBLOCK_ID_2_SECTION']);


        $this->arResult['TITLE'] = 'В каталоге товаров представлено товаров: ' . count($this->arResult['ITEMS']);
    }
}