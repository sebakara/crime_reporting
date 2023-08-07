--
-- Script was generated by Devart dbForge Studio 2022 for MySQL, Version 9.1.8.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 08/07/23 11:52:28 PM
-- Server version: 5.7.39
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Set default database
--
USE crime_reporting;

--
-- Drop table `addresses`
--
DROP TABLE IF EXISTS addresses;

--
-- Drop table `cells`
--
DROP TABLE IF EXISTS cells;

--
-- Drop table `districts`
--
DROP TABLE IF EXISTS districts;

--
-- Drop table `failed_jobs`
--
DROP TABLE IF EXISTS failed_jobs;

--
-- Drop table `migrations`
--
DROP TABLE IF EXISTS migrations;

--
-- Drop table `password_resets`
--
DROP TABLE IF EXISTS password_resets;

--
-- Drop table `personal_access_tokens`
--
DROP TABLE IF EXISTS personal_access_tokens;

--
-- Drop table `reports`
--
DROP TABLE IF EXISTS reports;

--
-- Drop table `roles`
--
DROP TABLE IF EXISTS roles;

--
-- Drop table `sectors`
--
DROP TABLE IF EXISTS sectors;

--
-- Drop table `users`
--
DROP TABLE IF EXISTS users;

--
-- Set default database
--
USE crime_reporting;

--
-- Create table `users`
--
CREATE TABLE users (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  role_id int(11) DEFAULT 3,
  name varchar(191) DEFAULT NULL,
  email varchar(191) DEFAULT NULL,
  username varchar(191) DEFAULT NULL,
  phone_number varchar(191) DEFAULT NULL,
  profile_image varchar(191) DEFAULT NULL,
  user_status varchar(191) DEFAULT NULL,
  password varchar(191) NOT NULL,
  email_verified_at timestamp NULL DEFAULT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 8,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create index `users_email_unique` on table `users`
--
ALTER TABLE users
ADD UNIQUE INDEX users_email_unique (email);

--
-- Create index `users_username_unique` on table `users`
--
ALTER TABLE users
ADD UNIQUE INDEX users_username_unique (username);

--
-- Create table `sectors`
--
CREATE TABLE sectors (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  district_id int(11) DEFAULT NULL,
  sector_name varchar(191) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 10,
AVG_ROW_LENGTH = 1820,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `roles`
--
CREATE TABLE roles (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(191) DEFAULT NULL,
  slug varchar(191) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 5,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `reports`
--
CREATE TABLE reports (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  report_title varchar(191) DEFAULT NULL,
  descriptions varchar(191) DEFAULT NULL,
  delivery_to varchar(191) DEFAULT NULL,
  report_status varchar(191) DEFAULT NULL,
  comment_status varchar(191) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  status varchar(191) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 5,
AVG_ROW_LENGTH = 4096,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `personal_access_tokens`
--
CREATE TABLE personal_access_tokens (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  tokenable_type varchar(191) NOT NULL,
  tokenable_id bigint(20) UNSIGNED NOT NULL,
  name varchar(191) NOT NULL,
  token varchar(64) NOT NULL,
  abilities text DEFAULT NULL,
  last_used_at timestamp NULL DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create index `personal_access_tokens_token_unique` on table `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD UNIQUE INDEX personal_access_tokens_token_unique (token);

--
-- Create index `personal_access_tokens_tokenable_type_tokenable_id_index` on table `personal_access_tokens`
--
ALTER TABLE personal_access_tokens
ADD INDEX personal_access_tokens_tokenable_type_tokenable_id_index (tokenable_type, tokenable_id);

--
-- Create table `password_resets`
--
CREATE TABLE password_resets (
  email varchar(191) NOT NULL,
  token varchar(191) NOT NULL,
  created_at timestamp NULL DEFAULT NULL
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create index `password_resets_email_index` on table `password_resets`
--
ALTER TABLE password_resets
ADD INDEX password_resets_email_index (email);

--
-- Create table `migrations`
--
CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(191) NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 12,
AVG_ROW_LENGTH = 1489,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `failed_jobs`
--
CREATE TABLE failed_jobs (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  uuid varchar(191) NOT NULL,
  `connection` text NOT NULL,
  queue text NOT NULL,
  payload longtext NOT NULL,
  exception longtext NOT NULL,
  failed_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create index `failed_jobs_uuid_unique` on table `failed_jobs`
--
ALTER TABLE failed_jobs
ADD UNIQUE INDEX failed_jobs_uuid_unique (uuid);

--
-- Create table `districts`
--
CREATE TABLE districts (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  district_name varchar(191) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `cells`
--
CREATE TABLE cells (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  sector_id int(11) DEFAULT NULL,
  cell_name varchar(191) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 28,
AVG_ROW_LENGTH = 606,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `addresses`
--
CREATE TABLE addresses (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  report_id int(11) DEFAULT NULL,
  district varchar(191) DEFAULT NULL,
  sector varchar(191) DEFAULT NULL,
  cell varchar(191) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 9,
AVG_ROW_LENGTH = 2048,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

-- 
-- Dumping data for table users
--
INSERT INTO users VALUES
(1, 1, 'admin', 'admin@gmail.com', 'admin', NULL, NULL, '1', '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, NULL, NULL),
(3, 4, 'mavin', 'maicseba@gmail.com', 'mutagatifu', NULL, NULL, '1', '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, '2023-07-23 00:00:00', NULL),
(4, 3, 'muhirwa', 'mavin@gmail.com', 'muhirwa', NULL, NULL, '1', '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, '2023-07-23 00:00:00', NULL),
(5, 2, 'murenzi', 'murenzi@gmail.com', 'murenzi', '0786091893', 'public/photo/1772599539091189.jpeg', '1', '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, '2023-07-27 00:00:00', NULL),
(6, 3, 'Tuyizere Andre', 'tuyandre2020@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, '2023-08-07 20:32:43', '2023-08-07 20:32:43'),
(7, 3, 'Tuyizere Andre', 'tuyandre02@gmail.com', 'TUYANDRE', NULL, NULL, '1', '$2y$10$NoDZf8HsMoR.JKZa40O0/uHs3orvlSEXJEWgcC/ukCzkWCzxz39hW', NULL, NULL, '2023-08-07 00:00:00', NULL);

-- 
-- Dumping data for table sectors
--
INSERT INTO sectors VALUES
(1, 1, 'Kacyiru'),
(2, 1, 'Kimihurura'),
(3, 1, 'Kimironko'),
(4, 2, 'Kimisagara'),
(5, 2, 'Muhima'),
(6, 2, 'Nyamirambo'),
(7, 3, 'Gatenga'),
(8, 3, 'Kagarama'),
(9, 3, 'Kanombe');

-- 
-- Dumping data for table roles
--
INSERT INTO roles VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'User', 'user', NULL, NULL),
(3, 'Police', 'police', NULL, NULL),
(4, 'Sector_officer', 'sector', NULL, NULL);

-- 
-- Dumping data for table reports
--
INSERT INTO reports VALUES
(1, 5, 'casual report', 'sdafsdafds sdafsdagsda vsadsgsdfg   gs dfg', 'mavin', 'approved', NULL, '2023-07-27 20:09:56', NULL, '1'),
(2, 4, 'here we go', 'safsd sdafsd adfsa ga gsdfadxa', 'muhirwa', 'Pending', NULL, '2023-07-31 19:22:36', NULL, '0'),
(3, 5, 'hbvhbjvfnnfb', 'grge berrege rer', 'muhirwa', 'Pending', NULL, '2023-08-07 21:10:16', NULL, '0'),
(4, 5, 'Gufata kungufu', 'ikibazo nuko bikomeje kugorana', 'Tuyizere Andre', 'Resolved', 'fjffdkjdjkfsfjsskdj', '2023-08-07 21:14:43', '2023-08-07 21:41:38', '1');

-- 
-- Dumping data for table personal_access_tokens
--
-- Table crime_reporting.personal_access_tokens does not contain any data (it is empty)

-- 
-- Dumping data for table password_resets
--
-- Table crime_reporting.password_resets does not contain any data (it is empty)

-- 
-- Dumping data for table migrations
--
INSERT INTO migrations VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_09_215107_create_roles_table', 1),
(6, '2022_07_09_215118_create_reports_table', 1),
(7, '2022_07_09_215144_create_districts_table', 1),
(8, '2022_07_09_215154_create_cells_table', 1),
(9, '2022_07_09_215202_create_sectors_table', 1),
(10, '2022_07_11_204210_create_addresses_table', 1),
(11, '2023_07_31_184451_add_status_to_reports', 2);

-- 
-- Dumping data for table failed_jobs
--
-- Table crime_reporting.failed_jobs does not contain any data (it is empty)

-- 
-- Dumping data for table districts
--
INSERT INTO districts VALUES
(1, 'Gasabo'),
(2, 'Nyarugenge'),
(3, 'Kicukiro');

-- 
-- Dumping data for table cells
--
INSERT INTO cells VALUES
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
(27, 9, 'Karama');

-- 
-- Dumping data for table addresses
--
INSERT INTO addresses VALUES
(1, 3, NULL, 'Gasabo', 'Kimihurura', 'Kimihurura'),
(2, 4, NULL, 'Nyarugenge', 'Muhima', 'Kabeza'),
(3, 5, NULL, 'Gasabo', 'Kimihurura', 'Kimihurura'),
(4, NULL, 1, 'Gasabo', 'Kimihurura', 'Kimihurura'),
(5, 6, 2, 'Nyarugenge', 'Muhima', 'Kabeza'),
(6, 7, NULL, 'Gasabo', 'Kimihurura', 'Kamukina'),
(7, NULL, 3, 'Gasabo', 'Kimihurura', 'Kimihurura'),
(8, NULL, 4, 'Gasabo', 'Kimihurura', 'Kimihurura');

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;