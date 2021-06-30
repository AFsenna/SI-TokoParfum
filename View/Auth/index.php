<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/images/produk3.jpg');">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="index.php?page=Auth&aksi=authPegawai" method="POST">
                    <span class="login100-form-logo">
                        <img src="assets/images/logo.jpg" alt="logo" class="logo" width="60%px">
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Log in
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="usernamePG" placeholder="Username" required>
                        <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="passwordPG" placeholder="Password" required>
                        <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn mt-5">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    if (isset($_SESSION['message']) == 'error') {
        switch ($_SESSION['message']) {
            case 'error':
                echo "<script>
           Swal.fire({
            icon: 'warning',
            title: 'Username atau Password salah!!',
            width: 400,
            height: 200,
            padding: '3em',
            })
        </script>";
                break;
        }
        unset($_SESSION['message']);
    }
    ?>
</body>

</html>