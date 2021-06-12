<?php
class JabatanModel
{
    /**
     * Function get berfungsi untuk mengambil seluruh data jabatan dari database
     */

    public function get()
    {
        $sql = "SELECT * FROM jabatan";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data jabatan
     */

    public function prosesStore($namaJabatan)
    {
        $sql = "INSERT INTO jabatan(nama_jabatan) VALUES('$namaJabatan')";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data jabatan dari database
     * @param Integer $id berisi id dari salah satu kategori
     */

    public function getById($id)
    {
        $sql = "SELECT * FROM jabatan WHERE id_jabatan = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idJabatan, $namaJabatan)
    {
        $sql = "UPDATE jabatan 
         SET nama_jabatan = '$namaJabatan'
         WHERE id_jabatan = $idJabatan";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function delete berfungsi untuk menghapus data jabatan dari database
     * @param Integer id berisi id jabatan
     */

    public function prosesDelete($idJabatan)
    {
        $sql = "DELETE FROM jabatan WHERE id_jabatan = $idJabatan";
        return koneksi()->query($sql);
    }
}
