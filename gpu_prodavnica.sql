-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpu_prodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `name`, `website`) VALUES
(1, 'AMD', 'https://www.amd.com'),
(2, 'Intel', 'https://www.intel.com'),
(3, 'Nvidia', 'https://www.nvidia.com');

-- --------------------------------------------------------

--
-- Table structure for table `oem`
--

CREATE TABLE `oem` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oem`
--

INSERT INTO `oem` (`id`, `name`, `website`) VALUES
(1, 'EVGA', 'https://evga.com'),
(2, 'Gigabyte', 'https://www.gigabyte.com'),
(3, 'Sapphire', 'https://www.sapphiretech.com'),
(4, 'MSI', 'https://www.msi.com'),
(5, 'ASUS', 'https://www.asus.com'),
(6, 'ASRock', 'https://www.asrock.com');

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `oemid` int(11) NOT NULL,
  `designerid` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`id`, `oemid`, `designerid`, `model`, `price`) VALUES
(2, 2, 1, 'RX 6900', 700),
(3, 5, 2, 'Arc A770', 400),
(5, 4, 3, 'RTX 3090', 700),
(7, 2, 1, 'RX 6800', 700),
(8, 3, 1, 'RX 6500', 400),
(9, 5, 2, 'Arc A330', 100);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oem`
--
ALTER TABLE `oem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oemid` (`oemid`),
  ADD KEY `designerid` (`designerid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD CONSTRAINT `designerid` FOREIGN KEY (`designerid`) REFERENCES `designer` (`id`),
  ADD CONSTRAINT `oemid` FOREIGN KEY (`oemid`) REFERENCES `oem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
