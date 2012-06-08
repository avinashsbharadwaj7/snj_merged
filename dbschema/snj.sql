-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.8


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cake
--

CREATE DATABASE IF NOT EXISTS cake;
USE cake;

--
-- Temporary table structure for view `viewavailabilitypercentage`
--
DROP TABLE IF EXISTS `viewavailabilitypercentage`;
DROP VIEW IF EXISTS `viewavailabilitypercentage`;
CREATE TABLE `viewavailabilitypercentage` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewcalendars`
--
DROP TABLE IF EXISTS `viewcalendars`;
DROP VIEW IF EXISTS `viewcalendars`;
CREATE TABLE `viewcalendars` (
  `Job_Id` int(11),
  `task_id` int(11),
  `datecreated` timestamp,
  `createdby` varchar(45),
  `organization` varchar(45),
  `customer` varchar(45),
  `region` varchar(45),
  `start_date` date,
  `end_date` date,
  `start_time` time,
  `end_time` time,
  `ticket_conflict_status` tinyint(1),
  `ticket_status` int(11),
  `node_name` varchar(45),
  `resource_name` varchar(45)
);

--
-- Temporary table structure for view `viewcustomer`
--
DROP TABLE IF EXISTS `viewcustomer`;
DROP VIEW IF EXISTS `viewcustomer`;
CREATE TABLE `viewcustomer` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewjobstatus`
--
DROP TABLE IF EXISTS `viewjobstatus`;
DROP VIEW IF EXISTS `viewjobstatus`;
CREATE TABLE `viewjobstatus` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewlocation`
--
DROP TABLE IF EXISTS `viewlocation`;
DROP VIEW IF EXISTS `viewlocation`;
CREATE TABLE `viewlocation` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewnodeentrytype`
--
DROP TABLE IF EXISTS `viewnodeentrytype`;
DROP VIEW IF EXISTS `viewnodeentrytype`;
CREATE TABLE `viewnodeentrytype` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `vieworganization`
--
DROP TABLE IF EXISTS `vieworganization`;
DROP VIEW IF EXISTS `vieworganization`;
CREATE TABLE `vieworganization` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `vieworganizationdd`
--
DROP TABLE IF EXISTS `vieworganizationdd`;
DROP VIEW IF EXISTS `vieworganizationdd`;

--
-- Temporary table structure for view `viewregion`
--
DROP TABLE IF EXISTS `viewregion`;
DROP VIEW IF EXISTS `viewregion`;
CREATE TABLE `viewregion` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewrequesttype`
--
DROP TABLE IF EXISTS `viewrequesttype`;
DROP VIEW IF EXISTS `viewrequesttype`;
CREATE TABLE `viewrequesttype` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewtechnology`
--
DROP TABLE IF EXISTS `viewtechnology`;
DROP VIEW IF EXISTS `viewtechnology`;
CREATE TABLE `viewtechnology` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewticketconflictstatus`
--
DROP TABLE IF EXISTS `viewticketconflictstatus`;
DROP VIEW IF EXISTS `viewticketconflictstatus`;
CREATE TABLE `viewticketconflictstatus` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewworkdaytime`
--
DROP TABLE IF EXISTS `viewworkdaytime`;
DROP VIEW IF EXISTS `viewworkdaytime`;
CREATE TABLE `viewworkdaytime` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

--
-- Temporary table structure for view `viewworklocation`
--
DROP TABLE IF EXISTS `viewworklocation`;
DROP VIEW IF EXISTS `viewworklocation`;
CREATE TABLE `viewworklocation` (
  `idsnj_dd` int(11),
  `dd_description` varchar(255),
  `dd_type` tinyint(4)
);

DROP TABLE IF EXISTS `authcodes`;
CREATE TABLE `authcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tckt_id` varchar(45) NOT NULL,
  `timestamp` datetime NOT NULL,
  `auth_code` int(11) NOT NULL,
  `node_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authcodes`
--

/*!40000 ALTER TABLE `authcodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `authcodes` ENABLE KEYS */;

--
-- Definition of table `email_lists`
--

DROP TABLE IF EXISTS `email_lists`;
CREATE TABLE `email_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dl_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_lists`
--

/*!40000 ALTER TABLE `email_lists` DISABLE KEYS */;
INSERT INTO `email_lists` (`id`,`dl_id`,`user_id`) VALUES 
 (47,27,1168),
 (48,28,1168),
 (49,29,1168),
 (50,30,1168);
/*!40000 ALTER TABLE `email_lists` ENABLE KEYS */;


--
-- Definition of table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `email_id` int(11) NOT NULL,
  `email_ids` varchar(45) DEFAULT NULL,
  `mail_text` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;


--
-- Definition of table `excelfiles`
--

DROP TABLE IF EXISTS `excelfiles`;
CREATE TABLE `excelfiles` (
  `id` int(11) NOT NULL,
  `file_name` varchar(45) DEFAULT NULL,
  `file_path` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `excelfiles`
--

/*!40000 ALTER TABLE `excelfiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `excelfiles` ENABLE KEYS */;



--
-- Definition of table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `rev_no` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `Signum` varchar(45) DEFAULT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Organization` varchar(45) DEFAULT NULL,
  `Work_Location` varchar(45) DEFAULT NULL,
  `Network_Number` int(8) DEFAULT NULL,
  `More_id` varchar(45) DEFAULT NULL,
  `CCB_tckt_no` varchar(45) DEFAULT NULL,
  `Technology` varchar(45) DEFAULT NULL,
  `Region` varchar(45) DEFAULT NULL,
  `Market` varchar(45) DEFAULT NULL,
  `Work_day_time` varchar(45) DEFAULT NULL,
  `Request_type` varchar(45) DEFAULT NULL,
  `Scope_of_work` varchar(45) DEFAULT NULL,
  `mop_link` varchar(45) DEFAULT NULL,
  `mop_risk_level` varchar(45) DEFAULT NULL,
  `no_of_eng_needed` int(11) DEFAULT NULL,
  `modifier_name` varchar(45) DEFAULT NULL,
  `modifier_signum` varchar(45) DEFAULT NULL,
  `modification_timestamp` datetime DEFAULT NULL,
  `Authorization_name` varchar(45) DEFAULT NULL,
  `Authorization_email` varchar(45) DEFAULT NULL,
  `Authorization_phone` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `request_id` varchar(45) DEFAULT NULL,
  `conflict_comments` varchar(45) DEFAULT NULL,
  `email_addresses` varchar(255) DEFAULT NULL,
  `mop_creation_text` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=726 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;



--
-- Definition of table `mops`
--

DROP TABLE IF EXISTS `mops`;
CREATE TABLE `mops` (
  `mop_id` int(11) NOT NULL AUTO_INCREMENT,
  `mop_or` varchar(45) DEFAULT NULL,
  `scope_of_work` varchar(45) DEFAULT NULL,
  `mop_link` varchar(512) DEFAULT NULL,
  `excel_or_moplink` tinyint(1) DEFAULT NULL,
  `mop_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mops`
--

/*!40000 ALTER TABLE `mops` DISABLE KEYS */;
INSERT INTO `mops` (`mop_id`,`mop_or`,`scope_of_work`,`mop_link`,`excel_or_moplink`,`mop_name`) VALUES 
 (1,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:000729Uen&objectId=09004cff846aff74&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T Generic W11 NodeB Rehome with MSN'),
 (2,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:000730Uen&objectId=09004cff846b0618&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T Generic W11 Iub over IP NodeB Rehome with MSN'),
 (3,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:001049Uen&objectId=09004cff8473bf9a&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T W11 IP NodeB Rehome with new IP address (Inter MTSO)'),
 (4,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:001050Uen&objectId=09004cff8473c3c7&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE- AT&T {MARKET_NAME} W11 Node-B Combo [ATM_IP] Rehome {DATE}'),
 (5,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:001241Uen&objectId=09004cff84766780&action=approved&format=msw8',NULL,'ATT Iub over IP Node-B W11 Combo [Intra_Inter - MTSO] rehome'),
 (6,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:001342Uen&objectId=09004cff847b510e&action=approved&format=msw8',NULL,'ATT Node-B W11 Combo [ATM_IP] Rehome with new IP address (inter-MTSO)'),
 (7,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:002795Uen&objectId=09004cff84a3f05e&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T Generic W11 NodeB InterOSS Rehome with MSN'),
 (8,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:003944Uen&objectId=09004cff84f05e6e&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T W11 IP NodeB Rehome with new IP address using XML'),
 (9,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:003946Uen&objectId=09004cff84f06657&action=approved&format=msw8',NULL,'Method of Procedure-AT&T Iub over IP Node-B W11A Combo [Intra_Inter - MTSO] rehome using XML'),
 (10,'1','1','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:003957Uen&objectId=09004cff84f0ded1&action=approved&format=msw8',NULL,'ATT Node-B W11 Combo [ATM_IP] Rehome with new IP address (inter-MTSO) using XML'),
 (11,'3','50','http://anon.ericsson.se/eridoc/component/eriurl?docno=EMC-11:001260Uen&objectId=09004cff847860b1&action=approved&format=msw8',NULL,'METHOD OF PROCEDURE - AT&T -Generic W11 Node B Integration');
/*!40000 ALTER TABLE `mops` ENABLE KEYS */;


--
-- Definition of table `node_conflicts`
--

DROP TABLE IF EXISTS `node_conflicts`;
CREATE TABLE `node_conflicts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `ticket_conflict_status` int(11) DEFAULT NULL,
  `job_rev_no` int(11) DEFAULT NULL,
  `task_rev_no` int(11) DEFAULT NULL,
  `node_name` varchar(45) DEFAULT NULL,
  `conflicting_job_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=431 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `node_conflicts`
--

/*!40000 ALTER TABLE `node_conflicts` DISABLE KEYS */;
/*!40000 ALTER TABLE `node_conflicts` ENABLE KEYS */;


--
-- Definition of table `nodes`
--

DROP TABLE IF EXISTS `nodes`;
CREATE TABLE `nodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source_node` varchar(45) DEFAULT NULL,
  `target_node` varchar(45) DEFAULT NULL,
  `adjacent_nodes` varchar(5000) DEFAULT NULL,
  `concerned_node` varchar(45) DEFAULT NULL,
  `job_id` int(11) NOT NULL,
  `job_rev` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_rev` int(11) NOT NULL,
  `node_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1617 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nodes`
--

/*!40000 ALTER TABLE `nodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `nodes` ENABLE KEYS */;



--
-- Definition of table `resource_conflict`
--

DROP TABLE IF EXISTS `resource_conflict`;
CREATE TABLE `resource_conflict` (
  `idresource_conflict` int(11) NOT NULL AUTO_INCREMENT,
  `conflict_status` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `job_rev` int(11) DEFAULT NULL,
  `task_rev` int(11) DEFAULT NULL,
  `conflic_comment` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idresource_conflict`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_conflict`
--

/*!40000 ALTER TABLE `resource_conflict` DISABLE KEYS */;
/*!40000 ALTER TABLE `resource_conflict` ENABLE KEYS */;


--
-- Definition of table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `user_signum` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `location` varchar(45) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `co_located` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `approval_comments` varchar(45) DEFAULT NULL,
  `resource_name` varchar(45) DEFAULT NULL,
  `nullified` tinyint(1) DEFAULT NULL,
  `added_by` varchar(45) DEFAULT NULL,
  `rev_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

/*!40000 ALTER TABLE `resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `resources` ENABLE KEYS */;


--
-- Definition of table `snj_dd`
--

DROP TABLE IF EXISTS `snj_dd`;
CREATE TABLE `snj_dd` (
  `idsnj_dd` int(11) NOT NULL AUTO_INCREMENT,
  `dd_description` varchar(255) DEFAULT NULL,
  `dd_type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idsnj_dd`),
  UNIQUE KEY `idsnj_dd_UNIQUE` (`idsnj_dd`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snj_dd`
--

/*!40000 ALTER TABLE `snj_dd` DISABLE KEYS */;
INSERT INTO `snj_dd` (`idsnj_dd`,`dd_description`,`dd_type`) VALUES 
 (1,'RAN E&O Integration',1),
 (2,'RAN E&O NDS',1),
 (3,'LDO NIC',1),
 (4,'Ultran Engineering Systems',1),
 (5,'CR',1),
 (6,'IP, Broadband and Core',0),
 (7,'Customer Support - Software Deployment',0),
 (8,'RNAM NIC Canada',2),
 (9,'RNAM NIC Plano',2),
 (10,'RNAM NDS Plano',2),
 (11,'RNAM RDC Brazil',2),
 (12,'RNAM RDC India',2),
 (13,'RNAM RDC Mexico',2),
 (14,'RNAM NIC Remote',2),
 (15,'RNAM NDS Remote',2),
 (16,'North East',3),
 (17,'South East',3),
 (18,'North West',3),
 (19,'South West',3),
 (20,'North Central',3),
 (21,'South Central',3),
 (22,'1 Node Per Box',4),
 (23,'Text Area',4),
 (24,'Excel Upload',4),
 (25,'Week Day Time',5),
 (26,'Week Maintenance Window Time',5),
 (27,'Weekend Day Time',5),
 (28,'Weekend Maintenance Window Time',5),
 (29,'WCDMA',6),
 (30,'GSM',6),
 (31,'LTE',6),
 (32,'CDMA',6),
 (33,'Dedicated',7),
 (34,'HotLine',7),
 (35,'Bridge',7),
 (36,'No Modifications',8),
 (37,'Modification to the Engineer Count as per agreement - by PM/IM',8),
 (38,'Modification to the Engineer Count as per agreement - by LM',8),
 (39,'Modification to the Start and End Date/Time as per agreement - by PM/IM',8),
 (40,'Modification to the Start and End Date/Time as per agreement by LM',8),
 (41,'No Conflict',9),
 (42,'Conflict Exists',9),
 (43,'New Ticket',10),
 (44,'Started',10),
 (45,'Partially Completed',10),
 (46,'Restarted',10),
 (47,'Completed',10),
 (48,'Onsite',11),
 (49,'Remote',11),
 (50,'25',12),
 (51,'50',12),
 (52,'75',12),
 (53,'AT&T',13),
 (54,'T-Mobile',13),
 (55,'Rogers',13),
 (56,'Verizon',13),
 (57,'MetroPCS',13),
 (58,'Mobilicity',13),
 (59,'CBW',13),
 (60,'GCI Telecom',13),
 (61,'Other',13),
 (115,'Other',2);
/*!40000 ALTER TABLE `snj_dd` ENABLE KEYS */;


--
-- Definition of table `snj_scope_of_works`
--

DROP TABLE IF EXISTS `snj_scope_of_works`;
CREATE TABLE `snj_scope_of_works` (
  `idsnj_scope_of_work` int(11) NOT NULL AUTO_INCREMENT,
  `snj_sow_description` varchar(255) DEFAULT NULL,
  `idsnj_dd_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`idsnj_scope_of_work`),
  UNIQUE KEY `idsnj_scope_of_work_UNIQUE` (`idsnj_scope_of_work`)
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snj_scope_of_works`
--

/*!40000 ALTER TABLE `snj_scope_of_works` DISABLE KEYS */;
INSERT INTO `snj_scope_of_works` (`idsnj_scope_of_work`,`snj_sow_description`,`idsnj_dd_fk`) VALUES 
 (1,'NodeB Rehome',1),
 (2,'NodeB Virtual Rebalance',1),
 (3,'Node Rip & Replace',1),
 (4,'RBS HW Changes',1),
 (5,'RNC Expansion',1),
 (6,'RNC Expansion',1),
 (7,'RNC Rehome',1),
 (8,'SGSN Rehome',1),
 (9,'Parameter Change - RNC',1),
 (10,'Parameter Change - RBS',1),
 (11,'Parameter Change - Other',1),
 (12,'Capacity Augmentation',1),
 (13,'ATM to IP Conversion',1),
 (14,'RNC - AGPS Activation',1),
 (15,'Post MW Checks',1),
 (16,'RBS - TMA DB Corruption Change',1),
 (17,'PCN408 - ISL Cable Replacement',1),
 (18,'IUCS Activation - New RNC',1),
 (19,'IUPS Activation - New RNC',1),
 (20,'TX60-Board Add/Swap',1),
 (21,'ISP Impact',1),
 (22,'TMA Add/reconfiguration',1),
 (23,'RBS TX/RAX Board Addition',1),
 (24,'RNC Integration - FSE Report',1),
 (25,'RU/RRU swaps',1),
 (26,'Software Upgrade',1),
 (27,'Cabinet Swap',1),
 (28,'CBU to DUW30 Upgrade',1),
 (29,'GPB75 Upgrade',1),
 (30,'Script Load',1),
 (31,'BTS Rehome',1),
 (32,'BSC Rehome',1),
 (33,'RPP Expansion and Integration',1),
 (34,'GBIP Conversion',1),
 (35,'Power Migration',1),
 (36,'BSC OC3 Rebalance',1),
 (37,'BSC Feature Activation',1),
 (38,'BSC Memory Upgrade',1),
 (39,'IP Switch Correction',1),
 (40,'SGSN Rehome',1),
 (41,'BSC In Pool',1),
 (42,'BSC Gb Interface Conversion',1),
 (43,'Pre Launch',2),
 (44,'Market Launch',2),
 (45,'Post Launch - Troubleshooting',2),
 (46,'Post Launch - Daily Ultran Report',2),
 (47,'Post Activity Check',2),
 (48,'Parameter Change',2),
 (49,'ISP Impact',2),
 (50,'New Integration (lub over ATM)',3),
 (51,'New Integration (lub over IP)',3),
 (52,'2nd Carrier Add (Regular)',3),
 (53,'2nd Carrier Add Split Power Config',3),
 (54,'3rd Carrier Add Cable Crossover Solution (lub over ATM)',3),
 (55,'3rd Carrier Add Cable Crossover Solution (lub over IP)',3),
 (56,'3rd Carrier Add using OBIF & RRUW',3),
 (57,'3rd Carrier Add Cabinet Reconfiguration',3),
 (58,'3rd Carrier Add Split Power Config',3),
 (59,'4th Carrier Add in 2nd Cabinet',3),
 (60,'4th Carrier Add using OBIF & RRUW',3),
 (61,'4th Carrier Add New Cabinet (lub over ATM)',3),
 (62,'4th Carrier Add New Cabinet (lub over IP)',3),
 (63,'4th Carrier Add OBIF Split-Power Config',3),
 (64,'5th Carrier Add Cable crossover (lub over ATM)',3),
 (65,'5th Carrier Add Cable Crossover (lub over IP)',3),
 (66,'5th Carrier Add using OBIF & RRUW',3),
 (67,'Add Sector',3),
 (68,'Delete Sector',3),
 (69,'ET-MFX Board Add (Node-B)',3),
 (70,'EUL Mismatch',3),
 (71,'GBP Board Add/Upgrade',3),
 (72,'IUB Mismatch',3),
 (73,'Iub over IP - ET-MFX Board Install W/Cable verification',3),
 (74,'Iub over IP - ET-MFX Board Expansion',3),
 (75,'Iub over IP - External and Internal Cable Install/Monitoring',3),
 (76,'Iub over IP - ATM to IP Mirgraton',3),
 (77,'IuCS Expansion/Add/Rehome',3),
 (78,'IuPS Expansion/Add/Rehome',3),
 (79,'Iur Expansion/Add',3),
 (80,'Iur over IP - ATM to IP Migration',3),
 (81,'IuPS over IP - ATM to IP Migration',3),
 (82,'IuPS over IP - RNC Harware Migration - Night2',3),
 (83,'IuPS over IP SGSN/RNC in Pool',3),
 (84,'Node B physical Rebalance',3),
 (85,'T1 Add',3),
 (86,'LKF',3),
 (87,'TX/RAX Board Add',3),
 (88,'Frequency Retune',4),
 (89,'Special Events',4),
 (90,'Optimization',4),
 (91,'Tuning',4),
 (92,'CTR Scheduling',5),
 (93,'UETR Scheduling',5),
 (94,'CM Bulk Request',5),
 (95,'RET Change/Update Implementation',5),
 (96,'Parameter Update',5),
 (97,'Neighbor Implementation - Create/Update/Delete',5),
 (98,'UETR Log File Request',5),
 (99,'WNCS Schedule',5),
 (100,'MRR Schedule',5),
 (101,'Maintainence Window',5),
 (102,'UETS Dump',5),
 (103,'GPEH Schedule',5),
 (123,'eNodeB',31),
 (124,'MME',31),
 (125,'OSS',31),
 (126,'NodeB',29),
 (127,'RNC',29),
 (128,'OSS',29),
 (129,'MGW',29),
 (130,'MSC Server',29),
 (131,'HLR',29),
 (132,'SCP',29),
 (133,'STP',29),
 (134,'MSN',29),
 (135,'SGSN',29),
 (136,'GGSN',29),
 (137,'BTS',30),
 (138,'BSC',30),
 (139,'MSC',30),
 (140,'HLR',30),
 (141,'SCP',30),
 (142,'STP',30),
 (143,'MGW',30),
 (144,'SGSN',30),
 (145,'GGSN',30),
 (146,'RNC',32),
 (147,'BTS',32),
 (148,'BSC',32),
 (149,'MSC',32),
 (150,'HLR',32),
 (151,'SCP',32),
 (152,'STP',32),
 (153,'MGW',32),
 (154,'SGSN',32),
 (155,'GGSN',32),
 (156,'Data Freeze',1),
 (157,'Data Freeze',2),
 (158,'Data Freeze',3),
 (159,'Data Freeze',4),
 (160,'Data Freeze',5),
 (161,'MOP Creation',1),
 (162,'MOP Creation',2),
 (163,'MOP Creation',3),
 (164,'MOP Creation',4),
 (165,'MOP Creation',5);
/*!40000 ALTER TABLE `snj_scope_of_works` ENABLE KEYS */;


--
-- Definition of table `snjs`
--

DROP TABLE IF EXISTS `snjs`;
CREATE TABLE `snjs` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `snjs`
--

/*!40000 ALTER TABLE `snjs` DISABLE KEYS */;
/*!40000 ALTER TABLE `snjs` ENABLE KEYS */;


DROP TABLE IF EXISTS `target`;
CREATE TABLE `target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(45) NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `customer` varchar(45) NOT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_target1` (`name`,`type`,`ipaddress`,`customer`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

/*!40000 ALTER TABLE `target` DISABLE KEYS */;
INSERT INTO `target` (`id`,`name`,`type`,`ipaddress`,`password`,`customer`,`flag`) VALUES 
 (1,'ATTOSS34','OSS','107.20.83.172',NULL,'AT&T',NULL),
 (2,'IPLYINCPCRBR09','RNC','10.20.20.9',NULL,'AT&T',NULL),
 (3,'INU2291','NodeB','10.20.20.91',NULL,'AT&T',NULL),
 (4,'JAGUAR','OSS','172.18.83.253',NULL,'AT&T',NULL),
 (5,'RNC15','RNC','10.123.57.10',NULL,'AT&T',NULL),
 (6,'RBS36','NodeB','10.123.88.33',NULL,'AT&T',NULL),
 (7,'RNC5','RNC','10.123.57.6',NULL,'AT&T',NULL),
 (8,'RBS26','NodeB','10.123.91.26',NULL,'AT&T',NULL);
/*!40000 ALTER TABLE `target` ENABLE KEYS */;


--
-- Definition of table `target_parent`
--

DROP TABLE IF EXISTS `target_parent`;
CREATE TABLE `target_parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `node_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target_parent`
--

/*!40000 ALTER TABLE `target_parent` DISABLE KEYS */;
INSERT INTO `target_parent` (`id`,`node_id`,`parent_id`) VALUES 
 (1,3,2),
 (2,2,1),
 (3,6,5),
 (4,5,4),
 (5,8,7),
 (6,7,4);
/*!40000 ALTER TABLE `target_parent` ENABLE KEYS */;


--
-- Definition of table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_tasks` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `activity_type` varchar(45) DEFAULT NULL,
  `rev_no` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `maintenance_window_start_date` date DEFAULT NULL,
  `maintenance_window_end_date` date DEFAULT NULL,
  `maintenance_window_start_time` time DEFAULT NULL,
  `maintenance_window_end_time` time DEFAULT NULL,
  `modifier_name` varchar(45) DEFAULT NULL,
  `modifier_signum` varchar(45) DEFAULT NULL,
  `modifier_timestamp` datetime DEFAULT NULL,
  `ticket_conflict_status` tinyint(1) DEFAULT NULL,
  `ticket_status` int(11) DEFAULT NULL,
  `outage` tinyint(1) DEFAULT NULL,
  `mop_id` int(11) NOT NULL,
  `node_granularity` varchar(45) DEFAULT NULL,
  `reparenting_activity` tinyint(1) DEFAULT NULL,
  `parallel_activity` tinyint(1) DEFAULT NULL,
  `node_name` varchar(45) DEFAULT NULL,
  `job_rev_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tasks`),
  KEY `pid` (`job_id`),
  KEY `mop_id` (`mop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1072 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id_tasks`,`job_id`,`task_id`,`activity_type`,`rev_no`,`start_date`,`end_date`,`start_time`,`end_time`,`maintenance_window_start_date`,`maintenance_window_end_date`,`maintenance_window_start_time`,`maintenance_window_end_time`,`modifier_name`,`modifier_signum`,`modifier_timestamp`,`ticket_conflict_status`,`ticket_status`,`outage`,`mop_id`,`node_granularity`,`reparenting_activity`,`parallel_activity`,`node_name`,`job_rev_no`) VALUES 
 (1071,1,1,NULL,1,'2012-01-23','2012-01-23','20:00:00','21:00:00','0000-00-00','0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,0,'RBS26','0');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;


--
-- Definition of trigger `taskstrigger`
--

DROP TRIGGER /*!50030 IF EXISTS */ `taskstrigger`;

DELIMITER $$

CREATE TRIGGER `taskstrigger` BEFORE INSERT ON `tasks` FOR EACH ROW BEGIN

    DECLARE var_conflict_count_start_time INTEGER;

    DECLARE var_conflict_count_end_time INTEGER;

    DECLARE var_job_rev_no INTEGER;
    
    DECLARE jobid INTEGER;
    
    DECLARE taskid INTEGER;

    IF NEW.parallel_activity < 1 THEN
    
        SELECT count(*)

        INTO var_conflict_count_start_time

        FROM tasks

        WHERE (start_time <= NEW.start_time)

            AND (end_time >= NEW.start_time)

            AND (start_date >= NEW.start_date)

            AND (end_date <= NEW.end_date)

            AND node_name = NEW.node_name
            
            ORDER BY rev_no
            
            LIMIT 0,1;

           

        SELECT count(*)

        INTO var_conflict_count_end_time

        FROM tasks

        WHERE (start_time <= NEW.end_time)

            AND (end_time >= new.end_time)

            AND (start_date >= NEW.start_date)

            AND (end_date <= NEW.end_date)

            AND node_name = NEW.node_name
            
            ORDER BY rev_no
            
            LIMIT 0,1;
           

        IF var_conflict_count_start_time > 0 THEN

       

            SELECT max(rev_no)

            INTO var_job_rev_no

            FROM jobs

            WHERE job_id = NEW.job_id;
            
            
            SELECT job_id

            INTO jobid

            FROM tasks

            WHERE (start_time <= NEW.start_time)

            AND (end_time >= NEW.start_time)

            AND (start_date >= NEW.start_date)

            AND (end_date <= NEW.end_date)

            AND node_name = NEW.node_name
            
            ORDER BY rev_no
            
            LIMIT 0,1;
            
            
            SELECT task_id

            INTO taskid

            FROM tasks

            WHERE (start_time <= NEW.start_time)

            AND (end_time >= NEW.start_time)

            AND (start_date >= NEW.start_date)

            AND (end_date <= NEW.end_date)

            AND node_name = NEW.node_name
            
            ORDER BY rev_no
            
            LIMIT 0,1;

           

            INSERT INTO node_conflicts (job_id, conflicting_job_id, task_id, ticket_conflict_status, job_rev_no, task_rev_no, node_name)

            VALUES (NEW.job_id, jobid, NEW.task_id, '1', var_job_rev_no, NEW.rev_no, NEW.node_name);

           

        END IF;

       

        IF var_conflict_count_end_time > 0 THEN

           

            SELECT max(rev_no)

            INTO var_job_rev_no

            FROM jobs

            WHERE job_id = NEW.job_id;

           

            SELECT jobid
    
            INTO jobid

            FROM tasks

            WHERE (start_time <= NEW.end_time)

            AND (end_time >= new.end_time)

            AND (start_date >= NEW.start_date)

            AND (end_date <= NEW.end_date)

            AND node_name = NEW.node_name
            
            ORDER BY rev_no
            
            LIMIT 0,1;
            
            SELECT task_id
            INTO taskid
            FROM tasks
            WHERE node_name = NEW.node_name
            ORDER BY rev_no
            LIMIT 0,1;

           

            INSERT INTO node_conflicts (job_id, conflicting_job_id, task_id, ticket_conflict_status, job_rev_no, task_rev_no, node_name)

            VALUES (NEW.job_id, jobid, NEW.task_id, '1', var_job_rev_no, NEW.rev_no, NEW.node_name);
       

        END IF;

   END IF;

END $$

DELIMITER ;

--
-- Definition of table `temp_target`
--

DROP TABLE IF EXISTS `temp_target`;
CREATE TABLE `temp_target` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(45) NOT NULL,
  `ipaddress` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `customer` varchar(45) NOT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_target1` (`name`,`type`,`ipaddress`,`customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_target`
--

/*!40000 ALTER TABLE `temp_target` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_target` ENABLE KEYS */;


--
-- Definition of table `uploadexcelrecords`
--

DROP TABLE IF EXISTS `uploadexcelrecords`;
CREATE TABLE `uploadexcelrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `date_created` date NOT NULL COMMENT 'Date',
  `created_by` varchar(50) DEFAULT NULL COMMENT 'Signum',
  `filetype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadexcelrecords`
--

/*!40000 ALTER TABLE `uploadexcelrecords` DISABLE KEYS */;
INSERT INTO `uploadexcelrecords` (`id`,`date_created`,`created_by`,`filetype`) VALUES 
 (217,'2011-09-12','emaaral','Market Launch'),
 (218,'2011-09-12','emaaral','Post Activity Check');
/*!40000 ALTER TABLE `uploadexcelrecords` ENABLE KEYS */;

--
-- Definition of procedure `getAvailability`
--

DROP PROCEDURE IF EXISTS `getAvailability`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE PROCEDURE `getAvailability`(signum varchar(45),_startdate date, _enddate date, _starttime time, _endtime time)
BEGIN
declare user_count int default 0;
declare _availability int default 100;
declare occupied int default 0;
select count(*) into user_count from resources where user_signum = signum;

if user_count > 0 then
    select sum(availability) into occupied from resource where user_signum = signum and ((_starttime() between start_time and end_time) or (_endtime() between start_time and end_time)) and ((_startdate between start_date and end_date) or (_enddate between start_date and end_date));
    set _availability = _availability - occupied;
end if;
select distinct signum, _availability from resource where user_signum = signum;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `getDependencyDD`
--

DROP PROCEDURE IF EXISTS `getDependencyDD`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE PROCEDURE `getDependencyDD`(idsnj int(11))
BEGIN
SELECT * FROM snj_scope_of_work WHERE idsnj_dd_fk = idsnj;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of view `viewavailabilitypercentage`
--

DROP TABLE IF EXISTS `viewavailabilitypercentage`;
DROP VIEW IF EXISTS `viewavailabilitypercentage`;
CREATE VIEW `viewavailabilitypercentage` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 12);

--
-- Definition of view `viewcalendars`
--

DROP TABLE IF EXISTS `viewcalendars`;
DROP VIEW IF EXISTS `viewcalendars`;
CREATE VIEW `viewcalendars` AS select `j`.`job_id` AS `Job_Id`,`t`.`task_id` AS `task_id`,`j`.`date_created` AS `datecreated`,`j`.`Signum` AS `createdby`,`j`.`Organization` AS `organization`,`j`.`customer` AS `customer`,`j`.`Region` AS `region`,`t`.`start_date` AS `start_date`,`t`.`end_date` AS `end_date`,`t`.`start_time` AS `start_time`,`t`.`end_time` AS `end_time`,`t`.`ticket_conflict_status` AS `ticket_conflict_status`,`t`.`ticket_status` AS `ticket_status`,`t`.`node_name` AS `node_name`,`r`.`resource_name` AS `resource_name` from ((`jobs` `j` join `tasks` `t`) join `resources` `r`) where ((`j`.`job_id` = `t`.`job_id`) and (`t`.`task_id` = `r`.`task_id`) and (`r`.`job_id` = `j`.`job_id`));

--
-- Definition of view `viewcustomer`
--

DROP TABLE IF EXISTS `viewcustomer`;
DROP VIEW IF EXISTS `viewcustomer`;
CREATE VIEW `viewcustomer` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 13);

--
-- Definition of view `viewjobstatus`
--

DROP TABLE IF EXISTS `viewjobstatus`;
DROP VIEW IF EXISTS `viewjobstatus`;
CREATE VIEW `viewjobstatus` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 10);

--
-- Definition of view `viewlocation`
--

DROP TABLE IF EXISTS `viewlocation`;
DROP VIEW IF EXISTS `viewlocation`;
CREATE VIEW `viewlocation` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 11);

--
-- Definition of view `viewnodeentrytype`
--

DROP TABLE IF EXISTS `viewnodeentrytype`;
DROP VIEW IF EXISTS `viewnodeentrytype`;
CREATE VIEW `viewnodeentrytype` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 4);

--
-- Definition of view `vieworganization`
--

DROP TABLE IF EXISTS `vieworganization`;
DROP VIEW IF EXISTS `vieworganization`;
CREATE VIEW `vieworganization` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 1);

--
-- Definition of view `viewregion`
--

DROP TABLE IF EXISTS `viewregion`;
DROP VIEW IF EXISTS `viewregion`;
CREATE VIEW `viewregion` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 3);

--
-- Definition of view `viewrequesttype`
--

DROP TABLE IF EXISTS `viewrequesttype`;
DROP VIEW IF EXISTS `viewrequesttype`;
CREATE VIEW `viewrequesttype` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 7);

--
-- Definition of view `viewtechnology`
--

DROP TABLE IF EXISTS `viewtechnology`;
DROP VIEW IF EXISTS `viewtechnology`;
CREATE VIEW `viewtechnology` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 6);

--
-- Definition of view `viewticketconflictstatus`
--

DROP TABLE IF EXISTS `viewticketconflictstatus`;
DROP VIEW IF EXISTS `viewticketconflictstatus`;
CREATE VIEW `viewticketconflictstatus` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 9);

--
-- Definition of view `viewworkdaytime`
--

DROP TABLE IF EXISTS `viewworkdaytime`;
DROP VIEW IF EXISTS `viewworkdaytime`;
CREATE VIEW `viewworkdaytime` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 5);

--
-- Definition of view `viewworklocation`
--

DROP TABLE IF EXISTS `viewworklocation`;
DROP VIEW IF EXISTS `viewworklocation`;
CREATE VIEW `viewworklocation` AS select `snj_dd`.`idsnj_dd` AS `idsnj_dd`,`snj_dd`.`dd_description` AS `dd_description`,`snj_dd`.`dd_type` AS `dd_type` from `snj_dd` where (`snj_dd`.`dd_type` = 2);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
