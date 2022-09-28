-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 07:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `addon`
--

CREATE TABLE `addon` (
  `id` bigint(10) NOT NULL,
  `addon` varchar(30) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addon`
--

INSERT INTO `addon` (`id`, `addon`, `rate`) VALUES
(1, 'Softner', 5),
(3, 'Stain Removal', 20),
(4, 'Starch', 20),
(5, 'Antiseptic', 12);

-- --------------------------------------------------------

--
-- Table structure for table `add_adon`
--

CREATE TABLE `add_adon` (
  `id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `addon` varchar(30) NOT NULL,
  `rate` double NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_adon`
--

INSERT INTO `add_adon` (`id`, `pro_id`, `addon`, `rate`, `qty`, `total`) VALUES
(35, 1, 'Softner', 0, 1, 0),
(36, 1, 'Softner', 0, 5, 0),
(37, 1, 'Softner', 0, 5, 0),
(38, 1, 'Softner', 0, 5, 0),
(39, 1, 'Softner', 0, 5, 0),
(40, 3, 'Softner', 0, 0, 0),
(41, 3, 'Softner', 0, 0, 0),
(42, 3, 'Starch', 0, 10, 0),
(43, 5, 'Softner', 0, 1, 0),
(44, 1, 'Softner', 0, 1, 0),
(45, 1, 'Softner', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `bid` bigint(10) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `adds` varchar(150) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bid`, `bname`, `adds`, `pin`, `gst`, `mobile`, `email`) VALUES
(1, 'Belgaum new', 'Plot no 198 saraf colony khanapur road tilakawadi', '5911221', '29BRGPS5251K127', '9742020863', 'akashjogani93@gmail.com'),
(2, 'Belgaum Tilakwadi', 'Plot no 198 saraf colony khanapur road tilakawadi', '590001', '29BRGPS5251K127', '9742020863', 'akashjogani93@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `hno` varchar(10) NOT NULL,
  `adds` varchar(50) NOT NULL,
  `land` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `full` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `fname`, `mname`, `lname`, `email`, `mobile`, `hno`, `adds`, `land`, `city`, `state`, `zip`, `full`) VALUES
(1, 'Sagar', 'a', 'shinde', 'akashjogani93@gmail.com', '9742020863', '73/4', 'belgaum', 'kj', 'belgaum', 'karnataka', '597725', 'Sagar a shinde'),
(2, 'madan', 'babu', 'yaddi', 'admin@admin.com', '7676801529', '73/4', 'sambra', 'kj', 'belgaum', 'karnataka', '597725', 'madan babu yaddi'),
(3, 'Akash', 'baleshi', 'jogani', 'admin@admin.com', '9742020863', '73/4', 'belgaum', 'kj', 'belgaum', 'karnataka', '597725', 'Akash baleshi jogani');

-- --------------------------------------------------------

--
-- Table structure for table `cust_detail`
--

CREATE TABLE `cust_detail` (
  `id` int(11) NOT NULL,
  `full` varchar(80) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `adds` varchar(50) NOT NULL,
  `hno` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `pickup` date NOT NULL,
  `delivery` date NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` bigint(10) NOT NULL,
  `sid` bigint(10) NOT NULL,
  `cate` varchar(10) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `p_unit` double NOT NULL,
  `pkg` double NOT NULL,
  `service` varchar(20) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `sid`, `cate`, `iname`, `p_unit`, `pkg`, `service`, `img`) VALUES
(1, 0, '', 'Dupatta Designer', 0, 0, '', ''),
(2, 0, '', 'Kameez/Kurta', 0, 0, '', ''),
(3, 0, '', 'Kurt+ Pants/Salwar', 0, 0, '', ''),
(4, 0, '', 'Coat', 0, 0, '', ''),
(5, 0, '', 'Shirt', 0, 0, '', ''),
(6, 0, '', 'Bed Cover Single', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `logid` bigint(10) NOT NULL,
  `id` bigint(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`logid`, `id`, `username`, `password`, `user`) VALUES
(1, 0, 'admin', 'pass', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `orderdel`
--

CREATE TABLE `orderdel` (
  `id` bigint(20) NOT NULL,
  `kg` varchar(10) NOT NULL,
  `service` varchar(30) NOT NULL,
  `product` varchar(50) NOT NULL,
  `rate` double NOT NULL,
  `qty` double NOT NULL,
  `tot` double NOT NULL,
  `qot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pid` int(10) NOT NULL,
  `services` varchar(30) NOT NULL,
  `items` varchar(40) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pid`, `services`, `items`, `price`) VALUES
(1, 'Wash & Iron', 'Dupatta Designer', 10),
(2, 'Wash & Fold', 'Dupatta Designer', 20),
(3, 'Dry Cleaning', 'Dupatta Designer', 30),
(4, 'Wash & Iron', 'Coat', 10);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` bigint(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `dis` varchar(30) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `title`, `dis`, `price`) VALUES
(1, 'Wash & Iron', 'Wash and iron', 79),
(3, 'Dry Cleaning', 'Cleaning', 450),
(4, 'Wash & Fold', 'wash & Fold', 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_adon`
--
ALTER TABLE `add_adon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `cust_detail`
--
ALTER TABLE `cust_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `orderdel`
--
ALTER TABLE `orderdel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `add_adon`
--
ALTER TABLE `add_adon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cust_detail`
--
ALTER TABLE `cust_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `logid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderdel`
--
ALTER TABLE `orderdel`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
