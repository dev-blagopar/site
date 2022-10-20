<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?if($arParams["SVOYSTVO_INFOBLOKA"] == "WHERE"){?>
<span style="color: #000000;"><b>Розничный отдел продаж в <span itemprop="telephone">
<?=$arResult["VALUE"];?>
:&nbsp;&nbsp; </span></b></span>
<?}elseif($arParams["SVOYSTVO_INFOBLOKA"] == "TELEFON"){?>
<b><span style="color: #ee1d24;"><?=$arResult["VALUE"];?></span></b>
<?}else{?>
<?=$arResult["VALUE"];?>
<?}?>