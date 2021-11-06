-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2021 at 05:13 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'cpu'),
(3, 'mainboard'),
(4, 'ram'),
(5, 'gpu'),
(6, 'screen'),
(7, 'case'),
(8, 'headphone'),
(9, 'peripherals'),
(10, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cid` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `imgpath` varchar(255) DEFAULT 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fvi.wikipedia.org%2Fwiki%2FT%25E1%25BA%25ADp_tin%3ANo_image_available.svg&psig=AOvVaw0L-aUUj6VG3vsH5RIObfRD&ust=1635798685048000&source=images&cd=vfe&ved=0CAsQjRxqFwoTCMCOyI6_9fMCFQAAAAAdAAAAABAD',
  `rate` tinyint(3) UNSIGNED DEFAULT '5',
  `createdtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Triggers `product`
--
DROP TRIGGER IF EXISTS `product_date_created`;
DELIMITER $$
CREATE TRIGGER `product_date_created` BEFORE INSERT ON `product` FOR EACH ROW set new.`createdtime` = now()
$$
DELIMITER ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cid`, `name`, `description`, `price`, `imgpath`, `rate`, `createdtime`) VALUES
(1, 2, 'Bộ Vi Xử Lý Core i5', 'Core i5 9400 | 9M | 2.9GHz upto 4.1GHz |6 nhân 6 luồng', 139, 'res/img/product/item1.jpg', 5, '2021-11-07 00:11:34'),
(2, 2, 'Bộ Vi Xử Lý AMD', 'AMD Athlon™ 200GE 3.2GHz | 2 nhân 4 luồng | Radeon™ Vega 3 Graphics', 99, 'res/img/product/item2.jpg', 5, '2021-11-07 00:11:34'),
(3, 2, 'Bộ Vi Xử Lý AMD Ryzen 3', 'AMD Ryzen 3 3200G |6MB|3.6GHz |4 nhân 4 luồng', 159, 'res/img/product/item3.jpg', 5, '2021-11-07 00:11:34'),
(4, 2, 'Bộ Vi Xử Lý Core AMD Ryzen 9', 'AMD Ryzen 9 3900x |70MB |3.8GHz |12 nhân 24 luồng', 519, 'res/img/product/item4.jpg', 5, '2021-11-07 00:11:34'),
(5, 8, 'Tai nghe SteelSeries Arctis Pro Wireless', 'Độ nhạy: 102 dBSPL|Micro : -38 dBV/Pa', 308, 'res/img/product/Gaming2.png', 5, '2021-11-07 00:11:34'),
(6, 8, 'Bao Silicon cho Tai nghe Sony WF-1000XM3', 'Chất liệu: Silicon| Hãng: Sony| Model: WF-1000XM3', 10, 'res/img/product/other4.jpg', 5, '2021-11-07 00:11:34'),
(7, 9, 'Chuột Razer Basilisk Ultimate', '20000DPI', 139, 'res/img/product/Gaming3.jpg', 5, '2021-11-07 00:11:34'),
(8, 10, 'Ghế Noble Chair Hero Series Real Leather', 'Chất liệu: Da thật', 1159, 'res/img/product/Gaming4.png', 5, '2021-11-07 00:11:34'),
(9, 10, 'Sony Playstation 4 Pro 1TB Party Bundle', 'PlayStation 4 Pro (Jet Black) with 1TB HDD x 1 (CUH-7218BB01) |DUALSHOCK 4 wireless controller (Jet Black) x 2', 499, 'res/img/product/Gaming1.png', 5, '2021-11-07 00:11:34'),
(10, 10, 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – Blue', 'Màu: Xanh Blue', 10, 'res/img/product/other1.png', 4, '2021-11-07 00:11:34'),
(11, 10, 'Bộ Dây Nguồn Custom Corsair Premium Type 4 Gen 4 – White', 'Màu: Trắng Sữa', 10, 'res/img/product/other2.png', 4, '2021-11-07 00:11:34'),
(12, 10, 'Balo RAZER ROUGE BACKPACK (15.6 Inch)', 'Kích thước: 30x17x44 (cm) - ( DxRxC)|Inch Laptop: 15.6 Inch|Trọng lượng: 1000 gram|Chất liệu:Vải Polyester 1260D WR 3PU + Polyester 210D tráng PU', 109, 'res/img/product/other3.jpg', 3, '2021-11-07 00:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '123456');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
