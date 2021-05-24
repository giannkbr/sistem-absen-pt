<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<form action="<?= base_url('add-karyawan'); ?>" method="post">
					<div class="form-group row">
						<label for="nip" class="col-sm-2 col-form-label">NIP</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="nip" name="nip">
							<?= form_error('nip', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Nama Karyawan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="name" name="name">
							<?= form_error('name', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="email" name="email">
							<?= form_error('email', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="email" name="email">
							<?= form_error('email', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="jabatan" name="jabatan">
							<?= form_error('jabatan', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="name" class="col-sm-2 col-form-label">File Photo</label>
						<div class="col-sm-10">
							<input class="form-control" type="file" id="photo" name="photo">
							<?= form_error('photo', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row align-items-center">
						<div class="col-sm-12">
							<button class="btn btn-primary btn-block" type="submit"><i class="fa fa-plus-circle"></i> Tambah Data</button>
						</div>
					</div>
				</form>
				<a href="<?= base_url('data-karyawan'); ?>">
					<button class="btn btn-danger btn-block"> <i class="far fa-arrow-alt-circle-left"></i> Kembali</button>
				</a>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
