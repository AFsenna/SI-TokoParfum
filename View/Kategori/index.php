<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/allprogramview.css">
</head>

<body>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Kategori</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Kategori Parfum</h5>
                </div>
                <a href="index.php?page=Kategori&aksi=createKategori" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-2"></i>Tambah Kategori</a>
            </div>
            <div class="card-body ml-2 mr-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
                            <th colspan="2" scope="col">
                                <center>Aksi</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Female</td>
                            <td><a href="index.php?page=Kategori&aksi=updateKategori" class="btn btn-sm btn-success text-white rounded p-2"><i class="fas fa-edit" data-toggle="tooltip" title="Update Data"></i></a></td>
                            <td><a href="index.php?page=Kategori&aksi=deleteKategori" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-2" data-toggle="tooltip" title="Hapus Data"></i></a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Male</td>
                            <td><a href="index.php?page=Kategori&aksi=updateKategori" class="btn btn-sm btn-success text-white rounded p-2"><i class="fas fa-edit" data-toggle="tooltip" title="Update Data"></i></a></td>
                            <td><a href="index.php?page=Kategori&aksi=deleteKategori" class="btn btn-sm btn-danger text-white rounded p-2"><i class="fas fa-trash-alt mr-2" data-toggle="tooltip" title="Hapus Data"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/allprogramview.js"></script>
</body>

</html>