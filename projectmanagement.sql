-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-07-11 04:32:09
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `projectmanagement`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `language`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'E'),
(2, 'Test2', '202cb962ac59075b964b07152d234b70', '0'),
(3, 'Test3', '202cb962ac59075b964b07152d234b70', 'c%e%m');

-- --------------------------------------------------------

--
-- 表的结构 `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `customer_hpNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `purchase_order`
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
-- 转存表中的数据 `purchase_order`
--

INSERT INTO `purchase_order` (`PO_id`, `house_id`, `subTotal`, `taxPrice`, `totalPrice`, `purchase_date`) VALUES
(6, 1, 9, 0, 9, '2022-02-07'),
(7, 1, 4, 0, 4, '2022-02-07'),
(8, 1, 18, 0, 18, '2022-02-07'),
(9, 1, 1, 0, 1, '2022-02-07');

-- --------------------------------------------------------

--
-- 表的结构 `purchase_order_detail`
--

CREATE TABLE `purchase_order_detail` (
  `PO_DTid` int(10) NOT NULL,
  `PO_id` int(10) NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `product_price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `purchase_order_detail`
--

INSERT INTO `purchase_order_detail` (`PO_DTid`, `PO_id`, `product_name`, `product_price`, `quantity`) VALUES
(5, 0, 'material 1', 10, 1),
(6, 0, 'material 1', 2, 2),
(8, 8, '', 0, 5),
(9, 8, '', 0, 25),
(10, 8, 'test2', 4, 2),
(11, 8, 'test2', 5, 2),
(12, 9, 'test3', 10, 0);

-- --------------------------------------------------------

--
-- 表的结构 `staff_work`
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
-- 转存表中的数据 `staff_work`
--

INSERT INTO `staff_work` (`staff_work_id`, `house_id`, `customer_id`, `begin_date`, `n_days`, `salary`) VALUES
(2, 1, 1, '2022-07-11', 1, 31);

-- --------------------------------------------------------

--
-- 表的结构 `supplier`
--

CREATE TABLE `supplier` (
  `house_id` int(10) NOT NULL,
  `owner_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `phNumber` varchar(100) NOT NULL,
  `house_address` varchar(100) NOT NULL,
  `work_details` varchar(100) NOT NULL,
  `completed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `work`
--

CREATE TABLE `work` (
  `work_id` int(10) NOT NULL,
  `house_id` int(10) NOT NULL,
  `totalPrice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `work`
--

INSERT INTO `work` (`work_id`, `house_id`, `totalPrice`) VALUES
(7, 1, 100),
(8, 2, 122),
(9, 1, 12);

-- --------------------------------------------------------

--
-- 表的结构 `work_details`
--

CREATE TABLE `work_details` (
  `work_Did` int(10) NOT NULL,
  `work_id` int(10) NOT NULL,
  `work_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `work_details`
--

INSERT INTO `work_details` (`work_Did`, `work_id`, `work_name`, `total`) VALUES
(6, 0, 'test2', 10),
(7, 0, 'test2', 10),
(8, 6, 'test2', 10),
(9, 6, 'test2', 10),
(10, 6, 'test2', 10),
(11, 6, 'test3', 150),
(13, 6, '华文', 20),
(14, 7, 'material 1', 100),
(15, 0, 'material 1', 11),
(16, 0, 'test', 111),
(17, 0, 'aaaaa', 12);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- 表的索引 `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`PO_id`);

--
-- 表的索引 `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  ADD PRIMARY KEY (`PO_DTid`);

--
-- 表的索引 `staff_work`
--
ALTER TABLE `staff_work`
  ADD PRIMARY KEY (`staff_work_id`);

--
-- 表的索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`house_id`);

--
-- 表的索引 `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`);

--
-- 表的索引 `work_details`
--
ALTER TABLE `work_details`
  ADD PRIMARY KEY (`work_Did`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `PO_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `purchase_order_detail`
--
ALTER TABLE `purchase_order_detail`
  MODIFY `PO_DTid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `staff_work`
--
ALTER TABLE `staff_work`
  MODIFY `staff_work_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `supplier`
--
ALTER TABLE `supplier`
  MODIFY `house_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `work_details`
--
ALTER TABLE `work_details`
  MODIFY `work_Did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
