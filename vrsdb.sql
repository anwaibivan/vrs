-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2021 at 07:57 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `lga_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `lga_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`lga_id`, `state_id`, `lga_name`, `status`) VALUES
(1, 1, 'New South Wales', 1),
(2, 3, 'Akwanga', 1),
(3, 3, 'Toto', 1),
(4, 3, 'Lafia', 1),
(5, 3, 'Awa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newreg`
--

CREATE TABLE `newreg` (
  `nregid` int(11) NOT NULL,
  `chasisNumber` varchar(256) NOT NULL,
  `vehicleUsage` varchar(256) NOT NULL,
  `vehicleColor` varchar(256) NOT NULL,
  `engineCapacity` varchar(256) NOT NULL,
  `regDate` datetime NOT NULL,
  `vehicleType` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleModel` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleCategory` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `Id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Firstname` varchar(250) NOT NULL,
  `Lastname` varchar(250) NOT NULL,
  `Othernames` varchar(250) NOT NULL,
  `Phone` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `State` varchar(250) NOT NULL,
  `Lga` varchar(250) NOT NULL,
  `Ward` varchar(250) NOT NULL,
  `Address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`Id`, `UserID`, `Title`, `Firstname`, `Lastname`, `Othernames`, `Phone`, `Email`, `State`, `Lga`, `Ward`, `Address`) VALUES
(2, 2, 'Mrs', 'Philip', 'Christopher', 'B.', '07035070654', 'chrisphilonline@gmail.com', '3', '2', '3', 'Gabon Lowcost No.6A Makaranta street, Barnawa.'),
(3, 5, 'Mr', 'Chris', 'Phil', 'Bako', '07087370946', 'c@gmail.com', '3', '2', '2', 'Nasarawa Street'),
(4, 5, '', '', '', '', '07087370946', '', '1', '', '', ''),
(5, 6, 'Mr', 'John', 'Smith', 'J', '0803311224455', 'Ch@gmail.com', '3', '2', '2', 'Nasarawa'),
(6, 7, 'Mr', 'Smith', 'Gold', 'G', '0803311224499', 'G@gmail.com', '3', '2', '2', 'Nasarawa'),
(7, 0, 'Mr', 'Chris', 'Smith', 'C', '07045654323', '', '3', '2', '2', 'Barnawa'),
(8, 8, 'Mr', 'Philip', 'Christopher', 'Cocu', '0803445565', 'chrisphilonline5@gmail.com', '1', '1', '1', 'Barnawa'),
(9, 10, 'Mr', 'Phil', 'Chris', 'Bako', '07035070654', 'philichris@gmail.com', '3', '2', '2', 'Gabon Lowcost No.6A Makaranta street, Barnawa.'),
(10, 4, 'Mr', 'Timothy', 'Luka', 'Bivan', '07035070653', 'anwaibivan@gmail.com', '3', '2', '3', 'No. 65B Zazzau road Akwanga LGA Barnawa Low-cost, Nassarawa.');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

CREATE TABLE `reguser` (
  `Id` int(11) NOT NULL,
  `userAcct` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `confirmuser` varchar(250) NOT NULL,
  `registerdate` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`Id`, `userAcct`, `password`, `confirmuser`, `registerdate`) VALUES
(1, 'chrisphilonline1@gmail.com', 'bcb759b5b8ab63b06295c7434345d7a5', 'vrsActiveUser', '09/12/2020'),
(2, 'chrisphilonline@gmail.com', 'ef22cbee172258880fd316cb2b0cd2ed', 'vrsActiveUser', '09/12/2020'),
(3, 'timothy@gmail.com', '3805248410673a8be6aa4807e61fb5ae', '9297', '09/12/2020'),
(4, '07035070653', '3805248410673a8be6aa4807e61fb5ae', 'vrsActiveUser', '09/12/2020'),
(5, '07087370946', '1626b0463edc2358a2f8869f57bf3ff7', 'vrsActiveUser', '10/12/2020'),
(6, '0803311224455', '1626b0463edc2358a2f8869f57bf3ff7', 'vrsActiveUser', '10/12/2020'),
(7, '0803311224499', 'fcea920f7412b5da7be0cf42b8c93759', 'vrsActiveUser', '10/12/2020'),
(8, 'chrisphilonline5@gmail.com', '1626b0463edc2358a2f8869f57bf3ff7', 'vrsActiveUser', '17/12/2020'),
(9, 'chrisphilonline20@gmail.com', '1626b0463edc2358a2f8869f57bf3ff7', '3151', '18/12/2020'),
(10, 'philichris@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'vrsActiveUser', '29/12/2020'),
(11, 'jane@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'vrsActiveUser', '14/01/2021');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `status`) VALUES
(1, 'Australia', 1),
(2, 'Switzaland', 1),
(3, 'Nassarawa', 1),
(4, 'Kaduna', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `id` int(11) NOT NULL,
  `VehicleCategory` varchar(200) NOT NULL,
  `CatDescription` text NOT NULL,
  `VehicleLicense` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `RoadWorthiness` varchar(100) NOT NULL,
  `MOT` varchar(100) NOT NULL,
  `E-wallet` varchar(50) NOT NULL,
  `numberplate` varchar(50) NOT NULL,
  `sticker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`id`, `VehicleCategory`, `CatDescription`, `VehicleLicense`, `RoadWorthiness`, `MOT`, `E-wallet`, `numberplate`, `sticker`) VALUES
(1, 'Private', 'Private Vehicle', '3125', '1500', '500', '1250', '15000', ''),
(2, 'Commercial', 'Commercial Vehicles', '8750', '1500', '500', '1250', '15000', '1500'),
(3, 'Insitutional', 'Insitutional Vehicles', '10500', '0', '', '', '', ''),
(4, 'Diplomatic', 'Diplomatic Vehicles', '15000', '0', '', '', '', ''),
(5, 'Ministry', 'Ministry Vehicles eg. Missionary vehicles', '21000', '0', '', '', '', ''),
(6, 'Others', 'Others vehicle category', '25000', '0', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vcolor`
--

CREATE TABLE `vcolor` (
  `Id` int(11) NOT NULL,
  `vehiclecolor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vcolor`
--

INSERT INTO `vcolor` (`Id`, `vehiclecolor`) VALUES
(1, 'White'),
(2, 'Black'),
(3, 'Red'),
(4, 'Blue'),
(5, 'Grey'),
(6, 'Brown'),
(7, 'Green'),
(8, 'Golden'),
(9, 'Yellow'),
(10, 'Violet');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclereg`
--

CREATE TABLE `vehiclereg` (
  `oregid` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RegType` varchar(100) NOT NULL,
  `numberPlate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `chasisNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleUsage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehiclColor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `engineCapacity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleModel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vehicleCategory` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `regDate` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vehiclereg`
--

INSERT INTO `vehiclereg` (`oregid`, `UserID`, `RegType`, `numberPlate`, `chasisNumber`, `vehicleUsage`, `vehiclColor`, `engineCapacity`, `vehicleType`, `vehicleModel`, `vehicleCategory`, `regDate`) VALUES
(1, 2, 'New Registration', '', 'HY637374HP7857388', 'Private', 'Blue', '5.0', 'Toyota', 'Corolla', 'Between 2.1-3.0cc', '31/12/2020');

-- --------------------------------------------------------

--
-- Table structure for table `vmodel`
--

CREATE TABLE `vmodel` (
  `id` int(11) NOT NULL,
  `ModelCode` varchar(5) NOT NULL,
  `ModalYear` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vmodel`
--

INSERT INTO `vmodel` (`id`, `ModelCode`, `ModalYear`) VALUES
(1, 'A', '1980'),
(2, 'B', '1981'),
(3, 'C', '1982'),
(4, 'D', '1983'),
(5, 'E', '1984'),
(6, 'F', '1985'),
(7, 'G', '1986'),
(8, 'H', '1987'),
(9, 'J', '1988'),
(10, 'K', '1989'),
(11, 'L', '1990'),
(12, 'M', '1991'),
(13, 'N', '1992'),
(14, 'P', '1993'),
(15, 'R', '1994'),
(16, 'S', '1995'),
(17, 'T', '1996'),
(18, 'V', '1997'),
(19, 'W', '1998'),
(20, 'X', '1999'),
(21, 'Y', '2000'),
(22, '1', '2001'),
(23, '2', '2002'),
(24, '3', '2003'),
(25, '4', '2004'),
(26, '5', '2005'),
(27, '6', '2006'),
(28, '7', '2007'),
(29, '8', '2008'),
(30, '9', '2009'),
(31, 'A', '2010'),
(32, 'B', '2011'),
(33, 'C', '2012'),
(34, 'D', '2013'),
(35, 'E', '2014'),
(36, 'F', '2015'),
(37, 'G', '2016'),
(38, 'H', '2017'),
(39, 'J', '2018'),
(40, 'K', '2019'),
(41, 'L', '2020'),
(42, 'M', '2021'),
(43, 'N', '2022'),
(44, 'P', '2023'),
(45, 'R', '2024'),
(46, 'S', '2025'),
(47, 'T', '2026'),
(48, 'V', '2027'),
(49, 'W', '2028'),
(50, 'X', '2029'),
(51, 'Y', '2030'),
(52, '1', '2031'),
(53, '2', '2032'),
(54, '3', '2033'),
(55, '4', '2034'),
(56, '5', '2035'),
(57, '6', '2036'),
(58, '7', '2037'),
(59, '8', '2038'),
(60, '9', '2039');

-- --------------------------------------------------------

--
-- Table structure for table `vreginfo`
--

CREATE TABLE `vreginfo` (
  `Id` int(11) NOT NULL,
  `VehicleUsage` varchar(100) NOT NULL,
  `VehicleCategory` varchar(100) NOT NULL,
  `EngineCapacity` varchar(100) NOT NULL,
  `NumberPlate` varchar(100) NOT NULL,
  `VehicleReg` varchar(100) NOT NULL,
  `VehicleLicense` varchar(100) NOT NULL,
  `RoadWorthiness` varchar(100) NOT NULL,
  `MOT` varchar(100) NOT NULL,
  `EWallet` varchar(100) NOT NULL,
  `LearnerPermit` varchar(100) NOT NULL,
  `RJacket` varchar(100) NOT NULL,
  `Sticker` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vreginfo`
--

INSERT INTO `vreginfo` (`Id`, `VehicleUsage`, `VehicleCategory`, `EngineCapacity`, `NumberPlate`, `VehicleReg`, `VehicleLicense`, `RoadWorthiness`, `MOT`, `EWallet`, `LearnerPermit`, `RJacket`, `Sticker`) VALUES
(1, 'Private', 'A', '3.00', '15000', '6250', '3125', '1500', '500', '1250', '0', '0', '0'),
(2, 'Private', 'B', '2.1 - 2.99', '15000', '6250', '2500', '1500', '500', '1250', '0', '0', '0'),
(3, 'Private', 'C', '1.7 - 2.00', '15000', '3125', '1875', '1500', '500', '1250', '0', '0', '0'),
(4, 'Private', 'D', '1.2 - 1.6', '15000', '3125', '1875', '1500', '500', '500', '0', '0', '0'),
(5, 'Commercial', 'A', 'Trailers', '15000', '6250', '8750', '1500', '500', '1250', '0', '0', '1500'),
(6, 'Commercial', 'B', 'Tanker & Truck', '15000', '6250', '6250', '1500', '500', '1250', '0', '0', '1500'),
(7, 'Commercial', 'C', 'Tippers & Lorry', '15000', '6250', '3750', '1500', '500', '1250', '0', '0', '1000'),
(8, 'Commercial', 'D', 'Canter, Buses & P/Ups', '15000', '6250', '3125', '750', '500', '1250', '0', '0', '1000'),
(9, 'Commercial', 'E', 'Taxi', '15000', '3125', '1250', '750', '500', '1250', '0', '0', '500'),
(10, 'Institutional', 'Institutional', '', '', '', '', '', '', '', '', '', ''),
(11, 'Diplomatic', 'Diplomatic', '', '', '', '', '', '', '', '', '', ''),
(12, 'Ministry', 'Ministry', '', '', '', '', '', '', '', '', '', ''),
(13, 'Motor Cycle & Tricycle', 'Motor Cycle', 'Motor Cycle', '3000', '1250', '625', '750', '0', '1250', '250', '750', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(11) NOT NULL,
  `lga_id` int(11) NOT NULL,
  `ward_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `lga_id`, `ward_name`, `status`) VALUES
(1, 1, 'Sydney', 1),
(2, 2, 'Akwanga Makaranta', 1),
(3, 2, 'Barnawa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`lga_id`);

--
-- Indexes for table `newreg`
--
ALTER TABLE `newreg`
  ADD PRIMARY KEY (`nregid`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `reguser`
--
ALTER TABLE `reguser`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcolor`
--
ALTER TABLE `vcolor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vehiclereg`
--
ALTER TABLE `vehiclereg`
  ADD PRIMARY KEY (`oregid`);

--
-- Indexes for table `vmodel`
--
ALTER TABLE `vmodel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vreginfo`
--
ALTER TABLE `vreginfo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `lga_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `newreg`
--
ALTER TABLE `newreg`
  MODIFY `nregid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reguser`
--
ALTER TABLE `reguser`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vcolor`
--
ALTER TABLE `vcolor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehiclereg`
--
ALTER TABLE `vehiclereg`
  MODIFY `oregid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vmodel`
--
ALTER TABLE `vmodel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `vreginfo`
--
ALTER TABLE `vreginfo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
