-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2022 pada 08.11
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `kategori`, `nama`, `harga`, `deskripsi`) VALUES
(1, 'Pemasangan', 'Pengecetan', 500000, 'Pengecetan dilakukan oleh 1-2 tukang'),
(2, 'Pemasangan', 'Pengecoran', 2800000, 'Pekerjaan membutuhkan 5-7 tukang'),
(3, 'Pemasangan', 'Keramik', 1000000, 'Keramik yang digunakan berukuran 30x30'),
(4, 'Perbaikan', 'Atap', 600000, 'Biaya bisa lebih tinggi tergantung kerusakan'),
(5, 'Pemasangan', 'Atap', 1200000, 'Material yang digunakan berkualitas tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `jasa` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `alamat`, `telepon`, `tanggal`, `kategori`, `jasa`, `harga`) VALUES
(1, 'Ifan haidar', 'Tangerang', '087657657622', '2021-10-01', 'Pemasangan', 'Pengecetan', 500000),
(2, 'Nurulwi', 'Jakarta', '089786576544', '2021-10-02', 'Perbaikan', 'Atap', 600000),
(4, 'denu', 'cirebon', '088976876656', '2021-09-28', 'Pemasangan', 'Keramik', 1000000),
(5, 'Yanto', 'Surabaya', '089987968768', '2021-09-26', 'Pemasangan', 'Pengecoran', 2800000),
(6, 'Joko', 'Jakarta', '0896546543243', '2021-12-07', 'Pemasangan', 'Pengecoran', 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukang`
--

CREATE TABLE `tukang` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tukang`
--

INSERT INTO `tukang` (`id`, `username`, `nama`, `alamat`, `telepon`, `password`, `email`, `foto`) VALUES
(1, 'tukang1', 'Hartono Wijaya', 'Jl. Meruya selatan no 21, Jakarta', '089534785246', 'tukang1', 'tukang1@gmail.com', '1.jpg'),
(2, 'tukang2', 'ifan haidar', 'Jl. Merdeka Raya no. 31, Jakarta', '089534785247', 'tukang2', 'tukang2@gmail.com', '2.jpg'),
(3, 'tukang3', 'Haidar', 'jl. malioboro Yogyakarta', '0895654365434', 'tukang3', 'tukang3@gmail.com', '3.jpg'),
(4, 'haidar', 'Hartono Wijaya', 'Subang', '08965465', 'tukang4', 'ifanhaidar18@gmail.c', 'orang1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `email`, `password`, `is_active`, `role`) VALUES
(1, 'admin', 'ifan', 'ifanhaidar15@gmail.com', 'admin', 1, 'admin'),
(2, 'user', 'user', 'user15@gmail.com', 'user', 1, 'user'),
(9, 'dudung', 'dudung', 'dudungaja@gmail.com', '1234', 1, NULL),
(26, 'ifan', 'ifan  haidar', 'ifanhaidar18@gmail.com', 'ifan', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(8, 'ifan232@gmail.com', 'jpNPeDGYwaubT5s7qdVTBRhZYxvBp1dlJlY/IAq6ztI=', 1640545887),
(11, 'gunagunawan206@gmail.com', 'DugcSWvNVebIKiwAEPRvgo04tL0FHDVjIafeRITyyow=', 1640566551),
(12, 'letjenjr@gmail.com', 'CSptvuDRMtDrbf1xGrai1VxEOhKppeqT6Lx1spfoLUA=', 1640566630);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukang`
--
ALTER TABLE `tukang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tukang`
--
ALTER TABLE `tukang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
