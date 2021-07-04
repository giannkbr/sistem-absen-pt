	<div class="navbar-custom">
		<div class="container-fluid">

			<div id="navigation">

				<!-- Navigation Menu-->
				<ul class="navigation-menu">

					<li class="has-submenu">
						<a href="<?= base_url('user') ?>"><i class="icon-accelerator"></i> Dashboard</a>
					</li>

					<li class="has-submenu">
						<a href="<?= base_url('Absen/getAbsenId/' . $this->session->userdata('nip')) ?>"><i class="icon-pencil-ruler"></i> Data Absensi</a>
					</li>
					<li class="has-submenu">
						<a href="<?= base_url('data-overtime-karyawan'); ?>"><i class="icon-pencil-ruler"></i> Data Overtime</a>
					</li>
					<li class="has-submenu">
						<a href="<?= base_url('data-cuti-karyawan'); ?>"><i class="icon-pencil-ruler"></i> Data Cuti</a>
					</li>
					<li class="has-submenu">
						<a href="<?= base_url('laporan/getLaporanById/' . $this->session->userdata('nip')) ?>">
							<i class="icon-pencil-ruler"></i> Laporan
						</a>
					</li>

				</ul>
				<!-- End navigation menu -->
			</div>
			<!-- end #navigation -->
		</div>
		<!-- end container -->
	</div>
