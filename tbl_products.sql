-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2020 at 03:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_crud_sweetalert2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `a_username` varchar(100) NOT NULL COMMENT 'อีเมลแอดมิน',
  `a_password` varchar(200) NOT NULL COMMENT 'รหัสผ่านแอดมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`a_username`, `a_password`) VALUES
('admin', 'admin@123'),
('jamesTaTo', 'james@123'),
('nathakritTato', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `c_id` int(11) NOT NULL COMMENT 'ไอดีลูกค้า',
  `c_name` varchar(100) NOT NULL COMMENT 'ชื่อลูกค้า',
  `c_tel` varchar(10) NOT NULL COMMENT 'เบอร์โทรลูกค้า',
  `c_address` varchar(255) NOT NULL COMMENT 'ที่อยู่ลูกค้า',
  `c_username` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้การเข้าสู่ระบบลูกค้า',
  `c_password` varchar(255) NOT NULL COMMENT 'รหัสการเข้าสู่ระบบลูกค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`c_id`, `c_name`, `c_tel`, `c_address`, `c_username`, `c_password`) VALUES
(1, 'พี่เจมส์ ตาโต', '0x0x0x0x0x', '...... UdonThaNi', 'jamesTaTo25', 'pw@12345678'),
(2, 'Nathakrit Thitsatian', '061*******', '...... UdonThaNi', 'nathakrit@james', 'pw@12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `p_id` int(11) NOT NULL COMMENT 'ไอดีสินค้า',
  `p_name` varchar(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `p_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `p_count` int(11) NOT NULL COMMENT 'จำนวนสินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`p_id`, `p_name`, `p_price`, `p_count`) VALUES
(101, 'ปลากระป๋อง', 20, 2),
(102, 'มาม่า', 6, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`a_username`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีลูกค้า', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีสินค้า', AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
