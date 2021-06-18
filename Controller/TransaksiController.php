<?php
class TransaksiController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek transaksi Model
     */

    public function __construct()
    {
        $this->model = new TransaksiModel();
    }

    /**
     * Untuk mengatur tampilan awal transaksi
     */

    public function index()
    {
        $data = $this->model->get();
        $pembeli = $this->model->getPembeli();
        extract($data);
        extract($pembeli);
        require_once("View/Transaksi/index.php");
    }


    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data pembeli_id, pegawai_id dengan metode http request POST
     */

    public function createTransaksi()
    {
        $pembeli_id = $_POST['idPembeli'];
        $pegawai_id = $_SESSION['pegawai']['id_pegawai'];
        $idTransaksi = $this->model->getLast();
        if ($this->model->prosesStore($pembeli_id, $pegawai_id)) {
            if ($this->model->updateStatusPembeli($pembeli_id)) {
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&idTransaksi=" . $idTransaksi['id_transaksi+1']);
            }
        } else {
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Tambah Data");
        }
    }


    /**
     * Function ini digunakan untuk menuju tampilan add detail transaksi
     */

    public function addDetailTransaksi()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $detailTransaksi = $this->model->getDetailTransaksi($idTransaksi);
        $pembeli = $this->model->getNamaPembeli($idTransaksi);
        $parfum = $this->model->getParfum();
        extract($detailTransaksi);
        extract($pembeli);
        extract($parfum);
        require_once("View/Transaksi/addTransaksi.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data parfum_id,jumlahParfum dengan metode http request POST
     * dan transaksi_id dengan metode http request GET
     */

    public function storeDetailTransaksi()
    {
        $parfumID = $_POST['IDparfum'];
        $transaksiID = $_POST['idTransaksi'];
        $jumlahParfum = $_POST['jumlahParfum'];
        $Parfum = $this->model->getParfumByID($parfumID);

        if ($jumlahParfum > $Parfum['stok']) {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Tambah Data Jumlah Parfum Melebihi Stok!!!!!&idTransaksi=" . $transaksiID);
        } else {
            if ($this->model->updateStokParfum($Parfum['stok'], $jumlahParfum, $parfumID)) {
                if ($this->model->prosesStoreDetailTransaksi($parfumID, $transaksiID, $jumlahParfum)) {
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Tambah Data&idTransaksi=" . $transaksiID);
                } else {
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Tambah Data&idTransaksi=" . $transaksiID);
                }
            } else {
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Update Stok Parfum&idTransaksi=" . $transaksiID);
            }
        }
    }

    /**
     * Function delete berfungsi untuk menghapus detail_transaksi
     */

    public function deleteDetailTransaksi()
    {
        $parfumID = $_GET['idParfum'];
        $transaksiID = $_GET['idTransaksi'];

        if ($this->model->prosesDeleteDetailTransaksi($parfumID, $transaksiID)) {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Delete Data&idTransaksi=" . $transaksiID);
        } else {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Delete Data&idTransaksi=" . $transaksiID);
        }
    }

    /**
     * Function viewCheckout berfungsi untuk menuju halaman checkout transaksi
     */

    public function viewCheckout()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $detailTransaksi = $this->model->getDetailTransaksi($idTransaksi);
        $pembeli = $this->model->getNamaPembeli($idTransaksi);
        $total = $this->model->getTotalHarga($idTransaksi);
        extract($detailTransaksi);
        extract($pembeli);
        extract($total);
        require_once("View/Transaksi/checkoutTransaksi.php");
    }

    /**
     * function ini digunakan untuk melakukan checkout
     */

    public function sudahCheckout()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $tunai = $_POST['tunai'];
        $totalHarga = $_POST['totalH'];
        if (($tunai >= $totalHarga)) {
            if ($this->model->prosesCheckout($idTransaksi)) {
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Checkout&idTransaksi=" . $idTransaksi);
            } else {
                header("location: index.php?page=Transaksi&aksi=checkoutTransaksi&pesan=Gagal checkout&idTransaksi=" . $idTransaksi);
            }
        } else {
            header("location: index.php?page=Transaksi&aksi=checkoutTransaksi&pesan=Gagal Checkout Uang Kurang&idTransaksi=" . $idTransaksi);
        }
    }

    /**
     * Untuk mengatur tampilan halaman detail pembelian
     */

    public function viewDetailPembelian()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $detailTransaksi = $this->model->getDetailTransaksi($idTransaksi);
        $total = $this->model->getTotalHarga($idTransaksi);
        $transaksi = $this->model->getTransaksiByID($idTransaksi);
        extract($detailTransaksi);
        extract($transaksi);
        extract($total);
        require_once("View/Transaksi/detailPembelian.php");
    }

    /**
     * Function Aktifkan untuk untuk mengaktifkan transaksi
     */

    public function aktifkan()
    {
        $idTransaksi = $_GET['idTransaksi'];
        if ($this->model->updateStokParfum3($idTransaksi)) {
            if ($this->model->prosesAktifkan($idTransaksi)) {
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Batalkan Transaksi&idTransaksi=" . $idTransaksi);
            } else {
                header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Batalkan Transaksi&idTransaksi=" . $idTransaksi);
            }
        } else {
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Mengupdate Stok Parfum&idTransaksi=" . $idTransaksi);
        }
    }

    /**
     * Function batalkan untuk membatalkan transaksi
     */

    public function batalkan()
    {
        $idTransaksi = $_GET['idTransaksi'];
        if ($this->model->updateStokParfum2($idTransaksi)) {
            if ($this->model->prosesBatalkan($idTransaksi)) {
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Batalkan Transaksi&idTransaksi=" . $idTransaksi);
            } else {
                header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Batalkan Transaksi&idTransaksi=" . $idTransaksi);
            }
        } else {
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Mengupdate Stok Parfum&idTransaksi=" . $idTransaksi);
        }
    }
}
