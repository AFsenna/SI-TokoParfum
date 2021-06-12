    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Detail Transaksi</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Barang</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Transaksi&aksi=storeDetailTransaksi" method="POST">
                    <input type="hidden" name="idTransaksi" value="<?= $_GET['idTransaksi'] ?>">
                    <div class="form-group">
                        <label for="parfum">Parfum</label>
                        <select name="IDparfum" class="form-control">
                            <option value="">- Pilih Parfum -</option>
                            <?php foreach ($parfum as $row) : ?>
                                <option value="<?= $row['id_parfum'] ?>"><?= $row['nama_parfum'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Parfum</label>
                        <input type="number" name="jumlahParfum" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Keranjang : <?= $pembeli['nama_pembeli'] ?></h5>
                </div>
                <a href="index.php?page=Transaksi&aksi=checkoutTransaksi&idTransaksi=<?= $_GET['idTransaksi'] ?>" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Checkout</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Parfum</th>
                            <th scope="col">Jumlah Parfum</th>
                            <th scope="col">Jumlah Harga</th>
                            <th scope="col">Aksi</th>
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
                                <td> <a href="index.php?page=Transaksi&aksi=deleteDetailTransaksi&idTransaksi=<?= $row['transaksi_id'] ?>&idParfum=<?= $row['parfum_id'] ?>" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a></td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>