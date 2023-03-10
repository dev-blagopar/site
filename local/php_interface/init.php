<?php

require_once __DIR__ . '/include/autoload.php';
require_once __DIR__ . '/include/settings.php';

include 'events.php';

AddEventHandler('iblock', 'OnAfterIBlockElementAdd', ['\Blagopar\Events\Iblock', 'onAfterIBlockElementAddHandler']);

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('sale', 'OnSaleOrderSaved', 'rsOnAddOrder');

AddEventHandler('sale', 'OnOrderNewSendEmail', 'modifyNewOrderEmailFields');
