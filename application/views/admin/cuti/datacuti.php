 <div class="row">
 	<div class="col-12">
 		<div class="card m-b-30">
 			<div class="card-body">
 				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 					<thead>
 						<tr>
 							<th>Nomor</th>
 							<th>Nama</th>
 							<th>Jenis Cuti</th>
 							<th>Waktu</th>
 							<th>Keterangan</th>
 							<th>Status</th>
 							<th>Opsi</th>
 						</tr>
 					</thead>

 					<tbody>
 						<?php $no = 1;
							foreach ($data as $d) {
								$cek = $this->db->query(" select min(waktu_pengajuan) as mulai,max(waktu_pengajuan) as akhir from cuti where id_cuti = '$d->id_cuti' ")->row();
							?>
 							<tr>
 								<td width="1%"><?= $no++ ?></td>
 								<td><?= ucfirst($d->nama) ?></td>
 								<td><?= ucfirst($d->jenis_cuti) ?></td>
 								<td><?= date('d/m/Y', strtotime($cek->mulai)) ?> - <?= date('d/m/Y', strtotime($cek->akhir)) ?></td>
 								<td>
 									<?= ucfirst($d->alasan) ?><br>
 									<?php if ($d->jenis_cuti == 'sakit') { ?>
 										<small>Bukti <a target="_blank" href="<?= base_url('images/users/' . $d->bukti) ?>">Klik disini</a></small>
 									<?php } ?>
 								</td>
 								<td><?= ucfirst($d->status) ?></td>
 								<td>
 									<?php if ($d->status == 'diajukan') { ?>
 										<a onclick="return confirm('apakah anda yakin ingin menerima pengajuan cuti ini?')" href="<?= base_url('Cuti/cuti_terima/' . $d->id_cuti) ?>" class="btn btn-primary btn-sm"><span class="fa fa-check"></span></a>
 										<a onclick="return confirm('apakah anda yakin ingin menolak pengajuan cuti ini?')" href="<?= base_url('Cuti/cuti_tolak/' . $d->id_cuti) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
 									<?php } ?>
 									<?php if ($d->status == 'diterima') { ?>
 										<button class="btn btn-primary btn-sm">Anda menerima pengajuan</button>
 									<?php } ?>
 									<?php if ($d->status == 'ditolak') { ?>
 										<button class="btn btn-danger btn-sm">Anda menolak pengajuan</button>
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
