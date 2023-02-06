<?php

require_once __DIR__ . '/include/autoload.php';
require_once __DIR__ . '/include/settings.php';

AddEventHandler('iblock', 'OnAfterIBlockElementAdd', ['\Blagopar\Events\Iblock', 'onAfterIBlockElementAddHandler']);
