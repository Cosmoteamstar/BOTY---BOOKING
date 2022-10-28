-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2022 at 01:37 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `idAdmin` int(11) NOT NULL,
  `fName` varchar(150) NOT NULL,
  `lName` varchar(150) NOT NULL,
  `eMail` text NOT NULL,
  `pw` varchar(100) NOT NULL,
  `phoneNumber` varchar(30) NOT NULL,
  `permission` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`idAdmin`, `fName`, `lName`, `eMail`, `pw`, `phoneNumber`, `permission`) VALUES
(1, 'Alex', 'zander', 'admin@a.com', '1234', '025647896', 'superadmin'),
(2, 'Menmen', 'Slandaer', 'x@x', '1234', '04215612', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `idBook` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `peopleCount` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'N',
  `BookingDate` date NOT NULL,
  `checkinDate` datetime NOT NULL,
  `slipPath` text NOT NULL,
  `special` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`idBook`, `idUser`, `idAdmin`, `idRoom`, `peopleCount`, `status`, `BookingDate`, `checkinDate`, `slipPath`, `special`) VALUES
(34, 4, 1, 7, 5, 'Y', '2022-10-24', '2022-10-25 02:42:00', 'assets/slip481937e65788295d1e6b88307c12a9a9.jpg', 'dwq'),
(35, 4, 1, 9, 2, 'N', '2022-10-26', '2022-10-27 10:27:00', '', '211221'),
(36, 4, 1, 7, 2, 'Y', '2022-10-26', '2022-10-27 00:27:00', '', '123');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idfood` int(11) NOT NULL,
  `namefood` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idfood`, `namefood`, `details`, `quantity`, `price`, `pic1`, `pic2`, `pic3`) VALUES
(1, 'Khai YuyeeD', 'asdasd', 8, 80, 'assets/menuamericanfired.jpg', 'assets/menukhawpadkrung.jpg', 'assets/menuyuuyee.jpg'),
(2, 'Khawpad Tomyum', 'so yummy', 15, 60, 'assets/img/tomyumfried.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderfood`
--

CREATE TABLE `orderfood` (
  `idorder` int(11) NOT NULL,
  `idfood` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `sumprice` int(11) NOT NULL,
  `request` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderfood`
--

INSERT INTO `orderfood` (`idorder`, `idfood`, `idUser`, `amount`, `sumprice`, `request`, `status`) VALUES
(2, 2, 4, 1, 0, 'asd', 'O'),
(3, 1, 4, 2, 0, 'asd', 'D'),
(4, 1, 4, 1, 0, 'asd', 'S'),
(5, 1, 4, 1, 0, 'asd', 'S'),
(13, 1, 4, 2, 160, '123', 'S'),
(14, 2, 4, 12, 720, '', 'N'),
(15, 1, 4, 2, 160, '', 'N'),
(16, 1, 4, 1, 80, '', 'Y'),
(17, 1, 4, 2, 160, '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `idguest` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `idcard` int(11) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `idRoom` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `roomName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `details` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`idRoom`, `idType`, `roomName`, `price`, `details`, `quantity`, `pic1`, `pic2`, `pic3`) VALUES
(7, 8, 'Rosese', 300, 'คู่รักนักพักผ่อน', 15, 'assets/slipRedSquare.jpg', 'assets/slipVertigo.jpg', 'assets/slipVana.jpg'),
(8, 8, 'Dirtx', 500, 'ข้างนอก บรรยากาศดี', 10, 'assets/img/Novotel.jpg', 'assets/img/Novotel.jpg', 'assets/img/Novotel.jpg'),
(9, 9, 'Delux honymoon', 800, 'คู่รักพักที่หรู', 14, 'assets/img/Vertigsso.jpg', 'assets/img/Vertigsso.jpg\r\n', 'assets/img/Vertigsso.jpg'),
(10, 10, 'SVIP', 400, 'VEVEVE AI PEE', 10, 'assets/img/vip.jpg', 'assets/img/vip.jpg', 'assets/img/vip.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `idType` int(11) NOT NULL,
  `detail` text NOT NULL,
  `typeName` varchar(100) NOT NULL,
  `tpic1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`idType`, `detail`, `typeName`, `tpic1`) VALUES
(8, 'ศูนย์รวมเตียงเดี่ยว', 'OneBed', 'assets/img/Vertigo.jpg'),
(9, 'ศูนย์รวมเตียงคู่', 'Twobed', 'assets/img/Nava.jpg'),
(10, 'ห้อง VIP VIP', 'VIP', 'assets/img/RedSquare.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `eMail` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `idcard` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUser`, `fName`, `lName`, `phoneNumber`, `address`, `eMail`, `password`, `idcard`) VALUES
(4, 'Thanphat', 'Komut', '0621974921', 'Codovarail Thailand E-SAN BOY 55', 'a@a', '1234', 12345678),
(5, 'wdasd', 'asdas', '12312', 'wqwe', 'w@e', '1234', 123123),
(6, 'wdasd', 'asdas', '12312', 'wqwe', 'w@eE', '1234', 123123),
(7, 'asd', 'asd', '123', '123', '5@5', '1234', 12312312);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`idBook`),
  ADD KEY `idUser` (`idUser`,`idAdmin`,`idRoom`),
  ADD KEY `idAdmin` (`idAdmin`),
  ADD KEY `idTable` (`idRoom`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idfood`);

--
-- Indexes for table `orderfood`
--
ALTER TABLE `orderfood`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idfood` (`idfood`),
  ADD KEY `iduser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`idguest`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`idRoom`),
  ADD KEY `idType` (`idType`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`idType`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `idBook` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idfood` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderfood`
--
ALTER TABLE `orderfood`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `idguest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `idRoom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `admins` (`idAdmin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`idRoom`) REFERENCES `rooms` (`idRoom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderfood`
--
ALTER TABLE `orderfood`
  ADD CONSTRAINT `orderfood_ibfk_1` FOREIGN KEY (`idfood`) REFERENCES `menu` (`idfood`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderfood_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`idType`) REFERENCES `types` (`idType`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
