    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Jabatan</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Jabatan</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Jabatan&aksi=updateJabatan" method="POST">
                    <input type="hidden" name="idJabatan" value="<?= $data['id_jabatan']; ?>">
                    <div class="form-group row">
                        <label for="inputJabatan" class="col-sm-2 col-form-label">Nama Jabatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="namaJabatan" value="<?= $data['nama_jabatan']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="simpan" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>