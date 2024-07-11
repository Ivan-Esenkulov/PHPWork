<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

/*debugFun($arResult);*/
?>

<div class="container">
    <?php foreach ($arResult['ITEMS'] as $item): ?>
        <div class="row">
            <div class="col-md-6">
                <p>Внешний ключ - <?= $item['UF_XML_ID'] ?>. Цена - <?= $item['UF_PRICE'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php
    $APPLICATION->IncludeComponent(
    "bitrix:main.pagenavigation",
    "test_template",
    array(
    "NAV_OBJECT" => $arResult['NAV'],
    "SEF_MODE" => "N",
    ),
    false
    ); ?>