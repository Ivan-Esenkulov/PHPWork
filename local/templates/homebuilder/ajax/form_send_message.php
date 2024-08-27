<?php global $APPLICATION;

use \Bitrix\Main\Application;
use Bitrix\Main\Loader;

if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    die();
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
$app = Application::getInstance();

$context = $app->getContext();
$request = $context->getRequest();
$post = $request->getPostList()->toArray();
if ($post) {
    if (Loader::IncludeModule("iblock")) {
        $el = new CIBlockElement;
        $PROP = array();

        $PROP["NAME"] = $post['name'];
        $PROP["EMAIL"] = $post['email'];
        $PROP["SUBJECT"] = $post['subject'];
        $PROP["MESSAGE"] = $post['mess'];

        $arResultForm = [
            "IBLOCK_ID" => 9,
            "PROPERTY_VALUES" => $PROP,
            "NAME" => $post['subject'] . " " . rand(),
            "CODE" => rand(),
            "ACTIVE" => "Y",
        ];

        if ($id = $el->Add($arResultForm)) {
            $result['SUCCESS'] = "Запись прошла успешно" . " " . "Новый ID = " . $id;
            echo $result['SUCCESS'];

        } else {
            $result['ERROR'] = "Ошибка:" . ' ' . $el->LAST_ERROR;
            echo $result['ERROR'];
        }

        CEvent::Send(
            'TEST_1',
            "s1",
            [
                "EMAIL" => "ivan_nikolaevich94@mail.ru",
                "NAME" => 'iv',
                "TEXT" => 'message'
            ]
        );
    }
}

