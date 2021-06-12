<div class="col-md-10 p-5 pt-2">
    <h3><i class="fas fa-info-circle mr-2 mt-3"></i>Transaksi</h3>
    <hr class="garis">
    <?php
    if ($_SESSION['jabatan'] == 'Kasir') :
    ?>
        <div class="card">
            <div class="card-header">
                <h5>Tambah Transaksi</h5>
            </div>
            <div class="card-body ml-2 mr-2">
                <form action="index.php?page=Transaksi&aksi=createTransaksi" method="POST">
                    <div class="form-group">
                        <label for="namaPembeli">Nama Pembeli</label>
                        <select name="idPembeli" class="form-control">
                            <option value="">- Pilih Nama -</option>
                            <?php foreach ($pembeli as $row) : ?>
                                <option value="<?= $row['id_pembeli'] ?>"><?= $row['nama_pembeli'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Tambahkan</button>
                </form>
            </div>
        </div>
    <?php
    endif
    ?>

    <div class="card mt-4">
        <div class="card-header">
            <div class="float-left mt-2">
                <h5>Data Transaksi</h5>
            </div>
        </div>
        <div class="card-body ml-2 mr-2">
            <table id="table-transaksi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Harga Total</th>
                        <th colspan="1" scope="col">
                            <center>Status</center>
                        </th>
                        <?php
                        if ($_SESSION['jabatan'] == 'Kasir') :
                        ?>
                            <th colspan="1" scope="col">
                                <center>Aksi</center>
                            </th>
                        <?php
                        endif
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data as $row) : ?>
                        <tr>
                            <td scope="row"><?= $no ?></td>
                            <td><?= date('d-m-Y H:i:s', strtotime($row['tanggal'])); ?></td>
                            <td><?= $row['nama_pembeli'] ?></td>
                            <td>Rp. <?= number_format($row['total_harga'], 2, ',', '.') ?></td>
                            <td>
                                <?php if ($row['status_transaksi'] == 0) : ?>
                                    <span class="badge badge-pill badge-primary" style="width: 170px; font-size:15px;">Belum Checkout</span>
                                <?php elseif ($row['status_transaksi'] == 1) : ?>
                                    <span class="badge badge-pill badge-success" style="width: 170px; font-size:15px;">Sudah Checkout</span>
                                <?php else : ?>
                                    <span class="badge badge-pill badge-danger" style="width: 170px; font-size:15px;">Transaksi Dibatalkan</span>
                                <?php endif; ?>
                            </td>
                            <?php
                            if ($_SESSION['jabatan'] == 'Kasir') :
                            ?>
                                <td>
                                    <?php if ($row['status_transaksi'] == 0) : ?>
                                        <a href="index.php?page=Transaksi&aksi=Keranjang&idTransaksi=<?= $row['id_transaksi'] ?>" class="btn btn-outline-warning btn-sm text-dark"><i class="fa fa-shopping-basket mr-1 ml-1" data-toggle="tooltip" title="Lihat Keranjang"></a></i>
                                        <a href="index.php?page=Transaksi&aksi=batalkan&idTransaksi=<?= $row['id_transaksi'] ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-times mr-1 ml-1" data-toggle="tooltip" title="Batalkan Transaksi"></a></i>
                                    <?php elseif ($row['status_transaksi'] == 1) : ?>
                                        <a href="index.php?page=Transaksi&aksi=detailPembelian&idTransaksi=<?= $row['id_transaksi'] ?>" class="btn btn-sm btn-outline-info"><i class="fas fa-eye mr-1 ml-1" data-toggle="tooltip" title="Detail Pembelian"></a></i>
                                    <?php else : ?>
                                        <a href="index.php?page=Transaksi&aksi=aktifkan&idTransaksi=<?= $row['id_transaksi'] ?>" class="btn btn-outline-success btn-sm text-dark"><i class="fa fa-check mr-1 ml-1" data-toggle="tooltip" title="Aktifkan Transaksi"></a></i>
                                    <?php endif; ?>
                                </td>
                            <?php
                            endif
                            ?>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#table-transaksi').DataTable({
            lengthChange: true,
            buttons: [{
                    extend: 'excelHtml5',
                    title: `Data Transaksi_<?= date('Y-m-d H:i:s'); ?>`,
                    messageBottom: '©Cabriz Parfum',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c', sheet).attr('s', '25');
                        $('row:first c', sheet).attr('s', '51');
                        $('row:last c', sheet).attr('s', '51');
                    },
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4],
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: `Data Transaksi_<?= date('Y-m-d H:i:s'); ?>`,
                    messageBottom: '©Cabriz Parfum',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                },
            ]
        });

        table.buttons().container()
            .appendTo('#table-transaksi_wrapper .col-md-6:eq(0)');
    });
</script>