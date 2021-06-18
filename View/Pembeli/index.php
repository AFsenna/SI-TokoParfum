    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-user-friends mr-2 mt-3"></i>Data Pembeli</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Table Data Pembeli</h5>
                </div>
                <a href="index.php?page=Pembeli&aksi=addPembeli" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Pembeli</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No telp</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <td scope="row"><?= $no ?></td>
                                <td><?= $row['nama_pembeli'] ?></td>
                                <td><?= $row['notelp_pembeli'] ?></td>
                                <td>
                                    <?php if ($row['status_pembeli'] == 1) : ?>
                                        <span class="badge badge-pill badge-success" style="width: 100px; font-size:15px;">Aktif</span>
                                    <?php elseif ($row['status_pembeli'] == 0) : ?>
                                        <span class="badge badge-pill badge-danger" style="width: 100px; font-size:15px;">Non-Aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="index.php?page=Pembeli&aksi=editPembeli&id=<?= $row['id_pembeli'] ?>" class="btn btn-sm btn-warning text-white rounded p-2 mr-1"><i class="fas fa-edit mr-1 ml-1" data-toggle="tooltip" title="Update Data"></i></a>
                                    <?php if ($row['status_pembeli'] == 1) : ?>
                                        <a href="index.php?page=Pembeli&aksi=nonAktifkan&idPembeli=<?= $row['id_pembeli'] ?>" class="btn btn-outline-danger btn-sm p-2 mr-1"><i class="fa fa-times mr-1 ml-1" data-toggle="tooltip" title="Non-Aktifkan Pembeli"></a></i>
                                    <?php elseif ($row['status_pembeli'] == 0) : ?>
                                        <a href="index.php?page=Pembeli&aksi=aktifkan&idPembeli=<?= $row['id_pembeli'] ?>" class="btn btn-outline-success btn-sm text-dark"><i class="fa fa-check mr-1 ml-1" data-toggle="tooltip" title="Aktifkan Pembeli"></a></i>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>