<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
$cntItemsMore = $arResult['NavRecordCount'] - $arResult['NavPageSize'] * $arResult['NavPageNomer'];
$showMoreCnt = [
    20,
    40,
    60,
    90,
    150
];

?>

<div class="catalognav" data-entity="pagination">
    <? if ($arResult["NavPageNomer"] + 1 <= $arResult["nEndPage"]): ?>
		<div class="catalognav__showmore">
			<a href="#"
			   data-link="<?= $arResult["sUrlPathParams"] . "PAGEN_" . $arResult["NavNum"] . "=" . ($arResult["NavPageNomer"] + 1) ?>"
			   data-entity="show-more"
			   class="showmorelink">
				<img src="<?= SITE_TEMPLATE_PATH ?>/public/img/Synchronize.svg" alt="">
				<span>Показать еще</span>
			</a>
		</div>
    <? endif; ?>
	<div class="catalognav__pagination">
		<div class="paginationblock">
			<div class="pagination">
                <? if ($arResult["NavPageNomer"] == 1): ?>
					<a class="pagination__arrLeft disabled">
						<img src="<?= SITE_TEMPLATE_PATH ?>/public/img/pagiRight.svg" alt="prev">
					</a>
                <? else: ?>
					<a class="pagination__arrLeft"
					   href="<?= $arResult["sUrlPathParams"] . "PAGEN_" . $arResult["NavNum"] . "=" . ($arResult["NavPageNomer"] - 1) ?>">
						<img src="<?= SITE_TEMPLATE_PATH ?>/public/img/pagiRight.svg" alt="prev">
					</a>
                <? endif; ?>
				<ul>
                    <? for ($PAGE_NUMBER = $arResult["NAV"]["START_PAGE"]; $PAGE_NUMBER <= $arResult["NAV"]["END_PAGE"]; $PAGE_NUMBER++): ?>
                        <? if ($PAGE_NUMBER == $arResult["NAV"]["PAGE_NUMBER"]): ?>
							<li class="active"><a><?= $PAGE_NUMBER ?></a></li>
                        <? else: ?>
							<li>
								<a href="<?= $arResult["NAV"]["URL"]["SOME_PAGE"][$PAGE_NUMBER] ?>"><?= $PAGE_NUMBER ?></a>
							</li>
                        <? endif; ?>
                    <? endfor; ?>
				</ul>
                <? if ($arResult["NavPageNomer"] == ($arResult["nEndPage"])): ?>
					<a class="pagination__arrRight disabled">
						<img src="<?= SITE_TEMPLATE_PATH ?>/public/img/pagiRight.svg" alt="next">
					</a>
                <? else: ?>
					<a class="pagination__arrRight"
					   href="<?= $arResult["sUrlPathParams"] . "PAGEN_" . $arResult["NavNum"] . "=" . ($arResult["NavPageNomer"] + 1) ?>">
						<img src="<?= SITE_TEMPLATE_PATH ?>/public/img/pagiRight.svg" alt="next">
					</a>
                <? endif; ?>
			</div>
		</div>
	</div>
</div>
