<?
$arResult = CMShop::getChilds($arResult);

if(!function_exists('dd')) {
    function dd($data) {
		echo '<pre style="display:none;">';
        var_dump($data);
        echo '</pre>';
    }
}

//dd($arResult);
?>