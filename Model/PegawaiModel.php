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
     * Untuk mengatur tampilan awal
     */

    public function index()
    {
        $pegawai = $this->CountPegawai();
        $stok = $this->CountStok();
        $transaksi = $this->CountTerjual();
        extract($pegawai);
        extract($stok);
        extract($transaksi);
        require_once("View/Pegawai/index.php");
    }

    /**
     * Function get berfungsi untuk mengambil seluruh data pegawai dari database
     */

    public function getPegawai()
    {
        $sql = "SELECT nama_jabatan, nama_pegawai, 
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
     * Untuk mengatur tampilan data pegawai
     */

    public function showPegawai()
    {
        $data = $this->getPegawai();
        extract($data);
        require_once("View/Pegawai/dataPegawai.php");
    }

    /**
     * Function ini digunakan untuk menuju tampilan add pegawai
     */

    public function addPegawai()
    {
        require_once("View/Pegawai/addPegawai.php");
    }

    /**
     * Function prosesStore berfungsi untuk input data pegawai
     */

    public function prosesStore($nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai)
    {
        $sql = "INSERT INTO pegawai(nik_pegawai,nama_pegawai,username_pegawai,password_pegawai,email_pegawai,notelp_pegawai) VALUES('$nikPegawai','$namaPegawai','$usernamePegawai','$passwordPegawai','$emailPegawai','$notelpPegawai')";
        return koneksi()->query($sql);
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data nikPegawai, namaPegawai, usernamePegawai, passwordPegawai, emailPegawai, notelpPegawai dengan metode http request POST
     */

    public function storePegawai()
    {
        $nikPegawai = $_POST['NIK'];
        $namaPegawai = $_POST['namapegawai'];
        $usernamePegawai = $_POST['username'];
        $passwordPegawai = $_POST['password'];
        $emailPegawai = $_POST['email'];
        $notelpPegawai = $_POST['notelpPG'];

        if ($this->prosesStore($nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai)) {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Berhasil Tambah Data");
        } else {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Gagal Tambah Data");
        }
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
     * function ini berfungsi untuk menampilkan halaman edit pegawai
     * juga mengambil salah satu data dari database berdasarkan id
     * function membutuhkan data id dengan metode http request GET
     */

    public function editPegawai()
    {
        $id = $_GET['id'];
        $data = $this->getById($id);
        extract($data);
        require_once("View/Pegawai/editPegawai.php");
    }

    /**
     * Function ini berfungsi untuk memproses update ke database
     */

    public function prosesUpdate($idPegawai, $nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai)
    {
        $sql = "UPDATE pegawai 
         SET nama_pegawai = '$namaPegawai', nik_pegawai = '$nikPegawai', 
         username_pegawai = '$usernamePegawai', password_pegawai = '$passwordPegawai', 
         email_pegawai = '$emailPegawai', notelp_pegawai = '$notelpPegawai'
         WHERE id_pegawai = $idPegawai";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function ini berfungsi untuk update pegawai
     */

    public function updatePegawai()
    {
        $idPegawai = $_POST['idPG'];
        $nikPegawai = $_POST['NIK'];
        $namaPegawai = $_POST['namapegawai'];
        $usernamePegawai = $_POST['username'];
        $passwordPegawai = $_POST['password'];
        $emailPegawai = $_POST['email'];
        $notelpPegawai = $_POST['notelpPG'];

        if ($this->prosesUpdate($idPegawai, $nikPegawai, $namaPegawai, $usernamePegawai, $passwordPegawai, $emailPegawai, $notelpPegawai)) {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Berhasil Ubah Data");
        } else {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Gagal Ubah Data");
        }
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

    /**
     * Function delete berfungsi untuk menghapus pegawai
     */

    public function deletePegawai()
    {
        $idPegawai = $_GET['id'];
        if ($this->prosesDelete($idPegawai)) {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Berhasil Delete Data");
        } else {
            header("location: index.php?page=Pegawai&aksi=viewPegawai&pesan=Gagal Delete Data");
        }
    }
}
