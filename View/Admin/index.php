<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
</head>

<body>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-tachometer-alt mr-2 mt-3"></i>Dashboard</h3>
        <hr>
        <div class="row text-white">
            <div class="card bg-info ml-5 mb-5" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-users mr-2"></i>
                    </div>
                    <h5 class="card-title">Pegawai Aktif</h5>
                    <div class="display-4">8</div>
                    <a href="">
                        <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
            </div>
            <div class="card bg-success ml-5 mb-5" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-air-freshener mr-2"></i>
                    </div>
                    <h5 class="card-title">Stok Parfum</h5>
                    <div class="display-4">500</div>
                    <a href="">
                        <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
            </div>
            <div class="card bg-danger ml-5 mb-5" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-shopping-cart mr-2"></i>
                    </div>
                    <h5 class="card-title">Parfum Terjual</h5>
                    <div class="display-4">8.100</div>
                    <a href="">
                        <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-white">
            <div class="card bg-grey ml-5">
                <div class="card-header text-dark">
                    <center><b>Penjualan Tahun Ini</b></center>
                </div>
                <div class="card-body">
                    <div class="chart ml-1" style="width: 915px;height: 440px">
                        <canvas id="chartLine"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/admin.js"></script>
</body>

</html>