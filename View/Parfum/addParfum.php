    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-air-freshener mr-2 mt-3"></i>Parfum</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Parfum</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Parfum&aksi=view" method="POST">
                    <div class="form-group">
                        <label for="kategoriP">Kategori</label>
                        <select id="kategoriP" class="form-control">
                            <option value="">- Pilih Kategori</option>
                            <option value="">Female</option>
                            <option value="">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaparfum">Nama Parfum</label>
                        <input type="text" id="namaparfum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expired">Tanggal Expired</label>
                        <input type="date" id="expired" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" id="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hargaparfum">Harga Satuan</label>
                        <input type="number" id="hargaparfum" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
    </div>