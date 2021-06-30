<?php
class JabatanController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek jabatan Model
     */

    public function __construct()
    {
        $this->model = new JabatanModel();
    }

    /**
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->model->get();
        extract($data);
        require_once("View/Jabatan/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add jabatan
     */

    public function addJabatan()
    {
        require_once("View/Jabatan/addJabatan.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nama_pegawai dengan metode http request POST
     */

    public function storeJabatan()
    {
        $namaJabatan = $_POST['namaJabatan'];

        if ($this->model->prosesStore($namaJabatan)) {
            $_SESSION['message'] = 'berhasil';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Berhasil Tambah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'gagal';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Gagal Tambah Data';</script>");
            exit();
        }
    }

    /**
     * function ini berfungsi untuk menampilkan halaman edit jabatan
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editJabatan()
    {
        $id = $_GET['id'];
        $data = $this->model->getById($id);
        extract($data);
        require_once("View/Jabatan/editJabatan.php");
    }

    /**
     * Function ini berfungsi untuk update jabatan
     */
    public function updateJabatan()
    {
        $idJabatan = $_POST['idJabatan'];
        $namaJabatan = $_POST['namaJabatan'];

        if ($this->model->prosesUpdate($idJabatan, $namaJabatan)) {
            $_SESSION['message'] = 'updated';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Berhasil Ubah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'unupdated';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Gagal Ubah Data';</script>");
            exit();
        }
    }

    /**
     * Function delete berfungsi untuk menghapus jabatan
     */

    public function deleteJabatan()
    {
        $idJabatan = $_GET['id'];
        if ($this->model->prosesDelete($idJabatan)) {
            $_SESSION['message'] = 'deleted';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Berhasil Delete Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'undeleted';
            echo ("<script>location.href = 'index.php?page=Jabatan&aksi=view&pesan=Gagal Delete Data';</script>");
            exit();
        }
    }
}
