<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <div class="side-block side-menu">
        <div class="title-block <?php $APPLICATION->ShowProperty('color') ?>">Навигация</div>
        <div class="menu-block">
            <ul>

                <? foreach ($arResult as $arItem):
                    if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                        continue;
                    ?>

                    <li><a href="<?= $arItem["LINK"] ?>" class="selected"><?= $arItem["TEXT"] ?></a></li>

                <? endforeach ?>

            </ul>
        </div>
    </div>
<? endif ?>

