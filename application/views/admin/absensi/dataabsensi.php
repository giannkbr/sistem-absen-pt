<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <!-- <form method="POST" id="myForm" action="<?= base_url('rekap-absensi-filter-data') ?>" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <h4><?= $bulan, ' ', $tahun ?></h4>
                    <input type="month" name="date">
                    <button type="submit" class="btn btn-primary mb-2">Filter Data</button>
                </div>
            </form> -->
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Tanggal Absen</th>
                        <th>Jam Masuk</th>
                        <th>Jam Pulang</th>
                        <th>Deskripsi Kegiatan</th>
                        <th>Keterangan</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $d) { ?>
                            <tr>
                                <td width="1%"><?= $no++ ?></td>
                                <td><?= ucfirst($d->nama) ?></td>
                                <td><?= ucfirst($d->waktu) ?></td>
                                <td><?= ucfirst($d->jam_masuk) ?></td>
                                <td><?= ucfirst($d->jam_pulang) ?></td>
                                <td><?= ucfirst($d->deskripsi) ?></td>
                                <td><?= ucfirst($d->keterangan) ?></td>
                                <td>
                                    <a href="<?= base_url('absen/editabsensi/' . $d->id_absen) ?>" class="btn btn-sm btn-primary btn-sm"><span class="fa fa-edit"></span></a>
                                    <a href="<?= base_url('absen/printabsensi/' . $d->id_absen) ?>" class=" btn btn-sm btn-danger btn-sm"><span class="fa fa-print"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
