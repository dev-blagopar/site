<?
use Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<?
//CJSCore::Init(['fancybox']);
\Aspro\Max\Functions\Extensions::init('fancybox');
/*set array props for component_epilog*/
$templateData = array(
	'PRICE' => $arResult['PROPERTIES'][$arParams["PRICE_PROPERTY"]]['VALUE'],
);
/**/

//$this->addExternalJS("/bitrix/js/concept-quiz/jquery-1.12.3.min.js");
Asset::getInstance()->addJs('/bitrix/templates/aspro_mshop/js/jquery.flexslider.min.js');
Asset::getInstance()->addCss( '/bitrix/templates/aspro_mshop/css/flexslider.min.css');

//$this->addExternalJS("/local/templates/.default/js/jquery.flexslider.min.js");
//Asset::getInstance()->addJs('/local/templates/.default/js/jquery.flexslider.js');
//Asset::getInstance()->addJs('/local/templates/.default/js/jquery-ui.js');
//Asset::getInstance()->addJs( '/local/templates/.default/js/jquery.fancybox.js');
//Asset::getInstance()->addCss('/local/templates/.default/css/flexslider.css');
//Asset::getInstance()->addCss('/local/templates/.default/css/jquery.fancybox.css');
?>
<!-- Разместите код в разделе <body> вашей страницы -->

<div class="works_detail_wrapp big item">
	<?if($arParams["SHOW_GALLERY"] == "Y" && $arResult["PROPERTIES"][$arParams["GALLERY_PROPERTY"]]["VALUE"]):?>
	<div class="item_slider">
		<?
			/* SLIDER */
			$detailImg = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], array("width" => 1024, "height" => 500), BX_RESIZE_IMAGE_PROPORTIONAL, true, array());

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

		<div class="slides desktop_slides">
			<?if(!empty($files)){?>
				<ul>
					<?foreach($files as $i => $arFile){
						if ($i && $bMagnifier) {
							continue;
						}

						$img = CFile::ResizeImageGet($arFile, array('width'=>1024, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$img_big = CFile::ResizeImageGet($arFile, array('width'=>1024, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						//$isEmpty=($img["src"] ? false : true );
						$alt=$arImage["ALT"];
						$title=$arImage["TITLE"];
						?>
						<li id="photo-<?=$i?>" class="detail_picture_block clearfix <?=(!$i ? 'current' : '')?>" <?=($i > 0 ? 'style="display: none;"' : '')?>>
							<a href="<?=($viewImgType=="IMG" ? $img_big["src"] : "javascript:void(0)");?>" <?=($bIsOneImage ? '' : 'data-fancybox-group="item_slider"')?> data-fancybox="desktop_slides" class="<?=$viewImgType == 'IMG' ? 'fancy' : ''?>" title="<?=$title;?>">
								<img src="<?=$img_big["src"]?>" <?=($viewImgType=="MAGNIFIER" ? 'class="zoom_picture" data-xpreview="'.$img_big["src"].'" data-xoriginal="'.$img_big["src"].'"': "");?> alt="<?=$alt;?>" title="<?=$title;?>"<?=(!$i ? ' itemprop="image"' : '')?> />
							</a>
						</li>
					<?}?>
				</ul>
			<?}?>
		</div>

		<div class="wrapp_thumbs">
			<div class="thumbs">
				<ul class="slides_block" id="thumbs">
					<?foreach($files as $arFile):?>
						<?
							$img = CFile::ResizeImageGet($arFile, array('width'=>230, 'height'=>155), BX_RESIZE_IMAGE_EXACT, true);
							$img_big = CFile::ResizeImageGet($arFile, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						?>

						<li class="item_block" data-big_img="<?=$img_big['src']?>" data-small_img="<?=$img["src"]?>">
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
		<ul class="slides mobile_slides">
			<?if(!empty($files)):?>
				<?foreach($files as $i => $arFile):?>
					<li id="mphoto-<?=$i?>" <?=(!$i ? 'class="current"' : '')?>>
						<?
						$img = CFile::ResizeImageGet($arFile, array('width'=>null, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$img_big = CFile::ResizeImageGet($arFile, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);

						$alt=$arImage["ALT"];
						$title=$arImage["TITLE"];
						?>

						<a href="<?=$img_big["src"]?>" data-fancybox="mobile_slides" data-fancybox-group="item_slider_flex" class="fancy" title="<?=$title;?>" >
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
                    $(this).addClass('current').siblings().removeClass('current')
                    slider_wrapper.find('.slides li').removeClass('current').hide();
                    slider_wrapper.find('.slides li:eq('+index+')').addClass('current').show();
                });
            })

            // desktop slider
            $(".thumbs").flexslider({
                animation: "slide",
                selector: ".slides_block > li",
                slideshow: false,
                directionNav: true,
                controlNav: false,
                pauseOnHover: true,
                itemWidth: 150,
                itemMargin: 10,
                animationLoop: false,
                controlsContainer: ".thumbs_navigation",
            });

            // // mobile slider
            $(".item_slider.flex").flexslider({
                animation: "slide",
                slideshow: false,
                slideshowSpeed: 10000,
                animationSpeed: 600,
                directionNav: false,
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

	<?/* Детальное описание */?>
	<?if ($arResult["DETAIL_TEXT"]):?>
		<div class="detail_text <?=($arResult["DETAIL_PICTURE"] ? "wimg" : "");?>"><?=$arResult["DETAIL_TEXT"]?></div>
	<?endif;?>

	<div class="works_btns">
		<a href="/works" class="btn_works">Все работы</a>
		<a href="/catalog" class="btn_catalog">Каталог</a>
	</div>
	<div class="clear"></div>
    <style>
        .flex-control-nav.flex-control-paging {
            display: none;
        }
    </style>
</div>