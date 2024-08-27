<?php

use Bitrix\Main\Loader;
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/auth_register.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/functions.php';


/*require $_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/include/trial.php';*/
/*Loader::registerAutoLoadClasses(null, ['\Bitrix\Test\Ctest' => '/bitrix/modules/test/lib/ctest.php']);*/
AddEventHandler('main', 'OnBeforeEventSend', "myOnBeforeEventSend");

function myOnBeforeEventSend(&$arFields, &$arTemplate)
{
   /* $mess = $arTemplate["MESSAGE"];*/
    foreach ($arFields as $keyField => $arField) {
        if ($keyField == 'AUTHOR') {
            global $USER;
            if ($USER->IsAuthorized()) {
                $arField = 'Пользователь авторизован, ' . $USER->GetID() . '(' . $USER->GetLogin() . ')' . $USER->GetFullName() . ', данные из формы:' . $arField;
            } else {
                $arField = 'Пользователь не авторизован, данные из формы:' . $arField;
            }
            $arTemplate["MESSAGE"] = str_replace('#' . $keyField . '#', $arField, $arTemplate["MESSAGE"]);
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/ex2/feedback/test.php', $arFields);
        }
    }


}



