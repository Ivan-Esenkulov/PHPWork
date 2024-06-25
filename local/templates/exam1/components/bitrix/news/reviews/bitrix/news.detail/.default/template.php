<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php /*debugFun($arResult); */?>

<hr>
<div class="review-block">
    <div class="review-text">
        <div class="review-text-cont">
             <?= $arResult['DETAIL_TEXT'] ?>
        </div>
        <div class="review-autor">
            <?= $arResult['NAME'] ?>, <?= $arResult['DISPLAY_ACTIVE_FROM'] ?> г., <?= $arResult['PROPERTIES']['POSITION']['VALUE'] ?>, <?= $arResult['PROPERTIES']['COMPANY']['VALUE'] ?>.
        </div>
    </div>
    <div style="clear: both;" class="review-img-wrap"><img src="<?php echo !empty($arResult['DETAIL_PICTURE']) ?  $arResult['DETAIL_PICTURE']['SRC'] : CONNECTED_RESOURCES_PATH . '/no_photo.jpg' ?>" alt="<?= $arResult['DETAIL_PICTURE']['ALT'] ?? '' ?>"></div>
</div>
<div class="exam-review-doc">
    <p><?= $arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['NAME'] ?>:</p>
    <?php foreach ($arResult['DISPLAY_PROPERTIES']['DOCUMENTS']['FILE_VALUE'] as $doc): ?>
        <div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?= CONNECTED_RESOURCES_PATH ?>/img/icons/pdf_ico_40.png"><a href="<?= $doc['SRC'] ?>"><?= $doc['ORIGINAL_NAME'] ?></a></div>
    <?php endforeach; ?>
</div>
<hr>
<a href="<?= $arResult['LIST_PAGE_URL'] ?>" class="review-block_back_link"> &larr; К списку отзывов</a>