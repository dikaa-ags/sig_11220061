-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2025 pada 04.18
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig_11220061`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kordinat_gis`
--

CREATE TABLE `kordinat_gis` (
  `nomor` int(5) NOT NULL,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kordinat_gis`
--

INSERT INTO `kordinat_gis` (`nomor`, `x`, `y`, `nama_tempat`, `status`) VALUES
(10, '-8.72490', '115.17981', 'Pantai Kuta', 1),
(11, '-8.24272', '114.48629', 'Melaya', 1),
(12, '-8.64887', '115.19354', 'Denpasar', 1),
(13, '-8.41121', '115.14273', 'Penebel', 1),
(14, '-7.70687', '113.97817', 'Situbondo', 1),
(15, '-8.43838', '115.62063', 'Karangasem', 1),
(16, '-8.55247', '115.03836', 'Kerambitan', 1),
(17, '-8.31202', '115.02188', 'Pupuan', 1),
(18, '-8.00072', '114.40390', 'Wongsorejo', 1),
(19, '-8.44109', '115.31714', 'Tampak Siring', 1),
(20, '-8.73440', '115.54648', 'Nusa Penida', 1),
(21, '-8.14756', '115.11389', 'Sukasada', 1),
(22, '-8.54296', '115.12350', 'Tabanan', 1),
(23, '-8.22810', '114.29627', 'Glagah', 1),
(24, '-8.27839', '114.29455', 'Macan Putih', 1),
(25, '-8.14756', '114.39549', 'Ketapang', 1),
(26, '-8.15674', '114.21009', 'Songgon', 1),
(28, '-7.32051', '108.20838', '', 0),
(29, '-7.32256', '108.20207', 'ac', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id`, `username`, `password`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kordinat_gis`
--
ALTER TABLE `kordinat_gis`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kordinat_gis`
--
ALTER TABLE `kordinat_gis`
  MODIFY `nomor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
