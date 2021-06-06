 <div class="row">
 	<div class="col-12">
 		<div class="card m-b-30">
 			<div class="card-body">
 				<a href="<?= base_url('add-overtime-karyawan'); ?>"><button class="btn btn-primary btn-block mb-2">
 						<i class="fa fa-plus-circle"></i> Tambah Data Permohonan Overtime
 					</button>
 				</a>

 				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 					<thead>
 						<th width="1%">No</th>
 						<th>Nama</th>
 						<th>Jam Mulai</th>
 						<th>Jam Akhir</th>
 						<th>Keterangan</th>
 						<th>Status</th>
 						<th>Opsi</th>
 					</thead>
 					<tbody>
 						<?php $no = 1;
							foreach ($data as $d) {
								$cek = $this->db->query(" select min(tanggal) as mulai,max(tanggal) as akhir from detailovertime where id_overtime = '$d->id_overtime' ")->row();
							?>
 							<tr>
 								<td width="1%"><?= $no++ ?></td>
 								<td><?= ucfirst($d->nama) ?></td>
 								<td><?= $d->mulai ?></td>
 								<td><?= $d->selesai ?></td>
 								<td>
 									<small>Bukti <a target="_blank" href="<?= base_url('./images/overtime/' . $d->bukti) ?>">Klik disini</a></small>
 								</td>
 								<td><?= ucfirst($d->status) ?></td>
 								<td>
 									<?php if ($d->status == 'diajukan') { ?>
 										<a onclick="return confirm('apakah anda yakin ingin menghapus pengajuan overtime ini?')" href="<?= base_url('overtime/overtime_delete/' . $d->id_overtime) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
 									<?php } ?>
 									<?php if ($d->status == 'diterima') { ?>
 										<button class="btn btn-primary btn-sm">Pengajuan anda diterima</button>
 									<?php } ?>
 									<?php if ($d->status == 'ditolak') { ?>
 										<button class="btn btn-danger btn-sm">Pengajuan anda ditolak</button>
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
