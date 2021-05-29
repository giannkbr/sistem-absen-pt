<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<form action="<?= base_url('add-jabatan'); ?>" method="post">
					<div class="form-group row">
						<label for="jabatan_nama" class="col-sm-2 col-form-label">Nama Jabatan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="jabatan_nama" name="jabatan_nama">
							<?= form_error('jabatan_nama', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">

							<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-circle"></i> Tambah Data</button>

						</div>
					</div>
				</form>
				<a href="<?= base_url('data-jabatan'); ?>">
					<button class="btn btn-danger btn-block"> <i class="far fa-arrow-alt-circle-left"></i> Kembali</button>
				</a>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
