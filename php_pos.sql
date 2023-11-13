-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 08:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Electronics', '2023-09-27 08:14:29', NULL),
(2, 'Automobiles', '2023-09-27 08:15:11', NULL),
(3, 'Clothing', '2023-09-27 08:15:35', NULL),
(4, 'property', '2023-09-27 08:16:45', '2023-09-27 08:19:56'),
(8, 'Fashion', '2023-10-04 08:24:05', NULL),
(9, 'ASDD', '2023-10-07 07:47:04', NULL),
(10, 'shoes', '2023-10-07 09:07:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `name`, `created`, `updated`) VALUES
(12, 8, 'car1_1696669638.jpg', '2023-10-07 09:07:18', NULL),
(13, 8, 'car3_1696669638.jpg', '2023-10-07 09:07:18', NULL),
(14, 9, '2_55f25ce3-c035-40d6-baf8-1643ba858390_1024x1024_1696669752.jpg', '2023-10-07 09:09:12', NULL),
(15, 9, 'download (2)_1696669752.jpg', '2023-10-07 09:09:12', NULL),
(16, 9, 'download_1696669752.jpg', '2023-10-07 09:09:12', NULL),
(22, 12, 'samsung-galaxy-s24-ultra-144-hz-display-geruecht-1f_1696843153.jpg', '2023-10-09 09:19:13', NULL),
(23, 12, 'hero-image.fill.size_1248x702.v1695053686_1696843153.jpg', '2023-10-09 09:19:13', NULL),
(24, 12, 'Samsung-Galaxy-S22-Ultra-5G-color-sky-500x500_1696843153.jpg', '2023-10-09 09:19:13', NULL),
(25, 13, '0010000075013_1696843167.jpg', '2023-10-09 09:19:27', NULL),
(26, 13, '0020000106276_1696843167.jpg', '2023-10-09 09:19:27', NULL),
(27, 13, '1200000023010_3_1696843167.jpg', '2023-10-09 09:19:27', NULL),
(28, 13, '1200000027224_1696843167.jpg', '2023-10-09 09:19:27', NULL),
(29, 14, 'oppo-f17-1_1696843187.jpg', '2023-10-09 09:19:47', NULL),
(31, 15, 'e6b6db26416e6ddc437ab6573c6061ab_1696843460.jpg', '2023-10-09 09:24:20', NULL),
(32, 15, 'images_1696843460.jpg', '2023-10-09 09:24:20', NULL),
(33, 15, '1182-24152-sports-collection-green-red-sports-sportz-design-52080-1-thumbnail-1080x1080-70 - Copy_1696843460.jpg', '2023-10-09 09:24:20', NULL),
(37, 16, 'laptop_1696953493.jpg', '2023-10-10 15:58:13', NULL),
(38, 16, 'laptop2_1696953493.jpg', '2023-10-10 15:58:13', NULL),
(39, 16, 'laptop3_1696953493.jpg', '2023-10-10 15:58:13', NULL),
(40, 17, 'shirt1_1696953623.jpg', '2023-10-10 16:00:23', NULL),
(41, 17, 'shirt2_1696953623.jpg', '2023-10-10 16:00:23', NULL),
(42, 17, 'shirt3_1696953624.jpg', '2023-10-10 16:00:24', NULL),
(43, 18, 'watch_1696953795.jpeg', '2023-10-10 16:03:15', NULL),
(44, 18, 'watch2_1696953796.jpg', '2023-10-10 16:03:16', NULL),
(45, 18, 'watch3_1696953796.jpg', '2023-10-10 16:03:16', NULL),
(46, 19, 's1_1696954498.jpg', '2023-10-10 16:14:58', NULL),
(47, 19, 's2_1696954498.jpg', '2023-10-10 16:14:58', NULL),
(48, 19, 's3_1696954498.jpeg', '2023-10-10 16:14:58', NULL),
(49, 20, 'polo_1696954666.jpg', '2023-10-10 16:17:46', NULL),
(50, 20, 'polo2_1696954667.jpg', '2023-10-10 16:17:47', NULL),
(51, 20, 'polo3_1696954667.jpg', '2023-10-10 16:17:47', NULL),
(52, 21, 'bike1_1696955764.jpg', '2023-10-10 16:36:04', NULL),
(53, 21, 'bike2_1696955764.jpg', '2023-10-10 16:36:04', NULL),
(54, 21, 'bike3_1696955765.jpg', '2023-10-10 16:36:05', NULL),
(55, 22, 'bmw1_1696955859.jpg', '2023-10-10 16:37:39', NULL),
(56, 22, 'bmw2_1696955859.jpg', '2023-10-10 16:37:39', NULL),
(57, 22, 'bmw3_1696955859.jpg', '2023-10-10 16:37:39', NULL),
(58, 23, 'one1_1696955972.jpg', '2023-10-10 16:39:32', NULL),
(59, 23, 'one2_1696955972.jpg', '2023-10-10 16:39:32', NULL),
(60, 23, 'one3_1696955973.jpg', '2023-10-10 16:39:33', NULL),
(61, 24, 'mansion1_1696956217.jpg', '2023-10-10 16:43:37', NULL),
(62, 24, 'mansion2_1696956217.jpg', '2023-10-10 16:43:37', NULL),
(63, 24, 'mansion3_1696956218.jpg', '2023-10-10 16:43:38', NULL),
(64, 25, 'house1_1696956322.jpg', '2023-10-10 16:45:22', NULL),
(65, 25, 'house2_1696956322.jpg', '2023-10-10 16:45:22', NULL),
(66, 25, 'house3_1696956322.jpg', '2023-10-10 16:45:22', NULL),
(67, 26, 'shoe1_1696956594.jpg', '2023-10-10 16:49:54', NULL),
(68, 26, 'shoe2_1696956594.jpg', '2023-10-10 16:49:54', NULL),
(69, 26, 'shoe3_1696956595.jpg', '2023-10-10 16:49:55', NULL),
(70, 27, 'adidas1_1696956676.jpg', '2023-10-10 16:51:16', NULL),
(71, 27, 'adidas2_1696956676.jpg', '2023-10-10 16:51:16', NULL),
(72, 27, 'adidas3_1696956677.jpg', '2023-10-10 16:51:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(60) DEFAULT NULL,
  `name` varchar(512) NOT NULL,
  `details` text NOT NULL,
  `shortdesc` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `pprice` float(10,2) NOT NULL,
  `sprice` float(10,2) NOT NULL,
  `tags` varchar(60) NOT NULL,
  `vat` float(4,2) NOT NULL DEFAULT 5.00,
  `status` set('0','1') NOT NULL DEFAULT '1',
  `op1` varchar(30) DEFAULT NULL,
  `op2` varchar(30) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `details`, `shortdesc`, `category_id`, `quantity`, `pprice`, `sprice`, `tags`, `vat`, `status`, `op1`, `op2`, `created`, `updated`) VALUES
(8, 'jla7478', 'farari', 'The Prancing Horse symbolises exclusivity, performance and quality all over the world. Our prestige is built upon decades of sporting success and the inimitable style of our cars, which are unique in their innovation, technology and driving pleasure.', 'The Prancing Horse symbolises exclusivity, performance and quality all over the world. ', 2, 987, 15900000.00, 10000000.00, '', 10.00, '1', 'lj', 'glaj;', '2023-10-07 09:07:18', '2023-10-07 09:09:09'),
(9, 'null', 'slides', 'Good', 'Very Good', 10, 45, 3000.00, 2800.00, 'null', 5.00, '1', 'ok', 'ok', '2023-10-07 09:09:12', NULL),
(12, 'sd', 'samsungs23 ultra', 'go product', 'vcbcv', 1, 325, 243.00, 255.00, 'shoes,fashion', 5.00, '1', 'dds', 'dfssdf', '2023-10-09 09:19:13', NULL),
(13, 'hfg', 'Panjabi', 'very good', 'good', 3, 50, 2000.00, 1500.00, 'null', 5.00, '1', '12', '34', '2023-10-09 09:19:27', NULL),
(14, '12346', 'OPPO F17', 'Smartphone', 'oppo brand', 2, 50, 21000.00, 20000.00, 'oppo, industrial', 10.00, '1', 'abc', 'sell', '2023-10-09 09:19:47', NULL),
(15, '3425', 'cricket jersey', 'wow', 'very good', 3, 50, 2000.00, 1500.00, '', 5.00, '1', '345', '256', '2023-10-09 09:24:20', '2023-10-09 09:26:09'),
(16, 'jhfsd', 'laptop', 'very good', 'good', 1, 58, 50000.00, 70000.00, 'laptop, electronics, computer', 5.00, '1', 'gf', 'js', '2023-10-10 15:58:12', NULL),
(17, 'asfa', 'T-shirt', 'nice product', 'good', 3, 400, 400.00, 499.00, 'cloth, tshirt, style', 5.00, '1', 'af', 'fag', '2023-10-10 16:00:23', NULL),
(18, 'gagg', 'watch', 'wonderful product', 'good product', 8, 300, 800.00, 1099.00, 'watch, style, fashion', 10.00, '1', 'sgs', 'lh', '2023-10-10 16:03:15', NULL),
(19, 'lkhjkh', 'shirt', 'good', 'nice', 3, 325, 419.00, 600.00, 'cloth, shirt, style', 10.00, '1', 'ftg', 'jfkj', '2023-10-10 16:14:58', NULL),
(20, 'gagg', 'polo', 'wonderful product', 'product', 8, 987, 700.00, 999.00, 'cloth, tshirt, style', 5.00, '1', 'fgs', 'fg', '2023-10-10 16:17:46', NULL),
(21, 'kljlh', 'R15', 'good bike', 'good', 2, 40, 300000.00, 500000.00, 'bike, ra5', 5.00, '1', 'ftg', 'lh', '2023-10-10 16:36:04', NULL),
(22, 'fag', 'BMW', 'wonderful car', 'nice car', 2, 68, 100000000.00, 100000000.00, ' car, fastest car, styliscar', 10.00, '1', 'jkhk', 'fag', '2023-10-10 16:37:39', NULL),
(23, 'jhfsd', 'One Plus', 'nice phone', 'phone', 1, 254, 458747.00, 575679.00, 'mobile, phone', 10.00, '1', 'sgs', 'gasgv', '2023-10-10 16:39:32', NULL),
(24, 'glk93984', 'Mansion', 'luxary Mansion', 'luxary', 4, 20, 100000000.00, 100000000.00, 'mansion, house, luxary', 10.00, '1', 'gf', 'jkhk', '2023-10-10 16:43:37', NULL),
(25, 'gagg', 'House', 'nice house', 'good home', 4, 40, 100000000.00, 100000000.00, 'house, luxary, home', 5.00, '1', 'ftg', 'js', '2023-10-10 16:45:21', NULL),
(26, 'jhfsd', 'Shoe', 'nice shoe', 'good', 8, 578, 1000.00, 15000.00, 'style, shoe', 5.00, '1', 'fags', 'lh', '2023-10-10 16:49:54', NULL),
(27, 'gagg', 'Adidas', 'good shoe', 'shoe', 3, 575, 700.00, 1200.00, 'shoe, style,cloth', 10.00, '1', 'af', 'jfkj', '2023-10-10 16:51:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `role`, `created`, `updated`) VALUES
(6, 'Rahman 2', 'Ashikur 2', 'info.co.ashik@gmail.com', '$2y$10$6xbXYCAUQBcVd36WHT23oeaz/7SN1vNt6GXfz/J9My4poJjHSBeQ6', 2, '2023-09-27 09:17:49', '2023-10-03 08:39:23'),
(8, 'Hasan', 'Mehedi ', 'info.mehedi52@gmail.com', '$2y$10$/7rVVMHn.ObWckMxLgLlzuJ3wHh/j4c8yo7GdRihWO6ej1eoSX/8O', 1, '2023-09-27 09:18:24', NULL),
(9, 'Mahafuz', 'Mister', 'mister@gmail.com', '$2y$10$X9Ffai33XuU3KmjC1ZU81.1tLHcoGD5uWqmr3hq6j1r.Gge4R.nrm', 2, '2023-09-27 09:18:33', '2023-10-07 08:49:05'),
(12, 'user1', 'user1', 'user1@gmail.com', '$2y$10$W/tuqa/ze.iPzdFFUoRmBewbGLmgnwZxkCzS9KinO7H3SdnzWaseu', 1, '2023-10-02 09:07:11', NULL),
(13, 'user2', 'user2', 'user2@gmail.com', '$2y$10$weC.4yNFv980escmzNk7o.HBq/IhJfi4s00KuEhCTwhbmSjKQ2mZO', 2, '2023-10-02 09:07:36', '2023-10-02 09:07:46'),
(14, 'def', 'abc', 'abc@def.com', '1234', 1, '2023-10-04 08:03:01', NULL),
(16, 'Rahman', 'Ashikur ', 'bca@gmail.com', '$2y$10$RGnYZ9GYdHHJ2RITjOHlH.t.FCBrQoaANCSsz96c6r2ZRQcXbNz7q', 1, '2023-10-04 09:02:22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `sprice` (`sprice`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
