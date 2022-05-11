-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 04:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_jersey`
--

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
-- Table structure for table `history_pesanans`
--

CREATE TABLE `history_pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `nameset` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ligas`
--

CREATE TABLE `ligas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `negara` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ligas`
--

INSERT INTO `ligas` (`id`, `nama`, `negara`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Bundes Liga', 'Jerman', 'bundesliga.png', NULL, NULL),
(2, 'Premiere League', 'Inggris', 'premierleague.png', NULL, NULL),
(3, 'La Liga', 'Spanyol', 'laliga.png', NULL, NULL),
(4, 'Serie A', 'Itali', 'seriea.png', NULL, NULL);

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_05_025509_create_ligas_table', 1),
(6, '2022_01_05_025848_create_products_table', 1),
(7, '2022_01_05_025916_create_pesanans_table', 1),
(8, '2022_01_26_044944_create_pesanan_details_table', 1),
(9, '2022_02_02_012144_create_wishlists_table', 1),
(10, '2022_02_22_020539_create_history_pesanans_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'auth_token', '1e6d0f68ef5d540e5b861451aa7cd4900294e42468a43e9885c471fee95bd8f5', '[\"*\"]', NULL, '2022-03-02 18:59:32', '2022-03-02 18:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_harga` int(11) NOT NULL,
  `kode_unik` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `kode_pemesanan`, `status`, `total_harga`, `kode_unik`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'JP1', '0', 550000, 651, 1, '2022-03-02 19:05:08', '2022-03-02 21:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `nameset` tinyint(1) NOT NULL DEFAULT 0,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `jumlah_pesanan`, `total_harga`, `nameset`, `nama`, `nomor`, `gambar`, `nama_product`, `product_id`, `pesanan_id`, `created_at`, `updated_at`) VALUES
(1, 3, 375000, 0, '0', '0', 'leicester.png', 'LEICESTER CITY HOME 2018-2019', 2, 1, '2022-03-02 19:05:08', '2022-03-02 19:05:08'),
(2, 1, 175000, 0, 'Raga', '22', 'chelsea.png', 'CHELSEA 3RD 2018-2019', 1, 1, '2022-03-02 21:30:18', '2022-03-02 21:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 125000,
  `harga_nameset` int(11) NOT NULL DEFAULT 50000,
  `is_ready` tinyint(1) NOT NULL DEFAULT 1,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Replica top Quality',
  `berat` double(8,2) NOT NULL DEFAULT 0.25,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liga_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `harga_nameset`, `is_ready`, `is_favorite`, `jenis`, `berat`, `gambar`, `liga_id`, `created_at`, `updated_at`) VALUES
(1, 'CHELSEA 3RD 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'chelsea.png', 2, NULL, NULL),
(2, 'LEICESTER CITY HOME 2018-2019', 125000, 50000, 1, 1, 'Replica top Quality', 0.25, 'leicester.png', 2, NULL, '2022-03-02 19:12:48'),
(3, 'MAN. UNITED AWAY 2018-2019', 125000, 50000, 1, 1, 'Replica top Quality', 0.25, 'mu.png', 2, NULL, '2022-03-02 19:11:35'),
(4, 'LIVERPOOL AWAY 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'liverpool.png', 2, NULL, NULL),
(5, 'TOTTENHAM 3RD 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'tottenham.png', 2, NULL, NULL),
(6, 'DORTMUND AWAY 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'dortmund.png', 1, NULL, NULL),
(7, 'BAYERN MUNCHEN 3RD 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'munchen.png', 1, NULL, NULL),
(8, 'JUVENTUS AWAY 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'juve.png', 4, NULL, NULL),
(9, 'AS ROMA HOME 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'asroma.png', 4, NULL, NULL),
(10, 'AC MILAN HOME 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'acmilan.png', 4, NULL, NULL),
(11, 'LAZIO HOME 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'lazio.png', 4, NULL, NULL),
(12, 'REAL MADRID 3RD 2018-2019', 125000, 50000, 1, 0, 'Replica top Quality', 0.25, 'madrid.png', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `poto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raga Puteraku Dermawan', 'dermawanraga066@gmail.com', NULL, '$2y$10$.OtVA32nWvgkioomUBjmY.77wyzGRf9SstmYp6kkMCpchnAxQib9i', NULL, NULL, NULL, NULL, '2022-03-02 18:59:32', '2022-03-02 18:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 125000,
  `harga_nameset` int(11) NOT NULL DEFAULT 50000,
  `is_ready` tinyint(1) NOT NULL DEFAULT 1,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Replica top Quality',
  `berat` double(8,2) NOT NULL DEFAULT 0.25,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liga_id` int(11) NOT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `nama`, `harga`, `harga_nameset`, `is_ready`, `jenis`, `berat`, `gambar`, `liga_id`, `is_favorite`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'MAN. UNITED AWAY 2018-2019', 125000, 50000, 1, 'Replica top Quality', 0.25, 'mu.png', 2, 0, 1, 3, '2022-03-02 19:11:35', '2022-03-02 19:11:35'),
(3, 'LEICESTER CITY HOME 2018-2019', 125000, 50000, 1, 'Replica top Quality', 0.25, 'leicester.png', 2, 0, 1, 2, '2022-03-02 19:12:48', '2022-03-02 19:12:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `history_pesanans`
--
ALTER TABLE `history_pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_pesanans`
--
ALTER TABLE `history_pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ligas`
--
ALTER TABLE `ligas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
