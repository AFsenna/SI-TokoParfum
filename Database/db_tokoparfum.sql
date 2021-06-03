-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2021 pada 03.56
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoparfum`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `parfum_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `jumlah_parfum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`parfum_id`, `transaksi_id`, `jumlah_parfum`) VALUES
(1, 1, 20),
(2, 1, 10),
(1, 2, 15),
(2, 2, 10),
(1, 2, 8),
(2, 1, 15),
(2, 6, 15),
(1, 6, 15),
(1, 7, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'administrasi'),
(2, 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `gender`) VALUES
(1, 'Perempuan'),
(2, 'Laki-laki'),
(6, 'unknown');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parfum`
--

CREATE TABLE `parfum` (
  `id_parfum` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `nama_parfum` varchar(20) NOT NULL,
  `expired_parfum` date NOT NULL,
  `harga_parfum` float NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parfum`
--

INSERT INTO `parfum` (`id_parfum`, `kategori_id`, `pegawai_id`, `nama_parfum`, `expired_parfum`, `harga_parfum`, `stok`) VALUES
(1, 1, 1, 'Harmony', '2021-06-05', 20000, 40),
(2, 2, 1, 'Miami', '2021-05-29', 50000, 50),
(3, 6, 1, 'juliar', '2021-08-25', 100000, 99),
(4, 6, 1, 'juliar', '2021-08-25', 100000, 99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik_pegawai` varchar(16) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `username_pegawai` varchar(15) NOT NULL,
  `password_pegawai` varchar(15) NOT NULL,
  `email_pegawai` varchar(25) NOT NULL,
  `notelp_pegawai` varchar(18) NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik_pegawai`, `nama_pegawai`, `username_pegawai`, `password_pegawai`, `email_pegawai`, `notelp_pegawai`, `jabatan_id`) VALUES
(1, '6745362986391627', 'Michael Araona Wily', 'michael', '123', 'awee@gmail.com', '086788338621', 1),
(2, '73543743', 'Corrine Fadia Haya', 'tayin', '123', 'koyinnn@gmail.com', '0936547', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `notelp_pembeli` varchar(18) NOT NULL,
  `status_pembeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `notelp_pembeli`, `status_pembeli`) VALUES
(1, 'Areta', '0653537', 1),
(2, 'Dyah', '0927135213', 1),
(5, 'kucing', '08232864', 0),
(6, 'tes', '24y28', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `pembeli_id`, `pegawai_id`, `tanggal`, `status_transaksi`) VALUES
(1, 1, 1, '2021-05-27 17:16:35', 0),
(2, 2, 1, '2022-05-30 12:20:35', 0),
(3, 1, 1, '2021-05-28 01:21:50', 0),
(4, 5, 1, '2021-05-29 00:12:41', 0),
(5, 5, 1, '2021-05-29 00:42:10', 0),
(6, 6, 1, '2021-05-29 00:46:50', 0),
(7, 6, 1, '2021-05-29 00:51:03', 0),
(8, 6, 1, '2021-05-29 00:56:10', 0),
(9, 5, 1, '2021-05-31 11:27:50', 0),
(10, 1, 1, '2021-05-31 11:31:25', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `parfum`
--
ALTER TABLE `parfum`
  ADD PRIMARY KEY (`id_parfum`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `parfum`
--
ALTER TABLE `parfum`
  MODIFY `id_parfum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
