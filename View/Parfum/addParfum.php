    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-air-freshener mr-2 mt-3"></i>Parfum</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Parfum</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Parfum&aksi=storeParfum" method="POST">
                    <input type="hidden" name="idPegawai" value="<?= $_SESSION['pegawai']['id_pegawai'] ?>">
                    <div class="form-group">
                        <label for="kategoriP">Kategori</label>
                        <select name="kategoriP" class="form-control">
                            <option value="">- Pilih Kategori</option>
                            <?php foreach ($kategori as $row) : ?>
                                <option value="<?= $row['id_kategori'] ?>"><?= $row['gender'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaparfum">Nama Parfum</label>
                        <input type="text" name="namaparfum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expired">Tanggal Expired</label>
                        <input type="date" name="expired" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hargaparfum">Harga Satuan</label>
                        <input type="number" name="hargaparfum" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
    </div>