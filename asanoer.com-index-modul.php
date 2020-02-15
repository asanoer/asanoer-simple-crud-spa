<?php
defined('ASANOER_NAMA_APLIKASI') or exit('Tidak dapat diakses langsung !!!');

// Penggal dan ambil URL dibelakang ROOT Folder
$pecah = explode(ASANOER_MAIN_URL,ASANOER_URL_UTUH);
$halaman = $pecah[1];
// Jika hasil pemenggalan mengandung tanda ? , maka ambil nama di depan tanda ?
if(strpos($halaman, "?")) {
	$xhal = explode("?",$pecah[1]);
	$halaman = $xhal[0];
}
/// Baris ini hanya untuk animasi loading saja, bisa dihapus !!
if(($halaman!=ASANOER_INDEX_APLIKASI)&&($halaman!="")){
	sleep(2);
}
// Halaman2 routing URL
switch ($halaman) {
    // Menampilkan page "Wadah" saat mengakses sebuah folder URL
	case "":
		{header("location:".ASANOER_MAIN_URL.ASANOER_INDEX_APLIKASI); } // index
	break;
	// Sata URL mengandung index.php maka alihkan ke ASANOER_INDEX_APLIKASI
	case "index.php":
		?><script>
		alert('Tidak Ada Nama Modul dengan nama \n "<?php echo($halaman)?>". Silahkan cek kembali file asanoer.com-index-modul.php \n Oleh: asanoer.com');
		window.location = '<?php echo ASANOER_MAIN_URL.ASANOER_INDEX_APLIKASI; ?>';
		</script><?php
	break;
	// Menampilkan halaman "Wadah"
	case ASANOER_INDEX_APLIKASI:
		include('asanoer-modul/asanoer.com-index.php'); // hal. wadah berisi JS dll
		exit();
		break;
	// Loading Modul CREATE
	case "index-create.php":
		include('asanoer-modul/asanoer.com-index-create.php'); // Modul READ
        break;
    // Loading Modul READ
    case "home.php":
		include('asanoer-modul/asanoer.com-index-read.php'); // Modul READ
        break;
	// Loading Modul UPDATE
	case "index-update.php":
		include('asanoer-modul/asanoer.com-index-update.php'); // Modul READ
        break;
	// Loading Modul DELETE
	//////////////////////////////
	// Loading Modul HELP.
    case "help-me.php":
		include('asanoer-modul/asanoer.com-help.php'); // Modul HELP
        break;
	// Loading Tidak Ada Nama Modul
    default:
		?><script>
		alert('Tidak Ada Nama Modul dengan nama \n "<?php echo($halaman)?>". Silahkan cek kembali file asanoer.com-index-modul.php \n Oleh: asanoer.com');
		window.location = '<?php echo ASANOER_MAIN_URL.ASANOER_INDEX_APLIKASI; ?>';
		</script><?php
        break;	
}
?>