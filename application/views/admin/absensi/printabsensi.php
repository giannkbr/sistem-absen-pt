<!DOCTYPE html>
<html lang="en">
<?php $no = 1;
foreach ($data as $d) { ?>

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<title>Data Absen | <?= ucfirst($d->nama) ?></title>
		<meta content="Sistem Mahsiswa Magang PERUM BULOG" name="description" />
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
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="text-primary" style="margin-top: 50px;">Dibawah Ini Merupakan Data Absensi Yang Telah Terdata:</p>
					<div class="card-body">
						<table id="datatables" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
							<thead>
								<th>Nomor</th>
								<th>Nama</th>
								<th>Tanggal Absen</th>
								<th>Jam Masuk</th>
								<th>Jam Pulang</th>
								<th>Deskripsi Kegiatan</th>
								<th>Keterangan</th>
							</thead>
							<tbody>
								<tr>
									<td width="1%"><?= $no++ ?></td>
									<td><?= ucfirst($d->nama) ?></td>
									<td><?= ucfirst($d->waktu) ?></td>
									<td><?= ucfirst($d->jam_masuk) ?></td>
									<td><?= ucfirst($d->jam_pulang) ?></td>
									<td><?= ucfirst($d->deskripsi) ?></td>
									<td><?= ucfirst($d->keterangan) ?></td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="text-right">
				<p>Atas Nama.</p>
				<p><?= ucfirst($d->nama) ?></p>
			</div>
			<div class="small">
				PDF was generated on <?= date("Y-m-d H:i:s"); ?>
			</div>
		<?php } ?>
		</div>
		<script>
			window.print();
		</script>
		<!-- jQuery  -->
		<script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>js/jquery.slimscroll.js"></script>
		<script src="<?php echo base_url('assets/') ?>js/waves.min.js"></script>


		<!-- Required datatable js -->
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/dataTables.bootstrap4.min.js"></script>
		<!-- Buttons examples -->
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/buttons.bootstrap4.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/jszip.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/pdfmake.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/vfs_fonts.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/buttons.html5.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/buttons.print.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/buttons.colVis.min.js"></script>
		<!-- Responsive examples -->
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/dataTables.responsive.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>plugins/datatables/responsive.bootstrap4.min.js"></script>

		<!-- Datatable init js -->
		<script src="<?php echo base_url('assets/') ?>pages/datatables.init.js"></script>

		<!-- App js -->
		<script src="<?php echo base_url('assets/') ?>js/app.js"></script>

	</body>

</html>
