-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2022 at 08:59 PM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` tinyint(1) NOT NULL,
  `commun_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `with_image` tinyint(1) NOT NULL,
  `arabic_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `path_image`, `display`, `commun_name`, `with_image`, `arabic_name`, `english_name`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Vesce avoine', NULL, 1, 'VESCE AVOINE', 0, 'بيقية الشوفان', 'oat vetch', 1, NULL, '2022-06-13 04:45:55'),
(2, 'Trèfle', NULL, 1, 'TREFLE', 0, 'زهرة البرسيم', 'Clover', 1, NULL, NULL),
(3, 'Sudan grass', NULL, 1, 'SUDAN GRAS', 0, 'عشب السودان', 'Sudan grass', 1, NULL, '2022-06-13 04:46:31'),
(4, 'Son', '/img/son.jpg', 1, 'SON', 1, 'نخالة', 'bran', 1, NULL, '2022-06-13 04:46:53'),
(5, 'PSB', '/img/psb.jpg', 1, 'PSB', 1, '', '', 1, NULL, '2022-05-01 20:55:20'),
(6, 'Paille', '/img/paille.jpg', 1, 'PAILLE', 1, 'قشة', 'Straw', 1, NULL, NULL),
(7, 'Orge fourrage', NULL, 1, 'ORGE FOURRAGER', 0, 'علف الشعير', 'Forage barley', 1, NULL, NULL),
(8, 'Medicago', NULL, 1, 'MEDICAGO', 0, 'ميديكاغو', 'Medicago', 1, NULL, NULL),
(9, 'Mais Fourrager', NULL, 1, 'MAIS FOURRAGER', 0, 'ذرة العلف', 'Forage corn', 1, NULL, NULL),
(10, 'Luzerne', '/img/alfalfa.jpg', 1, 'LUZERNE', 1, 'البرسيم', 'Alfalfa', 1, NULL, NULL),
(11, 'Bersim', NULL, 1, 'BERSIM', 0, 'برسيم', 'Bersim', 1, NULL, NULL),
(12, 'Avoine fourrage', NULL, 1, 'AVOINE FOURRAGÃˆRE', 0, 'علف الشوفان', 'Forage oats', 1, NULL, NULL),
(13, 'Blé', NULL, 1, 'BLE', 0, 'قمح', 'Wheat', 2, NULL, NULL),
(14, 'Sorgho', NULL, 1, 'SORGHO', 0, 'سرغم', 'Sorghum', 2, NULL, NULL),
(15, 'Seigle', NULL, 1, 'SEIGLE', 0, 'جاودار', 'Rye', 2, NULL, NULL),
(16, 'Riz', NULL, 1, 'RIZ', 0, 'أرز', 'Rice', 2, NULL, NULL),
(17, 'Orge locale', '/img/orge.png', 1, 'ORGE LOCALE', 1, 'الشعير المحلي', 'local barley', 2, NULL, NULL),
(18, 'Orge importée', NULL, 1, 'ORGE IMPORTEE', 0, 'الشعير المستورد', 'Imported barley', 2, NULL, NULL),
(19, 'Orge', NULL, 1, 'ORGE', 0, 'الشعير', 'barley', 2, NULL, NULL),
(20, 'Mais locale', '/img/mais.png', 1, 'MAÃS LOCALE', 1, 'الذرة المحلية', 'local corn', 2, NULL, NULL),
(21, 'Mais importé', NULL, 1, 'MAÃS IMPORTÃ‰', 0, 'الذرة المستوردة', 'Imported corn', 2, NULL, NULL),
(22, 'Mais', NULL, 1, 'MAIS', 0, 'الذرة', 'Corn', 2, NULL, NULL),
(23, 'Blé tendre', '/img/ble_tendre.jpg', 1, 'BLE TENDRE', 1, 'قمح طري', 'Soft wheat', 2, NULL, NULL),
(24, 'Blé dur', '/img/ble_dur.png', 1, 'BLE DUR', 1, 'القمح الصلب', 'Durum wheat', 2, NULL, NULL),
(25, 'Avoine', NULL, 1, 'AVOINE', 0, 'الشوفان', 'oats', 2, NULL, NULL),
(26, 'Alpiste', NULL, 1, 'ALPISTE', 0, 'بذور الكناري / زؤان', 'canary seed', 2, NULL, NULL),
(27, 'Tournesol', NULL, 1, 'TOURNESOL', 0, 'دوار الشمس', 'Sunflower', 3, NULL, NULL),
(28, 'Tabac', NULL, 1, 'TABAC', 0, 'تبغ', 'Tobacco', 3, NULL, NULL),
(29, 'Soja', NULL, 1, 'SOJA', 0, 'الصويا', 'Soy', 3, NULL, NULL),
(30, 'Lin', NULL, 1, 'LIN', 0, 'الكتان', 'flaxseeds', 3, NULL, NULL),
(31, 'Henné', NULL, 1, 'HENNE', 0, 'الحناء', 'Henna', 3, NULL, NULL),
(32, 'Coton', NULL, 1, 'COTON', 0, 'قطن', 'Cotton', 3, NULL, NULL),
(33, 'Sésame', NULL, 1, 'CESAME', 0, 'سمسم', 'Sesame', 3, NULL, NULL),
(34, 'Carthame', NULL, 1, 'CARTHAME', 0, 'القرطم / العصفر', 'Safflower', 3, NULL, NULL),
(35, 'Canne à sucre', NULL, 1, 'CANNES A SUCRE', 0, 'قصب السكر', 'Sugar cane', 3, NULL, NULL),
(36, 'Betterave à sucre', NULL, 1, 'BETTERAVES A SUCRE', 0, 'شمندر سكري', 'Sugar beet', 3, NULL, NULL),
(37, 'Arachide', NULL, 1, 'ARACHIDES', 0, 'الفول السوداني', 'Peanut', 3, NULL, NULL),
(38, 'K-Chlorure de potassium', NULL, 1, 'K-Chlorure de potassium', 0, 'كلوريد البوتاسيوم', 'Potassium K-chloride', 4, NULL, NULL),
(39, 'K-Sulfate de potassium', NULL, 1, 'K-Sulfate de potassium', 0, 'كبريتات البوتاسيوم', 'Potassium K-Sulfate', 4, NULL, NULL),
(40, 'P-Superphosphate Triple', NULL, 1, 'P-Superphosphate Triple', 0, 'ثلاثي فوسفات بي', 'Triple P-Superphosphate', 4, NULL, NULL),
(41, 'NPK15-30-10', NULL, 1, 'NPK15-30-10', 0, '', '', 4, NULL, NULL),
(42, 'NPK10-20-10', NULL, 1, 'NPK10-20-10', 0, '', '', 4, NULL, NULL),
(43, 'P-Phosphate Monoammonique', NULL, 1, 'P-Phosphate Monoammonique', 0, 'أحادي أمونيوم فوسفات', 'Monoammonium P-Phosphate', 4, NULL, NULL),
(44, 'K-Nitrate de potassium', NULL, 1, 'K-Nitrate de potassium', 0, 'نترات البوتاسيوم', 'Potassium K-Nitrate', 4, NULL, NULL),
(45, 'P-Super Phosphate-Simple', NULL, 1, 'P-Super Phosphate-Simple', 0, 'ف سوبر فوسفات بسيط', 'P-Super Phosphate-Simple', 4, NULL, NULL),
(46, 'NPK14-28-14', NULL, 1, 'NPK14-28-14', 0, '', '', 4, NULL, NULL),
(47, 'NPK (17-16-12)', NULL, 1, 'NPK (17-16-12)', 0, '', '', 4, NULL, NULL),
(48, 'NPK (16-11-20)', NULL, 1, 'NPK (16-11-20)', 0, '', '', 4, NULL, NULL),
(49, 'NPK (14-28-14)', NULL, 1, 'NPK (14-28-14)', 0, '', '', 4, NULL, NULL),
(50, 'N - Sulfate d\'ammoniaque 21%', NULL, 1, 'N - Sulfate d\'ammoniaque 21%', 0, '', '', 4, NULL, NULL),
(51, 'N - Ammonitrate 33%', NULL, 1, 'N - Ammonitrate 33%', 0, '', '', 4, NULL, NULL),
(52, 'N - Uree 46%', NULL, 1, 'N - Uree 46%', 0, '', '', 4, NULL, NULL),
(53, 'Urée 46% (Grannulée)', NULL, 1, 'URÃ‰E 46% (GRANULÃ‰)', 0, '', '', 4, NULL, NULL),
(54, 'Poivron noir', NULL, 1, 'POIVRON NOIR', 0, 'فلفل اسود', 'black pepper', 5, NULL, NULL),
(55, 'Piment doux', '/img/piment-doux.png', 1, 'PIMENT DOUX', 1, 'فلفل حلو', 'Mild red pepper', 5, NULL, NULL),
(56, 'Gingembre', '/img/Gingembre.png', 1, 'GINGEMBRE', 1, 'زنجبيل', 'Ginger', 5, NULL, NULL),
(57, 'Curcuma', '/img/curcuma.png', 1, 'CURCUMA', 1, 'كركم', 'Turmeric', 5, NULL, NULL),
(58, 'Cumin', '/img/cumin.png', 1, 'CUMIN', 1, 'كمون', 'Cumin', 5, NULL, NULL),
(59, 'Dattes Bousthami', NULL, 1, 'DATTES BOUSTHAMI', 0, 'تمر البسطامي', 'Bousthami dates', 6, NULL, NULL),
(60, 'Dattes Majhoul', NULL, 1, 'DATTES MAJHOUL', 0, 'تمر مجهول', 'Majhoul dates', 6, NULL, NULL),
(61, 'Thé vert Sultan', NULL, 1, 'THE VERT SULTAN', 0, 'شاي أخضر سلطان', 'Green tea Sultan', 6, NULL, NULL),
(62, 'Thé vert', NULL, 1, 'THE VERT', 0, 'شاي أخضر', 'Green tea', 6, NULL, NULL),
(63, 'Dattes El Khalt', NULL, 1, 'DATTES EL KHALT', 0, 'تمور الخلت', 'Dates El Khalt', 6, NULL, NULL),
(64, 'Olives tous venant', NULL, 1, 'OLIVE TOUTES VENANT', 0, 'جميع الزيتون', 'Olives all coming', 6, NULL, NULL),
(65, 'Olives noirs petit calibre', NULL, 1, 'OLIVE NOIR PETIT CALIBRE', 0, 'زيتون اسود عيار صغير', 'Small caliber black olives', 6, NULL, NULL),
(66, 'Olives noirs moyen calibre', NULL, 1, 'OLIVE NOIR MOYEN CALIBRE', 0, 'زيتون اسود وسط', 'Medium black olives', 6, NULL, NULL),
(67, 'Olives noirs Gros calibre', NULL, 1, 'OLIVE NOIR GROS CALIBRE', 0, 'زيتون اسود عيار كبير', 'Large caliber black olives', 6, NULL, NULL),
(68, 'Olives vertes petit calibre', NULL, 1, 'OLIVE VERTE PETIT CALIBRE', 0, 'زيتون اخضر عيار صغير', 'Small caliber green olives', 6, NULL, NULL),
(69, 'Olives vertes calibre moyen', NULL, 1, 'OLIVE VERTE CALIBRE MOYEN', 0, 'زيتون اخضر حجم وسط', 'Medium size green olives', 6, NULL, NULL),
(70, 'Olives vertes gros calibre', NULL, 1, 'OLIVE VERTE GROS CALIBRE', 0, 'زيتون اخضر عيار كبير', 'Large caliber green olives', 6, NULL, NULL),
(71, 'Pates alimentaires', NULL, 1, 'PATES ALIMENTAIRES', 0, 'معجنات غذائية', 'Pasta', 6, NULL, NULL),
(72, 'Dattes Algérie', NULL, 1, 'DATTES ALGERIE', 0, 'تمور جزائرية', 'Algeria\'s dates', 6, NULL, NULL),
(73, 'Dattes Egypte', NULL, 1, 'DATTES EGYPTE', 0, 'تمور مصر', 'Egypt\'s dates', 6, NULL, NULL),
(74, 'Dattes Iraq', NULL, 1, 'DATTES  IRAQ', 0, 'تمور العراق', 'Dates Iraq', 6, NULL, NULL),
(75, 'Dattes Tunisie', NULL, 1, 'DATTES TUNISIE', 0, 'تمور تونس', 'Dates Tunisia', 6, NULL, NULL),
(76, 'Dattes Nationales', NULL, 1, 'DATTES NATIONALES', 0, 'تمور وطنية', 'National Dates', 6, NULL, NULL),
(77, 'Conserve de sardines', NULL, 1, 'CONSERVE DE SARDINE', 0, 'السردين المعلب', 'Canned sardines', 6, NULL, NULL),
(78, 'Conserve de Thon', NULL, 1, 'CONSERVE DE THON', 0, 'التونة المعلبة', 'Canned tuna', 6, NULL, NULL),
(79, 'Dattes Jihel Cat 2', NULL, 1, 'DATTES JIHEL CAT.2', 0, 'تمور جيهل كات 2', 'Dates Jihel Cat 2', 6, NULL, NULL),
(80, 'Dattes Jihel Cat 1', NULL, 1, 'DATTES JIHEL CAT.1', 0, 'تمور جيهل كات 1', 'Dates Jihel Cat 1', 6, NULL, NULL),
(81, 'Dattes Boufegouss Cat 3', NULL, 1, 'DATTES BOUFEGOUSS CAT.3', 0, 'تمر بوفقوس كات 3', 'Dates Boufegouss Cat 3', 6, NULL, NULL),
(82, 'Dattes Boufegouss Cat 2', NULL, 1, 'DATTES BOUFEGOUSS CAT.2', 0, 'تمر بوفقوس كات 2', 'Dates Boufegouss Cat 2', 6, NULL, NULL),
(83, 'Couscous', '/img/couscous.png', 1, 'COSCOUSS', 1, 'كسكس', 'Couscous', 11, NULL, NULL),
(84, 'Dattes Majhoul Cat 3', NULL, 1, 'DATTES MAJHOUL CAT.3', 0, 'تمر مجول قط 3', 'Dates Majhoul Cat 3', 6, NULL, NULL),
(85, 'Dattes Majhoul CAT 2', NULL, 1, 'DATTES MAJHOUL CAT.2', 0, 'تمر مجول قط 2', 'Dates Majhoul Cat 2', 6, NULL, NULL),
(86, 'Raisins de table noirs', NULL, 1, 'RAISINS DE TABLE NOIRS', 0, 'عنب المائدة الأسود', 'Black table grapes', 6, NULL, NULL),
(87, 'Raisins de table mouska', NULL, 1, 'RAISINS DE TABLE MOUSKA', 0, 'عنب الموسكة', 'Mouska grapes', 6, NULL, NULL),
(88, 'Raisins de table blancs', NULL, 1, 'RAISINS DE TABLE BLANCS', 0, 'عنب المائدة الأبيض', 'White table grapes', 6, NULL, NULL),
(89, 'Raisins de table', NULL, 1, 'RAISINS DE TABLE', 0, 'عنب المائدة', 'table grapes', 6, NULL, NULL),
(90, 'Raisins de cuve', NULL, 1, 'RAISINS DE CUVE', 0, 'عنب النبيذ', 'wine grapes', 6, NULL, NULL),
(91, 'Prunes', NULL, 1, 'PRUNES', 0, 'برقوق', 'Plums', 6, NULL, NULL),
(92, 'Pommes locales', '/img/pomme.png', 1, 'POMMES LOCALES', 1, 'التفاح المحلي', 'local apples', 6, NULL, NULL),
(93, 'Pommes importées', NULL, 1, 'POMMES IMPORTES', 0, 'تفاح مستورد', 'Imported apples', 6, NULL, NULL),
(94, 'Pomme', NULL, 1, 'POMMES', 0, 'تفاح', 'Apple', 6, NULL, NULL),
(95, 'Pomelo', NULL, 1, 'POMELO', 0, 'بوميلو', 'Pomelo', 6, NULL, NULL),
(96, 'Poire', NULL, 1, 'POIRES', 0, 'الإجاص', 'Pear', 6, NULL, NULL),
(97, 'Pistache', NULL, 1, 'PISTACHES', 0, 'فستق', 'Pistachio', 6, NULL, NULL),
(98, 'Peche', NULL, 1, 'PECHES', 0, 'خوخ', 'Peach', 6, NULL, NULL),
(99, 'Pasteque', NULL, 1, 'PASTEQUES', 0, 'بطيخ', 'Watermelon', 6, NULL, NULL),
(100, 'Papaya', NULL, 1, 'PAPAYA', 0, 'بابايا', 'papaya', 6, NULL, NULL),
(101, 'Orange', '/img/oranges.png', 1, 'ORANGES', 1, 'البرتقال', 'Orange', 6, NULL, NULL),
(102, 'Olives fraiches vertes conserve', NULL, 1, 'OLIVES FRAÃŽCHES VERTE CONSERVE', 0, 'زيتون أخضر طازج معلب', 'Canned fresh green olives', 6, NULL, NULL),
(103, 'Olives fraiches noirs de conserve', NULL, 1, 'OLIVES FRAÃŽCHES NOIR CONSERVE', 0, 'زيتون أسود طازج معلب', 'Canned fresh black olives', 6, NULL, NULL),
(104, 'Olives fraiches trituration', NULL, 1, 'OLIVES FRAÃŽCHES  TRITURATION', 0, 'سحن الزيتون الطازج', 'Fresh olives trituration', 6, NULL, NULL),
(105, 'Olives', NULL, 1, 'OLIVES', 0, 'زيتون', 'olives', 6, NULL, NULL),
(106, 'Noix de coco', NULL, 1, 'NOIX DE COCO', 0, 'جوز الهند', 'Coconut', 6, NULL, NULL),
(107, 'Noix', NULL, 1, 'NOIX', 0, 'جوز', 'walnut', 6, NULL, NULL),
(108, 'Noisettes', NULL, 1, 'NOISETTES', 0, 'بندق', 'Hazelnut', 6, NULL, NULL),
(109, 'Nefles', NULL, 1, 'NEFLES', 0, 'المشملة ', 'Medlars', 6, NULL, NULL),
(110, 'Nectarines', NULL, 1, 'NECTARINES', 0, 'النكتارين‬', 'nectarines', 6, NULL, NULL),
(111, 'Navel', NULL, 1, 'NAVEL', 0, 'نافيل', 'Navel ', 6, NULL, NULL),
(112, 'Melon', NULL, 1, 'MELONS', 0, 'شمام', 'Melon', 6, NULL, NULL),
(113, 'Mangue', NULL, 1, 'MANGUES', 0, 'مانجو', 'Mango', 6, NULL, NULL),
(114, 'Kiwi', NULL, 1, 'KIWI', 0, 'كيوي', 'Kiwi', 6, NULL, NULL),
(115, 'Kaki', NULL, 1, 'KAKI', 0, 'الكاكي', 'Kaki', 6, NULL, NULL),
(116, 'Jujube', NULL, 1, 'JUJUBE', 0, 'عناب', 'Jujube', 6, NULL, NULL),
(117, 'Iraquia', NULL, 1, 'IRAQUIA', 0, 'العراقية', 'iraqia ', 6, NULL, NULL),
(118, 'Groseille', NULL, 1, 'GROSEILLES', 0, '‫الزبيب الأحمر‬', 'Currant', 6, NULL, NULL),
(119, 'Grenade', NULL, 1, 'GRENADES', 0, 'الرمان‬', 'pomegranate', 6, NULL, NULL),
(120, 'Framboise', NULL, 1, 'FRAMBOISES', 0, '‫توت العليق‬', 'raspberry', 6, NULL, NULL),
(121, 'Fraise', NULL, 1, 'FRAISES', 0, '‫الفراولة‬', 'Strawberry', 6, NULL, NULL),
(122, 'Figue', NULL, 1, 'FIGUES', 0, 'التين‬', 'fig', 6, NULL, NULL),
(123, 'Deglet Nour', NULL, 1, 'DEGLET NOUR', 0, 'دجلة نور', 'Deglet-Nour', 6, NULL, NULL),
(124, 'Dattes', NULL, 1, 'DATTES', 0, 'تمر', 'date', 6, NULL, NULL),
(125, 'Coings', NULL, 1, 'COINGS', 0, 'السفرجل', 'Quinces', 6, NULL, NULL),
(126, 'Clementine', '/img/clementine.png', 1, 'CLEMENTINES', 1, 'كليمونتين ', 'Clementine', 6, NULL, NULL),
(127, 'Citron', NULL, 1, 'CITRONS', 0, 'الليمون', 'Lemon', 6, NULL, NULL),
(128, 'Chataine', NULL, 1, 'CHATAINES', 0, 'كستناء', 'Chestnut', 6, NULL, NULL),
(129, 'Cerise', NULL, 1, 'CERISES', 0, 'كرز', 'Cherry', 6, NULL, NULL),
(130, 'Caroube', NULL, 1, 'CAROUBES', 0, 'الخروب', 'Carob', 6, NULL, NULL),
(131, 'Cactus', NULL, 1, 'CACTUS', 0, 'التين الهندي', 'Cactus', 6, NULL, NULL),
(132, 'Dattes Boufegouss', NULL, 1, 'DATTES BOUFEGOUSS', 0, 'تمر بوفقوس', 'Boufegouss dates', 6, NULL, NULL),
(133, 'Banane vert importee', NULL, 1, 'BANANES VERTES IMPORTES', 0, 'موز اخضر مستورد', 'Imported green banana', 6, NULL, NULL),
(134, 'Banane locale', '/img/banane.jpg', 1, 'BANANES LOCALES', 1, 'الموز المحلي', 'local banana', 6, NULL, NULL),
(135, 'Banane Jaune Importee', NULL, 1, 'BANANES JAUNES IMPORTES', 0, 'موز أصفر مستورد', 'Imported Yellow Banana', 6, NULL, NULL),
(136, 'Banane importee', NULL, 1, 'BANANES IMPORTES', 0, 'موز مستورد', 'Banana Imported', 6, NULL, NULL),
(137, 'Banane', NULL, 1, 'BANANES', 0, 'موز', 'Banana', 6, NULL, NULL),
(138, 'Avocat', NULL, 1, 'AVOCATS', 0, 'الأفوكادو', 'Avocado ', 6, NULL, NULL),
(139, 'Anone', NULL, 1, 'ANONES', 0, 'شيريمويا', 'Custard apple', 6, NULL, NULL),
(140, 'Ananas', NULL, 1, 'ANANAS', 0, 'أناناس', 'Pineapple', 6, NULL, NULL),
(141, 'Amande', NULL, 1, 'AMANDES', 0, 'لوز', 'Almond', 6, NULL, NULL),
(142, 'Abricot', NULL, 1, 'ABRICOTS', 0, 'مشمش', 'Apricot', 6, NULL, NULL),
(143, 'Tomate', '/img/tomate.jpg', 1, 'Tomate', 1, 'طماطم', 'Tomato', 7, NULL, NULL),
(144, 'Coriandre', NULL, 1, 'CORIANDRE', 0, 'كسبرة', 'Coriander', 7, NULL, NULL),
(145, 'Topinambour', NULL, 1, 'TOPINAMBOUR', 0, 'خرشوف القدس', 'Jerusalem artichoke', 7, NULL, NULL),
(146, 'Tomate fraiche', NULL, 1, 'TOMATES FRAICHES', 0, 'طماطم طازجة', 'Fresh tomato', 7, NULL, NULL),
(147, 'Tomate', NULL, 1, 'TOMATES', 0, 'طماطم', 'Tomato', 7, NULL, NULL),
(148, 'Tomate ronde fraiche', NULL, 1, 'TOMATE RONDE FRAICHE', 0, 'طماطم مستديرة طازجة', 'Fresh round tomato', 7, NULL, NULL),
(149, 'Tomate Oblongue', NULL, 1, 'TOMATE OBLONGUE', 0, 'مستطيل الطماطم', 'Oblong Tomato', 7, NULL, NULL),
(150, 'Slaoui', NULL, 1, 'SLAOUI', 0, 'السلاوي', 'Slaoui', 7, NULL, NULL),
(151, 'Radis', NULL, 1, 'RADIS', 0, 'الفجل', 'Radish', 7, NULL, NULL),
(152, 'Pomme de terre rouge', NULL, 1, 'POMMES DE TERRE ROUGES', 0, 'بطاطا حمراء', 'red potato', 7, NULL, NULL),
(153, 'Pomme de terre blanche', '/img/pomme_terre.jpg', 1, 'POMMES DE TERRE BLANCHES', 1, 'بطاطا بيضاء', 'white potato', 7, NULL, NULL),
(154, 'Poivron vert', NULL, 1, 'POIVRONS VERTS', 0, 'فلفل أخضر', 'Green pepper', 7, NULL, NULL),
(155, 'Poivron (autre que le vert)', NULL, 1, 'POIVRONS (AUTRE QUE VERT)', 0, 'الفلفل (عدا الأخضر)', 'Pepper (other than green)', 7, NULL, NULL),
(156, 'Poireaux', NULL, 1, 'POIREAUX', 0, 'الكراث', 'Leeks', 7, NULL, NULL),
(157, 'Piments', NULL, 1, 'PIMENTS', 0, 'الفلفل', 'peppers', 7, NULL, NULL),
(158, 'Petit pois vert', NULL, 1, 'PETITS POIS VERTS', 0, 'بازلاء', 'Small green pea', 7, NULL, NULL),
(159, 'Persil', NULL, 1, 'PERSIL', 0, 'بقدونس', 'Parsley', 7, NULL, NULL),
(160, 'Patate douce', NULL, 1, 'PATATE DOUCE', 0, 'بطاطس حلوة', 'sweet potato', 7, NULL, NULL),
(161, 'Pomme de terre', NULL, 1, 'POMMES DE TERRE', 0, 'البطاطس', 'Potato', 7, NULL, NULL),
(162, 'Oignon sec', '/img/oignion_sec.png', 1, 'OIGNONS SECS', 1, 'بصل جاف', 'dry onion', 7, NULL, NULL),
(163, 'Oignon frais', '/img/oignons-frais.png', 1, 'OIGNONS FRAIS', 1, 'بصل طازج', 'fresh onion', 7, NULL, NULL),
(164, 'oignon', NULL, 1, 'OIGNONS', 0, 'بصل', 'onion', 7, NULL, NULL),
(165, 'Navet', NULL, 1, 'NAVETS', 0, 'لفت نبات', 'Turnip', 7, NULL, NULL),
(166, 'Menthe', NULL, 1, 'MENTHE', 0, 'نعناع', 'Mint', 7, NULL, NULL),
(167, 'Laitue', NULL, 1, 'LAITUE', 0, 'خس', 'Lettuce', 7, NULL, NULL),
(168, 'Haricot vert', NULL, 1, 'HARICOTS VERTS', 0, 'فاصوليا خضراء', 'green bean', 7, NULL, NULL),
(169, 'Gombos', NULL, 1, 'GOMBOS', 0, 'ملوخية', 'Okras', 7, NULL, NULL),
(170, 'Feve verte', NULL, 1, 'FEVES VERTES', 0, 'فول أخضر', 'Green bean', 7, NULL, NULL),
(171, 'Fenouil', NULL, 1, 'FENOUIL', 0, 'الشمر/ الشمار/ بسباس', 'Fennel', 7, NULL, NULL),
(172, 'Epinard', NULL, 1, 'EPINARDS', 0, 'سبانخ', 'Spinach', 7, NULL, NULL),
(173, 'courgette', NULL, 1, 'COURGETTES', 0, 'قرع صيفي', 'zucchini', 7, NULL, NULL),
(174, 'courge', NULL, 1, 'COURGES', 0, 'قرع', 'squash', 7, NULL, NULL),
(175, 'Cornichons', NULL, 1, 'CORNICHONS', 0, 'الجيركين خيار صغير', 'Pickles', 7, NULL, NULL),
(176, 'Concombre', NULL, 1, 'CONCOMBRES', 0, 'خيار', 'Cucumber', 7, NULL, NULL),
(177, 'Choux pommes', NULL, 1, 'CHOUX POMMES', 0, 'ملفوف التفاح', 'apple cabbage', 7, NULL, NULL),
(178, 'Choux fleurs', NULL, 1, 'CHOUX FLEURS', 0, 'قرنبيط', 'Cauliflower', 7, NULL, NULL),
(179, 'choux de bruxelles', NULL, 1, 'CHOUX DE BRUXELLE', 0, 'الكرنب', 'Brussels sprouts', 7, NULL, NULL),
(180, 'Champignon', NULL, 1, 'CHAMPIGNONS', 0, 'فطر', 'Mushroom', 7, NULL, NULL),
(181, 'Celeris Raves', NULL, 1, 'CELERIS-RAVES', 0, 'الكرفس', 'Celeriacs', 7, NULL, NULL),
(182, 'Carotte', '/img/carotte.jpg', 1, 'CAROTTES', 1, 'جزرة', 'Carrot', 7, NULL, NULL),
(183, 'Carde', NULL, 1, 'CARDES', 0, '', '', 7, NULL, NULL),
(184, 'Betterave rouge', NULL, 1, 'BETTERAVES ROUGE', 0, 'شمندر أحمر', 'Beetroot', 7, NULL, NULL),
(185, 'Aubergine', NULL, 1, 'AUBERGINES', 0, 'باذنجان', 'Aubergine', 7, NULL, NULL),
(186, 'Asperge', NULL, 1, 'ASPERGES', 0, 'نبات الهليون', 'Asparagus', 7, NULL, NULL),
(187, 'Artichaut', NULL, 1, 'ARTICHAUTS', 0, 'خرشوف', 'Artichoke', 7, NULL, NULL),
(188, 'Ails', NULL, 1, 'AILS', 0, 'ثوم', 'Garlic', 7, NULL, NULL),
(189, 'Absinthe', NULL, 1, 'ABSINTHE', 0, 'شيبة', 'Absinthe Wormwood', 7, NULL, NULL),
(190, 'Pois chiche', '/img/poischiche.png', 1, 'POIS CHICHE', 1, 'حمص', 'Chickpea', 8, NULL, NULL),
(191, 'Petit pois sec', NULL, 1, 'PETITS POIS SECS', 0, 'البازلاء الجافة', 'Dry peas', 8, NULL, NULL),
(192, 'Orobe', NULL, 1, 'OROBES', 0, 'كرسانة', 'Orobe', 8, NULL, NULL),
(193, 'Lupin', NULL, 1, 'LUPIN', 0, 'الترمس', 'Lupine', 8, NULL, NULL),
(194, 'Lentille', '/img/lentille.png', 1, 'LENTILLES', 1, 'عدس', 'lentil', 8, NULL, NULL),
(195, 'Haricot Sec', '/img/haricot_sec.png', 1, 'HARICOT SECS', 1, 'الفاصوليا الجافة', 'Dry bean', 8, NULL, NULL),
(196, 'Feve seche', '/img/haricot_sec.png', 1, 'FEVES SECHES', 1, 'الفول المجفف', 'Dried broad bean', 8, NULL, NULL),
(197, 'Feverole', NULL, 1, 'FEVEROLES', 0, '', '', 8, NULL, NULL),
(198, 'Feve', NULL, 1, 'FÃˆVE', 0, 'الفول', 'broad bean', 8, NULL, NULL),
(199, 'Fenugrec', NULL, 1, 'FENUGREC', 0, 'حلبة', 'fenugreek', 8, NULL, NULL),
(200, 'Conserve de sardine', NULL, 1, 'CONSERVEDESARDINE', 0, 'السردين المعلب', 'Canned sardines', 9, NULL, NULL),
(201, 'Sole', '/img/sole.jpg', 1, 'SOLE', 1, 'سمك موسى', 'Sole', 9, NULL, NULL),
(202, 'Sardine', '/img/sardine.png', 1, 'SARDINE', 1, 'سمك السردين', 'Sardine', 9, NULL, NULL),
(203, 'Merlan', '/img/merlan.png', 1, 'MERLAN', 1, 'البياض', 'Whiting', 9, NULL, NULL),
(204, 'Anes', NULL, 1, 'ANES', 0, 'الحمير', 'Donkey', 10, NULL, NULL),
(205, 'Mulet', NULL, 1, 'MULET', 0, 'بغل', 'Mule', 10, NULL, NULL),
(206, 'Cheval', NULL, 1, 'CHEVAL', 0, 'حصان', 'Horse', 10, NULL, NULL),
(207, 'Lait UHT', NULL, 1, 'LAIT UHT', 0, 'الحليب المعقم', 'UHT milk', 10, NULL, NULL),
(208, 'Chamelle d\'elevage', NULL, 1, 'CHAMELLE D\'Ã‰LEVAGE', 0, 'جمل رعوي', 'Breeding camel', 10, NULL, NULL),
(209, 'Bouk', NULL, 1, 'BOUK', 0, '', '', 10, NULL, NULL),
(210, 'Chevre', NULL, 1, 'CHEVRE', 0, 'ماعز', 'Goat', 10, NULL, NULL),
(211, 'Chevre Suitee ou pleine', NULL, 1, 'CHÃˆVRE SUITÃ‰E OU PLEINE', 0, '', '', 10, NULL, NULL),
(212, 'Chevreau/Chevrette', NULL, 1, 'CHEVREAU/CHEVRETTE', 0, 'صغير الماعز', 'kid goat', 10, NULL, NULL),
(213, 'Mouton', NULL, 1, 'MOUTON', 0, 'خروف', 'Sheep', 10, NULL, NULL),
(214, 'Brebis suitée ou pleine', NULL, 1, 'BREBIS SUITÃ‰/PLEINE', 0, 'نعجة', 'Ewe', 10, NULL, NULL),
(215, 'Antenaise', NULL, 1, 'ANTENAISE', 0, '', '', 10, NULL, NULL),
(216, 'Antenais', NULL, 1, 'ANTENAIS ', 0, '', '', 10, NULL, NULL),
(217, 'Agneau/Agnelle', NULL, 1, 'AGNEAU/AGNELLE', 0, 'حمل /انثى الحمل', 'Lamb', 10, NULL, NULL),
(218, 'Toreau pure', NULL, 1, 'TOREAU PURE', 0, 'الثور النقي', 'pure bull', 10, NULL, NULL),
(219, 'Vache pure', NULL, 1, 'VACHE PURE', 0, 'بقرة نقية', 'pure cow', 10, NULL, NULL),
(220, 'Genisse pure', NULL, 1, 'GÃ‰NISSE PURE', 0, 'بقرة صغيرة نقية', 'Pure heifer', 10, NULL, NULL),
(221, 'Taurillon fini pure', NULL, 1, 'TAURILLON FINI PURE', 0, 'ثور شاب نقي منتهي', 'Pure finished bullcalf', 10, NULL, NULL),
(222, 'Taurillon maigre pure', NULL, 1, 'TAURILLON MAIGRE PURE', 0, 'ثور شاب نقي نحيف', 'Pure skinny bullcalf', 10, NULL, NULL),
(223, 'Veau/Velle Pure', NULL, 1, 'VEAU/VELLE PURE', 0, 'عجل/عجلة', 'calf', 10, NULL, NULL),
(224, 'Taureau Ameliore', NULL, 1, 'TOREAU AMÃ‰LIORÃ‰E', 0, 'ثور محسن', 'Improved bull', 10, NULL, NULL),
(225, 'Vache ameliorée', NULL, 1, 'VACHE AMÃ‰LIORÃ‰E', 0, 'بقرة محسنة', 'improved cow', 10, NULL, NULL),
(226, 'Genisse ameliorée', NULL, 1, 'GÃ‰NISSE AMÃ‰LIORÃ‰E', 0, 'بقرة صغيرة محسنة', 'Improved heifer', 10, NULL, NULL),
(227, 'Lait en poudre 1kg', NULL, 1, 'LAIT EN POUDRE 1kg', 0, 'حليب بودرة 1 كيلو', 'Milk powder 1kg', 10, NULL, NULL),
(228, 'Fromage fondu', NULL, 1, 'FROMAGE FONDU', 0, 'جبنة ذائبة', 'Melted cheese', 10, NULL, NULL),
(229, 'Veau/Velle ameliorée', NULL, 1, 'VEAU/VELLE AMÃ‰LIORÃ‰E', 0, 'عجل/عجلة محسن', 'Improved calf', 10, NULL, NULL),
(230, 'Beurre', NULL, 1, 'BEURRE', 0, 'زبدة', 'Butter', 10, NULL, NULL),
(231, 'Vache Locale', NULL, 1, 'VACHE LOCALE', 0, 'بقرة محلية', 'Local Cow', 10, NULL, NULL),
(232, 'Genisse Locale', NULL, 1, 'GÃ‰NISSE LOCALE', 0, 'بقرة صغيرة محلية', 'Local Heifer', 10, NULL, NULL),
(233, 'Taurillon fini local', NULL, 1, 'TAURILLON FINI LOCALE', 0, 'ثور شاب منتهي محلي', 'Local finished bullcalf', 10, NULL, NULL),
(234, 'Taurillon maigre local', NULL, 1, 'TAURILLON MAIGRE LOCALE', 0, 'ثور شاب نحيف محلي', 'Local skinny bullcalf', 10, NULL, NULL),
(235, 'Veau/Velle local', NULL, 1, 'VEAU/VELLE LOCALE', 0, 'عجل/عجلة  محلي', 'Local calf', 10, NULL, NULL),
(236, 'Viande ovine 1ere Qualite', '/img/viande_ovine.png', 1, 'VIANDE OVINE 1ERE QUALITE', 1, 'لحم غنم عالي الجودة', '1st Quality Sheep Meat', 10, NULL, NULL),
(237, 'Viande ovine (autre que 1ere qualite)', NULL, 1, 'VIANDE OVINE (AUTRE QUE 1 ERE QUALITÃ‰)', 0, 'لحم غنم (بخلاف الجودة الأولى)', 'Sheep meat (other than 1st quality)', 10, NULL, NULL),
(238, 'Viande de mouton fraiche', NULL, 1, 'VIANDE DE MOUTON FRAICHE', 0, 'لحم ضأن طازج', 'Fresh mutton meat', 10, NULL, NULL),
(239, 'viande caprine', NULL, 1, 'VIANDE CAPRINE', 0, 'لحم الماعز', 'goat meat', 10, NULL, NULL),
(240, 'viande cameline', NULL, 1, 'VIANDE CAMELINE', 0, 'لحم الجمل', 'camel meat', 10, NULL, NULL),
(241, 'viande bovine fraiche', NULL, 1, 'VIANDE BOVINE FRAICHE', 0, 'لحم بقري طازج', 'fresh beef meat', 10, NULL, NULL),
(242, 'viande bovine 1ere qualite', '/img/bovine.png', 1, 'VIANDE BOVINE 1ERE QUALITE', 1, 'الجودة الأولى لحوم البقر', '1st quality beef meat', 10, NULL, NULL),
(243, 'Veaux', NULL, 1, 'VEAUX', 0, 'العجول', 'Calves', 10, NULL, NULL),
(244, 'Dinde carcasse', NULL, 1, 'DINDE CARCCASE', 0, 'هيكل ديك رومي', 'Turkey carcass', 10, NULL, NULL),
(245, 'Poulet de chair vif', '/img/poulet.png', 1, 'POULET DE CHAIR VIF', 1, 'دجاج التسمين حي', 'Lively broiler chicken', 10, NULL, NULL),
(246, 'Poulet de chaire Carcasse', NULL, 1, 'POULET DE CHAIR CARCASSE', 0, 'هيكل دجاج التسمين', 'broiler chicken carcass', 10, NULL, NULL),
(247, 'Poulet Beldi', NULL, 1, 'POULET BELDI', 0, 'دجاج بلدي', 'Chicken Beldi', 10, NULL, NULL),
(248, 'Œufs petit calibre', NULL, 1, 'OEUFS PETIT CALIBRE', 0, 'بيض عيار صغير', 'Small caliber eggs', 10, NULL, NULL),
(249, 'Œufs gros calibre', NULL, 1, 'OEUFS GROS CALIBRE', 0, 'بيض كبير', 'Large Eggs', 10, NULL, NULL),
(250, 'Œufs calibre moyen', '/img/oeufs.png', 1, 'OEUFS CALIBRE MOYEN', 1, 'بيض متوسط ​​الحجم', 'Medium sized eggs', 10, NULL, NULL),
(251, 'Œufs Beldis', NULL, 1, 'OEUF BELDIS', 0, 'بيض بلدي', 'Beldi eggs ', 10, NULL, NULL),
(252, 'Œufs', NULL, 1, 'Å’UFS', 0, 'بيض', 'Eggs', 10, NULL, NULL),
(253, 'Lait Pasteurisé', NULL, 1, 'LAIT PASTEURISE', 0, 'حليب مبستر', 'Pasteurized milk', 10, NULL, NULL),
(254, 'Beurre (en vrac)', NULL, 1, 'BEURRE (EN VRAC)', 0, 'الزبدة (بكميات كبيرة)', 'Butter (in bulk)', 10, NULL, NULL),
(255, 'Tourteau de soja', NULL, 1, 'TOURTEAU DE SOJA', 0, 'وجبة فول الصويا', 'Soybean meal', 11, NULL, NULL),
(256, 'huile de soja', NULL, 1, 'HUILE DE SOJA', 0, 'زيت الصويا', 'Soya oil', 11, NULL, NULL),
(257, 'huile d\'olive maasra moderne', NULL, 1, 'HUILE OLIVE MAASRA MODERNE', 0, 'زيت زيتون معصرة حديثة', 'modern press\'s olive oil', 11, NULL, NULL),
(258, 'Huile d\'olive maasra semi-moderne', NULL, 1, 'HUILE OLIVE MAASRA SIMI-MODERNE', 0, 'زيت زيتون معصرة شبه حديثة', 'Semi-modern press\'s olive oil', 11, NULL, NULL),
(259, 'Huile d\'olive maasra traditionnelle', NULL, 1, 'HUILE OLIVE MAASRA TRADITIONNELLE', 0, 'زيت زيتون معصرة تقليدية', 'traditional press\'s olive oil', 11, NULL, NULL),
(260, 'concentré de tomates', NULL, 1, 'CONCENTRÃ‰ DE TOMATES', 0, 'معجون الطماطم', 'tomato puree', 11, NULL, NULL),
(261, 'confiture', NULL, 1, 'CONFITURES', 0, 'مربى', 'jam', 11, NULL, NULL),
(262, 'conserve', NULL, 1, 'CONSERVE', 0, 'طعام معلب', 'canned food', 11, NULL, NULL),
(263, 'thé vert Sultan', NULL, 1, 'ThÃ© vert Sultan', 0, 'شاي الأخضر سلطان', 'Sultan green tea', 11, NULL, NULL),
(264, 'Thé vert 250g', NULL, 1, 'ThÃ© vert 250g', 0, 'شاي أخضر 250 جرام', 'Green tea 250g', 11, NULL, NULL),
(265, 'Pâtes alimentaires', '/img/pates.png', 1, 'PATESALIMENTAIRES', 1, 'معجنات', 'Pasta', 11, NULL, NULL),
(266, 'Sucre Lingot (DH/KG)', '/img/morceau-de-sucre.png', 1, 'SUCRE LINGO (DH/KG)', 1, 'سكر سبائك (درهم / كجم)', 'Sugar Ingot (DH/KG)', 11, NULL, NULL),
(267, 'Sucre Granulé (DH/KG)', NULL, 1, 'SUCRE GRANULE DH/KG', 0, 'سكر حبيبات (DH / KG)', 'Granulated Sugar (DH/KG)', 11, NULL, NULL),
(268, 'Pain Sucré', NULL, 1, 'PAIN SUCRE', 0, 'خبز حلو', 'Sweet Bread', 11, NULL, NULL),
(269, 'Semoule de blé dur', '/img/smouleBleDur.png', 1, 'SEMOULE DE BLÃ‰ DUR', 1, 'سميد القمح الصلب', 'Semolina', 11, NULL, NULL),
(270, 'Riz rond', '/img/riz_rond.png', 1, 'RIZ ROND', 1, 'أرز دائري', 'Round rice', 11, NULL, NULL),
(271, 'Huile de table', '/img/huileTable.png', 1, 'HUILE DE TABLE', 1, 'زيت المائدة', 'Table oil', 11, NULL, NULL),
(272, 'Semoule de blé', NULL, 1, 'SEMOULE DE BLE', 0, 'سميد القمح', 'Wheat semolina', 11, NULL, NULL),
(273, 'Farine de luxe', '/img/farine.png', 1, 'FARINE DE LUXE', 1, 'دقيق فاخر', 'luxury flour', 11, NULL, NULL),
(274, 'concentré de tomates', '/img/concentreTomate.png', 1, 'CONCENTRE DE TOMATE', 1, 'معجون الطماطم', 'tomato puree', 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_id_unique` (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
