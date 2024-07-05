<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader,
    Bitrix\Iblock;

if (!Loader::includeModule("iblock")) {
    ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
    return;
}

if (!empty($arParams['NEWS_IBLOCK_ID'])) {

    //iblock elements
    $arSelectElems = array(
        "ID",
        "IBLOCK_ID",
        "NAME",
        "ACTIVE_FROM"
    );
    $arFilterElems = array(
        "IBLOCK_ID" => $arParams["NEWS_IBLOCK_ID"],
        "ACTIVE" => "Y"
    );
    $arSortElems = array(
        "NAME" => "ASC"
    );

    $arResult["ELEMENTS"] = array();
    $rsElements = CIBlockElement::GetList($arSortElems, $arFilterElems, false, false, $arSelectElems);
    while ($arElement = $rsElements->GetNext()) {
        $rsProps = CIBlockElement::GetProperty($arParams["NEWS_IBLOCK_ID"], $arElement['ID']);
        while ($arProp = $rsProps->GetNext()) {
            $arElement["PROPERTIES"][] = $arProp;
        }
        $arResult["ELEMENTS"][] = $arElement;
    }

    // user
    $arOrderUser = ["id"];
    $sortOrder = "asc";
    $arFilterUser = [
        "ACTIVE" => "Y"
    ];
    $arSelected = ['SELECT' => ['UF_AUTHOR_TYPE']];
    $arResult["USERS"] = [];
    $rsUsers = CUser::GetList($arOrderUser, $sortOrder, $arFilterUser, $arSelected); // выбираем пользователей
    while ($arUser = $rsUsers->GetNext()) {
        /*$userProp = CUserFieldEnum::GetList();*/
        $arResult["USERS"][] = $arUser;
    }

    foreach ($arResult['USERS'] as &$user) {
        foreach ($arResult['ELEMENTS'] as $item) {
            $arResult['NEWS_COUNT'][] = $item;
            foreach ($item['PROPERTIES'] as $prop) {
                if ($prop['VALUE'] == $user['ID']) {
                    $user['ELEM'][] = $item;
                }
            }
        }
    }
    unset($user);
    /* $arResult['UNIQUE_COUNT'] = array_unique($arResult['UNIQUE_COUNT']);*/

    $arResult['UNIQUE_COUNT'] = [];
    foreach ($arResult['NEWS_COUNT'] as $news) {
        if (!in_array($news, $arResult['UNIQUE_COUNT'])) {
            $arResult['UNIQUE_COUNT'][] = $news;
        }
    }
    $arResult['UNIQUE_COUNT'] = count($arResult['UNIQUE_COUNT']);
    $arResult['TITLE_PAGE'] = "Новостей[" . $arResult['UNIQUE_COUNT'] . "]";


    $arButtons = CIBlock::GetPanelButtons($arParams['NEWS_IBLOCK_ID']);
    debugFun($arButtons);
    $this->AddIncludeAreaIcons(
        [
            [
                "ID" => 'linklb',
                "TITLE" => "ИБ в админке",
                "URL" => $arButtons['submenu']['element_list']['ACTION_URL'],
                "IN_PARAMS_MENU" => true,
            ]
        ]
    );
}

$this->includeComponentTemplate();
?>