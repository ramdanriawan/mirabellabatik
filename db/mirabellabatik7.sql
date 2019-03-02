-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2019 pada 06.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

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
-- Struktur dari tabel `admins`
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
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `gambar`, `password`, `created_at`, `updated_at`) VALUES
(1, 'NHIA NOVI', 'admin', 'admin.png', '$2y$10$mS72KGtHj5IV/wAmVmQV3OXNquv9m7eCHIjIH2lmEyaUiOF.CrVq6', '2019-01-03 22:23:49', '2019-01-28 23:37:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banks`
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
-- Dumping data untuk tabel `banks`
--

INSERT INTO `banks` (`id`, `no_rek`, `nama_bank`, `atas_nama`, `created_at`, `updated_at`) VALUES
(5, '234234', 'bri', 'nhua2', '2019-01-28 17:36:07', '2019-01-28 17:37:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_payments`
--

CREATE TABLE `bank_payments` (
  `id` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank_payments`
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
-- Struktur dari tabel `jenis_bahans`
--

CREATE TABLE `jenis_bahans` (
  `id` int(11) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_bahans`
--

INSERT INTO `jenis_bahans` (`id`, `nama_bahan`, `created_at`, `updated_at`) VALUES
(2, 'Kain Katun', '2019-01-04 20:02:21', '2019-01-04 20:35:37'),
(4, 'kain mori', '2019-01-30 03:27:36', '2019-01-30 03:27:36'),
(5, 'kain sutera', '2019-01-30 03:27:56', '2019-01-30 03:27:56'),
(6, 'Suteran tulis', '2019-02-22 05:46:17', '2019-02-22 05:46:17'),
(7, 'katun tulis', '2019-02-22 05:46:26', '2019-02-22 05:46:26'),
(8, 'ATBM', '2019-02-22 05:46:42', '2019-02-22 05:46:42'),
(9, 'semi sutera', '2019-02-22 05:46:56', '2019-02-22 05:46:56'),
(10, 'katun biasa', '2019-02-22 06:56:15', '2019-02-22 06:56:15'),
(11, 'sutra biasa', '2019-02-22 06:56:27', '2019-02-22 06:56:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `jenis_kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `jenis_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Wearpack Batik', '2019-01-04 19:28:49', '2019-01-04 20:08:56'),
(4, 'Batik Jambi', '2019-01-30 03:32:35', '2019-01-30 03:32:35'),
(5, 'Batik Jawa', '2019-01-30 03:32:45', '2019-01-30 03:32:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasis`
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
-- Dumping data untuk tabel `konfirmasis`
--

INSERT INTO `konfirmasis` (`id`, `order_id`, `pelanggan_id`, `bank_id`, `nama_pengirim`, `rek_pengirim`, `tggl_konfirmasi`, `bukti_transfer`, `created_at`, `updated_at`) VALUES
(6, 12, 5, 5, 'serah lu dah', '3453535234234', '2019-01-29 06:33:44', 'yg ini.png', '2019-01-28 23:33:44', '2019-01-28 23:33:44'),
(7, 13, 6, 5, 'noviyanti', '3244674365747845', '2019-01-30 16:10:54', 'qq.png', '2019-01-30 09:10:54', '2019-01-30 09:10:54'),
(8, 14, 6, 5, 'nhia', '123456789045678', '2019-02-20 17:29:43', 'waterfall.png', '2019-02-20 10:29:43', '2019-02-20 10:29:43'),
(9, 15, 6, 5, 'sdfghjk', '1234567894567', '2019-02-20 17:39:25', 'qq.png', '2019-02-20 10:39:25', '2019-02-20 10:39:25'),
(10, 17, 6, 5, 'Saridania', '01010254634878499', '2019-02-22 16:50:40', '6.jpg', '2019-02-22 09:50:40', '2019-02-22 09:50:40'),
(11, 18, 6, 5, 'ramdani', '4232656437', '2019-02-22 17:31:57', '8.jpg', '2019-02-22 10:31:57', '2019-02-22 10:31:57'),
(12, 19, 7, 5, 'Luna Miska', '222233334444111', '2019-02-22 21:37:55', '10.jpg', '2019-02-22 14:37:55', '2019-02-22 14:37:55'),
(13, 21, 7, 5, 'mulyadi', '54384558900765', '2019-02-22 22:40:49', '7.jpg', '2019-02-22 15:40:49', '2019-02-22 15:40:49'),
(14, 22, 7, 5, 'mualim', '675546796532457', '2019-02-22 22:46:43', '11.jpg', '2019-02-22 15:46:43', '2019-02-22 15:46:43'),
(15, 23, 7, 5, 'noviyanti', '765432147680', '2019-02-22 22:53:40', '8.jpg', '2019-02-22 15:53:40', '2019-02-22 15:53:40'),
(16, 24, 7, 5, 'alisya', '4554478975442432', '2019-02-23 06:45:06', '16.jpg', '2019-02-22 23:45:06', '2019-02-22 23:45:06'),
(17, 25, 7, 5, 'Budi', '98376535638777', '2019-02-23 06:48:36', '10.jpg', '2019-02-22 23:48:36', '2019-02-22 23:48:36'),
(18, 26, 7, 5, 'noviyanti', '46768484373', '2019-02-23 09:01:10', '10.jpg', '2019-02-23 02:01:10', '2019-02-23 02:01:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotas`
--

CREATE TABLE `kotas` (
  `id` int(6) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kotas`
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
-- Struktur dari tabel `kurirs`
--

CREATE TABLE `kurirs` (
  `id` int(11) NOT NULL,
  `nama_kurir` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kurirs`
--

INSERT INTO `kurirs` (`id`, `nama_kurir`, `created_at`, `updated_at`) VALUES
(1, 'jne', '2019-01-09 21:47:46', '2019-01-09 21:47:46'),
(2, 'tiki', '2019-01-09 21:47:46', '2019-01-09 21:47:46'),
(3, 'wahana', '2019-01-09 21:47:46', '2019-01-09 21:47:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `judul` varchar(20) NOT NULL,
  `isi_laporan` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
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
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `pelanggan_id`, `tgl_order`, `alamat_pengiriman`, `kota_id`, `status_order`, `status_konfirmasi`, `status_diterima`, `kurir_id`, `created_at`, `updated_at`) VALUES
(12, 5, '2019-01-29 06:32:57', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 3, '2019-01-28 23:32:57', '2019-01-28 23:51:20'),
(13, 6, '2019-01-29 15:42:24', 'Jl kol abunjani Sipin jambi, kecamatan danau sipin', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-01-29 08:42:24', '2019-02-22 10:01:43'),
(14, 6, '2019-02-20 17:28:15', 'Jl kol abunjani Sipin jambi, kecamatan danau sipin', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-20 10:28:15', '2019-02-20 10:31:40'),
(15, 6, '2019-02-20 17:37:53', 'sfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdfsfdsfsfsfssdf', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-20 10:37:53', '2019-02-20 10:40:37'),
(17, 6, '2019-02-22 16:44:29', 'Jl kol abunjani Sipin jambi, kecamatan danau sipin', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-22 09:44:29', '2019-02-22 10:27:03'),
(18, 6, '2019-02-22 17:29:21', 'Jl kol abunjani Sipin jambi, kecamatan danau sipin', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-22 10:29:21', '2019-02-22 10:33:37'),
(19, 7, '2019-02-22 21:32:20', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-22 14:32:20', '2019-02-22 14:39:11'),
(21, 7, '2019-02-22 22:39:49', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-22 15:39:49', '2019-02-22 15:41:39'),
(22, 7, '2019-02-22 22:44:30', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 2, '2019-02-22 15:44:30', '2019-02-22 15:47:18'),
(23, 7, '2019-02-22 22:52:22', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 3, '2019-02-22 15:52:22', '2019-02-22 15:54:44'),
(24, 7, '2019-02-23 06:43:49', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 2, '2019-02-22 23:43:49', '2019-02-22 23:46:53'),
(25, 7, '2019-02-23 06:47:32', 'Jl. abdul manaf, thehok -jambi', 1, 'sudah dibayar', 'disetujui', 'sudah', 1, '2019-02-22 23:47:32', '2019-02-22 23:50:30'),
(26, 7, '2019-02-23 08:22:24', 'Jl. abdul manaf, thehok -jambi', 1, 'belum dibayar', 'menunggu persetujuan', 'belum', 1, '2019-02-23 01:22:24', '2019-02-23 02:01:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
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
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `produk_id`, `size`, `color`, `jumlah`) VALUES
(44, 15, 7, 'xtra large', 'green', 9),
(48, 17, 19, 'small', 'red', 2),
(49, 18, 7, 'large', 'red', 4),
(50, 18, 11, 'large', 'green', 6),
(51, 19, 19, 'small', 'yellow', 8),
(52, 19, 15, 'small', 'blue', 7),
(53, 19, 7, 'large', 'green', 3),
(54, 19, 12, 'small', 'red', 4),
(55, 19, 14, 'small', 'red', 4),
(57, 21, 15, 'medium', 'red', 3),
(58, 22, 16, 'medium', 'blue', 4),
(59, 22, 23, 'small', 'green', 3),
(60, 23, 18, 'medium', 'green', 5),
(61, 24, 13, 'small', 'red', 4),
(62, 25, 16, 'small', 'red', 5),
(63, 26, 7, 'small', 'red', 2),
(64, 26, 7, 'medium', 'blue', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_temps`
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
-- Struktur dari tabel `pelanggans`
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
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `name`, `telpon`, `alamat`, `kota_id`, `email`, `gambar`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'nhia', '23423423234244', 'jl. h. ibrahim rt 19 no 94 kel. rawasari kec. kota baru jambi', 1, 'nhia@nhia.com', NULL, '$2y$10$9zGlVDjjVbOyKANXmI9nR.1vLyMLIFmnKTvh8OS1FyjcFB2DThXIK', 'y7dyENyLZHaZjDJXphOCSgTOUrr4ruTApqYv9pv59TiepljLpTbfxD4gJ2Rw', '2019-01-28 17:58:49', '2019-01-28 17:58:49'),
(6, 'Noviyania', '085268240657', 'Jl kol abunjani Sipin jambi, kecamatan danau sipin', 1, 'nianovi@gmail.com', 'dsh.jpg', '$2y$10$7hJZYFjqcVXIzDHSYtyJge0iBr/2nghcM1cs0fCJmacg1KWhCZ4Zi', 'vRPAoZrcMD6fRS9oAu7E4cQ4fCVYOKFfcdnrwhdfrhvcCTVjG3HZD5upoiBb', '2019-01-29 07:38:16', '2019-02-22 09:55:19'),
(7, 'Luna Miska', '085623454180', 'Jl. abdul manaf, thehok -jambi', 1, 'lunamiska12@gmail.com', 'PhotoGrid_1517326527215.jpg', '$2y$10$oj3isvjYTFhSDtfVsLZptuHZZsmDApRccr8suQKjd8VxcGkcqC2Ui', 'eaOrH6U29Mwp1H9rvHBzjQ5RPezck6F7D2XceA9SZKbBmWp2X8PHLI1RFqRS', '2019-02-22 14:28:51', '2019-02-22 14:36:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
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
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `jenis_bahan_id`, `nama_produk`, `deskripsi`, `harga`, `stok`, `berat`, `gambar`, `gambar_belakang`, `dibeli`, `diskon`, `tggl_masuk`, `created_at`, `updated_at`) VALUES
(7, 1, 2, 'Batik pasangan', 'asdas dasd as', 400000, 36, 5, 'IMG20190111133503-min.jpg', 'IMG20190111133504-min.jpg', 16, 2, '2019-01-29 08:15:00', '2019-01-29 08:29:15', '2019-02-22 15:06:44'),
(9, 1, 2, 'Batk Bunga', 'Batk Bunga', 120000, 50, 2, 'IMG20190111135434-min.jpg', 'Nhia.jpg', 0, 20, '2019-02-22 06:00:00', '2019-02-22 06:01:17', '2019-02-22 07:00:59'),
(10, 4, 6, 'batik angso duo', 'sedikit panas', 100000, 55, 1, 'IMG20190111133612-min.jpg', 'ww.jpg', 0, 20, '2019-02-22 06:01:00', '2019-02-22 06:07:18', '2019-02-22 06:07:18'),
(11, 5, 8, 'baju batik laki-laki', 'kainnya licin, dan mengkilat', 100000, 35, 1, 'Bat - Copy.jpg', 'Bat.jpg', 6, 2, '2019-02-22 06:07:00', '2019-02-22 06:23:46', '2019-02-22 10:33:38'),
(12, 4, 11, 'Batik wanita', 'bahan dingin', 180000, 26, 1, '20190111_134735-1-min - Copy.jpg', '20190111_134735-1-min.jpg', 4, 15, '2019-02-22 06:56:00', '2019-02-22 06:58:43', '2019-02-22 14:39:12'),
(13, 5, 9, 'Batik bunga teratai', 'Bahan dingin dan tidak mudah kusut', 100000, 59, 1, '20190111_134735-2-min.jpg', '20190111_134735-2-min - Copy.jpg', 4, 15, '2019-02-22 07:02:00', '2019-02-22 07:04:35', '2019-02-22 23:46:53'),
(14, 1, 2, 'Batik cantik', 'Batik wanita', 180000, 16, 1, '20190111_134801-2-min - Copy.jpg', '20190111_134801-2-min.jpg', 4, 10, '2019-02-22 07:11:00', '2019-02-22 07:12:32', '2019-02-22 14:39:12'),
(15, 4, 5, 'batik jomblo', 'bahan nya dingin', 130000, 67, 1, 'Tenun 350-min - Copy.jpg', 'Tenun 350-min.jpg', 10, 15, '2019-02-22 07:19:00', '2019-02-22 07:20:53', '2019-02-22 15:41:39'),
(16, 4, 9, 'batik cchantik', 'tidak luntur', 150000, 51, 1, '20190111_134801-1-min - Copy.jpg', '20190111_134801-1-min.jpg', 9, 10, '2019-02-22 07:20:00', '2019-02-22 07:22:44', '2019-02-22 23:50:30'),
(17, 1, 2, 'Batik kalem', 'bahan dingin', 120000, 40, 1, '20190111_134751-1-min - Copy.jpg', '20190111_134751-1-min.jpg', 0, 15, '2019-02-22 07:22:00', '2019-02-22 08:12:36', '2019-02-22 08:12:36'),
(18, 1, 2, 'Batik chantiik', 'Batik wanita', 98000, 72, 1, '20190111_134742-2-min - Copy.jpg', '20190111_134742-2-min.jpg', 5, 20, '2019-02-22 08:15:00', '2019-02-22 08:15:42', '2019-02-22 15:54:44'),
(19, 4, 5, 'baju cantikk', 'baju adem', 100000, 70, 1, '20190111_135202-min - Copy.jpg', '20190111_135202-min.jpg', 10, 20, '2019-02-22 08:15:00', '2019-02-22 08:18:53', '2019-02-22 14:39:12'),
(20, 1, 10, 'Batik kekinian', 'kalem simple', 100000, 74, 1, '20190111_135153-min - Copy.jpg', '20190111_135153-min.jpg', 0, 12, '2019-02-22 08:18:00', '2019-02-22 08:26:43', '2019-02-22 08:26:43'),
(21, 1, 2, 'Batik kekinian banget', 'Batik wanita', 110000, 48, 1, 'IMG20190111135314-min - Copy.jpg', 'IMG20190111135314-min.jpg', 0, 15, '2019-02-22 08:30:00', '2019-02-22 08:32:41', '2019-02-22 08:32:41'),
(22, 4, 8, 'tenun', 'Mahal oi', 1800000, 48, 1, '20190111_134742-1-min - Copy.jpg', '20190111_134742-1-min.jpg', 0, 25, '2019-02-22 08:32:00', '2019-02-22 08:34:38', '2019-02-22 08:34:38'),
(23, 5, 10, 'Batik biasa', 'Baju remaja', 89000, 89, 1, 'Couple 450... bahan sanwos-min - Copy.jpg', 'Couple 450... bahan sanwos-min.jpg', 3, 2, '2019-02-22 08:34:00', '2019-02-22 08:36:42', '2019-02-22 15:47:18'),
(24, 4, 10, 'batik tradisional jambi', 'cocok untuk orang tua', 190000, 70, 1, 'Btik l - Copy.jpg', 'Btik l.jpg', 0, 10, '2019-02-22 08:36:00', '2019-02-22 08:41:26', '2019-02-22 08:41:26'),
(25, 5, 7, 'baju batik ala ala', 'tidak luntur', 100000, 48, 1, '20190111_135241-min - Copy.jpg', '20190111_135241-min.jpg', 0, 10, '2019-02-22 08:41:00', '2019-02-22 08:51:52', '2019-02-22 08:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resis`
--

CREATE TABLE `resis` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `resi` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `resis`
--

INSERT INTO `resis` (`id`, `order_id`, `resi`, `created_at`, `updated_at`) VALUES
(3, 13, '5464646546465465454565', '2019-01-13 19:31:15', '2019-01-13 19:31:15'),
(4, 14, '12345678912345678', '2019-02-20 10:31:14', '2019-02-20 10:31:14'),
(5, 15, '234561234567', '2019-02-20 10:40:26', '2019-02-20 10:40:26'),
(6, 17, '1635673465737', '2019-02-22 09:53:32', '2019-02-22 09:53:32'),
(7, 18, '9990000999000', '2019-02-22 10:33:14', '2019-02-22 10:33:14'),
(8, 19, '9087543246', '2019-02-22 14:38:49', '2019-02-22 14:38:49'),
(9, 21, '00999776553', '2019-02-22 15:41:29', '2019-02-22 15:41:29'),
(10, 23, '8760998776434', '2019-02-22 15:54:27', '2019-02-22 15:54:27'),
(11, 24, '762354627452627', '2019-02-22 23:46:28', '2019-02-22 23:46:28'),
(12, 25, '865342324568989', '2019-02-22 23:50:05', '2019-02-22 23:50:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran_produks`
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
-- Dumping data untuk tabel `ukuran_produks`
--

INSERT INTO `ukuran_produks` (`id`, `produk_id`, `ukuran`, `stok`, `terjual`, `created_at`, `updated_at`) VALUES
(25, 7, 'small', 9, 0, '2019-01-29 08:29:15', '2019-02-22 15:06:44'),
(26, 7, 'medium', 9, 0, '2019-01-29 08:29:15', '2019-02-22 15:06:44'),
(27, 7, 'large', 9, 7, '2019-01-29 08:29:15', '2019-02-22 15:06:44'),
(28, 7, 'xtra large', 9, 9, '2019-01-29 08:29:15', '2019-02-22 15:06:44'),
(33, 9, 'small', 16, 0, '2019-02-22 06:01:18', '2019-02-22 07:00:59'),
(34, 9, 'medium', 20, 0, '2019-02-22 06:01:18', '2019-02-22 07:00:59'),
(35, 9, 'large', 20, 0, '2019-02-22 06:01:18', '2019-02-22 07:00:59'),
(36, 9, 'xtra large', 6, 0, '2019-02-22 06:01:18', '2019-02-22 07:00:59'),
(37, 10, 'small', 14, 0, '2019-02-22 06:07:18', '2019-02-22 06:07:18'),
(38, 10, 'medium', 10, 0, '2019-02-22 06:07:18', '2019-02-22 06:07:18'),
(39, 10, 'large', 15, 0, '2019-02-22 06:07:18', '2019-02-22 06:07:18'),
(40, 10, 'xtra large', 16, 0, '2019-02-22 06:07:18', '2019-02-22 06:07:18'),
(41, 11, 'small', 13, 0, '2019-02-22 06:23:46', '2019-02-22 06:25:17'),
(42, 11, 'medium', 15, 0, '2019-02-22 06:23:46', '2019-02-22 06:25:17'),
(43, 11, 'large', 11, 6, '2019-02-22 06:23:46', '2019-02-22 10:33:38'),
(44, 11, 'xtra large', 18, 0, '2019-02-22 06:23:46', '2019-02-22 06:25:17'),
(45, 12, 'small', 1, 4, '2019-02-22 06:58:43', '2019-02-22 14:39:12'),
(46, 12, 'medium', 4, 0, '2019-02-22 06:58:43', '2019-02-22 06:58:43'),
(47, 12, 'large', 11, 0, '2019-02-22 06:58:43', '2019-02-22 06:58:43'),
(48, 12, 'xtra large', 10, 0, '2019-02-22 06:58:43', '2019-02-22 06:58:43'),
(49, 13, 'small', 11, 4, '2019-02-22 07:04:35', '2019-02-22 23:46:53'),
(50, 13, 'medium', 15, 0, '2019-02-22 07:04:35', '2019-02-22 07:04:35'),
(51, 13, 'large', 17, 0, '2019-02-22 07:04:35', '2019-02-22 07:04:35'),
(52, 13, 'xtra large', 16, 0, '2019-02-22 07:04:35', '2019-02-22 07:04:35'),
(53, 14, 'small', 2, 4, '2019-02-22 07:12:32', '2019-02-22 14:39:12'),
(54, 14, 'medium', 5, 0, '2019-02-22 07:12:32', '2019-02-22 07:12:32'),
(55, 14, 'large', 4, 0, '2019-02-22 07:12:32', '2019-02-22 07:12:32'),
(56, 14, 'xtra large', 5, 0, '2019-02-22 07:12:32', '2019-02-22 07:12:32'),
(57, 15, 'small', 10, 7, '2019-02-22 07:20:53', '2019-02-22 14:39:12'),
(58, 15, 'medium', 17, 3, '2019-02-22 07:20:54', '2019-02-22 15:41:39'),
(59, 15, 'large', 20, 0, '2019-02-22 07:20:54', '2019-02-22 07:20:54'),
(60, 15, 'xtra large', 20, 0, '2019-02-22 07:20:54', '2019-02-22 07:20:54'),
(61, 16, 'small', 10, 5, '2019-02-22 07:22:44', '2019-02-22 23:50:30'),
(62, 16, 'medium', 11, 4, '2019-02-22 07:22:44', '2019-02-22 15:47:18'),
(63, 16, 'large', 15, 0, '2019-02-22 07:22:44', '2019-02-22 07:22:44'),
(64, 16, 'xtra large', 15, 0, '2019-02-22 07:22:44', '2019-02-22 07:22:44'),
(65, 17, 'small', 10, 0, '2019-02-22 08:12:36', '2019-02-22 08:12:36'),
(66, 17, 'medium', 10, 0, '2019-02-22 08:12:36', '2019-02-22 08:12:36'),
(67, 17, 'large', 10, 0, '2019-02-22 08:12:36', '2019-02-22 08:12:36'),
(68, 17, 'xtra large', 10, 0, '2019-02-22 08:12:36', '2019-02-22 08:12:36'),
(69, 18, 'small', 17, 0, '2019-02-22 08:15:42', '2019-02-22 08:15:42'),
(70, 18, 'medium', 15, 5, '2019-02-22 08:15:43', '2019-02-22 15:54:44'),
(71, 18, 'large', 20, 0, '2019-02-22 08:15:43', '2019-02-22 08:15:43'),
(72, 18, 'xtra large', 20, 0, '2019-02-22 08:15:43', '2019-02-22 08:15:43'),
(73, 19, 'small', 10, 10, '2019-02-22 08:18:53', '2019-02-22 14:39:12'),
(74, 19, 'medium', 20, 0, '2019-02-22 08:18:53', '2019-02-22 08:18:53'),
(75, 19, 'large', 20, 0, '2019-02-22 08:18:53', '2019-02-22 08:18:53'),
(76, 19, 'xtra large', 20, 0, '2019-02-22 08:18:53', '2019-02-22 08:18:53'),
(77, 20, 'small', 15, 0, '2019-02-22 08:26:43', '2019-02-22 08:26:43'),
(78, 20, 'medium', 15, 0, '2019-02-22 08:26:43', '2019-02-22 08:26:43'),
(79, 20, 'large', 15, 0, '2019-02-22 08:26:43', '2019-02-22 08:26:43'),
(80, 20, 'xtra large', 29, 0, '2019-02-22 08:26:43', '2019-02-22 08:26:43'),
(81, 21, 'small', 12, 0, '2019-02-22 08:32:41', '2019-02-22 08:32:41'),
(82, 21, 'medium', 12, 0, '2019-02-22 08:32:41', '2019-02-22 08:32:41'),
(83, 21, 'large', 12, 0, '2019-02-22 08:32:41', '2019-02-22 08:32:41'),
(84, 21, 'xtra large', 12, 0, '2019-02-22 08:32:41', '2019-02-22 08:32:41'),
(85, 22, 'small', 12, 0, '2019-02-22 08:34:38', '2019-02-22 08:34:38'),
(86, 22, 'medium', 12, 0, '2019-02-22 08:34:38', '2019-02-22 08:34:38'),
(87, 22, 'large', 12, 0, '2019-02-22 08:34:38', '2019-02-22 08:34:38'),
(88, 22, 'xtra large', 12, 0, '2019-02-22 08:34:38', '2019-02-22 08:34:38'),
(89, 23, 'small', 20, 3, '2019-02-22 08:36:43', '2019-02-22 15:47:18'),
(90, 23, 'medium', 23, 0, '2019-02-22 08:36:43', '2019-02-22 08:36:43'),
(91, 23, 'large', 23, 0, '2019-02-22 08:36:43', '2019-02-22 08:36:43'),
(92, 23, 'xtra large', 23, 0, '2019-02-22 08:36:43', '2019-02-22 08:36:43'),
(93, 24, 'small', 10, 0, '2019-02-22 08:41:26', '2019-02-22 08:41:26'),
(94, 24, 'medium', 10, 0, '2019-02-22 08:41:26', '2019-02-22 08:41:26'),
(95, 24, 'large', 30, 0, '2019-02-22 08:41:27', '2019-02-22 08:41:27'),
(96, 24, 'xtra large', 20, 0, '2019-02-22 08:41:27', '2019-02-22 08:41:27'),
(97, 25, 'small', 12, 0, '2019-02-22 08:51:52', '2019-02-22 08:51:52'),
(98, 25, 'medium', 12, 0, '2019-02-22 08:51:52', '2019-02-22 08:51:52'),
(99, 25, 'large', 12, 0, '2019-02-22 08:51:52', '2019-02-22 08:51:52'),
(100, 25, 'xtra large', 12, 0, '2019-02-22 08:51:52', '2019-02-22 08:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasans`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramdan riawan', 'ramdanriawan3@gmail.com', NULL, '$2y$10$ejq78EmoedhUVxPajSXUA.vuIswm.TwO/UftM1EQsH8zHIFPlS0Ym', NULL, '2019-01-03 01:32:51', '2019-01-03 01:32:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bank_payments`
--
ALTER TABLE `bank_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfirmasis`
--
ALTER TABLE `konfirmasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banks_konfirmasis` (`bank_id`),
  ADD KEY `konfirmasis_orders` (`order_id`),
  ADD KEY `konfirmasis_pelanggans` (`pelanggan_id`);

--
-- Indeks untuk tabel `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_kotas` (`kota_id`),
  ADD KEY `orders_kurirs` (`kurir_id`),
  ADD KEY `orders_pelanggans` (`pelanggan_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `order_temps`
--
ALTER TABLE `order_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_bahan_id` (`jenis_bahan_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `resis`
--
ALTER TABLE `resis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resis_ibfk_1` (`order_id`);

--
-- Indeks untuk tabel `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bank_payments`
--
ALTER TABLE `bank_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jenis_bahans`
--
ALTER TABLE `jenis_bahans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konfirmasis`
--
ALTER TABLE `konfirmasis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `order_temps`
--
ALTER TABLE `order_temps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `resis`
--
ALTER TABLE `resis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konfirmasis`
--
ALTER TABLE `konfirmasis`
  ADD CONSTRAINT `banks_konfirmasis` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasis_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konfirmasis_pelanggans` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_kotas` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_kurirs` FOREIGN KEY (`kurir_id`) REFERENCES `kurirs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_pelanggans` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD CONSTRAINT `pelanggans_ibfk_1` FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`);

--
-- Ketidakleluasaan untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_ibfk_1` FOREIGN KEY (`jenis_bahan_id`) REFERENCES `jenis_bahans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produks_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ukuran_produks`
--
ALTER TABLE `ukuran_produks`
  ADD CONSTRAINT `ukuran_produks_ibfk_1` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
