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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/company/news/#YEAR#/aquasalon2017/</loc><lastmod>2017-04-21T16:42:02+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/news/#YEAR#/fazenda_2017_vesna/</loc><lastmod>2017-04-25T10:56:59+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/news/</loc><lastmod>2017-04-25T10:56:59+03:00</lastmod></url></urlset>