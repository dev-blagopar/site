$(document).ready(function () {
	// Появление/исчезновение подменю 2 уровня (кроме подменю для каталога)
	$('body').on('mouseenter', '.has-childs_item--default', function() {
		$(this).parents('.navigation__submenu').siblings('.navigation__submenu-default').addClass('navigation__submenu-default--active');
	});
	$('body').on('mouseleave', '.has-childs_item--default, .navigation__submenu-default--active', function(e) {
		if ($(this).is('.has-childs_item--default') && $(e.relatedTarget).parents('.navigation__submenu-default').length == 0) {
			$(this).parents('.navigation__submenu').siblings('.navigation__submenu-default').removeClass('navigation__submenu-default--active');
		} else if ($(this).is('.navigation__submenu-default--active')) {
			$(this).removeClass('navigation__submenu-default--active');
		}
	});

	// Появление/исчезновение подменю 2 уровня для меню каталога
	$('body').on('mouseenter', '.catalog .navigation__menu-item', function() {
		if ($(this).attr('data-id')) {
			var id = $(this).data('id');
			$('.navigation__submenu-d2').find('.navigation__menu-item[data-id='+id+']').removeClass('hidden-catalog');
			$('.navigation__submenu-d2').find('.navigation__menu-item[data-id='+id+']').addClass('active-catalog');
			$('.navigation__submenu-d2').find('.navigation__menu-item:not([data-id='+id+'])').removeClass('active-catalog');
			$('.navigation__submenu-d2').find('.navigation__menu-item:not([data-id='+id+'])').addClass('hidden-catalog');
		}
	});
	$('body').on('mouseleave', '.catalog .navigation__menu-item', function(e) {
		if (!$(e.relatedTarget).attr('data-id') && !$(e.relatedTarget).is('.navigation__submenu-d2')) {
			$('.navigation__submenu-d2').find('.navigation__menu-item').removeClass('active-catalog');
			$('.navigation__submenu-d2').find('.navigation__menu-item').addClass('hidden-catalog');
		}
	});
});