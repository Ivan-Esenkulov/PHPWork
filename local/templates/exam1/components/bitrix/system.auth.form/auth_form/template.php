<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php /*= debugFun($arResult) */?>

<nav class="menu-block">
    <ul>
        <?php
        if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE'])) {
            ShowMessage($arResult['ERROR_MESSAGE']);
        }
        ?>

        <? if ($arResult["FORM_TYPE"] == "login"): ?>
            <li class="att popup-wrap">
                <a id="hd_singin_but_open" href=""
                   class="btn-toggle"><?= GetMessage("AUTH_LOGIN_INPUT") ?></a>
                <form name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top"
                      action="<?= $arResult["AUTH_URL"] ?>" class="frm-login popup-block">
                    <? if ($arResult["BACKURL"] <> ''): ?>
                        <input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>"/>
                    <? endif ?>
                    <? foreach ($arResult["POST"] as $key => $value): ?>
                        <input type="hidden" name="<?= $key ?>" value="<?= $value ?>"/>
                    <? endforeach ?>
                    <input type="hidden" name="AUTH_FORM" value="Y"/>
                    <input type="hidden" name="TYPE" value="AUTH"/>
                    <div class="frm-title"><?= GetMessage("AUTH_LOGIN_INPUT") ?></div>
                    <a href="" class="btn-close">Закрыть</a>
                    <div class="frm-row"><input type="text" name="USER_LOGIN"
                                                placeholder="<?= GetMessage("AUTH_LOGIN") ?>">
                    </div>
                    <div class="frm-row"><input type="password" name="USER_PASSWORD"
                                                placeholder="<?= GetMessage("AUTH_PASSWORD") ?>"></div>
                    <div class="frm-row">
                        <noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow"
                                    class="btn-forgot"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
                    </div>
                    <? if ($arResult["STORE_PASSWORD"] == "Y"): ?>
                        <div class="frm-row">
                            <div class="frm-chk">
                                <input type="checkbox" id="login" name="USER_REMEMBER" value="Y">
                                <label for="login"
                                       title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><? echo GetMessage("AUTH_REMEMBER_SHORT") ?></label>
                            </div>
                        </div>
                    <? endif ?>

                    <? if ($arResult["CAPTCHA_CODE"]): ?>
                        <? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br/>
                        <input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>"/>
                        <img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>"
                             width="180"
                             height="40" alt="CAPTCHA"/><br/><br/>
                        <input type="text" name="captcha_word" maxlength="50" value=""/>
                    <? endif ?>
                    <div class="frm-row"><input type="submit" name="Login"
                                                value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>">
                    </div>
                    <?if($arResult["AUTH_SERVICES"]):?>
                                <div class="bx-auth-lbl"><?=GetMessage("socserv_as_user_form")?></div>
                                <?
                                $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "icons",
                                    array(
                                        "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
                                        "SUFFIX"=>"form",
                                    ),
                                    $component,
                                    array("HIDE_ICONS"=>"Y")
                                );
                                ?>
                    <?endif?>
                </form>
            </li>
       <!-- --><?php /*if($arResult["NEW_USER_REGISTRATION"] == "Y"): */?>
            <li>
                <noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>"
                            rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
            </li>

            <?if($arResult["AUTH_SERVICES"]):?>
                <?
                $APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "",
                    array(
                        "AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
                        "AUTH_URL"=>$arResult["AUTH_URL"],
                        "POST"=>$arResult["POST"],
                        "POPUP"=>"Y",
                        "SUFFIX"=>"form",
                    ),
                    $component,
                    array("HIDE_ICONS"=>"Y")
                );
                ?>
            <?endif?>

        <?php /*endif; */?>
        <?php else: ?>
            <li class="att popup-wrap">
            <li>
                <a href="<?= $arResult["PROFILE_URL"] ?>"><?= $arResult["USER_NAME"] ?> [<?= $arResult["USER_LOGIN"] ?>
                    ]</a>
            </li>
            <li>
                <a href="<?= $APPLICATION->GetCurPageParam("logout=yes&" . bitrix_sessid_get(), array(
                    "login",
                    "logout",
                    "register",
                    "forgot_password",
                    "change_password")); ?>">
                    <?= GetMessage("AUTH_LOGOUT_BUTTON") ?></a>
            </li>
            </li>
        <? endif ?>
    </ul>
</nav>
