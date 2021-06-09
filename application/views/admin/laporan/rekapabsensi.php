<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>Nama</th>
							<th>Hadir</th>
							<th>Cuti</th>
							<th>Izin</th>
							<th>Sakit</th>
						</tr>
					</thead>

					<tbody>
						<?php

						$no = 1;
						foreach ($data as $data) {
							$tahun  = date('Y');
							$bulan  = date('m');
							$jumlah = 0;
							$stotal = 0;
							$absen  = $this->absen->absenbulan($data->nip, $tahun, $bulan)->num_rows();
							$cuti   = $this->absen->cutibulan($data->nip, $tahun, $bulan)->num_rows();
							$sakit  = $this->absen->sakitbulan($data->nip, $tahun, $bulan)->num_rows();
							$izin   = $this->absen->izinbulan($data->nip, $tahun, $bulan)->num_rows();

						?>
							<tr>
								<td width="1%"><?= $no++ ?></td>
								<td><?= ucfirst($data->nip) ?></td>
								<td><?= ucfirst($data->nama) ?></td>
								<td><?= $absen ?></td>
								<td><?= $cuti ?></td>
								<td><?= $izin ?></td>
								<td><?= $sakit ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
