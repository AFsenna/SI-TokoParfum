<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Transaksi</h3>
    <hr class="garis">
    <div class="card">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Data Transaksi</h5>
            </div>
            <a href="index.php?page=Transaksi&aksi=addTransaksi" class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1 ml-1" data-toggle="tooltip" title="Tambah Data"></i></a>
        </div>
        <div class="card-body ml-2 mr-2">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Harga Total</th>
                        <th colspan="1" scope="col">
                            <center>Status</center>
                        </th>
                        <th colspan="1" scope="col">
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">1</td>
                        <td>04-05-2021</td>
                        <td>Awe</td>
                        <td>5000</td>
                        <td>
                            <span class="badge badge-pill badge-success" style="width: 150px; font-size:15px;">Sudah Checkout</span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info"><i class="fas fa-eye mr-1 ml-1" data-toggle="tooltip" title="Detail Transaksi"></button></i>
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">2</td>
                        <td>08-10-2021</td>
                        <td>Senna</td>
                        <td>2000</td>
                        <td><span class="badge badge-pill badge-primary" style="width: 150px; font-size:15px;">Belum Checkout</span></td>
                        <td>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-shopping-cart mr-1 ml-1" data-toggle="tooltip" title="Lihat Keranjang"></button></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>