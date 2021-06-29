<?php
class AuthModel
{

    /**
     * Untuk mengatur proses auth pegawai
     */

    public function proses_authPegawai($username, $password)
    {
        $sql = "SELECT pegawai.id_pegawai, pegawai.nama_pegawai, pegawai.username_pegawai, pegawai.password_pegawai,
        pegawai.email_pegawai, pegawai.notelp_pegawai, jabatan.nama_jabatan, pegawai.nik_pegawai FROM pegawai 
        JOIN jabatan ON pegawai.jabatan_id = jabatan.id_jabatan
        WHERE username_pegawai='$username' AND password_pegawai='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}
