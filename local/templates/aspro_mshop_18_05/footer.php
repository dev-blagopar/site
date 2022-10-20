							<?if(isset($_SERVER["HTTP_X_REQUESTED_WITH"]) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == "xmlhttprequest") die();?>
							<?IncludeTemplateLangFile(__FILE__);?>
							<?if(CSite::InDir(SITE_DIR.'help/') || CSite::InDir(SITE_DIR.'company/') || CSite::InDir(SITE_DIR.'info/')):?>
								</div>
							<?endif;?>
			<?if(!$isFrontPage && !$isContactsPage):?>
							</div>
						</div>
					</section>
				</div>
			<?endif;?>
		</div><?// <div class="wrapper">?>
		<footer id="footer" <?=($isFrontPage ? 'class="main"' : '')?>>
			<div class="footer_inner">
				<div class="wrapper_inner">
					<div class="footer_top">
						<div class="wrap_md">
							<div class="iblock sblock">
								<?$APPLICATION->IncludeComponent("bitrix:subscribe.form", "mshop", array(
	"AJAX_MODE" => "N",
		"SHOW_HIDDEN" => "N",
		"ALLOW_ANONYMOUS" => "Y",
		"SHOW_AUTH_LINKS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "86400",
		"CACHE_NOTES" => "", 
		"SET_TITLE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"LK" => "Y",
		"COMPONENT_TEMPLATE" => "mshop",
		"USE_PERSONALIZATION" => "Y",
		"PAGE" => SITE_DIR."personal/subscribe/",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
							</div>
							<div class="iblock phones">
								<div class="wrap_md">
									<div class="empty_block iblock"></div>
									<div class="phone_block iblock">
										<div class="phone_wrap">
											<span class="icons"></span>
											<div style="    display: inline-block;margin-top: 23px;"><?$APPLICATION->IncludeFile(SITE_DIR."include/phone1.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("PHONE")));?></div>
										</div>
										<span class="order_wrap_btn">
											<span class="callback_btn"><?=GetMessage('CALLBACK')?></span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer_bottom">
						<div class="wrap_md">
							<div class="iblock menu_block">
								<div class="wrap_md">
									<div class="iblock copy_block">
										<div class="copyright">
											<?$APPLICATION->IncludeFile(SITE_DIR."include/copyright.php", Array(), Array("MODE" => "html", "NAME"  => GetMessage("COPYRIGHT")));?>
										</div>
										<span class="pay_system_icons">
											<?$APPLICATION->IncludeFile(SITE_DIR."include/pay_system_icons.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("PHONE")));?>
										</span>
									</div>
									<div class="iblock all_menu_block">
										<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_submenu_top", array(
											"ROOT_MENU_TYPE" => "bottom",
											"MENU_CACHE_TYPE" => "Y",
											"MENU_CACHE_TIME" => "86400",
											"MENU_CACHE_USE_GROUPS" => "N",
											"MENU_CACHE_GET_VARS" => array(),
											"MAX_LEVEL" => "1",
											"USE_EXT" => "N",
											"DELAY" => "N",
											"ALLOW_MULTI_SELECT" => "N"
											),false
										);?>
										<div class="wrap_md">
											<div class="iblock submenu_block">
												<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_submenu", array(
													"ROOT_MENU_TYPE" => "bottom_company",
													"MENU_CACHE_TYPE" => "Y",
													"MENU_CACHE_TIME" => "86400",
													"MENU_CACHE_USE_GROUPS" => "N",
													"MENU_CACHE_GET_VARS" => array(),
													"MAX_LEVEL" => "1",
													"USE_EXT" => "N",
													"DELAY" => "N",
													"ALLOW_MULTI_SELECT" => "N"
													),false
												);?>
											</div>
											<div class="iblock submenu_block">
												<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_submenu", array(
													"ROOT_MENU_TYPE" => "bottom_info",
													"MENU_CACHE_TYPE" => "Y",
													"MENU_CACHE_TIME" => "86400",
													"MENU_CACHE_USE_GROUPS" => "N",
													"MENU_CACHE_GET_VARS" => array(),
													"MAX_LEVEL" => "1",
													"USE_EXT" => "N",
													"DELAY" => "N",
													"ALLOW_MULTI_SELECT" => "N"
													),false
												);?>
											</div>
											<div class="iblock submenu_block">
												<?$APPLICATION->IncludeComponent("bitrix:menu", "bottom_submenu", array(
													"ROOT_MENU_TYPE" => "bottom_help",
													"MENU_CACHE_TYPE" => "Y",
													"MENU_CACHE_TIME" => "86400",
													"MENU_CACHE_USE_GROUPS" => "N",
													"MENU_CACHE_GET_VARS" => array(),
													"MAX_LEVEL" => "1",
													"USE_EXT" => "N",
													"DELAY" => "N",
													"ALLOW_MULTI_SELECT" => "N"
													),false
												);?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="iblock social_block">
								<div class="wrap_md">
									<div class="empty_block iblock"></div>
									<div class="social_wrapper iblock">
										<div class="social">
											<?include($_SERVER['DOCUMENT_ROOT'].SITE_DIR.'include/social.info.mshop.default.php');?>
										</div>
									</div>
								</div>
								<div id="bx-composite-banner"></div>
							</div>
						</div>
					</div>
					<?$APPLICATION->IncludeFile(SITE_DIR."include/bottom_include1.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("ARBITRARY_1"))); ?>
					<?$APPLICATION->IncludeFile(SITE_DIR."include/bottom_include2.php", Array(), Array("MODE" => "text", "NAME" => GetMessage("ARBITRARY_2"))); ?>
				</div>
			</div>
		</footer>
		<?
		if(!CSite::inDir(SITE_DIR."index.php")){
			if(strlen($APPLICATION->GetPageProperty('title')) > 1){
				$title = $APPLICATION->GetPageProperty('title');
			}
			else{
				$title = $APPLICATION->GetTitle();
			}
			$APPLICATION->SetPageProperty("title", $title.(COption::GetOptionString('aspro.mshop', 'HIDE_SITE_NAME_IN_TITLE', '', SITE_ID) == 'Y' ? '' : ' - '.$arSite['SITE_NAME']) );
		}
		else{
			if(strlen($APPLICATION->GetPageProperty('title')) > 1){
				$title =  $APPLICATION->GetPageProperty('title');
			}
			else{
				$title =  $APPLICATION->GetTitle();
			}
			if(!empty($title)){
				$APPLICATION->SetPageProperty("title", $title);
			}
			else{
				$APPLICATION->SetPageProperty("title", $arSite['SITE_NAME']);
			}
		}
		?>
		<div id="content_new"></div>
			<?CMShop::footerAction();?>



<script>
    window.roistatVisitCallback = function (visitId) {
        (function(w,d,u){
            var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
            var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://bitrix.blagopar.ru/upload/crm/site_button/loader_3_4gew26.js');
        window.Bitrix24WidgetObject = window.Bitrix24WidgetObject || {};
        window.Bitrix24WidgetObject.handlers = {
            'form-init': function (form) {
                form.presets = {
                    'roistatID': visitId
                };
            }
        };
    }
</script>

<script>
    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '55707c8dba3c3539b6886d7df7c51ed0');
</script>

<!-- BEGIN WHATSAPP INTEGRATION WITH ROISTAT -->
<script type="bogus" class="js-whatsapp-message-container">Обязательно отправьте это сообщение, и дождитесь ответа. Ваш номер:  {roistat_visit}</script>
<script>
    (function() {
        if (window.roistat !== undefined) {
            handler();
        } else {
            var pastCallback = typeof window.onRoistatAllModulesLoaded === "function" ? window.onRoistatAllModulesLoaded : null;
            window.onRoistatAllModulesLoaded = function () {
                if (pastCallback !== null) {
                    pastCallback();
                }
                handler();
            };
        }

        function handler() {
            function init() {
                appendMessageToLinks();

                var delays = [1000, 5000, 15000];
                setTimeout(function func(i) {
                    if (i === undefined) {
                        i = 0;
                    }
                    appendMessageToLinks();
                    i++;
                    if (typeof delays[i] !== 'undefined') {
                        setTimeout(func, delays[i], i);
                    }
                }, delays[0]);
            }

            function replaceQueryParam(url, param, value) {
                var explodedUrl = url.split('?');
                var baseUrl = explodedUrl[0] || '';
                var query = '?' + (explodedUrl[1] || '');
                var regex = new RegExp("([?;&])" + param + "[^&;]*[;&]?");
                var queryWithoutParameter = query.replace(regex, "$1").replace(/&$/, '');
                return baseUrl + (queryWithoutParameter.length > 2 ? queryWithoutParameter  + '&' : '?') + (value ? param + "=" + value : '');
            }

            function appendMessageToLinks() {
                var message = document.querySelector('.js-whatsapp-message-container').text;
                var text = message.replace(/{roistat_visit}/g, window.roistatGetCookie('roistat_visit'));
                var linkElements = document.querySelectorAll('[href*="//wa.me"], [href*="//api.whatsapp.com/send"], [href*="//web.whatsapp.com/send"], [href^="whatsapp://send"]');
                for (var elementKey in linkElements) {
                    if (linkElements.hasOwnProperty(elementKey)) {
                        var element = linkElements[elementKey];
                        element.href = replaceQueryParam(element.href, 'text', text);
                    }
                }
            }
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
        };
    })();
</script>
<!-- END WHATSAPP INTEGRATION WITH ROISTAT -->

<!-- BEGIN VIBER INTEGRATION WITH ROISTAT -->
<script type="bogus" class="js-viber-message-container">Обязательно отправьте это сообщение, и дождитесь ответа. Ваш номер: {roistat_visit}</script>
<script>
    (function(w, d, s, h) {
        var p = d.location.protocol.toLowerCase() === "https:" ? "https://" : "http://";
        var u = "/static/marketplace/Viber/script.js";
        var js = d.createElement(s); js.async = true; js.src = p+h+u;
        var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END VIBER INTEGRATION WITH ROISTAT -->

<!-- BEGIN BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->
<script>
    (function(w, d, s, h) {
        w.roistatLanguage = '';
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = "/static/marketplace/Bitrix24Widget/script.js";
        var js = d.createElement(s); js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com');
</script>
<!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->


<![if IE]>
<script src='https://livechat.chat2desk.com/packs/ie11-supporting-7c7048f2020b6d05293e.js'></script>
<![endif]>
<script id='chat-24-widget-code' type="text/javascript">
  !function (e) {
    var t = {};
    function n(c) { if (t[c]) return t[c].exports; var o = t[c] = {i: c, l: !1, exports: {}}; return e[c].call(o.exports, o, o.exports, n), o.l = !0, o.exports }
    n.m = e, n.c = t, n.d = function (e, t, c) { n.o(e, t) || Object.defineProperty(e, t, {configurable: !1, enumerable: !0, get: c}) }, n.n = function (e) {
      var t = e && e.__esModule ? function () { return e.default } : function () { return e  };
      return n.d(t, "a", t), t
    }, n.o = function (e, t) { return Object.prototype.hasOwnProperty.call(e, t) }, n.p = "/packs/", n(n.s = 0)
  }([function (e, t) {
    window.chat24WidgetCanRun = 1, window.chat24WidgetCanRun && function () {
      window.chat24ID = "fe7d92d0d3b2a8cf218e36f4d93b259c", window.chat24io_lang = "ru";
      var e = "https://livechat.chat2desk.com", t = document.createElement("script");
      t.type = "text/javascript", t.async = !0, fetch(e + "/packs/manifest.json?nocache=" + (new Date()).getTime()).then(function (e) {
        return e.json()
      }).then(function (n) {
        t.src = e + n["widget.js"];
        var c = document.getElementsByTagName("script")[0];
        c ? c.parentNode.insertBefore(t, c) : document.documentElement.firstChild.appendChild(t);
        var o = document.createElement("link");
        o.href = e + n["widget.css"], o.rel = "stylesheet", o.id = "chat-24-io-stylesheet", o.type = "text/css", document.getElementById("chat-24-io-stylesheet") || document.getElementsByTagName("head")[0].appendChild(o)
      })
    }()
  }]);
</script>

<script src="https://regmarkets.ru/js/r17.js"; async type="text/javascript"></script>

</body>
</html>