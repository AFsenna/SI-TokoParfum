<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-user-friends mr-2 mt-3"></i>Data Pembeli</h3>
    <hr class="garis">
    <div class="card" style="width: 970px;">
        <div class="card-header">
            <h5>Edit Pembeli</h5>
        </div>
        <div class="card-body ml-2 mr-2">
            <form action="index.php?page=Pembeli&aksi=updatePembeli" method="POST">
                <input type="hidden" name="idPembeli" value="<?= $data['id_pembeli'] ?>">
                <div class="form-group row">
                    <label for="namaPembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="namaPembeli" value="<?= $data['nama_pembeli'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="notelpPembeli" class="col-sm-2 col-form-label">No Telp Pembeli</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="notelpPembeli" value="<?= $data['notelp_pembeli'] ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>