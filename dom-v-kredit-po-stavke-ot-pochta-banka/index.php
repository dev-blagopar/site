<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");?>

<div class="maxwidth-theme" style="font-size: 18px">
    <img src="/upload/baner-pochta-bank.jpg" style="width: 100%" alt="">
    <br/>
    <br/>
    <p>Раздумываете о собственном доме? Самое время решиться. Сейчас самое подходящее время начать строить свое идеальное, уютное жилье.<br>
        <span id="more-15921"></span><br>
        Это стало возможно с кредитом от нашего партнера «Почта Банк».</p>
    <ul>
        <li class="bullet-checkmark">Если ваш возраст от 18 до 70 лет</li>
        <li class="bullet-checkmark">для оформления нужен только паспорт гражданина РФ и номер СНИЛС</li>
        <li class="bullet-checkmark">без залога и поручителей</li>
        <li class="bullet-checkmark">быстрое рассмотрение от 30 минут.</li>
        <li class="bullet-checkmark">сумма кредита от <span class="fancy-underline" style="color: #ff0000;"><strong>50 тыс. до 5 млн. руб</strong></span></li>
        <li class="bullet-checkmark">срок кредитования <span style="color: #333399;"><strong><span class="fancy-underline">до 7 лет</span></strong></span></li>
        <li class="bullet-checkmark">ставка на весь срок <span style="color: #333399;"><strong><span class="fancy-underline">от 6,9% </span></strong></span></li>
        <li class="bullet-checkmark">досрочное погашение без штрафных санкций</li>
    </ul>
    <p>Банк-партнер — Почта банк</p>
    <p><img class="alignnone size-full wp-image-12180 lazy-load-active" src="https://ecotechstroy.ru/wp-content/uploads/2020/03/logo_pochta_bank.png" data-src="https://ecotechstroy.ru/wp-content/uploads/2020/03/logo_pochta_bank.png" alt="" width="200" height="98"></p>
    <p>Приходите к нам. Выбирайте понравившийся проект или проектируйте уникальный и неповторимый дом с нашими архитекторами.</p>
</div>
<?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "inline",
    Array(
        "WEB_FORM_ID" => 3,
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS" => "N",
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "LIST_URL" => "",
        "EDIT_URL" => "",
        "SUCCESS_URL" => "?send=ok",
        "CHAIN_ITEM_TEXT" => "",
        "CHAIN_ITEM_LINK" => "",
        "VARIABLE_ALIASES" => Array("WEB_FORM_ID" => "WEB_FORM_ID", "RESULT_ID" => "RESULT_ID"),
        "AJAX_MODE" => "Y",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "AJAX_OPTION_HISTORY" => "N",
    )
);?>
<div class="maxwidth-theme">
    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"front_collection",
	array(
		"IBLOCK_ID" => "53",
		"IBLOCK_TYPE" => "aspro_mshop_content",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"SORT_BY2" => "ID",
		"SORT_ORDER2" => "DESC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "PREVIEW_PICTURE",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "front_collection",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"TITLE_BLOCK" => "Посмотрите некоторые наши работы",
		"TITLE_BLOCK_ALL" => "Все работы",
		"ALL_URL" => "/works/",
		"VIEW_TYPE" => "grey_pict",
		"SIZE_IN_ROW" => "5",
		"INCLUDE_FILE" => "",
		"BG_POSITION" => "top left",
		"NO_MARGIN" => "N",
		"FILLED" => "N",
		"MOBILE_TEMPLATE" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>