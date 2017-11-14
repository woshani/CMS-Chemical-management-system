-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 02:22 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

CREATE TABLE IF NOT EXISTS `chemical` (
  `chemicalid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `physicaltype` varchar(20) NOT NULL,
  `engcontrol` varchar(30) NOT NULL,
  `ppe` varchar(30) NOT NULL,
  `class` varchar(255) NOT NULL,
  `ghs` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemical`
--

INSERT INTO `chemical` (`chemicalid`, `name`, `type`, `physicaltype`, `engcontrol`, `ppe`, `class`, `ghs`) VALUES
(1, 'Ethanol 95% Denatured, Methanol (3% - 5%)', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(2, 'Aluminium Nitrate', 'Powder', 'Powder', 'No', 'No', '', ''),
(3, 'N,N - Dimethylformamide', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(4, 'Ethyl Methyl Ketone', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(5, 'Methyl isobutyl ketone', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(6, 'Ethylene Glycol', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(7, 'Methanol', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(8, 'Formaldehyde', 'Liquid', 'Liquid', 'Yes', 'Yes', '', ''),
(9, 'Montmorillonite', 'Powder', 'Powder', 'Yes', 'Yes', '', ''),
(10, 'Sodium Hydroxide', 'Powder', 'Powder', 'Yes', 'Yes', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `chemicalin`
--

CREATE TABLE IF NOT EXISTS `chemicalin` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chemicalin`
--

INSERT INTO `chemicalin` (`ciid`, `type`, `datein`, `expireddate`, `status`, `qrcode`, `sds`, `supliername`, `chemicalid`, `userid`, `labid`) VALUES
(1, 'Private', '2017-11-07', '2017-11-25', 'Available', '', '', '', 1, 3, 1),
(2, 'Public', '2017-11-07', '2017-11-29', 'Available', '', '', '', 2, 2, 1),
(3, 'Private', '2017-11-06', '2017-11-25', 'Available', '', '', '', 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chemicalusage`
--

CREATE TABLE IF NOT EXISTS `chemicalusage` (
  `cuid` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `ciid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `labid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `labowner` (
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

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `lname`, `email`, `telno`, `role`, `admin`, `identifyid`, `password`, `status`, `supervisorid`) VALUES
(1, 'Ummi', 'Humaira', 'ummi@student.utem.edu.my', '0163452441', 'Student', 'No', 'B031520006', 'e99a18c428cb38d5f260853678922e03', '', 5),
(2, 'Ahmad', 'Zulkarnaen', 'zulkarnaen@student.utem.edu.my', '0163452412', 'Student', 'No', 'B031520004', 'e99a18c428cb38d5f260853678922e03', '', 5),
(3, 'Muhammad', 'Ammar', 'ammarsdc@gmail.com', '0192303004', 'Student', 'No', 'B031520002', 'e99a18c428cb38d5f260853678922e03', '', 5),
(4, 'Muhamad', 'Syahiran', 'shay@gmail.com', '0177167223', 'Student', 'No', 'B031520027', 'e99a18c428cb38d5f260853678922e03', '', 5),
(5, 'Ahmad', 'Fakruddin', 'fakruddin@gmail.com', '0122392012', 'Lecturer', 'No', '00201', 'e99a18c428cb38d5f260853678922e03', '', 0),
(6, 'Ahmad', 'Zulfakar', 'zulfakar@gmail.com', '0132445232', 'PJ', 'No', '00202', 'e99a18c428cb38d5f260853678922e03', '', 0),
(7, 'Shay', 'Ran', '', '', 'Pending', 'No', 'D031310001', 'e99a18c428cb38d5f260853678922e03', '', 0),
(8, 'Abu', 'Gin', '', '', 'Pending', 'No', 'D031310002', 'e99a18c428cb38d5f260853678922e03', '', 0),
(9, 'Shay', 'Ran', '', '', 'Pending', 'No', 'XXX001', 'e99a18c428cb38d5f260853678922e03', '', 0),
(10, 'A', 'B', '', '', 'Pending', 'No', 'XXX002', 'e99a18c428cb38d5f260853678922e03', '', 0),
(11, 'B', 'B', '', '', 'Pending', 'No', 'XXX003', 'e99a18c428cb38d5f260853678922e03', '', 0),
(12, 'C', 'C', '', '', 'Pending', 'No', 'XXX004', 'e99a18c428cb38d5f260853678922e03', '', 0),
(13, 'Tah', 'Le', '', '', 'Pending', 'No', 'D031310003', 'e99a18c428cb38d5f260853678922e03', '', 0),
(14, 'Abu', 'Bakar', '', '', 'Pending', 'No', 'D031310006', 'e99a18c428cb38d5f260853678922e03', '', 0),
(15, 'Amakuso', 'Shiro', '', '', 'Student', 'No', 'B031520099', 'e99a18c428cb38d5f260853678922e03', '', 5),
(16, 'as', 'as', '', '', 'Rejected', 'No', 'As', 'e99a18c428cb38d5f260853678922e03', '', 5),
(99, 'Woshani', 'zarann', 'shay@email.com', '666', 'Lecturer', 'Yes', 'DARK99', 'e99a18c428cb38d5f260853678922e03', '', 0),
(100, 'ABU', 'ALI', 'zaran7682@gmail.com', '999', 'Student', 'No', 'B031520039', 'e99a18c428cb38d5f260853678922e03', '', 5);

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
  MODIFY `chemicalid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `chemicalin`
--
ALTER TABLE `chemicalin`
  MODIFY `ciid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `chemicalusage`
--
ALTER TABLE `chemicalusage`
  MODIFY `cuid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `labid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
