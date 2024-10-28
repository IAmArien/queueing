-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 28, 2024 at 03:06 AM
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
  `order_date` date NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `for_payment`
--

INSERT INTO `for_payment` (`id`, `order_number`, `order_products`, `order_type`, `order_date`, `order_time`, `order_status`) VALUES
(17, '439605721', '[{\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":2},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Medio\",\"price\":60,\"quantity\":4}]', 'TAKE OUT', '2024-10-27', '02:10:49pm', 'PAID'),
(18, '1845716402', '[{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":4},{\"item\":\"Passion Fruit\",\"size\":\"Grande\",\"price\":65,\"quantity\":2},{\"item\":\"Konnichiwa (Okinawa)\",\"size\":\"Medio\",\"price\":80,\"quantity\":1},{\"item\":\"Dark Choco Cookies\",\"size\":\"Grande\",\"price\":95,\"quantity\":2},{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":2}]', 'TAKE OUT', '2024-10-27', '02:15:25pm', 'PAID'),
(19, '1451957067', '[{\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Konnichiwa (Okinawa)\",\"size\":\"Grande\",\"price\":95,\"quantity\":1}]', 'DINE IN', '2024-10-27', '02:19:15pm', 'FOR PAYMENT'),
(20, '628691841', '[{\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":1}]', 'TAKE OUT', '2024-10-27', '02:19:35pm', 'FOR PAYMENT'),
(21, '2112780303', '[{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":2},{\"item\":\"Matcha Latte\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":1}]', 'TAKE OUT', '2024-10-27', '02:20:13pm', 'PAID');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) NOT NULL,
  `queue_payment_no` varchar(255) NOT NULL,
  `queue_number` varchar(255) NOT NULL,
  `queue_serving` varchar(255) NOT NULL,
  `queue_date` date NOT NULL,
  `queue_time` varchar(255) NOT NULL,
  `queue_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`id`, `queue_payment_no`, `queue_number`, `queue_serving`, `queue_date`, `queue_time`, `queue_status`) VALUES
(78, '439605721', '00001', 'SERVED', '2024-10-27', '02:13:15pm', 'INACTIVE'),
(79, '1845716402', '00002', 'SERVED', '2024-10-27', '02:15:40pm', 'INACTIVE'),
(80, '2112780303', '00003', 'PREPARING', '2024-10-27', '02:20:56pm', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `queue_orders`
--

CREATE TABLE `queue_orders` (
  `id` int(11) NOT NULL,
  `queue_number_id` int(11) NOT NULL,
  `queue_order` varchar(1000) NOT NULL,
  `queue_order_type` varchar(255) NOT NULL,
  `queue_date` date NOT NULL,
  `queue_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queue_orders`
--

INSERT INTO `queue_orders` (`id`, `queue_number_id`, `queue_order`, `queue_order_type`, `queue_date`, `queue_time`) VALUES
(70, 78, '[{\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":3},{\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":2},{\"item\":\"Green Apple (Lemonade)\",\"size\":\"Medio\",\"price\":60,\"quantity\":4}]', 'TAKE OUT', '2024-10-27', '02:13:15pm'),
(71, 79, '[{\"item\":\"Blueberry (Tea-based)\",\"size\":\"Medio\",\"price\":50,\"quantity\":4},{\"item\":\"Passion Fruit\",\"size\":\"Grande\",\"price\":65,\"quantity\":2},{\"item\":\"Konnichiwa (Okinawa)\",\"size\":\"Medio\",\"price\":80,\"quantity\":1},{\"item\":\"Dark Choco Cookies\",\"size\":\"Grande\",\"price\":95,\"quantity\":2},{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":2}]', 'TAKE OUT', '2024-10-27', '02:15:40pm'),
(72, 80, '[{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":2},{\"item\":\"Matcha Latte\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":1}]', 'TAKE OUT', '2024-10-27', '02:20:56pm');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `queue_payment_no` (`queue_payment_no`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `queue_orders`
--
ALTER TABLE `queue_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

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
