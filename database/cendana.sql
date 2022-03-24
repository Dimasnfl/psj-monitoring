-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2022 pada 06.21
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cendana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Gilang', 'icon1.png'),
(4, 'psjtera', '1f14fa640fa088e3ef6997fcbf6d56c3', 'Monitoring PSJ', 'YGK.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(1, 'Cibereum'),
(2, 'Cihawuk'),
(3, 'Sukapura'),
(4, 'Neglawangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id` int(11) NOT NULL,
  `jenis_sayuran` varchar(20) NOT NULL,
  `harga` int(18) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id`, `jenis_sayuran`, `harga`, `tanggal`) VALUES
(2, 'Bawang daun', 20000, '2022-03-20'),
(3, 'Cabai', 30000, '2022-03-20'),
(4, 'Jagung', 25000, '2022-03-20'),
(6, 'Kubis', 10000, '2022-03-20'),
(7, 'Singkong', 15000, '2022-03-20'),
(8, 'Timun', 20000, '2022-03-20'),
(9, 'Tomat', 20000, '2022-03-20'),
(10, 'Bawang Merah', 15000, '2022-03-20'),
(11, 'Wortel', 15000, '2022-03-20'),
(12, 'Kentang', 10000, '2022-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `jenis_sayuran` varchar(20) NOT NULL,
  `luas_lahan` varchar(10) NOT NULL,
  `foto` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petani`
--

INSERT INTO `petani` (`id`, `NIK`, `nama`, `telp`, `id_desa`, `jenis_sayuran`, `luas_lahan`, `foto`) VALUES
(1, '3525011711086058', 'Setiawan', '08853009215', 1, 'Wortel', '2000', ''),
(2, '3525011711086059', 'Herawan', '08534660490', 3, 'Kentang', '1500', ''),
(3, '3525011711086060', 'Ayu Andini', '08007428377', 2, 'Cabai', '2340', ''),
(4, '3525011711086061', 'Siti', '08786018543', 3, 'Bawang daun', '1500', ''),
(5, '3525011711086062', 'Suryadi', '08279315224', 4, 'Bawang Merah', '1200', ''),
(6, '3525011711086063', 'Nisa', '08804624234', 1, 'Timun', '1290', ''),
(7, '3525011711086064', 'Yusuf', '08083146839', 3, 'Tomat', '1500', ''),
(8, '3525011711086075', 'Cecep Suprianto', '08558934524', 1, 'Kubis', '2420', ''),
(9, '3525011711086076', 'Bayu', '08914458969', 2, 'Jagung', '2000', ''),
(10, '3525011711086077', 'Wendy', '08139589994', 4, 'Singkong', '1350', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sayuran`
--

CREATE TABLE `sayuran` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `foto_sayuran` blob NOT NULL,
  `jenis_sayuran` varchar(50) NOT NULL,
  `tgl_tanam` date NOT NULL DEFAULT current_timestamp(),
  `tgl_panen` date NOT NULL,
  `berat_panen` varchar(10) NOT NULL,
  `id_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sayuran`
--

INSERT INTO `sayuran` (`id`, `NIK`, `foto_sayuran`, `jenis_sayuran`, `tgl_tanam`, `tgl_panen`, `berat_panen`, `id_harga`) VALUES
(1011, '3525011711086060', '', 'Cabai', '2022-03-01', '2022-04-01', '4 ton', 3),
(1012, '3525011711086058', '', 'Wortel', '2021-12-03', '2021-12-31', '20 ton', 11),
(1013, '3525011711086061', '', 'Bawang daun', '2022-03-01', '2022-03-18', '15 ton', 2),
(1014, '3525011711086062', '', 'Bawang Merah', '2022-02-01', '2022-02-28', '25 ton', 10),
(1015, '3525011711086077', '', 'Singkong', '2021-11-01', '2022-01-01', '40 ton', 7),
(1016, '3525011711086064', '', 'Tomat', '2021-10-01', '2021-10-30', '10 ton', 9),
(1017, '3525011711086076', '', 'Jagung', '2021-12-01', '2022-01-08', '6 ton', 4),
(1018, '3525011711086075', '', 'Kubis', '2021-12-10', '2021-12-31', '5 ton', 6),
(1019, '3525011711086063', '', 'Timun', '2022-03-02', '2022-03-31', '25 ton', 8),
(1020, '3525011711086059', '', 'Kentang', '2022-03-20', '2022-03-25', '3 ton', 12);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jenis_sayuran` (`jenis_sayuran`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`NIK`),
  ADD UNIQUE KEY `jenis_sayuran` (`jenis_sayuran`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indeks untuk tabel `sayuran`
--
ALTER TABLE `sayuran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD UNIQUE KEY `jenis_sayuran` (`jenis_sayuran`),
  ADD KEY `id_harga` (`id_harga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sayuran`
--
ALTER TABLE `sayuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5544775;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`jenis_sayuran`) REFERENCES `sayuran` (`jenis_sayuran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD CONSTRAINT `petani_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sayuran`
--
ALTER TABLE `sayuran`
  ADD CONSTRAINT `sayuran_ibfk_1` FOREIGN KEY (`NIK`) REFERENCES `petani` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sayuran_ibfk_2` FOREIGN KEY (`jenis_sayuran`) REFERENCES `petani` (`jenis_sayuran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sayuran_ibfk_3` FOREIGN KEY (`id_harga`) REFERENCES `harga` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
