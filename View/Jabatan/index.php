<div class="col-md-10 p-3 ml-3 mb-5">
    <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Jabatan</h3>
    <hr class="garis">
    <div class="card">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Data Jabatan</h5>
            </div>
            <a href="index.php?page=Jabatan&aksi=addJabatan" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Jabatan</a>
        </div>
        <div class="card-body ml-2 mr-2">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Jabatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $row) : ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= ucfirst($row['nama_jabatan']); ?></td>
                            <td><a href="index.php?page=Jabatan&aksi=editJabatan&id=<?= $row['id_jabatan']; ?>" class="btn btn-sm btn-warning text-white rounded p-2"><i class="fas fa-edit ml-1" data-toggle="tooltip" title="Update Data"></i></a>
                                <a href="index.php?page=Jabatan&aksi=deleteJabatan&id=<?= $row['id_jabatan']; ?>" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>