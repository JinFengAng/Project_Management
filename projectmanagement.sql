-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 09:45 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `language`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'E'),
(2, 'Test2', '202cb962ac59075b964b07152d234b70', '0'),
(3, 'Test3', '202cb962ac59075b964b07152d234b70', 'c%e%m');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `customer_hpNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_hpNo`) VALUES
(1, '华文', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `PO_id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL,
  `subTotal` int(10) NOT NULL,
  `taxPrice` int(10) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`PO_id`, `house_id`, `subTotal`, `taxPrice`, `totalPrice`, `purchase_date`) VALUES
(2, 2, 3, 0, 3, '2022-02-07'),
(3, 2, 3, 0, 3, '2022-02-07'),
(4, 2, 3, 0, 3, '2022-02-07'),
(5, 2, 3, 0, 3, '2022-02-07'),
(6, 2, 3, 0, 3, '2022-02-07'),
(7, 2, 3, 0, 3, '2022-02-07'),
(8, 2, 3, 0, 3, '2022-02-07'),
(9, 2, 0, 0, 0, '0000-00-00'),
(10, 2, 0, 0, 0, '2022-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `PO_DTid` int(10) NOT NULL,
  `PO_id` int(10) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`PO_DTid`, `PO_id`, `product_name`, `product_price`, `quantity`) VALUES
(2, 12, 'material 1', 100, 2),
(3, 12, 'material 2', 20, 1),
(7, 12, 'test', 10, 1),
(8, 12, 'test', 10, 1),
(9, 12, 'material 1', 1, 2),
(10, 12, 'test', 10, 1),
(11, 12, 'material 1', 1, 1),
(12, 12, 'material 1', 3, 1),
(13, 9, 'material 1', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff_work`
--

CREATE TABLE `staff_work` (
  `staff_work_id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `begin_date` date NOT NULL,
  `n_days` int(5) NOT NULL,
  `salary` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_work`
--

INSERT INTO `staff_work` (`staff_work_id`, `house_id`, `customer_id`, `begin_date`, `n_days`, `salary`) VALUES
(1, 1, 1, '2022-02-07', 2, 10),
(2, 1, 1, '2022-02-07', 2, 10),
(3, 1, 1, '2022-02-07', 2, 10),
(4, 2, 2, '2022-02-07', 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `house_id` int(10) NOT NULL,
  `owner_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `phNumber` varchar(100) NOT NULL,
  `house_address` varchar(100) NOT NULL,
  `work_details` varchar(100) NOT NULL,
  `completed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`house_id`, `owner_name`, `phNumber`, `house_address`, `work_details`, `completed`) VALUES
(2, 'House1', '1214124', 'test', 'test', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`PO_id`);

--
-- Indexes for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`PO_DTid`);

--
-- Indexes for table `staff_work`
--
ALTER TABLE `staff_work`
  ADD PRIMARY KEY (`staff_work_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`house_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `PO_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `PO_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `staff_work`
--
ALTER TABLE `staff_work`
  MODIFY `staff_work_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `house_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
