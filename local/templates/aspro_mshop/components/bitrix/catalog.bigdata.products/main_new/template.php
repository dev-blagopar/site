<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$frame = $this->createFrame()->begin("");
$templateData = array(
	//'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);
$injectId = $arParams['UNIQ_COMPONENT_ID'];

if (isset($arResult['REQUEST_ITEMS']))
{
	// code to receive recommendations from the cloud
	CJSCore::Init(array('ajax'));

	// component parameters
	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedParameters = $signer->sign(
		base64_encode(serialize($arResult['_ORIGINAL_PARAMS'])),
		'bx.bd.products.recommendation'
	);
	$signedTemplate = $signer->sign($arResult['RCM_TEMPLATE'], 'bx.bd.products.recommendation');

	?>

	<span id="<?=$injectId?>"></span>

	<script type="text/javascript">
		BX.ready(function(){
			bx_rcm_get_from_cloud(
				'<?=CUtil::JSEscape($injectId)?>',
				<?=CUtil::PhpToJSObject($arResult['RCM_PARAMS'])?>,
				{
					'parameters':'<?=CUtil::JSEscape($signedParameters)?>',
					'template': '<?=CUtil::JSEscape($signedTemplate)?>',
					'site_id': '<?=CUtil::JSEscape(SITE_ID)?>',
					'rcm': 'yes'
				}
			);
		});
	</script>
	<?
	$frame->end();
	return;

	// \ end of the code to receive recommendations from the cloud
}
if($arResult['ITEMS']){?>
	<?$arParams["SALE_STIKER"] = (!$arParams["SALE_STIKER"] ? "SALE_TEXT" : $arParams["SALE_STIKER"]);?>
	<?$arResult['RID'] = ($arResult['RID'] ? $arResult['RID'] : (\Bitrix\Main\Context::getCurrent()->getRequest()->get('RID') != 'undefined' ? \Bitrix\Main\Context::getCurrent()->getRequest()->get('RID') : '' ));?>
	<input type="hidden" name="bigdata_recommendation_id" value="<?=htmlspecialcharsbx($arResult['RID'])?>">
	<?if($fast_view_text_tmp = \Bitrix\Main\Config\Option::get('aspro.mshop', 'EXPRESSION_FOR_FAST_VIEW', GetMessage('FAST_VIEW')))
		$fast_view_text = $fast_view_text_tmp;
	else
		$fast_view_text = GetMessage('FAST_VIEW');?>
	<span id="<?=$injectId?>_items" class="bigdata_recommended_products_items">
		<ul class="tabs_slider RECOMENDATION_slides wr">
			<?foreach ($arResult['ITEMS'] as $key => $arItem){?>
				<?$strMainID = $this->GetEditAreaId($arItem['ID'] . $key);?>
				<li class="catalog_item" id="<?=$strMainID;?>">
					<div class="basket_props_block" id="bx_basket_div_<?=$arItem["ID"];?>" style="display: none;">
						<?
								if (!empty($arItem['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($arItem['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
						?>
							<input type="hidden" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo htmlspecialcharsbx($propInfo['ID']); ?>">
						<?
										if (isset($arItem['PRODUCT_PROPERTIES'][$propID]))
											unset($arItem['PRODUCT_PROPERTIES'][$propID]);
									}
								}
								$arItem["EMPTY_PROPS_JS"]="Y";
								$emptyProductProperties = empty($arItem['PRODUCT_PROPERTIES']);
								if (!$emptyProductProperties)
								{
									$arItem["EMPTY_PROPS_JS"]="N";
						?><div class="wrapper">
							<table>
						<?
									foreach ($arItem['PRODUCT_PROPERTIES'] as $propID => $propInfo)
									{
						?>
							<tr><td><? echo $arItem['PROPERTIES'][$propID]['NAME']; ?></td>
							<td>
						<?
										if(
											'L' == $arItem['PROPERTIES'][$propID]['PROPERTY_TYPE']
											&& 'C' == $arItem['PROPERTIES'][$propID]['LIST_TYPE']
										)
										{
											foreach($propInfo['VALUES'] as $valueID => $value)
											{
												?><label><input type="radio" name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]" value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? '"checked"' : ''); ?>><? echo $value; ?></label><?
											}
										}
										else
										{
											?><select name="<? echo $arParams['PRODUCT_PROPS_VARIABLE']; ?>[<? echo $propID; ?>]"><?
											foreach($propInfo['VALUES'] as $valueID => $value)
											{
												?><option value="<? echo $valueID; ?>" <? echo ($valueID == $propInfo['SELECTED'] ? '"selected"' : ''); ?>><? echo $value; ?></option><?
											}
											?></select><?
										}
						?>
							</td></tr>
						<?
									}
						?>
							</table>
							</div>
						<?
								}
						?>
					</div>
					<?$strTitle = (
						isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]) && '' != isset($arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"])
						? $arItem["IPROPERTY_VALUES"]["ELEMENT_PREVIEW_PICTURE_FILE_TITLE"]
						: $arItem['NAME']
					);
					$totalCount = CMShop::GetTotalCount($arItem);
					$arQuantityData = CMShop::GetQuantityArray($totalCount);
					$arItem["FRONT_CATALOG"]="Y";
					$arItem["RID"]=$arResult["RID"];
					$arAddToBasketData = CMShop::GetAddToBasketArray($arItem, $totalCount, $arParams["DEFAULT_COUNT"], $arParams["BASKET_URL"], true);


					$strMeasure='';
					if($arItem["OFFERS"]){
						$strMeasure=$arItem["MIN_PRICE"]["CATALOG_MEASURE_NAME"];
					}else{
						if (($arParams["SHOW_MEASURE"]=="Y")&&($arItem["CATALOG_MEASURE"])){
							$arMeasure = CCatalogMeasure::getList(array(), array("ID"=>$arItem["CATALOG_MEASURE"]), false, false, array())->GetNext();
							$strMeasure=$arMeasure["SYMBOL_RUS"];
						}
					}
					?>

					<div class="image_wrapper_block">
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?><?=($arResult["RID"] ? '?RID='.$arResult["RID"] : '')?>" class="thumb">
							<?if($arItem["PROPERTIES"]["HIT"]["VALUE_XML_ID"]){?>
								<div class="stickers">
									<?foreach($arItem["PROPERTIES"]["HIT"]["VALUE_XML_ID"] as $key=>$class){?>
										<div class="sticker_<?=strtolower($class);?>" title="<?=$arItem["PROPERTIES"]["HIT"]["VALUE"][$key]?>"></div>
									<?}?>
								</div>
							<?}?>
							<?if($arParams["DISPLAY_WISH_BUTTONS"] != "N" || $arParams["DISPLAY_COMPARE"] == "Y"):?>
								<div class="like_icons">
									<?if($arItem["CAN_BUY"] && empty($arItem["OFFERS"]) && $arParams["DISPLAY_WISH_BUTTONS"] != "N"):?>
										<div class="wish_item_button">
											<span title="<?=GetMessage('CATALOG_WISH')?>" class="wish_item to" data-item="<?=$arItem["ID"]?>"><i></i></span>
											<span title="<?=GetMessage('CATALOG_WISH_OUT')?>" class="wish_item in added" style="display: none;" data-item="<?=$arItem["ID"]?>"><i></i></span>
										</div>
									<?endif;?>
									<?if($arParams["DISPLAY_COMPARE"] == "Y"):?>
										<div class="compare_item_button">
											<span title="<?=GetMessage('CATALOG_COMPARE')?>" class="compare_item to" data-iblock="<?=$arParams["IBLOCK_ID"]?>" data-item="<?=$arItem["ID"]?>" ><i></i></span>
											<span title="<?=GetMessage('CATALOG_COMPARE_OUT')?>" class="compare_item in added" style="display: none;" data-iblock="<?=$arParams["IBLOCK_ID"]?>" data-item="<?=$arItem["ID"]?>"><i></i></span>
										</div>
									<?endif;?>
								</div>
							<?endif;?>
							<?if(!empty($arItem["PREVIEW_PICTURE"])):?>
								<img border="0" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$strTitle;?>" title="<?=$strTitle;?>" />
							<?elseif(!empty($arItem["DETAIL_PICTURE"])):?>
								<?$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array("width" => 170, "height" => 170), BX_RESIZE_IMAGE_PROPORTIONAL, true );?>
								<img border="0" src="<?=$img["src"]?>" alt="<?=$strTitle;?>" title="<?=$strTitle;?>" />
							<?else:?>
								<img border="0" src="<?=SITE_TEMPLATE_PATH?>/images/no_photo_medium.png" alt="<?=$strTitle;?>" title="<?=$strTitle;?>" />
							<?endif;?>
							<?if($arParams["SALE_STIKER"] && $arItem["PROPERTIES"][$arParams["SALE_STIKER"]]["VALUE"]){?>
								<div class="sticker_sale_text"><?=$arItem["PROPERTIES"][$arParams["SALE_STIKER"]]["VALUE"];?></div>
							<?}?>
						</a>
						<div class="fast_view_block" data-event="jqm" data-param-form_id="fast_view" data-param-iblock_id="<?=$arParams["IBLOCK_ID"];?>" data-param-id="<?=$arItem["ID"];?>" data-param-item_href="<?=urlencode($arItem["DETAIL_PAGE_URL"]);?>" data-name="fast_view"><?=$fast_view_text;?></div>
					</div>
					<div class="item_info">
						<div class="item-title">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?><?=($arResult["RID"] ? '?RID='.$arResult["RID"] : '')?>"><span><?=$arItem["NAME"]?></span></a>
						</div>
						<?=$arQuantityData["HTML"];?>
						<div class="cost prices clearfix">
							<?if($arItem["OFFERS"]):?>
								<?\Aspro\Functions\CAsproMShopSku::showItemPrices($arParams, $arItem, $item_id, $min_price_id);?>
							<?elseif($arItem["PRICES"]):?>
								<?=\Aspro\Functions\CAsproMShopItem::getItemPrices($arParams, $arItem["PRICES"], $strMeasure, $min_price_id);?>
							<?endif;?>
						</div>
						<div class="buttons_block clearfix">
							<?=$arAddToBasketData["HTML"]?>
						</div>
					</div>
				</li>
			<?}?>
		</ul>
	</span>

	<script type="text/javascript">
		$(document).ready(function(){

			var flexsliderItemWidth = 210;
			var flexsliderItemMargin = 20;

			//var sliderWidth = $('.tab_slider_wrapp.<?=$class_block;?>').outerWidth();
			//var flexsliderMinItems = Math.floor(sliderWidth / (flexsliderItemWidth + flexsliderItemMargin));
			$('.tabs_content > li.RECOMENDATION_wrapp ').flexslider({
				animation: 'slide',
				selector: '.tabs_slider .catalog_item',
				slideshow: false,
				animationSpeed: 600,
				directionNav: true,
				controlNav: false,
				pauseOnHover: true,
				animationLoop: true,
				itemWidth: flexsliderItemWidth,
				itemMargin: flexsliderItemMargin,
				//minItems: flexsliderMinItems,
				controlsContainer: '.tabs_slider_navigation.RECOMENDATION_nav',
				start: function(slider){
					slider.find('li').css('opacity', 1);
				}
			});

			$(window).resize(function(){
				var sliderWidth = $('.tab_slider_wrapp.specials').outerWidth();
				$('.tab_slider_wrapp.specials .tabs_content > li.cur').css('height', '');
				$('.tab_slider_wrapp.specials .tabs_content .tab.cur .tabs_slider .buttons_block').hide();
				$('.tab_slider_wrapp.specials .tabs_content > li.cur').equalize({children: '.item-title'});
				$('.tab_slider_wrapp.specials .tabs_content > li.cur').equalize({children: '.item_info'});
				$('.tab_slider_wrapp.specials.tabs_content > li.cur').equalize({children: '.catalog_item'});
				var itemsButtonsHeight = $('.tab_slider_wrapp.specials .tabs_content .tab.cur .tabs_slider li .buttons_block').height();
				var tabsContentUnhover = $('.tab_slider_wrapp.specials .tabs_content .tab.cur').height() * 1;
				var tabsContentHover = tabsContentUnhover + itemsButtonsHeight+50;
				$('.tab_slider_wrapp.specials .tabs_content .tab.cur').attr('data-unhover', tabsContentUnhover);
				$('.tab_slider_wrapp.specials .tabs_content .tab.cur').attr('data-hover', tabsContentHover);
				$('.tab_slider_wrapp.specials .tabs_content').height(tabsContentUnhover);
			});

			$(window).resize();
			$(document).on({
				mouseover: function(e){
					var tabsContentHover = $(this).closest('.tab').attr('data-hover') * 1;
					$(this).closest('.tab').fadeTo(100, 1);
					$(this).closest('.tab').stop().css({'height': tabsContentHover});
					$(this).find('.buttons_block').fadeIn(450, 'easeOutCirc');
				},
				mouseleave: function(e){
					var tabsContentUnhoverHover = $(this).closest('.tab').attr('data-unhover') * 1;
					$(this).closest('.tab').stop().animate({'height': tabsContentUnhoverHover}, 100);
					$(this).find('.buttons_block').stop().fadeOut(233);
				}
			}, '.specials .tabs_slider li');

		})
	</script>
<?}
$frame->end();?>