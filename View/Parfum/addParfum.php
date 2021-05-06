<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Parfum</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="assets/css/fontawesome.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">
    <link href="assets/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
</head>

<body>
    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-air-freshener mr-2 mt-3"></i>Parfum</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Parfum</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Parfum&aksi=view" method="POST">
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" class="form-control">
                            <option value="">- Pilih Kategori</option>
                            <option value="">Female</option>
                            <option value="">Male</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaparfum">Nama Parfum</label>
                        <input type="text" id="namaparfum" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="expired">Tanggal Expired</label>
                        <input type="date" id="expired" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" id="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="hargaparfum">Harga Satuan</label>
                        <input type="number" id="hargaparfum" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/admin.js"></script>
</body>

</html>