<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-sm-10">
			<h1><?php echo $users['nama']; ?></h1>
		</div>
	</div>
	<form action="<?= base_url('user/profile/' . $users['nip']) ?>" method="post">
		<div class="row">
			<div class="col-sm-3">
				<!--left col-->

				<div class="text-center">
					<input type="text" id="ganti_gambar" value="<?= $users['photo'] ?>" name="ganti_gambar">
					<img src="<?php echo base_url('images/users/' . $users['photo']) ?>" class="avatar img-circle img-thumbnail" alt="avatar" name="photo">
					<h6>Upload a different photo...</h6>
					<input type="file" class="text-center center-block file-upload">
				</div>

			</div>
			<!--/col-3-->
			<div class="col-sm-9">
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<input type="text" name="nip" value="<?php echo $users['nip']; ?>" hidden>
						<div class="form-group">
							<div class="col-xs-12">
								<label for="first_name">
									<h4>Nama Lengkap</h4>
								</label>
								<input type="text" class="form-control" name="nama" value="<?php echo $users['nama']; ?>" title="enter your first name if any.">
								<?= form_error('nama', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<label for="jenis_kelamin">
									<h4>Jenis Kelamin</h4>
								</label>
								<div>
									<select name="jenis_kelamin" class="form-control">
										<option value="" selected="" disabled="">Pilih Jenis Kelamin</option>
										<option <?php if ($users['jenis_kelamin'] == 'L') {
													echo 'selected';
												} ?> value="L">Laki-Laki</option>
										<option <?php if ($users['jenis_kelamin'] == 'P') {
													echo 'selected';
												} ?> value="P">Perempuan</option>
									</select>
									<?= form_error('jenis_kelamin', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<label for="mobile">
									<h4>Email</h4>
								</label>
								<input type="email" class="form-control" name="email" id="mobile" value="<?= $users['email'] ?>">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-12">
								<label for="password">
									<h4>Password</h4>
								</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<br>
								<button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Edit Profile</button>
							</div>
						</div>
						<hr>

					</div>
				</div>
				<!--/tab-pane-->
			</div>
			<!--/tab-content-->

		</div>
	</form>
	<!--/col-9-->
</div>
