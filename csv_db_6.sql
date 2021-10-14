-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 00:15:17
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `csv_db 6`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(4) NOT NULL,
  `marca` varchar(10) DEFAULT NULL,
  `sistemaoperativo` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`, `sistemaoperativo`) VALUES
(1, 'Motorola ', 'Android'),
(2, 'Alcatel', 'Android'),
(3, 'Samsung', 'Android'),
(4, 'BlackBerry', 'BlackBerry'),
(5, 'Huawei', 'Android'),
(6, 'Sony', 'Android'),
(7, 'LG', 'Android'),
(8, 'Apple', 'iOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reacondicionados`
--

CREATE TABLE `reacondicionados` (
  `id_reacondicionado` int(4) NOT NULL,
  `id_marca` int(4) DEFAULT NULL,
  `modelo` varchar(21) DEFAULT NULL,
  `precio` varchar(6) DEFAULT NULL,
  `codigo` varchar(11) DEFAULT NULL,
  `almacenamiento` varchar(14) DEFAULT NULL,
  `pantalla` varchar(8) DEFAULT NULL,
  `ram` varchar(6) DEFAULT NULL,
  `bateria` varchar(11) DEFAULT NULL,
  `stock` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reacondicionados`
--

INSERT INTO `reacondicionados` (`id_reacondicionado`, `id_marca`, `modelo`, `precio`, `codigo`, `almacenamiento`, `pantalla`, `ram`, `bateria`, `stock`) VALUES
(3, 1, 'Moto D3', '1710', 'XT919', '4Gb', '\"4\"\"\"', '1Gb', '2000mAh', 0),
(4, 1, 'Moto X', '4240', 'XT1058', '16Gb', '\"4.7\"\"\"', '2Gb', '2200mAh', 0),
(5, 1, 'Moto X 2014', '4871', 'XT1093', '16Gb', '\"5.2\"\"\"', '2Gb', '2300mAh', 0),
(6, 1, 'Moto G1', '3341', 'XT1032', '8Gb', '\"4\"\"\"', '1Gb', '2070mAh', 0),
(7, 1, 'Moto G1 LTE', '3379', 'XT1040', '8Gb', '\"4.5\"\"\"', '1Gb', '2070mAh', 0),
(8, 1, 'Moto G2', '3899', 'XT1063', '8Gb', '\"5\"\"\"', '1Gb', '2070mAh', 0),
(9, 1, 'Moto G2 Dual', '4221', 'XT1068', '16Gb', '\"5\"\"\"', '1Gb', '2070mAh', 0),
(10, 1, 'Moto E', '2828', 'XT1021', '4Gb', '\"4.3\"\"\"', '1Gb', '1980mAh', 0),
(11, 1, 'Moto E 2015', '4160', 'XT1506', '8Gb', '\"4.5\"\"\"', '1Gb', '2390mAh', 0),
(12, 1, 'Moto E2 LTE', '4160', 'XT1527', '8Gb', '\"4.5\"\"\"', '1Gb', '2390mAh', 0),
(13, 1, 'Moto G2 4G', '4260', 'XT1072', '8Gb', '\"5\"\"\"', '1Gb', '2390mAh', 0),
(14, 1, 'Moto G3', '5005', 'XT1542', '8Gb', '\"5\"\"\"', '1Gb', '2470mAh', 0),
(15, 1, 'Moto C', '7566', 'XT1756', '8Gb', '\"5\"\"\"', '1Gb', '2350mAh', 0),
(16, 1, 'Moto C Plus', '6657', 'XT1725', '16Gb', '\"5\"\"\"', '1Gb', '4000mAh', 0),
(17, 1, 'Moto G4 Play', '8112', 'XT1601', '16Gb', '\"5\"\"\"', '2Gb', '2800mAh', 0),
(18, 1, 'Moto G4', '6630', 'XT1621/25', '16Gb', '\"5.5\"\"\"', '2Gb', '3000mAh', 0),
(19, 1, 'Moto X2', '7280', 'XT1097', '32Gb', '\"5.2\"\"\"', '2Gb', '2300mAh', 0),
(20, 1, 'Moto E4 Plus', '7930', 'XT1772', '16Gb', '\"5.5\"\"\"', '2Gb', '5000mAh', 0),
(21, 1, 'Moto G4 Plus', '7150', 'XT1641', '32Gb', '\"5.5\"\"\"', '2GB', '3000mAh', 0),
(22, 1, 'Moto G5', '9968', 'XT1670', '32Gb', '\"5\"\"\"', '2Gb', '2800mAh', 0),
(23, 1, 'Moto X Play', '8034', 'XT1563', '32Gb', '\"5.5\"\"\"', '2Gb', '3630mAh', 0),
(24, 1, 'Moto G5 Plus', '8671', 'XT1680', '32Gb', '5.2', '2Gb', '3000mAh', 0),
(25, 1, 'Moto G5s Plus', '9815', 'XT1800', '32Gb', '\"5.5\"\"\"', '3Gb', '3000mAh', 0),
(26, 1, 'Moto G6 Plus', '0', 'XT1926', '64Gb', '\"5.9\"\"\"', '4Gb', '3200mAh', 0),
(27, 1, 'Moto X Style', '9525', 'XT1572', '32Gb', '\"5.7\"\"\"', '3Gb', '3000mAh', 0),
(28, 1, 'Moto Z Play', '9749', 'XT1635', '32Gb', '\"5.5\"\"\"', '3Gb', '3510mAh', 0),
(29, 1, 'Moto Z2 Play', '0', 'XT1710', '64Gb', '\"5.5\"\"\"', '4Gb', '3000mAh', 0),
(30, 1, 'Moto E5 Play', '0', 'XT1920', '16Gb', '\"5.2\"\"\"', '2Gb', '2800mAh', 0),
(31, 1, 'Moto Z RAZR i', '0', 'XT890', '8Gb', '\"4.3\"\"\"', '1Gb', '2000mAh', 0),
(32, 2, 'Pixi ', '0', 'OT4007', '512Mb', '\"3.5\"\"\"', '256Mb', '1300mAh', 0),
(33, 2, '\"PIxi 3  3.5\"\"\"', '0', 'OT4013', '4Gb', '\"4\"\"\"', '512Mb', '1300mAh', 0),
(34, 2, 'One Touch Pop C1', '2945', 'OT4015', '4Gb', '\"3.5\"\"\"', '512Mb', '1300mAh', 0),
(35, 2, 'PIxi 3', '4037', 'OT5017A', '4Gb', '\"5\"\"\"', '512Mb', '1800mAh', 0),
(36, 2, 'One Touch Pop C3', '3286', 'OT4033A', '4Gb', '\"4\"\"\"', '512Mb', '1300mAh', 0),
(37, 2, 'One Touch Pop 2', '3379', 'OT5042', '8Gb', '\"4.5\"\"\"', '1Gb', '2000mAh', 0),
(38, 2, 'One Touch Pop S3', '3249', 'OT5050', '4Gb', '\"4\"\"\"', '1Gb', '2000mAh', 0),
(39, 2, 'Idol Mini', '2989', 'OT6012', '4Gb', '\"4.3\"\"\"', '512Mb', '1700mAh', 0),
(40, 2, 'One Touch Idol', '3119', 'OT6030', '4Gb', '\"4.6\"\"\"', '1Gb', '1800mAh', 0),
(41, 2, 'Idol 2 Mini', '0', 'OT6036', '4Gb', '\"4.5\"\"\"', '1Gb', '2000mAh', 0),
(42, 2, '\"Idol 3 4.7\"\"\"', '4160', 'OT6039', '16Gb', '\"4.7\"\"\"', '1,5Gb', '2000mAh', 0),
(43, 2, '\"Idol 3 5.5\"\"\"', '0', 'OT6045', '16Gb', '\"5.5\"\"\"', '2Gb', '2910mAh', 0),
(44, 2, 'One Touch Hero', '0', 'OT8020', '8Gb', '\"6\"\"\"', '2Gb', '3400mAh', 0),
(45, 2, 'One Touch Pop C5', '3185', 'OT5037', '2Gb', '\"4.5\"\"\"', '512Mb', '1800mAh', 0),
(46, 2, 'One Touch Pop C7', '0', 'OT7040', '4Gb', '\"5\"\"\"', '512Mb', '1900mAh', 0),
(47, 2, 'One Touch Pop C7 DUAL', '0', 'OT7040E', '4Gb', '\"5\"\"\"', '512Mb', '1900mAh', 0),
(48, 2, 'One Touch Pop C9', '0', 'OT7047', '4Gb', '\"5.5\"\"\"', '1Gb', '2500mAh', 0),
(49, 2, 'One Touch U5', '5161', 'OT5044', '8Gb', '\"5\"\"\"', '1Gb', '2050mAh', 0),
(50, 2, 'One Touch A3 XL', '0', 'OT9008', '8Gb', '\"6\"\"\"', '1Gb', '3000mAh', 0),
(51, 2, 'One Touch A3 Plus', '0', 'OT5049', '16Gb', '\"5.5\"\"\"', '1Gb', '3000mAh', 0),
(52, 3, 'Galaxy Chat', '1429', 'GT-B5330', '4Gb', '\"3\"\"\"', '512Mb', '1200mAh', 0),
(53, 3, 'Galaxy S II', '3260', 'GT-i9100', '16Gb', '4.3', '1Gb', '1650mAh', 0),
(54, 3, 'Galaxy S4 ', '4289', 'GT-I9500', '16Gb', '\"5\"\"\"', '2Gb', '2600mAh', 0),
(55, 3, 'Galaxy S5 Mini', '6239', 'SM-G800H', '16Gb', '\"4.5\"\"\"', '1.5Gb', '2100mAh', 0),
(56, 3, 'Galaxy S5', '4980', 'SM-G900H', '16Gb', '\"5.1\"\"\"', '2Gb', '2800mAh', 0),
(57, 3, 'Galaxy Grand Prime', '5470', 'SM-G530/1', '8Gb', '\"5\"\"\"', '1Gb', '2600mAh', 0),
(58, 3, 'Galaxy Core Prime', '3770', 'SM-G360', '8Gb', '\"4.5\"\"\"', '1Gb', '2000mAh', 0),
(59, 3, 'Galaxy Core ', '3240', 'GT-I8260', '8Gb', '\"4.3\"\"\"', '512Mb', '1800mAh', 0),
(60, 3, 'Galaxy Fame Lite', '1819', 'GT-S6790', '4Gb', '\"3.5\"\"\"', '512Mb', '1300 mAh', 0),
(61, 3, 'Galaxy Ace 4 LTE', '3249', 'GT-G313', '4Gb', '\"4\"\"\"', '512Mb', '1500 mAh', 0),
(62, 3, 'Galaxy Core 2', '3240', 'SM-G355', '4Gb', '\"4.5\"\"\"', '768Mb', '2000mAh', 0),
(63, 3, 'J1 2016 Mini Prime', '3192', 'SM-J106', '8Gb', '\"4.5\"\"\"', '1Gb', '2050 mAh', 0),
(64, 3, 'J1 Mini', '3088', 'SM-J105', '8Gb', '\"4\"\"\"', '768Mb', '1500 mAh', 0),
(65, 3, 'J1 LTE', '3302', 'SM-J100', '4Gb', '\"4.3\"\"\"', '512Mb', '1850mAh', 0),
(66, 3, 'Galaxy J1 Ace', '4419', 'SM-J111', '8Gb', '\"4.3\"\"\"', '1Gb', '1900mAh', 0),
(67, 3, 'Galaxy J1 Ace', '4419', 'SM-J110', '8Gb', '\"4.3\"\"\"', '1Gb', '1900mAh', 0),
(68, 3, 'Galaxy J2 ', '4703', 'SM-J200', '8Gb', '\"4.7\"\"\"', '1Gb', '2000mAh', 0),
(69, 3, 'Galaxy J2 Prime', '5329', 'SM-G532', '8Gb', '\"5\"\"\"', '1.5Gb', '2600mAh', 0),
(70, 3, 'Galaxy J3 2016', '5642', 'SM-J320', '8Gb', '\"5\"\"\"', '1.5Gb', '2600mAh', 0),
(71, 3, 'Galaxy J5 2015', '6513', 'SM-J500', '16Gb', '\"5\"\"\"', '', '', 0),
(72, 3, 'Galaxy J5 2016', '7049', 'SM-J510', '16Gb', '\"5.2\"\"\"', '2Gb', '3100Mah', 0),
(73, 3, 'Galaxy J5 Prime', '7783', 'SM-G570', '16Gb', '\"5\"\"\"', '2Gb', '2400mAh', 0),
(74, 3, 'A3 2015', '5837', 'SM-A300', '16Gb', '\"4.5\"\"\"', '1Gb', '1900mAh', 0),
(75, 3, 'A3 2016', '5967', 'SM-A310', '16Gb', '\"4.7\"\"\"', '1.5Gb', '2300mAh', 0),
(76, 3, 'A3 2017', '6357', 'SM-A320', '16Gb', '\"4.7\"\"\"', '2Gb', '2350mAh', 0),
(77, 3, 'A5 2015', '6900', 'SM-A500', '16Gb', '\"5\"\"\"', '2Gb', '2300mAh', 0),
(78, 3, 'A5 2016', '7173', 'SM-A510', '16Gb', '\"5.2\"\"\"', '2Gb', '2900 mAh', 0),
(79, 3, 'A5 2017', '7241', 'SM-A520', '32Gb', '\"5.2\"\"\"', '3Gb', '3000mAh', 0),
(80, 3, 'Galaxy J7 2015', '6999', 'SM-J700', '16Gb', '\"5\"\"\"', '2Gb', '3000mAh', 0),
(81, 3, 'Galaxy J7 2016', '7850', 'SM-J710', '16Gb', '\"5.5\"\"\"', '2Gb', '3300mAh', 0),
(82, 3, 'J7 Prime', '8500', 'SM-G610', '16Gb', '\"5.5\"\"\"', '3Gb', '3300 mAh', 0),
(83, 3, 'S6 Flat', '12528', 'SM-G920', '32Gb', '\"5.1\"\"\"', '3Gb', '2550 mAh', 0),
(84, 3, 'S6 Edge', '10798', 'SM-G925', '32Gb', '\"5.1\"\"\"', '3Gb', '2600mAh', 0),
(85, 3, 'S6 Edge +', '11998', 'SM-G928', '32Gb', '\"5.7\"\"\"', '4Gb', '3000 mAh', 0),
(86, 3, 'S7 Flat', '12800', 'SM-G930', '32Gb', '\"5.1\"\"\"', '4Gb', '3000 mAh', 0),
(87, 3, 'S7 Edge', '12999', 'SM-G935', '128Gb', '\"5.5\"\"\"', '4Gb', '3600 mAh', 0),
(88, 3, 'A7 2017', '12132', 'SM-A720', '32Gb', '\"5.7\"\"\"', '3Gb', '3600 mAh', 0),
(89, 3, 'S8', '22165', 'SM-G950', '64Gb', '\"5.8\"\"\"', '4Gb', '3000 mAh', 0),
(90, 3, 'S8 +', '23919', 'SM-G955', '64Gb', '\"6.2\"\"\"', '4Gb', '3500 mAh', 0),
(91, 3, 'Note 3', '8775', 'SM-N900', '16Gb', '\"5.7\"\"\"', '3Gb', '3200 mAh', 0),
(92, 3, 'Note 4', '8839', 'SM-N910', '32Gb', '\"5.7\"\"\"', '3Gb', '3220 mAh', 0),
(93, 3, 'Note 5', '8905', 'SM-N920', '32Gb', '\"5.7\"\"\"', '4Gb', '3000 mAh', 0),
(94, 3, 'Note 8', '29000', 'SM-N950', '64Gb', '\"6.3\"\"\"', '6Gb', '3300 mAh', 0),
(95, 3, 'A70', '', 'SM-A570', '128Gb', '\"6.7\"\"\"', '6Gb', '4500mAh', 0),
(96, 4, 'Curve 9320', '1430', '9320', '512 Mb', '\"2.46\"\"\"', '256Mb', '1450mAh', 0),
(97, 4, 'Z10', '2080', 'Z10 3G', '16Gb', '\"4.2\"\"\"', '2Gb', '1800mAh', 0),
(98, 5, 'P8 Lite', '5480', 'ALE-L23', '16Gb', '\"5\"\"\"', '2Gb', '2200mAh', 0),
(99, 5, 'Boulder U8350', '0', 'U8350', '512Mb', '\"2.6\"\"\"', '256Mb', '1200mAh', 0),
(100, 5, 'G6609', '0', 'G6609', '-', '\"2.4\"\"\"', '-', '1050mAh', 0),
(102, 5, 'Y210', '2210', 'Y210', '512Mb', '\"3.5\"\"\"', '256Mb', '1700mAh', 0),
(103, 5, 'Y221', '2275', 'Y221', '512Mb', '\"3.5\"\"\"', '256Mb', '1700mAh', 0),
(104, 5, 'Ascend G300', '3710', 'U8815', '4Gb', '\"4\"\"\"', '512Mb', '1500mAh', 0),
(105, 5, 'Ascend G620', '4843', 'G620S-L03A', '8Gb', '\"5\"\"\"', '1Gb', '2000mAh', 0),
(106, 5, 'Y300', '2340', 'Y300', '4Gb', '\"4\"\"\"', '512Mb', '1730mAh', 0),
(107, 5, 'Y321', '2340', 'Y321', '4Gb', '\"4\"\"\"', '512Mb', '1700mAh', 0),
(108, 5, 'Y330', '2340', 'Y330', '4Gb', '\"4\"\"\"', '512Mb', '1500mAh', 0),
(109, 5, 'Y600', '2340', 'Y600', '4Gb', '\"5\"\"\"', '512Mb', '2100mAh', 0),
(110, 5, 'Y6 II', '5460', 'CAM-L03', '16Gb', '\"5.5\"\"\"', '2Gb', '3000mAh', 0),
(111, 5, 'Y6', '4940', 'SCL-L03', '8Gb', '\"5\"\"\"', '1Gb', '2200mAh', 0),
(112, 5, 'P9', '8177', 'EVA-L09', '32Gb', '\"5.2\"\"\"', '3Gb', '3000mAh', 0),
(113, 5, 'P9 Lite', '6760', 'VNS-L53', '16Gb', '\"5.2\"\"\"', '3Gb', '3000mAh', 0),
(114, 5, 'Mate 8', '9056', 'NXT-L09', '32Gb', '\"6\"\"\"', '3Gb', '4000mAh', 0),
(115, 6, 'Xperia M', '3346', 'C1904', '4Gb', '\"4\"\"\"', '1Gb', '1750mAh', 0),
(116, 6, 'Xperia L', '3346', 'C2104', '8Gb', '\"4.3\"\"\"', '1Gb', '1750mAh', 0),
(117, 6, 'Xperia E4 3G', '3556', 'E2104/E2105', '8Gb', '\"5\"\"\"', '1Gb', '2400mAh', 0),
(118, 6, 'Xperia M4 Aqua', '5980', 'E2306', '16Gb', '\"5\"\"\"', '2Gb', '2400mAh', 0),
(119, 6, 'Xperia M2 3G', '4485', 'D2306', '8Gb', '\"4.8\"\"\"', '1Gb', '2300mAh', 0),
(120, 6, 'Xperia M2 4G', '4615', 'D2305', '8Gb', '\"4.8\"\"\"', '1Gb', '2300mAh', 0),
(121, 6, 'XPeria M5', '8060', 'E5606', '16Gb', '\"5\"\"\"', '3Gb', '2600mAh', 0),
(122, 6, 'XPeria M4', '5460', 'E2305', '16Gb', '\"5\"\"\"', '2Gb', '2400mAh', 0),
(123, 6, 'Xperia Z3', '6955', 'D6616', '32Gb', '\"5.2\"\"\"', '3Gb', '3100mAh', 0),
(124, 6, 'Xperia XA', '5525', 'F3113', '16Gb', '\"5\"\"\"', '2Gb', '2300mAh', 0),
(125, 6, 'Xperia XA1', '7657', 'G3116', '32Gb', '\"5\"\"\"', '3Gb', '2300mAh', 0),
(126, 6, 'Xperia XA1 Plus', '8060', 'G3423', '', '', '', '', 0),
(127, 6, 'Xperia L1', '5980', 'G3313', '16Gb', '\"5.5\"\"\"', '2Gb', '2620mAh', 0),
(128, 6, 'Xperia X', '8957', 'F5121', '32Gb', '\"5\"\"\"', '3Gb', '2620mAh', 0),
(129, 6, 'Xperia Z1', '5979', '', '16Gb', '\"5\"\"\"', '2Gb', '3000 mAh', 0),
(130, 7, 'Optimus L3', '1560', 'E400', '1Gb', '\"3.2\"\"\"', '384Mb', '1500 mAh', 0),
(131, 7, 'Optimus L7', '1820', 'P705', '4Gb', '\"4.3\"\"\"', '512 MB', '1700 mAh', 0),
(132, 7, 'Optimus L7II', '1820', 'P712', '4Gb', '\"4.3\"\"\"', '768 MB', '2460 mAh', 0),
(133, 7, 'Optimus L70', '2990', 'D320', '4Gb', '\"4.5\"\"\"', '1Gb', '2100 mAh', 0),
(134, 7, 'Joy / Kite', '3276', 'H221', '4Gb', '\"4\"\"\"', '512Mb', '1900 mAh', 0),
(135, 7, 'Leon', '4225', 'H340', '8Gb', '\"4.5\"\"\"', '1Gb', '1820 mAh', 0),
(136, 7, 'Spirit', '4537', 'H440', '8Gb', '\"4.7\"\"\"', '1Gb', '2100 mAh', 0),
(137, 7, 'G2 Mini 4G', '3757', 'D625', '8Gb', '\"4.7\"\"\"', '1Gb', '2440 mAh', 0),
(138, 7, 'G2 Mini 3G', '3757', 'D610', '8Gb', '\"4.7\"\"\"', '1Gb', '2440 mAh', 0),
(139, 7, 'G3 Stylus', '4680', 'D722', '8Gb', '\"5\"\"\"', '1Gb', '2540 mAh', 0),
(140, 7, 'G Pro Lite', '4485', 'D681', '8Gb', '5.5?', '1Gb', '3140 mAh', 0),
(141, 7, 'K4', '4290', 'K120', '8Gb', '\"4.5\"\"\"', '1Gb', '\"	1940 mAh\"', 0),
(142, 7, 'K4 2017', '5824', 'X230', '8Gb', '\"5\"\"\"', '1Gb', '2500 mAh', 0),
(143, 7, 'G2 Mini', '5070', 'D806', '16Gb', '\"5.2\"\"\"', '2Gb', '3000 mAh', 0),
(144, 7, 'G3', '5460', 'D855', '16Gb', '\"5.5\"\"\"', '2Gb', '3000 mAh', 0),
(145, 7, 'G4 Beat', '5772', 'H735', '16Gb', '\"5.2\"\"\"', '1.5Gb', '2300 mAh', 0),
(146, 7, 'Q6', '7280', 'M700', '32Gb', '\"5.5\"\"\"', '3Gb', '3000 mAh', 0),
(147, 7, 'F60', '3887', 'D390', '4Gb', '\"4.5\"\"\"', '1Gb', '2100mAh', 0),
(148, 7, 'F60', '4485', 'D390', '8Gb', '\"4.5\"\"\"', '1Gb', '2100mAh', 0),
(149, 7, 'Opimus G', '6916', 'E987', '32Gb', '\"4.7\"\"\"', '2Gb', '2100mAh', 0),
(150, 7, 'Zero', '6214', 'H650', '16Gb', '\"5\"\"\"', '1.5Gb', '2050 mAh', 0),
(151, 7, 'K8 4G', '7560', 'K350', '16Gb', '\"5\"\"\"', '1Gb', '2500mAh', 0),
(152, 7, 'K8 2017', '7628', 'X240', '16Gb', '\"5\"\"\"', '1.5Gb', '2500 mAh', 0),
(153, 7, 'K10 2016', '8658', 'K430', '16Gb', '\"5.3\"\"\"', '1.5Gb', '2300 mAh', 0),
(154, 7, 'G5', '6890', 'H850', '32Gb', '\"5.3\"\"\"', '4Gb', '2300 mAh', 0),
(155, 7, 'G4 Stylus', '5720', 'H635', '8Gb', '\"5.7\"\"\"', '1Gb', '3000 mAh', 0),
(156, 7, 'G4 Stylus TV 3G', '5902', 'H540', '8Gb', '\"5.7\"\"\"', '1Gb', '3000 mAh', 0),
(157, 7, 'K8 3G', '7027', 'K340', '8Gb', '\"5.3\"\"\"', '1Gb', '2300 mAh', 0),
(158, 7, 'K10 2017', '8564', 'M250', '16Gb', '\"5.3\"\"\"', '2Gb', ' 2800 mAh', 0),
(159, 7, 'G4', '7397', 'H815', '32Gb', '\"5.5\"\"\"', '3Gb', '3000 mAh', 0),
(160, 8, 'iPhone 5s 16Gb', '7150', 'A1453', '16Gb', '\"4\"\"\"', '1Gb', '1560mAh', 0),
(161, 8, 'iPhone 5s 32Gb', '12740', 'A1453', '32Gb', '\"4\"\"\"', '1Gb', '1560mAh', 0),
(162, 8, 'iPhone 6 16Gb', '14299', 'A1586', '16Gb', '\"4.7\"\"\"', '1Gb', '1810 mAh', 0),
(163, 8, 'iPhone 6s 32Gb', '15600', 'A1633', '32Gb', '\"4.7\"\"\"', '2Gb', '1715mAh', 0),
(164, 8, 'iPhone 6s 64Gb', '23140', 'A1688', '64Gb', '\"4.7\"\"\"', '2Gb', '1715mAh', 0),
(165, 8, 'iPhone 6 64Gb', '16640', 'A1549', '64Gb', '\"4.7\"\"\"', '1Gb', '1810mAh', 0),
(171, 2, 'Nuevo Agregado', '123213', '2221', '124', '5', '8', '12000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`) VALUES
(1, 'NachoRamiro', '$2y$10$Z.jdsFHd14uK9XWwtrjUMuLWb2aLk2tRLnbD7uDzJGbdOAcErSrii');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `reacondicionados`
--
ALTER TABLE `reacondicionados`
  ADD PRIMARY KEY (`id_reacondicionado`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_marca_2` (`id_marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reacondicionados`
--
ALTER TABLE `reacondicionados`
  MODIFY `id_reacondicionado` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reacondicionados`
--
ALTER TABLE `reacondicionados`
  ADD CONSTRAINT `reacondicionados_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
