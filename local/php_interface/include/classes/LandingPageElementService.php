<?php

namespace Blagopar;

use Bitrix\Iblock\Elements\ElementWorksTable;
use Bitrix\Iblock\Elements\ElementLandingPagesTable;

class LandingPageElementService
{
    const SHOW_ON_INDEX_PAGE_PROPERTY_VALUE = 51316;

    public function processAddingWork(array $fields): bool
    {
        $landingPage = ElementLandingPagesTable::createObject();
        $landingPage->setName($fields['NAME']);
        $landingPage->setCode($fields['CODE']);
        $landingPage->setLinkReference('/works/' . $fields['CODE'] . '/');
        $landingPage->setPreviewPicture($fields['PREVIEW_PICTURE_ID']);
        $landingPage->setShowOnIndexPage(self::SHOW_ON_INDEX_PAGE_PROPERTY_VALUE);

        $result = $landingPage->save();
        return (bool)$result->getId();
    }
}
