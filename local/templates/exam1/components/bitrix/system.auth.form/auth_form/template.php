<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();
?>

<!--<nav class="menu-block">
    <ul>
        <li class="att popup-wrap">
            <a id="hd_singin_but_open" href="" class="btn-toggle">Войти на сайт</a>
            <form action="/" class="frm-login popup-block">
                <div class="frm-title">Войти на сайт</div>
                <a href="" class="btn-close">Закрыть</a>
                <div class="frm-row"><input type="text" placeholder="Логин"></div>
                <div class="frm-row"><input type="password" placeholder="Пароль"></div>
                <div class="frm-row"><a href="" class="btn-forgot">Забыли пароль</a></div>
                <div class="frm-row">
                    <div class="frm-chk">
                        <input type="checkbox" id="login">
                        <label for="login">Запомнить меня</label>
                    </div>
                </div>
                <div class="frm-row"><input type="submit" value="Войти"></div>
            </form>
        </li>
        <li><a href="">Зарегистрироваться</a></li>
    </ul>
</nav>-->

<nav class="menu-block">
<ul>
<li class="att popup-wrap">
<a id="hd_singin_but_open" href="<?=$arResult["AUTH_URL"]?>" class="btn-toggle"><?=GetMessage("AUTH_LOGIN_INPUT")?></a>
<?php
if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR'] && !empty($arResult['ERROR_MESSAGE']))
{
    ShowMessage($arResult['ERROR_MESSAGE']);
}
?>

<?if($arResult["FORM_TYPE"] == "login"):?>

    <form name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>" class="frm-login popup-block">
        <?if($arResult["BACKURL"] <> ''):?>
            <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
        <?endif?>
        <?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
        <?endforeach?>
        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="AUTH" />
        <div class="frm-title">Войти на сайт</div>
        <a href="" class="btn-close">Закрыть</a>
        <div class="frm-row"><input type="text" name="USER_LOGIN" placeholder="<?=GetMessage("AUTH_LOGIN")?>"></div>
        <div class="frm-row"><input type="password" name="USER_PASSWORD" placeholder="<?=GetMessage("AUTH_PASSWORD")?>"></div>
        <div class="frm-row"><noindex><a href="<?=$arResult["AUTH_FORGOT_PASSWORD_URL"]?>" rel="nofollow" class="btn-forgot"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></a></noindex></div>
    <?if ($arResult["STORE_PASSWORD"] == "Y"):?>
        <div class="frm-row">
            <div class="frm-chk">
                <input type="checkbox" id="login" name="USER_REMEMBER" value="Y">
                <label for="login" title="<?=GetMessage("AUTH_REMEMBER_ME")?>"><?echo GetMessage("AUTH_REMEMBER_SHORT")?></label>
            </div>
        </div>
    <?endif?>

    <?if ($arResult["CAPTCHA_CODE"]):?>
                <?echo GetMessage("AUTH_CAPTCHA_PROMT")?>:<br />
                <input type="hidden" name="captcha_sid" value="<?echo $arResult["CAPTCHA_CODE"]?>" />
                <img src="/bitrix/tools/captcha.php?captcha_sid=<?echo $arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
                <input type="text" name="captcha_word" maxlength="50" value="" />
    <?endif?>
            <div class="frm-row"><input type="submit" name="Login" value="<?=GetMessage("AUTH_LOGIN_BUTTON")?>"></div>
    </form>
    </li>
    <?php if($arResult["NEW_USER_REGISTRATION"] == "Y"):?>
        <li><noindex><a href="<?=$arResult["AUTH_REGISTER_URL"]?>" rel="nofollow"><?=GetMessage("AUTH_REGISTER")?></a></noindex></li>
    <?php endif; ?>

<?php else: ?>

            <li>
                <a href="<?= $arResult["PROFILE_URL"] ?>" ><?= $arResult["USER_NAME"] ?> [<?= $arResult["USER_LOGIN"] ?>]</a>
            </li>
            <li>
                <a href="<?= $APPLICATION->GetCurPageParam("logout=yes", array(
                    "login",
                    "logout",
                    "register",
                    "forgot_password",
                    "change_password"));?>">
                    <?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
            </li>
</li>

    <!--<form action="<?php /*=$arResult["AUTH_URL"]*/?>">
        <table width="95%">
            <tr>
                <td align="center">
                    <?php /*=$arResult["USER_NAME"]*/?><br />
                    [<?php /*=$arResult["USER_LOGIN"]*/?>]<br />
                    <a href="<?php /*=$arResult["PROFILE_URL"]*/?>" title="<?php /*=GetMessage("AUTH_PROFILE")*/?>"><?php /*=GetMessage("AUTH_PROFILE")*/?></a><br />
                </td>
            </tr>
            <tr>
                <td align="center">
                    <?/*foreach ($arResult["GET"] as $key => $value):*/?>
                        <input type="hidden" name="<?php /*=$key*/?>" value="<?php /*=$value*/?>" />
                    <?/*endforeach*/?>
                    <?php /*=bitrix_sessid_post()*/?>
                    <input type="hidden" name="logout" value="yes" />
                    <input type="submit" name="logout_butt" value="<?php /*=GetMessage("AUTH_LOGOUT_BUTTON")*/?>" />
                </td>
            </tr>
        </table>
    </form>-->
<?endif?>
</ul>
</nav>
