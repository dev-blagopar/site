<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);?>
<?if($arParams["USE_RSS"]=="Y"):?>
	<?
		if(method_exists($APPLICATION, 'addheadstring'))
		$APPLICATION->AddHeadString('<link rel="alternate" type="application/rss+xml" title="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" href="'.$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"].'" />');
	?>
	<a href="<?=$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["rss"]?>" title="RSS" class="rss_feed_icon"><?=GetMessage("RSS_TITLE")?></a>
<?endif;?>

<?if($arParams['USE_FILTER'] == 'Y'){
	if(isset($arResult['VARIABLES']['YEAR']))
	{
		if($arElement['ACTIVE_FROM'])
		{
			if($arDateTime = ParseDateTime($arElement['ACTIVE_FROM'], FORMAT_DATETIME))
    		{
		        if($arDateTime['YYYY'] != $arResult['VARIABLES']['YEAR'])
		        {
		        	/*echo GetMessage('ELEMENT_NOTFOUND');
					CHTTP::SetStatus(404);*/
					\Bitrix\Iblock\Component\Tools::process404(
						trim($arParams["MESSAGE_404"]) ?: GetMessage("ELEMENT_NOTFOUND")
						,true
						,true
						,$arParams["SHOW_404"] === "Y"
						,$arParams["FILE_404"]
					);
					return;
		        }
    		}
		}
	}
}?>

<?$bUseShare = ($arParams["USE_SHARE"] == "Y" && $arElement);?>

<?if ($arParams["SHOW_FAQ_BLOCK"]=="Y"):?>
	<div class="right_side wide">
		<div class="ask_small_block">
			<div class="ask_btn_block">
				<a class="button vbig_btn wides ask_btn"><span><?=GetMessage("ASK_QUESTION")?></span></a>
			</div>
			<div class="description">
				<?$APPLICATION->IncludeFile(SITE_DIR."include/ask_block_description.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("ASK_QUESTION_TEXT"), ));?>
			</div>
		</div>
	</div>
	<div class="left_side wide">
<?endif;?>
<div class="content_wr_float <?=($bUseShare ? 'with-share' : '');?>">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"custom_works",
	Array(		
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
		"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
		"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
		"SHOW_SERVICES_BLOCK" => $arParams["SHOW_SERVICES_BLOCK"],
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"DETAIL_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
		"SECTION_URL"	=>	$arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"META_KEYWORDS" => $arParams["META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
		"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
		"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"MESSAGE_404" => $arParams["MESSAGE_404"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"SHOW_404" => $arParams["SHOW_404"],
		"FILE_404" => $arParams["FILE_404"],
		"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
		"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
		"ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
		"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
		"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
		"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
		"LINKED_ELEMENST_PAGE_COUNT" => ($arParams["LINKED_ELEMENST_PAGE_COUNT"] ? $arParams["LINKED_ELEMENST_PAGE_COUNT"] : 20),
		"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
		"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
		"CHECK_DATES" => $arParams["CHECK_DATES"],
		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
		"USE_SHARE" 			=> $arParams["USE_SHARE"],
		"SHARE_HIDE" 			=> $arParams["SHARE_HIDE"],
		"SHARE_TEMPLATE" 		=> $arParams["SHARE_TEMPLATE"],
		"SHARE_HANDLERS" 		=> $arParams["SHARE_HANDLERS"],
		"SHARE_SHORTEN_URL_LOGIN"	=> $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"IBLOCK_CATALOG_TYPE" => $arParams["IBLOCK_CATALOG_TYPE"],	
		"CATALOG_IBLOCK_ID1" => $arParams["CATALOG_IBLOCK_ID1"],
		"CATALOG_IBLOCK_ID2" => $arParams["CATALOG_IBLOCK_ID2"],
		"CATALOG_IBLOCK_ID3" => $arParams["CATALOG_IBLOCK_ID3"],
		"CATALOG_IBLOCK_ID4" => $arParams["CATALOG_IBLOCK_ID4"],
		"PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
		"SHOW_BUY_BUTTONS" => $arParams["SHOW_BUY_BUTTONS"],
		"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
		"CATALOG_FILTER_NAME" => $arParams["CATALOG_FILTER_NAME"],
		"SHOW_FAQ_BLOCK" => $arParams["SHOW_FAQ_BLOCK"],
		"SHOW_BACK_LINK" => $arParams["SHOW_BACK_LINK"],
		"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
		"GALLERY_PROPERTY" => $arParams["GALLERY_PROPERTY"],
		"SHOW_GALLERY" => $arParams["SHOW_GALLERY"],
		"LINKED_PRODUCTS_PROPERTY" => $arParams["LINKED_PRODUCTS_PROPERTY"],
		"SHOW_LINKED_PRODUCTS" => $arParams["SHOW_LINKED_PRODUCTS"],
		"PRICE_PROPERTY" => $arParams["PRICE_PROPERTY"],
		"SHOW_PRICE" => $arParams["SHOW_PRICE"],
		"PERIOD_PROPERTY" => $arParams["PERIOD_PROPERTY"],
		"SHOW_PERIOD" => $arParams["SHOW_PERIOD"],
		"VIEW_LINKED_PRODUCTS" => ($arParams["VIEW_LINKED_PRODUCTS"] ? $arParams["VIEW_LINKED_PRODUCTS"] : "slider" ),	
	),
	$component
);?>
<?if($bUseShare):?>
	<div class="catalog_detail">
		<?$APPLICATION->IncludeFile(SITE_DIR."include/share_buttons.php", Array(), Array("MODE" => "html", "NAME" => 'SOCIAL'));?>
	</div>
<?endif;?>
</div>
<?if ($arParams["SHOW_FAQ_BLOCK"]=="Y"):?></div><?endif;?>