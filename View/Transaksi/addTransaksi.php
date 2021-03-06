<div class="col-md-10 p-3 ml-3">
    <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Detail Transaksi</h3>
    <hr class="garis">
    <?php
    if ($_SESSION['jabatan'] == 'Kasir') :
    ?>
        <div class="card border-info">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Tambah Data</h5>
                </div>
                <a href="index.php?page=Transaksi&aksi=view" class="btn btn-warning float-right"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Kembali</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Transaksi&aksi=storeDetailTransaksi" method="POST">
                    <input type="hidden" name="idTransaksi" value="<?= $_GET['idTransaksi'] ?>">
                    <div class="form-group">
                        <label for="parfum">Parfum</label>
                        <select name="IDparfum" class="form-control select2">
                            <option value="" selected>--- Pilih Parfum ---</option>
                            <?php foreach ($kategori as $baris) : ?>
                                <option value="" disabled="disabled">- <?= $baris['gender'] ?> -</option>
                                <?php
                                foreach ($parfum as $row) :
                                    if ($baris['id_kategori'] == $row['kategori_id']) : ?>
                                        <option value="<?= $row['id_parfum'] ?>">
                                            <?= ucfirst($row['nama_parfum']) . " || Stok = " . $row['stok'] . " || Rp " . number_format($row['harga_parfum'], 2, ',', '.') ?>
                                        </option>
                                <?php
                                    endif;
                                endforeach; ?>
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
    <?php
    endif
    ?>
    <div class="card mt-4 border-dark">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Keranjang : <?= $pembeli['nama_pembeli'] ?></h5>
            </div>
            <?php
            if ($_SESSION['jabatan'] == 'Kasir') :
            ?>
                <a href="index.php?page=Transaksi&aksi=checkoutTransaksi&idTransaksi=<?= $_GET['idTransaksi'] ?>" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Checkout</a>
            <?php
            endif
            ?>
        </div>
        <div class="card-body ml-2 mr-2">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Parfum</th>
                        <th scope="col">Jumlah Parfum</th>
                        <th scope="col">Jumlah Harga</th>
                        <?php
                        if ($_SESSION['jabatan'] == 'Kasir') :
                        ?>
                            <th scope="col">Aksi</th>
                        <?php
                        endif
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detailTransaksi as $row) : ?>
                        <tr>
                            <td scope="row"><?= $no ?></td>
                            <td><?= ucfirst($row['nama_parfum']) ?></td>
                            <td><?= $row['jumlah_parfum'] ?></td>
                            <td>Rp. <?= number_format($row['jumlah_harga'], 2, ',', '.') ?></td>
                            <?php
                            if ($_SESSION['jabatan'] == 'Kasir') :
                            ?>
                                <td> <a href="index.php?page=Transaksi&aksi=deleteDetailTransaksi&idTransaksi=<?= $row['transaksi_id'] ?>&idParfum=<?= $row['parfum_id'] ?>&JumlahParfum=<?= $row['jumlah_parfum'] ?>" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a></td>
                            <?php
                            endif
                            ?>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>