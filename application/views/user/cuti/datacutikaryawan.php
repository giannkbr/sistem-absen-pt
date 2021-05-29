 <div class="row">
 	<div class="col-12">
 		<div class="card m-b-30">
 			<div class="card-body">
 				<h2 class="card-title font-16 mt-0"><i class="fas fa-info"></i> Note: </h2>
 				<h6 class="card-text">Izin Cuti hanya diberikan untuk karyawan yang sudah bekerja selama 1 tahun<br>
 					Izin Tidak masuk diberikan untuk siapa saja<br>
 					Izin Sakit masuk diberikan untuk siapa saja dibuktikan dengan surat keterangan dokter</h6>
 			</div>
 		</div>
 		<div class="card m-b-30">
 			<div class="card-body">
 				<a href="<?= base_url('add-cuti-karyawan'); ?>"><button class="btn btn-primary btn-block mb-2">
 						<i class="fa fa-plus-circle"></i> Tambah Data Permohonan Cuti
 					</button>
 				</a>

 				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 					<thead>
 						<th width="1%">No</th>
 						<th>Nama</th>
 						<th>Jenis</th>
 						<th>Waktu</th>
 						<th>Keterangan</th>
 						<th>Status</th>
 						<th>Opsi</th>
 					</thead>
 					<tbody>
 						<?php $no = 1;
							foreach ($data as $d) {
								$cek = $this->db->query(" select min(tanggal) as mulai,max(tanggal) as akhir from detailcuti where id_cuti = '$d->id_cuti' ")->row();
							?>
 							<tr>
 								<td width="1%"><?= $no++ ?></td>
 								<td><?= ucfirst($d->nama) ?></td>
 								<td><?= ucfirst($d->jenis_cuti) ?></td>
 								<td><?= date('d/m/Y', strtotime($cek->mulai)) ?> - <?= date('d/m/Y', strtotime($cek->akhir)) ?></td>
 								<td>
 									<?= ucfirst($d->alasan) ?><br>
 									<?php if ($d->jenis_cuti == 'sakit') { ?>
 										<small>Bukti <a target="_blank" href="<?= base_url('./images/' . $d->bukti) ?>">Klik disini</a></small>
 									<?php } ?>
 								</td>
 								<td><?= ucfirst($d->status) ?></td>
 								<td>
 									<?php if ($d->status == 'diajukan') { ?>
 										<a onclick="return confirm('apakah anda yakin ingin menghapus pengajuan cuti ini?')" href="<?= base_url('pegawai/cuti_delete/' . $d->id_cuti) ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
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
