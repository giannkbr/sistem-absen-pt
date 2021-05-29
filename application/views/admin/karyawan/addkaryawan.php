<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<form action="<?= base_url('add-karyawan'); ?>" method="post" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="nip" class="col-sm-2 col-form-label">Nomer Induk Pegawai</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="nip" name="nip">
							<?= form_error('nip', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="nama" name="nama">
							<?= form_error('nama', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="jenis_kelamin" class="form-control">
								<option value="" selected="" disabled="">Pilih Jenis Kelamin</option>
								<option value="L">Laki-Laki</option>
								<option value="P">Perempuan</option>
							</select>
							<?= form_error('jenis_kelamin', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="email" name="email">
							<?= form_error('email', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="pwd" class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input class="form-control" type="password" id="password" name="password">
							<?= form_error('password', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="jabataan" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<select name="jabatan" class="form-control">
								<option value="" selected="" disabled="">Pilih Jabatan</option>
								<?php foreach ($jabatan as $jabatans) { ?>
									<option value="<?= $jabatans->jabatan_id ?>"><?= $jabatans->jabatan_nama ?></option>
								<?php } ?>
							</select>
							<?= form_error('jabatan', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="role_id" class="col-sm-2 col-form-label">Role Akun</label>
						<div class="col-sm-10">
							<select name="role_id" class="form-control">
								<option value="" selected="" disabled="">Pilih Role</option>
								<option value="1">Administrator</option>
								<option value="2">Karyawan</option>
							</select>
							<?= form_error('role_id', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="waktu" class="col-sm-2 col-form-label">Waktu Masuk</label>
						<div class="col-sm-10">
							<input type="date" name="waktu" class="form-control">
							<?= form_error('waktu', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="photo" class="col-sm-2 col-form-label">Photo</label>
						<div class="col-sm-10">
							<input type="file" name="photo" id="photo" class="form-control">
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
