-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2022 at 04:07 PM
-- Server version: 8.0.29-0ubuntu0.22.04.2
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_reporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `report_id` int DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `report_id`, `district`, `sector`, `cell`) VALUES
(1, 2, NULL, 'Gasabo', 'Kimihurura', 'Kamukina'),
(2, 3, NULL, 'Gasabo', 'Kimihurura', 'Kamukina'),
(3, 4, NULL, 'Gasabo', 'Kimihurura', 'Kamukina'),
(4, NULL, 1, 'Gasabo', 'Kimihurura', 'Kamukina'),
(7, NULL, 4, 'Gasabo', 'Kimihurura', 'Kamukina'),
(8, 5, NULL, 'Nyarugenge', 'Nyamirambo', 'Cyivugiza '),
(9, 6, NULL, 'Nyarugenge', 'Nyamirambo', 'Cyivugiza '),
(10, 7, NULL, 'Gasabo', 'Kimironko', 'Bibare');

-- --------------------------------------------------------

--
-- Table structure for table `cells`
--

CREATE TABLE `cells` (
  `id` bigint UNSIGNED NOT NULL,
  `sector_id` int DEFAULT NULL,
  `cell_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cells`
--

INSERT INTO `cells` (`id`, `sector_id`, `cell_name`) VALUES
(1, 1, 'Kamatamu'),
(2, 1, 'Kamutwa'),
(3, 1, 'Kibaza'),
(4, 2, 'Kamukina'),
(5, 2, 'Kimihurura'),
(6, 2, 'Rugando'),
(7, 3, 'Bibare'),
(8, 3, 'Kibagabaga'),
(9, 3, 'Nyagatovu'),
(10, 4, 'Kamuhoza'),
(11, 4, 'Katabaro'),
(12, 4, 'Kimisagara'),
(13, 5, 'Amahoro'),
(14, 5, 'Kabeza'),
(15, 5, 'Nyabugogo'),
(16, 6, 'Cyivugiza '),
(17, 6, 'Gasharu'),
(18, 6, 'Mumena'),
(19, 7, 'Gatenga'),
(20, 7, 'Karambo'),
(21, 7, 'Nyanza'),
(22, 8, 'Kanserege'),
(23, 8, 'Muyange'),
(24, 8, 'Rukatsa'),
(25, 9, 'Busanza'),
(26, 9, 'Kabeza'),
(27, 9, 'Karama'),
(28, 1, 'Kamatamu'),
(29, 1, 'Kamutwa'),
(30, 1, 'Kibaza'),
(31, 2, 'Kamukina'),
(32, 2, 'Kimihurura'),
(33, 2, 'Rugando'),
(34, 3, 'Bibare'),
(35, 3, 'Kibagabaga'),
(36, 3, 'Nyagatovu'),
(37, 4, 'Kamuhoza'),
(38, 4, 'Katabaro'),
(39, 4, 'Kimisagara'),
(40, 5, 'Amahoro'),
(41, 5, 'Kabeza'),
(42, 5, 'Nyabugogo'),
(43, 6, 'Cyivugiza '),
(44, 6, 'Gasharu'),
(45, 6, 'Mumena'),
(46, 7, 'Gatenga'),
(47, 7, 'Karambo'),
(48, 7, 'Nyanza'),
(49, 8, 'Kanserege'),
(50, 8, 'Muyange'),
(51, 8, 'Rukatsa'),
(52, 9, 'Busanza'),
(53, 9, 'Kabeza'),
(54, 9, 'Karama');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint UNSIGNED NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district_name`) VALUES
(1, 'Gasabo'),
(2, 'Nyarugenge'),
(3, 'Kicukiro'),
(4, 'Gasabo'),
(5, 'Nyarugenge'),
(6, 'Kicukiro');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_09_215107_create_roles_table', 1),
(6, '2022_07_09_215118_create_reports_table', 1),
(7, '2022_07_09_215144_create_districts_table', 1),
(8, '2022_07_09_215154_create_cells_table', 1),
(9, '2022_07_09_215202_create_sectors_table', 1),
(10, '2022_07_11_204210_create_addresses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `report_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_status` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `report_title`, `descriptions`, `delivery_to`, `report_status`, `comment_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Crime Report 1', 'Crime Report 1', 'police', 'Resolved', 'Yes I saw him killing me.', '2022-07-20 18:19:20', '2022-07-20 19:41:17'),
(4, 2, 'Location Dead', 'Location Dead5', 'police', 'Resolved', 'el esperanza', '2022-07-20 18:27:45', '2022-07-26 18:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL),
(3, 'Police', 'police', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint UNSIGNED NOT NULL,
  `district_id` int DEFAULT NULL,
  `sector_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `district_id`, `sector_name`) VALUES
(1, 1, 'Kacyiru'),
(2, 1, 'Kimihurura'),
(3, 1, 'Kimironko'),
(4, 2, 'Kimisagara'),
(5, 2, 'Muhima'),
(6, 2, 'Nyamirambo'),
(7, 3, 'Gatenga'),
(8, 3, 'Kagarama'),
(9, 3, 'Kanombe'),
(10, 1, 'Kacyiru'),
(11, 1, 'Kimihurura'),
(12, 1, 'Kimironko'),
(13, 2, 'Kimisagara'),
(14, 2, 'Muhima'),
(15, 2, 'Nyamirambo'),
(16, 3, 'Gatenga'),
(17, 3, 'Kagarama'),
(18, 3, 'Kanombe');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` int DEFAULT '3',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `username`, `phone_number`, `profile_image`, `user_status`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@gmail.com', 'admin', NULL, NULL, '1', '$2y$10$Ov9sLuvumsYH4a.54Nz6zexNvc37xMojdqBxV1gKOpjZP3u8Q/7Im', NULL, NULL, NULL, NULL),
(2, 2, 'shyaka', 'community@gmail.com', 'shyaka', '0785730731', 'public/media/images/1738904178143937.png', '0', '$2y$10$fcwxnjgl5lfMnkQmJEUYgeNDvXKicyPSmPkA8jQRz5USc9pe1ZIqS', NULL, NULL, '2022-07-19 22:00:00', NULL),
(3, 2, 'shema', 'shemacommunity@gmail.com', 'shema', '0785730731', 'public/media/images/1738904236534500.png', '1', '$2y$10$91I1av8EBakxpoU4rtaXzefiL41XH9MyQBPaA3IuIEVQw3JAJFGj.', NULL, NULL, '2022-07-19 22:00:00', NULL),
(4, 3, 'police', 'police@gmail.com', 'police', NULL, NULL, '1', '$2y$10$Evqr1IFIs4UaB4CPQvaCWeG3R3kISu9tm9WNMD72fEK0bOv0KeGnu', NULL, NULL, '2022-07-19 22:00:00', NULL),
(5, 3, 'gogo', 'gogo@gmail.com', 'gogo', NULL, NULL, '0', '$2y$10$e/2CzzzGlMdexZ8nkmfAt.3NegVAdfWz5p9qNIA2svKQdyv9mWCXu', NULL, NULL, '2022-07-25 22:00:00', NULL),
(7, 2, 'rerwerw', 'dsafds@gmail.com', 'sdfdsfds', '0785730732', 'public/photo/1739410963472261.png', '0', '$2y$10$Rjv1WafquBhEUGp8LmKgxeUQW4Z9MvrAxJqcTuLDWpfLw0xZt7XFO', NULL, NULL, '2022-07-25 22:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cells`
--
ALTER TABLE `cells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cells`
--
ALTER TABLE `cells`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
