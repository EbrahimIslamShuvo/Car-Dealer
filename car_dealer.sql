-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2025 at 12:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_dealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `image` text DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `model` varchar(30) NOT NULL,
  `year` varchar(30) DEFAULT NULL,
  `fuel` varchar(30) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `quantity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`image`, `name`, `type`, `model`, `year`, `fuel`, `price`, `quantity`) VALUES
('https://i.ibb.co.com/WxBgJLP/car2.png', 'BMW b1', 'New', 'B13213', '2025', 'Electric', '15261', '153'),
('https://i.ibb.co.com/k49fG0W/car3.png', 'Tesla 3 2022', 'Used', 'TL 144', '2022', 'Electric', '12547', '0'),
('https://i.ibb.co.com/k49fG0W/car3.png', 'Tesla 3 2023', 'Used', 'TL 145', '2023', 'Electric', '145623', '98'),
('https://i.ibb.co.com/k49fG0W/car3.png', 'Tesla 3 2024', 'Used', 'TL 146', '2024', 'Electric', '12547', '99');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `customer_name` varchar(30) DEFAULT NULL,
  `customer_number` varchar(30) DEFAULT NULL,
  `customer_email` varchar(30) DEFAULT NULL,
  `customer_address` varchar(100) DEFAULT NULL,
  `car_name` varchar(30) DEFAULT NULL,
  `car_type` varchar(30) DEFAULT NULL,
  `car_model` varchar(30) DEFAULT NULL,
  `car_year` varchar(30) DEFAULT NULL,
  `car_fuel` varchar(30) DEFAULT NULL,
  `car_price` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`customer_name`, `customer_number`, `customer_email`, `customer_address`, `car_name`, `car_type`, `car_model`, `car_year`, `car_fuel`, `car_price`) VALUES
('Ebrahim', '01648438489', 'ebrahim@gmail.com', '18/A/1-Uttar Maddartek,Basaboo,Dhaka-1214', 'Tesla 3 2023', 'Used', 'TL 145', '2023', 'Electric', '145623'),
('Ebrahim', '01648438489', 'shuvo@gmail.com', '18/A/1-Uttar Maddartek,Basaboo,Dhaka-1214', 'Tesla 3 2023', 'Used', 'TL 145', '2023', 'Electric', '145623'),
('Shuvo', '01623794230', 'shuvo@gmail.com', 'Uttara,Dhaka', 'BMW b1', 'New', 'B13213', '2025', 'Electric', '15261');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(50) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `number`, `email`, `password`, `type`) VALUES
('Ebrahim', '01648438489', 'ebrahim@gmail.com', '1234', 'admin'),
('Shuvo', '01623794230', 'shuvo@gmail.com', '147', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`model`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
