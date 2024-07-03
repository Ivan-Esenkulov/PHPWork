<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Тестовая страница");
?>

<?php $APPLICATION->IncludeComponent(
    'bitrix:main.feedback',
    '',
    []
); ?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>