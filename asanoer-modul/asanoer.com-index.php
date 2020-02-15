<?php
defined('ASANOER_NAMA_APLIKASI') or exit('Tidak dapat diakses langsung !!!');

# include(ASANOER_FOLDER_PELENGKAP.'koneksi-nya.php');
include(ASANOER_FOLDER_PELENGKAP.'header-nya.php');
?>

<body>
	<div id="wrapper">
	<?php include(ASANOER_FOLDER_PELENGKAP.'menu-nya.php'); ?>
	<!-- Page Content -->
        <div id="page-wrapper">
			<!-- Untuk menampilkan respon dari JS -->
			<div id="x-respon" class="col-lg-12">&nbsp;</div>
			<!-- Untuk menampilkan halaman - halaman SPA -->
			<div id="asanoerload" loadnya="#home.php"></div>
		</div>
	</div>
	<!-- Modal HTML / Untuk penggunaan mendatang -->
	<div id="load-modal"></div>
	<!-- Animasi Loading AJAX -->
	<div id="loading-animasi" class="asanoer-loading-teks"><strong><i class='fa fa-spinner fa-spin'></i> Sedang Mengambil....</strong></div>
	
	<?php include(ASANOER_FOLDER_PELENGKAP.'footer-nya.php'); ?>
<br/><br/><br/>
<div id="footer" style="background-color:#f79646;color:#ffffff;">
	<p>Hak Cipta &copy; 2015 - Sekarang oleh Asanoer.com</p>
</div>
<?php # $xdatabase->close(); ?>
<script type="text/javascript">
var rooturl = "<?php echo(ASANOER_MAIN_URL)?>";
var cariteks;
$(document).ready(function(){
	// Rutin untuk respon POST formulir
	function responpage(dtrespon) {
		cariteks = dtrespon.search("Pesan Kesalahan");
		if(cariteks>-1) {
			$("#x-respon").html('<div class=\"alert alert-danger  alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">TUTUP [x]</button><strong>'+dtrespon+'</strong></div>');
			hideAlert();
		}
		if(dtrespon == "CREATE OKE"){
			$("#x-respon").html('<div class=\"alert alert-info alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">TUTUP [x]</button><B>Data Berhasil Dicreate</B></div>');
			hideAlert();
			location.hash = $("#asanoerload").attr("loadnya");
		}
		if(dtrespon == "UPDATE OKE"){
			$("#x-respon").html('<div class=\"alert alert-info alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">TUTUP [x]</button><B>Update User Berhasil</B></div>');
			hideAlert();
			location.hash = $("#asanoerload").attr("loadnya");
		}
	}
	function hideAlert(){
		setTimeout(function(){ $(".alert").hide(); }, 5000);
	}
	//////////// AJAX UI INDICATOR - LOADING
	$('.page-loading').hide();
	$.ajaxSetup({
		beforeSend:function(){
			$('#loading-animasi').show();
		},
		complete:function(){
			$('#loading-animasi').fadeOut('2000');
			x = window.location; // URL lengkap termasuk Hash
			lokasiIni = String(x); // Jadikan string
			menuAktip(lokasiIni);
		}
	});
	
	//////////// AJAX POSTING DATA
	$(document).on('submit',".formulir-page", function(e){
	e.preventDefault();
	var formData = new FormData(this);
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'), //+'&@page;',
			data: formData, //$(this).serialize(),
			cache:false,
            contentType: false,
            processData: false,
			success: function(data) {
				responpage(data);
			}
		})
		return false;
	});
// Sumber = https://developer.mozilla.org/en-US/docs/Web/API/WindowEventHandlers/onhashchange
// Fungsi penanganan hash
var x; var lokasiIni;
	function hashHandler() {
		x = window.location; // URL lengkap termasuk Hash
		lokasiIni = String(x); // Jadikan string
		//menuAktip(lokasiIni);
		var pis = lokasiIni.split("#"); // Pisahkan URL di depan Hash dan di belakang
		//Cek jika undefined
		if (typeof pis[1] === 'undefined'){
			location.hash = $("#asanoerload").attr("loadnya");
			return;
		}
		// Ambil Halaman Dari Server Melalui AJAX.
		$("#asanoerload").load(rooturl+pis[1]);
	}
// 1. Tindakan saat hash tidak ada di URL
	if(!location.hash) {
		location.hash = $("#asanoerload").attr("loadnya");
	}
// 2. Tindakan saat hash sudah disertakan dalam URL
window.onhashchange = hashHandler();
// 3. Tindakan saat ada perubahan hash dalam URL
window.addEventListener('hashchange', hashHandler, false);

/////////// SEARCH BUTTON OR REFRESH
	$("#tb-cari").click(function(){
		location.hash = $("#asanoerload").attr("loadnya")+'?cari='+encodeURIComponent($("#txt-cari").val());
	});
	
/////////// SEARCH ENTRY KEYWORD TEXT
	$("#txt-cari").keydown(function (e) {
    	if (e.keyCode == 13) {  //($(this.id).is(":focus") && 
        	// Do something
        	location.hash = $("#asanoerload").attr("loadnya")+'?cari='+encodeURIComponent($("#txt-cari").val());
    	}
	});

/////////// RUTIN MENU AKTIF
	function menuAktip(urlnya){
		$('#side-menu li a').removeClass('active');
    	var menu = $("#side-menu li a").filter(function(){
            cariteks = urlnya.search(this.href);
            if(cariteks>-1) { return true } else {return false}
        });
    	menu.addClass('active');
	}
});
</script>
</body>
</html>