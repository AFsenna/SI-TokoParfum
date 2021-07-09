<?php
class PegawaiController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek pegawai Model
     */

    public function __construct()
    {
        $this->model = new PegawaiModel();
        $this->jabatan = new JabatanModel();
    }
    /**
     * Untuk mengatur tampilan awal
     */

    public function index()
    {
        $pegawai = $this->model->CountPegawai();
        $stok = $this->model->CountStok();
        $transaksi = $this->model->CountTerjual();
        $pendapatan = $this->model->getPendapatan();
        extract($pegawai);
        extract($stok);
        extract($transaksi);
        extract($pendapatan);
        require_once("View/Pegawai/index.php");
    }

    /**
     * Untuk mengatur tampilan data pegawai
     */

    public function showPegawai()
    {
        $data = $this->model->getPegawai();
        extract($data);
        require_once("View/Pegawai/dataPegawai.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add pegawai
     */

    public function addPegawai()
    {
        $jabatan = $this->jabatan->get();
        extract($jabatan);
        require_once("View/Pegawai/addPegawai.php");
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nikPegawai, namaPegawai, usernamePegawai, passwordPegawai, emailPegawai, notelpPegawai dengan metode http request POST
     */

    public function storePegawai()
    {
        $nikPegawai = $_POST['NIK'];
        $namaPegawai = $_POST['namapegawai'];
        $usernamePegawai = $_POST['username'];
        $passwordPegawai = $_POST['password'];
        $emailPegawai = $_POST['email'];
        $notelpPegawai = $_POST['notelpPG'];
        $jabatanID = $_POST['jabatan'];

        if ($this->model->prosesStore($nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai, $jabatanID)) {
            $_SESSION['message'] = 'berhasil';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Berhasil Tambah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'gagal';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Gagal Tambah Data';</script>");
            exit();
        }
    }

    /**
     * function ini berfungsi untuk menampilkan halaman edit pegawai
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editPegawai()
    {
        $id = $_GET['id'];
        $data = $this->model->getById($id);
        $jabatan = $this->jabatan->get();
        extract($jabatan);
        extract($data);
        require_once("View/Pegawai/editPegawai.php");
    }

    /**
     * Function ini berfungsi untuk update pegawai
     */

    public function updatePegawai()
    {
        $idPegawai = $_POST['idPG'];
        $nikPegawai = $_POST['NIK'];
        $namaPegawai = $_POST['namapegawai'];
        $usernamePegawai = $_POST['username'];
        $passwordPegawai = $_POST['password'];
        $emailPegawai = $_POST['email'];
        $notelpPegawai = $_POST['notelpPG'];
        $jabatanID = $_POST['jabatan'];

        if ($this->model->prosesUpdate($idPegawai, $nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai, $jabatanID)) {
            $_SESSION['message'] = 'updated';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Berhasil Ubah Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'unupdated';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Gagal Ubah Data';</script>");
            exit();
        }
    }

    /**
     * Function delete berfungsi untuk menghapus pegawai
     */

    public function deletePegawai()
    {
        $idPegawai = $_GET['id'];
        if ($this->model->prosesDelete($idPegawai)) {
            $_SESSION['message'] = 'deleted';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Berhasil Delete Data';</script>");
            exit();
        } else {
            $_SESSION['message'] = 'undeleted';
            echo ("<script>location.href = 'index.php?page=Pegawai&aksi=viewData&pesan=Gagal Delete Data';</script>");
            exit();
        }
    }
}
