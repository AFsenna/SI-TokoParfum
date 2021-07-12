<div class="col-md-10 p-3 ml-3" style="margin-bottom: 225px;">
    <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Kategori</h3>
    <hr class="garis">
    <div class="card" style="width: 970px;">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Tambah Kategori Parfum</h5>
            </div>
            <a href="index.php?page=Kategori&aksi=view" class="btn btn-warning float-right"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Kembali</a>
        </div>
        <div class="card-body ml-2 mr-2">
            <form action="index.php?page=Kategori&aksi=storeKategori" method="POST">
                <div class="form-group row">
                    <label for="inputKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="gender" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>