<?php
class PegawaiModel
{
    /**
     * Function ini digunakan untuk menjumlahkan data pegawai
     */

    public function CountPegawai()
    {
        $sql = "SELECT COUNT(*) as jumlahPegawai FROM pegawai";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini digunakan untuk menjumlahkan data stok parfum
     */

    public function CountStok()
    {
        $sql = "SELECT SUM(stok) as stokParfum FROM parfum";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini digunakan untuk menjumlahkan data jumlah parfum terjual
     */

    public function CountTerjual()
    {
        $sql = "SELECT SUM(jumlah_parfum) as jumlahPenjualan FROM detail_transaksi";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini digunakan untuk mendapatkan data pendapatan per bulan
     * COALESCE() untuk memberi data pengganti ketika datanya null
     * MONTH() untuk mengambil bulan
     * YEAR() untuk mengambil tahun
     */

    public function getPendapatan()
    {
        $i = 1;
        while ($i < 13) {
            $sql = "SELECT COALESCE(sum(detail_transaksi.jumlah_parfum*parfum.harga_parfum),0) 
            AS jumlahPendapatan
            from detail_transaksi 
            JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi 
            JOIN parfum ON detail_transaksi.parfum_id = parfum.id_parfum 
            WHERE transaksi.status_transaksi=1 
            AND MONTH(transaksi.tanggal)=$i 
            AND YEAR(transaksi.tanggal)=YEAR(now())";
            $query = koneksi()->query($sql);
            $data = $query->fetch_assoc();
            $hasil[$i] = $data;
            $i++;
        }
        return $hasil;
    }

    /**
     * Function get berfungsi untuk mengambil seluruh data pegawai dari database
     */

    public function getPegawai()
    {
        $sql = "SELECT nama_jabatan, nama_pegawai, id_pegawai,
        nik_pegawai, username_pegawai,
        password_pegawai, email_pegawai, 
        notelp_pegawai FROM pegawai
        JOIN jabatan ON pegawai.jabatan_id = jabatan.id_jabatan";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * function ini digunakan untuk mengambil seluruh data jabatan dari database 
     */

    public function getJabatan()
    {
        $sql = "SELECT * FROM jabatan";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($jabatan = $query->fetch_assoc()) {
            $hasil[] = $jabatan;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data pegawai
     */

    public function prosesStore($nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai, $jabatanID)
    {
        $sql = "INSERT INTO pegawai(nik_pegawai,nama_pegawai,username_pegawai,password_pegawai,email_pegawai,notelp_pegawai,jabatan_id) VALUES('$nikPegawai','$namaPegawai','$usernamePegawai','$passwordPegawai','$emailPegawai','$notelpPegawai',$jabatanID)";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data pegawai dari database
     * @param Integer $id berisi id dari salah satu pegawai
     */

    public function getById($id)
    {
        $sql = "SELECT * FROM pegawai WHERE id_pegawai = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idPegawai, $nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai, $jabatanID)
    {
        $sql = "UPDATE pegawai 
         SET nama_pegawai = '$namaPegawai', nik_pegawai = '$nikPegawai', 
         username_pegawai = '$usernamePegawai', password_pegawai = '$passwordPegawai', 
         email_pegawai = '$emailPegawai', notelp_pegawai = '$notelpPegawai, jabatan_id = $jabatanID'
         WHERE id_pegawai = $idPegawai";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function delete berfungsi untuk menghapus data pegawai dari database
     * @param Integer id berisi id pegawai
     */

    public function prosesDelete($idPegawai)
    {
        $sql = "DELETE FROM pegawai WHERE id_pegawai = $idPegawai";
        return koneksi()->query($sql);
    }
}
