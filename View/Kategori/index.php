    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Kategori</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Kategori Parfum</h5>
                </div>
                <a href="index.php?page=Kategori&aksi=createKategori" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Kategori</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Perempuan</td>
                            <td><a href="index.php?page=Kategori&aksi=updateKategori" class="btn btn-sm btn-success text-white rounded p-2"><i class="fas fa-edit" data-toggle="tooltip" title="Update Data"></i></a>
                                <a href="index.php?page=Kategori&aksi=deleteKategori" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-2" data-toggle="tooltip" title="Hapus Data"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Laki-laki</td>
                            <td><a href="index.php?page=Kategori&aksi=updateKategori" class="btn btn-sm btn-success text-white rounded p-2"><i class="fas fa-edit" data-toggle="tooltip" title="Update Data"></i></a>
                                <a href="index.php?page=Kategori&aksi=deleteKategori" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-2" data-toggle="tooltip" title="Hapus Data"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>