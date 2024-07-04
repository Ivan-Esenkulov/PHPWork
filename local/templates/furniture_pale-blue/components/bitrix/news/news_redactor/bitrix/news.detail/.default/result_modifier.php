<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
{
    die();
}

use Bitrix\Main\Loader;

if (!Loader::IncludeModule('iblock')) {
    return;
}

if (!empty($arParams['ID_FOR_REL_CANONICAL'])) {

    $arFilter = [
        "IBLOCK_ID" => $arParams['ID_FOR_REL_CANONICAL'],
        "ACTIVE" => "Y",
    ];

    $arSelector = [
        "ID",
        "NAME",
        "PROPERTIES_VALUE",
    ];

    $obj = CIBlockElement::GetList(['ID' => 'ASC'], $arFilter, false, false, $arSelector);
    /*$propObj = CIBlockProperty::GetByID("NEWS", $arParams['ID_FOR_REL_CANONICAL']);*/
    $i = 0;
    while ($item = $obj->GetNext()) {
        $arResult['ELEMEN_CANONICAL_LINK'][$i] = $item;
        $propObj = CIBlockElement::GetProperty($arParams['ID_FOR_REL_CANONICAL'], $item['ID']);
        while ($prop = $propObj->GetNExt()) {
            $arResult['ELEMEN_CANONICAL_LINK'][$i]['PROPERTIES'][] = $prop;
        }
        $i++;
    }
}