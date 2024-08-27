<?php
if (check_bitrix_sessid() && $_SERVER['REQUEST_METHOD'] == "POST" && !empty($_REQUEST["error_message"]) && !empty($_REQUEST["error_url"]))
{
    $arMailFields = Array();
    $arMailFields["ERROR_MESSAGE"] = trim ($_REQUEST["error_message"]);
    $arMailFields["ERROR_DESCRIPTION"] = trim ($_REQUEST["error_desc"]);
    $arMailFields["ERROR_URL"] = $_REQUEST["error_url"];
    $arMailFields["ERROR_REFERER"] = $_REQUEST["error_referer"];
    $arMailFields["ERROR_USERAGENT"] = $_REQUEST["error_useragent"];
    CEvent::Send("ERROR_CONTENT", SITE_ID, $arMailFields);
}
$this->IncludeComponentTemplate();
?>