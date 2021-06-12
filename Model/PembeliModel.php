<?php
class PembeliModel
{
    /**
     * Pada Pembeli apabila :
     * status_pembeli = 0 = tidak aktif
     * status_pembeli = 1 = aktif
     * status pembeli akan berubah menjadi tidak aktif secara otomatis apabila
     * pembeli tidak membeli/melakukan transaksi/pembelian selama sebulan
     * dan status pembeli menjadi aktif apabila melakukan/membuat transaksi
     */

    /**
     * Function get berfungsi untuk mengambil seluruh data pembeli dari database
     */

    public function getPembeli()
    {
        $sql = "SELECT * FROM pembeli";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function prosesStore berfungsi untuk input data pembeli
     * Function ini menambahkan namaPembeli, notelpPembeli sesuai inputan user dan
     * menambahkan status pembeli menjadi tidak aktif (status_pembeli = 0)
     */

    public function prosesStore($namaPembeli, $notelpPembeli)
    {
        $sql = "INSERT INTO pembeli(nama_pembeli,notelp_pembeli,status_pembeli) VALUES('$namaPembeli','$notelpPembeli',0)";
        return koneksi()->query($sql);
    }

    /**
     * Function getById berfungsi untuk mengambil satu data pembeli dari database
     * @param Integer $id berisi id dari salah satu pembeli
     */

    public function getById($id)
    {
        $sql = "SELECT * FROM pembeli WHERE id_pembeli = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idPembeli, $namaPembeli, $notelpPembeli)
    {
        $sql = "UPDATE pembeli 
         SET nama_pembeli = '$namaPembeli', notelp_pembeli = '$notelpPembeli'
         WHERE id_pembeli = $idPembeli";
        $query = koneksi()->query($sql);
        return $query;
    }
}
