-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2017 at 01:01 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7
Create Database babybook;
use babybook;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `child_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `skill_group_id` int(11) NOT NULL,
  `age` double DEFAULT NULL,
  `learned` enum('Pass','Fail','No_opportunity','Refusal') CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `checked_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `child_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `default_image` int(11) DEFAULT NULL,
  `is_parent` tinyint(1) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birth_weight` int(11) DEFAULT NULL,
  `birth_length` double DEFAULT NULL,
  `apgar_score` varchar(10) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `genetical_disorders` varchar(240) DEFAULT NULL,
  `other_disorders` varchar(240) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cm_id` int(11) NOT NULL,
  `ds_id` int(11) NOT NULL,
  `cm_body` text NOT NULL,
  `cm_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usr_id` int(11) NOT NULL,
  `cm_is_active` int(1) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT '0',
  `dislike_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `ds_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `ds_title` varchar(255) NOT NULL,
  `ds_link` text,
  `ds_body` text NOT NULL,
  `ds_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ds_is_active` int(1) NOT NULL,
  `like_num` int(11) NOT NULL DEFAULT '0',
  `dislike_num` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `child_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `age` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `language_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ds_id` int(11) DEFAULT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `type` enum('0','1') NOT NULL,
  `ratings_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'parent'),
(2, 'expert'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `child_id1` int(11) DEFAULT NULL,
  `child_id2` int(11) DEFAULT NULL,
  `twins` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `passed25pct` double DEFAULT NULL,
  `passed50pct` double DEFAULT NULL,
  `passed75pct` double DEFAULT NULL,
  `passed90pct` double DEFAULT NULL,
  `skill_group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `passed25pct`, `passed50pct`, `passed75pct`, `passed90pct`, `skill_group_id`) VALUES
(1, 0, 0, 0, 0, 1),
(2, 0.5, 0.8, 1.2, 1.5, 1),
(3, 0, 0.61, 1.4, 2.1, 1),
(4, 0.8, 2.1, 3.1, 4, 1),
(5, 4.1, 4.7, 5.3, 5.9, 1),
(6, 4.8, 5.4, 5.9, 6.5, 1),
(7, 7.1, 9.2, 10.4, 11.4, 1),
(8, 7.2, 9.1, 11, 12.9, 1),
(9, 6.7, 7.7, 9.2, 14, 1),
(10, 9.5, 10.6, 11.9, 15.7, 1),
(11, 10.1, 11, 12.5, 16, 1),
(12, 8.8, 12.7, 15.2, 17.1, 1),
(13, 12.6, 14.2, 15.8, 17.3, 1),
(14, 12.8, 15.2, 17.5, 19.9, 1),
(15, 13.3, 16.8, 20.4, 23.9, 1),
(16, 14.8, 16.9, 19.2, 24, 1),
(17, 20.5, 23.5, 26.4, 30, 1),
(18, 16.1, 21.3, 26.4, 32.4, 1),
(19, 19.2, 21.8, 27.6, 37.2, 1),
(20, 26.4, 30, 33.6, 37.2, 1),
(21, 27.6, 31.2, 36, 40.8, 1),
(22, 36, 42, 48, 54, 1),
(23, 32.4, 37.2, 51.6, 58.8, 1),
(24, 31.2, 40.8, 50.4, 60, 1),
(25, 36, 44.4, 52.8, 61.2, 1),
(26, 0, 0, 0.3966, 1.3, 2),
(27, 0.63, 0.8866, 1.9, 2.8, 2),
(28, 2.6, 3.3, 3.7, 3.9, 2),
(29, 2.2, 2.5, 2.9, 4, 2),
(30, 2.2, 3, 3.8, 4.5, 2),
(31, 2.8, 3.6, 4.4, 5.2, 2),
(32, 4.3, 4.7, 5.2, 5.6, 2),
(33, 4.9, 5.7, 6.5, 7.2, 2),
(34, 5.7, 6, 6.6, 7.3, 2),
(35, 5.1, 6, 6.8, 7.7, 2),
(36, 5.7, 6.2, 7.1, 9.1, 2),
(37, 7.2, 8.2, 9.2, 10.2, 2),
(38, 6.7, 7.6, 10, 10.9, 2),
(39, 9.8, 11.1, 12.4, 13.8, 2),
(40, 1.7, 13.2, 14.8, 16.3, 2),
(41, 2.8, 14.3, 15.7, 19.4, 2),
(42, 3.5, 14.8, 17.1, 20.6, 2),
(43, 6.5, 19.2, 22, 23.8, 2),
(44, 9.6, 22, 24, 31.2, 2),
(45, 25.2, 28.8, 33.6, 38.4, 2),
(46, 3.7, 26.4, 32.4, 42, 2),
(47, 30, 34.8, 39.6, 43.2, 2),
(48, 37.2, 40.8, 44.4, 48, 2),
(49, 39.6, 44.4, 50.4, 55.2, 2),
(50, 39.6, 42, 49.2, 56.4, 2),
(51, 34.8, 39.6, 48, 63.6, 2),
(52, 48, 54, 60, 64.8, 2),
(53, 49.2, 55.2, 61.2, 67.2, 2),
(54, 56.4, 62.4, 68.4, 73.2, 2),
(55, 0, 0, 0, 0, 3),
(56, 0, 0, 0, 0.77, 3),
(57, 0.63, 1.1, 1.6, 2.7, 3),
(58, 1.3, 1.9, 2.5, 3.1, 3),
(59, 1.2, 1.7, 2.8, 4.3, 3),
(60, 2.8, 3.8, 4.7, 5.6, 3),
(61, 3.6, 4.6, 5.6, 6.6, 3),
(62, 4.7, 5.6, 6.6, 7.5, 3),
(63, 3, 5.2, 6, 8.8, 3),
(64, 5.7, 6.5, 7.7, 9.1, 3),
(65, 5.8, 6.5, 7.4, 10.1, 3),
(66, 5.7, 6.9, 8.3, 12.1, 3),
(67, 6.9, 9.3, 11, 13.3, 3),
(68, 9.7, 11.5, 13.3, 15, 3),
(69, 10.7, 12.6, 14.6, 16.5, 3),
(70, 11.5, 13.6, 15.8, 18, 3),
(71, 13.7, 16.3, 18.8, 21.4, 3),
(72, 17.3, 19, 20.9, 23.6, 3),
(73, 17.2, 19.8, 22.4, 25.2, 3),
(74, 18.3, 19.9, 23.9, 27.6, 3),
(75, 18.5, 19.8, 22.6, 28.8, 3),
(76, 20, 21.8, 25.2, 30, 3),
(77, 17.2, 20, 25.2, 34.8, 3),
(78, 23.3, 27.6, 31.2, 34.8, 3),
(79, 23.5, 28.8, 33.6, 38.4, 3),
(80, 30, 32.4, 36, 43.2, 3),
(81, 28.8, 33.6, 39.4, 44.4, 3),
(82, 31.2, 36, 40.8, 45.6, 3),
(83, 33.6, 38.4, 42, 46.8, 3),
(84, 33.6, 37.2, 40.8, 49.2, 3),
(85, 30, 32.4, 38.4, 50.4, 3),
(86, 23.4, 27.6, 39.6, 50.4, 3),
(87, 32.4, 36, 45.6, 56.4, 3),
(88, 36, 43.2, 50.4, 57.6, 3),
(89, 39.6, 45.6, 55.2, 63.6, 3),
(90, 34.8, 38.4, 45.6, 63.6, 3),
(91, 49.2, 54, 60, 64.8, 3),
(92, 43.2, 51.6, 60, 68.4, 3),
(93, 46.8, 56.4, 64.8, 73.2, 3),
(94, 0, 0, 0, 0, 4),
(95, 0, 0, 0, 0, 4),
(96, 0, 0.86, 1.8, 2.7, 4),
(97, 1.5, 2.2, 2.9, 3.6, 4),
(98, 1.6, 2.3, 3, 3.7, 4),
(99, 1.7, 2.6, 3.6, 4.4, 4),
(100, 2.6, 3.3, 4, 4.6, 4),
(101, 2.1, 3.2, 4.3, 5.4, 4),
(102, 2.8, 3.4, 4.1, 6.2, 4),
(103, 5.4, 5.9, 6.3, 6.8, 4),
(104, 6.5, 7.2, 7.8, 8.5, 4),
(105, 7.8, 8.4, 9.1, 9.7, 4),
(106, 7.6, 8.4, 9.1, 9.9, 4),
(107, 9.4, 10.2, 10.9, 11.6, 4),
(108, 10.4, 11.5, 12.5, 13.7, 4),
(109, 11, 12.2, 13.4, 14.6, 4),
(110, 11.1, 12.3, 13.6, 14.9, 4),
(111, 12.3, 13.8, 15.2, 16.6, 4),
(112, 13.8, 15.8, 17.8, 19.9, 4),
(113, 14.1, 16.6, 19.1, 21.6, 4),
(114, 15.9, 18.3, 20.8, 23.2, 4),
(115, 21.4, 23.8, 26.4, 28.8, 4),
(116, 17.1, 20.3, 23.8, 34.8, 4),
(117, 28.8, 32.4, 34.8, 38.4, 4),
(118, 27.6, 30, 33.6, 40.8, 4),
(119, 31.2, 37.2, 42, 48, 4),
(120, 38.4, 42, 46.8, 50.4, 4),
(121, 32.4, 39.6, 46.8, 56.4, 4),
(122, 42, 48, 54, 61.2, 4),
(123, 44.4, 51.6, 58.8, 64.8, 4),
(124, 48, 55.2, 61.2, 68.4, 4),
(125, 50.4, 57.6, 64.8, 70.8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `skill_groups`
--

CREATE TABLE `skill_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_groups`
--

INSERT INTO `skill_groups` (`id`, `name`) VALUES
(1, 'Personal-Social'),
(2, 'Fine Motor - Adaptive'),
(3, 'Language'),
(4, 'Gross Motor');

-- --------------------------------------------------------

--
-- Table structure for table `skill_group_languages`
--

CREATE TABLE `skill_group_languages` (
  `lang_id` int(11) DEFAULT NULL,
  `skill_group_id` int(11) DEFAULT NULL,
  `skill_group_name` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skill_language`
--

CREATE TABLE `skill_language` (
  `skill_lang_id` int(11) NOT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_language`
--

INSERT INTO `skill_language` (`skill_lang_id`, `lang_id`, `skill_id`, `name`, `description`) VALUES
(1, 2, 1, 'Arcot néz', 'Gyermeket hátára fektetni. A vizsgáló hajoljon arccal a\r\ngyermek fölé 30—40 cm távolságra.\r\nÉrtékelés: Elfogadható, ha a gyermek kifejezetten ránéz a\r\nvizsgálóra vagy akármilyen módon megváltoztatja tevékenységét.'),
(2, 2, 2, 'Visszamosolyog', 'Bejelentés alapján is elfogadható. Mosolygunk és beszélünk a gyermekhez. Nem érünk hozzá.\r\nÉrtékelés: Elfogadható, ha a gyermek visszamosolyog. Ha ez\r\nnem sikerül, megkérdezzük a szülőt, hogy mosolyog-e anélkül,\r\nhogy megérintenék.'),
(3, 2, 3, 'Spontán mosolyog', 'Szülő bemondása alapján is elfogadható. A vizsgálat alatt meg\r\nkell figyelni, hogy a gyermek mosolyog-e a vizsgálóra, vagy\r\na szülőre minden érintési vagy hanginger nélkül.\r\nÉrtékelés: Elfogadható, ha a gyermek bármikor a vizsgálat\r\nalatt magától mosolyog. Ha ez nem látható, kérdezzük meg a\r\nszülőt <q>Mosolyog-e a gyermek anélkül, hogy hozzáérne vagy szólna hozzá?</q>'),
(4, 2, 4, 'Saját kezét nézi', 'A vizsgálat alatt figyeljük meg, ha a gyerek a saját kezére néz legalább néhány\r\nmásodpercig, nem csak rápillant véletlenül. Ha ez nem látható kérdezzük meg a szülőt,\r\nhogy csinált-e ilyent a gyermek.\r\nÉrtékelés: Elfogadható, ha a szülő igennel válaszol vagy a vizsgálat közben ezt tette a gyermek.'),
(5, 2, 5, 'Erőfeszítést tesz játék megszerzésére', 'Egy játékot, ami a gyermeknek tetszik, tegyük az asztalra egy\r\nkicsit messzebbre, mint ahogy eléri. Nem szabad túl sokáig\r\notthagyni és nem szabad túl messzire tenni. Ez megzavarhatja a gyermeket.'),
(6, 2, 6, 'Darabosat eszik egyedül', 'Szülő bemondása alapján is elfogadható. Meg kell kérdezni,\r\nhogy eszik-e a gyermek egyedül ropogós süteményt, pl. keksz, kiflivég, babapiskóta.\r\nÉrtékelés: Elfogadható, ha a szülő azt mondja, hogy a gyermek\r\nképes erre. <q>Nincs lehetőség</q> ha valamilyen okból nem kapott.\r\n'),
(7, 2, 7, 'Tapsi-tapsit játszik', 'Szülő bemondása is elfogadható. Próbájuk rávenni, hogy\r\ntapsikoljon. Ne érintsük meg a gyermek kezét vagy karját.\r\nÉrtékelés: Jó, ha a gyermek reagál erre. Ha ezt nem látjuk,\r\nkérdezzük meg a szülőt, játszik-e ilyen játékokat a gyermek,\r\nanélkül, hogy a szülő mozgatná a gyerek karját vagy kezét.'),
(8, 2, 8, 'Kíváncsiságot fejez ki (bőgés nélkül)', 'Bemondásra el lehet fogadni. Kérdezzük meg a szülőt, hogy a\r\ngyermek hogyan közli a kívánságait. (Pl. \'Hogyan tudatja\r\nönnel a gyermek, hogy egy pohár vizet vagy egy játékot kér?)\r\nÉrtékelés: Jó, ha a gyermek rámutat arra, amit akar, ráncigálja a felnőttet\r\nvagy mond egy szót (Sírás nem fogadható el.)\r\n'),
(9, 2, 9, 'Pápát integet', 'Ha lehetséges, akkor hajtsuk végre ezt, amikor a szülő és a gyermek vagy\r\na vizsgáló menni készül. Forduljon a gyermekhez és mondja, hogy pápá, miközben\r\ninteget neki. Ne érintsük a gyermek kezét vagy karját. Ha a gyermek nem reagál\r\nkérdezze meg a szülőt, hogy szokott-e pápát integetni.\r\nÉrtékelés: Jó, ha a gyermek reagál integetéssel vagy a szülő azt válaszolja, hogy szokott\r\nintegetni.'),
(10, 2, 10, 'Labdázik a vizsgálóval', 'Gurítsunk labdát a gyermeknek és próbáljuk elérni, hogy visszadobja vagy gurítsa.\r\nÉrtékelés: Jó, ha a gyermek gurítja vagy löki a labdát a\r\nvizsgáló felé. (Ha a kezébe adja, nem elfogadható.)'),
(11, 2, 11, 'Házimunkát utánoz', 'Szülő bemondása is jó. Kérdezzük meg a szülőt, utánoz-e a\r\ngyermek házimunkát, pl.: portörlés vagy söprés.\r\nÉrtékelés: Jó, ha a gyermek bármilyen fajta házimunkát\r\nutánoz.\r\n'),
(12, 2, 12, 'Csészéből iszik', 'Bemondásra el lehet fogadni. Kérdezzük meg a szülőt, hogy a\r\ngyermek meg tudja-e fogni a csészét vagy poharat és úgy inni\r\nbelőle, hogy ne sok menjen mellé.\r\nÉrtékelés: Jó, ha meg tudja csinálni (A csészének ne legyen\r\ncsőre.)\r\n'),
(13, 2, 13, 'Egyszerű házimunkában segít', 'Bemondás is jó. Kérdezzük meg a szülőt, hogy a gyermek segít-e\r\negyszerű dolgokban otthon, pl. eltenni a játékait vagy odahoz-e valamit,\r\nha a szülő kéri.\r\nÉrtékelés: Jó, ha a gyermek bármit segít otthon.'),
(14, 2, 14, 'Kanalat/villát használ', 'Szülő bemondása is jó. Kérdezzük meg a szülőt, eszik-e a\r\ngyermek kanállal, vagy villával, és ha igen mennyi megy mellé.\r\nÉrtékelés: Jó, ha a gyermek tud kanállal vagy villával ételt\r\ntenni a szájába és nem sok megy mellé.'),
(15, 2, 15, 'Vetkőzik', 'Szülő bemondása elfogadható. Kérdezzük meg a szülőt, hogy a\r\ngyermek le tudja-e venni valamilyen ruhadarabját: pl. kabátot, cipőt, alsóneműjét.\r\nÉrtékelés: Jó, ha a gyermek le tudja venni ruhadarabját,\r\nde sapka, zokni, pelenka nem számít.'),
(16, 2, 16, 'Babát etet', 'Helyezzünk egy babát és egy játék cumisüveget az asztalra a gyermek elé. Mondjuk\r\nneki, hogy etesse meg a babát vagy hogy adja a babának a cumit.\r\nÉrtékelés: Jó, ha a gyermek a baba szájához teszi a cumit vagy egyértelműen\r\nmegpróbálja a szájába tenni. Ha szoptatást utánoz bátorítsuk, hogy használja az \r\nüveget. A szoptatás magában nem átmenő értékelés.'),
(17, 2, 17, 'Ruhadarabot vesz magára', 'Bemondás is jó. Kérdezzük meg a szülőt, hogy a gyermek\r\nfel tudja-e venni valamilyen ruhadarabját, pl. alsónadrág, zokni, cipő.\r\nÉrtékelés: Jó, ha a gyermek akármilyen saját ruhadarabját\r\nfel tudja venni. Nem kell befűzni a cipőt és nem kell a megfelelő láb.\r\n(Rossz, ha a gyermek csak felnőtt méretű ruhát tud felvenni.)'),
(18, 2, 18, 'Fogat mos segítséggel', 'Kérdezzük meg a szülőt, hogy meg tudja-e mosni a fogát egy kis segítséggel.\r\nHa igen, kérdezzük meg, hogyan csinálja.\r\nÉrtékelés: Jó, ha a gyermek tartja a fogkefét és súroló mozgással húzza végig \r\na fogain. A szülő segíthet a fogkefe irányításában, de a nagyrészét a gyerek kell\r\nvégezze. A szülő rakhatja a fogkrémet a fogkefére. Jelölje be a <q>Nincs lehetőség</q>\r\nopciót, ha a szülő nem engedte a gyermeknek, hogy kipróbálja ezt.'),
(19, 2, 19, 'Mossa és törli kezeit', 'Bemondás is jó. Kérdezzük meg a szülőt, hogy a gyermek meg\r\ntudja-e mosni és törölni a kezét.\r\nÉrtékelés: Csak akkor jó, ha mindkét feladatnak minden részét\r\nel tudja végezni segítség nélkül, kivéve a csapok kinyitását,\r\nha nem éri el őket. A kéz ne maradjon szappanos és legyen\r\nmajdnem teljesen száraz.'),
(20, 2, 20, 'Barát megnevezése', 'Kérjük meg a gyermeket, hogy nevezze meg egy pár barátját, játszópajtását,\r\nolyant, aki nem vele él.\r\nÉrtékelés: Jó, ha a gyermek elmondja a keresztnevét legalább egy barátnak.\r\nTestvérek vagy unokatestvérek nevei nem számítanak, ha együtt élnek a gyermekkel.\r\nKisállatok vagy képzeletbeli barátok nevei sem számítanak.'),
(21, 2, 21, 'Blúz felvevése', 'Kérdezzük meg a szülőt, hogy fel tudja-e venni a gyermek segítség nélkül blúzát.\r\nÉrtékelés: Jó, ha a gyermek fel tudja venni a blúzát. Nem baj, ha a blúz fordítva van.'),
(22, 2, 22, 'Irányítás nélkül öltözik', 'Bemondás is jó. Kérdezzük meg a szülőt, tud-e a gyermek\r\nöltözködni segítség nélkül.\r\nÉrtékelés: Jó, ha teljesen és helyesen fel tud öltözni\r\nsegítség nélkül. Segíteni csak a cipőfűzésnél szabad és\r\nlányoknál ha hátul van gomb vagy cipzár.'),
(23, 2, 23, 'Társasjátékot/kártyajátékot játszik', 'Kérdezzük meg a szülőt, hogy szokott-e a gyermek egyszerű társas- vagy kártyajátékokat\r\njátszani, például <q>Amerikai hetes</q> vagy <q>Ember ne mérgelődj</q>. Emeljük ki, hogy a gyermeknek\r\nértenie kell a játékszabályokat és tényleg játszania kell.\r\nÉrtékelés: Jó, ha a szülő azt mondja, hogy tényleg érti a játékszabályokat a gyermek\r\nés játszik másokkal, körökre osztva.'),
(24, 2, 24, 'Segítség nélkül fogat mos', 'Kérdezzük meg a szülőt, hogy meg tudja-e mosni a gyermek a fogát segítség vagy \r\nfelügyelet nélkül, beleszámítva a fogkrém fogkefére rakását és a fog megmosását.\r\nÉrtékelés: Jó, ha a szülő igennel válaszol.'),
(25, 2, 25, 'Müzli előkészítése', 'Kérdezzük meg a szülőt, hogy elő tudja-e készíteni a gyermek a müzlit segítség nélkül\r\n(kivéve a nehezen elérhető tárgyak, pl. tányér, odaadását). A gyermek elő kell tudja\r\nvenni a tányért, kanalat, tejet és müzlit, beletölteni a tálba a müzlit és a tejet, anélkül,\r\nhogy sokat mellé öntene. \r\nÉrtékelés: Átmegy, ha a szülő szerint meg tudja csinálni a gyermek.'),
(26, 2, 26, 'Középpontig követ ', 'A gyermeket a hátára fektetjük. (Ebben a korban az arcát\r\negyik vagy másik oldalra fordítja. A piros fonalat a gyermek \r\narca elé tartjuk kb. 15 cm távolságban. Megrázzuk, hogy\r\nfelhívjuk a gyermek figyelmét rá, majd lassan ívben, ill.\r\nfélkörösen a gyermek közepe fölött a másik oldalra hozzuk.\r\nMeg lehet állni, hogy ismét megragadjuk a gyermek figyelmét,\r\naztán folytatjuk az ívet. Háromszor ismételhető - figyeljük\r\nközben a gyermek fejének és szemének mozgását.\r\nÉrtékelés: Megfelelő, ha a gyermek az ív középpontjáig követi a fonalat csak a szemével, \r\nvagy a fejével és a szemével is. Győződjünk meg róla, hogy a gyermek felfigyel-e a fonalra és\r\nnem követte, ebben az esetben az értékelés negatív.'),
(27, 2, 27, 'Követ a középvonalon túl', 'A gyermeket a hátára fektetjük, a piros fonalat 15 cm-re\r\naz arca elé tartjuk. Megrázzuk, hogy a gyermek felfigyeljen rá, \r\nmajd lassan ívben a gyermek közepe fölött áthúzzuk a másik\r\noldalra. Meg lehet állítani, hogy a gyermek ismét figyeljen,\r\nés aztán folytatni az ívet. Háromszor meg lehet csinálni:\r\nfigyelni a gyermek fej és szem mozgását.\r\nÉrtékelés: Jó, ha a gyermek az ív közepén túl követi a fonalat\r\nszemmel, vagy fejjel és szemmel is. Meggyőződünk róla, hogy felfigyelt-e a\r\nfonalra és nem követte - ebben az esetben az eredmény negatív.'),
(28, 2, 28, 'Megragadja a csörgőt ', 'Ha a gyermek az asztalon fekszik a hátán, vagy a szülő fogja\r\na karjában, tegyünk le egy csörgőt úgy, hogy érintse a gyermek\r\nujjainak hegyét vagy hátát.\r\nÉrtékelés: Jó, ha a gyermek néhány másodpercre megragadja a csörgőt.'),
(29, 2, 29, 'Kezek összeérnek', 'Bemondásra elfogadható. Figyeljük, hogy a gyerek összeérinti-e\r\na kezét teste közepének magasságában. Ha nem lehet  látni, \r\nkérdezzük meg a szülőt, hogy megtette-e.\r\nÉrtékelés: Megfelel, ha a gyermek összeérinti az ujjait a teste \r\nközepének magasságában. Nem fogadható el, ha ez csak akkor\r\ntörténik, ha a szülő a karjában tartja és a kezeit összeteszi.\r\n'),
(30, 2, 30, '180 fokig követ', 'A gyermek a hátán fekszik. A fonalat 15 cm-re tartjuk az arca\r\nelé. Megrázzuk, hogy felfigyeljen rá, majd lassan ívben a\r\ngyermek egyik oldaláról a másikra húzzuk a gyermek közepe\r\nfölött. Meg lehet állni és aztán folytatni az ívet, hogy a\r\ngyermek ismét felfigyeljen. Háromszor meg lehet ismételni\r\na műveletet és figyelni a gyermek fejének és szemének mozgását.\r\nÉrtékelés: Jó, ha a gyermek fejjel és szemmel is követi a teljes ívet egyik oldaltól a másikig.'),
(31, 2, 31, 'Nézi a mazsolát', 'A gyermeket úgy tartsa a szülő az ölében, hogy a kezeit az asztalra tudja tenni. \r\nEjtsünk le egy mazsolát a gyermek előtt, hogy könnyen elérhesse. \r\n(Olyan felületre kell ejteni, amin jól látszik, pld. fehér papírra). A vizsgáló rámutathat a mazsolára, \r\nvagy hozzáérhet, hogy a gyermek figyelmét felkeltse.\r\nNézzük, hogy ránéz-e a gyermek a mazsolára.\r\nÉrtékelés: Megfelelő, ha a gyermek a mazsolára néz. (Nem jó, ha a mutató kézre, vagy ujjakra néz.)\r\n'),
(32, 2, 32, 'Tárgy után nyúl', 'Bemondásra elfogadható. A gyermeket úgy tartsa a szülő ölben,\r\nhogy a könyöke egy vonalban legyen az asztallappal és így\r\nkönnyen az asztalra tudja tenni a kezét. (Egy játékot, pld. a csörgőt) az asztalra tesszük\r\na gyermek számára elérhető távolságban és azt mondjuk, hogy vegye fel.\r\nÉrtékelés: Jó, ha a játék után nyúl. Nem kell, hogy elérje,\r\nvagy felvegye. Ha nem derül ki, kérdezzük meg a szülőt, hogy tett-e a gyermek ilyent.'),
(33, 2, 33, 'Ülve nézi a fonalat', 'Amíg a gyermek a szülő ölében ül, mutassuk meg neki a piros\r\nfonalat. Ha ránéz, ejtsük úgy el, hogy kiessen a látóköréből.\r\nA vizsgáló ne mozdítsa a karját vagy kezét, csak a fonalat\r\nengedje el.\r\nÉrtékelés: Jó, ha a gyermek továbbra is arra néz, amerre\r\neltűnt a fonal, vagy megpróbálja megnézni, hova lett.\r\n'),
(34, 2, 34, 'Gereblyéző kézmozdulattal eléri a mazsolát', 'A gyermek a szülő ölében ül, úgy hogy a kezét az asztalra\r\ntudja tenni. Leejtünk egy mazsolát a gyermek előtt, elérhető\r\ntávolságban. (Jól látható felületre ejtsük, pl. fehér papírra). \r\nA vizsgáló rámutathat vagy megérintheti a mazsolát,\r\nhogy a gyermek odafigyeljen. Figyeljük, hogyan veszi fel.\r\nÉrtékelés: Jó, ha a gyermek gereblyéző mozdulattal felveszi\r\na mazsolát. Győződjünk meg róla, hogy nem azért tudta felvenni,\r\nmert ragadnak az ujjai. Az is jó, ha mutató és hüvelykujjával\r\nvagy csipesz-szerű fogással veszi fel.'),
(35, 2, 35, 'Kockát egyik kézből a másikba rakja', 'Bemondásra elfogadható. Figyeljük meg, hogy a gyermek egyik\r\nkezéből a másikba teszi-e a kockát. Ezt úgy lehet előidézni,\r\nhogy a vizsgáló egy kockát ad a gyermeknek és aztán egy másodikat \r\nugyanabba a kézbe akar adni, amelyikben már van egy.\r\nA gyermek gyakran átteszi a kockát a másik kezébe, hogy a másodikat elvehesse. \r\nÉrtékelés: Jó, ha a gyermek a másik kezébe átteszi a kockát és ehhez\r\nnem használja a száját, a testét vagy az asztalt. Ha ez nem látható, kérdezzük meg a szülőt, \r\nhogy nem szokott-e a gyermek kis tárgyakat egyik kezéből a másikba áttenni.\r\n(Hosszú tárgyak, pld. kanál vagy nyeles csörgő nem számít.)'),
(36, 2, 36, 'Ülve fog két kockát', 'Bemondásra megfelel. Tegyünk két kockát az asztalra a gyermek elé. Mondjuk neki szavakkal, vagy\r\njelezzük mozdulatokkal, hogy vegye fel a kockákat, ne adjuk oda neki.\r\nÉrtékelés: Megfelel, ha a gyermek felvesz 2 kockát és egyet\r\ntart egy-egy kezében egyszerre. Ha nem csinálja, kérdezzük\r\nmeg a szülőt, hogy felvesz-e a gyermek két tárgyat ilyen módon.'),
(37, 2, 37, 'Csipeszfogás', 'A gyermeket úgy tartsa a szülő ölében, hogy kezét az asztalra tudja tenni.\r\nLeejtünk egy mazsolát a gyermek előtt könnyen elérhető távolságban. (Jól látható felületre, hozzá\r\nis érhet, hogy figyelmét felhívja a gyermeknek. Nézzük, hogyan veszi fel.\r\nÉrtékelés: Jó, ha a gyermek úgy veszi fel a mazsolát, hogy a\r\nhüvelykujját és egy másik ujját összehozva használja. A csipeszfogás is jó.'),
(38, 2, 38, 'Egymáshoz ütögeti a kezében tartott kockákat', 'Bemondásra elfogadható.\r\nA gyermek mindkét kezébe kockát teszünk. A vizsgáló biztathatja a gyermeket,\r\nhogy üsse őket, mutatva a mozdulatot, de nem nyúlhat a gyermek kezéhez és\r\nnem ütögetheti helyette.\r\nMegmutatni a saját kezével lehet, a gyermekével nem.\r\nÉrtékelés: Elfogadható, ha a gyermek önmaga előtt összeüti a\r\nkockákat. Ha nem derül ki, kérdezzük meg a szülőt, hogy összeütött-e már e gyermek játékokat így.'),
(39, 2, 39, 'Kockát pohárba tesz', 'Tegyünk 3 kockát és egy poharat az asztalra a gyermek elé. Bátorítsuk, hogy tegye a kockákat\r\na pohárba szavakkal vagy mutatással. Többször is meg lehet ismételni a bemutatást.\r\nÉrtékelés: Jó, ha a gyermek legalább egy kockát a pohárba tesz és elengedi.'),
(40, 2, 40, 'Spontán firkál', 'Bemondásra elfogadható. Egy darab papírt és egy ceruzát a gyermek elé rakunk az asztalon \r\nelérhető távolságban. A vizsgáló a gyermek kezébe is adhatja a ceruzát.\r\nÉrtékelés: Megfelel, ha a gyermek egy vagy két jelet céltudatosan csinál a papíron. \r\n(Nem fogadható el a véletlenül húzott jel vagy a papír döfködése.) Ha nem firkál, kérdezzük meg\r\na szülőt, hogy firkál-e a gyermek segítség nélkül.'),
(41, 2, 41, 'Mazsolát üvegből kiborít bemutatás után', 'Először nézzük meg, hogy a gyerek megcsinálja-e spontánul.\r\nTegyünk egy mazsolát az üvegbe és mondjuk a gyermeknek, hogy szedje ki.\r\nHa nem 9nti ki magától, megmutatjuk neki kétszer-háromszor.\r\nÉrtékelés: Jó, ha kiönti a mazsolát az üvegből, vagy magától,\r\nvagy miután megmutatták neki, hogyan kell. (Ha közvetlenül\r\nszájába önti, vagy ujjal kaparja ki az üvegből, nem fogadható el.)\r\n'),
(42, 2, 42, 'Torony két kockából', 'Kockákat teszünk az asztalra a gyermek elé. A vizsgáló biztathatja, hogy tegye őket egymásra,\r\namilyen magasra tudja. Meg lehet mutatni, hogy kell és/vagy a kezébe is lehet adni a kockákat.\r\n(A nagyon fiatal gyermeket megzavarhatja a sok kocka és könnyebben teljesíti a feladatot,\r\nha egyszerre csak egy kockát kap.) Háromszor próbálkozhat.\r\nÉrtékelés: Megfelelő, ha a gyermek egy kockát úgy tesz a másikra, hogy nem esik le.'),
(43, 2, 43, 'Torony négy kockából', 'Kockákat helyezünk a gyermek elé az asztalra. A vizsgáló biztatja, hogy tegye őket egymásra,\r\namilyen magasra csak tudja. Megmutatja, hogy kell és/vagy odaadja neki a kockákat.\r\nHáromszor próbálkozhat a gyermek.\r\nÉrtékelés: Jó, ha négy kockát úgy tesz egymásra, hogy nem esnek le.'),
(44, 2, 44, 'Torony hat kockából', '6 kockát teszünk a gyermek elé az asztalra. A vizsgáló bíztathatja, hogy tegye őket egymásra, amilyen\r\nmagasra csak tudja. Megmutatja, hogy és/vagy odaadja neki a kockákat.\r\nHáromszor próbálkozhat.\r\nÉrtékelés: Jó, ha a gyermek 6 kockát úgy egyensúlyoz egymáson, hogy nem esnek le.'),
(45, 2, 45, 'Függőleges vonalat utánoz (30 fokon belül)', 'A gyermeket úgy ültetjük az asztalhoz, hogy kényelmesen írhasson. Papírt és ceruzát teszünk eléje,\r\nés azt mondjuk, hogy rajzoljon olyan vonalakat, mint a vizsgáló. Megmutatjuk, hogy kell függőlegeseket\r\nrajzolni. Vigyázzunk, hogy a vonal a gyermek számára valóban függőleges helyzetbe legyen. Nem \r\nvezetjük a gyermek kezét.\r\nÉrtékelés: Jó, ha a gyermek egy vagy több, legalább 2,5 cm hosszú vonalat húz, ami nem tér el több,\r\nmint 30 fokkal a függőlegestől. Nem kell, hogy teljesen egyenes vonalak legyenek.'),
(46, 2, 46, 'Torony nyolc kockából', '8 kockát teszünk a gyermek elé az asztalra. A vizsgáló bíztathatja, hogy tegye őket egymásra, amilyen\r\nmagasra csak tudja. Megmutatja, hogy és/vagy odaadja neki a kockákat.\r\nHáromszor próbálkozhat.\r\nÉrtékelés: Jó, ha a gyermek 8 kockát úgy egyensúlyoz egymáson, hogy nem esnek le.'),
(47, 2, 47, 'Hüvelykujj mozgatása', 'Mutassuk meg a gyermeknek egy vagy két kézzel, hogy a kezünket ökölbe szorítjuk \r\nmiközben a hüvelykujjunk felfele áll. Rázzuk csak a hüvelykujjunk. Mondjuk a gyermeknek, hogy\r\nmozgassa csak a hüvelykujját ugyanígy. Ne segítsünk neki, hogy a kezét jó pozícióba tegye.\r\nÉrtékelés: Jó, ha a gyermek a hüvelykujját mozgatja anélkül, hogy bármelyik másik ujja mozogna\r\nlegalább egy kézzel.'),
(48, 2, 48, 'Kört másol', 'Megmutatja a tesztlap hátán a kört. Nem nevezzük meg, nem húzzuk rajta végig a ceruzát vagy az ujjunkat,\r\nhogy megmutassuk, hogy rajzolják. Azt mondjuk a gyermeknek, rajzoljon ugyanolyat, mint a képen.\r\nÉrtékelés: Jó, minden zárt forma, amit nem folytonos körmozgásokkal firkált.'),
(49, 2, 49, 'Embert rajzol három részben', 'Ceruzát és papírt adunk a gyermeknek és felszólítjuk, hogy rajzoljon fiút vagy lányt\r\n(férfit vagy nőt). Ne mondjuk neki, hogy tegyen még részeket a rajzhoz. Ha úgy \r\ntűnik, hogy befejezte, megkérdezzük, hogy elkészült-e. Ha igent válaszol,\r\nértékeljük a rajzot.\r\nÉrtékelés: Jó, ha három vagy több testrészt rajzolt. Minden pár (két fül, két szem, stb.)\r\negy pontot ér, egy pontot ér a nem páros testrész is (fej, nyak, test, stb.). Ha egy páros \r\ntestrésznek hiányzik az egyik fele, nem kap pontot.'),
(50, 2, 50, 'Keresztet másol', 'Megmutatjuk a tesztlap hátulján a keresztet, nem vezetjük rajta végig az ujjunkat\r\nvagy ceruzát. Nem is nevezzük meg. Felszólítjuk a gyermeket, hogy rajzolja utána.\r\nÉrtékelés: Jó, ha a gyermek két vonalat rajzol, amelyek valahol keresztezik egymást.\r\nNem baj, ha nem egyenesek a vonalak.'),
(51, 2, 51, 'Kiválasztja a leghosszabb vonalat', 'Megmutatjuk a párhuzamos vonalat a tesztlap hátán és megkérdezzük, melyik vonal hosszabb. \r\nAmikor a gyermek rámutat arra a vonalra, amit hosszabbnak gondol felülről lefelé fordítjuk a \r\nlapot és megint megkérdezzük legalább háromszor ismételjük.\r\nÉrtékelés: Jó, ha 3-szor egymásután a jó vonalat választja.\r\nHa nem sikerül, még háromszor meg kell próbálni. Ha hat próba közül ötben a jót választja,\r\nelfogadható. Csak az számít, ha 3 alaklomból 3-szor vagy 6 alkalomból 5-ször jót választ.'),
(52, 2, 52, 'Bemutatott négyszöget utánoz', 'Először próbáljuk ki, hogy le tudja-e másolni képről előrajzolás nélkül. Megmutatjuk a négyszöget a tesztlap\r\nhátán. Nem nevezzük meg és nem húzzuk utána ceruzával, vagy ujjunkkal. Azt mondjuk a gyermeknek, \r\nhogy rajzoljon ugyanolyat. Ha nem tudja lemásolni a rajzot, a vizgáló megmutatja, hogyan kell rajzolni:\r\nmindig két-két szemben lévő oldalát rajzoljuk meg és nem folyamatosan egy mozdulattal, mert akkor\r\na gyerek kereknek nézheti.\r\nÉrtékelés: Jó, ha négy derékszögű sarokkal rajzolja meg a\r\nformát. A vonalak túlmehetnek egymáson, de a szögek nagyjából\r\nlegyenek derékszögek, ne legyenek legömbölyítve, vagy hegyesek.'),
(53, 2, 53, 'Embert rajzol hat részben', 'Adunk a gyermeknek ceruzát és papírt és felszólítjuk, hogy rajzoljon \r\nfiút vagy lányt (férfit vagy nőt). Ne mondjuk, hogy még kell valami a rajzhoz.\r\nHa úgy tűnik, hogy végzett, megkérdezzük, hogy készen van-e.\r\nHa igent mond, értékeljük a rajzot.\r\nÉrtékelés: Jó, ha hat vagy több testrészt rajzolt. Minden páros testrész egy pontot ér\r\n(két szem, két fül, stb.) egy-egy pontot ér minden páratlan testrész is (fej, nyak, törzs, stb.)'),
(54, 2, 54, 'Négyszöget másol', 'Megmutatjuk a tesztlap hátán a négyszöget. Nem nevezzük meg,\r\nnem húzzuk utána ujjal vagy ceruzával. Felszólítjuk a gyermeket,\r\nrajzoljon olyat, mint a képen van.\r\nÉrtékelés: Jó, ha 4 derékszögű figurát rajzol úgy, hogy nem\r\nmutatták meg előzőleg, hogyan kell. Egymást metsző vonalak\r\nalkotják a sarkokat. Ne legyenek hegyesek vagy legömbölyítettek.\r\n'),
(55, 2, 55, 'Csengőre reagál', 'Úgy tartjuk a csengőt, hogy a gyermek ne lássa (oldalt, kissé a füle mögött).\r\nCsendesen megrázzuk. Ha a gyerek nem mutatja, hogy észrevette, próbáljuk meg\r\nmég egyszer a kísérlet folyamán.Értékelés: Megfelel, na a gyermek bármilyen módon mutatja,\r\nhogy hallotta a csengőt, pl. szemmozgás, légzés tempójának megváltozása,   \r\nvagy bármi egyéb változás a viselkedésében.'),
(56, 2, 56, 'Vokalizálás - sírás nélkül', 'Bemondásra elfogadható. A kísérlet alatt figyeljük, hogy ad-e más hangokat, mint sírást, pl. gőgicsél.\r\nÉrtékelés: Megfelel, ha a gyermek ad más hangokat is mint a sírás.\r\n Ha nem halljuk, kérdezzük meg a szülőt, hogy csinálja-e.'),
(57, 2, 57, ' <q>U-u</q>, <q>Á-á</q>', 'Hallgassuk meg, hogy a gyermek kiad-e magánhangzókat, pl. <q>u-u</q>, <q>á-á</q>. Ha ezek a hangok nem hallhatóak kérdezzük meg a szülőt, hogy hallat-e ilyen hangokat a gyermek.\r\nÉrtékelés: Jó, ha magánhangzókat hallat a gyermek.'),
(58, 2, 58, 'Nevet', 'Bemondásra elfogadható.\r\nFigyeljük a kísérlet alatt, hogy nevet-e hangosan.\r\nÉrtékelés: Jó, ha csiklandozás nélkül nevet hangosan. \r\nHa nem halljuk, kérdezzük meg a szülőt, hogy csinálj-e a gyermek.'),
(59, 2, 59, 'Visít', 'Bemondásra elfogadható.\r\nFigyeljük, hogy a kísérlet folyamán a gyermek ad-e vidám, magas visító hangokat.\r\nÉrtékelés: Elfogadható, ha a gyermek ad ilyen hangokat. Ha nem, kérdezzük meg a szülőt.'),
(60, 2, 60, 'Csörgő hang felé fordul', 'Álljon a gyermek mögé, miközben az a szülő felé fordulva ül a szülő ölében vagy a földön.\r\nHa szükséges kérje a szülőt, hogy egy piros madzaggal vonja el a gyermek figyelmét.\r\nTegyen egy kockát egy pohárba, aminek a tetejét elzárja kezével. Vigye a poharat \r\n20-30 centire a gyermek fülétől, a látószögén kívül. Rázza gyengéden a poharat, hogy\r\naz halk hangot adjon. ismételje a másik fülnél is.\r\nÉrtékelés: Jó, ha a gyermek reagál odafordulással mindkét fülnél.\r\n'),
(61, 2, 61, 'Hang felé fordul', 'Ha a gyermek a szülő ölében vagy ez asztalon a szülővel szemben ül, közelítsük meg a gyermek mindkét fülétől legfeljebb 20 cm-re. Suttogjuk a gyermek nevét többször, de ügyeljünk, hogy a lélegzetünk ne érje a gyermeket, mert akkor arra fordulhat és nem a hang felé. Legfeljebb három próba.\r\nÉrtékelés: Jó, ha a gyermek a hang irányába fordul.'),
(62, 2, 62, 'Szótagokat mond', 'Hallgassuk a gyermeket, hogy mond-e egy magánhangzóból és egy mássalhangzóból álló\r\nszótagokat, pl. <q>ba</q>, <q>da</q>, <q>ga</q>, <q>ma</q>. Ha nem, kérdezzük meg a szülőt, hogy előfordult-e már.\r\nÉrtékelés: Jó, ha hallunk ilyeneket vagy a szülő igennel válaszolt.'),
(63, 2, 63, 'Beszédhangokat utánoz', 'Bemondásra elfogadható. Figyeljük meg, hogy a gyermek utánozza-e a szülő vagy a vizsgáló által kiadott hangokat.\r\nÉrtékelés: Elfogadható, ha a gyermek olyan hangokat hallott, mint amilyeneket a megelőző percben hallott. Ha nem halljuk, kérdezzük meg a szülőt.'),
(64, 2, 64, 'Nem specifikus pa-pa vagy ma-ma', 'Bemondásra elfogadható.\r\nFigyeljük, mondja-e a gyermek, hogy pa-pa, vagy ma-ma a kísérlet folyamán.\r\nÉrtékelés: Elfogadjuk, hogy akár pa-pa-t akár ma-ma-t mond.\r\nNem kell hogy egy szülőre vonatkoztassa. Ha nem halljuk, kérdezzük\r\nmeg a szülőt.'),
(65, 2, 65, 'Szótagok összekapcsolása', 'Hallgassuk, hogy a gyermek megismétli-e ugyanazt a szótagot 3 vagy több alkalommal,\r\npl. <q>dadadada</q> vagy <q>gagagaga</q>. Ha nem halljuk, kérdezzük\r\nmeg a szülőt.\r\nÉrtékelés: Jó, ha a gyermek ilyen hangokat ad ki vagy a szülő igennel válaszol.'),
(66, 2, 66, 'Értelmetlen beszéd', 'A vizsgálat közben figyeljük, hogy a gyermek <q>beszélget</q>-e saját magával\r\nszüneteket és hangnemeket használva, értelmetlen szavakkal. Ha ez nem észrevehető,\r\nkérdezzük meg a szülőt, hogy szokott-e a gyermek <q>beszélgetni</q> önmagával úgy,\r\nmintha az ismeretlen nyelvű beszédnek hangzana.\r\nÉrtékelés: Jó, ha a gyermek <q>beszélget</q> vagy a szülő igennel válaszol.'),
(67, 2, 67, 'Specifikus pa-pa és ma-ma', 'Bemondásra elfogadható.\r\nFigyeljük meg, hogy a gyermek mondja-e az apjának pa-pa vagy\r\naz anyjának, hogy ma-ma a kísérlet alatt.\r\nÉrtékelés: Elfogadjuk, ha e gyermek akár pa-pá-t akár a ma-má-t helyesen használja\r\naz apjára vagy anyjára. Ha nem halljuk, kérdezzük meg a szülőt.'),
(68, 2, 68, 'Egy szót mond', 'Kérdezzük meg a szülőt, hogy hány szót ismer a gyermek és mik ezek.\r\nÉrtékelés: Jó, ha a gyermek ismer legalább egy szót ami nem <q>mama</q>, <q>papa</q> vagy egy \r\ncsaládtag vagy háziállat neve.'),
(69, 2, 69, 'Két szót mond', 'Kérdezzük meg a szülőt, hogy hány szót ismer a gyermek és mik ezek.\r\nÉrtékelés: Jó, ha a gyermek ismer legalább két szót ami nem <q>mama</q>, <q>papa</q> vagy egy \r\ncsaládtag vagy háziállat neve.'),
(70, 2, 70, 'Három szót mond', 'Kérdezzük meg a szülőt, hogy hány szót ismer a gyermek és mik ezek.\r\nÉrtékelés: Jó, ha a gyermek ismer legalább három szót ami nem <q>mama</q>, <q>papa</q> vagy egy \r\ncsaládtag vagy háziállat neve.'),
(71, 2, 71, 'Hat szót mond', 'Kérdezzük meg a szülőt, hogy hány szót ismer a gyermek és mik ezek.\r\nÉrtékelés: Jó, ha a gyermek ismer legalább hat szót ami nem <q>mama</q>, <q>papa</q> vagy egy \r\ncsaládtag vagy háziállat neve.'),
(72, 2, 72, 'Két képre mutat', 'Mutasson képeket a gyermeknek, majd kérje meg, hogy mutasson a madárra, emberre, kutyára,\r\nmacskára. Egyszerre csak egy szót kérdezzen, várja meg a válaszát, majd mutasson a\r\nkövetkező képre.\r\nÉrtékelés: Jó, ha legalább 2 képre helyesen mutat.'),
(73, 2, 73, 'Szavakat kapcsol', 'Hallgassuk a gyermeket, hogy összekapcsol-e legalább két szót, hogy egy értelmes \r\nszóösszetételt kapjon, ami egy tevékenységet jelez, ha nem, kérdezzük meg a szülőt.\r\nÉrtékelés: Jó, ha halljuk a gyermeket szóösszetételt használni vagy a szülő igennel válaszol.\r\nNem számít: <q>pá-pá</q>, stb.'),
(74, 2, 74, 'Egy képet megnevez', 'Mutassunk a gyermeknek képeket. Mutassunk egy képre és kérdezzük meg, <q>Mi ez?</q>\r\nÉrtékelés: Jó, ha a gyermek az állat, személy vagy tárgy nevét használja a megfelelő képre. \r\nAz emberre elfogadható válasz az <q>apu</q> vagy <q>fiú</q>.'),
(75, 2, 75, 'Hat testrészt megnevez', 'Mutassunk egy babát a gyermeknek, majd mondjuk neki, hogy <q>Mutasd meg a baba\r\norrát, szemét, fülét, száját, kezét, lábát, hasát, haját.</q>, egyszerre csak egyet kérve.\r\nÉrtékelés: Jó, ha a gyermek helyesen mutat hat testrészre.'),
(76, 2, 76, 'Négy képre mutat', 'Mutasson képeket a gyermeknek, majd kérje meg, hogy mutasson a madárra, emberre, kutyára,\r\nmacskára. Egyszerre csak egy szót kérdezzen, várja meg a válaszát, majd mutasson a\r\nkövetkező képre.\r\nÉrtékelés: Jó, ha legalább 4 képre helyesen mutat.'),
(77, 2, 77, 'Beszéd félig érthető', 'A vizsgálat alatt figyelje megy, hogy a gyermek beszéde mennyire érthető (kiejtés, hangsúly,\r\nérthető szavak). \r\nÉrtékelés: Jó, ha legalább fele érthető a gyermek beszédének.'),
(78, 2, 78, 'Négy képet megnevez', 'Mutassunk a gyermeknek képeket. Mutassunk egy képre és kérdezzük meg, <q>Mi ez?</q>\r\nÉrtékelés: Jó, ha a gyermek legalább 4 állat, személy vagy tárgy nevét használja a megfelelő képre. \r\nAz emberre elfogadható válasz az <q>apu</q> vagy <q>fiú</q>.'),
(79, 2, 79, 'Két cselekvést ismer', 'Mutasson képeket a gyermeknek állatokról és kérdezze: <q>Melyik repül?</q>, <q>Melyik mondja miau?</q> ...\r\nÉrtékelés: Sikeres, ha ötből legalább 2 kérdésre jól válaszol.'),
(80, 2, 80, 'Két melléknevet ismer', 'A gyermeknek a következő kérdéseket tesszük fel, egyszerre egyet: <q>Mit csinálsz, ha fáradt vagy?</q>\r\n(aludni megyek, leülök, pihenek)\r\n<q>Mit csinálsz, ha fázol?</q> (kabátot veszek, bemegyek, meggyújtom a kályhát).\r\nNem fogadható el, ha a gyermek azt feleli: köhögök, gyógyszert kapok vagy bármi mást mond,\r\nami arra vonatkozik, hogy megfázott. Ebben az esetben nem értette a kérdést.\r\n<q>Mit csinálsz, ha éhes vagy?</q>(eszem, vacsorázom, kérek valamit enni.)\r\nÉrtékelés: Elfogadható, ha gyerek logikusan felel a három kérdésből kettőre.\r\nNéhány jó válaszra adtunk példát.'),
(81, 2, 81, 'Egy színt megnevez', 'Bemondásra elfogadható. Egy piros, kék, zöld és sárga kockát leteszünk a gyermek elé \r\naz asztalra. Kérjük a gyermeket, hogy mutasson a pirosra, vagy adja oda, aztán a \r\nkékre, stb. Ha a gyermek a kockát a vizsgálónak adja vissza kell tenni\r\naz asztalra, csak azután kérni a következőt. Nem közöljük a gyermekkel, hogy jó-e a válasza \r\nés nem kell megneveznie a színeket.\r\nÉrtékelés: Jó, ha 4 színből 1 jót választ. Ha nem csinálja, kérdezzük meg a szülőt.'),
(82, 2, 82, 'Két tárgyat használ', 'Kérdezzük meg a gyermektől egyenként, hogy: <q>Mit csinálsz a pohárral?</q>, <q>Mire való a szék?</q>,\r\n<q>Mit csinálsz a ceruzával?</q>\r\nÉrtékelés: Jó, ha a gyermek 3 kérdésből kettőre helyesen válaszol. A helyes válasz tartalmazza \r\na megfelelő igéket, pl. inni, ülni, írni. '),
(83, 2, 83, 'Egy kockát megszámol', 'Tegyünk 8 kockát az asztalra és egy papírt melléjük. Kérjük meg a gyermeket, hogy tegyen egy \r\nkockát a lapra. Amikor a gyermek kész van kérdezzük meg tőle, hány kocka van a lapon.\r\nÉrtékelés: Jó, ha a gyermek egy kockát tett a lapra és azt mondta, hogy egy kocka van a papíron.'),
(84, 2, 84, 'Három tárgyat használ', 'Kérdezzük meg a gyermektől egyenként, hogy: <q>Mit csinálsz a pohárral?</q>, <q>Mire való a szék?</q>,\r\n<q>Mit csinálsz a ceruzával?</q>\r\nÉrtékelés: Jó, ha a gyermek 3 kérdésből háromra helyesen válaszol. A helyes válasz tartalmazza \r\na megfelelő igéket, pl. inni, ülni, írni. '),
(85, 2, 85, 'Négy cselekvést ismer', 'Mutasson képeket a gyermeknek állatokról és kérdezze: <q>Melyik repül?</q>, <q>Melyik mondja miau?</q> ...\r\nÉrtékelés: Sikeres, ha ötből legalább 4 kérdésre jól válaszol.'),
(86, 2, 86, 'Beszéd teljesen érthető', 'A vizsgálat alatt figyelje megy, hogy a gyermek beszéde mennyire érthető (kiejtés, hangsúly,\r\nérthető szavak). \r\nÉrtékelés: Jó, ha teljesen érthető a gyermek beszéde.'),
(87, 2, 87, 'Négy ragot ismer', 'Álljon a gyermekkel az asztal mellé, adjon neki egy kockát, majd mondja neki a következőket,\r\negyszerre csak egyet: <q>Tedd a kockát az asztalra</q>, <q>Tedd a kockát az asztal alá.</q>, <q>Tedd a kockát elém.</q>,\r\n<q>Tedd a kockát mögém.</q>. Az utasítások között vegyük fel a kockát. \r\nÉrtékelés: Jó, ha a gyermek mind a négy utasítást helyesen hajtja végre.'),
(88, 2, 88, 'Négy színt megnevez', 'Bemondásra elfogadható. Egy piros, kék, zöld és sárga kockát leteszünk a gyermek elé \r\naz asztalra. Kérjük a gyermeket, hogy mutasson a pirosra, vagy adja oda, aztán a \r\nkékre, stb. Ha a gyermek a kockát a vizsgálónak adja vissza kell tenni\r\naz asztalra, csak azután kérni a következőt. Nem közöljük a gyermekkel, hogy jó-e a válasza \r\nés nem kell megneveznie a színeket.\r\nÉrtékelés: Jó, ha 4 színből 4 jót választ. Ha nem csinálja, kérdezzük meg a szülőt.'),
(89, 2, 89, 'Öt szót meghatároz', 'A gyermek figyeljen a vizsgálóra. Azt mondjuk neki: \r\n<q>Fogok mondani egy szót és te megmondod mi az.</q> Egy szót kérdezünk\r\negy időben. <q>Mi a labda/ tó/ íróasztal/ ház/ banán/ függöny/ plafon/ sövény/ járda?</q>\r\nMindegyik szót háromszor meg lehet kérdezni. Várjuk meg a választ minden szó után.\r\nÉrtékelés: Jó, ha a 9 szóból ötöt meghatároz a következők szerint: \r\n1. használat, 2. forma, 3. amiből készül, vagy 4. általános kategória. Pl. a banán <q>gyümölcs</q> és\r\nnem sárga vagy banánhéj.'),
(90, 2, 90, 'Három melléknevet ismer', 'A gyermeknek a következő kérdéseket tesszük fel, egyszerre egyet: <q>Mit csinálsz, ha fáradt vagy?</q>\r\n(aludni megyek, leülök, pihenek)\r\n<q>Mit csinálsz, ha fázol?</q> (kabátot veszek, bemegyek, meggyújtom a kályhát).\r\nNem fogadható el, ha a gyermek azt feleli: köhögök, gyógyszert kapok vagy bármi mást mond,\r\nami arra vonatkozik, hogy megfázott. Ebben az esetben nem értette a kérdést.\r\n<q>Mit csinálsz, ha éhes vagy?</q>(eszem, vacsorázom, kérek valamit enni.)\r\nÉrtékelés: Elfogadható, ha gyerek logikusan felel a három kérdésre.\r\nNéhány jó válaszra adtunk példát.'),
(91, 2, 91, 'Öt kockát megszámol', 'Tegyünk 8 kockát az asztalra és egy papírt melléjük. Kérjük meg a gyermeket, hogy tegyen öt \r\nkockát a lapra. Amikor a gyermek kész van kérdezzük meg tőle, hány kocka van a lapon.\r\nÉrtékelés: Jó, ha a gyermek öt kockát tett a lapra és azt mondta, hogy öt kocka van a papíron.'),
(92, 2, 92, 'Két ellentétet ismer', 'Ügyeljünk, hogy a gyermek odafigyeljen, majd egy-egy \r\nmondatot mondunk egymásután - megvárjuk, amíg a gyermek kiegészíti.\r\n<q>A tűz forró, a jég.....</q> (hideg, hűvös, fagyos; nem vizes, olvad vagy víz)\r\n<q>Mama nő, papa.....</q>(férfi. Nem papa, fiú, férj)\r\n<q>A ló nagy, az egér ..... </q>(kicsi, apró, pici)\r\nHa kell, mindegyik mondatot háromszor meg lehet ismételni.\r\nÉrtékelés: Jó, ha a három analógiából kettőre helyes ellentétes szót mond a gyermek.'),
(93, 2, 93, 'Hét szót meghatároz', 'A gyermek figyeljen a vizsgálóra. Azt mondjuk neki: \r\n<q>Fogok mondani egy szót és te megmondod mi az.</q> Egy szót kérdezünk\r\negy időben. <q>Mi a labda/ tó/ íróasztal/ ház/ banán/ függöny/ plafon/ sövény/ járda?</q>\r\nMindegyik szót háromszor meg lehet kérdezni. Várjuk meg a választ minden szó után.\r\nÉrtékelés: Jó, ha a 9 szóból hetet meghatároz a következők szerint: \r\n1. használat, 2. forma, 3. amiből készül, vagy 4. általános kategória. Pl. a banán <q>gyümölcs</q> és\r\nnem sárga vagy banánhéj.'),
(94, 2, 94, 'Szimmetrikus mozgások', 'A háton fekvő vagy a szülő által tartott gyermek láb és kar mozgásait figyeljük. \r\nÉrtékelés: Jó, ha a gyermek egyformán mozgatja karját és lábát\r\n(Nem jó, ha az egyik kar vagy láb nem mozog annyira, mint a másik.)'),
(95, 2, 95, 'Hason fejét emeli', 'Bemondás is jó. Hason fektetjük a babát lapos felületen.\r\nÉrtékelés: Jó, ha a gyermek egy pillanatra felemeli a fejét úgy, hogy az álla az asztallap\r\n(a felület) fölé kerül anélkül, hogy az egyik vagy másik oldalra fordulna.'),
(96, 2, 96, 'Hason fejét 45 fokos szögig emeli', 'A gyermeket hason fektetjük lapos felületen.\r\nÉrtékelés: Jó, ha a gyermek felemeli a fejét úgy, hogy az arca kb. 45o -os szöget alkosson\r\na lapos felülettel.'),
(97, 2, 97, 'Hason fejét 90 fokos szögig emeli', 'Fekszik a gyerek a hasán lapos felületen.\r\nÉrtékelés: Jó, ha a gyerek felemeli a fejét és mellkasát úgy, hogy az arca 90 fokos szöget \r\nalkot a lapos felülettel.'),
(98, 2, 98, 'Fejét egyenesen tartva ül', 'Tartsuk a gyermeket ülő helyzetben.\r\nÉrtékelés: Jó, ha a gyermek egyenesen feltartja a fejét úgy, hogy nem billen.  \r\n(Rossz, ha csak pár pillanatig tartja a fejét és utána a mellére vagy oldalt ejti.)'),
(99, 2, 99, 'Állítva súlyát tartja', 'Tartsuk a gyermeket álló pozícióban úgy, hogy lába az asztalon legyen.\r\nLassan engedjünk a fogáson, hogy a gyermek súlyát a lábai tartsák fent.\r\nÉrtékelés: Jó, ha a gyermek néhány másodpercig tartja a súlyát a saját lábán.'),
(100, 2, 100, 'Karjára támaszkodva mellkasát emeli', 'Fektessük a gyermeket a hasára lapos felületen.\r\nÉrtékelés: Jó, ha a gyermek felemeli a fejét és a mellkasát kinyújtott kezére\r\nvagy alkaljára támaszkodva, arccal egyenesen előre nyúlva.'),
(101, 2, 101, 'Forog', 'Forog\r\nBemondás is jó.\r\nA vizsgáló nézze meg vagy kérdezze meg, hogy a gyermek fordul-e\r\nhátáról a hasára vagy a hasáról a hátára.\r\nÉrtékelés: jó, ha a gyerek kétszer vagy többször (nem véletlenül) teljesen átfordul \r\nmindkét oldalára, nemcsak az oldalára és vissza'),
(102, 2, 102, 'Ülőhelyzetbe húzva nem lóg hátra a feje', 'Hátára fektetjük. Kezénél vagy csuklójánál fogva szelíden ülőhelyzetbe húzzuk. \r\nNem szabad gyorsan húzni, nehogy a feje hátul maradjon.\r\nÉrtékelés: Jó, ha a feje egyetlen pillanatig sem lóg hátra,\r\namíg felhúzzuk.'),
(103, 2, 103, 'Támasz nélkül ül', 'Tartsuk a gyermeket ülő helyzetben az asztalon. Győződjünk meg róla.\r\n hogy nem eshet le, majd lassan engedjük el.\r\nÉrtékelés: Jó, ha 5 mp-ig vagy tovább ül egyedül. A gyermek kezét a lábára\r\n vagy az asztalra teheti támasztékul.'),
(104, 2, 104, 'Kapaszkodva állva marad', 'Bemondás is jó. Állítsuk fel a gyermeket, hogy meg tudjon kapaszkodni egy tárgyban(nem emberben).\r\nÉrtékelés: Jó, ha e gyerek 5 mp-ig vagy tovább áll kapaszkodva. He nem csinálja, kérdezzük meg a szülőt.'),
(105, 2, 105, 'Kapaszkodva feláll ', 'Bemondás is jó. Nézzük meg vagy kérdezzük meg a szülőt, hogy fel tud-e\r\nállni egy szilárd tárgyba kapaszkodva (pl. ágyrács, székláb, asztal), anélkül,\r\nhogy valaki segítene neki.\r\nÉrtékelés: jó, ha a gyerek fel tud állni.'),
(106, 2, 106, 'Önállóan felül', 'Bemondás is jó. Nézzük meg vagy kérdezzük meg, hogy a gyermek fel tud-e ülni.\r\nÉrtékelés: Jó, ha igen, akár látjuk, bemondásra. '),
(107, 2, 107, 'Két másodpercig áll', 'Bemondás is jó. Állítsuk a földre a gyermeket. Amikor úgy látjuk, hogy az \r\negyensulyát megtalálta, engedjük el. \r\nÉrtékelés: Jó, ha megáll egyedül kettő vagy több mp-ig. \r\nHa nem csinálja, kérdezzük meg a szülőt, hogy képes-e rá.'),
(108, 2, 108, 'Önállóan áll', 'Bemondás is jó. Állítsuk a földre a gyermeket. Ha úgy látjuk, hogy megvan az egyensúlya, engedjük el.\r\nÉrtékelés: Jó, ha legalább 10 mp-ig megáll önállóan. Ha nem látjuk kérdezzük meg.'),
(109, 2, 109, 'Lehajol és felegyenesedik', 'Bemondás is jó. Amikor a gyermek támaszték nélkül, önállóan áll a földön,\r\ntegyünk elé egy kis játékot a földre és mondjuk, hogy vegye fel.\r\nÉrtékelés: jó, ha le tud hajolni a játékot felvenni és felegyenesedni.'),
(110, 2, 110, 'Jól jár', 'Bemondás is jó. Nézzük meg, hogy jó-e az egyensúlya és ritkán esik el járás közben.\r\nÉrtékelés: Jó, ha nehézség nélkül jár és nem billen egyik oldaláról a másikra.\r\nHa nem csinálja kérdezzük meg a szülőt.'),
(111, 2, 111, 'Hátrafelé jár', 'Bemondás is jó. Mondjuk a gyermeknek, hogy menjen hátrafelé.\r\nA vizsgáló megmutatja neki, hogy kell.\r\nÉrtékelés: Jó, ha 2 vagy több lépést megy hátra. Ha nem látjuk, kérdezzük meg a szülőt, hogy megy-e otthon hátra felé, pl. amikor egy játékot húz.'),
(112, 2, 112, 'Szalad', 'Bátorítsuk a gyermeket, hogy fusson, például egy labdát dobjunk neki, hogy kövesse azt.\r\nÉrtékelés: Jó, ha a gyermek tud futni, megbotlás nélkül.'),
(113, 2, 113, 'Lépcsőn felfele megy', 'Bemondás is jó. Kérdezzük meg a szülőt, hogy jut föl a gyermek a lépcsőn.\r\nÉrtékelés: jó, ha felfele lép és nem mászik. Kapaszkodhat a falba vagy a korlátba, de emberbe nem.'),
(114, 2, 114, 'A labdába belerúg', 'Bemondás is jó. Rakjunk egy labdát 15 cm-re az álló gyerek elé. \r\nMondjuk, hogy rúgjon bele. Megmutatjuk hogyan kell.\r\nÉrtékelés: Jó, ha belerúg úgy, hogy nem kapaszkodik semmibe. \r\nHa nem látjuk, kérdezzük meg, hogy rúg-e otthon egy hasonló méretű labdát a gyerek fele.'),
(115, 2, 115, 'Egy helyben ugrik', 'Mondjuk a gyermeknek, hogy ugráljon. Meg is mutathatjuk neki. \r\nÉrtékelés: Jó, ha a gyermek egy időben mindkét lábát felemeli a földről mérhető távolságra. \r\nNem kell ugyanoda visszaérkeznie oda ahonnan indult. \r\nNem futhat ugrás előtt, nem is kapaszkodhat semmibe.'),
(116, 2, 116, 'Felfelé dobja a labdát', 'Mondjuk a gyereknek, hogy dobja a labdát a vizsgálónak alulról felfelé dobva. Meg lehet mutatni hogyan kell.\r\nÉrtékelés: elfogadjuk, hogy a gyerek legalább 92 cm-re áll a vizsgálótól és tőle egy  \r\nkarnyújtásnyira a térde és az arca közötti magasságba dobja. Nem fogadjuk el, ha a \r\ngyermek nem hajlandó a vizsgáló felé dobni a labdát, hanem állandóan a vele ellentétes irányba dob.'),
(117, 2, 117, 'Távolugrás helyből', 'Egy tesztlapot teszünk a padlóra és megmutatjuk a gyermeknek, hogy kell helyből átugrani (20 cm),\r\nés felszólítjuk, hogy ugorjon át. Háromszor próbálhat.\r\nÉrtékelés: Elfogadjuk, ha egyszerre mindkét lábbal együtt átugorja a tesztlapot. \r\n(Ha csak egy lábbal ugorja át, nem jó.)'),
(118, 2, 118, 'Féllábon egyensúlyoz egy másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 1 másodpercig áll féllábon.'),
(119, 2, 119, 'Féllábon egyensúlyoz két másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 2 másodpercig áll féllábon.'),
(120, 2, 120, 'Féllábon ugrál', 'Megmondjuk a gyermeknek, hogy ugráljon féllábon. Meg is\r\nmutatjuk neki, hogy kell.\r\nÉrtékelés: Jó, ha a gyermek legalább kétszer egymásután ugrál féllábon, akár helyben,\r\nakár távolságra úgy, hogy nem kapaszkodik semmibe.'),
(121, 2, 121, 'Féllábon egyensúlyoz három másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 3 másodpercig áll féllábon.'),
(122, 2, 122, 'Féllábon egyensúlyoz négy másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 4 másodpercig áll féllábon.'),
(123, 2, 123, 'Féllábon egyensúlyoz öt másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 5 másodpercig áll féllábon.'),
(124, 2, 124, 'Zsinórjárás', 'Mutassuk meg a gyermeknek ezt a járást, a hátul levő láb ujjai érintik az elől levő láb sarkát.\r\nÍgy járjunk 8 lépést (hasonlíthatjuk a kötéltáncoshoz is). \r\nTöbbször is megmutathatjuk. Háromszor kell próbálkozzon.\r\nÉrtékelés: Jó, ha a gyermek négy vagy több lépést egyenes vonalban tesz meg úgy, \r\na sarka legfeljebb 2 cm-re lehet a másik láb ujjától és a három próbálkozásból két esetben sikeres.'),
(125, 2, 125, 'Féllábon egyensúlyoz hat másodpercig', 'Megmutatjuk a gyermeknek, hogy kell féllábon állni kapaszkodás nélkül és felszólítjuk, \r\nhogy csinálja. Ha lehet, órával mérjük. Háromszor kell próbálnia.\r\nÉrtékelés: Jó, ha a 3 esetből 2 alkalommal legalább 6 másodpercig áll féllábon.'),
(126, 1, 1, 'Regard Face', 'Hold the child or place the child on his/her back and put your face about 12 inches above the child\'s face. Pass if the child actually looks at you.'),
(127, 1, 2, 'Smile Responsively', 'With the child lying on the back, smile and talk to the child. Do not tickle the child, or touch his/her face. Pass if the child smiles in response. The objective is a social response rather than a physical response. '),
(128, 1, 3, 'Smile Spontaneously', 'During the test watch for the child to smile at you or the parent without any stimulation, either by touch or sound. If this is not seen, ask the parent if the child ever smiles at someone first, before being smiled at, talked to, or touched. Pass if the child smiles spontaneously at you or the parent during the test or reportedly at home. The objective is for the child to initiate social interaction. '),
(129, 1, 4, 'Regard Own Hand', 'During the test, notice if the child stares at one of his/her own hands for at least several seconds, rather than glancing at it fleetingly. If you do not see this, ask the parent if the child has done this. Pass if the parent reports that the child does this or if you see the child do this during the test.'),
(130, 1, 5, 'Work for Toy', 'Place a toy which the child seems to enjoy on the table a little out of reach. Pass if the child tries to get the toy by reaching or stretching his/her arm or body toward the toy. The child does not have to actually pick up the toy. '),
(131, 1, 6, 'Feed Self', 'Ask the caregiver if the child actually feeds himself/herself a cracker, cookie, or any finger food. Pass if the parent reports that the child does this. Score <q>No Opportunity</q> if the child has not been given such food.'),
(132, 1, 7, 'Play Pat-a-Cake', 'Without touching the child\'s hands or arms, demonstrate the pat-a-cake game by clapping your hands together and ask the child to <q>play pat-a-cake</q> with you. If the child does not do this, ask the parent to try it. If the child still does not do it, ask the parent if the child does this at home. Pass if you observe the child clapping his/her hands or if the parent reports that the child does this. Also pass any other clapping game in which the child participates. The objective is interaction with another person.'),
(133, 1, 8, 'Indicate Wants', 'During the test, notice if the child lets you or the parent know that he/she wants something, without crying. If this cannot be seen, ask the parent how the child lets someone know what he/she wants. Pass if you see the child do something other than cry to communicate a specific desire, or if the parent reports that the child does this. Examples of passes are: pointing, reaching and making sounds, putting arms up to be picked up, pulling, and saying a word. '),
(134, 1, 9, 'Wave Bye-Bye', 'If possible, it is best to administer this item as the parent and child are leaving, or as you are leaving the room. Face the child and say <q>bye-bye</q> while waving to the child. Do not touch or allow the parent to touch the child\'s hands or arms. If the child does not respond, ask the parent if the child <q>waves bye-bye.</q> Pass if the child responds by raising his/her arm or waving with hand or fingers, or if the parent reports that the child does this. '),
(135, 1, 10, 'Play Ball with Examiner', 'Roll the ball to the child and try to get the child to roll it or toss it back. You may need to roll the ball back and forth several times. Pass if the child rolls or tosses the ball purposefully toward you. (Handing the ball to you is not a pass.) '),
(136, 1, 11, 'Imitate Activities', 'Ask the parent if the child imitates activities around the house such as dusting, wiping up, sweeping, vacuuming, or talking on the telephone. Pass if the parent reports that the child imitates any type of adult household activity.'),
(137, 1, 12, 'Drink from Cup', 'Ask the parent if the child can hold a regular cup or glass and drink from it without help, spilling less than half of the liquid. The cup or glass may not have a lid or spout. Pass if the parent reports that the child does this.'),
(138, 1, 13, 'Help in House', 'Ask the parent if the child helps at home by doing simple tasks like putting toys away, throwing trash away, or getting something for a parent when asked. Pass if the child actually helps rather than just imitates. The objective is to determine if the child understands and carries out a request to help. '),
(139, 1, 14, 'Use Spoon/Fork', 'Ask the parent if the child uses a spoon or fork to eat. If so, how much does he/she spill? Pass if the child uses a spoon and/or fork and gets most of the food into the mouth, spilling little. The objective is to determine if the child is essentially self-sufficient in feeding.'),
(140, 1, 15, 'Remove Garment', 'Ask the parent if the child can remove any of his/her clothing, and if so, what items of clothing. Pass if the child can remove items such as shoes that take some effort to remove, jacket, pants, or T-shirt. Do not pass hat, socks, diaper, slippers, or shoes that slip off easily. The objective is to see if the child can purposefully remove a garment in an effort at self-care. '),
(141, 1, 16, 'Feed Doll', 'Place the doll and toy bottle on the table in front of the child. Tell the child to <q>feed the baby</q> and/or <q>give the baby the bottle.</q> Pass if the child places the bottle to the doll\'s mouth or obviously tries to put it to the mouth. If the child imitates breast-feeding, encourage him/her to use the bottle, as breast-feeding alone is not a pass. '),
(142, 1, 17, 'Put on Clothing', 'Ask the parent if the child can put on any of his/her own clothing, and if so, which items. Pass if the child puts on any clothing, such as underpants, socks, shoes, jacket, etc. Shoes do not have to be tied, fastened, or on correct feet. A cap placed haphazardly on the head does not pass. ');
INSERT INTO `skill_language` (`skill_lang_id`, `lang_id`, `skill_id`, `name`, `description`) VALUES
(143, 1, 18, 'Brush Teeth,Help', 'Ask the parent if the child brushes his/her teeth with some help. If so, ask the parent to describe how this is done. Pass if the child is reported to hold the toothbrush and move it across the teeth in a brushing motion. There may be some help from the parent in directing the toothbrush but the child must do most of the brushing. The parent may oversee and put toothpaste on the brush. Score No <q>Opportunity</q> if the parent has not allowed the child to try this. '),
(144, 1, 19, 'Wash & Dry Hands', 'Ask the parent if the child can wash and dry his/her own hands without help, except for turning on faucets that are out of reach. Pass if the parent reports that the child does this, using soap and rinsing and drying well. '),
(145, 1, 20, 'Name Friend', 'Ask the child to name some of his/her friends or playmates (not living with the child). Pass if the child gives the first name of at least one friend. Names of cousins or siblings are acceptable if they do not live with the child. Names of pets or imaginary friends are not acceptable. '),
(146, 1, 21, 'Put on T-Shirt', 'Ask the parent if the child can get his/her T-shirt or pullover on without help. Pass if the child can pull the shirt over his/her head and get his/her arms in the sleeves. The shirt may be on backwards or inside out. '),
(147, 1, 22, 'Dress, No Help', 'Ask the parent if the child can dress without any help. Pass if the child can dress completely and correctly without help. He/she must usually pick out his/her own clothes (at least play clothes), and may have help only for tying shoelaces, and buttoning or zipping the back of a dress. A pass of Dress, No Help also passes Put on Clothing and Put on T-Shirt.'),
(148, 1, 23, 'Play Board/Card Games', 'Ask the parent if the child plays simple board or card games, such as <q>Candy Land</q> or <q>Old Maid.</q> Specify that the child must really play and understand the game. Pass if the parent reports that the child understands and plays board or card games with others, sitting and taking turns.'),
(149, 1, 24, 'Brush Teeth, No Help', 'Ask the parent if the child brushes his/her own teeth without help or supervision some of the time, including putting toothpaste on the brush and brushing all teeth with back and forth strokes at the gum line. Pass if the parent reports that the child brushes his/her teeth without help or supervision at least some of the time. (The parent should be advised to brush the child\'s teeth some of the time to ensure proper cleaning.) A pass of Brush Teeth, No Help also passes Brush Teeth with Help. '),
(150, 1, 25, 'Prepare Cereal', 'Ask the parent if the child can prepare a bowl of cereal without help (other than being given items that are hard to reach), including getting the bowl, spoon, cereal, and milk, and pouring the cereal and milk into the bowl without spilling much. If the parent says the child cannot do this because the container of milk is too large, ask if the child could pour it from a nearly empty container, a small pitcher, or a glass. Pass if the parent reports that the child can do this, including pouring milk from any kind of container. '),
(151, 1, 26, 'Follow to Midline', 'With the child lying on his/her back, hold the red yarn above the child\'s face at a height where he/she focuses on it (usually about 8 inches). Shake the yarn to attract the child\'s attention and move it slowly in an arc from one side of the child\'s body to the other several times. The movement of the yarn may be stopped to reattract the child\'s attention, and then continued. Pass if the child follows the yarn to the midpoint of the arc with eyes alone, or with head and eyes.'),
(152, 1, 27, 'Follow Past Midline', '(Refer to Follow to Midline for administration procedure.) Pass if the child follows the yarn past the midpoint of the arc with eyes alone, or with head and eyes. A pass of Follow Past Midline also passes Follow to Midline. '),
(153, 1, 28, 'Grasp Rattle', 'While the child is lying on his/her back or is being held by the parent, touch the backs or tips of the child\'s fingers with the handle of the rattle. Pass if the child grasps the rattle for a few seconds.'),
(154, 1, 29, 'Hands Together', 'During the test while the child is lying on his/her back (not while cradled in the parents arms), notice if the hands are brought together at the midline of the body over the chest or at the mouth. Pass if you see the child bring his/her hands together in this manner. '),
(155, 1, 30, 'Follow 180 Degrees', 'Pass if the child follows the yarn with head and eyes through the complete arc from one side of the body to the other. A pass of Follow 180 Degrees also passes Follow to Midline and Follow Past Midline.'),
(156, 1, 31, 'Regard Raisin', 'With the child sitting on the parent\'s lap at the table, place a raisin directly in front of the child. The raisin should be placed on a surface that gives good contrast, such as a piece of white paper. Pass if the child clearly looks at the raisin.'),
(157, 1, 32, 'Reaches', 'With the child sitting on the parents lap so that the child\'s elbows are level with the table top and his/her hands are on the table, place an object such as the rattle or the red yarn within easy reach and encourage the child to pick it up. Pass if you see the child reach toward or at least move his/her hands or arms in the direction of the object on the table. '),
(158, 1, 33, 'Look for Yarn', 'While the child is sitting on the parent\'s lap, hold the red yarn high and attract the child\'s attention to it. When the child is looking at the yarn, drop it so that it falls out of sight. Do not move your hand or arm except to release the yarn. Repeat if the child\'s response is unclear. Pass if the child definitely looks for the yarn by looking down or toward the floor. '),
(159, 1, 34, 'Rake Raisin', 'With the child sitting on the parent\'s lap so that his/her elbows are level with the table top and his/her hands are on the table, drop a raisin directly in front of the child within easy reach. If necessary, you may point to or touch the raisin to attract the child\'s attention. <q>0</q>-shaped cereal may be used in place of a raisin. Pass if the child picks up the raisin, using a raking motion with the entire hand. Make sure the raisin did not merely stick to the child\'s hand but was actually picked up. This item is also passed if the child passes Thumb-Finger Grasp. '),
(160, 1, 35, 'Pass Cube', 'Notice whether the child passes a block from one hand to the other. To encourage this, give the child a block; then present a second block to the same hand. The child will often pass the first block to the other hand so that he/she can take the second block. Pass if you see the child transfer a block from one hand to the other without using his/her body, mouth. or the table.'),
(161, 1, 36, 'Take 2 Cubes', 'Place 2 blocks on the table in front of the child. Encourage him/her to pick up the blocks, but do not hand them to the child. Pass if the child picks up the 2 blocks and holds one in each hand at the same time.'),
(162, 1, 37, 'Thumb-finger Grasp', 'Pass if the child picks up the raisin by bringing together any part of the thumb and one or several fingers. A pass of Thumb Finger Grasp also passes Rake Raisin. '),
(163, 1, 38, 'Bang 2 Cubes Held in Hands', 'Place a block in each of the child\'s hands and encourage him/her to bang them together. You may encourage the child to hit the blocks together by demonstrating with blocks held in your own hands. Do not touch or allow the parent to touch the child\'s hands or arms. If the child does not bang the blocks together, ask the parent if the child hits small objects together in this manner. Pass if the child holds one block in each hand and hits the blocks together, or if the parent reports that the child hits small objects together. Pots, pans, lids, or other large objects do not pass. '),
(164, 1, 39, 'Put Block in Cup', 'Place 3 blocks and the cup on the table in front of the child. Encourage the child to put the blocks in the cup by demonstration and words. This demonstration may need to be repeated several times. Pass if the child places at least one block in the cup and releases it. '),
(165, 1, 40, 'Scribbles', 'Place a piece of plain paper and a pencil on the table in front of the child. You may place the pencil in the child\'s hand and encourage him/her to scribble, but do not show him/her how to scribble. (Watch the child carefully and be prepared to prevent him/her from putting the pencil in mouth or eye.) Pass if the child makes purposeful marks on the paper. Fail accidental marks or stabbing with the pencil. '),
(166, 1, 41, 'Dump Raisin, Demonstrated', 'Show the child 2 or 3 times how to dump the raisin out of the bottle. Then ask the child to get it out. (Do not use the word <q>dump</q>.\') Pass if the child dumps the raisin out of the bottle or rakes the raisin close to the opening and then dumps it out. Do not pass if the child removes the raisin with a finger.'),
(167, 1, 42, 'Tower of 2 Cubes', 'With the child sitting high enough at the table so that elbows are level with table top and hands are on the table, place the blocks on the table in front of the child. Encourage the child to stack them by demonstration and words. It may be helpful to hand the blocks to the child, one at a time. Three trials may be given. Pass Tower of 2 Cubes if the child puts one block on top of another so that it does not fall when he/she removes his/her hand. '),
(168, 1, 43, 'Tower of 4 Cubes', 'With the child sitting high enough at the table so that elbows are level with table top and hands are on the table, place the blocks on the table in front of the child. Encourage the child to stack them by demonstration and words. It may be helpful to hand the blocks to the child, one at a time. Three trials may be given. Pass Tower of 4, 6, or 8 Cubes, depending upon the greatest number of blocks the child stacks in three trials. '),
(169, 1, 44, 'Tower of 6 Cubes', 'With the child sitting high enough at the table so that elbows are level with table top and hands are on the table, place the blocks on the table in front of the child. Encourage the child to stack them by demonstration and words. It may be helpful to hand the blocks to the child, one at a time. Three trials may be given. Pass Tower of 4, 6, or 8 Cubes, depending upon the greatest number of blocks the child stacks in three trials. '),
(170, 1, 45, 'Imitate Vertical Line', 'The child should be seated at the table at a comfortable writing level. Place a pencil and a piece of plain paper in front of the child and tell him/her to draw lines like yours. On that paper, demonstrate how to draw vertical lines, drawing toward the child. Do not guide the child\'s hand. Three trials may be given. Pass if the child makes 1 line or more on the paper, at least 2 inches long, and not varying from your vertical line by more than 30 degrees (see example). Lines do not have to be perfectly straight. '),
(171, 1, 46, 'Tower of 8 Cubes', 'With the child sitting high enough at the table so that elbows are level with table top and hands are on the table, place the blocks on the table in front of the child. Encourage the child to stack them by demonstration and words. It may be helpful to hand the blocks to the child, one at a time. Three trials may be given. Pass Tower of 4, 6, or 8 Cubes, depending upon the greatest number of blocks the child stacks in three trials. '),
(172, 1, 47, 'Thumb Wiggle', 'Demonstrate with one or both hands by making a fist with your thumb pointing upward. Wiggle only your thumb. Tell the child to wiggle his/her thumb (or thumbs) the same way. Do not help put the child\'s hand into position. You may tell the child to make a <q>thumbkin</q>. Pass if the child moves the thumb of either or both hands without moving any other fingers.'),
(173, 1, 48, 'Copy Circle', 'Give the child a pencil and piece of plain paper. Show him/her the circle on the back of the test form. Without naming it or moving your finger or pencil to show how to draw it, tell the child to draw one like the picture. Three trials may be given. Pass any form approximating a circle that is closed or very nearly closed. Fail continuous spiral motions. '),
(174, 1, 49, 'Draw Person 3 Parts', 'Give the child a pencil and a piece of plain paper. Tell him/her to draw a picture of a person (boy, girl, Mommy, Daddy, etc.) Be sure the child has finished before scoring the drawing. Pass if the child has drawn 3 or more body parts. A pair (ears, eyes, arms, hands, legs, feet) is considered one part. To get credit, both parts of the pair must be drawn unless the drawing is in profile (in which case one eye, ear, etc., gets credit.) Make note in your test observations of any unusual drawing, even though the child has identified the acceptable parts. '),
(175, 1, 50, 'Copy +', 'Give the child a pencil and a piece of plain paper. Show him/her the cross on the back of the test form. Without naming it or moving your finger or pencil to show how to draw it, tell the child to <q>draw one like the picture.</q> Three trials may be given. Pass if the child draws 2 lines which intersect at least somewhat near the midpoint. The lines do not need to be exactly straight, but the intersecting lines do need to be drawn using only 2 strokes. '),
(176, 1, 51, 'Pick Longer Line', 'Making sure they are presented vertically, show the child the parallel lines on the back of the test form and ask the child, <q>Which line is longer?</q> (Do not say <q>bigger.</q>) After the child has pointed to a line, turn the paper upside down and ask the question again. Turn the paper upside down again and repeat this a third time. If the child does not answer correctly all three times, repeat the question three more times, turning the paper each time. Pass if the child picks the longer line 3 out of 3 times or 5 out of 6 times.'),
(177, 1, 52, 'Copy Square Demonstrated', 'If the child is unable to copy the square from the picture, show him/her how to draw it by drawing two opposite (parallel) sides first and then the other two opposite sides (rather than drawing the square with a continuous motion).Three demonstrations and trials may be given. Pass if the child draws a figure with straight lines and 4 square corners. The corners may be formed by lines that intersect but the corners must be approximately right angles (not rounded or pointed). The length should be less than 2 times the width. '),
(178, 1, 53, 'Draw Person 6 Parts', 'Give the child a pencil and a piece of plain paper. Tell him/her to draw a picture of a person (boy, girl, Mommy, Daddy, etc.) Be sure the child has finished before scoring the drawing. - Pass if the child has drawn 6 or more body parts. (See criteria under 3 parts.) A pass of Draw Person - 6 Parts also passes Draw Person - 3 Parts. '),
(179, 1, 54, 'Copy Square', 'Give the child a pencil and a piece of plain paper. Show him/her the square on the back of the test form. Without naming it or moving your finger or pencil to show how to draw it, tell the child to <q>draw one like the picture.</q> Three trials may be given. Pass if the child draws a figure with straight lines and 4 square corners. The corners may be formed by lines that intersect but the corners must be approximately right angles (not rounded or pointed). The length should be less than 2 times the width. '),
(180, 1, 55, 'Respond to Bell', 'Hold the bell so that the child cannot see it (to the side and a little behind the child\'s ear). Ring the bell softly_ If the child does not respond, try again later in the test session. Pass if the child responds in any way, such as eye movement, change in expression, change in breathing rate, or any other change in activity. '),
(181, 1, 56, 'Vocalizes', 'During the test, listen for sounds other than crying, such as small throaty sounds or short vowel sounds (<q>uh,</q> <q>eh</q>). If none are heard, ask the parent if the child makes these sounds. Pass if you hear the child make such sounds or if the parent reports that the child does this. Pass this item also if any other vocalization items are passed. '),
(182, 1, 57, 'Ooo/aah', 'Listen for the child to make vowel sounds, such as <q>o o </q> or <q>aah.</q> if these sounds are not heard, ask the parent if the child has made these sounds. Pass if you hear vowel sounds or if the parent reports that the child does this,'),
(183, 1, 58, 'Laughs', 'Listen for the child to laugh aloud. If this is not heard, ask the parent if the child does this. Pass if you hear the child laugh aloud or if the parent reports that he/she does this. '),
(184, 1, 59, 'Squeals', 'Listen for the child to make high-pitched, happy squealing sounds. If this is not heard, ask the parent if the child does this. Pass if these sounds are heard or if the parent reports that the child does this.'),
(185, 1, 60, 'Turn to Rattling Sound', 'Stand behind the child while he/she is facing the parent, sitting either on the parent\'s lap or on the table. If necessary, ask the parent to use the red yarn to get the child\'s attention. Put one block in the cup and hold it with your hand covering the top. Being careful to keep the cup quiet while moving into position, bring the cup 6-12 inches from the child\'s ear but out of the child\'s line of vision. Shake the cup gently, making a soft, low sound. Repeat with the other ear. Pass if the child responds by turning toward the sound on both sides.'),
(186, 1, 61, 'Turn to Voice', 'While the child is facing the parent, either seated on the parent\'s lap, seated on the table, or held in the parent\'s arms, approach the child from behind to within 6-12 inches of either ear. Placing your hand between your mouth and the child so that the child does not respond to feeling your breath rather than to the sound, whisper the child\'s name several times. Repeat with the other ear. Pass if the child turns to the direction of your voice on both sides.'),
(187, 1, 62, 'Single Syllables', 'Listen for the child to use single syllables consisting of a consonant and a vowel, such as <q>b </q><q>da,</q> <q>ga,</q> or <q>ma.</q> If this is not heard, ask the parent if the child does this. Pass if you hear such sounds or if the parent reports that the child does this. '),
(188, 1, 63, 'Imitate Speech Sounds', 'Repeat a sound several times (such as a cough, clicking of the tongue, or kissing sound) and see if the child imitates you. If the child does not respond, ask the parent if the child imitates any speech sounds. Emphasize that the sounds must be initiated by the other person, not the child. Pass if you hear the child imitate your sound or if the parent reports that the child imitates the speech sounds of others. '),
(189, 1, 64, 'Dada/Mama Non-specific', 'Listen for the child to say <q>dada</q> or <q>mama</q> during the test. If this is not heard, ask the parent if the child has said this. The words do not necessarily have to refer to a parent. Pass if the child says either <q>dada</q> or <q>mama,</q> or if the parent reports that the child does this. '),
(190, 1, 65, 'Combine Syllables', 'Listen for the child to repeat the same syllable 3 or more times, such as <q>dadadada</q> or <q>gagagaga.</q> If this is not heard ask the parent if the child does this. Pass if the child does this or if the parent reports that the child does this. '),
(191, 1, 66, 'Jabbers', 'During the test, listen for the child to make unintelligible <q>conversation</q> to himself/herself, using inflection and pauses. (This is a <q>jibberish</q> in which voice patterns vary and few or no real words are distinguishable.) If this is not heard, ask the parent if the child <q>talks</q> to himself/herself in this way or in what sounds like a foreign language. Pass if you hear the child <q>jabber,</q> or if the parent reports having heard the child do this'),
(192, 1, 67, 'Dada/Mama Specific', 'Listen for the child to say <q>Dada</q> to the father or <q>Mama</q> to the mother during the test. If this is not heard, ask the parent if the child does this. Pass if the child uses either <q>Dada</q> or <q>Mama</q> meaningfully, or if the parent reports that the child does this. Also pass other words for mother and father used by various cultures, such as <q>Papa.</q> A pass of this item also passes Dada/Mama Nonspecific'),
(193, 1, 68, 'One Word', 'Acceptable words are any words other than <q>Mama,</q> <q>Dada,</q> or names of family members and pets.'),
(194, 1, 69, '2 Words', 'Acceptable words are any words other than <q>Mama,</q> <q>Dada,</q> or names of family members and pets.'),
(195, 1, 70, '3 Words', 'Acceptable words are any words other than <q>Mama,</q> <q>Dada,</q> or names of family members and pets.'),
(196, 1, 71, '6 Words', 'Acceptable words are any words other than <q>Mama,</q> <q>Dada,</q> or names of family members and pets.'),
(197, 1, 72, 'Point 2 Pictures', 'Be sure to administer the Name Pictures items first. If the child names less than 4 pictures correctly, administer this item. Show the child the pictures on the back of the form. Tell the child to <q>Point to the bird - man - dog - cat (kitty) - horse.</q> Name only one picture at a time, and wait for the child to point before naming the next picture. Pass Point to 2 Pictures if the child correctly points to (or names) 2 or 3 pictures. '),
(198, 1, 73, 'Combine Words', 'Listen for the child to combine at least 2 words to make a meaningful phrase that indicates an action. If this is not heard, ask the parent if the child does this. Pass if you hear the child do this, or if the parent reports that the child does this. Examples: <q>play ball,</q> <q>want drink,</q> <q>see that,</q> <q>go bye-bye.</q> '),
(199, 1, 74, 'Name 1 Picture', 'Show the child the pictures on the back of the form. Point to the cat, bird, horse, dog, and man one at a time, and ask <q>What is this?</q> Pass Name 1 Picture according to the number of pictures correctly named. Pass if the child uses the name of a pet, providing it is the same animal as pictured. <q>Daddy</q> or <q>boy</q> are acceptable answers for the man. '),
(200, 1, 75, 'Body Parts-6', 'Show the doll to the child. Tell the child, <q>Point to the doll\'s nose - eyes - ears - mouth - hands -feet - tummy hair,</q> naming them one al a time. Pass if the child correctly points to at least 6 body parts. If the parent indicates <q>stomach</q> or <q>belly</q> are used, pass either of these if it is correctly identified. <q>Belly-button</q> is not a pass. '),
(201, 1, 76, 'Point 4 Pictures', 'Be sure to administer the Name Pictures items first. If the child names less than 4 pictures correctly, administer this item. Show the child the pictures on the back of the form. Tell the child to <q>Point to the bird - man - dog - cat (kitty) - horse.</q> Name only one picture at a time, and wait for the child to point before naming the next picture. Pass Point to 4 Pictures if the child correctly points to (or names) 4 or 5 pictures. A pass of Point to 4 Pictures also passes Point to 2 Pictures. '),
(202, 1, 77, 'Speech-Half Understandable', 'Throughout the test, notice the intelligibility of the child\'s speech (pronunciation, enunciation, actual words as opposed to <q>jibberish,</q> etc.) Pass Half Understandable if you have understood at least half of the child\'s speech.'),
(203, 1, 78, 'Name 4 Pictures', 'Show the child the pictures on the back of the form. Point to the cat, bird, horse, dog, and man one at a time, and ask <q>What is this?</q> Pass Name 4 Pictures according to the number of pictures correctly named. Pass if the child uses the name of a pet, providing it is the same animal as pictured. <q>Daddy</q> or <q>boy</q> are acceptable answers for the man. '),
(204, 1, 79, 'Know 2 Actions', 'Show the child the pictures on the back of the form. Instruct the child to point to the correct picture as the following questions are asked: <q>Which one flies?</q> <q>Which one says meow?</q> <q>Which one talks?</q> <q>Which one barks?</q> <q>Which one gallops?</q>Pass Know 2 Actions if 2 or 3 pictures are pointed to correctly.  '),
(205, 1, 80, 'Know 2 Adjectives', 'Ask the child the following questions, one at a time: <q>What do you do when you are cold?</q>  <q>What do you do when you are tired?</q>  <q>What do you do when you are hungry?</q> Pass Know 2 Adjectives depending upon the number of questions  answered correctly. Examples of correct answers: Cold - Put on coat, go inside, cover up. (Do not pass an answer about having a cold, such as <q>cough</q> or <q>take medicine.</q>)  Tired - Go to bed, lie down, sleep. Hungry - Eat, have lunch, ask for something to eat.'),
(206, 1, 81, 'Name 1 Color', 'Place a red, a blue, a yellow, and a green block on the table in front of the child. Point to one block  and ask the child, <q>What color is this?</q> After the child answers, move the blocks around and ask  the child to tell you the color of another block. Repeat for all four colors. Pass Name 1 Color if the child correctly names 1, 2, or 3 colors. '),
(207, 1, 82, 'Use of 2 Objects', 'Ask the child the following questions, one at a time: <q>What do you do with a cup?</q>  <q>What is a chair used for?</q> <q>What is a pencil .used for?</q> Pass Use of 2 Objects depending upon the number of questions answered  correctly. Action words such as <q>drink,</q> <q>sit,</q> and <q>write</q> must be included in the answers.  Unconventional uses such as <q>pour</q> for cup or <q>climb on</q> for chair are acceptable. Answers such  as <q>milk</q> for cup or <q>table</q> for chair are unacceptable.'),
(208, 1, 83, 'Count 1 Block', 'Put 8 blocks on the table in front of the child. Place a piece of paper next to the blocks. Tell the  child, <q>Put one block on the paper.</q> When the child appears to be finished, ask <q>How many blocks  are on the paper?</q> Pass if the child places one block and says that one block is on the paper.  '),
(209, 1, 84, 'Use of 3 Objects', 'Ask the child the following questions, one at a time: <q>What do you do with a cup?</q>  <q>What is a chair used for?</q> <q>What is a pencil .used for?</q> Pass Use of 3 Objects depending upon the number of questions answered  correctly. Action words such as <q>drink,</q> <q>sit,</q> and <q>write</q> must be included in the answers.  Unconventional uses such as <q>pour</q> for cup or <q>climb on</q> for chair are acceptable. Answers such  as <q>milk</q> for cup or <q>table</q> for chair are unacceptable.'),
(210, 1, 85, 'Know 4 Actions', 'Show the child the pictures on the back of the form. Instruct the child to point to the correct picture  as the following questions are asked: <q>Which one flies?</q> <q>Which one says meow?</q> <q>Which one talks?</q> <q>Which one barks?</q> <q>Which one  gallops?</q> Pass Know 4 Actions if 4 or 5 pictures are pointed to correctly.'),
(211, 1, 86, 'Speech-All Understandable', 'Throughout the test, notice the intelligibility of the child\'s speech (pronunciation, enunciation, actual words as opposed to <q>jibberish,</q> etc.) Pass All Understandable if you have understood all or nearly all of what the child has said.  '),
(212, 1, 87, 'Understand 4 Prepositions', 'While you and the child are standing, give him/her a block. Give the following directions to the Pchild, one at a time: <q>Put the block on the table.</q> <q>Put the block under the table.</q> <q>Put the block inPfront of me.</q> <q>Put the block behind me.</q> Pick up, or have the child pick up the block between Pdirections.PPass if the child performs all four tasks correctly.'),
(213, 1, 88, 'Name 4 Colors', 'Place a red, a blue, a yellow, and a green block on the table in front of the child. Point to one block Pand ask the child, <q>What color is this?</q> After the child answers, move the blocks around and ask Pthe child to tell you the color of another block. Repeat for all four colors. Pass Name 4 Colors if the child correctly names 4 colors.PA pass of Name 4 Colors also passes Name 1 Color.P'),
(214, 1, 89, 'Define 5 Words', '   Make sure the child is listening to you and then say:P<q>I am going to say a word and I want you to tell me what it is.</q>Ask each word one at a time:<q>What is a ball - lake - desk - house - banana - curtain fence - ceiling?</q>PEach word may be asked 3 times if necessary. You may say <q>Tell me something about it,</q> but do Pnot ask the child to tell you what the object is for or what to do with it.PPass Define 5 Words if the child defines 5 or 6 words acceptably in terms of: P1) use, 2) shape, 3) what it is made of, or 4) general category. Pass Define 7 Words if the child defines 7 or 8 words acceptably. Examples of correct answers: Ball - bounces, circle, toy, play with Lake - water, fish in itPDesk - write on it, put papers in, wood House - to live in, made of wood (bricks, etc.) Banana - fruit, to eat Curtain - to cover the window, so people can\'t see in  Fence - to keep the dog in, to climb on, around the yard  Ceiling - top of the room, to keep the rain off A pass of Define 7 Words also passes Define 5 Words.  '),
(215, 1, 90, 'Know 3 Adjectives', 'Ask the child the following questions, one at a time: <q>What do you do when you are cold?</q>  <q>What do you do when you are tired?</q>  <q>What do you do when you are hungry?</q> Pass Know 3 Adjectives depending upon the number of questions  answered correctly. Examples of correct answers: Cold - Put on coat, go inside, cover up. (Do not pass an answer about having a cold, such as <q>cough</q> or <q>take medicine.</q>)  Tired - Go to bed, lie down, sleep. Hungry - Eat, have lunch, ask for something to eat.'),
(216, 1, 91, 'Count 5 Blocks', '   Put 8 blocks on the table in front of the child. Place a piece of paper next to the blocks. Tell the child, <q>Put five blocks on the paper.</q> When the child appears to be finished, ask, <q>How many  blocks are on the paper?</q> Pass if the child places 5 blocks and says that 5 blocks are on the paper. The child does not have  to count each block out loud. Only counting (<q>1, 2, 3, 4, 5</q>) does not pass; the child must state <q>5</q>  separately. '),
(217, 1, 92, 'Opposites-2', 'Say each of the following sentences slowly and distinctly, one at a time, and wait for the child to fill  in the blank. Each sentence may be repeated 3 times if necessary. <q>If a horse is big, a mouse is </q> <q>If fire is hot, ice is  </q><q>If the sun shines during the day, the moon shines during the </q> Pass if the child completes two sentences correctly. Examples of correct answers: Big - little, small, tiny Hot - cold, cool, freezing, frozen (wet, melting, or water are incorrect)  Day - night, dark, black, evening '),
(218, 1, 93, 'Define 7 Words', '   Make sure the child is listening to you and then say:<q>I am going to say a word and I want you to tell me what it is.</q>Ask each word one at a time:<q>What is a ball - lake - desk - house - banana - curtain fence - ceiling?</q>Each word may be asked 3 times if necessary. You may say <q>Tell me something about it,</q> but do not ask the child to tell you what the object is for or what to do with it.Pass Define 5 Words if the child defines 5 or 6 words acceptably in terms of: 1) use, 2) shape, 3) what it is made of, or 4) general category. Pass Define 7 Words if the child defines 7 or 8 words acceptably.Examples of correct answers: Ball - bounces, circle, toy, play withLake - water, fish in itDesk - write on it, put papers in, woodHouse - to live in, made of wood (bricks, etc.)Banana - fruit, to eatCurtain - to cover the window, so people can\'t see in Fence - to keep the dog in, to climb on, around the yard Ceiling - top of the room, to keep the rain offA pass of Define 7 Words also passes Define 5 Words. '),
(219, 1, 94, 'Equal Movements', 'While the child is lying on his/her back, watch the activity of the child\'s arms and legs Pass if the child moves arms and legs equally. Fail if one arm and/or leg does not move as much as the other.'),
(220, 1, 95, 'Lift Head', 'Place the child on his/her stomach on a fiat surface. Pass if the child at least momentarily lifts his/her head so that the chin is off the surface without  being turned to either side or if the parent reports that the child can do this. '),
(221, 1, 96, 'Head up 45 Degrees', 'Place the child on his/her stomach on a flat surface. Pass if the child lifts his/her head so that his/her face makes an approximate 45 degree angle with the surface for at least several seconds. The child will be looking at the table in front of him/her. A pass of Head Up 45 Degrees also passes Lift Head. '),
(222, 1, 97, 'Head up 90 Degrees', 'Place the child on his/her stomach on a flat surface. Pass if the child lifts head and chest up so that his/her face makes a 90 degree angle with the sur-  face for at least several seconds. The child will be looking straight ahead and will usually be sup-  ported on his/her forearms. A pass of Head Up 90 Degrees also passes Head Up 45 Degrees and Lift Head. '),
(223, 1, 98, 'Sit-Head Steady', ' Hold the child in a sitting position. Pass if the child holds his/her head upright and steady with no bobbing motion for at least several  seconds. '),
(224, 1, 99, 'Bear Weight on Legs', 'Hold the child in a standing position so that his/her feet rest on the table. Slowly loosen your hand  support to allow the child\'s weight to be supported on his/her legs and feet. Pass if the child supports his/her weight on the legs for several seconds. '),
(225, 1, 100, 'Chest Up-Arm Support', 'Place the child on his/her stomach on a flat surface. Pass if the child lifts his/her head and chest off the surface using the support of outstretched arms, so that he/she is looking straight ahead or up. '),
(226, 1, 101, 'Roll Over', 'During the test, notice if the child rolls from back to stomach or from stomach to back. If this is not seen, ask the parent if the child has rolled completely over, from back to stomach or from stomach to back, at least twice. Pass if you see the child roll completely over or if the parent has seen the child do this at least twice. '),
(227, 1, 102, 'Pull to Sit-No Head Lag', 'Place the child on his/her back. Grasp the child\'s hands and wrists and gently and slowly pull him/her to a sitting position. If there is immediate head lag, do not continue to pull the child all the way to the sitting position. Pass if the child\'s head does not lag at any time while the body is being pulled up. The child will also <q>pull</q> with you, using shoulder and neck muscles. '),
(228, 1, 103, 'Sit-No Support', 'Hold the child in a sitting position on the table. Making sure the child does not fall, slowly remove your hands. Pass if the child sits alone for 5 seconds or more. The child may put hands on legs or on the table  for support. '),
(229, 1, 104, 'Stand Holding On', 'Place the child in a standing position holding on to a solid object (not a person). Pass if the child stands holding on for 5 seconds or more. '),
(230, 1, 105, 'Pull to Stand', 'Place the child sitting on the floor beside a chair or low table. Encourage him/her to stand up by  putting a toy on the seat of the chair or on the table. Pass if the child pulls himself/herself to a standing position. '),
(231, 1, 106, 'Get to Sitting', '  While the child is lying down (on back or stomach), crawling, or standing holding on, encourage   him/her to get into a sitting position. If this is not seen, ask the parent if the child can get into a sitting position by himself/herself. Pass if you see the child do this or if the parent reports that the child can do this. '),
(232, 1, 107, 'Stand-2 Seconds', 'Place the child standing on the floor. After the child seems balanced, try to remove the support.  Pass if you see the child stand without any support for 2 or more seconds.'),
(233, 1, 108, 'Stand Alone', 'Administration procedure is the same as for Stand - 2 Seconds. Pass if the child stands alone 10 or more seconds. A pass of Stand Alone also passes Stand - 2 Seconds, and Stand Holding On. '),
(234, 1, 109, 'Stoop and Recover', 'While the child is standing on the floor away from all support, place a toy or ball on the floor and  encourage the child to pick it up. Pass if the child stoops to pick up the object and returns to standing without holding on or sitting  down.'),
(235, 1, 110, 'Walk Well', 'Watch the child walk. Pass if the child has good balance, rarely falls, and does not tip from side to side. '),
(236, 1, 111, 'Walk Backwards', 'Encourage the child to walk backwards by demonstration, or notice if the child does this during the  test. If you do not see the child do this, ask the parent if the child walks backwards, possibly when  pulling a toy or opening a door or drawer. Pass if the child takes several steps backwards without sitting down, or if the parent reports that  the child can do this. '),
(237, 1, 112, 'Runs', 'Encourage the child to run, possibly by throwing the ball for him/her to chase.  Pass if the child can run (not fast walk) smoothly without falling or tripping.  '),
(238, 1, 113, 'Walk Up Steps', 'Ask the parent how the child gets up steps. Pass if the child walks up steps. The child may use a rail or wall for support, but may not hold on  to a person. '),
(239, 1, 114, 'Kick Ball Forward', 'Place the ball about 6 inches in front of the standing child. Tell him/her to kick it. You may show the  child how to do this. Pass if the child kicks the ball forward without holding on to any support. Sliding or pushing the  ball with the foot, hitting the ball on the back swing, or stepping on the ball are failures. '),
(240, 1, 115, 'Jump Up', 'Tell the child to jump. You may show the child how to do this. Pass if the child jumps, getting both feet off the floor at the same time. The child does not have to  land in the same spot. The child may not run before jumping, or hold on to any support. '),
(241, 1, 116, 'Throw Ball Overhand', 'Give the child the ball and stand at least 3 feet from him/her. Tell the child to throw the ball to you using an overhand throw. You may show the child how to throw overhand. Three trials may be  given. Pass if the child throws the ball within arm\'s reach of you between your knees and head, using an  overhand throw (not sideways, or underhand). The ball may bounce before it reaches you if it was between your knees and head before beginning the downward arc. Throwing the ball directly  downward or away from you are failures. '),
(242, 1, 117, 'Broad Jump', 'Place a piece of paper (8-1/2 inch by 11 inch) on the floor and show the child how to do a standing broad jump across the width of the paper (8-1/2 inch). Then tell the child to do it. You may give 3 trials, if  necessary. Pass if the child jumps, with both feet together, over the paper without touching it.  '),
(243, 1, 118, 'Balance-Each Foot 1 Second', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) '),
(244, 1, 119, 'Balance-Each Foot 2 Seconds', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) '),
(245, 1, 120, 'Hops', 'With the child away from all support, tell him/her to hop on one foot. You may show the child how to  do this Pass if the child hops on one foot 2 or more times in a row, either in place or over a distance, with-  out holding on to anything. '),
(246, 1, 121, 'Balance-Each Foot 3 Seconds', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) '),
(247, 1, 122, 'Balance-Each Foot 4 Seconds', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) '),
(248, 1, 123, 'Balance-Each Foot 5 Seconds', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) '),
(249, 1, 124, 'Heel-To-Toe Walk', 'Demonstrate how to walk in a straight line placing the heel of one foot in front of and touching the  toe of the other. Walk about 8 steps like this and then tell the child to do it. (You may compare this  to a tight-rope walk.) If necessary, give several demonstrations. Allow 3 trials if needed. Pass if the child can walk in a straight line for 4 or more steps placing the heel no more than  1 inch in front of the toe, without holding on to any support.'),
(250, 1, 125, 'Balance-Each Foot 6 Seconds', 'Have the child stand away from all support. Show the child how to balance on one foot. Tell  him/her to do this as long as he/she can, giving 3 trials (unless he/she balances for 6 seconds or  more on the first trial). Record the longest time of these three trials. Then tell the child to balance  on the other foot, giving 3 trials if necessary. Record the longest time of these three trials. Pass the appropriate balancing item or items according to the shortest of these 2 recorded times.  (Example: if the longest time for the right foot is 3 seconds and the longest time for the left foot is  5 seconds, the child passes balancing items for 1, 2, and 3 seconds.) A pass of 2, 3, 4, 5, or 6 seconds also passes all lower items. (For example, a pass of Balance-  Each Foot — 3 Seconds also passes Balance - Each Foot 1 Second and Balance - Each Foot 2  Seconds.) ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `facebook_id` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `gender` enum('M','F') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `birthday` date DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  `language` int(11) DEFAULT '1',
  `measurement` enum('SI (metre, kilogram)','English units(yard, stone)') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'SI (metre, kilogram)',
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `name`, `password`, `gender`, `email`, `registration_date`, `birthday`, `role`, `language`, `measurement`, `points`) VALUES
(1, NULL, 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'F', 'babybook.contact@gmail.com', '2017-09-20 11:00:42', '2007-09-05', 3, 1, 'SI (metre, kilogram)', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`child_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`ds_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_groups`
--
ALTER TABLE `skill_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_language`
--
ALTER TABLE `skill_language`
  ADD PRIMARY KEY (`skill_lang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `skill_groups`
--
ALTER TABLE `skill_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `skill_language`
--
ALTER TABLE `skill_language`
  MODIFY `skill_lang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
