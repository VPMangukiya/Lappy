-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 08:12 AM
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
-- Database: `laptop_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `price`, `quantity`, `total`, `status`) VALUES
(24, 16, 3, 70000, 1, 70000, 'added'),
(27, 15, 3, 53000, 3, 159000, 'added'),
(29, 2, 3, 50000, 1, 50000, 'added');

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
('bussinesswithlh@gmail.com', 'LaptopHouse2021');

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
(22, 'acer', 's-acer-aspire-5.jpg'),
(23, 'qwer', 's-asus-vivobook-14.jpg'),
(24, 'yoga', 's-len-yoga-6.jpg');

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
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `contact_no`, `email_id`, `password`, `address`, `city`, `state`, `pincode`) VALUES
(1, 'harsh', 9876543210, '18bmiit126@gmail.com', '987', '        903,liberty leving,motavarachha\r\n         ', 'surat', 'Gujarat', 394101),
(2, 'mr.vaibhav', 6879543210, '18bmiit118@gmail.com', '6538dfgmnugt', '    1004,Rajhans swapan ,jakatanak\r\n              ', 'surat', 'Gujarat', 395005),
(3, 'vaidip', 9874563210, 'vaidip@gmail.com', '963', '321,rachana socity', 'surat', 'gujarat', 395006),
(4, 'pranav sutariya', 9054907300, 'pranavsutariya77762@gmail.com', '987', '160 , matrushakti soc.', 'surat', 'Gujarat', 394101),
(13, 'qwert', 9874563210, 'qwe@gmail.com', '654', '21,wqrt', 'Surat', 'Gujarat', 394101),
(14, 'rakesh', 9913730497, 'rakesh.savant@utu.ac.in', '654', 'Bardoli', 'Bardoli', 'Gujarat', 0);

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
(4, 1, 20),
(6, 2, 60),
(7, 15, 50),
(10, 17, 20),
(11, 18, 56),
(12, 19, 20),
(13, 20, 20),
(14, 21, 56),
(15, 22, 56),
(19, 16, 60);

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
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
