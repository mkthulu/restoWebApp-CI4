-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 10:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_resto_anyar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `created_at`, `last_update`) VALUES
(1, '$argon2id$v=19$m=65536,t=4,p=1$VS9xc2tlQzFPMjl0M3BOUg$vcL5VCeuszTSZzv/ACKb2E12BVQvHpM7ekYynZrraxE', '2021-12-14', '2021-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `food_name` varchar(64) NOT NULL,
  `food_price` decimal(10,2) NOT NULL,
  `food_img` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `food_name`, `food_price`, `food_img`, `created_at`, `last_update`) VALUES
(1, 'Sate', '10000.00', '20211228043534sate.jpg', '2021-12-14', '2021-12-28'),
(2, 'Bakso', '15000.00', '20211228043552bakso.jpg', '2021-12-14', '2021-12-28'),
(3, 'Soto Ayam Lamongan', '20000.00', '20211228043633soto-ayam-lamongan.jpg', '2021-12-14', '2021-12-28'),
(4, 'Bubur Ayam', '15000.00', '20211228043649bubur-ayam-sederhana.jpg', '2021-12-14', '2021-12-28'),
(5, 'Rendang Daging Sapi', '45000.00', '20211228043702rendang-daging-sapi.jpg', '2021-12-14', '2021-12-28'),
(6, 'Tongseng Sapi', '40000.00', '20211228043711tongseng-sapi.jpg', '2021-12-16', '2021-12-28'),
(7, 'Bubur Kacang Hijau', '7000.00', '20211228043720burjo.jpg', '2021-12-16', '2021-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(64) NOT NULL,
  `table_num` int(11) NOT NULL,
  `created_time` datetime NOT NULL,
  `last_update_t` datetime NOT NULL,
  `finished` enum('Y','N') NOT NULL,
  `bill_paid` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `guest_name`, `table_num`, `created_time`, `last_update_t`, `finished`, `bill_paid`) VALUES
(1, 'Amat', 1, '2021-12-15 12:38:10', '2021-12-15 22:03:12', 'Y', 'Y'),
(6, 'Ahmad', 3, '2021-12-16 10:51:53', '2021-12-16 14:23:02', 'Y', 'Y'),
(8, 'Ahmad', 3, '2021-12-16 16:41:32', '2021-12-16 16:43:59', 'Y', 'Y'),
(10, 'Farhan', 2, '2021-12-16 20:32:59', '2021-12-16 20:35:14', 'Y', 'Y'),
(11, 'ahmad', 1, '2021-12-26 19:12:09', '2021-12-26 19:17:58', 'Y', 'Y'),
(12, 'Ahmad', 1, '2021-12-28 04:29:10', '2021-12-28 04:39:00', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL,
  `last_update_t` datetime NOT NULL,
  `served` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `guest_id`, `food_id`, `amount`, `total`, `desc`, `created_time`, `last_update_t`, `served`) VALUES
(1, 1, 4, 1, '15000.00', '-', '2021-12-15 12:39:37', '2021-12-15 19:27:24', 'Y'),
(2, 6, 4, 1, '15000.00', '-', '2021-12-16 12:39:40', '2021-12-16 13:08:34', 'Y'),
(3, 6, 3, 2, '40000.00', '-', '2021-12-16 13:11:28', '2021-12-16 14:11:31', 'Y'),
(4, 8, 3, 1, '20000.00', '-', '2021-12-16 16:41:57', '2021-12-16 16:42:23', 'Y'),
(5, 10, 3, 1, '20000.00', '-', '2021-12-16 20:33:19', '2021-12-16 20:34:28', 'Y'),
(6, 10, 7, 1, '7000.00', '-', '2021-12-16 20:33:33', '2021-12-16 20:34:35', 'Y'),
(7, 11, 3, 1, '20000.00', '-', '2021-12-26 19:13:02', '2021-12-26 19:15:26', 'Y'),
(8, 11, 1, 2, '20000.00', '-', '2021-12-26 19:16:41', '2021-12-26 19:17:10', 'Y'),
(9, 12, 7, 2, '14000.00', '-', '2021-12-28 04:37:40', '2021-12-28 04:38:22', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guest_id` (`guest_id`),
  ADD KEY `food_id` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`guest_id`) REFERENCES `guests` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
