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

<sitemapindex xmlns:xsi="<?=$http?>://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9" xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9">
	<sitemap>
		<loc><?=$http?>://<?=$host;?>/sitemap_000.xml</loc>
		<lastmod>2017-06-26T18:22:54+03:00</lastmod>
	</sitemap>
</sitemapindex>
