<?php

$by = 'id';
$order = 'desc';

$obUsers = CUser::GetList($by, $order, [], ['FIELDS' => ['NAME', 'EMAIL']]);

while ($user = $obUsers->fetch()) {
    debugFun($user);
}