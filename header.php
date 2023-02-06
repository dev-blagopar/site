<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if($GET["debug"] == "y"){
	error_reporting(E_ERROR | E_PARSE);
}
IncludeTemplateLangFile(__FILE__);
global $APPLICATION, $TEMPLATE_OPTIONS, $arSite;
$arSite = CSite::GetByID(SITE_ID)->Fetch();
$htmlClass = ($_REQUEST && isset($_REQUEST['print']) ? 'print' : false);
?>
<!DOCTYPE html>
<html xml:lang='<?=LANGUAGE_ID?>' lang='<?=LANGUAGE_ID?>' xmlns="http://www.w3.org/1999/xhtml" <?=($htmlClass ? 'class="'.$htmlClass.'"' : '')?>>
<head>

<script>
    (function(w, d, u, i, o, s, p) {
        if (d.getElementById(i)) { return; } w['MangoObject'] = o; 
        w[o] = w[o] || function() { (w[o].q = w[o].q || []).push(arguments) }; w[o].u = u; w[o].t = 1 * new Date();
        s = d.createElement('script'); s.async = 1; s.id = i; s.src = u;
        p = d.getElementsByTagName('script')[0]; p.parentNode.insertBefore(s, p);
    }(window, document, '//widgets.mango-office.ru/widgets/mango.js', 'mango-js', 'mgo'));
    mgo({calltracking: {id: 14726, elements: [{"numberText":"74954111115"}]}});
</script>


<!-- Google Tag Manager -->
	<?/*
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W3KWCRX');</script>
*/?>
<!-- End Google Tag Manager -->

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97228010-1', 'auto');
  ga('send', 'pageview');

	</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-97407264-1', 'auto');
	  ga('send', 'pageview');
	
	</script>


	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="yandex-verification" content="b0e3762d4a550db5" />
	<meta name="yandex-verification" content="280bac06565fd3f0" />
	<meta name="yandex-verification" content="0ec8b992eac13c0d" />
	<meta name="yandex-verification" content="280bac06565fd3f0" />
	<meta name="yandex-verification" content="9bc535d63ad243d2" />
	
	<?$APPLICATION->ShowMeta("viewport");?>
	<?$APPLICATION->ShowMeta("HandheldFriendly");?>
	<?$APPLICATION->ShowMeta("apple-mobile-web-app-capable", "yes");?>
	<?$APPLICATION->ShowMeta("apple-mobile-web-app-status-bar-style");?>
	<?$APPLICATION->ShowMeta("SKYPE_TOOLBAR");?>
	<meta name="yandex-verification" content="b0e3762d4a550db5" />
	<?$APPLICATION->ShowHead();?>
	<?$APPLICATION->AddHeadString('<script>BX.message('.CUtil::PhpToJSObject( $MESS, false ).')</script>', true);?>
	<?if(CModule::IncludeModule("aspro.mshop")) {CMShop::Start(SITE_ID);}?>
	<!--[if gte IE 9]><style type="text/css">.basket_button, .button30, .icon {filter: none;}</style><![endif]-->
	<meta name="yandex-verification" content="280bac06565fd3f0" />
	<link href='<?=CMain::IsHTTPS() ? 'https' : 'http'?>://fonts.googleapis.com/css?family=Ubuntu:400,500,700,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
</head>
	<body id="main">
    <?/*
	<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter44197829 = new Ya.Metrika({ id:44197829, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/44197829" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
	*/?>
	
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter<?=yandex_counter?> = new Ya.Metrika({
                    id:<?=yandex_counter?>,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    ecommerce:"dataLayer"
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?=yandex_counter?>" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<?//для оформления заказа?>
<script type="text/javascript">
$('.order_btn').on('click', function(){
	window.dataLayer = window.dataLayer || [];
	
	var products = {};
	var dataLayerProducts = new Array();
	
	jQuery.each(ids, function(key, product_info) {
		products["id"] = ids[key];
		products["name"] = names[key];
		products["quantity"] = quantities[key];
		products["price"] = prices[key];
		
		dataLayerProducts.push(products);
		
		products = {
		"id": "",
		"name": "",
		"quantity": "",
		"price": ""
		};
    });	
		
	dataLayer.push({
		"ecommerce": {
			"purchase": {
				"actionField": {
					"id" : "order_<?=time()?>"
				},
				"products": dataLayerProducts
			}
		}
	});
})
</script>

<!-- /Yandex.Metrika counter -->


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3KWCRX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		<div id="panel"><?$APPLICATION->ShowPanel();?></div>

		<?if(!CModule::IncludeModule("aspro.mshop")){?><center><?$APPLICATION->IncludeFile(SITE_DIR."include/error_include_module.php");?></center></body></html><?die();?><?}?>
		<?$APPLICATION->IncludeComponent("aspro:theme.mshop", ".default", array("COMPONENT_TEMPLATE" => ".default"), false);?>
		<?CMShop::SetJSOptions();?>
		<?$isFrontPage = CSite::InDir(SITE_DIR.'index.php');?>
		<?$isContactsPage = CSite::InDir(SITE_DIR.'contacts/');?>
		<?$isBasketPage=CSite::InDir(SITE_DIR.'basket/');?>
		<div class="wrapper <?=($TEMPLATE_OPTIONS["HEAD"]["CURRENT_MENU_COLOR"] != "none" ? "has_menu" : "");?> <?=CMShop::getCurrentThemeClasses();?> h_color_<?=$TEMPLATE_OPTIONS["HEAD"]["CURRENT_HEAD_COLOR"];?> m_color_<?=$TEMPLATE_OPTIONS["HEAD"]["CURRENT_MENU_COLOR"];?> <?=($isFrontPage ? "front_page" : "");?> basket_<?=strToLower($TEMPLATE_OPTIONS["BASKET"]["CURRENT_VALUE"]);?> head_<?=strToLower($TEMPLATE_OPTIONS["HEAD"]["CURRENT_VALUE"]);?> banner_<?=strToLower($TEMPLATE_OPTIONS["BANNER_WIDTH"]["CURRENT_VALUE"]);?>">
			<div class="header_wrap <?=strtolower($TEMPLATE_OPTIONS["HEAD_COLOR"]["CURRENT_VALUE"])?>">
				<div class="top-h-row">
					<div class="wrapper_inner">
						<div class="content_menu">
							<?$APPLICATION->IncludeComponent("bitrix:menu", "top_content_row", array(
								"ROOT_MENU_TYPE" => $TEMPLATE_OPTIONS["HEAD"]["CURRENT_MENU"],
								"MENU_CACHE_TYPE" => "Y",
								"MENU_CACHE_TIME" => "86400",
								"MENU_CACHE_USE_GROUPS" => "N",
								"MENU_CACHE_GET_VARS" => array(),
								"MAX_LEVEL" => "1",
								"CHILD_MENU_TYPE" => "left",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
								),false
							);?>
						</div>
						<div class="phones">
							<span class="phone_wrap">
								<span class="icons"></span>
								<span class="phone_text">
									<?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("PHONE")));?>
								</span>
							</span>
							<span class="order_wrap_btn">
								<?if( \Bitrix\Main\Config\Option::get("aspro.mshop", "SHOW_CALLBACK", "Y") != "N"):?>
							<span class="callback_btn"><?=GetMessage("CALLBACK")?></span>
							<?endif;?>
							</span>
						</div>
						<div class="h-user-block" id="personal_block">
							<div class="form_mobile_block"><div class="search_middle_block"><?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/search.title.catalog3.php');?></div></div>
							<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "top", array(
								"REGISTER_URL" => SITE_DIR."auth/registration/",
								"FORGOT_PASSWORD_URL" => SITE_DIR."auth/forgot-password/",
								"PROFILE_URL" => SITE_DIR."personal/",
								"SHOW_ERRORS" => "Y"
								)
							);?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<header id="header">
					<div class="wrapper_inner">	
						<table class="middle-h-row"><tr>
							<td class="logo_wrapp">
								<div class="logo">
									<?//CMShop::ShowLogo();?>
                                    <a href="/"><img src="/upload/aspro.mshop/a65/logo_color.png" alt='Интернет-магазин "БЛАГОПАР"' title='Интернет-магазин "БЛАГОПАР"'></a>
                                    <a href="/" class="print_img"><img src="/upload/aspro.mshop/a65/logo_color.png" alt='Интернет-магазин "БЛАГОПАР"' title='Интернет-магазин "БЛАГОПАР"'></a>
								</div>
							</td>
							<td  class="center_block">
								<div class="main-nav">
									<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/menu.top_general_multilevel.php');?>
								</div>
								
								<div class="middle_phone">
									<div class="phones">
										<span class="phone_wrap">
											<span class="icons"></span>
											<span class="phone_text">
												<?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("PHONE")));?>
											</span>
										</span>
										<span class="order_wrap_btn">
											<?if( \Bitrix\Main\Config\Option::get("aspro.mshop", "SHOW_CALLBACK", "Y") != "N"):?>
							<span class="callback_btn"><?=GetMessage("CALLBACK")?></span>
							<?endif;?>
										</span>
									</div>
								</div>
								<div class="search">
									<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/search.title.catalog.php');?>
								</div>
							</td>
							<td class="basket_wrapp custom_basket_class <?=CMShop::getCurrentPageClass()?>">
								<div class="wrapp_all_icons">
										<div class="header-compare-block icon_block iblock" id="compare_line">
											<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/catalog.compare.list.compare_top.php');?>
										</div>
										<div class="header-cart" id="basket_line">
											<?Bitrix\Main\Page\Frame::getInstance()->startDynamicWithID("header-cart");?>
											<?//CSaleBasket::UpdateBasketPrices(CSaleBasket::GetBasketUserID(), SITE_ID);?>
											<?if($TEMPLATE_OPTIONS["BASKET"]["CURRENT_VALUE"] === "FLY" && !$isBasketPage && !CSite::InDir(SITE_DIR."order/")):?>
												<script type="text/javascript">
												$(document).ready(function(){
													$.ajax({
														url: arMShopOptions["SITE_DIR"] + "ajax/basket_fly.php",
														type: "post",
														success: function(html){
															$("#basket_line").append(html);
														}
													});
												});
												</script>
											<?else:?>
												<?$APPLICATION->IncludeFile(SITE_DIR."include/basket_top.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("BASKET_TOP")));?>
											<?endif;?>
											<?Bitrix\Main\Page\Frame::getInstance()->finishDynamicWithID("header-cart", "");?>
										</div>
									</div>
									<div class="clearfix"></div>
							</td>
						</tr></table>
					</div>
					<div class="catalog_menu">
						<div class="wrapper_inner">
							<div class="wrapper_middle_menu">
								<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/menu.top_catalog_multilevel.php');?>
							</div>
						</div>
					</div>
				</header>
			</div>
			<?if(!$isFrontPage):?>
				<div class="wrapper_inner">				
					<section class="middle">
						<div class="container">
							<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"mshop", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"SHOW_SUBSECTIONS" => "N",
		"COMPONENT_TEMPLATE" => "mshop",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
							<?$APPLICATION->ShowViewContent('section_bnr_content');?>
			<!--title_content-->
			<h1 id="pagetitle"><?=$APPLICATION->ShowTitle(false);?></h1>
			<!--end-title_content-->
				<?if($isContactsPage):?>
						</div>
					</section>
				</div>
				<?else:?>
							<div id="content">
							<?if(CSite::InDir(SITE_DIR.'help/') || CSite::InDir(SITE_DIR.'company/') || CSite::InDir(SITE_DIR.'info/')):?>
								<div class="left_block">
									<?$APPLICATION->IncludeComponent("bitrix:menu", "left_menu", array(
										"ROOT_MENU_TYPE" => "left",
										"MENU_CACHE_TYPE" => "A",
										"MENU_CACHE_TIME" => "3600000",
										"MENU_CACHE_USE_GROUPS" => "N",
										"MENU_CACHE_GET_VARS" => "",
										"MAX_LEVEL" => "1",
										"CHILD_MENU_TYPE" => "left",
										"USE_EXT" => "Y",
										"DELAY" => "N",
										"ALLOW_MULTI_SELECT" => "N" ),
										false, array( "ACTIVE_COMPONENT" => "Y" )
									);?>
								</div>
								<div class="right_block">
							<?endif;?>
				<?endif;?>
			<?endif;?>
								<?if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest") $APPLICATION->RestartBuffer();?>