-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2022 at 09:03 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `0ILAeW5MyH`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arabic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `arabic_name`, `english_name`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Aliments de bétail', 'أعلاف الحيوانات', 'Livestock feed', 0, NULL, '2022-05-31 13:40:25'),
(2, 'Céréales', 'الحبوب', 'Cereals', 1, NULL, NULL),
(3, 'Cultures industrielles', 'المحاصيل الصناعية', 'Industrial crops', 1, NULL, NULL),
(4, 'Engrais', 'الأسمدة', 'Fertilizers', 1, NULL, NULL),
(5, 'Epices', 'التوابل', 'Spices', 1, NULL, NULL),
(6, 'Fruits', 'الفواكه', 'Fruits', 1, NULL, NULL),
(7, 'Légumes', 'الخضروات', 'Vegetables', 1, NULL, NULL),
(8, 'Légumineuses', 'القطاني', 'Legumes', 1, NULL, NULL),
(9, 'Poissons', 'الأسماك', 'Fish', 1, NULL, NULL),
(10, 'Produits animaux', 'المنتجات الحيوانية', 'Animal products', 1, NULL, NULL),
(11, 'Produits transformés', 'المنتجات المجهزة', 'Processed products', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
