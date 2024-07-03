<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?>

<?php $APPLICATION->IncludeComponent(
    "bitrix:simplecomp.exam",
    ".default",
    array(
        "IBLOCK_ID_1" => "1",
        "IBLOCK_ID_2" => "2",
        "COMPONENT_TEMPLATE" => "catalog_test",
        "NAME" => "Мой компонент",
        "CODE_USER_PROPERTY" => "",
        "TYPE_CACHE" => "",
        "SELECT_TEMPLATE" => "",
        "TITLE_PAGE" => "Y"
    ),
    false
); ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>