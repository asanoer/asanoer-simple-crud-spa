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
if(($aksi!='') && ($aksi=='ubahkan')) {

	// SIAPKAN VARIABEL SESUAI NAMA KOLOM TABEL
	$nameuser			= '';
	$passuser			= '';
	$namalengkapuser	= '';
	$alamatuser			= '';
	
	// BACA SEMUA VARIABEL TERKIRIM TERMASUK DATANYA DARI FORM METODE POST
	extract($_POST);
	
	// CEK KEKOSONGAN VARIABEL
	$pesan = '';
	($nameuser != '') or $pesan .= 'Username Jangan Kosong<br/>'.PHP_EOL;
	($passuser != '') or $pesan .= 'Password Jangan Kosong<br/>'.PHP_EOL;
	($namalengkapuser != '') or $pesan .= 'Nama Lengkap Jangan Kosong<br/>'.PHP_EOL;
	($alamatuser != '') or $pesan .= 'Alamat Jangan Kosong<br/>'.PHP_EOL;

	// SIAPKAN TEKS SQL UBAH BARIS "UPDATE" BERDASARKAN KODEUSER TERPILIH
	$sql = "
			UPDATE $tb SET
				nameuser		= '$nameuser',
				passuser		= '$passuser',
				namalengkapuser	= '$namalengkapuser',
				alamatuser		= '$alamatuser'
			WHERE iduser		= '$kduser'
			";
	
	// KERJAKAN TRANSAKSI UBAH BARIS DATABASE
	// JIKA TERJADI EROR TAMPILKAN EROR DAN
	// ALIHKAN KE FORM HALAMAN INI LAGI
	if($pesan == ''){
		$xdatabase->query($sql) or $pesan .= "Kesalahan Ubah Data :<br/>$xdatabase->error()".PHP_EOL;
	}
	$xdatabase->close(); // TUTUP KONEKSI DATABASE
	$judulpesan = 'Pesan Kesalahan !!<br/>=====================================<br/>';
	// TAMPILKAN PESAN UNTUK DIALIHKAN KE FORM INI
	if($pesan!='')exit($judulpesan.$pesan);
	
	// UBAH DATA SUKSES,
	// ALIHLKAN KE HOME / HALAMAN DAFTAR USER
	exit("UPDATE OKE");
} else {
	
	// CEK, KODE USER DISEBUTKAN?
	if($kduser=="") // ALIHLKAN KE HOME / HALAMAN DAFTAR USER
		exit("
		<script>
		location.hash = $('#asanoerload').attr('loadnya');
		</script>
		");
	
	// JIKA COMMAND / PRINTAH TIDAK ADA MAKA AMBIL BARIS YANG AKAN DIEDIT KE FORM
	// SIAPKAN TEKS SQL PILIH BARIS BERDASARKAN KODEUSER YANG DIPILIH UNTUK UBAH
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
			<h1 class="page-header">Mengubah Data User</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<form class="formulir-page" action="<?php echo ASANOER_MAIN_URL.'index-update.php?aksi=ubahkan&kduser='.$kduser;?>" method="post" role="form">
		<div class="row">
			<p>&nbsp;</p>
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" placeholder="Isi Username Sebagai Login" name="nameuser" value="<?php echo($nameuser) ?>">
				<p class="help-block">Isi Username Untuk Login Masuk</p>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" placeholder="Masukkan Kata Kunci / Password" name="passuser" value="<?php echo($passuser) ?>">
				<p class="help-block">Kata Kunci Untuk Login Masuk Minimal 6 karakter</p>
			</div>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input class="form-control" placeholder="Nama Lengkap" name="namalengkapuser" value="<?php echo($namalengkapuser) ?>">
			</div>
			<div class="form-group">
				<label>Alamat KTP / SIM</label>
				<textarea class="form-control" rows="3" placeholder="Alamat Lengkap KTP / SIM"  name="alamatuser"><?php echo($alamatuser)?></textarea>
			</div>
		</div>
		<!-- /.row -->
		<p class="text-center">
			<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>&nbsp;&nbsp;
			<a class="btn btn-danger" href="#home.php"><i class="fa fa-repeat"></i> BATAL</a>
		</p>
	</form>
</div>
<script type="text/javascript">
     $("title").html('<?php echo(ASANOER_NAMA_APLIKASI)?> | Ubah User');
</script>