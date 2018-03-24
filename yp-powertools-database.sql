-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 02:32 PM
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
(8, 1, 1, 1);

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
(4, 1, '2018-03-24 20:36:57', 'viewed their cart');

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
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `description`, `stock`) VALUES
(1, 'Angle Grinder.jpg', 'Angle Grinder', 3000, 'This is one of our best angle grinders and can last for years under the right care', 0),
(2, '20180217_153001.jpg', 'Total - Electric Drill 280W', 23000.5, 'This is our finest drill, it can even drill through diamonds!', 0),
(3, '20180217_151735.jpg', 'Makute - Trimmer TR001', 5000.5, 'Top notch american based trimmer', 0),
(4, '20180217_152633.jpg', 'Fujima - Air Die Grinder XQ-T02', 1000, 'Newly arrived Fujima Grinder', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `payment_given` double NOT NULL,
  `date_of_purchase` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
