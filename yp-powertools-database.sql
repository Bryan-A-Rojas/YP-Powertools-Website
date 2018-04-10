-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 09:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `profile_image`, `name`, `email`, `password`, `role`, `status`) VALUES
(1, 'sample-user.png', 'John Doe', 'johndoe@gmail.com', '$2y$10$Im/icrwqDB7xHPLXJaCMQuz/l./in1iBGvX1qclr9FDs3d3aA0hVO', 'user', 'active'),
(2, NULL, 'test1', 'test1@gmail.com', '$2y$10$K94nyapkq5o8y1vbaMyNfOX/E14RHrSvdmJ1PEx0um5FAV4OS8Waq', 'user', 'active'),
(3, 'sample-admin.png', 'admin', 'admin@gmail.com', '$2y$10$NsJrlA8n3REFAy0.yJGtieHYIlBIoBEFwpn3Va3vZgAGtRz5lAgE.', 'admin', 'active'),
(4, '1lqtvaic0sa01.png', 'superadmin', 'superadmin@gmail.com', '$2y$10$wHOu42/7tAn8RQvEgEC6b.ak4b8WWMCbz.IOkxXKv.cdztTzTbB5u', 'superadmin', 'active'),
(5, 'aE9vBTqvT2XvmkkQUX8s_Us6AWnfgD5ByjZlYlU5WJg.png', 'test2', 'test2@gmail.com', '$2y$10$jT3Rew5mZOUtIkn.zPeyAuqAMu6stu2npftJQWflBNFZlL4OI.08y', 'user', 'active');

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
(1, 1, 'Alabang Hills, Muntinlupa City', 'Muntinlupa'),
(2, 5, 'Alabang Hills, SBCA, Muntinlupa City', 'Muntinlupa City');

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `account_id`, `product_id`, `quantity`) VALUES
(16, 5, 3, 1);

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
(1, 1, '2018-03-24 20:27:02', 'added 1 Angle Grinder to cart'),
(2, 1, '2018-03-24 20:29:44', 'removed Total - Electric Drill 280W from cart'),
(3, 1, '2018-03-24 20:32:10', 'viewed their cart'),
(4, 1, '2018-03-24 20:36:57', 'viewed their cart'),
(5, 1, '2018-03-25 20:27:44', 'viewed their cart'),
(6, 1, '2018-03-25 20:27:49', 'viewed their cart'),
(7, 1, '2018-03-25 20:29:12', 'viewed their cart'),
(8, 1, '2018-03-25 20:33:09', 'viewed their cart'),
(9, 1, '2018-03-25 20:43:58', 'viewed their cart'),
(10, 1, '2018-03-25 21:04:37', 'viewed their cart'),
(11, 1, '2018-03-25 21:10:20', 'viewed their cart'),
(12, 1, '2018-03-25 21:10:47', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(13, 1, '2018-03-25 21:10:49', 'viewed their cart'),
(14, 1, '2018-03-25 21:12:32', 'viewed their cart'),
(15, 1, '2018-03-25 21:13:45', 'viewed their cart'),
(16, 1, '2018-03-25 21:15:54', 'viewed checkout'),
(17, 1, '2018-03-25 21:18:13', 'viewed checkout'),
(18, 1, '2018-03-25 21:19:15', 'viewed checkout'),
(19, 1, '2018-03-25 21:19:43', 'viewed checkout'),
(20, 1, '2018-03-25 21:19:50', 'viewed checkout'),
(21, 1, '2018-03-25 21:19:54', 'viewed checkout'),
(22, 1, '2018-03-25 21:19:57', 'viewed checkout'),
(23, 1, '2018-03-25 21:20:33', 'viewed checkout'),
(24, 1, '2018-03-25 21:49:15', 'added 1 pieces of Angle Grinder to cart'),
(25, 1, '2018-03-25 21:49:16', 'viewed their cart'),
(26, 1, '2018-03-25 21:49:23', 'viewed checkout'),
(27, 1, '2018-03-25 21:51:23', 'added 1 pieces of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(28, 1, '2018-03-25 21:51:24', 'viewed their cart'),
(29, 1, '2018-03-25 21:51:33', 'added 1 pieces of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(30, 1, '2018-03-25 21:51:34', 'viewed their cart'),
(31, 1, '2018-03-25 21:57:03', 'viewed checkout'),
(32, 1, '2018-03-25 21:58:23', 'viewed checkout'),
(33, 1, '2018-03-25 22:00:59', 'viewed checkout'),
(34, 1, '2018-03-25 22:03:50', 'viewed checkout'),
(35, 1, '2018-03-25 22:10:11', 'checked out'),
(36, 1, '2018-03-25 22:12:32', 'checked out'),
(37, 1, '2018-03-25 22:16:26', 'added 1 pieces of Angle Grinder to cart'),
(38, 1, '2018-03-25 22:16:32', 'viewed their cart'),
(39, 1, '2018-03-25 22:17:09', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(40, 1, '2018-03-25 22:17:10', 'viewed their cart'),
(41, 1, '2018-03-25 22:17:18', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(42, 1, '2018-03-25 22:17:18', 'viewed their cart'),
(43, 5, '2018-03-25 22:17:54', 'viewed their cart'),
(44, 5, '2018-03-25 22:18:10', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(45, 5, '2018-03-25 22:18:11', 'viewed their cart'),
(46, 1, '2018-03-25 22:18:47', 'viewed their cart'),
(47, 1, '2018-03-25 22:18:49', 'viewed checkout'),
(48, 1, '2018-03-25 22:19:40', 'checked out'),
(49, 1, '2018-03-25 22:21:39', 'viewed their cart'),
(50, 1, '2018-03-25 22:23:16', 'viewed checkout'),
(51, 1, '2018-03-26 07:47:09', 'viewed checkout'),
(52, 1, '2018-03-26 07:47:16', 'viewed their cart'),
(53, 1, '2018-03-26 07:47:46', 'viewed their cart'),
(54, 1, '2018-03-26 07:47:48', 'viewed their cart'),
(55, 1, '2018-03-26 07:50:20', 'added 2 pieces of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(56, 1, '2018-03-26 07:50:21', 'viewed their cart'),
(57, 1, '2018-03-26 07:50:26', 'viewed checkout'),
(58, 1, '2018-03-26 07:50:45', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(59, 1, '2018-03-26 07:50:46', 'viewed their cart'),
(60, 1, '2018-03-26 07:50:55', 'viewed checkout'),
(61, 1, '2018-03-26 07:53:12', 'viewed their cart'),
(62, 1, '2018-03-26 07:56:23', 'viewed checkout'),
(63, 1, '2018-03-26 07:56:42', 'added 1 pieces of Fujima - Air Die Grinder XQ-T02 to cart'),
(64, 1, '2018-03-26 07:56:42', 'viewed their cart'),
(65, 1, '2018-03-26 07:56:46', 'viewed checkout'),
(66, 1, '2018-03-26 07:56:54', 'checked out'),
(67, 1, '2018-03-26 08:00:11', 'added 4 pieces of Makute - Trimmer TR001 to cart'),
(68, 1, '2018-03-26 08:00:12', 'viewed their cart'),
(69, 1, '2018-03-26 08:00:18', 'viewed checkout'),
(70, 1, '2018-03-26 08:01:19', 'viewed their cart'),
(71, 1, '2018-03-26 08:23:56', 'added 1 pieces of Makute - Trimmer TR001 to cart'),
(72, 1, '2018-03-26 08:23:57', 'viewed their cart'),
(73, 1, '2018-03-26 08:24:08', 'viewed checkout'),
(74, 1, '2018-03-26 08:24:20', 'checked out'),
(75, 1, '2018-03-26 08:38:02', 'added 1 pieces of Angle Grinder to cart'),
(76, 1, '2018-03-26 08:38:02', 'viewed their cart'),
(77, 1, '2018-03-26 08:38:09', 'removed Angle Grinder from cart'),
(78, 1, '2018-03-26 08:38:09', 'viewed their cart'),
(79, 1, '2018-03-26 08:38:19', 'viewed checkout'),
(80, 1, '2018-03-26 08:38:24', 'viewed their cart'),
(81, 1, '2018-03-26 08:38:45', 'added 1 pieces of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(82, 1, '2018-03-26 08:38:45', 'viewed their cart'),
(83, 1, '2018-03-26 08:38:54', 'viewed checkout'),
(84, 1, '2018-03-26 11:51:21', 'viewed their cart'),
(85, 1, '2018-03-26 13:55:04', 'viewed their cart'),
(86, 1, '2018-03-26 15:26:43', 'viewed their cart'),
(87, 1, '2018-03-26 15:27:37', 'added 2 pieces of Makute - Trimmer TR001 to cart'),
(88, 1, '2018-03-26 15:27:38', 'viewed their cart'),
(89, 1, '2018-03-26 15:27:42', 'viewed checkout'),
(90, 1, '2018-03-26 15:27:53', 'checked out'),
(91, 1, '2018-03-26 16:30:01', 'viewed their cart'),
(92, 1, '2018-03-31 11:55:29', 'viewed their cart'),
(93, 1, '2018-03-31 11:56:03', 'viewed their cart'),
(94, 1, '2018-03-31 11:56:10', 'viewed checkout'),
(95, 1, '2018-03-31 11:57:38', 'viewed their cart'),
(96, 1, '2018-03-31 11:58:17', 'viewed their cart'),
(97, 1, '2018-03-31 19:51:12', 'added 4 pieces of Hoyoma Japan - Electric Blower HTEB-600 to cart'),
(98, 1, '2018-03-31 19:51:13', 'viewed their cart'),
(99, 1, '2018-03-31 19:51:38', 'added 1 pieces of Total - Electric Drill 280W to cart'),
(100, 1, '2018-03-31 19:51:38', 'viewed their cart'),
(101, 1, '2018-03-31 19:52:38', 'viewed checkout'),
(102, 1, '2018-03-31 19:52:46', 'checked out'),
(103, 1, '2018-03-31 19:53:21', 'added 1 pieces of Angle Grinder to cart'),
(104, 1, '2018-03-31 19:53:22', 'viewed their cart'),
(105, 1, '2018-03-31 19:53:25', 'viewed checkout'),
(106, 1, '2018-03-31 19:53:34', 'checked out'),
(107, 1, '2018-03-31 20:04:39', 'viewed their cart'),
(108, 1, '2018-03-31 20:13:05', 'viewed their cart'),
(109, 1, '2018-03-31 20:16:43', 'viewed their cart'),
(110, 1, '2018-03-31 20:18:44', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(111, 1, '2018-03-31 20:18:45', 'viewed their cart'),
(112, 1, '2018-03-31 20:19:14', 'viewed their cart'),
(113, 1, '2018-03-31 20:19:18', 'viewed checkout'),
(114, 1, '2018-03-31 20:20:09', 'viewed checkout'),
(115, 1, '2018-03-31 21:32:50', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(116, 1, '2018-03-31 21:32:51', 'viewed their cart'),
(117, 1, '2018-03-31 21:32:53', 'viewed checkout'),
(118, 1, '2018-03-31 21:32:56', 'viewed their cart'),
(119, 1, '2018-03-31 21:33:01', 'viewed checkout'),
(120, 1, '2018-03-31 23:44:28', 'viewed their cart'),
(121, 1, '2018-03-31 23:44:38', 'removed Total - Electric Drill 280W from cart'),
(122, 1, '2018-03-31 23:44:38', 'viewed their cart'),
(123, 1, '2018-03-31 23:44:47', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(124, 1, '2018-03-31 23:44:47', 'viewed their cart'),
(125, 1, '2018-03-31 23:44:49', 'viewed checkout'),
(126, 1, '2018-04-01 14:50:52', 'added 2 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(127, 1, '2018-04-01 14:50:58', 'viewed their cart'),
(128, 1, '2018-04-01 14:51:06', 'viewed checkout'),
(129, 1, '2018-04-01 14:51:13', 'checked out'),
(130, 1, '2018-04-01 16:22:43', 'viewed their cart'),
(131, 1, '2018-04-01 16:24:10', 'added 1 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(132, 1, '2018-04-01 16:24:10', 'viewed their cart'),
(133, 1, '2018-04-01 16:24:13', 'viewed checkout'),
(134, 1, '2018-04-01 16:24:28', 'checked out'),
(135, 1, '2018-04-01 16:25:32', 'added 1 piece(s) of Hoyoma Japan - Electric Blower HTEB-600 to cart'),
(136, 1, '2018-04-01 16:25:34', 'viewed their cart'),
(137, 1, '2018-04-01 16:25:37', 'viewed checkout'),
(138, 1, '2018-04-01 16:25:53', 'checked out'),
(139, 1, '2018-04-01 18:52:32', 'added 1 piece(s) of Fujima - Air Die Grinder XQ-T02 to cart'),
(140, 1, '2018-04-01 18:52:32', 'viewed their cart'),
(141, 1, '2018-04-01 18:52:38', 'added 1 piece(s) of Angle Grinder to cart'),
(142, 1, '2018-04-01 18:52:39', 'viewed their cart'),
(143, 1, '2018-04-01 18:52:43', 'viewed checkout'),
(144, 1, '2018-04-01 18:52:49', 'checked out'),
(145, 1, '2018-04-01 20:13:30', 'viewed their cart'),
(146, 1, '2018-04-02 08:19:53', 'viewed their cart'),
(147, 1, '2018-04-02 08:46:04', 'viewed their cart'),
(148, 1, '2018-04-02 08:46:13', 'added 1 piece(s) of Makute - Trimmer TR001 to cart'),
(149, 1, '2018-04-02 08:46:15', 'viewed their cart'),
(150, 1, '2018-04-02 08:46:19', 'viewed checkout'),
(151, 1, '2018-04-02 08:48:21', 'viewed their cart'),
(152, 1, '2018-04-02 08:48:29', 'viewed checkout'),
(153, 1, '2018-04-02 08:49:19', 'viewed their cart'),
(154, 1, '2018-04-02 08:49:20', 'viewed checkout'),
(155, 1, '2018-04-02 09:20:21', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(156, 1, '2018-04-02 09:20:27', 'viewed their cart'),
(157, 1, '2018-04-02 09:20:35', 'viewed checkout'),
(158, 1, '2018-04-02 16:06:19', 'added 2 piece(s) of Total - Electric Drill 280W to cart'),
(159, 1, '2018-04-02 16:06:21', 'viewed their cart'),
(160, 1, '2018-04-02 16:06:32', 'viewed checkout'),
(161, 1, '2018-04-02 16:06:45', 'checked out'),
(162, 1, '2018-04-02 16:06:48', 'viewed their cart'),
(163, 1, '2018-04-03 15:07:53', 'viewed their cart'),
(164, 1, '2018-04-03 15:07:53', 'viewed their cart'),
(165, 1, '2018-04-03 15:08:22', 'added 4 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(166, 1, '2018-04-03 15:08:24', 'viewed their cart'),
(167, 1, '2018-04-03 15:08:37', 'cleared their cart'),
(168, 1, '2018-04-03 15:08:37', 'viewed their cart'),
(169, 1, '2018-04-03 15:08:50', 'added 8 piece(s) of Makute - Trimmer TR001 to cart'),
(170, 1, '2018-04-03 15:08:51', 'viewed their cart'),
(171, 1, '2018-04-03 15:09:26', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(172, 1, '2018-04-03 15:09:26', 'viewed their cart'),
(173, 1, '2018-04-03 15:09:32', 'viewed checkout'),
(174, 1, '2018-04-03 15:09:38', 'viewed checkout'),
(175, 1, '2018-04-03 15:09:52', 'viewed checkout'),
(176, 1, '2018-04-03 15:10:12', 'checked out'),
(177, 1, '2018-04-03 15:10:20', 'viewed their cart'),
(178, 1, '2018-04-04 17:39:58', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(179, 1, '2018-04-04 17:39:58', 'viewed their cart'),
(180, 1, '2018-04-04 17:45:06', 'viewed their cart'),
(181, 1, '2018-04-04 17:46:30', 'viewed their cart'),
(182, 1, '2018-04-04 17:47:44', 'removed Total - Electric Drill 280W from cart'),
(183, 1, '2018-04-04 17:47:45', 'viewed their cart'),
(184, 1, '2018-04-04 17:48:00', 'added 1 piece(s) of Makute - Trimmer TR001 to cart'),
(185, 1, '2018-04-04 17:48:01', 'viewed their cart'),
(186, 1, '2018-04-04 17:48:09', 'viewed checkout'),
(187, 1, '2018-04-04 17:52:57', 'checked out'),
(188, 1, '2018-04-07 17:46:28', 'viewed their cart'),
(189, 1, '2018-04-07 17:46:44', 'viewed their cart'),
(190, 1, '2018-04-07 17:47:07', 'viewed their cart'),
(191, 1, '2018-04-07 17:47:53', 'viewed their cart'),
(192, 1, '2018-04-07 17:48:48', 'viewed their cart'),
(193, 1, '2018-04-07 17:49:05', 'viewed their cart'),
(194, 1, '2018-04-07 17:49:22', 'viewed their cart'),
(195, 1, '2018-04-07 17:51:25', 'viewed their cart'),
(196, 1, '2018-04-07 18:13:25', 'viewed their cart'),
(197, 1, '2018-04-08 02:07:09', 'viewed their cart'),
(198, 1, '2018-04-09 10:12:20', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(199, 1, '2018-04-09 10:12:20', 'viewed their cart'),
(200, 1, '2018-04-09 10:13:00', 'viewed checkout'),
(201, 1, '2018-04-09 10:13:22', 'checked out'),
(202, 1, '2018-04-09 10:14:37', 'viewed their cart'),
(203, 1, '2018-04-09 10:14:44', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(204, 1, '2018-04-09 10:14:45', 'viewed their cart'),
(205, 1, '2018-04-09 10:14:48', 'viewed checkout'),
(206, 1, '2018-04-09 10:14:54', 'checked out'),
(207, 1, '2018-04-10 08:37:09', 'viewed their cart'),
(208, 1, '2018-04-10 08:42:36', 'added 1 piece(s) of Total - Electric Drill 280W to cart'),
(209, 1, '2018-04-10 08:42:36', 'viewed their cart'),
(210, 1, '2018-04-10 08:42:40', 'viewed checkout'),
(211, 1, '2018-04-10 08:42:50', 'checked out'),
(212, 1, '2018-04-10 14:16:14', 'viewed their cart'),
(213, 1, '2018-04-10 14:34:05', 'viewed their cart'),
(214, 1, '2018-04-10 14:34:55', 'added 1 piece(s) of Hoyoma Japan - Jigsaw HT - JS650 to cart'),
(215, 1, '2018-04-10 14:34:56', 'viewed their cart'),
(216, 1, '2018-04-10 14:35:05', 'viewed checkout'),
(217, 1, '2018-04-10 14:35:25', 'checked out');

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
(1, 'Angle Grinder.jpg', 'Angle Grinder', 3000, 'This is one of our best angle grinders and can last for years under the right care.', 3, 'available'),
(2, '20180217_153001.jpg', 'Total - Electric Drill 280W', 23000.5, 'This is our finest drill, it can even drill through diamonds!', 19, 'available'),
(3, '20180217_151735.jpg', 'Makute - Trimmer TR001', 5000.5, 'Top notch american based trimmer', 5, 'available'),
(4, '20180217_152633.jpg', 'Fujima - Air Die Grinder XQ-T02', 1000, 'Newly arrived Fujima Grinder', 9, 'available'),
(5, 'Hoyoma Japan - Jigsaw HT - JS650.jpg', 'Hoyoma Japan - Jigsaw HT - JS650', 5599, 'Useful for cutting wooden planks at great speed, also used for precision cutting', 6, 'available'),
(11, '20180217_151314.jpg', 'Hoyoma Japan - Electric Blower HTEB-600', 13000, 'You don\'t need a lawn mower when you can just use our powerful lawn blower', 15, 'unavailable');

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
(1, 2, 1, 2),
(2, 2, 3, 1),
(3, 2, 5, 2),
(4, 3, 1, 1),
(5, 3, 3, 2),
(6, 4, 3, 1),
(7, 4, 4, 1),
(8, 4, 5, 2),
(9, 5, 3, 5),
(10, 6, 3, 2),
(11, 6, 5, 1),
(12, 7, 2, 1),
(13, 7, 11, 4),
(14, 8, 1, 1),
(15, 9, 2, 1),
(16, 9, 5, 2),
(17, 10, 5, 1),
(18, 11, 11, 1),
(19, 12, 1, 1),
(20, 12, 4, 1),
(21, 13, 2, 3),
(22, 13, 3, 1),
(23, 14, 2, 1),
(24, 14, 3, 8),
(25, 15, 3, 1),
(26, 0, 2, 1),
(27, 16, 2, 1),
(28, 17, 2, 1),
(29, 18, 5, 1);

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
(2, 5, 22198.5, 50000, '2018-03-25 22:12:30', 'approved'),
(3, 1, 13001, 20000, '2018-03-24 01:19:39', 'denied'),
(4, 1, 17198.5, 20000, '2018-04-04 07:56:54', 'approved'),
(5, 1, 25002.5, 50000, '2018-03-26 01:24:20', 'approved'),
(6, 1, 15600, 20000, '2018-04-01 01:27:52', 'approved'),
(7, 1, 75000.5, 80000, '2018-04-02 19:52:46', 'approved'),
(8, 1, 3000, 5000, '2018-03-31 19:53:33', 'approved'),
(9, 1, 34198.5, 40000, '2018-04-01 14:51:12', 'approved'),
(10, 1, 5599, 6000, '2018-04-01 16:24:26', 'approved'),
(11, 1, 13000, 15000, '2018-04-01 16:25:53', 'denied'),
(12, 1, 4000, 5000, '2018-04-01 18:52:49', 'denied'),
(13, 1, 74002, 75000, '2018-04-02 16:06:42', 'approved'),
(14, 1, 63004.5, 70000, '2018-04-03 15:10:12', 'denied'),
(15, 1, 5000.5, 6000, '2018-04-04 17:52:56', 'approved'),
(16, 1, 23000.5, 25000, '2018-04-09 10:14:53', 'approved'),
(17, 1, 23000.5, 25000, '2018-04-10 08:42:50', 'denied'),
(18, 1, 5599, 10000, '2018-04-10 14:35:24', 'pending');

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
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addresses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
