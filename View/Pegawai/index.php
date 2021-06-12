    <div class="col-md-10 p-5 pt-2">
        <h3><i class="fas fa-tachometer-alt mr-2 mt-3"></i>Dashboard</h3>
        <hr class="garis">
        <div class="row text-white" style="width: 1080px;">
            <div class="card bg-info ml-4 mb-5" style="width: 18rem;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-users mr-2"></i>
                    </div>
                    <h5 class="card-title">Pegawai Aktif</h5>
                    <div class="display-4"><strong><?= $pegawai['jumlahPegawai'] ?></strong></div>
                    <a href="index.php?page=Pegawai&aksi=dataPegawai">
                        <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
            </div>
            <div class="card ml-5 mb-5" style="width: 18rem; background-color:#04047c;">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-air-freshener mr-2"></i>
                    </div>
                    <h5 class="card-title">Stok Parfum</h5>
                    <div class="display-4"><strong><?= $stok['stokParfum'] ?></strong></div>
                    <a href="index.php?page=Parfum&aksi=view">
                        <p class="card-text text-white">Lihat Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
            </div>
            <div class="card bg-danger ml-5 mb-5" style="width: 18rem;">
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
            <div class="card bg-grey ml-4">
                <div class="card-header text-dark">
                    <center><b>Penjualan Tahun Ini</b></center>
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
            label: 'Kategori 1',
            data: [12, 19, 3, 23, 2, 3, 7, 8, 9, 60, 11, 12],
            lineTension: 0,
            fill: false,
            borderColor: 'red'
        };

        var dataSecond = {
            label: "Kategori 2",
            data: [13, 12, 55, 10, 9, 8, 7, 6, 5, 4, 3, 2],
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
                datasets: [dataFirst, dataSecond]
            },
            options: chartOptions
        });
    </script>