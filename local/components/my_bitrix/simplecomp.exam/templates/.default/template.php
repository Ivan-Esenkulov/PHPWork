<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$APPLICATION->SetTitle(GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE")); ?>
<?php
$curUser = [];
foreach ($arResult['USERS'] as $user) {
    if ($USER->GetLogin() == $user['LOGIN']) {
        $curUser = $user;
    }
}
?>
<?php if ($USER->IsAuthorized()): ?>
    <h3>авторы и новости</h3>
    <div class="container">
        <?php foreach ($arResult['USERS'] as $user): ?>
            <div class="row">
                <?php /*if ($USER->GetLogin() == $user['LOGIN']):
                    continue; */?>
                <?php if ($curUser['UF_AUTHOR_TYPE'] == $user['UF_AUTHOR_TYPE']): ?>
                    [<?= $user['ID'] ?>] - <?= $user['LOGIN'] ?>
                    <?php foreach ($user['ELEM'] as $news): ?>
                        <ul>
                            <?php foreach ($curUser['ELEM'] as $curNews): ?>
                                <?php if ($curNews['ID'] != $news['ID']): ?>
                                    <li><?= $news['ACTIVE_FROM'] ?> - <?= $news['NAME'] ?></li>
                                <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php /*debugFun($arResult['USERS']); */?>
