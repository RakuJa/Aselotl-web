-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2021 at 03:18 PM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dgiachet`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `IMGID` varchar(255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`IMGID`, `DESCRIPTION`, `EMAIL`) VALUES
('1609802163.jpg', 'Disegno fatto a mano con tanto amore', 'admin'),
('1609802181.jpg', 'Disegno digitale di un axolotl', 'admin'),
('1609802222.jpg', 'Un axolotl strano', 'user'),
('1609802260.jpg', 'Modello 3D di un axolotl', 'user'),
('1611435009.jpg', 'Un axolotl disegnato a matita', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fotokeyword`
--

CREATE TABLE `fotokeyword` (
  `KEYWORD` varchar(40) NOT NULL,
  `IMGID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fotokeyword`
--

INSERT INTO `fotokeyword` (`KEYWORD`, `IMGID`) VALUES
('disegno', '1609802163.jpg'),
('mano', '1609802163.jpg'),
('axolotl', '1609802163.jpg'),
('disegno', '1609802181.jpg'),
('digitale', '1609802181.jpg'),
('axolotl', '1609802181.jpg'),
('disegno', '1609802222.jpg'),
('mano', '1609802222.jpg'),
('axolotl', '1609802222.jpg'),
('strano', '1609802222.jpg'),
('modello', '1609802260.jpg'),
('3D', '1609802260.jpg'),
('axolotl', '1609802260.jpg'),
('axolotl', '1611435009.jpg'),
('disegno', '1611435009.jpg'),
('matita', '1611435009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `KEYWORD` varchar(40) NOT NULL,
  `LAST_USED` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`KEYWORD`, `LAST_USED`) VALUES
('3D', '2021-01-25'),
('axolotl', '2021-01-24'),
('digitale', '2021-01-05'),
('disegno', '2021-01-24'),
('mano', '2021-01-05'),
('matita', '2021-01-23'),
('modello', '2021-01-05'),
('strano', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `PERMISSION` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`EMAIL`, `PASSWORD`, `PERMISSION`) VALUES
('admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 0),
('user', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`IMGID`),
  ADD KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `fotokeyword`
--
ALTER TABLE `fotokeyword`
  ADD KEY `KEYWORD` (`KEYWORD`),
  ADD KEY `IMGID` (`IMGID`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`KEYWORD`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`EMAIL`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `email` FOREIGN KEY (`EMAIL`) REFERENCES `user` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fotokeyword`
--
ALTER TABLE `fotokeyword`
  ADD CONSTRAINT `IMGID` FOREIGN KEY (`IMGID`) REFERENCES `foto` (`IMGID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keyword` FOREIGN KEY (`KEYWORD`) REFERENCES `keyword` (`KEYWORD`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
