-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2021 at 12:15 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paper`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  `TYPE` varchar(32) NOT NULL DEFAULT 'Admin',
  `pin` int(11) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `TYPE`, `pin`, `create_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'General Manager', 2426, '2020-11-23'),
(15, 'wahid', 'ssprintersbd01@gmail.com', '374b7af42fad8787f2c720eb9c0d86d4e1b7a62d', 'Admin', 2426, '2020-12-08'),
(16, 'Jahid Imtiaj Mishu', 'imtiajjahid@gmail.com', 'e8f5189b8ab3b5e8c48339ecbfd50ba2d555f615', 'Grapics Designer', 1234, '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `cutting_details`
--

CREATE TABLE `cutting_details` (
  `cutting_id` int(11) NOT NULL,
  `cut_type` text NOT NULL,
  `cut_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cutting_details`
--

INSERT INTO `cutting_details` (`cutting_id`, `cut_type`, `cut_price`) VALUES
(1, 'Normal Cutting', '100'),
(2, 'Dy Cutting', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_details`
--

CREATE TABLE `delivery_details` (
  `delivery_id` int(11) NOT NULL,
  `delivery_type` text NOT NULL,
  `delivery_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_details`
--

INSERT INTO `delivery_details` (`delivery_id`, `delivery_type`, `delivery_price`) VALUES
(2, 'CNG', '1500'),
(3, 'Rickshaw', '200');

-- --------------------------------------------------------

--
-- Table structure for table `foil_details`
--

CREATE TABLE `foil_details` (
  `foid_id` int(11) NOT NULL,
  `foil_type` text NOT NULL,
  `foil_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foil_details`
--

INSERT INTO `foil_details` (`foid_id`, `foil_type`, `foil_price`) VALUES
(1, 'Ambosh', '1'),
(2, 'Block', '2'),
(3, 'Making', '3');

-- --------------------------------------------------------

--
-- Table structure for table `gsm`
--

CREATE TABLE `gsm` (
  `gsm_id` int(11) NOT NULL,
  `gsm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gsm`
--

INSERT INTO `gsm` (`gsm_id`, `gsm`) VALUES
(8, '55'),
(9, '61'),
(10, '70'),
(11, '80'),
(12, '100'),
(13, '120'),
(14, '150'),
(15, '170'),
(16, '200'),
(17, '220'),
(18, '250'),
(19, '300'),
(22, '350');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `address` mediumtext NOT NULL,
  `email` varchar(300) NOT NULL,
  `shop_name` mediumtext NOT NULL,
  `logo` mediumtext NOT NULL,
  `currency` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `phone`, `address`, `email`, `shop_name`, `logo`, `currency`) VALUES
(1, '+88 01788800019', '257, Fakirapool, Garam Panir Goli, Motijheel, Dhaka-1000', 'info@techdynobd.com', 'S S Printers', 'assets/images/6cb94c993b77d4db54b660afea9f9acc5cc8c2f2SSP LOGO-01.png', '$');

-- --------------------------------------------------------

--
-- Table structure for table `lamination_details`
--

CREATE TABLE `lamination_details` (
  `lamination_details_id` int(11) NOT NULL,
  `lam_type` text NOT NULL,
  `lam_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lamination_details`
--

INSERT INTO `lamination_details` (`lamination_details_id`, `lam_type`, `lam_price`) VALUES
(4, 'Uv Lamination - one side', '0.003'),
(5, 'Uv Lamination - Both side', '0.004');

-- --------------------------------------------------------

--
-- Table structure for table `making_details`
--

CREATE TABLE `making_details` (
  `making_id` int(11) NOT NULL,
  `making_type` text NOT NULL,
  `making_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `making_details`
--

INSERT INTO `making_details` (`making_id`, `making_type`, `making_price`) VALUES
(1, 'Bindding', '150');

-- --------------------------------------------------------

--
-- Table structure for table `new_data`
--

CREATE TABLE `new_data` (
  `new_data_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `unit` text DEFAULT NULL,
  `po_provider` text DEFAULT NULL,
  `po_number` text DEFAULT NULL,
  `bill_qty` text DEFAULT NULL,
  `goods_description` text DEFAULT NULL,
  `po_value` text DEFAULT NULL,
  `po_unit_price` text DEFAULT NULL,
  `po_costing` text DEFAULT NULL,
  `profit` text DEFAULT NULL,
  `challan_number` text DEFAULT NULL,
  `pi_number` text DEFAULT NULL,
  `received_lc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_data`
--

INSERT INTO `new_data` (`new_data_id`, `date`, `unit`, `po_provider`, `po_number`, `bill_qty`, `goods_description`, `po_value`, `po_unit_price`, `po_costing`, `profit`, `challan_number`, `pi_number`, `received_lc`) VALUES
(2, '2021-07-13', '100ty?', '3', '89076?', '1001', 'description?', '1009', '900', '86', '814814', 'yhbut??', '1234567890', '12345'),
(3, '2021-07-13', 'Pc', '3', '89076?', '100', 'test', '100', '90', '80', '1000', 'yhbut', '1234567890', '12345'),
(4, '2021-07-13', 'Pc', '3', '89076?', '100', 'test', '100', '90', '80', '1000', 'yhbut', '1234567890', '12345'),
(5, '2021-07-13', 'Pc', '3', '89076?', '100', 'test', '100', '90', '80', '1000', 'yhbut', '1234567890', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` text NOT NULL,
  `address` text NOT NULL,
  `prod_count` text NOT NULL,
  `profit` text NOT NULL,
  `discount` text NOT NULL,
  `total` text NOT NULL,
  `paid` text NOT NULL,
  `delivery_charge` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `number`, `address`, `prod_count`, `profit`, `discount`, `total`, `paid`, `delivery_charge`, `date`) VALUES
(10, 'Mehedi Hasan Sabuj', '01628606201', 'North Jatrabari Bibir Bagicha', '2', '114.75', '50.75', '1029', '1029', '200', '2020-11-28'),
(11, 'Mohammad', '01636558227', 'hjjasda', '1', '5032.5', '500', '56357.5', '52500', '1500', '2020-11-28'),
(12, 'Sanjid Ahmed', '+880 1911845963', 'Banani Jatio Party office Samnne', '1', '30', '30', '1600', '800', '1000', '2020-12-02'),
(13, 'Sanjid Ahmed', '+880 1911845963', 'Banani Jatio Party office Samnne', '1', '0', '0', '600', '800', '0', '2020-12-02'),
(14, 'Md . nashim', '01636558227', 'উত্তর বাড্ডা,আলিড় মোড়,পূর্বাঞ্চল,৬ নাম্বার লেন,আল-হেরা মসজিদের পাশে। 1212 Dhaka, Dhaka Division, Bangladesh', '1', '860.36585365854', '100', '4401.8292682927', '4000', '200', '2020-12-03'),
(15, 'nbmvmb', '01636558227', 'উত্তর বাড্ডা,আলিড় মোড়,পূর্বাঞ্চল,৬ নাম্বার লেন,আল-হেরা মসজিদের পাশে। 1212 Dhaka, Dhaka Division, Bangladesh', '1', '240', '40', '2800', '2500', '200', '2020-12-08'),
(16, 'Md . nashim', '01636558227', 'উত্তর বাড্ডা,আলিড় মোড়,পূর্বাঞ্চল,৬ নাম্বার লেন,আল-হেরা মসজিদের পাশে। 1212 Dhaka, Dhaka Division, Bangladesh', '1', '129.00806451613', '0', '3709.1693548387', '10000', '1000', '2020-12-08'),
(17, 'k', '45', '25, East Manik Nagar, Dhaka, 1203', '1', '0', '0', '1251980.4347826', '500', '0', '2020-12-08'),
(18, 'nbmvmb', '01701-474541', 'উত্তর বাড্ডা,আলিড় মোড়,পূর্বাঞ্চল,৬ নাম্বার লেন,আল-হেরা মসজিদের পাশে। 1212 Dhaka, Dhaka Division, Bangladesh', '1', '0', '0', '1909.5287356322', '10000', '0', '2020-12-08'),
(19, 'nbmvmb', '01788800019', 'উত্তর বাড্ডা,আলিড় মোড়,পূর্বাঞ্চল,৬ নাম্বার লেন,আল-হেরা মসজিদের পাশে। 1212 Dhaka, Dhaka Division, Bangladesh', '1', '897', '0', '4087', '1500', '200', '2020-12-08'),
(20, 'BEXIMCO LTD', '0130397905', 'GUlshan', '1', '240.625', '0', '1403.125', '00', '200', '2020-12-12'),
(21, 'BEXIMCO LTD', '0130397905', 'GUlshan', '1', '995.83333333333', '0', '5179.1666666667', '00', '200', '2020-12-12'),
(22, 'BEXIMCO LTD', '0130397905', 'GUlshan', '1', '1687.5', '0', '8637.5', '00', '200', '2020-12-12'),
(23, 'saifurs', '01613432058', 'faramgate', '1', '62130', '0', '374280', '00', '1500', '2020-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_title` text NOT NULL,
  `qty` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`details_id`, `order_id`, `prod_title`, `qty`, `price`) VALUES
(12, 10, 'Test 900 GSM ', '15', '12.075'),
(13, 10, 'test2 900 GSM ', '15', '46.575'),
(14, 11, 'Business Card 400 GSM ', '100', '553.575'),
(15, 12, 'Test 900 GSM ', '100', '6.3'),
(16, 13, 'Shuvo 700 GSM ', '100', '6'),
(17, 14, 'b card 300 GSM ', '10000', '0.43018292682927'),
(18, 15, 'Pad 100 GSM ', '1000', '2.64'),
(19, 16, 'D Card 300 GSM ', '5000', '0.54183387096774'),
(20, 17, 'V card 300 GSM ', '5000', '250.39608695652'),
(21, 18, 'v 350 GSM ', '1000', '1.9095287356322'),
(22, 19, 'money receipt 61 GSM ', '5000', '0.7774'),
(23, 20, 'sof 55 GSM ', '1000', '1.203125'),
(24, 21, 'envelop 80 GSM ', '2000', '2.4895833333333'),
(25, 22, 'big envelop 120 GSM ', '2000', '4.21875'),
(26, 23, 'poster 55 GSM ', '200000', '1.8639');

-- --------------------------------------------------------

--
-- Table structure for table `paper_price`
--

CREATE TABLE `paper_price` (
  `paper_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `qty` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_price`
--

INSERT INTO `paper_price` (`paper_id`, `name`, `qty`, `price`) VALUES
(3, 'offset paper', '100', '2500'),
(4, 'test2', '5000', '200'),
(5, 'Mehedi', '2', '200');

-- --------------------------------------------------------

--
-- Table structure for table `po_provider`
--

CREATE TABLE `po_provider` (
  `po_provider_id` int(11) NOT NULL,
  `provier_name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `po_provider`
--

INSERT INTO `po_provider` (`po_provider_id`, `provier_name`) VALUES
(3, 'Po Provider');

-- --------------------------------------------------------

--
-- Table structure for table `printing_details`
--

CREATE TABLE `printing_details` (
  `printing_details_id` int(11) NOT NULL,
  `color` text NOT NULL,
  `price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `printing_details`
--

INSERT INTO `printing_details` (`printing_details_id`, `color`, `price`) VALUES
(1, '1 Color', '300'),
(3, '2 color', '800'),
(4, '3 color', '3'),
(7, '4 color', '1600'),
(10, '5 color', '5'),
(11, '6 color', '6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cutting_details`
--
ALTER TABLE `cutting_details`
  ADD PRIMARY KEY (`cutting_id`);

--
-- Indexes for table `delivery_details`
--
ALTER TABLE `delivery_details`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `foil_details`
--
ALTER TABLE `foil_details`
  ADD PRIMARY KEY (`foid_id`);

--
-- Indexes for table `gsm`
--
ALTER TABLE `gsm`
  ADD PRIMARY KEY (`gsm_id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lamination_details`
--
ALTER TABLE `lamination_details`
  ADD PRIMARY KEY (`lamination_details_id`);

--
-- Indexes for table `making_details`
--
ALTER TABLE `making_details`
  ADD PRIMARY KEY (`making_id`);

--
-- Indexes for table `new_data`
--
ALTER TABLE `new_data`
  ADD PRIMARY KEY (`new_data_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`details_id`);

--
-- Indexes for table `paper_price`
--
ALTER TABLE `paper_price`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `po_provider`
--
ALTER TABLE `po_provider`
  ADD PRIMARY KEY (`po_provider_id`);

--
-- Indexes for table `printing_details`
--
ALTER TABLE `printing_details`
  ADD PRIMARY KEY (`printing_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cutting_details`
--
ALTER TABLE `cutting_details`
  MODIFY `cutting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_details`
--
ALTER TABLE `delivery_details`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foil_details`
--
ALTER TABLE `foil_details`
  MODIFY `foid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gsm`
--
ALTER TABLE `gsm`
  MODIFY `gsm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lamination_details`
--
ALTER TABLE `lamination_details`
  MODIFY `lamination_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `making_details`
--
ALTER TABLE `making_details`
  MODIFY `making_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_data`
--
ALTER TABLE `new_data`
  MODIFY `new_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `paper_price`
--
ALTER TABLE `paper_price`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `po_provider`
--
ALTER TABLE `po_provider`
  MODIFY `po_provider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `printing_details`
--
ALTER TABLE `printing_details`
  MODIFY `printing_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
