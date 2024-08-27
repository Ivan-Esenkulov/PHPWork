<?php
function debugFun($arr)
{
    echo '<pre>' . print_r($arr, 1) . '</pre>';
}

/**
 * @param $idHighLoadBlock
 * @return array|void
 */
function loadCSVFileInHLBlock($idHighLoadBlock)
{
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/classes/general/csv_data.php");

    if (!Bitrix\Main\Loader::includeModule("highloadblock")) {
        die;
    }

    $csvFile = new \CCSVData('R');
    $csvFile->LoadFile($_SERVER['DOCUMENT_ROOT'] . '/upload/export_file_237400.csv');
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

    $result = [];

    $highLoadBlock = Bitrix\Highloadblock\HighloadBlockTable::getById($idHighLoadBlock)->fetch();
    $entity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($highLoadBlock);
    $entity_data_class = $entity->getDataClass();
    foreach ($arHLFields as $arField) {
        $result = $entity_data_class::add($arField);
    }
    return $result;
}

function createHLBlock()
{
    $arLangs = [
        'ru' => 'Тестовый HL-блок',
        'en' => 'Test HL-block',
    ];

    $result = Bitrix\Highloadblock\HighloadBlockTable::add([
        'NAME' => 'HLTestBlock',
        'TABLE_NAME' => 'db_test_hl',
    ]);

    if ($result->isSuccess()) {
        $id = $result->getId();
        foreach ($arLangs as $lang_key => $lang_val) {
            Bitrix\Highloadblock\HighloadBlockLangTable::add([
                'ID' => $id,
                'LID' => $lang_key,
                'NAME' => $lang_val
            ]);
        }
    } else {
        $errors = $result->getErrorMessages();
        return $errors;
    }

    $UFObject = 'HLBLOCK_' . $id;

    $arFields = [
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
    $obUserField = new CUserTypeEntity;
    foreach ($arFields as $arField) {
        $ID = $obUserField->Add($arField);
        $arSavedFieldsRes[] = $ID;
    }
    return $arSavedFieldsRes;
}