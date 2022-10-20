<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arTemplateParameters['LINE_ELEMENT_COUNT'] = array(
	"PARENT" => "VISUAL",
	"NAME" => GetMessage("CVP_LINE_ELEMENT_COUNT"),
	"TYPE" => "STRING",
	"DEFAULT" => "3",
);
$arTemplateParameters['DISPLAY_COMPARE'] = array(
	"PARENT" => "VISUAL",
	"NAME" => GetMessage("DISPLAY_COMPARE_NAME"),
	"TYPE" => "CHECKBOX",
	"DEFAULT" => "Y",
);
$arTemplateParameters['SATE_STIKER'] = array(
	"PARENT" => "VISUAL",
	"NAME" => GetMessage("SATE_STIKER_NAME"),
	"TYPE" => "STRING",
	"DEFAULT" => "SALE_TEXT",
);

$arThemes = array();
if (\Bitrix\Main\ModuleManager::isModuleInstalled('bitrix.eshop'))
{
	$arThemes['site'] = GetMessage('CVP_TPL_THEME_SITE');
}
$arThemesList = array(
	'blue' => GetMessage('CVP_TPL_THEME_BLUE'),
	'green' => GetMessage('CVP_TPL_THEME_GREEN'),
	'red' => GetMessage('CVP_TPL_THEME_RED'),
	'wood' => GetMessage('CVP_TPL_THEME_WOOD'),
	'yellow' => GetMessage('CVP_TPL_THEME_YELLOW'),
	'black' => GetMessage('CVP_TPL_THEME_BLACK')

);
$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
if (is_dir($dir))
{
	foreach ($arThemesList as $themeID => $themeName)
	{
		if (!is_file($dir.$themeID.'/style.css'))
			continue;
		$arThemes[$themeID] = $themeName;
	}
}

$arTemplateParameters['TEMPLATE_THEME'] = array(
	'PARENT' => 'VISUAL',
	'NAME' => GetMessage("CVP_TPL_TEMPLATE_THEME"),
	'TYPE' => 'LIST',
	'VALUES' => $arThemes,
	'DEFAULT' => 'blue',
	'ADDITIONAL_VALUES' => 'Y'
);