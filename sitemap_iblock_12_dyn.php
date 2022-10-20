<?
$host = preg_replace("/\:\d+/is", "", $_SERVER["HTTP_HOST"]);
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
	$http = "https";
}
else{
	$http = "http";
}
header("Content-Type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';?>
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/company/stock/ostavte_otzyv_o_nas_na_yandeks_markete_i_poluchite_podarok/</loc><lastmod>2017-07-11T14:42:03+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/stock/</loc><lastmod>2017-07-11T14:42:03+03:00</lastmod></url></urlset>