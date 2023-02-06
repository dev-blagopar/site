<<<<<<< HEAD
<?
foreach($arResult['ITEMS'] as $key => $arItem){
	$arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = CMax::FormatNewsUrl($arItem);
    
	if(strlen($arItem['DISPLAY_PROPERTIES']['REDIRECT']['VALUE']))
		unset($arResult['ITEMS'][$key]['DISPLAY_PROPERTIES']['REDIRECT']);
}
=======
<?
foreach($arResult['ITEMS'] as $key => $arItem){
	$arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = CMax::FormatNewsUrl($arItem);
    
	if(strlen($arItem['DISPLAY_PROPERTIES']['REDIRECT']['VALUE']))
		unset($arResult['ITEMS'][$key]['DISPLAY_PROPERTIES']['REDIRECT']);
}
>>>>>>> 93091eb91e6fd2500df967a13852773128dabbe3
?>