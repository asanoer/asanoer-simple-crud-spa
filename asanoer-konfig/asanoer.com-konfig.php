<?php
defined('ASANOER_PENGAMAN_AKSES') or exit('Tidak dapat dikses langsung!!');
// Waktu & Tanggal
$xWaktu = gmdate("d-m-20y H:i:s",time()+60*60*7);
//////////////////////////////////////////////
$xDate = substr ($xWaktu, 0, 10);
$tgl = explode("-",$xDate);
$xDate = $tgl[2].'-'.$tgl[1].'-'.$tgl[0];
////////////////////////////////////////////////////////
$xClock = Strstr($xWaktu," ");
$xClock = Substr($xClock, 1);
DEFINE("ASANOER_TANGGAL",$xDate); // Tanggal sekarabf untuk lokasi JAKARTA
DEFINE("ASANOER_JAM",$xClock); // Jam sekarang untuk lokasi JAKARTA

//Konfigurasi all constanta
// Menangani domain dan URL
if($_SERVER['SERVER_PORT'] == 443){
	$path = "https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$dir = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
} else {
	$path = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$dir = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
$filename = basename($path);
$uri = str_replace($filename,"",$path);
////////////////////////////////////////
DEFINE("ASANOER_URL_UTUH",$dir); //misal http://localhost/crud-asanoer.com/cicilan-mu.html?id=20
DEFINE("ASANOER_MAIN_URL",$uri); //misal http://localhost/crud-asanoer.com/

//Const Data
DEFINE("ASANOER_NAMA_APLIKASI","SPA CRUD - ASANOER.COM"); // Nama aplikasi
DEFINE("ASANOER_VERSI_APLIKASI","V.02"); // Versi aplikasi dibuat
DEFINE("ASANOER_EMAIL_AUTHOR","insan.perdana@asanoer.com"); // Email pembuat aplikasi

//Cont Database
DEFINE("ASANOER_DB_HOST","localhost");  // Host Database
DEFINE("ASANOER_DB_DATABASE","asanoer-crudspa"); // NAMA Database
DEFINE("ASANOER_DB_USER","root"); // User Database
DEFINE("ASANOER_DB_PASSWORD","");  // Password Database
DEFINE("ASANOER_DB_TABEL_PREFIX","asanoer_tb_"); // Prefix atau awalan nama tabel

// Const URL
DEFINE("ASANOER_INDEX_APLIKASI","asanoer-indeks-aplikasi/"); // Index saat server menjalankan pertama kalinya
//Const folder
DEFINE("ASANOER_FOLDER_PELENGKAP","asanoer-pelengkap/"); // folder ini terserah Anda..
DEFINE("ASANOER_FOLDER_TEMA", ASANOER_FOLDER_PELENGKAP."asanoer-templet/");
DEFINE("ASANOER_TEMA",ASANOER_MAIN_URL.ASANOER_FOLDER_TEMA."sb-admin-2/"); // semua tema ada di URL ini
DEFINE("ASANOER_FOLDER_GBR",ASANOER_FOLDER_PELENGKAP."asanoer-gambar/"); // Folder wadah untuk semua jenis gambar
?>