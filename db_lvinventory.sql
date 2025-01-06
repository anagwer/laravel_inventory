-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 05:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lvinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbound`
--

CREATE TABLE `inbound` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `doc_code` varchar(20) NOT NULL,
  `doc_date` date NOT NULL,
  `note` text NOT NULL,
  `qty` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbound`
--

INSERT INTO `inbound` (`id`, `item_id`, `doc_code`, `doc_date`, `note`, `qty`, `uom_id`, `status`) VALUES
(5, 3, 'DOC031438', '2025-01-07', 'coba masukkan stok', 3, 2, 'Posting'),
(7, 3, 'DOC034716', '2025-01-02', 'coba lagi', 2, 2, 'Belum Posting');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `sku` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `sku`, `name`, `item_category_id`, `status`, `qty`) VALUES
(3, 'KD20250106', 'boyo 1/2', 2, 'Kosong', 2);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`id`, `name`) VALUES
(2, 'plastik');

-- --------------------------------------------------------

--
-- Table structure for table `outbound`
--

CREATE TABLE `outbound` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `doc_code` varchar(20) NOT NULL,
  `doc_date` date NOT NULL,
  `note` text NOT NULL,
  `qty` int(11) NOT NULL,
  `uom_id` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbound`
--

INSERT INTO `outbound` (`id`, `item_id`, `doc_code`, `doc_date`, `note`, `qty`, `uom_id`, `status`) VALUES
(1, 3, 'DOC033550', '2025-01-06', 'coba outbound', 10, 2, 'Posting'),
(3, 3, 'DOC045118', '2025-01-06', 'coba lagi', 3, 2, 'Belum Posting');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `name`) VALUES
(2, 'Kg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbound`
--
ALTER TABLE `inbound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound`
--
ALTER TABLE `outbound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbound`
--
ALTER TABLE `inbound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_category`
--
ALTER TABLE `item_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `outbound`
--
ALTER TABLE `outbound`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
