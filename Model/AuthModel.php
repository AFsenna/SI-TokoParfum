<?php
class AuthModel
{

    /**
     * Untuk mengatur tampilan awal / login
     */

    public function index()
    {
        require_once("View/Auth/index.php");
    }

    /**
     * Untuk mengatur proses auth pegawai
     */

    public function proses_authPegawai($username, $password)
    {
        $sql = "SELECT * FROM pegawai WHERE username_pegawai='$username' AND password_pegawai='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * untuk auth pegawai
     */

    public function authPegawai()
    {
        $username = $_POST['usernamePG'];
        $password = $_POST['passwordPG'];
        $data = $this->proses_authPegawai($username, $password);
        if ($data) {
            $_SESSION['role'] = 'Pegawai';
            $_SESSION['pegawai'] = $data;
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
