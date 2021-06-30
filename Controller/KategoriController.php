<?php
class KategoriController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek kategori Model
     */

    public function __construct()
    {
        $this->model = new KategoriModel();
    }

    /**
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/Kategori/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add kategori
     */

    public function addKategori()
    {
        require_once("View/Kategori/addKategori.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data gender dengan metode http request POST
     */

    public function storeKategori()
    {
        $gender = $_POST['gender'];

        if ($this->model->prosesStore($gender)) {
            $_SESSION['message'] = 'berhasil';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Berhasil Tambah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'gagal';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Gagal Tambah Data';</script>");
            exit();
        }
    }

    /**
     * function ini berfungsi untuk menampilkan halaman edit kategori
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editKategori()
    {
        $id = $_GET['id'];
        $data = $this->model->getById($id);
        extract($data);
        require_once("View/Kategori/editKategori.php");
    }

    /**
     * Function ini berfungsi untuk update kategori
     */
    public function updateKategori()
    {
        $idKategori = $_POST['idKategori'];
        $gender = $_POST['gender'];

        if ($this->model->prosesUpdate($idKategori, $gender)) {
            $_SESSION['message'] = 'updated';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Berhasil Ubah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'unupdated';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Gagal Ubah Data';</script>");
            exit();
        }
    }

    /**
     * Function delete berfungsi untuk menghapus kategori
     */

    public function deleteKategori()
    {
        $idKategori = $_GET['id'];
        if ($this->model->prosesDelete($idKategori)) {
            $_SESSION['message'] = 'deleted';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Berhasil Delete Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'undeleted';
            echo ("<script>location.href = 'index.php?page=Kategori&aksi=view&pesan=Gagal Delete Data';</script>");
            exit();
        }
    }
}
