<?php

date_default_timezone_set('Asia/Jakarta');
require_once("koneksi.php");
require_once("Model/AuthModel.php");
require_once("Model/AdminModel.php");
require_once("Model/KategoriModel.php");
require_once("Model/ParfumModel.php");

if (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page'];
    $aksi = $_GET['aksi'];
    if ($page == "Auth") {
        $auth = new AuthModel();
        if ($aksi == 'view') {
            $auth->index();
        } else if ($aksi == 'loginAdmin') {
            $auth->loginAdmin();
        } else if ($aksi == 'loginPegawai') {
            $auth->loginPegawai();
        } else if ($aksi == 'authAdmin') {
            $auth->authAdmin();
        } else if ($aksi == 'authPegawai') {
            $auth->authPegawai();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Admin") {
        require_once("View/Menu/header.php");
        $admin = new AdminModel();
        if ($aksi == 'view') {
            $admin->index(); //ini belom ya
        } else if ($aksi == 'viewPegawai') {
            $admin->showPegawai();
        } else if ($aksi == 'addPegawai') {
            $admin->addPegawai();
        } else if ($aksi == 'storePegawai') {
            $admin->storePegawai();
        } else if ($aksi == 'editPegawai') {
            $admin->editPegawai();
        } else if ($aksi == 'updatePegawai') {
            $admin->updatePegawai();
        } else if ($aksi == 'deletePegawai') {
            $admin->deletePegawai();
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Pegawai") {
        require_once("View/Menu/header.php");
        if ($aksi == 'view') {
            require_once("View/Pegawai/index.php");
        } else if ($aksi == 'viewPembeli') {
            require_once("View/Pegawai/pembeli.php");
        } else if ($aksi == 'editTransaksi') {
            require_once("#");
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Kategori") {
        require_once("View/Menu/header.php");
        $kategori = new KategoriModel();
        if ($aksi == 'view') {
            $kategori->index();
        } else if ($aksi == 'createKategori') {
            $kategori->addKategori();
        } else if ($aksi == 'storeKategori') {
            $kategori->storeKategori();
        } else if ($aksi == 'editKategori') {
            $kategori->editKategori();
        } else if ($aksi == 'updateKategori') {
            $kategori->updateKategori();
        } else if ($aksi == 'deleteKategori') {
            $kategori->deleteKategori();
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Parfum") {
        require_once("View/Menu/header.php");
        $parfum = new ParfumModel();
        if ($aksi == 'view') {
            $parfum->index();
        } else if ($aksi == 'addParfum') {
            $parfum->addParfum();
        } else if ($aksi == 'storeParfum') {
            $parfum->storeParfum();
        } else if ($aksi == 'editParfum') {
            $parfum->editParfum();
        } else if ($aksi == 'updateParfum') {
            $parfum->updateParfum();
        } else if ($aksi == 'deleteParfum') {
            $parfum->deleteParfum();
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Transaksi") {
        require_once("View/Menu/header.php");
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
        require_once("View/Menu/footer.php");
    }
} else {
    header("location: index.php?page=Auth&aksi=view");
}
