 <div class="row">
 	<div class="col-12">
 		<div class="card m-b-30">
 			<div class="card-body">
 				<a href="<?= base_url('add-karyawan'); ?>"><button class="btn btn-primary btn-block mb-2">
 						<i class="fa fa-plus-circle"></i> Tambah Data
 					</button>
 				</a>
 				<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
 					<thead>
 						<tr>
 							<th>Nomor</th>
 							<th>NIP</th>
 							<th>Nama Karyawan</th>
 							<th>Jabatan</th>
 							<th>Photo</th>
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
 								<td> <small>Photo <a target="_blank" href="<?= base_url('images/users/' . $users->photo) ?>">Klik disini</a></small></td>
 								<td>
 									<a href="<?= base_url('karyawan/editkaryawan/' . $users->nip) ?>" class="btn btn-sm btn-primary btn-sm"><span class="fa fa-edit"></span></a>
 									<a onclick="return confirm('Apakah anda yakin ingin menghapus data karyawan ini?')" href="<?= base_url('karyawan/deletekaryawan/' . $users->nip) ?>" class="btn btn-sm btn-danger btn-sm"><span class="fa fa-trash"></span></a>
 								</td>
 							</tr>
 						<?php } ?>
 					</tbody>
 				</table>

 			</div>
 		</div>
 	</div> <!-- end col -->
 </div> <!-- end row -->
