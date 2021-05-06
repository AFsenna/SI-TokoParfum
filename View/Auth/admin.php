<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
                        <img src="assets/images/produk.jpg" alt="login" class="login-card-img" width="100%px">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/logo.jpg" alt="logo" class="logo ml-5 float-right" width="10%px">
                            </div>
                            <p class="login-card-description pt-5 mt-5">
                                <center><b>
                                        <h3>Sign into your account</h3>
                                    </b></center>
                            </p>
                            <form action="index.php?page=Auth&aksi=authAdmin" method="POST">
                                <div class="form-group">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="username" name="username" id="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <button type="submit" class="btn btn-block login-btn mb-2 bg-primary text-white">Login</button>
                                <a href="index.php?page=Auth&aksi=view" class="btn btn-block mb-2 bg-danger text-white" style="height: 40px;">Kembali</a>
                            </form>
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