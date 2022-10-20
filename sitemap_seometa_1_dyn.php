<?
$host = preg_replace("/\:\d+/is", "", $_SERVER["HTTP_HOST"]);
if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
	$http = "https";
}
else{
	$http = "http";
}
header("Content-Type: text/xml");
<?xml version="1.0"?>
<urlset xmlns="<?=$http?>://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/drovyanye_pechi/drovyanye_pechi_s_bakom_i_teploobmennikom</loc><lastmod>2017-03-13T12:11:06+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/drovyanye_pechi_s_bakom_dlya_vody/</loc><lastmod>2017-04-19T16:46:47+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/drovyanye_pechi_s_teploobennikom/</loc><lastmod>2017-04-19T16:48:36+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/elektricheskie_pechi/</loc><lastmod>2017-04-12T13:29:28+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/pechi_kaminy/</loc><lastmod>2017-04-19T16:40:40+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/bannie_pechi/</loc><lastmod>2017-04-12T16:04:02+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/pechi_dlya_bani_i_sauny/pechi_kamenki/</loc><lastmod>2017-04-12T17:01:48+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_lipa/</loc><lastmod>2017-04-24T10:26:56+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_lipa_sort_Extra/</loc><lastmod>2017-05-24T15:23:58+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_lipa_sort_A/</loc><lastmod>2017-05-24T15:30:39+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_lipa_sort_AB/</loc><lastmod>2017-05-24T15:32:18+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_lipa_sort_C/</loc><lastmod>2017-05-24T15:55:13+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_termo_lipa/</loc><lastmod>2017-05-29T09:35:08+03:00</lastmod></url><url><loc><?=$http?>://<?=$host;?>/catalog/vagonka_kanadskiy_kedr/</loc><lastmod>2017-05-29T11:14:15+03:00</lastmod></url></urlset>
