    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-air-freshener mr-2 mt-3"></i>Parfum</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Parfum</h5>
                </div>
                <a href="index.php?page=Parfum&aksi=addParfum" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Parfum</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Parfum</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Expired</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga Parfum</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td scope="row"><?= $no ?></td>
                                <td><?= $row['nama_parfum'] ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td><?= $row['expired_parfum'] ?></td>
                                <td><?= $row['stok'] ?></td>
                                <td><?= $row['harga_parfum'] ?></td>
                                <td><a href="index.php?page=Parfum&aksi=editParfum&id=<?= $row['id_parfum'] ?>" class="btn btn-sm btn-success text-white rounded p-2 mr-1"><i class="fas fa-edit ml-1" data-toggle="tooltip" title="Update Data"></i></a>
                                    <a href="index.php?page=Parfum&aksi=deleteParfum&id=<?= $row['id_parfum'] ?>" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>