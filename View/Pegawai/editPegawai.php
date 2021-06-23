    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa fa-users mr-2 mt-3"></i>Pegawai</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Edit Pegawai</h5>
                </div>
                <a href="index.php?page=Pegawai&aksi=viewData" class="btn btn-warning float-right"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Kembali</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Pegawai&aksi=updatePegawai" method="POST">
                    <input type="hidden" name="idPG" value="<?= $data['id_pegawai'] ?>">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <select name="jabatan" class="form-control" style="width: 200px;">
                            <option value="">- Pilih Jabatan</option>
                            <?php foreach ($jabatan as $row) : ?>
                                <option value="<?= $row['id_jabatan'] ?>" <?= $row['id_jabatan'] == $data['jabatan_id'] ? 'selected' : ''; ?>><?= $row['nama_jabatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" name="NIK" class="form-control" value="<?= $data['nik_pegawai'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="namapegawai">Nama</label>
                        <input type="text" name="namapegawai" class="form-control" value="<?= $data['nama_pegawai'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $data['username_pegawai'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $data['password_pegawai'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="notelpPG">Nomor Telepon</label>
                        <input type="text" name="notelpPG" class="form-control" value="<?= $data['notelp_pegawai'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="<?= $data['email_pegawai'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>