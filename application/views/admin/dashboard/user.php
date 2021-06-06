<div class="row">

	<div class="col-sm-12 col-xl-12">
		<!-- Map card -->
		<div class="card">
			<div class="card-header"> Notifikasi </h3>
			</div>
			<form method="post" action="user/proses_absen">
				<div class="card-body">
					<?php if ($waktu != 'dilarang') { ?>
						<p class="text-center">Hai, <?= $this->session->userdata('nama') ?> Anda hari ini belum melakukan absen <b><?= $waktu ?></b>. Silahkan lakukan absen pada tombol absen berikut <br><br><button class="btn btn-primary">Absen <?= $waktu ?></button></p>
						<input type="hidden" name="ket" id="ket" value="<?= $waktu ?>">
					<?php } else { ?>
						<p class="text-center">Hai, <?= $this->session->userdata('nama') ?> anda hari ini sudah melakukan absensi <b>Masuk</b> dan <b>Pulang</b></p>
					<?php }  ?>
					<div class="form-groupow">
						<label for="ket_kerja" class="col-sm-2 col-form-label">Keterangan Bekerja</label>
						<div class="col-sm-10">
							<select name="ket_kerja" class="form-control">
								<option value="" selected="" disabled="">Pilih Keterangan</option>
								<option value="1">WFO</option>
								<option value="2">WFH</option>
							</select>
							<?= form_error('ket_kerja', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
				</div>

			</form>
		</div>
		</section>
	</div>
</div>
