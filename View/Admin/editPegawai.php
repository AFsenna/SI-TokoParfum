<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pegawai</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/allprogramview.css">
</head>

<body>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fa fa-users mr-2 mt-3"></i>Pegawai</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <h5>Edit Pegawai</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Admin&aksi=viewPegawai" method="POST">
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input type="text" id="NIK" class="form-control" value="0810200121821978">
                    </div>
                    <div class="form-group">
                        <label for="namapegawai">Nama</label>
                        <input type="text" id="namapegawai" class="form-control" value="alexandria felicia seanne">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" value="senna">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" value="0810">
                    </div>
                    <div class="form-group">
                        <label for="notelpPG">Nomor Telepon</label>
                        <input type="text" id="notelpPG" class="form-control" value="082285132960">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" class="form-control" value="fgelicia@gmail.com">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/allprogramview.js"></script>
</body>

</html>