<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Title");

$component = '';

if ($_REQUEST['change_password'] === 'yes') {
    $component = 'bitrix:main.auth.changepasswd';
} else {
    $component = 'bitrix:main.auth.forgotpasswd';
}

?>
<? $APPLICATION->IncludeComponent($component, "diez", array(
    "AUTH_AUTH_URL" => "/auth/",    // Страница для авторизации
    "AUTH_REGISTER_URL" => "/registration/",    // Страница для регистрации
),
    false
); ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");