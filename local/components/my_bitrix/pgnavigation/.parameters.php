<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    "GROUPS" => [],
    "PARAMETERS" => [
        "IBLOCK_ID" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("IBLOCK_ID_NAME"),
            "TYPE" => "STRING",
            "DEFAULT" => 2,
        ],
        "SECTION_ID" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("SECTION_ID_NAME"),
            "TYPE" => "STRING",
        ],
        "PAGE_ELEM_COUNT" => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAGE_ELEM_COUNT_NAME"),
            "TYPE" => "STRING",
        ],
        'DISPLAY_TOP_PAGER' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("DISPLAY_TOP_PAGER_NAME"),
            "TYPE" => "CHECKBOX",
        ],
        'DISPLAY_BOTTOM_PAGER' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("DISPLAY_TOP_PAGER_NAME"),
            "TYPE" => "CHECKBOX",
        ],
        'PAGER_SHOW_ALWAYS' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAGER_SHOW_ALWAYS_NAME"),
            "TYPE" => "CHECKBOX",
        ],
        'PAGER_SHOW_ALL' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAGER_SHOW_ALL_NAME"),
            "TYPE" => "CHECKBOX",
        ],
        'PAGER_TEMPLATE' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAGER_TEMPLATE_NAME"),
            "TYPE" => "STRING",
        ],
        'PAGER_TITLE' => [
            "PARENT" => "BASE",
            "NAME" => GetMessage("PAGER_TITLE_NAME"),
            "TYPE" => "STRING",
        ],
        'CACHE_GROUPS' => [
            "NAME" => GetMessage("CACHE_GROUPS_NAME"),
            "TYPE" => "CHECKBOX",
        ],
        "CACHE_TIME" => [
            "NAME" => GetMessage("CACHE_TIME_NAME"),
            "DEFAULT" => 36000000
        ],
    ],
];

CIBlockParameters::AddPagerSettings(
    $arComponentParameters,
    GetMessage('PG_TITLE'),
    false,
    true
);

/*CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);*/
