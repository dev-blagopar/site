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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/info/articles/#YEAR#/chislo-zagruzok-mountain-lion/</loc><lastmod>2016-03-17T12:32:45+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/articles/#YEAR#/vse_o_zhidkokristalicheskikh_displeyakh/</loc><lastmod>2016-03-17T12:32:46+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/articles/#YEAR#/testovaya_statya/</loc><lastmod>2016-03-17T12:32:46+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/articles/#YEAR#/testovaya_statya2/</loc><lastmod>2016-03-17T12:32:46+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/articles/</loc><lastmod>2016-03-17T13:32:45+03:00</lastmod></url></urlset>