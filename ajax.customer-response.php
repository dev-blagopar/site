<?
// подключаем пролог, для использования Bitrix API без подключения шаблона
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

// поключаем модуль инфоблоков
CModule::IncludeModule('iblock');

$arResult = array('status' => false); // переменная для результата
$err = 0; // счётчик ошибок
$PROP = array(); // данные для полей элемента инфоблока

// если передан ID элемента, то заявка отправлена со страницы карточки товара
if (isset($_POST['item_id']) && $_POST['item_id'] > 0){
    $PROP['ITEM_ID'] = (int)$_POST['item_id'];
}




// указываем тему отклика, в зависимости от передаваемого типа
if (isset($_POST['action']) && $_POST['action'] == 'call'){
    $TITLE = 'Новая заявка звонка с сайта: '.$PROP['PERSON_NAME'].' от '.date("d.m.Y H:i:s");
} else {
    $TITLE = 'Новая заявка: '.$PROP['PERSON_NAME'].' от '.date("d.m.Y H:i:s");
}

// номер телефона
if (isset($_POST['phone']) && !empty($_POST['phone'])){
    $PROP['PHONE'] = htmlspecialchars( $_POST['phone'], ENT_QUOTES );
} else {
    $err++;
    $arResult['msg'][] = array(
        'text' =>'Вы не указали номер телефона.',
        'type' => false
    );
}



// страница, с которой был отправлен запрос
$PROP['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];

if ($err == 0){

    $el = new CIBlockElement;
    // массив полей для нового элемента
    $arElem = Array(
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"      => 57,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           => $TITLE,
        "ACTIVE"         => "Y",
        "PREVIEW_TEXT"   => $PREVIEW_TEXT
    );


    if ($PRODUCT_ID = $el->Add($arElem)){
        // устанавливаем статус
        $arResult['status'] = true;
        $arResult['msg'][] = array(
            'text' =>'<span style="color: green">Ваши данные отправлены успешно!</span><br>Ожидайте звонка наших операторов.',
            'type' => true
        );

        // подготавливаем поля для почтового события
        $arEventFields = array(
            'PERSON_PHONE' => $PROP['PHONE'],

            'RESPONSE_THEME' => $TITLE
        );
        // отправка почты
        CEvent::Send("NEW_USER_MAIN", "s1", $arEventFields);

    } else {

        $arResult['msg'][] = array(
            'text' =>'Не удалось сохранить запись. ' . $el->LAST_ERROR,
            'type' => false
        );
    }

}

echo json_encode($arResult);