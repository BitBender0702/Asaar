-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2022 at 09:00 PM
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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arab_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `arab_name`, `english_name`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Tanger-Tétouan-Al Hoceima', 'طنجة تطوان الحسيمة', 'Tangier-Tétouan-Al Hoceima', 1, NULL, '2022-05-01 00:41:49'),
(2, 'L\'Oriental', 'الشرق', 'Oriental', 1, NULL, NULL),
(3, 'Fès-Meknès', 'فاس مكناس', 'Fez-Meknès', 1, NULL, NULL),
(4, 'Beni Mellal-Khénifra', 'بني ملال خنيفرة', 'Beni Mellal-Khenifra', 1, NULL, NULL),
(5, 'Rabat-Salé-Kénitra', 'الرباط سلا القنيطرة', 'Rabat-Salé-Kénitra', 1, NULL, NULL),
(6, 'Casablanca-Settat', 'الدار البيضاء سطات', 'Settat-Casablanca', 1, NULL, NULL),
(7, 'Marrakech-Safi', 'مراكش آسفي', 'Marrakesh-Safi', 1, NULL, NULL),
(8, 'Drâa-Tafilalet', 'درعة تافيلالت', 'Drâa-Tafilalt', 1, NULL, NULL),
(9, 'Souss-Massa', 'سوس ماسة', 'Souss-Massa', 1, NULL, NULL),
(10, 'Guelmim-Oued Noun', 'كلميم واد نون', 'Guelmim-Oued Noun', 1, NULL, NULL),
(11, 'Laâyoune-Sakia El Hamra', 'العيون الساقية الحمراء', 'Laâyoune-Sakia El Hamra', 1, NULL, NULL),
(12, 'Dakhla-Oued Ed Dahab', 'الداخلة وادي الذهب', 'Dakhla-Oued Eddahab', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regions_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
