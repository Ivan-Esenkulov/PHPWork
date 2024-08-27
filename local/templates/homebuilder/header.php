<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php

use \Bitrix\Main\Page\Asset;

global $APPLICATION;
global $USER;
$asset = Asset::getInstance();
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?php
    $asset->addString('<meta charset="utf-8">');
    $asset->addString('<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">');
    $asset->addString('<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">');
    $asset->addString('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">');
    /*$asset->addString('<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>');
    $asset->addString('<script src="local/templates/homebuilder/public/js/google-map.js"></script>');
    $asset->addString('<script src="local/templates/homebuilder/public/js/main.js"></script>');*/

    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/animate.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/owl.carousel.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/owl.theme.default.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/magnific-popup.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/ionicons.min.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/flaticon.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/icomoon.css');
    $asset->addCss(SITE_TEMPLATE_PATH . '/public/css/style.css');

   /* $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery-migrate-3.0.1.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/popper.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/bootstrap.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.easing.1.3.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.waypoints.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.stellar.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.animateNumber.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/owl.carousel.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/jquery.magnific-popup.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/scrollax.min.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/google-map.js');
    $asset->addJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/main.js');
    $asset->addJs(SITE_TEMPLATE_PATH . '/public/js/my_script.js');*/

    $APPLICATION->ShowHeadStrings();
    $APPLICATION->ShowCSS();
    $APPLICATION->ShowHeadScripts();

    $APPLICATION->ShowMeta("keywords");
    $APPLICATION->ShowMeta("description");
    ?>

    <title><?php $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<?php
if ($USER->IsAdmin()) {
    $APPLICATION->ShowPanel();
}
?>
<div class="container pt-5">
    <div class="row justify-content-between">
        <div class="col">
            <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/header_text.php"
                    )
                );
            ?>
        </div>
        <div class="col d-flex justify-content-end">
            <div class="social-media">
                <p class="mb-0 d-flex">
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i
                                    class="sr-only">Facebook</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i
                                    class="sr-only">Twitter</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span
                                class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i
                                    class="sr-only">Dribbble</i></span></a>
                </p>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <?$APPLICATION->IncludeComponent(
            "bitrix:search.form",
            "search.form_homebuilder",
            Array(
                "PAGE" => "#SITE_DIR#search/index.php",
                "USE_SUGGEST" => "N"
            )
        );?>
        <?$APPLICATION->IncludeComponent(
            "bitrix:menu",
            "menu_top_main",
            array(
                "ALLOW_MULTI_SELECT" => "N",
                "CHILD_MENU_TYPE" => "homebuild_left",
                "DELAY" => "N",
                "MAX_LEVEL" => "1",
                "MENU_CACHE_GET_VARS" => array(
                ),
                "MENU_CACHE_TIME" => "3600",
                "MENU_CACHE_TYPE" => "N",
                "MENU_CACHE_USE_GROUPS" => "Y",
                "ROOT_MENU_TYPE" => "homebuild_top",
                "USE_EXT" => "N",
                "COMPONENT_TEMPLATE" => "menu_top_main"
            ),
            false
        );?>
    </div>
</nav>
<!-- END nav -->

<?php if ($APPLICATION->GetCurPage() === "/"): ?>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "news_list_homebuilder",
    Array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "Y",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array("DETAIL_PICTURE", ""),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "news",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
        "INCLUDE_SUBSECTIONS" => "Y",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "5",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array("", ""),
        "SET_BROWSER_TITLE" => "Y",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "Y",
        "SET_META_KEYWORDS" => "Y",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "Y",
        "SHOW_404" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N"
    )
);?>
<?php else: ?>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?= SITE_TEMPLATE_PATH ?>/public/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "breadcrumb",
                                Array(
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                    "START_FROM" => "0"
                                )
                            );?>
                    <h1 class="mb-0 bread"><?php $APPLICATION->ShowTitle(); ?></h1>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
