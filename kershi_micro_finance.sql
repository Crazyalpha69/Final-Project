-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 02:45 PM
-- Server version: 10.4.8-MariaDB
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
-- Database: `kershi_micro_finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `balance` int(20) NOT NULL,
  `history` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `mobile`, `address`, `image`, `balance`, `history`) VALUES
(16, 'Abel', 'Male', '0123456789', 'AA', '826193depositphotos_77154385-stock-photo-passport-picture-of-a-german.jpg', 510, '10 Birr Credited on 09/17/21<br>700 Birr Credited on 09/17/21<br>200 Birr Debited on 09/17/21<br>'),
(17, 'Teddy', 'Male', '0123456789', 'AA', '519351depositphotos_84158918-stock-photo-passport-picture-of-a-hispanic.jpg', 100, '100 Birr Credited on 09/17/21<br>'),
(18, 'Bini', 'Male', '0123456789', 'AA', '132947download.jpg', 50, '50 Birr Credited on 09/17/21<br>'),
(19, 'Nahi', 'Male', '0123456789', 'AA', '143769gettyimages-157506964-612x612.jpg', 5000, '5000 Birr Credited on 09/17/21<br>'),
(20, 'Addis', 'Male', '0123456789', 'AA', '126511istockphoto-502581380-612x612.jpg', 2000, '2000 Birr Credited on 09/17/21<br>'),
(21, 'Betty', 'Female', '0123456789', 'AA', '249743images.jpg', 5000, '5000 Birr Credited on 09/17/21<br>'),
(22, 'Lidia', 'Female', '0123456789', 'AA', '945240istockphoto-615279718-612x612.jpg', 50, '50 Birr Credited on 09/17/21<br>'),
(23, 'Rahel', 'Female', '0123456789', 'AA', '631299passport-photo-portrait-asian-smiling-woman-109538764.jpg', 10, '10 Birr Credited on 09/17/21<br>200000 Birr Credited on 09/17/21<br>200000 Birr Debited on 09/17/21<br>');

-- --------------------------------------------------------

--
-- Table structure for table `interest_rate`
--

CREATE TABLE `interest_rate` (
  `id` int(11) NOT NULL,
  `days` int(4) NOT NULL,
  `interest_rate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest_rate`
--

INSERT INTO `interest_rate` (`id`, `days`, `interest_rate`) VALUES
(1, 90, 15),
(2, 180, 16),
(3, 365, 18),
(4, 730, 20);

-- --------------------------------------------------------

--
-- Table structure for table `loan_application`
--

CREATE TABLE `loan_application` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `interest_rate` int(2) NOT NULL,
  `loan_amount` int(100) NOT NULL,
  `datee` date NOT NULL,
  `remaining` int(100) NOT NULL,
  `payed` int(100) NOT NULL,
  `history` longtext NOT NULL,
  `total_loan_amount` int(4) NOT NULL,
  `status` varchar(20) NOT NULL,
  `emi` int(4) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_application`
--

INSERT INTO `loan_application` (`id`, `c_id`, `interest_rate`, `loan_amount`, `datee`, `remaining`, `payed`, `history`, `total_loan_amount`, `status`, `emi`, `days`) VALUES
(13, 23, 18, 300000, '2021-09-17', 354000, 0, '354000 Birr loaned on 09/17/21 <br>', 354000, 'Verified', 29500, 365),
(14, 22, 16, 100000, '2021-09-17', 116000, 0, '116000 Birr loaned on 09/17/21 <br>', 116000, 'Verified', 19602, 180),
(15, 19, 18, 50000, '2021-09-17', 55000, 5000, '60000 Birr loaned on 09/17/21 <br>2500 Birr payed on 09/17/21<br>2500 Birr payed on 09/17/21<br>', 60000, 'Verified', 2500, 730);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `designation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `designation`) VALUES
(2, 'Dagi1', 'dagmawihm1@gmail.com', '123', '1'),
(3, 'Dagi2', 'dagmawihm2@gmail.com', '123', '2'),
(4, 'Dagi3', 'dagmawihm3@gmail.com', '123', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interest_rate`
--
ALTER TABLE `interest_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_application`
--
ALTER TABLE `loan_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `loan_application`
--
ALTER TABLE `loan_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
