-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2026 at 01:13 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(5, 'bengbeng', 3500.00, 94, '2026-05-17 17:10:52', '2026-05-25 01:04:12'),
(6, 'silverqueen', 15000.00, 92, '2026-05-17 17:11:27', '2026-05-25 01:04:12'),
(8, 'melon', 1400000.00, 99, '2026-05-17 18:03:53', '2026-05-25 01:04:12'),
(10, 'milo', 1000000.00, 99, '2026-05-17 20:41:01', '2026-05-25 01:04:12'),
(13, 'silverqueen', 2000000.00, 100, '2026-05-18 05:55:27', '2026-05-18 09:58:05'),
(15, 'kapal api', 2000.00, 100, '2026-05-18 09:56:56', '2026-05-18 09:57:51'),
(16, 'white coffe', 2999992.00, 100, '2026-05-18 10:05:17', '2026-05-18 21:20:47'),
(17, 'bawang putih', 20000.00, 99, '2026-05-19 02:10:07', '2026-05-19 02:10:38'),
(24, 'kerupuk kulit', 5000.00, 100, '2026-05-24 23:59:45', '2026-05-24 23:59:45'),
(26, 'indomie', 4000.00, 12, '2026-05-25 00:57:42', '2026-05-25 00:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `bayar` decimal(10,2) DEFAULT NULL,
  `kembalian` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment` int DEFAULT NULL,
  `change_money` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `total_price`, `bayar`, `kembalian`, `created_at`, `updated_at`, `payment`, `change_money`) VALUES
(4, NULL, 64500.00, NULL, NULL, '2026-05-17 17:59:09', '2026-05-17 17:59:09', 98000, 33500),
(5, NULL, 15000.00, NULL, NULL, '2026-05-17 17:59:53', '2026-05-17 17:59:53', 20000, 5000),
(6, 8, 16000.00, NULL, NULL, '2026-05-17 19:27:23', '2026-05-17 19:27:23', 16000, 0),
(7, 8, 4500.00, NULL, NULL, '2026-05-17 19:30:06', '2026-05-17 19:30:06', 4500, 0),
(8, 8, 14000.00, NULL, NULL, '2026-05-18 06:04:09', '2026-05-18 06:04:09', 20000, 6000),
(9, 8, 2132500.00, NULL, NULL, '2026-05-18 06:04:46', '2026-05-18 06:04:46', 3000000, 867500),
(10, 8, 2132500.00, NULL, NULL, '2026-05-18 06:24:04', '2026-05-18 06:24:04', 3000000, 867500),
(11, 8, 15000.00, NULL, NULL, '2026-05-18 07:21:34', '2026-05-18 07:21:34', 15000, 0),
(12, 5, 3500.00, NULL, NULL, '2026-05-18 08:46:59', '2026-05-18 08:46:59', 3500, 0),
(13, 8, 1418500.00, NULL, NULL, '2026-05-18 09:11:48', '2026-05-18 09:11:48', 3000000, 1581500),
(14, 5, 22000.00, NULL, NULL, '2026-05-18 09:18:53', '2026-05-18 09:18:53', 30000, 8000),
(15, 8, 3500.00, NULL, NULL, '2026-05-18 09:57:26', '2026-05-18 09:57:26', 4000, 500),
(16, 5, 18500.00, NULL, NULL, '2026-05-18 21:33:46', '2026-05-18 21:33:46', 20000, 1500),
(17, 5, 15000.00, NULL, NULL, '2026-05-18 22:59:21', '2026-05-18 22:59:21', 20000, 5000),
(18, 5, 15000.00, NULL, NULL, '2026-05-18 22:59:46', '2026-05-18 22:59:46', 20000, 5000),
(19, 5, 7000.00, NULL, NULL, '2026-05-19 02:06:29', '2026-05-19 02:06:29', 10000, 3000),
(20, 8, 20000.00, NULL, NULL, '2026-05-19 02:10:38', '2026-05-19 02:10:38', 30000, 10000),
(21, 5, 18500.00, NULL, NULL, '2026-05-19 02:50:07', '2026-05-19 02:50:07', 100000, 81500),
(22, 5, 15000.00, NULL, NULL, '2026-05-19 02:50:49', '2026-05-19 02:50:49', 20000, 5000),
(23, 5, 18500.00, NULL, NULL, '2026-05-25 00:52:36', '2026-05-25 00:52:36', 20000, 1500),
(24, 5, 2433500.00, NULL, NULL, '2026-05-25 01:04:12', '2026-05-25 01:04:12', 3000000, 566500);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(3, 4, 6, 2, 15000.00, 30000.00, '2026-05-17 17:59:09', '2026-05-17 17:59:09'),
(6, 6, 5, 2, 3500.00, 7000.00, '2026-05-17 19:27:23', '2026-05-17 19:27:23'),
(8, 8, 5, 4, 3500.00, 14000.00, '2026-05-18 06:04:09', '2026-05-18 06:04:09'),
(9, 9, 5, 1, 3500.00, 3500.00, '2026-05-18 06:04:46', '2026-05-18 06:04:46'),
(10, 9, 6, 1, 15000.00, 15000.00, '2026-05-18 06:04:46', '2026-05-18 06:04:46'),
(11, 9, 8, 1, 14000.00, 14000.00, '2026-05-18 06:04:46', '2026-05-18 06:04:46'),
(12, 9, 10, 1, 100000.00, 100000.00, '2026-05-18 06:04:46', '2026-05-18 06:04:46'),
(13, 9, 13, 1, 2000000.00, 2000000.00, '2026-05-18 06:04:46', '2026-05-18 06:04:46'),
(14, 10, 5, 1, 3500.00, 3500.00, '2026-05-18 06:24:04', '2026-05-18 06:24:04'),
(15, 10, 6, 1, 15000.00, 15000.00, '2026-05-18 06:24:04', '2026-05-18 06:24:04'),
(16, 10, 8, 1, 14000.00, 14000.00, '2026-05-18 06:24:04', '2026-05-18 06:24:04'),
(17, 10, 10, 1, 100000.00, 100000.00, '2026-05-18 06:24:04', '2026-05-18 06:24:04'),
(18, 10, 13, 1, 2000000.00, 2000000.00, '2026-05-18 06:24:04', '2026-05-18 06:24:04'),
(19, 11, 6, 1, 15000.00, 15000.00, '2026-05-18 07:21:34', '2026-05-18 07:21:34'),
(20, 12, 5, 1, 3500.00, 3500.00, '2026-05-18 08:46:59', '2026-05-18 08:46:59'),
(21, 13, 5, 1, 3500.00, 3500.00, '2026-05-18 09:11:48', '2026-05-18 09:11:48'),
(22, 13, 6, 1, 15000.00, 15000.00, '2026-05-18 09:11:48', '2026-05-18 09:11:48'),
(23, 13, 8, 1, 1400000.00, 1400000.00, '2026-05-18 09:11:48', '2026-05-18 09:11:48'),
(24, 14, 5, 2, 3500.00, 7000.00, '2026-05-18 09:18:53', '2026-05-18 09:18:53'),
(25, 14, 6, 1, 15000.00, 15000.00, '2026-05-18 09:18:53', '2026-05-18 09:18:53'),
(26, 15, 5, 1, 3500.00, 3500.00, '2026-05-18 09:57:26', '2026-05-18 09:57:26'),
(27, 16, 6, 1, 15000.00, 15000.00, '2026-05-18 21:33:46', '2026-05-18 21:33:46'),
(28, 16, 5, 1, 3500.00, 3500.00, '2026-05-18 21:33:46', '2026-05-18 21:33:46'),
(29, 17, 6, 1, 15000.00, 15000.00, '2026-05-18 22:59:21', '2026-05-18 22:59:21'),
(30, 18, 6, 1, 15000.00, 15000.00, '2026-05-18 22:59:46', '2026-05-18 22:59:46'),
(31, 19, 5, 2, 3500.00, 7000.00, '2026-05-19 02:06:29', '2026-05-19 02:06:29'),
(32, 20, 17, 1, 20000.00, 20000.00, '2026-05-19 02:10:38', '2026-05-19 02:10:38'),
(33, 21, 5, 1, 3500.00, 3500.00, '2026-05-19 02:50:07', '2026-05-19 02:50:07'),
(34, 21, 6, 1, 15000.00, 15000.00, '2026-05-19 02:50:07', '2026-05-19 02:50:07'),
(35, 22, 6, 1, 15000.00, 15000.00, '2026-05-19 02:50:49', '2026-05-19 02:50:49'),
(36, 23, 5, 1, 3500.00, 3500.00, '2026-05-25 00:52:36', '2026-05-25 00:52:36'),
(37, 23, 6, 1, 15000.00, 15000.00, '2026-05-25 00:52:36', '2026-05-25 00:52:36'),
(38, 24, 5, 1, 3500.00, 3500.00, '2026-05-25 01:04:12', '2026-05-25 01:04:12'),
(39, 24, 6, 2, 15000.00, 30000.00, '2026-05-25 01:04:12', '2026-05-25 01:04:12'),
(40, 24, 8, 1, 1400000.00, 1400000.00, '2026-05-25 01:04:12', '2026-05-25 01:04:12'),
(41, 24, 10, 1, 1000000.00, 1000000.00, '2026-05-25 01:04:12', '2026-05-25 01:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','kasir') DEFAULT 'kasir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(5, 'Kasir', 'kasir@gmail.com', '$2y$12$lo1WiSJ3TCppZNoQRP8AquFC2fpJwvb6qDGGC72Nx6Az8l5rqiM5y', 'kasir', '2026-05-17 19:19:47', '2026-05-18 07:36:48'),
(8, 'Admin', 'admin@gmail.com', '$2y$12$O3Cgp32HRoUuXM6QOFwzFOaY1ISc3MHprnL/NURhov4bG9XIhwu1.', 'admin', '2026-05-17 19:24:49', '2026-05-18 07:36:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
