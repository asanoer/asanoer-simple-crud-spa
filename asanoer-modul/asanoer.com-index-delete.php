<?php
$tidakakses = 'Tidak dapat diakses langsung !!!';
defined('ASANOER_NAMA_APLIKASI') or exit($tidakakses);
if(isset($_SERVER['HTTP_REFERER'])) {(!strpos($_SERVER['HTTP_REFERER'], ASANOER_INDEX_APLIKASI)) and exit($tidakakses);} else {exit($tidakakses);}


//read variabel on sky
$kduser = '';  // SIAPKAN VARIABEL UNTUK SIMPAN KODE USER DARI URL (IDUSER)
$aksi = ''; // SIAPKAN VARIABEL UNTUK COMMAND / PRINTAH
extract($_GET); // BACA SEMUA VARIABEL DALAM GET

// AKTIFKAN KONEKSI DATABASE
include(ASANOER_FOLDER_PELENGKAP.'koneksi-nya.php');

//Tabel Database
$tb = ASANOER_DB_TABEL_PREFIX."user";

// CEK COMMAND ATAU PRINTAH
if(($aksi!='') && ($aksi=='hapuskan')) {

	// CEK KODE USER
	$pesan = '';
	($kduser != '') or $pesan .= 'Kode User Tidak Terdeteksi<br/>'.PHP_EOL;

	// SIAPKAN TEKS SQL HAPUS BARIS "DELETE" BERDASARKAN KODEUSER TERPILIH
	$sql = "DELETE FROM $tb
			WHERE iduser = '$kduser'";
	
	// KERJAKAN TRANSAKSI HAPUS BARIS DATABASE
	// JIKA TERJADI EROR TAMPILKAN EROR DAN
	// ALIHKAN KE HALAMAN INI LAGI
	if($pesan == ''){
		$xdatabase->query($sql) or $pesan .= "Kesalahan Hapus Data :<br/>$xdatabase->error()".PHP_EOL;
	}
	$xdatabase->close(); // TUTUP KONEKSI DATABASE
	$judulpesan = 'Pesan Kesalahan !!<br/>=====================================<br/>';
	// TAMPILKAN PESAN UNTUK DIALIHKAN KE FORM INI
	if($pesan!='')exit($judulpesan.$pesan);
	
	// HAPUS PERMANEN UNTUK BARIS DATA SUKSES,
	// ALIHLKAN KE HOME / HALAMAN DAFTAR USER
	exit("HAPUS OKE");
} else {
	
	// CEK, KODE USER DISEBUTKAN?
	if($kduser=="") // ALIHLKAN KE HOME / HALAMAN DAFTAR USER
		exit("
		<script>
		location.hash = $('#asanoerload').attr('loadnya');
		</script>
		");
	
	// JIKA COMMAND / PRINTAH TIDAK ADA MAKA AMBIL BARIS YANG AKAN DIHAPUS KE TAMPILAN
	// SIAPKAN TEKS SQL PILIH BARIS BERDASARKAN KODEUSER YANG DIPILIH UNTUK DIHAPUS
	$sql = "SELECT * FROM $tb WHERE iduser = '$kduser'";
	
	// KERJAKAN TRANSAKSI AMBIL DATA
	// JIKA EROR TAMPILKAN EROR
	$query = $xdatabase->query($sql);
	// SIAPKAN VARIABEL UNTUK CEK DATA
	$cekData = FALSE;
	// AMBIL DATA KE DALAM ARRAY
	if($data = $query->fetch_array(MYSQLI_ASSOC)){
		// EKSTRAKSI ARRAY MENJADI VARIABEL TERSENDIRI
		Extract($data);
		// TUTUP TRANSAKSI
		$query->free();
		// SET CEK DATA
		$cekData = TRUE;
	}
	// JIKA TIDAK ADA DATA DENGAN KODE USER INI MAKA TAMPILKAN TEKS KESALAHAN
	if (!$cekData) {
		// ALIHLKAN KE HOME / HALAMAN DAFTAR USER
		exit("
		<script>
		location.hash = $('#asanoerload').attr('loadnya');
		</script>
		");
	}
}
// TAMPILKAN FORM BERIKUT
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Menghapus Data User <?php echo($kduser)?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<p>
				Apakah Anda benar-benar akan menghapus data user nama <strong>"<?php echo($namalengkapuser)?>"</strong> dengan nomor <strong>"<?php echo($kduser)?>"</strong> ?
			</p>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<form class="formulir-page" action="<?php echo ASANOER_MAIN_URL.'index-delete.php?aksi=hapuskan&kduser='.$kduser;?>" method="post" role="form">
		<p class="text-right">
			<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> HAPUS</button>&nbsp;&nbsp;
			<a class="btn btn-primary" href="#home.php"><i class="fa fa-repeat"></i> BATAL</a>
		</p>
	</form>
</div>
<script type="text/javascript">
     $("title").html('<?php echo(ASANOER_NAMA_APLIKASI)?> | Ubah User');
</script>