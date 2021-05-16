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
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->get();
        extract($data);
        require_once("View/Kategori/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add kategori
     */

    public function addKategori()
    {
        require_once("View/Kategori/addKategori.php");
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
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nikPegawai, namaPegawai, usernamePegawai, passwordPegawai, emailPegawai, notelpPegawai dengan metode http request POST
     */

    public function storeKategori()
    {
        $gender = $_POST['gender'];

        if ($this->prosesStore($gender)) {
            header("location: index.php?page=Kategori&aksi=view&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Kategori&aksi=view&pesan=Gagal Tambah Data");
        }
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
     * function ini berfungsi untuk menampilkan halaman edit kategori
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editKategori()
    {
        $id = $_GET['id'];
        $data = $this->getById($id);
        extract($data);
        require_once("View/Kategori/editKategori.php");
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
     * Function ini berfungsi untuk update kategori
     */
    public function updateKategori()
    {
        $idKategori = $_POST['idKategori'];
        $gender = $_POST['gender'];

        if ($this->prosesUpdate($idKategori, $gender)) {
            header("location: index.php?page=Kategori&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Kategori&aksi=view&pesan=Gagal Ubah Data");
        }
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

    /**
     * Function delete berfungsi untuk menghapus kategori
     */

    public function deleteKategori()
    {
        $idKategori = $_GET['id'];
        if ($this->prosesDelete($idKategori)) {
            header("location: index.php?page=Kategori&aksi=view&pesan=Berhasil Delete Data");
        } else {
            header("location: index.php?page=Kategori&aksi=view&pesan=Gagal Delete Data");
        }
    }
}
