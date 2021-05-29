<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>E - Absensi | <?= $title ?></title>
	<meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
	<meta content="Themesdesign" name="author" />
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico">

	<!--Morris Chart CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/morris/morris.css">

	<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">

	<!-- DataTables -->
	<link href="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/') ?>plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

	<!-- Responsive datatable examples -->
	<link href="<?= base_url('assets/') ?>plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<div class="header-bg">
		<!-- Navigation Bar-->
		<header id="topnav">
			<div class="topbar-main">
				<div class="container-fluid">

					<!-- Logo-->
					<div>
						<a href="index.html" class="logo">
							<span class="logo-light">
								<i class="mdi mdi-camera-control"></i> E - Absensi
							</span>
						</a>
					</div>
					<!-- End Logo-->

					<div class="menu-extras topbar-custom navbar p-0">

						<ul class="navbar-right ml-auto list-inline float-right mb-0">

							<!-- full screen -->
							<li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
								<a class="nav-link waves-effect" href="#" id="btn-fullscreen">
									<i class="mdi mdi-arrow-expand-all noti-icon"></i>
								</a>
							</li>


							<li class="dropdown notification-list list-inline-item">
								<div class="dropdown notification-list nav-pro-img">
									<a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
										<img src="<?= base_url('assets/') ?>images/users/user-4.jpg" alt="user" class="rounded-circle">
									</a>
									<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
										<!-- item-->
										<a href="#" class="dropdown-item">Hai, <?= $this->session->userdata('nama') ?></a>
										<a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i>
											Profile</a>
										<a class="dropdown-item d-block" href="<?php base_url('auth/change_password') ?>"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings"></i> Settings</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
											<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
											Logout
										</a>
									</div>
								</div>
							</li>

							<li class="menu-item dropdown notification-list list-inline-item">
								<!-- Mobile menu toggle-->
								<a class="navbar-toggle nav-link">
									<div class="lines">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</a>
								<!-- End mobile menu toggle-->
							</li>

						</ul>

					</div>
					<!-- end menu-extras -->

					<div class="clearfix"></div>

				</div>
				<!-- end container -->
			</div>
			<!-- end topbar-main -->

			<!-- MENU Start -->
			<?php
			if ($this->session->userdata('role_id') == 1) {
				$this->load->view('templates/admin_sidebar');
			} else {
				$this->load->view('templates/user_sidebar');
			}
			?>
			<!-- end navbar-custom -->
		</header>
		<!-- End Navigation Bar-->

	</div>
	<!-- header-bg -->

	<!-- Wrapper -->
	<div class="wrapper">
		<div class="container-fluid">
			<!-- Page-Title -->
			<!-- Page-Title -->
			<div class="page-title-box">
				<div class="row align-items-center">
					<div class="col-sm-6">
						<h4 class="page-title"><?= $title; ?></h4>
					</div>
					<div class="col-sm-6">
						<ol class="breadcrumb float-right">
							<li class="breadcrumb-item"><a href="javascript:void(0);"><?= $subtitle; ?></a></li>
							<li class="breadcrumb-item"><a href="javascript:void(0);"><?= $subtitle2; ?></a></li>
						</ol>
					</div>
				</div>
				<!-- end row -->
			</div>
			<?php $this->load->view($page) ?>
		</div>
		<!-- end container-fluid -->
	</div>

	<!-- end wrapper -->

	<!-- Footer -->
	<?php $this->load->view('templates/footer') ?>
	<!-- End Footer -->

	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Yakin ingin keluar ?</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery  -->
	<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery.slimscroll.js"></script>
	<script src="<?= base_url('assets/') ?>js/waves.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url('assets/') ?>js/app.js"></script>


	<!-- Required datatable js -->
	<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Buttons examples -->
	<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.buttons.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/jszip.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/pdfmake.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/vfs_fonts.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.html5.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.print.min.js"></script>
	<script src="<?= base_url('assets/') ?>plugins/datatables/buttons.colVis.min.js"></script>

	<!-- Datatable init js -->
	<script src="<?= base_url('assets/') ?>pages/datatables.init.js"></script>

	<!-- sweetalert -->
	<script src="<?php echo base_url('assets/') ?>alert.js"></script>
	<?php echo "<script>" . $this->session->flashdata('message') . "</script>" ?>
</body>

</html>
