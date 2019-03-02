-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 12:52 AM
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
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `gambar`, `password`, `created_at`, `updated_at`) VALUES
(1, 'NHIA NOVI', 'admin', 'admin.png', '$2y$10$mS72KGtHj5IV/wAmVmQV3OXNquv9m7eCHIjIH2lmEyaUiOF.CrVq6', '2019-01-03 22:23:49', '2019-01-28 23:37:37');

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
(5, '234234', 'bri', 'nhua2', '2019-01-28 17:36:07', '2019-01-28 17:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `bank_payments`
--

CREATE TABLE `bank_payments` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_payments`
--

INSERT INTO `bank_payments` (`id`, `nama_bank`, `created_at`, `updated_at`) VALUES
(1, 'BI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bank Mandiri', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'BNI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'BRI', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'BTN', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Bank Anda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Bank Bukopin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Bank Bumi Artha', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Bank Capital Indonesia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'BCA', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, 'Kain Katun', '2019-01-04 20:02:21', '2019-01-04 20:35:37'),
(3, 'bahan 2', '2019-01-28 17:53:15', '2019-01-28 17:53:15');

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
(1, 'Wearpack Batik', '2019-01-04 19:28:49', '2019-01-04 20:08:56');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasis`
--

INSERT INTO `konfirmasis` (`id`, `order_id`, `pelanggan_id`, `bank_id`, `nama_pengirim`, `rek_pengirim`, `tggl_konfirmasi`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(6, 12, 5, 5, 'serah lu dah', '3453535234234', '2019-01-29 06:33:44', 'yg ini.png', '2019-01-28 23:33:44', '2019-01-28 23:33:44');

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
(12, 'jayapura', 50000, '2019-01-28 17:51:23', '2019-01-28 17:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kurirs`
--

INSERT INTO `kurirs` (`id`, `nama_kurir`, `created_at`, `updated_at`) VALUES
(1, 'jne', '2019-01-09 21:47:46', '2019-01-09 21:47:46'),
(2, 'tiki', '2019-01-09 21:47:46', '2019-01-09 21:47:46'),
(3, 'wahana', '2019-01-09 21:47:46', '2019-01-09 21:47:46');

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
  `tgl_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alamat_pengiriman` varchar(255) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `status_order` varchar(20) DEFAULT 'belum dibayar',
  `status_konfirmasi` varchar(20) DEFAULT 'pending',
  `status_diterima` varchar(20) DEFAULT 'belum',
  `kurir_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pelanggan_id`, `tgl_order`, `alamat_pengiriman`, `kota_id`, `status_order`, `status_konfirmasi`, `status_diterima`, `kurir_id`, `created_at`, `updated_at`) VALUES
(12, 5, '2019-01-29 06:32:57', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 3, '2019-01-28 23:32:57', '2019-01-28 23:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(10) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `produk_id`, `size`, `color`, `jumlah`) VALUES
(40, 12, 4, 'small', 'red', 1);

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
  `gambar` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `name`, `telpon`, `alamat`, `kota_id`, `email`, `gambar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'nhia', '23423423234244', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru jambi', 1, 'nhia@nhia.com', NULL, '$2y$10$9zGlVDjjVbOyKANXmI9nR.1vLyMLIFmnKTvh8OS1FyjcFB2DThXIK', 'y7dyENyLZHaZjDJXphOCSgTOUrr4ruTApqYv9pv59TiepljLpTbfxD4gJ2Rw', '2019-01-28 17:58:49', '2019-01-28 17:58:49');

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
(4, 1, 2, 'ini baju batik 2', 'ini deskripsinyaa', 500000, -10, 1, 'cp.png', 'yg ini.png', 10, 1, '2019-01-28 17:51:00', '2019-01-28 17:52:07', '2019-01-28 23:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `resis`
--

CREATE TABLE `resis` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `resi` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resis`
--

INSERT INTO `resis` (`id`, `order_id`, `resi`, `created_at`, `updated_at`) VALUES
(3, 13, '5464646546465465454565', '2019-01-13 19:31:15', '2019-01-13 19:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_produks`
--

CREATE TABLE `ukuran_produks` (
  `id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stok` int(11) DEFAULT '0',
  `terjual` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran_produks`
--

INSERT INTO `ukuran_produks` (`id`, `produk_id`, `ukuran`, `stok`, `terjual`, `created_at`, `updated_at`) VALUES
(13, 4, 'small', 0, 10, '2019-01-28 17:52:07', '2019-01-28 23:51:20'),
(14, 4, 'medium', 0, 0, '2019-01-28 17:52:07', '2019-01-28 17:52:33'),
(15, 4, 'large', 0, 0, '2019-01-28 17:52:07', '2019-01-28 17:52:33'),
(16, 4, 'xtra large', 15, 0, '2019-01-28 17:52:07', '2019-01-28 17:52:33');

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
-- Indexes for table `bank_payments`
--
ALTER TABLE `bank_payments`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `banks_konfirmasis` (`bank_id`),
  ADD KEY `konfirmasis_orders` (`order_id`),
  ADD KEY `konfirmasis_pelanggans` (`pelanggan_id`);

--
-- Indexes for table `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_kotas` (`kota_id`),
  ADD KEY `orders_kurirs` (`kurir_id`),
  ADD KEY `orders_pelanggans` (`pelanggan_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `order_temps`
--
ALTER TABLE `order_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_bahan_id` (`jenis_bahan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `resis`
--
ALTER TABLE `resis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resis_ibfk_1` (`order_id`);

--
-- Indexes for table `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `produk_id` (`produk_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_payments`
--
ALTER TABLE `bank_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `order_temps`
--
ALTER TABLE `order_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resis`
--
ALTER TABLE `resis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konfirmasis`
--
ALTER TABLE `konfirmasis`
  ADD CONSTRAINT `banks_konfirmasis` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasis_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasis_pelanggans` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_kotas` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_kurirs` FOREIGN KEY (`kurir_id`) REFERENCES `kurirs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_pelanggans` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`);

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_ibfk_1` FOREIGN KEY (`jenis_bahan_id`) REFERENCES `jenis_bahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produks_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resis`
--
ALTER TABLE `resis`
  ADD CONSTRAINT `resis_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  ADD CONSTRAINT `ukuran_produks_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasans_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
