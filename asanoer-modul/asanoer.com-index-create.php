<?php
$tidakakses = 'Tidak dapat diakses langsung !!!';
defined('ASANOER_NAMA_APLIKASI') or exit($tidakakses);
if(isset($_SERVER['HTTP_REFERER'])) {(!strpos($_SERVER['HTTP_REFERER'], ASANOER_INDEX_APLIKASI)) and exit($tidakakses);} else {exit($tidakakses);}

//read variabel on sky
$aksi = ''; // SIAPKAN VARIABEL UNTUK COMMAND / PRINTAH
extract($_GET); // BACA SEMUA VARIABEL DALAM GET

// CEK COMMAND ATAU PRINTAH
if(($aksi!='') && ($aksi=='tambahkan')) {
	// AKTIFKAN KONEKSI DATABASE
	include(ASANOER_FOLDER_PELENGKAP.'koneksi-nya.php');

	//Tabel Database
	$tb = ASANOER_DB_TABEL_PREFIX."user";
	
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
	
	// SIAPKAN TEKS SQL TAMBAH BARIS BARU "INSERT"
	$sql = "INSERT INTO $tb (nameuser, passuser, namalengkapuser, alamatuser) VALUES ('$nameuser','$passuser','$namalengkapuser','$alamatuser')";
	
	// KERJAKAN TRANSAKSI TAMBAH BARIS BARU KE DATABASE
	// JIKA TERJADI EROR TAMPILKAN EROR DAN
	// ALIHKAN KE FORM HALAMAN INI LAGI
	if($pesan == ''){
		$xdatabase->query($sql) or $pesan .= "Kesalahan Tambah Data :<br/>$xdatabase->error()".PHP_EOL;
	}
	$xdatabase->close(); // TUTUP KONEKSI DATABASE
	$judulpesan = 'Pesan Kesalahan !!<br/>=====================================<br/>';
	// TAMPILKAN PESAN UNTUK DIALIHKAN KE FORM INI
	if($pesan!='')exit($judulpesan.$pesan);
	
	// SIMPAN DATA SUKSES,
	// ALIHLKAN KE HOME / HALAMAN DAFTAR USER
	exit("CREATE OKE");
	// PRINTAH EXIT / DIE BISA DIBUAT UNTUK MEMUTUSKAN SCRIPT BERIKUTNYA.
}


?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Formulir User Baru</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<form class="formulir-page" action="<?php echo ASANOER_MAIN_URL.'index-create.php?aksi=tambahkan';?>" method="post" role="form">
		<div class="row">
			<p>&nbsp;</p>
			<div class="form-group">
				<label>Username</label>
				<input class="form-control" placeholder="Isi Username Sebagai Login" name="nameuser">
				<p class="help-block">Isi Username Untuk Login Masuk</p>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input class="form-control" placeholder="Masukkan Kata Kunci / Password" name="passuser">
				<p class="help-block">Kata Kunci Untuk Login Masuk Minimal 6 karakter</p>
			</div>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input class="form-control" placeholder="Nama Lengkap" name="namalengkapuser">
			</div>
			<div class="form-group">
				<label>Alamat KTP / SIM</label>
				<textarea class="form-control" rows="3" placeholder="Alamat Lengkap KTP / SIM"  name="alamatuser"></textarea>
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
     $("title").html('<?php echo(ASANOER_NAMA_APLIKASI)?> | Create User Baru');
</script>