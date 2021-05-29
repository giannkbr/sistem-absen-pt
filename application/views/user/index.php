<div class="row">
	<div class="col-xl-12">
		<div class="card m-b-30">
			<h5 class="card-header mt-0">Notifikasi</h5>
			<div class="card-body">
				<form method="post" action="user/proses_absen">
					<div class="card-body">
						<?php if ($waktu != 'dilarang') { ?>
							<h4 class="text-center">Hai, <?= $this->session->userdata('nama') ?> Anda hari ini belum melakukan absen <b><?= $waktu ?></b>. Silahkan lakukan absen pada tombol absen berikut <br><br><button class="btn btn-lg btn-primary">Absen <?= $waktu ?></button></h4>
							<input type="hidden" name="ket" id="ket" value="<?= $waktu ?>">
						<?php } else { ?>
							<h4 class="text-center">Hai, <?= $this->session->userdata('nama') ?> anda hari ini sudah melakukan Absensi <b>Masuk</b> dan <b>Pulang</b></h4>
						<?php }  ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
