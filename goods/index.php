<?php

/**
 * @global $APPLICATION
 */

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/*loadCSVFileInHLBlock(5);*/

$APPLICATION->SetTitle("HL-блок");

$APPLICATION->IncludeComponent(
	"my_bitrix:component_hlb", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"HL_BLOCK_ID" => "5",
		"COUNT_ROW_PAGE" => "10",
		"FIELD_SORT" => "ID",
		"SORT_ORDER" => "asc",
        "PAGEN_ID" => "page",
	),
	false
);

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");

