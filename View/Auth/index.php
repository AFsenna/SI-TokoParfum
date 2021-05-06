<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/produk3.jpg" alt="login" class="login-card-img" width="100%px">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/logo.jpg" alt="logo" class="logo ml-5 float-right" width="10%px">
                            </div>
                            <center>
                                <p class="login-card-description pt-5 mt-5">
                                    <b>
                                        <h3>Welcome to Cabriz Parfum</h3>
                                    </b>
                                </p>
                                <a href="index.php?page=Auth&aksi=loginAdmin" class="btn btn-primary btn-lg active mt-3" role="button" aria-pressed="true" style="width: 30%;">Admin</a>
                                <a href="index.php?page=Auth&aksi=loginPegawai" class="btn btn-success btn-lg active mt-3 ml-3" role="button" aria-pressed="true" style="width: 30%;">Pegawai</a>
                            </center>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>