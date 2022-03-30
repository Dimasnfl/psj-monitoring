-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 06:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`) VALUES
(1, 'Cibereum'),
(2, 'Cihawuk'),
(3, 'Sukapura'),
(4, 'Neglawangi'),
(1008, 'Buahbatu');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto` varchar(32) NOT NULL,
  `tgl_tanam` date NOT NULL,
  `tgl_panen` date NOT NULL,
  `berat_panen` int(11) NOT NULL,
  `luas_lahan` int(11) NOT NULL,
  `id_tipe_produk` int(11) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `id_status_produk` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `foto`, `tgl_tanam`, `tgl_panen`, `berat_panen`, `luas_lahan`, `id_tipe_produk`, `alamat`, `id_status_produk`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdasd', '2022-03-01', '2022-03-31', 122, 1200, 10, 'asdasd', 1, '2022-03-30 12:54:01', '2022-03-30 13:58:37'),
(4, 1, '1OCMvimk3xh2.png', '2022-03-01', '2022-03-30', 0, 20, 3, 'alamat di sini', 1, '2022-03-30 15:01:46', NULL),
(5, 1, '1Hna2xe6Kfs2.png', '2022-03-01', '2022-03-30', 100, 20, 3, 'alamat di sini', 1, '2022-03-30 15:19:35', NULL),
(6, 1, '1K5lZ4m12Td2.png', '2022-03-01', '2022-03-30', 100, 20, 3, 'alamat di sini', 1, '2022-03-30 15:23:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_produk`
--

CREATE TABLE `status_produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama` varchar(20) NOT NULL,
  `harga` int(18) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_produk`
--

INSERT INTO `tipe_produk` (`id`, `nama`, `harga`, `tanggal`) VALUES
(3, 'Cabai', 30000, '2022-03-20'),
(4, 'Jagung', 25000, '2022-03-20'),
(6, 'Kubis', 10000, '2022-03-20'),
(7, 'Singkong', 15000, '2022-03-20'),
(8, 'Timun', 20000, '2022-03-20'),
(9, 'Tomat', 20000, '2022-03-20'),
(10, 'Bawang Merah', 15000, '2022-03-20'),
(11, 'Wortel', 15000, '2022-03-20'),
(12, 'Kentang', 10000, '2022-03-20'),
(16, 'selada', 20000, '2022-03-27');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `telp`, `id_desa`, `foto`, `access_token`, `pin`) VALUES
(1, '123456', '5f4dcc3b5aa765d61d8327deb882cf99', 'yusuf', '08563604240', 1, 'no', 'eT4P71A8a1ocV6PU2MLv0EpzeAoN7vPDKnUGq3MC8B53WzNXhJ0QOWiiuq9mVOLHFwVEvFujxeY3CdYnXjbcgQxmKws6rTeM8IrKk4nZtGRIhWQ2JsA56SMRHs7fcUZ09JpiAFtZm4vSkolfG2yotwSbNuy2bxDyBTxkOab8rdNlt4lCuDTK7LgYXwhqzcnDyX5JaIQW', '123456'),
(3, '1234561', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photolc8bXo64Iy1234561Ht47g', 'VzqgmMIUjiukWRAaoHyrZCxOgxBL0MQ0n36R0WqNnjjplqTyyo5IBtnwEN47JaSCaqAPvgd2vvLe4AGdolZeSDv3sKIpukCLDkI7YVWbdwQu9sXZbYmNWKB2V7aETBHPMb6X9AEutXJJCG8UzVJURcweFTxTln0z2cdmEGf1KX6tifsF8QDROP846OFQ7eoDh51ihffk', ''),
(4, '12345611', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photoCgtPaiQEG412345611mw0Q', 'vTvaffy4ST7nduM1RFYFMyCOJsRbTnBpNWQMc3IqVBj6OkLKdGih4JhZWvY4J8LmggVs15YEBwHbMrEAP41tdpOl85PtYBEcU3IXKfqN0zcHyDjGzzXhIkUN7AL7tVqqtrWvwFcuX0Q9Gea0oO9AHHU9WKi6niwkiCfRroZpIPsZShxTjG3ulpZC567KQ2PrFx2m1lbj', ''),
(5, '123456112', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photof1XwTnCpuN123456112bnX', 'vrtOWwYDwQll1pByAbhiinvj4foPBuhDJozalcsFxdaPnCShzkfJKee4D5Mb4R9ueBKX82xagdepuSgpTCmw0SkrXhEI8dx7JmkHHkBHVfjKwayIgNKm6tLEMiG9DgUVCqAZjL6PLUycIsJGVANpUbF7Pq5Y8Q5Ebud9qM2yXRxFiOXOS2TsNsfN7TAWGCQYvQ1jq7rU', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_tipe_produk`) REFERENCES `tipe_produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`id_status_produk`) REFERENCES `status_produk` (`id`),
  ADD CONSTRAINT `produk_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_kurir`) REFERENCES `kurir` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_status_transaksi`) REFERENCES `status_transaksi` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
