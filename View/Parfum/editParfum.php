    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-air-freshener mr-2 mt-3"></i>Parfum</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Edit Parfum</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Parfum&aksi=updateParfum" method="POST">
                    <input type="hidden" name="idParfum" value="<?= $data['id_parfum'] ?>">
                    <input type="hidden" name="idadmin" value="<?= $_SESSION['admin']['id_admin'] ?>">
                    <div class="form-group">
                        <label for="kategoriP">Kategori</label>
                        <select name="kategoriP" class="form-control" style="width: 200px;">
                            <option value="">- Pilih Kategori</option>
                            <?php foreach ($kategori as $row) : ?>
                                <option value="<?= $row['id_kategori'] ?>" <?= $row['id_kategori'] == $data['kategori_id'] ? 'selected' : ''; ?>><?= $row['gender'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaparfum">Nama Parfum</label>
                        <input type="text" name="namaparfum" class="form-control" value="<?= $data['nama_parfum'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="expired">Tanggal Expired</label>
                        <input type="date" name="expired" class="form-control" value="<?= $data['expired_parfum'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="hargaparfum">Harga Satuan</label>
                        <input type="number" name="hargaparfum" class="form-control" value="<?= $data['harga_parfum'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>