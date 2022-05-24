-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2022 at 12:03 PM
-- Server version: 10.2.43-MariaDB-log-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Gilang', 'icon1.png'),
(4, 'psjtera', '1f14fa640fa088e3ef6997fcbf6d56c3', 'Monitoring PSJ', 'YGK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(1, 'Cibereum'),
(2, 'Cihawuk'),
(3, 'Sukapura'),
(4, 'Neglawangi'),
(1011, 'cihampelas');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `plat_no` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `jenis_kendaraan`, `plat_no`, `no_telp`, `created_at`, `updated_at`) VALUES
(2, 'Jajang ', 'Mobil pick up', 'A1994CF', '085913394293', '2022-03-31 09:37:59', NULL),
(3, 'Rhadhiya Wiraga Sudrajat', 'Truk', 'D8971EF', '087821705143', '2022-03-31 09:50:14', NULL),
(4, 'dimas ', 'motor', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:04', NULL),
(5, 'Aldi', 'Truck', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:07', NULL),
(6, 'Jeje', 'Pickup', 'Z 7823 KTL', '087238087263', '2022-03-31 10:40:08', NULL),
(10, 'Dimas', 'Motor4', 'D 123 M', '08214912', '2022-04-07 05:15:00', '2022-04-07 05:15:31'),
(13, 'agung', 'toronton', 'Z 8109 BCD', '087893471284', '2022-05-19 11:43:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `tgl_tanam`, `tgl_panen`, `berat_panen`, `luas_lahan`, `id_tipe_produk`, `alamat`, `id_status_produk`, `created_at`, `updated_at`) VALUES
(7, 1274, '2022-03-01', '2022-03-19', 50, 18, 16, 'KP.Sukasari', 1, '2022-03-31 08:54:25', NULL),
(15, 1276, '2022-02-02', '2022-03-02', 35, 100, 45, 'Rancaekek', 5, '2022-03-31 10:59:35', '2022-05-18 08:03:44'),
(14, 5, '2022-01-13', '2022-03-13', 20, 200, 16, 'Cibereum Rt 01/Rw 05', 3, '2022-03-31 10:54:55', NULL),
(13, 4, '2022-04-16', '2022-05-16', 20, 100, 11, 'Cibiru ', 2, '2022-03-31 10:51:50', NULL),
(12, 3, '2022-03-02', '2022-05-02', 40, 300, 10, 'Suka Pura', 3, '2022-03-31 10:46:58', '2022-04-15 20:42:16'),
(16, 1274, '2022-01-12', '2022-03-02', 50, 10, 8, 'Suka sari', 4, '2022-03-31 11:08:07', NULL),
(17, 3, '2022-03-01', '2022-05-09', 18, 30, 9, 'Ranca Manyar', 1, '2022-03-31 11:10:06', NULL),
(18, 5, '2022-02-02', '2022-04-05', 10, 30, 6, 'Padalarang', 1, '2022-03-31 11:12:35', NULL),
(19, 1, '2022-02-01', '2022-03-31', 25, 40, 8, 'Sapan', 5, '2022-03-31 11:15:08', '2022-04-15 20:43:47'),
(21, 1274, '2022-01-12', '2022-03-12', 30, 40, 12, 'Baleendah', 4, '2022-03-31 11:18:20', NULL),
(22, 4, '2022-01-05', '2022-03-31', 30, 70, 4, 'Cibeunying', 5, '2022-03-31 11:20:50', '2022-04-15 20:39:20'),
(23, 1, '2022-03-31', '2022-04-30', 200, 1200, 43, 'fgfyeferfyrg', 3, '2022-03-31 14:24:32', '2022-04-19 03:45:49'),
(29, 1, '2022-04-24', '2022-08-17', 500, 1200, 8, 'sfsfxdf', 5, '2022-04-01 07:37:52', '2022-04-15 20:49:03'),
(25, 1, '2022-03-31', '2022-10-31', 2212, 1233, 3, 'same out us do the to the store he', 1, '2022-03-31 14:37:35', NULL),
(27, 1, '2022-03-31', '2022-05-28', 1200, 1200, 4, 'jalan raya pinggir jalan', 3, '2022-03-31 15:39:24', '2022-04-15 20:42:13'),
(28, 1, '2022-04-01', '2022-07-30', 500, 1200, 4, 'jalan joyoboyo', 5, '2022-03-31 17:40:33', '2022-05-18 08:14:31'),
(30, 1, '2022-04-01', '2022-04-30', 199, 1000, 42, 'Ciparay', 2, '2022-04-01 08:23:57', '2022-04-17 10:44:51'),
(31, 1274, '2022-04-16', '2022-04-30', 550888, 56, 21, '', 1, '2022-04-16 06:35:01', NULL),
(32, 1274, '2022-04-19', '2022-04-30', 12, 12, 10, 'asdadasd', 2, '2022-04-19 03:32:51', '2022-04-19 03:34:03'),
(33, 1274, '2022-04-19', '2022-04-26', 100, 200, 21, 'sukapura', 1, '2022-04-19 03:43:28', NULL),
(34, 1274, '2022-04-19', '2022-04-26', 50, 100, 10, 'wawawaw', 1, '2022-04-19 03:45:07', NULL),
(35, 1277, '2022-05-01', '2022-05-21', 100, 1200, 8, 'sukapura 01', 5, '2022-05-08 12:47:15', '2022-05-18 04:34:41'),
(36, 1280, '2022-05-19', '2022-06-19', 1, 1500, 12, 'Sukapura ', 1, '2022-05-19 08:48:33', NULL),
(37, 1279, '2022-05-19', '2022-06-15', 30, 100, 12, 'jln ciparay', 3, '2022-05-19 10:32:11', '2022-05-19 10:34:14'),
(38, 1279, '2022-05-19', '2022-06-18', 30, 100, 12, 'jln jalanan', 3, '2022-05-19 10:35:08', '2022-05-19 10:35:58'),
(39, 1284, '2022-05-19', '2022-06-22', 20, 100, 45, 'jalanan', 3, '2022-05-19 10:52:56', '2022-05-19 10:54:48'),
(40, 1284, '2022-05-19', '2022-06-15', 30, 100, 9, 'jalan sukapura', 3, '2022-05-19 11:04:15', '2022-05-19 11:05:26'),
(41, 1274, '2022-05-19', '2022-06-20', 60, 260, 45, 'sukapura', 3, '2022-05-19 11:34:39', '2022-05-19 11:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `status_produk`
--

CREATE TABLE `status_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_produk`
--

INSERT INTO `status_produk` (`id`, `nama`) VALUES
(1, 'Proses Tanam'),
(2, 'Panen'),
(3, 'Siap Diambil'),
(4, 'Selesai Diambil'),
(5, 'Sedang Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_transaksi`
--

INSERT INTO `status_transaksi` (`id`, `nama`) VALUES
(1, 'Menunggu'),
(2, 'Berlangsung'),
(3, 'Batal'),
(4, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_produk`
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
-- Dumping data for table `tipe_produk`
--

INSERT INTO `tipe_produk` (`id`, `foto`, `nama`, `harga`, `created_at`, `terbaru`, `tanggal`, `parent_id`, `deleted_at`) VALUES
(3, 'cabai.png', 'Cabai', 30000, '2022-03-20', 1, '2022-04-13', NULL, '2022-04-13 14:43:10'),
(4, 'jagung.png', 'Jagung', 25000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:43:49'),
(6, 'kubis.png', 'Kubis', 10000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:49:12'),
(7, 'singkong.png', 'Singkong', 15000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:49:24'),
(8, 'mentimun.png', 'Timun', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(9, 'tomat.png', 'Tomat', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(10, 'bawang merah.png', 'Bawang Merah', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(11, 'wortel.png', 'Wortel', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(12, 'kentang.png', 'Kentang', 10000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(21, 'cabai.png', 'cabai', 500002, '0000-00-00', 1, '2022-04-13', NULL, NULL),
(44, 'singkong.png', 'Singkong', 25000000, '2022-04-13', 0, '2022-04-13', 7, '2022-04-13 14:50:07'),
(45, 'singkong.png', 'Singkong', 10000, '2022-04-13', 1, '2022-04-13', 7, NULL),
(42, 'jagung.png', 'Jagung', 50000, '2022-04-13', 1, '2022-04-13', 4, NULL),
(43, 'kubis.png', 'Kubis', 5000000, '2022-04-13', 1, '2022-04-13', 6, NULL),
(46, '', 'jagung', 50000, '0000-00-00', 1, '2022-05-19', 0, '0000-00-00 00:00:00'),
(47, '', 'jagung', 50000, '0000-00-00', 1, '2022-05-19', 0, '0000-00-00 00:00:00'),
(48, '', 'jagung', 50000, '0000-00-00', 1, '2022-05-19', 0, '0000-00-00 00:00:00'),
(49, '', 'cabai', 70000, '0000-00-00', 1, '2022-05-19', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_resi` varchar(11) NOT NULL,
  `tanggal_pengambilan` timestamp NULL DEFAULT NULL,
  `tanggal_diambil` timestamp NULL DEFAULT NULL,
  `id_kurir` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_sampai` timestamp NULL DEFAULT NULL,
  `biaya_angkut` int(11) NOT NULL,
  `id_status_transaksi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_resi`, `tanggal_pengambilan`, `tanggal_diambil`, `id_kurir`, `id_user`, `id_produk`, `tanggal_sampai`, `biaya_angkut`, `id_status_transaksi`, `created_at`, `updated_at`) VALUES
(1, 'JNE-SLD001', '2022-04-06 17:00:00', '2022-04-07 06:06:00', 2, 1274, 21, '2022-04-07 06:06:00', 50000, 4, '2022-03-31 08:57:33', '2022-04-15 20:24:30'),
(2, 'JNAP-006146', '2022-04-07 06:02:00', '2022-04-07 06:02:00', 2, 1279, 14, '2022-04-07 06:02:00', 40000, 2, '2022-03-31 10:44:59', '2022-04-07 06:02:18'),
(5, 'JP741796518', '2022-03-27 10:56:45', '2022-03-28 10:56:45', 5, 1, 17, '2022-03-31 10:56:45', 690000, 1, '2022-03-31 10:58:43', NULL),
(9, 'JNE-902109', '2022-04-07 05:49:00', '2022-04-07 05:49:00', 3, 1279, 7, '2022-04-07 05:49:00', 20000, 2, '2022-04-07 04:12:47', '2022-04-07 06:03:35'),
(18, 'PSJ-2022-04', '2022-04-29 10:00:00', NULL, 10, 1, 19, NULL, 50000, 1, '2022-04-15 20:43:47', NULL),
(19, 'PSJ-2022-04', '2022-04-23 00:00:00', NULL, 10, 1, 29, NULL, 500000, 1, '2022-04-15 20:49:03', NULL),
(20, 'PSJ-2022-05', '2022-05-03 17:00:00', NULL, 10, 1277, 35, NULL, 20000, 1, '2022-05-18 04:34:41', NULL),
(21, 'PSJ-2022-05', '2022-05-17 17:00:00', NULL, 5, 1276, 15, NULL, 30, 1, '2022-05-18 08:03:44', NULL),
(22, 'PSJ-2022-05', '2022-05-17 17:00:00', NULL, 5, 1, 28, NULL, 45, 1, '2022-05-18 08:14:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  `id_kurir` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `telp`, `id_desa`, `foto`, `access_token`, `pin`, `id_kurir`) VALUES
(1, '123456', '5f4dcc3b5aa765d61d8327deb882cf99', 'yusuf', '08563604240', 1, 'no', '8SuVMrrCJ5TJI1venJ8wgykq230OEMbdswfo68cMr1lPpx7fuqbWkqJ9096NTXLZzFgeGONGSm5ixnUaIEGTpVg47mtuDiI507kYhjbyULS3rUnBRK4266FCXUWcotDd8PNAFhRCBbCLxQPcKWoYFlBydAK9jafm5HiigPsDjhY4f01KcXvZzhpSTHRZY3NIeLvMsexO', '123456', NULL),
(3, '1234561', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photolc8bXo64Iy1234561Ht47g', 'VzqgmMIUjiukWRAaoHyrZCxOgxBL0MQ0n36R0WqNnjjplqTyyo5IBtnwEN47JaSCaqAPvgd2vvLe4AGdolZeSDv3sKIpukCLDkI7YVWbdwQu9sXZbYmNWKB2V7aETBHPMb6X9AEutXJJCG8UzVJURcweFTxTln0z2cdmEGf1KX6tifsF8QDROP846OFQ7eoDh51ihffk', '', NULL),
(4, '12345611', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photoCgtPaiQEG412345611mw0Q', 'vTvaffy4ST7nduM1RFYFMyCOJsRbTnBpNWQMc3IqVBj6OkLKdGih4JhZWvY4J8LmggVs15YEBwHbMrEAP41tdpOl85PtYBEcU3IXKfqN0zcHyDjGzzXhIkUN7AL7tVqqtrWvwFcuX0Q9Gea0oO9AHHU9WKi6niwkiCfRroZpIPsZShxTjG3ulpZC567KQ2PrFx2m1lbj', '', NULL),
(1284, '12345678910', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'Rhadhiya wiraga', '08966666', 3, '', '8tDEioAllayx5bc0an4wNX8FbnDuQHW5enBXpDqyuljSNjP7LJMn33evleRtUxIzho0dfpKomr7JQdGsvVcF9qq79WKi0GMWBT1TtfKQiJSbOtNrsrYBHAEud5fruKNgILhvT81s1wE3V0Cp4P6hsYEGeC6634OggG1ziDZjB8xqM9IVkdwHU4kzc6kMOH2PkFFZ22Vh', '', NULL),
(1274, '8881248051', '718b84c99141527de725aeb999ea897d', 'Irfan', '089543275929', 1, '', 'tzIqDlPfXG6yfn1apSIF52xzBpmGSK9TKW9iPLlZg6KHC2RGtHbV5zBoOr6QDHO2jYrGufUgv8gV7yriVTXCFIMW9AKeOQRNLo10hCare4U04k2I3ZRtqAJcuxwTSElDvyNBwVdeFn1hYkz4P3LXqD1qEbQManjJcLxZFChssAWNd40PlRmbY5s8imuN85ibyk73MJOT', '123456', NULL),
(1276, '223452', 'c37fddfb7b3f538674c6e9a77e7bf486', 'Gilang Pratama Putra', '0895375455587', 2, '', 'mqqcdUHCPL6M1ET2gZbVRlsXRrSxtOI88c9Bdq3L1PHADYyacaCBcMTGYzA4B7JZDjKbb9iuoNXvmUjshyvFaZAYVGDFgfhFk1nnSx76jPQ5m2wBdkd72EunivGVr4wOQkxlIfDlX7O9yJKo8buEmpoVKQIviWNUtefGM3Epgt45CUe0rkZh0wY6q0R2LLPHQOT5z9sM', '223452', NULL),
(1277, '87673645', '163218e536c13ff2fc9a4d76e34be085', 'randy kurniawan', '08598583256', 3, '', '5c9ogqvGCxHbGwdbWQ5YMeZ08PMu1uVlPUOD6KqPCMqqHgfbX2TiQVUwEhlOau3Dyo3fznNWoQTDhAGYjsSktr4wRIFxALzzlNU67n85p1otIRW8hXHUCmNLCR1A627s9ji6vdVFJS4vZgBkdI41zyPMk0us7JRm09ZlxxBJtkKTeIs9VhZrABmYFyOLS2KEjDXfnm2r', '123456', NULL),
(1278, '572984864', '24775f4c046499d6494654258352495a', 'aiman abdul ', '08736873252', 4, '', 'lxCB970hNTZ0qytSylQRGvnFQwf0uuMdTUCPatzt6W8qf6VkuQ12MRWBbGqp1ekJ2dNRX1Fno9s6smb5HWaXE04AgiSsB4k7yHCl6ljzag5pvLhRAdOp9DoVVPMJkXTrEen3gL1cO3XVbH4cGeeUPJYiyImDIZrjowF5hBiufPLSWCmK9Gz4fSOjntEKDIED32wYdZUm', '123456', NULL),
(1279, '284775397', '7d49e40f4b3d8f68c19406a58303f826', 'dimas naufal', '028482752', 2, '', '64OLcOqqrDZpoxZJ7gcfanMPJw6gECYkQr1PsQ9jHBbupe6UUymTRJQA27qj8V4MCwIRAK9oFfwDbdxbg0L1voTyrWPrkGMFNYaSsbzccZx3XOSupXdm9VBvhSlTd1jRGwA5tG3zNRqCQ0u6sI7Z2InlxE3tytezm9f8PiTl4J2uiU3aHtLLBYk7NHzakABWm5hEgedp', '123456', NULL),
(1280, '484982042', 'd52b1baf1bfd5fe68811707bf16e4a18', 'Rhadhiya Wiraga Sudrajat', '03858243', 4, '', 'JDS7PacRMes7IOl9xHOvyWUPLfa4efdYlEhZ6q0OGoIcIexuQ1JZdtMmjpwKUIQzC2HwFqTXlmDA25y98l9VmaRpoXngot6BBKjyW5sHs7m90YJNhFJOLL1GK0nCGR5ZSCq6MjBMrnuQSx3pU038LrWqkPGpQifbhab6TkRgkbUAtW17iXx8EEbcZvBd4gDcnytgYPN3', '123456', NULL),
(1282, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', 4, '', 'tJDL6LUY0hAb1R6aZ47SQouD2Cmd5FzWjIxXrsplgJEL6HsB5DGjGjxGtHAina69hYMygoJMKM1cCOEAqyPoce80P3XNxXuBTEpNywkSKKIOd1CihRmPc3BIr92WhSPVVYeFgi4eF8oblqZFWqaq28NuU7yGUA9l7mQbQz1CszfDvHMvSv2sun0ezmTTgnk3lxdvVVrT', '', NULL),
(1283, 'kurir1', '5f4dcc3b5aa765d61d8327deb882cf99', 'kurir yusuf', '085123123123', 1, '', '2kz5YZ1iXnWLqHNeuKOy4A5DZCVcg69nI9mL7RGjGp4N8wu0jaFRW1eCvcwESfQbGVoJm96HPtIiFgq9SLMg36R3Mbbr5nFopePk4toe88yCqNxEmrHi7m3cKEMXvhhXXAWYDS0Ap7dIJHBPaBlWUhpf1To5KaUlU6qaBVylnBLOiZQFTfMyARjlJct20vhUwDJ8sZTY', '123456', 2),
(1285, '987654321', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'raya gantenk', '089273637', 1, '', 'u504TPmmCaGjWZ32ZUbfe5h2a4WMmrl0aycOW6pS9kOuEFbNW8UndytYoQJV7kdFwLUYCcXaPvbXAKRjAOqLhDTr8TN67E6tDMfccHNsBsfAz1rOLMuHgn7RVlGspe9QFK2XxxRUZstJtE8QA3Bw3YKzen8Bo5Fvg0moVEIHJ1G9zhSqz9wnhdw7GgPdqvpvjMDrJ156', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe_produk` (`id_tipe_produk`),
  ADD KEY `status_produk_id` (`id_status_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `status_produk`
--
ALTER TABLE `status_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kurir` (`id_kurir`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_status_transaksi` (`id_status_transaksi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_desa` (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `status_produk`
--
ALTER TABLE `status_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1286;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
