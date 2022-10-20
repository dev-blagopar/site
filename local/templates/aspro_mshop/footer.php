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
                            <script src="<?=SITE_TEMPLATE_PATH?>/jquery.inputmask.bundle.js"></script>
                            <div class="form-modal avtivemodal">
                                <div class="form-body">
                                    <div class="md-resp-msg"></div>
                                    <form id="cust-resp-form" class="contact" name="contact" action="#" method="post">
                                        <input type="hidden" name="resp_item_id" id="resp_item_id" value="0">
                                        <div class="group" id="md-resp-phone-group">
                                            <input id="md-resp-phone" name="md-resp-phone" class="form-control tel" type="tel"  required="" >
                                            <span class="bar"></span>
                                            <label>Телефон <span class="input-zv">*</span></label>
                                            <span class="error"></span>
                                        </div>
                                        <button type="button btn" class="md-resp-send button-form btn-submit">Отправить</button>
                                    </form>
                                </div>
                            </div></div><?// <div class="wrapper">?>
		<footer id="footer" <?=($isFrontPage ? 'class="main"' : '')?>>




            <script>


                var formmodal = document.querySelector(".form-modal");
                var a = document.querySelectorAll(".one-click");





                //перебираем все найденные элементы и вешаем на них события
                [].forEach.call( a, function(el) {
                    //вешаем событие
                    el.onclick = function(m) {
                        formmodal.classList.toggle("avtivemodal");
                    }
                });












/*
                document.addEventListener('click', e => {
                    let target = e.target;
                    let its_menu = target == formmodal || formmodal.contains(target);
                    let its_hamburger = target == a;
                    if (!its_menu && !its_hamburger) {
                        formmodal.classList.toggle("avtivemodal");
                    }
                })*/

                $("#md-resp-phone").inputmask({
                    mask: '+7(999)999-99-99',
                    showMaskOnHover: false
                });

                $("#md-resp-phone").keyup(function (e)
                {
                    /* $("#errmsg").html($("#quantity").val());*/
                    var end = $(this).val().slice(-1);
                    var prew = $(this).val().slice(3,4);
                    valnum = $(this).val();
                    valnum = valnum.replace(/[^0-9]/g, '');
                    if(valnum.length == 11){
                        $("#md-resp-phone-group").addClass('hesSuccses');
                    }
                    else {
                        $("#md-resp-phone-group").removeClass('hesSuccses');
                    }
                    console.log(valnum.length);
                    if (end != "_"){

                    }
                });


                $(".md-resp-send").on("click",function(e){

                    e.preventDefault();
                    $(".md-resp-msg").hide();
                    $(".md-resp-msg").html('');

                    var err=0;
                    // phone
                    if ( $("#md-resp-phone").val() == '' ){
                        err++
                        $("#md-resp-phone-group").addClass("hasErrorBrr hasErrorLabel");
                        $("#md-resp-phone").addClass("hasError");
                    } else {
                        $("#md-resp-phone-group").removeClass("hasErrorBrr");
                        $("#md-resp-phone").removeClass("hasError");
                    }
                    var resp_type = '';

                    if ( $("#resp_item_id").val() == 0 ){
                        resp_type = '?action=call';
                    }

                    if (err == 0){
                        $.ajax({
                            type: "POST",
                            url: '<?=SITE_TEMPLATE_PATH?>/ajax/ajax.customer-response.php'+resp_type,
                            data: {
                                'item_id': $("#resp_item_id").val(), // set in catalog.js
                                'phone': $("#md-resp-phone").val(),
                                'proposal': $(".selected_170").text(),
                            },
                            dataType: "json",
                            success: function(data){
                                if (data.status == true){
                                    $("#md-resp-phone").val('');
                                    $("#md-resp-phone-group").removeClass("hasErrorLabel");
                                    $("#md-resp-phone-group").removeClass("hesSuccses");
                                    $("#cust-resp-form").remove();
                                }
                                if (data.msg && data.msg.length > 0){
                                    $(".md-resp-msg").fadeIn();
                                    $.each( data.msg, function( key,field ) {
                                        if (field.type == true){
                                            $(".md-resp-msg").append('<p class="md-true">'+field.text+'</p>');
                                        } else {
                                            $(".md-resp-msg").append('<p class="md-error">'+field.text+'</p>');
                                        }
                                    });
                                }
                            }
                        });
                    }
                    setTimeout(function() {
                        $("#md-resp-phone-group").removeClass("hasErrorBrr");
                    }, 300);
                });



            </script>
			<div class="footer_inner">
				<div class="wrapper_inner">
					<div class="footer_top">
						<div class="wrap_md">
							<div class="iblock sblock">
								<?$APPLICATION->IncludeComponent(
									"bitrix:subscribe.form",
									"mshop",
									array(
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


									),
									false



								);?>
							</div>
							<div class="iblock phones">
								<div class="wrap_md">
									<div class="empty_block iblock"></div>
									<div class="phone_block iblock">
										<span class="phone_wrap">
											<span class="icons"></span>
											<span><?$APPLICATION->IncludeFile(SITE_DIR."include/phone.php", Array(), Array("MODE" => "html", "NAME" => GetMessage("PHONE")));?></span>

										</span>
										<span class="order_wrap_btn">
								<?if( \Bitrix\Main\Config\Option::get("aspro.mshop", "SHOW_CALLBACK", "Y") != "N"):?>
							<span class="callback_btn"><?=GetMessage("CALLBACK")?></span>
							<?endif;?>
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
			$APPLICATION->SetPageProperty("title", $title.(COption::GetOptionString('aspro.mshop', 'HIDE_SITE_NAME_IN_TITLE', '', SITE_ID) == 'Y' ? '' : ' - ' .$arSite['SITE_NAME']) );
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

<?php /*
<script>
    (function(w, d, s, h, id) {
        w.roistatProjectId = id; w.roistatHost = h;
        var p = d.location.protocol == "https:" ? "https://" : "http://";
        var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init";
        var js = d.createElement(s); js.charset="UTF-8"; js.async = 1; js.src = p+h+u; var js2 = d.getElementsByTagName(s)[0]; js2.parentNode.insertBefore(js, js2);
    })(window, document, 'script', 'cloud.roistat.com', '55707c8dba3c3539b6886d7df7c51ed0');
</script> */ ?>
<script>
(function(w, d, s, h, id) {
    w.roistatProjectId = id; w.roistatHost = h;
    var p = d.location.protocol == "https:" ? "https://" : "http://";
    var u = /^.*roistat_visit=[^;]+(.*)?$/.test(d.cookie) ? "/dist/module.js" : "/api/site/1.0/"+id+"/init?referrer="+encodeURIComponent(d.location.href);
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
<script>
    window.addEventListener('onBitrixLiveChat', function(event){
        var widget = event.detail.widget;
        widget.setOption('checkSameDomain', false);
    });
</script>
<!-- END BITRIX24 WIDGET INTEGRATION WITH ROISTAT -->


                            <style>
                                .md-resp-msg{
                                    text-align: center;
                                    width: 100%;
                                }
                                .md-true{
                                    margin-top: 20px;
                                }
                                .form-modal{
                                    position: fixed;
                                    top: 50px;
                                    z-index: 34343;
                                    box-shadow: 0 0 12px rgb(0 0 0 / 12%);
                                    background: #fff;
                                    max-width: 378px;
                                    margin: 10% auto;
                                    padding-top: 40px;
                                    border-radius: 5px;
                                    left: 0;
                                    height: 130px;
                                    right: 0;
                                }
                                .avtivemodal{
                                    display: none;
                                }
                                /*    .one-click{
                                        cursor: pointer;
                                        border-radius: 28px;
                                        padding: 16px 44px;
                                    }*/
                                .group {
                                    position: relative;
                                    margin-bottom: 20px;
                                }
                                .group input{
                                    font-size: 15px;
                                    padding: 10px;
                                    display: block;
                                    width: 100%;
                                    /*    border: none;*/
                                    border: solid 0px #383731;
                                    background: #ff;
                                    color: #000;
                                    border-radius: 5px;
                                    transition: 0.2s ease all;
                                    transition: 0s ease background;
                                    box-shadow: 0 0 1px #787878, 0 0 1px #787878 !important;
                                    -moz-box-shadow: 0 0 1px #787878, 0 0 1px #787878 !important;
                                    -webkit-box-shadow: 0 0 1px #787878, 0 0 1px #787878 !important;
                                }
                                .group input:focus {
                                    outline: none;
                                    border: solid 0px #dfcfb7;
                                    box-shadow: 0 0 3px #dfcfb7 !important;
                                    -moz-box-shadow: 0 0 3px #dfcfb7 !important;
                                    -webkit-box-shadow: 0 0 3px #dfcfb7 !important;
                                }
                                .group label {
                                    color: #383731;
                                    font-size: 15px;
                                    position: absolute;
                                    pointer-events: none;
                                    left: 10px;
                                    top: 10px;
                                    transition: 0.2s ease all;
                                    -moz-transition: 0.2s ease all;
                                    -webkit-transition: 0.2s ease all;
                                }

                                .group input:focus ~ label, .group input:valid ~ label {
                                    top: -28px;
                                    font-size: 15px;
                                    font-weight: bold;
                                    color: #000;
                                }

                                .group.hesSuccses input:focus ~ label{
                                    font-size: 15px;
                                    font-weight: bold;
                                    color: #099500;
                                    transition: color 0s;
                                }

                                .group textarea:focus ~ label, textarea:valid ~ label {
                                    top: -23px;
                                    font-size: 15px;
                                    font-weight: bold;
                                    color: #0168b3;
                                }

                                .group .bar {
                                    position: relative;
                                    display: block;
                                    width: 322px;
                                }

                                .group .bar:before, .bar:after {
                                    content: "";
                                    height: 4px;
                                    width: 0;
                                    bottom: 0;
                                    display: none;
                                    position: absolute;
                                    background: #0168b3;
                                    transition: 0.2s ease all;
                                    -moz-transition: 0.2s ease all;
                                    -webkit-transition: 0.2s ease all;
                                    top: -4px;
                                    border-radius: 0px;
                                }
                                .group .bar:before {
                                    left: 50%;
                                }
                                .group .bar:after {
                                    right: 50%;
                                }


                                .group input:focus ~ .bar:before,
                                .group input:focus ~ .bar:after {
                                    width: 50%;
                                }

                                .group textarea:focus ~ .bar:before,
                                .group textarea:focus ~ .bar:after {
                                    width: 50%;
                                }
                                .group input.hasError{
                                    border: 0px solid #b00;
                                    box-shadow: 0 0 3px #fd6a6a !important;
                                    -moz-box-shadow: 0 0 3px #fd6a6a !important;
                                    -webkit-box-shadow: 0 0 3px #fd6a6a !important;
                                    border-radius: 5px;
                                }
                                .group.hesSuccses input{
                                    border: 0px solid #099500;
                                    border-radius: 5px;
                                    box-shadow: 0 0 3px #099500 !important;
                                    -moz-box-shadow: 0 0 3px #099500 !important;
                                    -webkit-box-shadow: 0 0 3px #099500 !important;
                                }
                                .group.hesSuccses .bar{
                                    display: none;
                                }

                                .form-control{
                                    margin: 0;

                                }

                                .button-form{
                                    width: 322px;
                                    padding: 10px;
                                    color: #fff;
                                    font-size: 15px;
                                    background: #6ab400;
                                    border: none;
                                    border-radius: 0px;
                                    font-family: AvenirNextCyr-Medium;

                                }

                                .button-form:hover{
                                    background: #6ab400;
                                    cursor: pointer;
                                    color: #333;
                                }
                                .form-body{
                                    display: flex;
                                    width: 320px;
                                    margin: 0 auto;
                                    flex-wrap: wrap;
                                }
                                .hasErrorLabel label{
                                    color: #6c0000;
                                }
                                .input-zv{
                                    color: #6c0000;
                                }
                                .group.hesSuccses label{
                                    color: #099500;
                                }
                                .btn_default, .btn_red-full-width {
                                    border-radius: 0;
                                    border-radius: 59px;
                                }
                                @media (max-width:450px){
                                    body .wrapper .top_slider_wrapp .flexslider, body .wrapper .top_slider_wrapp .flexslider .slides>li, body .wrapper .top_slider_wrapp .flexslider .slides>li td {
                                        height: 192px!important;
                                    }
                                    body .top_slider_wrapp .flexslider .slides li td.text .banner_text {
                                        margin: 2px 2px 0;
                                        font-size: 12px;
                                        line-height: 17px;
                                        max-height: 39px;
                                    }

                                }



                            </style>


                            <script src="https://regmarkets.ru/js/r17.js" async type="text/javascript"></script>

                            </body>
</html>