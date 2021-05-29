<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<form action="<?= base_url('Karyawan/editkaryawan/' . $detail->nip) ?>" method="post">
					<div class="form-group row">
						<label for="nip" class="col-sm-2 col-form-label">Nomer Induk Pegawai</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="nip" value="<?= $detail->nip ?>" name=" nip">
							<?= form_error('nip', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="nama" value="<?= $detail->nama ?>" name=" nama">
							<?= form_error('nama', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<select name="jenis_kelamin" class="form-control">
								<option value="" selected="" disabled="">Pilih Jenis Kelamin</option>
								<option <?php if ($detail->jenis_kelamin == 'L') {
											echo 'selected';
										} ?> value="L">Laki-Laki</option>
								<option <?php if ($detail->jenis_kelamin == 'P') {
											echo 'selected';
										} ?> value="P">Perempuan</option>
							</select>
							<?= form_error('jenis_kelamin', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="email" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
							<input class="form-control" type="text" id="email" value="<?= $detail->email ?>" name="email">
							<?= form_error('email', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="jabataan" class="col-sm-2 col-form-label">Jabatan</label>
						<div class="col-sm-10">
							<select name="jabatan" class="form-control">
								<option value="" selected="" disabled="">Pilih Jabatan</option>
								<?php foreach ($data as $d) { ?>
									<option <?php if ($detail->jabatan_id == $d->jabatan_id) {
												echo "selected";
											} ?> value="<?= $d->jabatan_id ?>"><?= $d->jabatan_nama ?></option>
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
								<option <?php if ($detail->role_id == '1') {
											echo 'selected';
										} ?> value="1">Administrator</option>
								<option <?php if ($detail->role_id == '2') {
											echo 'selected';
										} ?> value="2">Karyawan</option>
							</select>
							<?= form_error('role_id', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
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
