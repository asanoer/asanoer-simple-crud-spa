<?php

//// CEK FILE HTACCESS ////////////////
$path = $_SERVER['PHP_SELF'];
$filename = basename($path);
$direktori = str_replace($filename,"",$path);
if(file_exists(".htaccess")){
    $myfile = fopen(".htaccess", "r") or die("Mati 1 !");
    $data = fread($myfile,filesize(".htaccess"));
    fclose($myfile);
    if(!strpos($data, $direktori)) {
        echo "Perlu instalasi HTACCESS<br/>Silahkan Ikuti Link Ini</br><a href='instalasi-htaccess.php'>INSTALL</a>";
        exit();
    }
} else {
    echo "Perlu instalasi HTACCESS<br/>Silahkan Ikuti Link Ini</br><a href='instalasi-htaccess.php'>INSTALL</a>";
    exit();
}
//////////////////////////////////////


DEFINE("ASANOER_PENGAMAN_AKSES","ASANOER.com");
include_once "asanoer-konfig/asanoer.com-konfig.php";  // All constanta
/////////////////////////////////////////////////////////////////////////
   file_put_contents("my-logger.html", "Log Access :".ASANOER_TANGGAL." ".ASANOER_JAM." On: ".ASANOER_URL_UTUH."<br/>\n", FILE_APPEND); 
///////////////////////////////////////////////////////////////////////
include_once "asanoer.com-index-modul.php"; // index  kumpulan modul
?>