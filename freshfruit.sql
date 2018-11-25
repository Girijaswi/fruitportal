-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 05:02 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshfruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer_reg`
--

CREATE TABLE `buyer_reg` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` int(10) NOT NULL,
  `panno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_reg`
--

INSERT INTO `buyer_reg` (`firstname`, `lastname`, `email`, `password`, `address`, `phone`, `panno`) VALUES
('anusha', 'mikkili', 'anusha@gmail.com', 'Anusha@12', 'ooty', 2147483647, 'qwert1234g'),
('bidi', 'tadika', 'bidi@gmail.com', 'Bidi@12', 'vizag', 2147483647, 'asdfg1234z'),
('girija', 'rajanala', 'girijaswi.rajanala1210@gmail.c', 'Girija@123', 'ooty', 2147483647, 'asdfg1234w'),
('nikhila', 'talla', 'nikhila@gmail.com', 'Niki@123', 'Amaravathi', 2147483647, 'asdfg1234d'),
('sreelekha', 'pampana', 'sreelekha@gmail.com', 'Sree@12', 'poranki', 2147483647, 'zxcvb5678b');

-- --------------------------------------------------------

--
-- Table structure for table `seller_reg`
--

CREATE TABLE `seller_reg` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `address` varchar(40) NOT NULL,
  `panno` varchar(10) NOT NULL,
  `shop_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_reg`
--

INSERT INTO `seller_reg` (`firstname`, `lastname`, `email`, `password`, `address`, `panno`, `shop_name`) VALUES
('bhargavi', 'bala', 'bharu1@gmail.com', 'Bhar@12', 'delhi', 'zxcvb5678o', 'fruit corner'),
('deepu', 'machineni', 'deepu@gmail.com', 'Deep@123', 'Amaravathi', 'asdfg1234a', 'fruit corner'),
('girija', 'swi', 'giri@gmail.com', 'Girija@123', 'vizag', 'asdfg1234t', 'fruit salad'),
('samanthaka', 'mani', 'mani@gmail.com', 'Mani@12', 'poranki', 'qwert1234f', 'fresh fruits'),
('nalini', 'rajanala', 'nalini@gmail.com', 'Nalini@12', 'bandar', 'aasdfg1234', 'fresh fruits'),
('phani', 'vivek', 'phani@gmail.com', 'Phani@12', 'delhi', 'qwert1234w', 'fruit salad'),
('Ram', 'anand', 'ram@gmail.com', 'Ram@123', 'Amaravathi', 'asdfg1234w', 'fresh fruits'),
('sravya', 'valluru', 'sravya@gmail.com', 'Srav@123', 'vijayawada', 'asdfg1234e', 'food adda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer_reg`
--
ALTER TABLE `buyer_reg`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `seller_reg`
--
ALTER TABLE `seller_reg`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `panno` (`panno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
