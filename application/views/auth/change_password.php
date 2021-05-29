<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>E - Absensi | <?= $title; ?></title>
	<meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
	<meta content="Themesdesign" name="author" />
	<link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico">

	<link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/metismenu.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

	<!-- Begin page -->
	<div class="accountbg"></div>
	<div class="home-btn d-none d-sm-block">
		<a href="#" class="text-white"><i class="fas fa-home h2"></i></a>
	</div>
	<div class="wrapper-page">
		<div class="card card-pages shadow-none">

			<div class="card-body">
				<div class="text-center m-t-0 m-b-15">
					<a href="#" class="logo logo-admin"><img src="<?= base_url('assets/') ?>images/logo-dark.png" alt="" height="24"></a>
				</div>
				<h5 class="font-18 text-center">Reset Password</h5>

				<form action="<?= base_url('auth/change_password') ?>" method="post">

					<!-- <div class="col-12">
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Enter your <b>Email</b> and instructions will be sent to you!
						</div>
					</div> -->


					<div class="form-group">
						<label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" name="new_password">
							<?= form_error('new_password', '<small class="text-danger mt-1">', '</small>'); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="password_confirm" class="col-sm-2 col-form-label">Konfirmasi Password</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" name="password_confirm">
							<?= form_error('password_confirm', '<small class="text-danger mt-1">', '</small>'); ?>
						</div>
					</div>


					<div class="form-group text-center m-t-20">
						<div class="col-12">
							<button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Reseet Password</button>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
	<!-- END wrapper -->

	<!-- jQuery  -->
	<script src="<?= base_url('assets/') ?>js/jquery.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/metismenu.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/jquery.slimscroll.js"></script>
	<script src="<?= base_url('assets/') ?>js/waves.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url('assets/') ?>js/app.js"></script>

</body>

</html>
