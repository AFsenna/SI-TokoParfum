<?php
class PembeliController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek pembeli Model
     */

    public function __construct()
    {
        $this->model = new PembeliModel();
    }

    /**
     * Untuk mengatur tampilan awal pembeli
     */

    public function index()
    {
        $data = $this->model->getPembeli();
        extract($data);
        require_once("View/Pembeli/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add pembeli
     */

    public function addPembeli()
    {
        require_once("View/Pembeli/addPembeli.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nama_pembeli,notelp_pembeli dengan metode http request POST
     */

    public function storePembeli()
    {
        $namaPembeli = $_POST['namaPembeli'];
        $notelpPembeli = $_POST['notelpPembeli'];

        if ($this->model->prosesStore($namaPembeli, $notelpPembeli)) {
            $_SESSION['message'] = 'berhasil';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Tambah Data");
            exit();
        } else {
            $_SESSION['message'] = 'gagal';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Tambah Data");
            exit();
        }
    }

    /**
     * function ini berfungsi untuk menampilkan halaman edit pembeli
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editPembeli()
    {
        $id = $_GET['id'];
        $data = $this->model->getById($id);
        extract($data);
        require_once("View/Pembeli/editPembeli.php");
    }

    /**
     * Function ini berfungsi untuk update pembeli
     */

    public function updatePembeli()
    {
        $idPembeli = $_POST['idPembeli'];
        $namaPembeli = $_POST['namaPembeli'];
        $notelpPembeli = $_POST['notelpPembeli'];

        if ($this->model->prosesUpdate($idPembeli, $namaPembeli, $notelpPembeli)) {
            $_SESSION['message'] = 'updated';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Ubah Data");
            exit();
        } else {
            $_SESSION['message'] = 'unupdated';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Ubah Data");
            exit();
        }
    }

    /**
     * Function Aktifkan untuk untuk mengaktifkan pembeli
     */

    public function aktifkan()
    {
        $idPembeli = $_GET['idPembeli'];
        if ($this->model->prosesAktifkan($idPembeli)) {
            $_SESSION['message'] = 'berhasilaktifkan';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Aktifkan Pembeli&idPembeli=" . $idPembeli);
            exit();
        } else {
            $_SESSION['message'] = 'gagalaktifkan';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Aktifkan Stok Parfum&idPembeli=" . $idPembeli);
            exit();
        }
    }

    /**
     * Function nonAktifkan untuk nonAktifkan pembeli
     */

    public function nonAktifkan()
    {
        $idPembeli = $_GET['idPembeli'];
        if ($this->model->prosesNonAktifkan($idPembeli)) {
            $_SESSION['message'] = 'berhasilaktifkan';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Non-Aktifkan Pembeli&idPembeli=" . $idPembeli);
            exit();
        } else {
            $_SESSION['message'] = 'gagalaktifkan';
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Non-Aktifkan Pembeli&idPembeli=" . $idPembeli);
            exit();
        }
    }
}
