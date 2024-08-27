<?php
if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    die();
}
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
/*$error = false;
$fields = [
    'fio',
    'job',
    'user_email',
    'user_phone',
    'user_msg',
];
foreach ($fields as $field) {
    if (empty($_POST[$field])) {
        $error = true;
    }
}*/
$FILE['FILES'] =  $_FILES['file'];
/*if (!$error) {*/
    $arr = [
        'FIO' => $_POST['fio'],
        'JOB' => $_POST['job'],
        'USER_EMAIL' => $_POST['user_email'],
        'USER_PHONE' => $_POST['user_phone'],
        'USER_MSG' => $_POST['user_msg'],
        'FILES' => $FILE['FILES'],
    ];
    if (CEvent::Send("SEND_SUMMARY", "s1", $arr)) {
        echo "Резюме отправлено!";
    } else {
        echo 'Не удалось отправить резюме!';
    }
/*}*/
