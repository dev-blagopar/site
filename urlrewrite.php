<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/([\\w\\d\\-]+)?(/)?(([\\w\\d\\-]+)(/)?)?#',
    'RULE' => 'REQUEST_OBJECT=$1&METHOD=$4',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/order/accept#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => 'bitrix:im.router',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/order/status#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/cart#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/personal/history-of-orders/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/history-of-orders/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/acrit.exportproplus/(.*)#',
    'RULE' => 'path=$1',
    'ID' => '',
    'PATH' => '/acrit.exportproplus/index.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  85 => 
  array (
    'CONDITION' => '#^/company/vopros-otvet/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vopros-otvet/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/acrit.exportpro/(.*)#',
    'RULE' => 'path=$1',
    'ID' => '',
    'PATH' => '/acrit.exportpro/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => 'bitrix:im.router',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  66 => 
  array (
    'CONDITION' => '#^/company/licenses/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/licenses/index.php',
    'SORT' => 100,
  ),
  65 => 
  array (
    'CONDITION' => '#^/company/partners/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/partners/index.php',
    'SORT' => 100,
  ),
  88 => 
  array (
    'CONDITION' => '#^/company/services/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/services/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/company/comments/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/comments/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  100 => 
  array (
    'CONDITION' => '#^/company/vacancy/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vacancy/index.php',
    'SORT' => 100,
  ),
  67 => 
  array (
    'CONDITION' => '#^/company/reviews/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/reviews/index.php',
    'SORT' => 100,
  ),
  48 => 
  array (
    'CONDITION' => '#^/contacts/stores/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.store',
    'PATH' => '/contacts/index.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/personal/order/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.order',
    'PATH' => '/personal/order/index.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/personal/lists/#',
    'RULE' => '',
    'ID' => 'bitrix:lists',
    'PATH' => '/personal/lists/index.php',
    'SORT' => 100,
  ),
  21 => 
  array (
    'CONDITION' => '#^/company/stock/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/stock/index.php',
    'SORT' => 100,
  ),
  20 => 
  array (
    'CONDITION' => '#^/info/articles/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/articles/index.php',
    'SORT' => 100,
  ),
  101 => 
  array (
    'CONDITION' => '#^/company/staff/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/staff/index.php',
    'SORT' => 100,
  ),
  68 => 
  array (
    'CONDITION' => '#^/company/docs/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/docs/index.php',
    'SORT' => 100,
  ),
  24 => 
  array (
    'CONDITION' => '#^/vopros-otvet/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vakansii/vopros-otvet/index.php',
    'SORT' => 100,
  ),
  22 => 
  array (
    'CONDITION' => '#^/info/article/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/article/index.php',
    'SORT' => 100,
  ),
  90 => 
  array (
    'CONDITION' => '#^/company/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/news/index.php',
    'SORT' => 100,
  ),
  63 => 
  array (
    'CONDITION' => '#^/sharebasket/#',
    'RULE' => '',
    'ID' => 'aspro:basket.share.max',
    'PATH' => '/sharebasket/index.php',
    'SORT' => 100,
  ),
  25 => 
  array (
    'CONDITION' => '#^/info/brands/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/brands/index.php',
    'SORT' => 100,
  ),
  26 => 
  array (
    'CONDITION' => '#^/info/brand/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/info/brand/index.php',
    'SORT' => 100,
  ),
  83 => 
  array (
    'CONDITION' => '#^/lookbooks/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/lookbooks/index.php',
    'SORT' => 100,
  ),
  89 => 
  array (
    'CONDITION' => '#^/services/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/services/index.php',
    'SORT' => 100,
  ),
  30 => 
  array (
    'CONDITION' => '#^/landings/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/landings/index.php',
    'SORT' => 100,
  ),
  49 => 
  array (
    'CONDITION' => '#^/contacts/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/contacts/index.php',
    'SORT' => 100,
  ),
  27 => 
  array (
    'CONDITION' => '#^/vakancii/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/company/vakansii/index.php',
    'SORT' => 100,
  ),
  59 => 
  array (
    'CONDITION' => '#^/projects/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/projects/index.php',
    'SORT' => 100,
  ),
  28 => 
  array (
    'CONDITION' => '#^/products/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/products/index.php',
    'SORT' => 100,
  ),
  69 => 
  array (
    'CONDITION' => '#^/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:sale.personal.section',
    'PATH' => '/personal/index.php',
    'SORT' => 100,
  ),
  109 => 
  array (
    'CONDITION' => '#^/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog',
    'PATH' => '/catalog/index.php',
    'SORT' => 100,
  ),
  95 => 
  array (
    'CONDITION' => '#^/works/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/works/index.php',
    'SORT' => 100,
  ),
  35 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  58 => 
  array (
    'CONDITION' => '#^/auth/#',
    'RULE' => '',
    'ID' => 'aspro:auth.max',
    'PATH' => '/auth/index.php',
    'SORT' => 100,
  ),
  91 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  106 => 
  array (
    'CONDITION' => '#^/sale/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/sale/index.php',
    'SORT' => 100,
  ),
  108 => 
  array (
    'CONDITION' => '#^/blog/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/blog/index.php',
    'SORT' => 100,
  ),
);
