-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2017 at 05:54 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

CREATE TABLE `chemical` (
  `chemicalid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `physicaltype` varchar(20) NOT NULL,
  `engcontrol` varchar(30) NOT NULL,
  `ppe` varchar(30) NOT NULL,
  `class` varchar(255) NOT NULL,
  `ghs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`chemicalid`, `name`, `physicaltype`, `engcontrol`, `ppe`, `class`, `ghs`) VALUES
(1, 'Ethanol 95% Denatured, Methanol (3% - 5%)', 'Liquid', 'Yes', 'Yes', '3', 'Yes'),
(2, 'Aluminium Nitrate', 'Powder', 'No', 'No', '2', 'Yes'),
(3, 'N,N - Dimethylformamide', 'Liquid', 'Yes', 'Yes', 'N/A', 'No'),
(4, 'Ethyl Methyl Ketone', 'Liquid', 'Yes', 'Yes', 'N/A', 'Yes'),
(5, 'Methyl isobutyl ketone', 'Liquid', 'Yes', 'Yes', 'N/A', 'Yes'),
(6, 'Ethylene Glycol', 'Liquid', 'Yes', 'Yes', 'N/A', 'No'),
(7, 'Methanol', 'Liquid', 'Yes', 'Yes', 'N/A', 'Yes'),
(8, 'Formaldehyde', 'Liquid', 'Yes', 'Yes', '1', 'Yes'),
(9, 'Montmorillonite', 'Powder', 'Yes', 'Yes', '2', 'Yes'),
(10, 'Sodium Hydroxide', 'Powder', 'Yes', 'Yes', '1', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `chemicalin`
--

CREATE TABLE `chemicalin` (
  `ciid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `datein` date NOT NULL,
  `expireddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `sds` varchar(255) NOT NULL,
  `supliername` varchar(255) NOT NULL,
  `chemicalid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `labid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemicalin`
--

INSERT INTO `chemicalin` (`ciid`, `type`, `datein`, `expireddate`, `status`, `qrcode`, `sds`, `supliername`, `chemicalid`, `userid`, `labid`) VALUES
(1, 'Private', '2017-11-07', '2017-11-25', '0', '1111', '', '', 1, 3, 1),
(2, 'Public', '2017-11-07', '2017-11-29', '0', '1222', '', '', 2, 2, 1),
(3, 'Private', '2017-11-06', '2017-11-25', '0', '2222', '', '', 2, 5, 1),
(4, 'Private', '2017-11-15', '2017-12-09', '0', 'C0100000000001', 'Ethanol SDS.pdf', 'Sinar Chemical Sdn. Bhd.', 1, 5, 2),
(8, 'Public', '2017-11-15', '2017-11-27', '0', 'C0100000000000000000001', 'Ethanol SDS.pdf', 'Chemical Sdn. Bhd.', 5, 5, 1),
(9, 'Public', '2017-11-15', '2017-12-07', '0', 'C0100000000000000000003', 'Ethanol SDS.pdf', 'CHemc Sdn. Bhd.', 8, 5, 1),
(10, 'Public', '2017-11-15', '2017-11-30', '0', 'C0100000000000000000005', 'JADUAL DEG SEM 1...pdf', '', 4, 5, 1),
(11, 'Public', '2017-11-15', '2017-12-01', '0', 'C0100000000000000000006', 'Ethanol SDS.pdf', 'Chemical Sdn. Bhd.', 2, 5, 1),
(12, 'Public', '2017-11-15', '2017-12-02', '0', 'C0100000000000000000007', 'Ethanol SDS.pdf', '', 8, 5, 1),
(13, 'Public', '2017-11-15', '2017-11-30', '0', 'C0100000000000000000002', 'Ethanol SDS.pdf', 'Chemical Sdn. Bhd.', 6, 5, 2),
(14, 'Public', '2017-11-15', '2017-11-22', '0', 'C0100000000000000000004', 'Ethanol SDS.pdf', '', 8, 5, 1),
(15, 'Public', '2017-11-15', '2017-11-30', '0', 'C0100000000000000000008', 'Ethanol SDS.pdf', '', 2, 5, 2),
(16, 'Public', '2017-11-15', '2018-03-22', '0', 'C0100000000000000000004', 'Ethanol SDS.pdf', '', 1, 5, 1),
(17, 'Private', '2017-11-18', '2017-12-09', '0', 'C0100000000000000000001', 'Ethanol SDS.pdf', 'wertyujk', 6, 5, 2),
(18, 'Public', '2017-11-18', '2017-12-06', '0', 'C0100000000000000000001', 'Lab2_HTML.pdf', 'qawerdfctvtgbhynuj', 9, 5, 2),
(19, 'Private', '2017-11-18', '2017-12-06', '0', 'C0100000000000000000001', 'Ethanol SDS.pdf', 'fgj', 4, 5, 2),
(20, 'Private', '2017-11-18', '2017-12-07', '0', 'C0000011110000', 'exia repair full.pdf', 'qwertyuiop', 7, 5, 2),
(21, 'Private', '2017-12-03', '2018-04-07', 'Available', 'chemical101', 'Ethanol SDS.pdf', 'Chemical  Si Sdn. Bhd', 8, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chemicalusage`
--

CREATE TABLE `chemicalusage` (
  `cuid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `ciid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemicalusage`
--

INSERT INTO `chemicalusage` (`cuid`, `startdate`, `enddate`, `status`, `userid`, `ciid`) VALUES
(1, '2017-11-15', '0000-00-00', 'Pending', 0, 1),
(2, '2017-11-15', '0000-00-00', 'Pending', 0, 1),
(3, '2017-11-15', '0000-00-00', 'Pending', 0, 1),
(4, '2017-11-15', '0000-00-00', 'Pending', 0, 3),
(5, '2017-11-15', '0000-00-00', 'Pending', 0, 1),
(6, '2017-11-15', '0000-00-00', 'Pending', 4, 3),
(7, '2017-11-15', '0000-00-00', 'Pending', 0, 1),
(8, '2017-11-15', '0000-00-00', 'Pending', 4, 0),
(9, '2017-11-15', '0000-00-00', 'Pending', 5, 6),
(10, '2017-11-15', '0000-00-00', 'Pending', 5, 9),
(11, '2017-11-15', '0000-00-00', 'Approve', 5, 11),
(12, '2017-11-15', '0000-00-00', 'Pending', 5, 9),
(13, '2017-11-15', '0000-00-00', 'Pending', 3, 10),
(14, '2017-11-15', '0000-00-00', 'Pending', 3, 13),
(15, '2017-11-15', '0000-00-00', 'Pending', 3, 14),
(16, '2017-11-15', '0000-00-00', 'Pending', 3, 15),
(17, '2017-11-15', '0000-00-00', 'Pending', 3, 16),
(18, '2017-12-03', '2017-12-04', 'Available', 4, 21),
(19, '2017-12-04', '0000-00-00', 'Pending', 0, 21),
(20, '2017-12-04', '0000-00-00', 'Pending', 0, 21);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `labid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labid`, `name`) VALUES
(1, 'Lab Bahan 1'),
(2, 'Lab Bahan 2');

-- --------------------------------------------------------

--
-- Table structure for table `labowner`
--

CREATE TABLE `labowner` (
  `labid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labowner`
--

INSERT INTO `labowner` (`labid`, `staffid`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telno` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `identifyid` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `supervisorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `lname`, `email`, `telno`, `role`, `admin`, `identifyid`, `password`, `status`, `supervisorid`) VALUES
(1, 'Ummi Humaira', 'Mohd Shahli', 'b031520006@student.utem.edu.my', '0163452441', 'Student', 'No', 'B031520006', 'e99a18c428cb38d5f260853678922e03', 'Approve', 5),
(2, 'Ahmad Zulkarnaen', 'Tamby Suleiman', 'b031520004@student.utem.edu.my', '0163452412', 'Student', 'No', 'B031520004', 'e99a18c428cb38d5f260853678922e03', 'Approve', 5),
(3, 'Muhammad Ammar', 'Muhammad Sani', 'ammarsdc@gmail.com', '0192303004', 'Student', 'No', 'B031520002', 'e99a18c428cb38d5f260853678922e03', 'Approve', 5),
(4, 'Muhamad Syahiran', 'Mohd Shahrin', 'zarann.sz@gmail.com', '0177167223', 'Student', 'No', 'B031520027', 'e99a18c428cb38d5f260853678922e03', 'Approve', 5),
(5, 'Ahmad Fakruddin', 'Mohd Ismail', 'zarann.sz@gmail.com', '0122392012', 'Lecturer', 'No', '00201', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0),
(6, 'Ahmad Zulfakar', 'Abu Bakar', 'zulfakar@gmail.com', '0132445232', 'PJ', 'No', '00202', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0),
(7, 'Abdul Idris', 'Abdul Samad', 'idris@gmail.com', '0139971446', 'OSHA', 'No', '00203', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0),
(8, 'Mohd Amri', 'Sulaiman', 'amri@gmail.com', '012343224', 'HOD', 'No', '00204', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0),
(9, 'Nurul Wirdah', 'Mafazi', 'nurulwirdah@gmail.com', '0174672622', 'Lecturer', 'No', '00205', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0),
(10, 'Mohd Najib', 'Ali Mokhtar', 'najibali@gmail.com', '0111898392', 'Lecturer', 'No', '00205', 'e99a18c428cb38d5f260853678922e03', 'Approve', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chemical`
--
ALTER TABLE `chemical`
  ADD PRIMARY KEY (`chemicalid`);

--
-- Indexes for table `chemicalin`
--
ALTER TABLE `chemicalin`
  ADD PRIMARY KEY (`ciid`);

--
-- Indexes for table `chemicalusage`
--
ALTER TABLE `chemicalusage`
  ADD PRIMARY KEY (`cuid`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`labid`);

--
-- Indexes for table `labowner`
--
ALTER TABLE `labowner`
  ADD PRIMARY KEY (`labid`,`staffid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chemical`
--
ALTER TABLE `chemical`
  MODIFY `chemicalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `chemicalin`
--
ALTER TABLE `chemicalin`
  MODIFY `ciid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `chemicalusage`
--
ALTER TABLE `chemicalusage`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `labid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
