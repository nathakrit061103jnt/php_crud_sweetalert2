/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ heroku_279a59c2954239d /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE heroku_279a59c2954239d;

DROP TABLE IF EXISTS tbl_admin;
CREATE TABLE `tbl_admin`
(
  `a_username` varchar
(100) NOT NULL COMMENT 'อีเมลแอดมิน',
  `a_password` varchar
(200) NOT NULL COMMENT 'รหัสผ่านแอดมิน',
  PRIMARY KEY
(`a_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS tbl_customers;
CREATE TABLE `tbl_customers`
(
  `c_id` int
(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีลูกค้า',
  `c_name` varchar
(100) NOT NULL COMMENT 'ชื่อลูกค้า',
  `c_tel` varchar
(10) NOT NULL COMMENT 'เบอร์โทรลูกค้า',
  `c_address` varchar
(255) NOT NULL COMMENT 'ที่อยู่ลูกค้า',
  `c_username` varchar
(100) NOT NULL COMMENT 'ชื่อผู้ใช้การเข้าสู่ระบบลูกค้า',
  `c_password` varchar
(255) NOT NULL COMMENT 'รหัสการเข้าสู่ระบบลูกค้า',
  PRIMARY KEY
(`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS tbl_products;
CREATE TABLE `tbl_products`
(
  `p_id` int
(11) NOT NULL AUTO_INCREMENT COMMENT 'ไอดีสินค้า',
  `p_name` varchar
(100) NOT NULL COMMENT 'ชื่อสินค้า',
  `p_price` float NOT NULL COMMENT 'ราคาสินค้า',
  `p_count` int
(11) NOT NULL COMMENT 'จำนวนสินค้า',
  PRIMARY KEY
(`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO tbl_admin
  (a_username,a_password)
VALUES('admin', 'admin@123');

INSERT INTO tbl_products
  (p_id,p_name,p_price,p_count)
VALUES(5, 'ad', 45, 2);