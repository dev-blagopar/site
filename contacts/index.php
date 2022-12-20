<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");

global $arRegion;
$GLOBALS['arFilterNews']['PROPERTY_LINK_REGION'] = $arRegion['ID'];

?>
<?CMax::ShowPageType('page_contacts');?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>