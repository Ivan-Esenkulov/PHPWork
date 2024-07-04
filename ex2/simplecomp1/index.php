<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент 1");
?>

<?php $APPLICATION->IncludeComponent(
	"my_bitrix:simplecomp.exam", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"NEWS_IBLOCK_ID" => "1",
		"CODE_PROPERTY_IBLOCK_ID_AUTHOR" => "AUTHOR",
		"CODE_USER_PROPERTY" => "UF_AUTHOR_TYPE"
	),
	false
); ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>