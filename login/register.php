<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$APPLICATION->SetPageProperty('title','Регистрация');
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL", "NAME"),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_BIRTHDAY", "PERSONAL_PHOTO", "PERSONAL_PHONE", "PERSONAL_CITY"),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>