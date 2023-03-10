<?php

function custom_mail($to,$subject,$body,$headers) {
    $f=fopen($_SERVER["DOCUMENT_ROOT"]."/maillog.txt", "a+");
    fwrite($f, print_r(array('TO' => $to, 'SUBJECT' => $subject, 'BODY' => $body, 'HEADERS' => $headers),1)."\n========\n");
    fclose($f);
    return mail($to,$subject,$body,$headers);
}

define("yandex_counter", '44197829');

\Bitrix\Main\Loader::includeModule('sale');

use Bitrix\Sale\Order;

//roistat start
use Bitrix\Main\Event;
use Bitrix\Sale;
use Bitrix\Sale\Delivery\Services\Manager;

function rsOnAddOrder(Event $event) {
    if(!$event->getParameter('IS_NEW')) return;
    /** @var Sale\Order $order */
    $order              = $event->getParameter('ENTITY');
    $basket             = $order->getBasket();
    $propertyCollection = $order->getPropertyCollection();

    $products = array();
    $items  = $basket->getBasketItems();
    foreach ($items as $item) {
        $products[] = array(
            'id' => $item->getId(),
            'name'  => $item->getField('NAME'),
            'price' => $item->getPrice(),
            'count' => $item->getQuantity(),
        );
    }
    $list = null;
    foreach($basket->getListOfFormatText() as $item) {
        $list .= $item."\n ";
    }

    $price       = $order->getPrice();
    $discount    = $order->getDiscountPrice();
    $description = $order->getField('USER_DESCRIPTION');
    $userName  = null;
    $phone     = null;
    $email     = null;
    $address   = null;
    $location  = null;
    $inn  = null;
    $kpp = null;
    $company = null;
    $company_adr = null;
    $fax = null;
    $test =$order->getFieldValues();

    foreach ($propertyCollection as $property) {
        $code = $property->getField('CODE');
        $value = $property->getValue();
        $test[$code] = $value;
        // Если в заказе есть какие либо доп. поля, их нужно указать тут.
        switch ($code) {
            case 'PHONE':
                $phone = $value;
                break;
            case 'EMAIL':
                $email = $value;
                break;
            case 'FIO':
                $userName = $value;
                break;
            case 'CONTACT_PERSON':
                $userName = $value;
                break;
            case 'LOCATION':
                $location = CSaleLocation::GetByID(CSaleLocation::getLocationIDbyCODE($value));
                break;
            case 'ADDRESS':
                $address = $value;
            case 'STREET':
                $STREET = $value;
                break;
            case 'BILD':
                $BILD = $value;
                break;
            case 'HOUSING':
                $HOUSING = $value;
                break;
            case 'APPARTMENT':
                $APPARTMENT = $value;
                break;
            case 'INN':
                $inn = $value;
                break;
            case 'KPP':
                $kpp = $value;
                break;
            case 'COMPANY':
                $company = $value;
                break;
            case 'COMPANY_ADR':
                $company_adr = $value;
                break;
            case 'FAX':
                $fax = $value;
                break;
        }
    }
    if($STREET){
        $address ='Улица: '.$STREET.";\n Дом: ".$BILD.";\n Корпус: ".$HOUSING.";\n Квартира: ".$APPARTMENT;
    }


    $paymentCollection = $order->getPaymentCollection();
    $paymentName = $paymentCollection['0']->getPaymentSystemName();
    $deliverySystemId = $order->getDeliverySystemId();
    $managerById = Manager::getById($deliverySystemId['0']);
    $deliveryName = $managerById['NAME'];
    $form_name = "Корзина";

    // Следующим образом можно быстро определить не в 1 клик ли заказ
    if (array_key_exists('ONE_CLICK_BUY', $_REQUEST) !== false) {
        $form_name = "В 1 клик";
        $userName = iconv('UTF-8', SITE_CHARSET, $_REQUEST['ONE_CLICK_BUY']['FIO']);
        $phone = $_REQUEST['ONE_CLICK_BUY']['PHONE'];
        $description = $_REQUEST['ONE_CLICK_BUY']['COMMENT'];
        // $email = $_REQUEST['ONE_CLICK_BUY']['EMAIL'];
    }

    $comment = "{$description} \n ";

    $comment .= "\n\n  Список товаров:\n ".
        "{$list}\n\n".
        "Способ доставки: {$deliveryName}\n ".
        "Способ оплаты: {$paymentName}\n ";

    if ($order->getDeliveryPrice() > 0) {
        $comment .= 'Доставка - '.number_format($order->getDeliveryPrice(),0,'',' ')." руб\n ";
    }

    if ($discount > 0) {
        $comment .= 'Скидка - '.number_format($discount,0,'',' ')." руб\n ";
    }
    $comment .= "Итого - {$price} руб ";

    $roistatData = array(
        'roistat' => isset($_COOKIE['roistat_visit']) ? $_COOKIE['roistat_visit'] : null,
        'key' => 'MjVlZTU3MzI3Nzk0NjllZjEwYTI0NzQ5N2JlZDFiNjk6MTU5MTA0',
        'comment' => $description, //Комментарий к заказу
        'title' => "Заказ № " . $order->getId(),
        'name'    => $userName,
        'email'   => $email,
        'phone'   => $phone,
        //'is_skip_sending'   => 1,
        'fields' => array(
            "UF_CRM_1589230770" =>  $location["COUNTRY_NAME"]." - ".$location["REGION_NAME"]." - ".$location["CITY_NAME"],  //местоположение
            "UF_CRM_1589230776" => $company, //Название компании
            "UF_CRM_1589230783" => $company_adr, //Юридический адрес
            "UF_CRM_1589230789" => $inn, //ИНН
            "UF_CRM_1589230794" => $kpp, //КПП
            "UF_CRM_1589230799" => $fax, //Факс
            "UF_CRM_1589230806" => $address, //Адрес доставки
            "UF_CRM_1589230849" => $comment, //Заказ клиента
            "SOURCE_ID" => 'Интернет-заказ', //Источник - Интернет-заказ
            "OPPORTUNITY" => $price,
            // "test" => $test, //Заказ клиента
        ),
    );
    file_get_contents("https://cloud.roistat.com/api/proxy/1.0/leads/add?" . http_build_query($roistatData));
}

//roistat end

function modifyNewOrderEmailFields($orderID, &$eventName, &$arFields)
{
    \Bitrix\Main\Diag\Debug::writeToFile(123, 'modifyNewOrderEmailFields', "/local/test/modifyNewOrderEmailFields_logs.log");
    $order = Order::load($orderID);
    $properties = $order->getPropertyCollection();
    \Bitrix\Main\Diag\Debug::writeToFile(123, '123', "/local/test/modifyNewOrderEmailFields_logs.log");
    \Bitrix\Main\Diag\Debug::writeToFile($orderID, '$orderID', "/local/test/modifyNewOrderEmailFields_logs.log");
    \Bitrix\Main\Diag\Debug::writeToFile($eventName, '$eventName', "/local/test/modifyNewOrderEmailFields_logs.log");
    // Детали заказа
    $arFields['ORDER_DETAIL_TABLE'] = '<table style="background: #FFFFFF; border-collapse: collapse; width: 100%;">';

    $template = '
        <tr>
            <td style="border: 1px solid #D8D8E2; padding: 10px; width: 180px;">%s</td>
            <td style="border: 1px solid #D8D8E2; padding: 10px;">%s</td>
        </tr>
    ';

    $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Номер заказа:', '№' . $orderID);

    $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Дата заказа:', $order->getDateInsert()->format('d.m.Y'));

    // ФИО, Телефон, E-mail
    $fields = [
        'IS_PROFILE_NAME' => 'ФИО:',
        'IS_PHONE' => 'Телефон:',
        'IS_EMAIL' => 'E-mail:',
    ];

    foreach ($fields as $field => $title) {
        if (is_null($value = $properties->getAttribute($field))) {
            continue;
        }

        if (($value = trim($value->getField('VALUE'))) === '') {
            continue;
        }

        $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, $title, $value);
    }

    // Адрес
    $fields = [
        'STREET' => 'ул.',
        'BILD' => 'д.',
        'HOUSING' => 'кор.',
        'APPARTMENT' => 'кв.',
    ];

    $address = [];

    foreach ($fields as $code => $prefix) {
        if (is_null($value = $properties->getItemByOrderPropertyCode($code))) {
            continue;
        }

        if (($value = trim($value->getField('VALUE'))) === '') {
            continue;
        }

        $address[] = $prefix . ' ' . $value;
    }

    $address = implode(', ', $address);

    if ($address !== '') {
        $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Адрес:', $address);
    }

    // Способ доставки
    $value = '';

    foreach ($order->getShipmentCollection() as $shipment) {
        if (!$shipment->isSystem()) {
            $value = trim($shipment->getField('DELIVERY_NAME'));
            break;
        }
    }

    if ($value !== '') {
        $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Способ доставки:', $value);
    }

    // Способ оплаты
    $value = '';

    foreach ($order->getPaymentCollection() as $paySystem) {
        $value = trim($paySystem->getField('PAY_SYSTEM_NAME'));
        break;
    }

    if ($value !== '') {
        $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Способ оплаты:', $value);
    }

    // Комментарий к заказу
    if (($value = trim($order->getField('USER_DESCRIPTION'))) !== '') {
        $arFields['ORDER_DETAIL_TABLE'] .= sprintf($template, 'Комментарий к заказу:', $value);
    }

    $arFields['ORDER_DETAIL_TABLE'] .= '</table>';

    // Товары в заказе
    $arFields['ORDER_PRODUCTS_TABLE'] = '
        <table style="background: #FFFFFF; border-collapse: collapse; width: 100%;">
            <tr>
                <th style="border: 1px solid #D8D8E2; padding: 10px; font-weight: normal; text-align: left;">Товар</th>
                <th style="border: 1px solid #D8D8E2; padding: 10px; font-weight: normal; text-align: left; width: 80px;">Цена</th>
                <th style="border: 1px solid #D8D8E2; padding: 10px; font-weight: normal; text-align: left; width: 80px;">Кол-во</th>
                <th style="border: 1px solid #D8D8E2; padding: 10px; font-weight: normal; text-align: left; width: 80px;">Итого</th>
            </tr>
    ';

    foreach ($order->getBasket()->toArray() as $item) {
        $product = CIBlockElement::GetByID($item['PRODUCT_ID'])->Fetch();

        $photo = '/local/templates/aspro_mshop/images/no_photo_medium.png';

        if ($product['PREVIEW_PICTURE']) {
            $photo = CFile::GetPath($product['PREVIEW_PICTURE']);
        } else if ($product['DETAIL_PICTURE']) {
            $photo = CFile::GetPath($product['DETAIL_PICTURE']);
        }
        \Bitrix\Main\Diag\Debug::writeToFile($arFields, '$arFields', "/local/test/modifyNewOrderEmailFields_logs.log");


        $arFields['ORDER_PRODUCTS_TABLE'] .= '
            <tr>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr>
                            <td style="padding: 0; width: 60px;">
                                <img style="width: 60px;" src="' . $photo . '" alt="Фото товара">
                            </td>
                            <td style="padding: 0 15px 0;">' . $item['NAME'] . '</td>
                        </tr>
                    </table>
                </td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . CurrencyFormat($item['PRICE'], 'RUB') . '</td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . (float)$item['QUANTITY'] . '</td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . CurrencyFormat($item['PRICE'] * $item['QUANTITY'], 'RUB') . '</td>
            </tr>
        ';
    }

    $arFields['ORDER_PRODUCTS_TABLE'] .= '
            <tr>
                <td style="border: 1px solid #D8D8E2; padding: 10px; text-align: right;" colspan="3">Сумма:</td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . CurrencyFormat($order->getField('PRICE'), 'RUB') . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid #D8D8E2; padding: 10px; text-align: right;" colspan="3">Стоимость доставки:</td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . CurrencyFormat($order->getField('PRICE_DELIVERY'), 'RUB') . '</td>
            </tr>
            <tr>
                <td style="border: 1px solid #D8D8E2; padding: 10px; text-align: right;" colspan="3">Итого:</td>
                <td style="border: 1px solid #D8D8E2; padding: 10px;">' . CurrencyFormat($order->getField('PRICE') + $order->getField('PRICE_DELIVERY'), 'RUB') . '</td>
            </tr>
        </table>
    ';
    \Bitrix\Main\Diag\Debug::writeToFile($arFields['ORDER_DETAIL_TABLE'], '$arFields[ORDER_DETAIL_TABLE]', "/local/test/modifyNewOrderEmailFields_logs.log");
    \Bitrix\Main\Diag\Debug::writeToFile($arFields['ORDER_PRODUCTS_TABLE'], '$arFields[ORDER_PRODUCTS_TABLE]', "/local/test/modifyNewOrderEmailFields_logs.log");
}

if (file_exists($_SERVER["DOCUMENT_ROOT"]."/php_interface/include/functions.php"))
    require_once($_SERVER["DOCUMENT_ROOT"]."/php_interface/include/functions.php");
