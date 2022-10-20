<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? $this->setFrameMode( true ); ?>
<div class="discount__wrapper">
    <div class="discount__block owl-carousel">
    	<?foreach($arResult["ITEMS"] as $arItem):?>
	      <div class="discount__element">
	      	<div class="discount">-<?=(100-round($arItem['PROPERTIES']['NEW_PRICE']['VALUE'] / $arItem['PROPERTIES']['OLD_PRICE']['VALUE'] * 100))?>%</div>
	        <div class="image">
	        	<a href="<?=$arItem['PROPERTIES']['CATALOG_LINK']['VALUE']?>">
	        		<div style="width: 100%;height: 200px;background: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>) center/contain no-repeat"></div>
	        	</a>
	        </div>
	        <div class="title">
	        	<a href="<?=$arItem['PROPERTIES']['CATALOG_LINK']['VALUE']?>"><?=$arItem['NAME']?></a>
	        </div>
	        <div class="price__block">
	          <div class="price">от&nbsp;<?=$arItem['PROPERTIES']['NEW_PRICE']['VALUE']?>&nbsp;руб.</div>
	          <div class="price-old"><span class="underline"><?=$arItem['PROPERTIES']['OLD_PRICE']['VALUE']?></span>&nbsp;руб.</div>
	        </div>
	      </div>
      <?endforeach;?>
    </div>
</div>
<script>
	$('.discount__block').owlCarousel({
	    items:4,
	    loop:true,
	    margin:10,
	    autoplay:true,
	    autoplayTimeout:3000,
	    autoplayHoverPause:true,
	    nav:true,
	    responsive:{
			320:{
			  	items:1
			},
			500:{
			  	items:2
			},
			1000:{
			  	items:4
			},
		}
	});
</script>
<style>
	#discount{
		margin: 30px 0;
	}
	.discount__block{
		height: 350px;
	}
	.discount__element{
	  display: inline-block;
	  box-sizing: border-box;
	  padding: 20px;
	  box-shadow: 0px 0px 20px rgb(0 0 0 / 10%);
		-moz-box-shadow: 0px 0px 20px rgba(0,0,0,0.10);
		-o-box-shadow: 0px 0px 20px rgba(0,0,0,0.10);
		-webkit-box-shadow: 0px 0px 20px rgb(0 0 0 / 10%);
		margin-left: 20px;
		border: 1px solid #6ab400;
    	box-sizing: border-box;
    	position: relative;
    	width: 100%;
	}
	.discount__element .image{
		height: 200px;
	}
	.discount__element .image img{
		width: auto;
	}
	.discount__element .discount{
		position: absolute;
		background: #ee2525;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		color: white;
		display: flex;
		justify-content: center;
		align-items: center;
		top: 5px;
	    right: 5px;
	    font-size: 17px;
	    font-weight: bold;
	}
	.discount__element:first-child{
		margin-left: 0px;
	}
	.discount__element .title{
	  color: #5ea000;
	  height: 50px;
	  font-size: 18px;
	  text-align: center;
	}
	.discount__element .subtitle{
		font-size: 16px;
		text-align: center;
		margin: 5px 0;
	}
	.discount__element .subtitle a{
		color: #929a9c;
	}
	.discount__element .price__block{
		display: flex;
		color: black;
		align-items: flex-end;
		justify-content: space-around;
	}
	.discount__element .price__block .price-old{
	  color: grey;
	  font-size: 16px;
	  position: relative;
	}
	.discount__element .price__block .price-old:before{
		content: '';
	    position: absolute;
	    top: 50%;
	    left: 0;
	    display: block;
	    width: 100%;
	    height: .1rem;
	    background-color: #bb0001;
	}
	.discount__element .price__block .price-old .discount{
	  background: #ff8d18;
	  color: white;
	  padding: 3px 5px;
	  font-size: 14px;
	  margin-left: 5px;
	}
	.discount__element .price__block .price{
	  font-size: 20px;
	  margin-top: 2px;
	}
	.discount__wrapper .absolute .flex-direction-nav>li{
		top: 130px;
	}
	#discount .owl-nav{
		position: absolute;
	    top: 50%;
	    color: black;
	    font-size: 70px;
	    width: 100%;
	    margin-top: -39px;
	}
	#discount .owl-next{
		right: -30px;
    	position: absolute;
	}
	#discount .owl-prev{
		left: -30px;
    	position: absolute;
	}
</style>