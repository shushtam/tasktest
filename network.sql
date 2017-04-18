-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2017 at 07:49 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network`
--

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
(3, '2017_04_17_071111_add_columns_users_table', 2),
(4, '2017_04_17_105121_create__notes__table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `category`, `name`, `text`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '0', 'treez', 'this note is about nature', 31, '2017-04-16 20:00:00', '2017-04-17 09:20:59'),
(2, '1', 'smtjk', 'cd asd szdfc', 31, '2017-04-04 20:00:00', '2017-04-17 09:26:52'),
(4, '1', 'y', 'y', 31, '2017-04-17 09:47:55', '2017-04-17 09:47:55'),
(5, '2', 'j', 'j', 31, '2017-04-17 09:48:19', '2017-04-17 09:48:19'),
(6, '2', 'old', 'old', 31, '2017-04-01 20:00:00', '2017-04-01 20:00:00'),
(7, '1', '11', '111', 1, '2017-04-05 20:00:00', '2017-04-26 20:00:00');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `age`, `phone`, `address`, `file`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'tttt', 12, '12', '12', NULL, 'test10@gmail.com', '$2y$10$WRMcmyStztFtwwsmJn4.0.TqeKROI6NI9b51qNQjyLXGvoD9FN39e', NULL, '2017-04-17 03:57:08', '2017-04-17 03:57:08'),
(2, 'test', 'tttt', 1, '12', 'tretg', 'delete_sign-256.png', 'test10@gmail.comhhh', '$2y$10$pyfpXNBeG/hnLllUZh15QuAMHi0XZ.9QThpN6ZXWEMjqt.EgBzIrm', NULL, '2017-04-17 04:32:03', '2017-04-17 04:32:03'),
(4, 'w', 'w', 1, 'w', 'w', '1211812418.png', 'w@edad', '$2y$10$2zgl1XhQTnXzHf7pR0U7ou8XEk5tRlpVOa3ycRsp4qOIs3FnQJC9.', NULL, '2017-04-17 04:37:45', '2017-04-17 04:37:45'),
(9, 'test', 'tttt', 4, '4', '4', 'delete_sign-256.png', 'test10@gmail.comj', '$2y$10$v2n.Kc6X046rTKTIk0Swfee./1nWRqypOfYftt282eu2LDF8Yo5zq', NULL, '2017-04-17 04:40:03', '2017-04-17 04:40:03'),
(14, 'j', 'j', 12, '1', '1', 'delete_sign-256.png', 'test10@gmail.com1', '$2y$10$FfeI/a2rzSJGjfTng6JKf.5pX5i3Pq8mnLLf7LY7PXW5.5.bC913.', NULL, '2017-04-17 04:42:18', '2017-04-17 04:42:18'),
(16, 'p', 'p', 1, '1', '1', '1211812418.png', 'test10@gmail.com12', '$2y$10$MOLVwuFYADckp5lkZ.uYJ.LBxo7zZA0lFFmVpMuU1/ViVlLIy6692', NULL, '2017-04-17 04:42:53', '2017-04-17 04:42:53'),
(19, 'l', 'l', 12, 'u', 'u', 'png-002.jpg', 'user22@gmail.com', '$2y$10$9uhqQwKFRL6gcOolmF8ZSeRFl/ySqX1gSHsDnkBO24NDyC0543W2.', NULL, '2017-04-17 04:44:09', '2017-04-17 04:44:09'),
(21, '444444', '4', 4, '4', '4', '1211812418.png', 'test10@gmail.com44', '$2y$10$q.EfXWKmf4cisdizXIZHZuvfnslYUfNeGrSTNcXv3WeGVm/FQNLee', NULL, '2017-04-17 04:45:56', '2017-04-17 04:45:56'),
(23, '1', '4', 4, '4', '4', '1211812418.png', 'test10@gmail.com11', '$2y$10$ViQwrDp6aLPUTxF4Kmw5WuUuOHTSGnzrpTAfl9DgmRaG8mx9EXi7W', NULL, '2017-04-17 04:47:22', '2017-04-17 04:47:22'),
(25, 'testt', 't', 12, '1', '12', '1211812418.png', 'test10@gmail.com123', '$2y$10$ObojV.SGoGEO.c8AnGTTdejVwPvFLUVNvzxtJUCFIkRzFUCpPlo9G', NULL, '2017-04-17 04:49:30', '2017-04-17 04:49:30'),
(29, 'y', 'y', 3, 't', 't', 'delete_sign-256.png', 'test10hjuuj@gmail.com', '$2y$10$wgmZi6mMQAbGRsLpYETRMu/8DGaDW0pKWfpub01wbjIze7H5yDmOm', NULL, '2017-04-17 04:52:03', '2017-04-17 04:52:03'),
(31, 'yuser', 'userup', 12, '123456', 'here', '1211812418.png', 'user@gmail.com', '$2y$10$LBYSQX5sO1e69A/ddk3WH.wnXyiSkGWa3hKuLwf7LiMjdl7BHnEo.', 'uqaLvmvxNgwFlgHkoJMXAhPlsjtYRw2EDnFN9eB1pKNf6jJeJnmtYzHgaKc9', '2017-04-17 05:00:47', '2017-04-17 06:48:02'),
(33, 'gjhfcghf', 'g', 12, 'ggg', 'ff', 'png-002.jpg', 'user2@gmail.com', '$2y$10$Ghl645h6fBeyCg31UUJE5eNLoB9TrUucK49vlww7TH.GwVWFWDN.2', NULL, '2017-04-17 05:11:36', '2017-04-17 05:11:36'),
(35, 't', '343', 12, 't', 't', 'default.png', 'test10@gmail.comgfhbg', '$2y$10$WFESoSvRYAnOidr4agQyfONp.59aDaXr6IRjZCDsYVaPfDe5w/qdu', NULL, '2017-04-17 11:28:50', '2017-04-17 11:28:50'),
(36, 't', 't', 12, 't', 't', 'png-002.jpg', 't@gmail.com', '$2y$10$J3Ivi1w5wjDDC8aXeET7q.16unQne0fkPpR5TyUtj.tFrVACd0BPS', NULL, '2017-04-17 11:38:08', '2017-04-17 11:38:08'),
(37, 't', 't', 12, 't', 't', 'png-002.jpg', 't@gmail.comg', '$2y$10$6kugcWGKXxDI5tiB5YiRmuGRwK/2BjRUXNuPr.6c2kD5CqJ5W/gTu', NULL, '2017-04-17 11:40:23', '2017-04-17 11:40:23'),
(38, 't', 't', 12, 't', 't', 'png-002.jpg', '123das@gmail.comg', '$2y$10$GY/uP6Zp3GTUx.jOxoQdpeBKsUhavGZycbAOEOtQur6SMTSUgGtgm', NULL, '2017-04-17 11:45:55', '2017-04-17 11:45:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
