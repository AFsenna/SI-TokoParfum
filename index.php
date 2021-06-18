<?php
//untuk menetapkan zona waktu default yang digunakan
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

//routing ke controller
require_once("Controller/AuthController.php");
require_once("Controller/JabatanController.php");
require_once("Controller/KategoriController.php");
require_once("Controller/ParfumController.php");
require_once("Controller/PegawaiController.php");
require_once("Controller/PembeliController.php");
require_once("Controller/TransaksiController.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {
    session_start();
    $page = $_GET['page']; //berisi nama page
    $aksi = $_GET['aksi']; //aksi dari setiap page
    if ($page == "Auth") {
        $auth = new AuthController();
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
        if ($_SESSION['jabatan'] == 'Administrasi') {
            require_once("View/Menu/header.php");
            $jabatan = new JabatanController();
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
        } else {
            header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Administrasi Cabriz Parfum");
        }
    } else if ($page == "Pegawai") {
        require_once("View/Menu/header.php");
        $pegawai = new PegawaiController();
        if ($aksi == 'view') {
            $pegawai->index();
        } else {
            if ($_SESSION['jabatan'] == 'Administrasi') {
                if ($aksi == 'viewData') {
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
            } else {
                header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Administrasi Cabriz Parfum");
            }
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Kategori") {
        require_once("View/Menu/header.php");
        $kategori = new KategoriController();
        if ($aksi == 'view') {
            $kategori->index();
        } else {
            if ($_SESSION['jabatan'] == 'Administrasi') {
                if ($aksi == 'createKategori') {
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
            } else {
                header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Administrasi Cabriz Parfum");
            }
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Parfum") {
        require_once("View/Menu/header.php");
        $parfum = new ParfumController();
        if ($aksi == 'view') {
            $parfum->index();
        } else {
            if ($_SESSION['jabatan'] == 'Administrasi') {
                if ($aksi == 'addParfum') {
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
            } else {
                header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Administrasi Cabriz Parfum");
            }
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Pembeli") {
        require_once("View/Menu/header.php");
        $pembeli = new PembeliController();
        if ($aksi == 'view') {
            $pembeli->index();
        } else {
            if ($_SESSION['jabatan'] == 'Administrasi') {
                if ($aksi == 'addPembeli') {
                    $pembeli->addPembeli();
                } else if ($aksi == 'storePembeli') {
                    $pembeli->storePembeli();
                } else if ($aksi == 'editPembeli') {
                    $pembeli->editPembeli();
                } else if ($aksi == 'updatePembeli') {
                    $pembeli->updatePembeli();
                } else if ($aksi == 'aktifkan') {
                    $pembeli->aktifkan();
                } else if ($aksi == 'nonAktifkan') {
                    $pembeli->nonAktifkan();
                } else {
                    echo "Method Not Found";
                }
            } else {
                header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Administrasi Cabriz Parfum");
            }
        }
        require_once("View/Menu/footer.php");
    } else if ($page == "Transaksi") {
        require_once("View/Menu/header.php");
        $transaksi = new TransaksiController();
        if ($aksi == 'view') {
            $transaksi->index();
        } else if ($aksi == 'detailPembelian') {
            $transaksi->viewDetailPembelian();
        } else {
            if ($_SESSION['jabatan'] == 'Kasir') {
                if ($aksi == 'createTransaksi') {
                    $transaksi->createTransaksi();
                } else if ($aksi == 'addDetailTransaksi') {
                    $transaksi->addDetailTransaksi();
                } else if ($aksi == 'storeDetailTransaksi') {
                    $transaksi->storeDetailTransaksi();
                } else if ($aksi == 'deleteDetailTransaksi') {
                    $transaksi->deleteDetailTransaksi();
                } else if ($aksi == 'checkoutTransaksi') {
                    $transaksi->viewCheckout();
                } else if ($aksi == 'sudahCheckout') {
                    $transaksi->sudahCheckout();
                } else if ($aksi == 'Keranjang') {
                    $transaksi->addDetailTransaksi();
                } else if ($aksi == 'aktifkan') {
                    $transaksi->aktifkan();
                } else if ($aksi == 'batalkan') {
                    $transaksi->batalkan();
                } else {
                    echo "Method Not Found";
                }
            } else {
                header("location: index.php?page=Auth&aksi=view&pesan=Anda Bukan Kasir Cabriz Parfum");
            }
        }
        require_once("View/Menu/footer.php");
    }
} else {
    header("location: index.php?page=Auth&aksi=view");
}
