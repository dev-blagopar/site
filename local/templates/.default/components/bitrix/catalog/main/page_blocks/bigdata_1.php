
<?global $arBigData;?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "bigdata", array(
	"USE_REGION" => $arParams["USE_REGION"],
	"STORES" => $arParams['STORES'],
	"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'5','BIG_DATA':true}]",
	"TEMPLATE_THEME" => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
	"BASKET_URL" => $arParams["BASKET_URL"],
	"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
	"SHOW_MEASURE_WITH_RATIO" => $arParams["SHOW_MEASURE_WITH_RATIO"],
	"ADD_PROPERTIES_TO_BASKET" => "N",
	"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
	"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
	"SHOW_OLD_PRICE" => "N",
	"SHOW_DISCOUNT_PERCENT" => "N",
	"PRICE_CODE" => $arParams['PRICE_CODE'],
	"USE_PRICE_COUNT" => "Y",
	"SHOW_PRICE_COUNT" => "1",
	"PRODUCT_SUBSCRIPTION" => $arParams['PRODUCT_SUBSCRIPTION'],
	"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
	"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
	"TITLE_SLIDER" => $arParams['TITLE_SLIDER'],
	"FILTER_NAME" => "arrFilterBigData",
	"SHOW_NAME" => "Y",
	"SHOW_IMAGE" => "Y",
	"SHOW_MEASURE" => $arParams["SHOW_MEASURE"],
	"MESS_BTN_BUY" => $arParams['MESS_BTN_BUY'],
	"MESS_BTN_DETAIL" => $arParams['MESS_BTN_DETAIL'],
	"MESS_BTN_SUBSCRIBE" => $arParams['MESS_BTN_SUBSCRIBE'],
	"MESS_NOT_AVAILABLE" => $arParams['MESS_NOT_AVAILABLE'],
	"PAGE_ELEMENT_COUNT" => 0,
	"SHOW_FROM_SECTION" => $arBigData['BIGDATA_SHOW_FROM_SECTION'],
	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"TYPE_VIEW_BASKET_BTN" => "TYPE_2",
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
	"SHOW_PRODUCTS_".$arParams["IBLOCK_ID"] => "Y",
	"ADDITIONAL_PICT_PROP_".$arParams["IBLOCK_ID"] => $arParams['ADD_PICT_PROP'],
	"LABEL_PROP_".$arParams["IBLOCK_ID"] => "-",
	"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
	'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
	"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
	"CURRENCY_ID" => $arParams["CURRENCY_ID"],
	"SECTION_ID" => $arParams['BIGDATA_SHOW_FROM_SECTION'] === "Y" ? $arBigData["SECTION_ID"]: "",
	"SECTION_CODE" => "",
	"SET_TITLE" => "N",
	"SET_BROWSER_TITLE" => "N",
	"RCM_PROD_ID" => $GLOBALS['CATALOG_CURRENT_ELEMENT_ID'],
	"PROPERTY_CODE_".$arParams["IBLOCK_ID"] => $arParams["LIST_PROPERTY_CODE"],
	"CART_PROPERTIES_".$arParams["IBLOCK_ID"] => $arParams["PRODUCT_PROPERTIES"],
	"RCM_TYPE" => (isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : ''),
	"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],
	"ONLY_POPUP_PRICE" => "Y",
	"TYPE_SKU" => ($typeSKU ? $typeSKU : $arTheme["TYPE_SKU"]["VALUE"]),
	"USE_BIG_DATA" => $arParams['USE_BIG_DATA'],
	"BIGDATA_COUNT" => $arParams["BIGDATA_COUNT"] ? $arParams["BIGDATA_COUNT"] : "5" ,

	),
	false,
	array("HIDE_ICONS" => "Y", "ACTIVE_COMPONENT" => "Y")
);

?>