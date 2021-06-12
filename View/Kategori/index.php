    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Kategori</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Kategori Parfum</h5>
                </div>
                <?php
                if ($_SESSION['jabatan'] == 'Administrasi') :
                ?>
                    <a href="index.php?page=Kategori&aksi=createKategori" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Kategori</a>
                <?php
                endif
                ?>
            </div>
            <div class="card-body ml-2 mr-2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <?php
                            if ($_SESSION['jabatan'] == 'Administrasi') :
                            ?>
                                <th scope="col">Aksi</th>
                            <?php
                            endif
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data as $row) : ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['gender'] ?></td>
                                <?php
                                if ($_SESSION['jabatan'] == 'Administrasi') :
                                ?>
                                    <td><a href="index.php?page=Kategori&aksi=editKategori&id=<?= $row['id_kategori'] ?>" class="btn btn-sm btn-warning text-white rounded p-2"><i class="fas fa-edit ml-1" data-toggle="tooltip" title="Update Data"></i></a>
                                        <a href="index.php?page=Kategori&aksi=deleteKategori&id=<?= $row['id_kategori'] ?>" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-1 ml-1" data-toggle="tooltip" title="Hapus Data"></i></a>
                                    </td>
                                <?php
                                endif
                                ?>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>