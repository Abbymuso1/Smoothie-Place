-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 01, 2021 at 03:54 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubbles_groovy_smoothies`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_menu`
--

CREATE TABLE `food_menu` (
  `id` int(11) NOT NULL,
  `food_name` varchar(20) NOT NULL,
  `image_path` varchar(20) NOT NULL,
  `food_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_menu`
--

INSERT INTO `food_menu` (`id`, `food_name`, `image_path`, `food_price`) VALUES
(1, 'Strawberry          ', 'variouslogin.jpeg', 200),
(2, 'Samosa              ', 'logo.jpeg', 20);

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `Order_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `phone_no` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`Order_id`, `name`, `phone_no`, `address`) VALUES
(1, 'Abi', 791498056, 'Nairobi'),
(2, 'Daned', 78567322, 'Nairobi'),
(3, 'asdc', 9192202, 'Machakos'),
(11, 'Abby', 782373929, 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `paging`
--

CREATE TABLE `paging` (
  `id` int(11) NOT NULL,
  `alphabet` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paging`
--

INSERT INTO `paging` (`id`, `alphabet`) VALUES
(1, 'a'),
(2, 'b'),
(3, 'c'),
(4, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `user_location` varchar(20) NOT NULL,
  `user_newpass` int(11) NOT NULL,
  `user_retype_pass` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_name`, `phone_no`, `user_location`, `user_newpass`, `user_retype_pass`, `usertype`) VALUES
(2, 'Harriet Wells       ', 722396515, 'Coast               ', 1111, 1111, 'admin'),
(3, 'Danny Nike          ', 710469492, 'Nakuru              ', 9090, 9090, 'chef'),
(5, 'Abi Muso', 791498056, 'Nairobi', 101, 101, 'user'),
(6, 'Abi Muso', 791498056, 'Nairobi', 101, 101, 'user'),
(7, 'Abi Muso', 791498056, 'Nairobi', 101, 101, 'user'),
(8, 'Abi Muso', 791498056, 'Nairobi', 101, 101, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `Order_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`Order_id`, `name`, `price`, `quantity`) VALUES
(6, '2', 2, 2),
(6, '4', 4, 4),
(7, '2', 2, 2),
(7, '5', 5, 5),
(8, '2', 2, 2),
(9, '2', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_menu`
--
ALTER TABLE `food_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `paging`
--
ALTER TABLE `paging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_menu`
--
ALTER TABLE `food_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `Order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paging`
--
ALTER TABLE `paging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
