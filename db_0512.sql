-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2022 at 06:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_0512`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'category1'),
(15, 'category2'),
(17, 'category3');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`id`, `location`, `password`) VALUES
(1, 'Shanghai', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Beijing', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `gid` int(20) NOT NULL,
  `cid` int(20) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `original_price` int(20) DEFAULT NULL,
  `present_price` int(20) DEFAULT NULL,
  `pic_path` varchar(500) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`gid`, `cid`, `description`, `name`, `original_price`, `present_price`, `pic_path`, `stock`, `did`, `status`) VALUES
(1, 2, 'This is battery model 1.', 'model1', 100, 90, 'common/images/pc.jpg', 993, 1, 'available'),
(18, 15, 'This is battery model 2/', 'model 2', 70, 40, 'common/images/pc1.jpg', 893, 2, 'available'),
(20, 17, 'This is battery model 3.', 'model3', 10000, 9000, 'common/images/pc2.jpg', 797, 1, 'available'),
(21, 2, 'This is battery model4.', 'model4', 100, 90, 'common/images/pc3.jpg', 997, 2, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT 1,
  `status` varchar(100) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `did`, `gid`, `num`, `status`) VALUES
(63, 11, 1, 1, 1, 'refund request processed'),
(64, 11, 2, 18, 1, 'asked for refund'),
(65, 11, 1, 1, 1, 'refund request processed'),
(71, 1, 1, 1, 1, 'refund request processed'),
(74, 16, 1, 20, 1, 'paid'),
(75, 16, 2, 21, 1, 'asked for refund'),
(76, 1, 2, 18, 1, 'asked for refund'),
(77, 1, 1, 20, 1, 'refund request processed'),
(80, 1, 1, 1, 1, 'refund request processed'),
(81, 11, 2, 18, 1, 'asked for refund'),
(82, 11, 1, 20, 1, 'paid'),
(83, 11, 1, 1, 1, 'refund request processed'),
(84, 11, 2, 18, 1, 'paid'),
(85, 1, 2, 21, 1, 'paid'),
(86, 1, 1, 1, 1, 'paid'),
(87, 1, 2, 18, 1, 'asked for refund'),
(90, 1, 2, 18, 1, 'paid'),
(91, 1, 2, 21, 1, 'paid'),
(94, 1, 2, 18, 1, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `paymethod` varchar(100) DEFAULT 'not added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone_number`, `mail`, `password`, `address`, `paymethod`) VALUES
(1, 'user1', '12234', '10', '123', 'Shanghai', 'alipay'),
(11, 'user2', '12234', '1@123', '123', 'Shanghai', 'wechat pay'),
(12, 'user3', '12225', '123', '123', 'Shanghai', 'Visa'),
(14, 'user4', '12', '12', '1', 'Shanghai', 'not added'),
(16, '0514', '1', '1', '1', 'Suzhou', 'Visa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `gid` (`gid`),
  ADD KEY `did` (`did`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `gid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `goods` (`gid`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);

--
-- Constraints for table `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`did`) REFERENCES `dealer` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `goods` (`gid`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`did`) REFERENCES `dealer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
