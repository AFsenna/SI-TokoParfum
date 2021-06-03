    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa fa-users mr-2 mt-3"></i>Pegawai</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <h5>Edit Pegawai</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Admin&aksi=updatePegawai" method="POST">
                    <input type="hidden" name="idPG" value="<?= $data['id_pegawai'] ?>">
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" name="NIK" class="form-control" value="<?= $data['nik_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="namapegawai">Nama</label>
                        <input type="text" name="namapegawai" class="form-control" value="<?= $data['nama_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $data['username_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $data['password_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="notelpPG">Nomor Telepon</label>
                        <input type="text" name="notelpPG" class="form-control" value="<?= $data['notelp_pegawai'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $data['email_pegawai'] ?>">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>