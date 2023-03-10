<?php

require_once __DIR__ . '/include/autoload.php';
require_once __DIR__ . '/include/settings.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/constants.php';

AddEventHandler('iblock', 'OnAfterIBlockElementAdd', ['\Blagopar\Events\Iblock', 'onAfterIBlockElementAddHandler']);

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler('sale', 'OnSaleOrderSaved', ['\Blagopar\Events\Sale', 'rsOnAddOrder']);

AddEventHandler('sale', 'OnOrderNewSendEmail', 'modifyNewOrderEmailFields');
