-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 08:01 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirabellabatik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$UR7c/ZxblNlXalK95du/1ef1nGlDgW2ya1J5oHXoWEltW2WhV2Yz6', '2019-01-03 22:23:49', '2019-01-03 22:23:49');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `no_rek`, `nama_bank`, `atas_nama`, `created_at`, `updated_at`) VALUES
(1, '563201026697355', 'BRI', 'Ramdan Riawan', '2019-01-05 08:30:50', '2019-01-05 08:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bahans`
--

CREATE TABLE `jenis_bahans` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_bahans`
--

INSERT INTO `jenis_bahans` (`id`, `nama_bahan`, `created_at`, `updated_at`) VALUES
(1, 'Kain Mori (Cambrics)', '2019-01-04 20:02:21', '2019-01-04 20:02:21'),
(2, 'Kain Katun', '2019-01-04 20:02:21', '2019-01-04 20:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `jenis_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Wearpack Batik', '2019-01-04 19:28:49', '2019-01-04 20:08:56'),
(2, 'Muslim Set Batik', '2019-01-04 19:28:49', '2019-01-04 19:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasis`
--

CREATE TABLE `konfirmasis` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `rek_pengirim` varchar(50) NOT NULL,
  `tggl_konfirmasi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti_transfer` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kotas`
--

CREATE TABLE `kotas` (
  `id` int(6) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kotas`
--

INSERT INTO `kotas` (`id`, `nama_kota`, `ongkir`, `created_at`, `updated_at`) VALUES
(1, 'jambi', 22000, '2019-01-03 07:55:18', '2019-01-04 12:05:32'),
(2, 'aceh', 44000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(3, 'Denpasar', 29000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(4, 'Pangkalpinang', 31000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(5, 'cilegon', 22000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(6, 'serang', 27000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(7, 'tanggerang selatan', 21000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(8, 'tanggerang', 21000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(9, 'bengkulu', 29000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(10, 'gorontalo', 44000, '2019-01-04 13:52:06', '2019-01-04 13:52:06'),
(11, 'jakarta barat', 19000, '2019-01-04 13:52:06', '2019-01-04 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `laporans`
--

CREATE TABLE `laporans` (
  `judul` varchar(20) NOT NULL,
  `isi_laporan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `alamat_pengiriman` varchar(50) NOT NULL,
  `kota_id` int(11) NOT NULL,
  `status_order` varchar(20) NOT NULL,
  `status_konfirmasi` varchar(20) NOT NULL,
  `status_diterima` varchar(20) NOT NULL,
  `creted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pelanggan_id`, `tgl_order`, `alamat_pengiriman`, `kota_id`, `status_order`, `status_konfirmasi`, `status_diterima`, `creted_at`, `updated_at`) VALUES
(1, 2, '2019-01-01 00:00:00', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kot', 1, 'pending', 'pending', 'pending', '2019-01-05 20:24:54', '2019-01-05 20:24:54'),
(2, 3, '2019-01-01 00:00:00', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kot', 1, 'pending', 'pending', 'pending', '2019-01-05 20:24:54', '2019-01-05 20:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_temps`
--

CREATE TABLE `order_temps` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tggl_order` datetime NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota_id` int(6) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `name`, `telpon`, `alamat`, `kota_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'ramdan', '082282692489', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'ramdanriawan3@gmail.com', '$2y$10$wbG1kOHecunO5et/7TfKzuDB.k0uzRKU3SCMiPCBA0/HKkI1Al8Yy', 'OypDDfPhETPYRl1wtHL6Lf8pZdEnWlYiAHbqoNqXZabJLklhXoP0I5Wy7nqN', '2019-01-03 10:12:00', '2019-01-03 10:12:00'),
(3, 'riawan', '082282692481', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru kota jambi', 1, 'ramdanriawan4@gmail.com', '$2y$10$LYe37z/QxfgqatjF/6kSzulXo3.E4Qovy9PLMcrbdUd6zZSM9BnL2', NULL, '2019-01-05 07:20:52', '2019-01-05 07:20:52'),
(4, 'ramdan riawan', '082282692482', 'dimana mana hatiku senang', 1, 'admin@admin.com', '$2y$10$/yC50bfqF1SZMdbSUYoc1OAcnEJ8vJjsmrp8Af4HyeNDk80f1YlEm', NULL, '2019-01-05 07:21:50', '2019-01-05 07:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `jenis_bahan_id` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `gambar_belakang` varchar(255) NOT NULL,
  `dibeli` int(11) NOT NULL DEFAULT '0',
  `diskon` int(3) DEFAULT '0',
  `tggl_masuk` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `jenis_bahan_id`, `nama_produk`, `deskripsi`, `harga`, `stok`, `berat`, `gambar`, `gambar_belakang`, `dibeli`, `diskon`, `tggl_masuk`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 'baju batik kerenlah pokoknya', 'baju batik kerenlah pokoknya', 25000, 10, 1, 'bapak_eka.jpeg', 'eka_pradana.jpeg', 0, 0, '2019-01-04 19:15:00', '2019-01-04 19:16:10', '2019-01-04 19:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `isi_ulasan` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id`, `pelanggan_id`, `produk_id`, `isi_ulasan`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 'ini barangnya jelek banget smpah dah mending gak usah beli disini', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramdan riawan', 'ramdanriawan3@gmail.com', NULL, '$2y$10$ejq78EmoedhUVxPajSXUA.vuIswm.TwO/UftM1EQsH8zHIFPlS0Ym', NULL, '2019-01-03 01:32:51', '2019-01-03 01:32:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasis`
--
ALTER TABLE `konfirmasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_temps`
--
ALTER TABLE `order_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konfirmasis`
--
ALTER TABLE `konfirmasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_temps`
--
ALTER TABLE `order_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
