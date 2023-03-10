<?php

namespace Blagopar\Events;

use Blagopar\LandingPageElementService;

class Iblock
{
    public function onAfterIBlockElementAddHandler(&$arFields)
    {
        // Новости могут изменять только авторы или админы
        if ($arFields['IBLOCK_ID'] == IBLOCK_ID_WORKS) {
            $landingPageElementService = new LandingPageElementService();
            $landingPageElementService->processAddingWork($arFields);
        }
    }
}