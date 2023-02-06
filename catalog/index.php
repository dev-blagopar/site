<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"IBLOCK_TYPE" => "aspro_mshop_catalog",
		"IBLOCK_ID" => "14",
		"HIDE_NOT_AVAILABLE" => "Y",
		"BASKET_URL" => "/basket/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "Y",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "MAX_SMART_FILTER",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "IN_STOCK",
			2 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "Розница ООО Благопар",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "DLINA_8",
			1 => "CML2_LINK",
			2 => "COLOR",
			3 => "SIZE",
			4 => "COLOR_REF",
			5 => "ARTICLE",
			6 => "SIZES",
			7 => "",
		),
		"USE_REVIEW" => "Y",
		"MESSAGES_PER_PAGE" => "5",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "2",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"POST_FIRST_MESSAGE" => "N",
		"USE_COMPARE" => "Y",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPARE_FIELD_CODE" => array(
			0 => "NAME",
			1 => "TAGS",
			2 => "SORT",
			3 => "PREVIEW_PICTURE",
			4 => "",
		),
		"COMPARE_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "PROP_159",
			2 => "PROP_2083",
			3 => "BRAND",
			4 => "CML2_MANUFACTURER",
			5 => "CML2_BASE_UNIT",
			6 => "COLOR_REF2",
			7 => "PROP_2033",
			8 => "PROP_2065",
			9 => "PROP_2052",
			10 => "PROP_2053",
			11 => "PROP_2054",
			12 => "PROP_2017",
			13 => "PROP_2026",
			14 => "PROP_2027",
			15 => "PROP_2049",
			16 => "PROP_2044",
			17 => "PROP_162",
			18 => "PROP_2055",
			19 => "PROP_2069",
			20 => "PROP_2062",
			21 => "PROP_2061",
			22 => "",
		),
		"COMPARE_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"COMPARE_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "ARTICLE",
			2 => "COLOR_REF",
			3 => "SIZES",
			4 => "VOLUME",
			5 => "",
		),
		"COMPARE_ELEMENT_SORT_FIELD" => "shows",
		"COMPARE_ELEMENT_SORT_ORDER" => "asc",
		"DISPLAY_ELEMENT_SELECT_BOX" => "N",
		"PRICE_CODE" => array(
			0 => "Розница ООО Благопар",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => "",
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"CURRENCY_ID" => "RUB",
		"OFFERS_CART_PROPERTIES" => "",
		"SHOW_TOP_ELEMENTS" => "Y",
		"SECTION_COUNT_ELEMENTS" => "Y",
		"SECTION_TOP_DEPTH" => "2",
		"SECTIONS_LIST_PREVIEW_PROPERTY" => "UF_SECTION_DESCR",
		"SHOW_SECTION_LIST_PICTURES" => "Y",
		"PAGE_ELEMENT_COUNT" => "20",
		"LINE_ELEMENT_COUNT" => "4",
		"ELEMENT_SORT_FIELD" => "SCALED_PRICE_14",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "CREATED",
		"ELEMENT_SORT_ORDER2" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "CML2_ARTICLE",
			1 => "PROP_159",
			2 => "PROP_2083",
			3 => "BRAND",
			4 => "HIT",
			5 => "COLOR_REF2",
			6 => "PROP_2104",
			7 => "PODBORKI",
			8 => "PROP_2033",
			9 => "PROP_2065",
			10 => "PROP_305",
			11 => "PROP_352",
			12 => "PROP_317",
			13 => "PROP_357",
			14 => "PROP_2102",
			15 => "PROP_318",
			16 => "PROP_349",
			17 => "PROP_327",
			18 => "PROP_2052",
			19 => "PROP_370",
			20 => "PROP_336",
			21 => "PROP_2115",
			22 => "PROP_346",
			23 => "PROP_2120",
			24 => "PROP_2053",
			25 => "PROP_363",
			26 => "PROP_320",
			27 => "PROP_2089",
			28 => "PROP_325",
			29 => "PROP_2103",
			30 => "PROP_2085",
			31 => "PROP_300",
			32 => "PROP_322",
			33 => "PROP_362",
			34 => "PROP_365",
			35 => "PROP_359",
			36 => "PROP_284",
			37 => "PROP_364",
			38 => "PROP_356",
			39 => "PROP_343",
			40 => "PROP_314",
			41 => "PROP_348",
			42 => "PROP_316",
			43 => "PROP_350",
			44 => "PROP_333",
			45 => "PROP_332",
			46 => "PROP_360",
			47 => "PROP_353",
			48 => "PROP_347",
			49 => "PROP_25",
			50 => "PROP_2114",
			51 => "PROP_301",
			52 => "PROP_2101",
			53 => "PROP_2067",
			54 => "PROP_323",
			55 => "PROP_324",
			56 => "PROP_355",
			57 => "PROP_304",
			58 => "PROP_358",
			59 => "PROP_319",
			60 => "PROP_344",
			61 => "PROP_328",
			62 => "PROP_338",
			63 => "PROP_366",
			64 => "PROP_302",
			65 => "PROP_303",
			66 => "PROP_2054",
			67 => "PROP_341",
			68 => "PROP_223",
			69 => "PROP_283",
			70 => "PROP_354",
			71 => "PROP_313",
			72 => "PROP_2066",
			73 => "PROP_329",
			74 => "PROP_342",
			75 => "PROP_367",
			76 => "PROP_2084",
			77 => "PROP_340",
			78 => "PROP_351",
			79 => "PROP_368",
			80 => "PROP_369",
			81 => "PROP_331",
			82 => "PROP_337",
			83 => "PROP_345",
			84 => "PROP_339",
			85 => "PROP_310",
			86 => "PROP_309",
			87 => "PROP_330",
			88 => "PROP_2017",
			89 => "PROP_335",
			90 => "PROP_321",
			91 => "PROP_308",
			92 => "PROP_206",
			93 => "PROP_334",
			94 => "PROP_2100",
			95 => "PROP_311",
			96 => "PROP_2132",
			97 => "SHUM",
			98 => "PROP_361",
			99 => "PROP_326",
			100 => "PROP_315",
			101 => "PROP_2091",
			102 => "PROP_2026",
			103 => "PROP_307",
			104 => "PROP_2027",
			105 => "PROP_2098",
			106 => "PROP_2122",
			107 => "PROP_24",
			108 => "PROP_2049",
			109 => "PROP_22",
			110 => "PROP_2095",
			111 => "PROP_2044",
			112 => "PROP_162",
			113 => "PROP_2055",
			114 => "PROP_2069",
			115 => "PROP_2062",
			116 => "PROP_2061",
			117 => "CML2_LINK",
			118 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "CML2_LINK",
			2 => "DETAIL_PAGE_URL",
			3 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "MORE_PHOTO",
			1 => "ARTICLE",
			2 => "COLOR_REF",
			3 => "SIZES",
			4 => "SIZES2",
			5 => "VOLUME",
			6 => "SIZES4",
			7 => "SIZES3",
			8 => "SIZES5",
			9 => "SPORT",
			10 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"SORT_BUTTONS" => array(
			0 => "POPULARITY",
			1 => "NAME",
			2 => "PRICE",
		),
		"SORT_PRICES" => "Розница ООО Благопар",
		"DEFAULT_LIST_TEMPLATE" => "block",
		"SECTION_DISPLAY_PROPERTY" => "UF_SECTION_TEMPLATE",
		"LIST_DISPLAY_POPUP_IMAGE" => "Y",
		"SECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"SHOW_SECTION_PICTURES" => "Y",
		"SHOW_SECTION_SIBLINGS" => "Y",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "BRANDS",
			1 => "type_izdelia",
			2 => "CML2_ARTICLE",
			3 => "PROP_159",
			4 => "PROP_2083",
			5 => "BRAND",
			6 => "EXPANDABLES",
			7 => "VIDEO_YOUTUBE",
			8 => "ASSOCIATED",
			9 => "CML2_ATTRIBUTES",
			10 => "COLOR_REF2",
			11 => "LINK_SALE",
			12 => "LINK_VACANCY",
			13 => "POPUP_VIDEO",
			14 => "PROP_2104",
			15 => "LINK_NEWS",
			16 => "HELP_TEXT",
			17 => "LINK_STAFF",
			18 => "LINK_BLOG",
			19 => "PROP_2033",
			20 => "SERVICES",
			21 => "PROP_2065",
			22 => "PROP_305",
			23 => "PROP_352",
			24 => "PROP_317",
			25 => "PROP_357",
			26 => "PROP_2102",
			27 => "PROP_318",
			28 => "PROP_349",
			29 => "PROP_327",
			30 => "PROP_2052",
			31 => "PROP_370",
			32 => "PROP_336",
			33 => "PROP_2115",
			34 => "PROP_346",
			35 => "PROP_2120",
			36 => "PROP_2053",
			37 => "PROP_363",
			38 => "PROP_320",
			39 => "PROP_2089",
			40 => "PROP_325",
			41 => "PROP_2103",
			42 => "PROP_2085",
			43 => "PROP_300",
			44 => "PROP_322",
			45 => "PROP_362",
			46 => "PROP_365",
			47 => "PROP_359",
			48 => "PROP_284",
			49 => "PROP_364",
			50 => "PROP_356",
			51 => "PROP_343",
			52 => "PROP_314",
			53 => "PROP_348",
			54 => "PROP_316",
			55 => "PROP_350",
			56 => "PROP_333",
			57 => "PROP_332",
			58 => "PROP_360",
			59 => "PROP_353",
			60 => "PROP_347",
			61 => "PROP_25",
			62 => "PROP_2114",
			63 => "PROP_301",
			64 => "PROP_2101",
			65 => "PROP_2067",
			66 => "PROP_323",
			67 => "PROP_324",
			68 => "PROP_355",
			69 => "PROP_304",
			70 => "PROP_358",
			71 => "PROP_319",
			72 => "PROP_344",
			73 => "PROP_328",
			74 => "PROP_338",
			75 => "PROP_2113",
			76 => "PROP_366",
			77 => "PROP_302",
			78 => "PROP_303",
			79 => "PROP_2054",
			80 => "PROP_341",
			81 => "PROP_223",
			82 => "PROP_283",
			83 => "PROP_354",
			84 => "PROP_313",
			85 => "PROP_2066",
			86 => "PROP_329",
			87 => "PROP_342",
			88 => "PROP_367",
			89 => "PROP_2084",
			90 => "PROP_340",
			91 => "PROP_351",
			92 => "PROP_368",
			93 => "PROP_369",
			94 => "PROP_331",
			95 => "PROP_337",
			96 => "PROP_345",
			97 => "PROP_339",
			98 => "PROP_310",
			99 => "PROP_309",
			100 => "PROP_330",
			101 => "PROP_2017",
			102 => "PROP_335",
			103 => "PROP_321",
			104 => "PROP_308",
			105 => "PROP_206",
			106 => "PROP_334",
			107 => "PROP_2100",
			108 => "PROP_311",
			109 => "PROP_2132",
			110 => "SHUM",
			111 => "PROP_361",
			112 => "PROP_326",
			113 => "PROP_315",
			114 => "PROP_2091",
			115 => "PROP_2026",
			116 => "PROP_307",
			117 => "PROP_2090",
			118 => "PROP_2027",
			119 => "PROP_2098",
			120 => "PROP_2112",
			121 => "PROP_2122",
			122 => "PROP_221",
			123 => "PROP_24",
			124 => "PROP_2134",
			125 => "PROP_23",
			126 => "PROP_2049",
			127 => "PROP_22",
			128 => "PROP_2095",
			129 => "PROP_2044",
			130 => "PROP_162",
			131 => "PROP_207",
			132 => "PROP_220",
			133 => "PROP_2094",
			134 => "PROP_2092",
			135 => "PROP_2111",
			136 => "PROP_2133",
			137 => "PROP_2096",
			138 => "PROP_2086",
			139 => "PROP_285",
			140 => "PROP_2130",
			141 => "PROP_286",
			142 => "PROP_222",
			143 => "PROP_2121",
			144 => "PROP_2123",
			145 => "PROP_2124",
			146 => "PROP_2093",
			147 => "LINK_REVIEWS",
			148 => "PROP_312",
			149 => "PROP_3083",
			150 => "PROP_2055",
			151 => "PROP_2069",
			152 => "PROP_2062",
			153 => "PROP_2061",
			154 => "RECOMMEND",
			155 => "NEW",
			156 => "STOCK",
			157 => "VIDEO",
			158 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "DETAIL_PAGE_URL",
			4 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "ARTICLE",
			2 => "COLOR_REF",
			3 => "SIZES",
			4 => "WEIGHT",
			5 => "AGE",
			6 => "SIZES2",
			7 => "RUKAV",
			8 => "FRCOLLECTION",
			9 => "FRLINE",
			10 => "VOLUME",
			11 => "FRMADEIN",
			12 => "FRELITE",
			13 => "SIZES4",
			14 => "SIZES3",
			15 => "SIZES5",
			16 => "TALL",
			17 => "FRTYPE",
			18 => "FRAROMA",
			19 => "SPORT",
			20 => "VLAGOOTVOD",
			21 => "KAPUSHON",
			22 => "FRFITIL",
			23 => "FRFAMILY",
			24 => "FRSOSTAVCANDLE",
			25 => "FRFORM",
			26 => "",
		),
		"PROPERTIES_DISPLAY_LOCATION" => "TAB",
		"SHOW_BRAND_PICTURE" => "Y",
		"SHOW_ASK_BLOCK" => "Y",
		"ASK_FORM_ID" => "2",
		"SHOW_ADDITIONAL_TAB" => "Y",
		"PROPERTIES_DISPLAY_TYPE" => "TABLE",
		"SHOW_KIT_PARTS" => "Y",
		"SHOW_KIT_PARTS_PRICES" => "Y",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "5",
		"ALSO_BUY_MIN_BUYES" => "1",
		"USE_STORE" => "N",
		"USE_STORE_PHONE" => "Y",
		"USE_STORE_SCHEDULE" => "Y",
		"USE_MIN_AMOUNT" => "N",
		"MIN_AMOUNT" => "10",
		"STORE_PATH" => "/contacts/stores/#store_id#/",
		"MAIN_TITLE" => "Наличие на складах",
		"MAX_AMOUNT" => "20",
		"USE_ONLY_MAX_AMOUNT" => "Y",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "sort",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => "main",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"IBLOCK_STOCK_ID" => "149",
		"IBLOCK_LINK_NEWS_ID" => "145",
		"IBLOCK_SERVICES_ID" => "147",
		"IBLOCK_TIZERS_ID" => "135",
		"IBLOCK_LINK_REVIEWS_ID" => "144",
		"STAFF_IBLOCK_ID" => "141",
		"VACANCY_IBLOCK_ID" => "127",
		"SHOW_QUANTITY" => "Y",
		"SHOW_MEASURE" => "Y",
		"SHOW_QUANTITY_COUNT" => "Y",
		"USE_RATING" => "Y",
		"DISPLAY_WISH_BUTTONS" => "Y",
		"DEFAULT_COUNT" => "1",
		"SHOW_HINTS" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"USER_FIELDS" => array(
			0 => "",
			1 => "UF_CATALOG_ICON",
			2 => "",
		),
		"FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"TOP_ELEMENT_COUNT" => "8",
		"TOP_LINE_ELEMENT_COUNT" => "4",
		"TOP_ELEMENT_SORT_FIELD" => "sort",
		"TOP_ELEMENT_SORT_ORDER" => "asc",
		"TOP_ELEMENT_SORT_FIELD2" => "sort",
		"TOP_ELEMENT_SORT_ORDER2" => "asc",
		"TOP_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"COMPONENT_TEMPLATE" => "main",
		"DETAIL_SET_CANONICAL_URL" => "Y",
		"SHOW_DEACTIVATED" => "N",
		"TOP_OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "",
		),
		"TOP_OFFERS_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"TOP_OFFERS_LIMIT" => "10",
		"SECTION_TOP_BLOCK_TITLE" => "Лучшие предложения",
		"OFFER_TREE_PROPS" => array(
		),
		"USE_BIG_DATA" => "Y",
		"BIG_DATA_RCM_TYPE" => "any",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"VIEWED_ELEMENT_COUNT" => "20",
		"VIEWED_BLOCK_TITLE" => "Ранее вы смотрели",
		"ELEMENT_SORT_FIELD_BOX" => "name",
		"ELEMENT_SORT_ORDER_BOX" => "asc",
		"ELEMENT_SORT_FIELD_BOX2" => "id",
		"ELEMENT_SORT_ORDER_BOX2" => "desc",
		"ADD_PICT_PROP" => "MORE_PHOTO",
		"OFFER_ADD_PICT_PROP" => "MORE_PHOTO",
		"MAX_GALLERY_ITEMS" => "5",
		"SHOW_GALLERY" => "Y",
		"SHOW_PROPS" => "Y",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "Y",
		"SKU_DETAIL_ID" => "oid",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"SET_LAST_MODIFIED" => "Y",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "Y",
		"MESSAGE_404" => "",
		"AJAX_FILTER_CATALOG" => "Y",
		"AJAX_CONTROLS" => "Y",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DISPLAY_ELEMENT_SLIDER" => "10",
		"SHOW_ONE_CLICK_BUY" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "8",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"OFFER_HIDE_NAME_PROPS" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"SECTION_PREVIEW_DESCRIPTION" => "Y",
		"SECTIONS_LIST_PREVIEW_DESCRIPTION" => "Y",
		"SALE_STIKER" => "SALE_TEXT",
		"SHOW_DISCOUNT_TIME" => "Y",
		"SHOW_RATING" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_OFFERS_LIMIT" => "0",
		"DETAIL_EXPANDABLES_TITLE" => "С этим товаром покупают",
		"DETAIL_ASSOCIATED_TITLE" => "Вам также может понравиться",
		"DETAIL_LINKED_GOODS_SLIDER" => "Y",
		"DETAIL_LINKED_GOODS_TABS" => "Y",
		"DETAIL_PICTURE_MODE" => "MAGNIFIER",
		"SHOW_UNABLE_SKU_PROPS" => "Y",
		"HIDE_NOT_AVAILABLE_OFFERS" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"COMPATIBLE_MODE" => "Y",
		"TEMPLATE_THEME" => "blue",
		"LABEL_PROP" => "",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"SHOW_MAX_QUANTITY" => "N",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"USE_SALE_BESTSELLERS" => "Y",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"INSTANT_RELOAD" => "N",
		"COMPARE_POSITION_FIXED" => "Y",
		"COMPARE_POSITION" => "top left",
		"USE_RATIO_IN_RANGES" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"TOP_PROPERTY_CODE_MOBILE" => "",
		"TOP_VIEW_MODE" => "SECTION",
		"TOP_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"TOP_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"TOP_ENLARGE_PRODUCT" => "STRICT",
		"TOP_SHOW_SLIDER" => "Y",
		"TOP_SLIDER_INTERVAL" => "3000",
		"TOP_SLIDER_PROGRESS" => "N",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"LIST_PROPERTY_CODE_MOBILE" => "",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => "",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => "",
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_BLOCKS_ORDER" => "complect,nabor,offers,tabs,services,news,blog,staff,vacancy,gifts,goods",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
			1 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DETAIL_DOCS_PROP" => "-",
		"STIKERS_PROP" => "HIT",
		"USE_SHARE" => "Y",
		"TAB_OFFERS_NAME" => "",
		"TAB_DESCR_NAME" => "",
		"TAB_KOMPLECT_NAME" => "",
		"TAB_NABOR_NAME" => "",
		"TAB_CHAR_NAME" => "Характеристики",
		"TAB_VIDEO_NAME" => "",
		"TAB_REVIEW_NAME" => "",
		"TAB_FAQ_NAME" => "",
		"TAB_STOCK_NAME" => "",
		"TAB_DOPS_NAME" => "",
		"BLOCK_SERVICES_NAME" => "",
		"BLOCK_DOCS_NAME" => "",
		"DIR_PARAMS" => CMax::GetDirMenuParametrs(__DIR__),
		"ELEMENT_DETAIL_TYPE_VIEW" => "FROM_MODULE",
		"SHOW_CHEAPER_FORM" => "Y",
		"LANDING_TITLE" => "Популярные категории",
		"LANDING_SECTION_COUNT" => "10",
		"LANDING_SEARCH_TITLE" => "Похожие запросы",
		"LANDING_SEARCH_COUNT" => "7",
		"LIST_SECTIONS_TYPE_VIEW" => "sections_1",
		"LIST_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"CHEAPER_FORM_NAME" => "",
		"SECTIONS_TYPE_VIEW" => "FROM_MODULE",
		"SECTION_ELEMENTS_TYPE_VIEW" => "list_elements_1",
		"ELEMENT_TYPE_VIEW" => "FROM_MODULE",
		"LANDING_TYPE_VIEW" => "FROM_MODULE",
		"FILE_404" => "",
		"SHOW_MEASURE_WITH_RATIO" => "N",
		"SHOW_COUNTER_LIST" => "Y",
		"SHOW_DISCOUNT_TIME_EACH_SKU" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"SHOW_ARTICLE_SKU" => "Y",
		"USE_FILTER_PRICE" => "N",
		"DISPLAY_ELEMENT_COUNT" => "Y",
		"RESTART" => "N",
		"USE_LANGUAGE_GUESS" => "Y",
		"NO_WORD_LOGIC" => "Y",
		"SORT_REGION_PRICE" => "Розница ООО Благопар",
		"SHOW_SECTION_DESC" => "Y",
		"USE_ADDITIONAL_GALLERY" => "Y",
		"ADDITIONAL_GALLERY_TYPE" => "BIG",
		"ADDITIONAL_GALLERY_PROPERTY_CODE" => "-",
		"ADDITIONAL_GALLERY_OFFERS_PROPERTY_CODE" => "-",
		"BLOCK_ADDITIONAL_GALLERY_NAME" => "",
		"STORES_FILTER" => "TITLE",
		"STORES_FILTER_ORDER" => "SORT_ASC",
		"VIEW_BLOCK_TYPE" => "N",
		"SHOW_HOW_BUY" => "N",
		"TITLE_HOW_BUY" => "Как купить",
		"SHOW_DELIVERY" => "Y",
		"TITLE_DELIVERY" => "Доставка",
		"SHOW_PAYMENT" => "Y",
		"TITLE_PAYMENT" => "Оплата",
		"SHOW_GARANTY" => "Y",
		"TITLE_GARANTY" => "Условия гарантии",
		"TITLE_SLIDER" => "Рекомендуем",
		"SHOW_SEND_GIFT" => "N",
		"SEND_GIFT_FORM_NAME" => "",
		"BLOCK_LANDINGS_NAME" => "",
		"BLOG_IBLOCK_ID" => "142",
		"BLOCK_BLOG_NAME" => "",
		"RECOMEND_COUNT" => "5",
		"VISIBLE_PROP_COUNT" => "6",
		"BIGDATA_EXT" => "bigdata_1",
		"SHOW_DISCOUNT_PERCENT_NUMBER" => "Y",
		"ALT_TITLE_GET" => "NORMAL",
		"BUNDLE_ITEMS_COUNT" => "3",
		"SHOW_LANDINGS_SEARCH" => "Y",
		"SHOW_LANDINGS" => "Y",
		"LANDING_POSITION" => "BEFORE_PRODUCTS",
		"USE_DETAIL_PREDICTION" => "Y",
		"SECTION_BG" => "-",
		"OFFER_SHOW_PREVIEW_PICTURE_PROPS" => array(
		),
		"LANDING_IBLOCK_ID" => "154",
		"DETAIL_BLOCKS_TAB_ORDER" => "desc,char,stores,video,buy,payment,delivery,reviews",
		"DETAIL_BLOCKS_ALL_ORDER" => "complect,goods,nabor,offers,desc,char,buy,payment,delivery,video,stores,custom_tab,services,news,blog,reviews,staff,vacancy,gifts",
		"DELIVERY_CALC" => "Y",
		"DELIVERY_CALC_NAME" => "",
		"ASK_TAB" => "",
		"TAB_NEWS_NAME" => "",
		"TAB_STAFF_NAME" => "",
		"TAB_VACANCY_NAME" => "",
		"STAFF_VIEW_TYPE" => "staff_block",
		"REVIEW_COMMENT_REQUIRED" => "N",
		"REVIEW_FILTER_BUTTONS" => array(
			0 => "PHOTO",
			1 => "RATING",
			2 => "TEXT",
		),
		"SECTION_TYPE_VIEW" => "FROM_MODULE",
		"SHOW_BUY_DELIVERY" => "Y",
		"TITLE_BUY_DELIVERY" => "Оплата и доставка",
		"BLOG_URL" => "catalog_comments",
		"REAL_CUSTOMER_TEXT" => "",
		"USE_COMPARE_GROUP" => "N",
		"SHOW_SORT_RANK_BUTTON" => "Y",
		"LANDING_SEARCH_COUNT_MOBILE" => "3",
		"USE_BIG_DATA_IN_SEARCH" => "N",
		"SHOW_MORE_SUBSECTIONS" => "Y",
		"HIDE_SUBSECTIONS_LIST" => "N",
		"SHOW_SIDE_BLOCK_LAST_LEVEL" => "N",
		"SHOW_SORT_IN_FILTER" => "Y",
		"SUBSECTION_PREVIEW_PROPERTY" => "DESCRIPTION",
		"SHOW_SUBSECTION_DESC" => "Y",
		"LANDING_SECTION_COUNT_MOBILE" => "3",
		"USE_LANDINGS_GROUP" => "N",
		"LANDINGS_GROUP_FROM_SEO" => "N",
		"SHOW_SMARTSEO_TAGS" => "Y",
		"SMARTSEO_TAGS_COUNT" => "10",
		"SMARTSEO_TAGS_COUNT_MOBILE" => "3",
		"SMARTSEO_TAGS_BY_GROUPS" => "N",
		"SMARTSEO_TAGS_SHOW_DEACTIVATED" => "N",
		"SMARTSEO_TAGS_SORT" => "SORT",
		"SHOW_SKU_DESCRIPTION" => "N",
		"MODULES_ELEMENT_COUNT" => "10",
		"USE_CUSTOM_RESIZE" => "N",
		"DETAIL_SET_PRODUCT_TITLE" => "Собрать комплект",
		"DISPLAY_LINKED_PAGER" => "Y",
		"DISPLAY_LINKED_ELEMENT_SLIDER_CROSSLINK" => "",
		"LINKED_ELEMENT_TAB_SORT_FIELD" => "sort",
		"LINKED_ELEMENT_TAB_SORT_ORDER" => "asc",
		"LINKED_ELEMENT_TAB_SORT_FIELD2" => "id",
		"LINKED_ELEMENT_TAB_SORT_ORDER2" => "desc",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "Y",
		"MAX_IMAGE_SIZE" => "0.5",
		"SHOW_KIT_ALL" => "N",
		"TAB_BUY_SERVICES_NAME" => "",
		"VISIBLE_PROP_WITH_OFFER" => "N",
		"COUNT_SERVICES_IN_ANNOUNCE" => "2",
		"SHOW_ALL_SERVICES_IN_SLIDE" => "N",
		"BIGDATA_SHOW_FROM_SECTION" => "N",
		"SMARTSEO_TAGS_LIMIT" => "",
		"BIGDATA_EXT_BOTTOM" => "bigdata_bottom_1",
		"BIGDATA_COUNT" => "5",
		"BIGDATA_TYPE_VIEW" => "FROM_MODULE",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>