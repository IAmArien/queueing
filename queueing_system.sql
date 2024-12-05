-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2024 at 02:58 PM
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
(21, '2112780303', '[{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":2},{\"item\":\"Matcha Latte\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":1}]', 'TAKE OUT', '2024-10-27', '02:20:13pm', 'PAID'),
(23, '1718317610', '[{\"product_id\":\"4\",\"item\":\"Melon Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":5},{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":\"2\"},{\"product_id\":\"11\",\"item\":\"Fruiti Banana\",\"size\":\"Grande\",\"price\":90,\"quantity\":\"2\"}]', 'TAKE OUT', '2024-12-03', '03:44:32pm', 'PAID'),
(24, '1183598405', '[{\"product_id\":\"4\",\"item\":\"Melon Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":5},{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":\"2\"},{\"product_id\":\"11\",\"item\":\"Fruiti Banana\",\"size\":\"Grande\",\"price\":90,\"quantity\":\"2\"}]', 'DINE IN', '2024-12-03', '03:46:34pm', 'CANCELLED'),
(25, '1081529280', '[{\"product_id\":\"6\",\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":1}]', 'TAKE OUT', '2024-12-04', '01:54:58am', 'CANCELLED'),
(26, '1006203404', '[{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":8},{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":7},{\"product_id\":\"5\",\"item\":\"Buko Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":2},{\"product_id\":\"6\",\"item\":\"Guyabano Shake\",\"size\":\"Grande\",\"price\":70,\"quantity\":3}]', 'TAKE OUT', '2024-12-05', '02:53:36pm', 'CANCELLED'),
(27, '1904418328', '[{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":3},{\"product_id\":\"6\",\"item\":\"Guyabano Shake\",\"size\":\"Medio\",\"price\":60,\"quantity\":4},{\"product_id\":\"4\",\"item\":\"Melon Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":5}]', 'TAKE OUT', '2024-12-05', '02:57:18pm', 'CANCELLED'),
(28, '1230130205', '[{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":7}]', 'DINE IN', '2024-12-05', '02:57:44pm', 'CANCELLED');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(250) NOT NULL,
  `menu_description` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `menu_description`) VALUES
(8, 'Real Fruit Quenchers', 'Savor the freshness of our Real Fruit Quenchers – made with 100% real fruit, blended to perfection for a naturally sweet and refreshing drink that’s as fresh as it gets!'),
(9, 'Classic Milktea', 'Enjoy the timeless taste of our Classic Milktea – a perfect balance of rich tea and creamy milk, expertly blended for a smooth, satisfying sip every time.'),
(10, 'Premium Milktea', 'Indulge in our Premium Milktea – a creamy, rich blend of the finest tea leaves and smooth, velvety milk. Perfectly sweetened for a refreshing, luxurious treat in every sip.'),
(11, 'Tea Based Series', 'Explore our Tea-Based Series – a collection of expertly crafted drinks featuring premium teas, infused with unique flavors for a refreshing, aromatic experience in every cup.'),
(12, 'Yakult Series', 'Refresh with our Yakult Series – a delightful blend of tangy Yakult yogurt and smooth, refreshing flavors for a creamy, probiotic-packed drink that’s both tasty and good for you!'),
(13, 'Lemonade Series', 'Brighten your day with our Lemonade Series – a zesty collection of freshly squeezed lemons, perfectly balanced with sweetness for a crisp, refreshing burst of flavor in every sip.'),
(14, 'Classic Blends', 'Experience the perfect harmony of flavors with our Classic Blends – a selection of timeless drinks crafted with premium ingredients for a smooth, comforting taste in every sip.'),
(15, 'Prime Blends', 'Elevate your taste with our Prime Blends – a curated selection of premium ingredients and bold flavors, expertly crafted for a luxurious, one-of-a-kind drinking experience.'),
(16, 'Java Frappe', 'Cool down with our Java Frappe – a rich, icy blend of premium coffee, smooth cream, and a touch of sweetness, creating the perfect refreshing pick-me-up for coffee lovers.'),
(17, 'Creame Frappe', 'Indulge in our Cream Frappe – a smooth, frosty blend of creamy goodness and rich flavors, perfectly chilled for a refreshing, indulgent treat with every sip.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `product_name` varchar(999) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `menu_id`, `product_name`, `product_stock`, `product_status`) VALUES
(3, 8, 'Mango Shake', 0, 'UNAVAILABLE'),
(4, 8, 'Melon Shake', 5, 'AVAILABLE'),
(5, 8, 'Buko Shake', 10, 'AVAILABLE'),
(6, 8, 'Guyabano Shake', 6, 'AVAILABLE'),
(7, 8, 'Mango Graham', 10, 'AVAILABLE'),
(8, 8, 'Mango Fruiti', 10, 'AVAILABLE'),
(9, 8, 'Fruiti Buko', 10, 'AVAILABLE'),
(10, 8, 'Fruiti Melon', 10, 'AVAILABLE'),
(11, 8, 'Fruiti Banana', 10, 'AVAILABLE'),
(12, 8, 'Fruiti Avocado', 10, 'AVAILABLE'),
(13, 8, 'Fruiti Guyabano', 10, 'AVAILABLE'),
(14, 8, 'Fruiti Cheesecake', 10, 'AVAILABLE'),
(15, 8, 'Fruiti Strawberry', 10, 'AVAILABLE'),
(16, 8, 'Fruiti Mixed Berries', 10, 'AVAILABLE'),
(17, 9, 'Bobba', 10, 'AVAILABLE'),
(18, 9, 'Tarro', 10, 'AVAILABLE'),
(19, 9, 'Lychee', 10, 'AVAILABLE'),
(20, 9, 'Dark Chocco', 10, 'AVAILABLE'),
(21, 9, 'Strawberry', 10, 'AVAILABLE'),
(22, 9, 'Winter Melon', 10, 'AVAILABLE'),
(23, 9, 'Honeydew', 10, 'AVAILABLE'),
(24, 9, 'Cookies & Cream', 10, 'AVAILABLE'),
(25, 10, 'Dark Choco Series', 10, 'AVAILABLE'),
(26, 10, 'Strawberry Cookies', 10, 'AVAILABLE'),
(27, 10, 'Sawadeeka (Thai)', 10, 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `products_price`
--

CREATE TABLE `products_price` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_medio` int(11) NOT NULL,
  `price_grande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_price`
--

INSERT INTO `products_price` (`id`, `product_id`, `price_medio`, `price_grande`) VALUES
(3, 3, 50, 60),
(4, 4, 50, 60),
(5, 5, 50, 60),
(6, 6, 60, 70),
(7, 7, 60, 70),
(8, 8, 80, 90),
(9, 9, 80, 90),
(10, 10, 80, 90),
(11, 11, 80, 90),
(12, 12, 80, 90),
(13, 13, 80, 90),
(14, 14, 80, 90),
(15, 15, 80, 90),
(16, 16, 90, 100),
(17, 17, 70, 85),
(18, 18, 70, 85),
(19, 19, 70, 85),
(20, 20, 70, 85),
(21, 21, 70, 85),
(22, 22, 70, 85),
(23, 23, 70, 85),
(24, 24, 70, 85),
(25, 25, 75, 90),
(26, 26, 75, 90),
(27, 27, 75, 90);

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
(80, '2112780303', '00003', 'PREPARING', '2024-10-27', '02:20:56pm', 'ACTIVE'),
(81, '1718317610', '00004', 'SERVED', '2024-12-03', '03:45:08pm', 'INACTIVE');

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
(72, 80, '[{\"item\":\"Caramel Macchiato\",\"size\":\"Grande\",\"price\":130,\"quantity\":2},{\"item\":\"Matcha Latte\",\"size\":\"Grande\",\"price\":130,\"quantity\":1},{\"item\":\"Salted Caramel\",\"size\":\"Grande\",\"price\":130,\"quantity\":1}]', 'TAKE OUT', '2024-10-27', '02:20:56pm'),
(73, 81, '[{\"product_id\":\"4\",\"item\":\"Melon Shake\",\"size\":\"Grande\",\"price\":60,\"quantity\":5},{\"product_id\":\"3\",\"item\":\"Mango Shake\",\"size\":\"Medio\",\"price\":50,\"quantity\":\"2\"},{\"product_id\":\"11\",\"item\":\"Fruiti Banana\",\"size\":\"Grande\",\"price\":90,\"quantity\":\"2\"}]', 'TAKE OUT', '2024-12-03', '03:45:08pm');

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_price`
--
ALTER TABLE `products_price`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products_price`
--
ALTER TABLE `products_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `queue_orders`
--
ALTER TABLE `queue_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

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
