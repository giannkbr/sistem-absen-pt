	<div class="navbar-custom">
		<div class="container-fluid">

			<div id="navigation">

				<!-- Navigation Menu-->
				<ul class="navigation-menu">

					<li class="has-submenu">
						<a href="/"><i class="icon-accelerator"></i> Dashboard</a>
					</li>

					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Master Data <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<li><a href="<?= base_url('data-karyawan'); ?>">Data Karyawan</a></li>
									<li><a href="<?= base_url('data-jabatan'); ?>">Data Jabatan</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Rekap Data <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<li><a href="<?= base_url('data-absensi'); ?>">Rekap Data Absensi</a></li>
									<li><a href="<?= base_url('data-overtime'); ?>">Rekap Data Overtime</a></li>
									<li><a href="<?= base_url('data-cuti'); ?>">Rakap Data Cuti</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="has-submenu">
						<a href="<?= base_url('rekap-absensi'); ?>"><i class="icon-pencil-ruler"></i> Laporan </a>
					</li>
				</ul>
				<!-- End navigation menu -->
			</div>
			<!-- end #navigation -->
		</div>
		<!-- end container -->
	</div>
