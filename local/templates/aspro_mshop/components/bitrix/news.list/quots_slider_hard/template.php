<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<div class="qoutes__box owl-carousel">
	<?foreach($arResult["ITEMS"] as $arItem):?>
	<div class="quote__element">
		<noscript><?var_dump($arItem)?></noscript>
		<div class="quote__head">
			<div class="left">
				<div class="image"><img src="<?=CFile::GetPath($arItem['PROPERTIES']['CLIENT_AVATAR']['VALUE'])?>" alt=""></div>
				<div class="title__block">
					<div class="title"><?=$arItem['PROPERTIES']['CLIENT_NAME']['VALUE']?></div>
					<?/*<div class="date"><?=$arItem['PROPERTIES']['DATE']['VALUE']?></div>*/?>
				</div>
			</div>
			<div class="right" style="display: none;"></div>
		</div>
		<div class="quote__body">
			<?switch ($arItem['PROPERTIES']['QUOTE_TYPE']['VALUE_XML_ID']):
				case 'video':?>
			<div class="video">
				<iframe width="100%" height="300" src="<?=$arItem['PROPERTIES']['VIDEO_LINK']['VALUE']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            </div>
			<?break;?>
			<?case 'audio':?>
				<audio controls style="width: 100%">
				  <source src="<?=CFile::GetPath($arItem['PROPERTIES']['AUDIO']['VALUE'])?>">
				</audio>
				<div class="description">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>
			<?break;?>
			<?case 'text':?>
				<div class="description">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>
			<?break;?>
			<?endswitch;?>
		</div>
	</div>
	<?endforeach;?>
</div>
<script>
	$('.qoutes__box').owlCarousel({
	    loop:true,
	    margin:10,
	    autoplay:false,
	    autoplayTimeout:3000,
	    autoplayHoverPause:true,
	    autoHeight:true,
	    nav:true,
	    responsive:{
			320:{
			  	items:1
			},
			500:{
			  	items:2
			},
			1000:{
			  	items:2
			},
		}
	});
</script>
<style>
	#quotes{
		padding: 30px 0;
    	background: #63b32e;
	}
	.quote__element{
		background: white;
		padding: 20px;
	}
	.quotes__box{
		position: relative;
	}
	.quote__head{
		display: flex;
		justify-content: space-between;
		border-bottom: 1px solid #63b32e;
    	padding-bottom: 5px;
	}
	.quote__head .left{
		display: flex;
		align-items: center;
	}
	.quote__head .right{
		font-size: 18px;
		color: black;
		display: flex;
    	align-items: center;
	}
	.quote__head .image{
		width: 40px;
		height: 40px;
		border-radius: 50%;
		overflow: hidden;
	}
	.quote__head .title__block{
		margin-left: 5px;
	}
	.quote__head .title{
		font-size: 18px;
		color: black;
		font-weight: bold;
	}
	.quote__head .date{

	}
	.quote__body{
		margin-top: 15px;
		color: black;
    	font-size: 15px;
	}
	#quotes .owl-nav{
		position: absolute;
	    top: 50%;
	    color: white;
	    font-size: 70px;
	    width: 100%;
	    margin-top: -39px;
	}
	#quotes .owl-next{
		right: -30px;
    	position: absolute;
	}
	#quotes .owl-prev{
		left: -30px;
    	position: absolute;
	}
	@media (max-width: 575.98px){
		.quote__head .right{
			display: none;
		}
	}
</style>