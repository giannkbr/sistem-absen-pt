 <div class="row">
 	<div class="col-12">
 		<div class="card m-b-30">
 			<div class="card-body">
 				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 					<thead>
 						<tr>
 							<th>Nomor</th>
 							<th>Nama</th>
 							<th>Jam Mulai</th>
 							<th>Jam Akhir</th>
 							<th>Tanggal Pengajuan</th>
 							<th>Keterangan</th>
 							<th>Status</th>
 							<th>Opsi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1;
							foreach ($data as $d) {
								$cek = $this->db->query("select min(waktu_pengajuan) as mulai,max(waktu_pengajuan) as akhir from overtime where id_overtime = '$d->id_overtime' ")->row();
							?>
 							<tr>
 								<td width="1%"><?= $no++ ?></td>
 								<td><?= ucfirst($d->nama) ?></td>
 								<td><?= $d->mulai ?></td>
 								<td><?= $d->selesai ?></td>
 								<td><?= $d->waktu_pengajuan ?></td>
 								<td>
 									<small>Bukti <a target="_blank" href="<?= base_url('images/overtime/' . $d->bukti) ?>">Klik disini</a></small>
 								</td>
 								<td><?= ucfirst($d->status) ?></td>
 								<td>
 									<?php if ($d->status == 'diajukan') { ?>
 										<a onclick="return confirm('apakah anda yakin ingin menerima pengajuan overtime ini?')" href="<?= base_url('overtime/overtime_terima/' . $d->id_overtime) ?>" class="btn btn-primary btn-sm"><span class="fa fa-check"></span></a>
 										<a onclick="return confirm('apakah anda yakin ingin menolak pengajuan overtime ini?')" href="<?= base_url('overtime/overtime_tolak/' . $d->id_overtime) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
 									<?php } ?>
 									<?php if ($d->status == 'diterima') { ?>
 										<button class="btn btn-primary btn-sm">Anda menerima pengajuan overtime <?= ucfirst($d->nama) ?></button>
 									<?php } ?>
 									<?php if ($d->status == 'ditolak') { ?>
 										<button class="btn btn-danger btn-sm">Anda menolak pengajuan overtime <?= ucfirst($d->nama) ?></button>
 									<?php } ?>
 								</td>
 							</tr>
 						<?php } ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div> <!-- end col -->
 </div> <!-- end row -->
