<?php
AddEventHandler("main", "OnBeforeUserRegister", ["CUserEx", "OnBeforeUserRegister"]);
AddEventHandler("main", "OnBeforeUserSimpleRegister", ["CUserEx", "OnBeforeUserRegister"]);
AddEventHandler("main", "OnBeforeUserAdd", ["CUserEx", "OnBeforeUserRegister"]);
AddEventHandler("main", "OnBeforeUserUpdate", ["CUserEx", "OnBeforeUserRegister"]);

class CUserEx
{
    static function OnBeforeUserRegister(&$arFields)
    {
        $arFields["LOGIN"] = $arFields["EMAIL"];
    }
}