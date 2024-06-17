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
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` tinyint(1) NOT NULL,
  `arabic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_region` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `display`, `arabic_name`, `english_name`, `id_region`, `created_at`, `updated_at`) VALUES
(1, 'AGADIR', 1, 'اكادير', 'AGADIR', 9, NULL, NULL),
(41, 'EL HAOUZ', 1, 'الحوز', 'EL HAOUZ', 7, NULL, NULL),
(51, 'AL HOCEIMA', 1, 'الحسيمة', 'AL HOCEIMA', 1, NULL, NULL),
(71, 'ASSA-ZAG', 1, 'اسا الزاك', 'ASSA-ZAG', 10, NULL, NULL),
(81, 'AZILAL', 1, 'ازيلال', 'AZILAL', 4, NULL, NULL),
(91, 'BENI MELLAL', 1, 'بني ملال', 'BENI MELLAL', 4, NULL, NULL),
(111, 'BEN SLIMANE', 1, 'بنسليمان', 'BEN SLIMANE', 6, NULL, NULL),
(113, 'BERKANE', 1, 'بركان', 'BERKANE', 2, NULL, NULL),
(121, 'BOUJDOUR', 1, 'بوجدور', 'BOUJDOUR', 11, NULL, NULL),
(131, 'BOULEMANE', 1, 'بولمان', 'BOULEMANE', 3, NULL, NULL),
(141, 'CASABLANCA', 1, 'الدار البيضاء', 'CASABLANCA', 6, NULL, NULL),
(151, 'CHEFCHAOUEN', 1, 'شفشاون', 'CHEFCHAOUEN', 1, NULL, NULL),
(161, 'CHICHAOUA', 1, 'شيشاوة', 'CHICHAOUA', 7, NULL, NULL),
(163, 'CHTOUKA AIT BAHA', 1, 'شتوكة ايت باها', 'CHTOUKA AIT BAHA', 9, NULL, NULL),
(171, 'EL HAJEB', 1, 'الحاجب', 'EL HAJEB', 3, NULL, NULL),
(181, 'EL JADIDA', 1, 'الجديدة', 'EL JADIDA', 6, NULL, NULL),
(191, 'EL KELAA', 1, 'القلعة', 'EL KELAA', 7, NULL, NULL),
(201, 'ERRACHIDIA', 1, 'الراشيدية', 'ERRACHIDIA', 8, NULL, NULL),
(211, 'ESSAOUIRA', 1, 'الصويرة', 'ESSAOUIRA', 7, NULL, NULL),
(221, 'ESSEMARA', 1, 'السمارة', 'ESSEMARA', 11, NULL, NULL),
(231, 'FES', 1, 'فاس', 'FEZ', 3, NULL, NULL),
(251, 'FIGUIG', 1, 'فكيك', 'FIGUIG', 2, NULL, NULL),
(261, 'GUELMIM', 1, 'كلميم', 'GUELMIM', 10, NULL, NULL),
(267, 'GUERCIF', 1, 'كرسيف', 'GUERCIF', 2, NULL, NULL),
(271, 'IFRANE', 1, 'افران', 'IFRANE', 3, NULL, NULL),
(273, 'INZEGANE AIT MELLOUL', 1, 'انزكان ايت ملول', 'INZEGANE AIT MELLOUL', 9, NULL, NULL),
(275, 'JEREDA', 1, 'جرادة', 'JEREDA', 2, NULL, NULL),
(281, 'KENITRA', 1, 'قنيطرة', 'KENITRA', 5, NULL, NULL),
(291, 'KHEMISSET', 1, 'خميسات', 'KHEMISSET', 5, NULL, NULL),
(301, 'KHENIFRA', 1, 'خنيفرة', 'KHENIFRA', 4, NULL, NULL),
(311, 'KHOURIBGA', 1, 'خريبكة', 'KHOURIBGA', 4, NULL, NULL),
(321, 'LAAYOUNE', 1, 'العيون', 'LAAYOUNE', 11, NULL, NULL),
(331, 'LARACHE', 1, 'العرائش', 'LARACHE', 1, NULL, NULL),
(351, 'MARRAKECH', 1, 'مراكش', 'MARRAKECH', 7, NULL, NULL),
(355, 'MEDIOUNA', 1, 'مديونة', 'MEDIOUNA', 6, NULL, NULL),
(361, 'MEKNES', 1, 'مكناس', 'MEKNES', 3, NULL, NULL),
(367, 'MIDELT', 1, 'ميدلت', 'MIDELT', 8, NULL, NULL),
(371, 'MOHAMMEDIA', 1, 'محمدية', 'MOHAMMEDIA', 6, NULL, NULL),
(381, 'NADOR', 1, 'ناظور', 'NADOR', 2, NULL, NULL),
(385, 'NOUACER', 1, 'نواصر', 'NOUACER', 6, NULL, NULL),
(391, 'OUED EDDAHAB', 1, 'واد الذهب', 'OUED EDDAHAB', 12, NULL, NULL),
(395, 'OUEZZANE', 1, 'وزان', 'OUEZZANE', 1, NULL, NULL),
(401, 'OUARZAZATE', 1, 'وارزازات', 'OUARZAZATE', 8, NULL, NULL),
(411, 'OUJDA', 1, 'وجدة', 'OUJDA', 2, NULL, NULL),
(421, 'RABAT', 1, 'الرباط', 'RABAT', 5, NULL, NULL),
(431, 'SAFI', 1, 'اسفي', 'SAFI', 7, NULL, NULL),
(441, 'SALE', 1, 'سلا', 'SALE', 4, NULL, NULL),
(451, 'SEFROU', 1, 'صفرو', 'SEFROU', 3, NULL, NULL),
(461, 'SETTAT', 1, 'سطات', 'SETTAT', 6, NULL, NULL),
(481, 'SIDI KACEM', 1, 'سيدي قاسم', 'SIDI KACEM', 5, NULL, NULL),
(501, 'SKHIRATE-TEMARA', 1, 'الصخيرات-تمارة', 'SKHIRATE-TEMARA', 5, NULL, NULL),
(511, 'TANGER-ASILA', 1, 'طنجة اصيلة', 'TANGIER-ASILA', 1, NULL, NULL),
(521, 'TAN-TAN', 1, 'طانطان', 'TAN-TAN', 10, NULL, NULL),
(531, 'TAOUNATE', 1, 'تاونات', 'TAOUNATE', 3, NULL, NULL),
(533, 'TAOURIRT', 1, 'تاوريرت', 'TAOURIRT', 2, NULL, NULL),
(541, 'TAROUDANT', 1, 'تارودانت', 'TAROUDANT', 9, NULL, NULL),
(551, 'TATA', 1, 'طاطا', 'TATA', 9, NULL, NULL),
(561, 'TAZA', 1, 'تازة', 'TAZA', 3, NULL, NULL),
(571, 'TETOUAN', 1, 'تطوان', 'TETOUAN', 1, NULL, NULL),
(581, 'TINZNIT', 1, 'تزنيت', 'TINZNIT', 9, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_id_unique` (`id`),
  ADD KEY `cities_id_region_foreign` (`id_region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_id_region_foreign` FOREIGN KEY (`id_region`) REFERENCES `regions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
