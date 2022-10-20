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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/company/detail.php?ID=126</loc><lastmod>2016-03-17T12:32:43+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/detail.php?ID=127</loc><lastmod>2016-03-17T12:32:43+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/detail.php?ID=128</loc><lastmod>2016-03-17T12:32:43+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/company/index.php?ID=8</loc><lastmod>2016-03-17T13:32:43+03:00</lastmod></url></urlset>