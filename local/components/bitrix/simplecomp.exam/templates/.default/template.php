<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 */

/*debugFun($arParams);*/
/*debugFun($arResult);*/
?>

<?php $this->SetViewTarget('item_price');?>
    <div style="color:red; margin: 34px 15px 35px 15px"><?= "Товар с наименьшей ценой: " . $arResult["ITEM_WITH_MIN_PRICE"]["NAME"] . " - " . $arResult["ITEM_WITH_MIN_PRICE"]["PROPERTIES"]["0"]["VALUE"] ?></div>
    <div style="color:red; margin: 34px 15px 35px 15px"><?= "Товар с высокой ценой: " . $arResult["ITEM_WITH_MAX_PRICE"]["NAME"] . " - " . $arResult["ITEM_WITH_MAX_PRICE"]["PROPERTIES"]["0"]["VALUE"] ?></div>
<?php $this->EndViewTarget();?>

<div class="container">
    <div class="row">
        <h3><?= $arParams['NAME'] ?></h3>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php if ($arParams['TITLE_PAGE']): ?>
                <h1><?= $arResult['TITLE'] ?></h1>
            <?php endif; ?>
        </div>
    </div>
    <?php foreach ($arResult['IBLOCK_ID_1_ELEMENT'] as $news): ?>
        <div class="row">
            <h3>
                <?= $news['NAME'] ?> - <?= $news['ACTIVE_FROM'] ?>
                <?php
                $str = [];
                    foreach ($news['NEWS_WITH_SECTIONS'] as $sect) {
                        $str[] = $sect['NAME'];
                    }
                ?>
                (<?= implode(', ', $str) ?>)
            </h3>
            <?php foreach ($news['NEWS_WITH_SECTIONS'] as $section): ?>
                <?php
                    $sect[] = $section['NAME']
                ?>
                <?php foreach ($section['ELEMENTS'] as $item): ?>
                    <ul>
                        <li><?= $item['NAME'] ?> - <?= $item['PROPERTIES'][0]['VALUE'] ?> - <?= $item['PROPERTIES'][2]['VALUE'] ?> - <?= $item['PROPERTIES'][1]['VALUE'] ?></li>
                    </ul>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
