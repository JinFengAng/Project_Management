-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 05:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
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
  `customer_name` varchar(100) NOT NULL,
  `customer_hpNo` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_hpNo`, `customer_address`, `customer_email`, `password`) VALUES
(1, 'Convenient Store A', '0123456789', '1, Jalan Alpha A, Taman Testing, 852004 Johor, Johor Bahru', 'JalanA@gmail.com', '123'),
(2, 'Store A', '0178945612', '20, Jalan Road Store 1, Taman Side, 86602, Johor, Johor Bahru', 'astore@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `customer_DTid` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `day` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`customer_DTid`, `customer_id`, `stock_id`, `quantity`, `day`) VALUES
(1, 1, 2, 20, 0),
(2, 1, 3, 20, 0),
(3, 1, 4, 2, 0),
(4, 1, 2, 30, 1),
(5, 1, 5, 30, 1),
(6, 1, 2, 40, 2),
(7, 1, 3, 50, 2),
(8, 1, 2, 20, 3),
(9, 1, 4, 50, 3),
(11, 1, 2, 30, 5),
(12, 1, 3, 50, 6),
(13, 1, 4, 60, 7),
(14, 1, 5, 100, 8),
(15, 2, 3, 50, 1),
(16, 2, 2, 50, 6),
(17, 2, 3, 100, 8),
(18, 2, 5, 60, 8),
(19, 4, 2, 10, 0),
(20, 1, 2, 30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `c_invoice`
--

CREATE TABLE `c_invoice` (
  `c_invoice_id` int(10) NOT NULL,
  `c_invoice_date` date NOT NULL,
  `c_invoice_price` int(10) NOT NULL,
  `c_invoice_taxPrice` int(10) NOT NULL,
  `c_day` int(10) NOT NULL,
  `c_payment_id` int(10) NOT NULL,
  `return_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_invoice`
--

INSERT INTO `c_invoice` (`c_invoice_id`, `c_invoice_date`, `c_invoice_price`, `c_invoice_taxPrice`, `c_day`, `c_payment_id`, `return_id`, `customer_id`) VALUES
(1, '2020-12-30', 240, 0, 2, 1, 1, 1),
(2, '2020-12-30', 40, 0, 2, 1, 3, 1),
(3, '2020-12-31', 60, 0, 4, 0, 0, 1),
(5, '2021-01-06', 120, 0, 7, 0, 0, 1),
(7, '2021-01-29', 200, 0, 8, 0, 0, 1),
(8, '2021-01-29', 320, 0, 8, 0, 0, 2),
(11, '2020-12-30', 10, 0, 2, 2, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `c_invoice_detail`
--

CREATE TABLE `c_invoice_detail` (
  `c_invoice_DTid` int(10) NOT NULL,
  `c_invoice_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_invoice_detail`
--

INSERT INTO `c_invoice_detail` (`c_invoice_DTid`, `c_invoice_id`, `stock_id`, `quantity`) VALUES
(1, 1, 2, 20),
(2, 1, 3, 100),
(3, 2, 2, 10),
(4, 2, 3, 10),
(5, 3, 2, 30),
(6, 5, 4, 60),
(7, 7, 5, 100),
(8, 8, 3, 100),
(9, 8, 5, 60),
(10, 9, 5, 100),
(11, 10, 3, 100),
(12, 10, 5, 60),
(14, 11, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `c_payment`
--

CREATE TABLE `c_payment` (
  `c_payment_id` int(10) NOT NULL,
  `c_date` date NOT NULL,
  `c_payment_price` int(10) NOT NULL,
  `unpaid_amt` int(100) NOT NULL,
  `c_payment_taxPrice` int(10) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_payment`
--

INSERT INTO `c_payment` (`c_payment_id`, `c_date`, `c_payment_price`, `unpaid_amt`, `c_payment_taxPrice`, `date_paid`, `status`, `customer_id`) VALUES
(1, '2020-12-30', 278, 78, 0, '0000-00-00', 'UNPAID', 1),
(2, '2020-12-30', 6, 0, 0, '2020-12-30', 'PAID', 2);

-- --------------------------------------------------------

--
-- Table structure for table `c_payment_detail`
--

CREATE TABLE `c_payment_detail` (
  `c_payment_DTid` int(10) NOT NULL,
  `c_payment_id` int(10) NOT NULL,
  `c_invoice_id` int(10) NOT NULL,
  `return_id` int(10) NOT NULL,
  `c_price` int(10) NOT NULL,
  `c_tax` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_payment_detail`
--

INSERT INTO `c_payment_detail` (`c_payment_DTid`, `c_payment_id`, `c_invoice_id`, `return_id`, `c_price`, `c_tax`) VALUES
(1, 1, 1, 0, 240, 0),
(2, 1, 2, 0, 40, 0),
(3, 1, 0, 10, 2, 0),
(4, 2, 11, 0, 10, 0),
(5, 2, 0, 9, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(10) NOT NULL,
  `delivery_name` varchar(100) NOT NULL,
  `delivery_phone_no` varchar(100) NOT NULL,
  `salary` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `delivery_name`, `delivery_phone_no`, `salary`) VALUES
(2, 'Delivery A', '0165893247', 1200),
(4, 'Jason', '0152469873', 1300);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `delivery_DT_id` int(10) NOT NULL,
  `subscriber_id` int(10) NOT NULL,
  `delivery_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`delivery_DT_id`, `subscriber_id`, `delivery_id`) VALUES
(1, 2, 2),
(2, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `PO_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `subTotal` int(10) NOT NULL,
  `taxPrice` int(10) NOT NULL,
  `totalPrice` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `s_return_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `received_date` date NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`PO_id`, `supplier_id`, `subTotal`, `taxPrice`, `totalPrice`, `status`, `invoice_no`, `s_return_id`, `purchase_date`, `received_date`, `day`) VALUES
(1, 1, 80, 0, 80, 'Received', 'INV252', 0, '2020-12-30', '2020-12-11', '0000-00-00'),
(2, 1, 120, 0, 120, 'Received', 'INV2541', 0, '2020-12-30', '2020-12-30', '0000-00-00'),
(3, 2, 20, 0, 20, 'Received', 'INV0025', 9, '2020-12-30', '2020-12-30', '0000-00-00'),
(5, 2, 400, 0, 400, 'Awaiting delivery', '', 0, '2021-01-01', '0000-00-00', '0000-00-00'),
(6, 1, 100, 0, 100, 'Awaiting delivery', '', 0, '2021-01-07', '0000-00-00', '0000-00-00'),
(7, 2, 200, 0, 200, 'Awaiting delivery', '', 0, '2021-01-07', '0000-00-00', '0000-00-00'),
(8, 1, 60, 0, 60, 'Awaiting delivery', '', 0, '2021-01-30', '0000-00-00', '0000-00-00'),
(9, 2, 200, 0, 200, 'Awaiting delivery', '', 0, '2021-01-30', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `PO_DTid` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `PO_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`PO_DTid`, `stock_id`, `PO_id`, `product_name`, `product_price`, `quantity`) VALUES
(1, 2, 1, 'The Star', 2, 20),
(2, 3, 1, 'Utusan', 2, 20),
(3, 2, 2, 'The Star', 2, 20),
(4, 3, 2, 'Utusan', 2, 20),
(5, 0, 2, 'Newspaper', 2, 20),
(6, 2, 3, 'The Star', 2, 10),
(7, 0, 5, 'The Star', 2, 200),
(8, 0, 6, 'Utusan', 2, 50),
(9, 0, 7, 'Newspaper', 2, 100),
(10, 0, 8, 'Utusan', 2, 30),
(11, 0, 9, 'NanYang', 2, 100);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(10) NOT NULL,
  `c_payment_id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt`
--

INSERT INTO `receipt` (`receipt_id`, `c_payment_id`, `type`, `cheque_no`, `bank`, `price`, `r_date`) VALUES
(5, 181, 'Cash', '', '', 100, '2020-12-10'),
(6, 182, 'Cash', '', '', 100, '2020-12-10'),
(7, 181, 'Cash', '', '', 100, '2020-12-10'),
(8, 182, 'Cash', '', '', 120, '2020-12-16'),
(9, 182, 'Cash', '1254568', 'maybank', 100, '2020-12-21'),
(10, 1, 'Cheque', '2154863-44512', 'Maybank', 200, '2020-12-30'),
(11, 2, 'Cash', '', '', 6, '2020-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(10) NOT NULL,
  `r_total_price` int(10) NOT NULL,
  `r_taxPrice` int(10) NOT NULL,
  `r_date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  `c_invoice_id` int(11) NOT NULL,
  `c_payment_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `r_total_price`, `r_taxPrice`, `r_date`, `customer_id`, `c_invoice_id`, `c_payment_id`) VALUES
(9, 4, 0, '2020-12-30', 2, 11, 2),
(10, 2, 0, '2020-12-30', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `return_detail`
--

CREATE TABLE `return_detail` (
  `return_DTid` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `return_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `return_detail`
--

INSERT INTO `return_detail` (`return_DTid`, `stock_id`, `return_id`, `quantity`) VALUES
(11, 2, 9, 2),
(12, 2, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `r_inv`
--

CREATE TABLE `r_inv` (
  `r_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `r_inv`
--

INSERT INTO `r_inv` (`r_id`, `product_name`, `price`, `quantity`, `language`) VALUES
(2, 'The Star', 2, -505, 'E'),
(3, 'Utusan', 2, 1, 'M'),
(4, 'NanYang', 2, 0, 'C'),
(5, 'Newspaper', 2, 0, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_name`, `product_price`, `quantity`, `language`) VALUES
(2, 'The Star', 2, -405, 'E'),
(3, 'Utusan', 2, -405, 'M'),
(4, 'NanYang', 2, -505, 'C'),
(5, 'Newspaper', 2, -465, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `subscriber_id` int(10) NOT NULL,
  `subscriber_name` varchar(100) NOT NULL,
  `subscriber_phone_no` varchar(100) NOT NULL,
  `subscriber_address` varchar(100) NOT NULL,
  `delivery_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`subscriber_id`, `subscriber_name`, `subscriber_phone_no`, `subscriber_address`, `delivery_id`) VALUES
(2, 'Subscriber A', '0168795432', '17, Jalan Scriber, Taman news, 80250 Johor, Johor Bahru', 2),
(4, 'Scriber B', '015269784', '10,Jalam Riber 1, Taman Sub, 80265, Johor, Johor Bahru', 4),
(5, 'Jack', '0325416987', '11, Jalan Cram, Taman road, 80256 Johor, Johor Bahru', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_details`
--

CREATE TABLE `subscriber_details` (
  `subscriber_DTid` int(10) NOT NULL,
  `subscriber_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriber_details`
--

INSERT INTO `subscriber_details` (`subscriber_DTid`, `subscriber_id`, `stock_id`, `quantity`) VALUES
(1, 2, 2, 1),
(2, 2, 4, 2),
(3, 3, 2, 1),
(4, 4, 4, 1),
(5, 5, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_phone_no` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `company_phone_no`, `company_address`, `company_email`) VALUES
(1, 'Supplier A', '0145963278', '50, Jalan Alphac A, Taman Test 82005, Johor, Johor Bahru', 'test@gmail.com'),
(2, 'Jeff ', '0162487539', '15, Jalan Rainbow, Taman Jeffer, 82030 Johor, Johor Bahru', 'companyJ@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_detail`
--

CREATE TABLE `supplier_detail` (
  `supplier_DTid` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `day` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_detail`
--

INSERT INTO `supplier_detail` (`supplier_DTid`, `supplier_id`, `stock_id`, `quantity`, `day`) VALUES
(1, 1, 2, 20, 0),
(2, 1, 3, 20, 0),
(3, 1, 2, 30, 1),
(4, 1, 3, 40, 1),
(5, 1, 4, 20, 1),
(6, 1, 3, 100, 2),
(7, 1, 5, 300, 3),
(8, 1, 4, 20, 4),
(9, 1, 3, 20, 6),
(10, 1, 3, 50, 7),
(11, 1, 3, 30, 8),
(12, 2, 2, 200, 0),
(13, 2, 2, 200, 1),
(14, 2, 2, 200, 2),
(15, 2, 2, 200, 3),
(16, 2, 2, 200, 4),
(17, 2, 2, 200, 5),
(18, 2, 2, 200, 6),
(19, 2, 5, 100, 7),
(20, 2, 4, 100, 8);

-- --------------------------------------------------------

--
-- Table structure for table `s_invoice`
--

CREATE TABLE `s_invoice` (
  `s_invoice_id` int(10) NOT NULL,
  `s_invoice_taxPrice` int(10) NOT NULL,
  `s_invoice_date` varchar(10) NOT NULL,
  `s_invoice_price` int(10) NOT NULL,
  `s_payment_id` int(10) NOT NULL,
  `subscriber_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_invoice`
--

INSERT INTO `s_invoice` (`s_invoice_id`, `s_invoice_taxPrice`, `s_invoice_date`, `s_invoice_price`, `s_payment_id`, `subscriber_id`) VALUES
(1, 0, '12-2020', 180, 192, 2),
(2, 0, '12-2020', 60, 193, 4),
(3, 0, '12-2020', 240, 194, 5);

-- --------------------------------------------------------

--
-- Table structure for table `s_invoice_details`
--

CREATE TABLE `s_invoice_details` (
  `s_inovice_DTid` int(10) NOT NULL,
  `s_invoice_id` int(10) NOT NULL,
  `stock_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_invoice_details`
--

INSERT INTO `s_invoice_details` (`s_inovice_DTid`, `s_invoice_id`, `stock_id`, `quantity`) VALUES
(1, 1, 2, 30),
(2, 1, 4, 60),
(3, 2, 4, 30),
(4, 3, 3, 120);

-- --------------------------------------------------------

--
-- Table structure for table `s_payment`
--

CREATE TABLE `s_payment` (
  `s_payment_id` int(10) NOT NULL,
  `s_date` date NOT NULL,
  `s_payment_price` int(10) NOT NULL,
  `unpaid_amt` int(10) NOT NULL,
  `s_payment_taxPrice` int(10) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `subscriber_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_payment`
--

INSERT INTO `s_payment` (`s_payment_id`, `s_date`, `s_payment_price`, `unpaid_amt`, `s_payment_taxPrice`, `date_paid`, `status`, `subscriber_id`) VALUES
(192, '2020-12-30', 180, 180, 0, '0000-00-00', 'UNPAID', 2),
(193, '2020-12-30', 60, 60, 0, '0000-00-00', 'UNPAID', 4),
(194, '2020-12-30', 240, 240, 0, '0000-00-00', 'UNPAID', 5);

-- --------------------------------------------------------

--
-- Table structure for table `s_payment_detail`
--

CREATE TABLE `s_payment_detail` (
  `s_payment_DTid` int(10) NOT NULL,
  `s_payment_id` int(10) NOT NULL,
  `s_invoice_id` int(10) NOT NULL,
  `s_price` int(10) NOT NULL,
  `s_tax` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_payment_detail`
--

INSERT INTO `s_payment_detail` (`s_payment_DTid`, `s_payment_id`, `s_invoice_id`, `s_price`, `s_tax`) VALUES
(12, 190, 26, 30, 0),
(13, 191, 27, 180, 0),
(14, 191, 36, 180, 0),
(15, 192, 1, 180, 0),
(16, 193, 2, 60, 0),
(17, 194, 3, 240, 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_receipt`
--

CREATE TABLE `s_receipt` (
  `receipt_id` int(10) NOT NULL,
  `s_payment_id` int(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cheque_no` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_receipt`
--

INSERT INTO `s_receipt` (`receipt_id`, `s_payment_id`, `type`, `cheque_no`, `bank`, `price`, `r_date`) VALUES
(1, 183, 'Cash', '', '', 120, '2020-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `s_return`
--

CREATE TABLE `s_return` (
  `s_return_id` int(10) NOT NULL,
  `supplier_id` int(10) NOT NULL,
  `r_total_amount` int(10) NOT NULL,
  `r_total_price` int(10) NOT NULL,
  `r_date` date NOT NULL,
  `r_received` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `debit_note` varchar(100) NOT NULL,
  `PO_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_return`
--

INSERT INTO `s_return` (`s_return_id`, `supplier_id`, `r_total_amount`, `r_total_price`, `r_date`, `r_received`, `status`, `debit_note`, `PO_id`) VALUES
(1, 1, 11, 24, '2020-12-30', '2020-12-30', 'Received', 'DN1202', 0),
(4, 2, 5, 10, '0000-00-00', '0000-00-00', 'Awaiting Debit Note', '', 3),
(10, 2, 2, 4, '2020-12-30', '0000-00-00', 'Awaiting Debit Note', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `s_return_detail`
--

CREATE TABLE `s_return_detail` (
  `s_return_DTid` int(10) NOT NULL,
  `s_return_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_return_detail`
--

INSERT INTO `s_return_detail` (`s_return_DTid`, `s_return_id`, `r_id`, `product_price`, `quantity`) VALUES
(1, 1, 2, 20, 10),
(2, 1, 3, 2, 1),
(5, 4, 2, 2, 5),
(11, 1, 4, 0, 1),
(12, 10, 2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `ID` int(10) NOT NULL,
  `ref_date` date NOT NULL,
  `ref_month` varchar(10) NOT NULL,
  `ref_week` date NOT NULL,
  `sup_date` date NOT NULL,
  `sup_month` varchar(10) NOT NULL,
  `sup_week` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ID`, `ref_date`, `ref_month`, `ref_week`, `sup_date`, `sup_month`, `sup_week`) VALUES
(2, '0000-00-00', '2020-12', '0000-00-00', '0000-00-00', '', '0000-00-00'),
(3, '0000-00-00', '12-2020', '0000-00-00', '0000-00-00', '', '0000-00-00'),
(4, '0000-00-00', '', '0000-00-00', '2021-01-01', '', '0000-00-00'),
(5, '0000-00-00', '', '0000-00-00', '0000-00-00', '', '2021-01-07'),
(6, '0000-00-00', '', '0000-00-00', '0000-00-00', '2021-01-30', '0000-00-00');

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
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`customer_DTid`);

--
-- Indexes for table `c_invoice`
--
ALTER TABLE `c_invoice`
  ADD PRIMARY KEY (`c_invoice_id`);

--
-- Indexes for table `c_invoice_detail`
--
ALTER TABLE `c_invoice_detail`
  ADD PRIMARY KEY (`c_invoice_DTid`);

--
-- Indexes for table `c_payment`
--
ALTER TABLE `c_payment`
  ADD PRIMARY KEY (`c_payment_id`);

--
-- Indexes for table `c_payment_detail`
--
ALTER TABLE `c_payment_detail`
  ADD PRIMARY KEY (`c_payment_DTid`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`delivery_DT_id`);

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
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `return_detail`
--
ALTER TABLE `return_detail`
  ADD PRIMARY KEY (`return_DTid`);

--
-- Indexes for table `r_inv`
--
ALTER TABLE `r_inv`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  ADD PRIMARY KEY (`subscriber_DTid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_detail`
--
ALTER TABLE `supplier_detail`
  ADD PRIMARY KEY (`supplier_DTid`);

--
-- Indexes for table `s_invoice`
--
ALTER TABLE `s_invoice`
  ADD PRIMARY KEY (`s_invoice_id`);

--
-- Indexes for table `s_invoice_details`
--
ALTER TABLE `s_invoice_details`
  ADD PRIMARY KEY (`s_inovice_DTid`);

--
-- Indexes for table `s_payment`
--
ALTER TABLE `s_payment`
  ADD PRIMARY KEY (`s_payment_id`);

--
-- Indexes for table `s_payment_detail`
--
ALTER TABLE `s_payment_detail`
  ADD PRIMARY KEY (`s_payment_DTid`);

--
-- Indexes for table `s_receipt`
--
ALTER TABLE `s_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `s_return`
--
ALTER TABLE `s_return`
  ADD PRIMARY KEY (`s_return_id`);

--
-- Indexes for table `s_return_detail`
--
ALTER TABLE `s_return_detail`
  ADD PRIMARY KEY (`s_return_DTid`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `customer_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `c_invoice`
--
ALTER TABLE `c_invoice`
  MODIFY `c_invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `c_invoice_detail`
--
ALTER TABLE `c_invoice_detail`
  MODIFY `c_invoice_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `c_payment`
--
ALTER TABLE `c_payment`
  MODIFY `c_payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `c_payment_detail`
--
ALTER TABLE `c_payment_detail`
  MODIFY `c_payment_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `delivery_DT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `PO_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `PO_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `return_detail`
--
ALTER TABLE `return_detail`
  MODIFY `return_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `r_inv`
--
ALTER TABLE `r_inv`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `subscriber_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber_details`
--
ALTER TABLE `subscriber_details`
  MODIFY `subscriber_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_detail`
--
ALTER TABLE `supplier_detail`
  MODIFY `supplier_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `s_invoice`
--
ALTER TABLE `s_invoice`
  MODIFY `s_invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_invoice_details`
--
ALTER TABLE `s_invoice_details`
  MODIFY `s_inovice_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `s_payment`
--
ALTER TABLE `s_payment`
  MODIFY `s_payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `s_payment_detail`
--
ALTER TABLE `s_payment_detail`
  MODIFY `s_payment_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `s_receipt`
--
ALTER TABLE `s_receipt`
  MODIFY `receipt_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_return`
--
ALTER TABLE `s_return`
  MODIFY `s_return_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `s_return_detail`
--
ALTER TABLE `s_return_detail`
  MODIFY `s_return_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
