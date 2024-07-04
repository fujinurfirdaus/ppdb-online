-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2024 pada 15.42
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id` int(11) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `akte` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `status_berkas` enum('Terpenuhi','Belum Terpenuhi') NOT NULL DEFAULT 'Belum Terpenuhi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_berkas`
--

INSERT INTO `tb_berkas` (`id`, `nisn`, `kk`, `akte`, `ijazah`, `status_berkas`) VALUES
(5, '2015167845', 'hasil (7).pdf', 'ilovepdf_merged (2).pdf', 'ilovepdf_merged (2).pdf', 'Terpenuhi');

--
-- Trigger `tb_berkas`
--
DELIMITER $$
CREATE TRIGGER `update_status_berkas` BEFORE UPDATE ON `tb_berkas` FOR EACH ROW BEGIN
  IF (OLD.akte IS NULL AND NEW.akte IS NOT NULL) OR
     (OLD.kk IS NULL AND NEW.kk IS NOT NULL) OR
     (OLD.ijazah IS NULL AND NEW.ijazah IS NOT NULL)
  THEN
    SET NEW.status_berkas = 'Terpenuhi';
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_admin`, `username`, `password`) VALUES
(1, 'fuji', '123', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P','','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `jurusan` enum('TKJ','DKV','Akuntansi','TKR') NOT NULL,
  `foto_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `telp`, `jurusan`, `foto_siswa`) VALUES
('2015167845', 'Fuji Nurfirdaus', 'Majalengka', '1999-12-17', 'L', 'Bogor', '082214680433', 'TKJ', 'img/66864a12eae41.jpg');

--
-- Trigger `tb_siswa`
--
DELIMITER $$
CREATE TRIGGER `after_siswa_insert` AFTER INSERT ON `tb_siswa` FOR EACH ROW BEGIN
    INSERT INTO tb_berkas (nisn) VALUES (NEW.nisn);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_tb_berkas_after_delete_tb_siswa` AFTER DELETE ON `tb_siswa` FOR EACH ROW BEGIN
    DELETE FROM tb_berkas WHERE nisn = OLD.nisn;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_berkas_ibfk_1` (`nisn`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
