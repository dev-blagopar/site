<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode( true );?>



<?php

// метка режима ajax
$isAjax = "N";  
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest"  && isset($_GET["ajax_get"]) && $_GET["ajax_get"] == "Y" || (isset($_GET["ajax_basket"]) && $_GET["ajax_basket"]=="Y")) {
	$isAjax = "Y";
}

?>



<?if (count($arResult["ITEMS"])):?>

	<?if($isAjax == "N"){
		$frame = new \Bitrix\Main\Page\FrameHelper("viewtype-block");
		$frame->begin();?>
	<?}?>

	<?if($isAjax == "Y"){
		$APPLICATION->RestartBuffer();
	}?>

	<?  // номер страницы для пагинации 
		$show = $arParams["PAGE_ELEMENT_COUNT"];
	?>

	<!-- Блок сортировки -->
	<?if($isAjax == "N"):?>
		<div class="sort_header view_block">
			<!--noindex-->
			<div class="sort_filter">
				<?
				$arAvailableSort = array();
				$arParams["SORT_BUTTONS"] = ['CREATED', 'NAME', 'PRICE'];  // при необходимости перенести в настройки компонента
				$arSorts = $arParams["SORT_BUTTONS"];
	
				if(in_array("CREATED", $arSorts)){
					$arAvailableSort["CREATED"] = array("CREATED", "asc");
				}
	
				if(in_array("NAME", $arSorts)){
					$arAvailableSort["NAME"] = array("NAME", "asc");
				}
	
				if(in_array("PRICE", $arSorts)){
					$arParams["SORT_PRICES"] = "MAXIMUM_PRICE";  // при необходимости перенести в настройки компонента
					$arSortPrices = $arParams["SORT_PRICES"];
					if($arSortPrices == "MINIMUM_PRICE" || $arSortPrices == "MAXIMUM_PRICE"){
						$arAvailableSort["PRICE"] = array("PROPERTY_".$arSortPrices, "desc");
					}
					else{
						$price = CCatalogGroup::GetList(array(), array("NAME" => $arParams["SORT_PRICES"]), false, false, array("ID", "NAME"))->GetNext();
						$arAvailableSort["PRICE"] = array("CATALOG_PRICE_".$price["ID"], "desc");
					}
				}
	
				$sort = "SHOWS";
				if((array_key_exists("sort", $_REQUEST) && array_key_exists(ToUpper($_REQUEST["sort"]), $arAvailableSort)) || (array_key_exists("sort", $_SESSION) && array_key_exists(ToUpper($_SESSION["sort"]), $arAvailableSort)) || $arParams["SORT_BY1"]){
					if($_REQUEST["sort"]){
						$sort = ToUpper($_REQUEST["sort"]);
						$_SESSION["sort"] = ToUpper($_REQUEST["sort"]);
					}
					elseif($_SESSION["sort"]){
						$sort = ToUpper($_SESSION["sort"]);
					}
					else{
						$sort = ToUpper($arParams["SORT_BY1"]);
					}
				}
	
				$sort_order = $arAvailableSort[$sort][1];
				if((array_key_exists("order", $_REQUEST) && in_array(ToLower($_REQUEST["order"]), Array("asc", "desc"))) || (array_key_exists("order", $_REQUEST) && in_array(ToLower($_REQUEST["order"]), Array("asc", "desc")) ) || $arParams["SORT_ORDER1"]){
					if($_REQUEST["order"]){
						$sort_order = htmlspecialcharsbx($_REQUEST["order"]);
						$_SESSION["order"] = htmlspecialcharsbx($_REQUEST["order"]);
					}
					elseif($_SESSION["order"]){
						$sort_order = $_SESSION["order"];
					}
					else{
						$sort_order = ToLower($arParams["SORT_ORDER1"]);
					}
				}
				?>
	
				<?foreach($arAvailableSort as $key => $val):?>
					<?$newSort = $sort_order == 'desc' ? 'asc' : 'desc';
					$current_url = $APPLICATION->GetCurPageParam('sort='.$key.'&order='.$newSort, array('sort', 'order'));
					$url = str_replace('+', '%2B', $current_url);?>
					<a rel="nofollow" href="<?=$url;?>" class="sort_btn <?=($sort == $key ? 'current' : '')?> <?=$sort_order?> <?=$key?>">
						<i class="icon" title="<?=GetMessage('SECT_SORT_'.$key)?>"></i><span><?=GetMessage('SECT_SORT_'.$key)?></span><i class="arr"></i>
					</a>
				<?endforeach;?>
				<?
	
				if($sort == "PRICE"){
					$sort = $arAvailableSort["PRICE"][0];
				}
				?>
			</div>
			<!--/noindex-->
		</div>
	<?endif;?>

	<?if($isAjax == "N"){?>
		<div class="ajax_load block">
	<?}?>

		<?if($isAjax == "N"){?>
			<div class="top_wrapper">
				<div class="catalog_block works">
		<?}?>

				<div class="articles-list lists_block news <?=($arParams["IS_VERTICAL"]=="Y" ? "vertical row" : "")?> <?=($arParams["SHOW_FAQ_BLOCK"]=="Y" ? "faq" : "")?>">
					<?
					foreach($arResult["ITEMS"] as $arItem){
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						$arSize=array("WIDTH"=>347, "HEIGHT" => 200);
						if($arParams["SHOW_FAQ_BLOCK"]=="Y"){
							if($arParams["IS_VERTICAL"]!="Y")
								$arSize=array("WIDTH"=>347, "HEIGHT" => 200);
						}else{
							if($arParams["IS_VERTICAL"]!="Y")
								$arSize=array("WIDTH"=>347, "HEIGHT" => 200);
						}
					?>
						<div class="item clearfix item_block" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
							<div class="wrapper_inner_block">
								<?if($arItem["PREVIEW_PICTURE"]):?>
									<?$img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], array( "width" => $arSize["WIDTH"], "height" => $arSize["HEIGHT"] ), BX_RESIZE_IMAGE_EXACT);?>
									<div class="left-data">
										<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="thumb"><img src="<?=$img["src"]?>" alt="<?=($arItem["PREVIEW_PICTURE"]["ALT"] ? $arItem["PREVIEW_PICTURE"]["ALT"] : $arItem["NAME"])?>" title="<?=($arItem["PREVIEW_PICTURE"]["TITLE"] ? $arItem["PREVIEW_PICTURE"]["TITLE"] : $arItem["NAME"])?>" /></a>
									</div>
								<?elseif($arItem["DETAIL_PICTURE"]):?>
									<?$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array( "width" => $arSize["WIDTH"], "height" => $arSize["HEIGHT"] ), BX_RESIZE_IMAGE_EXACT);?>
									<div class="left-data">
										<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="thumb"><img src="<?=$img["src"]?>" alt="<?=($arItem["DETAIL_PICTURE"]["ALT"] ? $arItem["DETAIL_PICTURE"]["ALT"] : $arItem["NAME"])?>" title="<?=($arItem["DETAIL_PICTURE"]["TITLE"] ? $arItem["DETAIL_PICTURE"]["TITLE"] : $arItem["NAME"])?>" /></a>
									</div>
								<?else:?>
									<div class="left-data">
										<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="thumb"><img src="<?=SITE_TEMPLATE_PATH?>/images/no_photo_medium.png" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" height="90" /></a>
									</div>
								<?endif;?>
								<div class="right-data">
									<?if($arParams["DISPLAY_DATE"]=="Y"){?>
										<?if( $arItem["PROPERTIES"]["PERIOD"]["VALUE"] ){?>
											<div class="date_small"><?=$arItem["PROPERTIES"]["PERIOD"]["VALUE"]?></div>
										<?}elseif($arItem["DISPLAY_ACTIVE_FROM"]){?>
											<div class="date_small"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
										<?}?>
									<?}?>
									<div class="item-title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><span><?=$arItem["NAME"]?></span></a></div>
									<?/*if($arParams["SHOW_PREVIEW_TEXT"] != 'N'):?>
										<div class="preview-text"><?=$arItem["PREVIEW_TEXT"]?></div>
									<?endif;*/?>
									<?if($arItem["PROPERTIES"][$arParams["PRICE_PROPERTY"]]["VALUE"]):?>
										<div class="price services">
											<div class="price_new">
												<?=$arItem["PROPERTIES"][$arParams["PRICE_PROPERTY"]]["VALUE"] . " руб";?>
											</div>
										</div>
									<?endif;?>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					<?}?>
				</div>

		<?if($isAjax=="N"){?>
				</div>
			</div>
		<?}?>

		<?if($isAjax=="Y"){?>
			<div class="wrap_nav">
		<?}?>

			<div class="bottom_nav block <?=($isAjax=="Y" ? "ajaxLoadNav" : "");?>">
				<?if($arParams["DISPLAY_BOTTOM_PAGER"] == "Y"){?><?=$arResult["NAV_STRING"]?><?}?>
			</div>

		<?if($isAjax=="Y"){?>
			</div>
		<?}?>

		<?/* 3D-обзор проектов */?>
		<?if($isAjax=="N"):?>
			<h2>
				<iframe src="https://blagopar.ru/company/360/nashi_raboty_blagopar/10/otdelka_bani_i_sauny.html"
						width="890" height="600" scrolling="auto">
				</iframe>
			</h2>
		<?endif;?>

	<?if($isAjax=="N"){?>
		</div>
	<?}?>

	<?/* Карта проектов */?>
	<?if($isAjax=="N"):?>
		<section id="map">
			<div class="wrapper_inner works_map_header">
				<h2>Проекты на карте</h2>
			</div>
			<div class="contacts__map" id="yamap" style="height: 60vh"></div>
		</section>

		<script src="https://api-maps.yandex.ru/2.1/?apikey=8dd8b6ca-97f3-4db2-a0a6-07d09441cfa5&lang=ru_RU" type="text/javascript"></script>

		<?
		$arSelect = Array(
			"ID",
			"IBLOCK_ID",
			"NAME",
			"PREVIEW_PICTURE",
			"IBLOCK_SECTION_ID",
			"DATE_ACTIVE_FROM",
			"DETAIL_PAGE_URL",
			"PROPERTY_*"
		);
		$arFilter = Array(
			"IBLOCK_ID" => 53,
			"ACTIVE_DATE" => "Y",
			"ACTIVE" => "Y",
			'!PROPERTY_GEO_LAT' => false,  // выбираем элементы только с заполненным свойством "широта"
			'!PROPERTY_GEO_LONG' => false, // выбираем элементы только с заполненным свойством "долгота"
		);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50000), $arSelect);
		$city = [];
		$coords = [];
		while ($ob = $res->GetNextElement()) {
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();

			$picture = CFile::ResizeImageGet($arFields["PREVIEW_PICTURE"], array("width" => 190, "height" => 130), BX_RESIZE_IMAGE_EXACT, true);
			$projects[]=[
				'name' => $arFields["NAME"],
				'photo' => $picture["src"],
				'link' => $arFields["DETAIL_PAGE_URL"],
				'coords' => $arProps["GEO_LAT"]["VALUE"].', '.$arProps["GEO_LONG"]["VALUE"],
			];
		}
		?>
		<script>
			ymaps.ready(init);
			function init() {
				var $mapElement = $('#yamap');
				var myMap = new ymaps.Map('yamap', {
					center: [55.76, 37.64],
					zoom: 9,
					behaviors: ['default'],
					controls: ['zoomControl','typeSelector']
				});

				myMap.behaviors.disable('scrollZoom');

				myMap.geoObjects
				<?
				foreach($projects as $project) {
					echo ".add(new ymaps.Placemark([".$project["coords"]."], {
						balloonContent: '<a href=".$project["link"]." target=\"_blank\" class=\"map_balloon\"><div style=\"text-align: center;\"><strong>".$project["name"]."</strong></div><img src=".$project["photo"]." /></a>'
					}, {
						iconLayout: 'default#image',
						iconImageSize: [59, 89],
						iconImageHref: '".SITE_TEMPLATE_PATH."/images/map-marker.png',
						iconImageOffset: [-30, -89]
					}))";
				}
				?>;

				/*myMap.setBounds(myMap.geoObjects.getBounds(), {
					checkZoomRange: true,
					zoomMargin: 9
				})
				.then(function() {
					if(myMap.getZoom() > 10)
						myMap.setZoom(18);
					}
				);*/

				myMap.setBounds(myMap.geoObjects.getBounds());

				var centerAndZoom = ymaps.util.bounds.getCenterAndZoom(
					myMap.getBounds(),
					myMap.container.getSize(),
					myMap.options.get('projection')
				);

				myMap.setCenter(
					centerAndZoom.center,
					centerAndZoom.zoom
				);
			}
		</script>
	<?endif;?>

	<div class="clear"></div>

	<?if($isAjax=="Y") {
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.plugin.min.js',true);
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.countdown.min.js',true);
		$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.countdown-ru.js',true);
		//die();
	}?>

	<?if($isAjax!="Y"){?>
		<?$frame->end();?>
	<?}?>

<?endif;?>

<script>
	var ajaxLoadWorks = function(e){
		$(".ajaxLoadNav").remove();
	}
</script>

<?if($isAjax=="Y"):?>
	<script>
		ajaxLoadWorks();
	</script>
<?endif;?>

<?if( isset($_GET['bxajaxid']) && $_GET['bxajaxid'] ):?>
	<script>startActions();</script>
<?endif;?>