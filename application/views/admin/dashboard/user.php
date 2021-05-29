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
				</div>
			</form>
		</div>
		</section>
	</div>
</div>
