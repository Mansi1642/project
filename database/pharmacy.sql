-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2022 at 05:08 AM
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
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_credentials`
--

DROP TABLE IF EXISTS `admin_credentials`;
CREATE TABLE IF NOT EXISTS `admin_credentials` (
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `PHARMACY_NAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `CONTACT_NUMBER` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_credentials`
--

INSERT INTO `admin_credentials` (`USERNAME`, `PASSWORD`, `PHARMACY_NAME`, `ADDRESS`, `EMAIL`, `CONTACT_NUMBER`) VALUES
('admin', 'admin123', 'MEDI CARE', 'Ring Road, Surat, Gujarat', 'medicare@gmail.com', '8965741236');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

DROP TABLE IF EXISTS `demand`;
CREATE TABLE IF NOT EXISTS `demand` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mo_number` varchar(20) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `mo_number` (`mo_number`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`id`, `username`, `email`, `mo_number`, `quantity`, `product_name`, `company_name`) VALUES
(32, 'Jayesh', 'jayesh12@gmail.com', '7896563214', 4, 'Vitcofol Injection', '');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `INVOICE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INVOICE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CUSTOMER_ID` int(11) DEFAULT NULL,
  `CUSTOMER_NAME` varchar(100) NOT NULL,
  `TOTAL_AMOUNT` double NOT NULL,
  PRIMARY KEY (`INVOICE_ID`),
  KEY `TOTAL_AMOUNT` (`TOTAL_AMOUNT`),
  KEY `CUSTOMER_NAME` (`CUSTOMER_NAME`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`INVOICE_ID`, `INVOICE_DATE`, `CUSTOMER_ID`, `CUSTOMER_NAME`, `TOTAL_AMOUNT`) VALUES
(25, '2022-04-03 04:11:28', 6, 'Darshan', 15),
(24, '2022-04-03 04:04:02', 6, 'Darshan', 95),
(23, '2022-03-28 13:10:30', 9, 'Jayesh ', 650),
(22, '2022-03-28 13:07:12', 7, 'Payal ', 640),
(21, '2022-03-28 13:02:52', 5, 'Nidhi', 265),
(26, '2022-04-04 03:56:55', 10, 'prachi', 15),
(27, '2022-04-04 03:57:35', 10, 'prachi', 95),
(28, '2022-04-04 03:58:50', 10, 'prachi', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(100) DEFAULT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL,
  `units` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_code` (`product_code`),
  KEY `order_number` (`order_number`),
  KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `username`, `email`) VALUES
(84, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient.', 15, 1, 15, '2022-04-04 03:57:35', 'prachi', 'm@gmail.com'),
(85, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient.', 15, 2, 30, '2022-04-04 03:58:50', 'prachi', 'm@gmail.com'),
(81, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient.', 15, 2, 30, '2022-04-03 04:11:28', 'Darshan', 'darshan@gmail.com'),
(82, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient.', 15, 2, 30, '2022-04-04 03:56:54', 'prachi', 'm@gmail.com'),
(83, NULL, '02', 'Himalaya Koflet syrup', 'The mucolytic and expectorant properties reduce the viscosity of bronchial secretions.', 80, 3, 240, '2022-04-04 03:57:35', 'prachi', 'm@gmail.com'),
(72, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient. It belongs to the analgesic/antipyretic (pain relief and fever control) class of medicines. It relieves pain in form of headache, joint pain, body ache, flu-like symptoms, toothache, menstrual pain, backache, etc.', 15, 2, 30, '2022-03-28 13:02:51', 'Nidhi', 'n@gmail.com'),
(73, NULL, '04', 'Benadryl Syrup', 'Benadryl Syrup is used in the treatment of cough. It relieves allergy symptoms such as runny nose, stuffy nose, sneezing, watery eyes, and congestion or stuffiness. It also thins mucus in the nose, windpipe, and lungs, making it easier to cough out.', 150, 1, 150, '2022-03-28 13:02:52', 'Nidhi', 'n@gmail.com'),
(74, NULL, '07', 'New Otiflox Ear Drops', 'Otiflox Ear Drop is used to treat ear infections. It works by killing microorganisms that cause infection. It blocks the release of certain chemical messengers that cause redness, swelling, and itching. It also works by blocking pain signals to the brain to decrease the pain sensation.', 100, 1, 100, '2022-03-28 13:02:52', 'Nidhi', 'n@gmail.com'),
(79, NULL, '01', 'Metacin', 'Metacin 500mg tablets contain paracetamol as an active ingredient.', 15, 1, 15, '2022-04-03 04:04:02', 'Darshan', 'darshan@gmail.com'),
(80, NULL, '02', 'Himalaya Koflet syrup', 'The mucolytic and expectorant properties reduce the viscosity of bronchial secretions.', 80, 1, 80, '2022-04-03 04:04:02', 'Darshan', 'darshan@gmail.com'),
(78, NULL, '05', 'Tata 1mg 3 Ply Surgical Mask  ', 'Tata 1mg 3 Ply Surgical Face with Meltblown filter and Nose pin, Pack of 50 comprises 3 layers, in which one layer is the melt blown filter, and the other two layers are the PP non-woven fabric filter. These disposable 3-Ply Surgical Face Masks come with soft elastic ear loops and are comfortable to wear for long hours with easy breathability.', 500, 1, 500, '2022-03-28 13:10:30', 'Jayesh ', 'jayesh12@gmail.com'),
(76, NULL, '06', 'Betadine 2% Gargle Mint', 'Betadine 2% Gargle Mint is an antiseptic and disinfectant agent that is used as a mouthwash to kill germs that cause infections of the mouth. It also relieves dryness of the mouth and sore throat.', 140, 2, 280, '2022-03-28 13:07:12', 'Payal ', 'payal123@gmail.com'),
(77, NULL, '04', 'Benadryl Syrup', 'Benadryl Syrup is used in the treatment of cough. It relieves allergy symptoms such as runny nose, stuffy nose, sneezing, watery eyes, and congestion or stuffiness. It also thins mucus in the nose, windpipe, and lungs, making it easier to cough out.', 150, 2, 300, '2022-03-28 13:10:30', 'Jayesh ', 'jayesh12@gmail.com'),
(75, NULL, '05', 'Tata 1mg 3 Ply Surgical Mask  ', 'Tata 1mg 3 Ply Surgical Face with Meltblown filter and Nose pin, Pack of 50 comprises 3 layers, in which one layer is the melt blown filter, and the other two layers are the PP non-woven fabric filter. These disposable 3-Ply Surgical Face Masks come with soft elastic ear loops and are comfortable to wear for long hours with easy breathability.', 500, 3, 1500, '2022-03-28 13:07:12', 'Payal ', 'payal123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `packing` varchar(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `packing`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, '01', 'Metacin', '15 Tblets', 'Metacin Tablet 15\'s belongs to the group of mild analgesics (pain killer), and antipyretic (fever-reducing agent) used to treat mild to moderate pain including headache, migraine, toothache, menstrual period pain, osteoarthritis pain, musculoskeletal pain, and reducing fever.', 'meta.jpg', 10, '15.00'),
(2, '02', 'Himalaya Koflet syrup', '100 ml', 'The mucolytic and expectorant properties reduce the viscosity of bronchial secretions.', 'hima1.jpg', 19, '80.00'),
(3, '03', 'Ascoril LS Syrup', '100ml', 'Ascoril LS Syrup is a combination medicine used in the treatment of cough with mucus.', 'Ascoril.jpg', 15, '100.00'),
(4, '04', 'Benadryl Syrup', '150ml', 'Benadryl Syrup is used in the treatment of cough. ', 'Benadry.jpg', 5, '150.00'),
(5, '05', 'Tata 1mg 3 Ply Surgical Mask  ', '50', 'Tata 1mg 3 Ply Surgical Face with Meltblown filter and Nose pin, Pack of 50 comprises 3 layers.', 's-mask.jpg', 89, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_number` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `contact_number`, `address`, `city`, `pin`, `email`, `password`, `type`) VALUES
(5, 'Nidhi', 'Patel', '7896153496', 'Bhesthan', 'Surat', 456321, 'n@gmail.com', 'nidhi', 'user'),
(6, 'Darshan', 'Salve', '9712448067', 'Gurgaon', 'Delhi', 789635, 'darshan@gmail.com', 'darsh123', 'user'),
(7, 'Payal ', 'Chaudhari', '8964123576', 'Ring road', 'Ahmedabad', 456321, 'payal123@gmail.com', 'payal', 'user'),
(8, 'Vaishanavi P.', 'Shah', '9875632456', 'Sachin', 'Surat', 789645, 'vaishanavi@gmail.com', 'vaishanavi', 'user'),
(9, 'Jayesh ', 'Singh', '7896563214', 'Asharam Road', 'Gandhinagar', 456378, 'jayesh12@gmail.com', 'jayesh', 'user'),
(10, 'prachi', 'Patel', '9408522321', '88,89 NARAYAN NAGAR, OPP. SHREE RAM MARBLE', 'ALTHAN ROAD, SURAt', 345679, 'm@gmail.com', '123', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
