<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php /*debugFun($arResult); */?>

<? if (!empty($arResult)): ?>

    <nav class="nav">
        <div class="inner-wrap">
            <div class="menu-block popup-wrap">
                <a href="" class="btn-menu btn-toggle"></a>
                <div class="menu popup-block">
                    <ul class="">
                        <li class="main-page">
                            <a href="/">Главная</a>
                        </li>
                        <?
                        $previousLevel = 0;
                        foreach ($arResult

                        as $arItem): ?>

                        <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                            <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
                        <? endif ?>

                        <? if ($arItem["IS_PARENT"]): ?>

                        <? if ($arItem["DEPTH_LEVEL"] == 1): ?>
                        <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                            <ul>
                                <div class="menu-text"><?= $arItem["PARAMS"]['TEXT_CONST'] ?></div>
                                <? else: ?>
                                <li><a href="<?= $arItem["LINK"] ?>" <?php if($arItem["PARAMS"]['COLOR']): ?> class="<?= $arItem["PARAMS"]['COLOR'] ?>" <?php endif; ?>><?= $arItem['TEXT'] ?></a>
                                    <ul>
                                        <div class="menu-text"><?= $arItem["PARAMS"]['TEXT_CONST'] ?></div>
                                        <? endif ?>

                                        <? else:?>

                                            <? if ($arItem["PERMISSION"] > "D"):?>

                                                <? if ($arItem["DEPTH_LEVEL"] == 1):?>
                                                    <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                                                <? else:?>
                                                    <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
                                                <? endif ?>

                                            <? endif ?>

                                        <? endif ?>

                                        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

                                        <? endforeach ?>

                                        <? if ($previousLevel > 1)://close last item tags?>
                                            <?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
                                        <? endif ?>

                                    </ul>
                                    <a href="" class="btn-close"></a>
                </div>
                <div class="menu-overlay"></div>
            </div>
        </div>
    </nav>
<? endif ?>



