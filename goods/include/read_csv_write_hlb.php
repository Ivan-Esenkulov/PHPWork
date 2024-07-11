<?php

use Bitrix\Highloadblock;
use Bitrix\Main\Loader;
use Bitrix\Main\Entity;

/**
 * @global $APPLICATION
 */

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/csv_data.php");

$APPLICATION->SetTitle("HL-блок");

if (!Loader::includeModule("highloadblock")) {
    die;
}

$csvFile = new \CCSVData('R');
$csvFile->LoadFile($_SERVER['DOCUMENT_ROOT'] . '/upload/export_file_237400.csv');
$bFirstHeaderTmp = $csvFile->GetFirstHeader();
$csvFile->SetDelimiter(';');
$arHLFields = [];
while ($row = $csvFile->Fetch()) {
    $arHLFields[] = $row;
}

foreach ($arHLFields as &$field) {
    for ($i = 0; $i < count($field); $i++) {
        if ($i == 0) {
            $field['UF_XML_ID'] = $field[$i];
            unset($field[$i]);
        }
        if ($i == 1) {
            $field['UF_PRICE'] = $field[$i];
            unset($field[$i]);
        }
    }
}
unset($field);
/*debugFun($csvFile->GetFirstHeader());*/

$idHighLoadBlock = 4;
$highLoadBlock = Highloadblock\HighloadBlockTable::getById($idHighLoadBlock)->fetch();
/*debugFun($highLoadBlock);*/
$entity = Highloadblock\HighloadBlockTable::compileEntity($highLoadBlock);
/*debugFun($entity);*/
$entity_data_class = $entity->getDataClass();
/*debugFun($entity_data_class);*/
$result = [];
/*foreach ($arHLFields as $arField) {
    debugFun($arField);
}
foreach ($arHLFields as $arField) {
    $result = $entity_data_class::add($arHLFields);
}*/


/*$hldata = Highloadblock\HighloadBlockTable::getById(4)->fetch();
$hlentity = Highloadblock\HighloadBlockTable::compileEntity($hldata)->getDataClass();
$rsData = $hlentity::getList(array(
    'select' => array('ID','UF_NAME','UF_XML_ID','UF_PRICE'),
    'order' => array('ID' => 'ASC'),
    'limit' => '50',
));
$arItems = [];
while ($arItem = $rsData->fetch()) {
    $arItems[] = $arItem;
}*/
/*debugFun($arItems);*/
/*$fields = array_keys($hlentity->getFields());*/


/*foreach ($fields as $field) {
    debugFun($field);
}*/

/*$query = new Entity\Query($hlentity);
$query->getSelect("*");*/
/*$query->setFilter(array('=ID' => 1));*/
/*$obj = $query->exec();

while ($q = $obj->fetch()) {
    debugFun($q);
}*/


require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

/*$arLangs = array(
    'ru' => 'Тестовый HL-блок',
    'en' => 'Test HL-block',
);

$result = Highloadblock\HighloadBlockTable::add(array(
    'NAME' => 'HLTestBlock',
    'TABLE_NAME' => 'db_test_hl',
));

if ($result->isSuccess()) {
    $id = $result->getId();
    foreach ($arLangs as $lang_key => $lang_val) {
        Highloadblock\HighloadBlockLangTable::add([
            'ID' => $id,
            'LID' => $lang_key,
            'NAME' => $lang_val
        ]);
    }
} else {
    $errors = $result->getErrorMessages();
    var_dump($errors);
}

$UFObject = 'HLBLOCK_' . $id;

$arTestFields = [
    'UF_NAME' => [
        'ENTITY_ID' => $UFObject,
        'FIELD_NAME' => 'UF_NAME',
        'USER_TYPE_ID' => 'string',
        'MANDATORY' => 'Y',
        "EDIT_FORM_LABEL" => ['ru' => 'Имя', 'en' => 'Name'],
        "LIST_COLUMN_LABEL" => ['ru' => 'Имя', 'en' => 'Name'],
        "LIST_FILTER_LABEL" => ['ru' => 'Имя', 'en' => 'Name'],
        "ERROR_MESSAGE" => ['ru' => 'Имя', 'en' => 'Name'],
        "HELP_MESSAGE" => ['ru' => '', 'en' => ''],
    ],
    'UF_XML_ID' => [
        'ENTITY_ID' => $UFObject,
        'FIELD_NAME' => 'UF_XML_ID',
        'USER_TYPE_ID' => 'string',
        'MANDATORY' => 'N',
        "EDIT_FORM_LABEL" => ['ru' => 'Внешний ключ', 'en' => 'External key'],
        "LIST_COLUMN_LABEL" => ['ru' => 'Внешний ключ', 'en' => 'External key'],
        "LIST_FILTER_LABEL" => ['ru' => 'Внешний ключ', 'en' => 'External key'],
        "ERROR_MESSAGE" => ['ru' => '', 'en' => ''],
        "HELP_MESSAGE" => ['ru' => '', 'en' => ''],
    ],
    'UF_PRICE' => [
        'ENTITY_ID' => $UFObject,
        'FIELD_NAME' => 'UF_PRICE',
        'USER_TYPE_ID' => 'string',
        'MANDATORY' => 'N',
        "EDIT_FORM_LABEL" => ['ru' => 'Цена', 'en' => 'Price'],
        "LIST_COLUMN_LABEL" => ['ru' => 'Цена', 'en' => 'Price'],
        "LIST_FILTER_LABEL" => ['ru' => 'Цена', 'en' => 'Price'],
        "ERROR_MESSAGE" => ['ru' => '', 'en' => ''],
        "HELP_MESSAGE" => ['ru' => '', 'en' => ''],
    ],
];

$arSavedFieldsRes = [];
foreach($arTestFields as $arTestField){
    $obUserField  = new CUserTypeEntity;
    $ID = $obUserField->Add($arTestField);
    $arSavedFieldsRes[] = $ID;
}*/

/*$hldata = Highloadblock\HighloadBlockTable::getById(3)->fetch();
$hlentity = Highloadblock\HighloadBlockTable::compileEntity($hldata)->getDataClass();

debugFun($hldata);*/
/*$result = [];

foreach ($arHLFields as $arField) {
    $result = $hlentity::add($arField);
}*/

/*$query = new Entity\Query($hlentity);*/

/*$idHighLoadBlock = 1;
$highLoadBlock = Highloadblock\HighloadBlockTable::getById($idHighLoadBlock)->fetch();
debugFun($highLoadBlock);
$entity = Highloadblock\HighloadBlockTable::compileEntity($highLoadBlock)->fetch();
debugFun($entity);
$entity_data_class = $entity->getDataClass();*/
/*debugFun($entity_data_class);*/
/*$result = [];*/
/*foreach ($arHLFields as $arField) {
    debugFun($arField);
}*/
/*foreach ($arHLFields as $arField) {
    $result = $entity_data_class::add($arHLFields);
}*/