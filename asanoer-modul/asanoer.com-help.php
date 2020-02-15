<?php
$tidakakses = 'Tidak dapat diakses langsung !!!';
defined('ASANOER_NAMA_APLIKASI') or exit($tidakakses);
if(isset($_SERVER['HTTP_REFERER'])) {(!strpos($_SERVER['HTTP_REFERER'], ASANOER_INDEX_APLIKASI)) and exit($tidakakses);} else {exit($tidakakses);}
?>

<div class="container-fluid">
<div class="panel panel-yellow">
           <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" title="TUTUP">X</button>
                    <h4 class="modal-title">Tentang Demo CRUD SPA</h4>
            </div>
         <div class="panel-body">
               <p style="text-align: justify;">Demo ini asanoer buat untuk keperluan pembelajaran semata. Semua skrip kode dan data yang terkandung dalam demo ini mungkin terdapat hak cipta atau mungkin nama seseorang yang dimasukkan oleh pengunjung. Jadi mohon maaf jika terjadi hal demikian</p>
      <p style="text-align: justify;">Demo ini bersifat gratis untuk tujuan pembelajaran dan pengembangan. Mohon saran dan kritik jika terjadi kesalahan ataupun lainnya. Silahkan klik tombol download di bawah ini atau dapat dibaca artikelnya: <a href="#home.php" title="###" target="_blank">ARTIKEL ARTIKEL ARTIKEL ARTIKEL</a></p>
      <p>&nbsp;</p>
			   <p style="text-align: justify;">Email : <a href="http://www.asanoer.com/tentang-saya-about-me" title="Hubungi Saya" target="_blank">insan.perdana@asanoer.com</a></p>
			   <p style="text-align: justify;">Di Buat : </p>
      <p>&nbsp;</p>
          <p class="form-group"><label>History :</label><textarea class="form-control" id="asanoer-update" rows="15"></textarea></p>
          </div>
          <!-- /.modal-body -->
         <div class="panel-footer">
                        <p class="text-right">
			    <a href="#home.php" class="btn btn-danger"><i class="fa fa-download"></i> DOWNLOAD</a>
                            <a class="btn btn-primary" href="#home.php"><i class="fa fa-repeat"></i> TUTUP</a>
                        </p>    
        </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
  ///Load History
      $("#asanoer-update").load("<?php echo ASANOER_MAIN_URL.'update.txt'; ?>");
      $("title").html('<?php echo(ASANOER_NAMA_APLIKASI)?> | Help Me Please');
    });
</script>