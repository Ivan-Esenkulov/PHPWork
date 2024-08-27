<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>
<?php global $APPLICATION ?>
<footer class="footer">
    <div class="container-fluid px-lg-5">
        <div class="row">
            <div class="col-md-9 py-5">
                <div class="row">
                    <div class="col-md-4 mb-md-0 mb-4">
                        <?php $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",

                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/local/include/footer/text_footer.php"
                            )
                        ); ?>
                        <ul class="ftco-footer-social p-0">
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-10">
                                <div class="row">
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">
                                            <?php $APPLICATION->IncludeComponent(
                                                "bitrix:main.include",
                                                "",
                                                array(
                                                    "AREA_FILE_SHOW" => "file",

                                                    "AREA_FILE_SUFFIX" => "inc",
                                                    "EDIT_TEMPLATE" => "",
                                                    "PATH" => "/local/include/footer/header_menu_1.php"
                                                )
                                            ); ?>
                                        </h2>
                                        <?$APPLICATION->IncludeComponent(
                                            "bitrix:menu",
                                            "menu_bottom_main",
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
                                                "ROOT_MENU_TYPE" => "homebuild_bottom",
                                                "USE_EXT" => "N",
                                                "COMPONENT_TEMPLATE" => "menu_bottom_main"
                                            ),
                                            false
                                        );?>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">
                                            <?php $APPLICATION->IncludeComponent(
                                                "bitrix:main.include",
                                                "",
                                                array(
                                                    "AREA_FILE_SHOW" => "file",

                                                    "AREA_FILE_SUFFIX" => "inc",
                                                    "EDIT_TEMPLATE" => "",
                                                    "PATH" => "/local/include/footer/header_menu_2.php"
                                                )
                                            ); ?>
                                        </h2>
                                        <ul class="list-unstyled">
                                            <?$APPLICATION->IncludeComponent(
                                                "bitrix:menu",
                                                "menu_bottom_main",
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
                                                    "ROOT_MENU_TYPE" => "homebuild_bottom2",
                                                    "USE_EXT" => "N",
                                                    "COMPONENT_TEMPLATE" => "menu_bottom_main"
                                                ),
                                                false
                                            );?>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 mb-md-0 mb-4">
                                        <h2 class="footer-heading">
                                            <?php $APPLICATION->IncludeComponent(
                                                "bitrix:main.include",
                                                "",
                                                array(
                                                    "AREA_FILE_SHOW" => "file",

                                                    "AREA_FILE_SUFFIX" => "inc",
                                                    "EDIT_TEMPLATE" => "",
                                                    "PATH" => "/local/include/footer/header_menu_3.php"
                                                )
                                            ); ?>
                                        </h2>
                                        <ul class="list-unstyled">
                                            <?$APPLICATION->IncludeComponent(
                                                "bitrix:menu",
                                                "menu_bottom_main",
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
                                                    "ROOT_MENU_TYPE" => "homebuild_bottom3",
                                                    "USE_EXT" => "N",
                                                    "COMPONENT_TEMPLATE" => "menu_bottom_main"
                                                ),
                                                false
                                            );?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-md-5">
                    <div class="col-md-12">
                        <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script data-skip-moving="true">document.write(new Date().getFullYear());</script>
                            <?php $APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                array(
                                    "AREA_FILE_SHOW" => "file",

                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/local/include/footer/copyright_link.php"
                                )
                            ); ?>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
                <h2 class="footer-heading">Request A Quote</h2>
                <form action="/local/templates/homebuilder/ajax/form_send_message.php" class="contact-form" id="qwer" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email" name="email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                    </div>
                    <div class="form-group">
                        <textarea name="mess" id="" cols="30" rows="3" class="form-control" placeholder="Message" dirname="message.dir"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control submit px-3">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
    </svg>
</div>

<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/popper.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/bootstrap.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.easing.1.3.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.waypoints.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.stellar.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.animateNumber.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/owl.carousel.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/jquery.magnific-popup.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/scrollax.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/google-map.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/main.js"></script>
<script src="<?= SITE_TEMPLATE_PATH  ?>/public/js/my_script.js"></script>

</body>
</html>