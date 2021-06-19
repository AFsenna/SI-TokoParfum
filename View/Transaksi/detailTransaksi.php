<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Detail Pembelian</h3>
    <hr class="garis">
    <div class="card mt-4 border-info">
        <div class="card-body ml-2 mr-2">
            <div class="card mb-3 ml-3" style="width: 97%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Data Transaksi</h5>
                        </div>
                        <div class="col-md-6">
                            <h6 class="float-right text-info">Nama Pegawai : <?= $transaksi['nama_pegawai'] ?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped mt-2">
                        <tbody>
                            <tr>
                                <th width="20%">Tanggal Transaksi</th>
                                <td> <?= date('d-m-Y H:i:s', strtotime($transaksi['tanggal'])); ?></td>
                            </tr>
                            <tr>
                                <th width="20%">Nama Pembeli</th>
                                <td> <?= $transaksi['nama_pembeli'] ?></td>
                            </tr>
                            <tr>
                                <th width="20%">No. Telp Pembeli</th>
                                <td> <?= $transaksi['notelp_pembeli'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card ml-3" style="width: 97%;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Detail Transaksi</h5>
                        </div>
                        <div class="col-md-6">
                            <h6 class="float-right text-info">Total Harga : Rp. <?= number_format($total['totalHarga'], 2, ',', '.') ?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Parfum</th>
                                <th scope="col">Jumlah Parfum</th>
                                <th scope="col">Jumlah Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($detailTransaksi as $row) : ?>
                                <tr>
                                    <td scope="row"><?= $no ?></td>
                                    <td><?= $row['nama_parfum'] ?></td>
                                    <td><?= $row['jumlah_parfum'] ?></td>
                                    <td>Rp. <?= number_format($row['jumlah_harga'], 2, ',', '.') ?></td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>