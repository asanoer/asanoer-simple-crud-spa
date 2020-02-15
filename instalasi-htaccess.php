<?php
$langkah = (ISSET($_GET['langkah']))? $_GET['langkah'] : 1;

if($langkah == 1 ){
    ?>
    Anda Akan Mengkofigurasi file HTACCESS secara otomatis<br/>
    Silahkan ikuti link Ini.</br>
    <a href="?langkah=2">Konfigurasi File >></a>
    <?php
}

if($langkah == 2 ){
    ?>
    <meta http-equiv="Refresh" content="0; url=instalasi-htaccess.php?langkah=3" />
    Sedang Mengkonfigurasi file, Tunggu......
    <?php
}

if($langkah == 3 ){
    $path = $_SERVER['PHP_SELF'];
    $filename = basename($path);
    $direktori = str_replace($filename,"",$path);
    if(file_exists(".htaccess")){
        $myfile = fopen(".htaccess", "r") or die("Mati 1 !");
        $data = fread($myfile,filesize(".htaccess"));
        fclose($myfile);
        if(!strpos($data, $direktori)) {
            $myfile = fopen(".htaccess", "w") or die("Mati 2 !");
            $txt = "### KONFIGURASI YANG SAMA PADA WORDPRESS.\n### UNTUK MENGHILANGKAN INDEX.PHP\nRewriteEngine On\n\n### SILAHKAN EDIT BARIS BERIKUT SESUAIKAN NAMA ROOT FOLDER\nRewriteBase $direktori\n#            <----- root folder ------->\n\n## BARIS BERIKUT JANGAN DI UBAH2\nRewriteRule ^index\.php$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . index.php [L]";
            fwrite($myfile, $txt);
            fclose($myfile);
            sleep(5);
            echo "<strong>----Selesai----</strong><br/><br/><br/><a href='index.php'>Kembali</a>";
        }
    } else {
        $myfile = fopen(".htaccess", "w") or die("Mati 2 !");
            $txt = "### KONFIGURASI YANG SAMA PADA WORDPRESS.\n### UNTUK MENGHILANGKAN INDEX.PHP\nRewriteEngine On\n\n### SILAHKAN EDIT BARIS BERIKUT SESUAIKAN NAMA ROOT FOLDER\nRewriteBase $direktori\n#            <----- root folder ------->\n\n## BARIS BERIKUT JANGAN DI UBAH2\nRewriteRule ^index\.php$ - [L]\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule . index.php [L]";
            fwrite($myfile, $txt);
            fclose($myfile);
            sleep(5);
            echo "<strong>----Selesai----</strong><br/><br/><br/><a href='index.php'>Kembali</a>";
    }
}
?>