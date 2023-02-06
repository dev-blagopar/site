<?php

namespace Blagopar\Events;

use Blagopar\LandingPageElementService;

class Iblock
{
    public function onAfterIBlockElementAddHandler(&$arFields)
    {
<<<<<<< HEAD
        // Новости могут изменять только авторы или админы
        if ($arFields['IBLOCK_ID'] == IBLOCK_ID_WORKS) {
            //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/log.txt', print_r($arFields, true), FILE_APPEND);
=======
        if ($arFields['IBLOCK_ID'] == IBLOCK_ID_WORKS) {
>>>>>>> 93091eb91e6fd2500df967a13852773128dabbe3
            $landingPageElementService = new LandingPageElementService();
            $landingPageElementService->processAddingWork($arFields);
        }
    }
}
