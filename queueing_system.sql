-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2024 at 02:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `queueing_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `for_payment`
--

CREATE TABLE `for_payment` (
  `id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_products` varchar(1000) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `for_payment`
--

INSERT INTO `for_payment` (`id`, `order_number`, `order_products`, `order_type`, `order_date`, `order_time`, `order_status`) VALUES
(4, '1631052118', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":1},{\"item\":\"Mango Fruit\",\"size\":\"Grande\",\"price\":90,\"quantity\":4}]', 'TAKE OUT', '2024/10/16', '04:41:29pm', 'CANCELLED'),
(5, '1539655343', '[{\"item\":\"Mango Graham\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Lychee (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":1},{\"item\":\"Strawberry (Tea-based)\",\"size\":\"Grande\",\"price\":65,\"quantity\":3},{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Grande\",\"price\":65,\"quantity\":2}]', 'DINE IN', '2024/10/16', '04:43:14pm', 'PAID'),
(6, '1855691011', '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Grande\",\"price\":70,\"quantity\":2}]', 'TAKE OUT', '2024/10/16', '05:30:13pm', 'CANCELLED'),
(7, '2066656612', '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Grande\",\"price\":70,\"quantity\":4}]', 'TAKE OUT', '2024/10/16', '05:59:36pm', 'CANCELLED'),
(8, '1392058831', '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":3}]', 'TAKE OUT', '2024/10/16', '06:04:39pm', 'CANCELLED'),
(9, '108434794', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Mango Fruit\",\"size\":\"Grande\",\"price\":90,\"quantity\":3}]', 'TAKE OUT', '2024/10/17', '03:50:32pm', 'PAID'),
(10, '506765387', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Mango Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":2}]', 'TAKE OUT', '2024/10/17', '04:36:36pm', 'PAID'),
(11, '368275967', '[{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Konnichiwa (Okinawa)\",\"size\":\"Grande\",\"price\":95,\"quantity\":4},{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":1},{\"item\":\"Fruiti Banana\",\"size\":\"Medio\",\"price\":80,\"quantity\":1},{\"item\":\"Fruiti Melon\",\"size\":\"Grande\",\"price\":90,\"quantity\":4}]', 'TAKE OUT', '2024/10/17', '04:42:05pm', 'PAID'),
(12, '1021631099', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Fruiti Buko\",\"size\":\"Grande\",\"price\":90,\"quantity\":4}]', 'TAKE OUT', '2024/10/22', '02:45:14pm', 'PAID'),
(13, '1691554122', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Grande\",\"price\":70,\"quantity\":3},{\"item\":\"Classic Lemon\",\"size\":\"Medio\",\"price\":60,\"quantity\":2}]', 'DINE IN', '2024/10/22', '02:49:06pm', 'CANCELLED'),
(14, '18788830', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":3}]', 'DINE IN', '2024/10/22', '02:53:44pm', 'CANCELLED'),
(15, '2137664550', '[{\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":4}]', 'TAKE OUT', '2024/10/22', '02:55:18pm', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `queue_payment_no` varchar(255) NOT NULL,
  `queue_number` varchar(255) NOT NULL,
  `queue_serving` varchar(255) NOT NULL,
  `queue_date` varchar(255) NOT NULL,
  `queue_time` varchar(255) NOT NULL,
  `queue_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `queue_payment_no`, `queue_number`, `queue_serving`, `queue_date`, `queue_time`, `queue_status`) VALUES
(68, '1855691011', '1', 'SERVED', '2024/10/16', '05:56:26pm', 'INACTIVE'),
(69, '1539655343', '2', 'SERVING', '2024/10/16', '05:56:27pm', 'ACTIVE'),
(70, '2066656612', '3', 'PREPARING', '2024/10/16', '06:00:01pm', 'ACTIVE'),
(71, '1392058831', '4', 'PREPARING', '2024/10/16', '06:04:51pm', 'ACTIVE'),
(72, '108434794', '5', 'SERVED', '2024/10/17', '03:51:43pm', 'ACTIVE'),
(73, '506765387', '6', 'SERVED', '2024/10/17', '04:38:16pm', 'ACTIVE'),
(74, '368275967', '7', 'SERVED', '2024/10/17', '04:42:36pm', 'INACTIVE'),
(75, '1021631099', '8', 'SERVED', '2024/10/22', '02:47:10pm', 'INACTIVE'),
(76, '2137664550', '9', 'SERVED', '2024/10/22', '02:57:25pm', 'INACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `queue_orders`
--

CREATE TABLE `queue_orders` (
  `id` int(11) NOT NULL,
  `queue_number_id` int(11) NOT NULL,
  `queue_order` varchar(1000) NOT NULL,
  `queue_order_type` varchar(255) NOT NULL,
  `queue_date` varchar(255) NOT NULL,
  `queue_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue_orders`
--

INSERT INTO `queue_orders` (`id`, `queue_number_id`, `queue_order`, `queue_order_type`, `queue_date`, `queue_time`) VALUES
(60, 68, '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Grande\",\"price\":70,\"quantity\":2}]', 'TAKE OUT', '2024/10/16', '05:56:26pm'),
(61, 69, '[{\"item\":\"Mango Graham\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Lychee (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":1},{\"item\":\"Strawberry (Tea-based)\",\"size\":\"Grande\",\"price\":65,\"quantity\":3},{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Grande\",\"price\":65,\"quantity\":2}]', 'DINE IN', '2024/10/16', '05:56:27pm'),
(62, 70, '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Grande\",\"price\":70,\"quantity\":4}]', 'TAKE OUT', '2024/10/16', '06:00:01pm'),
(63, 71, '[{\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":3}]', 'TAKE OUT', '2024/10/16', '06:04:51pm'),
(64, 72, '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Mango Fruit\",\"size\":\"Grande\",\"price\":90,\"quantity\":3}]', 'TAKE OUT', '2024/10/17', '03:51:43pm'),
(65, 73, '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Mango Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":2}]', 'TAKE OUT', '2024/10/17', '04:38:16pm'),
(66, 74, '[{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Konnichiwa (Okinawa)\",\"size\":\"Grande\",\"price\":95,\"quantity\":4},{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":1},{\"item\":\"Fruiti Banana\",\"size\":\"Medio\",\"price\":80,\"quantity\":1},{\"item\":\"Fruiti Melon\",\"size\":\"Grande\",\"price\":90,\"quantity\":4}]', 'TAKE OUT', '2024/10/17', '04:42:36pm'),
(67, 75, '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"item\":\"Fruiti Buko\",\"size\":\"Grande\",\"price\":90,\"quantity\":4}]', 'TAKE OUT', '2024/10/22', '02:47:10pm'),
(68, 76, '[{\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":4}]', 'TAKE OUT', '2024/10/22', '02:57:25pm');

-- --------------------------------------------------------

--
-- Table structure for table `user_credentials`
--

CREATE TABLE `user_credentials` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_credentials`
--

INSERT INTO `user_credentials` (`id`, `email`, `password`, `type`) VALUES
(1, 'jerome.abrera@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin'),
(10, 'maraiah.queen@arceta.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'cashier');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `first_name`, `last_name`, `email`, `contact_number`) VALUES
(1, 1, 'Jerome', 'Abrera', 'jerome.abrera@gmail.com', '091234567890'),
(2, 10, 'Maraiah Queen', 'Arceta', 'maraiah.queen@arceta.com', '091234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `for_payment`
--
ALTER TABLE `for_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue_orders`
--
ALTER TABLE `queue_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_credentials`
--
ALTER TABLE `user_credentials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `for_payment`
--
ALTER TABLE `for_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `queue_orders`
--
ALTER TABLE `queue_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_credentials`
--
ALTER TABLE `user_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
