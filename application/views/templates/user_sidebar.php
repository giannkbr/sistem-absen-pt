	<div class="navbar-custom">
		<div class="container-fluid">

			<div id="navigation">

				<!-- Navigation Menu-->
				<ul class="navigation-menu">

					<li class="has-submenu">
						<a href="/"><i class="icon-accelerator"></i> Dashboard</a>
					</li>

					<li class="has-submenu">
						<a href="<?= base_url('Absen/getAbsenId/' . $this->session->userdata('nip')) ?>"><i class="icon-pencil-ruler"></i> Data Absensi</a>
					</li>
					<li class="has-submenu">
						<a href="<?= base_url('data-overtime-karyawan'); ?>"><i class="icon-pencil-ruler"></i> Data Overtime</a>
					</li>
					<li class="has-submenu">
						<a href="<a href=" <?= base_url('data-cuti-karyawan'); ?>"><i class="icon-pencil-ruler"></i> Data Cuti</a>
					</li>
					<li class="has-submenu">
						<a href="#"><i class="icon-pencil-ruler"></i> Laporan <i class="mdi mdi-chevron-down mdi-drop"></i></a>
						<ul class="submenu megamenu">
							<li>
								<ul>
									<li><a href="<?= base_url('cetak-data-absensi'); ?>">Data Absensi</a></li>
									<li><a href="<?= base_url('cetak-data-overtime'); ?>">Data Overtime</a></li>
									<li><a href="<?= base_url('cetak-data-cuti'); ?>">Data Cuti</a></li>
								</ul>
							</li>
						</ul>
					</li>

				</ul>
				<!-- End navigation menu -->
			</div>
			<!-- end #navigation -->
		</div>
		<!-- end container -->
	</div>
