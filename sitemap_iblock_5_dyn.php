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
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/contacts/stores/101/</loc><lastmod>2017-06-05T16:43:48+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/102/</loc><lastmod>2017-05-02T16:56:03+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/104/</loc><lastmod>2017-06-05T16:47:28+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/105/</loc><lastmod>2017-06-05T16:46:37+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/8118/</loc><lastmod>2017-06-05T16:45:08+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/11277/</loc><lastmod>2017-06-06T09:22:34+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/11552/</loc><lastmod>2017-06-05T16:48:14+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/11554/</loc><lastmod>2017-06-16T13:43:41+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/11599/</loc><lastmod>2017-06-06T09:21:03+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/11769/</loc><lastmod>2017-06-26T12:22:58+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/contacts/stores/</loc><lastmod>2017-06-26T12:22:58+03:00</lastmod></url></urlset>