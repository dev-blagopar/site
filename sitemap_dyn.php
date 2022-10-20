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
<sitemapindex xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><sitemap><loc><?=$http?>://<?=$host;?>/sitemap-files.xml</loc><lastmod>2021-12-08T20:41:43+03:00</lastmod></sitemap><sitemap><loc><?=$http?>://<?=$host;?>/sitemap-iblock_9.xml</loc><lastmod>2021-12-08T20:41:43+03:00</lastmod></sitemap><sitemap><loc><?=$http?>://<?=$host;?>/sitemap-iblock_13.xml</loc><lastmod>2021-12-08T20:41:43+03:00</lastmod></sitemap><sitemap><loc><?=$http?>://<?=$host;?>/sitemap-iblock-14.xml</loc><lastmod>2021-12-08T20:41:43+03:00</lastmod></sitemap></sitemapindex>