<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arCacheType = ["A", "Y", "N"];

$arComponentParameters = array(
	"PARAMETERS" => array(
		"NEWS_IBLOCK_ID" => [
			"NAME" => GetMessage("NEWS_IBLOCK_ID_NAME"),
			"TYPE" => "STRING",
		],
        "CODE_PROPERTY_IBLOCK_ID_AUTHOR" => [
          "NAME" => GetMessage("CODE_PROPERTY_IBLOCK_ID_AUTHOR_NAME"),
          "TYPE" => "STRING",
        ],
        "CODE_USER_PROPERTY" => [
          "NAME" => GetMessage("CODE_USER_PROPERTY_NAME"),
          "TYPE" => "STRING",
        ],
       /* "CACHE_TYPE" => [
            "NAME" => GetMessage("CACHE_TYPE_NAME"),
            "TYPE" => "LIST",
            "VALUE" => $arCacheType,
            "MULTIPLE"=>"Y",
        ],*/
        "CACHE_TIME"  =>  [
            "NAME" => GetMessage("CACHE_TIME_NAME"),
            "DEFAULT"=>36000000
        ],
	),
);