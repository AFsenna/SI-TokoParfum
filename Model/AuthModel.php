<?php
class AuthModel
{

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
     * untuk mendapatkan jabatan administrasi
     */

    public function getJabatan($idJabatan)
    {
        $sql = "SELECT * FROM jabatan WHERE id_jabatan=$idJabatan";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}
