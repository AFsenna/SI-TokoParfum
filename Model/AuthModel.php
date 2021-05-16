<?php
class AuthModel
{

    /**
     * Untuk mengatur tampilan awal
     */

    public function index()
    {
        require_once("View/Auth/index.php");
    }

    /**
     * Untuk mengatur tampilan login admin
     */

    public function loginAdmin()
    {
        require_once("View/Auth/admin.php");
    }

    /**
     * Untuk mengatur tampilan login pegawai
     */

    public function loginPegawai()
    {
        require_once("View/Auth/pegawai.php");
    }

    /**
     * Untuk mengatur proses auth admin
     */

    public function proses_authAdmin($username, $password)
    {
        $sql = "SELECT * FROM admin WHERE username_admin='$username' AND password_admin='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * auth admin
     */

    public function authAdmin()
    {
        $username = $_POST['usernameAD'];
        $password = $_POST['passwordAD'];
        $data = $this->proses_authAdmin($username, $password);
        if ($data) {
            $_SESSION['role'] = 'Admin';
            $_SESSION['admin'] = $data;
            header("location: index.php?page=Admin&aksi=view&pesan=Berhasil login");
        } else {
            header("location: index.php?page=Auth&aksi=loginAdmin&pesan=Username atau password salah!!");
        }
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
     * auth admin
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

    public function logout()
    {
        session_destroy();
        header("location: index.php?page=Auth&aksi=view&pesan=Berhasil logout");
    }
}
