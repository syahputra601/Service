-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 09:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) DEFAULT NULL,
  `Phonenumber` varchar(50) DEFAULT NULL,
  `Username` varchar(50) NOT NULL DEFAULT '',
  `Emailaddress` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Role` int(11) NOT NULL,
  `acess_key` int(11) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Image` varchar(50) DEFAULT NULL,
  `Postcode` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `sub-distric` varchar(100) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `updated_by` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `First_Name`, `Last_Name`, `Phonenumber`, `Username`, `Emailaddress`, `Password`, `Role`, `acess_key`, `Address`, `Image`, `Postcode`, `province`, `district`, `sub-distric`, `pin`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Syahputra', 'pass : 1234567', '0801234567802', 'hrd', 'syahputra@gmail.com', '1234567', 1, 123321, '', '', '', '', '', '', NULL, '2020-03-13 19:24:56', NULL, '2020-03-14 09:24:56', 'Updated by -  (superadmin)'),
(2, 'Aji Firman', 'pass : 1234567', '0801234567801', 'admin', 'ajifirman@gmail.com', '1234567', 0, 123321, '919b7f832b4f3a30c629ebd4729d697e43beaa74', '', '', '', '', '', NULL, '2020-03-13 19:25:22', NULL, '2020-03-14 09:25:22', 'Updated by -  (superadmin)'),
(6, 'Aji', 'Firman', NULL, 'staff', '', '1234567', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-13 19:47:35', 'Created by - Administrator (admin)', '2020-03-14 09:47:35', 'Updated by -  (admin)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
