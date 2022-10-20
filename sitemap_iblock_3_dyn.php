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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/advt/aqua2017dark/</loc><lastmod>2017-04-21T16:53:16+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/Otdelka_bani_i_sauny_nashi_raboty/</loc><lastmod>2017-06-26T11:51:56+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/Uslugi_po_vnutrennei_otdelke_bani_i_saun/</loc><lastmod>2017-06-30T16:26:41+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/Uslugi_po_vnutrennei_otdelke_bani_i_saun/</loc><lastmod>2017-06-26T11:59:41+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-05-03T21:50:09+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-04-13T15:05:23+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-04-24T10:31:21+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-04-13T15:07:06+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-06-30T17:05:28+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-06-30T16:34:38+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-06-26T11:30:04+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-07-11T13:51:18+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/advt/</loc><lastmod>2017-07-11T13:51:18+03:00</lastmod></url></urlset>