<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<?
/*set array props for component_epilog*/
$templateData = array(
	'PRICE' => $arResult['PROPERTIES'][$arParams["PRICE_PROPERTY"]]['VALUE'],
);

/**/
?>
<div class="works_detail_wrapp big item">
	<?if($arParams["SHOW_GALLERY"] == "Y" && $arResult["PROPERTIES"][$arParams["GALLERY_PROPERTY"]]["VALUE"]):?>
	<div class="item_slider">
		<?
			/* SLIDER */
			$detailImg = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array("width" => null, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL, true, array());

			$files = $arResult["PROPERTIES"][$arParams["GALLERY_PROPERTY"]]["VALUE"];
			array_unshift($files, $arResult["DETAIL_PICTURE"]["ID"]);

			if(array_key_exists('SRC', $files)) {
			   $files['SRC'] = '/' . substr($files['SRC'], 1);
			   $files['ID'] = $arResult["PROPERTIES"][$arParams["GALLERY_PROPERTY"]]["VALUE"][0];
			   $files = array($files);
			}

			$arFirstPhoto = current($files);
			$viewImgType = "IMG";
			$bMagnifier = ($viewImgType=="MAGNIFIER");
		?>

		<div class="slides">
			<?if(!empty($files)){?>
				<ul>
					<?foreach($files as $i => $arFile){
						if ($i && $bMagnifier) {
							continue;
						}

						$img = CFile::ResizeImageGet($arFile, array('width'=>null, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$img_big = CFile::ResizeImageGet($arFile, array('width'=>1024, 'height'=>null), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						//$isEmpty=($img["src"] ? false : true );
						$alt=$arImage["ALT"];
						$title=$arImage["TITLE"];
						?>
						<li id="photo-<?=$i?>" class="detail_picture_block clearfix <?=(!$i ? 'current' : '')?>" <?=($i > 0 ? 'style="display: none;"' : '')?>>
							<a href="<?=($viewImgType=="IMG" ? $img_big["src"] : "javascript:void(0)");?>" <?=($bIsOneImage ? '' : 'data-fancybox-group="item_slider"')?> class="<?=$viewImgType == 'IMG' ? 'fancy' : ''?>" title="<?=$title;?>">
								<img src="<?=$img["src"]?>" <?=($viewImgType=="MAGNIFIER" ? 'class="zoom_picture" data-xpreview="'.$img["src"].'" data-xoriginal="'.$img_big["src"].'"': "");?> alt="<?=$alt;?>" title="<?=$title;?>"<?=(!$i ? ' itemprop="image"' : '')?> />
							</a>
						</li>
					<?}?>
				</ul>
			<?}?>
		</div>

		<div class="wrapp_thumbs">
			<div class="thumbs" style="max-width:<?=ceil(((count($files) <= 4 ? count($files) : 4) * 70) - 10)?>px;">
				<ul class="slides_block" id="thumbs">
					<?foreach($files as $arFile):?>
						<?
							$img = CFile::ResizeImageGet($arFile, array('width'=>230, 'height'=>155), BX_RESIZE_IMAGE_EXACT, true);
							$img_big = CFile::ResizeImageGet($arFile, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						?>

						<li class="item_block" data-fancybox-group="gallery" data-big_img="<?=$img_big['src']?>" data-small_img="<?=$img["src"]?>">
							<span><img src="<?=$img["src"];?>" alt="<?=$arResult["NAME"];?>" title="<?=$arResult["NAME"];?>"/></span>
						</li>
					<?endforeach;?>
				</ul>
			</div>
			<span class="thumbs_navigation"></span>
		</div>
	</div>

	<?/* Mobile slider */?>
	<div class="item_slider flex">
		<ul class="slides">
			<?if(!empty($files)):?>
				<?foreach($files as $i => $arFile):?>
					<li id="mphoto-<?=$i?>" <?=(!$i ? 'class="current"' : 'style="display: none;"')?>>
						<?
						$img = CFile::ResizeImageGet($arFile, array('width'=>null, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$img_big = CFile::ResizeImageGet($arFile, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);

						$alt=$arImage["ALT"];
						$title=$arImage["TITLE"];
						?>

						<a href="<?=$img_big["src"]?>" data-fancybox-group="item_slider_flex" class="fancy" title="<?=$title;?>" >
							<img src="<?=$img["src"]?>" alt="<?=$alt;?>" title="<?=$title;?>" />
						</a>
					</li>
				<?endforeach;?>
			<?endif;?>
		</ul>
	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.item_slider .thumbs li').first().addClass('current');
			$('.item_slider .thumbs .slides_block').delegate('li:not(.current)', 'click', function(){
				var slider_wrapper = $(this).parents('.item_slider'),
					index = $(this).index();
				$(this).addClass('current').siblings().removeClass('current')//.parents('.item_slider').find('.slides li').fadeOut(333);
				if(arMShopOptions['THEME']['DETAIL_PICTURE_MODE'] == 'MAGNIFIER')
				{
					var li = $(this).parents('.item_slider').find('.slides li');
					li.find('img').attr('src', $(this).data('small_img'));
					li.find('img').attr('xoriginal', $(this).data('big_img'));
				}
				else
				{
					slider_wrapper.find('.slides li').removeClass('current').hide();
					slider_wrapper.find('.slides li:eq('+index+')').addClass('current').show();
				}
			});
		})

		// desktop slider
		$(".thumbs").flexslider({
			animation: "slide",
			selector: ".slides_block > li",
			slideshow: false,
			animationSpeed: 600,
			directionNav: true,
			controlNav: true,
			pauseOnHover: true,
			itemWidth: 150,
			itemMargin: 10,
			animationLoop: true,
			controlsContainer: ".thumbs_navigation",
		});

		// mobile slider
		$(".item_slider.flex").flexslider({
			animation: "slide",
			slideshow: true,
			slideshowSpeed: 10000,
			animationSpeed: 600,
			directionNav: true,
			pauseOnHover: true,
			animationLoop: false,
			smoothHeight: true,
		});

		$('.item_slider .thumbs li').first().addClass('current');

		$('.item_slider .thumbs').delegate('li:not(.current)', 'click', function(){
			$(this).addClass('current').siblings().removeClass('current').parents('.item_slider').find('.slides li').fadeOut(333);
			$(this).parents('.item_slider').find('.slides li').eq($(this).index()).addClass('current').stop().fadeIn(333);
		});
	</script>
	<?endif;?>

	<?/* Дата */?>
	<?if($arParams["DISPLAY_DATE"] != "N"):?>
			<?if($arResult["PROPERTIES"][$arParams["PERIOD_PROPERTY"]]["VALUE"]):?>
				<div class="news_date_time_detail date_small"><?=$arResult["PROPERTIES"][$arParams["PERIOD_PROPERTY"]]["VALUE"];?></div>
			<?elseif($arResult["DISPLAY_ACTIVE_FROM"]):?>
				<div class="news_date_time_detail date_small"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
			<?endif;?>
	<?endif;?>

	<?/* Краткое описание */?>
	<?/*if ($arResult["PREVIEW_TEXT"]):?>
		<div class="<?if ($left_side):?>right_side<?endif;?> margin preview_text"><?=$arResult["PREVIEW_TEXT"];?></div>
	<?endif; */?>

	<?/* Детальное описание */?>
	<?if ($arResult["DETAIL_TEXT"]):?>
		<div class="detail_text <?=($arResult["DETAIL_PICTURE"] ? "wimg" : "");?>"><?=$arResult["DETAIL_TEXT"]?></div>
	<?endif;?>

	<div class="works_btns">
		<a href="/works" class="btn_works">Все работы</a>
		<a href="/catalog" class="btn_catalog">Каталог</a>
	</div>

	<?/* Характеристики */?>
	<?/*
	$arDisplayProperties = array();
		foreach($arResult["DISPLAY_PROPERTIES"] as $arProp){
			if(!in_array($arProp["CODE"], array($arParams["GALLERY_PROPERTY"], $arParams["LINKED_PRODUCTS_PROPERTY"], "VIDEO", "VIDEO_YOUTUBE"))){
				if((!is_array($arProp["DISPLAY_VALUE"]) && strlen($arProp["DISPLAY_VALUE"])) || (is_array($arProp["DISPLAY_VALUE"]) && implode('', $arProp["DISPLAY_VALUE"]))){
					$arDisplayProperties[] = $arProp;
				}
			}
		}
	?>
	<?if($arDisplayProperties):?>
		<table class="props_list" style="width:100%;">
			<?foreach($arDisplayProperties as $arProp):?>
				<tr>
					<td class="char_name">
						<span <?if($arProp["HINT"] && $arParams["SHOW_HINTS"] == "Y"){?>class="whint"<?}?>><?if($arProp["HINT"] && $arParams["SHOW_HINTS"] == "Y"):?><div class="hint"><span class="icon"><i>?</i></span><div class="tooltip"><?=$arProp["HINT"]?></div></div><?endif;?><?=($arProp["~NAME"] ? $arProp["~NAME"] : $arProp["NAME"]);?></span>
					</td>
					<td class="char_value">
						<span>
							<?if(count($arProp["DISPLAY_VALUE"]) > 1):?>
								<?=implode(', ', $arProp["DISPLAY_VALUE"]);?>
							<?else:?>
								<?=$arProp["DISPLAY_VALUE"];?>
							<?endif;?>
						</span>
					</td>
				</tr>
			<?endforeach;?>
		</table>
	<?endif;*/?>

	<?/* Прайс */?>
	<?/*if($arParams["SHOW_SERVICES_BLOCK"]!="Y" && $arResult["PROPERTIES"][$arParams["PRICE_PROPERTY"]]["VALUE"]):?>
		<div class="price_block">
			<div class="price"><?=GetMessage("SERVICE_PRICE")?> <?=$arResult["PROPERTIES"][$arParams["PRICE_PROPERTY"]]["VALUE"];?></div>
		</div>
	<?endif;*/?>

	<div class="clear"></div>


	<?/*if ($arParams["SHOW_FAQ_BLOCK"]=="Y"):?>
		<div class="ask_big_block">
			<div class="ask_btn_block">
				<a class="button vbig_btn wides ask_btn"><span><?=GetMessage("ASK_QUESTION")?></span></a>
			</div>
			<div class="description">
				<?$APPLICATION->IncludeFile(SITE_DIR."include/ask_block_detail_description.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("ASK_QUESTION_DETAIL_TEXT"), ));?>
			</div>
		</div>
	<?endif;*/?>
</div>