<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$result = \Bitrix\Main\UserTable::getList([
    'select' => array('ID', 'NAME', 'LOGIN', 'EMAIL'),
    'filter' => ['>=ID' => 5],
    'order' => ['LAST_LOGIN' => "desc"],
]);

while ($usr = $result->fetch()) {
    var_dump(\Bitrix\Iblock\Iblock::wakeUp($usr['ID'])->getEntityDataClass());
}



/*$by = 'id';
$order = 'asc';

$obUsers = CUser::GetList($by, $order, [], ['FIELDS' => ['ID', 'LOGIN', 'EMAIL']]);
$arUser = [];

while ($user = $obUsers->fetch()) {
    $arUser[] = $user;
}

foreach ($arUser as $key => $user) {
    $arUser[$key]['GROUPS'] = CUser::GetUserGroup($user['ID']);
}


$obj = new CUser;
foreach ($arUser as $us) {
    if (!in_array(1, $us['GROUPS']) && $us['EMAIL'] !== $us['LOGIN']) {
        $obj->Update(
            (int)$us['ID'],
            [
                'LOGIN' => $us['EMAIL'],
            ],
            true
        );

    }
}
echo $obj->LAST_ERROR;*/

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>