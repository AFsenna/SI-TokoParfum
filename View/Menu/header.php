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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>

    <nav class="navbar navbar-expand-lg" style="background-color: #6777ef; margin-left: 220px; ">
        <div class="form-inline my-2 my-lg-0 ml-auto">
            <label class="form-control"> Page <?= $_SESSION['jabatan'] ?></label>
        </div>
        <div class="icon ml-4">
            <button class="btn btn-sm" id="btnTes" style="background-color: #6777ef;">
                <h5><i class="fas fa-address-card mr-2 mt-1 text-white" data-toggle="tooltip" title="Profile"></i></h5>
            </button>
        </div>
        <h5>
            <a href="index.php?page=Auth&aksi=logout"><i class="fas fa-sign-out-alt mr-3 mt-1 text-white" data-toggle="tooltip" title="Logout"></i></a>
        </h5>
    </nav>
    <div class="sidenav" style="background-color: #FFFFFF; ">
        <center>
            <img src="assets/images/logo.jpg" alt="logo" width="30%">
        </center>
        <ul class="nav flex-column ml-3">
            <li class="nav-item mb-3 mt-3">
                <a href="index.php?page=Pegawai&aksi=view" class="nav-link active text-dark mt-3">
                    <span class="icon"><i class="fas fa-tachometer-alt" style="margin-right: 12px;"></i></span>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <?php
            if ($_SESSION['jabatan'] != 'Kasir') :
            ?>
                <p>
                    <button class="btn ml-1 text-dark buttoncollapse" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: #FFFFFF; ">
                        <span>
                            <span class="icon"><i class="fas fa-database" style="margin-right: 17px;"></i></span>
                            <span class="text">Manage Data<i class="fas fa-caret-down ml-4"></i></span>
                        </span>
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="width: 190px; background-color: rgba(251, 253, 255, 0.966);">
                        <a href="index.php?page=Jabatan&aksi=view" class="navcollapse nav-link active text-dark">
                            <span class="icon"><i class="fa fa-user" style="margin-right: 17px;"></i></span>
                            <span class="text">Jabatan</span>
                        </a>
                        <a href="index.php?page=Pegawai&aksi=viewData" class="navcollapse nav-link active text-dark mt-3">
                            <span class="icon"><i class="fa fa-users" style="margin-right: 11px;"></i></span>
                            <span class="text">Pegawai</span>
                        </a>
                        <a href="index.php?page=Kategori&aksi=view" class="navcollapse nav-link active text-dark mt-3">
                            <span class="icon"><i class="fas fa-clipboard-list" style="margin-right: 20px;"></i></span>
                            <span class="text">Kategori</span>
                        </a>
                        <a href="index.php?page=Parfum&aksi=view" class="navcollapse nav-link active text-dark mt-3">
                            <span class="icon"><i class="fas fa-air-freshener" style="margin-right: 15px;"></i></span>
                            <span class="text">Parfum</span>
                        </a>
                    </div>
                </div>
            <?php
            endif;
            ?>
            <?php
            if ($_SESSION['jabatan'] == 'Administrasi' || $_SESSION['jabatan'] == 'Kasir') :
            ?>
                <li class="nav-item">
                    <a href="index.php?page=Pembeli&aksi=view" class="nav-link active text-dark mb-3">
                        <span class="icon"><i class="fas fa-user-friends" style="margin-right: 12px;"></i></span>
                        <span class="text">Pembeli</span>
                    </a>
                    <a href="index.php?page=Transaksi&aksi=view" class="nav-link active text-dark mb-3">
                        <span class="icon"><i class="fas fa-info-circle" style="margin-right: 14px;"></i></span>
                        <span class="text">Transaksi</span>
                    </a>
                </li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <div class="main" style="background-color: rgba(251, 253, 255, 0.966);">