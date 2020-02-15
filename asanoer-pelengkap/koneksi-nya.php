<?php
$tidakakses = 'Tidak dapat diakses langsung !!!';
defined('ASANOER_NAMA_APLIKASI') or exit($tidakakses);
// Database
// Create connection
// Sumber = http://www.w3schools.com/php/php_mysql_insert.asp
$xdatabase = new mysqli(ASANOER_DB_HOST, ASANOER_DB_USER, ASANOER_DB_PASSWORD, ASANOER_DB_DATABASE);
// Check connection
$xdatabase->connect_error && die("Koneksi Gagal : " . $xdatabase->connect_error);
?>