-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Mar 2023 pada 13.56
-- Versi server: 5.7.34
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `piket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id` int(11) NOT NULL,
  `hari` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_hari`
--

INSERT INTO `tbl_hari` (`id`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jum\'at');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(100) NOT NULL,
  `log` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_piket`
--

CREATE TABLE `tbl_piket` (
  `id` int(11) NOT NULL,
  `hari` varchar(6) NOT NULL,
  `waktu` date DEFAULT NULL,
  `absen` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(11) NOT NULL,
  `absen` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jumlah_piket` int(11) NOT NULL,
  `jumlah_tidak_piket` int(11) NOT NULL,
  `hari_piket` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `absen`, `nama`, `jumlah_piket`, `jumlah_tidak_piket`, `hari_piket`) VALUES
(1, 1, 'Alfu Khasanatin', 1, 1, 'Senin'),
(2, 2, 'Amelia Madina', 0, 0, 'Senin'),
(3, 3, 'Anggi Noviani', 0, 0, 'Senin'),
(4, 4, 'Asinta Nurul Asqiyah', 3, 2, 'Senin'),
(5, 5, 'Bayu Rizki Adi Ramdani', 3, 0, 'Senin'),
(6, 6, 'Bunga Solekha Fauzia', 2, 2, 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(6) DEFAULT NULL,
  `role` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_piket`
--
ALTER TABLE `tbl_piket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen` (`absen`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen` (`absen`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_piket`
--
ALTER TABLE `tbl_piket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_piket`
--
ALTER TABLE `tbl_piket`
  ADD CONSTRAINT `tbl_piket_ibfk_1` FOREIGN KEY (`absen`) REFERENCES `tbl_siswa` (`absen`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
