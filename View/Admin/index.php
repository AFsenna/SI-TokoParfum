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
                    <div class="display-4"><strong>8</strong></div>
                    <a href="index.php?page=Admin&aksi=viewPegawai">
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
                    <div class="display-4"><strong>500</strong></div>
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
                    <div class="display-4"><strong>8100</strong></div>
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