<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/allprogramview.css">
</head>

<body>
    <div class="col-md-10 p-5 pt-2">
        <!-- untuk pegawai -->
        <h3><i class="fas fa-handshake mr-2 mt-3"></i>Transaksi</h3>
        <hr>
        <!-- untuk admin -->
        <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Informasi Transaksi</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="float-left mt-2">
                    <h5>Data Transaksi</h5>
                </div>
                <a href="index.php?page=Transaksi&aksi=addTransaksi" class="btn btn-success float-right"><i class="fas fa-plus-circle" data-toggle="tooltip" title="Tambah Transaksi"></i></a>
                <form action="" method="POST" class="cari float-right mr-3">
                    <input class="searching" type="text" name="query" placeholder="Cari Data" />
                    <input class="tombol" type="button" name="cari" value="Search" />
                </form>
            </div>
            <div class="card-body ml-2 mr-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Nama Parfum</th>
                            <th scope="col">Jumlah Parfum</th>
                            <th scope="col">Harga Total</th>
                            <th colspan="2" scope="col">
                                <center>Status</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Female</td>
                            <td>Harmony</td>
                            <td>Harmony</td>
                            <td>19-10-2021</td>
                            <td>5</td>
                            <td><a href="index.php?page=Transaksi&aksi=nonAktif&id=#" class="btn btn-danger" data-toggle="tooltip" title="Click untuk mengubah status menjadi aktif">Non-Aktif</a></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Female</td>
                            <td>Harmony</td>
                            <td>Harmony</td>
                            <td>19-10-2021</td>
                            <td>5</td>
                            <td><a href="index.php?page=Transaksi&aksi=aktif&id=#" class="btn btn-success" data-toggle="tooltip" title="Click untuk mengubah status menjadi non-aktif">Aktif</a></td>
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