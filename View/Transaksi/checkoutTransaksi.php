    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Checkout Transaksi</h3>
        <hr class="garis">
        <div class="card mt-4">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Barang yang dibeli oleh <?= $pembeli['nama_pembeli'] ?></h5>
                </div>
            </div>
            <div class="card-body ml-2 mr-2">
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
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Pembayaran</h5>
                    </div>
                    <div class="col-md-6">
                        <h6 class="float-right" style="color: red;">Total Harga : Rp. <?= number_format($total['totalHarga'], 2, ',', '.') ?></h6>
                    </div>
                </div>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Transaksi&aksi=sudahCheckout&idTransaksi=<?= $_GET['idTransaksi'] ?>" method="POST">
                    <input type="hidden" id="total" class="form-control" name="totalH" value="<?= $total['totalHarga'] ?>">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tunai</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" id="tunai" class="form-control" name="tunai" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kembalian</label>
                        <div class="col-sm-10">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Rp.</div>
                                </div>
                                <input type="text" id="kembalian" class="form-control" name="kembalian" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Bayar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#tunai,#kembalian').keyup(function() {
                var total = parseInt($('#total').val());
                var tunai = parseInt($('#tunai').val());
                var hitung = tunai - total;
                $('#kembalian').val(hitung);
            })
        });
    </script>