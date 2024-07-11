<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    "NAME" => GetMessage("COMPONENT_LIST_HLB_NAME"),
    "PATH" => [
        "ID" => "content",
        "CHILD" => [
            "ID" => "hl_block",
            "NAME" => GetMessage("COMPONENT_LIST_HLB_CHILD_NAME")
        ],
    ],
];