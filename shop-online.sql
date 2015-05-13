new file mode 100644
@@ -0,0 +1,232 @@
+-- phpMyAdmin SQL Dump
+-- version 4.1.14
+-- http://www.phpmyadmin.net
+--
+-- Host: 127.0.0.1
+-- Generation Time: May 06, 2015 at 08:25 AM
+-- Server version: 5.6.17
+-- PHP Version: 5.5.12
+
+SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
+SET time_zone = "+00:00";
+
+
+/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
+/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
+/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
+/*!40101 SET NAMES utf8 */;
+
+--
+-- Database: `shop-online`
+--
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `all_settings`
+--
+
+CREATE TABLE IF NOT EXISTS `all_settings` (
+  `all_id` int(3) NOT NULL AUTO_INCREMENT,
+  `all_name_settings` varchar(60) NOT NULL,
+  `all_value_settings` varchar(60) NOT NULL,
+  PRIMARY KEY (`all_id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;
+
+--
+-- Dumping data for table `all_settings`
+--
+
+INSERT INTO `all_settings` (`all_id`, `all_name_settings`, `all_value_settings`) VALUES
+(1, 'footer', 'Copyright Â© Shop Online 2015'),
+(2, 'site_name', 'shop online');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `groups`
+--
+
+CREATE TABLE IF NOT EXISTS `groups` (
+  `gro_id` tinyint(1) NOT NULL AUTO_INCREMENT,
+  `gro_name` varchar(60) NOT NULL,
+  PRIMARY KEY (`gro_id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
+
+--
+-- Dumping data for table `groups`
+--
+
+INSERT INTO `groups` (`gro_id`, `gro_name`) VALUES
+(1, 'admin'),
+(2, 'c_admin'),
+(3, 'member');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `invoices`
+--
+
+CREATE TABLE IF NOT EXISTS `invoices` (
+  `id` int(16) NOT NULL AUTO_INCREMENT,
+  `data` datetime NOT NULL,
+  `due_date` datetime NOT NULL,
+  `user_id` int(10) NOT NULL,
+  `status` enum('paid','confirmed','unpaid','canceled','expired') NOT NULL,
+  PRIMARY KEY (`id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10001003 ;
+
+--
+-- Dumping data for table `invoices`
+--
+
+INSERT INTO `invoices` (`id`, `data`, `due_date`, `user_id`, `status`) VALUES
+(10001001, '2015-05-06 08:13:09', '2015-05-07 08:13:09', 2, 'confirmed'),
+(10001002, '2015-05-06 08:17:15', '2015-05-07 08:17:15', 3, 'unpaid');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `orders`
+--
+
+CREATE TABLE IF NOT EXISTS `orders` (
+  `id` int(16) NOT NULL AUTO_INCREMENT,
+  `invoice_id` int(16) NOT NULL,
+  `product_id` int(16) NOT NULL,
+  `product_type` varchar(60) NOT NULL,
+  `product_title` varchar(60) NOT NULL,
+  `qty` int(3) NOT NULL,
+  `price` int(9) NOT NULL,
+  `options` text NOT NULL,
+  PRIMARY KEY (`id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10001003 ;
+
+--
+-- Dumping data for table `orders`
+--
+
+INSERT INTO `orders` (`id`, `invoice_id`, `product_id`, `product_type`, `product_title`, `qty`, `price`, `options`) VALUES
+(10001001, 10001001, 1, 'PC', 'Dell', 1, 25000, ''),
+(10001002, 10001002, 5, 'Mobile', 'Iphone 6', 1, 46000, '');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `products`
+--
+
+CREATE TABLE IF NOT EXISTS `products` (
+  `pro_id` int(16) NOT NULL AUTO_INCREMENT,
+  `pro_name` varchar(50) NOT NULL,
+  `pro_title` varchar(20) NOT NULL,
+  `pro_description` text NOT NULL,
+  `pro_price` int(9) NOT NULL,
+  `pro_stock` int(3) NOT NULL,
+  `pro_image` text NOT NULL,
+  PRIMARY KEY (`pro_id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;
+
+--
+-- Dumping data for table `products`
+--
+
+INSERT INTO `products` (`pro_id`, `pro_name`, `pro_title`, `pro_description`, `pro_price`, `pro_stock`, `pro_image`) VALUES
+(1, 'PC', 'Dell', 'Dell INSPIRON N5111\r\nRAM 2GB\r\nCORE i5\r\nAVG 1Gb\r\nCPU 3000', 25000, 3, 'Dell_Computer.jpg'),
+(2, 'Laptop', 'Toshiba', 'RAM 1GB\r\nCORE i7\r\nAVG 2Gb\r\nCPU 3500', 50000, 5, 'prod_satA205-OFTWH_300-01.jpg'),
+(3, 'PC', 'HP', 'HP 300 \r\nram 2 gb\r\navg 2\r\ncpu 3500\r\ndvd\r\ncam 16 px\r\n', 75000, 1, 'images.jpg'),
+(4, 'Mobile', 'HTC sensation XL', 'htc', 45000, 1, 'htc_sensation_xl_28.jpg'),
+(5, 'Mobile', 'Iphone 6', 'Iphone 6', 46000, 1, 'aabffb1c6425f95fd26db8595ee28c0e_png.jpg');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `reports`
+--
+
+CREATE TABLE IF NOT EXISTS `reports` (
+  `rep_id` int(9) NOT NULL AUTO_INCREMENT,
+  `rep_name` varchar(60) NOT NULL,
+  `rep_id_product` int(9) NOT NULL,
+  `rep_title_product` varchar(60) NOT NULL,
+  `rep_usr_name` varchar(60) NOT NULL,
+  `rep_usr_group` varchar(60) NOT NULL,
+  PRIMARY KEY (`rep_id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
+
+--
+-- Dumping data for table `reports`
+--
+
+INSERT INTO `reports` (`rep_id`, `rep_name`, `rep_id_product`, `rep_title_product`, `rep_usr_name`, `rep_usr_group`) VALUES
+(3, 'PC', 1, 'Dell', '', '0'),
+(4, 'Laptop', 2, 'Toshiba', '', '0'),
+(5, 'Mobile', 4, 'HTC sensation XL', 'test', '3'),
+(6, 'Laptop', 2, 'Toshiba', 'test', '3'),
+(7, 'PC', 3, 'HP', 'Gost', 'Gost'),
+(8, 'PC', 1, 'Dell', 'hichamtest', '3');
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `shop_session`
+--
+
+CREATE TABLE IF NOT EXISTS `shop_session` (
+  `id` varchar(40) NOT NULL,
+  `ip_address` varchar(45) NOT NULL,
+  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
+  `data` blob NOT NULL,
+  PRIMARY KEY (`id`),
+  KEY `ci_sessions_timestamp` (`timestamp`)
+) ENGINE=InnoDB DEFAULT CHARSET=utf8;
+
+--
+-- Dumping data for table `shop_session`
+--
+
+INSERT INTO `shop_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
+('11b433b91da91fd2df474c65209d5bdf04f52391', '::1', 1430886198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838353930363b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('18e5031ed538645b4ccb810918bb6bb4def54f0f', '::1', 1430885736, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838353630353b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('216782d346ecb725467fa1a08f49f3e057705ad8', '::1', 1430882453, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838323430303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('303d5ff594029d513c5b48c68edde9af03ed959f', '::1', 1430889412, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838393133383b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('473886d26486392bbc947defc69cdcf66424de77', '::1', 1430886630, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838363433363b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('75026a28ee50856686459e50bbf04e02fbdbe1b7', '::1', 1430887393, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373136333b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('8f1b75f2af02d572e0b06950a4286efa36064e28', '::1', 1430892337, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839323333353b),
+('8f5d8f2b27c17d06a261c2d12b9c6783791f23b0', '::1', 1430888044, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373836323b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('a460a08a293ae491ad52e0381efaa0070ec01c76', '::1', 1430888288, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838383137303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('ac03e0e37872a413802709d8289adcfe1d6574db', '::1', 1430887766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838373437343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('c64d3fd803821b27ddca58c1de092623cc89ee8a', '::1', 1430890441, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839303334343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b6d6573736167657c733a35383a225468616e6b20796f75202e2e2e2e2e2077652077696c6c20636865636b206f6e20796f7572207061796d656e7420636f6e6669726d6174696f6e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
+('d03788541a1ed30cb5f5fb7acc025264b50bf1fe', '::1', 1430888790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838383532303b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('d7a7a2250ad798163a90ba09c3e0501aa17bbf2b', '::1', 1430883463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303838333230313b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b),
+('e5a96ef2ea1800a7dc0a794c1fc53ebbd742aa3e', '::1', 1430893426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839333432363b),
+('e6528b002d7aacfeaa0d5e91ca1b9e3d714d5487', '::1', 1430891019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313433303839303733343b757365726e616d657c733a363a2268696368616d223b67726f75707c733a313a2233223b);
+
+-- --------------------------------------------------------
+
+--
+-- Table structure for table `users`
+--
+
+CREATE TABLE IF NOT EXISTS `users` (
+  `usr_id` int(10) NOT NULL AUTO_INCREMENT,
+  `usr_name` varchar(25) NOT NULL,
+  `usr_password` varchar(60) NOT NULL,
+  `usr_group` tinyint(1) NOT NULL,
+  `stuts` tinyint(1) NOT NULL,
+  PRIMARY KEY (`usr_id`)
+) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;
+
+--
+-- Dumping data for table `users`
+--
+
+INSERT INTO `users` (`usr_id`, `usr_name`, `usr_password`, `usr_group`, `stuts`) VALUES
+(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
+(2, 'hicham', '21232f297a57a5a743894a0e4a801fc3', 3, 1),
+(3, 'dyaa', '21232f297a57a5a743894a0e4a801fc3', 3, 1);
+
+/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
+/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
+/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

