-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 09:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcq_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_03_10_044510_create_user_table', 1),
(3, '2023_03_10_110614_create_points_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(100) NOT NULL DEFAULT 0,
  `points` int(100) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `user_id`, `points`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2023-03-10 07:37:05', '2023-03-10 10:37:48'),
(2, 2, 2, '2023-03-10 07:37:39', '2023-03-10 10:05:42'),
(3, 3, 0, '2023-03-10 09:49:15', '2023-03-10 09:49:15'),
(4, 4, 1, '2023-03-10 10:10:45', '2023-03-10 10:10:45'),
(5, 5, 0, '2023-03-10 10:13:27', '2023-03-10 10:13:27'),
(6, 6, 0, '2023-03-10 10:13:57', '2023-03-10 10:13:57'),
(7, 7, 0, '2023-03-10 10:16:02', '2023-03-10 10:16:02'),
(8, 8, 0, '2023-03-10 10:19:17', '2023-03-10 10:19:17'),
(9, 9, 0, '2023-03-10 10:19:40', '2023-03-10 10:19:40'),
(10, 10, 0, '2023-03-10 10:34:23', '2023-03-10 10:34:23'),
(11, 11, 0, '2023-03-10 10:36:07', '2023-03-10 10:36:07'),
(12, 12, 0, '2023-03-10 10:36:46', '2023-03-10 10:36:46'),
(13, 13, 0, '2023-03-10 10:37:10', '2023-03-10 10:37:10'),
(14, 14, 0, '2023-03-10 10:37:49', '2023-03-10 10:37:49'),
(15, 15, 0, '2023-03-15 02:29:49', '2023-03-15 02:29:49'),
(16, 16, 0, '2023-03-15 02:31:07', '2023-03-15 02:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `refferal_code` varchar(50) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `refferal_code`, `created_at`, `updated_at`) VALUES
(1, 'fox1', 'fox1@gmail.com', '1fox', '2023-03-10 07:37:05', '2023-03-10 07:37:05'),
(2, 'fox2', 'fox2@gmail.com', '2fox', '2023-03-10 07:37:39', '2023-03-10 07:37:39'),
(3, 'jincy', 'jin@gmail.com', '3jin', '2023-03-10 09:49:14', '2023-03-10 09:49:14'),
(4, 'abb', 'abb@gmail.com', '4abb', '2023-03-10 10:10:45', '2023-03-10 10:10:45'),
(5, 'ab1', 'ab1@gmail.com', '5ab1', '2023-03-10 10:13:27', '2023-03-10 10:13:27'),
(6, 'ab2', 'ab2@gmail.com', '6ab2', '2023-03-10 10:13:57', '2023-03-10 10:13:57'),
(7, 'abb2', 'abb2@gmail.com', '7abb', '2023-03-10 10:16:02', '2023-03-10 10:16:02'),
(8, 'new2', 'new2@gmail.com', '8new', '2023-03-10 10:19:17', '2023-03-10 10:19:17'),
(9, 'new3', 'new3@gmail.com', '9new', '2023-03-10 10:19:40', '2023-03-10 10:19:40'),
(10, 'qwerty', 'qwerty@gmail.com', '10qwe', '2023-03-10 10:34:23', '2023-03-10 10:34:23'),
(11, 'qwerty', 'qwerty@gmail.com', '11qwe', '2023-03-10 10:36:07', '2023-03-10 10:36:07'),
(12, 'qwerty', 'qwerty@gmail.com', '12qwe', '2023-03-10 10:36:46', '2023-03-10 10:36:46'),
(13, 'qwerty', 'qwerty@gmail.com', '13qwe', '2023-03-10 10:37:10', '2023-03-10 10:37:10'),
(14, 'qwerty', 'qwerty@gmail.com', '14qwe', '2023-03-10 10:37:49', '2023-03-10 10:37:49'),
(15, 'admin', 'admin@gmail.com', '15adm', '2023-03-15 02:29:49', '2023-03-15 02:29:49'),
(16, 'admin', 'admin@gmail.com', '16adm', '2023-03-15 02:31:07', '2023-03-15 02:31:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
