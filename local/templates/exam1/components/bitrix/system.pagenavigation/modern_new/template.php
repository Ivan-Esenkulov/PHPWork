<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
	die();
}

/**
 * @var array $arResult
 */
\Bitrix\Main\UI\Extension::load(['ui.design-tokens']);

/*$this->setFrameMode(true);*/

/*debugFun($arResult);*/
$firstPageUrl = $arResult['sUrlPath'];
if (!empty($arResult['NavQueryString'])) {
    $firstPageUrl = $firstPageUrl.'?'.$arResult['NavQueryString'];
}
$lastPageUrl = $arResult['sUrlPath'];
if (!empty($arResult['NavQueryString'])) {
    $lastPageUrl = $lastPageUrl.'?'.$arResult['NavQueryString'] .'&amp;PAGEN_'.$arResult['NavNum'].'='.$arResult['NavPageCount'];;
} else {
    $lastPageUrl = $lastPageUrl.'?PAGEN_'.$arResult['NavNum'].'='.$arResult['NavPageCount'];
} ?>

<ul class="pager">
    <?php if ($arResult['NavPageNomer'] > 1): /* ссылка на первую страницу */ ?>
        <li>
            <a href="<?= $firstPageUrl ?>" title="Первая">«</a>
        </li>
    <?php endif; ?>

    <?php for ($i = $arResult['nStartPage']; $i <= $arResult['nEndPage']; $i++): ?>
        <?php
        // ссылка на очередную страницу
        $pageUrl = $arResult['sUrlPath'];
        if (!empty($arResult['NavQueryString'])) {
            $pageUrl = $pageUrl.'?'. $arResult['NavQueryString'].'&amp;PAGEN_'.$arResult['NavNum'].'='.$i;
        } else {
            $pageUrl = $pageUrl.'?PAGEN_'.$arResult['NavNum'].'='.$i;
        }
        ?>
        <?php if ($arResult['NavPageNomer'] == $i): /* если это текущая страница */ ?>
            <li><span><?= $i; ?></span></li>
        <?php else: ?>
            <li><a href="<?= $pageUrl; ?>"><?= $i; ?></a></li>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($arResult['NavPageNomer'] < $arResult['NavPageCount']): /* ссылка на последнюю страницу */ ?>
        <li>
            <a href="<?= $lastPageUrl; ?>" title="Последняя">»</a>
        </li>
    <?php endif; ?>
</ul>

