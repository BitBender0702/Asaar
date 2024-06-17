-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2022 at 09:02 PM
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
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `Asaar` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tweeter` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_id` int(11) NOT NULL,
  `Asaar_arabic` text COLLATE utf8_unicode_ci NOT NULL,
  `Asaar_english` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `Asaar`, `phone`, `email`, `facebook`, `youtube`, `tweeter`, `instagram`, `linkedIn`, `lang_id`, `Asaar_arabic`, `Asaar_english`) VALUES
(4, 'Le Ministère de l\'agriculture lance son site web dédié à l\'information sur les prix des produits agricoles. Il vise par cette initiative de rendre l\'information disponible et accessible aussi bien aux professionnels qu\'au large public pour un meilleur fonctionnement des marchés agricoles.', '212537361212', 'asaar@contact.ma', 'https://www.facebook.com/', 'https://www.youtube.com/', 'https://twitter.com/home', NULL, NULL, 1, 'وزارة الزراعة تطلق موقعها الإلكتروني المخصص للمعلومات عن أسعار المنتجات الزراعية. من خلال هذه المبادرة ، تهدف إلى إتاحة المعلومات وجعلها في متناول كل من المهنيين وعامة الناس لتحسين أداء الأسواق الزراعية.', 'The Ministry of Agriculture launches its website dedicated to information on the prices of agricultural products. Through this initiative, it aims to make information available and accessible to both professionals and the general public for better functioning of agricultural markets.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
