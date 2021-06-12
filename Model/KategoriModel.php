<?php
class KategoriModel
{
    /**
     * Function get berfungsi untuk mengambil seluruh data kategori dari database
     */

    public function get()
    {
        $sql = "SELECT * FROM kategori";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data kategori
     */

    public function prosesStore($gender)
    {
        $sql = "INSERT INTO kategori(gender) VALUES('$gender')";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data kategori dari database
     * @param Integer $id berisi id dari salah satu kategori
     */

    public function getById($id)
    {
        $sql = "SELECT * FROM kategori WHERE id_kategori = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idKategori, $gender)
    {
        $sql = "UPDATE kategori 
         SET gender = '$gender'
         WHERE id_kategori = $idKategori";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function delete berfungsi untuk menghapus data kategori dari database
     * @param Integer id berisi id kategori
     */

    public function prosesDelete($idKategori)
    {
        $sql = "DELETE FROM kategori WHERE id_kategori = $idKategori";
        return koneksi()->query($sql);
    }
}
