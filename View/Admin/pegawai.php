    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa fa-users mr-2 mt-3"></i>Pegawai</h3>
        <hr class="garis">
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Pegawai</h5>
                </div>
                <a href="index.php?page=Admin&aksi=addPegawai" class=" btn btn-success float-right"><i class="fas fa-user-plus mr-2"></i>Tambah Pegawai</a>
            </div>
            <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No telp</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alexandria Felicia Seanne</td>
                            <td>082285132960</td>
                            <td>fgelicia@gmail.com</td>
                            <td>felicia</td>
                            <td>081020</td>
                            <td><a href="index.php?page=Admin&aksi=editPegawai" class="btn btn-sm btn-success text-white rounded p-2"><i class="fas fa-user-edit" data-toggle="tooltip" title="Update Data"></i></a>
                                <a href="index.php?page=Admin&aksi=deletePegawai" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-2" data-toggle="tooltip" title="Hapus Data"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>