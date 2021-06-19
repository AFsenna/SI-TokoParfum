<?php
class ParfumController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek parfum Model
     */

    public function __construct()
    {
        $this->model = new ParfumModel();
    }

    /**
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/Parfum/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add parfum
     */

    public function addParfum()
    {
        $kategori = $this->model->getKategori();
        extract($kategori);
        require_once("View/Parfum/addParfum.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data kategori_id,pegawai_id,nama_parfum,expired_parfum,harga_parfum,stok dengan metode http request POST
     */

    public function storeParfum()
    {
        $kategori_id = $_POST['kategoriP'];
        $nama_parfum = $_POST['namaparfum'];
        $expired = $_POST['expired'];
        $harga = $_POST['hargaparfum'];
        $stok = $_POST['stok'];

        if ($this->model->prosesStore($kategori_id, $nama_parfum, $expired, $harga, $stok)) {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=view&pesan=Berhasil Tambah Data';</script>");
        } else {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=view&pesan=Gagal Tambah Data';</script>");
        }
    }

    /**
     * function ini berfungsi untuk menampilkan halaman edit parfum
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editParfum()
    {
        $id = $_GET['id'];
        $kategori = $this->model->getKategori();
        $data = $this->model->getById($id);
        extract($kategori);
        extract($data);
        require_once("View/Parfum/editParfum.php");
    }

    /**
     * Function ini berfungsi untuk update parfum
     */

    public function updateParfum()
    {
        $idParfum = $_POST['idParfum'];
        $kategori_id = $_POST['kategoriP'];
        $nama_parfum = $_POST['namaparfum'];
        $expired = $_POST['expired'];
        $harga = $_POST['hargaparfum'];
        $stok = $_POST['stok'];

        if ($this->model->prosesUpdate($idParfum, $kategori_id, $nama_parfum, $expired, $harga, $stok)) {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=view&pesan=Berhasil Ubah Data';</script>");
        } else {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=editParfum&pesan=Gagal Ubah Data';</script>");
        }
    }

    /**
     * Function delete berfungsi untuk menghapus pegawai
     */

    public function deleteParfum()
    {
        $idParfum = $_GET['id'];
        if ($this->model->prosesDelete($idParfum)) {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=view&pesan=Berhasil Delete Data';</script>");
        } else {
            echo ("<script>location.href = 'index.php?page=Parfum&aksi=view&pesan=Gagal Delete Data';</script>");
        }
    }
}
