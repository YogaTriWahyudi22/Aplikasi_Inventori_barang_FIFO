-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 06:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `id_alamat` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` bigint(20) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`id_alamat`, `username`, `nohp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 8123456, 'Kota Padang', NULL, NULL),
(2, 'pimpinan', 8123456, 'Kota Padang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_stok`
--

CREATE TABLE `histori_stok` (
  `id_histori_stok` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_ikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_awal` bigint(20) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histori_stok`
--

INSERT INTO `histori_stok` (`id_histori_stok`, `id_user`, `kode_ikan`, `stok_awal`, `stok`, `tanggal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'K001', 2, 0, '2021-08-20', 'Tambah Data', '2021-08-23 00:46:49', '2021-08-23 00:55:42'),
(2, 1, 'K001', 5, 4, '2021-08-20', 'Tambah Data', '2021-08-23 00:47:02', '2021-08-23 00:55:42'),
(3, 1, 'K002', 5, 5, '2021-08-24', 'Tambah Data', '2021-08-23 08:30:49', '2021-08-23 08:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `kelola_ikan`
--

CREATE TABLE `kelola_ikan` (
  `id_kelola_ikan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_ikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ikan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `harga_jual` bigint(20) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_expired` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelola_ikan`
--

INSERT INTO `kelola_ikan` (`id_kelola_ikan`, `id_user`, `kode_ikan`, `nama_ikan`, `harga_beli`, `harga_jual`, `tanggal_input`, `tanggal_expired`, `created_at`, `updated_at`) VALUES
(1, 1, 'K001', 'Ikan Nila', 50000, 114000, '2021-08-20', '2021-08-27', '2021-08-23 00:46:03', '2021-08-23 00:55:42'),
(2, 1, 'K002', 'ikan lele', 50000, 110000, '2021-08-30', '2021-08-22', '2021-08-23 08:30:26', '2021-08-23 08:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` bigint(20) UNSIGNED NOT NULL,
  `id_penjualan` bigint(20) NOT NULL,
  `id_pembayaran` bigint(20) NOT NULL,
  `id_stok` bigint(20) NOT NULL,
  `id_histori_stok` bigint(20) NOT NULL,
  `kode_ikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_penjualan`, `id_pembayaran`, `id_stok`, `id_histori_stok`, `kode_ikan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 'K001', '2021-08-23 00:55:42', '2021-08-23 00:55:42'),
(2, 1, 1, 1, 2, 'K001', '2021-08-23 00:55:42', '2021-08-23 00:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_21_043858_create_alamat_table', 1),
(5, '2021_08_21_044305_create_kelola_ikan_table', 1),
(6, '2021_08_21_061653_create_stok_ikan_table', 1),
(7, '2021_08_21_062043_create_histori_stok_table', 1),
(8, '2021_08_21_062828_create_penjualan_table', 1),
(9, '2021_08_21_063812_create_pembayaran_table', 1),
(10, '2021_08_23_043802_create_laporan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `tipe_pembayaran` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `tipe_pembayaran`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 'Pilih Pembayaran', 342000, '2021-08-23 00:55:42', '2021-08-23 00:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_stok` bigint(20) NOT NULL,
  `kode_ikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_jual` bigint(20) NOT NULL,
  `tanggal_jual` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_user`, `id_stok`, `kode_ikan`, `stok_jual`, `tanggal_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'K001', 3, '2021-08-23', '2021-08-23 00:55:42', '2021-08-23 00:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `stok_ikan`
--

CREATE TABLE `stok_ikan` (
  `id_stok` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `kode_ikan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` bigint(20) NOT NULL,
  `stok_awal` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_ikan`
--

INSERT INTO `stok_ikan` (`id_stok`, `id_user`, `kode_ikan`, `stok`, `stok_awal`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'K001', 4, 7, '2021-08-20', '2021-08-23 00:46:49', '2021-08-23 00:55:42'),
(2, 1, 'K002', 5, 5, '2021-08-24', '2021-08-23 08:30:49', '2021-08-23 08:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `foto`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '$2y$10$PmvIILr8YTaBGUK6tC7XkOJErEMj.tcxq.r4lj1ZTT5PZ/VD./DaO', 'admin.jpg', 'admin', NULL, NULL, NULL),
(2, 'Pimpinan', 'pimpinan', NULL, '$2y$10$zDOa3sFi4htrnfjYJG7zfOeXoyaUNlgGd6jUsV1u4v7Z12odXoAVi', 'admin.jpg', 'pimpinan', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histori_stok`
--
ALTER TABLE `histori_stok`
  ADD PRIMARY KEY (`id_histori_stok`);

--
-- Indexes for table `kelola_ikan`
--
ALTER TABLE `kelola_ikan`
  ADD PRIMARY KEY (`id_kelola_ikan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `stok_ikan`
--
ALTER TABLE `stok_ikan`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id_alamat` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histori_stok`
--
ALTER TABLE `histori_stok`
  MODIFY `id_histori_stok` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelola_ikan`
--
ALTER TABLE `kelola_ikan`
  MODIFY `id_kelola_ikan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_ikan`
--
ALTER TABLE `stok_ikan`
  MODIFY `id_stok` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
