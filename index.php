<?php

date_default_timezone_set('Asia/Jakarta');

//routing ke koneksi
require_once("koneksi.php");

//routing ke model
require_once("Model/AuthModel.php");
require_once("Model/JabatanModel.php");
require_once("Model/PegawaiModel.php");
require_once("Model/KategoriModel.php");
require_once("Model/ParfumModel.php");
require_once("Model/PembeliModel.php");
require_once("Model/TransaksiModel.php");

if (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page'];
    $aksi = $_GET['aksi'];
    if ($page == "Auth") {
        $auth = new AuthModel();
        if ($aksi == 'view') {
            $auth->index();
        } else if ($aksi == 'authPegawai') {
            $auth->authPegawai();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else {
            echo "Method Not Found";
        }
    } else if ($page == "Jabatan") {
        require_once("View/Menu/header.php");
        $jabatan = new JabatanModel();
        if ($aksi == 'view') {
            $jabatan->index();
        } else if ($aksi == 'addJabatan') {
            $jabatan->addJabatan();
        } else if ($aksi == 'storeJabatan') {
            $jabatan->storeJabatan();
        } else if ($aksi == 'editJabatan') {
            $jabatan->editJabatan();
        } else if ($aksi == 'updateJabatan') {
            $jabatan->updateJabatan();
        } else if ($aksi == 'deleteJabatan') {
            $jabatan->deleteJabatan();
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Pegawai") {
        require_once("View/Menu/header.php");
        $pegawai = new PegawaiModel();
        if ($aksi == 'view') {
            $pegawai->index();
        } else if ($aksi == 'viewData') {
            $pegawai->showPegawai();
        } else if ($aksi == 'addPegawai') {
            $pegawai->addPegawai();
        } else if ($aksi == 'storePegawai') {
            $pegawai->storePegawai();
        } else if ($aksi == 'editPegawai') {
            $pegawai->editPegawai();
        } else if ($aksi == 'updatePegawai') {
            $pegawai->updatePegawai();
        } else if ($aksi == 'deletePegawai') {
            $pegawai->deletePegawai();
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
    } else if ($page == "Pembeli") {
        require_once("View/Menu/header.php");
        $pembeli = new PembeliModel();
        if ($aksi == 'view') {
            $pembeli->index();
        } else if ($aksi == 'addPembeli') {
            $pembeli->addPembeli();
        } else if ($aksi == 'storePembeli') {
            $pembeli->storePembeli();
        } else if ($aksi == 'editPembeli') {
            $pembeli->editPembeli();
        } else if ($aksi == 'updatePembeli') {
            $pembeli->updatePembeli();
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Transaksi") { //belummmmmmmmmm
        require_once("View/Menu/header.php");
        $transaksi = new TransaksiModel();
        if ($aksi == 'view') {
            $transaksi->index();
        } else if ($aksi == 'createTransaksi') {
            $transaksi->createTransaksi();
        } else if ($aksi == 'addDetailTransaksi') {
            $transaksi->addDetailTransaksi();
        } else if ($aksi == 'storeDetailTransaksi') {
            $transaksi->storeDetailTransaksi();
        } else if ($aksi == 'deleteDetailTransaksi') {
            $transaksi->deleteDetailTransaksi();
        } else if ($aksi == 'checkoutTransaksi') {
            require_once("View/Transaksi/addTransaksi.php");
        } else if ($aksi == 'detailTransaksi') {
            require_once("View/Transaksi/detailTransaksi.php");
        } else if ($aksi == 'Keranjang') {
            $transaksi->addDetailTransaksi();
        } else if ($aksi == 'aktifkan') {
            require_once("View/Transaksi/index.php");
        } else if ($aksi == 'batalkan') {
            require_once("View/Transaksi/index.php");
        } else {
            echo "Method Not Found";
        }
        require_once("View/Menu/footer.php");
    }
} else {
    header("location: index.php?page=Auth&aksi=view");
}
