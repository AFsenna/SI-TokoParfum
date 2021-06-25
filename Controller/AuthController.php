<?php
class AuthController
{
    private $model;

    /**
     * Function ini adalah constructor yang berguna menginisialisasi obyek auth Model
     */

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    /**
     * Untuk mengatur tampilan awal / login
     */

    public function index()
    {
        require_once("View/Auth/index.php");
    }

    /**
     * untuk auth pegawai
     * ucfirst digunakan untuk mengubah huruf pertama pada jabatan menjadi kapital
     */

    public function authPegawai()
    {
        $username = $_POST['usernamePG'];
        $password = $_POST['passwordPG'];
        $data = $this->model->proses_authPegawai($username, $password);

        if ($data) {
            $_SESSION['pegawai'] = $data;
            $_SESSION['message'] = 'success';
            $jabatan = $this->model->getJabatan($_SESSION['pegawai']['jabatan_id']);
            $_SESSION['jabatan'] = ucfirst($jabatan['nama_jabatan']);
            header("location: index.php?page=Pegawai&aksi=view");
        } else {
            $_SESSION['message'] = 'error';
            header("location: index.php?page=Auth&aksi=view");
        }
    }

    /**
     * Function ini digunakan untuk logout dan destroy session
     */

    public function logout()
    {
        session_destroy();
        header("location: index.php?page=Auth&aksi=view&pesan=Berhasil logout");
    }
}
