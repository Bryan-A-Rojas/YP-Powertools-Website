-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 08:04 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yp-powertools-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `profile_image` varchar(500) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `profile_image`, `name`, `email`, `phone_number`, `password`, `role`, `status`) VALUES
(1, 'superadmin.jpg', 'superadmin', 'superadmin@gmail.com', '', '$2y$10$wHOu42/7tAn8RQvEgEC6b.ak4b8WWMCbz.IOkxXKv.cdztTzTbB5u', 'superadmin', 'active'),
(2, 'admin.jpg', 'Bryan Rojas', 'bryanrojas@gmail.com', '0915 143 8947', '$2y$10$t2M/orx5BQ5oVStFbgiIFeJbHuUAUtaEgAycCcziEUOHsTm1nshj.', 'admin', 'active'),
(3, 'admin2.jpg', 'Philip James Martinez', 'philipmartinez@gmail.com', '', '$2y$10$CQHkROu2UbNbxC.o4CRZceoyiMlZiLJ1GJY2FuZke3nCU5yB3zdjC', 'admin', 'active'),
(4, 'user1.jpg', 'Shintaro Cabrera', 'shintaro@gmail.com', '0906 502 2001', '$2y$10$sfC1YGDbjxczy.CBYWkHvOWYv3hIsjvVYGPX0eTded7d5Np6ENxGW', 'user', 'active'),
(5, 'user2.jpg', 'Airam Marchel', 'airam@gmail.com', '0906 502 2410', '$2y$10$7J8prx.tgg2TQnpSfaNJIelZyWdhGOdaGDglrxBlWvaQrCNb8s1pi', 'user', 'active'),
(6, 'user3.jpg', 'Jm Santillan', 'jmsantillan@gmail.com', '0915 456 2001', '$2y$10$JcDQpN3JCJBd9yaPQEmAlO6HMAoE8cO9.enWyhpJvDuAEYUVqXeVa', 'user', 'active'),
(7, 'user4.jpg', 'Jaimee Lyn Perez', 'jaimee@gmail.com', '0926 123 2004', '$2y$10$TeoPbs48E71DT4QZrmqT4.4byz8yMStw3RzVBma3O3m2n1VCF00iO', 'user', 'active'),
(8, 'user5.jpg', 'Aidan Michael Crispo', 'aidan@gmail.com', '0916 340 1998', '$2y$10$xDelJpF9ucbKRy.aEDtHNuM3gekmnPkofwdeSP2H6csbP.XFGNd5K', 'user', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addresses_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addresses_id`, `account_id`, `full_address`, `city`) VALUES
(1, 2, 'Pillar Village Tigil St. Bl. 123', 'Las Pinas'),
(2, 3, '', ''),
(3, 4, 'Pilar Blk 214 ', 'Las Pinas'),
(4, 5, 'Dasmarinas Lake Village Blk 2 Lt 105', 'Cavite'),
(5, 6, 'Calamba, Laguna Leaf Village', 'Tagaytay'),
(6, 7, 'Pillar Village Malayo St. Blk 205', 'Las Pinas'),
(7, 8, 'Laguna Hale Village Blk 203', 'San Pedro');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `account_id`, `date`, `description`) VALUES
(1, 4, '2018-04-13 22:54:37', 'viewed their cart'),
(2, 4, '2018-04-13 23:19:16', 'added 2 piece(s) of Makute - Router Bit Set to cart'),
(3, 4, '2018-04-13 23:19:17', 'viewed their cart'),
(4, 4, '2018-04-13 23:19:20', 'viewed their cart'),
(5, 4, '2018-04-13 23:19:24', 'viewed checkout'),
(6, 4, '2018-04-13 23:20:02', 'viewed checkout'),
(7, 4, '2018-04-13 23:20:11', 'checked out'),
(8, 4, '2018-04-13 23:27:48', 'added 1 piece(s) of Makute - Trimmer TR001 to cart'),
(9, 4, '2018-04-13 23:27:49', 'viewed their cart'),
(10, 4, '2018-04-13 23:28:19', 'added 1 piece(s) of Hoyoma Japan - Electric Blower HTEB-600 to cart'),
(11, 4, '2018-04-13 23:28:20', 'viewed their cart'),
(12, 4, '2018-04-13 23:31:45', 'viewed their cart'),
(13, 4, '2018-04-13 23:31:58', 'viewed checkout'),
(14, 4, '2018-04-13 23:32:04', 'checked out'),
(15, 4, '2018-04-13 23:36:58', 'viewed their cart'),
(16, 4, '2018-04-13 23:38:47', 'added 1 piece(s) of Auto Darkening Helmet to cart'),
(17, 4, '2018-04-13 23:38:47', 'viewed their cart'),
(18, 4, '2018-04-13 23:39:05', 'added 1 piece(s) of HOYOMA JAPAN - Table Saw 8 IN 800W TS200 to cart'),
(19, 4, '2018-04-13 23:39:05', 'viewed their cart'),
(20, 4, '2018-04-13 23:39:20', 'added 1 piece(s) of HOYOMA JAPAN - Mitre Saw MS8708 to cart'),
(21, 4, '2018-04-13 23:39:20', 'viewed their cart'),
(22, 4, '2018-04-13 23:39:29', 'viewed checkout'),
(23, 4, '2018-04-13 23:39:35', 'checked out'),
(24, 4, '2018-04-13 23:40:21', 'viewed their cart'),
(25, 4, '2018-04-13 23:40:36', 'added 1 piece(s) of HOYOMA JAPAN - Electric Router 3610B to cart'),
(26, 4, '2018-04-13 23:40:36', 'viewed their cart'),
(27, 4, '2018-04-13 23:40:39', 'viewed checkout'),
(28, 4, '2018-04-13 23:40:45', 'checked out'),
(29, 4, '2018-04-13 23:41:17', 'added 1 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(30, 4, '2018-04-13 23:41:17', 'viewed their cart'),
(31, 4, '2018-04-13 23:41:30', 'added 1 piece(s) of MITSUSHI -Welding Machine Min-MMA250 to cart'),
(32, 4, '2018-04-13 23:41:30', 'viewed their cart'),
(33, 4, '2018-04-13 23:41:52', 'added 1 piece(s) of TOTAL - Li-ion Cordless Drill 12V to cart'),
(34, 4, '2018-04-13 23:41:52', 'viewed their cart'),
(35, 4, '2018-04-13 23:41:57', 'viewed checkout'),
(36, 4, '2018-04-13 23:42:01', 'checked out'),
(37, 4, '2018-04-13 23:43:30', 'viewed their cart'),
(38, 5, '2018-04-14 00:08:35', 'added 1 piece(s) of TOTAL - auto Air Compressor 12V 140PSI to cart'),
(39, 5, '2018-04-14 00:08:35', 'viewed their cart'),
(40, 5, '2018-04-14 00:08:57', 'added 3 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(41, 5, '2018-04-14 00:08:57', 'viewed their cart'),
(42, 5, '2018-04-14 00:09:01', 'viewed checkout'),
(43, 5, '2018-04-14 00:09:06', 'checked out'),
(44, 5, '2018-04-14 00:09:19', 'viewed their cart'),
(45, 5, '2018-04-14 00:09:28', 'added 1 piece(s) of Fujima - Air Die Grinder XQ-T02 to cart'),
(46, 5, '2018-04-14 00:09:28', 'viewed their cart'),
(47, 5, '2018-04-14 00:09:31', 'viewed checkout'),
(48, 5, '2018-04-14 00:09:34', 'checked out'),
(49, 5, '2018-04-14 00:09:43', 'added 1 piece(s) of Angle Grinder AG9500 to cart'),
(50, 5, '2018-04-14 00:09:43', 'viewed their cart'),
(51, 5, '2018-04-14 00:09:56', 'added 2 piece(s) of Hoyoma Japan - Heat Gun HTHG - 2000C to cart'),
(52, 5, '2018-04-14 00:09:56', 'viewed their cart'),
(53, 5, '2018-04-14 00:10:07', 'added 1 piece(s) of Makute - Router Bit Set to cart'),
(54, 5, '2018-04-14 00:10:08', 'viewed their cart'),
(55, 5, '2018-04-14 00:10:21', 'added 1 piece(s) of Auto Darkening Helmet to cart'),
(56, 5, '2018-04-14 00:10:21', 'viewed their cart'),
(57, 5, '2018-04-14 00:10:27', 'viewed checkout'),
(58, 5, '2018-04-14 00:10:34', 'checked out'),
(59, 5, '2018-04-14 00:10:42', 'viewed their cart'),
(60, 5, '2018-04-14 00:11:18', 'added 5 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(61, 5, '2018-04-14 00:11:18', 'viewed their cart'),
(62, 5, '2018-04-14 00:11:22', 'viewed checkout'),
(63, 5, '2018-04-14 00:11:27', 'checked out'),
(64, 5, '2018-04-14 00:13:09', 'added 1 piece(s) of HOYOMA JAPAN - Mitre Saw MS8708 to cart'),
(65, 5, '2018-04-14 00:13:09', 'viewed their cart'),
(66, 5, '2018-04-14 00:13:14', 'viewed checkout'),
(67, 5, '2018-04-14 00:13:25', 'checked out'),
(68, 6, '2018-04-14 00:18:13', 'added 1 piece(s) of Drill Press Vise to cart'),
(69, 6, '2018-04-14 00:18:13', 'viewed their cart'),
(70, 6, '2018-04-14 00:18:22', 'added 1 piece(s) of Electric Chain Saw Stand to cart'),
(71, 6, '2018-04-14 00:18:22', 'viewed their cart'),
(72, 6, '2018-04-14 00:20:50', 'viewed their cart'),
(73, 6, '2018-04-14 00:21:03', 'added 1 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(74, 6, '2018-04-14 00:21:03', 'viewed their cart'),
(75, 6, '2018-04-14 00:21:19', 'viewed checkout'),
(76, 6, '2018-04-14 00:21:26', 'checked out'),
(77, 6, '2018-04-14 00:23:30', 'added 2 piece(s) of Makute - Trimmer TR001 to cart'),
(78, 6, '2018-04-14 00:23:30', 'viewed their cart'),
(79, 6, '2018-04-14 00:23:42', 'added 2 piece(s) of Auto Darkening Helmet to cart'),
(80, 6, '2018-04-14 00:23:43', 'viewed their cart'),
(81, 6, '2018-04-14 00:24:04', 'added 1 piece(s) of TOTAL - Li-ion Cordless Drill 12V to cart'),
(82, 6, '2018-04-14 00:24:04', 'viewed their cart'),
(83, 6, '2018-04-14 00:24:10', 'viewed checkout'),
(84, 6, '2018-04-14 00:24:14', 'checked out'),
(85, 6, '2018-04-14 00:26:04', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(86, 6, '2018-04-14 00:26:04', 'viewed their cart'),
(87, 6, '2018-04-14 00:26:17', 'added 1 piece(s) of HOYOMA JAPAN - Miter Saw MS-92552A to cart'),
(88, 6, '2018-04-14 00:26:17', 'viewed their cart'),
(89, 6, '2018-04-14 00:26:30', 'added 1 piece(s) of MITSUSHI -Welding Machine Min-MMA250 to cart'),
(90, 6, '2018-04-14 00:26:30', 'viewed their cart'),
(91, 6, '2018-04-14 00:26:45', 'added 1 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(92, 6, '2018-04-14 00:26:45', 'viewed their cart'),
(93, 6, '2018-04-14 00:26:59', 'added 1 piece(s) of TOTAL - Impact Drill 1010W to cart'),
(94, 6, '2018-04-14 00:26:59', 'viewed their cart'),
(95, 6, '2018-04-14 00:27:05', 'viewed checkout'),
(96, 6, '2018-04-14 00:27:10', 'checked out'),
(97, 6, '2018-04-14 00:27:52', 'added 1 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(98, 6, '2018-04-14 00:27:52', 'viewed their cart'),
(99, 6, '2018-04-14 00:28:03', 'added 1 piece(s) of Hoyoma Japan - Impact Drill HT -ID650 to cart'),
(100, 6, '2018-04-14 00:28:03', 'viewed their cart'),
(101, 6, '2018-04-14 00:28:12', 'added 1 piece(s) of Hoyoma Japan - Heat Gun HTHG - 2000C to cart'),
(102, 6, '2018-04-14 00:28:12', 'viewed their cart'),
(103, 6, '2018-04-14 00:28:16', 'viewed checkout'),
(104, 6, '2018-04-14 00:28:21', 'checked out'),
(105, 6, '2018-04-14 00:29:49', 'added 1 piece(s) of HOYOMA JAPAN - Mini Saw MNS600 to cart'),
(106, 6, '2018-04-14 00:29:50', 'viewed their cart'),
(107, 6, '2018-04-14 00:30:04', 'added 1 piece(s) of TOTAL - Electric Planer 1050W to cart'),
(108, 6, '2018-04-14 00:30:04', 'viewed their cart'),
(109, 6, '2018-04-14 00:30:09', 'viewed checkout'),
(110, 6, '2018-04-14 00:30:14', 'checked out'),
(111, 7, '2018-04-14 00:32:14', 'added 1 piece(s) of Angle Grinder AG9500 to cart'),
(112, 7, '2018-04-14 00:32:14', 'viewed their cart'),
(113, 7, '2018-04-14 00:36:21', 'viewed their cart'),
(114, 7, '2018-04-14 00:36:24', 'viewed their cart'),
(115, 7, '2018-04-14 00:36:34', 'added 1 piece(s) of Fujima - Air Die Grinder XQ-T02 to cart'),
(116, 7, '2018-04-14 00:36:35', 'viewed their cart'),
(117, 7, '2018-04-14 00:36:39', 'viewed checkout'),
(118, 7, '2018-04-14 00:36:45', 'checked out'),
(119, 7, '2018-04-14 00:36:59', 'added 2 piece(s) of HOYOMA JAPAN - Electric Router 3610B to cart'),
(120, 7, '2018-04-14 00:36:59', 'viewed their cart'),
(121, 7, '2018-04-14 00:37:09', 'added 1 piece(s) of Hoyoma Japan - Impact Drill HT -ID650 to cart'),
(122, 7, '2018-04-14 00:37:09', 'viewed their cart'),
(123, 7, '2018-04-14 00:37:27', 'added 1 piece(s) of Hoyoma Japan - Heat Gun HTHG - 2000C to cart'),
(124, 7, '2018-04-14 00:37:27', 'viewed their cart'),
(125, 7, '2018-04-14 00:37:32', 'viewed checkout'),
(126, 7, '2018-04-14 00:37:44', 'checked out'),
(127, 7, '2018-04-14 00:39:28', 'added 1 piece(s) of Electric Chain Saw Stand to cart'),
(128, 7, '2018-04-14 00:39:28', 'viewed their cart'),
(129, 7, '2018-04-14 00:40:02', 'added 2 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(130, 7, '2018-04-14 00:40:02', 'viewed their cart'),
(131, 7, '2018-04-14 00:42:06', 'added 2 piece(s) of Makute - Trimmer TR001 to cart'),
(132, 7, '2018-04-14 00:42:06', 'viewed their cart'),
(133, 7, '2018-04-14 00:42:21', 'added 1 piece(s) of TOTAL - Li-ion Cordless Drill 18V to cart'),
(134, 7, '2018-04-14 00:42:21', 'viewed their cart'),
(135, 7, '2018-04-14 00:43:04', 'viewed checkout'),
(136, 7, '2018-04-14 00:43:10', 'checked out'),
(137, 7, '2018-04-14 00:47:14', 'added 1 piece(s) of HOYOMA JAPAN - Miter Saw MS-92552A to cart'),
(138, 7, '2018-04-14 00:47:14', 'viewed their cart'),
(139, 7, '2018-04-14 00:47:26', 'added 1 piece(s) of HOYOMA JAPAN - Mitre Saw MS8708 to cart'),
(140, 7, '2018-04-14 00:47:26', 'viewed their cart'),
(141, 7, '2018-04-14 00:47:34', 'added 1 piece(s) of Finish Sander HT-FS18702 to cart'),
(142, 7, '2018-04-14 00:47:34', 'viewed their cart'),
(143, 7, '2018-04-14 00:47:39', 'viewed checkout'),
(144, 7, '2018-04-14 00:47:49', 'checked out'),
(145, 7, '2018-04-14 00:50:36', 'added 1 piece(s) of Hoyoma Japan - Heat Gun HTHG - 2000C to cart'),
(146, 7, '2018-04-14 00:50:36', 'viewed their cart'),
(147, 7, '2018-04-14 00:50:47', 'added 1 piece(s) of Finish Sander HT-FS18702 to cart'),
(148, 7, '2018-04-14 00:50:48', 'viewed their cart'),
(149, 7, '2018-04-14 00:51:11', 'added 1 piece(s) of Fujima - Air Die Grinder XQ-T02 to cart'),
(150, 7, '2018-04-14 00:51:11', 'viewed their cart'),
(151, 7, '2018-04-14 00:51:15', 'viewed checkout'),
(152, 7, '2018-04-14 00:51:20', 'checked out'),
(153, 8, '2018-04-14 00:53:50', 'added 1 piece(s) of HOYOMA JAPAN - Straight Grinder SG-9105A to cart'),
(154, 8, '2018-04-14 00:53:50', 'viewed their cart'),
(155, 8, '2018-04-14 00:54:01', 'added 1 piece(s) of HOYOMA JAPAN - Table Saw 8 IN 800W TS200 to cart'),
(156, 8, '2018-04-14 00:54:01', 'viewed their cart'),
(157, 8, '2018-04-14 00:54:06', 'viewed checkout'),
(158, 8, '2018-04-14 00:54:11', 'checked out'),
(159, 8, '2018-04-14 00:54:24', 'added 1 piece(s) of TOTAL - Electric Planer 1050W to cart'),
(160, 8, '2018-04-14 00:54:24', 'viewed their cart'),
(161, 8, '2018-04-14 00:55:06', 'added 1 piece(s) of TOTAL - Impact Drill 1010W to cart'),
(162, 8, '2018-04-14 00:55:06', 'viewed their cart'),
(163, 8, '2018-04-14 00:55:20', 'added 1 piece(s) of Angle Grinder AG9500 to cart'),
(164, 8, '2018-04-14 00:55:20', 'viewed their cart'),
(165, 8, '2018-04-14 00:55:23', 'viewed checkout'),
(166, 8, '2018-04-14 00:55:30', 'checked out'),
(167, 8, '2018-04-14 00:58:53', 'added 1 piece(s) of TOTAL - auto Air Compressor 12V 140PSI to cart'),
(168, 8, '2018-04-14 00:58:53', 'viewed their cart'),
(169, 8, '2018-04-14 00:59:26', 'added 1 piece(s) of Hoyoma Japan - Electric Blower HTEB-600 to cart'),
(170, 8, '2018-04-14 00:59:27', 'viewed their cart'),
(171, 8, '2018-04-14 00:59:40', 'added 2 piece(s) of JAPAN FUJIMA - autoDarkening Welding Helmet to cart'),
(172, 8, '2018-04-14 00:59:40', 'viewed their cart'),
(173, 8, '2018-04-14 00:59:44', 'viewed checkout'),
(174, 8, '2018-04-14 00:59:48', 'checked out'),
(175, 8, '2018-04-14 01:01:23', 'added 1 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(176, 8, '2018-04-14 01:01:23', 'viewed their cart'),
(177, 8, '2018-04-14 01:01:34', 'added 1 piece(s) of Auto Darkening Helmet to cart'),
(178, 8, '2018-04-14 01:01:34', 'viewed their cart'),
(179, 8, '2018-04-14 01:01:38', 'viewed checkout'),
(180, 8, '2018-04-14 01:01:42', 'checked out'),
(181, 8, '2018-04-14 01:02:14', 'added 1 piece(s) of TOTAL - Li-ion Cordless Drill 12V to cart'),
(182, 8, '2018-04-14 01:02:14', 'viewed their cart'),
(183, 8, '2018-04-14 01:02:22', 'added 1 piece(s) of TOTAL - Li-ion Cordless Drill 18V to cart'),
(184, 8, '2018-04-14 01:02:22', 'viewed their cart'),
(185, 8, '2018-04-14 01:02:32', 'added 1 piece(s) of Makute - Router Bit Set to cart'),
(186, 8, '2018-04-14 01:02:33', 'viewed their cart'),
(187, 8, '2018-04-14 01:02:40', 'viewed checkout'),
(188, 8, '2018-04-14 01:02:44', 'checked out'),
(189, 4, '2018-04-14 02:01:57', 'viewed their cart');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1',
  `availability` varchar(255) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `description`, `stock`, `availability`) VALUES
(1, 'Angle Grinder.jpg', 'Angle Grinder AG9500', 1300, 'Hoyoma Angle Grinder 570Watts - Industrial\r\nCOD Price - Manila (1 to 5 working days delivery): P1450\r\nCOD Price - Provincial (1 to 7 working days delivery): P1600', 497, 'available'),
(2, 'Table_Vice_1.jpg', 'Asaki - Table Vice', 1200, '3000 Piece/Pieces per Month 6\" heavy duty adjustable bench vise', 500, 'available'),
(3, 'Finish_Sander_3.jpg', 'Finish Sander HT-FS18702', 4000, 'Hoyoma Finish Sander HT-FS18702\r\n220V-60Hz\r\n260w\r\n6000-11000/Min\r\n187x90mm\r\n', 498, 'available'),
(4, 'Air_Die_Grinder_2.jpg', 'Fujima - Air Die Grinder XQ-T02', 2999, '16pcs air die grinder kit \r\nModel: XQ-T02\r\nBrand: Fujima', 497, 'available'),
(5, 'Electric_Blower_4.jpg', 'Hoyoma Japan - Electric Blower HTEB-600', 2800, 'Durable\r\nHigh quality material\r\nLeight weight\r\nEasy to use', 498, 'available'),
(6, 'Heat_Gun_1.jpg', 'Hoyoma Japan - Heat Gun HTHG - 2000C', 2800, '2 heat level 350Â° and 550Â°\r\n2000watts\r\n220volts\r\nCan be use for Shrinking plastic wraps, Sealing & Embossing\r\nAirflow Settings: 250L/Min , 550L/Min\r\nAir outlet Nozzle\r\nFor Dual temperature Settings\r\nOverheating Protection', 495, 'available'),
(7, 'Impact_Drill_1.jpg', 'Hoyoma Japan - Impact Drill HT -ID650', 2200, 'Hoyoma Japan Impact Drill with Hammer is designed for hammer drilling in cement, tiles and stonework, as well as for drilling without hammer function in wood, metal, ceramics, and plastic.\r\nIt is also designed to screw screws in and out.\r\nHeavy Duty', 498, 'available'),
(8, 'Jigsaw_HT_6.jpg', 'Hoyoma Japan - Jigsaw HT - JS650', 3600, 'Pendulum Electric Jigsaw has been designed for sawing wood, metal and plastics.\r\nOn/Off switch\r\nLock Button\r\nSpeed Adjusting Wheel\r\nSafety guard\r\nSaw blade holder\r\nShoe\r\nPendulum Action Switch\r\nAllen Key Holder\r\nDust Extraction Connection', 497, 'available'),
(9, 'Router_Bit_Set_1.jpg', 'Makute - Router Bit Set', 2000, '1/2\" 12mm 15pcs. bits\r\nmakute japan brand\r\n', 496, 'available'),
(10, 'Trimmer_TR001_1.jpg', 'Makute - Trimmer TR001', 623, 'Model:	TR001 Trimmer\r\nRated Volatge:	220-240/110V\r\nRated Frequency:	50/60Hz\r\nRated Input Power:	580W\r\nNo Load Speed:	30000r/min\r\nChuck size	6mm\r\nG.W./N.W.:	16/15 KGS\r\nSize:	47.5*31.5*22cm', 495, 'available'),
(11, 'Electric_Drill_4.jpg', 'Total - Electric Drill 280W', 2390, '280W\r\n220-240 V, 50-60 Hz\r\n0-750/ min No Load Speed\r\nForward and reverse rotation\r\nVariable Speed for different drilling\r\nNo load speed: 0-750/min\r\nChuck capacity: 0.8-10mm\r\nTorque Setting: 20+1\r\nHeavy duty as quality compares to the other brands in the market', 499, 'available'),
(12, 'Auto_Darkening_Helmet_5.jpg', 'Auto Darkening Helmet', 2000, 'Durable Auto Darkening Welding Helmet with Eagle Red Design', 495, 'available'),
(13, 'Drill_Press_Vise_1.jpg', 'Drill Press Vise', 800, 'Slotted base for easy installation and positioning\r\nTextured jaws for secure gripping\r\n4.5 Inch jaw capacity perfect for light duty tasks\r\nLightweight and portable\r\nCrated of forged iron for long-lasting durability\r\nSlotted base for easy installation and positioning\r\n4.5 Inch jaw capacity perfect for light duty tasks', 499, 'available'),
(14, 'Electric_Chain_Saw_Stand_4.jpg', 'Electric Chain Saw Stand', 1500, 'It can be use for cutting small branches of tree\r\nLight weight and portable', 498, 'available'),
(15, 'Electric_Router_2.jpg', 'HOYOMA JAPAN - Electric Router 3610B', 2999, 'Lightweight for easy handling.\r\nContoured double handles for comfort and control.\r\nVariable speed control dial (23000/min) to matach the speed tothe material being cut.\r\nAluminium base.', 497, 'available'),
(16, 'Mini_Saw_7.jpg', 'HOYOMA JAPAN - Mini Saw MNS600', 6500, 'Heavy duty\r\nHigh quality\r\nEasy to use', 499, 'available'),
(17, 'Miter_Saw_MS_92552A_1.jpg', 'HOYOMA JAPAN - Miter Saw MS-92552A', 4500, 'Power input: 1800w\r\nNo load speed: 6000/min\r\nSaw blade: 255x30mm,100T\r\nUsed to cut wood, aluminum alloy, plastic.', 498, 'available'),
(18, 'Miter_Saw_MS8708_2.jpg', 'HOYOMA JAPAN - Mitre Saw MS8708', 6745, 'Power Supply : 220V-60Hz\r\nPower Input : 1800W\r\nNo Load Speed : 6000/min\r\nSaw Blade : 255 x 30mm, 100T\r\nUsed to cut wood, alluminum alloy, plastic', 497, 'available'),
(19, 'Straight_Grinder_3.jpg', 'HOYOMA JAPAN - Straight Grinder SG-9105A', 7000, 'Wheel dia 125mm x 19mm (5â€³ x 3/4â€³)\r\nHole dia 12.7mm (1/2â€³)\r\nInput 750W\r\nNo load speed ', 499, 'available'),
(20, 'Table_Saw_8_IN_800W_TS200_2.jpg', 'HOYOMA JAPAN - Table Saw 8 IN 800W TS200', 3750, 'voltage frequency:220v~60hz \r\ninput power: 800w  S2  10min \r\nno~load speed: 3450/min-1 \r\nsaw blade: (8\") 200*16*2.4mm \r\ntable size: 505*335mm \r\nmax. cutting depth: 43mm(90Â°) 27mm(45Â°)', 498, 'available'),
(21, 'AutoDarkening_Welding_Helmet_1.jpg', 'JAPAN FUJIMA - autoDarkening Welding Helmet', 850, 'With Shade Control\r\nFull Face Cover\r\nSolar Powered\r\nBattery powered with solar for long life(up to 5000hrs)\r\nfilter darkning reaction is 1/25000 sec.\r\nFeatures auto-off circuitry at 10-15min\r\nLight weight well-balanced design fully adjustable\r\nTow independent Arc sensors\r\nFilter darkning reaction is 1/25000 sec.\r\nLight weight well-balanced design fully adjustable headgear provides comfort and reduces fatigue.', 486, 'available'),
(22, 'Welding_Machine_Min_1.jpg', 'MITSUSHI -Welding Machine Min-MMA250', 5100, 'INVERTER WELDING MACHINE - MINI  \r\nWelding Current Adjusting Range: 20-315\r\nRated Duty Cycle: 60\r\nFrequency (Hz): 50/60\r\nRated input capacity: 11.5\r\nUsable electrodes (mm): 1.6-4.0\r\nHigh efficiency, light, compact, easy to operate', 498, 'available'),
(23, 'Auto_Air_Compressor_4.jpg', 'TOTAL - auto Air Compressor 12V 140PSI', 1420, 'Voltage : DC12V\r\nRated Current : 10A\r\nFlow Rate : 35L/Min\r\nMaximum Pressure : 140 PSI', 498, 'available'),
(24, 'Electric_Planer_1050W_1.jpg', 'TOTAL - Electric Planer 1050W', 4500, 'Heavy duty industrial grade electric planer ideal for trimming and finishing rough wood stock.\r\nPowerful 1,050 watts motor provides high power and torque for consistently professional results.\r\nHigh overload capability plus improved motor cooling allows for longer working cycles.\r\nEasy-to-use soft grip handle for enhanced operator comfort and increased productivity.', 498, 'available'),
(25, 'Impact_Drill_1010W_1.jpg', 'TOTAL - Impact Drill 1010W', 6000, 'Total Drill\r\n13mm Drill\r\n1/2 Drill\r\nImpact Drill', 498, 'available'),
(26, 'Li-ion_Cordless_Drill_12V_7.jpg', 'TOTAL - Li-ion Cordless Drill 12V', 4000, 'BATTERY	12V Li - ion / 1.5Ah\r\nTORQUE max.	20 Nm\r\nSPEEDS	2\r\nNO LOAD SPEED	0 - 350 / 0 - 1.250 rpm\r\nCHUCK CAPACITY	10mm\r\nDRILLING	10mm (STEEL) / 20mm (WOOD)', 497, 'available'),
(27, 'Li-ion_Cordless_Drill_18V_1.jpg', 'TOTAL - Li-ion Cordless Drill 18V', 3220, 'BATTERY	18V Li - ion / 1.5Ah TORQUE max.	20 Nm SPEEDS	2 NO LOAD SPEED	0 - 350 / 0 - 1.250 rpm CHUCK CAPACITY 10mm DRILLING	10mm (STEEL) / 20mm (WOOD)', 498, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `transaction_id`, `product_id`, `quantity`) VALUES
(1, 1, 9, 2),
(2, 2, 5, 1),
(3, 2, 10, 1),
(4, 3, 12, 1),
(5, 3, 18, 1),
(6, 3, 20, 1),
(7, 4, 15, 1),
(8, 5, 21, 1),
(9, 5, 22, 1),
(10, 5, 26, 1),
(11, 6, 21, 3),
(12, 6, 23, 1),
(13, 7, 4, 1),
(14, 8, 1, 1),
(15, 8, 6, 2),
(16, 8, 9, 1),
(17, 8, 12, 1),
(18, 9, 21, 5),
(19, 10, 18, 1),
(20, 11, 8, 1),
(21, 11, 13, 1),
(22, 11, 14, 1),
(23, 12, 10, 2),
(24, 12, 12, 2),
(25, 12, 26, 1),
(26, 13, 11, 1),
(27, 13, 17, 1),
(28, 13, 21, 1),
(29, 13, 22, 1),
(30, 13, 25, 1),
(31, 14, 6, 1),
(32, 14, 7, 1),
(33, 14, 8, 1),
(34, 15, 16, 1),
(35, 15, 24, 1),
(36, 16, 1, 1),
(37, 16, 4, 1),
(38, 17, 6, 1),
(39, 17, 7, 1),
(40, 17, 15, 2),
(41, 18, 10, 2),
(42, 18, 14, 1),
(43, 18, 21, 2),
(44, 18, 27, 1),
(45, 19, 3, 1),
(46, 19, 17, 1),
(47, 19, 18, 1),
(48, 20, 3, 1),
(49, 20, 4, 1),
(50, 20, 6, 1),
(51, 21, 19, 1),
(52, 21, 20, 1),
(53, 22, 1, 1),
(54, 22, 24, 1),
(55, 22, 25, 1),
(56, 23, 5, 1),
(57, 23, 21, 2),
(58, 23, 23, 1),
(59, 24, 8, 1),
(60, 24, 12, 1),
(61, 25, 9, 1),
(62, 25, 26, 1),
(63, 25, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `payment_given` double NOT NULL,
  `date_of_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `account_id`, `total_price`, `payment_given`, `date_of_purchase`, `status`) VALUES
(1, 4, 4000, 4000, '2017-04-06 23:20:11', 'approved'),
(2, 4, 3423, 3500, '2017-04-10 23:32:03', 'approved'),
(3, 4, 12495, 13000, '2017-04-12 23:39:34', 'approved'),
(4, 4, 2999, 3000, '2017-05-13 23:40:45', 'approved'),
(5, 4, 9950, 10000, '2017-06-08 23:42:01', 'approved'),
(6, 5, 3970, 4000, '2017-07-14 00:09:06', 'approved'),
(7, 5, 2999, 3000, '2017-08-25 00:09:34', 'approved'),
(8, 5, 10900, 11000, '2017-09-19 00:10:33', 'approved'),
(9, 5, 4250, 5000, '2017-09-21 00:11:27', 'approved'),
(10, 5, 6745, 6800, '2018-10-02 00:13:25', 'approved'),
(11, 6, 5900, 6000, '2018-10-05 00:21:25', 'approved'),
(12, 6, 9246, 10000, '2017-11-03 00:24:14', 'approved'),
(13, 6, 18840, 20000, '2017-11-06 00:27:10', 'approved'),
(14, 6, 8600, 9000, '2017-12-07 00:28:21', 'approved'),
(15, 6, 11000, 11000, '2017-12-20 00:30:13', 'approved'),
(16, 7, 4299, 4299, '2018-01-08 00:36:44', 'approved'),
(17, 7, 10998, 11000, '2018-01-18 00:37:43', 'approved'),
(18, 7, 7666, 8000, '2018-01-21 00:43:09', 'approved'),
(19, 7, 15245, 16000, '2018-02-16 00:47:49', 'approved'),
(20, 7, 9799, 9800, '2018-02-23 00:51:19', 'approved'),
(21, 8, 10750, 10800, '2018-03-15 00:54:11', 'approved'),
(22, 8, 11800, 12000, '2018-03-21 00:55:29', 'approved'),
(23, 8, 5920, 6000, '2018-04-09 00:59:47', 'approved'),
(24, 8, 5600, 6000, '2018-04-11 01:01:42', 'approved'),
(25, 8, 9220, 10000, '2018-04-14 01:02:43', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addresses_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addresses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
