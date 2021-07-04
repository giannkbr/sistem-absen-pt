<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>NIP</th>
							<th>Nama Karyawan</th>
							<th>Jabatan</th>
							<th>Aksi</th>
						</tr>
					</thead>


					<tbody>
						<?php $no = 1;
						foreach ($data as $users) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= ucfirst($users->nip) ?></td>
								<td><?= ucfirst($users->nama) ?></td>
								<td><?= ucfirst($users->jabatan_nama) ?></td>
								<td>
									<a href="<?= base_url('Overtime/dataovertime/' . $users->nip) ?>">Lihat Data Overtime</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
