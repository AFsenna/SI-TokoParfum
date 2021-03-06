<div class="col-md-10 p-3 ml-3">
    <h3><i class="fa fa-users mr-2 mt-3"></i>Pegawai</h3>
    <hr class="garis">
    <div class="card">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Data Pegawai</h5>
            </div>
            <a href="index.php?page=Pegawai&aksi=addPegawai" class=" btn btn-success float-right"><i class="fas fa-user-plus mr-2"></i>Tambah Pegawai</a>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <center>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nik</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">No telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['nik_pegawai']; ?></td>
                                <td><?= ucfirst($row['nama_pegawai']); ?></td>
                                <td><?= ucfirst($row['nama_jabatan']); ?></td>
                                <td><?= $row['notelp_pegawai']; ?></td>
                                <td><?= ucfirst($row['email_pegawai']); ?></td>
                                <td><a href="index.php?page=Pegawai&aksi=editPegawai&id=<?= $row['id_pegawai'] ?>" class="btn btn-sm btn-warning text-white rounded p-2 mb-2"><i class="fas fa-user-edit ml-1" data-toggle="tooltip" title="Update Data"></i></a>
                                    <a href="index.php?page=Pegawai&aksi=deletePegawai&id=<?= $row['id_pegawai'] ?>" class="btn btn-sm btn-danger text-white rounded p-2 mb-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </center>
            </table>
        </div>
    </div>
</div>