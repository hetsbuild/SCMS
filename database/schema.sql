-- ============================================================
-- Service Center Management System (SCMS)
-- Schema + demo seed data
--
-- This file intentionally contains NO real customer data and NO
-- usable credentials. All passwords are stored in plaintext by
-- this project, so only throwaway demo values are provided here.
-- Change every credential below before using this in production.
-- ============================================================

CREATE DATABASE IF NOT EXISTS `servicecenter` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `servicecenter`;

-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
-- Host: localhost    Database: servicecenter
-- Server version	5.7.13-log

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(100) NOT NULL,
  `CustomerAddress` varchar(100) NOT NULL,
  `CustomerCity` varchar(45) NOT NULL,
  `MobileNumber` varchar(45) NOT NULL,
  `WhatsAppNumber` varchar(45) DEFAULT NULL,
  `ProductCompanyName` varchar(45) DEFAULT NULL,
  `ProductNameOrModel` varchar(45) DEFAULT NULL,
  `LastMessageSendDate` date DEFAULT NULL,
  `CreateDate` date NOT NULL,
  `CreateBy` int(11) NOT NULL,
  `ModifiedDate` date DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CustomerId_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Demo data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Demo Customer','Demo Address','Demo City','0000000000','0000000000','LG','Demo Refrigerator','2025-01-01','2025-01-01',1,NULL,NULL,'Y');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `isactive` char(1) NOT NULL,
  `primarymobileno` varchar(10) NOT NULL,
  `secondmobileno` varchar(10) DEFAULT NULL,
  `emailaddress` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Demo data for table `distributor`
--

LOCK TABLES `distributor` WRITE;
/*!40000 ALTER TABLE `distributor` DISABLE KEYS */;
INSERT INTO `distributor` VALUES (1,'Demo Dealer','Y','0000000000','0000000000','demo@example.com','Demo Address','Demo City');
/*!40000 ALTER TABLE `distributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributoruser`
--

DROP TABLE IF EXISTS `distributoruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
  CREATE TABLE `distributoruser` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` varchar(45) NOT NULL,
    `userpassword` varchar(45) NOT NULL,
    `isactive` char(1) NOT NULL,
    `distributorid` int(11) NOT NULL,
    `firstname` varchar(45) DEFAULT NULL,
    `lastname` varchar(45) DEFAULT NULL,
    `mobileno` varchar(25) DEFAULT NULL,
    `roletype` varchar(10) NOT NULL,
    `createdate` datetime NOT NULL,
    `modifydate` datetime DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_UNIQUE` (`id`),
    UNIQUE KEY `username_UNIQUE` (`username`),
    KEY `fk_distributor` (`distributorid`),
    CONSTRAINT `fk_distributor` FOREIGN KEY (`distributorid`) REFERENCES `distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Demo data for table `distributoruser`
-- Username: demo_dealer  /  Password: demo1234
--

LOCK TABLES `distributoruser` WRITE;
/*!40000 ALTER TABLE `distributoruser` DISABLE KEYS */;
INSERT INTO `distributoruser` VALUES (1,'demo_dealer','demo1234','Y',1,'Demo','Dealer','0000000000','admin','2025-01-01 00:00:00',NULL);
/*!40000 ALTER TABLE `distributoruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `new_table`
--

DROP TABLE IF EXISTS `new_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `new_table` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `partdetail`
--

DROP TABLE IF EXISTS `partdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicecallid` int(11) NOT NULL,
  `partid` int(11) NOT NULL,
  `netprice` decimal(10,2) NOT NULL,
  `gstpercent` decimal(5,2) NOT NULL,
  `finalprice` decimal(10,2) NOT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `partdetail` WRITE;
/*!40000 ALTER TABLE `partdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `partdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecall`
--

DROP TABLE IF EXISTS `servicecall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callnumber` varchar(45) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `customermobileno` varchar(45) NOT NULL,
  `customeraddress` varchar(100) NOT NULL,
  `customercity` varchar(45) NOT NULL,
  `calltype` varchar(45) NOT NULL,
  `serviceworktype` varchar(45) DEFAULT NULL,
  `paymenttype` varchar(45) DEFAULT NULL,
  `calldate` datetime NOT NULL,
  `callassigndate` datetime DEFAULT NULL,
  `technicianassigned` int(11) DEFAULT NULL,
  `callcompletedate` datetime DEFAULT NULL,
  `callstatus` varchar(45) NOT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `discountamount` decimal(10,2) DEFAULT NULL,
  `finalamount` decimal(10,2) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `createby` int(11) DEFAULT NULL,
  `createby_distributor_id` int(11) DEFAULT NULL,
  `createby_distributoruser_id` int(11) DEFAULT NULL,
  `modifiedby` int(11) DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL,
  `customerproblem` varchar(200) DEFAULT NULL,
  `callresolution` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `callnumber_UNIQUE` (`callnumber`),
  KEY `fk_servicecall_technician` (`technicianassigned`),
  KEY `fk_servicecall_distributor` (`createby_distributor_id`),
  KEY `fk_servicecall_distributoruser` (`createby_distributoruser_id`),
  KEY `fk_servicecall_createby` (`createby`),
  KEY `fk_servicecall_modifiedby` (`modifiedby`),
  CONSTRAINT `fk_servicecall_createby` FOREIGN KEY (`createby`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_distributor` FOREIGN KEY (`createby_distributor_id`) REFERENCES `distributor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_distributoruser` FOREIGN KEY (`createby_distributoruser_id`) REFERENCES `distributoruser` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_modifiedby` FOREIGN KEY (`modifiedby`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_servicecall_technician` FOREIGN KEY (`technicianassigned`) REFERENCES `servicecenteruser` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Demo data for table `servicecall`
--

LOCK TABLES `servicecall` WRITE;
/*!40000 ALTER TABLE `servicecall` DISABLE KEYS */;
INSERT INTO `servicecall` VALUES (1,'20250101120000','Demo Customer','0000000000','Demo Address','Demo City','Repair','Service','Cash','2025-01-01 00:00:00','2025-01-01 10:00:00',2,NULL,'Assigned',NULL,NULL,NULL,'2025-01-01 00:00:00',1,1,1,1,'2025-01-01 10:00:00','Demo problem description',NULL);
/*!40000 ALTER TABLE `servicecall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecenteruser`
--

DROP TABLE IF EXISTS `servicecenteruser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecenteruser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `primarymobileno` varchar(10) NOT NULL,
  `secondmobileno` varchar(10) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(45) NOT NULL,
  `roletype` varchar(20) NOT NULL,
  `isactive` char(1) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime DEFAULT NULL,
  `lastlogindate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Demo data for table `servicecenteruser`
-- Admin:      demo_admin  /  demo1234   (roletype: admin)
-- Technician: demo_tech   /  demo1234   (roletype: Technician)
--
-- NOTE: this project stores passwords in plaintext. Replace with
-- password_hash() / password_verify() before any real deployment.
--

LOCK TABLES `servicecenteruser` WRITE;
/*!40000 ALTER TABLE `servicecenteruser` DISABLE KEYS */;
INSERT INTO `servicecenteruser` VALUES (1,'demo_admin','demo1234','0000000000','0000000000','Demo','Admin','Demo Address','Demo City','admin','Y','2025-01-01 00:00:00',NULL,NULL),(2,'demo_tech','demo1234','0000000000','0000000000','Demo','Technician','Demo Address','Demo City','Technician','Y','2025-01-01 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `servicecenteruser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `technicianpaymentgiven`
--

DROP TABLE IF EXISTS `technicianpaymentgiven`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `technicianpaymentgiven` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `technicianid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `callid` int(11) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `technicianpaymentgiven` WRITE;
/*!40000 ALTER TABLE `technicianpaymentgiven` DISABLE KEYS */;
/*!40000 ALTER TABLE `technicianpaymentgiven` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40014 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40014 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40014 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;