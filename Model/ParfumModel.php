<?php
class ParfumModel
{

    /**
     * Function get berfungsi untuk mengambil seluruh data parfum dari database
     */

    public function get()
    {
        $sql = "SELECT id_parfum, nama_parfum, expired_parfum, 
         gender as nama_kategori, stok, harga_parfum, 
         nama_pegawai from parfum 
         JOIN kategori ON parfum.kategori_id = kategori.id_kategori
         JOIN pegawai ON parfum.pegawai_id = pegawai.id_pegawai";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->get();
        extract($data);
        require_once("View/Parfum/index.php");
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
     * Function ini digunakan untuk menuju tampilan add parfum
     */

    public function addParfum()
    {
        $kategori = $this->getKategori();
        extract($kategori);
        require_once("View/Parfum/addParfum.php");
    }

    /**
     * Function prosesStore berfungsi untuk input data parfum
     */

    public function prosesStore($kategori_id, $pegawai_id, $nama_parfum, $expired, $harga, $stok)
    {
        $sql = "INSERT INTO parfum(kategori_id,pegawai_id,nama_parfum,expired_parfum,harga_parfum,stok) VALUES($kategori_id,$pegawai_id,'$nama_parfum','$expired',$harga,$stok)";
        return koneksi()->query($sql);
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data kategori_id,pegawai_id,nama_parfum,expired_parfum,harga_parfum,stok dengan metode http request POST
     */

    public function storeParfum()
    {
        $kategori_id = $_POST['kategoriP'];
        $pegawai_id = $_POST['idPegawai'];
        $nama_parfum = $_POST['namaparfum'];
        $expired = $_POST['expired'];
        $harga = $_POST['hargaparfum'];
        $stok = $_POST['stok'];

        if ($this->prosesStore($kategori_id, $pegawai_id, $nama_parfum, $expired, $harga, $stok)) {
            header("location: index.php?page=Parfum&aksi=view&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Parfum&aksi=view&pesan=Gagal Tambah Data");
        }
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
     * function ini berfungsi untuk menampilkan halaman edit parfum
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editParfum()
    {
        $id = $_GET['id'];
        $kategori = $this->getKategori();
        $data = $this->getById($id);
        extract($kategori);
        extract($data);
        require_once("View/Parfum/editParfum.php");
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idParfum, $kategori_id, $pegawai_id, $nama_parfum, $expired_parfum, $harga_parfum, $stok)
    {
        $sql = "UPDATE parfum SET kategori_id = $kategori_id ,pegawai_id = $pegawai_id,
        nama_parfum = '$nama_parfum',expired_parfum = '$expired_parfum',
        harga_parfum = $harga_parfum,stok = $stok
        WHERE id_parfum = $idParfum";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function ini berfungsi untuk update parfum
     */

    public function updateParfum()
    {
        $idParfum = $_POST['idParfum'];
        $kategori_id = $_POST['kategoriP'];
        $pegawai_id = $_POST['idPegawai'];
        $nama_parfum = $_POST['namaparfum'];
        $expired = $_POST['expired'];
        $harga = $_POST['hargaparfum'];
        $stok = $_POST['stok'];
        if ($this->prosesUpdate($idParfum, $kategori_id, $pegawai_id, $nama_parfum, $expired, $harga, $stok)) {
            header("location: index.php?page=Parfum&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Parfum&aksi=editParfum&pesan=Gagal Ubah Data");
        }
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

    /**
     * Function delete berfungsi untuk menghapus pegawai
     */

    public function deleteParfum()
    {
        $idParfum = $_GET['id'];
        if ($this->prosesDelete($idParfum)) {
            header("location: index.php?page=Parfum&aksi=view&pesan=Berhasil Delete Data");
        } else {
            header("location: index.php?page=Parfum&aksi=view&pesan=Gagal Delete Data");
        }
    }
}
