-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2020 at 04:59 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kwasu_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admit_pet`
--

CREATE TABLE `admit_pet` (
  `admit_petid` int(11) NOT NULL,
  `admit_name` varchar(500) NOT NULL,
  `admit_age` int(3) NOT NULL,
  `admit_con` varchar(15) NOT NULL,
  `admit_bg` varchar(3) NOT NULL,
  `admit_rn` varchar(10) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `admit_date` date NOT NULL,
  `pet_des` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admit_pet`
--

INSERT INTO `admit_pet` (`admit_petid`, `admit_name`, `admit_age`, `admit_con`, `admit_bg`, `admit_rn`, `pet_id`, `admit_date`, `pet_des`) VALUES
(3, 'ADERINOLA ADEWALE', 23, '+234 0901456509', 'A+', '6', 1, '2020-06-01', 'Corona Virus'),
(5, 'aishat bakare', 29, '+234 0905758893', 'AB+', '5', 4, '2020-07-28', 'malaria');

-- --------------------------------------------------------

--
-- Table structure for table `basic_admin`
--

CREATE TABLE `basic_admin` (
  `basad_id` int(11) NOT NULL,
  `basad_name` varchar(250) NOT NULL,
  `basad_username` varchar(250) NOT NULL,
  `basad_password` varchar(250) NOT NULL,
  `basad_email` varchar(250) NOT NULL,
  `createdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basic_admin`
--

INSERT INTO `basic_admin` (`basad_id`, `basad_name`, `basad_username`, `basad_password`, `basad_email`, `createdate`) VALUES
(3, 'ADERINOLA SAMUEL', 'okazaki', 'd8ae5776067290c4712fa454006c8ec6', 'samueladerinola82@gmail.com', '2020-04-09 10:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `hospi_room`
--

CREATE TABLE `hospi_room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_avilabl` varchar(20) DEFAULT NULL,
  `rc_time_mo` varchar(10) NOT NULL DEFAULT '11.30 AM',
  `rc_time_ev` varchar(10) DEFAULT '06.30 PM',
  `room_drid` int(11) DEFAULT NULL,
  `eroom_drid` int(11) DEFAULT NULL,
  `room_petID` varchar(11) DEFAULT 'No Patient'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hospi_room`
--

INSERT INTO `hospi_room` (`room_id`, `room_name`, `room_avilabl`, `rc_time_mo`, `rc_time_ev`, `room_drid`, `eroom_drid`, `room_petID`) VALUES
(1, 'Room No: 1', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(2, 'Room No: 2', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(3, 'Room No: 3', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(4, 'Room No: 4', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(5, 'Room No: 5', 'NAV', '11.30 AM', '06.30 PM', NULL, NULL, '4'),
(6, 'Room No: 6', 'NAV', '11.30 AM', '06.30 PM', NULL, NULL, '1'),
(7, 'Room No: 7', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(8, 'Room No: 8', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(9, 'Room No: 9', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient'),
(10, 'Room No: 10', 'AV', '11.30 AM', '06.30 PM', NULL, NULL, 'No Patient');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pet_id` int(11) NOT NULL,
  `pat_reg_id` varchar(1000) NOT NULL,
  `pet_reg_date` datetime DEFAULT current_timestamp(),
  `pet_fn` varchar(100) DEFAULT NULL,
  `pet_sn` varchar(100) DEFAULT NULL,
  `pet_addr` varchar(500) DEFAULT NULL,
  `pet_ac` varchar(4) DEFAULT '+234',
  `pet_con` varchar(11) DEFAULT NULL,
  `pet_em` varchar(1000) DEFAULT NULL,
  `pet_gen` varchar(10) DEFAULT NULL,
  `pet_bd` date DEFAULT NULL,
  `pet_age` int(3) DEFAULT NULL,
  `pet_bg` varchar(3) DEFAULT NULL,
  `Insert_admunname` varchar(100) DEFAULT NULL,
  `Update_sadmunname` varchar(100) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pet_id`, `pat_reg_id`, `pet_reg_date`, `pet_fn`, `pet_sn`, `pet_addr`, `pet_ac`, `pet_con`, `pet_em`, `pet_gen`, `pet_bd`, `pet_age`, `pet_bg`, `Insert_admunname`, `Update_sadmunname`, `update_date`) VALUES
(1, '9128', '2020-06-02 16:39:34', 'ADERINOLA', 'ADEWALE', 'CBN Estate garki, abuja', '+234', '09014565090', 'adewalebob15@gmail.com', 'Male', '2019-07-17', 0, 'A+', '<br />\r\n<b>Notice</b>:  Undefined index: sadmun in <b>C:xampphtdocsclinicspatin.php</b> on line <b>1', NULL, NULL),
(2, '1626', '2020-07-28 13:53:03', 'Olumide', 'Damilare', 'gambari, Ilorin', '+234', '08198665442', 'olumide@gmail.com', 'Male', '1980-01-28', 40, 'A+', '<br />\r\n<b>Notice</b>:  Undefined index: sadmun in <b>C:xampphtdocsclinicspatin.php</b> on line <b>1', NULL, NULL),
(3, '15797', '2020-07-28 13:55:53', 'aliyu', 'ishola', 'bamigboye street, ilorin', '+234', '08156552632', 'aliyuishola@gmail.com', 'Male', '1990-01-28', 30, 'B+', '<br />\r\n<b>Notice</b>:  Undefined index: sadmun in <b>C:xampphtdocsclinicspatin.php</b> on line <b>1', NULL, NULL),
(4, '30137', '2020-07-28 13:57:41', 'aishat', 'bakare', 'fate, ilorin', '+234', '09057588938', 'aishatbakare@gmail.com', 'Female', '1991-07-16', 29, 'AB+', '<br />\r\n<b>Notice</b>:  Undefined index: sadmun in <b>C:xampphtdocsclinicspatin.php</b> on line <b>1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pat_appointment`
--

CREATE TABLE `pat_appointment` (
  `rep_id` int(50) NOT NULL,
  `pat_id` int(50) NOT NULL,
  `report_date` date NOT NULL DEFAULT current_timestamp(),
  `report_by` varchar(250) NOT NULL,
  `report_stmt` varchar(10000) NOT NULL,
  `prescription` varchar(1000) NOT NULL,
  `update_by` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pat_appointment`
--

INSERT INTO `pat_appointment` (`rep_id`, `pat_id`, `report_date`, `report_by`, `report_stmt`, `prescription`, `update_by`) VALUES
(1, 9128, '2020-06-02', 'Dr. ADERINOLA MAYOWA', 'wqwqwq', 'segseg', 'Dr. ADERINOLA MAYOWA'),
(2, 30137, '2020-07-28', 'Dr. ADERINOLA MAYOWA', 'suffering from indigestion through the damage of the citosis and anaemophilic tyrosilysis\r\n\r\n\r\n\r\n\r\n', 'pentax, paracetamol, Jawacil, Adomet', ''),
(4, 30137, '2020-07-28', 'Dr. ADERINOLA MAYOWA', 'shdsjsjssdhgh', 'ssdsk;alska;;asdad', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `staff_fname` varchar(250) NOT NULL,
  `staff_lname` varchar(250) NOT NULL,
  `smtype` varchar(250) NOT NULL,
  `smbd` date NOT NULL,
  `telcode` varchar(4) NOT NULL DEFAULT '+234',
  `smtel` varchar(250) NOT NULL,
  `smemail` varchar(250) NOT NULL,
  `smgender` varchar(20) NOT NULL,
  `smwoti` varchar(250) NOT NULL,
  `smaddr` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `insert_by` varchar(20) NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_by` varchar(20) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staff_fname`, `staff_lname`, `smtype`, `smbd`, `telcode`, `smtel`, `smemail`, `smgender`, `smwoti`, `smaddr`, `password`, `insert_by`, `insert_date`, `update_by`, `update_date`) VALUES
(1, 'ADERINOLA', 'MAYOWA', 'Doctor', '1997-09-30', '+234', '07011201920', 'segun.aderinola16@gmail.com', 'Male', 'Full', 'flat 1, gambari, Ilorin', 'c8400628587a094c1e2e979b652d9047', 'segun554', '2020-04-08 11:50:17', 'yusuf.aliy', '2020-04-09 07:50:48'),
(2, 'Ogunbiyi', 'Clement', 'Doctor', '2000-10-01', '+234', '90799858579', 'clement@gmail.com', 'Male', 'Full', 'lagos state', '', 'segun554', '2020-04-13 07:45:35', '', '2020-04-13 07:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `sup_admin`
--

CREATE TABLE `sup_admin` (
  `sadid` int(11) NOT NULL,
  `sadusername` varchar(250) NOT NULL,
  `sadpassword` varchar(250) NOT NULL,
  `sademail` varchar(250) NOT NULL,
  `sadname` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_admin`
--

INSERT INTO `sup_admin` (`sadid`, `sadusername`, `sadpassword`, `sademail`, `sadname`, `status`, `createdate`) VALUES
(1, 'segun554', 'c8400628587a094c1e2e979b652d9047', 'aderinolasegun9@gmail.com', 'Aderinola Segun James', 'doctor', '2020-04-08 11:24:22'),
(3, 'yusuf.aliy', '395441e9d51a53e0d6595e92ff40a22b', 'yusufaliy@gmail.com', 'Yusuf Aliy Abdul', 'doctor', '2020-04-09 09:35:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admit_pet`
--
ALTER TABLE `admit_pet`
  ADD PRIMARY KEY (`admit_petid`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `basic_admin`
--
ALTER TABLE `basic_admin`
  ADD PRIMARY KEY (`basad_id`);

--
-- Indexes for table `hospi_room`
--
ALTER TABLE `hospi_room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_drid` (`room_drid`),
  ADD KEY `eroom_id` (`eroom_drid`),
  ADD KEY `room_petID` (`room_petID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `pat_appointment`
--
ALTER TABLE `pat_appointment`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `sup_admin`
--
ALTER TABLE `sup_admin`
  ADD PRIMARY KEY (`sadid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admit_pet`
--
ALTER TABLE `admit_pet`
  MODIFY `admit_petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `basic_admin`
--
ALTER TABLE `basic_admin`
  MODIFY `basad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospi_room`
--
ALTER TABLE `hospi_room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pat_appointment`
--
ALTER TABLE `pat_appointment`
  MODIFY `rep_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sup_admin`
--
ALTER TABLE `sup_admin`
  MODIFY `sadid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
