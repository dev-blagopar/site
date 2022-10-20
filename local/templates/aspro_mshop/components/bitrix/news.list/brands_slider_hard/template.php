<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<?$i==0?>
<div class="brands__box">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<?if( is_array($arItem["PREVIEW_PICTURE"]) ):?>
			<div class="brands__element<?if($i > 13):?> other__brands hidden<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
				</a>
			</div>
		<?endif;?>
		<?$i++;?>
	<?endforeach;?>
	<div class="brands__element showmore" data-toggle="false">
		Еще
	</div>
</div>
<script>
	$('.showmore').on('click',function(){
		var toggle = $(this).data('toggle');
		console.log(toggle);
		if(toggle == false){
			$('.other__brands').removeClass('hidden');
			$(this).addClass('hiddens');
			$(this).data('toggle',true);
			$(this).text('Скрыть');
		}else{
			$('.other__brands').addClass('hidden');
			$(this).removeClass('hiddens');
			$(this).data('toggle',false);
			$(this).text('Еще');
		}
	});
</script>
<style>
	.brands__box{
		display: flex;
		flex-wrap: wrap;
	}
	.brands__element{
		width: 20%;
	    box-sizing: border-box;
	    height: 100px;
	    display: inline-flex;
	    align-items: center;
	    justify-content: center;
	    border: 1px solid #63b32e;
	}
	.brands__element img{
		transition: 1s ease;
	}
	.brands__element:hover img{
		transform: scale(1.2);
	}
	.brands__element.showmore{
		background: #63b32e;
	    color: white;
	    font-size: 25px;
	    font-weight: bold;
	    text-align: center;
	    cursor: pointer;
	}
	@media (max-width: 575.98px){
		.brands__element{
			width: 50%;
		}
		.brands__element.showmore{
			width: 100%;
		}
		.brands__element.showmore.hiddens{
			width: 50%;
		}
	}
</style>