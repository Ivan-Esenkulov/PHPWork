<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    "NAME" => GetMessage("PGNAVIGATION_NAME"),
    "PATH" => [
        "ID" => "content",
        "CHILD" => [
            "ID" => "nav_pg",
            "NAME" => "Навигация страниц"
        ],
    ],
];