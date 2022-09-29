-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 01:02 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `counteraddon`
--

CREATE TABLE `counteraddon` (
  `caId` int(50) NOT NULL,
  `coId` int(50) NOT NULL,
  `tpid` int(50) NOT NULL,
  `pid` int(50) NOT NULL,
  `addon` varchar(30) NOT NULL,
  `rate` double NOT NULL,
  `qty` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counteraddon`
--

INSERT INTO `counteraddon` (`caId`, `coId`, `tpid`, `pid`, `addon`, `rate`, `qty`, `total`) VALUES
(1, 1, 1, 1, 'Softner', 5, 10, 50),
(2, 1, 1, 1, 'Stain Removal', 20, 5, 100),
(3, 1, 2, 1, 'Stain Removal', 20, 5, 100),
(4, 1, 2, 1, 'Softner', 5, 10, 50),
(5, 1, 3, 3, 'Starch', 20, 5, 100),
(6, 2, 4, 1, 'Softner', 5, 5, 25);

-- --------------------------------------------------------

--
-- Table structure for table `counterproduct`
--

CREATE TABLE `counterproduct` (
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
-- Dumping data for table `counterproduct`
--

INSERT INTO `counterproduct` (`tpid`, `coId`, `unit`, `pid`, `pqty`, `weight`, `rate`, `amount`, `remark`) VALUES
(1, 1, 'unit', 1, 2, 0, 10, 20, 'unit product'),
(2, 1, 'kg', 1, 10, 1000, 0, 79, 'kg item'),
(3, 1, 'unit', 3, 5, 0, 30, 150, 'third item'),
(4, 2, 'unit', 1, 10, 0, 10, 100, 'monu');

-- --------------------------------------------------------

--
-- Table structure for table `couterorder`
--

CREATE TABLE `couterorder` (
  `coId` int(50) NOT NULL,
  `cid` int(10) NOT NULL,
  `pickupDate` varchar(50) NOT NULL,
  `deleveryType` varchar(50) NOT NULL,
  `grossAmount` double NOT NULL,
  `discountPer` float NOT NULL,
  `discount` float NOT NULL,
  `gst` double NOT NULL,
  `totAmount` double NOT NULL,
  `paymentType` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `couterorder`
--

INSERT INTO `couterorder` (`coId`, `cid`, `pickupDate`, `deleveryType`, `grossAmount`, `discountPer`, `discount`, `gst`, `totAmount`, `paymentType`, `status`) VALUES
(1, 1, '2022-09-30', 'By Counter', 649, 0, 0, 116.82, 765.82, 'Now', 1),
(2, 2, '2022-09-30', 'By Counter', 125, 2, 2.5, 22.06, 144.55, 'On Delivery', 0);

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
(2, 'madan', 'babu', 'yaddi', 'admin@admin.com', '7676801529', '73/4', 'sambra', 'kj', 'belgaum', 'karnataka', '597725', 'madan babu yaddi');

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
(2, 1, 'vff1', 'vff43916', 'Shop Keeper');

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
(2, 'Wash & Fold', 'Dupatta Designer', 20, 0),
(3, 'Dry Cleaning', 'Dupatta Designer', 30, 0),
(4, 'Wash & Iron', 'Coat', 10, 0);

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
(1, 'Wash & Iron', 'Wash and iron', 79),
(3, 'Dry Cleaning', 'Cleaning', 450),
(4, 'Wash & Fold', 'wash & Fold', 49);

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
  `full` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `mname`, `lname`, `gen`, `adds`, `city`, `state`, `pin`, `mobile`, `email`, `branch`, `des`, `upl`, `upl1`, `upl2`, `full`) VALUES
(1, 'Akash', 'baleshi', 'jogani', 'Male', 'Sambra', 'belgaum', 'karnataka', '591124', '9742020863', 'akashjogani93@gmail.com', 'Belgaum new', 'Shop Keeper', 'assets/image/1665476.jpg', 'assets/image/Counter order.png', '', 'Akash baleshi jogani'),
(2, 'Sagar ', 'A', 'shinde', 'Male', 'belgaum', 'belgaum', 'karnataka', '591124', '9742020863', 'admin@admin.com', 'Belgaum new', 'Delevery Boy', 'assets/image/underprocessing view.png', 'assets/image/underprocessing.png', 'assets/image/Counter order.png', 'Sagar A shinde'),
(3, 'Akash', 'Baleshi', 'Jogani', 'Male', 'Main Road', 'Belgaum', 'karnataka', '591124', '9742020863', 'akashjogani93@gmail.com', 'Belgaum new', 'Other Staff', 'assets/image/1665476.jpg', 'assets/image/1665476.jpg', 'assets/image/1665476.jpg', 'Akash Baleshi Jogani');

-- --------------------------------------------------------

--
-- Table structure for table `tempaddon`
--

CREATE TABLE `tempaddon` (
  `id` int(10) NOT NULL,
  `tpid` int(50) NOT NULL,
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
-- Indexes for table `counteraddon`
--
ALTER TABLE `counteraddon`
  ADD PRIMARY KEY (`caId`);

--
-- Indexes for table `counterproduct`
--
ALTER TABLE `counterproduct`
  ADD PRIMARY KEY (`tpid`);

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
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `counteraddon`
--
ALTER TABLE `counteraddon`
  MODIFY `caId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `counterproduct`
--
ALTER TABLE `counterproduct`
  MODIFY `tpid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `couterorder`
--
ALTER TABLE `couterorder`
  MODIFY `coId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `logid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempaddon`
--
ALTER TABLE `tempaddon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempproduct`
--
ALTER TABLE `tempproduct`
  MODIFY `tpid` int(50) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
