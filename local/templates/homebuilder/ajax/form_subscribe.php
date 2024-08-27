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

    CEvent::Send(
        'TEST_1',
        "s1",
        [
            "EMAIL" => "ivan_nikolaevich94@mail.ru",
            "AUTHOR" => 'iv',
            "TEXT" => $post['email']
        ]
    );
echo 'Сообщение отправлено!';
}

