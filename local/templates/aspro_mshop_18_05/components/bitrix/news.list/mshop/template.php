<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<div class="tizers_block">
	<?foreach($arResult["ITEMS"] as $arItem){
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		$name=strip_tags($arItem["~NAME"], "<br><br/>");

        $picture = $arItem["PREVIEW_PICTURE"];

        $picture_file = CFile::ResizeImageGet(
            $picture,
            array("width" => 42, "height" => 42),
            BX_RESIZE_IMAGE_PROPORTIONAL ,
            false,
            array(),
            false,
            85
        );
		?>
		<div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="item">
			<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]){?>
				<a class="name" href="<?=$arItem["PROPERTIES"]["LINK"]["VALUE"]?>">
			<?}?>
			<?if($arItem["PREVIEW_PICTURE"]["SRC"]){?>
				<div class="img"><img src="<?=$picture_file["src"]?>" alt="<?=$name;?>" title="<?=$name;?>"/></div>
			<?}?>
			<div class="title">
				<?=$name;?>
			</div>
			<?if($arItem["PROPERTIES"]["LINK"]["VALUE"]){?>
				</a>
			<?}?>
		</div>
	<?}?>
</div>