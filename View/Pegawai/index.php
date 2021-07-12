<div class="col-md-10 p-3 ml-3">
    <h3><i class="fas fa-tachometer-alt mr-2 mt-3"></i>Dashboard</h3>
    <hr class="garis">
    <div class="row text-white" style="width: 984px;">
        <div class="card bg-info ml-4 mb-5" style="width: 18rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa fa-users mr-2"></i>
                </div>
                <h5 class="card-title">Pegawai Aktif</h5>
                <div class="display-4"><strong><?= $pegawai['jumlahPegawai'] ?></strong></div>
                <a href="index.php?page=Pegawai&aksi=viewData">
                    <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
        <div class="card ml-5 mb-5" style="width: 18rem; background-color:#7776fe;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-air-freshener mr-2"></i>
                </div>
                <h5 class="card-title">Persedian Parfum</h5>
                <div class="display-4"><strong><?= $stok['stokParfum'] ?></strong></div>
                <a href="index.php?page=Parfum&aksi=view">
                    <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
        <div class="card ml-5 mb-5" style="width: 18rem; background-color:#9e41f5;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-shopping-cart mr-2"></i>
                </div>
                <h5 class="card-title">Parfum Terjual</h5>
                <div class="display-4"><strong><?= $transaksi['jumlahPenjualan'] ?></strong></div>
                <a href="index.php?page=Transaksi&aksi=view">
                    <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>
    <div class="row text-white" style="width: 990px;">
        <div class="card bg-grey border-info ml-4">
            <div class="card-header text-dark">
                <center><b>Pendapatan Tahun Ini</b></center>
            </div>
            <div class="card-body">
                <div class="chart ml-1" style="width: 915px;height: 440px">
                    <canvas id="chartLine"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var dataFirst = {
        label: 'Jumlah Pendapatan',
        data: [<?php foreach ($pendapatan as $row) {
                    echo $row['jumlahPendapatan'] . " , ";
                } ?>],
        lineTension: 0,
        fill: false,
        borderColor: 'blue'
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        }
    };

    var ctx = document.getElementById("chartLine").getContext('2d');
    var chartLine = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "October", "November", "Desember"],
            datasets: [dataFirst]
        },
        options: chartOptions
    });
</script>