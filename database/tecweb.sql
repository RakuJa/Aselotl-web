-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 28, 2020 at 11:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tecweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `EMAIL` varchar(320) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `PERMISSION` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`EMAIL`, `PASSWORD`, `PERMISSION`) VALUES
('daniele.giachetto@studenti.unipd.it', '75e07ef9bcaa8fd530089f7d81a3da7eda54a1cae0ebf0dbc72d0657deea2ae7', 0),
('antonio.osele@studenti.unipd.it', '86d0917177d9cf5fb859b81005f650eb9a3be0d5b1a66df60aea9aee416bc03d', 0),
('daniele@studenti.unipd.it', '4e0740685a1e4a303d21a629b59ce3215d0a461f5210d054a9347b63511768b1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
