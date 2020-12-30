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
  `PASSWORD` varchar(255) NOT NULL,
  `PERMISSION` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`EMAIL`, `PASSWORD`, `PERMISSION`) VALUES
('daniele.giachetto@studenti.unipd.it', '58935a4a0e0238d6ba6a1ea123f81b04b9cbcd63b56f79bcb651491c3feade35fb779a74f6a9c8bd320cf3c636f73a88d7669f9b1c6c67a57996f93fe120999f', 0),
('antonio.osele@studenti.unipd.it', '5652f53d1f027b780b2843c6fe4c1da8bd430872f7c2b1473cd8de8c96e5a136bb78e1276f022e915db7ee6ade4e0aec1cd4e5b85f6d52ffc68653ec1f3e860e', 0),
('daniele@studenti.unipd.it', '570e4730eb31169d6fc2e43adfbf36761611049457b079274960fc3635445671efd84c8c4e010d1a3515ca59db92eecba4c1a8dcc2a65b9cb5501b764751e6c0', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
