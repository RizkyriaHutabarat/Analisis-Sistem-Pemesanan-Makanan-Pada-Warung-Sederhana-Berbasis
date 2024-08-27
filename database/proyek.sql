-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2023 pada 11.45
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
('ADM1', 'admin', '123456', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `driver`
--

CREATE TABLE `driver` (
  `id_driver` varchar(11) NOT NULL,
  `username_driver` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_driver` varchar(255) NOT NULL,
  `jenis_motor` varchar(50) NOT NULL,
  `plat_motor` varchar(10) NOT NULL,
  `alamat_driver` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `driver`
--

INSERT INTO `driver` (`id_driver`, `username_driver`, `email`, `password_driver`, `jenis_motor`, `plat_motor`, `alamat_driver`, `no_hp`) VALUES
('DRV  1', 'ria', 'ria@gmail.com', '123456', 'Mio X10', 'B 1234 DWE', 'jln. jiwa ku 2', '082147483647'),
('DRV2', 'Wahyu', 'wahyu@gmail.com', '123456', 'Mio T', 'D 4728 EFI', 'jln.pelangi no 3', '083756283672'),
('DRV3', 'rizkyria', 'rizkyria@gmail.com', '123456', 'MIO 245', 'D 1234 RIA', 'jln. mangga no 6', '081267367829');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password_pelanggan` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_pelanggan` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `telepon_pelanggan` varchar(12) NOT NULL,
  `alamat_pelanggan` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
('RJH 10', 'ipul@gmail.com', '123456', 'Ipul', '081235234567', 'jalan bunga no 2'),
('RJH 11', 'juwita13@gmail.com', '123456', 'Juwita', '081267382653', 'jalan halat no 7'),
('RJH 12', 'kia@gmail.com', '123456', 'kia', '081219882869', 'jalan mangga no 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pengiriman` varchar(11) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `status_pengiriman`) VALUES
(38, 'RJH 11', '2023-02-05', 8000, 'Terima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_produk` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(2, '3', 'RPD  3', 1),
(3, '0', 'RPD  2', 1),
(4, '0', 'RPD  4', 1),
(5, '4', 'RPD  2', 1),
(6, '5', 'RPD 12', 1),
(8, '6', 'RPD 11', 1),
(9, '0', 'RPD  3', 1),
(10, '0', 'RPD  2', 1),
(11, '0', 'RPD 13', 1),
(12, '0', 'RPD  6', 1),
(13, '0', 'RPD  3', 1),
(14, '0', 'RPD  2', 1),
(15, '0', 'RPD  3', 1),
(16, '7', 'RPD  4', 1),
(17, '8', 'RPD  8', 1),
(18, '10', 'RPD  8', 1),
(19, '10', 'RPD  2', 3),
(20, '11', 'RPD  3', 1),
(21, '11', 'RPD  9', 1),
(22, '11', 'RPD 15', 1),
(23, '12', 'RPD 12', 1),
(24, '23', 'RPD  8', 1),
(25, '24', 'RPD  2', 1),
(26, '24', 'RPD  4', 1),
(27, '25', 'RPD  8', 1),
(28, '25', 'RPD 11', 1),
(29, '26', 'RPD  1', 1),
(30, '26', 'RPD  9', 1),
(31, '26', 'RPD  8', 2),
(32, '27', 'RPD  1', 1),
(33, '27', 'RPD  9', 1),
(34, '27', 'RPD  8', 2),
(35, '28', 'RPD  1', 1),
(36, '28', 'RPD  9', 1),
(37, '28', 'RPD  8', 2),
(38, '29', 'RPD 13', 1),
(39, '29', 'RPD 11', 1),
(40, '29', 'RPD  1', 1),
(41, '30', 'RPD 11', 1),
(42, '30', 'RPD  1', 1),
(43, '31', 'RPD 11', 1),
(44, '31', 'RPD  1', 1),
(45, '32', 'RPD  3', 2),
(46, '32', 'RPD 11', 2),
(47, '33', 'RPD  1', 1),
(48, '33', 'RPD  7', 1),
(49, '34', 'RPD  1', 1),
(50, '34', 'RPD  7', 1),
(51, '35', 'RPD 11', 1),
(52, '35', 'RPD  3', 1),
(53, '36', 'RPD  2', 3),
(54, '36', 'RPD 13', 1),
(55, '36', 'RPD  6', 1),
(56, '37', 'RPD  2', 1),
(57, '37', 'RPD 12', 1),
(58, '37', 'RPD  1', 1),
(59, '38', 'RPD  3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(11) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_produk` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deskripsi_produk` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`) VALUES
('RPD  1', 'Ayam Bakar', 12000, 'ayambakar.jpg', 'Bumbunya meresap '),
('RPD  2', 'Ikan Bakar', 10000, 'Ikanbakar4.jpg', 'Bumbunya meresap '),
('RPD  3', 'Sayur Sop', 8000, 'sayursopbtl.jpg', 'Sayur Sop'),
('RPD  4', 'Sayur Asem ', 8000, 'sayurasam1.jpg', 'Sayur Asem '),
('RPD  6', 'Tempe Goreng ', 3000, 'tempegoreng.jpg', 'Tahu Goreng '),
('RPD  7', 'Kentang Balado ', 5000, 'kentangbaladobtl.png', 'Kentang Goreng'),
('RPD  8', 'Rendang ', 14000, 'rendang1.jpg', 'Rendang '),
('RPD  9', 'Telur Balado ', 5000, 'telorbalado1.jpg', 'Telur Balado '),
('RPD 10', 'Tempe Orek ', 4000, 'tempeorek1.jpg', 'Tempe Orek '),
('RPD 11', 'Tumis Kangkung', 4000, 'tumiskangkung1.jpg', 'Tumis Kangkung '),
('RPD 12', 'CapCay', 8000, 'capcay1.jpeg', 'Capcay '),
('RPD 13', 'Nasi Putih ', 7000, 'nasi1.jpg', 'Nasi Putih '),
('RPD 14', 'Es Teh ', 4000, 'esteh4.jpg', 'Es Teh Segar'),
('RPD 15', 'Jus Buah ', 9000, 'jusbuah1.jpg', 'Jus Buah ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id_driver`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
