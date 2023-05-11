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
//Asset::getInstance()->addJs('/bitrix/templates/aspro_mshop/js/jquery.flexslider.min.js');
//Asset::getInstance()->addCss( '/bitrix/templates/aspro_mshop/css/flexslider.min.css');
Asset::getInstance()->addCss( 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');


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
	<div class="wrapper-sliders">
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

        <div class="swiper photo-gallery-slider">
            <ul class="swiper-wrapper photo-gallery-slider__list">
                <?foreach($files as $arFile):?>
                    <?
                    $img = CFile::ResizeImageGet($arFile, array('width'=>1024, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    $img_big = CFile::ResizeImageGet($arFile, array('width'=>1024, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    //$isEmpty=($img["src"] ? false : true );
                    $alt=$arImage["ALT"];
                    $title=$arImage["TITLE"];
                    ?>
                    <li class="swiper-slide photo-gallery-slider__item" id="photo-<?=$i?>" data-big_img="<?=$img_big['src']?>" data-small_img="<?=$img["src"]?>">
                        <a href="<?=($viewImgType=="IMG" ? $img_big["src"] : "javascript:void(0)");?>" <?=($bIsOneImage ? '' : 'data-fancybox-group="item_slider"')?> data-fancybox="desktop_slides" class="<?=$viewImgType == 'IMG' ? 'fancy' : ''?>" title="<?=$title;?>">
                            <img src="<?=$img_big["src"]?>" <?=($viewImgType=="MAGNIFIER" ? 'class="zoom_picture" data-xpreview="'.$img_big["src"].'" data-xoriginal="'.$img_big["src"].'"': "");?> alt="<?=$alt;?>" title="<?=$title;?>"<?=(!$i ? ' itemprop="image"' : '')?> />
                        </a>
                    </li>
                <?endforeach;?>
            </ul>
        </div>


        <div class="swiper photo-gallery-thumbs">
            <ul class="swiper-wrapper photo-gallery-thumbs__list">
                <?foreach($files as $arFile):?>
                    <?
                        $img = CFile::ResizeImageGet($arFile, array('width'=>230, 'height'=>155), BX_RESIZE_IMAGE_EXACT, true);
                        $img_big = CFile::ResizeImageGet($arFile, array('width'=>800, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                    ?>

                    <li class="swiper-slide photo-gallery-thumbs__item" data-big_img="<?=$img_big['src']?>" data-small_img="<?=$img["src"]?>">
                        <img class="photo-gallery-thumbs__img" src="<?=$img["src"];?>" alt="<?=$arResult["NAME"];?>" title="<?=$arResult["NAME"];?>"/>
                    </li>
                <?endforeach;?>
            </ul>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

	</div>

        <script  type="module" charset="utf-8">
            import  Swiper from 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js';

            window.addEventListener('DOMContentLoaded', () => {
                const photoGallerySliderNode = document.querySelector('.photo-gallery-slider');
                const photoGalleryThumbsNode = document.querySelector('.photo-gallery-thumbs');

                const photoGalleryThumbsSwiper = new Swiper(photoGalleryThumbsNode, {
                    spaceBetween: 20,
                    slidesPerView: 'auto',
                    loop: true,
                    slideToClickedSlide: true,
                    touchRatio: 0.2,
                    freeMode: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });

                if (photoGallerySliderNode) {

                    const photoGallerySliderSwiper = new Swiper(photoGallerySliderNode, {
                        slidesPerView: 1,
                        thumbs: {
                            swiper: photoGalleryThumbsSwiper
                        }
                    });
                }
            })

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
        ul:not([id*=bx_])>li:before {
          display: none;
        }

        .flex-control-nav.flex-control-paging {
            display: none;
        }

        .wrapper-sliders {
          margin-bottom: 70px;
        }

        .photo-gallery-thumbs {
          min-width: 100%;
          width: 100%;
        }

        .photo-gallery-thumbs__list {
          min-width: 100%;
          width: 100%;
        }
        .photo-gallery-thumbs__item {
          max-width: 230px;
          margin: 0;
          cursor: pointer;
        }

        .photo-gallery-thumbs__item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-gallery-slider {
            min-width: 100%;
            width: 100%;
        }

        .photo-gallery-slider__list {
            min-width: 100%;
            width: 100%;
        }
        .photo-gallery-slider__item {
            min-width: 100%;
            margin: 0;
            min-height: 350px;
            height: 350px;
        }

        .photo-gallery-slider__item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        @media (max-width: 600px) {
            .photo-gallery-thumbs {
              display: none;
            }

            .photo-gallery-slider__item img {
                object-fit: cover;
            }
        }

    </style>
</div>