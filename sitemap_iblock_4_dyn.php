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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/detail.php?ID=96</loc><lastmod>2016-03-17T12:32:36+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/detail.php?ID=97</loc><lastmod>2016-03-17T12:32:36+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/detail.php?ID=98</loc><lastmod>2016-03-17T12:32:36+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/detail.php?ID=99</loc><lastmod>2016-03-17T12:32:36+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/detail.php?ID=100</loc><lastmod>2016-08-26T15:51:28+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/aspro_kshop_content/index.php?ID=4</loc><lastmod>2016-08-26T15:51:28+03:00</lastmod></url></urlset>