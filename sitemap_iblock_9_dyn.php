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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/info/brands/sawo/</loc><lastmod>2016-09-08T12:06:07+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/brands/teplov_i_sukhov/</loc><lastmod>2016-09-08T10:33:44+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/info/brands/</loc><lastmod>2016-09-08T12:06:07+03:00</lastmod></url></urlset>