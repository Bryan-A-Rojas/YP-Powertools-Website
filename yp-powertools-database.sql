-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 02:18 PM
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
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `profile_image`, `name`, `email`, `password`, `role`) VALUES
(1, '39dyylqmqxa01.png', 'Test First Name', 'test@gmail.com', '$2y$10$2O3xzGmOnD4HeAlM4Rrj0OXpRArWVJrdjN1ceGcFErQzecdRfpASm', 'user'),
(2, NULL, 'test1', 'test1@gmail.com', '$2y$10$K94nyapkq5o8y1vbaMyNfOX/E14RHrSvdmJ1PEx0um5FAV4OS8Waq', 'user'),
(3, '01.png', 'admin', 'admin@gmail.com', '$2y$10$NsJrlA8n3REFAy0.yJGtieHYIlBIoBEFwpn3Va3vZgAGtRz5lAgE.', 'admin'),
(4, '1lqtvaic0sa01.png', 'superadmin', 'superadmin@gmail.com', '$2y$10$wHOu42/7tAn8RQvEgEC6b.ak4b8WWMCbz.IOkxXKv.cdztTzTbB5u', 'superadmin'),
(5, 'aE9vBTqvT2XvmkkQUX8s_Us6AWnfgD5ByjZlYlU5WJg.png', 'test2', 'test2@gmail.com', '$2y$10$jT3Rew5mZOUtIkn.zPeyAuqAMu6stu2npftJQWflBNFZlL4OI.08y', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `account_id` int(11) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`account_id`, `full_address`, `city`) VALUES
(1, 'Equitable Village Talon 5 Las Pinas City', 'Las Pinas City'),
(5, 'Alabang Hills, SBCA, Muntinlupa City', 'Muntinlupa City');

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
(91, 1, '2018-03-26 16:30:01', 'viewed their cart');

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
(1, 'Angle Grinder.jpg', 'Angle Grinder', 3000, 'This is one of our best angle grinders and can last for years under the right care', 0, 'available'),
(2, '20180217_153001.jpg', 'Total - Electric Drill 280W', 23000.5, 'This is our finest drill, it can even drill through diamonds!', 10, 'unavailable'),
(3, '20180217_151735.jpg', 'Makute - Trimmer TR001', 5000.5, 'Top notch american based trimmer', 10, 'available'),
(4, '20180217_152633.jpg', 'Fujima - Air Die Grinder XQ-T02', 1000, 'Newly arrived Fujima Grinder', 10, 'available'),
(5, 'Hoyoma Japan - Jigsaw HT - JS650.jpg', 'Hoyoma Japan - Jigsaw HT - JS650', 5599, 'Useful for cutting wooden planks at great speed, also used for precision cutting', 10, 'available');

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
(11, 6, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `payment_given` double NOT NULL,
  `date_of_purchase` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `account_id`, `total_price`, `payment_given`, `date_of_purchase`) VALUES
(2, 1, 22198.5, 50000, '2018-03-25 22:12:30'),
(3, 1, 13001, 20000, '2018-03-25 22:19:39'),
(4, 1, 17198.5, 20000, '2018-03-26 07:56:54'),
(5, 1, 25002.5, 50000, '2018-03-26 08:24:20'),
(6, 1, 15600, 20000, '2018-03-26 15:27:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
