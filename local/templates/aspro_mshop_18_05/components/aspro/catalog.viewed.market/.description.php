<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = array(
	'NAME' => GetMessage('ASPRO_MARKET_COMPONENT_NAME'),
	'DESCRIPTION' => GetMessage('ASPRO_MARKET_COMPONENT_DESCRIPTION'),
	'CACHE_PATH' => 'Y',
	'PATH' => array (
		'ID'	=> 'aspro',
		'SORT'	=> 10,
		'NAME'	=> GetMessage('ASPRO_MARKET_COMPONENTS_SECTION')
	),
);
?>