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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/content/detail.php?ID=122</loc><lastmod>2016-03-17T12:32:42+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/content/list.php?SECTION_ID=8</loc><lastmod>2016-03-17T13:32:42+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/content/detail.php?ID=123</loc><lastmod>2016-03-17T12:32:42+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/content/detail.php?ID=124</loc><lastmod>2016-03-17T12:32:42+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/content/detail.php?ID=125</loc><lastmod>2016-03-17T12:32:42+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/content/index.php?ID=7</loc><lastmod>2016-03-17T13:32:42+03:00</lastmod></url></urlset>