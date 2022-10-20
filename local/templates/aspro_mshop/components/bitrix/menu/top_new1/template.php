<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)die();
$this->setFrameMode(true);
$maxRootItems = 30;
$bMoreThanMax = count($arResult) > $maxRootItems;
?>
<?if($arResult):?>
	<ul class="menu bottom navigation__menu">
		<?foreach($arResult as $key => $arItem):?>
			<?if($key < $maxRootItems):?>
				<?
				$isCatalog = (isset($arItem['PARAMS']['CLASS']) && strpos($arItem['PARAMS']['CLASS'], 'catalog') !== false);
				$isWideMenu = (isset($arItem['PARAMS']['CLASS']) && strpos($arItem['PARAMS']['CLASS'], 'wide_menu') !== false);

				$isCurrentItem = $arItem["SELECTED"] ? ' current' : '';
				$isActiveItem = $arItem["PARAMS"]["ACTIVE"]=="Y" ? ' active' : '';
				$isParentItem = $arItem["IS_PARENT"] ? ' has-childs_item' : '';
				?>

				<li class="navigation__menu-item <?=(!$key ? ' first' : '')?><?=$isCurrentItem?><?=$isActiveItem?><?=' '.$arItem['PARAMS']['CLASS']?><?=$isParentItem?>">
					<a class="navigation__menu-link <?=($arItem["SELECTED"] ? ' current' : '')?>" href="<?=$arItem["LINK"]?>">
						<?if(isset($arItem["PARAMS"]["ICON"]) && $arItem["PARAMS"]["ICON"]):?>
							<?=CMShop::showIconSvg($arItem["PARAMS"]["ICON"], SITE_TEMPLATE_PATH.'/images/svg/'.$arItem["PARAMS"]["ICON"].'.svg', '', '');?>
						<?endif;?>
						<?=$arItem["TEXT"]?>
					</a>

					<?if($arItem["IS_PARENT"]):?>
						<ul class="navigation__submenu">
							<?foreach($arItem["CHILD"] as $i => $arSubItem):?>
								<?if(count($arSubItem["CHILD"])):?>
									<li class="navigation__menu-item" data-id="<?=$i?>">
										<a class="navigation__menu-link title<?=($arSubItem["SELECTED"] ? ' current' : '')?> has-childs_item--default" href="<?=$arSubItem["LINK"]?>">
											<?=$arSubItem["TEXT"]?>
											<?if($arSubItem["CHILD"] && is_array($arSubItem["CHILD"])):?>
												<i class="svg inline  svg-inline-right light-ignore" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="5" height="7" viewBox="0 0 3 5"><path data-name="Rectangle 4 copy" class="cls-1" d="M203,84V79l3,2.5Z" transform="translate(-203 -79)"></path></svg></i>
											<?endif;?>
										</a>
										<?/*if(!$isCatalog && !$isWideMenu && $arSubItem["CHILD"] && is_array($arSubItem["CHILD"])):?>
											<ul class="navigation__submenu">
											<?foreach($arSubItem["CHILD"] as $ii => $arSubItem3):?>
												<li class="navigation__menu-item">
													<a class="navigation__menu-link <?=($arSubItem3["SELECTED"] ? ' current' : '')?>" href="<?=$arSubItem3["LINK"]?>"><?=$arSubItem3["TEXT"]?></a>
												</li>
											<?endforeach;?>
											</ul>
										<?endif;*/?>
									</li>
								<?else:?>
									<li class="navigation__menu-item">
										<a class="navigation__menu-link <?=($arSubItem["SELECTED"] ? ' current' : '')?>" href="<?=$arSubItem["LINK"]?>"><?=$arSubItem["TEXT"]?></a>
									</li>
								<?endif;?>
							<?endforeach;?>
						</ul>
						<ul class="navigation__submenu <?=($isCatalog && $isWideMenu ? 'navigation__submenu-d2' : 'navigation__submenu-default')?>">
						<?foreach($arItem["CHILD"] as $i => $arSubItem):?>
							<?if(count($arSubItem["CHILD"])):?>
								<?if($arSubItem["CHILD"] && is_array($arSubItem["CHILD"])):?>
									<?foreach($arSubItem["CHILD"] as $ii => $arSubItem3):?>
										<li class="navigation__menu-item <?=($isCatalog && $isWideMenu ? 'hidden-catalog' : '')?>" data-id="<?=$i?>">
											<a class="navigation__menu-link <?=($arSubItem3["SELECTED"] ? ' current' : '')?>" href="<?=$arSubItem3["LINK"]?>">
												<?if($isCatalog && $isWideMenu):?>
                                                <img src="<?=$arSubItem3["PARAMS"]["IMG"]?>" />

												<?endif;?>
												<span class="catalog-menu_link-text"><?=$arSubItem3["TEXT"]?></span>
											</a>
										</li>
									<?endforeach;?>
								<?endif;?>
							<?endif;?>
						<?endforeach;?>
						</ul>
					<?endif;?>
				</li>
			<?endif;?>
		<?endforeach;?>

<?/* 												<img src="<?=$arSubItem3["PARAMS"]["IMG"]?>" />
		<li class="more menu_item_l1">
			<a><?=GetMessage("CATALOG_VIEW_MORE_")?><i></i></a>
			<div class="child cat_menu">
				<div class="child_wrapp">
					<?if($bMoreThanMax):?>
						<?foreach($arResult as $key => $arItem):?>
							<?if($key >= $maxRootItems):?>
								<ul<?=(($key - $maxRootItems) % 3 ? '' : ' class="last"')?>>
									<li class="menu_title<?=($arItem["SELECTED"] ? ' current' : '')?><?=($arItem["PARAMS"]["ACTIVE"] == "Y" ? ' active' : '')?>">
										<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
									</li>
									<?if($arItem["IS_PARENT"]):?>
										<?foreach($arItem["CHILD"] as $i => $arSubItem):?>
											<li<?=($i > 4 ? ' style="display:none;"' : '')?> class="menu_item">
												<a href="<?=$arSubItem["LINK"]?>" class="<?=($arSubItem["SELECTED"] ? ' current' : '')?><?=($i > 4 ? ' d' : '')?>"><?=$arSubItem["TEXT"]?></a>
											</li>
										<?endforeach;?>
										<?if(count($arItem["CHILD"]) > 5):?>
											<!--noindex-->
											<a class="see_more" rel="nofollow" href="javascript:;"><span><?=GetMessage('CATALOG_VIEW_MORE')?></span></a>
											<!--/noindex-->
										<?endif;?>
									<?endif;?>
								</ul>
							<?endif;?>
						<?endforeach;?>
					<?endif;?>
				</div>
			</div>
		</li>
*/?>


		<li class="stretch"></li>
	</ul>

	<script type="text/javascript">
	// menu block
/*var nodeCatalogMenu = document.querySelector('.catalog_menu .menu')
	// last menu width when it was calculated
	nodeCatalogMenu.lastCalculatedWidth = false

	// menu item MORE
	var nodeMore = nodeCatalogMenu.querySelector('li.more')
	// and it`s width
	var moreWidth = nodeMore.offsetWidth
	// and it`s submenu with childs
	var nodeMoreSubmenu = nodeMore.querySelector('.child_wrapp')

	var reCalculateMenu = function(){
		// get current menu width
		var menuWidth = nodeCatalogMenu.offsetWidth
		// and compare wth last width when it was calculated
		if(menuWidth !== nodeCatalogMenu.lastCalculatedWidth){
			nodeCatalogMenu.lastCalculatedWidth = menuWidth
			
			// clear menu item MORE submenu
			<?if($bMoreThanMax):?>
			Array.prototype.slice.call(nodeMoreSubmenu.querySelectorAll('.cloned')).forEach(function(node){
				nodeMoreSubmenu.removeChild(node)
			})
			if(nodeMoreSubmenu.querySelectorAll('.cloned').length){
				nodeMore.classList.add('visible')
			}
			nodeMore.style.display = 'inline-block'
			// first child item in item MORE submenu
			var firstChildInMoreSubmenu = nodeMoreSubmenu.childNodes[0]
			<?else:?>
			nodeMoreSubmenu.innerHTML = ''
			nodeMore.classList.remove('visible')
			<?endif;?>
			// and hide this item
			// show all root items of menu which was hided at last calculate
			Array.prototype.slice.call(document.querySelectorAll('.catalog_menu .menu > li:not(.stretch)')).forEach(function(node){
				node.style.display = 'inline-block'
			})
			nodeCatalogMenu.style.display = 'block'

			// last index of root items of menu without items MORE & STRETCH
			var lastIndex = $('.catalog_menu .menu > li:not(.more):not(.stretch)').length - 1
			// count of items that cloned to item`s MORE submenu
			var cntItemsInMore = <?=(!$bMoreThanMax ? 0 : count($arResult) - $maxRootItems)?>;
			var cntMinItemsInMore = cntItemsInMore
			// get all root items of menu without items MORE & STRETCH and do something
			Array.prototype.slice.call(document.querySelectorAll('.catalog_menu .menu > li:not(.more):not(.stretch)')).forEach(function(node, i){
				// is it last root item of menu?
				var bLast = lastIndex === i
				// it`s width
				var itemWidth = node.offsetWidth
				// if item MORE submenu is not empty OR overflow than clone item
				if((cntItemsInMore > cntMinItemsInMore) || (node.offsetLeft + itemWidth + (bLast ? 0 : moreWidth) > menuWidth)){
					// show item MORE if it was empty
					if(!cntItemsInMore++){
						nodeMore.classList.add('visible')
						nodeMore.style.display = 'inline-block'
					}

					// clone item
					var nodeClone = node.cloneNode(true)
					// and hide it
					node.style.display = 'none'

					// wrap cloned item
					var nodeWrap = document.createElement('div')
					nodeWrap.appendChild(nodeClone)
					delete node
					node = nodeWrap.querySelector('.menu_item_l1')

					// replace cloned item childs structure
					var nodeLink = nodeWrap.querySelector('.menu_item_l1 > a')
					if(nodeLink){
						var hrefLink = nodeLink.getAttribute('href')
						var textLink = nodeLink.innerText
						var p = nodeLink.parentNode
						nodeLink.parentNode.removeChild(nodeLink)
					}
					Array.prototype.slice.call(nodeClone.querySelectorAll('.depth3 a:not(.title)')).forEach(function(_node){
						_node.parentNode.removeChild(_node)
					})
					$(node).wrapInner('<ul class="cloned"></ul>')
					var nodeUL = node.querySelector('ul')
					var nodeLI = document.createElement('li')
					var addClass = node.className.replace('menu_item_l1', '').trim()
					nodeLI.classList.add('menu_title')
					if(addClass.length){
						nodeLI.classList.add(addClass)
					}
					nodeLI.innerHTML = '<a href="' + (hrefLink && hrefLink.trim().length ? hrefLink : '') + '">' + textLink + '</a>'
					if(nodeUL.childNodes.length){
						nodeUL.insertBefore(nodeLI, nodeUL.childNodes[0])
					}
					else{
						nodeUL.appendChild(nodeLI)
					}
					Array.prototype.slice.call(node.querySelectorAll('.child_wrapp > a,.child_wrapp > .depth3 a.title')).forEach(function(_node){
						$(_node).wrap('<li class="menu_item"></li>')
					})
					var strLiBlock = '';
					Array.prototype.slice.call(node.querySelectorAll('li.menu_item')).forEach(function(_node){
						if(nodeUL){
							var $a = $(_node).find('> a');
							if($a.length){
								var nodeA = $a[0]
								var classA = nodeA.className
								var styleA = nodeA.getAttribute('style')
								strLiBlock += '<li class="menu_item' + ((classA && classA.trim().length) ? ' ' + classA.trim() : '') + '"' + ((styleA && styleA.trim().length) ? 'style="' + styleA.trim() + '"' : '') + '>' + _node.innerHTML + '</li>';
							}
						}
					})
					nodeUL.innerHTML += strLiBlock;
					Array.prototype.slice.call(node.querySelectorAll('.child.submenu')).forEach(function(_node){
						_node.parentNode.removeChild(_node)
					})

					// append cloned item html to item MORE submenu
					<?if($bMoreThanMax):?>
						nodeMoreSubmenu.insertBefore(nodeUL, firstChildInMoreSubmenu)
					<?else:?>
						nodeMoreSubmenu.appendChild(nodeUL)
					<?endif;?>
				}
				else{
					// align child menu of root items
					if(i){
						var nodesSubmenu = node.getElementsByClassName('submenu')
						if(nodesSubmenu.length){
							nodesSubmenu[0].style.marginLeft = (itemWidth - $(nodesSubmenu[0]).outerWidth()) / 2 + 'px'
						}
					}

					// show this item
					node.style.display = 'inline-block'
					// remove left border
					if(bLast){
						node.style.borderLeftWidth = '0px'
					}
				}
			});

			// hide item MORE if it`s submenu is empty
			if(!cntItemsInMore){
				nodeMore.style.display = 'none'
			}
			else{
				// or set class "last" for even 3 item in submenu
				Array.prototype.slice.call(nodeMoreSubmenu.querySelectorAll('ul')).forEach(function(node, i){
					if(i % 3){
						node.classList.remove('last')
					}
					else{
						node.classList.add('last')
					}
				})
			}

			// I don`t know what is it
			Array.prototype.slice.call(nodeMore.querySelectorAll('.see_more a.see_more')).forEach(function(node){
				node.classList.remove('see_more')
			})
			Array.prototype.slice.call(nodeMore.querySelectorAll('li.menu_item a')).forEach(function(node){
				node.classList.remove('d')
			})
			Array.prototype.slice.call(nodeMore.querySelectorAll('li.menu_item a')).forEach(function(node){
				node.removeAttribute('style')
			})
		}
	}

	$(document).ready(function() {
		if($(window).outerWidth() > 600){
			// reCalculateMenu()
		}
});*/
	</script>
<?endif;?>