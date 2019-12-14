-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 06:40 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rolexstore01`
--

-- --------------------------------------------------------

--
-- Table structure for table `cus_data`
--

CREATE TABLE `cus_data` (
  `cus_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_data`
--

INSERT INTO `cus_data` (`cus_id`, `username`, `password`) VALUES
(1, 'gg', 'a01610228fe998f515a72dd730294d87'),
(2, 'uu', '310dcbbf4cce62f762a2aaa148d556bd'),
(3, 'hh', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'jj', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'gg', '9e1e06ec8e02f0a0074f2fcc6b26303b');

-- --------------------------------------------------------

--
-- Table structure for table `cus_login`
--

CREATE TABLE `cus_login` (
  `log_id` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `timelogin` datetime NOT NULL,
  `timeout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cus_login`
--

INSERT INTO `cus_login` (`log_id`, `user_id`, `timelogin`, `timeout`) VALUES
(1, 1, '2019-11-18 19:36:55', '0000-00-00 00:00:00'),
(2, 1, '2019-11-18 19:58:11', '0000-00-00 00:00:00'),
(3, 1, '2019-11-18 20:06:42', '0000-00-00 00:00:00'),
(4, 1, '2019-11-18 20:10:03', '0000-00-00 00:00:00'),
(5, 1, '2019-11-18 20:17:46', '0000-00-00 00:00:00'),
(6, 1, '2019-11-18 20:27:35', '0000-00-00 00:00:00'),
(7, 1, '2019-11-18 20:32:22', '0000-00-00 00:00:00'),
(8, 1, '2019-11-18 20:37:02', '0000-00-00 00:00:00'),
(9, 1, '2019-11-18 20:38:35', '0000-00-00 00:00:00'),
(10, 1, '2019-11-18 20:39:49', '0000-00-00 00:00:00'),
(11, 1, '2019-11-18 20:41:02', '0000-00-00 00:00:00'),
(12, 1, '2019-11-18 20:42:19', '0000-00-00 00:00:00'),
(13, 1, '2019-11-18 20:44:33', '0000-00-00 00:00:00'),
(14, 1, '2019-11-18 20:45:36', '0000-00-00 00:00:00'),
(15, 3, '2019-11-18 21:28:22', '0000-00-00 00:00:00'),
(16, 5, '2019-11-18 21:32:49', '0000-00-00 00:00:00'),
(17, 3, '2019-11-18 21:46:30', '0000-00-00 00:00:00'),
(18, 3, '2019-11-18 22:12:40', '0000-00-00 00:00:00'),
(19, 3, '2019-11-18 22:14:10', '0000-00-00 00:00:00'),
(20, 3, '2019-11-18 22:19:12', '0000-00-00 00:00:00'),
(21, 3, '2019-11-19 00:01:27', '0000-00-00 00:00:00'),
(22, 3, '2019-11-19 00:04:25', '0000-00-00 00:00:00'),
(23, 3, '2019-11-19 00:27:07', '0000-00-00 00:00:00'),
(24, 3, '2019-11-19 00:28:50', '0000-00-00 00:00:00'),
(25, 3, '2019-11-19 00:33:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `od_id` int(14) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`od_id`, `order_id`, `product_id`, `price`, `amount`) VALUES
(1, 'OD000001', 1, 499900, 1),
(2, 'OD000001', 6, 988400, 1),
(3, 'OD000002', 1, 499900, 1),
(4, 'OD000002', 2, 1305500, 1),
(5, 'OD000003', 2, 1305500, 1),
(6, 'OD000003', 3, 1365200, 1),
(7, 'OD000004', 1, 499900, 1),
(8, 'OD000004', 3, 1365200, 1),
(9, 'OD000004', 5, 391600, 1),
(10, 'OD000005', 2, 1305500, 1),
(11, 'OD000005', 1, 499900, 1),
(12, 'OD000005', 5, 391600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(50) NOT NULL,
  `orderdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `orderdate`) VALUES
('OD000001 ', '2019-11-18 15:46:51'),
('OD000002 ', '2019-11-18 16:12:53'),
('OD000003 ', '2019-11-18 16:14:22'),
('OD000004 ', '2019-11-18 16:19:26'),
('OD000005 ', '2019-11-18 18:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `size` varchar(200) NOT NULL,
  `material` varchar(200) NOT NULL,
  `price` int(200) NOT NULL,
  `amount` int(200) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `pname`, `size`, `material`, `price`, `amount`, `image`) VALUES
(1, 'GMT-MASTER II', '40mm', 'Oystersteel and Everose Gold', 499900, 17, 'img_5dd2d6c2c2a63.png'),
(2, 'GMT-MASTER II', '40mm', 'Everose Gold', 1305500, 10, 'img_5dd2ac22a0d47.png'),
(3, 'GMT-MASTER II', '40mm', 'White Gold', 1365200, 8, 'img_5dd2ac71ca00d.png'),
(5, 'GMT-MASTER II', '40mm', 'Oystersteel and platinum', 391600, 6, 'img_5dd2ac7cd9c8a.jpg'),
(6, 'YACHT-MASTER ', '42mm', 'White Gold', 988400, 3, 'img_5dd2ac945eab0.jpg'),
(7, 'YACHT-MASTER ', '44mm', 'Oystersteel and Everose Gold', 895300, 6, 'img_5dd2aca570456.png'),
(8, 'YACHT-MASTER ', '40mm', 'Oystersteel and platinum', 417700, 9, 'img_5dd2acb3dbb5a.png'),
(9, 'YACHT-MASTER ', '44mm', 'Yellow Gold', 1547900, 10, 'img_5dd2acbec1074.png'),
(10, 'YACHT-MASTER ', '37mm', 'Oystersteel and platinum', 391600, 4, 'img_5dd2acd17c336.jpg'),
(11, 'SEA-DWELLER', '43mm', 'Oystersteel and Yellow Gold', 570700, 5, 'img_5dd2ace43c7be.jpg'),
(12, 'SEA-DWELLER', '43mm', 'Oystersteel', 402900, 6, 'img_5dd2acf22ce71.png'),
(14, 'DAY-DATE', '40mm', 'Yellow Gold', 1238400, 5, 'img_5dd2ad4ae6732.png'),
(15, 'DAY-DATE', '36mm', 'Yellow Gold', 1230900, 10, 'img_5dd2ad5436634.png'),
(16, 'DAY-DATE', '40mm', 'White Gold', 1335400, 15, 'img_5dd2ad5fad8a2.png'),
(17, 'DAY-DATE', '40mm', 'Platinum', 1762120, 15, 'img_5dd2ad6eed4b0.png'),
(18, 'DAY-DATE', '36mm', 'White Gold', 1615200, 15, 'img_5dd2ad8146ced.png'),
(19, 'DATEJUST', '31mm', 'Oystersteel White Gold and Diamond', 432600, 8, 'img_5dd2ad9ea2358.png'),
(20, 'DATEJUST', '41mm', 'Oystersteel and Yellow Gold', 451300, 8, 'img_5dd2adaf20f5e.png'),
(21, 'DATEJUST', '31mm', 'Oystersteel and Everose Gold', 343200, 6, 'img_5dd2adc371337.png'),
(22, 'DATEJUST', '31mm', 'Oystersteel and White Gold', 361900, 15, 'img_5dd2adf005d5c.png'),
(23, 'DATEJUST', '36mm', 'Oystersteel White Gold and Diamond', 623000, 8, 'img_5dd2ae0083dc0.png'),
(24, 'LADY-DATEJUST', '28mm', 'Oystersteel', 223800, 14, 'img_5dd2ae0e6004e.png'),
(25, 'LADY-DATEJUST', '28mm', 'Oystersteel and White Gold', 335800, 10, 'img_5dd2ae236cec7.png'),
(26, 'LADY-DATEJUST', '28mm', 'Yellow Gold and Diamond', 1271900, 6, 'img_5dd2ae2fcd48a.png'),
(28, 'DATEJUST31', '31mm', 'Oystersteel and Yellow Gold and Diamond', 503300, 2, 'img_5dd2b8ada9421.png'),
(29, 'DATEJUST31', '31mm', 'Oystersteel and Everose Gold', 343200, 10, 'img_5dd2b9f7b4618.png');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `timelogin` datetime NOT NULL,
  `timeout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`log_id`, `user_id`, `timelogin`, `timeout`) VALUES
(1, 1, '2019-11-18 19:38:44', '0000-00-00 00:00:00'),
(2, 1, '2019-11-18 19:42:41', '0000-00-00 00:00:00'),
(3, 7, '2019-11-18 19:57:31', '0000-00-00 00:00:00'),
(4, 1, '2019-11-18 20:46:36', '0000-00-00 00:00:00'),
(5, 2, '2019-11-18 21:33:52', '0000-00-00 00:00:00'),
(6, 7, '2019-11-18 22:21:41', '0000-00-00 00:00:00'),
(7, 7, '2019-11-18 22:27:25', '0000-00-00 00:00:00'),
(8, 7, '2019-11-18 22:29:54', '0000-00-00 00:00:00'),
(9, 7, '2019-11-18 22:33:20', '0000-00-00 00:00:00'),
(10, 7, '2019-11-19 00:34:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `password`) VALUES
(1, 'ink', '202cb962ac59075b964b07152d234b70'),
(2, 'guy', '698d51a19d8a121ce581499d7b701668'),
(7, 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cus_data`
--
ALTER TABLE `cus_data`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `cus_login`
--
ALTER TABLE `cus_login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cus_data`
--
ALTER TABLE `cus_data`
  MODIFY `cus_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cus_login`
--
ALTER TABLE `cus_login`
  MODIFY `log_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `od_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
