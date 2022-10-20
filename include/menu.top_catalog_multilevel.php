<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_new", 
	array(
		"ROOT_MENU_TYPE" => "top_catalog",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_TIME" => "15000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"IBLOCK_CATALOG_TYPE" => "aspro_mshop_catalog",
		"IBLOCK_CATALOG_ID" => "14",
		"COMPONENT_TEMPLATE" => "top_new",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>