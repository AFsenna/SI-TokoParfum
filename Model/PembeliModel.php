<?php
class PembeliModel
{
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
     * Untuk mengatur tampilan awal pembeli
     */

    public function index()
    {
        $data = $this->getPembeli();
        extract($data);
        require_once("View/Pembeli/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add pembeli
     */

    public function addPembeli()
    {
        require_once("View/Pembeli/addPembeli.php");
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
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nama_pembeli,notelp_pembeli dengan metode http request POST
     */

    public function storePembeli()
    {
        $namaPembeli = $_POST['namaPembeli'];
        $notelpPembeli = $_POST['notelpPembeli'];

        if ($this->prosesStore($namaPembeli, $notelpPembeli)) {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Tambah Data");
        }
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
     * function ini berfungsi untuk menampilkan halaman edit pembeli
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editPembeli()
    {
        $id = $_GET['id'];
        $data = $this->getById($id);
        extract($data);
        require_once("View/Pembeli/editPembeli.php");
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

    /**
     * Function ini berfungsi untuk update pembeli
     */

    public function updatePembeli()
    {
        $idPembeli = $_POST['idPembeli'];
        $namaPembeli = $_POST['namaPembeli'];
        $notelpPembeli = $_POST['notelpPembeli'];

        if ($this->prosesUpdate($idPembeli, $namaPembeli, $notelpPembeli)) {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Pembeli&aksi=view&pesan=Gagal Ubah Data");
        }
    }
}
