-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2019 at 01:57 AM
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
(1, 'ramdan riawan', 'admin', 'admin.png', '$2y$10$9wsBR19PvZHXjQo1PmFKe..J1Xkql8kv7I6U9YbeaZM4N1HnKxVFK', '2019-01-03 22:23:49', '2019-01-12 18:16:24');

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
(1, '563201026697355', 'BRI', 'Ramdan Riawan', '2019-01-05 08:30:50', '2019-01-05 08:30:50'),
(2, '563201026697356', 'BRI', 'Ramdan Riawan 2', '2019-01-05 08:30:50', '2019-01-05 08:30:50');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasis`
--

INSERT INTO `konfirmasis` (`id`, `order_id`, `pelanggan_id`, `bank_id`, `nama_pengirim`, `rek_pengirim`, `tggl_konfirmasi`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(14, 17, 2, 1, 'serah lu dah', '15464646', '2019-01-14 02:27:05', 'ayah.jpg', '2019-01-13 19:27:05', '2019-01-13 19:27:05');

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
(10, 2, '2019-01-10 10:13:55', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-01-10 03:13:55', '2019-01-11 00:15:47'),
(11, 2, '2019-01-10 17:12:40', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 2, '2019-01-10 10:12:40', '2019-01-11 00:55:54'),
(13, 2, '2019-01-10 17:18:01', 'dimana mana hatiku senanglah pokoknya', 1, 'sudah dibayar', 'disetujui', 'belum', 1, '2019-01-10 10:18:01', '2019-01-12 08:31:22'),
(15, 2, '2019-01-10 18:07:22', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 3, '2019-01-10 11:07:22', '2019-01-13 19:17:19'),
(17, 2, '2019-01-14 02:26:30', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 3, '2019-01-13 19:26:30', '2019-01-13 19:29:40');

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
(3, 10, 11, 'm', 'red', 7),
(4, 10, 11, 's', 'red', 2),
(5, 10, 11, 'm', 'yellow', 4),
(6, 11, 11, 'm', 'red', 1),
(10, 13, 23, 'small', 'green', 2),
(12, 15, 11, 's', 'red', 6),
(13, 15, 11, 'xl', 'red', 2),
(14, 15, 40, 'large', 'red', 1),
(16, 17, 40, 'large', 'red', 1);

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
(2, 'ramdan', '082282692489', 'jl. h. ibrahim rt 19 no 94. kel. rawasari kec. kota baru jambi', 1, 'ramdanriawan3@gmail.com', 'gihon.jpg', '$2y$10$wbG1kOHecunO5et/7TfKzuDB.k0uzRKU3SCMiPCBA0/HKkI1Al8Yy', '8zOEuMKw1eoVzPdgK4YbQq3NyyhKqYgYDXF6N76W336GtaYbUJmSbJPb6tTw', '2019-01-03 10:12:00', '2019-01-14 00:08:39'),
(3, 'riawan', '082282692481', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru kota jambi', 1, 'ramdanriawan4@gmail.com', '', '$2y$10$LYe37z/QxfgqatjF/6kSzulXo3.E4Qovy9PLMcrbdUd6zZSM9BnL2', NULL, '2019-01-05 07:20:52', '2019-01-05 07:20:52'),
(4, 'ramdan riawan', '082282692482', 'dimana mana hatiku senang', 1, 'admin@admin.com', '', '$2y$10$/yC50bfqF1SZMdbSUYoc1OAcnEJ8vJjsmrp8Af4HyeNDk80f1YlEm', NULL, '2019-01-05 07:21:50', '2019-01-05 07:21:50');

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
(11, 2, 1, 'abaju batik 1', 'ini baju batik terkeren sepanjang sejarah', 10000, 90, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 9, 20, '2019-02-01 00:00:00', '2019-01-06 10:47:04', '2019-01-13 19:17:20'),
(13, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 11000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-03-08 00:00:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(15, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 12000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-02-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(17, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 13000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(19, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 14000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(21, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 15000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(23, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 16000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(25, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 17000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(27, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 18000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(28, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 19000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(29, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 20000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(30, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 21000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(31, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 22000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(32, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 23000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(33, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 24000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(34, 1, 1, 'baju batik 1', 'ini baju batik terkeren sepanjang sejarah', 25000, 100, 1, 'bajubatik1.jpg', 'bajubatik2.jpg', 0, 10, '2019-01-06 10:45:00', '2019-01-06 10:47:04', '2019-01-06 10:47:04'),
(35, 1, 1, 'baju batik khas jambi', 'baju batik khas jambi', 10000, 0, 1, 'pekerjaan kelompok titi.png', 'yg ini.png', 0, 0, '2019-01-13 17:56:00', '2019-01-13 17:57:34', '2019-01-13 17:57:34'),
(36, 1, 1, 'baju anak kecil kece', 'baju anak kecil kece', 10000, 0, 1, 'img002.jpg', 'img003.jpg', 0, 0, '2019-01-13 18:14:00', '2019-01-13 18:14:27', '2019-01-13 18:14:27'),
(37, 1, 1, 'baju anak kecil kece 2', 'baju anak kecil kece', 10000, 0, 1, 'img014.jpg', 'img017.jpg', 0, 0, '2019-01-13 18:15:00', '2019-01-13 18:15:34', '2019-01-13 18:15:34'),
(38, 1, 1, 'baju lalala', 'jangna pilih apapun disini', 100000, 0, 1, 'stikom.jpg', 'ramdanriawan.jpg', 0, 0, '2019-01-13 18:16:00', '2019-01-13 18:18:16', '2019-01-13 18:18:16'),
(39, 1, 1, 'sdfsdfsfsdfsdfsdf', 'sdfsdfsfsdfsdfsdf', 56464, 0, 1, 'angga.jpg', 'ayah.jpg', 0, 0, '2019-01-13 18:20:00', '2019-01-13 18:21:16', '2019-01-13 18:30:28'),
(40, 1, 1, 'sdfsdfsfsdfsdfsdfasdfsafsf', '5', 10000, 9, 4, 'riris.jpg', 'tiara.jpg', 2, 0, '2019-01-13 18:33:00', '2019-01-13 18:34:08', '2019-01-13 19:29:40');

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
(1, 10, '234234234234234', '2019-01-12 17:07:56', '2019-01-12 17:07:56'),
(2, 11, '234234234234', '2019-01-12 17:07:56', '2019-01-12 17:07:56'),
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
(1, 11, 'small', 10, 1, '2019-01-13 22:52:32', '2019-01-13 22:52:32'),
(2, 11, 'xl', -1, 3, '2019-01-13 22:52:32', '2019-01-13 19:17:20'),
(3, 11, 'medium', 0, 10, '2019-01-14 00:17:34', '2019-01-14 00:17:34'),
(4, 35, 'small', 0, 0, '2019-01-13 17:57:34', '2019-01-13 17:57:34'),
(5, 35, 'medium', 0, 0, '2019-01-13 17:57:34', '2019-01-13 17:57:34'),
(6, 35, 'large', 0, 0, '2019-01-13 17:57:34', '2019-01-13 17:57:34'),
(7, 35, 'xtra large', 0, 0, '2019-01-13 17:57:34', '2019-01-13 17:57:34'),
(8, 37, 'small', NULL, 0, '2019-01-13 18:15:34', '2019-01-13 18:15:34'),
(9, 37, 'medium', NULL, 0, '2019-01-13 18:15:34', '2019-01-13 18:15:34'),
(10, 37, 'large', NULL, 0, '2019-01-13 18:15:34', '2019-01-13 18:15:34'),
(11, 37, 'xtra large', NULL, 0, '2019-01-13 18:15:34', '2019-01-13 18:15:34'),
(12, 38, 'small', NULL, 0, '2019-01-13 18:18:16', '2019-01-13 18:18:16'),
(13, 38, 'medium', NULL, 0, '2019-01-13 18:18:16', '2019-01-13 18:18:16'),
(14, 38, 'large', NULL, 0, '2019-01-13 18:18:16', '2019-01-13 18:18:16'),
(15, 38, 'xtra large', NULL, 0, '2019-01-13 18:18:17', '2019-01-13 18:18:17'),
(16, 39, 'small', 6, 0, '2019-01-13 18:21:16', '2019-01-13 18:30:27'),
(17, 39, 'medium', 5, 0, '2019-01-13 18:21:16', '2019-01-13 18:30:27'),
(18, 39, 'large', 5, 0, '2019-01-13 18:21:16', '2019-01-13 18:30:28'),
(19, 39, 'xtra large', 6, 0, '2019-01-13 18:21:16', '2019-01-13 18:30:28'),
(20, 40, 'small', 0, 0, '2019-01-13 18:34:08', '2019-01-13 18:34:08'),
(21, 40, 'medium', 0, 0, '2019-01-13 18:34:08', '2019-01-13 18:34:08'),
(22, 40, 'large', 8, 2, '2019-01-13 18:34:08', '2019-01-13 19:29:40'),
(23, 40, 'xtra large', 1, 0, '2019-01-13 18:34:08', '2019-01-13 18:34:08');

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
(1, 2, 11, 'ini barangnya jelek banget smpah dah mending gak usah beli disini', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `resis`
--
ALTER TABLE `resis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank_payments`
--
ALTER TABLE `bank_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `konfirmasis`
--
ALTER TABLE `konfirmasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `resis`
--
ALTER TABLE `resis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
