<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty('title','Восстановление пароля');
?>

<?$APPLICATION->IncludeComponent(
    "bitrix:system.auth.forgotpasswd",
    "",
    Array(

    )
);?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"); ?>