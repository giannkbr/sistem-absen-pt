<div class="row">
	<div class="col-12">
		<div class="card m-b-30">
			<div class="card-body">
				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Waktu</th>
						<th>Keterangan</th>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($data as $d) { ?>
							<tr>
								<td width="1%"><?= $no++ ?></td>
								<td><?= ucfirst($d->nama) ?></td>
								<td><?= ucfirst($d->waktu) ?></td>
								<td><?= ucfirst($d->keterangan) ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
