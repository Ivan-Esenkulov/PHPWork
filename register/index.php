<?php
if (isset($_POST['REGISTER']) && isset($_POST['REGISTER']['EMAIL'])) {
    $_REQUEST['REGISTER']['LOGIN'] = $_POST['REGISTER']['EMAIL'];
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");


?><?$APPLICATION->IncludeComponent(
    "bitrix:main.register",
    "diez",
    Array(
        "AUTH" => "Y",
        "REQUIRED_FIELDS" => array("EMAIL"),
        "SET_TITLE" => "Y",
        "SHOW_FIELDS" => array("EMAIL"),
        "SUCCESS_PAGE" => "/",
        "USER_PROPERTY" => array(),
        "USER_PROPERTY_NAME" => "",
        "USE_BACKURL" => "Y"
    )
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>