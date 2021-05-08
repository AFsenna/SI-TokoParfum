    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update Kategori</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link href="assets/css/fontawesome.css" rel="stylesheet">
        <link href="assets/css/brands.css" rel="stylesheet">
        <link href="assets/css/solid.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/allprogramview.css">
    </head>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-clipboard-list mr-2 mt-3"></i>Kategori</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <h5>Update Kategori Parfum</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Kategori&aksi=view" method="POST">
                    <div class="form-group row">
                        <label for="inputKategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="kategori" class="form-control" id="inputKategori" value="Female">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="simpan" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <body>
        <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/chart.js"></script>
        <script src="assets/js/allprogramview.js"></script>
    </body>

    </html>