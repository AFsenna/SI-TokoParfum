<?php
class TransaksiController
{
    private $model, $kategori;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek transaksi Model
     */

    public function __construct()
    {
        $this->model = new TransaksiModel();
        $this->kategori = new KategoriModel();
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
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&idTransaksi=" . $idTransaksi['id_transaksi+1']);
        } else {
            $_SESSION['message'] = 'gagal';
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Tambah Data");
            die();
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
        $kategori = $this->kategori->get();

        extract($kategori);
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
            $_SESSION['message'] = 'gagalstok';
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Jumlah Parfum Melebihi Stok!!&idTransaksi=" . $transaksiID);
            exit();
        } else {
            if ($this->model->updateStokParfum($Parfum['stok'], $jumlahParfum, $parfumID)) {
                if ($this->model->prosesStoreDetailTransaksi($parfumID, $transaksiID, $jumlahParfum)) {
                    $_SESSION['message'] = 'berhasil';
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Tambah Data&idTransaksi=" . $transaksiID);
                    exit();
                } else {
                    $_SESSION['message'] = 'gagal';
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Tambah Data&idTransaksi=" . $transaksiID);
                    exit();
                }
            } else {
                $_SESSION['message'] = 'gagalupdatestok';
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Update Stok Parfum&idTransaksi=" . $transaksiID);
                die();
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
        $jumlahParfum = $_GET['JumlahParfum'];
        $Parfum = $this->model->getParfumByID($parfumID);

        if ($this->model->updateStokParfum4($Parfum['stok'], $jumlahParfum, $parfumID)) {
            if ($this->model->prosesDeleteDetailTransaksi($parfumID, $transaksiID)) {
                $_SESSION['message'] = 'deleted';
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Delete Data&idTransaksi=" . $transaksiID);
                exit();
            } else {
                $_SESSION['message'] = 'undeleted';
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Delete Data&idTransaksi=" . $transaksiID);
                exit();
            }
        } else {
            $_SESSION['message'] = 'gagalupdatestok';
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal update stok parfum&Parfum_id=" . $parfumID);
            exit();
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
                $_SESSION['message'] = 'berhasilcheckout';
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Checkout&idTransaksi=" . $idTransaksi);
                exit();
            } else {
                $_SESSION['message'] = 'gagalcheckout';
                header("location: index.php?page=Transaksi&aksi=checkoutTransaksi&pesan=Gagal checkout&idTransaksi=" . $idTransaksi);
                exit();
            }
        } else {
            $_SESSION['message'] = 'uangkurang';
            header("location: index.php?page=Transaksi&aksi=checkoutTransaksi&pesan=Gagal Checkout Uang Kurang&idTransaksi=" . $idTransaksi);
            exit();
        }
    }

    /**
     * Untuk mengatur tampilan halaman detail pembelian
     */

    public function viewDetailTransaksi()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $detailTransaksi = $this->model->getDetailTransaksi($idTransaksi);
        $total = $this->model->getTotalHarga($idTransaksi);
        $transaksi = $this->model->getTransaksiByID($idTransaksi);
        extract($detailTransaksi);
        extract($transaksi);
        extract($total);
        require_once("View/Transaksi/detailTransaksi.php");
    }

    /**
     * Function Aktifkan untuk untuk mengaktifkan transaksi
     */

    public function aktifkan()
    {
        $idTransaksi = $_GET['idTransaksi'];
        if ($this->model->updateStokParfum3($idTransaksi)) {
            if ($this->model->prosesAktifkan($idTransaksi)) {
                $_SESSION['message'] = 'berhasilaktifkan';
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Aktifkan Transaksi&idTransaksi=" . $idTransaksi);
                die();
            } else {
                $_SESSION['message'] = 'gagalaktifkan';
                header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Aktifkan Transaksi&idTransaksi=" . $idTransaksi);
                die();
            }
        } else {
            $_SESSION['message'] = 'gagalupdatestok';
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Mengupdate Stok Parfum&idTransaksi=" . $idTransaksi);
            die();
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
                $_SESSION['message'] = 'berhasilbatalkan';
                header("location: index.php?page=Transaksi&aksi=view&pesan=Berhasil Batalkan Transaksi&idTransaksi=" . $idTransaksi);
                exit();
            } else {
                $_SESSION['message'] = 'gagalbatalkan';
                header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Batalkan Transaksi&idTransaksi=" . $idTransaksi);
                exit();
            }
        } else {
            $_SESSION['message'] = 'gagalupdatestok';
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Mengupdate Stok Parfum&idTransaksi=" . $idTransaksi);
            die();
        }
    }
}
