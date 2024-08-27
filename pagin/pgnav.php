<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use \Bitrix\Main\Loader;

?>

<?php
if (!Loader::includeModule('iblock')) {
    ShowError('Модуль "iblock" не подключен.');
    return;
}

$arFilter = [
    'IBLOCK_ID' => 2,
    'ACTIVE' => 'Y',
    'SECTION_ID' => 1,
    /*'INCLUDE_SUBSECTIONS' => 'Y',*/
    'SECTION_ACTIVE' => 'Y',
];

$arSelect = [
    'ID',
    'NAME',
    'DETAIL_PICTURE',
    'DETAIL_TEXT'
];

$arNavPar = [
  "nPageSize" => 2,
  'bShowAll' => true,
];

$res = CIBlockElement::GetList([], $arFilter, false, $arNavPar, $arSelect);

$navString = $res->GetPageNavString('Товары мягкой мебели', 'round_new', false);

while($item = $res->GetNext()) {
    echo $item['NAME'];
    echo $item['DETAIL_TEXT'];
};

echo $navString;
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>