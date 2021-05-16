<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabriz Parfum</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/allprogramview.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <script src="assets/js/chart.js"></script>
    <div class="Menu" style="overflow-y: hidden;">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
            <a class="navbar-brand mr-auto">
                <img src="assets/images/logo.jpg" alt="logo" width="15%">
            </a>
            <div class="form-inline my-2 my-lg-0 ml-auto">
                <label class="form-control"> Page <?= $_SESSION['role'] ?></label>
            </div>
            <div class="icon ml-4">
                <button class="btn btn-sm" id="btnTes" style="background-color: #e3f2fd;">
                    <h5><i class="fas fa-address-card mr-2 mt-1" data-toggle="tooltip" title="Profile"></i></h5>
                </button>
            </div>
            <h5>
                <a href="index.php?page=Auth&aksi=view"><i class="fas fa-sign-out-alt mr-3 mt-1 text-dark" data-toggle="tooltip" title="Logout"></i></a>
            </h5>
        </nav>

        <div class="sidenav mt-5 bg-dark">
            <ul class="nav flex-column ml-3 mb-4">
                <li class="nav-item">
                    <!-- untuk admin -->
                    <a class="nav-link active text-white mt-3" href="index.php?page=Admin&aksi=view"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary" style="width: 185px;">
                    <!-- untuk pegawai -->
                    <a class="nav-link active text-white mt-2" href="index.php?page=Pegawai&aksi=viewPembeli"><i class="fas fa-user-friends mr-2"></i>Data Pembeli</a>
                    <hr class="bg-secondary" style="width: 185px;">
                </li>
                <p>
                    <button class="btn btn-dark ml-2" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-database mr-2"></i>Manage Data<i class="fas fa-caret-down ml-4"></i>
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="width: 190px;">
                        <a class="navcollapse nav-link active text-dark" href="index.php?page=Kategori&aksi=view"><i class="fas fa-clipboard-list mr-2"></i>Kategori</a>
                        <hr class="bg-secondary" style="width: 150px;">
                        <a class="navcollapse nav-link active text-dark" href="index.php?page=Parfum&aksi=view"><i class="fas fa-air-freshener mr-2"></i>Parfum</a>
                        <hr class="bg-secondary" style="width: 150px;">
                        <a class="navcollapse nav-link active text-dark" href="index.php?page=Admin&aksi=viewPegawai"><i class="fa fa-users mr-2"></i>Pegawai</a>
                    </div>
                </div>
                <li class="nav-item">
                    <hr class="bg-secondary" style="width: 190px;">
                    <a class="nav-link text-white ml-1" href="index.php?page=Transaksi&aksi=view"><i class="fas fa-info-circle mr-2"></i>Transaksi</a>
                    <hr class="bg-secondary" style="width: 190px;">
                </li>
            </ul>
        </div>

        <div class="main pt-3">