-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 07:30 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lappy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `price`, `quantity`, `total`, `status`) VALUES
(33, 15, 3, 53000, 4, 212000, 'added'),
(35, 1, 13, 30000, 3, 90000, 'added'),
(37, 2, 4, 50000, 1, 50000, 'added'),
(47, 16, 15, 70000, 1, 70000, 'added'),
(51, 2, 16, 50000, 1, 50000, 'added'),
(52, 1, 16, 30000, 1, 30000, 'added');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(10) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` int(10) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `order_id`, `product_id`, `txnid`, `invoice_no`, `qty`, `customer_email`, `order_date`, `order_status`, `payment_status`) VALUES
(6, '5', 16, 'ORDS38310429', '1335338867', '1', 'vaidip@gmail.com', '2021-04-24 16:55:35', 'c', 'cancel'),
(7, '5', 1, 'ORDS38310429', '1335338867', '1', 'vaidip@gmail.com', '2021-04-24 16:55:35', 'c', 'cancel'),
(8, '6', 15, 'ORDS52137291', '919382722', '1', '18bmiit126@gmail.com', '2021-04-26 10:21:53', 's', 'successful'),
(9, '10', 2, 'ORDS94896539', '1973229589', '1', '18bmiit118@gmail.com', '2021-04-29 08:30:05', 'o', 'successful'),
(10, '11', 15, 'ORDS28876475', '1565428190', '1', 'rakesh.savant@utu.ac.in', '2021-04-30 12:16:54', 'o', 'successful'),
(11, '12', 15, 'ORDS29607830', '611510704', '1', 'rakesh.savant@utu.ac.in', '2021-04-30 12:17:35', 'o', 'successful'),
(12, '13', 15, 'ORDS14363236', '471708259', '1', 'rakesh.savant@utu.ac.in', '2021-04-30 12:19:16', 'o', 'successful'),
(13, '14', 17, 'ORDS99853502', '1345294940', '1', 'asdf@gmail.com', '2021-04-30 13:02:54', 'o', 'successful'),
(14, '15', 1, 'ORDS69390284', '976381902', '1', 'asdf@gmail.com', '2021-04-30 13:09:26', 'o', 'successful'),
(15, '16', 22, 'ORDS35153684', '198374553', '1', 'asdf@gmail.com', '2021-04-30 13:21:16', 'o', 'successful'),
(16, '17', 15, 'ORDS28663665', '186759638', '1', '18bmiit118@gmail.com', '2021-04-30 13:47:19', 'o', 'successful'),
(17, '17', 1, 'ORDS28663665', '186759638', '1', '18bmiit118@gmail.com', '2021-04-30 13:47:19', 'o', 'successful'),
(18, '18', 17, 'ORDS46991400', '1296477709', '1', '18bmiit118@gmail.com', '2021-04-30 13:54:20', 'o', 'successful'),
(19, '19', 21, 'ORDS31729579', '222622990', '1', '18bmiit118@gmail.com', '2021-04-30 13:57:12', 'o', 'successful'),
(20, '20', 16, 'ORDS15448139', '343750817', '1', '18bmiit026@gmail.com', '2021-04-30 14:33:22', 'c', 'successful'),
(21, '21', 15, 'ORDS1445484', '1173497488', '3', 'vaidipmangukiya321@gmail.com', '2021-05-01 10:47:57', 'o', 'successful');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_pincode` varchar(100) NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_city`, `customer_pincode`, `customer_contact`, `customer_address`) VALUES
(5, 'vaidip', 'vaidip@gmail.com', 'surat', '395006', '9874563210', '321,rachana socity'),
(6, 'harsh', '18bmiit126@gmail.com', 'surat', '394101', '9876543210', '        903,liberty leving,motavarachha\r\n         '),
(10, 'mr.vaibhav', '18bmiit118@gmail.com', 'surat', '395005', '6879543210', '    1004,Rajhans swapan ,jakatanak\r\n              '),
(11, 'rakesh', 'rakesh.savant@utu.ac.in', 'Bardoli', '0', '9913730497', 'Bardoli'),
(12, 'rakesh', 'rakesh.savant@utu.ac.in', 'Bardoli', '0', '9913730497', 'Bardoli'),
(13, 'rakesh', 'rakesh.savant@utu.ac.in', 'Bardoli', '0', '9913730497', 'Bardoli'),
(14, 'asdf', 'asdf@gmail.com', 'surat', '395006', '9658743210', '3,asdfdf'),
(15, 'asdf', 'asdf@gmail.com', 'surat', '395006', '9658743210', '3,asdfdf'),
(16, 'asdf', 'asdf@gmail.com', 'surat', '395006', '9658743210', '3,asdfdf'),
(17, 'vaibhav', '18bmiit118@gmail.com', 'Surat', '395005', '6879543210', '802,Rajhans swapan ,jakatanak              '),
(18, 'vaibhav', '18bmiit118@gmail.com', 'Surat', '395005', '6879543210', '802,Rajhans swapan ,jakatanak              '),
(19, 'vaibhav', '18bmiit118@gmail.com', 'Surat', '395005', '6879543210', '802,Rajhans swapan ,jakatanak              '),
(20, 'vaidip', '18bmiit026@gmail.com', 'surat', '394101', '9874563333', '110, Akshardham soc-2, Motavarachha'),
(21, 'vaidip', 'vaidipmangukiya321@gmail.com', 'surat', '394101', '9874563334', '2 ,asdf - 2, masddsd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`email`, `password`) VALUES
('bussinesswithlh@gmail.com', 'L@ptop123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `CityName`) VALUES
(1, 'surat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `uid`, `review`) VALUES
(1, 3, 'This website is very fast'),
(2, 2, 'Trusted Web site for shopping'),
(3, 14, 'Very secure Web site');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(50) NOT NULL,
  `gallery_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_id`, `gallery_name`, `gallery_img`) VALUES
(25, 'as', '3.jpg'),
(26, 'as', '2.jpg'),
(27, 'qwer', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_cate_id` int(11) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_cate_id`, `product_image`, `brand_name`, `model_name`, `processor`, `ram`, `storage`, `color`, `price`, `size`, `description`) VALUES
(1, 2, 's-acer-aspire-3.jpg', 'acer', 'aspire-4', 'i3', '4-GB', '1-Tb', 'silver', 30000, '15-inch', '                  Processor: i3-3200U dual-core processor with Max Turbo upto 3.5Ghz\r\nMemory: 4GB of DDR4 system memory, Upgradable up to 16 GB\r\nStorage : 1 TB 2.5-inch 5400 RPM\r\nDisplay: 15.6\" HD 1366 x 768 resolution, high-brightness Acer ComfyView LEDbacklit TFT LCD                '),
(2, 2, 's-acer-aspire-5.jpg', 'Acer', 'aspire-5', 'i5', '8-GB', '512-Gb', 'White', 50000, '15-inch', '                  Processor : Intel Core i5 11th Generation\r\n8GB RAM upgradable up to 20 GB and 512GB SSD\r\nGraphics: Intel Iris Xe Graphics\r\nBIOS user, supervisor, HDD passwords, Kensington lock slot, Fingerprint                '),
(15, 2, 's-asus-vivobook-14.jpg', 'Asus', 'vivobook-14', 'i5', '8-GB', '1-Tb', 'Black', 53000, '13-inch', 'Processor: 10th Gen Intel Core i5-1035G1 Processor, 1.0 GHz (6MB Cache, up to 3.6 GHz, 4 Cores, 8 Threads)\r\nMemory & Storage: 8GB (2x 4GB) DDR4 3200MHz Dual Channel RAM, upgradeable up to 12GB using 1x SO-DIMM Slot with | Storage: 1TB SATA 5400RPM 2.5-inch HDD + empty 1x M.2 Slot for SSD storage expansion.'),
(16, 2, 's-asus-vivobook-15.jpg', 'Asus', 'Vivobook-15', 'Ryzen-5', '8-GB', '512-Gb', 'white', 70000, '15-inch', 'Processor: AMD Ryzen 5 4500U Processor, 2.3 GHz (8MB Cache, up to 4.0 GHz, 6 Cores, 6 Threads)\r\nMemory & Storage: 8GB (2x 4GB) DDR4 3200MHz Dual Channel RAM, upgradeable up to 12GB using 1x SO-DIMM Slot with | Storage: 512GB M.2 NVMe PCIe 3.0 SSD + empty 1x M.2 Slot for SSD Storage Expansion.\r\nGraphics: Integrated AMD Radeon RX Vega 6 Graphics\r\nDisplay: 15.6-inch (16:9) LED-backlit Full HD (1920x1080) 60Hz Anti-Glare Panel with 45% NTSC, 85% screen-to-body ratio'),
(17, 2, 's-dell-inspiron-5491.jpg', 'dell', 'inspiron-5', 'i7', '8-GB', '512-Gb', 'black', 45000, '13-inch', 'GHz Intel Core i7 - 8550 U processor\r\n8GB DDR4 RAM\r\n256GB hard drive\r\n13.3-inch screen, AMD Radeon 530 2GB Graphics\r\nWindows 10 Home operating system'),
(18, 2, 's-dell-vostro-3405.jpg', 'Dell', 'Vostro-34', 'Ryzen-5', '8-GB', '512-Gb', 'Gray', 45000, '14-inch', 'Processor: AMD Ryzen 5 3500U Mobile Processor with Radeon Vega 8 Graphics\r\nMemory & Storage:8GB RAM |512GB M.2 PCIe NVMe Solid State Drive\r\nDisplay:14.0-inch FHD (1920 x 1080) Anti-glare LED Backlight Narrow Border WVA Display\r\nGraphics: Integrated graphics with AMD APU AMD Radeon Vega 8 Graphics\r\nOperating System & Software: Windows 10 Home Single Language | Microsoft Office Home and Student 2019\r\nI/O ports: Two USB 3.2 Gen-1,One USB 2.0,One RJ45,One SD card slot ,One HDMI 1.4 port'),
(19, 2, 's-hp-14.jpg', 'Hp', 'Hp-14', 'Ryzen-5', '8-GB', '2-Tb', 'Gray', 60000, '14-inch', '2.1GHz AMD Ryzen 5 3500U processor\r\n8GB DDR4 RAM\r\n2TB 5400rpm hard drive\r\n14-inch screen, Radeon Vega 8 Graphics\r\nWindows 10 Home operating system; Microsoft Office 2019 - Home and Student Edition\r\n1.47kg laptop'),
(20, 2, 's-hp-chromebook-14a.jpg', 'Hp', 'Chromebook-14', 'i3', '4-GB', '512-Gb', 'white', 25000, '14-inch', 'PROCESSOR: Intel core i3 (1.1 GHz base frequency, up to 2.8 GHz burst frequency, 4 MB L2 cache, 2 cores)\r\nDISPLAY: Touchscreen 14-inch diagonal HD SVA micro-edge WLED-backlit (multitouch-enabled) edge-to-edge glass (1366 x 768)'),
(21, 2, 's-len-ideapad slim 3i.jpg', 'Lenovo', 'ideapad-slim-3i', 'i5', '8-GB', '1-Tb', 'White', 45000, '15-inch', 'Processor: 10th Gen Intel Core i5 (i5-1035G1) | Speed: 1.0 GHz (Base) - 3.6 GHz (Max) | 4 Cores | 6MB Cache\r\nOS: Pre-Loaded Windows 10 Home with Lifetime Validity\r\nMemory and Storage: 8GB RAM DDR4-2666 (4GB+4GB), Upgradable up to 12GB | 1TB HDD\r\nDisplay: 15.6\" Full HD (1920x1080) | Anti-Glare\r\nDesign: 1.99 cm Thin and 1.85 kg Light | Narrow Bezel | Battery Life: 5 Hours | Rapid Charge (Up to 80% in 1 Hour)'),
(22, 2, 's-len-yoga-6.jpg', 'Lenovo', 'yoga-6', 'Ryzen-7', '16-GB', '512-Gb', 'Silver', 79000, '13-inch', 'Processor: 4th Gen AMD Ryzen 7 4700U | Speed: 2.0 GHz (Base) - 4.1 GHz (Max) | 8 Cores | 4MB L2 & 8MB L3 Cache\r\nMemory and Storage: 16GB RAM DDR4-3200, not upgradable | 512 GB SSD\r\nGraphics: Integrated AMD Radeon Graphics\r\nDisplay: 13.3\" Full HD (1920x1080) | Brightness: 300 nits | IPS Technology | 72% NTSC'),
(23, 1, 's-len-yoga-6.jpg', 'xxxx', 'YOGA', 'i3', '8-gb', '1-TB', 'silver', 50000, '12-inch', '                                                      abc                                                ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `category_id` int(11) NOT NULL,
  `category_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`category_id`, `category_type`) VALUES
(1, 'Gaming'),
(2, 'Standard'),
(3, 'Proffesional');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(6) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `contact_no`, `email_id`, `password`, `address`, `city`, `state`, `pincode`, `status`) VALUES
(2, 'vaibhav', 6879543210, '18bmiit118@gmail.com', 'Aa!2345ty', '802,Rajhans swapan ,jakatanak              ', 'Surat', 'Gujarat', 395005, 0),
(3, 'vaidip', 9874563210, 'vaidip@gmail.com', 'Va@34567', '321,rachana socity', 'surat', 'gujarat', 395006, 0),
(4, 'pranav sutariya', 9054907300, 'pranavsutariya77762@gmail.com', 'Pa@34567', '160 , matrushakti soc.', 'surat', 'Gujarat', 394101, 0),
(13, 'qwert', 9874563210, 'qwe@gmail.com', 'Qa@34567', '21,wqrt', 'Surat', 'Gujarat', 394101, 0),
(14, 'rakesh', 9913730497, 'rakesh.savant@utu.ac.in', 'Ra@34567', 'Bardoli', 'Bardoli', 'Gujarat', 0, 0),
(15, 'asdf', 9658743210, 'asdf@gmail.com', 'Aa@34567', '3,asdfdf', 'surat', 'Gujarat', 395006, 0),
(16, 'vaidip', 9874563333, '18bmiit026@gmail.com', 'Va@34567', '110, Akshardham soc-2, Motavarachha', 'surat', 'gujarat', 394101, 1),
(18, 'vaidip', 9874563334, 'vaidipmangukiya321@gmail.com', 'Va@34567', '2 ,asdf - 2, masddsd', 'surat', 'gujarat', 394101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `product_id`, `quantity`) VALUES
(4, 1, 18),
(6, 2, 59),
(7, 15, 42),
(10, 17, 18),
(11, 18, 56),
(12, 19, 20),
(13, 20, 20),
(14, 21, 55),
(15, 22, 55),
(19, 16, 59);

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `list_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`list_id`, `product_id`, `user_id`, `status`) VALUES
(11, 2, 3, 'added'),
(12, 2, 16, 'added'),
(13, 15, 16, 'added'),
(14, 15, 18, 'added');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cate_id` (`product_cate_id`);

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD UNIQUE KEY `product_id_2` (`product_id`),
  ADD UNIQUE KEY `stock_id` (`stock_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_registration` (`user_id`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `tbl_feedback_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tbl_registration` (`user_id`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`product_cate_id`) REFERENCES `tbl_product_category` (`category_id`);

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`),
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_registration` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
