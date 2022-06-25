-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2022 pada 13.20
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidutamaweb_siduda_monitoring`
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
  `foto` varchar(255) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`, `level`) VALUES
(3, 'desa', 'e54cc06625bbadf12163b41a3cb92bf8', 'Desa', 'icon1.png', 3),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Monitoring YGK', 'YGK.jpg', 1),
(9, 'dimasse', 'dc89e737690b22fd9e327748e7be974d', 'Dimas', 'profil1.jpg', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(1, 'Cibereum'),
(2, 'Cihawuk'),
(3, 'Sukapura'),
(1011, 'cihampelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `plat_no` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `id_mitra`, `jenis_kendaraan`, `plat_no`, `no_telp`, `created_at`, `updated_at`) VALUES
(36, 'dimasssse', 6, 'mobil', 'D 1231 N', '081923128123', '2022-06-21 05:16:16', NULL),
(37, 'asdasdasdasd', 9, 'asdassdasd', 'ASDASDASD', '0812931283123', '2022-06-21 05:46:27', NULL),
(35, '1234567891012348', 6, '1234567891012342', '1234567891012342', '1234567891012', '2022-06-20 16:05:48', '2022-06-21 05:15:16'),
(34, '123123', 6, '12312312', '123213 ASD', '213123123132123', '2022-06-20 13:58:28', '2022-06-20 16:14:43'),
(33, 'Naufal', 6, 'Motor', 'D 12312 AS', '08912312312', '2022-06-20 10:40:55', NULL),
(30, 'Dimas Naufal Hakiki', 9, 'Motor', 'D 1505 NH', '089123123123', '2022-06-15 07:49:44', '2022-06-20 10:44:35'),
(38, '111111', 9, '111111', '111111', '11111111111', '2022-06-21 05:47:45', NULL),
(39, '222222', 9, '22222', '22222', '22222222222', '2022-06-21 05:50:12', '2022-06-21 05:52:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_admin`
--

CREATE TABLE `level_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level_admin`
--

INSERT INTO `level_admin` (`id`, `nama`) VALUES
(1, 'Admin'),
(2, 'Operator'),
(3, 'Guest');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `deskripsi` varchar(400) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `telp` varchar(32) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `kode`, `telp`, `alamat`) VALUES
(6, 'DN', 'ABCDEFG', '089671231123', 'bdgh'),
(9, 'asdasda', '13123123123', '0987654213123', 'sadboy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `type_id` tinyint(2) NOT NULL,
  `description` varchar(100) NOT NULL,
  `is_read` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table too store notifications';

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `from_id`, `to_id`, `type_id`, `description`, `is_read`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 19:30:28', '2022-05-26 19:45:50', NULL),
(2, 1, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 20:29:08', '2022-05-26 20:29:10', NULL),
(3, 2, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 20:32:33', '2022-05-26 20:32:35', NULL),
(4, 3, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 20:34:31', '2022-05-26 20:34:31', NULL),
(5, 4, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 20:34:50', '2022-05-26 20:34:52', NULL),
(6, 5, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-26 22:28:55', '2022-05-26 22:28:58', NULL),
(7, 6, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-27 01:53:11', '2022-05-27 01:53:29', NULL),
(8, 7, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-28 07:13:06', '2022-05-28 07:20:22', NULL),
(9, 8, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-28 07:15:08', '2022-05-28 07:20:22', NULL),
(10, 9, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-05-28 08:27:10', '2022-05-28 08:27:12', NULL),
(11, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 12:23:22', '2022-05-30 13:05:15', NULL),
(12, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 12:24:35', '2022-05-30 13:05:15', NULL),
(13, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 12:27:20', '2022-05-30 13:05:15', NULL),
(14, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 12:32:04', '2022-05-30 13:05:15', NULL),
(15, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 13:05:50', '2022-05-30 13:05:52', NULL),
(16, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 13:06:26', '2022-05-30 13:06:28', NULL),
(17, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-30 13:06:51', '2022-05-30 13:06:51', NULL),
(18, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-31 11:20:46', '2022-06-01 13:11:10', NULL),
(19, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:21:17', '2022-05-31 11:21:17', NULL),
(20, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:21:51', '2022-05-31 11:21:51', NULL),
(21, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:21:56', '2022-05-31 11:21:56', NULL),
(22, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:22:07', '2022-05-31 11:22:07', NULL),
(23, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:23:59', '2022-05-31 11:23:59', NULL),
(24, 1283, 1276, 3, 'Kurir kurir yusuf sedang menjemput panen Singkong anda!', 0, '2022-05-31 11:37:09', '2022-05-31 11:37:09', NULL),
(25, 1283, 1276, 7, 'Kurir kurir yusuf batal menjemput panen Singkong anda!', 0, '2022-05-31 11:37:39', '2022-05-31 11:37:39', NULL),
(26, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-05-31 11:37:42', '2022-06-01 13:11:10', NULL),
(27, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-05-31 11:37:48', '2022-05-31 11:37:48', NULL),
(28, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Kubis anda!', 1, '2022-05-31 11:37:50', '2022-06-01 13:11:10', NULL),
(29, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Kubis anda!', 0, '2022-05-31 11:37:55', '2022-05-31 11:37:55', NULL),
(30, 1283, 1277, 3, 'Kurir kurir yusuf sedang menjemput panen Timun anda!', 0, '2022-05-31 11:39:19', '2022-05-31 11:39:19', NULL),
(31, 1283, 1277, 7, 'Kurir kurir yusuf batal menjemput panen Timun anda!', 0, '2022-05-31 11:40:54', '2022-05-31 11:40:54', NULL),
(32, 1283, 1277, 3, 'Kurir kurir yusuf sedang menjemput panen Timun anda!', 0, '2022-05-31 11:40:56', '2022-05-31 11:40:56', NULL),
(33, 1283, 1277, 7, 'Kurir kurir yusuf batal menjemput panen Timun anda!', 0, '2022-05-31 11:40:58', '2022-05-31 11:40:58', NULL),
(34, 1283, 1279, 3, 'Kurir kurir yusuf sedang menjemput panen Kentang anda!', 0, '2022-05-31 11:41:00', '2022-05-31 11:41:00', NULL),
(35, 1283, 1279, 7, 'Kurir kurir yusuf batal menjemput panen Kentang anda!', 0, '2022-05-31 11:41:04', '2022-05-31 11:41:04', NULL),
(36, 1283, 1277, 3, 'Kurir kurir yusuf sedang menjemput panen Timun anda!', 0, '2022-05-31 11:41:23', '2022-05-31 11:41:23', NULL),
(37, 1283, 1277, 7, 'Kurir kurir yusuf batal menjemput panen Timun anda!', 0, '2022-05-31 12:16:55', '2022-05-31 12:16:55', NULL),
(38, 1283, 1277, 3, 'Kurir kurir yusuf sedang menjemput panen Timun anda!', 0, '2022-05-31 12:18:09', '2022-05-31 12:18:09', NULL),
(39, 1283, 1277, 7, 'Kurir kurir yusuf batal menjemput panen Timun anda!', 0, '2022-05-31 12:18:12', '2022-05-31 12:18:12', NULL),
(40, 1283, 1277, 3, 'Kurir kurir yusuf sedang menjemput panen Timun anda!', 0, '2022-05-31 12:19:06', '2022-05-31 12:19:06', NULL),
(41, 1283, 1279, 3, 'Kurir kurir yusuf sedang menjemput panen Kentang anda!', 0, '2022-06-01 12:24:18', '2022-06-01 12:24:18', NULL),
(42, 1283, 1284, 3, 'Kurir kurir yusuf sedang menjemput panen Tomat anda!', 0, '2022-06-01 12:39:28', '2022-06-01 12:39:28', NULL),
(43, 1283, 1284, 7, 'Kurir kurir yusuf batal menjemput panen Tomat anda!', 0, '2022-06-01 12:42:39', '2022-06-01 12:42:39', NULL),
(44, 10, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-01 12:49:16', '2022-06-01 13:09:55', NULL),
(45, 11, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-01 13:00:00', '2022-06-01 13:09:55', NULL),
(46, 12, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-01 13:00:39', '2022-06-01 13:09:55', NULL),
(47, 13, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-01 13:04:09', '2022-06-01 13:09:55', NULL),
(48, 14, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-01 13:04:53', '2022-06-01 13:09:55', NULL),
(49, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-06-01 13:11:27', '2022-06-01 13:15:06', NULL),
(50, 15, 1283, 1, 'Terdapat 1 tugas baru', 1, '2022-06-02 07:48:27', '2022-06-02 07:48:31', NULL),
(51, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-06-02 07:51:00', '2022-06-02 07:51:01', NULL),
(52, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Jagung anda!', 0, '2022-06-02 07:51:24', '2022-06-02 07:51:24', NULL),
(53, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Jagung anda!', 1, '2022-06-02 07:52:26', '2022-06-03 06:51:55', NULL),
(54, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Cabai anda!', 1, '2022-06-03 06:00:36', '2022-06-03 06:51:55', NULL),
(55, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Cabai anda!', 0, '2022-06-03 06:00:44', '2022-06-03 06:00:44', NULL),
(56, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Cabai anda!', 1, '2022-06-03 06:16:12', '2022-06-03 06:51:55', NULL),
(57, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Cabai anda!', 0, '2022-06-03 07:02:19', '2022-06-03 07:02:19', NULL),
(58, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Cabai anda!', 1, '2022-06-03 07:04:33', '2022-06-03 07:04:50', NULL),
(59, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Cabai anda!', 0, '2022-06-03 07:04:58', '2022-06-03 07:04:58', NULL),
(60, 16, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-03 07:08:00', '2022-06-03 07:08:00', NULL),
(61, 17, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-03 07:08:03', '2022-06-03 07:08:03', NULL),
(62, 1283, 1, 3, 'Kurir kurir yusuf sedang menjemput panen Cabai anda!', 1, '2022-06-03 07:08:19', '2022-06-03 07:08:42', NULL),
(63, 1283, 1, 7, 'Kurir kurir yusuf batal menjemput panen Cabai anda!', 0, '2022-06-03 07:08:31', '2022-06-03 07:08:31', NULL),
(64, 18, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-03 07:09:01', '2022-06-03 07:09:01', NULL),
(65, 19, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-03 07:10:11', '2022-06-03 07:10:11', NULL),
(66, 20, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-03 07:13:23', '2022-06-03 07:13:23', NULL),
(67, 21, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 04:33:51', '2022-06-04 04:33:51', NULL),
(68, 22, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 04:37:26', '2022-06-04 04:37:26', NULL),
(69, 23, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 04:37:42', '2022-06-04 04:37:42', NULL),
(70, 24, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 04:50:11', '2022-06-04 04:50:11', NULL),
(71, 25, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 05:07:21', '2022-06-04 05:07:21', NULL),
(72, 26, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 05:20:56', '2022-06-04 05:20:56', NULL),
(73, 27, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 05:22:26', '2022-06-04 05:22:26', NULL),
(74, 28, 1283, 1, 'Terdapat 1 tugas baru', 0, '2022-06-04 05:28:23', '2022-06-04 05:28:23', NULL),
(75, 29, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-15 07:56:17', '2022-06-15 07:56:17', NULL),
(76, 30, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-15 08:08:12', '2022-06-15 08:08:12', NULL),
(77, 31, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-15 09:27:33', '2022-06-15 09:27:33', NULL),
(78, 32, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-15 09:28:19', '2022-06-15 09:28:19', NULL),
(79, 33, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-17 01:07:07', '2022-06-17 01:07:07', NULL),
(80, 34, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 09:53:34', '2022-06-20 09:53:34', NULL),
(81, 35, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 09:58:15', '2022-06-20 09:58:15', NULL),
(82, 36, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 09:59:14', '2022-06-20 09:59:14', NULL),
(83, 37, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 10:13:07', '2022-06-20 10:13:07', NULL),
(84, 38, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 10:21:51', '2022-06-20 10:21:51', NULL),
(85, 39, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:02:38', '2022-06-20 11:02:38', NULL),
(86, 40, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:08:19', '2022-06-20 11:08:19', NULL),
(87, 41, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:17:05', '2022-06-20 11:17:05', NULL),
(88, 42, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:20:51', '2022-06-20 11:20:51', NULL),
(89, 43, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:21:19', '2022-06-20 11:21:19', NULL),
(90, 44, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:21:29', '2022-06-20 11:21:29', NULL),
(91, 45, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:29:22', '2022-06-20 11:29:22', NULL),
(92, 46, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:32:04', '2022-06-20 11:32:04', NULL),
(93, 47, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:34:05', '2022-06-20 11:34:05', NULL),
(94, 48, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 11:53:44', '2022-06-20 11:53:44', NULL),
(95, 49, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 12:33:47', '2022-06-20 12:33:47', NULL),
(96, 50, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 13:00:53', '2022-06-20 13:00:53', NULL),
(97, 51, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 13:29:54', '2022-06-20 13:29:54', NULL),
(98, 52, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 13:32:23', '2022-06-20 13:32:23', NULL),
(99, 53, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-20 13:34:47', '2022-06-20 13:34:47', NULL),
(100, 54, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 06:14:53', '2022-06-21 06:14:53', NULL),
(101, 55, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 06:15:51', '2022-06-21 06:15:51', NULL),
(102, 56, 1302, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 06:17:30', '2022-06-21 06:17:30', NULL),
(103, 57, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 06:20:49', '2022-06-21 06:20:49', NULL),
(104, 58, 1298, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 06:26:40', '2022-06-21 06:26:40', NULL),
(105, 59, 1295, 1, 'Terdapat 1 tugas baru', 0, '2022-06-21 08:20:12', '2022-06-21 08:20:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notification_type`
--

CREATE TABLE `notification_type` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notification_type`
--

INSERT INTO `notification_type` (`id`, `name`, `description`) VALUES
(1, 'order_baru', '(from transaksi_id, to kurir_id) - Notifikasi untuk order baru yang diberikan oleh driver\r\n'),
(2, 'order_diterima', '(from kurir_id, to transaksi_id) - Notifikasi untuk order yang sudah diterima oleh driver\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_tanam` date NOT NULL,
  `tgl_panen` date NOT NULL,
  `berat_panen` int(11) NOT NULL,
  `luas_lahan` int(11) NOT NULL,
  `id_tipe_produk` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_status_produk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `berat_asli` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `tgl_tanam`, `tgl_panen`, `berat_panen`, `luas_lahan`, `id_tipe_produk`, `alamat`, `id_status_produk`, `created_at`, `updated_at`, `berat_asli`) VALUES
(7, 12741, '2022-03-01', '2022-03-19', 50, 18, 16, 'KP.Sukasari', 3, '2022-03-31 08:54:25', '2022-06-21 06:13:17', NULL),
(16, 1274, '2022-01-12', '2022-03-02', 50, 10, 8, 'Suka sari', 7, '2022-03-31 11:08:07', '2022-06-04 05:32:46', NULL),
(21, 1274, '2022-01-12', '2022-03-12', 30, 40, 12, 'Baleendah', 4, '2022-03-31 11:18:20', '2022-06-04 05:24:51', NULL),
(23, 1, '2022-03-31', '2022-04-30', 200, 1200, 43, 'fgfyeferfyrg', 4, '2022-03-31 14:24:32', '2022-06-15 09:05:41', NULL),
(29, 1, '2022-04-24', '2022-08-17', 500, 1200, 8, 'sfsfxdf', 4, '2022-04-01 07:37:52', '2022-06-20 12:54:23', NULL),
(25, 1, '2022-03-31', '2022-10-31', 2212, 1233, 3, 'same out us do the to the store he', 7, '2022-03-31 14:37:35', '2022-06-03 07:08:31', NULL),
(27, 1, '2022-03-31', '2022-05-28', 1200, 1200, 4, 'jalan raya pinggir jalan', 7, '2022-03-31 15:39:24', '2022-06-04 05:32:45', NULL),
(28, 1, '2022-04-01', '2022-07-30', 500, 1200, 4, 'jalan joyoboyo', 4, '2022-03-31 17:40:33', '2022-06-02 07:53:00', NULL),
(30, 1, '2022-04-01', '2022-04-30', 199, 1000, 42, 'Ciparay', 6, '2022-04-01 08:23:57', '2022-06-21 08:20:12', 1200),
(31, 1274, '2022-04-16', '2022-04-30', 550888, 56, 21, 'wqewqe', 3, '2022-04-16 06:35:01', '2022-06-20 13:30:18', NULL),
(32, 1274, '2022-04-19', '2022-04-30', 12, 12, 10, 'asdadasd', 2, '2022-04-19 03:32:51', '2022-04-19 03:34:03', NULL),
(33, 1274, '2022-04-19', '2022-04-26', 100, 200, 21, 'sukapura', 7, '2022-04-19 03:43:28', '2022-06-15 09:27:45', NULL),
(34, 1274, '2022-04-19', '2022-04-26', 50, 100, 10, 'wawawaw', 3, '2022-04-19 03:45:07', '2022-06-20 12:30:10', NULL),
(41, 1274, '2022-05-19', '2022-06-20', 60, 260, 45, 'sukapura', 7, '2022-05-19 11:34:39', '2022-06-15 08:09:47', NULL),
(42, 1274, '2021-05-20', '2021-06-21', 50, 100, 12, 'jalan kemangi no. 26 rt 01/ rw 12', 7, '2022-05-29 09:20:27', '2022-06-15 08:07:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_produk`
--

CREATE TABLE `status_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_produk`
--

INSERT INTO `status_produk` (`id`, `nama`) VALUES
(1, 'Proses Tanam'),
(2, 'Panen'),
(3, 'Siap Diambil'),
(4, 'Selesai Diambil'),
(5, 'Sedang Diambil'),
(6, 'Sudah Ditugaskan'),
(7, 'Sudah Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `nama`) VALUES
(1, 'Menunggu'),
(2, 'Berlangsung'),
(3, 'Batal'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_produk`
--

CREATE TABLE `tipe_produk` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `harga` int(18) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `terbaru` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `parent_id` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_produk`
--

INSERT INTO `tipe_produk` (`id`, `foto`, `nama`, `harga`, `created_at`, `terbaru`, `tanggal`, `parent_id`, `deleted_at`) VALUES
(8, 'mentimun.png', 'Timun', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(9, 'tomat.png', 'Tomat', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(10, 'bawang merah.png', 'Bawang Merah', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(11, 'wortel.png', 'Wortel', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(12, 'kentang.png', 'Kentang', 10000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(21, 'cabai.png', 'cabai', 500002, '0000-00-00', 1, '2022-04-13', NULL, NULL),
(45, 'singkong.png', 'Singkong', 9999, '2022-04-13', 1, '2022-04-13', 7, NULL),
(42, 'jagung.png', 'Jagung', 50000, '2022-04-13', 1, '2022-04-13', 4, NULL),
(43, 'kubis.png', 'Kubis', 5000000, '2022-04-13', 1, '2022-04-13', 6, NULL),
(50, '44f4868e3b0068eb9dc60851e1c767b2.png', 'Bawang Putih', 10000, '2022-06-14', 1, '2022-06-14', NULL, NULL),
(51, '962c91f3474f391459f8b6ac78ab019a.png', 'Biji Kopi', 15000, '2022-06-14', 0, '2022-06-14', NULL, '2022-06-21 06:43:25'),
(52, '257f21af9afacf3606951cdb638fe78e.png', 'Seledri', 9000, '2022-06-14', 0, '2022-06-14', NULL, '2022-06-20 09:43:40'),
(55, '257f21af9afacf3606951cdb638fe78e.png', 'Seledri', 90001, '2022-06-20', 0, '2022-06-20', 52, '2022-06-21 06:42:43'),
(56, '2327c2d2359ac654ad624eef7cffd961.jpeg', 'BMTH', 20000, '2022-06-20', 1, '2022-06-20', NULL, '2022-06-20 13:14:43'),
(57, '4649f91f0c71c98eef712f000d96e6fe.jpeg', 'bmth', 20000, '2022-06-21', 1, '2022-06-21', NULL, '2022-06-21 06:35:02'),
(58, '30ce8b133b94570ed0b06e5d4e21d568.jpeg', 'bmth', 30000, '2022-06-21', 1, '2022-06-21', NULL, '2022-06-21 06:37:43'),
(59, '0bb59e95926030e35bf1b65addceb67e.jpeg', 'bmth', 30000, '2022-06-21', 1, '2022-06-21', NULL, '2022-06-21 06:37:41'),
(60, 'cda46bbd64a4030d6709717479d3ebe5.jpeg', 'bmth', 20000, '2022-06-21', 1, '2022-06-21', NULL, '2022-06-21 06:37:39'),
(61, 'c9ac773a70311aff97b93b2791492821.jpeg', 'bmth', 3000, '2022-06-21', 1, '2022-06-21', NULL, '2022-06-21 06:37:38'),
(62, '257f21af9afacf3606951cdb638fe78e.png', 'Seledri', 900012, '2022-06-21', 1, '2022-06-21', 52, NULL),
(63, '962c91f3474f391459f8b6ac78ab019a.png', 'Biji Kopi', 150001, '2022-06-21', 1, '2022-06-21', 51, NULL),
(64, '15d79e507a9d26cee893ac53cfda2515.jpg', 'guguk', 35000, '2022-06-21', 0, '2022-06-21', NULL, '2022-06-21 06:45:13'),
(65, '15d79e507a9d26cee893ac53cfda2515.jpg', 'guguk', 350001, '2022-06-21', 1, '2022-06-21', 64, '2022-06-21 06:45:28'),
(66, '04d1b5212946aae5125279fab727c5ed.jpg', 'fiora', 1239102, '2022-06-21', 0, '2022-06-21', NULL, '2022-06-21 06:46:27'),
(67, '04d1b5212946aae5125279fab727c5ed.jpg', 'fiora', 12391021, '2022-06-21', 1, '2022-06-21', 66, '2022-06-21 06:46:30'),
(68, '8f00a884328f22bee29f76ab0570ef37.jpg', 'fiora', 123123, '2022-06-21', 1, '2022-06-21', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_resi` varchar(200) NOT NULL,
  `tanggal_pengambilan` timestamp NULL DEFAULT NULL,
  `tanggal_diambil` timestamp NULL DEFAULT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_sampai` timestamp NULL DEFAULT NULL,
  `biaya_angkut` int(11) NOT NULL,
  `id_status_transaksi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `sudah_dikonfirmasi_petani` int(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_resi`, `tanggal_pengambilan`, `tanggal_diambil`, `id_kurir`, `id_user`, `id_produk`, `tanggal_sampai`, `biaya_angkut`, `id_status_transaksi`, `created_at`, `updated_at`, `sudah_dikonfirmasi_petani`) VALUES
(40, 'PSJ-2022-06-30-031-033', '2022-06-30 12:08:00', NULL, 33, 1274, 31, NULL, 123123, 3, '2022-06-20 11:08:19', '2022-06-20 11:08:32', 0),
(39, 'PSJ-2022-06-22-031-033', '2022-06-22 11:04:00', NULL, 33, 1274, 31, NULL, 20000, 3, '2022-06-20 11:02:38', '2022-06-20 11:02:46', 0),
(38, 'PSJ-2022-06-22-030-030', '2022-06-22 10:22:00', NULL, 30, 1, 30, NULL, 20000, 3, '2022-06-20 10:21:51', '2022-06-20 11:02:49', 0),
(37, 'PSJ-2022-06-22-030-030', '2022-06-22 10:14:00', NULL, 30, 1, 30, NULL, 11111, 3, '2022-06-20 10:13:07', '2022-06-20 10:13:16', 0),
(36, 'PSJ-2022-06-22-031-030', '2022-06-22 09:00:00', NULL, 30, 1274, 31, NULL, 21312312, 3, '2022-06-20 09:59:14', '2022-06-20 09:59:32', 0),
(35, 'PSJ-2022-06-22-031-030', '2022-06-22 09:59:00', NULL, 30, 1274, 31, NULL, 21312312, 3, '2022-06-20 09:58:15', '2022-06-20 09:58:52', 0),
(34, 'PSJ-2022-06-21-030-030', '2022-06-21 09:54:00', NULL, 30, 1, 30, NULL, 12211221, 3, '2022-06-20 09:53:34', '2022-06-20 09:57:47', 0),
(32, 'PSJ-2022-06-16-031-030', '2022-06-16 09:30:00', NULL, 30, 1274, 31, NULL, 2000, 3, '2022-06-15 09:28:19', '2022-06-17 01:24:24', 0),
(33, 'PSJ-2022-06-18-030-030', '2022-06-18 01:07:00', NULL, 30, 1, 30, NULL, 10000, 3, '2022-06-17 01:07:07', '2022-06-17 01:07:13', 0),
(31, 'PSJ-2022-06-16-033-030', '2022-06-16 09:29:00', NULL, 30, 1274, 33, NULL, 12222, 3, '2022-06-15 09:27:33', '2022-06-15 09:27:45', 0),
(29, 'PSJ-2022-06-16-042-030', '2022-06-16 07:59:00', NULL, 30, 1274, 42, NULL, 20000, 4, '2022-06-15 07:56:17', '2022-06-15 08:07:08', 0),
(30, 'PSJ-2022-06-21-041-030', '2022-06-21 08:08:00', NULL, 30, 1274, 41, NULL, 60000, 3, '2022-06-15 08:08:12', '2022-06-15 08:24:43', 0),
(41, 'PSJ-2022-06-23-030-033', '2022-06-23 11:17:00', NULL, 33, 1, 30, NULL, 8000, 3, '2022-06-20 11:17:05', '2022-06-20 11:21:00', 0),
(42, 'PSJ-2022-06-29-031-033', '2022-06-29 11:22:00', NULL, 33, 1274, 31, NULL, 21211, 3, '2022-06-20 11:20:51', '2022-06-20 11:21:07', 0),
(43, 'PSJ-2022-06-23-030-033', '2022-06-23 11:22:00', NULL, 33, 1, 30, NULL, 222222, 3, '2022-06-20 11:21:19', '2022-06-20 11:27:08', 0),
(44, 'PSJ-2022-06-30-031-033', '2022-06-30 11:22:00', NULL, 33, 1274, 31, NULL, 1211212, 3, '2022-06-20 11:21:29', '2022-06-20 11:27:04', 0),
(45, 'PSJ-2022-06-24-030-033', '2022-06-24 11:33:00', NULL, 33, 1, 30, NULL, 2131123, 3, '2022-06-20 11:29:22', '2022-06-20 11:30:39', 0),
(46, 'PSJ-2022-06-23-030-033', '2022-06-23 11:34:00', NULL, 33, 1, 30, NULL, 20000, 3, '2022-06-20 11:32:04', '2022-06-20 11:51:49', 0),
(47, 'PSJ-2022-06-30-031-030', '2022-06-30 11:35:00', NULL, 30, 1274, 31, NULL, 20000, 3, '2022-06-20 11:34:05', '2022-06-20 11:51:46', 0),
(48, 'PSJ-2022-06-30-034-033', '2022-06-30 11:55:00', NULL, 33, 1274, 34, NULL, 21212, 3, '2022-06-20 11:53:44', '2022-06-20 12:30:10', 0),
(49, 'PSJ-2022-08-25-029-030', '2022-08-25 12:34:00', NULL, 30, 1, 29, NULL, 20000, 4, '2022-06-20 12:33:47', '2022-06-20 13:00:30', 1),
(50, 'PSJ-2022-06-23-030-030', '2022-06-23 13:01:00', NULL, 30, 1, 30, NULL, 121212, 3, '2022-06-20 13:00:53', '2022-06-20 13:01:07', 0),
(51, 'PSJ-2022-06-30-031-033', '2022-06-30 13:30:00', NULL, 33, 1274, 31, NULL, 22222, 3, '2022-06-20 13:29:54', '2022-06-20 13:30:18', 0),
(52, 'PSJ-2022-06-23 20:33:00-030-033', '2022-06-23 13:33:00', NULL, 33, 1, 30, NULL, 20000, 3, '2022-06-20 13:32:23', '2022-06-20 13:34:21', 0),
(53, 'PSJ-2022-06-24 20:35-030-033', '2022-06-24 13:35:00', NULL, 33, 1, 30, NULL, 5444, 3, '2022-06-20 13:34:47', '2022-06-21 06:14:05', 0),
(54, 'PSJ-2022-06-23-030-030-06', '2022-06-23 06:15:00', NULL, 30, 1, 30, NULL, 20000, 3, '2022-06-21 06:14:53', '2022-06-21 06:15:24', 0),
(55, 'PSJ-2022-06-23-030-033-07', '2022-06-23 06:18:00', NULL, 33, 1, 30, NULL, 2222222, 3, '2022-06-21 06:15:51', '2022-06-21 06:17:11', 0),
(56, 'PSJ-2022-06-23-030-037-01', '2022-06-23 06:19:00', NULL, 37, 1, 30, NULL, 122222, 3, '2022-06-21 06:17:30', '2022-06-21 06:20:15', 0),
(57, 'PSJ-2022-06-23-030-030-07', '2022-06-23 07:20:00', NULL, 30, 1, 30, NULL, 20000, 3, '2022-06-21 06:20:49', '2022-06-21 06:26:18', 0),
(58, 'PSJ-2022-06-24-030-033-08', '2022-06-24 08:26:00', NULL, 33, 1, 30, NULL, 2888888, 3, '2022-06-21 06:26:40', '2022-06-21 08:13:24', 0),
(59, 'PSJ-2022-06-23-030-030-08', '2022-06-23 08:24:00', NULL, 30, 1, 30, NULL, 89000, 1, '2022-06-21 08:20:12', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `telp` varchar(32) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `access_token` varchar(200) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `id_kurir` int(11) DEFAULT NULL,
  `onesignal_id` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `telp`, `id_desa`, `foto`, `access_token`, `pin`, `id_kurir`, `onesignal_id`) VALUES
(1, '1234561231231232', '5f4dcc3b5aa765d61d8327deb882cf99', 'yusuf', '08563604240', 3, 'no', '97e2HCTlf5jXoxs0HR3F4cGK44dQERq3EPb3kLTZaOU1oa0NkxM7h7H98YCPVwgXRf2mUtJbSSGfusWQ6sI1yTLSV1bWCk5ZWM9JDd9enJyqPwXigvdU52cxOUwKa58hIXF0lzrLFDFzNEaprAVHZl8ztEyeQAhSWoiAmnbNcGjtkiOnMRAuLuyP6Z2vMN4rgstGvBBK', '123456', NULL, '48e7f1c1-0cee-4b0a-af04-93daf91efcb7'),
(1301, '0890890890890890', '8f490c20ba8f875837603a4d6c4b771c', 'dimasssse', '081923128123', 0, '', '', '', 36, NULL),
(1302, '1234567871012343', '49553eef60a57d89bf52e71795fd2b08', 'asdasdasdasd', '0812931283123', 0, '', '', '', 37, NULL),
(1303, '1111111111111111', '96e79218965eb72c92a549dd5a330112', '111111', '11111111111', 0, '', '', '', 38, NULL),
(1304, '2222222222222222', '3d2172418ce305c7d16d4b05597c6a59', '22222', '22222222222', 0, '', '', '', 39, NULL),
(1274, '8881248052123467', 'a9a1b1f83de79391086489f290c561bc', 'Irfan Restu P', '089543275929', 1011, 'abc.jpg', '6E0rIzVncxmlSKOBLtNxOBCgITyCDhygK9NTlsSqZvF2BX8d3cNCAR9iuKPgWWaiF0kYawOTR8JYN2mXQVfIRE3a119SvL4FA4MKbM7i2YZqHyZtBjcvzAtxqH5i5RXk75zEeEVgl69zkUmdfDhIh1oahwLHu7sWnkscL0PsQpulrjM2rGX7634VfHnTUS4e6yfxePbG', '123456', NULL, ''),
(1298, '1234567891012345', '25f9e794323b453885f5181f1b624d0b', 'Naufal', '08912312312', 0, '', '', '', 33, NULL),
(1299, '1234567891012342', '4297f44b13955235245b2497399d7a93', '123123', '213123123132123', 0, '', '', '', 34, NULL),
(1300, '1234567891012343', '9d08be8e48eecc3abcbe044151689957', '1234567891012342', '1234567891012', 0, '', '', '', 35, NULL),
(1295, '0619101028', '253d89059ef28f01e55e34858f034f86', 'Dimas', '08912312312', 1011, '', '', '', 30, NULL);

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
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level_admin`
--
ALTER TABLE `level_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notification_type`
--
ALTER TABLE `notification_type`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe_produk` (`id_tipe_produk`),
  ADD KEY `status_produk_id` (`id_status_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `status_produk`
--
ALTER TABLE `status_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tipe_produk`
--
ALTER TABLE `tipe_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_status_transaksi` (`id_status_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_desa` (`id_desa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `level_admin`
--
ALTER TABLE `level_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `notification_type`
--
ALTER TABLE `notification_type`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `status_produk`
--
ALTER TABLE `status_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1307;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
