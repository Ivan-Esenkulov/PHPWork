<?php global $APPLICATION;

use Bitrix\Main\Diag\Debug;
use \Bitrix\Main\Application;
use Bitrix\Main\Loader;

if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    die();
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Debug::dumpToFile($_POST, '', '/local/templates/homebuilder/ajax/test.txt');

$app = Application::getInstance();

$context = $app->getContext();
$request = $context->getRequest();
$post = $request->getPostList()->toArray();

if ($post['name'] == '') {
    $result['ERROR'] = 'Поле "Name" не заполнено';
    echo $result['ERROR'];
    return;
}

if ($post['email'] == '') {
    $result['ERROR'] = 'Поле "Email" не заполнено';
    echo $result['ERROR'];
    return;
}


if (Loader::IncludeModule("iblock")) {
    $el = new CIBlockElement;
    $PROP = [];

    $PROP["NAME"] = $post['name'];
    $PROP["EMAIL"] = $post['email'];
    $PROP["WEBSITE"] = $post['website'];
    $PROP["MESSAGE"] = $post['message'];

    $arResultForm = [
        "IBLOCK_ID" => 19,
        "PROPERTY_VALUES" => $PROP,
        "NAME" => $post['email'] . " " . "|" . " " . $post['name'],
        "CODE" => $post['name'] . ' | ' . rand(),
        "ACTIVE" => "Y",
    ];

    if ($id = $el->Add($arResultForm)) {
        $result['SUCCESS'] = "Запись прошла успешно" . " " . "Новый ID = " . $id;
        echo $result['SUCCESS'];
    } else {
        $result['ERROR'] = "Ошибка:" . ' ' . $el->LAST_ERROR;
        echo $result['ERROR'];
    }
}
/*CEvent::Send(
    'TEST_1',
    "s1",
    [
        "EMAIL" => "ivan_nikolaevich94@mail.ru",
        "NAME" => 'iv',
        "TEXT" => 'message'
    ]
);*/
