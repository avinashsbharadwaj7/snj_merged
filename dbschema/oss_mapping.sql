CREATE DATABASE  IF NOT EXISTS `snj` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `snj`;
-- MySQL dump 10.13  Distrib 5.1.40, for Win32 (ia32)
--
-- Host: resourcelab.net    Database: snj
-- ------------------------------------------------------
-- Server version	5.1.54-1ubuntu4

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
-- Table structure for table `oss_mapping`
--

DROP TABLE IF EXISTS `oss_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oss_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) NOT NULL,
  `oss_name` varchar(50) NOT NULL,
  `oss_ip` varchar(15) NOT NULL,
  `technology` varchar(10) NOT NULL,
  `customer` varchar(10) NOT NULL,
  `function` varchar(50) NOT NULL,
  `server` varchar(50) NOT NULL,
  `look_up` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oss_mapping`
--

LOCK TABLES `oss_mapping` WRITE;
/*!40000 ALTER TABLE `oss_mapping` DISABLE KEYS */;
INSERT INTO `oss_mapping` VALUES (1,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.241','LTE','AT&T','citrix','akr1e1cx1','Akron'),(2,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.242','LTE','AT&T','citrix','akr1e1cx2','Akron'),(3,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.243','LTE','AT&T','citrix','akr1e1cx3','Akron'),(4,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.238','LTE','AT&T','mashost','akr1e1ms1','Akron'),(5,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.239','LTE','AT&T','mashost-r','akr1e1ms2','Akron'),(6,'ATT_LTE_ipdatabase_*.txt','akr1e1','172.18.52.240','LTE','AT&T','WAS','akr1e1was','Akron'),(7,'Avon_ipdatabase_*.txt','avne1','172.18.51.127','WCDMA','AT&T','citrix','avne1cx1','NA'),(8,'Avon_ipdatabase_*.txt','avne1','172.18.51.128','WCDMA','AT&T','citrix','avne1cx2','NA'),(9,'Avon_ipdatabase_*.txt','avne1','172.18.52.120','WCDMA','AT&T','citrix','avne1cx3','NA'),(10,'Avon_ipdatabase_*.txt','avne1','172.18.51.125','WCDMA','AT&T','mashost','avne1ms1','NA'),(11,'Avon_ipdatabase_*.txt','avne1','','WCDMA','AT&T','mashost-r','avne1ms2','NA'),(12,'Avon_ipdatabase_*.txt','avne1','172.18.52.146','WCDMA','AT&T','WAS','avne1was','NA'),(13,'Bothell1_ipdatabase_*.txt','bote1','172.18.52.194','WCDMA','AT&T','mashost','bote1ms1','NA'),(14,'Bothell1_ipdatabase_*.txt','bote1','','WCDMA','AT&T','mashost-r','bote1ms2','NA'),(15,'ATT_LTE_ipdatabase_*.txt','bote3','172.18.54.14','LTE','AT&T','mashost','bote3ms1','Bothell3'),(16,'ATT_LTE_ipdatabase_*.txt','bote3','172.18.54.15','LTE','AT&T','mashost','bote3ms2','Bothell3'),(17,'ATT_LTE_ipdatabase_*.txt','bote3','172.18.54.11','LTE','AT&T','citrix','bote3cx1','Bothell3'),(18,'ATT_LTE_ipdatabase_*.txt','bote3','172.18.54.12','LTE','AT&T','citrix','bote3cx1','Bothell3'),(19,'ATT_LTE_ipdatabase_*.txt','bote3','172.18.54.13','LTE','AT&T','citrix','bote3cx1','Bothell3'),(20,'A1_ipdatabase_*.txt','glne1','172.18.52.65','WCDMA','AT&T','citrix','glne1cx1','NA'),(21,'A1_ipdatabase_*.txt','glne1','172.18.52.66','WCDMA','AT&T','citrix','glne1cx2','NA'),(22,'A1_ipdatabase_*.txt','glne1','172.18.52.113','WCDMA','AT&T','citrix','glne1cx3','NA'),(23,'A1_ipdatabase_*.txt','glne1','172.18.52.69','WCDMA','AT&T','mashost','glne1ms1','NA'),(24,'A1_ipdatabase_*.txt','glne1','','WCDMA','AT&T','mashost-r','glne1ms2','NA'),(25,'A1_ipdatabase_*.txt','glne1','172.18.52.119','WCDMA','AT&T','WAS','glne1was','NA'),(26,'A2_ipdatabase_*.txt','glne2','','WCDMA','AT&T','BAS','glne2bas','NA'),(27,'A2_ipdatabase_*.txt','glne2','172.18.52.115','WCDMA','AT&T','WAS','glne2was','NA'),(28,'A2_ipdatabase_*.txt','glne2','172.18.52.67','WCDMA','AT&T','citrix','glne2cx1','NA'),(29,'A2_ipdatabase_*.txt','glne2','172.18.52.68','WCDMA','AT&T','citrix','glne2cx2','NA'),(30,'A2_ipdatabase_*.txt','glne2','172.18.52.114','WCDMA','AT&T','citrix','glne2cx3','NA'),(31,'A2_ipdatabase_*.txt','glne2','','WCDMA','AT&T','ENIQ','glne2eniq','NA'),(32,'A2_ipdatabase_*.txt','glne2','172.18.52.70','WCDMA','AT&T','mashost','glne2ms1','NA'),(33,'A2_ipdatabase_*.txt','glne2','','WCDMA','AT&T','mashost-r','glne2ms2','NA'),(34,'A3_ipdatabase_*.txt','glne3','172.18.52.163','WCDMA','AT&T','citrix','glne3cx1','NA'),(35,'A3_ipdatabase_*.txt','glne3','172.18.52.164','WCDMA','AT&T','citrix','glne3cx2','NA'),(36,'A3_ipdatabase_*.txt','glne3','172.18.52.165','WCDMA','AT&T','citrix','glne3cx3','NA'),(37,'A3_ipdatabase_*.txt','glne3','172.18.52.167','WCDMA','AT&T','mashost','glne3ms1','NA'),(38,'A3_ipdatabase_*.txt','glne3','172.18.52.168','WCDMA','AT&T','mashost-r','glne3ms2','NA'),(39,'A3_ipdatabase_*.txt','glne3','172.18.52.166','WCDMA','AT&T','WAS','glne3was','NA'),(40,'A4_ipdatabase_*.txt','glne4','172.18.52.221','WCDMA','AT&T','citrix','glne4cx1','NA'),(41,'A4_ipdatabase_*.txt','glne4','','WCDMA','AT&T','mashost','glne4ms1','NA'),(42,'A4_ipdatabase_*.txt','glne4','','WCDMA','AT&T','mashost-r','glne4ms2','NA'),(43,'Lacy1_ipdatabase_*.txt','lcye1','172.18.51.84','WCDMA','AT&T','citrix','lcye1cx1','NA'),(44,'Lacy1_ipdatabase_*.txt','lcye1','172.18.51.85','WCDMA','AT&T','citrix','lcye1cx2','NA'),(45,'Lacy1_ipdatabase_*.txt','lcye1','172.18.52.72','WCDMA','AT&T','citrix','lcye1cx3','NA'),(46,'Lacy1_ipdatabase_*.txt','lcye1','172.18.52.150','WCDMA','AT&T','citrix','lcye1cx4','NA'),(47,'Lacy1_ipdatabase_*.txt','lcye1','','WCDMA','AT&T','ENIQ','lcye1eniq','NA'),(48,'Lacy1_ipdatabase_*.txt','lcye1','172.18.51.80','WCDMA','AT&T','mashost','lcye1ms1','NA'),(49,'Lacy1_ipdatabase_*.txt','lcye1','172.18.52.103','WCDMA','AT&T','WAS','lcye1was','NA'),(50,'Lacy1_ipdatabase_*.txt','lcye1','172.18.51.80','WCDMA','AT&T','mashost','lcye1ms','NA'),(51,'Lacy3_ipdatabase_*.txt','lcye3','172.18.52.140','WCDMA','AT&T','citrix','lcye3cx1','NA'),(52,'Lacy3_ipdatabase_*.txt','lcye3','172.18.52.141','WCDMA','AT&T','citrix','lcye3cx2','NA'),(53,'Lacy3_ipdatabase_*.txt','lcye3','172.18.52.143','WCDMA','AT&T','citrix','lcye3cx3','NA'),(54,'Lacy3_ipdatabase_*.txt','lcye3','172.18.52.139','WCDMA','AT&T','mashost','lcye3ms1','NA'),(55,'Lacy3_ipdatabase_*.txt','lcye3','','WCDMA','AT&T','mashost-r','lcye3ms2','NA'),(56,'Lacy3_ipdatabase_*.txt','lcye3','172.18.52.142','WCDMA','AT&T','WAS','lcye3was','NA'),(57,'Lacy4_ipdatabase_*.txt','lcye4','172.18.52.161','WCDMA','AT&T','mashost','lcye4ms1','NA'),(58,'Lacy4_ipdatabase_*.txt','lcye4','','WCDMA','AT&T','mashost-r','lcye4ms2','NA'),(59,'Lacy5_ipdatabase_*.txt','lcye5','172.18.52.228','WCDMA','AT&T','citrix','lcye5ms1','NA'),(60,'Lacy5_ipdatabase_*.txt','lcye5','','WCDMA','AT&T','mashost','lcye5ms1','NA'),(61,'Lacy5_ipdatabase_*.txt','lcye5','','WCDMA','AT&T','mashost-r','lcye5ms2','NA'),(62,'ATT_LTE_ipdatabase_*.txt','lcye6','172.18.52.213','LTE','AT&T','citrix','lcye6cx1','Lacy6'),(63,'ATT_LTE_ipdatabase_*.txt','lcye6','172.18.52.214','LTE','AT&T','citrix','lcye6cx1','Lacy6'),(64,'ATT_LTE_ipdatabase_*.txt','lcye6','172.18.52.215','LTE','AT&T','citrix','lcye6cx1','Lacy6'),(65,'ATT_LTE_ipdatabase_*.txt','lcye6','','LTE','AT&T','BAS','lcye6bas','Lacy6'),(66,'ATT_LTE_ipdatabase_*.txt','lcye6','','LTE','AT&T','SLS','lcye6inf1','Lacy6'),(67,'ATT_LTE_ipdatabase_*.txt','lcye6','','LTE','AT&T','SLS','lcye6inf2','Lacy6'),(68,'ATT_LTE_ipdatabase_*.txt','lcye6','172.18.52.216','LTE','AT&T','mashost','lcye6ms1','Lacy6'),(69,'ATT_LTE_ipdatabase_*.txt','lcye6','','LTE','AT&T','mashost-r','lcye6ms2','Lacy6'),(70,'E7_ipdatabase_*.txt','wtce7','172.18.51.59','WCDMA','AT&T','citrix','wtce7cx1','NA'),(71,'E7_ipdatabase_*.txt','wtce7','172.18.51.63','WCDMA','AT&T','citrix','wtce7cx2','NA'),(72,'E7_ipdatabase_*.txt','wtce7','172.18.52.123','WCDMA','AT&T','citrix','wtce7cx3','NA'),(73,'E7_ipdatabase_*.txt','wtce7','172.18.51.53','WCDMA','AT&T','mashost','wtce7ms1','NA'),(74,'E7_ipdatabase_*.txt','wtce7','','WCDMA','AT&T','mashost-r','wtce7ms2','NA'),(75,'E7_ipdatabase_*.txt','wtce7','172.18.52.122','WCDMA','AT&T','WAS','wtce7was','NA'),(76,'E9_ipdatabase_*.txt','wtce9','172.18.52.94','WCDMA','AT&T','citrix','wtce9cx3','NA'),(77,'E9_ipdatabase_*.txt','wtce9','','WCDMA','AT&T','mashost-r','wtce9ms2','NA'),(78,'E9_ipdatabase_*.txt','wtce9','172.18.52.92','WCDMA','AT&T','citrix','wtce9cx1','NA'),(79,'E9_ipdatabase_*.txt','wtce9','172.18.52.93','WCDMA','AT&T','citrix','wtce9cx2','NA'),(80,'E9_ipdatabase_*.txt','wtce9','172.18.52.91','WCDMA','AT&T','mashost','wtce9ms1','NA'),(81,'E9_ipdatabase_*.txt','wtce9','172.18.52.104','WCDMA','AT&T','WAS','wtce9was','NA'),(82,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','Master','vtc2e1ms1 ','VTC'),(83,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','Master-Redundant','vtc2e1ms2 ','VTC'),(84,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','Citrix','vtc2e1cx1','VTC'),(85,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','Citrix','vtc2e1cx2','VTC'),(86,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','Citrix','vtc2e1cx3','VTC'),(87,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','ENIQ','vtc2e1niq ','VTC'),(88,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','BAS','vtc2e1ebas','VTC'),(89,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','mashost','vtc2e1_mashost','VTC'),(90,'ATT_LTE_ipdatabase_*.txt','vtc2e1','NULL','LTE','AT&T','webiserver','vtc2e1_webiserver','VTC');
/*!40000 ALTER TABLE `oss_mapping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-02-28 17:47:04
