<?php

namespace Blagopar\Events;

use Blagopar\LandingPageElementService;

class Iblock
{
    public function onAfterIBlockElementAddHandler(&$arFields)
    {

        // Новости могут изменять только авторы или админы
        if ($arFields['IBLOCK_ID'] == IBLOCK_ID_WORKS) {
            //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/log.txt', print_r($arFields, true), FILE_APPEND);
            $landingPageElementService = new LandingPageElementService();
            $landingPageElementService->processAddingWork($arFields);
        }
    }
}