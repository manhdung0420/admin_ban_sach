-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2025 at 02:22 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asmphp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tivi SamSung'),
(2, 'LG'),
(3, 'Panasonic');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `product_name` varchar(199) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `promotional_price` decimal(15,2) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `creates_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `promotional_price`, `image`, `description`, `creates_at`, `category_id`) VALUES
(1, 'Tivi Samsung', '12900000.00', '9500000.00', 'images/Screenshot 2024-03-11 213054.png', 'Tivi bền đẹp', '2025-02-22 13:58:00', 1),
(3, 'Smart Tivi Samsung 4K 65 inch UA65CU80001', '15400000.00', '13900000.00', 'images/smart-tivi-samsung-4k-65-inch-ua65cu8000638222686432977879.jpg', 'Tivi mới ra', '2025-02-23 07:56:00', 1),
(4, 'Smart Tivi NanoCell LG 4K 43 inch 43NANO81TSA', '13900000.00', '10890000.00', 'images/1-1020x570.jpg', 'Tivi mới ra', '2025-02-23 07:58:00', 2),
(5, 'Smart Tivi NanoCell LG 4K 50 inch 50NANO81TSA', '16400000.00', '13890000.00', 'images/1-1020x570.jpg', 'Tivi chất lượng cao', '2025-02-23 07:59:00', 2),
(7, 'Smart Tivi NanoCell LG 4K 55 inch 55NANO76SQA', '22900000.00', '14890000.00', 'images/smart-nanocell-lg-4k-55-inch-55nano76sqa638204519285592924.jpg', 'Tivi lg', '2025-02-23 08:02:00', 2),
(14, 'Smart Tivi Samsung 4K 65 inch UA65CU8000', '99999999.00', NULL, 'images/tivi-panasonic-th-43ds630v-1-700x467-1.jpg', 'asda', NULL, 2),
(18, 'Tivi LG 53\'', '99999999.00', NULL, 'images/google-tv-aqua-qled-4k-65-inch-aqt65s800ux-13-638645970703846588-700x467.jpg', '12ewdafd', '2025-03-02 07:08:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(199) NOT NULL,
  `email` varchar(199) NOT NULL,
  `password` varchar(199) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `create_at`, `update_at`) VALUES
(1, 'dungdmph49130', 'dungdmph49130@gmail.com', '$2y$10$gBKDHUWE1OafiZbB8ljq6.rbj1TRdYkabubYTHMD1ShpSReKNRfIC', 'user', '2025-02-21 03:20:01', '2025-02-21 03:20:01'),
(2, 'dung0420', 'dung204205@gmail.com', '$2y$10$qr8E2mvyP/DR9f9H3NCIeeANsR6.tleuUDAHr5iXmFtGg.hofqDpi', 'admin', '2025-02-21 04:12:15', '2025-02-21 04:12:15'),
(4, '', '', '$2y$10$ts70jW4KEl0OZD3O2nq5Fe5y28h2eTbHNmzHxkli9SHpkNMpsAklm', 'user', '2025-02-23 15:09:44', '2025-02-23 15:09:44'),
(5, 'dung204205', 'dungcs44@gmail.com', '$2y$10$jm/de8SIRYgXPfE3AAtazO7uinitwdfOfxapSQh1rAXhFBpKXF6w6', 'user', '2025-02-23 15:09:56', '2025-02-23 15:09:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
