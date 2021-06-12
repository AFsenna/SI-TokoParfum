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
        $sql = "SELECT pembeli.nama_pembeli, transaksi.tanggal,id_transaksi, 
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
     * Function prosesStore berfungsi untuk input data transaksi
     */

    public function prosesStore($pembeli_id, $pegawai_id)
    {
        $sql = "INSERT INTO transaksi(pembeli_id,pegawai_id,tanggal,status_transaksi) VALUES($pembeli_id,$pegawai_id,now(),0)";
        return koneksi()->query($sql);
    }

    /**
     * Function updateStatusPembeli untuk update status pembeli menjadi aktif
     */

    public function updateStatusPembeli($pembeli_id)
    {
        $sql = "UPDATE pembeli SET status_pembeli = 1 WHERE id_pembeli = $pembeli_id";
        return koneksi()->query($sql);
    }

    /**
     * Function ini digunakan untuk mendapatkan id terakhir tabel transaksi
     */

    public function getLast()
    {
        $sql = "SELECT id_transaksi+1 from transaksi
        ORDER BY id_transaksi DESC 
        LIMIT 1";

        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }


    /**
     * Function ini digunakan untuk mendapatkan data tabel parfum
     */

    public function getParfum()
    {
        $sql = "SELECT * from parfum WHERE stok>0";
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
     * Function ini digunakan untuk mendapatkan total harga
     */

    public function getTotalHarga($idTransaksi)
    {
        $sql = "SELECT SUM(detail_transaksi.jumlah_parfum * parfum.harga_parfum) AS totalHarga
        FROM detail_transaksi 
        JOIN transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi
        JOIN parfum ON detail_transaksi.parfum_id = parfum.id_parfum 
        WHERE detail_transaksi.transaksi_id = $idTransaksi ";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function checkout Transaksi untuk mengubah status transaksi menjadi
     * sudah checkout
     */

    public function prosesCheckout($idTransaksi)
    {
        $sql = "UPDATE transaksi SET status_transaksi=1,tanggal=now() 
        where id_Transaksi = $idTransaksi";
        $query = koneksi()->query($sql);
        return $query;
    }

    /**
     * Function ini digunakan untuk mendapatkan data transaksi dari database
     */

    public function getTransaksiByID($idTransaksi)
    {
        $sql = "SELECT transaksi.tanggal, pembeli.nama_pembeli, pembeli.notelp_pembeli, 
        pegawai.nama_pegawai  FROM transaksi
        JOIN pembeli ON transaksi.pembeli_id = pembeli.id_pembeli
        JOIN pegawai ON transaksi.pegawai_id = pegawai.id_pegawai
        WHERE transaksi.id_transaksi = $idTransaksi";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    /**
     * Function prosesAktifkan untuk mengupdatw status transaksi menjadi 0
     * atau menjadi transaksi belum dicheckout
     */

    public function prosesAktifkan($idTransaksi)
    {
        $sql = "UPDATE transaksi SET status_transaksi = 0 WHERE id_transaksi = $idTransaksi";
        return koneksi()->query($sql);
    }

    /**
     * Function prosesBatalkan untuk mengupdate status transaksi menjadi 2
     * atau menjadi transaksi dibatalkan
     */

    public function prosesBatalkan($idTransaksi)
    {
        $sql = "UPDATE transaksi SET status_transaksi = 2 WHERE id_transaksi = $idTransaksi";
        return koneksi()->query($sql);
    }
}
