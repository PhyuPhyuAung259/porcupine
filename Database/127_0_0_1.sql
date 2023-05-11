-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 05:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--
CREATE DATABASE IF NOT EXISTS `furniture` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `furniture`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` varchar(20) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date-of-Birth` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `Address`, `PhoneNo`, `Email`, `Date-of-Birth`, `Username`, `Password`) VALUES
('C_00001', 'aa', 'qwe', '09-666817062', 'a@gmail.com', '1.12.2000', 'a', '12345678a'),
('C_00002', 'b', 'b', '09-666817062', 'b@gmail.com', '25.9.2000', 'b', '12345678b'),
('C_00003', 'c', 'qwe', '09-666817062', 'c@gmail.com', '25.15.2000', 'c', '12345678c'),
('C_00004', 'ppa', 'sdfs', '09-666817062', 'phyu@gmail.com', '25.9.2000', 'phyu', '12345678p'),
('C_00005', 'ppa', 'qwe', '09-666817062', 'aye@gmail.com', '1.12.2000', 'dd', '321dddddddd'),
('C_00006', 'www', 'qwe', '09-666817062', 'q@gmail.com', '25-9-2000', 'q', '12345678q'),
('C_00007', 'e', 'e', '09-666817062', 'e@gmail.com', '25-9-2000', 'eee', '12345678e'),
('C_00008', 'r', 'r', '09-666817062', 'r@gmail.com', '1.12.2000', 'rr', '12345678r'),
('C_00009', 't', 't', '09-666817062', 't@gmail.com', '11.11.2011', 'tt', '12345678t');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryagent`
--

CREATE TABLE `deliveryagent` (
  `AgentID` varchar(50) DEFAULT NULL,
  `AgentName` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryagent`
--

INSERT INTO `deliveryagent` (`AgentID`, `AgentName`, `Address`, `Phone`, `Email`) VALUES
('A_00001', 'wq', 'sdf', '09-666817062', 'phyuphyuaung25920@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `furnitureID` varchar(50) NOT NULL,
  `furnitureName` varchar(100) NOT NULL,
  `furnitureTypeID` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`furnitureID`, `furnitureName`, `furnitureTypeID`, `price`, `size`, `quantity`, `description`, `image`) VALUES
('F_00001', 'bed', 'FT_00001', '1000', 'small', '102', 'a', 'upload/bedroom1.jpg'),
('F_00002', 'bed1', 'FT_00001', '1500', 'large', '101', 'b', 'upload/pr1.png'),
('F_00003', 'living ', 'FT_00002', '500', 'small', '93', 'c', 'upload/livingroom2.jpg'),
('F_00004', 'living1', 'FT_00002', '550', 'large', '100', 'd', 'upload/livingroom3.jpg'),
('F_00005', 'k', 'FT_00003', '400', 'small', '101', 'e', 'upload/kitchenroom1.jpg'),
('F_00006', 'd1', 'FT_00004', '1000', 'large', '99', 'f', 'upload/diningroom1.jpg'),
('F_00007', 'ww', 'FT_00005', '1000', 'large', '95', 'g', 'upload/wardrobe.jpg'),
('F_00008', 'furn', 'FT_00006', '1000', 'small', '100', 'h', 'upload/studytable.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `furnituretype`
--

CREATE TABLE `furnituretype` (
  `FurnitureTypeID` varchar(20) DEFAULT NULL,
  `TypeName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `furnituretype`
--

INSERT INTO `furnituretype` (`FurnitureTypeID`, `TypeName`) VALUES
('FT_00001', 'Bedroom'),
('FT_00002', 'Living room'),
('FT_00003', 'Kitchen'),
('FT_00004', 'Dining room'),
('FT_00005', 'Wardrobe'),
('FT_00006', 'Office Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `furnitureID` varchar(50) NOT NULL,
  `furnitureName` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`furnitureID`, `furnitureName`, `size`, `price`, `quantity`, `amount`) VALUES
('F_00008', 'furn', 'small', '1000', '1', '1000'),
('F_00007', 'ww', 'large', '1000', '7', '7000');

-- --------------------------------------------------------

--
-- Table structure for table `orderfurniture`
--

CREATE TABLE `orderfurniture` (
  `customerName` varchar(50) NOT NULL,
  `creditCardNo` varchar(50) NOT NULL,
  `expireDate` varchar(50) NOT NULL,
  `CBCNo` varchar(50) NOT NULL,
  `deliveryAddress` varchar(50) NOT NULL,
  `totalAmount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderfurniture`
--

INSERT INTO `orderfurniture` (`customerName`, `creditCardNo`, `expireDate`, `CBCNo`, `deliveryAddress`, `totalAmount`) VALUES
('b', 'b', 'b', 'b', 'b\r\n                        ', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` varchar(50) NOT NULL,
  `supplierName` varchar(50) NOT NULL,
  `purchaseDate` varchar(100) NOT NULL,
  `TotalAmount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `supplierName`, `purchaseDate`, `TotalAmount`) VALUES
('P_00001', 'S_00002', '08/13/2020 ', '100'),
('P_00002', 'S_00001', '08/13/2020 ', '6000'),
('P_00003', 'S_00001', '08/21/2020 ', '1300'),
('P_00004', 'S_00001', '08/22/2020 ', '156'),
('P_00005', 'S_00001', '08/22/2020 ', '28'),
('P_00006', 'S_00001', '08/22/2020 ', '2000'),
('P_00007', 'S_00001', '08/22/2020 ', '2000'),
('P_00008', 'S_00002', '08/22/2020 ', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetail`
--

CREATE TABLE `purchasedetail` (
  `purchaseID` varchar(50) NOT NULL,
  `furnitureID` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasedetail`
--

INSERT INTO `purchasedetail` (`purchaseID`, `furnitureID`, `quantity`, `amount`) VALUES
('P_00001', 'F_00001', '1', '100'),
('P_00002', 'F_00002', '6', '6000'),
('P_00003', 'F_00003', '7', '700'),
('P_00003', 'F_00007', '6', '600'),
('P_00004', 'F_00003', '6', '36'),
('P_00004', 'F_00003', '12', '144'),
('P_00004', 'F_00005', '1', '12'),
('P_00005', 'F_00001', '4', '28'),
('P_00006', 'F_00007', '1', '1000'),
('P_00006', 'F_00008', '1', '1000'),
('P_00007', 'F_00001', '1', '1000'),
('P_00007', 'F_00002', '1', '1000'),
('P_00008', 'F_00005', '1', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(50) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `email`, `username`, `password`) VALUES
('S_1', 'Phyu Phyu Aung', 'phyu@gmail.com', 'phyu', '123456'),
('S_2', 'aye aye', 'aye@gmail.com', 'aye', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `SupplierID` varchar(50) NOT NULL,
  `SupplierName` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`SupplierID`, `SupplierName`, `Address`, `PhoneNo`, `Email`) VALUES
('S_00001', 'asssf', 'sdfs', '09-666817062', 'overwisemmkpc@gmail.com'),
('S_00002', 'aaaa', 'axxz', '09-123456789', 'aaa@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
