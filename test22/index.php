<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test22");
?>

    <script src="<?=SITE_TEMPLATE_PATH?>/jquery.inputmask.bundle.js"></script>
    <div class="form-modal2 avtivemodal">
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
    </div>

    <span class="one-click btn btn_default btn_red">
                   Заказать звонок
                </span>


    <script>







        var formmodal = document.querySelector(".form-modal2");
        var phonehead = document.querySelector(".one-click");
        var rspitem = document.querySelector("#resp_item_id");
        phonehead.addEventListener('click', function (){
            formmodal.classList.toggle("avtivemodal");
            rspitem.value = document.querySelector(".b-product-card__info-param_selected").textContent;
        })
        document.addEventListener('click', e => {
            let target = e.target;
            let its_menu = target == formmodal || formmodal.contains(target);
            let its_hamburger = target == phonehead;
            if (!its_menu && !its_hamburger) {
                formmodal.classList.add("avtivemodal");
            }
        })

        $("#md-resp-phone").inputmask({
            mask: '+7(999)999-99-99',
            showMaskOnHover: false
        });

        $("#md-resp-phone").keyup(function (e)
        {

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
                    url: '/ajax.customer-response.php'+resp_type,
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

        // var lol2 = document.querySelector(".b-product-card__info-param_selected").textContent;
        //document.querySelector("#resp_item_id").value = lol2;




</script>

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

</style>





<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>