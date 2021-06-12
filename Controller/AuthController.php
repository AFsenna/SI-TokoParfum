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
            $_SESSION['role'] = 'Pegawai';
            $_SESSION['pegawai'] = $data;
            $jabatanAdmin = $this->model->getJabatan($_SESSION['pegawai']['jabatan_id']);
            $_SESSION['jabatan'] = ucfirst($jabatanAdmin['nama_jabatan']);
            header("location: index.php?page=Pegawai&aksi=view&pesan=Berhasil login");
        } else {
            header("location: index.php?page=Auth&aksi=loginPegawai&pesan=Username atau password salah!!");
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
