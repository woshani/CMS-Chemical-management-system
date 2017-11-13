CREATE DATABASE  IF NOT EXISTS `cms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cms`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cms
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chemical`
--

DROP TABLE IF EXISTS `chemical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chemical` (
  `chemicalid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `physicaltype` varchar(20) NOT NULL,
  `engcontrol` varchar(30) NOT NULL,
  `ppe` varchar(30) NOT NULL,
  PRIMARY KEY (`chemicalid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chemical`
--

LOCK TABLES `chemical` WRITE;
/*!40000 ALTER TABLE `chemical` DISABLE KEYS */;
INSERT INTO `chemical` VALUES (1,'Ethanol 95% Denatured, Methanol (3% - 5%)','Liquid','Liquid','Yes','Yes'),(2,'Aluminium Nitrate','Powder','Powder','No','No'),(3,'N,N - Dimethylformamide','Liquid','Liquid','Yes','Yes'),(4,'Ethyl Methyl Ketone','Liquid','Liquid','Yes','Yes'),(5,'Methyl isobutyl ketone','Liquid','Liquid','Yes','Yes'),(6,'Ethylene Glycol','Liquid','Liquid','Yes','Yes'),(7,'Methanol','Liquid','Liquid','Yes','Yes'),(8,'Formaldehyde','Liquid','Liquid','Yes','Yes'),(9,'Montmorillonite','Powder','Powder','Yes','Yes'),(10,'Sodium Hydroxide','Powder','Powder','Yes','Yes');
/*!40000 ALTER TABLE `chemical` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chemicalin`
--

DROP TABLE IF EXISTS `chemicalin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chemicalin` (
  `ciid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `datein` date NOT NULL,
  `expireddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `chemicalid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `labid` int(11) NOT NULL,
  PRIMARY KEY (`ciid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chemicalin`
--

LOCK TABLES `chemicalin` WRITE;
/*!40000 ALTER TABLE `chemicalin` DISABLE KEYS */;
INSERT INTO `chemicalin` VALUES (1,'Private','2017-11-07','2017-11-25','Available',1,3,1),(2,'Public','2017-11-07','2017-11-29','Available',2,2,1),(3,'Private','2017-11-06','2017-11-25','Available',2,4,1);
/*!40000 ALTER TABLE `chemicalin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chemicalusage`
--

DROP TABLE IF EXISTS `chemicalusage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chemicalusage` (
  `cuid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `ciid` int(11) NOT NULL,
  PRIMARY KEY (`cuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chemicalusage`
--

LOCK TABLES `chemicalusage` WRITE;
/*!40000 ALTER TABLE `chemicalusage` DISABLE KEYS */;
/*!40000 ALTER TABLE `chemicalusage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab` (
  `labid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`labid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab`
--

LOCK TABLES `lab` WRITE;
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
INSERT INTO `lab` VALUES (1,'Lab Bahan 1'),(2,'Lab Bahan 2');
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `labowner`
--

DROP TABLE IF EXISTS `labowner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `labowner` (
  `labid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  PRIMARY KEY (`labid`,`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `labowner`
--

LOCK TABLES `labowner` WRITE;
/*!40000 ALTER TABLE `labowner` DISABLE KEYS */;
INSERT INTO `labowner` VALUES (1,6);
/*!40000 ALTER TABLE `labowner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telno` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `identifyid` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `supervisorid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Ummi','Humaira','ummi@student.utem.edu.my','0163452441','Student','No','B031520006','e99a18c428cb38d5f260853678922e03',5),(2,'Ahmad','Zulkarnaen','zulkarnaen@student.utem.edu.my','0163452412','Student','No','B031520004','e99a18c428cb38d5f260853678922e03',5),(3,'Muhammad','Ammar','ammarsdc@gmail.com','0192303004','Student','No','B031520002','e99a18c428cb38d5f260853678922e03',5),(4,'Muhamad','Syahiran','shay@gmail.com','0177167223','Student','No','B031520027','e99a18c428cb38d5f260853678922e03',5),(5,'Ahmad','Fakruddin','fakruddin@gmail.com','0122392012','Lecturer','No','00201','e99a18c428cb38d5f260853678922e03',0),(6,'Ahmad','Zulfakar','zulfakar@gmail.com','0132445232','PJ','No','00202','e99a18c428cb38d5f260853678922e03',0),(7,'Shay','Ran','','','Pending','No','D031310001','e99a18c428cb38d5f260853678922e03',0),(8,'Abu','Gin','','','Pending','No','D031310002','e99a18c428cb38d5f260853678922e03',0),(9,'Shay','Ran','','','Pending','No','XXX001','e99a18c428cb38d5f260853678922e03',0),(10,'A','B','','','Pending','No','XXX002','e99a18c428cb38d5f260853678922e03',0),(11,'B','B','','','Pending','No','XXX003','e99a18c428cb38d5f260853678922e03',0),(12,'C','C','','','Pending','No','XXX004','e99a18c428cb38d5f260853678922e03',0),(13,'Tah','Le','','','Pending','No','D031310003','e99a18c428cb38d5f260853678922e03',0),(14,'Abu','Bakar','','','Pending','No','D031310006','e99a18c428cb38d5f260853678922e03',0),(15,'Amakuso','Shiro','','','Student','No','B031520099','e99a18c428cb38d5f260853678922e03',5),(16,'as','as','','','Rejected','No','As','e99a18c428cb38d5f260853678922e03',5),(99,'Woshani','zarann','shay@email.com','666','Lecturer','Yes','DARK99','e99a18c428cb38d5f260853678922e03',0),(100,'ABU','ALI','zaran7682@gmail.com','999','Student','No','B031520039','e99a18c428cb38d5f260853678922e03',5);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-14  0:40:10
