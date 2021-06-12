<?php
class ParfumModel
{

    /**
     * Function get berfungsi untuk mengambil seluruh data parfum dari database
     */

    public function get()
    {
        $sql = "SELECT id_parfum, nama_parfum, expired_parfum, 
         gender as nama_kategori, stok, harga_parfum from parfum 
         JOIN kategori ON parfum.kategori_id = kategori.id_kategori";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * function ini digunakan untuk mengambil seluruh data kategori dari database 
     */

    public function getKategori()
    {
        $sql = "SELECT * FROM kategori";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($kategori = $query->fetch_assoc()) {
            $hasil[] = $kategori;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data parfum
     */

    public function prosesStore($kategori_id, $nama_parfum, $expired, $harga, $stok)
    {
        $sql = "INSERT INTO parfum(kategori_id,nama_parfum,expired_parfum,harga_parfum,stok) VALUES($kategori_id,'$nama_parfum','$expired',$harga,$stok)";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data parfum dari database
     * @param Integer $id berisi id dari salah satu parfum
     */

    public function getById($id)
    {
        $sql = "SELECT * FROM parfum WHERE id_parfum = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idParfum, $kategori_id, $nama_parfum, $expired_parfum, $harga_parfum, $stok)
    {
        $sql = "UPDATE parfum SET kategori_id = $kategori_id,
        nama_parfum = '$nama_parfum',expired_parfum = '$expired_parfum',
        harga_parfum = $harga_parfum,stok = $stok
        WHERE id_parfum = $idParfum";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function delete berfungsi untuk menghapus data parfum dari database
     * @param Integer id berisi id parfum
     */

    public function prosesDelete($idParfum)
    {
        $sql = "DELETE FROM parfum WHERE id_parfum = $idParfum";
        return koneksi()->query($sql);
    }
}
