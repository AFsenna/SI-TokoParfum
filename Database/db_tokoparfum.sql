-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Bulan Mei 2021 pada 20.19
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nik_admin` varchar(16) NOT NULL,
  `nama_admin` varchar(25) NOT NULL,
  `username_admin` varchar(15) NOT NULL,
  `password_admin` varchar(15) NOT NULL,
  `email_admin` varchar(25) NOT NULL,
  `notelp_admin` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nik_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`, `notelp_admin`) VALUES
(1, '167976544336863', 'Alexandria Felicia Seanne', 'senna', '123', 'fgelicia@gmail.com', '082285132960');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `parfum_id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `jumlah_parfum` int(11) NOT NULL,
  `jumlah_harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parfum`
--

CREATE TABLE `parfum` (
  `id_parfum` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `nama_parfum` varchar(20) NOT NULL,
  `expired_parfum` date NOT NULL,
  `harga_parfum` float NOT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `parfum`
--

INSERT INTO `parfum` (`id_parfum`, `kategori_id`, `admin_id`, `nama_parfum`, `expired_parfum`, `harga_parfum`, `stok`) VALUES
(1, 1, 1, 'Harmony', '0000-00-00', 20000, 50),
(2, 2, 1, 'Miami', '2021-05-29', 50000, 50);

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
  `notelp_pegawai` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik_pegawai`, `nama_pegawai`, `username_pegawai`, `password_pegawai`, `email_pegawai`, `notelp_pegawai`) VALUES
(1, '6745362986391627', 'Michael Araona Wily', 'michael', '123', 'awee@gmail.com', '086788338621'),
(2, '73543743', 'Corrine Fadia Haya', 'tayin', '123', 'koyinnn@gmail.com', '0936547');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(25) NOT NULL,
  `notelp_pembeli` decimal(18,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `totalharga` float NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `parfum`
--
ALTER TABLE `parfum`
  MODIFY `id_parfum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
