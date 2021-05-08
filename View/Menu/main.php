<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
        <a class="navbar-brand mr-auto">
            <img src="assets/images/logo.jpg" alt="logo" width="15%">
        </a>
        <div class="form-inline my-2 my-lg-0 ml-auto">
            <label class="form-control">Admin Page</label>
        </div>
        <div class="icon ml-4">
            <h5>
                <a href="index.php?page=Auth&aksi=view"><i class="fas fa-sign-out-alt mr-3 text-dark" data-toggle="tooltip" title="Logout"></i></a>
            </h5>
        </div>
        </div>
    </nav>

    <div class="row no-gutters mt-4">
        <div class="sidebar col-md-2 mt-3 bg-dark pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-4">
                <li class="nav-item">
                    <a class="nav-link active text-white mt-3" href="index.php?page=Admin&aksi=view"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                    <hr class="bg-secondary">
                    <!-- untuk pegawai -->
                    <a class="nav-link active text-white mt-3" href="index.php?page=Pegawai&aksi=view"><i class="fas fa-address-card mr-2"></i>Profile</a>
                    <hr class="bg-secondary">
                    <a class="nav-link active text-white mt-3" href="index.php?page=Pegawai&aksi=viewPembeli"><i class="fas fa-user-friends mr-2"></i>Data Pembeli</a>
                    <hr class="bg-secondary">
                    <a class="nav-link active text-white mt-3" href="index.php?page=Transaksi&aksi=view"><i class="fas fa-handshake mr-2"></i></i>Transaksi</a>
                    <hr class="bg-secondary">
                </li>
                <p>
                    <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-database mr-2"></i>Manage Data<i class="fas fa-caret-down ml-4"></i>
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <!-- untuk admin -->
                        <a class="nav-link active text-dark" href="index.php?page=Kategori&aksi=view"><i class="fas fa-clipboard-list mr-2"></i>Kategori</a>
                        <hr class="bg-secondary">
                        <a class="nav-link active text-dark" href="index.php?page=Parfum&aksi=view"><i class="fas fa-air-freshener mr-2"></i>Parfum</a>
                        <hr class="bg-secondary">
                        <a class="nav-link active text-dark" href="index.php?page=Admin&aksi=viewPegawai"><i class="fa fa-users mr-2"></i>Pegawai</a>
                    </div>
                </div>
                <li class="nav-item">
                    <hr class="bg-secondary">
                    <a class="nav-link text-white" href="index.php?page=Transaksi&aksi=view"><i class="fas fa-info-circle mr-2"></i>Informasi Transaksi</a>
                    <hr class="bg-secondary">
                </li>
            </ul>
        </div>
</body>

</html>