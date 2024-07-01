<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php /*= debugFun($arResult) */?>

<? if (!empty($arResult)): ?>
    <div class="item">
        <div class="title-block">О магазине</div>
        <ul>
            <?php foreach ($arResult as $arItem):
                if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                    continue;
                } ?>
                <li>
                    <a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
<? endif ?>