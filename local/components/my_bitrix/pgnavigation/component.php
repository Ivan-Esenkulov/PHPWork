<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponent $this */

use Bitrix\Main\Loader;

if (!Loader::includeModule("iblock")) {
    ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
    /*return;*/
}

if (!empty($arParams['IBLOCK_ID'])) {
    CPageOption::SetOptionString('main', 'nav_page_in_session', 'N');

    if (!isset($arParams['CACHE_TIME'])) {
        $arParams['CACHE_TIME'] = 36000;
    }

    // ID инфоблока
    $arParams['IBLOCK_ID'] = intval($arParams['IBLOCK_ID']);

    // количество элементов на страницу
    $arParams['ELEMENT_COUNT'] = intval($arParams['ELEMENT_COUNT']);
    if ($arParams['ELEMENT_COUNT'] <= 0) {
        $arParams['ELEMENT_COUNT'] = 2;
    }

    // учитывать права доступа при кешировании?
    $arParams['CACHE_GROUPS'] = $arParams['CACHE_GROUPS'] == 'Y';

    // показывать постраничную навигацию вверху списка элементов?
    $arParams['DISPLAY_TOP_PAGER'] = $arParams['DISPLAY_TOP_PAGER'] == 'Y';
    // показывать постраничную навигацию внизу списка элементов?
    $arParams['DISPLAY_BOTTOM_PAGER'] = $arParams['DISPLAY_BOTTOM_PAGER'] == 'Y';
    // поясняющий текст для постраничной навигации
    $arParams['PAGER_TITLE'] = trim($arParams['PAGER_TITLE']);
    // всегда показывать постраничную навигацию, даже если в этом нет необходимости
    $arParams['PAGER_SHOW_ALWAYS'] = $arParams['PAGER_SHOW_ALWAYS'] == 'Y';
    // имя шаблона постраничной навигации
    $arParams['PAGER_TEMPLATE'] = trim($arParams['PAGER_TEMPLATE']);
    // показывать ссылку «Все элементы», с помощью которой можно показать все элементы списка?
    $arParams['PAGER_SHOW_ALL'] = $arParams['PAGER_SHOW_ALL'] == 'Y';


    // получаем все параметры постраничной навигации, от которых будет зависеть кеш
    $arNavParams = null;
    $arNavigation = false;
    if ($arParams['DISPLAY_TOP_PAGER'] || $arParams['DISPLAY_BOTTOM_PAGER']) {
        $arNavParams = array(
            'nPageSize' => $arParams['PAGE_ELEM_COUNT'], // количество элементов на странице
            'bShowAll' => $arParams['PAGER_SHOW_ALL'], // показывать ссылку «Все элементы»?
        );
        $arNavigation = CDBResult::GetNavParams($arNavParams);
    }
    global $USER;
    $cacheDependence = [$arParams['CACHE_GROUPS'] ? $USER->GetGroups() : false, $arNavigation];
    if ($this->StartResultCache(false, $cacheDependence)) {
        $arFilterSec = [
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'ACTIVE' => 'Y',
        ];

        $arSelectSec = [
            'ID',
        ];


        $rsSection = CIBlockSection::GetList(
            [],
            $arFilterSec,
            false,
            $arSelectSec,
        );

        $arResult['SECTION'] = $rsSection->GetNext();

        if ($arResult) {
            $arFilter = [
                'IBLOCK_ID' => $arParams['IBLOCK_ID'],
                'ACTIVE' => 'Y',
                "SECTION_ID" => $arResult['SECTION']['ID']
            ];

            $arSelect = [
                'ID',
                'NAME',
                'DETAIL_PICTURE',
                'DETAIL_TEXT',
            ];

            $rsElements = CIBlockElement::GetList([], $arFilter, false, $arNavParams, $arSelect);

            $arResult['ITEMS'] = array();
            while ($arItem = $rsElements->GetNext()) {
                $arResult['ITEMS'][] = $arItem;
            }
            /*
         * Постраничная навигация
         */
            $arResult['NAV_STRING'] = $rsElements->GetPageNavString(
                $arParams['PAGER_TITLE'],
                $arParams['PAGER_TEMPLATE'],
                $arParams['PAGER_SHOW_ALWAYS'],
                $this
            );
            $this->SetResultCacheKeys(
                "IBLOCK_ID",
                "ITEMS",
                "ID",
                "NAME",
                "SECTION",
            );
            /*var_dump($arResult);*/
            $this->endResultCache();
            $this->includeComponentTemplate();
        } else { // если раздел инфоблока не найден
            $this->AbortResultCache();
            \Bitrix\Iblock\Component\Tools::process404('Ошибка 404!', true, true, true);
        }

    } /*else {
        echo 'Имеется валидный кеш!';
    }*/

} else {
    ShowError('Не указан ID инфоблока');
}