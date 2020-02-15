<?php
$tidakakses = 'Tidak dapat diakses langsung !!!';
defined('ASANOER_NAMA_APLIKASI') or exit($tidakakses);
if(isset($_SERVER['HTTP_REFERER'])) {(!strpos($_SERVER['HTTP_REFERER'], ASANOER_INDEX_APLIKASI)) and exit($tidakakses);} else {exit($tidakakses);}

//read variabel on sky
$cari = "";
$kolom = "";
extract($_GET);
$kolom = "namalengkapuser";

//Menentukan lokasi database
include(ASANOER_FOLDER_PELENGKAP.'koneksi-nya.php');

//Tabel User
$tb = ASANOER_DB_TABEL_PREFIX."user";
?>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Daftar User</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
           <div class="row">
				<div class="col-lg-12">
				<p>Inilah nama-nama user yang terdaftar.</p>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <a href="#index-create.php" class="btn btn-success">User&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="alert alert-danger">
                                            <th style="width:10%">Tindakan</th>
                                            <th style="width:10%">ID User</th>
                                            <th style="width:20%">Username</th>
											<th style="width:20%">Nama Lengkap</th>
                                            <th style="width:40%">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
						<?php
					// Query listing data.						
						$query = "SELECT * FROM $tb WHERE $kolom LIKE '%$cari%' order by iduser ASC";
						if ($result = $xdatabase->query($query)) 
							{
                                $adadata = FALSE;
							// Cek End Of Row Data
								while ($crud_asanoer = $result->fetch_array(MYSQLI_ASSOC)) 
									{
                                        $adadata = TRUE;
										// Bongkar semua variabel array dari DB
										Extract($crud_asanoer);
										?>
										<tr id="<?php echo $iduser; ?>">
                                            <td>
                                                <tombol klas="asanoer-ubah" title="Ubah" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></tombol>
                                                <tombol klas="asanoer-hapus" title="Hapus" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></tombol>
                                                <tombol klas="asanoer-cetak" title="Cetak" class="btn btn-info btn-xs"><i class="fa fa-print"></i></tombol>
                                            </td>
                                            <td><?php echo $iduser;?></td>
                                            <td><?php echo $nameuser;?></td>
											<td><?php echo $namalengkapuser;?></td>
                                            <td><?php echo $alamatuser;?></td>
                                        </tr>
										<?php
									}
									$result->free();
									// Jika data tidak ditemukan dalam database
                                    if(!$adadata){ ?>
                                        <tr><td colspan="5">&nbsp;</td></tr>
                                        <tr class="alert alert-warning">
                                            <td colspan="5" class="text-center">
                                                <strong>Tidak ada user yang ditampilkan!!!</strong>
                                            </td>
                                        </tr>
                                        <tr><td colspan="5">&nbsp;</td></tr>
                                    <?php }
							}
						?>
									</tbody>
                                    <tfooter>
                                        <tr class="alert alert-danger">
                                            <th style="width:10%">Tindakan</th>
                                            <th style="width:10%">ID User</th>
                                            <th style="width:20%">Username</th>
                                            <th style="width:20%">Nama Lengkap</th>
                                            <th style="width:40%">Alamat</th>
                                        </tr>
                                    </tfooter>
								</table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
						<div class="panel-footer">
                            <a href="#index-create.php" class="btn btn-success">User&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
			</div>	
		</div>

<?php $xdatabase->close(); ?>
<script type="text/javascript">
    $(document).ready(function(){
    	//////////// MODAL JS HANDLING
		var id, klas;
		$('tombol').click(function () {
			id = $(this).parent().parent().attr('id');
			klas = $(this).attr('klas');
			switch(klas){
				case "asanoer-ubah":
					location.hash = "#index-update.php?kduser="+id;
				break;
				case "asanoer-hapus":
					alert("Maap, modul ini belum ada,\nsilahkan ikuti terus artikel asanoer.com");
				break;
				case "asanoer-cetak":
					alert("Maap, modul ini belum ada,\nsilahkan ikuti terus artikel asanoer.com");
				break;
			}
		});
        $("title").html('<?php echo(ASANOER_NAMA_APLIKASI)?> | home');
    });
</script>