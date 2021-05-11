    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-handshake mr-2 mt-3"></i>Transaksi</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Transaksi</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Transaksi&aksi=view" method="POST">
                    <div class="form-group">
                        <label for="namapembeli">Nama Pembeli</label>
                        <input type="text" id="namapembeli" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="notelp">No.Telp Pembeli</label>
                        <input type="text" id="notelp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="parfum">Parfum</label>
                        <select id="parfum" class="form-control">
                            <option value="">- Pilih Parfum -</option>
                            <option value="">Harmony</option>
                            <option value="">Minami</option>
                            <option value="">Blues</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Parfum</label>
                        <input type="number" id="jumlah" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
    </div>