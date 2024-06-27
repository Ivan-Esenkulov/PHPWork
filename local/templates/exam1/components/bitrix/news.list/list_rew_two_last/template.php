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

<div class="item-wrap">
    <div class="rew-footer-carousel">
        <?php foreach ($arResult['ITEMS'] as $arItem): ?>
            <div class="item">
                <div class="side-block side-opin">
                    <div class="inner-block">
                        <div class="title">
                            <div class="photo-block">
                                <?php $imageResize = CFile::ResizeImageGet($arItem['DETAIL_PICTURE'], ["width" => 64, "height" => 56], BX_RESIZE_IMAGE_EXACT, true); ?>
                                <img src="<?= !empty($arItem['DETAIL_PICTURE']) ? $imageResize['src'] : CONNECTED_RESOURCES_PATH . '/no_photo.jpg' ?>>" alt="<?= $arItem['DETAIL_PICTURE']['ALT'] ?? '' ?>">
                            </div>
                            <div class="name-block"><a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a></div>
                            <div class="pos-block"><?= $arItem['DISPLAY_PROPERTIES']['POSITION']['VALUE'] ?>,"<?= $arItem['DISPLAY_PROPERTIES']['COMPANY']['VALUE'] ?>"</div>
                        </div>
                       <!-- <?php /*if (mb_strlen($arItem['PREVIEW_TEXT']) > 150): */?>
                            <div class="text-block"><?php /*= mb_substr($arItem['PREVIEW_TEXT'], 0, 150); */?>...</div>
                        --><?php /*else: */?>
                            <div class="text-block"><?= $arItem['PREVIEW_TEXT']; ?></div>
                      <!--  --><?php /*endif; */?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>