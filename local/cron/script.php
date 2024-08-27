<?php
/*require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
global $USER;
$el = new CIBlockElement;
$PROP = [];
$PROP[53] = rand(1, 1000);
$arLoadProductArray = [
    "IBLOCK_ID"      => 22,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Элемент " . $PROP[53],
    "ACTIVE"         => "Y",            // активен
    "PREVIEW_TEXT"   => "текст для списка элементов",
    "DETAIL_TEXT"    => "текст для детального просмотра",
];
$el->Add($arLoadProductArray);
die;*/
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__) . "/../..");
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define('CHK_EVENT', true);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

@set_time_limit(0);
@ignore_user_abort(true);

\Bitrix\Main\Loader::includeModule('iblock');

global $USER;
$el = new CIBlockElement;
$PROP = [];
$PROP[53] = rand(1, 1000);
$arLoadProductArray = [
    "IBLOCK_ID"      => 22,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Элемент " . $PROP[53],
    "ACTIVE"         => "Y",            // активен
    "PREVIEW_TEXT"   => "текст для списка элементов",
    "DETAIL_TEXT"    => "текст для детального просмотра",
];
$el->Add($arLoadProductArray);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php");