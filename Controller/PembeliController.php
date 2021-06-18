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
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Tambah Data");
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
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Ubah Data");
        }
    }

    /**
     * Function Aktifkan untuk untuk mengaktifkan pembeli
     */

    public function aktifkan()
    {
        $idPembeli = $_GET['idPembeli'];
        if ($this->model->prosesAktifkan($idPembeli)) {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Aktifkan Pembeli&idPembeli=" . $idPembeli);
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Aktifkan Stok Parfum&idPembeli=" . $idPembeli);
        }
    }

    /**
     * Function nonAktifkan untuk nonAktifkan pembeli
     */

    public function nonAktifkan()
    {
        $idPembeli = $_GET['idPembeli'];
        if ($this->model->prosesNonAktifkan($idPembeli)) {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Non-Aktifkan Pembeli&idPembeli=" . $idPembeli);
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Non-Aktifkan Pembeli&idPembeli=" . $idPembeli);
        }
    }
}
