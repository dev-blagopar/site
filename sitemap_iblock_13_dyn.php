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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/services/uslugi-po-vnutrenney-otdelke-ban-i-saun/</loc><lastmod>2017-06-14T09:57:39+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/services/primery-nashikh-rabot-po-vnutrenney-otdelke-ban-i-saun/</loc><lastmod>2017-06-14T09:53:57+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/services/</loc><lastmod>2017-06-14T09:57:39+03:00</lastmod></url></urlset>