<?php
if (isset($_GET['page']) && isset($_GET['aksi'])) {
    $page = $_GET['page'];
    $aksi = $_GET['aksi'];
    if ($page == "Auth") {
        if ($aksi == 'view') {
            require_once("View/Auth/index.php");
        } else if ($aksi == 'loginAdmin') {
            require_once("View/Auth/admin.php");
        } else if ($aksi == 'loginPegawai') {
            require_once("View/Auth/pegawai.php");
        } else if ($aksi == 'authAdmin') {
            require_once("View/Menu/main.php");
            require_once("View/Admin/index.php");
        } else if ($aksi == 'authPegawai') {
            require_once("View/Menu/main.php");
            require_once("View/Pegawai/index.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Admin") {
        require_once("View/Menu/main.php");
        if ($aksi == 'view') {
            require_once("View/Admin/index.php");
        } else if ($aksi == 'viewPegawai') {
            require_once("View/Admin/pegawai.php");
        } else if ($aksi == 'addPegawai') {
            require_once("View/Admin/addPegawai.php");
        } else if ($aksi == 'editPegawai') {
            require_once("View/Admin/editPegawai.php");
        } else if ($aksi == 'deletePegawai') {
            require_once("View/Admin/pegawai.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Pegawai") {
        require_once("View/Menu/main.php");
        if ($aksi == 'view') {
            require_once("View/Pegawai/index.php");
        } else if ($aksi == 'viewPembeli') {
            require_once("View/Pegawai/pembeli.php");
        } else if ($aksi == 'editTransaksi') {
            require_once("#");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Kategori") {
        require_once("View/Menu/main.php");
        if ($aksi == 'view') {
            require_once("View/Kategori/index.php");
        } else if ($aksi == 'createKategori') {
            require_once("View/Kategori/createKategori.php");
        } else if ($aksi == 'updateKategori') {
            require_once("View/Kategori/updateKategori.php");
        } else if ($aksi == 'deleteKategori') {
            require_once("View/Kategori/index.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Parfum") {
        require_once("View/Menu/main.php");
        if ($aksi == 'view') {
            require_once("View/Parfum/index.php");
        } else if ($aksi == 'addParfum') {
            require_once("View/Parfum/addParfum.php");
        } else if ($aksi == 'editParfum') {
            require_once("View/Parfum/editParfum.php");
        } else if ($aksi == 'deleteParfum') {
            require_once("View/Parfum/index.php");
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Transaksi") {
        require_once("View/Menu/main.php");
        if ($aksi == 'view') {
            require_once("View/Transaksi/index.php");
        } else if ($aksi == 'addTransaksi') {
            require_once("View/Transaksi/addTransaksi.php");
        } else if ($aksi == 'aktif') {
            require_once("View/Transaksi/index.php");
        } else if ($aksi == 'nonAktif') {
            require_once("View/Transaksi/index.php");
        } else {
            echo "Method Not Found";
        }
    }
} else {
    header("location: index.php?page=Auth&aksi=view");
}
