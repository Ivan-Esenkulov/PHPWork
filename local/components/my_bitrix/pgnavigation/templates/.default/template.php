<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */

?>

<div class="container">
    <div class="row">
        <?php foreach ($arResult['ITEMS'] as $item): ?>
            <h3><?= $item['NAME'] ?></h3>
            <p><?= $item['DETAIL_TEXT'] ?></p>
        <?php endforeach; ?>
    </div>
</div>
<?php if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
