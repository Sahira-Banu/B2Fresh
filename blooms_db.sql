-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 08:38 AM
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
-- Database: `blooms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES
(12, 4, 6, 'White Roses', 1600, 1, '2.jpg'),
(13, 4, 2, 'Blossom Bunch', 2000, 1, '5.jpg'),
(14, 4, 7, 'Royal Gerberas', 1900, 1, '8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_products` varchar(255) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(3, 1, 'sahira', '0761049698', 'sahi123@gmail.com', 'cash on delivery', 'Colombo 3', ', Royal Rose Bunch(1), Red Gerberas(1), Mixed Bouquet(1)', 5800, '09-Sep-2023', 'completed'),
(4, 3, 'kathleen', '0701399324', 'kathi567@gmail.com', 'cash on delivery', 'Galle', ', Red Gerberas(1), Violet Bunch(1)', 3400, '09-Sep-2023', 'completed'),
(5, 4, 'Andrew', '0741464783', 'andrew789@gmail.com', 'cash on delivery', 'Colombo 5', ', White Roses(1)', 1600, '09-Sep-2023', 'completed'),
(6, 1, 'sahira', '0761049698', 'sahi123@gmail.com', 'cash on delivery', 'Colombo 3', ', Violet Bunch(2)', 3200, '11-Sep-2023', 'pending'),
(7, 5, 'mark', '0761049698', 'mark234@gmail.com', 'cash on delivery', 'Colombo 3', ', Freshy Gerberas(2), Violet Bunch(1)', 5000, '12-Sep-2023', ''),
(8, 5, 'mark', '0761049698', 'mark234@gmail.com', 'cash on delivery', 'Colombo 3', ', Love Bouquet(1)', 1800, '12-Sep-2023', ''),
(9, 5, 'mark', '0761049698', 'mark234@gmail.com', 'cash on delivery', 'Colombo 3', ', Freshy Gerberas(1)', 1700, '12-Sep-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `product_detail` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_detail`, `image`) VALUES
(2, 'Blossom Bunch', 2000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '5.jpg'),
(3, 'Love Bouquet', 1800, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '7.jpg'),
(4, 'Violet Bunch', 1600, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '12.jpg'),
(5, 'Red Gerberas', 1800, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '9.jpeg'),
(6, 'White Roses', 1600, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '2.jpg'),
(7, 'Royal Gerberas', 1900, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '8.jpg'),
(8, 'Mixed Bouquet', 1500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '1.jpg'),
(9, 'Royal Rose Bunch', 2500, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nemo unde natus, \r\nomnis incidunt nobis aspernatur expedita architecto, voluptatibus, itaque eaque \r\nsit amet consectetur adipisicing elit.', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'sahira', 'sahi123@gmail.com', '123', 'user'),
(2, 'banu', 'banu456@gmail.com', '456', 'admin'),
(3, 'kathleen', 'kathi567@gmail.com', '567', 'user'),
(4, 'Andrew', 'andrew789@gmail.com', '789', 'user'),
(5, 'mark', 'mark234@gmail.com', '234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `pid`, `name`, `price`, `image`) VALUES
(4, 4, 8, 'Mixed Bouquet', 1500, '1.jpg'),
(5, 4, 5, 'Red Gerberas', 1800, '9.jpeg'),
(6, 4, 6, 'White Roses', 1600, '2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
