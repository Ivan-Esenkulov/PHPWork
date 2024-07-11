<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

if (!Loader::includeModule("highloadblock")) {
    die;
}

$arComponentParameters = [
    'PARAMETERS' => [
        'HL_BLOCK_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('HLLIST_COMPONENT_BLOCK_ID_NAME'),
            'TYPE' => 'TEXT'
        ],
        'COUNT_ROW_PAGE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('NUMBER_RECORDS_NAME'),
            'TYPE' => 'TEXT',
            'DEFAULT' => 10
        ],
        'PAGEN_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('HLLIST_COMPONENT_PAGEN_ID_NAME'),
            'TYPE' => 'TEXT',
            'DEFAULT' => 'page'
        ],
        'FIELD_SORT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('FIELD_SORT_NAME'),
            'TYPE' => 'TEXT',
            'DEFAULT' => 'ID',
        ],
        'SORT_ORDER' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('HLLIST_COMPONENT_SORT_ORDER_NAME'),
            'TYPE' => 'LIST',
            'DEFAULT' => 'asc',
            'VALUES' => [
                'desc' => GetMessage('HLLIST_COMPONENT_SORT_ORDER_DESC_NAME'),
                'asc' => GetMessage('HLLIST_COMPONENT_SORT_ORDER_ASC_NAME')
            ],
        ],
        "CACHE_TIME"  =>  [
            "NAME" => GetMessage("CACHE_TIME_NAME"),
            "DEFAULT"=>36000000
        ],
    ],
];