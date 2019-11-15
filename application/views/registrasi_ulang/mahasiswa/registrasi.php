<?php echo notif($id_users,$semester); ?>

<div class="col-md-3" data-plugin-portlet id="portlet-1">
							<section class="panel panel-primary" id="panel-1" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Lab PPM</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_ppm($id_users,$semester); ?>
								</div>
							</section>
							<section class="panel panel-secondary" id="panel-2" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Perpustakaan</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_perpus($id_users,$semester); ?>
								</div>
							</section>
							
						</div>

<div class="col-md-3" data-plugin-portlet id="portlet-1">
							<section class="panel panel-success" id="panel-1" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Lab TPS</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_tps($id_users,$semester); ?>
								</div>
							</section>
							<section class="panel panel-secondary" id="panel-2" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Keuangan</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_keuangan($id_users,$semester); ?>
								</div>
							</section>
							
						</div>

<div class="col-md-3" data-plugin-portlet id="portlet-1">
							<section class="panel panel-quartenary" id="panel-1" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Lab TIF</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_tif($id_users,$semester); ?>
								</div>
							</section>
							<section class="panel panel-secondary" id="panel-2" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">KHS</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_khs($id_users,$semester); ?>
								</div>
							</section>
							
						</div>

<div class="col-md-3" data-plugin-portlet id="portlet-1">
							<section class="panel panel-secondary" id="panel-1" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Kompensasi</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_kompensasi($id_users,$semester); ?>
								</div>
							</section>
							<section class="panel panel-secondary" id="panel-2" data-portlet-item>
								<header class="panel-heading portlet-handler">
									<div class="panel-actions">
										<a href="#" class="fa fa-caret-down"></a>
										<a href="#" class="fa fa-times"></a>
									</div>

									<h2 class="panel-title">Ka Prodi</h2>
								</header>
								<div class="panel-body">
									<?php echo validasi_kaprodi($id_users,$semester); ?>
								</div>
							</section>
							
						</div>



