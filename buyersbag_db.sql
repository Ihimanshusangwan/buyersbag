-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.epizy.com
-- Generation Time: May 24, 2023 at 05:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33900057_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `pcat`
--

CREATE TABLE `pcat` (
  `catid` int(11) NOT NULL,
  `catname` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `catimgadd` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pcat`
--

INSERT INTO `pcat` (`catid`, `catname`, `catimgadd`) VALUES
(1, 'Biscuits', '../media/cimg/1.PNG'),
(2, 'Vegitables', '../media/cimg/2.PNG'),
(3, 'Daily Bevrages', '../media/cimg/3.PNG'),
(4, 'Cleaning and Household', '../media/cimg/4.PNG'),
(5, 'Beauty and Hygiene', '../media/cimg/5.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `pinfo`
--

CREATE TABLE `pinfo` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `brand` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `volume` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `mrp` decimal(11,2) NOT NULL,
  `sellingprice` decimal(11,2) NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `ratings` decimal(10,1) NOT NULL,
  `img1` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `img2` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `img3` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `img4` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `img5` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `pinfo`
--

INSERT INTO `pinfo` (`id`, `productname`, `brand`, `description`, `volume`, `mrp`, `sellingprice`, `category`, `ratings`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(1, 'UNIBIC Centre Filled-Choco Kiss Cookies', 'UNIBIC', 'UNIBIC Centre Filled-Choco Kiss Cookies, 250 g', '250g', '160.00', '75.00', 'Biscuits', '4.8', '../media/pimg/1a.PNG', '../media/pimg/1b.PNG', '', '', ''),
(2, 'Tpasties Biscuits - Cashew Nut', 'Tasties', 'Tasties Biscuits - Cashew Nut, 200 g', '200 g', '88.00', '77.00', 'Biscuits', '4.6', '../media/pimg/2a.PNG', '../media/pimg/2b.PNG', '../media/pimg/2c.PNG', '', ''),
(3, 'Cadbury Mini Oreo Biscuit - Delicious & Crunchy', 'Cadbury', 'Cadbury Mini Oreo Biscuit - Delicious & Crunchy, Chocolate, 61.3 g Bottle', '61.3 g', '205.00', '199.00', 'Biscuits', '4.3', '../media/pimg/3a.PNG', '../media/pimg/3b.PNG', '../media/pimg/3c.PNG', '', ''),
(5, 'Dely Toaster Belgian Waffles - Classic', 'Dely', 'Dely Toaster Belgian Waffles - Classic, Frozen, No Added Preservatives, 6 pcs 30 g', '30g', '279.00', '181.00', 'Biscuits', '3.6', '../media/pimg/5a.PNG', '../media/pimg/5b.PNG', '', '', ''),
(6, 'Britannia NutriChoice 5 Grain Digestive ', 'Britannia', 'Britannia NutriChoice 5 Grain Digestive Multigrain Biscuits - High Fibre, With Honey, Healthy Snack, 200 g', '200 g', '75.00', '63.00', 'Biscuits', '4.9', '../media/pimg/6a.PNG', '../media/pimg/6b.PNG', '', '', ''),
(7, 'UNIBIC Choco Nut Cookies', 'UNIBIC', 'UNIBIC Choco Nut Cookies, 500 g', '500 g', '182.00', '180.00', 'Biscuits', '4.4', '../media/pimg/7a.PNG', '../media/pimg/7b.PNG', '../media/pimg/7c.PNG', '', ''),
(8, 'Beetroot - Organically Grown (Loose)', 'Fresho', 'Fresho Beetroot - Organically Grown (Loose), 500 g', '500g', '54.00', '40.00', 'Vegitables', '4.3', '../media/pimg/8a.PNG', '../media/pimg/8b.PNG', '', '', ''),
(9, 'Lemon - Organically Grown (Loose)', 'Fresho', 'Fresho Lemon - Organically Grown (Loose), 4 pcs', '4 pc', '34.00', '25.00', 'Vegitables', '4.0', '../media/pimg/9a.PNG', '../media/pimg/9b.PNG', '../media/pimg/9c.PNG', '', ''),
(10, 'Bitter Gourd - Organically Grown (Loose)', 'Fresho', 'Fresho Bitter Gourd - Organically Grown (Loose), 250 g', '250 g', '23.00', '17.00', 'Vegitables', '4.8', '../media/pimg/10a.PNG', '../media/pimg/10b.PNG', '../media/pimg/10c.PNG', '', ''),
(11, 'Garlic - Organically Grown (Loose)', 'Fresho', 'Fresho Garlic - Organically Grown (Loose), 100 g', '100g', '18.00', '14.00', 'Vegitables', '4.3', '../media/pimg/11a.PNG', '../media/pimg/11b.PNG', '../media/pimg/11c.PNG', '', ''),
(12, 'Mint - Organically Grown', 'Fresho', 'Fresho Mint - Organically Grown, 100 g', '100g', '12.00', '6.00', 'Vegitables', '3.6', '../media/pimg/12a.PNG', '../media/pimg/12b.PNG', '../media/pimg/12c.PNG', '', ''),
(13, 'Onion - Organically Grown (Loose)', 'Fresho', 'Fresho Onion - Organically Grown (Loose), 1 kg', '1Kg', '61.00', '47.00', 'Vegitables', '4.5', '../media/pimg/13a.PNG', '../media/pimg/13b.PNG', '', '', ''),
(14, 'Chocolate Health Drink', 'Bournvita', 'Bournvita Chocolate Health Drink - Bournvita, 1 Kg Jar', '1Kg', '422.00', '420.00', 'Daily Bevrages', '5.0', '../media/pimg/14a.PNG', '../media/pimg/14b.PNG', '../media/pimg/14c.PNG', '', ''),
(15, 'Horlicks Women Plus - Chocolate', 'Women', 'Horlicks Women Plus - Chocolate, 400 g Jar', '1Kg', '345.00', '325.00', 'Daily Bevrages', '3.9', '../media/pimg/15a.PNG', '../media/pimg/15b.PNG', '', '', ''),
(16, 'Cadbury Powder Mix - Hot Chocolate Drink', 'Cadbury', 'Cadbury Powder Mix - Hot Chocolate Drink, 200 g', '200g', '180.00', '145.00', 'Daily Bevrages', '4.4', '../media/pimg/16a.PNG', '', '', '', ''),
(17, 'Colin Glass & Surface Cleaner Liquid Spray', 'Colin', 'Colin Glass & Surface Cleaner Liquid Spray, Regular, 500 ml Bottle', '500ml', '96.00', '91.00', 'Cleaning and Household', '3.8', '../media/pimg/17a.PNG', '../media/pimg/17b.PNG', '../media/pimg/17c.PNG', '', ''),
(18, 'Cinthol Original Deodorant & Complexion Soap', 'Cinthol', 'Cinthol Original Deodorant & Complexion Soap, 100 g Carton', '100g', '100.00', '44.00', 'Beauty and Hygiene', '4.3', '../media/pimg/18a.PNG', '../media/pimg/18b.PNG', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `username` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`username`, `password`) VALUES
('Himanshu', 'himu123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pcat`
--
ALTER TABLE `pcat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `pinfo`
--
ALTER TABLE `pinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pcat`
--
ALTER TABLE `pcat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pinfo`
--
ALTER TABLE `pinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
