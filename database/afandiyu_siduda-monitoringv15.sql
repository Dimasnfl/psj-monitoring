-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2022 pada 12.43
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
-- Database: `monitoring`
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `kurir`
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
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id`, `nama`, `jenis_kendaraan`, `plat_no`, `no_telp`, `created_at`, `updated_at`) VALUES
(2, 'Jajang ', 'Mobil pick up', 'A1994CF', '085913394293', '2022-03-31 09:37:59', NULL),
(3, 'Rhadhiya Wiraga Sudrajat', 'Truk', 'D8971EF', '087821705143', '2022-03-31 09:50:14', NULL),
(4, 'dimas ', 'motor', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:04', NULL),
(5, 'Aldi', 'Truck', 'D 5643 BBC', '089722678223', '2022-03-31 10:37:07', NULL),
(6, 'Jeje', 'Pickup', 'Z 7823 KTL', '087238087263', '2022-03-31 10:40:08', NULL),
(10, 'Dimas', 'Motor4', 'D 123 M', '08214912', '2022-04-07 05:15:00', '2022-04-07 05:15:31');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `id_user`, `tgl_tanam`, `tgl_panen`, `berat_panen`, `luas_lahan`, `id_tipe_produk`, `alamat`, `id_status_produk`, `created_at`, `updated_at`) VALUES
(7, 1274, '2022-03-01', '2022-03-19', 50, 18, 16, 'KP.Sukasari', 1, '2022-03-31 08:54:25', NULL),
(15, 1276, '2022-02-02', '2022-03-02', 35, 100, 53, 'Rancaekek', 5, '2022-03-31 10:59:35', '2022-04-21 10:08:47'),
(14, 5, '2022-01-13', '2022-03-13', 20, 200, 16, 'Cibereum Rt 01/Rw 05', 3, '2022-03-31 10:54:55', NULL),
(13, 4, '2022-04-16', '2022-05-16', 20, 100, 11, 'Cibiru ', 2, '2022-03-31 10:51:50', NULL),
(12, 3, '2022-03-02', '2022-05-02', 40, 300, 10, 'Suka Pura', 3, '2022-03-31 10:46:58', '2022-04-15 20:42:16'),
(16, 1274, '2022-01-12', '2022-03-02', 50, 10, 8, 'Suka sari', 4, '2022-03-31 11:08:07', NULL),
(17, 3, '2022-03-01', '2022-05-09', 18, 30, 9, 'Ranca Manyar', 1, '2022-03-31 11:10:06', NULL),
(18, 5, '2022-02-02', '2022-04-05', 10, 30, 21, 'Padalarang', 1, '2022-03-31 11:12:35', '2022-04-16 09:05:27'),
(19, 1, '2022-02-01', '2022-03-31', 25, 40, 8, 'Sapan', 5, '2022-03-31 11:15:08', '2022-04-15 20:43:47'),
(21, 1274, '2022-01-12', '2022-03-12', 30, 40, 12, 'Baleendah', 3, '2022-03-31 11:18:20', '2022-04-16 07:49:09'),
(22, 4, '2022-01-05', '2022-03-31', 30, 70, 10, 'Cibeunying', 5, '2022-03-31 11:20:50', '2022-04-21 09:16:47'),
(23, 1, '2022-03-31', '2022-04-30', 200, 1200, 3, 'fgfyeferfyrg', 1, '2022-03-31 14:24:32', NULL),
(29, 1, '2022-04-24', '2022-08-17', 500, 1200, 8, 'sfsfxdf', 5, '2022-04-01 07:37:52', '2022-04-21 09:09:58'),
(25, 1, '2022-03-31', '2022-10-31', 2212, 1233, 3, 'same out us do the to the store he', 1, '2022-03-31 14:37:35', NULL),
(27, 1, '2022-03-31', '2022-05-28', 1200, 1200, 12, 'jalan raya pinggir jalan', 3, '2022-03-31 15:39:24', '2022-04-16 09:05:49'),
(28, 1, '2022-04-01', '2022-07-30', 500, 1200, 11, 'jalan joyoboyo', 3, '2022-03-31 17:40:33', '2022-04-16 10:01:13'),
(30, 1, '2022-04-01', '2022-04-30', 12000, 1000, 21, 'Ciparay', 5, '2022-04-01 08:23:57', '2022-04-22 11:10:23'),
(31, 1279, '2022-04-22', '2022-04-22', 20, 15, 10, 'bdg', 5, '2022-04-22 10:53:48', '2022-04-24 10:41:24');

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
(5, 'Sedang Diambil');

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
(3, 'cabai.png', 'Cabai', 30000, '2022-03-20', 1, '2022-04-13', NULL, '2022-04-13 14:43:10'),
(4, 'jagung.png', 'Jagung', 25000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:43:49'),
(6, 'kubis.png', 'Kubis', 10000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:49:12'),
(7, 'singkong.png', 'Singkong', 15000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-13 14:49:24'),
(8, 'mentimun.png', 'Timun', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(9, 'tomat.png', 'Tomat', 20000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(10, 'bawang merah.png', 'Bawang Merah', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(11, 'wortel.png', 'Wortel', 15000, '2022-03-20', 1, '2022-04-13', NULL, NULL),
(12, 'kentang.png', 'Kentang', 10000, '2022-03-20', 0, '2022-04-13', NULL, '2022-04-21 10:07:02'),
(21, 'cabai.png', 'cabai', 500002, '0000-00-00', 1, '2022-04-13', NULL, NULL),
(44, 'singkong.png', 'Singkong', 25000000, '2022-04-13', 0, '2022-04-13', 7, '2022-04-13 14:50:07'),
(45, 'singkong.png', 'Singkong', 10000, '2022-04-13', 0, '2022-04-13', 7, '2022-04-16 08:46:23'),
(42, 'jagung.png', 'Jagung', 50000, '2022-04-13', 1, '2022-04-13', 4, NULL),
(43, 'kubis.png', 'Kubis', 5000000, '2022-04-13', 1, '2022-04-13', 6, NULL),
(46, 'singkong.png', 'Singkong', 20000, '2022-04-16', 0, '2022-04-16', 7, '2022-04-16 08:46:36'),
(47, 'singkong.png', 'Singkong', 15000, '2022-04-16', 1, '2022-04-16', 7, NULL),
(53, 'kentang.png', 'Kentang', 20000, '2022-04-21', 0, '2022-04-21', 12, '2022-04-22 12:07:23'),
(54, 'kentang.png', 'Kentang', 2500, '2022-04-22', 1, '2022-04-22', 12, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL,
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_resi`, `tanggal_pengambilan`, `tanggal_diambil`, `id_kurir`, `id_user`, `id_produk`, `tanggal_sampai`, `biaya_angkut`, `id_status_transaksi`, `created_at`, `updated_at`) VALUES
(1, 'JNE-SLD001', '2022-04-06 17:00:00', '2022-04-07 06:06:00', 2, 1274, 21, '2022-04-07 06:06:00', 50000, 4, '2022-03-31 08:57:33', '2022-04-15 20:24:30'),
(2, 'JNAP-006146', '2022-04-07 06:02:00', '2022-04-07 06:02:00', 2, 1279, 14, '2022-04-07 06:02:00', 40000, 2, '2022-03-31 10:44:59', '2022-04-07 06:02:18'),
(5, 'JP741796518', '2022-03-27 10:56:45', '2022-03-28 10:56:45', 5, 1, 17, '2022-03-31 10:56:45', 690000, 1, '2022-03-31 10:58:43', NULL),
(9, 'JNE-902109', '2022-04-07 05:49:00', '2022-04-07 05:49:00', 3, 1279, 7, '2022-04-07 05:49:00', 20000, 2, '2022-04-07 04:12:47', '2022-04-07 06:03:35'),
(18, 'PSJ-2022-04', '2022-04-29 10:00:00', NULL, 10, 1, 19, NULL, 50000, 1, '2022-04-15 20:43:47', NULL),
(19, 'PSJ-2022-04', '2022-04-21 19:00:00', NULL, 10, 1, 30, NULL, 2000, 1, '2022-04-21 09:00:42', NULL),
(20, 'PSJ-2022-04', '2022-04-22 20:00:00', NULL, 2, 1, 29, NULL, 45000, 1, '2022-04-21 09:09:58', NULL),
(21, 'PSJ-2022-04', '2022-04-22 21:45:00', NULL, 10, 4, 22, NULL, 20000, 1, '2022-04-21 09:16:47', NULL),
(22, 'PSJ-2022-04', '2022-04-22 11:10:00', NULL, 5, 1276, 15, NULL, 15000, 1, '2022-04-21 10:08:47', NULL),
(23, 'PSJ-2022-05', '2022-05-15 12:09:00', NULL, 10, 1279, 31, NULL, 15000, 1, '2022-04-22 11:09:13', NULL),
(24, 'PSJ-2022-04', '2022-04-23 13:12:00', NULL, 5, 1, 30, NULL, 900, 1, '2022-04-22 11:10:23', NULL),
(27, 'PSJ-2022-04-24-031-010', '2022-04-23 17:00:00', NULL, 10, 1279, 31, NULL, 2000, 1, '2022-04-24 10:41:24', NULL);

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
  `pin` varchar(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `password`, `nama`, `telp`, `id_desa`, `foto`, `access_token`, `pin`) VALUES
(1, '123456', '5f4dcc3b5aa765d61d8327deb882cf99', 'yusuf', '08563604240', 1, 'no', '6CJHrOR2tEODs6Gw7pWK5XtbOhrMI6ZVJaEm8iKlVH9FBXQN2KEPftj40cqyTemznYlixirYv9A8Lkvzoj8lGmQoDzuJM11dL3gWsePQrpF5q6c3UfPTOd7efkT2c7MXYQKwSc5sxYxu0wZtTBSoFEIA43vlhjauUy4n48gLGGbJfi3ySZk11B0vuIH2bICg90A5wbPq', '123456'),
(3, '1234561', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photolc8bXo64Iy1234561Ht47g', 'VzqgmMIUjiukWRAaoHyrZCxOgxBL0MQ0n36R0WqNnjjplqTyyo5IBtnwEN47JaSCaqAPvgd2vvLe4AGdolZeSDv3sKIpukCLDkI7YVWbdwQu9sXZbYmNWKB2V7aETBHPMb6X9AEutXJJCG8UzVJURcweFTxTln0z2cdmEGf1KX6tifsF8QDROP846OFQ7eoDh51ihffk', ''),
(4, '12345611', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photoCgtPaiQEG412345611mw0Q', 'vTvaffy4ST7nduM1RFYFMyCOJsRbTnBpNWQMc3IqVBj6OkLKdGih4JhZWvY4J8LmggVs15YEBwHbMrEAP41tdpOl85PtYBEcU3IXKfqN0zcHyDjGzzXhIkUN7AL7tVqqtrWvwFcuX0Q9Gea0oO9AHHU9WKi6niwkiCfRroZpIPsZShxTjG3ulpZC567KQ2PrFx2m1lbj', ''),
(5, '123456112', 'e10adc3949ba59abbe56e057f20f883e', 'yusuf_test', '085123123123', 1, 'user_photof1XwTnCpuN123456112bnX', 'vrtOWwYDwQll1pByAbhiinvj4foPBuhDJozalcsFxdaPnCShzkfJKee4D5Mb4R9ueBKX82xagdepuSgpTCmw0SkrXhEI8dx7JmkHHkBHVfjKwayIgNKm6tLEMiG9DgUVCqAZjL6PLUycIsJGVANpUbF7Pq5Y8Q5Ebud9qM2yXRxFiOXOS2TsNsfN7TAWGCQYvQ1jq7rU', ''),
(1274, '8881248051', '718b84c99141527de725aeb999ea897d', 'Irfan', '089543275929', 1, '', 'jTdQiyOUdt4aBPlOUiJtto0P8XXnsBkS6CoeqXHIRYYPbMEAtNbgVvjwLui5Q7QMmTZgExuxR2cSrg27qIeyo7CFkfLDrz8RU45vnF95EQIidanOP2NrhGUHb71VWy9mswMhhmfJyfZZHjTKgEzY2uaqe4kOG0C6WndAZJ4KuCIFDz1GHT39xel8fzlJhSNKVAV3jD1A', '123456'),
(1276, '223452', 'c37fddfb7b3f538674c6e9a77e7bf486', 'Gilang Pratama Putra', '0895375455587', 2, '', 'tHZD8IrZwOypvdoOGrfCjqL47PBveeE5lJMRTJ6o0T48UReYW1LVF0G1QbUbnI5IT6gzKykJcNsVmNaWAE5zIQjYS7Hxa86rSclfcsudSKhN27pBdtJXWOl3afPuMPZi6fDKsv4pU3YB9jja5ni0xdKN9Ew2ADuTnwrWUFeQO3XCmFGBZbX1gCnY4vm97gzQtqAkkMyw', '223452'),
(1277, '87673645', '163218e536c13ff2fc9a4d76e34be085', 'randy kurniawan', '08598583256', 3, '', 'jNdFWoCrB3Nkd5FIqVKAHvRPaqZV4dWcyDUTLIrUsMXKu3baU9Y0ick4EVxTShgtbc23iIjFCD0ByGsthAGmW2xsvZw2WlUKP2XXGIu1B1fPnptKYigO9aenrZoN9GwlZgJnxsJQRLO4HwSv7zh86Pn5HEBuXDoJYSOdCbeMqmj9FNekS3k8ETA6A11eo5m70ybuzj7D', '123456'),
(1278, '572984864', '24775f4c046499d6494654258352495a', 'aiman abdul ', '08736873252', 4, '', '83KS2p1YHnxWMHpOIftZ0eziPgjYc0DraYWhNQPl17bCD6ddyTn1OtlxJ4c6pFfCgH3L5cu3oHIFZQylbAGEoNSgBzeYz2havj5sL2xEGOKELVJLUrpWAK6Uxg7Zl4XdwGv5nAdfmmkkMVIXfwb273RqTkjqzeTBX8yviwuBuShGC60RREiQ7SbFaViNUqVWKy4sUD9P', '123456'),
(1279, '284775397', '7d49e40f4b3d8f68c19406a58303f826', 'dimas naufal', '02848275233', 2, '', '', '123456'),
(1280, '484982042', 'd52b1baf1bfd5fe68811707bf16e4a18', 'Rhadhiya Wiraga Sudrajat', '03858243', 4, '', '', '123456');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `status_produk`
--
ALTER TABLE `status_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tipe_produk`
--
ALTER TABLE `tipe_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1282;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
