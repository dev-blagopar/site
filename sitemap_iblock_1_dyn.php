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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/lists/detail.php?ID=1</loc><lastmod>2016-03-17T12:21:12+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/lists/detail.php?ID=2</loc><lastmod>2016-03-17T12:21:12+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/lists/index.php?ID=1</loc><lastmod>2016-03-17T13:21:12+03:00</lastmod></url></urlset>