-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2018 at 05:05 PM
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
-- Database: `fruitsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fruit_store`
--

CREATE TABLE `fruit_store` (
  `seller_email` varchar(40) NOT NULL,
  `fruit_name` varchar(40) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fruit_store`
--

INSERT INTO `fruit_store` (`seller_email`, `fruit_name`, `quantity`, `price`) VALUES
('ram@gmail.com', 'fruit6', 10, 1200),
('ram@gmail.com', 'fruit2', 100, 10),
('ram@gmail.com', 'fruit3', 10, 1),
('ram@gmail.com', 'fruit8', 90, 23),
('ram@gmail.com', 'fruit2', 300, 19),
('ram@gmail.com', 'fruit2', 30, 5),
('bharu1@gmail.com', 'fruit2', 40, 10),
('bharu1@gmail.com', 'fruit5', 80, 20),
('bharu1@gmail.com', 'fruit4', 120, 10),
('bharu1@gmail.com', 'fruit3', 100, 12),
('bharu1@gmail.com', 'fruit9', 120, 10),
('phani@gmail.com', 'fruit1', 200, 20),
('phani@gmail.com', 'fruit4', 120, 12),
('phani@gmail.com', 'fruit2', 100, 10),
('phani@gmail.com', 'fruit2', 80, 10),
('phani@gmail.com', 'fruit9', 70, 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
