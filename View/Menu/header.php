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

    <nav class="navbar navbar-light fixed-top" style="background-color: #64E9EE; ">
        <a class="navbar-brand mr-auto">
            <img src="assets/images/logo.jpg" alt="logo" width="12%">
        </a>
        <div class="form-inline my-2 my-lg-0 ml-auto">
            <label class="form-control"> Page <?= $_SESSION['jabatan'] ?></label>
        </div>
        <div class="icon ml-4">
            <button class="btn btn-sm" id="btnTes" style="background-color: #64E9EE;">
                <h5><i class="fas fa-address-card mr-2 mt-1" data-toggle="tooltip" title="Profile"></i></h5>
            </button>
        </div>
        <h5>
            <a href="index.php?page=Auth&aksi=view"><i class="fas fa-sign-out-alt mr-3 mt-1 text-dark" data-toggle="tooltip" title="Logout"></i></a>
        </h5>
    </nav>
    <div class="sidenav mt-5" style="background-color: #001011; ">
        <ul class="nav flex-column ml-3 mb-4">
            <li class="nav-item mb-3">
                <a class="nav-link active text-white mt-3" href="index.php?page=Pegawai&aksi=view"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
            </li>
            <?php
            if ($_SESSION['jabatan'] != 'Kasir') :
            ?>
                <p>
                    <button class="btn ml-1 text-white" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="background-color: #001011; ">
                        <i class="fas fa-database mr-2"></i>Manage Data<i class="fas fa-caret-down ml-4"></i>
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body" style="width: 190px;">
                        <?php
                        if ($_SESSION['jabatan'] != 'Administrasi') :
                        ?>
                            <a class="navcollapse nav-link active text-dark mb-3" href="index.php?page=Jabatan&aksi=view"><i class="fa fa-user mr-2"></i>Jabatan</a>
                            <a class="navcollapse nav-link active text-dark mb-3" href="index.php?page=Pegawai&aksi=viewData"><i class="fa fa-users mr-2"></i>Pegawai</a>
                        <?php
                        endif;
                        ?>
                        <a class="navcollapse nav-link active text-dark mb-3" href="index.php?page=Kategori&aksi=view"><i class="fas fa-clipboard-list mr-2"></i>Kategori</a>
                        <a class="navcollapse nav-link active text-dark mb-3" href="index.php?page=Parfum&aksi=view"><i class="fas fa-air-freshener mr-2"></i>Parfum</a>
                    </div>
                </div>
            <?php
            endif;
            ?>
            <?php
            if ($_SESSION['jabatan'] == 'Administrasi' || $_SESSION['jabatan'] == 'Kasir') :
            ?>
                <li class="nav-item">
                    <a class="nav-link active text-white mb-3" href="index.php?page=Pembeli&aksi=view"><i class="fas fa-user-friends mr-2"></i>Pembeli</a>
                    <a class="nav-link active text-white mb-3" href="index.php?page=Transaksi&aksi=view"><i class="fas fa-info-circle mr-2"></i>Transaksi</a>
                </li>
            <?php
            endif;
            ?>
        </ul>
    </div>
    <div class="main pt-3" style="background-color: rgba(251, 253, 255, 0.966);">