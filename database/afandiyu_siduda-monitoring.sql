-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2022 at 09:04 PM
-- Server version: 10.2.31-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `afandiyu_siduda-monitoring`
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
(4, 'Neglawangi');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `layanan` varchar(60) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `plat_no` varchar(20) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `layanan`, `jenis_kendaraan`, `plat_no`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Gilang Pratama Putra', 'JNE', 'Motor', 'D 6789 BV', '0895375455587', '2022-03-31 08:50:33', NULL),
(2, 'Jajang ', 'JNE', 'Mobil pick up', 'A1994CF', '085913394293', '2022-03-31 09:37:59', NULL),
(3, 'Rhadhiya Wiraga Sudrajat', 'Si cepat', 'Truk', 'D8971EF', '087821705143', '2022-03-31 09:50:14', NULL),
(4, 'dimas ', 'Lion Parcel', 'motor', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:04', NULL),
(5, 'Aldi', 'Ninja Express', 'Truck', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:07', NULL),
(6, 'Jeje', 'TIKI', 'Pickup', 'Z 7823 KTL', '087238087263', '2022-03-31 10:40:08', NULL);

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
(15, 1276, '2022-02-02', '2022-03-02', 35, 100, 3, 'Rancaekek', 4, '2022-03-31 10:59:35', NULL),
(14, 5, '2022-01-13', '2022-03-13', 20, 200, 16, 'Cibereum Rt 01/Rw 05', 3, '2022-03-31 10:54:55', NULL),
(13, 4, '2022-04-16', '2022-05-16', 20, 100, 11, 'Cibiru ', 2, '2022-03-31 10:51:50', NULL),
(12, 3, '2022-03-02', '2022-05-02', 40, 300, 10, 'Suka Pura', 1, '2022-03-31 10:46:58', NULL),
(16, 1274, '2022-01-12', '2022-03-02', 50, 10, 8, 'Suka sari', 4, '2022-03-31 11:08:07', NULL),
(17, 3, '2022-03-01', '2022-05-09', 18, 30, 9, 'Ranca Manyar', 1, '2022-03-31 11:10:06', NULL),
(18, 5, '2022-02-02', '2022-04-05', 10, 30, 6, 'Padalarang', 1, '2022-03-31 11:12:35', NULL),
(19, 1, '2022-02-01', '2022-03-31', 25, 40, 8, 'Sapan', 3, '2022-03-31 11:15:08', NULL),
(21, 1274, '2022-01-12', '2022-03-12', 30, 40, 12, 'Baleendah', 4, '2022-03-31 11:18:20', NULL),
(22, 4, '2022-01-05', '2022-03-31', 30, 70, 4, 'Cibeunying', 3, '2022-03-31 11:20:50', NULL);

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
(4, 'Selesai Diambil');

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
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_produk`
--

INSERT INTO `tipe_produk` (`id`, `foto`, `nama`, `harga`, `tanggal`) VALUES
(3, 'cabai.png', 'Cabai', 30000, '2022-03-20'),
(4, 'jagung.png', 'Jagung', 25000, '2022-03-20'),
(6, 'kubis.png', 'Kubis', 10000, '2022-03-20'),
(7, 'singkong.png', 'Singkong', 15000, '2022-03-20'),
(8, 'mentimun.png', 'Timun', 20000, '2022-03-20'),
(9, 'tomat.png', 'Tomat', 20000, '2022-03-20'),
(10, 'bawang merah.png', 'Bawang Merah', 15000, '2022-03-20'),
(11, 'wortel.png', 'Wortel', 15000, '2022-03-20'),
(12, 'kentang.png', 'Kentang', 10000, '2022-03-20'),
(16, 'selada.png', 'selada', 20000, '2022-03-27');

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
(1, 'JNE-SLD001', '2022-03-30 08:54:22', '2022-03-31 08:54:22', 1, 1274, 3, '2022-04-02 08:54:22', 50000, 2, '2022-03-31 08:57:33', NULL),
(2, 'JNAP-006146', '2022-03-01 10:41:56', '2022-03-04 10:41:56', 2, 8990, 97, '2022-03-13 10:43:23', 400000, 79, '2022-03-31 10:44:59', NULL),
(3, '11001000389', '2022-03-08 10:49:27', '2022-03-09 10:49:27', 3, 9908, 23, '2022-03-15 10:49:27', 769000, 32, '2022-03-31 10:52:23', NULL),
(4, 'JD011968436', '2022-03-11 10:53:17', '2022-03-12 10:53:17', 4, 6542, 67, '2022-03-20 10:53:17', 230000, 76, '2022-03-31 10:55:52', NULL),
(5, 'JP741796518', '2022-03-27 10:56:45', '2022-03-28 10:56:45', 5, 7655, 25, '2022-03-31 10:56:45', 690000, 52, '2022-03-31 10:58:43', NULL);

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
  `pin` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `telp`, `id_desa`, `foto`, `access_token`, `pin`) VALUES
(1, '123456', '5f4dcc3b5aa765d61d8327deb882cf99', 'yusuf', '08563604240', 1, 'no', '3GpoWQOJyMGGXAbXYI1maYrDo5qxSMfWLuYX9c8yau4lIpa4VKOHv9wM62jSLFgJj8PcLf317RVPT8OPmqoyNArhiDu6BkjBglSdjihbfReNambHFtU9ZbQ0sYeC57izeUtSUI9VD0nTXgnOvp4Q6D7hCnBCFxoABmeQcw0zfiqPkxvJJNWkZIKhZ03RsRdKscKgZw3t', '123456'),
(3, '1234561', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photolc8bXo64Iy1234561Ht47g', 'VzqgmMIUjiukWRAaoHyrZCxOgxBL0MQ0n36R0WqNnjjplqTyyo5IBtnwEN47JaSCaqAPvgd2vvLe4AGdolZeSDv3sKIpukCLDkI7YVWbdwQu9sXZbYmNWKB2V7aETBHPMb6X9AEutXJJCG8UzVJURcweFTxTln0z2cdmEGf1KX6tifsF8QDROP846OFQ7eoDh51ihffk', ''),
(4, '12345611', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photoCgtPaiQEG412345611mw0Q', 'vTvaffy4ST7nduM1RFYFMyCOJsRbTnBpNWQMc3IqVBj6OkLKdGih4JhZWvY4J8LmggVs15YEBwHbMrEAP41tdpOl85PtYBEcU3IXKfqN0zcHyDjGzzXhIkUN7AL7tVqqtrWvwFcuX0Q9Gea0oO9AHHU9WKi6niwkiCfRroZpIPsZShxTjG3ulpZC567KQ2PrFx2m1lbj', ''),
(5, '123456112', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photof1XwTnCpuN123456112bnX', 'vrtOWwYDwQll1pByAbhiinvj4foPBuhDJozalcsFxdaPnCShzkfJKee4D5Mb4R9ueBKX82xagdepuSgpTCmw0SkrXhEI8dx7JmkHHkBHVfjKwayIgNKm6tLEMiG9DgUVCqAZjL6PLUycIsJGVANpUbF7Pq5Y8Q5Ebud9qM2yXRxFiOXOS2TsNsfN7TAWGCQYvQ1jq7rU', ''),
(1274, '8881248051', '718b84c99141527de725aeb999ea897d', 'Irfan', '089543275929', 1, '', '2sQD12d3QacKFkAqM6kyNiVvexd53zrXeV2vl1aES7hrxa5OmMvYtCYhoALosCYwKFi3v0LrcjoEMgRpCGBMV4jLuUDj7bu9X8n1YwbhtJ7EIcRuECJenxHk6zwX09PcPRiLg7JUDGFsIq5Ua8t94n5fZQmjHTQyTfNzGlrAKm8fTNpSPTBoZ4s0u2RdbKl1BwSHANGy', '123456'),
(1276, '223452', '21232f297a57a5a743894a0e4a801fc3', 'Gilang Pratama Putra', '0895375455587', 2, '', 'tHZD8IrZwOypvdoOGrfCjqL47PBveeE5lJMRTJ6o0T48UReYW1LVF0G1QbUbnI5IT6gzKykJcNsVmNaWAE5zIQjYS7Hxa86rSclfcsudSKhN27pBdtJXWOl3afPuMPZi6fDKsv4pU3YB9jja5ni0xdKN9Ew2ADuTnwrWUFeQO3XCmFGBZbX1gCnY4vm97gzQtqAkkMyw', '223452');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `status_produk`
--
ALTER TABLE `status_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1277;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;