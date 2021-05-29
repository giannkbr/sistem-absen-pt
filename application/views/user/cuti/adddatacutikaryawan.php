<div class="row">
	<div class="col-12">
		<div class="card mb-30">
			<div class="card-body">
				<form method="post" enctype="multipart/form-data" action="<?= base_url('cuti/cuti_simpan') ?>">
					<!-- Map card -->
					<div class="card">
						<div class="card-body">
							<div class="form-group row">
								<label for="jenis" class="col-sm-2 col-form-label">Jenis Ketidakhadiran</label>
								<div class="col-sm-10">
									<select name=" jenis" id="jenis" class="form-control" required="" onchange="myFunction()">
										<option value="" selected="" disabled="">--Pilih--</option>
										<?php if ($bakti > 365) { ?>
											<option value="cuti">Cuti</option>
										<?php } ?>
										<option value="izin">Izin Tidak Masuk</option>
										<option value="sakit">Izin Sakit</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<label for="bukti" class="col-sm-2 col-form-label">Surat Keterangan Dokter</label>
								<div class="col-sm-10">
									<input type="file" name="bukti" id="bukti" class="form-control" disabled="">
								</div>
							</div>
							<div class="form-group row">
								<label for="selesai" class="col-sm-2 col-form-label">Mulai Ketidakhadiran</label>
								<div class="col-sm-10">
									<input type="date" name="mulai" class="form-control" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="selesai" class="col-sm-2 col-form-label">Selesai Ketidakhadiran</label>
								<div class="col-sm-10">
									<input type="date" name="akhir" class="form-control" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="alasan" class="col-sm-2 col-form-label">Alasan Ketidakhadiran</label>
								<div class="col-sm-10">
									<textarea class=" form-control" required="" name="alasan"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-12">
								<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-circle"></i> Tambah Data</button>
							</div>
						</div>
				</form>
				<a href="<?= base_url('data-cuti-karyawan'); ?>">
					<button class="btn btn-danger btn-block"> <i class="far fa-arrow-alt-circle-left"></i> Kembali</button>
				</a>
			</div>

		</div>
	</div>
</div>

<script>
	function myFunction() {
		var x = document.getElementById("jenis").value;
		if (x == 'sakit') {
			document.getElementById("bukti").disabled = false;
		} else {
			document.getElementById("bukti").disabled = true;
		}
	}
</script>
<script>
	function myFunction() {
		var x = document.getElementById("jenis").value;
		if (x == 'sakit') {
			document.getElementById("bukti").disabled = false;
		} else {
			document.getElementById("bukti").disabled = true;
		}
	}
</script>
