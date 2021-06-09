<script>
	document.getElementById("maps-absen")
	window.onload = function() {
		var popup = L.popup();
		var geolocationMap = L.map("maps-absen", {
			center: [40.731701, -73.993411],
			zoom: 15,
		});

		L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		}).addTo(geolocationMap);

		function geolocationErrorOccurred(geolocationSupported, popup, latLng) {
			popup.setLatLng(latLng);
			popup.setContent(
				geolocationSupported ?
				"<b>Error:</b> The Geolocation service failed." :
				"<b>Error:</b> This browser doesn't support geolocation."
			);
			popup.openOn(geolocationMap);
		}

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(
				function(position) {
					var latLng = {
						lat: position.coords.latitude,
						lng: position.coords.longitude,
					};

					var marker = L.marker(latLng).addTo(geolocationMap);
					geolocationMap.setView(latLng);
					document.getElementById("location_maps").innerHTML = position.coords.latitude + ", " + position.coords.longitude;
				},
				function() {
					geolocationErrorOccurred(true, popup, geolocationMap.getCenter());
				}
			);
		} else {
			//No browser support geolocation service
			geolocationErrorOccurred(false, popup, geolocationMap.getCenter());
		}
	};

	document.getElementById("lokasi")
	document.getElementById("lokasi").innerHTML = position.coords.latitude + ", " + position.coords.longitude;
</script>

<div class="row">

	<div class="col-sm-12 col-xl-12">
		<!-- Map card -->
		<div class="card">
			<div class="card-header"> Notifikasi </h3>
			</div>
			<form method="post" action="<?= base_url('user/proses_absen'); ?>">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-sm-10">
							<?php if ($waktu != 'dilarang') { ?>
								<h4>Hai, <?= $this->session->userdata('nama') ?> Anda hari ini belum melakukan absen <b><?= $waktu ?></b>.
									<input type="hidden" name="ket" id="ket" value="<?= $waktu ?>">
								<?php } else { ?>
									<h4>Hai, <?= $this->session->userdata('nama') ?> anda hari ini sudah melakukan absensi <b>Masuk</b> dan <b>Pulang</b></h4>
								<?php }  ?>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<div id='maps-absen' name="maps_absen" style='width: 100%; height:250px;'></div>
							<hr>
							<div id="location_maps" name="location_maps"></div>
							<!-- <input type="text" id="lokasi" name="lokasi"> -->
							<?= form_error('maps-absen', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class=" form-group row">
						<label for="keterangan_kerja" class="col-sm-2 col-form-label">Keterangan Bekerja</label>
						<div class="col-sm-10">
							<select name="keterangan_kerja" class="form-control">
								<option value="" selected="" disabled="">Pilih Keterangan</option>
								<option value="1">WFO</option>
								<option value="2">WFH</option>
							</select>
							<?= form_error('keterangan_kerja', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
						</div>
					</div>
					<div class="form-group row">
						<label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi Pekerjaan</label>
						<div class="col-sm-10">
							<textarea name="deskripsi" id="" cols="50" rows="10"></textarea>
							<?= form_error('deskripsi', '<small class="text-danger ml-3 mt-1">', '</small>'); ?>
							<!-- 	 -->
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<h5>Silahkan lakukan absen pada tombol absen berikut </h5>
							<button class="btn btn-primary" id="btn-absensi">Absen <?= $waktu ?></button></h4>
						</div>
					</div>
				</div>

			</form>
		</div>
		</section>
	</div>
</div>
