<?php
class TransaksiModel
{
    /**
     * Pada Transaksi apabila :
     * status_transaksi = 0 = belum checkout
     * status_transaksi = 1 = sudah checkout
     * status_transaksi = 2 = transaksi dibatalkan
     */

    /**
     * Function get berfungsi untuk mengambil seluruh data transaksi dari database
     */

    public function get()
    {
        $sql = "SELECT pembeli.nama_pembeli, transaksi.tanggal, 
        COALESCE(SUM(detail_transaksi.jumlah_parfum * parfum.harga_parfum),0) AS total_harga,
        transaksi.status_transaksi FROM transaksi 
        LEFT JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
        LEFT JOIN pembeli ON transaksi.pembeli_id = pembeli.id_pembeli
        LEFT JOIN parfum ON detail_transaksi.parfum_id = parfum.id_parfum
        GROUP BY transaksi.id_transaksi";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($data = $query->fetch_assoc()) {
            $hasil[] = $data;
        }
        return $hasil;
    }

    /**
     * Function ini digunakan untuk mendapatkan data tabel pembeli
     */

    public function getPembeli()
    {
        $sql = "SELECT * from pembeli";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($pembeli = $query->fetch_assoc()) {
            $hasil[] = $pembeli;
        }
        return $hasil;
    }

    /**
     * Untuk mengatur tampilan awal transaksi
     */

    public function index()
    {
        $data = $this->get();
        $pembeli = $this->getPembeli();
        extract($data);
        extract($pembeli);
        require_once("View/Transaksi/index.php");
    }

    /**
     * Function prosesStore berfungsi untuk input data transaksi
     */

    public function prosesStore($pembeli_id, $pegawai_id)
    {
        $sql = "INSERT INTO transaksi(pembeli_id,pegawai_id,tanggal,status_transaksi) VALUES($pembeli_id,$pegawai_id,now(),0)";
        $sql .= "UPDATE pembeli SET status_pembeli = 1 WHERE id_pembeli = $pembeli_id";
        return koneksi()->query($sql);
    }

    /**
     * Function ini digunakan untuk mendapatkan id terakhir tabel transaksi
     */

    public function getLast()
    {
        $sql = "SELECT id_transaksi from transaksi
        ORDER BY id_transaksi DESC 
        LIMIT 1";

        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data pembeli_id, pegawai_id dengan metode http request POST
     */

    public function createTransaksi()
    {
        $pembeli_id = $_POST['idPembeli'];
        $pegawai_id = $_SESSION['pegawai']['id_pegawai'];
        $idTransaksi = $this->getLast();
        if ($this->prosesStore($pembeli_id, $pegawai_id)) {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&idTransaksi=" . $idTransaksi['id_transaksi']);
        } else {
            header("location: index.php?page=Transaksi&aksi=view&pesan=Gagal Tambah Data");
        }
    }

    /**
     * Function ini digunakan untuk mendapatkan data tabel parfum
     */

    public function getParfum()
    {
        $sql = "SELECT * from parfum";
        $query = koneksi()->query($sql);
        $hasil = [];
        while ($parfum = $query->fetch_assoc()) {
            $hasil[] = $parfum;
        }
        return $hasil;
    }

    /**
     * Function ini digunakan untuk mendapatkan data tabel parfum berdasarkan id
     */

    public function getParfumByID($parfumID)
    {
        $sql = "SELECT * from parfum WHERE id_parfum = $parfumID";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini digunakan untuk mendapatkan data detail transaksi
     */

    public function getDetailTransaksi($idTransaksi)
    {
        $sql = "SELECT detail_transaksi.transaksi_id,parfum.nama_parfum, 
        detail_transaksi.jumlah_parfum, detail_transaksi.parfum_id, 
        detail_transaksi.jumlah_parfum * parfum.harga_parfum AS jumlah_harga
        FROM detail_transaksi
        JOIN parfum ON detail_transaksi.parfum_id = parfum.id_parfum
        WHERE detail_transaksi.transaksi_id = $idTransaksi";

        $query = koneksi()->query($sql);
        $hasil = [];
        while ($detailTransaksi = $query->fetch_assoc()) {
            $hasil[] = $detailTransaksi;
        }
        return $hasil;
    }

    /**
     * Function ini digunakan untuk mendapatkan namapembeli yang melakukan transaksi
     */

    public function getNamaPembeli($idTransaksi)
    {
        $sql = "SELECT pembeli.nama_pembeli from transaksi
        JOIN pembeli ON transaksi.pembeli_id = pembeli.id_pembeli
        WHERE transaksi.id_transaksi = $idTransaksi";

        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function ini digunakan untuk menuju tampilan add detail transaksi
     */

    public function addDetailTransaksi()
    {
        $idTransaksi = $_GET['idTransaksi'];
        $detailTransaksi = $this->getDetailTransaksi($idTransaksi);
        $pembeli = $this->getNamaPembeli($idTransaksi);
        $parfum = $this->getParfum();
        extract($detailTransaksi);
        extract($pembeli);
        extract($parfum);
        require_once("View/Transaksi/addTransaksi.php");
    }

    /**
     * Function prosesStore berfungsi untuk proses input data detailTransaksi
     */

    public function prosesStoreDetailTransaksi($parfumID, $transaksiID, $jumlahParfum)
    {
        $sql = "INSERT INTO detail_transaksi(parfum_id,transaksi_id,jumlah_parfum) VALUES($parfumID,$transaksiID,$jumlahParfum)";
        return koneksi()->query($sql);
    }

    /**
     * Function updateStokParfum berfungsi untuk mengupdate jumlah stok parfum
     * stokParfum - jumlahParfum
     */

    public function updateStokParfum($stokParfum, $jumlahParfum, $parfumID)
    {
        $hitung = $stokParfum - $jumlahParfum;
        $sql = "UPDATE parfum SET stok = $hitung WHERE id_parfum = $parfumID";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function store berfungsi untuk memproses data untuk di tambahkan
     * Fungsi ini membutuhkan data parfum_id,jumlahParfum dengan metode http request POST
     * dan transaksi_id dengan metode http request GET
     */

    public function storeDetailTransaksi()
    {
        $parfumID = $_POST['IDparfum'];
        $transaksiID = $_POST['idTransaksi'];
        $jumlahParfum = $_POST['jumlahParfum'];
        $Parfum = $this->getParfumByID($parfumID);

        if ($jumlahParfum > $Parfum['stok']) {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Tambah Data Jumlah Parfum Melebihi Stok!!!!!&idTransaksi=" . $transaksiID);
        } else {
            if ($this->updateStokParfum($Parfum['stok'], $jumlahParfum, $parfumID)) {
                if ($this->prosesStoreDetailTransaksi($parfumID, $transaksiID, $jumlahParfum)) {
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Tambah Data&idTransaksi=" . $transaksiID);
                } else {
                    header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Tambah Data&idTransaksi=" . $transaksiID);
                }
            } else {
                header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Update Stok Parfum&idTransaksi=" . $transaksiID);
            }
        }
    }

    /**
     * Function delete berfungsi untuk menghapus data detail_transaksi dari database
     * @param Integer parfumID berisi id parfum
     * @param Integer transaksiID berisi id transaksi
     */

    public function prosesDeleteDetailTransaksi($parfumID, $transaksiID)
    {
        $sql = "DELETE FROM detail_transaksi WHERE parfum_id=$parfumID AND transaksi_id = $transaksiID";
        return koneksi()->query($sql);
    }

    /**
     * Function delete berfungsi untuk menghapus detail_transaksi
     */

    public function deleteDetailTransaksi()
    {
        $parfumID = $_GET['idParfum'];
        $transaksiID = $_GET['idTransaksi'];

        if ($this->prosesDeleteDetailTransaksi($parfumID, $transaksiID)) {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Berhasil Delete Data&idTransaksi=" . $transaksiID);
        } else {
            header("location: index.php?page=Transaksi&aksi=addDetailTransaksi&pesan=Gagal Delete Data&idTransaksi=" . $transaksiID);
        }
    }
}