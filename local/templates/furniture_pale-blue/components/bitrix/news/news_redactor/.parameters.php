<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

/** @var array $arCurrentValues */


$arTemplateParameters = array(
    "DISPLAY_DATE" => array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_DATE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "DISPLAY_PICTURE" => array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_PICTURE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "DISPLAY_PREVIEW_TEXT" => array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_TEXT"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "USE_SHARE" => array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_USE_SHARE"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
        "REFRESH" => "Y",
    ),
    "INSTALL_PROPERTY_PAGE_SPECIALDATE" => [
        //Установить свойство страницы specialdate
        "NAME" => GetMessage("T_IBLOCK_DESC_INSTALL_PROPERTY_PAGE_SPECIALDATE"),
        "TYPE" => "CHECKBOX",
        "VALUE" => "Y",
        "DEFAULT" => "N",
    ],
    'ID_FOR_REL_CANONICAL' => [
        'NAME' => GetMessage("ID_FOR_REL_CANONICAL_NAME"),
        'TYPE' => 'STRING',
        'DEFAULT' => 7,
    ],
);

if (($arCurrentValues['USE_SHARE'] ?? 'N') === 'Y') {
    $arTemplateParameters["SHARE_HIDE"] = array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_HIDE"),
        "TYPE" => "CHECKBOX",
        "VALUE" => "Y",
        "DEFAULT" => "N",
    );

    $arTemplateParameters["SHARE_TEMPLATE"] = array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_TEMPLATE"),
        "DEFAULT" => "",
        "TYPE" => "STRING",
        "MULTIPLE" => "N",
        "COLS" => 25,
        "REFRESH" => "Y",
    );

    $shareComponentTemplate = (trim((string)($arCurrentValues["SHARE_TEMPLATE"] ?? '')));
    if ($shareComponentTemplate === '') {
        $shareComponentTemplate = false;
    }

    include_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/components/bitrix/main.share/util.php");

    $arHandlers = __bx_share_get_handlers($shareComponentTemplate);

    $arTemplateParameters["SHARE_HANDLERS"] = array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SYSTEM"),
        "TYPE" => "LIST",
        "MULTIPLE" => "Y",
        "VALUES" => $arHandlers["HANDLERS"],
        "DEFAULT" => $arHandlers["HANDLERS_DEFAULT"],
    );

    $arTemplateParameters["SHARE_SHORTEN_URL_LOGIN"] = array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_LOGIN"),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    );

    $arTemplateParameters["SHARE_SHORTEN_URL_KEY"] = array(
        "NAME" => GetMessage("T_IBLOCK_DESC_NEWS_SHARE_SHORTEN_URL_KEY"),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    );
}
