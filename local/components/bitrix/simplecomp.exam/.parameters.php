<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    "PARAMETERS" => [
        "NAME" => [
            "NAME" => GetMessage("NAME_COMPONENT"),
            "TYPE" => "STRING",
            "DEFAULT" => "Мой компонент",
        ],
        "IBLOCK_ID_1" => [
            "NAME" => GetMessage("IBLOCK_ID_1_NAME"),
            "TYPE" => "STRING",
        ],
        "IBLOCK_ID_2" => [
            "NAME" => GetMessage("IBLOCK_ID_2_NAME"),
            "TYPE" => "STRING",
        ],
        "CODE_USER_PROPERTY" => [
            "NAME" => GetMessage("CODE_USER_PROPERTY_NAME"),
            "TYPE" => "STRING",
        ],
        "TYPE_CACHE" => [
            "NAME" => GetMessage("TYPE_CACHE_NAME"),
            "TYPE" => "STRING",
        ],
        "SELECT_TEMPLATE" => [
            "NAME" => GetMessage("SELECT_TEMPLATE_NAME"),
            "TYPE" => "STRING",
        ],
        "TITLE_PAGE" => [
            "NAME" => GetMessage("TITLE_PAGE_NAME"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
        ],
    ],
];
