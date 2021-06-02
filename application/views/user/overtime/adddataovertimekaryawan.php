<div class="row">
	<div class="col-12">
		<div class="card mb-30">
			<div class="card-body">
				<form method="post" enctype="multipart/form-data" method="post" action="<?= base_url('overtime/overtime_simpan') ?>">
					<!-- Map card -->
					<div class="card">
						<div class="card-body">
							<div class="form-group row">
								<label for="bukti" class="col-sm-2 col-form-label">Bukti Overtime</label>
								<div class="col-sm-10">
									<input type="file" name="bukti" id="bukti" class="form-control">
								</div>
							</div>
							<div class="form-group row">
								<label for="selesai" class="col-sm-2 col-form-label">Jam Mulai Overtime</label>
								<div class="col-sm-10">
									<input type="time" name="mulai" class="form-control" required="">
								</div>
							</div>
							<div class="form-group row">
								<label for="selesai" class="col-sm-2 col-form-label">Jam Selesai Overtime</label>
								<div class="col-sm-10">
									<input type="time" name="selesai" class="form-control" required="">
								</div>
							</div>
							<div class="form-group row">
								<div class="col-sm-12">
									<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-circle"></i> Tambah Data</button>
								</div>
							</div>
				</form>
				<a href="<?= base_url('data-overtime-karyawan'); ?>">
					<button class="btn btn-danger btn-block"> <i class="far fa-arrow-alt-circle-left"></i> Kembali</button>
				</a>
			</div>

		</div>
	</div>
</div>
