<?php
defined('ASANOER_NAMA_APLIKASI') or exit('Tidak dapat diakses langsung !!!');
?>

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<i class="fa fa-info fa-fw"></i> Menu
                </button>
                <a class="navbar-brand" href="<?php echo ASANOER_MAIN_URL.ASANOER_INDEX_APLIKASI; ?>"><strong><img src="<?php echo ASANOER_MAIN_URL.ASANOER_FOLDER_GBR."kopi.jpg"; ?>" width="30px" height="30px"/>
				&nbsp;&nbsp;<?php echo ASANOER_NAMA_APLIKASI; ?></strong></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        ASANOER.com - CRUD <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li><a href="#help-me.php"><i class="fa fa-info fa-fw"></i> Tentang Demo CRUD ini</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="http://www.asanoer.com"><i class="fa fa-sign-out fa-fw"></i> www.asanoer.com</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
			 <!-- /.navbar-left -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input id="txt-cari" type="text" class="form-control" placeholder="CARI NAMA LENGKAP">
                                <span class="input-group-btn">
                                    <button title="Cari / Refresh Data" id="tb-cari" class="btn btn-default" type="button">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
			<li>
                <a href="#home.php"><i class="fa fa-home fa-fw"></i> HOME</a>
            </li>
			<li>
				<a href="#index-create.php"><i class="fa fa-plus fa-fw"></i> TAMBAH USER</a>
			</li>
			<li>
			     <a href="#help-me.php"><i class="fa fa-info fa-fw"></i> Tentang Demo CRUD ini</a>
			</li>
			<li>
			     <a target="_blank" href="<?php echo ASANOER_MAIN_URL.'my-logger.html'; ?>"><i class="fa fa-database fa-fw"></i> MY Logger</a>
			</li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>