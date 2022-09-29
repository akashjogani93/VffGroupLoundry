-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 02:34 PM
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
-- Database: `laundry6`
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
(1, 'Belgaum new', 'Plot no 198 saraf colony khanapur road tilakawadi', '5911221', '29BRGPS5251K127', '9742020863', 'akashjogani@gmail.com'),
(2, 'Belgaum Tilakwadi', 'Plot no 198 saraf colony khanapur road tilakawadi', '590001', '29BRGPS5251K127', '9742020863', 'akashjogani93@gmail');

-- --------------------------------------------------------

--
-- Table structure for table `couterorder`
--

CREATE TABLE `couterorder` (
  `coId` int(50) NOT NULL,
  `cid` int(10) NOT NULL,
  `pickupDate` varchar(50) NOT NULL,
  `deleveryType` varchar(50) NOT NULL,
  `discount` float NOT NULL,
  `gst` double NOT NULL,
  `totAmount` double NOT NULL,
  `paymentType` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `hno` varchar(10) NOT NULL,
  `adds` varchar(50) NOT NULL,
  `land` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `full` varchar(100) NOT NULL,
  `adds1` varchar(100) NOT NULL,
  `gstn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `email`, `mobile`, `hno`, `adds`, `land`, `city`, `state`, `zip`, `full`, `adds1`, `gstn`) VALUES
(2, 'admin@admin.com', '7676801529', '73/4', 'sambra', 'kj', 'belgaum', 'karnataka', '597725', 'madan babu yaddi', '', ''),
(3, 'akashjogani93@gmail.com', '9742020863', '73/4', 'sambra', 'first gate', 'belgaum', 'karnataka', '597725', 'Evon It Solution', 'Arun Empire first Gate', 'FLIP5425558FFF');

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
(1, 0, 'admin', 'pass', 'admin'),
(3, 4, 'vff4', 'vinayak@122', 'Shop Keeper'),
(4, 5, 'vff5', 'vishal@123', 'Shop Keeper'),
(5, 6, 'vff6', 'vff98374', 'Delevery Boy');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(50) NOT NULL,
  `services` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `unitRate` tinyint(1) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `services`, `productName`, `unitRate`, `status`) VALUES
(1, 'Wash & Iron', 'Dupatta Designer', 10, 0),
(3, 'Dry Cleaning', 'Dupatta Designer', 30, 0),
(5, 'Wash & Fold Premium', 'Kameez/Kurta', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` bigint(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `dis` varchar(30) NOT NULL,
  `kgRate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `title`, `dis`, `kgRate`) VALUES
(3, 'Dry Cleaning', 'Cleaning', 450),
(5, 'Wash & Fold Premium', 'This can be a Premium', 120),
(6, 'Wash & Fold', 'wash cloaths', 79),
(7, 'Wash & Iron', 'wash', 100);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gen` varchar(10) NOT NULL,
  `adds` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `des` varchar(20) NOT NULL,
  `upl` varchar(60) NOT NULL,
  `upl1` varchar(60) NOT NULL,
  `upl2` varchar(60) NOT NULL,
  `full` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `mname`, `lname`, `gen`, `adds`, `city`, `state`, `pin`, `mobile`, `email`, `branch`, `des`, `upl`, `upl1`, `upl2`, `full`, `date`) VALUES
(4, 'Vinayak', 'Yallappa', 'Dharmoji', 'Male', 'Sambra', 'Belgaum', 'karnataka', '591124', '7676801529', 'vinayakdmg@gmail.com', 'Belgaum new', 'Shop Keeper', 'assets/image/DSC_2300.JPG', '', '', 'Vinayak Yallappa Dharmoji', '2022-09-29'),
(5, 'vishal', 'a', 'lohar', 'Male', 'belgaum', 'belgaum', 'karnataka', '591124', '9742020863', 'admin@admin.com', 'Belgaum new', 'Shop Keeper', '', '', '', 'vishal a lohar', '2022-09-29'),
(6, 'Sairaj', 'n', 'patil', 'Male', 'belgaum', 'belgaum', 'karnataka', '591124', '9742020863', 'admin@admin.com', 'Belgaum new', 'Delevery Boy', '', '', '', 'Sairaj n patil', '2022-09-29');

-- --------------------------------------------------------

--
-- Table structure for table `tempaddon`
--

CREATE TABLE `tempaddon` (
  `id` int(10) NOT NULL,
  `pid` int(50) NOT NULL,
  `addon` varchar(30) NOT NULL,
  `rate` double NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempproduct`
--

CREATE TABLE `tempproduct` (
  `tpid` int(50) NOT NULL,
  `coId` int(50) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `pid` int(50) NOT NULL,
  `pqty` int(50) NOT NULL,
  `weight` float NOT NULL,
  `rate` float NOT NULL,
  `amount` float NOT NULL,
  `remark` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `couterorder`
--
ALTER TABLE `couterorder`
  ADD PRIMARY KEY (`coId`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempaddon`
--
ALTER TABLE `tempaddon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempproduct`
--
ALTER TABLE `tempproduct`
  ADD PRIMARY KEY (`tpid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addon`
--
ALTER TABLE `addon`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `couterorder`
--
ALTER TABLE `couterorder`
  MODIFY `coId` int(50) NOT NULL AUTO_INCREMENT;

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
  MODIFY `logid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tempaddon`
--
ALTER TABLE `tempaddon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tempproduct`
--
ALTER TABLE `tempproduct`
  MODIFY `tpid` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
