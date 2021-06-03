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
     * Untuk mengatur tampilan data awal
     */

    public function index()
    {
        $data = $this->get();
        extract($data);
        require_once("View/Jabatan/index.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add jabatan
     */

    public function addJabatan()
    {
        require_once("View/Jabatan/addJabatan.php");
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
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nama_pegawai dengan metode http request POST
     */

    public function storeJabatan()
    {
        $namaJabatan = $_POST['namaJabatan'];

        if ($this->prosesStore($namaJabatan)) {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Gagal Tambah Data");
        }
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
     * function ini berfungsi untuk menampilkan halaman edit jabatan
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editJabatan()
    {
        $id = $_GET['id'];
        $data = $this->getById($id);
        extract($data);
        require_once("View/Jabatan/editJabatan.php");
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
     * Function ini berfungsi untuk update jabatan
     */
    public function updateJabatan()
    {
        $idJabatan = $_POST['idJabatan'];
        $namaJabatan = $_POST['namaJabatan'];

        if ($this->prosesUpdate($idJabatan, $namaJabatan)) {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Gagal Ubah Data");
        }
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

    /**
     * Function delete berfungsi untuk menghapus jabatan
     */

    public function deleteJabatan()
    {
        $idJabatan = $_GET['id'];
        if ($this->prosesDelete($idJabatan)) {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Berhasil Delete Data");
        } else {
            header("location: index.php?page=Jabatan&aksi=view&pesan=Gagal Delete Data");
        }
    }
}
