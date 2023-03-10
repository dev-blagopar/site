<?php

require_once __DIR__ . '/include/autoload.php';
require_once __DIR__ . '/include/settings.php';

AddEventHandler('iblock', 'OnAfterIBlockElementAdd', ['\Blagopar\Events\Iblock', 'onAfterIBlockElementAddHandler']);

function custom_mail($to,$subject,$body,$headers) {
    $f=fopen($_SERVER["DOCUMENT_ROOT"]."/maillog.txt", "a+");
    fwrite($f, print_r(array('TO' => $to, 'SUBJECT' => $subject, 'BODY' => $body, 'HEADERS' => $headers),1)."\n========\n");
    fclose($f);
    return mail($to,$subject,$body,$headers);
}

AddEventHandler('sale', 'OnOrderNewSendEmail', ['\Blagopar\Events\Iblock', 'modifyNewOrderEmailFields']);


if (file_exists($_SERVER["DOCUMENT_ROOT"]."/php_interface/include/functions.php"))
    require_once($_SERVER["DOCUMENT_ROOT"]."/php_interface/include/functions.php");
