-- MySQL dump 10.13  Distrib 8.0.31, for Linux (x86_64)
--
-- Host: localhost    Database: studentportal
-- ------------------------------------------------------
-- Server version	8.0.31-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `studentportal`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `studentportal` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `studentportal`;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcements` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_eid` int NOT NULL,
  `a_day` int NOT NULL,
  `a_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `a_office` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `a_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `a_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
INSERT INTO `announcements` VALUES (1,827,5,'November','Admin','Welcome to CSTA!','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'),(2,831,4,'November','Admin','Midterm exam is this week please settle your accounts.','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'),(3,89,31,'October','Admin','Final defense is on nov 26!','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.');
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assessment`
--

DROP TABLE IF EXISTS `assessment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `assessment` (
  `assess_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `sid` int unsigned NOT NULL,
  `schoolyr_ID` tinyint unsigned NOT NULL,
  `semester_ID` tinyint unsigned NOT NULL,
  `dept_ID` tinyint NOT NULL,
  `date_submitted` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`assess_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assessment`
--

LOCK TABLES `assessment` WRITE;
/*!40000 ALTER TABLE `assessment` DISABLE KEYS */;
INSERT INTO `assessment` VALUES (46,22,3,3,0,'2022-08-31 10:25:07','Pending'),(50,23,3,3,0,'2022-08-31 10:50:49','Pending');
/*!40000 ALTER TABLE `assessment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat_message` (
  `chat_message_id` int NOT NULL AUTO_INCREMENT,
  `to_user_id` int NOT NULL,
  `from_user_id` int NOT NULL,
  `chat_message` mediumtext NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clearance`
--

DROP TABLE IF EXISTS `clearance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clearance` (
  `clr_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `reqdoc_ID` int NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Sent',
  PRIMARY KEY (`clr_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clearance`
--

LOCK TABLES `clearance` WRITE;
/*!40000 ALTER TABLE `clearance` DISABLE KEYS */;
INSERT INTO `clearance` VALUES (3,39,5,'Sent');
/*!40000 ALTER TABLE `clearance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_tesda`
--

DROP TABLE IF EXISTS `course_tesda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_tesda` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `course` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_tesda`
--

LOCK TABLES `course_tesda` WRITE;
/*!40000 ALTER TABLE `course_tesda` DISABLE KEYS */;
INSERT INTO `course_tesda` VALUES (1,'Bartending NCII'),(2,'Bread and Pastry Production NCII'),(3,'Food and Bevarage Services NCII'),(4,'Front Office Servcies NCII'),(5,'Housekeeping NCII'),(6,'Tourguiding NCII'),(7,'Cookery NCII'),(8,'Caregiving NCII');
/*!40000 ALTER TABLE `course_tesda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `deptid` tinyint NOT NULL,
  `abbr` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `visible` varchar(20) NOT NULL DEFAULT 'VISIBLE',
  PRIMARY KEY (`course_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,1,'NA','Not Applicable','INVISIBLE'),(2,3,'BSED ENG','Bachelor of Science in Secondary Education Major in English','VISIBLE'),(3,3,'BSED FIL','Bachelor Of Science In Secondary Education Major In Filipino','VISIBLE'),(4,3,'BSED MATH','Bachelor Of Science In Secondary Education Major In Math','VISIBLE'),(5,3,'BSED SOCSCI','Bachelor Of Science In Secondary Education Major In Social Sciences','VISIBLE'),(6,1,'BSIT','Bachelor of Science in Information Technology','VISIBLE'),(7,2,'BSHM','Bachelor of Science in Hospitality Management','VISIBLE'),(8,2,'BSTM','Bachelor of Science in Tourismm','VISIBLE'),(9,2,'BSHRM','Bachelor of Science in Hotel and Restaurant Management','VISIBLE'),(10,3,'BSED GEN','Bachelor Of Science In Elementary Education Major In General','VISIBLE');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctc_authentication`
--

DROP TABLE IF EXISTS `ctc_authentication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ctc_authentication` (
  `id` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `document` varchar(100) NOT NULL,
  `isActive` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctc_authentication`
--

LOCK TABLES `ctc_authentication` WRITE;
/*!40000 ALTER TABLE `ctc_authentication` DISABLE KEYS */;
INSERT INTO `ctc_authentication` VALUES (1,'Transcript of Records',1),(2,'Diploma',1),(3,'Certification/s',1);
/*!40000 ALTER TABLE `ctc_authentication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `deptid` int unsigned NOT NULL AUTO_INCREMENT,
  `dept` varchar(68) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'School Of Information Technology','SIT@email.com'),(2,'School Of Hospitality And Tourism Management','HM@email.com'),(3,'School Of Education','EDUC@email.com'),(4,NULL,NULL);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docreq`
--

DROP TABLE IF EXISTS `docreq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docreq` (
  `docreq_ID` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `course_ID` int NOT NULL,
  `year_graduated` varchar(10) NOT NULL,
  `lastschool` varchar(255) NOT NULL,
  `requesteddocs` blob NOT NULL,
  `purpose` blob NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'PENDING',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`docreq_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docreq`
--

LOCK TABLES `docreq` WRITE;
/*!40000 ALTER TABLE `docreq` DISABLE KEYS */;
INSERT INTO `docreq` VALUES (10,22,7,'2021-2022','STI College Novaliches',_binary 'Graduation Certificate',_binary 'Employment Purposes','PENDING','2022-06-14 09:49:49');
/*!40000 ALTER TABLE `docreq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `docreq_purpose`
--

DROP TABLE IF EXISTS `docreq_purpose`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `docreq_purpose` (
  `purpose_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `purpose` varchar(100) NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`purpose_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docreq_purpose`
--

LOCK TABLES `docreq_purpose` WRITE;
/*!40000 ALTER TABLE `docreq_purpose` DISABLE KEYS */;
INSERT INTO `docreq_purpose` VALUES (1,'Employment Purposes',1),(2,'Transfer/Evaluation Purposes',1),(3,'Visa/Immigration',1);
/*!40000 ALTER TABLE `docreq_purpose` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `doc_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `doc` varchar(255) NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`doc_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
INSERT INTO `documents` VALUES (1,'Completion/Graduation',1),(2,'Course Description',1),(3,'Endorsement Letter for CAV (Certification, Authentication, Verification)',1),(5,'English as Medium of Instruction',1),(6,'Enrollment',1),(7,'General Weighted Average(GWA)',1),(8,'Good Moral Character',1),(9,'Honorable Dismissal',1);
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `empnum` varchar(255) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `mname` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `office` varchar(100) NOT NULL,
  `dept_ID` tinyint DEFAULT NULL,
  `position` varchar(68) NOT NULL,
  `permission_ID` tinyint unsigned NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `pass` varchar(128) DEFAULT NULL,
  `isActive` varchar(3) NOT NULL DEFAULT 'Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=832 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (89,'','Bonifacio','Andres','S','harold@gmail.com','Female','09155494035','Dean',2,'Clerk',1,'ailataruc','6cfa702d39a278358b3e4e515365a93a4196c287','Yes'),(827,'','Munoz','Jason','Beltran','jasonwafuu@gmail.com','Female','09613397412','Dean',1,'Vice President',1,'jmunoz','6cfa702d39a278358b3e4e515365a93a4196c287','Yes'),(831,'','Jackson','Michael','Napoles','dsdasd@email.com','Male','09872323231','Registrar',3,'President',1,'employee123','2f4de0eff521909e5d183c7ab872a94560fccc28','Yes');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment` (
  `enrollment_ID` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `snum` varchar(8) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `yrlevel_ID` int DEFAULT '1',
  `dept_ID` int NOT NULL,
  `course_ID` int NOT NULL,
  `schoolyr_ID` int NOT NULL,
  `semester_ID` int NOT NULL,
  `date_enrolled` datetime DEFAULT NULL,
  `date_assessed` datetime DEFAULT NULL,
  `enrollment_status` varchar(20) NOT NULL DEFAULT 'Assessment',
  PRIMARY KEY (`enrollment_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` VALUES (224,39,'20-14789','09613397412',1,1,6,2,3,'2022-10-24 06:25:56',NULL,'Validating');
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_switch`
--

DROP TABLE IF EXISTS `enrollment_switch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_switch` (
  `switch_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `enrollment_status` varchar(6) NOT NULL,
  PRIMARY KEY (`switch_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_switch`
--

LOCK TABLES `enrollment_switch` WRITE;
/*!40000 ALTER TABLE `enrollment_switch` DISABLE KEYS */;
INSERT INTO `enrollment_switch` VALUES (1,'OPEN');
/*!40000 ALTER TABLE `enrollment_switch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment_validation`
--

DROP TABLE IF EXISTS `enrollment_validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment_validation` (
  `ev_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `schoolyr_ID` int NOT NULL,
  `semester_ID` tinyint NOT NULL,
  `date_sent` datetime DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ev_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment_validation`
--

LOCK TABLES `enrollment_validation` WRITE;
/*!40000 ALTER TABLE `enrollment_validation` DISABLE KEYS */;
INSERT INTO `enrollment_validation` VALUES (18,39,2,3,'2022-10-23 10:50:23','Pending');
/*!40000 ALTER TABLE `enrollment_validation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gradereq`
--

DROP TABLE IF EXISTS `gradereq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gradereq` (
  `gradereq_ID` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `schoolyr` varchar(9) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `date_req` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`gradereq_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gradereq`
--

LOCK TABLES `gradereq` WRITE;
/*!40000 ALTER TABLE `gradereq` DISABLE KEYS */;
INSERT INTO `gradereq` VALUES (63,39,'2022-2023','First Semester','2022-10-20 10:23:58','Pending'),(65,39,' 2022-202','Second Semester','2022-10-26 01:59:24','Pending');
/*!40000 ALTER TABLE `gradereq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_enrollment`
--

DROP TABLE IF EXISTS `guest_enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest_enrollment` (
  `gid` int unsigned NOT NULL AUTO_INCREMENT,
  `enroll_no` varchar(10) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) DEFAULT NULL,
  `maiden_name` varchar(100) NOT NULL DEFAULT '-',
  `citizenship` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `birthplace` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cityadd` varchar(255) NOT NULL,
  `region` varchar(10) NOT NULL,
  `province` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `brgy` varchar(10) NOT NULL,
  `guardian` varchar(255) NOT NULL,
  `g_contact` varchar(11) NOT NULL,
  `app_status` varchar(255) NOT NULL,
  `course_ID` tinyint DEFAULT NULL,
  `previous_deg` varchar(255) DEFAULT NULL,
  `sub_to_enroll` varchar(255) DEFAULT NULL,
  `non_degree` varchar(255) DEFAULT NULL,
  `enrollment_status` varchar(50) DEFAULT 'Pending',
  `date_submitted` datetime DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_enrollment`
--

LOCK TABLES `guest_enrollment` WRITE;
/*!40000 ALTER TABLE `guest_enrollment` DISABLE KEYS */;
INSERT INTO `guest_enrollment` VALUES (16,'1713586092','Taruc','Aila Marie','Boncacas','','Filipino','Male','Single','2001-03-22 00:00:00','Caloocan City','09155494035','tarucailamarie22@gmail.com','Blk 2 Lot 16 Narra St. Llano Rd.','13','1375','137501','137501001','Marites Taruc','09323232323','Cross-Enrollee',1,'','Hekasi','-','Pending','2022-10-31 08:08:14');
/*!40000 ALTER TABLE `guest_enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_payments`
--

DROP TABLE IF EXISTS `guest_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest_payments` (
  `gpid` int NOT NULL AUTO_INCREMENT,
  `guest_fileName` varchar(100) NOT NULL,
  `guest_fileImage` varchar(100) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_fullName` varchar(255) NOT NULL,
  PRIMARY KEY (`gpid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_payments`
--

LOCK TABLES `guest_payments` WRITE;
/*!40000 ALTER TABLE `guest_payments` DISABLE KEYS */;
INSERT INTO `guest_payments` VALUES (6,'1million_dollars','1million_dollars.jpg','ericnewman@gmail.com','Eric A. Newman');
/*!40000 ALTER TABLE `guest_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_register_tesda`
--

DROP TABLE IF EXISTS `guest_register_tesda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest_register_tesda` (
  `gid` int NOT NULL AUTO_INCREMENT,
  `guest_first_name` varchar(100) NOT NULL,
  `guest_last_name` varchar(100) NOT NULL,
  `guest_middle_name` varchar(100) NOT NULL,
  `guest_suffix` varchar(10) NOT NULL,
  `guest_address` varchar(255) NOT NULL,
  `guest_email` varchar(255) NOT NULL,
  `guest_mobile` varchar(11) NOT NULL,
  `guest_telephone` varchar(11) NOT NULL,
  `guest_course` varchar(100) NOT NULL,
  `guest_guardian` varchar(255) NOT NULL,
  `guest_guardian_no` varchar(11) NOT NULL,
  `guest_guardian_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_register_tesda`
--

LOCK TABLES `guest_register_tesda` WRITE;
/*!40000 ALTER TABLE `guest_register_tesda` DISABLE KEYS */;
INSERT INTO `guest_register_tesda` VALUES (2,'John','Doe','','I','Robert Robertson, 1234 NW Bobcat Lane, St. Robert, MO 65584-5678.','johndoe@mail.com','09123456789','9907687','4','Albert Breadcrumbs','09123456789','albertcrumbs@mail.com');
/*!40000 ALTER TABLE `guest_register_tesda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_details`
--

DROP TABLE IF EXISTS `login_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login_details` (
  `login_details_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL,
  PRIMARY KEY (`login_details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_details`
--

LOCK TABLES `login_details` WRITE;
/*!40000 ALTER TABLE `login_details` DISABLE KEYS */;
INSERT INTO `login_details` VALUES (1,22,'2022-06-28 10:44:24','no'),(2,22,'2022-06-22 07:41:35','no'),(3,23,'2022-06-22 07:03:17','no'),(4,22,'2022-06-22 09:06:29','no'),(5,23,'2022-06-22 09:46:45','no'),(6,22,'2022-06-23 15:32:49','no'),(7,24,'2022-06-22 09:47:33','no'),(8,23,'2022-06-23 15:31:39','no'),(9,22,'2022-06-24 06:26:38','no'),(10,22,'2022-06-27 04:33:23','no'),(11,23,'2022-06-27 04:33:57','no'),(12,22,'2022-06-27 05:06:15','no'),(13,23,'2022-06-27 05:06:57','no'),(14,24,'2022-06-27 05:15:04','no'),(15,22,'2022-06-27 05:23:16','no'),(16,23,'2022-06-27 15:21:31','no'),(17,23,'2022-06-27 15:24:13','no'),(18,23,'2022-06-27 15:29:20','no'),(19,23,'2022-06-27 15:47:57','no'),(20,22,'2022-06-30 04:41:55','no'),(21,23,'2022-06-29 12:59:47','no'),(22,23,'2022-06-29 13:28:58','no'),(23,23,'2022-06-29 15:03:09','no'),(24,23,'2022-06-29 17:45:40','no'),(25,23,'2022-06-30 01:50:34','no'),(26,23,'2022-06-30 06:30:30','no'),(27,22,'2022-06-30 06:37:47','no'),(28,22,'2022-06-30 06:39:32','no'),(29,25,'2022-06-30 10:37:08','no'),(30,22,'2022-06-30 14:19:41','no'),(31,26,'2022-06-30 11:25:04','no'),(32,25,'2022-06-30 11:24:39','no'),(33,23,'2022-06-30 11:24:22','no'),(34,23,'2022-06-30 13:42:21','no'),(35,26,'2022-06-30 14:19:44','no'),(36,26,'2022-07-01 10:25:04','no'),(37,22,'2022-07-01 15:20:35','yes'),(38,25,'2022-07-01 12:47:53','no'),(39,22,'2022-07-09 13:22:13','no'),(40,23,'2022-07-09 13:16:58','no'),(41,25,'2022-07-09 13:26:19','no'),(42,22,'2022-07-09 13:27:32','no'),(43,22,'2022-07-09 13:35:16','yes'),(45,25,'2022-07-09 14:09:45','no'),(46,22,'2022-07-10 06:55:39','no'),(47,23,'2022-07-10 06:59:34','no');
/*!40000 ALTER TABLE `login_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `note_Id` int NOT NULL AUTO_INCREMENT,
  `note_snum` varchar(255) NOT NULL,
  `note_text` varchar(255) NOT NULL,
  PRIMARY KEY (`note_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'19-14677','Do python later 13:00'),(2,'19-14677','Learn JavaScript');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notif`
--

DROP TABLE IF EXISTS `notif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notif` (
  `notif_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `notification` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `isSeen` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`notif_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notif`
--

LOCK TABLES `notif` WRITE;
/*!40000 ALTER TABLE `notif` DISABLE KEYS */;
INSERT INTO `notif` VALUES (21,39,'You are now in queue for assessment.','fas fa-check text-white','enrollment.php','2022-10-24 06:25:56',1),(23,39,'Please check your email for your assessment form.','fas fa-check text-white','#','2022-10-26 08:47:20',1);
/*!40000 ALTER TABLE `notif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `particulars`
--

DROP TABLE IF EXISTS `particulars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `particulars` (
  `particular_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `particular` varchar(255) NOT NULL,
  `isActive` varchar(8) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`particular_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `particulars`
--

LOCK TABLES `particulars` WRITE;
/*!40000 ALTER TABLE `particulars` DISABLE KEYS */;
INSERT INTO `particulars` VALUES (1,'Transcript of Records','Active'),(2,'Certification','Active'),(3,'Docs Stamp','Active'),(4,'Graduation Fee','Active'),(5,'Thesis Defense Fee (CAP0)','Active'),(6,'OJT (Caregiving NCII)','Active'),(8,'Statement Of Account','Active'),(20,'Thesis Defense Fee (CAP1)','Active'),(21,'Thesis Defense Fee (CAP2)','Active');
/*!40000 ALTER TABLE `particulars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymentverif`
--

DROP TABLE IF EXISTS `paymentverif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymentverif` (
  `pv_ID` int NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `date_of_payment` datetime NOT NULL,
  `time_of_payment` time NOT NULL,
  `schoolyr` varchar(100) NOT NULL,
  `semester_ID` tinyint NOT NULL DEFAULT '1',
  `terms_ID` tinyint NOT NULL DEFAULT '1',
  `tfeeamount` decimal(7,2) DEFAULT NULL,
  `particulars` varchar(255) NOT NULL,
  `particulars_total` decimal(7,2) DEFAULT NULL,
  `sentvia_ID` tinyint NOT NULL,
  `paymethod_ID` tinyint NOT NULL,
  `note` blob,
  `gtotal` decimal(7,2) NOT NULL,
  `amtpaid` decimal(7,2) NOT NULL,
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `date_sent` datetime NOT NULL,
  `date_acknowledged` datetime DEFAULT NULL,
  `verif_code` varchar(100) DEFAULT NULL,
  `date_verified` datetime DEFAULT NULL,
  `OR_num` varchar(64) DEFAULT NULL,
  `AR_num` varchar(64) DEFAULT NULL,
  `remarks` varchar(64) DEFAULT NULL,
  `date_completed` datetime DEFAULT NULL,
  PRIMARY KEY (`pv_ID`),
  KEY `paymentverifverif_idx_sid` (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymentverif`
--

LOCK TABLES `paymentverif` WRITE;
/*!40000 ALTER TABLE `paymentverif` DISABLE KEYS */;
INSERT INTO `paymentverif` VALUES (48,39,'2022-09-30 00:00:00','15:15:54','2021-2022',2,2,15000.00,'Docs Stamp',200.00,2,2,_binary 'etlog duduy',15200.00,15200.00,'Verified','2022-09-30 03:11:03','2022-10-09 02:42:16','sdww2111','2022-10-11 09:20:02','23232323','NA','Done','2022-10-26 08:35:36');
/*!40000 ALTER TABLE `paymentverif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paymethod`
--

DROP TABLE IF EXISTS `paymethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paymethod` (
  `paymethod_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `paymethod` varchar(68) NOT NULL,
  `isActive` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`paymethod_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paymethod`
--

LOCK TABLES `paymethod` WRITE;
/*!40000 ALTER TABLE `paymethod` DISABLE KEYS */;
INSERT INTO `paymethod` VALUES (1,'Online Banking','ACTIVE'),(2,'Cash Deposit','ACTIVE');
/*!40000 ALTER TABLE `paymethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pwdreset`
--

DROP TABLE IF EXISTS `pwdreset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pwdreset` (
  `pwdresetID` int NOT NULL AUTO_INCREMENT,
  `pwdresetEmail` text NOT NULL,
  `pwdresetSelector` text NOT NULL,
  `pwdresetToken` longtext NOT NULL,
  `pwdresetExpires` text NOT NULL,
  PRIMARY KEY (`pwdresetID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pwdreset`
--

LOCK TABLES `pwdreset` WRITE;
/*!40000 ALTER TABLE `pwdreset` DISABLE KEYS */;
/*!40000 ALTER TABLE `pwdreset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refbrgy`
--

DROP TABLE IF EXISTS `refbrgy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refbrgy` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brgyCode` varchar(255) DEFAULT NULL,
  `brgyDesc` text,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42030 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refbrgy`
--

LOCK TABLES `refbrgy` WRITE;
/*!40000 ALTER TABLE `refbrgy` DISABLE KEYS */;
INSERT INTO `refbrgy` VALUES (38318,'150704021','Upper Garlayan','15','1507','150704'),(38319,'150705001','Bacung','15','1507','150705'),(38320,'150705002','Benembengan Lower','15','1507','150705'),(38321,'150705006','Buli-buli','15','1507','150705'),(38322,'150705007','Cabcaban','15','1507','150705'),(38323,'150705010','Guiong','15','1507','150705'),(38324,'150705013','Manaul','15','1507','150705'),(38325,'150705014','Mangal (Pob.)','15','1507','150705'),(38326,'150705019','Sumisip Central','15','1507','150705'),(38327,'150705022','Tumahubong','15','1507','150705'),(38328,'150705024','Libug','15','1507','150705'),(38329,'150705025','Tongsengal','15','1507','150705'),(38330,'150705027','Baiwas','15','1507','150705'),(38331,'150705028','Basak','15','1507','150705'),(38332,'150705029','Cabengbeng Lower','15','1507','150705'),(38333,'150705030','Cabengbeng Upper','15','1507','150705'),(38334,'150705031','Luuk-Bait','15','1507','150705'),(38335,'150705032','Mahatalang','15','1507','150705'),(38336,'150705035','Benembengan Upper','15','1507','150705'),(38337,'150705036','Bohe-languyan','15','1507','150705'),(38338,'150705039','Ettub-ettub','15','1507','150705'),(38339,'150705041','Kaum-Air','15','1507','150705'),(38340,'150705042','Limbocandis','15','1507','150705'),(38341,'150705043','Lukketon','15','1507','150705'),(38342,'150705044','Marang','15','1507','150705'),(38343,'150705045','Mebak','15','1507','150705'),(38344,'150705047','Sahaya Bohe Bato','15','1507','150705'),(38345,'150705048','Sapah Bulak','15','1507','150705'),(38346,'150705050','Tikus','15','1507','150705'),(38347,'150705051','Kaumpamatsakem','15','1507','150705'),(38348,'150706002','Badja','15','1507','150706'),(38349,'150706003','Bohebaca','15','1507','150706'),(38350,'150706004','Bohelebung','15','1507','150706'),(38351,'150706011','Lagayas','15','1507','150706'),(38352,'150706012','Limbo-Upas','15','1507','150706'),(38353,'150706016','Tipo-tipo Proper (Pob.)','15','1507','150706'),(38354,'150706017','Baguindan','15','1507','150706'),(38355,'150706018','Banah','15','1507','150706'),(38356,'150706019','Bohe-Tambak','15','1507','150706'),(38357,'150706030','Silangkum','15','1507','150706'),(38358,'150706038','Bangcuang','15','1507','150706'),(38359,'150707005','Lahi-lahi','15','1507','150707'),(38360,'150707010','Sinulatan','15','1507','150707'),(38361,'150707016','Bohetambis','15','1507','150707'),(38362,'150707021','Duga-a','15','1507','150707'),(38363,'150707025','Mahawid','15','1507','150707'),(38364,'150707028','Lower Sinangkapan','15','1507','150707'),(38365,'150707033','Tablas Usew','15','1507','150707'),(38366,'150707034','Calut','15','1507','150707'),(38367,'150707040','Katipunan','15','1507','150707'),(38368,'150707041','Lower Tablas','15','1507','150707'),(38369,'150708001','Caddayan','15','1507','150708'),(38370,'150708002','Linongan','15','1507','150708'),(38371,'150708003','Lower Bato-bato','15','1507','150708'),(38372,'150708004','Mangalut','15','1507','150708'),(38373,'150708005','Manguso','15','1507','150708'),(38374,'150708006','Paguengan','15','1507','150708'),(38375,'150708007','Semut','15','1507','150708'),(38376,'150708008','Upper Bato-bato','15','1507','150708'),(38377,'150708009','Upper Sinangkapan','15','1507','150708'),(38378,'150709001','Apil-apil','15','1507','150709'),(38379,'150709002','Bato-bato','15','1507','150709'),(38380,'150709003','Bohe-Piang','15','1507','150709'),(38381,'150709004','Bucalao','15','1507','150709'),(38382,'150709005','Cambug','15','1507','150709'),(38383,'150709006','Danapah','15','1507','150709'),(38384,'150709007','Guinanta','15','1507','150709'),(38385,'150709008','Kailih','15','1507','150709'),(38386,'150709009','Kinukutan','15','1507','150709'),(38387,'150709010','Kuhon','15','1507','150709'),(38388,'150709011','Kuhon Lennuh','15','1507','150709'),(38389,'150709012','Linuan','15','1507','150709'),(38390,'150709013','Lookbisaya (Kaulungan Island)','15','1507','150709'),(38391,'150709014','Macalang','15','1507','150709'),(38392,'150709015','Magcawa','15','1507','150709'),(38393,'150709016','Sangkahan (Kaulungan Island)','15','1507','150709'),(38394,'150710001','Basakan','15','1507','150710'),(38395,'150710002','Buton','15','1507','150710'),(38396,'150710003','Candiis','15','1507','150710'),(38397,'150710004','Langil','15','1507','150710'),(38398,'150710005','Langong','15','1507','150710'),(38399,'150710006','Languyan','15','1507','150710'),(38400,'150710007','Pintasan','15','1507','150710'),(38401,'150710008','Seronggon','15','1507','150710'),(38402,'150710009','Sibago','15','1507','150710'),(38403,'150710010','Sulutan Matangal','15','1507','150710'),(38404,'150710011','Tuburan Proper (Pob.)','15','1507','150710'),(38405,'150711001','Amaloy','15','1507','150711'),(38406,'150711002','Bohe-Pahuh','15','1507','150711'),(38407,'150711003','Bohe-Suyak','15','1507','150711'),(38408,'150711004','Cabangalan','15','1507','150711'),(38409,'150711005','Danit','15','1507','150711'),(38410,'150711006','Kamamburingan','15','1507','150711'),(38411,'150711007','Matata','15','1507','150711'),(38412,'150711008','Materling','15','1507','150711'),(38413,'150711009','Pipil','15','1507','150711'),(38414,'150711010','Sungkayut','15','1507','150711'),(38415,'150711011','Tongbato','15','1507','150711'),(38416,'150711012','Ulitan','15','1507','150711'),(38417,'150712001','Baluk-baluk','15','1507','150712'),(38418,'150712002','Dasalan','15','1507','150712'),(38419,'150712003','Lubukan','15','1507','150712'),(38420,'150712004','Luukbongsod','15','1507','150712'),(38421,'150712005','Mananggal','15','1507','150712'),(38422,'150712006','Palahangan','15','1507','150712'),(38423,'150712007','Panducan','15','1507','150712'),(38424,'150712008','Sangbay Big','15','1507','150712'),(38425,'150712009','Sangbay Small','15','1507','150712'),(38426,'150712010','Tausan','15','1507','150712'),(38427,'150713001','Babag (Babuan Island)','15','1507','150713'),(38428,'150713002','Balanting','15','1507','150713'),(38429,'150713003','Boloh-boloh','15','1507','150713'),(38430,'150713004','Bukut-Umus','15','1507','150713'),(38431,'150713005','Kaumpurnah','15','1507','150713'),(38432,'150713006','Lanawan','15','1507','150713'),(38433,'150713007','Pisak-pisak','15','1507','150713'),(38434,'150713008','Saluping','15','1507','150713'),(38435,'150713009','Suligan (Babuan Island)','15','1507','150713'),(38436,'150713010','Sulloh (Tapiantana)','15','1507','150713'),(38437,'150713011','Tambulig Buton','15','1507','150713'),(38438,'150713012','Tong-Umus','15','1507','150713'),(38439,'153601001','Ampao','15','1536','153601'),(38440,'153601002','Bagoaingud','15','1536','153601'),(38441,'153601004','Balut','15','1536','153601'),(38442,'153601005','Barua','15','1536','153601'),(38443,'153601006','Buadiawani','15','1536','153601'),(38444,'153601007','Bubong','15','1536','153601'),(38445,'153601008','Dilabayan','15','1536','153601'),(38446,'153601009','Dipatuan','15','1536','153601'),(38447,'153601010','Daramoyod','15','1536','153601'),(38448,'153601011','Gandamato','15','1536','153601'),(38449,'153601012','Gurain','15','1536','153601'),(38450,'153601013','Ilian','15','1536','153601'),(38451,'153601014','Lama','15','1536','153601'),(38452,'153601015','Liawao','15','1536','153601'),(38453,'153601016','Lumbaca-Ingud','15','1536','153601'),(38454,'153601018','Madanding','15','1536','153601'),(38455,'153601019','Orong','15','1536','153601'),(38456,'153601020','Pindolonan','15','1536','153601'),(38457,'153601021','Poblacion I','15','1536','153601'),(38458,'153601022','Poblacion II','15','1536','153601'),(38459,'153601023','Raya','15','1536','153601'),(38460,'153601024','Rorowan','15','1536','153601'),(38461,'153601025','Sugod','15','1536','153601'),(38462,'153601026','Tambo','15','1536','153601'),(38463,'153601027','Tuka I','15','1536','153601'),(38464,'153601028','Tuka II','15','1536','153601'),(38465,'153602002','Banago','15','1536','153602'),(38466,'153602003','Barorao','15','1536','153602'),(38467,'153602004','Batuan','15','1536','153602'),(38468,'153602006','Budas','15','1536','153602'),(38469,'153602007','Calilangan','15','1536','153602'),(38470,'153602008','Igabay','15','1536','153602'),(38471,'153602010','Lalabuan','15','1536','153602'),(38472,'153602011','Magulalung Occidental','15','1536','153602'),(38473,'153602012','Magulalung Oriental','15','1536','153602'),(38474,'153602013','Molimoc','15','1536','153602'),(38475,'153602014','Narra','15','1536','153602'),(38476,'153602015','Plasan','15','1536','153602'),(38477,'153602016','Purakan','15','1536','153602'),(38478,'153602019','Buisan (Bengabeng)','15','1536','153602'),(38479,'153602022','Buenavista','15','1536','153602'),(38480,'153602027','Lorenzo','15','1536','153602'),(38481,'153602029','Lower Itil','15','1536','153602'),(38482,'153602032','Macao','15','1536','153602'),(38483,'153602039','Poblacion (Balabagan)','15','1536','153602'),(38484,'153602043','Upper Itil','15','1536','153602'),(38485,'153602050','Bagoaingud','15','1536','153602'),(38486,'153602051','Ilian','15','1536','153602'),(38487,'153602052','Lumbac','15','1536','153602'),(38488,'153602053','Matampay','15','1536','153602'),(38489,'153602054','Matanog','15','1536','153602'),(38490,'153602055','Pindolonan','15','1536','153602'),(38491,'153602056','Tataya','15','1536','153602'),(38492,'153603001','Abaga','15','1536','153603'),(38493,'153603005','Poblacion (Balindong)','15','1536','153603'),(38494,'153603006','Pantaragoo','15','1536','153603'),(38495,'153603007','Bantoga Wato','15','1536','153603'),(38496,'153603008','Barit','15','1536','153603'),(38497,'153603009','Bubong','15','1536','153603'),(38498,'153603011','Bubong Cadapaan','15','1536','153603'),(38499,'153603013','Borakis','15','1536','153603'),(38500,'153603014','Bualan','15','1536','153603'),(38501,'153603015','Cadapaan','15','1536','153603'),(38502,'153603016','Cadayonan','15','1536','153603'),(38503,'153603018','Kaluntay','15','1536','153603'),(38504,'153603021','Dadayag','15','1536','153603'),(38505,'153603022','Dado','15','1536','153603'),(38506,'153603024','Dibarusan','15','1536','153603'),(38507,'153603025','Dilausan','15','1536','153603'),(38508,'153603026','Dimarao','15','1536','153603'),(38509,'153603027','Ingud','15','1536','153603'),(38510,'153603029','Lalabuan','15','1536','153603'),(38511,'153603031','Lilod','15','1536','153603'),(38512,'153603032','Lumbayao','15','1536','153603'),(38513,'153603033','Limbo','15','1536','153603'),(38514,'153603035','Lumbac Lalan','15','1536','153603'),(38515,'153603036','Lumbac Wato','15','1536','153603'),(38516,'153603037','Magarang','15','1536','153603'),(38517,'153603041','Nusa Lumba Ranao','15','1536','153603'),(38518,'153603042','Padila','15','1536','153603'),(38519,'153603043','Pagayawan','15','1536','153603'),(38520,'153603044','Paigoay','15','1536','153603'),(38521,'153603046','Raya','15','1536','153603'),(38522,'153603047','Salipongan','15','1536','153603'),(38523,'153603050','Talub','15','1536','153603'),(38524,'153603051','Tomarompong','15','1536','153603'),(38525,'153603052','Tantua Raya','15','1536','153603'),(38526,'153603053','Tuka Bubong','15','1536','153603'),(38527,'153603054','Bolinsong','15','1536','153603'),(38528,'153603055','Lati','15','1536','153603'),(38529,'153603056','Malaig','15','1536','153603'),(38530,'153604003','Bagoaingud','15','1536','153604'),(38531,'153604004','Bairan (Pob.)','15','1536','153604'),(38532,'153604005','Bandingun','15','1536','153604'),(38533,'153604006','Biabi','15','1536','153604'),(38534,'153604007','Bialaan','15','1536','153604'),(38535,'153604009','Cadayonan','15','1536','153604'),(38536,'153604010','Lumbac Cadayonan','15','1536','153604'),(38537,'153604011','Lalapung Central','15','1536','153604'),(38538,'153604012','Condaraan Pob. (Condaraan Dimadap)','15','1536','153604'),(38539,'153604013','Cormatan','15','1536','153604'),(38540,'153604014','Ilian','15','1536','153604'),(38541,'153604015','Lalapung Proper (Pob.)','15','1536','153604'),(38542,'153604017','Bubong Lilod','15','1536','153604'),(38543,'153604018','Linao','15','1536','153604'),(38544,'153604019','Linuk (Pob.)','15','1536','153604'),(38545,'153604020','Liong','15','1536','153604'),(38546,'153604021','Lumbac','15','1536','153604'),(38547,'153604022','Mimbalawag','15','1536','153604'),(38548,'153604024','Maliwanag','15','1536','153604'),(38549,'153604025','Mapantao','15','1536','153604'),(38550,'153604027','Cadingilan Occidental','15','1536','153604'),(38551,'153604028','Cadingilan Oriental','15','1536','153604'),(38552,'153604030','Palao','15','1536','153604'),(38553,'153604031','Pama-an','15','1536','153604'),(38554,'153604032','Pamacotan','15','1536','153604'),(38555,'153604033','Pantar','15','1536','153604'),(38556,'153604034','Parao','15','1536','153604'),(38557,'153604035','Patong','15','1536','153604'),(38558,'153604036','Porotan','15','1536','153604'),(38559,'153604037','Rantian','15','1536','153604'),(38560,'153604038','Raya Cadayonan','15','1536','153604'),(38561,'153604039','Rinabor (Pob.)','15','1536','153604'),(38562,'153604040','Sapa','15','1536','153604'),(38563,'153604041','Samporna (Pob.)','15','1536','153604'),(38564,'153604042','Silid','15','1536','153604'),(38565,'153604043','Sugod','15','1536','153604'),(38566,'153604044','Sultan Pandapatan','15','1536','153604'),(38567,'153604045','Sumbag (Pob.)','15','1536','153604'),(38568,'153604046','Tagoranao','15','1536','153604'),(38569,'153604047','Tangcal','15','1536','153604'),(38570,'153604048','Tangcal Proper (Pob.)','15','1536','153604'),(38571,'153604049','Tuca (Pob.)','15','1536','153604'),(38572,'153604050','Tomarompong','15','1536','153604'),(38573,'153604051','Tomongcal Ligi','15','1536','153604'),(38574,'153604052','Torogan','15','1536','153604'),(38575,'153604053','Lalapung Upper','15','1536','153604'),(38576,'153604054','Gandamato','15','1536','153604'),(38577,'153604055','Bubong Raya','15','1536','153604'),(38578,'153604056','Poblacion (Bayang)','15','1536','153604'),(38579,'153605001','Badak','15','1536','153605'),(38580,'153605002','Baguiangun','15','1536','153605'),(38581,'153605003','Balut Maito','15','1536','153605'),(38582,'153605004','Basak','15','1536','153605'),(38583,'153605005','Bubong','15','1536','153605'),(38584,'153605006','Bubonga-Ranao','15','1536','153605'),(38585,'153605009','Dansalan Dacsula','15','1536','153605'),(38586,'153605010','Ingud','15','1536','153605'),(38587,'153605011','Kialilidan','15','1536','153605'),(38588,'153605012','Lumbac','15','1536','153605'),(38589,'153605014','Macaguiling','15','1536','153605'),(38590,'153605015','Madaya','15','1536','153605'),(38591,'153605016','Magonaya','15','1536','153605'),(38592,'153605017','Maindig','15','1536','153605'),(38593,'153605018','Masolun','15','1536','153605'),(38594,'153605019','Olama','15','1536','153605'),(38595,'153605020','Pagalamatan (Pob.)','15','1536','153605'),(38596,'153605021','Pantar','15','1536','153605'),(38597,'153605022','Picalilangan','15','1536','153605'),(38598,'153605023','Picotaan','15','1536','153605'),(38599,'153605024','Pindolonan','15','1536','153605'),(38600,'153605025','Poblacion','15','1536','153605'),(38601,'153605028','Soldaroro','15','1536','153605'),(38602,'153605030','Tambac','15','1536','153605'),(38603,'153605033','Timbangan','15','1536','153605'),(38604,'153605034','Tuca','15','1536','153605'),(38605,'153606002','Bagoaingud','15','1536','153606'),(38606,'153606003','Bansayan','15','1536','153606'),(38607,'153606004','Basingan','15','1536','153606'),(38608,'153606005','Batangan','15','1536','153606'),(38609,'153606006','Bualan','15','1536','153606'),(38610,'153606007','Poblacion (Bubong)','15','1536','153606'),(38611,'153606008','Bubonga Didagun','15','1536','153606'),(38612,'153606011','Carigongan','15','1536','153606'),(38613,'153606012','Bacolod','15','1536','153606'),(38614,'153606014','Dilabayan','15','1536','153606'),(38615,'153606015','Dimapatoy','15','1536','153606'),(38616,'153606017','Dimayon Proper','15','1536','153606'),(38617,'153606019','Diolangan','15','1536','153606'),(38618,'153606022','Guiguikun','15','1536','153606'),(38619,'153606023','Dibarosan','15','1536','153606'),(38620,'153606027','Madanding','15','1536','153606'),(38621,'153606028','Malungun','15','1536','153606'),(38622,'153606030','Masorot','15','1536','153606'),(38623,'153606031','Matampay Dimarao','15','1536','153606'),(38624,'153606032','Miabalawag','15','1536','153606'),(38625,'153606033','Montiaan','15','1536','153606'),(38626,'153606035','Pagayawan','15','1536','153606'),(38627,'153606037','Palao','15','1536','153606'),(38628,'153606038','Panalawan','15','1536','153606'),(38629,'153606039','Pantar','15','1536','153606'),(38630,'153606041','Pendogoan','15','1536','153606'),(38631,'153606045','Polayagan','15','1536','153606'),(38632,'153606048','Ramain Bubong','15','1536','153606'),(38633,'153606049','Rogero','15','1536','153606'),(38634,'153606051','Salipongan','15','1536','153606'),(38635,'153606052','Sunggod','15','1536','153606'),(38636,'153606053','Taboro','15','1536','153606'),(38637,'153606054','Dalaon','15','1536','153606'),(38638,'153606058','Dimayon','15','1536','153606'),(38639,'153606059','Pindolonan','15','1536','153606'),(38640,'153606060','Punud','15','1536','153606'),(38641,'153607012','Butig Proper','15','1536','153607'),(38642,'153607013','Cabasaran','15','1536','153607'),(38643,'153607016','Coloyan Tambo','15','1536','153607'),(38644,'153607019','Dilimbayan','15','1536','153607'),(38645,'153607022','Dolangan','15','1536','153607'),(38646,'153607041','Pindolonan','15','1536','153607'),(38647,'153607044','Bayabao Poblacion','15','1536','153607'),(38648,'153607045','Poktan','15','1536','153607'),(38649,'153607046','Ragayan','15','1536','153607'),(38650,'153607047','Raya','15','1536','153607'),(38651,'153607051','Samer','15','1536','153607'),(38652,'153607052','Sandab Madaya','15','1536','153607'),(38653,'153607056','Sundig','15','1536','153607'),(38654,'153607060','Tiowi','15','1536','153607'),(38655,'153607062','Timbab','15','1536','153607'),(38656,'153607063','Malungun','15','1536','153607'),(38657,'153609001','Bagoaingud','15','1536','153609'),(38658,'153609002','Balintad','15','1536','153609'),(38659,'153609003','Barit','15','1536','153609'),(38660,'153609004','Bato Batoray','15','1536','153609'),(38661,'153609005','Campong a Raya','15','1536','153609'),(38662,'153609006','Gadongan','15','1536','153609'),(38663,'153609007','Gui','15','1536','153609'),(38664,'153609009','Linuk','15','1536','153609'),(38665,'153609010','Lumbac','15','1536','153609'),(38666,'153609011','Macabao','15','1536','153609'),(38667,'153609012','Macaguiling','15','1536','153609'),(38668,'153609013','Pagalongan','15','1536','153609'),(38669,'153609014','Panggawalupa','15','1536','153609'),(38670,'153609015','Pantaon A','15','1536','153609'),(38671,'153609016','Para-aba','15','1536','153609'),(38672,'153609017','Pindolonan','15','1536','153609'),(38673,'153609018','Poblacion','15','1536','153609'),(38674,'153609019','Baya','15','1536','153609'),(38675,'153609020','Sogod Madaya','15','1536','153609'),(38676,'153609021','Tabuan','15','1536','153609'),(38677,'153609022','Taganonok','15','1536','153609'),(38678,'153609023','Taliogon','15','1536','153609'),(38679,'153609027','Masolun','15','1536','153609'),(38680,'153609029','Lumbacaingud','15','1536','153609'),(38681,'153609030','Sekun Matampay','15','1536','153609'),(38682,'153609031','Dapaan','15','1536','153609'),(38683,'153609032','Balintad A','15','1536','153609'),(38684,'153609033','Barorao','15','1536','153609'),(38685,'153609034','Campong Sabela','15','1536','153609'),(38686,'153609051','Pangadapun','15','1536','153609'),(38687,'153609052','Pantaon','15','1536','153609'),(38688,'153609053','Pamalian','15','1536','153609'),(38689,'153610003','Cormatan','15','1536','153610'),(38690,'153610007','Dimagaling (Dimagalin Proper)','15','1536','153610'),(38691,'153610008','Dimunda','15','1536','153610'),(38692,'153610009','Doronan','15','1536','153610'),(38693,'153610012','Poblacion (Kapai Proper)','15','1536','153610'),(38694,'153610017','Malna Proper','15','1536','153610'),(38695,'153610018','Pagalongan','15','1536','153610'),(38696,'153610019','Parao','15','1536','153610'),(38697,'153610025','Kasayanan','15','1536','153610'),(38698,'153610026','Kasayanan West','15','1536','153610'),(38699,'153610029','Dilabayan','15','1536','153610'),(38700,'153610030','Dilimbayan','15','1536','153610'),(38701,'153610031','Kibolos','15','1536','153610'),(38702,'153610032','Kining','15','1536','153610'),(38703,'153610033','Pindolonan','15','1536','153610'),(38704,'153610034','Babayog','15','1536','153610'),(38705,'153610035','Gadongan','15','1536','153610'),(38706,'153610036','Lidasan','15','1536','153610'),(38707,'153610037','Macadar','15','1536','153610'),(38708,'153610038','Pantaon','15','1536','153610'),(38709,'153611003','Bacolod I','15','1536','153611'),(38710,'153611004','Bacolod II','15','1536','153611'),(38711,'153611008','Bantayao','15','1536','153611'),(38712,'153611009','Barit','15','1536','153611'),(38713,'153611011','Baugan','15','1536','153611'),(38714,'153611019','Buad Lumbac','15','1536','153611'),(38715,'153611020','Cabasaran','15','1536','153611'),(38716,'153611021','Calilangan','15','1536','153611'),(38717,'153611026','Carandangan-Mipaga','15','1536','153611'),(38718,'153611027','Cormatan Langban','15','1536','153611'),(38719,'153611031','Dialongana','15','1536','153611'),(38720,'153611035','Dilindongan-Cadayonan','15','1536','153611'),(38721,'153611039','Gadongan','15','1536','153611'),(38722,'153611040','Galawan','15','1536','153611'),(38723,'153611041','Gambai','15','1536','153611'),(38724,'153611044','Kasola','15','1536','153611'),(38725,'153611046','Lalangitun','15','1536','153611'),(38726,'153611047','Lama','15','1536','153611'),(38727,'153611052','Lindongan Dialongana','15','1536','153611'),(38728,'153611054','Lobo Basara','15','1536','153611'),(38729,'153611055','Lumbac Bacayawan','15','1536','153611'),(38730,'153611058','Macaguiling','15','1536','153611'),(38731,'153611065','Mapantao','15','1536','153611'),(38732,'153611066','Mapoling','15','1536','153611'),(38733,'153611070','Pagayawan','15','1536','153611'),(38734,'153611077','Maribo (Pob.)','15','1536','153611'),(38735,'153611078','Posudaragat','15','1536','153611'),(38736,'153611079','Rumayas','15','1536','153611'),(38737,'153611081','Sabala Bantayao','15','1536','153611'),(38738,'153611082','Salaman','15','1536','153611'),(38739,'153611083','Salolodun Berwar','15','1536','153611'),(38740,'153611085','Sarigidan Madiar','15','1536','153611'),(38741,'153611089','Sunggod','15','1536','153611'),(38742,'153611091','Taluan','15','1536','153611'),(38743,'153611094','Tamlang','15','1536','153611'),(38744,'153611096','Tongcopan','15','1536','153611'),(38745,'153611097','Turogan','15','1536','153611'),(38746,'153611098','Minaring Diladigan','15','1536','153611'),(38747,'153612001','Alog','15','1536','153612'),(38748,'153612008','Basayungun','15','1536','153612'),(38749,'153612011','Buad','15','1536','153612'),(38750,'153612012','Budi','15','1536','153612'),(38751,'153612017','Dago-ok','15','1536','153612'),(38752,'153612018','Dalama','15','1536','153612'),(38753,'153612021','Dalipuga','15','1536','153612'),(38754,'153612024','Lalapung','15','1536','153612'),(38755,'153612028','Lumbac','15','1536','153612'),(38756,'153612029','Lumbac Bacayawan','15','1536','153612'),(38757,'153612032','Lunay','15','1536','153612'),(38758,'153612033','Macadar','15','1536','153612'),(38759,'153612034','Madaya','15','1536','153612'),(38760,'153612035','Minanga','15','1536','153612'),(38761,'153612038','Pantar','15','1536','153612'),(38762,'153612039','Picotaan','15','1536','153612'),(38763,'153612043','Poblacion (Lumbatan)','15','1536','153612'),(38764,'153612048','Tambac','15','1536','153612'),(38765,'153612050','Bubong Macadar','15','1536','153612'),(38766,'153612051','Penaring','15','1536','153612'),(38767,'153612052','Ligue','15','1536','153612'),(38768,'153613001','Abaga','15','1536','153613'),(38769,'153613003','Bagoaingud','15','1536','153613'),(38770,'153613006','Basak','15','1536','153613'),(38771,'153613007','Bato','15','1536','153613'),(38772,'153613008','Bubong','15','1536','153613'),(38773,'153613010','Kormatan','15','1536','153613'),(38774,'153613012','Dandamun','15','1536','153613'),(38775,'153613013','Diampaca','15','1536','153613'),(38776,'153613014','Dibarosan','15','1536','153613'),(38777,'153613015','Delausan','15','1536','153613'),(38778,'153613016','Gadongan','15','1536','153613'),(38779,'153613017','Gurain','15','1536','153613'),(38780,'153613018','Cabasaran','15','1536','153613'),(38781,'153613019','Cadayonan','15','1536','153613'),(38782,'153613021','Liangan I','15','1536','153613'),(38783,'153613022','Lilitun','15','1536','153613'),(38784,'153613023','Linao','15','1536','153613'),(38785,'153613024','Linuk','15','1536','153613'),(38786,'153613025','Madaya','15','1536','153613'),(38787,'153613026','Pagayawan','15','1536','153613'),(38788,'153613027','Poblacion','15','1536','153613'),(38789,'153613028','Punud','15','1536','153613'),(38790,'153613029','Raya','15','1536','153613'),(38791,'153613030','Riray','15','1536','153613'),(38792,'153613031','Sabanding','15','1536','153613'),(38793,'153613032','Salongabanding','15','1536','153613'),(38794,'153613033','Sugod','15','1536','153613'),(38795,'153613034','Tamporong','15','1536','153613'),(38796,'153613035','Tongantongan','15','1536','153613'),(38797,'153613036','Udangun','15','1536','153613'),(38798,'153613040','Liangan','15','1536','153613'),(38799,'153613041','Lumbac','15','1536','153613'),(38800,'153613043','Paridi-Kalimodan','15','1536','153613'),(38801,'153613044','Racotan','15','1536','153613'),(38802,'153613049','Bacayawan','15','1536','153613'),(38803,'153613050','Padian Torogan I','15','1536','153613'),(38804,'153613051','Sogod Kaloy','15','1536','153613'),(38805,'153614003','Balintad','15','1536','153614'),(38806,'153614004','Balagunun','15','1536','153614'),(38807,'153614005','Bawang','15','1536','153614'),(38808,'153614006','Biabe','15','1536','153614'),(38809,'153614007','Bubong Uyaan','15','1536','153614'),(38810,'153614008','Cabasaran','15','1536','153614'),(38811,'153614010','Dibarusan','15','1536','153614'),(38812,'153614011','Lakitan','15','1536','153614'),(38813,'153614012','Liangan','15','1536','153614'),(38814,'153614013','Linuk','15','1536','153614'),(38815,'153614014','Lumbaca Ingud','15','1536','153614'),(38816,'153614016','Palao','15','1536','153614'),(38817,'153614017','Pantaon','15','1536','153614'),(38818,'153614018','Pantar','15','1536','153614'),(38819,'153614019','Madamba','15','1536','153614'),(38820,'153614020','Punud','15','1536','153614'),(38821,'153614022','Tubaran','15','1536','153614'),(38822,'153614023','Tambo','15','1536','153614'),(38823,'153614025','Tuca','15','1536','153614'),(38824,'153614027','Uyaan Proper (Pob.)','15','1536','153614'),(38825,'153614031','Tulay','15','1536','153614'),(38826,'153614032','Ilian','15','1536','153614'),(38827,'153614033','Pagayonan','15','1536','153614'),(38828,'153614034','Pangadapan','15','1536','153614'),(38829,'153615003','Bacayawan','15','1536','153615'),(38830,'153615004','Badak Lumao','15','1536','153615'),(38831,'153615006','Bagoaingud','15','1536','153615'),(38832,'153615017','Boniga','15','1536','153615'),(38833,'153615018','BPS Village','15','1536','153615'),(38834,'153615019','Betayan','15','1536','153615'),(38835,'153615020','Campo Muslim','15','1536','153615'),(38836,'153615021','China Town (Pob.)','15','1536','153615'),(38837,'153615022','Corahab','15','1536','153615'),(38838,'153615023','Diamaro','15','1536','153615'),(38839,'153615027','Inandayan','15','1536','153615'),(38840,'153615028','Cabasaran (South)','15','1536','153615'),(38841,'153615029','Calumbog','15','1536','153615'),(38842,'153615034','Lamin','15','1536','153615'),(38843,'153615038','Mable','15','1536','153615'),(38844,'153615043','Mananayo','15','1536','153615'),(38845,'153615044','Manggahan','15','1536','153615'),(38846,'153615047','Masao','15','1536','153615'),(38847,'153615049','Montay','15','1536','153615'),(38848,'153615053','Pasir','15','1536','153615'),(38849,'153615059','Rebocun','15','1536','153615'),(38850,'153615061','Sarang','15','1536','153615'),(38851,'153615063','Tacub','15','1536','153615'),(38852,'153615064','Tambara','15','1536','153615'),(38853,'153615066','Tiongcop','15','1536','153615'),(38854,'153615068','Tuboc','15','1536','153615'),(38855,'153615070','Matampay','15','1536','153615'),(38856,'153615071','Calibagat','15','1536','153615'),(38857,'153615072','Jose Abad Santos','15','1536','153615'),(38858,'153615073','Macuranding','15','1536','153615'),(38859,'153615074','Matalin','15','1536','153615'),(38860,'153615075','Matling','15','1536','153615'),(38861,'153615078','Pialot','15','1536','153615'),(38862,'153615079','Sumbagarogong','15','1536','153615'),(38863,'153615080','Banday','15','1536','153615'),(38864,'153615081','Bunk House','15','1536','153615'),(38865,'153615082','Madaya','15','1536','153615'),(38866,'153616001','Bacayawan','15','1536','153616'),(38867,'153616005','Cawayan Bacolod','15','1536','153616'),(38868,'153616006','Bacong','15','1536','153616'),(38869,'153616009','Camalig Bandara Ingud','15','1536','153616'),(38870,'153616018','Camalig Bubong','15','1536','153616'),(38871,'153616022','Camalig (Pob.)','15','1536','153616'),(38872,'153616023','Inudaran Campong','15','1536','153616'),(38873,'153616025','Cawayan','15','1536','153616'),(38874,'153616026','Daanaingud','15','1536','153616'),(38875,'153616035','Cawayan Kalaw','15','1536','153616'),(38876,'153616036','Kialdan','15','1536','153616'),(38877,'153616039','Lumbac Kialdan','15','1536','153616'),(38878,'153616040','Cawayan Linuk','15','1536','153616'),(38879,'153616044','Lubo','15','1536','153616'),(38880,'153616047','Inudaran Lumbac','15','1536','153616'),(38881,'153616051','Mantapoli','15','1536','153616'),(38882,'153616054','Matampay','15','1536','153616'),(38883,'153616055','Maul','15','1536','153616'),(38884,'153616059','Nataron','15','1536','153616'),(38885,'153616061','Pagalongan Bacayawan','15','1536','153616'),(38886,'153616063','Pataimas','15','1536','153616'),(38887,'153616071','Poona Marantao','15','1536','153616'),(38888,'153616072','Punud Proper','15','1536','153616'),(38889,'153616083','Tacub','15','1536','153616'),(38890,'153616097','Maul Ilian','15','1536','153616'),(38891,'153616102','Palao','15','1536','153616'),(38892,'153616105','Banga-Pantar','15','1536','153616'),(38893,'153616106','Batal-Punud','15','1536','153616'),(38894,'153616107','Bubong Madanding (Bubong)','15','1536','153616'),(38895,'153616108','Ilian','15','1536','153616'),(38896,'153616109','Inudaran Loway','15','1536','153616'),(38897,'153616110','Maul Lumbaca Ingud','15','1536','153616'),(38898,'153616111','Poblacion','15','1536','153616'),(38899,'153616112','Tuca Kialdan','15','1536','153616'),(38900,'153617001','Ambolong','15','1536','153617'),(38901,'153617003','Bacolod Chico Proper','15','1536','153617'),(38902,'153617006','Banga','15','1536','153617'),(38903,'153617007','Bangco','15','1536','153617'),(38904,'153617008','Banggolo Poblacion','15','1536','153617'),(38905,'153617009','Bangon','15','1536','153617'),(38906,'153617010','Beyaba-Damag','15','1536','153617'),(38907,'153617012','Bito Buadi Itowa','15','1536','153617'),(38908,'153617013','Bito Buadi Parba','15','1536','153617'),(38909,'153617014','Bubonga Pagalamatan','15','1536','153617'),(38910,'153617015','Bubonga Lilod Madaya','15','1536','153617'),(38911,'153617016','Boganga','15','1536','153617'),(38912,'153617017','Boto Ambolong','15','1536','153617'),(38913,'153617019','Bubonga Cadayonan','15','1536','153617'),(38914,'153617021','Bubong Lumbac','15','1536','153617'),(38915,'153617022','Bubonga Marawi','15','1536','153617'),(38916,'153617023','Bubonga Punod','15','1536','153617'),(38917,'153617024','Cabasaran','15','1536','153617'),(38918,'153617025','Cabingan','15','1536','153617'),(38919,'153617026','Cadayonan','15','1536','153617'),(38920,'153617027','Cadayonan I','15','1536','153617'),(38921,'153617029','Calocan East','15','1536','153617'),(38922,'153617030','Calocan West','15','1536','153617'),(38923,'153617032','Kormatan Matampay','15','1536','153617'),(38924,'153617033','Daguduban','15','1536','153617'),(38925,'153617035','Dansalan','15','1536','153617'),(38926,'153617036','Datu Sa Dansalan','15','1536','153617'),(38927,'153617037','Dayawan','15','1536','153617'),(38928,'153617039','Dimaluna','15','1536','153617'),(38929,'153617040','Dulay','15','1536','153617'),(38930,'153617042','Dulay West','15','1536','153617'),(38931,'153617043','East Basak','15','1536','153617'),(38932,'153617044','Emie Punud','15','1536','153617'),(38933,'153617045','Fort','15','1536','153617'),(38934,'153617046','Gadongan','15','1536','153617'),(38935,'153617048','Buadi Sacayo (Green)','15','1536','153617'),(38936,'153617049','Guimba (Lilod Proper)','15','1536','153617'),(38937,'153617051','Kapantaran','15','1536','153617'),(38938,'153617052','Kilala','15','1536','153617'),(38939,'153617057','Lilod Madaya (Pob.)','15','1536','153617'),(38940,'153617058','Lilod Saduc','15','1536','153617'),(38941,'153617060','Lomidong','15','1536','153617'),(38942,'153617062','Lumbaca Madaya (Pob.)','15','1536','153617'),(38943,'153617063','Lumbac Marinaut','15','1536','153617'),(38944,'153617064','Lumbaca Toros','15','1536','153617'),(38945,'153617065','Malimono','15','1536','153617'),(38946,'153617066','Basak Malutlut','15','1536','153617'),(38947,'153617068','Gadongan Mapantao','15','1536','153617'),(38948,'153617069','Amito Marantao','15','1536','153617'),(38949,'153617070','Marinaut East','15','1536','153617'),(38950,'153617071','Marinaut West','15','1536','153617'),(38951,'153617072','Matampay','15','1536','153617'),(38952,'153617074','Pantaon (Langcaf)','15','1536','153617'),(38953,'153617075','Mipaga Proper','15','1536','153617'),(38954,'153617076','Moncado Colony','15','1536','153617'),(38955,'153617077','Moncado Kadingilan','15','1536','153617'),(38956,'153617079','Moriatao Loksadato','15','1536','153617'),(38957,'153617080','Datu Naga','15','1536','153617'),(38958,'153617083','Navarro (Datu Saber)','15','1536','153617'),(38959,'153617085','Olawa Ambolong','15','1536','153617'),(38960,'153617086','Pagalamatan Gambai','15','1536','153617'),(38961,'153617089','Pagayawan','15','1536','153617'),(38962,'153617090','Panggao Saduc','15','1536','153617'),(38963,'153617097','Papandayan','15','1536','153617'),(38964,'153617098','Paridi','15','1536','153617'),(38965,'153617099','Patani','15','1536','153617'),(38966,'153617101','Pindolonan','15','1536','153617'),(38967,'153617103','Poona Marantao','15','1536','153617'),(38968,'153617105','Pugaan','15','1536','153617'),(38969,'153617107','Rapasun MSU','15','1536','153617'),(38970,'153617109','Raya Madaya I','15','1536','153617'),(38971,'153617110','Raya Madaya II','15','1536','153617'),(38972,'153617111','Raya Saduc','15','1536','153617'),(38973,'153617112','Rorogagus Proper','15','1536','153617'),(38974,'153617113','Rorogagus East','15','1536','153617'),(38975,'153617116','Sabala Manao','15','1536','153617'),(38976,'153617117','Sabala Manao Proper','15','1536','153617'),(38977,'153617118','Saduc Proper','15','1536','153617'),(38978,'153617119','Sagonsongan','15','1536','153617'),(38979,'153617120','Sangcay Dansalan','15','1536','153617'),(38980,'153617123','Somiorang','15','1536','153617'),(38981,'153617124','South Madaya Proper','15','1536','153617'),(38982,'153617125','Sugod Proper','15','1536','153617'),(38983,'153617126','Tampilong','15','1536','153617'),(38984,'153617127','Timbangalan','15','1536','153617'),(38985,'153617129','Tuca Ambolong','15','1536','153617'),(38986,'153617131','Tolali','15','1536','153617'),(38987,'153617133','Toros','15','1536','153617'),(38988,'153617134','Tuca','15','1536','153617'),(38989,'153617136','Tuca Marinaut','15','1536','153617'),(38990,'153617137','Tongantongan-Tuca Timbangalan','15','1536','153617'),(38991,'153617138','Wawalayan Calocan','15','1536','153617'),(38992,'153617139','Wawalayan Marinaut','15','1536','153617'),(38993,'153617141','Marawi Poblacion','15','1536','153617'),(38994,'153617142','Norhaya Village','15','1536','153617'),(38995,'153617143','Papandayan Caniogan','15','1536','153617'),(38996,'153618001','Abdullah Buisan','15','1536','153618'),(38997,'153618002','Caramian Alim Raya','15','1536','153618'),(38998,'153618003','Alip Lalabuan','15','1536','153618'),(38999,'153618004','Alumpang Paino Mimbalay','15','1536','153618'),(39000,'153618005','Mai Ditimbang Balindong','15','1536','153618'),(39001,'153618007','Mai Sindaoloan Dansalan','15','1536','153618'),(39002,'153618008','Lakadun','15','1536','153618'),(39003,'153618018','Maranat Bontalis','15','1536','153618'),(39004,'153618023','Dalog Balut','15','1536','153618'),(39005,'153618032','Gindolongan Alabat','15','1536','153618'),(39006,'153618034','Gondarangin Asa Adigao','15','1536','153618'),(39007,'153618035','Sawir','15','1536','153618'),(39008,'153618039','Moriatao-Bai Labay','15','1536','153618'),(39009,'153618040','Laila Lumbac Bacon','15','1536','153618'),(39010,'153618041','Lanco Dimapatoy','15','1536','153618'),(39011,'153618042','Talub Langi','15','1536','153618'),(39012,'153618043','Lomigis Sucod','15','1536','153618'),(39013,'153618044','Macabangan Imbala','15','1536','153618'),(39014,'153618045','Macadaag Talaguian','15','1536','153618'),(39015,'153618047','Macalupang Lumbac Caramian','15','1536','153618'),(39016,'153618052','Magayo Bagoaingud','15','1536','153618'),(39017,'153618053','Macompara Apa Mimbalay','15','1536','153618'),(39018,'153618055','Manalocon Talub','15','1536','153618'),(39019,'153618060','Putad Marandang Buisan','15','1536','153618'),(39020,'153618061','Matao Araza','15','1536','153618'),(39021,'153618062','Mocamad Tangul','15','1536','153618'),(39022,'153618069','Pantao','15','1536','153618'),(39023,'153618077','Sambowang Atawa','15','1536','153618'),(39024,'153618082','Tamboro Cormatan','15','1536','153618'),(39025,'153618083','Towanao Arangga','15','1536','153618'),(39026,'153618085','Tomambiling Lumbaca Ingud','15','1536','153618'),(39027,'153618088','Unda Dayawan','15','1536','153618'),(39028,'153618089','Buadi Amloy','15','1536','153618'),(39029,'153618090','Kalilangan','15','1536','153618'),(39030,'153618091','Lumbaca Ingud','15','1536','153618'),(39031,'153619002','Bangon','15','1536','153619'),(39032,'153619005','Bubonga Guilopa','15','1536','153619'),(39033,'153619006','Buadi-Abala','15','1536','153619'),(39034,'153619007','Buadi-Bayawa','15','1536','153619'),(39035,'153619008','Buadi-Insuba','15','1536','153619'),(39036,'153619010','Bubong','15','1536','153619'),(39037,'153619011','Cabasaran','15','1536','153619'),(39038,'153619013','Cairatan','15','1536','153619'),(39039,'153619014','Cormatan','15','1536','153619'),(39040,'153619015','Poblacion (Dado)','15','1536','153619'),(39041,'153619016','Dalama','15','1536','153619'),(39042,'153619018','Dansalan','15','1536','153619'),(39043,'153619019','Dimarao','15','1536','153619'),(39044,'153619022','Guilopa','15','1536','153619'),(39045,'153619024','Ilian','15','1536','153619'),(39046,'153619026','Kitambugun','15','1536','153619'),(39047,'153619027','Lama (Bagoaingud)','15','1536','153619'),(39048,'153619028','Lilod','15','1536','153619'),(39049,'153619030','Lilod Raybalai','15','1536','153619'),(39050,'153619033','Lumbaca Ingud','15','1536','153619'),(39051,'153619034','Lumbac (Lumbac Bubong)','15','1536','153619'),(39052,'153619035','Madaya','15','1536','153619'),(39053,'153619037','Pindolonan','15','1536','153619'),(39054,'153619038','Salipongan','15','1536','153619'),(39055,'153619039','Sugan','15','1536','153619'),(39056,'153619043','Bagoaingud','15','1536','153619'),(39057,'153620001','Ayong','15','1536','153620'),(39058,'153620005','Bandara Ingud','15','1536','153620'),(39059,'153620006','Bangon (Pob.)','15','1536','153620'),(39060,'153620011','Biala-an','15','1536','153620'),(39061,'153620015','Diampaca','15','1536','153620'),(39062,'153620019','Guiarong','15','1536','153620'),(39063,'153620020','Ilian','15','1536','153620'),(39064,'153620029','Madang','15','1536','153620'),(39065,'153620030','Mapantao','15','1536','153620'),(39066,'153620034','Ngingir (Kabasaran)','15','1536','153620'),(39067,'153620035','Padas','15','1536','153620'),(39068,'153620037','Paigoay','15','1536','153620'),(39069,'153620041','Pinalangca','15','1536','153620'),(39070,'153620042','Poblacion (Lumbac)','15','1536','153620'),(39071,'153620045','Rangiran','15','1536','153620'),(39072,'153620046','Rubokun','15','1536','153620'),(39073,'153620054','Linindingan','15','1536','153620'),(39074,'153620057','Kalaludan','15','1536','153620'),(39075,'153621001','Aposong','15','1536','153621'),(39076,'153621002','Bagoaingud','15','1536','153621'),(39077,'153621003','Bangco (Pob.)','15','1536','153621'),(39078,'153621004','Bansayan','15','1536','153621'),(39079,'153621005','Basak','15','1536','153621'),(39080,'153621006','Bobo','15','1536','153621'),(39081,'153621007','Bubong Tawa-an','15','1536','153621'),(39082,'153621008','Bubonga Mamaanun','15','1536','153621'),(39083,'153621009','Bualan','15','1536','153621'),(39084,'153621010','Bubong Ilian','15','1536','153621'),(39085,'153621011','Gacap','15','1536','153621'),(39086,'153621012','Katumbacan','15','1536','153621'),(39087,'153621013','Ilian Poblacion','15','1536','153621'),(39088,'153621014','Kalanganan','15','1536','153621'),(39089,'153621015','Lininding','15','1536','153621'),(39090,'153621017','Lumbaca Mamaan','15','1536','153621'),(39091,'153621018','Mamaanun','15','1536','153621'),(39092,'153621020','Mentring','15','1536','153621'),(39093,'153621021','Olango','15','1536','153621'),(39094,'153621022','Palacat','15','1536','153621'),(39095,'153621023','Palao','15','1536','153621'),(39096,'153621024','Paling','15','1536','153621'),(39097,'153621025','Pantaon','15','1536','153621'),(39098,'153621026','Pantar','15','1536','153621'),(39099,'153621028','Paridi','15','1536','153621'),(39100,'153621029','Pindolonan','15','1536','153621'),(39101,'153621030','Radapan','15','1536','153621'),(39102,'153621031','Radapan Poblacion','15','1536','153621'),(39103,'153621032','Sapingit','15','1536','153621'),(39104,'153621033','Talao','15','1536','153621'),(39105,'153621034','Tambo','15','1536','153621'),(39106,'153621035','Tapocan','15','1536','153621'),(39107,'153621036','Taporug','15','1536','153621'),(39108,'153621037','Tawaan','15','1536','153621'),(39109,'153621038','Udalo','15','1536','153621'),(39110,'153621039','Rantian','15','1536','153621'),(39111,'153621040','Ilian','15','1536','153621'),(39112,'153622001','Ataragadong','15','1536','153622'),(39113,'153622002','Bangon','15','1536','153622'),(39114,'153622004','Bansayan','15','1536','153622'),(39115,'153622006','Bubong-Dimunda','15','1536','153622'),(39116,'153622007','Bugaran','15','1536','153622'),(39117,'153622008','Bualan','15','1536','153622'),(39118,'153622011','Cadayonan','15','1536','153622'),(39119,'153622012','Calilangan Dicala','15','1536','153622'),(39120,'153622013','Calupaan','15','1536','153622'),(39121,'153622014','Dimayon','15','1536','153622'),(39122,'153622015','Dilausan','15','1536','153622'),(39123,'153622018','Dongcoan','15','1536','153622'),(39124,'153622019','Gadongan','15','1536','153622'),(39125,'153622020','Poblacion (Gata Proper)','15','1536','153622'),(39126,'153622024','Liangan','15','1536','153622'),(39127,'153622026','Lumbac','15','1536','153622'),(39128,'153622027','Lumbaca Ingud','15','1536','153622'),(39129,'153622030','Madanding','15','1536','153622'),(39130,'153622034','Pantao','15','1536','153622'),(39131,'153622035','Punud','15','1536','153622'),(39132,'153622036','Ragayan','15','1536','153622'),(39133,'153622037','Rogan Cairan','15','1536','153622'),(39134,'153622041','Talaguian','15','1536','153622'),(39135,'153622042','Rogan Tandiong Dimayon','15','1536','153622'),(39136,'153622043','Taporog','15','1536','153622'),(39137,'153623001','Badak','15','1536','153623'),(39138,'153623002','Bantayan','15','1536','153623'),(39139,'153623003','Basagad','15','1536','153623'),(39140,'153623005','Bolinsong','15','1536','153623'),(39141,'153623006','Boring','15','1536','153623'),(39142,'153623008','Bualan','15','1536','153623'),(39143,'153623012','Danugan','15','1536','153623'),(39144,'153623013','Dapao','15','1536','153623'),(39145,'153623014','Diamla','15','1536','153623'),(39146,'153623015','Gadongan','15','1536','153623'),(39147,'153623018','Ingud','15','1536','153623'),(39148,'153623022','Linuk','15','1536','153623'),(39149,'153623023','Lumbac','15','1536','153623'),(39150,'153623024','Maligo','15','1536','153623'),(39151,'153623025','Masao','15','1536','153623'),(39152,'153623026','Notong','15','1536','153623'),(39153,'153623030','Porug','15','1536','153623'),(39154,'153623031','Romagondong','15','1536','153623'),(39155,'153623033','Tambo (Pob.)','15','1536','153623'),(39156,'153623034','Tamlang','15','1536','153623'),(39157,'153623035','Tuka','15','1536','153623'),(39158,'153623036','Tomarompong','15','1536','153623'),(39159,'153623037','Yaran','15','1536','153623'),(39160,'153624001','Bagoaingud','15','1536','153624'),(39161,'153624006','Barimbingan','15','1536','153624'),(39162,'153624009','Bayabao','15','1536','153624'),(39163,'153624012','Buadi Babai','15','1536','153624'),(39164,'153624013','Buadi Alao','15','1536','153624'),(39165,'153624014','Buadi Oloc','15','1536','153624'),(39166,'153624016','Pagalongan Buadiadingan','15','1536','153624'),(39167,'153624024','Dado','15','1536','153624'),(39168,'153624027','Dangimprampiai','15','1536','153624'),(39169,'153624028','Darimbang','15','1536','153624'),(39170,'153624030','Dilausan','15','1536','153624'),(39171,'153624032','Ditsaan','15','1536','153624'),(39172,'153624033','Gadongan','15','1536','153624'),(39173,'153624038','Pagalongan Ginaopan','15','1536','153624'),(39174,'153624042','Baclayan Lilod','15','1536','153624'),(39175,'153624045','Linamon','15','1536','153624'),(39176,'153624048','Lumbatan Ramain','15','1536','153624'),(39177,'153624054','Buayaan Madanding','15','1536','153624'),(39178,'153624055','Maindig Ditsaan','15','1536','153624'),(39179,'153624057','Mandara','15','1536','153624'),(39180,'153624058','Maranao Timber (Dalama)','15','1536','153624'),(39181,'153624064','Pagalongan Proper','15','1536','153624'),(39182,'153624070','Polo','15','1536','153624'),(39183,'153624077','Ramain Poblacion','15','1536','153624'),(39184,'153624078','Ramain Proper','15','1536','153624'),(39185,'153624079','Baclayan Raya','15','1536','153624'),(39186,'153624081','Buayaan Raya','15','1536','153624'),(39187,'153624082','Rantian','15','1536','153624'),(39188,'153624086','Sundiga Bayabao','15','1536','153624'),(39189,'153624087','Talub','15','1536','153624'),(39190,'153624091','Buayaan Lilod','15','1536','153624'),(39191,'153624092','Bubong Dangiprampiai','15','1536','153624'),(39192,'153624093','Pagalongan Masioon','15','1536','153624'),(39193,'153624094','Sultan Pangadapun','15','1536','153624'),(39194,'153624095','Upper Pugaan','15','1536','153624'),(39195,'153625001','Alinun','15','1536','153625'),(39196,'153625002','Bagoaingud','15','1536','153625'),(39197,'153625004','Batangan','15','1536','153625'),(39198,'153625005','Cadayon','15','1536','153625'),(39199,'153625006','Cadingilan','15','1536','153625'),(39200,'153625007','Lumbac Toros','15','1536','153625'),(39201,'153625008','Comonal','15','1536','153625'),(39202,'153625009','Dilausan','15','1536','153625'),(39203,'153625010','Gadongan','15','1536','153625'),(39204,'153625012','Linao','15','1536','153625'),(39205,'153625013','Limogao','15','1536','153625'),(39206,'153625015','Lumbayanague','15','1536','153625'),(39207,'153625018','Basak Maito','15','1536','153625'),(39208,'153625019','Maliwanag','15','1536','153625'),(39209,'153625020','Mapantao','15','1536','153625'),(39210,'153625021','Mipaga','15','1536','153625'),(39211,'153625022','Natangcopan','15','1536','153625'),(39212,'153625023','Pagalamatan','15','1536','153625'),(39213,'153625025','Pamacotan','15','1536','153625'),(39214,'153625026','Panggao','15','1536','153625'),(39215,'153625027','Pantao Raya','15','1536','153625'),(39216,'153625028','Pantaon','15','1536','153625'),(39217,'153625029','Patpangkat','15','1536','153625'),(39218,'153625030','Pawak','15','1536','153625'),(39219,'153625031','Dilimbayan','15','1536','153625'),(39220,'153625032','Pindolonan','15','1536','153625'),(39221,'153625033','Poblacion','15','1536','153625'),(39222,'153625035','Salocad','15','1536','153625'),(39223,'153625036','Sungcod','15','1536','153625'),(39224,'153625037','Bubong','15','1536','153625'),(39225,'153626001','Bocalan','15','1536','153626'),(39226,'153626002','Bangon','15','1536','153626'),(39227,'153626004','Cabasaran','15','1536','153626'),(39228,'153626007','Dilausan','15','1536','153626'),(39229,'153626008','Lalabuan','15','1536','153626'),(39230,'153626009','Lilod Tamparan','15','1536','153626'),(39231,'153626010','Lindongan','15','1536','153626'),(39232,'153626011','Linuk','15','1536','153626'),(39233,'153626012','Occidental Linuk','15','1536','153626'),(39234,'153626013','Linuk Oriental','15','1536','153626'),(39235,'153626014','Lumbaca Ingud','15','1536','153626'),(39236,'153626015','Lumbacaingud South','15','1536','153626'),(39237,'153626016','Lumbaca Lilod','15','1536','153626'),(39238,'153626019','Balutmadiar','15','1536','153626'),(39239,'153626020','Mala-abangon','15','1536','153626'),(39240,'153626021','Maliwanag','15','1536','153626'),(39241,'153626022','Maidan Linuk','15','1536','153626'),(39242,'153626024','Miondas','15','1536','153626'),(39243,'153626027','New Lumbacaingud','15','1536','153626'),(39244,'153626030','Pimbago-Pagalongan','15','1536','153626'),(39245,'153626032','Pagayawan','15','1536','153626'),(39246,'153626034','Picarabawan','15','1536','153626'),(39247,'153626037','Poblacion I','15','1536','153626'),(39248,'153626038','Poblacion II','15','1536','153626'),(39249,'153626039','Poblacion III','15','1536','153626'),(39250,'153626040','Poblacion IV','15','1536','153626'),(39251,'153626041','Raya Niondas','15','1536','153626'),(39252,'153626042','Raya Buadi Barao','15','1536','153626'),(39253,'153626043','Raya Tamparan','15','1536','153626'),(39254,'153626046','Salongabanding','15','1536','153626'),(39255,'153626047','Saminunggay','15','1536','153626'),(39256,'153626049','Talub','15','1536','153626'),(39257,'153626050','Tatayawan North','15','1536','153626'),(39258,'153626052','Tatayawan South','15','1536','153626'),(39259,'153626054','Tubok','15','1536','153626'),(39260,'153626058','Beruar','15','1536','153626'),(39261,'153626062','Dasomalong','15','1536','153626'),(39262,'153626064','Ginaopan','15','1536','153626'),(39263,'153626065','Lumbac','15','1536','153626'),(39264,'153626067','Minanga','15','1536','153626'),(39265,'153626077','Lilod Tubok','15','1536','153626'),(39266,'153626078','Mariatao Datu','15','1536','153626'),(39267,'153626079','Pagalamatan Linuk','15','1536','153626'),(39268,'153626080','Pindolonan Mariatao Sarip','15','1536','153626'),(39269,'153627003','Bandera Buisan','15','1536','153627'),(39270,'153627006','Boriongan','15','1536','153627'),(39271,'153627007','Borowa','15','1536','153627'),(39272,'153627008','Buadi Dingun','15','1536','153627'),(39273,'153627009','Buadi Amao','15','1536','153627'),(39274,'153627010','Buadi Amunta','15','1536','153627'),(39275,'153627011','Buadi Arorao','15','1536','153627'),(39276,'153627012','Buadi Atopa','15','1536','153627'),(39277,'153627013','Buadi Dayomangga','15','1536','153627'),(39278,'153627014','Buadi Ongcalo','15','1536','153627'),(39279,'153627016','Bucalan','15','1536','153627'),(39280,'153627017','Cadayonan Bagumbayan','15','1536','153627'),(39281,'153627018','Caramat','15','1536','153627'),(39282,'153627019','Carandangan Calopaan','15','1536','153627'),(39283,'153627021','Datu Ma-as','15','1536','153627'),(39284,'153627022','Dilabayan','15','1536','153627'),(39285,'153627024','Dimayon','15','1536','153627'),(39286,'153627028','Gapao Balindong','15','1536','153627'),(39287,'153627029','Ilian','15','1536','153627'),(39288,'153627035','Lumasa','15','1536','153627'),(39289,'153627036','Lumbac Bagoaingud','15','1536','153627'),(39290,'153627037','Lumbac Bubong Maindang','15','1536','153627'),(39291,'153627038','Lumbac Pitakus','15','1536','153627'),(39292,'153627042','Malungun','15','1536','153627'),(39293,'153627043','Maruhom','15','1536','153627'),(39294,'153627046','Masolun','15','1536','153627'),(39295,'153627047','Moriatao Loksa Datu','15','1536','153627'),(39296,'153627049','Pagalamatan','15','1536','153627'),(39297,'153627050','Pindolonan','15','1536','153627'),(39298,'153627051','Pitakus','15','1536','153627'),(39299,'153627053','Ririk','15','1536','153627'),(39300,'153627055','Salipongan','15','1536','153627'),(39301,'153627056','Lumasa Proper (Salvador Concha)','15','1536','153627'),(39302,'153627057','Sambolawan','15','1536','153627'),(39303,'153627058','Samporna Salamatollah','15','1536','153627'),(39304,'153627060','Somiorang Bandingun','15','1536','153627'),(39305,'153627061','Sigayan Proper','15','1536','153627'),(39306,'153627062','Sunggod','15','1536','153627'),(39307,'153627063','Sunding','15','1536','153627'),(39308,'153627064','Supangan','15','1536','153627'),(39309,'153627069','Tupa-an Buadiatupa','15','1536','153627'),(39310,'153627070','Buadi Amunud','15','1536','153627'),(39311,'153627071','Mangayao','15','1536','153627'),(39312,'153628001','Alog','15','1536','153628'),(39313,'153628006','Beta','15','1536','153628'),(39314,'153628009','Poblacion (Buribid)','15','1536','153628'),(39315,'153628012','Campo','15','1536','153628'),(39316,'153628015','Datumanong','15','1536','153628'),(39317,'153628016','Dinaigan','15','1536','153628'),(39318,'153628017','Guiarong','15','1536','153628'),(39319,'153628023','Mindamudag','15','1536','153628'),(39320,'153628030','Paigoay-Pimbataan','15','1536','153628'),(39321,'153628031','Polo','15','1536','153628'),(39322,'153628033','Riantaran','15','1536','153628'),(39323,'153628036','Tangcal','15','1536','153628'),(39324,'153628037','Tubaran Proper','15','1536','153628'),(39325,'153628038','Wago','15','1536','153628'),(39326,'153628039','Bagiangun','15','1536','153628'),(39327,'153628040','Gadongan','15','1536','153628'),(39328,'153628041','Gaput','15','1536','153628'),(39329,'153628042','Madaya','15','1536','153628'),(39330,'153628043','Malaganding','15','1536','153628'),(39331,'153628046','Metadicop','15','1536','153628'),(39332,'153628047','Pagalamatan','15','1536','153628'),(39333,'153629001','Bagoaingud','15','1536','153629'),(39334,'153629004','Bubong','15','1536','153629'),(39335,'153629005','Buadi Alawang','15','1536','153629'),(39336,'153629006','Buadi Dico','15','1536','153629'),(39337,'153629010','Campong Talao','15','1536','153629'),(39338,'153629011','Cayagan','15','1536','153629'),(39339,'153629012','Dandanun','15','1536','153629'),(39340,'153629014','Dilimbayan','15','1536','153629'),(39341,'153629016','Gurain','15','1536','153629'),(39342,'153629017','Poblacion (Ingud)','15','1536','153629'),(39343,'153629019','Lumbac','15','1536','153629'),(39344,'153629021','Maidan','15','1536','153629'),(39345,'153629022','Mapantao','15','1536','153629'),(39346,'153629025','Pagalamatan','15','1536','153629'),(39347,'153629026','Pandiaranao','15','1536','153629'),(39348,'153629027','Pindolonan I','15','1536','153629'),(39349,'153629028','Pindolonan II','15','1536','153629'),(39350,'153629030','Putad','15','1536','153629'),(39351,'153629031','Raya','15','1536','153629'),(39352,'153629034','Sugod I','15','1536','153629'),(39353,'153629036','Sugod Mawatan','15','1536','153629'),(39354,'153629037','Sumbaga Rogong','15','1536','153629'),(39355,'153629038','Tangcal','15','1536','153629'),(39356,'153630001','Amoyong','15','1536','153630'),(39357,'153630002','Balatin','15','1536','153630'),(39358,'153630003','Banga','15','1536','153630'),(39359,'153630006','Buntongun','15','1536','153630'),(39360,'153630007','Bo-ot','15','1536','153630'),(39361,'153630009','Cebuano Group','15','1536','153630'),(39362,'153630010','Christian Village','15','1536','153630'),(39363,'153630011','Eastern Wao','15','1536','153630'),(39364,'153630012','Extension Poblacion','15','1536','153630'),(39365,'153630014','Gata','15','1536','153630'),(39366,'153630016','Kabatangan','15','1536','153630'),(39367,'153630017','Kadingilan','15','1536','153630'),(39368,'153630019','Katutungan (Pob.)','15','1536','153630'),(39369,'153630021','Kilikili East','15','1536','153630'),(39370,'153630022','Kilikili West','15','1536','153630'),(39371,'153630025','Malaigang','15','1536','153630'),(39372,'153630026','Manila Group','15','1536','153630'),(39373,'153630029','Milaya','15','1536','153630'),(39374,'153630030','Mimbuaya','15','1536','153630'),(39375,'153630031','Muslim Village','15','1536','153630'),(39376,'153630033','Pagalongan','15','1536','153630'),(39377,'153630034','Panang','15','1536','153630'),(39378,'153630035','Park Area (Pob.)','15','1536','153630'),(39379,'153630036','Pilintangan','15','1536','153630'),(39380,'153630038','Serran Village','15','1536','153630'),(39381,'153630042','Western Wao (Pob.)','15','1536','153630'),(39382,'153631001','Balut','15','1536','153631'),(39383,'153631002','Bagumbayan','15','1536','153631'),(39384,'153631004','Bitayan','15','1536','153631'),(39385,'153631005','Bolawan','15','1536','153631'),(39386,'153631006','Bonga','15','1536','153631'),(39387,'153631008','Cabasaran','15','1536','153631'),(39388,'153631009','Cahera','15','1536','153631'),(39389,'153631010','Cairantang','15','1536','153631'),(39390,'153631011','Canibongan','15','1536','153631'),(39391,'153631012','Diragun','15','1536','153631'),(39392,'153631015','Mantailoco','15','1536','153631'),(39393,'153631016','Mapantao','15','1536','153631'),(39394,'153631017','Marogong East','15','1536','153631'),(39395,'153631018','Marogong Proper (Pob.)','15','1536','153631'),(39396,'153631020','Mayaman','15','1536','153631'),(39397,'153631021','Pabrica','15','1536','153631'),(39398,'153631023','Paigoay Coda','15','1536','153631'),(39399,'153631024','Pasayanan','15','1536','153631'),(39400,'153631026','Piangologan','15','1536','153631'),(39401,'153631027','Puracan','15','1536','153631'),(39402,'153631028','Romagondong','15','1536','153631'),(39403,'153631029','Sarang','15','1536','153631'),(39404,'153631031','Cadayonan','15','1536','153631'),(39405,'153631032','Calumbog','15','1536','153631'),(39406,'153632004','Bubonga Ranao','15','1536','153632'),(39407,'153632008','Calalaoan (Pob.)','15','1536','153632'),(39408,'153632015','Gas','15','1536','153632'),(39409,'153632018','Inudaran','15','1536','153632'),(39410,'153632019','Inoma','15','1536','153632'),(39411,'153632031','Luguna','15','1536','153632'),(39412,'153632038','Mimbalawag','15','1536','153632'),(39413,'153632041','Ngingir','15','1536','153632'),(39414,'153632042','Pagalongan','15','1536','153632'),(39415,'153632043','Panggawalupa','15','1536','153632'),(39416,'153632044','Pantaon','15','1536','153632'),(39417,'153632048','Piksan','15','1536','153632'),(39418,'153632050','Pindolonan','15','1536','153632'),(39419,'153632052','Punud','15','1536','153632'),(39420,'153632054','Tagoranao','15','1536','153632'),(39421,'153632055','Taliboboka','15','1536','153632'),(39422,'153632056','Tambac','15','1536','153632'),(39423,'153633001','Bacolod','15','1536','153633'),(39424,'153633003','Bangon','15','1536','153633'),(39425,'153633005','Buadiposo Lilod','15','1536','153633'),(39426,'153633006','Buadiposo Proper','15','1536','153633'),(39427,'153633007','Bubong','15','1536','153633'),(39428,'153633008','Buntong Proper','15','1536','153633'),(39429,'153633009','Cadayonan','15','1536','153633'),(39430,'153633010','Dansalan','15','1536','153633'),(39431,'153633011','Gata','15','1536','153633'),(39432,'153633013','Kalakala','15','1536','153633'),(39433,'153633014','Katogonan','15','1536','153633'),(39434,'153633015','Lumbac','15','1536','153633'),(39435,'153633017','Lumbatan Manacab','15','1536','153633'),(39436,'153633018','Lumbatan Pataingud','15','1536','153633'),(39437,'153633019','Manacab (Pob.)','15','1536','153633'),(39438,'153633020','Minanga (Buntong)','15','1536','153633'),(39439,'153633021','Paling','15','1536','153633'),(39440,'153633022','Pindolonan','15','1536','153633'),(39441,'153633023','Pualas','15','1536','153633'),(39442,'153633025','Buadiposo Raya','15','1536','153633'),(39443,'153633026','Sapot','15','1536','153633'),(39444,'153633029','Tangcal','15','1536','153633'),(39445,'153633030','Tarik','15','1536','153633'),(39446,'153633031','Tuka','15','1536','153633'),(39447,'153633033','Bangon Proper','15','1536','153633'),(39448,'153633035','Raya Buntong (Buntong East)','15','1536','153633'),(39449,'153633037','Lunduban (Ragondingan)','15','1536','153633'),(39450,'153633038','Ragondingan East','15','1536','153633'),(39451,'153633039','Ragondingan Proper','15','1536','153633'),(39452,'153633040','Ragondingan West','15','1536','153633'),(39453,'153633042','Boto Ragondingan','15','1536','153633'),(39454,'153633043','Datu Tambara','15','1536','153633'),(39455,'153633044','Dirisan','15','1536','153633'),(39456,'153634001','Agagan','15','1536','153634'),(39457,'153634003','Balagunun','15','1536','153634'),(39458,'153634004','Bolao','15','1536','153634'),(39459,'153634005','Balawag','15','1536','153634'),(39460,'153634006','Balintao','15','1536','153634'),(39461,'153634007','Borocot','15','1536','153634'),(39462,'153634008','Bato-bato','15','1536','153634'),(39463,'153634009','Borrowa','15','1536','153634'),(39464,'153634011','Buadiangkay','15','1536','153634'),(39465,'153634013','Bubong Bayabao','15','1536','153634'),(39466,'153634014','Botud','15','1536','153634'),(39467,'153634015','Camalig','15','1536','153634'),(39468,'153634016','Cambong','15','1536','153634'),(39469,'153634019','Dilausan (Pob.)','15','1536','153634'),(39470,'153634020','Dilimbayan','15','1536','153634'),(39471,'153634024','Ilalag','15','1536','153634'),(39472,'153634025','Kianodan','15','1536','153634'),(39473,'153634028','Lumbac','15','1536','153634'),(39474,'153634030','Madanding','15','1536','153634'),(39475,'153634031','Madaya','15','1536','153634'),(39476,'153634032','Maguing Proper','15','1536','153634'),(39477,'153634033','Malungun','15','1536','153634'),(39478,'153634037','Pagalongan','15','1536','153634'),(39479,'153634038','Panayangan','15','1536','153634'),(39480,'153634041','Pilimoknan','15','1536','153634'),(39481,'153634045','Ragayan (Rungayan)','15','1536','153634'),(39482,'153634048','Lilod Maguing','15','1536','153634'),(39483,'153634051','Bubong','15','1536','153634'),(39484,'153634052','Lilod Borocot','15','1536','153634'),(39485,'153634053','Malungun Borocot','15','1536','153634'),(39486,'153634054','Malungun Pagalongan','15','1536','153634'),(39487,'153634055','Sabala Dilausan','15','1536','153634'),(39488,'153634056','Lumbac-Dimarao','15','1536','153634'),(39489,'153634057','Pindolonan','15','1536','153634'),(39490,'153635004','Bara-as','15','1536','153635'),(39491,'153635007','Biasong','15','1536','153635'),(39492,'153635009','Bulangos','15','1536','153635'),(39493,'153635015','Durian','15','1536','153635'),(39494,'153635016','Ilian','15','1536','153635'),(39495,'153635024','Liangan (Pob.)','15','1536','153635'),(39496,'153635028','Maganding','15','1536','153635'),(39497,'153635029','Maladi','15','1536','153635'),(39498,'153635035','Mapantao','15','1536','153635'),(39499,'153635037','Micalubo','15','1536','153635'),(39500,'153635041','Pindolonan','15','1536','153635'),(39501,'153635042','Punong','15','1536','153635'),(39502,'153635043','Ramitan','15','1536','153635'),(39503,'153635049','Torogan','15','1536','153635'),(39504,'153635050','Tual','15','1536','153635'),(39505,'153635052','Tuca','15','1536','153635'),(39506,'153635053','Ubanoban','15','1536','153635'),(39507,'153635054','Anas','15','1536','153635'),(39508,'153635061','Mimbalawag','15','1536','153635'),(39509,'153636004','Bagoaingud','15','1536','153636'),(39510,'153636005','Balaigay','15','1536','153636'),(39511,'153636007','Bualan','15','1536','153636'),(39512,'153636008','Cadingilan','15','1536','153636'),(39513,'153636009','Casalayan','15','1536','153636'),(39514,'153636010','Dala (Dalama)','15','1536','153636'),(39515,'153636012','Dilimbayan','15','1536','153636'),(39516,'153636013','Cabuntungan','15','1536','153636'),(39517,'153636014','Lamin','15','1536','153636'),(39518,'153636015','Diromoyod','15','1536','153636'),(39519,'153636017','Kabasaran (Pob.)','15','1536','153636'),(39520,'153636018','Nanagun','15','1536','153636'),(39521,'153636019','Mapantao-Balangas','15','1536','153636'),(39522,'153636020','Miniros','15','1536','153636'),(39523,'153636022','Pantaon','15','1536','153636'),(39524,'153636023','Pindolonan','15','1536','153636'),(39525,'153636025','Pitatanglan','15','1536','153636'),(39526,'153636026','Poctan','15','1536','153636'),(39527,'153636030','Singcara','15','1536','153636'),(39528,'153636033','Wago','15','1536','153636'),(39529,'153636035','Cadayonan','15','1536','153636'),(39530,'153636036','Cadingilan A','15','1536','153636'),(39531,'153637001','Poblacion (Apartfort)','15','1536','153637'),(39532,'153637002','Bagumbayan','15','1536','153637'),(39533,'153637003','Bandara-Ingud','15','1536','153637'),(39534,'153637005','Comara','15','1536','153637'),(39535,'153637006','Frankfort','15','1536','153637'),(39536,'153637008','Lambanogan','15','1536','153637'),(39537,'153637009','Lico','15','1536','153637'),(39538,'153637010','Mansilano','15','1536','153637'),(39539,'153637012','Natangcopan','15','1536','153637'),(39540,'153637013','Pagonayan','15','1536','153637'),(39541,'153637014','Pagalamatan','15','1536','153637'),(39542,'153637015','Piagma','15','1536','153637'),(39543,'153637016','Punud','15','1536','153637'),(39544,'153637017','Ranao-Baning','15','1536','153637'),(39545,'153637018','Salam','15','1536','153637'),(39546,'153637019','Sagua-an','15','1536','153637'),(39547,'153637021','Sumugot','15','1536','153637'),(39548,'153638002','Bantalan','15','1536','153638'),(39549,'153638004','Bayog','15','1536','153638'),(39550,'153638005','Cadayonan','15','1536','153638'),(39551,'153638006','Dagonalan','15','1536','153638'),(39552,'153638007','Dimalama','15','1536','153638'),(39553,'153638009','Gayakay','15','1536','153638'),(39554,'153638012','Inodaran','15','1536','153638'),(39555,'153638013','Kalilangan','15','1536','153638'),(39556,'153638015','Kianibong','15','1536','153638'),(39557,'153638017','Kingan','15','1536','153638'),(39558,'153638018','Kitaon','15','1536','153638'),(39559,'153638024','Bagoaingud','15','1536','153638'),(39560,'153638025','Malinao','15','1536','153638'),(39561,'153638026','Malingon','15','1536','153638'),(39562,'153638027','Mama-an Pagalongan','15','1536','153638'),(39563,'153638029','Marawi','15','1536','153638'),(39564,'153638030','Maimbaguiang','15','1536','153638'),(39565,'153638041','Sigayan','15','1536','153638'),(39566,'153638042','Tagoloan Poblacion','15','1536','153638'),(39567,'153639001','Bakikis','15','1536','153639'),(39568,'153639002','Barao','15','1536','153639'),(39569,'153639003','Bongabong','15','1536','153639'),(39570,'153639004','Daguan','15','1536','153639'),(39571,'153639005','Inudaran','15','1536','153639'),(39572,'153639006','Kabaniakawan','15','1536','153639'),(39573,'153639007','Kapatagan','15','1536','153639'),(39574,'153639008','Lusain','15','1536','153639'),(39575,'153639009','Matimos','15','1536','153639'),(39576,'153639010','Minimao','15','1536','153639'),(39577,'153639011','Pinantao','15','1536','153639'),(39578,'153639012','Salaman','15','1536','153639'),(39579,'153639013','Sigayan','15','1536','153639'),(39580,'153639014','Tabuan','15','1536','153639'),(39581,'153639015','Upper Igabay','15','1536','153639'),(39582,'153640001','Bacayawan','15','1536','153640'),(39583,'153640002','Buta (Sumalindao)','15','1536','153640'),(39584,'153640003','Dinganun Guilopa (Dingunun)','15','1536','153640'),(39585,'153640004','Lumbac','15','1536','153640'),(39586,'153640005','Malalis','15','1536','153640'),(39587,'153640006','Pagalongan','15','1536','153640'),(39588,'153640007','Tagoranao','15','1536','153640'),(39589,'153641001','Bangon (Dilausan)','15','1536','153641'),(39590,'153641002','Beta','15','1536','153641'),(39591,'153641003','Calalon','15','1536','153641'),(39592,'153641004','Calipapa','15','1536','153641'),(39593,'153641005','Dilausan','15','1536','153641'),(39594,'153641006','Dimapaok','15','1536','153641'),(39595,'153641007','Lumbac Dilausan','15','1536','153641'),(39596,'153641008','Oriental Beta','15','1536','153641'),(39597,'153641009','Tringun','15','1536','153641'),(39598,'153801004','Dicalongan (Pob.)','15','1538','153801'),(39599,'153801011','Kakal','15','1538','153801'),(39600,'153801012','Kamasi','15','1538','153801'),(39601,'153801014','Kapinpilan','15','1538','153801'),(39602,'153801015','Kauran','15','1538','153801'),(39603,'153801018','Malatimon','15','1538','153801'),(39604,'153801022','Matagabong','15','1538','153801'),(39605,'153801028','Saniag','15','1538','153801'),(39606,'153801031','Tomicor','15','1538','153801'),(39607,'153801032','Tubak','15','1538','153801'),(39608,'153801035','Salman','15','1538','153801'),(39609,'153802001','Ampuan','15','1538','153802'),(39610,'153802002','Aratuc','15','1538','153802'),(39611,'153802005','Cabayuan','15','1538','153802'),(39612,'153802007','Calaan (Pob.)','15','1538','153802'),(39613,'153802008','Karim','15','1538','153802'),(39614,'153802009','Dinganen','15','1538','153802'),(39615,'153802011','Edcor (Gallego Edcor)','15','1538','153802'),(39616,'153802012','Kulimpang','15','1538','153802'),(39617,'153802017','Mataya','15','1538','153802'),(39618,'153802018','Minabay','15','1538','153802'),(39619,'153802020','Nuyo','15','1538','153802'),(39620,'153802021','Oring','15','1538','153802'),(39621,'153802022','Pantawan','15','1538','153802'),(39622,'153802023','Piers','15','1538','153802'),(39623,'153802025','Rumidas','15','1538','153802'),(39624,'153803008','Digal','15','1538','153803'),(39625,'153803023','Lower Siling','15','1538','153803'),(39626,'153803030','Maslabeng','15','1538','153803'),(39627,'153803039','Poblacion','15','1538','153803'),(39628,'153803040','Popol','15','1538','153803'),(39629,'153803045','Talitay','15','1538','153803'),(39630,'153803054','Upper Siling','15','1538','153803'),(39631,'153805001','Alip (Pob.)','15','1538','153805'),(39632,'153805003','Damawato','15','1538','153805'),(39633,'153805004','Katil','15','1538','153805'),(39634,'153805006','Malala','15','1538','153805'),(39635,'153805007','Mangadeg','15','1538','153805'),(39636,'153805008','Manindolo','15','1538','153805'),(39637,'153805010','Puya','15','1538','153805'),(39638,'153805011','Sepaka','15','1538','153805'),(39639,'153805013','Lomoyon','15','1538','153805'),(39640,'153805014','Kalumenga (Kalumanga)','15','1538','153805'),(39641,'153805015','Palao sa Buto','15','1538','153805'),(39642,'153805016','Damalusay','15','1538','153805'),(39643,'153805017','Bonawan','15','1538','153805'),(39644,'153805018','Bulod','15','1538','153805'),(39645,'153805019','Datang','15','1538','153805'),(39646,'153805020','Elbebe','15','1538','153805'),(39647,'153805021','Lipao','15','1538','153805'),(39648,'153805022','Madidis','15','1538','153805'),(39649,'153805023','Makat','15','1538','153805'),(39650,'153805024','Mao','15','1538','153805'),(39651,'153805025','Napok','15','1538','153805'),(39652,'153805026','Poblacion','15','1538','153805'),(39653,'153805027','Salendab','15','1538','153805'),(39654,'153806001','Alonganan','15','1538','153806'),(39655,'153806002','Ambadao','15','1538','153806'),(39656,'153806005','Balanakan','15','1538','153806'),(39657,'153806006','Balong','15','1538','153806'),(39658,'153806008','Buayan','15','1538','153806'),(39659,'153806010','Dado','15','1538','153806'),(39660,'153806011','Damabalas','15','1538','153806'),(39661,'153806015','Duaminanga','15','1538','153806'),(39662,'153806021','Kalipapa','15','1538','153806'),(39663,'153806025','Liong','15','1538','153806'),(39664,'153806028','Magaslong','15','1538','153806'),(39665,'153806029','Masigay','15','1538','153806'),(39666,'153806030','Montay','15','1538','153806'),(39667,'153806034','Poblacion (Dulawan)','15','1538','153806'),(39668,'153806035','Reina Regente','15','1538','153806'),(39669,'153806039','Kanguan','15','1538','153806'),(39670,'153807001','Ambolodto','15','1538','153807'),(39671,'153807002','Awang','15','1538','153807'),(39672,'153807003','Badak','15','1538','153807'),(39673,'153807004','Bagoenged','15','1538','153807'),(39674,'153807005','Baka','15','1538','153807'),(39675,'153807006','Benolen','15','1538','153807'),(39676,'153807007','Bitu','15','1538','153807'),(39677,'153807008','Bongued','15','1538','153807'),(39678,'153807009','Bugawas','15','1538','153807'),(39679,'153807010','Capiton','15','1538','153807'),(39680,'153807011','Dados','15','1538','153807'),(39681,'153807013','Dalican Poblacion','15','1538','153807'),(39682,'153807014','Dinaig Proper','15','1538','153807'),(39683,'153807015','Dulangan','15','1538','153807'),(39684,'153807017','Kakar','15','1538','153807'),(39685,'153807018','Kenebeka','15','1538','153807'),(39686,'153807019','Kurintem','15','1538','153807'),(39687,'153807020','Kusiong','15','1538','153807'),(39688,'153807021','Labungan','15','1538','153807'),(39689,'153807022','Linek','15','1538','153807'),(39690,'153807023','Makir','15','1538','153807'),(39691,'153807024','Margues','15','1538','153807'),(39692,'153807025','Nekitan','15','1538','153807'),(39693,'153807026','Mompong','15','1538','153807'),(39694,'153807027','Sapalan','15','1538','153807'),(39695,'153807028','Semba','15','1538','153807'),(39696,'153807029','Sibuto','15','1538','153807'),(39697,'153807030','Sifaren (Sifaran)','15','1538','153807'),(39698,'153807031','Tambak','15','1538','153807'),(39699,'153807032','Tamontaka','15','1538','153807'),(39700,'153807033','Tanuel','15','1538','153807'),(39701,'153807034','Tapian','15','1538','153807'),(39702,'153807035','Taviran','15','1538','153807'),(39703,'153807036','Tenonggos','15','1538','153807'),(39704,'153808002','Bagong','15','1538','153808'),(39705,'153808004','Bialong','15','1538','153808'),(39706,'153808011','Kuloy','15','1538','153808'),(39707,'153808012','Labu-labu','15','1538','153808'),(39708,'153808013','Lapok (Lepok)','15','1538','153808'),(39709,'153808023','Malingao','15','1538','153808'),(39710,'153808034','Poblacion','15','1538','153808'),(39711,'153808037','Satan','15','1538','153808'),(39712,'153808038','Tapikan','15','1538','153808'),(39713,'153808039','Timbangan','15','1538','153808'),(39714,'153808040','Tina','15','1538','153808'),(39715,'153808046','Poblacion I','15','1538','153808'),(39716,'153808047','Poblacion II','15','1538','153808'),(39717,'153809001','Bayanga Norte','15','1538','153809'),(39718,'153809002','Bayanga Sur','15','1538','153809'),(39719,'153809003','Bugasan Norte','15','1538','153809'),(39720,'153809004','Bugasan Sur (Pob.)','15','1538','153809'),(39721,'153809005','Kidama','15','1538','153809'),(39722,'153809007','Sapad','15','1538','153809'),(39723,'153809008','Langco','15','1538','153809'),(39724,'153809009','Langkong','15','1538','153809'),(39725,'153810001','Bagoenged','15','1538','153810'),(39726,'153810004','Buliok','15','1538','153810'),(39727,'153810006','Damalasak','15','1538','153810'),(39728,'153810008','Galakit','15','1538','153810'),(39729,'153810009','Inug-ug','15','1538','153810'),(39730,'153810010','Kalbugan','15','1538','153810'),(39731,'153810013','Kilangan','15','1538','153810'),(39732,'153810014','Kudal','15','1538','153810'),(39733,'153810015','Layog','15','1538','153810'),(39734,'153810017','Linandangan','15','1538','153810'),(39735,'153810021','Poblacion','15','1538','153810'),(39736,'153810025','Dalgan','15','1538','153810'),(39737,'153811008','Gadungan','15','1538','153811'),(39738,'153811009','Gumagadong Calawag','15','1538','153811'),(39739,'153811010','Guiday T. Biruar','15','1538','153811'),(39740,'153811012','Landasan (Sarmiento)','15','1538','153811'),(39741,'153811013','Limbayan','15','1538','153811'),(39742,'153811014','Bongo Island (Litayen)','15','1538','153811'),(39743,'153811015','Magsaysay','15','1538','153811'),(39744,'153811016','Making','15','1538','153811'),(39745,'153811017','Nituan','15','1538','153811'),(39746,'153811018','Orandang','15','1538','153811'),(39747,'153811019','Pinantao','15','1538','153811'),(39748,'153811020','Poblacion','15','1538','153811'),(39749,'153811021','Polloc','15','1538','153811'),(39750,'153811023','Tagudtongan','15','1538','153811'),(39751,'153811024','Tuca-Maror','15','1538','153811'),(39752,'153811025','Manion','15','1538','153811'),(39753,'153811026','Macasandag','15','1538','153811'),(39754,'153811027','Cotongan','15','1538','153811'),(39755,'153811028','Poblacion II','15','1538','153811'),(39756,'153811029','Samberen','15','1538','153811'),(39757,'153811030','Kabuan','15','1538','153811'),(39758,'153811031','Campo Islam','15','1538','153811'),(39759,'153811032','Datu Macarimbang Biruar','15','1538','153811'),(39760,'153811033','Gadunganpedpandaran','15','1538','153811'),(39761,'153811034','Moro Point','15','1538','153811'),(39762,'153812001','Alamada','15','1538','153812'),(39763,'153812003','Banatin','15','1538','153812'),(39764,'153812004','Banubo','15','1538','153812'),(39765,'153812006','Bulalo','15','1538','153812'),(39766,'153812007','Bulibod','15','1538','153812'),(39767,'153812009','Calsada','15','1538','153812'),(39768,'153812010','Crossing Simuay','15','1538','153812'),(39769,'153812012','Dalumangcob (Pob.)','15','1538','153812'),(39770,'153812013','Darapanan','15','1538','153812'),(39771,'153812014','Gang','15','1538','153812'),(39772,'153812015','Inawan','15','1538','153812'),(39773,'153812016','Kabuntalan','15','1538','153812'),(39774,'153812017','Kakar','15','1538','153812'),(39775,'153812018','Kapimpilan','15','1538','153812'),(39776,'153812019','Katidtuan','15','1538','153812'),(39777,'153812020','Katuli','15','1538','153812'),(39778,'153812023','Ladia','15','1538','153812'),(39779,'153812024','Limbo','15','1538','153812'),(39780,'153812026','Maidapa','15','1538','153812'),(39781,'153812027','Makaguiling','15','1538','153812'),(39782,'153812028','Katamlangan (Matampay)','15','1538','153812'),(39783,'153812029','Matengen','15','1538','153812'),(39784,'153812030','Mulaug','15','1538','153812'),(39785,'153812031','Nalinan','15','1538','153812'),(39786,'153812033','Nekitan','15','1538','153812'),(39787,'153812034','Olas','15','1538','153812'),(39788,'153812035','Panatan','15','1538','153812'),(39789,'153812036','Pigcalagan','15','1538','153812'),(39790,'153812037','Pigkelegan (Ibotegen)','15','1538','153812'),(39791,'153812038','Pinaring','15','1538','153812'),(39792,'153812039','Pingping','15','1538','153812'),(39793,'153812040','Raguisi','15','1538','153812'),(39794,'153812041','Rebuken','15','1538','153812'),(39795,'153812042','Salimbao','15','1538','153812'),(39796,'153812043','Sambolawan','15','1538','153812'),(39797,'153812044','Senditan','15','1538','153812'),(39798,'153812051','Ungap','15','1538','153812'),(39799,'153812052','Damaniog','15','1538','153812'),(39800,'153812053','Nara','15','1538','153812'),(39801,'153813001','Angkayamat','15','1538','153813'),(39802,'153813003','Barurao','15','1538','153813'),(39803,'153813004','Bulod','15','1538','153813'),(39804,'153813006','Darampua','15','1538','153813'),(39805,'153813008','Gadungan','15','1538','153813'),(39806,'153813013','Kulambog','15','1538','153813'),(39807,'153813015','Langgapanan','15','1538','153813'),(39808,'153813021','Masulot','15','1538','153813'),(39809,'153813028','Papakan','15','1538','153813'),(39810,'153813045','Tugal','15','1538','153813'),(39811,'153813046','Tukanakuden','15','1538','153813'),(39812,'153813050','Paldong','15','1538','153813'),(39813,'153814001','Bagumbayan','15','1538','153814'),(39814,'153814003','Dadtumog (Dadtumeg)','15','1538','153814'),(39815,'153814005','Gambar','15','1538','153814'),(39816,'153814006','Ganta','15','1538','153814'),(39817,'153814008','Katidtuan','15','1538','153814'),(39818,'153814009','Langeban','15','1538','153814'),(39819,'153814011','Liong','15','1538','153814'),(39820,'153814012','Maitong','15','1538','153814'),(39821,'153814013','Matilak','15','1538','153814'),(39822,'153814014','Pagalungan','15','1538','153814'),(39823,'153814015','Payan','15','1538','153814'),(39824,'153814016','Pened','15','1538','153814'),(39825,'153814017','Pedtad','15','1538','153814'),(39826,'153814018','Poblacion','15','1538','153814'),(39827,'153814019','Upper Taviran','15','1538','153814'),(39828,'153814026','Buterin','15','1538','153814'),(39829,'153814028','Lower Taviran','15','1538','153814'),(39830,'153815002','Borongotan','15','1538','153815'),(39831,'153815003','Bayabas','15','1538','153815'),(39832,'153815004','Blensong','15','1538','153815'),(39833,'153815005','Bugabungan','15','1538','153815'),(39834,'153815006','Bungcog','15','1538','153815'),(39835,'153815008','Darugao','15','1538','153815'),(39836,'153815009','Ganasi','15','1538','153815'),(39837,'153815010','Kabakaba','15','1538','153815'),(39838,'153815012','Kibleg','15','1538','153815'),(39839,'153815013','Kibucay','15','1538','153815'),(39840,'153815014','Kiga','15','1538','153815'),(39841,'153815017','Kinitan (Kinitaan)','15','1538','153815'),(39842,'153815022','Mirab','15','1538','153815'),(39843,'153815023','Nangi','15','1538','153815'),(39844,'153815025','Nuro Poblacion','15','1538','153815'),(39845,'153815028','Bantek','15','1538','153815'),(39846,'153815029','Ranao Pilayan','15','1538','153815'),(39847,'153815030','Rempes','15','1538','153815'),(39848,'153815031','Renede','15','1538','153815'),(39849,'153815032','Renti','15','1538','153815'),(39850,'153815034','Rifao','15','1538','153815'),(39851,'153815036','Sefegefen','15','1538','153815'),(39852,'153815042','Tinungkaan','15','1538','153815'),(39853,'153816005','Boboguiron','15','1538','153816'),(39854,'153816007','Damablac','15','1538','153816'),(39855,'153816008','Fugotan','15','1538','153816'),(39856,'153816009','Fukol','15','1538','153816'),(39857,'153816013','Katibpuan','15','1538','153816'),(39858,'153816014','Kedati','15','1538','153816'),(39859,'153816018','Lanting','15','1538','153816'),(39860,'153816019','Linamunan','15','1538','153816'),(39861,'153816025','Marader','15','1538','153816'),(39862,'153816028','Binangga North','15','1538','153816'),(39863,'153816032','Binangga South','15','1538','153816'),(39864,'153816033','Talayan','15','1538','153816'),(39865,'153816035','Tamar','15','1538','153816'),(39866,'153816036','Tambunan I','15','1538','153816'),(39867,'153816038','Timbaluan','15','1538','153816'),(39868,'153817001','Kuya','15','1538','153817'),(39869,'153817002','Biarong','15','1538','153817'),(39870,'153817003','Bongo','15','1538','153817'),(39871,'153817004','Itaw','15','1538','153817'),(39872,'153817005','Kigan','15','1538','153817'),(39873,'153817006','Lamud','15','1538','153817'),(39874,'153817007','Looy','15','1538','153817'),(39875,'153817008','Pandan','15','1538','153817'),(39876,'153817009','Pilar','15','1538','153817'),(39877,'153817010','Romangaob (Pob.)','15','1538','153817'),(39878,'153817011','San Jose','15','1538','153817'),(39879,'153818001','Barira (Pob.)','15','1538','153818'),(39880,'153818002','Bualan','15','1538','153818'),(39881,'153818003','Gadung','15','1538','153818'),(39882,'153818004','Liong','15','1538','153818'),(39883,'153818005','Lipa','15','1538','153818'),(39884,'153818006','Lipawan','15','1538','153818'),(39885,'153818007','Marang','15','1538','153818'),(39886,'153818008','Nabalawag','15','1538','153818'),(39887,'153818009','Rominimbang','15','1538','153818'),(39888,'153818010','Togaig','15','1538','153818'),(39889,'153818011','Minabay','15','1538','153818'),(39890,'153818012','Korosoyan','15','1538','153818'),(39891,'153818013','Lamin','15','1538','153818'),(39892,'153818014','Panggao','15','1538','153818'),(39893,'153819001','Badak','15','1538','153819'),(39894,'153819002','Bulod','15','1538','153819'),(39895,'153819005','Kaladturan','15','1538','153819'),(39896,'153819006','Kulasi','15','1538','153819'),(39897,'153819007','Lao-lao','15','1538','153819'),(39898,'153819008','Lasangan','15','1538','153819'),(39899,'153819009','Lower Idtig','15','1538','153819'),(39900,'153819010','Lumabao','15','1538','153819'),(39901,'153819011','Makainis','15','1538','153819'),(39902,'153819012','Midconding','15','1538','153819'),(39903,'153819013','Midpandacan','15','1538','153819'),(39904,'153819015','Panosolen','15','1538','153819'),(39905,'153819016','Ramcor','15','1538','153819'),(39906,'153819017','Tonggol','15','1538','153819'),(39907,'153819018','Pidtiguian','15','1538','153819'),(39908,'153819019','Quipolot','15','1538','153819'),(39909,'153819020','Sadangin','15','1538','153819'),(39910,'153819021','Sumakubay','15','1538','153819'),(39911,'153819022','Upper Lasangan','15','1538','153819'),(39912,'153820001','Bagumbong','15','1538','153820'),(39913,'153820002','Dabenayan','15','1538','153820'),(39914,'153820003','Daladap','15','1538','153820'),(39915,'153820004','Dasikil','15','1538','153820'),(39916,'153820006','Liab','15','1538','153820'),(39917,'153820007','Libutan','15','1538','153820'),(39918,'153820009','Lusay','15','1538','153820'),(39919,'153820010','Mamasapano','15','1538','153820'),(39920,'153820011','Manongkaling','15','1538','153820'),(39921,'153820013','Pidsandawan','15','1538','153820'),(39922,'153820014','Pimbalakan','15','1538','153820'),(39923,'153820016','Sapakan','15','1538','153820'),(39924,'153820017','Tuka','15','1538','153820'),(39925,'153820018','Tukanalipao','15','1538','153820'),(39926,'153821002','Bintan (Bentan)','15','1538','153821'),(39927,'153821003','Gadungan','15','1538','153821'),(39928,'153821004','Kiladap','15','1538','153821'),(39929,'153821005','Kilalan','15','1538','153821'),(39930,'153821006','Kuden','15','1538','153821'),(39931,'153821007','Makadayon','15','1538','153821'),(39932,'153821008','Manggay','15','1538','153821'),(39933,'153821011','Pageda','15','1538','153821'),(39934,'153821012','Talitay','15','1538','153821'),(39935,'153822001','Balatungkayo (Batungkayo)','15','1538','153822'),(39936,'153822002','Bulit','15','1538','153822'),(39937,'153822003','Bulod','15','1538','153822'),(39938,'153822004','Dungguan','15','1538','153822'),(39939,'153822005','Limbalud','15','1538','153822'),(39940,'153822006','Maridagao','15','1538','153822'),(39941,'153822007','Nabundas','15','1538','153822'),(39942,'153822008','Pagagawan','15','1538','153822'),(39943,'153822009','Talapas','15','1538','153822'),(39944,'153822010','Talitay','15','1538','153822'),(39945,'153822011','Tunggol','15','1538','153822'),(39946,'153823001','Damakling','15','1538','153823'),(39947,'153823002','Damalusay','15','1538','153823'),(39948,'153823003','Paglat','15','1538','153823'),(39949,'153823004','Upper Idtig','15','1538','153823'),(39950,'153823005','Campo','15','1538','153823'),(39951,'153823006','Kakal','15','1538','153823'),(39952,'153823007','Salam','15','1538','153823'),(39953,'153823008','Tual','15','1538','153823'),(39954,'153824001','Balut','15','1538','153824'),(39955,'153824002','Boliok','15','1538','153824'),(39956,'153824003','Bungabong','15','1538','153824'),(39957,'153824004','Dagurongan','15','1538','153824'),(39958,'153824005','Kirkir','15','1538','153824'),(39959,'153824006','Macabico (Macabiso)','15','1538','153824'),(39960,'153824007','Namuken','15','1538','153824'),(39961,'153824008','Simuay/Seashore','15','1538','153824'),(39962,'153824009','Solon','15','1538','153824'),(39963,'153824010','Tambo','15','1538','153824'),(39964,'153824011','Tapayan','15','1538','153824'),(39965,'153824012','Tariken','15','1538','153824'),(39966,'153824013','Tuka','15','1538','153824'),(39967,'153825001','Ahan','15','1538','153825'),(39968,'153825002','Bagan','15','1538','153825'),(39969,'153825003','Datalpandan','15','1538','153825'),(39970,'153825004','Kalumamis','15','1538','153825'),(39971,'153825005','Kateman','15','1538','153825'),(39972,'153825006','Lambayao','15','1538','153825'),(39973,'153825007','Macasampen','15','1538','153825'),(39974,'153825008','Muslim','15','1538','153825'),(39975,'153825009','Muti','15','1538','153825'),(39976,'153825010','Sampao','15','1538','153825'),(39977,'153825011','Tambunan II','15','1538','153825'),(39978,'153826002','Dapiawan','15','1538','153826'),(39979,'153826003','Elian','15','1538','153826'),(39980,'153826005','Gawang','15','1538','153826'),(39981,'153826007','Kabengi','15','1538','153826'),(39982,'153826008','Kitango','15','1538','153826'),(39983,'153826009','Kitapok','15','1538','153826'),(39984,'153826010','Madia','15','1538','153826'),(39985,'153826013','Salbu','15','1538','153826'),(39986,'153827001','Bulayan','15','1538','153827'),(39987,'153827002','Iganagampong','15','1538','153827'),(39988,'153827003','Macalag','15','1538','153827'),(39989,'153827004','Maitumaig','15','1538','153827'),(39990,'153827005','Malangog','15','1538','153827'),(39991,'153827006','Meta','15','1538','153827'),(39992,'153827008','Panangeti','15','1538','153827'),(39993,'153827010','Tuntungan','15','1538','153827'),(39994,'153828001','Banaba','15','1538','153828'),(39995,'153828002','Dimampao','15','1538','153828'),(39996,'153828003','Guinibon','15','1538','153828'),(39997,'153828004','Kaya-kaya','15','1538','153828'),(39998,'153828005','Maganoy','15','1538','153828'),(39999,'153828006','Mao','15','1538','153828'),(40000,'153828007','Maranding','15','1538','153828'),(40001,'153828008','Sugadol','15','1538','153828'),(40002,'153828009','Talisawa','15','1538','153828'),(40003,'153828010','Tukanolocong (Tukanologong)','15','1538','153828'),(40004,'153829001','Baital','15','1538','153829'),(40005,'153829002','Bakat','15','1538','153829'),(40006,'153829003','Dapantis','15','1538','153829'),(40007,'153829004','Gaunan','15','1538','153829'),(40008,'153829005','Malibpolok','15','1538','153829'),(40009,'153829006','Mileb','15','1538','153829'),(40010,'153829007','Panadtaban','15','1538','153829'),(40011,'153829008','Pidsandawan','15','1538','153829'),(40012,'153829009','Sampao','15','1538','153829'),(40013,'153829010','Sapakan (Pob.)','15','1538','153829'),(40014,'153829011','Tabungao','15','1538','153829'),(40015,'153830001','Kinimi','15','1538','153830'),(40016,'153830002','Laguitan','15','1538','153830'),(40017,'153830003','Lapaken','15','1538','153830'),(40018,'153830004','Matuber','15','1538','153830'),(40019,'153830005','Meti','15','1538','153830'),(40020,'153830006','Nalkan','15','1538','153830'),(40021,'153830007','Penansaran','15','1538','153830'),(40022,'153830008','Resa','15','1538','153830'),(40023,'153830009','Sedem','15','1538','153830'),(40024,'153830010','Sinipak','15','1538','153830'),(40025,'153830011','Tambak','15','1538','153830'),(40026,'153830012','Tubuan','15','1538','153830'),(40027,'153830013','Pura','15','1538','153830'),(40028,'153831001','Adaon','15','1538','153831'),(40029,'153831002','Brar','15','1538','153831'),(40030,'153831003','Mapayag','15','1538','153831'),(40031,'153831004','Midtimbang (Pob.)','15','1538','153831'),(40032,'153831005','Nunangan (Nunangen)','15','1538','153831'),(40033,'153831006','Tugal','15','1538','153831'),(40034,'153831007','Tulunan','15','1538','153831'),(40035,'153832001','Daladagan','15','1538','153832'),(40036,'153832002','Kalian','15','1538','153832'),(40037,'153832003','Luayan','15','1538','153832'),(40038,'153832004','Paitan','15','1538','153832'),(40039,'153832005','Panapan','15','1538','153832'),(40040,'153832006','Tenok','15','1538','153832'),(40041,'153832007','Tinambulan','15','1538','153832'),(40042,'153832008','Tumbao','15','1538','153832'),(40043,'153833001','Kabuling','15','1538','153833'),(40044,'153833002','Kayaga','15','1538','153833'),(40045,'153833003','Kayupo (Cuyapo)','15','1538','153833'),(40046,'153833004','Lepak','15','1538','153833'),(40047,'153833005','Lower Dilag','15','1538','153833'),(40048,'153833006','Malangit','15','1538','153833'),(40049,'153833007','Pandag','15','1538','153833'),(40050,'153833008','Upper Dilag','15','1538','153833'),(40051,'153834001','Balong','15','1538','153834'),(40052,'153834002','Damatog','15','1538','153834'),(40053,'153834003','Gayonga','15','1538','153834'),(40054,'153834004','Guiawa','15','1538','153834'),(40055,'153834005','Indatuan','15','1538','153834'),(40056,'153834006','Kapimpilan','15','1538','153834'),(40057,'153834007','Libungan','15','1538','153834'),(40058,'153834008','Montay','15','1538','153834'),(40059,'153834009','Paulino Labio','15','1538','153834'),(40060,'153834010','Sabaken','15','1538','153834'),(40061,'153834011','Tumaguinting','15','1538','153834'),(40062,'153835001','Kubentong','15','1538','153835'),(40063,'153835002','Labu-labu I','15','1538','153835'),(40064,'153835003','Labu-labu II','15','1538','153835'),(40065,'153835004','Limpongo','15','1538','153835'),(40066,'153835005','Sayap','15','1538','153835'),(40067,'153835006','Taib','15','1538','153835'),(40068,'153835007','Talibadok','15','1538','153835'),(40069,'153835008','Tuayan','15','1538','153835'),(40070,'153835009','Tuayan I','15','1538','153835'),(40071,'153835010','Macalag','15','1538','153835'),(40072,'153835011','Tuntungan','15','1538','153835'),(40073,'153836001','Alonganan','15','1538','153836'),(40074,'153836002','Andavit','15','1538','153836'),(40075,'153836003','Balanakan','15','1538','153836'),(40076,'153836004','Buayan','15','1538','153836'),(40077,'153836005','Butilen','15','1538','153836'),(40078,'153836006','Dado','15','1538','153836'),(40079,'153836007','Damabalas','15','1538','153836'),(40080,'153836008','Duaminanga','15','1538','153836'),(40081,'153836009','Kalipapa','15','1538','153836'),(40082,'153836010','Liong','15','1538','153836'),(40083,'153836011','Magaslong','15','1538','153836'),(40084,'153836012','Masigay','15','1538','153836'),(40085,'153836013','Pagatin','15','1538','153836'),(40086,'153836014','Pandi','15','1538','153836'),(40087,'153836015','Penditen','15','1538','153836'),(40088,'153836016','Sambulawan','15','1538','153836'),(40089,'153836017','Tee','15','1538','153836'),(40090,'153837001','Bakat','15','1538','153837'),(40091,'153837002','Dale-Bong','15','1538','153837'),(40092,'153837003','Dasawao','15','1538','153837'),(40093,'153837004','Datu Bakal','15','1538','153837'),(40094,'153837005','Datu Kilay','15','1538','153837'),(40095,'153837006','Duguengen','15','1538','153837'),(40096,'153837007','Ganta','15','1538','153837'),(40097,'153837008','Inaladan','15','1538','153837'),(40098,'153837009','Linantangan','15','1538','153837'),(40099,'153837010','Nabundas','15','1538','153837'),(40100,'153837011','Pagatin','15','1538','153837'),(40101,'153837012','Pamalian','15','1538','153837'),(40102,'153837013','Pikeg','15','1538','153837'),(40103,'153837014','Pusao','15','1538','153837'),(40104,'153837015','Libutan','15','1538','153837'),(40105,'153837016','Pagatin (Pagatin I)','15','1538','153837'),(40106,'156601001','Adjid','15','1566','156601'),(40107,'156601002','Bangalan','15','1566','156601'),(40108,'156601003','Bato-bato','15','1566','156601'),(40109,'156601004','Buanza','15','1566','156601'),(40110,'156601005','Bud-Taran','15','1566','156601'),(40111,'156601006','Bunut','15','1566','156601'),(40112,'156601007','Jati-Tunggal','15','1566','156601'),(40113,'156601008','Kabbon Maas','15','1566','156601'),(40114,'156601010','Kagay','15','1566','156601'),(40115,'156601011','Kajatian','15','1566','156601'),(40116,'156601012','Kan Islam','15','1566','156601'),(40117,'156601013','Kandang Tukay','15','1566','156601'),(40118,'156601014','Karawan','15','1566','156601'),(40119,'156601015','Katian','15','1566','156601'),(40120,'156601016','Kuppong','15','1566','156601'),(40121,'156601017','Lambayong','15','1566','156601'),(40122,'156601018','Langpas','15','1566','156601'),(40123,'156601019','Licup','15','1566','156601'),(40124,'156601020','Malimbaya','15','1566','156601'),(40125,'156601021','Manggis','15','1566','156601'),(40126,'156601022','Manilop','15','1566','156601'),(40127,'156601023','Paligue','15','1566','156601'),(40128,'156601024','Panabuan','15','1566','156601'),(40129,'156601025','Pasil','15','1566','156601'),(40130,'156601026','Poblacion (Indanan)','15','1566','156601'),(40131,'156601027','Sapah Malaum','15','1566','156601'),(40132,'156601028','Panglima Misuari (Sasak)','15','1566','156601'),(40133,'156601029','Sionogan','15','1566','156601'),(40134,'156601030','Tagbak','15','1566','156601'),(40135,'156601031','Timbangan','15','1566','156601'),(40136,'156601032','Tubig Dakulah','15','1566','156601'),(40137,'156601033','Tubig Parang','15','1566','156601'),(40138,'156601035','Tumantangis','15','1566','156601'),(40139,'156601036','Sawaki','15','1566','156601'),(40140,'156602001','Alat','15','1566','156602'),(40141,'156602002','Asturias','15','1566','156602'),(40142,'156602003','Bus-bus','15','1566','156602'),(40143,'156602004','Chinese Pier','15','1566','156602'),(40144,'156602007','San Raymundo','15','1566','156602'),(40145,'156602008','Takut-takut','15','1566','156602'),(40146,'156602009','Tulay','15','1566','156602'),(40147,'156602010','Walled City (Pob.)','15','1566','156602'),(40148,'156603002','Kambing','15','1566','156603'),(40149,'156603004','Kanlagay','15','1566','156603'),(40150,'156603010','Pang','15','1566','156603'),(40151,'156603011','Pangdan Pangdan','15','1566','156603'),(40152,'156603012','Pitogo','15','1566','156603'),(40153,'156603013','Karungdong (Pob.)','15','1566','156603'),(40154,'156603016','Tunggol','15','1566','156603'),(40155,'156603017','Masjid Bayle','15','1566','156603'),(40156,'156603018','Masjid Punjungan','15','1566','156603'),(40157,'156604004','Bual','15','1566','156604'),(40158,'156604007','Kan-Bulak','15','1566','156604'),(40159,'156604008','Kan-Mindus','15','1566','156604'),(40160,'156604012','Lambago','15','1566','156604'),(40161,'156604013','Lianutan','15','1566','156604'),(40162,'156604014','Lingah','15','1566','156604'),(40163,'156604015','Mananti','15','1566','156604'),(40164,'156604021','Tubig-Puti (Pob.)','15','1566','156604'),(40165,'156604024','Tandu-Bato','15','1566','156604'),(40166,'156604028','Tulayan Island','15','1566','156604'),(40167,'156604029','Guimbaun','15','1566','156604'),(40168,'156604030','Niog-niog','15','1566','156604'),(40169,'156605001','Anak Jati','15','1566','156605'),(40170,'156605002','Bato Ugis','15','1566','156605'),(40171,'156605003','Bualo Lahi','15','1566','156605'),(40172,'156605004','Bualo Lipid','15','1566','156605'),(40173,'156605005','Bulabog','15','1566','156605'),(40174,'156605006','Ratag Limbon','15','1566','156605'),(40175,'156605007','Duhol Kabbon','15','1566','156605'),(40176,'156605008','Gulangan','15','1566','156605'),(40177,'156605009','Ipil','15','1566','156605'),(40178,'156605010','Kandang','15','1566','156605'),(40179,'156605011','Kapok-Punggol','15','1566','156605'),(40180,'156605012','Kulasi','15','1566','156605'),(40181,'156605013','Labah','15','1566','156605'),(40182,'156605014','Lagasan Asibih','15','1566','156605'),(40183,'156605015','Lantong','15','1566','156605'),(40184,'156605016','Laud Kulasi','15','1566','156605'),(40185,'156605017','Laum Maimbung','15','1566','156605'),(40186,'156605018','Lunggang','15','1566','156605'),(40187,'156605019','Lower Tambaking','15','1566','156605'),(40188,'156605020','Lapa','15','1566','156605'),(40189,'156605021','Matatal','15','1566','156605'),(40190,'156605022','Patao','15','1566','156605'),(40191,'156605023','Poblacion (Maimbung)','15','1566','156605'),(40192,'156605024','Tabu-Bato','15','1566','156605'),(40193,'156605025','Tandu Patong','15','1566','156605'),(40194,'156605026','Tubig-Samin','15','1566','156605'),(40195,'156605027','Upper Tambaking','15','1566','156605'),(40196,'156606002','Bubuan','15','1566','156606'),(40197,'156606003','Kabuukan','15','1566','156606'),(40198,'156606008','Pag-asinan','15','1566','156606'),(40199,'156606012','Bangas (Pob.)','15','1566','156606'),(40200,'156606015','Teomabal','15','1566','156606'),(40201,'156607001','Asin','15','1566','156607'),(40202,'156607002','Bakud','15','1566','156607'),(40203,'156607003','Bangday','15','1566','156607'),(40204,'156607004','Baunoh','15','1566','156607'),(40205,'156607005','Bitanag','15','1566','156607'),(40206,'156607006','Bud Seit','15','1566','156607'),(40207,'156607007','Bulangsi','15','1566','156607'),(40208,'156607008','Datag','15','1566','156607'),(40209,'156607011','Kamalig','15','1566','156607'),(40210,'156607013','Kan Ukol','15','1566','156607'),(40211,'156607014','Kan Asaali','15','1566','156607'),(40212,'156607015','Kan-Dayok','15','1566','156607'),(40213,'156607016','Kan-Sipat','15','1566','156607'),(40214,'156607017','Kawasan','15','1566','156607'),(40215,'156607018','Kulay-kulay','15','1566','156607'),(40216,'156607019','Lakit','15','1566','156607'),(40217,'156607023','Lunggang','15','1566','156607'),(40218,'156607027','Parang','15','1566','156607'),(40219,'156607028','Lower Patibulan','15','1566','156607'),(40220,'156607029','Upper Patibulan','15','1566','156607'),(40221,'156607030','Pugad Manaul','15','1566','156607'),(40222,'156607031','Puhagan','15','1566','156607'),(40223,'156607033','Seit Higad','15','1566','156607'),(40224,'156607034','Seit Lake (Pob.)','15','1566','156607'),(40225,'156607036','Su-uh','15','1566','156607'),(40226,'156607037','Tabu Manuk','15','1566','156607'),(40227,'156607038','Tandu-tandu','15','1566','156607'),(40228,'156607039','Tayungan','15','1566','156607'),(40229,'156607040','Tinah','15','1566','156607'),(40230,'156607042','Tubig Gantang','15','1566','156607'),(40231,'156607043','Tubig Jati','15','1566','156607'),(40232,'156608001','Alu Bunah','15','1566','156608'),(40233,'156608003','Bangkilay','15','1566','156608'),(40234,'156608004','Kawitan','15','1566','156608'),(40235,'156608005','Kehi Niog','15','1566','156608'),(40236,'156608006','Lantong Babag','15','1566','156608'),(40237,'156608007','Lumah Dapdap','15','1566','156608'),(40238,'156608009','Pandan Niog','15','1566','156608'),(40239,'156608010','Panducan','15','1566','156608'),(40240,'156608011','Panitikan','15','1566','156608'),(40241,'156608012','Patutol','15','1566','156608'),(40242,'156608013','Simbahan (Pob.)','15','1566','156608'),(40243,'156608014','Se-ipang','15','1566','156608'),(40244,'156608016','Suang Bunah','15','1566','156608'),(40245,'156608017','Tonggasang','15','1566','156608'),(40246,'156608018','Tubig Nonok','15','1566','156608'),(40247,'156608019','Tubig Sallang','15','1566','156608'),(40248,'156609001','Kaha','15','1566','156609'),(40249,'156609002','Alu Pangkoh','15','1566','156609'),(40250,'156609003','Bagsak','15','1566','156609'),(40251,'156609004','Bawisan','15','1566','156609'),(40252,'156609005','Biid','15','1566','156609'),(40253,'156609006','Bukid','15','1566','156609'),(40254,'156609008','Buli Bawang','15','1566','156609'),(40255,'156609009','Buton','15','1566','156609'),(40256,'156609010','Buton Mahablo','15','1566','156609'),(40257,'156609011','Danapa','15','1566','156609'),(40258,'156609012','Duyan Kabao','15','1566','156609'),(40259,'156609013','Gimba Lagasan','15','1566','156609'),(40260,'156609015','Kahoy Sinah','15','1566','156609'),(40261,'156609016','Kanaway','15','1566','156609'),(40262,'156609017','Kutah Sairap','15','1566','156609'),(40263,'156609019','Lagasan Higad','15','1566','156609'),(40264,'156609021','Laum Buwahan','15','1566','156609'),(40265,'156609023','Laum Suwah','15','1566','156609'),(40266,'156609024','Alu Layag-Layag','15','1566','156609'),(40267,'156609025','Liang','15','1566','156609'),(40268,'156609026','Linuho','15','1566','156609'),(40269,'156609027','Lipunos','15','1566','156609'),(40270,'156609028','Lungan Gitong','15','1566','156609'),(40271,'156609029','Lumbaan Mahaba','15','1566','156609'),(40272,'156609030','Lupa Abu','15','1566','156609'),(40273,'156609031','Nonokan','15','1566','156609'),(40274,'156609032','Paugan','15','1566','156609'),(40275,'156609033','Payuhan','15','1566','156609'),(40276,'156609034','Piyahan','15','1566','156609'),(40277,'156609035','Poblacion (Parang)','15','1566','156609'),(40278,'156609036','Saldang','15','1566','156609'),(40279,'156609037','Sampunay','15','1566','156609'),(40280,'156609038','Silangkan','15','1566','156609'),(40281,'156609039','Taingting','15','1566','156609'),(40282,'156609040','Tikong','15','1566','156609'),(40283,'156609041','Tukay','15','1566','156609'),(40284,'156609042','Tumangas','15','1566','156609'),(40285,'156609043','Wanni Piyanjihan','15','1566','156609'),(40286,'156609044','Lanao Dakula','15','1566','156609'),(40287,'156609045','Lower Sampunay','15','1566','156609'),(40288,'156610001','Andalan','15','1566','156610'),(40289,'156610003','Daungdong','15','1566','156610'),(40290,'156610004','Kamawi','15','1566','156610'),(40291,'156610005','Kanjarang','15','1566','156610'),(40292,'156610006','Kayawan (Pob.)','15','1566','156610'),(40293,'156610007','Kiput','15','1566','156610'),(40294,'156610008','Likud','15','1566','156610'),(40295,'156610009','Luuk-tulay','15','1566','156610'),(40296,'156610010','Niog-niog','15','1566','156610'),(40297,'156610011','Patian','15','1566','156610'),(40298,'156610012','Pisak-pisak','15','1566','156610'),(40299,'156610013','Saimbangon','15','1566','156610'),(40300,'156610014','Sangkap','15','1566','156610'),(40301,'156610015','Timuddas','15','1566','156610'),(40302,'156611001','Anuling','15','1566','156611'),(40303,'156611002','Bakong','15','1566','156611'),(40304,'156611003','Bangkal','15','1566','156611'),(40305,'156611004','Bonbon','15','1566','156611'),(40306,'156611005','Buhanginan (Darayan)','15','1566','156611'),(40307,'156611006','Bungkaung','15','1566','156611'),(40308,'156611007','Danag','15','1566','156611'),(40309,'156611008','Igasan','15','1566','156611'),(40310,'156611009','Kabbon Takas','15','1566','156611'),(40311,'156611010','Kadday Mampallam','15','1566','156611'),(40312,'156611011','Kan Ague','15','1566','156611'),(40313,'156611012','Kaunayan','15','1566','156611'),(40314,'156611013','Langhub','15','1566','156611'),(40315,'156611014','Latih','15','1566','156611'),(40316,'156611015','Liang','15','1566','156611'),(40317,'156611016','Maligay','15','1566','156611'),(40318,'156611017','Mauboh','15','1566','156611'),(40319,'156611018','Pangdanon','15','1566','156611'),(40320,'156611019','Panglayahan','15','1566','156611'),(40321,'156611020','Pansul','15','1566','156611'),(40322,'156611021','Patikul Higad','15','1566','156611'),(40323,'156611022','Sandah','15','1566','156611'),(40324,'156611023','Taglibi (Pob.)','15','1566','156611'),(40325,'156611024','Tandu-Bagua','15','1566','156611'),(40326,'156611025','Tanum','15','1566','156611'),(40327,'156611026','Taung','15','1566','156611'),(40328,'156611027','Timpok','15','1566','156611'),(40329,'156611028','Tugas','15','1566','156611'),(40330,'156611029','Umangay','15','1566','156611'),(40331,'156611030','Gandasuli','15','1566','156611'),(40332,'156612001','Bakud','15','1566','156612'),(40333,'156612004','Buan','15','1566','156612'),(40334,'156612006','Bulansing Tara','15','1566','156612'),(40335,'156612007','Bulihkullul','15','1566','156612'),(40336,'156612008','Campo Islam','15','1566','156612'),(40337,'156612009','Poblacion (Campo Baro)','15','1566','156612'),(40338,'156612010','Duggo','15','1566','156612'),(40339,'156612011','Duhol Tara','15','1566','156612'),(40340,'156612012','East Kungtad','15','1566','156612'),(40341,'156612013','East Sisangat','15','1566','156612'),(40342,'156612015','Ipil','15','1566','156612'),(40343,'156612016','Jambangan','15','1566','156612'),(40344,'156612018','Kabubu','15','1566','156612'),(40345,'156612019','Kong-Kong Laminusa','15','1566','156612'),(40346,'156612020','Kud-kud','15','1566','156612'),(40347,'156612021','Kungtad West','15','1566','156612'),(40348,'156612023','Luuk Laminusa','15','1566','156612'),(40349,'156612025','Latung','15','1566','156612'),(40350,'156612026','Luuk Tara','15','1566','156612'),(40351,'156612030','Manta','15','1566','156612'),(40352,'156612032','Minapan','15','1566','156612'),(40353,'156612035','Nipa-nipa','15','1566','156612'),(40354,'156612037','North Laud','15','1566','156612'),(40355,'156612038','North Manta','15','1566','156612'),(40356,'156612040','North Musu Laud','15','1566','156612'),(40357,'156612041','North Silumpak','15','1566','156612'),(40358,'156612042','Punungan','15','1566','156612'),(40359,'156612046','Pislong','15','1566','156612'),(40360,'156612048','Ratag','15','1566','156612'),(40361,'156612049','Sablay','15','1566','156612'),(40362,'156612050','Sarukot','15','1566','156612'),(40363,'156612053','Siburi','15','1566','156612'),(40364,'156612056','Singko','15','1566','156612'),(40365,'156612057','Siolakan','15','1566','156612'),(40366,'156612058','Siundoh','15','1566','156612'),(40367,'156612059','Siowing','15','1566','156612'),(40368,'156612060','Sipanding','15','1566','156612'),(40369,'156612061','Sisangat','15','1566','156612'),(40370,'156612065','South Musu Laud','15','1566','156612'),(40371,'156612066','South Silumpak','15','1566','156612'),(40372,'156612067','Southwestern Bulikullul','15','1566','156612'),(40373,'156612069','Subah Buaya','15','1566','156612'),(40374,'156612070','Tampakan Laminusa','15','1566','156612'),(40375,'156612071','Tengah Laminusa','15','1566','156612'),(40376,'156612072','Tong Laminusa','15','1566','156612'),(40377,'156612073','Tong-tong','15','1566','156612'),(40378,'156612074','Tonglabah','15','1566','156612'),(40379,'156612075','Tubig Kutah','15','1566','156612'),(40380,'156612076','Tulling','15','1566','156612'),(40381,'156612080','Puukan Laminusa','15','1566','156612'),(40382,'156613001','Andalan','15','1566','156613'),(40383,'156613002','Bagsak','15','1566','156613'),(40384,'156613003','Bandang','15','1566','156613'),(40385,'156613004','Bilaan (Pob.)','15','1566','156613'),(40386,'156613007','Bud Bunga','15','1566','156613'),(40387,'156613008','Buntod','15','1566','156613'),(40388,'156613009','Buroh','15','1566','156613'),(40389,'156613010','Dalih','15','1566','156613'),(40390,'156613011','Gata','15','1566','156613'),(40391,'156613014','Kabatuhan Tiis','15','1566','156613'),(40392,'156613015','Kabungkol','15','1566','156613'),(40393,'156613016','Kagay','15','1566','156613'),(40394,'156613017','Kahawa','15','1566','156613'),(40395,'156613018','Kandaga','15','1566','156613'),(40396,'156613019','Kanlibot','15','1566','156613'),(40397,'156613020','Kiutaan','15','1566','156613'),(40398,'156613021','Kuhaw','15','1566','156613'),(40399,'156613023','Kulamboh','15','1566','156613'),(40400,'156613024','Kuttong','15','1566','156613'),(40401,'156613025','Lagtoh','15','1566','156613'),(40402,'156613026','Lambanah','15','1566','156613'),(40403,'156613027','Liban','15','1566','156613'),(40404,'156613028','Liu-Bud Pantao','15','1566','156613'),(40405,'156613029','Lower Binuang','15','1566','156613'),(40406,'156613030','Lower Kamuntayan','15','1566','156613'),(40407,'156613031','Lower Laus','15','1566','156613'),(40408,'156613032','Lower Sinumaan','15','1566','156613'),(40409,'156613033','Lower Talipao','15','1566','156613'),(40410,'156613035','Lumbayao','15','1566','156613'),(40411,'156613036','Lumping Pigih Daho','15','1566','156613'),(40412,'156613037','Lungkiaban','15','1566','156613'),(40413,'156613038','Mabahay','15','1566','156613'),(40414,'156613039','Mahala','15','1566','156613'),(40415,'156613040','Mampallam','15','1566','156613'),(40416,'156613041','Marsada','15','1566','156613'),(40417,'156613042','Mauboh','15','1566','156613'),(40418,'156613043','Mungit-mungit','15','1566','156613'),(40419,'156613044','Niog-Sangahan','15','1566','156613'),(40420,'156613045','Pantao','15','1566','156613'),(40421,'156613047','Samak','15','1566','156613'),(40422,'156613048','Talipao Proper','15','1566','156613'),(40423,'156613049','Tampakan','15','1566','156613'),(40424,'156613051','Tiis','15','1566','156613'),(40425,'156613052','Tinggah','15','1566','156613'),(40426,'156613053','Tubod','15','1566','156613'),(40427,'156613054','Tuyang','15','1566','156613'),(40428,'156613055','Upper Kamuntayan','15','1566','156613'),(40429,'156613056','Upper Laus','15','1566','156613'),(40430,'156613057','Upper Sinumaan','15','1566','156613'),(40431,'156613058','Upper Talipao','15','1566','156613'),(40432,'156613059','Kabatuhan Bilaan','15','1566','156613'),(40433,'156613060','Upper Binuang','15','1566','156613'),(40434,'156614003','Banting','15','1566','156614'),(40435,'156614010','Hawan','15','1566','156614'),(40436,'156614013','Alu-Kabingaan','15','1566','156614'),(40437,'156614014','Kalang (Pob.)','15','1566','156614'),(40438,'156614016','Kamaunggi','15','1566','156614'),(40439,'156614017','Kanmangon','15','1566','156614'),(40440,'156614018','Kanaway','15','1566','156614'),(40441,'156614019','Kaumpang','15','1566','156614'),(40442,'156614025','Pagatpat','15','1566','156614'),(40443,'156614027','Pangdan','15','1566','156614'),(40444,'156614028','Puok','15','1566','156614'),(40445,'156614030','Sayli','15','1566','156614'),(40446,'156614032','Sumambat','15','1566','156614'),(40447,'156614033','Tangkapaan','15','1566','156614'),(40448,'156614035','Tulakan','15','1566','156614'),(40449,'156615001','Bakkaan','15','1566','156615'),(40450,'156615002','Bangalaw','15','1566','156615'),(40451,'156615003','Danao','15','1566','156615'),(40452,'156615004','Dungon','15','1566','156615'),(40453,'156615005','Kahikukuk','15','1566','156615'),(40454,'156615006','Luuk (Pob.)','15','1566','156615'),(40455,'156615007','North Paarol','15','1566','156615'),(40456,'156615009','Sigumbal','15','1566','156615'),(40457,'156615010','South Paarol','15','1566','156615'),(40458,'156615011','Tabialan','15','1566','156615'),(40459,'156615012','Tainga-Bakkao','15','1566','156615'),(40460,'156615013','Tambun-bun','15','1566','156615'),(40461,'156615014','Tinutungan','15','1566','156615'),(40462,'156615015','Tattalan','15','1566','156615'),(40463,'156616001','Gagguil','15','1566','156616'),(40464,'156616002','Gata-gata','15','1566','156616'),(40465,'156616003','Kamih-Pungud','15','1566','156616'),(40466,'156616004','Lihbug Kabaw','15','1566','156616'),(40467,'156616005','Lubuk-lubuk','15','1566','156616'),(40468,'156616006','Pandakan','15','1566','156616'),(40469,'156616007','Punay (Pob.)','15','1566','156616'),(40470,'156616008','Tiptipon','15','1566','156616'),(40471,'156616009','Jinggan','15','1566','156616'),(40472,'156616010','Likbah','15','1566','156616'),(40473,'156616011','Marsada','15','1566','156616'),(40474,'156616012','Paiksa','15','1566','156616'),(40475,'156617001','Alu Bus-Bus','15','1566','156617'),(40476,'156617002','Alu-Duyong','15','1566','156617'),(40477,'156617003','Bas Lugus','15','1566','156617'),(40478,'156617004','Gapas Rugasan','15','1566','156617'),(40479,'156617005','Gapas Tubig Tuwak','15','1566','156617'),(40480,'156617006','Huwit-huwit Proper','15','1566','156617'),(40481,'156617007','Huwit-huwit Bas Nonok','15','1566','156617'),(40482,'156617008','Kutah Parang','15','1566','156617'),(40483,'156617009','Laha','15','1566','156617'),(40484,'156617010','Larap','15','1566','156617'),(40485,'156617011','Lugus Proper','15','1566','156617'),(40486,'156617012','Mangkallay','15','1566','156617'),(40487,'156617013','Mantan','15','1566','156617'),(40488,'156617014','Pait','15','1566','156617'),(40489,'156617015','Parian Kayawan','15','1566','156617'),(40490,'156617016','Sibul','15','1566','156617'),(40491,'156617017','Tingkangan','15','1566','156617'),(40492,'156618001','Baligtang','15','1566','156618'),(40493,'156618002','Bud Sibaud','15','1566','156618'),(40494,'156618003','Hambilan','15','1566','156618'),(40495,'156618004','Kabbon','15','1566','156618'),(40496,'156618005','Lahi','15','1566','156618'),(40497,'156618006','Lapak','15','1566','156618'),(40498,'156618007','Malanta','15','1566','156618'),(40499,'156618008','Mamanok','15','1566','156618'),(40500,'156618009','North Manubul','15','1566','156618'),(40501,'156618010','Parian Dakula','15','1566','156618'),(40502,'156618011','Sibaud Proper','15','1566','156618'),(40503,'156618012','Siganggang','15','1566','156618'),(40504,'156618013','South Manubul','15','1566','156618'),(40505,'156618014','Suba-suba','15','1566','156618'),(40506,'156618015','Tenga Manubul','15','1566','156618'),(40507,'156618016','Laud Sibaud','15','1566','156618'),(40508,'156619001','Andalan','15','1566','156619'),(40509,'156619002','Angilan','15','1566','156619'),(40510,'156619003','Capual Island','15','1566','156619'),(40511,'156619004','Huwit-huwit','15','1566','156619'),(40512,'156619005','Lahing-Lahing','15','1566','156619'),(40513,'156619006','Niangkaan','15','1566','156619'),(40514,'156619007','Sucuban','15','1566','156619'),(40515,'156619008','Tangkuan','15','1566','156619'),(40516,'157001001','Balimbing Proper','15','1570','157001'),(40517,'157001002','Batu-batu (Pob.)','15','1570','157001'),(40518,'157001003','Buan','15','1570','157001'),(40519,'157001004','Dungon','15','1570','157001'),(40520,'157001005','Luuk Buntal','15','1570','157001'),(40521,'157001007','Parangan','15','1570','157001'),(40522,'157001008','Tabunan','15','1570','157001'),(40523,'157001009','Tungbangkaw','15','1570','157001'),(40524,'157001010','Bauno Garing','15','1570','157001'),(40525,'157001011','Belatan Halu','15','1570','157001'),(40526,'157001012','Karaha','15','1570','157001'),(40527,'157001013','Kulape','15','1570','157001'),(40528,'157001014','Liyaburan','15','1570','157001'),(40529,'157001015','Magsaggaw','15','1570','157001'),(40530,'157001016','Malacca','15','1570','157001'),(40531,'157001017','Sumangday','15','1570','157001'),(40532,'157001018','Tundon','15','1570','157001'),(40533,'157002005','Ipil','15','1570','157002'),(40534,'157002006','Kamagong','15','1570','157002'),(40535,'157002007','Karungdong','15','1570','157002'),(40536,'157002009','Lakit Lakit','15','1570','157002'),(40537,'157002010','Lamion','15','1570','157002'),(40538,'157002012','Lapid Lapid','15','1570','157002'),(40539,'157002013','Lato Lato','15','1570','157002'),(40540,'157002014','Luuk Pandan','15','1570','157002'),(40541,'157002015','Luuk Tulay','15','1570','157002'),(40542,'157002016','Malassa','15','1570','157002'),(40543,'157002017','Mandulan','15','1570','157002'),(40544,'157002018','Masantong','15','1570','157002'),(40545,'157002019','Montay Montay','15','1570','157002'),(40546,'157002021','Pababag','15','1570','157002'),(40547,'157002022','Pagasinan','15','1570','157002'),(40548,'157002023','Pahut','15','1570','157002'),(40549,'157002024','Pakias','15','1570','157002'),(40550,'157002025','Paniongan','15','1570','157002'),(40551,'157002026','Pasiagan','15','1570','157002'),(40552,'157002027','Bongao Poblacion','15','1570','157002'),(40553,'157002030','Sanga-sanga','15','1570','157002'),(40554,'157002031','Silubog','15','1570','157002'),(40555,'157002033','Simandagit','15','1570','157002'),(40556,'157002034','Sumangat','15','1570','157002'),(40557,'157002037','Tarawakan','15','1570','157002'),(40558,'157002040','Tongsinah','15','1570','157002'),(40559,'157002042','Tubig Basag','15','1570','157002'),(40560,'157002043','Ungus-ungus','15','1570','157002'),(40561,'157002044','Lagasan','15','1570','157002'),(40562,'157002045','Nalil','15','1570','157002'),(40563,'157002046','Pagatpat','15','1570','157002'),(40564,'157002047','Pag-asa','15','1570','157002'),(40565,'157002048','Tubig Tanah','15','1570','157002'),(40566,'157002049','Tubig-Boh','15','1570','157002'),(40567,'157002050','Tubig-Mampallam','15','1570','157002'),(40568,'157003001','Boki','15','1570','157003'),(40569,'157003002','Duhul Batu','15','1570','157003'),(40570,'157003003','Kompang','15','1570','157003'),(40571,'157003004','Lupa Pula (Pob.)','15','1570','157003'),(40572,'157003005','Guppah','15','1570','157003'),(40573,'157003006','Mahalo','15','1570','157003'),(40574,'157003007','Pawan','15','1570','157003'),(40575,'157003008','Sikub','15','1570','157003'),(40576,'157003009','Tabulian','15','1570','157003'),(40577,'157003010','Tanduan','15','1570','157003'),(40578,'157003012','Umus Mataha','15','1570','157003'),(40579,'157003013','Erok-erok','15','1570','157003'),(40580,'157003014','Liyubud','15','1570','157003'),(40581,'157003015','Lubbak Parang','15','1570','157003'),(40582,'157003016','Sapa','15','1570','157003'),(40583,'157004001','Bakong','15','1570','157004'),(40584,'157004002','Manuk Mangkaw','15','1570','157004'),(40585,'157004003','Mongkay','15','1570','157004'),(40586,'157004004','Tampakan (Pob.)','15','1570','157004'),(40587,'157004005','Tonggosong','15','1570','157004'),(40588,'157004006','Tubig Indangan','15','1570','157004'),(40589,'157004007','Ubol','15','1570','157004'),(40590,'157004008','Doh-Tong','15','1570','157004'),(40591,'157004009','Luuk Datan','15','1570','157004'),(40592,'157004010','Maruwa','15','1570','157004'),(40593,'157004011','Pagasinan','15','1570','157004'),(40594,'157004012','Panglima Mastul','15','1570','157004'),(40595,'157004013','Sukah-Bulan','15','1570','157004'),(40596,'157004014','Timundon','15','1570','157004'),(40597,'157004015','Bagid*','15','1570','157004'),(40598,'157005001','South Larap (Larap)','15','1570','157005'),(40599,'157005004','Sitangkai Poblacion','15','1570','157005'),(40600,'157005010','Tongmageng','15','1570','157005'),(40601,'157005012','Tongusong','15','1570','157005'),(40602,'157005016','Datu Baguinda Putih','15','1570','157005'),(40603,'157005021','Imam Sapie','15','1570','157005'),(40604,'157005022','North Larap','15','1570','157005'),(40605,'157005023','Panglima Alari','15','1570','157005'),(40606,'157005025','Sipangkot','15','1570','157005'),(40607,'157006001','Babagan','15','1570','157006'),(40608,'157006005','Bengkol','15','1570','157006'),(40609,'157006006','Bintawlan','15','1570','157006'),(40610,'157006007','Bohe','15','1570','157006'),(40611,'157006008','Bubuan','15','1570','157006'),(40612,'157006009','Bunay Bunay Tong','15','1570','157006'),(40613,'157006010','Bunay Bunay Lookan','15','1570','157006'),(40614,'157006011','Bunay Bunay Center','15','1570','157006'),(40615,'157006012','Lahad Dampong','15','1570','157006'),(40616,'157006013','East Talisay','15','1570','157006'),(40617,'157006014','Nunuk','15','1570','157006'),(40618,'157006015','Laitan','15','1570','157006'),(40619,'157006016','Lambi-lambian','15','1570','157006'),(40620,'157006017','Laud','15','1570','157006'),(40621,'157006019','Likud Tabawan','15','1570','157006'),(40622,'157006023','Nusa-nusa','15','1570','157006'),(40623,'157006024','Nusa','15','1570','157006'),(40624,'157006025','Pampang','15','1570','157006'),(40625,'157006026','Putat','15','1570','157006'),(40626,'157006027','Sollogan','15','1570','157006'),(40627,'157006028','Talisay','15','1570','157006'),(40628,'157006029','Tampakan Dampong','15','1570','157006'),(40629,'157006030','Tinda-tindahan','15','1570','157006'),(40630,'157006032','Tong Tampakan','15','1570','157006'),(40631,'157006033','Tubig Dayang Center','15','1570','157006'),(40632,'157006034','Tubig Dayang Riverside','15','1570','157006'),(40633,'157006035','Tubig Dayang','15','1570','157006'),(40634,'157006036','Tukkai','15','1570','157006'),(40635,'157006037','Unas-unas','15','1570','157006'),(40636,'157006038','Likud Dampong','15','1570','157006'),(40637,'157006039','Tangngah','15','1570','157006'),(40638,'157007002','Baliungan','15','1570','157007'),(40639,'157007009','Kakoong','15','1570','157007'),(40640,'157007010','Kepeng','15','1570','157007'),(40641,'157007012','Lahay-lahay','15','1570','157007'),(40642,'157007026','Naungan','15','1570','157007'),(40643,'157007030','Sallangan','15','1570','157007'),(40644,'157007031','Sapa','15','1570','157007'),(40645,'157007033','Silantup','15','1570','157007'),(40646,'157007041','Tapian','15','1570','157007'),(40647,'157007042','Tongbangkaw','15','1570','157007'),(40648,'157007043','Tangngah (Tangngah Ungus Matata)','15','1570','157007'),(40649,'157007044','Ballak','15','1570','157007'),(40650,'157007045','Butun','15','1570','157007'),(40651,'157007046','Himbah','15','1570','157007'),(40652,'157007047','Kalang-kalang','15','1570','157007'),(40653,'157007048','Salamat','15','1570','157007'),(40654,'157007049','Sibakloon','15','1570','157007'),(40655,'157007050','Tandubato','15','1570','157007'),(40656,'157007051','Tapian Sukah','15','1570','157007'),(40657,'157007052','Taruk','15','1570','157007'),(40658,'157008001','Taganak Poblacion','15','1570','157008'),(40659,'157008002','Likud Bakkao','15','1570','157008'),(40660,'157009001','Bakong','15','1570','157009'),(40661,'157009002','Bas-bas Proper','15','1570','157009'),(40662,'157009003','Basnunuk','15','1570','157009'),(40663,'157009004','Darussalam','15','1570','157009'),(40664,'157009005','Languyan Proper (Pob.)','15','1570','157009'),(40665,'157009006','Maraning','15','1570','157009'),(40666,'157009009','Simalak','15','1570','157009'),(40667,'157009010','Tuhog-tuhog','15','1570','157009'),(40668,'157009011','Tumahubong','15','1570','157009'),(40669,'157009012','Tumbagaan','15','1570','157009'),(40670,'157009013','Parang Pantay','15','1570','157009'),(40671,'157009014','Adnin','15','1570','157009'),(40672,'157009015','Bakaw-bakaw','15','1570','157009'),(40673,'157009016','BasLikud','15','1570','157009'),(40674,'157009017','Jakarta (Lookan Latuan)','15','1570','157009'),(40675,'157009018','Kalupag','15','1570','157009'),(40676,'157009019','Kiniktal','15','1570','157009'),(40677,'157009020','Marang-marang','15','1570','157009'),(40678,'157009021','Sikullis','15','1570','157009'),(40679,'157009022','Tubig Dakula','15','1570','157009'),(40680,'157010001','Baldatal Islam','15','1570','157010'),(40681,'157010002','Lookan Banaran','15','1570','157010'),(40682,'157010003','Tonggusong Banaran','15','1570','157010'),(40683,'157010004','Butun','15','1570','157010'),(40684,'157010005','Dalo-dalo','15','1570','157010'),(40685,'157010006','Palate Gadjaminah','15','1570','157010'),(40686,'157010007','Kohec','15','1570','157010'),(40687,'157010008','Latuan (Suasang)','15','1570','157010'),(40688,'157010009','Lakit-lakit','15','1570','157010'),(40689,'157010010','Tangngah (Lalung Sikubong)','15','1570','157010'),(40690,'157010011','Tabunan Likud Sikubong','15','1570','157010'),(40691,'157010012','Malanta','15','1570','157010'),(40692,'157010013','Mantabuan Tabunan','15','1570','157010'),(40693,'157010014','Sapa-sapa (Pob.)','15','1570','157010'),(40694,'157010015','Tapian Bohe North','15','1570','157010'),(40695,'157010016','Look Natuh','15','1570','157010'),(40696,'157010017','Lookan Latuan','15','1570','157010'),(40697,'157010018','Nunuk Likud Sikubong','15','1570','157010'),(40698,'157010019','Pamasan','15','1570','157010'),(40699,'157010020','Sapaat','15','1570','157010'),(40700,'157010021','Sukah-sukah','15','1570','157010'),(40701,'157010022','Tapian Bohe South','15','1570','157010'),(40702,'157010023','Tup-tup Banaran','15','1570','157010'),(40703,'157011001','Ambulong Sapal','15','1570','157011'),(40704,'157011002','Datu Amilhamja Jaafar','15','1570','157011'),(40705,'157011003','Hadji Imam Bidin','15','1570','157011'),(40706,'157011004','Hadji Mohtar Sulayman','15','1570','157011'),(40707,'157011005','Hadji Taha','15','1570','157011'),(40708,'157011006','Imam Hadji Mohammad','15','1570','157011'),(40709,'157011007','Ligayan','15','1570','157011'),(40710,'157011008','Nunukan','15','1570','157011'),(40711,'157011009','Sheik Makdum','15','1570','157011'),(40712,'157011010','Sibutu (Pob.)','15','1570','157011'),(40713,'157011011','Talisay','15','1570','157011'),(40714,'157011012','Tandu Banak','15','1570','157011'),(40715,'157011013','Taungoh','15','1570','157011'),(40716,'157011014','Tongehat','15','1570','157011'),(40717,'157011015','Tongsibalo','15','1570','157011'),(40718,'157011016','Ungus-ungus','15','1570','157011'),(40719,'160201001','Abilan','16','1602','160201'),(40720,'160201002','Agong-ong','16','1602','160201'),(40721,'160201003','Alubijid','16','1602','160201'),(40722,'160201004','Guinabsan','16','1602','160201'),(40723,'160201007','Macalang','16','1602','160201'),(40724,'160201008','Malapong','16','1602','160201'),(40725,'160201009','Malpoc','16','1602','160201'),(40726,'160201010','Manapa','16','1602','160201'),(40727,'160201011','Matabao','16','1602','160201'),(40728,'160201013','Poblacion 1','16','1602','160201'),(40729,'160201014','Poblacion 2','16','1602','160201'),(40730,'160201015','Poblacion 3','16','1602','160201'),(40731,'160201016','Poblacion 4','16','1602','160201'),(40732,'160201017','Poblacion 5','16','1602','160201'),(40733,'160201018','Poblacion 6','16','1602','160201'),(40734,'160201019','Poblacion 7','16','1602','160201'),(40735,'160201020','Poblacion 8','16','1602','160201'),(40736,'160201021','Poblacion 9','16','1602','160201'),(40737,'160201022','Poblacion 10','16','1602','160201'),(40738,'160201023','Rizal','16','1602','160201'),(40739,'160201024','Sacol','16','1602','160201'),(40740,'160201025','Sangay','16','1602','160201'),(40741,'160201026','Talo-ao','16','1602','160201'),(40742,'160201027','Lower Olave','16','1602','160201'),(40743,'160201028','Simbalan','16','1602','160201'),(40744,'160202002','Agao Pob. (Bgy. 3)','16','1602','160202'),(40745,'160202003','Agusan Pequeño','16','1602','160202'),(40746,'160202004','Ambago','16','1602','160202'),(40747,'160202006','Amparo','16','1602','160202'),(40748,'160202007','Ampayon','16','1602','160202'),(40749,'160202008','Anticala','16','1602','160202'),(40750,'160202009','Antongalon','16','1602','160202'),(40751,'160202010','Aupagan','16','1602','160202'),(40752,'160202012','Baan KM 3','16','1602','160202'),(40753,'160202013','Babag','16','1602','160202'),(40754,'160202014','Bading Pob. (Bgy. 22)','16','1602','160202'),(40755,'160202016','Bancasi','16','1602','160202'),(40756,'160202017','Banza','16','1602','160202'),(40757,'160202018','Baobaoan','16','1602','160202'),(40758,'160202019','Basag','16','1602','160202'),(40759,'160202020','Bayanihan Pob. (Bgy. 27)','16','1602','160202'),(40760,'160202021','Bilay','16','1602','160202'),(40761,'160202022','Bit-os','16','1602','160202'),(40762,'160202023','Bitan-agan','16','1602','160202'),(40763,'160202024','Bobon','16','1602','160202'),(40764,'160202025','Bonbon','16','1602','160202'),(40765,'160202026','Bugabus','16','1602','160202'),(40766,'160202027','Buhangin Pob. (Bgy. 19)','16','1602','160202'),(40767,'160202029','Cabcabon','16','1602','160202'),(40768,'160202031','Camayahan','16','1602','160202'),(40769,'160202033','Baan Riverside Pob. (Bgy. 20)','16','1602','160202'),(40770,'160202036','Dankias','16','1602','160202'),(40771,'160202037','Imadejas Pob. (Bgy. 24)','16','1602','160202'),(40772,'160202038','Diego Silang Pob. (Bgy. 6)','16','1602','160202'),(40773,'160202039','Doongan','16','1602','160202'),(40774,'160202040','Dumalagan','16','1602','160202'),(40775,'160202043','Golden Ribbon Pob. (Bgy. 2)','16','1602','160202'),(40776,'160202044','Dagohoy Pob. (Bgy. 7)','16','1602','160202'),(40777,'160202045','Jose Rizal Pob. (Bgy. 25)','16','1602','160202'),(40778,'160202047','Holy Redeemer Pob. (Bgy. 23)','16','1602','160202'),(40779,'160202048','Humabon Pob. (Bgy. 11)','16','1602','160202'),(40780,'160202049','Kinamlutan','16','1602','160202'),(40781,'160202051','Lapu-lapu Pob. (Bgy. 8)','16','1602','160202'),(40782,'160202052','Lemon','16','1602','160202'),(40783,'160202053','Leon Kilat Pob. (Bgy. 13)','16','1602','160202'),(40784,'160202054','Libertad','16','1602','160202'),(40785,'160202055','Limaha Pob. (Bgy. 14)','16','1602','160202'),(40786,'160202056','Los Angeles','16','1602','160202'),(40787,'160202057','Lumbocan','16','1602','160202'),(40788,'160202060','Maguinda','16','1602','160202'),(40789,'160202061','Mahay','16','1602','160202'),(40790,'160202062','Mahogany Pob. (Bgy. 21)','16','1602','160202'),(40791,'160202063','Maibu','16','1602','160202'),(40792,'160202064','Mandamo','16','1602','160202'),(40793,'160202065','Manila de Bugabus','16','1602','160202'),(40794,'160202066','Maon Pob. (Bgy. 1)','16','1602','160202'),(40795,'160202067','Masao','16','1602','160202'),(40796,'160202068','Maug','16','1602','160202'),(40797,'160202069','Port Poyohon Pob. (Bgy. 17 - New Asia)','16','1602','160202'),(40798,'160202070','New Society Village Pob. (Bgy. 26)','16','1602','160202'),(40799,'160202071','Ong Yiu Pob. (Bgy. 16)','16','1602','160202'),(40800,'160202072','Pianing','16','1602','160202'),(40801,'160202073','Pinamanculan','16','1602','160202'),(40802,'160202074','Rajah Soliman Pob. (Bgy. 4)','16','1602','160202'),(40803,'160202075','San Ignacio Pob. (Bgy. 15)','16','1602','160202'),(40804,'160202076','San Mateo','16','1602','160202'),(40805,'160202077','San Vicente','16','1602','160202'),(40806,'160202078','Sikatuna Pob. (Bgy. 10)','16','1602','160202'),(40807,'160202079','Silongan Pob. (Bgy. 5)','16','1602','160202'),(40808,'160202080','Sumilihon','16','1602','160202'),(40809,'160202082','Tagabaca','16','1602','160202'),(40810,'160202083','Taguibo','16','1602','160202'),(40811,'160202084','Taligaman','16','1602','160202'),(40812,'160202085','Tandang Sora Pob. (Bgy. 12)','16','1602','160202'),(40813,'160202086','Tiniwisan','16','1602','160202'),(40814,'160202087','Tungao','16','1602','160202'),(40815,'160202089','Urduja Pob. (Bgy. 9)','16','1602','160202'),(40816,'160202090','Villa Kananga','16','1602','160202'),(40817,'160202091','Obrero Pob. (Bgy. 18)','16','1602','160202'),(40818,'160202092','Bugsukan','16','1602','160202'),(40819,'160202093','De Oro','16','1602','160202'),(40820,'160202094','Dulag','16','1602','160202'),(40821,'160202095','Florida','16','1602','160202'),(40822,'160202096','Nong-nong','16','1602','160202'),(40823,'160202097','Pagatpatan','16','1602','160202'),(40824,'160202098','Pangabugan','16','1602','160202'),(40825,'160202099','Salvacion','16','1602','160202'),(40826,'160202100','Santo Niño','16','1602','160202'),(40827,'160202101','Sumile','16','1602','160202'),(40828,'160202102','Don Francisco','16','1602','160202'),(40829,'160202103','Pigdaulan','16','1602','160202'),(40830,'160203002','Antonio Luna','16','1602','160203'),(40831,'160203005','Bay-ang','16','1602','160203'),(40832,'160203006','Bayabas','16','1602','160203'),(40833,'160203007','Caasinan','16','1602','160203'),(40834,'160203009','Cabinet','16','1602','160203'),(40835,'160203010','Calamba','16','1602','160203'),(40836,'160203011','Calibunan','16','1602','160203'),(40837,'160203012','Comagascas','16','1602','160203'),(40838,'160203013','Concepcion','16','1602','160203'),(40839,'160203014','Del Pilar','16','1602','160203'),(40840,'160203016','Katugasan','16','1602','160203'),(40841,'160203017','Kauswagan','16','1602','160203'),(40842,'160203018','La Union','16','1602','160203'),(40843,'160203019','Mabini','16','1602','160203'),(40844,'160203021','Poblacion 1','16','1602','160203'),(40845,'160203022','Poblacion 10','16','1602','160203'),(40846,'160203023','Poblacion 11','16','1602','160203'),(40847,'160203024','Poblacion 12','16','1602','160203'),(40848,'160203025','Poblacion 2','16','1602','160203'),(40849,'160203026','Poblacion 3','16','1602','160203'),(40850,'160203027','Poblacion 4','16','1602','160203'),(40851,'160203028','Poblacion 5','16','1602','160203'),(40852,'160203029','Poblacion 6','16','1602','160203'),(40853,'160203030','Poblacion 7','16','1602','160203'),(40854,'160203031','Poblacion 8','16','1602','160203'),(40855,'160203032','Poblacion 9','16','1602','160203'),(40856,'160203033','Puting Bato','16','1602','160203'),(40857,'160203037','Sanghan','16','1602','160203'),(40858,'160203038','Soriano','16','1602','160203'),(40859,'160203040','Tolosa','16','1602','160203'),(40860,'160203041','Mahaba','16','1602','160203'),(40861,'160204001','Cahayagan','16','1602','160204'),(40862,'160204002','Gosoon','16','1602','160204'),(40863,'160204004','Manoligao','16','1602','160204'),(40864,'160204009','Poblacion (Carmen)','16','1602','160204'),(40865,'160204010','Rojales','16','1602','160204'),(40866,'160204011','San Agustin','16','1602','160204'),(40867,'160204012','Tagcatong','16','1602','160204'),(40868,'160204014','Vinapor','16','1602','160204'),(40869,'160205001','Baleguian','16','1602','160205'),(40870,'160205002','Bangonay','16','1602','160205'),(40871,'160205003','A. Beltran (Camalig)','16','1602','160205'),(40872,'160205004','Bunga','16','1602','160205'),(40873,'160205005','Colorado','16','1602','160205'),(40874,'160205006','Cuyago','16','1602','160205'),(40875,'160205007','Libas','16','1602','160205'),(40876,'160205008','Magdagooc','16','1602','160205'),(40877,'160205009','Magsaysay','16','1602','160205'),(40878,'160205010','Maraiging','16','1602','160205'),(40879,'160205011','Poblacion (Jabonga)','16','1602','160205'),(40880,'160205012','San Jose','16','1602','160205'),(40881,'160205013','San Pablo','16','1602','160205'),(40882,'160205014','San Vicente','16','1602','160205'),(40883,'160205015','Santo Niño','16','1602','160205'),(40884,'160206001','Bangayan','16','1602','160206'),(40885,'160206002','Canaway','16','1602','160206'),(40886,'160206003','Hinimbangan','16','1602','160206'),(40887,'160206004','Jaliobong','16','1602','160206'),(40888,'160206005','Mahayahay','16','1602','160206'),(40889,'160206006','Poblacion','16','1602','160206'),(40890,'160206007','San Isidro','16','1602','160206'),(40891,'160206008','San Roque','16','1602','160206'),(40892,'160206009','Sangay','16','1602','160206'),(40893,'160206010','Crossing','16','1602','160206'),(40894,'160206011','Songkoy','16','1602','160206'),(40895,'160207001','Ambacon','16','1602','160207'),(40896,'160207002','Bonifacio','16','1602','160207'),(40897,'160207003','Consorcia','16','1602','160207'),(40898,'160207004','Katipunan','16','1602','160207'),(40899,'160207005','Lingayao','16','1602','160207'),(40900,'160207006','Malicato','16','1602','160207'),(40901,'160207007','Maningalao','16','1602','160207'),(40902,'160207008','Marcos Calo','16','1602','160207'),(40903,'160207009','Mat-i','16','1602','160207'),(40904,'160207010','Pinana-an','16','1602','160207'),(40905,'160207011','Poblacion','16','1602','160207'),(40906,'160207013','San Isidro','16','1602','160207'),(40907,'160207014','Tinucoran','16','1602','160207'),(40908,'160207015','Balungagan','16','1602','160207'),(40909,'160207016','Eduardo G. Montilla (Camboayon)','16','1602','160207'),(40910,'160207017','Durian','16','1602','160207'),(40911,'160207018','Ibuan','16','1602','160207'),(40912,'160207019','Rosario','16','1602','160207'),(40913,'160207020','San Roque','16','1602','160207'),(40914,'160207021','Casiklan','16','1602','160207'),(40915,'160208001','Buhang','16','1602','160208'),(40916,'160208002','Caloc-an','16','1602','160208'),(40917,'160208003','Guiasan','16','1602','160208'),(40918,'160208005','Poblacion','16','1602','160208'),(40919,'160208008','Taod-oy','16','1602','160208'),(40920,'160208009','Marcos','16','1602','160208'),(40921,'160208010','Santo Niño','16','1602','160208'),(40922,'160208011','Santo Rosario','16','1602','160208'),(40923,'160209001','Aclan','16','1602','160209'),(40924,'160209002','Amontay','16','1602','160209'),(40925,'160209004','Ata-atahon','16','1602','160209'),(40926,'160209005','Camagong','16','1602','160209'),(40927,'160209006','Cubi-cubi','16','1602','160209'),(40928,'160209007','Culit','16','1602','160209'),(40929,'160209008','Jaguimitan','16','1602','160209'),(40930,'160209009','Kinabjangan','16','1602','160209'),(40931,'160209010','Barangay 1 (Pob.)','16','1602','160209'),(40932,'160209011','Barangay 2 (Pob.)','16','1602','160209'),(40933,'160209012','Barangay 3 (Pob.)','16','1602','160209'),(40934,'160209013','Barangay 4 (Pob.)','16','1602','160209'),(40935,'160209014','Barangay 5 (Pob.)','16','1602','160209'),(40936,'160209015','Barangay 6 (Pob.)','16','1602','160209'),(40937,'160209016','Barangay 7 (Pob.)','16','1602','160209'),(40938,'160209017','Punta','16','1602','160209'),(40939,'160209018','Santa Ana','16','1602','160209'),(40940,'160209019','Talisay','16','1602','160209'),(40941,'160209020','Triangulo','16','1602','160209'),(40942,'160210002','Curva','16','1602','160210'),(40943,'160210003','Jagupit','16','1602','160210'),(40944,'160210005','La Paz','16','1602','160210'),(40945,'160210007','Poblacion I','16','1602','160210'),(40946,'160210008','San Isidro','16','1602','160210'),(40947,'160210009','Tagbuyacan','16','1602','160210'),(40948,'160210010','Estanislao Morgado','16','1602','160210'),(40949,'160210011','Poblacion II','16','1602','160210'),(40950,'160210012','Pangaylan-IP','16','1602','160210'),(40951,'160211001','Binuangan','16','1602','160211'),(40952,'160211002','Cabayawa','16','1602','160211'),(40953,'160211003','Doña Rosario','16','1602','160211'),(40954,'160211004','La Fraternidad','16','1602','160211'),(40955,'160211005','Lawigan','16','1602','160211'),(40956,'160211006','Poblacion 1','16','1602','160211'),(40957,'160211007','Poblacion 2','16','1602','160211'),(40958,'160211008','Santa Ana','16','1602','160211'),(40959,'160211009','Tagmamarkay','16','1602','160211'),(40960,'160211010','Tagpangahoy','16','1602','160211'),(40961,'160211011','Tinigbasan','16','1602','160211'),(40962,'160211012','Victory','16','1602','160211'),(40963,'160211013','Doña Telesfora','16','1602','160211'),(40964,'160212001','Poblacion I (Agay)','16','1602','160212'),(40965,'160212002','Balangbalang','16','1602','160212'),(40966,'160212003','Basilisa','16','1602','160212'),(40967,'160212004','Humilog','16','1602','160212'),(40968,'160212005','Panaytayon','16','1602','160212'),(40969,'160212006','San Antonio','16','1602','160212'),(40970,'160212007','Tagbongabong','16','1602','160212'),(40971,'160212008','Poblacion II','16','1602','160212'),(40972,'160301001','Calaitan','16','1603','160301'),(40973,'160301002','Charito','16','1603','160301'),(40974,'160301003','Fili','16','1603','160301'),(40975,'160301004','Hamogaway','16','1603','160301'),(40976,'160301006','Katipunan','16','1603','160301'),(40977,'160301007','Mabuhay','16','1603','160301'),(40978,'160301009','Marcelina','16','1603','160301'),(40979,'160301010','Maygatasan','16','1603','160301'),(40980,'160301011','Noli','16','1603','160301'),(40981,'160301013','Osmeña','16','1603','160301'),(40982,'160301014','Panaytay','16','1603','160301'),(40983,'160301016','Poblacion','16','1603','160301'),(40984,'160301017','Sagmone','16','1603','160301'),(40985,'160301018','Saguma','16','1603','160301'),(40986,'160301019','Salvacion','16','1603','160301'),(40987,'160301020','San Isidro','16','1603','160301'),(40988,'160301023','Santa Irene','16','1603','160301'),(40989,'160301024','Taglatawan','16','1603','160301'),(40990,'160301025','Verdu','16','1603','160301'),(40991,'160301027','Wawa','16','1603','160301'),(40992,'160301028','Berseba','16','1603','160301'),(40993,'160301029','Bucac','16','1603','160301'),(40994,'160301030','Cagbas','16','1603','160301'),(40995,'160301031','Canayugan','16','1603','160301'),(40996,'160301032','Claro Cortez','16','1603','160301'),(40997,'160301033','Gamao','16','1603','160301'),(40998,'160301034','Getsemane','16','1603','160301'),(40999,'160301035','Grace Estate','16','1603','160301'),(41000,'160301036','Magkiangkang','16','1603','160301'),(41001,'160301037','Mahayag','16','1603','160301'),(41002,'160301038','Montivesta','16','1603','160301'),(41003,'160301039','Mt. Ararat','16','1603','160301'),(41004,'160301040','Mt. Carmel','16','1603','160301'),(41005,'160301041','Mt. Olive','16','1603','160301'),(41006,'160301042','New Salem','16','1603','160301'),(41007,'160301043','Pinagalaan','16','1603','160301'),(41008,'160301044','San Agustin','16','1603','160301'),(41009,'160301045','San Juan','16','1603','160301'),(41010,'160301046','Santa Teresita','16','1603','160301'),(41011,'160301047','Santo Niño','16','1603','160301'),(41012,'160301048','Taglibas','16','1603','160301'),(41013,'160301049','Tagubay','16','1603','160301'),(41014,'160301050','Villa Undayon','16','1603','160301'),(41015,'160302001','Bunawan Brook','16','1603','160302'),(41016,'160302002','Consuelo','16','1603','160302'),(41017,'160302003','Libertad','16','1603','160302'),(41018,'160302004','Mambalili','16','1603','160302'),(41019,'160302005','Poblacion','16','1603','160302'),(41020,'160302006','San Andres','16','1603','160302'),(41021,'160302007','San Marcos','16','1603','160302'),(41022,'160302008','Imelda','16','1603','160302'),(41023,'160302009','Nueva Era','16','1603','160302'),(41024,'160302010','San Teodoro','16','1603','160302'),(41025,'160303001','Anolingan','16','1603','160303'),(41026,'160303002','Bakingking','16','1603','160303'),(41027,'160303003','Bentahon','16','1603','160303'),(41028,'160303004','Bunaguit','16','1603','160303'),(41029,'160303006','Catmonon','16','1603','160303'),(41030,'160303007','Concordia','16','1603','160303'),(41031,'160303008','Dakutan','16','1603','160303'),(41032,'160303009','Duangan','16','1603','160303'),(41033,'160303010','Mac-Arthur','16','1603','160303'),(41034,'160303011','Guadalupe','16','1603','160303'),(41035,'160303012','Hawilian','16','1603','160303'),(41036,'160303013','Labao','16','1603','160303'),(41037,'160303014','Maasin','16','1603','160303'),(41038,'160303015','Mahagcot','16','1603','160303'),(41039,'160303016','Milagros','16','1603','160303'),(41040,'160303017','Nato','16','1603','160303'),(41041,'160303018','Oro','16','1603','160303'),(41042,'160303019','Poblacion','16','1603','160303'),(41043,'160303020','Remedios','16','1603','160303'),(41044,'160303021','Salug','16','1603','160303'),(41045,'160303022','San Toribio','16','1603','160303'),(41046,'160303023','Santa Fe','16','1603','160303'),(41047,'160303024','Segunda','16','1603','160303'),(41048,'160303026','Tagabase','16','1603','160303'),(41049,'160303027','Taganahaw','16','1603','160303'),(41050,'160303028','Tagbalili','16','1603','160303'),(41051,'160303029','Tahina','16','1603','160303'),(41052,'160303030','Tandang Sora','16','1603','160303'),(41053,'160303031','Agsabu','16','1603','160303'),(41054,'160303032','Aguinaldo','16','1603','160303'),(41055,'160303033','Balubo','16','1603','160303'),(41056,'160303034','Cebulan','16','1603','160303'),(41057,'160303035','Crossing Luna','16','1603','160303'),(41058,'160303036','Cubo','16','1603','160303'),(41059,'160303037','Guibonon','16','1603','160303'),(41060,'160303038','Kalabuan','16','1603','160303'),(41061,'160303039','Kinamaybay','16','1603','160303'),(41062,'160303040','Langag','16','1603','160303'),(41063,'160303041','Maliwanag','16','1603','160303'),(41064,'160303042','New Gingoog','16','1603','160303'),(41065,'160303043','Odiong','16','1603','160303'),(41066,'160303044','Piglawigan','16','1603','160303'),(41067,'160303045','San Isidro','16','1603','160303'),(41068,'160303046','San Jose','16','1603','160303'),(41069,'160303047','San Vicente','16','1603','160303'),(41070,'160303048','Sinakungan','16','1603','160303'),(41071,'160303049','Valentina','16','1603','160303'),(41072,'160304001','Bataan','16','1603','160304'),(41073,'160304002','Comota','16','1603','160304'),(41074,'160304003','Halapitan','16','1603','160304'),(41075,'160304004','Langasian','16','1603','160304'),(41076,'160304005','Osmeña, Sr.','16','1603','160304'),(41077,'160304006','Poblacion','16','1603','160304'),(41078,'160304007','Sagunto','16','1603','160304'),(41079,'160304008','Villa Paz','16','1603','160304'),(41080,'160304009','Angeles','16','1603','160304'),(41081,'160304010','Kasapa II','16','1603','160304'),(41082,'160304011','Lydia','16','1603','160304'),(41083,'160304012','Panagangan','16','1603','160304'),(41084,'160304013','Sabang Adgawan','16','1603','160304'),(41085,'160304014','San Patricio','16','1603','160304'),(41086,'160304015','Valentina','16','1603','160304'),(41087,'160305001','Binucayan','16','1603','160305'),(41088,'160305002','Johnson','16','1603','160305'),(41089,'160305003','Magaud','16','1603','160305'),(41090,'160305004','Nueva Gracia','16','1603','160305'),(41091,'160305005','Poblacion','16','1603','160305'),(41092,'160305006','San Isidro','16','1603','160305'),(41093,'160305007','San Mariano','16','1603','160305'),(41094,'160305008','San Vicente','16','1603','160305'),(41095,'160305009','Santa Teresa','16','1603','160305'),(41096,'160305010','Santo Tomas','16','1603','160305'),(41097,'160305011','Violanta','16','1603','160305'),(41098,'160305012','Waloe','16','1603','160305'),(41099,'160305013','Kasapa','16','1603','160305'),(41100,'160305014','Katipunan','16','1603','160305'),(41101,'160305015','Kauswagan','16','1603','160305'),(41102,'160305016','Santo Niño','16','1603','160305'),(41103,'160305017','Sabud','16','1603','160305'),(41104,'160306001','Aurora','16','1603','160306'),(41105,'160306002','Awa','16','1603','160306'),(41106,'160306003','Azpetia','16','1603','160306'),(41107,'160306004','Poblacion (Bahbah)','16','1603','160306'),(41108,'160306006','La Caridad','16','1603','160306'),(41109,'160306007','La Suerte','16','1603','160306'),(41110,'160306008','La Union','16','1603','160306'),(41111,'160306009','Las Navas','16','1603','160306'),(41112,'160306010','Libertad','16','1603','160306'),(41113,'160306011','Los Arcos','16','1603','160306'),(41114,'160306012','Lucena','16','1603','160306'),(41115,'160306013','Mabuhay','16','1603','160306'),(41116,'160306014','Magsaysay','16','1603','160306'),(41117,'160306015','Mapaga','16','1603','160306'),(41118,'160306016','New Maug','16','1603','160306'),(41119,'160306017','Napo','16','1603','160306'),(41120,'160306018','Patin-ay','16','1603','160306'),(41121,'160306020','Salimbogaon','16','1603','160306'),(41122,'160306021','Salvacion','16','1603','160306'),(41123,'160306022','San Joaquin','16','1603','160306'),(41124,'160306023','San Jose','16','1603','160306'),(41125,'160306024','San Lorenzo','16','1603','160306'),(41126,'160306025','San Martin','16','1603','160306'),(41127,'160306026','San Pedro','16','1603','160306'),(41128,'160306027','San Rafael','16','1603','160306'),(41129,'160306029','San Salvador','16','1603','160306'),(41130,'160306030','San Vicente','16','1603','160306'),(41131,'160306031','Santa Irene','16','1603','160306'),(41132,'160306032','Santa Maria','16','1603','160306'),(41133,'160306033','La Perian','16','1603','160306'),(41134,'160306034','La Purisima','16','1603','160306'),(41135,'160306035','San Roque','16','1603','160306'),(41136,'160307001','Bayugan 3','16','1603','160307'),(41137,'160307002','Cabantao','16','1603','160307'),(41138,'160307003','Cabawan','16','1603','160307'),(41139,'160307004','Marfil','16','1603','160307'),(41140,'160307005','Novele','16','1603','160307'),(41141,'160307006','Poblacion','16','1603','160307'),(41142,'160307007','Santa Cruz','16','1603','160307'),(41143,'160307008','Tagbayagan','16','1603','160307'),(41144,'160307009','Wasi-an','16','1603','160307'),(41145,'160307010','Libuac','16','1603','160307'),(41146,'160307011','Maligaya','16','1603','160307'),(41147,'160308001','Alegria','16','1603','160308'),(41148,'160308002','Bayugan 2','16','1603','160308'),(41149,'160308003','Borbon','16','1603','160308'),(41150,'160308005','Caimpugan','16','1603','160308'),(41151,'160308006','Ebro','16','1603','160308'),(41152,'160308007','Hubang','16','1603','160308'),(41153,'160308008','Lapinigan','16','1603','160308'),(41154,'160308009','Lucac','16','1603','160308'),(41155,'160308010','Mate','16','1603','160308'),(41156,'160308011','New Visayas','16','1603','160308'),(41157,'160308012','Pasta','16','1603','160308'),(41158,'160308013','Pisa-an','16','1603','160308'),(41159,'160308015','Barangay 1 (Pob.)','16','1603','160308'),(41160,'160308016','Barangay 2 (Pob.)','16','1603','160308'),(41161,'160308017','Barangay 3 (Pob.)','16','1603','160308'),(41162,'160308018','Barangay 4 (Pob.)','16','1603','160308'),(41163,'160308019','Barangay 5 (Pob.)','16','1603','160308'),(41164,'160308020','Rizal','16','1603','160308'),(41165,'160308021','San Isidro','16','1603','160308'),(41166,'160308022','Santa Ana','16','1603','160308'),(41167,'160308024','Tagapua','16','1603','160308'),(41168,'160308025','Bitan-agan','16','1603','160308'),(41169,'160308026','Buenasuerte','16','1603','160308'),(41170,'160308027','Das-agan','16','1603','160308'),(41171,'160308028','Karaus','16','1603','160308'),(41172,'160308029','Ladgadan','16','1603','160308'),(41173,'160308030','Ormaca','16','1603','160308'),(41174,'160309001','Anislagan','16','1603','160309'),(41175,'160309002','Baylo','16','1603','160309'),(41176,'160309003','Coalicion','16','1603','160309'),(41177,'160309004','Culi','16','1603','160309'),(41178,'160309005','Nuevo Trabajo','16','1603','160309'),(41179,'160309006','Poblacion','16','1603','160309'),(41180,'160309007','Santa Ines','16','1603','160309'),(41181,'160309008','Balit','16','1603','160309'),(41182,'160309009','Binicalan','16','1603','160309'),(41183,'160309010','Cecilia','16','1603','160309'),(41184,'160309011','Dimasalang','16','1603','160309'),(41185,'160309012','Don Alejandro','16','1603','160309'),(41186,'160309013','Don Pedro','16','1603','160309'),(41187,'160309014','Doña Flavia','16','1603','160309'),(41188,'160309015','Mahagsay','16','1603','160309'),(41189,'160309016','Mahapag','16','1603','160309'),(41190,'160309017','Mahayahay','16','1603','160309'),(41191,'160309018','Muritula','16','1603','160309'),(41192,'160309019','Policarpo','16','1603','160309'),(41193,'160309020','San Isidro','16','1603','160309'),(41194,'160309021','San Pedro','16','1603','160309'),(41195,'160309022','Santa Rita','16','1603','160309'),(41196,'160309023','Santiago','16','1603','160309'),(41197,'160309024','Wegguam','16','1603','160309'),(41198,'160309025','Doña Maxima','16','1603','160309'),(41199,'160310001','Angas','16','1603','160310'),(41200,'160310002','Aurora','16','1603','160310'),(41201,'160310003','Awao','16','1603','160310'),(41202,'160310004','Tapaz','16','1603','160310'),(41203,'160310005','Patrocinio','16','1603','160310'),(41204,'160310006','Poblacion','16','1603','160310'),(41205,'160310007','San Jose','16','1603','160310'),(41206,'160310008','Santa Isabel','16','1603','160310'),(41207,'160310009','Sayon','16','1603','160310'),(41208,'160310010','Concepcion','16','1603','160310'),(41209,'160310011','Pag-asa','16','1603','160310'),(41210,'160311001','BuenaGracia','16','1603','160311'),(41211,'160311002','Causwagan','16','1603','160311'),(41212,'160311004','Culi','16','1603','160311'),(41213,'160311005','Del Monte','16','1603','160311'),(41214,'160311006','Desamparados','16','1603','160311'),(41215,'160311007','Labnig','16','1603','160311'),(41216,'160311008','Sabang Gibung','16','1603','160311'),(41217,'160311009','San Agustin (Pob.)','16','1603','160311'),(41218,'160311010','San Isidro (Pob.)','16','1603','160311'),(41219,'160311011','San Nicolas (Pob.)','16','1603','160311'),(41220,'160311012','Zamora','16','1603','160311'),(41221,'160311013','Zillovia','16','1603','160311'),(41222,'160311014','La Flora','16','1603','160311'),(41223,'160311015','Maharlika','16','1603','160311'),(41224,'160311016','Marbon','16','1603','160311'),(41225,'160311017','Batucan','16','1603','160311'),(41226,'160312001','Basa','16','1603','160312'),(41227,'160312002','Cuevas','16','1603','160312'),(41228,'160312003','Kapatungan','16','1603','160312'),(41229,'160312004','Langkila-an','16','1603','160312'),(41230,'160312005','New Visayas','16','1603','160312'),(41231,'160312006','Poblacion','16','1603','160312'),(41232,'160312007','Pulang-lupa','16','1603','160312'),(41233,'160312008','Salvacion','16','1603','160312'),(41234,'160312009','San Ignacio','16','1603','160312'),(41235,'160312010','San Isidro','16','1603','160312'),(41236,'160312011','San Roque','16','1603','160312'),(41237,'160312012','Santa Maria','16','1603','160312'),(41238,'160312013','Tudela','16','1603','160312'),(41239,'160312014','Cebolin','16','1603','160312'),(41240,'160312015','Manat','16','1603','160312'),(41241,'160312016','Pangyan','16','1603','160312'),(41242,'160313001','Binongan','16','1603','160313'),(41243,'160313002','Del Monte','16','1603','160313'),(41244,'160313003','Don Mateo','16','1603','160313'),(41245,'160313004','La Fortuna','16','1603','160313'),(41246,'160313005','Limot','16','1603','160313'),(41247,'160313006','Magsaysay','16','1603','160313'),(41248,'160313007','Masayan','16','1603','160313'),(41249,'160313008','Poblacion','16','1603','160313'),(41250,'160313009','Sampaguita','16','1603','160313'),(41251,'160313010','San Gabriel','16','1603','160313'),(41252,'160313011','Santa Emelia','16','1603','160313'),(41253,'160313012','Sinobong','16','1603','160313'),(41254,'160313013','Anitap','16','1603','160313'),(41255,'160313014','Bacay II','16','1603','160313'),(41256,'160313015','Caigangan','16','1603','160313'),(41257,'160313016','Candiis','16','1603','160313'),(41258,'160313017','Katipunan','16','1603','160313'),(41259,'160313018','Santa Cruz','16','1603','160313'),(41260,'160313019','Sawagan','16','1603','160313'),(41261,'160313020','Sisimon','16','1603','160313'),(41262,'160314001','Afga','16','1603','160314'),(41263,'160314002','Anahawan','16','1603','160314'),(41264,'160314003','Banagbanag','16','1603','160314'),(41265,'160314004','Del Rosario','16','1603','160314'),(41266,'160314005','El Rio','16','1603','160314'),(41267,'160314006','Ilihan','16','1603','160314'),(41268,'160314007','Kauswagan','16','1603','160314'),(41269,'160314008','Kioya','16','1603','160314'),(41270,'160314009','Magkalape','16','1603','160314'),(41271,'160314010','Magsaysay','16','1603','160314'),(41272,'160314011','Mahayahay','16','1603','160314'),(41273,'160314012','New Tubigon','16','1603','160314'),(41274,'160314013','Padiay','16','1603','160314'),(41275,'160314014','Perez','16','1603','160314'),(41276,'160314015','Poblacion','16','1603','160314'),(41277,'160314016','San Isidro','16','1603','160314'),(41278,'160314017','San Vicente','16','1603','160314'),(41279,'160314018','Santa Cruz','16','1603','160314'),(41280,'160314019','Santa Maria','16','1603','160314'),(41281,'160314020','Sinai','16','1603','160314'),(41282,'160314021','Tabon-tabon','16','1603','160314'),(41283,'160314022','Tag-uyango','16','1603','160314'),(41284,'160314023','Villangit','16','1603','160314'),(41285,'160314024','Kolambugan','16','1603','160314'),(41286,'166701001','Poblacion (Alegria)','16','1667','166701'),(41287,'166701002','Alipao','16','1667','166701'),(41288,'166701003','Budlingin','16','1667','166701'),(41289,'166701004','Camp Eduard (Geotina)','16','1667','166701'),(41290,'166701005','Ombong','16','1667','166701'),(41291,'166701006','Pongtud','16','1667','166701'),(41292,'166701007','San Pedro','16','1667','166701'),(41293,'166701008','Ferlda','16','1667','166701'),(41294,'166701009','Julio Ouano (Pob.)','16','1667','166701'),(41295,'166701010','San Juan','16','1667','166701'),(41296,'166701011','Anahaw','16','1667','166701'),(41297,'166701012','Gamuton','16','1667','166701'),(41298,'166702001','Cabugao','16','1667','166702'),(41299,'166702002','Cambuayon','16','1667','166702'),(41300,'166702003','Campo','16','1667','166702'),(41301,'166702004','Dugsangon','16','1667','166702'),(41302,'166702005','Pautao','16','1667','166702'),(41303,'166702006','Payapag','16','1667','166702'),(41304,'166702007','Poblacion','16','1667','166702'),(41305,'166702008','Pungtod','16','1667','166702'),(41306,'166702009','Santo Rosario','16','1667','166702'),(41307,'166704001','Baybay','16','1667','166704'),(41308,'166704002','Bitaug','16','1667','166704'),(41309,'166704003','Poblacion 1','16','1667','166704'),(41310,'166704004','Poblacion 2','16','1667','166704'),(41311,'166704005','San Mateo','16','1667','166704'),(41312,'166704006','Matin-ao','16','1667','166704'),(41313,'166706001','Cabugo','16','1667','166706'),(41314,'166706002','Cagdianao','16','1667','166706'),(41315,'166706003','Daywan','16','1667','166706'),(41316,'166706004','Hayanggabon','16','1667','166706'),(41317,'166706005','Ladgaron (Pob.)','16','1667','166706'),(41318,'166706006','Lapinigan','16','1667','166706'),(41319,'166706007','Magallanes','16','1667','166706'),(41320,'166706008','Panatao','16','1667','166706'),(41321,'166706009','Tayaga (Pob. East)','16','1667','166706'),(41322,'166706010','Bagakay (Pob. West)','16','1667','166706'),(41323,'166706011','Sapa','16','1667','166706'),(41324,'166706012','Taganito','16','1667','166706'),(41325,'166706013','Urbiztondo','16','1667','166706'),(41326,'166706014','Wangke','16','1667','166706'),(41327,'166707001','Bagakay','16','1667','166707'),(41328,'166707002','Barangay 1 (Pob.)','16','1667','166707'),(41329,'166707003','Barangay 13 (Pob.)','16','1667','166707'),(41330,'166707004','Buenavista','16','1667','166707'),(41331,'166707005','Cabawa','16','1667','166707'),(41332,'166707006','Cambas-ac','16','1667','166707'),(41333,'166707007','Consolacion','16','1667','166707'),(41334,'166707008','Corregidor','16','1667','166707'),(41335,'166707009','Dagohoy','16','1667','166707'),(41336,'166707010','Don Paulino','16','1667','166707'),(41337,'166707011','Jubang','16','1667','166707'),(41338,'166707012','Montserrat','16','1667','166707'),(41339,'166707013','Osmeña','16','1667','166707'),(41340,'166707014','Barangay 10 (Pob.)','16','1667','166707'),(41341,'166707015','Barangay 11 (Pob.)','16','1667','166707'),(41342,'166707016','Barangay 12 (Pob.)','16','1667','166707'),(41343,'166707017','Barangay 2 (Pob.)','16','1667','166707'),(41344,'166707018','Barangay 3 (Pob.)','16','1667','166707'),(41345,'166707019','Barangay 4 (Pob.)','16','1667','166707'),(41346,'166707020','Barangay 5 (Pob.)','16','1667','166707'),(41347,'166707021','Barangay 6 (Pob.)','16','1667','166707'),(41348,'166707022','Barangay 7 (Pob.)','16','1667','166707'),(41349,'166707023','Barangay 8 (Pob.)','16','1667','166707'),(41350,'166707024','Barangay 9 (Pob.)','16','1667','166707'),(41351,'166707025','San Carlos','16','1667','166707'),(41352,'166707026','San Miguel','16','1667','166707'),(41353,'166707027','Santa Fe','16','1667','166707'),(41354,'166707028','Union','16','1667','166707'),(41355,'166707029','Santa Felomina','16','1667','166707'),(41356,'166708001','Bagakay (Alburo)','16','1667','166708'),(41357,'166708002','Antipolo','16','1667','166708'),(41358,'166708004','Bitoon','16','1667','166708'),(41359,'166708006','Cabugao','16','1667','166708'),(41360,'166708007','Cancohoy','16','1667','166708'),(41361,'166708008','Caub','16','1667','166708'),(41362,'166708009','Del Carmen (Pob.)','16','1667','166708'),(41363,'166708010','Domoyog','16','1667','166708'),(41364,'166708011','Esperanza','16','1667','166708'),(41365,'166708012','Jamoyaon','16','1667','166708'),(41366,'166708013','Katipunan','16','1667','166708'),(41367,'166708014','Lobogon','16','1667','166708'),(41368,'166708016','Mabuhay','16','1667','166708'),(41369,'166708017','Mahayahay','16','1667','166708'),(41370,'166708019','Quezon','16','1667','166708'),(41371,'166708021','San Fernando','16','1667','166708'),(41372,'166708022','San Jose (Pob.)','16','1667','166708'),(41373,'166708025','Sayak','16','1667','166708'),(41374,'166708027','Tuboran','16','1667','166708'),(41375,'166708028','Halian','16','1667','166708'),(41376,'166710001','Anajawan','16','1667','166710'),(41377,'166710002','Cabitoonan','16','1667','166710'),(41378,'166710003','Catangnan','16','1667','166710'),(41379,'166710004','Consuelo','16','1667','166710'),(41380,'166710005','Corazon','16','1667','166710'),(41381,'166710006','Daku','16','1667','166710'),(41382,'166710007','Poblacion I (Purok I)','16','1667','166710'),(41383,'166710008','Poblacion II (Purok II)','16','1667','166710'),(41384,'166710009','Poblacion III (Purok III)','16','1667','166710'),(41385,'166710010','Poblacion IV (Purok IV)','16','1667','166710'),(41386,'166710011','Poblacion V (Purok V)','16','1667','166710'),(41387,'166710012','La Januza','16','1667','166710'),(41388,'166710013','Libertad','16','1667','166710'),(41389,'166710014','Magsaysay','16','1667','166710'),(41390,'166710015','Malinao','16','1667','166710'),(41391,'166710017','Santa Cruz','16','1667','166710'),(41392,'166710018','Santa Fe','16','1667','166710'),(41393,'166710019','Suyangan','16','1667','166710'),(41394,'166710020','Tawin-tawin','16','1667','166710'),(41395,'166711001','Alambique (Pob.)','16','1667','166711'),(41396,'166711002','Anibongan','16','1667','166711'),(41397,'166711003','Camam-onan','16','1667','166711'),(41398,'166711004','Cam-boayon','16','1667','166711'),(41399,'166711005','Ipil (Pob.)','16','1667','166711'),(41400,'166711006','Lahi','16','1667','166711'),(41401,'166711007','Mahanub','16','1667','166711'),(41402,'166711008','Poniente','16','1667','166711'),(41403,'166711009','San Antonio (Bonot)','16','1667','166711'),(41404,'166711010','San Isidro','16','1667','166711'),(41405,'166711011','Sico-sico','16','1667','166711'),(41406,'166711012','Villaflor','16','1667','166711'),(41407,'166711013','Villafranca','16','1667','166711'),(41408,'166714001','Binga','16','1667','166714'),(41409,'166714002','Bobona-on','16','1667','166714'),(41410,'166714003','Cantugas','16','1667','166714'),(41411,'166714004','Dayano','16','1667','166714'),(41412,'166714005','Mabini','16','1667','166714'),(41413,'166714006','Magpayang','16','1667','166714'),(41414,'166714007','Magsaysay (Pob.)','16','1667','166714'),(41415,'166714009','Mansayao','16','1667','166714'),(41416,'166714010','Marayag','16','1667','166714'),(41417,'166714011','Matin-ao','16','1667','166714'),(41418,'166714012','Paco','16','1667','166714'),(41419,'166714013','Quezon (Pob.)','16','1667','166714'),(41420,'166714014','Roxas','16','1667','166714'),(41421,'166714015','San Francisco','16','1667','166714'),(41422,'166714016','San Isidro','16','1667','166714'),(41423,'166714017','San Jose','16','1667','166714'),(41424,'166714018','Siana','16','1667','166714'),(41425,'166714019','Silop','16','1667','166714'),(41426,'166714020','Tagbuyawan','16','1667','166714'),(41427,'166714021','Tapi-an','16','1667','166714'),(41428,'166714022','Tolingon','16','1667','166714'),(41429,'166715001','Doro (Binocaran)','16','1667','166715'),(41430,'166715002','Bunyasan','16','1667','166715'),(41431,'166715003','Cantapoy','16','1667','166715'),(41432,'166715004','Cagtinae','16','1667','166715'),(41433,'166715005','Cayawan','16','1667','166715'),(41434,'166715007','Hanagdong','16','1667','166715'),(41435,'166715008','Karihatag','16','1667','166715'),(41436,'166715009','Masgad','16','1667','166715'),(41437,'166715010','Pili','16','1667','166715'),(41438,'166715012','San Isidro (Pob.)','16','1667','166715'),(41439,'166715013','Tinago','16','1667','166715'),(41440,'166715014','Cansayong','16','1667','166715'),(41441,'166715015','Can-aga','16','1667','166715'),(41442,'166715016','Villariza','16','1667','166715'),(41443,'166716001','Caridad','16','1667','166716'),(41444,'166716002','Katipunan','16','1667','166716'),(41445,'166716003','Maasin','16','1667','166716'),(41446,'166716004','Mabini','16','1667','166716'),(41447,'166716005','Mabuhay','16','1667','166716'),(41448,'166716006','Salvacion','16','1667','166716'),(41449,'166716007','San Roque','16','1667','166716'),(41450,'166716008','Asinan (Pob.)','16','1667','166716'),(41451,'166716009','Centro (Pob.)','16','1667','166716'),(41452,'166716010','Pilaring (Pob.)','16','1667','166716'),(41453,'166716011','Punta (Pob.)','16','1667','166716'),(41454,'166716012','Consolacion','16','1667','166716'),(41455,'166716013','Datu','16','1667','166716'),(41456,'166716014','Dayaohay','16','1667','166716'),(41457,'166716015','Jaboy','16','1667','166716'),(41458,'166717002','Amoslog','16','1667','166717'),(41459,'166717003','Anislagan','16','1667','166717'),(41460,'166717004','Bad-as','16','1667','166717'),(41461,'166717005','Boyongan','16','1667','166717'),(41462,'166717006','Bugas-bugas','16','1667','166717'),(41463,'166717007','Central (Pob.)','16','1667','166717'),(41464,'166717008','Ellaperal (Nonok)','16','1667','166717'),(41465,'166717009','Ipil (Pob.)','16','1667','166717'),(41466,'166717010','Lakandula','16','1667','166717'),(41467,'166717011','Mabini','16','1667','166717'),(41468,'166717012','Macalaya','16','1667','166717'),(41469,'166717013','Magsaysay (Pob.)','16','1667','166717'),(41470,'166717014','Magupange','16','1667','166717'),(41471,'166717015','Pananay-an','16','1667','166717'),(41472,'166717016','Panhutongan','16','1667','166717'),(41473,'166717017','San Isidro','16','1667','166717'),(41474,'166717018','Santa Cruz','16','1667','166717'),(41475,'166717019','Suyoc','16','1667','166717'),(41476,'166717020','Tagbongabong','16','1667','166717'),(41477,'166717021','Sani-sani','16','1667','166717'),(41478,'166718001','Bongdo','16','1667','166718'),(41479,'166718002','Maribojoc','16','1667','166718'),(41480,'166718003','Nuevo Campo','16','1667','166718'),(41481,'166718005','San Juan','16','1667','166718'),(41482,'166718006','Santa Cruz (Pob.)','16','1667','166718'),(41483,'166718007','Talisay (Pob.)','16','1667','166718'),(41484,'166719001','Amontay','16','1667','166719'),(41485,'166719002','Balite','16','1667','166719'),(41486,'166719003','Banbanon','16','1667','166719'),(41487,'166719004','Diaz','16','1667','166719'),(41488,'166719005','Honrado','16','1667','166719'),(41489,'166719006','Jubgan','16','1667','166719'),(41490,'166719007','Linongganan','16','1667','166719'),(41491,'166719008','Macopa','16','1667','166719'),(41492,'166719009','Magtangale','16','1667','166719'),(41493,'166719010','Oslao','16','1667','166719'),(41494,'166719011','Poblacion','16','1667','166719'),(41495,'166720001','Buhing Calipay','16','1667','166720'),(41496,'166720002','Del Carmen (Pob.)','16','1667','166720'),(41497,'166720003','Del Pilar','16','1667','166720'),(41498,'166720004','Macapagal','16','1667','166720'),(41499,'166720006','Pacifico','16','1667','166720'),(41500,'166720007','Pelaez','16','1667','166720'),(41501,'166720008','Roxas','16','1667','166720'),(41502,'166720009','San Miguel','16','1667','166720'),(41503,'166720010','Santa Paz','16','1667','166720'),(41504,'166720011','Santo Niño','16','1667','166720'),(41505,'166720012','Tambacan','16','1667','166720'),(41506,'166720013','Tigasao','16','1667','166720'),(41507,'166721001','Abad Santos','16','1667','166721'),(41508,'166721002','Alegria','16','1667','166721'),(41509,'166721003','T. Arlan (Pob.)','16','1667','166721'),(41510,'166721004','Bailan','16','1667','166721'),(41511,'166721005','Garcia','16','1667','166721'),(41512,'166721006','Libertad','16','1667','166721'),(41513,'166721007','Mabini','16','1667','166721'),(41514,'166721008','Mabuhay (Pob.)','16','1667','166721'),(41515,'166721009','Magsaysay','16','1667','166721'),(41516,'166721010','Rizal','16','1667','166721'),(41517,'166721012','Tangbo','16','1667','166721'),(41518,'166722001','Biyabid','16','1667','166722'),(41519,'166722003','Gacepan','16','1667','166722'),(41520,'166722004','Ima','16','1667','166722'),(41521,'166722005','Lower Patag','16','1667','166722'),(41522,'166722006','Mabuhay','16','1667','166722'),(41523,'166722007','Mayag','16','1667','166722'),(41524,'166722008','Poblacion (San Pedro)','16','1667','166722'),(41525,'166722009','San Isidro','16','1667','166722'),(41526,'166722010','San Pablo','16','1667','166722'),(41527,'166722011','Tagbayani','16','1667','166722'),(41528,'166722012','Tinogpahan','16','1667','166722'),(41529,'166722013','Upper Patag','16','1667','166722'),(41530,'166723001','Del Pilar','16','1667','166723'),(41531,'166723002','Helene','16','1667','166723'),(41532,'166723003','Honrado','16','1667','166723'),(41533,'166723004','Navarro (Pob.)','16','1667','166723'),(41534,'166723005','Nueva Estrella','16','1667','166723'),(41535,'166723006','Pamosaingan','16','1667','166723'),(41536,'166723007','Rizal (Pob.)','16','1667','166723'),(41537,'166723008','Salog','16','1667','166723'),(41538,'166723009','San Roque','16','1667','166723'),(41539,'166723010','Santa Cruz','16','1667','166723'),(41540,'166723011','Sering','16','1667','166723'),(41541,'166723012','Songkoy','16','1667','166723'),(41542,'166723013','Sudlon','16','1667','166723'),(41543,'166723014','Albino Taruc','16','1667','166723'),(41544,'166724001','Alang-alang','16','1667','166724'),(41545,'166724002','Alegria','16','1667','166724'),(41546,'166724003','Anomar','16','1667','166724'),(41547,'166724004','Aurora','16','1667','166724'),(41548,'166724005','Serna (Bad-asay)','16','1667','166724'),(41549,'166724006','Balibayon','16','1667','166724'),(41550,'166724007','Baybay','16','1667','166724'),(41551,'166724008','Bilabid','16','1667','166724'),(41552,'166724010','Bitaugan','16','1667','166724'),(41553,'166724011','Bonifacio','16','1667','166724'),(41554,'166724012','Buenavista','16','1667','166724'),(41555,'166724013','Cabongbongan','16','1667','166724'),(41556,'166724014','Cagniog','16','1667','166724'),(41557,'166724015','Cagutsan','16','1667','166724'),(41558,'166724016','Cantiasay','16','1667','166724'),(41559,'166724017','Capalayan','16','1667','166724'),(41560,'166724018','Catadman','16','1667','166724'),(41561,'166724019','Danao','16','1667','166724'),(41562,'166724020','Danawan','16','1667','166724'),(41563,'166724021','Day-asan','16','1667','166724'),(41564,'166724022','Ipil','16','1667','166724'),(41565,'166724023','Libuac','16','1667','166724'),(41566,'166724024','Lipata','16','1667','166724'),(41567,'166724025','Lisondra','16','1667','166724'),(41568,'166724026','Luna','16','1667','166724'),(41569,'166724027','Mabini','16','1667','166724'),(41570,'166724028','Mabua','16','1667','166724'),(41571,'166724029','Manyagao','16','1667','166724'),(41572,'166724030','Mapawa','16','1667','166724'),(41573,'166724031','Mat-i','16','1667','166724'),(41574,'166724032','Nabago','16','1667','166724'),(41575,'166724033','Nonoc','16','1667','166724'),(41576,'166724034','Poctoy','16','1667','166724'),(41577,'166724035','Punta Bilar','16','1667','166724'),(41578,'166724036','Quezon','16','1667','166724'),(41579,'166724037','Rizal','16','1667','166724'),(41580,'166724038','Sabang','16','1667','166724'),(41581,'166724039','San Isidro','16','1667','166724'),(41582,'166724040','San Jose','16','1667','166724'),(41583,'166724041','San Juan','16','1667','166724'),(41584,'166724042','San Pedro (Hanigad)','16','1667','166724'),(41585,'166724043','San Roque','16','1667','166724'),(41586,'166724044','Sidlakan','16','1667','166724'),(41587,'166724045','Silop','16','1667','166724'),(41588,'166724046','Sugbay','16','1667','166724'),(41589,'166724047','Sukailang','16','1667','166724'),(41590,'166724048','Taft (Pob.)','16','1667','166724'),(41591,'166724064','Talisay','16','1667','166724'),(41592,'166724065','Togbongon','16','1667','166724'),(41593,'166724066','Trinidad','16','1667','166724'),(41594,'166724067','Orok','16','1667','166724'),(41595,'166724068','Washington (Pob.)','16','1667','166724'),(41596,'166724095','Zaragoza','16','1667','166724'),(41597,'166724096','Canlanipa','16','1667','166724'),(41598,'166725001','Aurora (Pob.)','16','1667','166725'),(41599,'166725002','Azucena (Pob.)','16','1667','166725'),(41600,'166725003','Banban','16','1667','166725'),(41601,'166725004','Cawilan','16','1667','166725'),(41602,'166725005','Fabio','16','1667','166725'),(41603,'166725007','Himamaug','16','1667','166725'),(41604,'166725008','Laurel','16','1667','166725'),(41605,'166725009','Lower Libas','16','1667','166725'),(41606,'166725010','Opong','16','1667','166725'),(41607,'166725011','Sampaguita (Pob.)','16','1667','166725'),(41608,'166725012','Talavera','16','1667','166725'),(41609,'166725013','Union','16','1667','166725'),(41610,'166725014','Upper Libas','16','1667','166725'),(41611,'166725015','Patino','16','1667','166725'),(41612,'166727001','Capayahan','16','1667','166727'),(41613,'166727002','Cawilan','16','1667','166727'),(41614,'166727003','Del Rosario','16','1667','166727'),(41615,'166727004','Marga','16','1667','166727'),(41616,'166727005','Motorpool','16','1667','166727'),(41617,'166727006','Poblacion (Tubod)','16','1667','166727'),(41618,'166727007','San Isidro','16','1667','166727'),(41619,'166727008','Timamana','16','1667','166727'),(41620,'166727009','San Pablo','16','1667','166727'),(41621,'166801001','Amaga','16','1668','166801'),(41622,'166801002','Bahi','16','1668','166801'),(41623,'166801003','Cabacungan','16','1668','166801'),(41624,'166801005','Cambagang','16','1668','166801'),(41625,'166801006','Causwagan','16','1668','166801'),(41626,'166801007','Dapdap','16','1668','166801'),(41627,'166801008','Dughan','16','1668','166801'),(41628,'166801009','Gamut','16','1668','166801'),(41629,'166801010','Javier','16','1668','166801'),(41630,'166801011','Kinayan','16','1668','166801'),(41631,'166801013','Mamis','16','1668','166801'),(41632,'166801015','Poblacion','16','1668','166801'),(41633,'166801016','Rizal','16','1668','166801'),(41634,'166801017','San Jose','16','1668','166801'),(41635,'166801019','San Vicente','16','1668','166801'),(41636,'166801020','Sua','16','1668','166801'),(41637,'166801021','Sudlon','16','1668','166801'),(41638,'166801023','Unidad','16','1668','166801'),(41639,'166801024','Wakat','16','1668','166801'),(41640,'166801025','San Roque','16','1668','166801'),(41641,'166801026','Tambis','16','1668','166801'),(41642,'166802001','Amag','16','1668','166802'),(41643,'166802002','Balete (Pob.)','16','1668','166802'),(41644,'166802003','Cabugo','16','1668','166802'),(41645,'166802004','Cagbaoto','16','1668','166802'),(41646,'166802005','La Paz','16','1668','166802'),(41647,'166802006','Magobawok','16','1668','166802'),(41648,'166802007','Panaosawon','16','1668','166802'),(41649,'166803002','Bucto','16','1668','166803'),(41650,'166803003','Burboanan','16','1668','166803'),(41651,'166803004','San Roque (Cadanglasan)','16','1668','166803'),(41652,'166803005','Caguyao','16','1668','166803'),(41653,'166803006','Coleto','16','1668','166803'),(41654,'166803007','Labisma','16','1668','166803'),(41655,'166803008','Lawigan','16','1668','166803'),(41656,'166803009','Mangagoy','16','1668','166803'),(41657,'166803010','Mone','16','1668','166803'),(41658,'166803011','Pamaypayan','16','1668','166803'),(41659,'166803012','Poblacion','16','1668','166803'),(41660,'166803013','San Antonio','16','1668','166803'),(41661,'166803014','San Fernando','16','1668','166803'),(41662,'166803015','San Isidro (Bagnan)','16','1668','166803'),(41663,'166803016','San Jose','16','1668','166803'),(41664,'166803017','San Vicente','16','1668','166803'),(41665,'166803018','Santa Cruz','16','1668','166803'),(41666,'166803019','Sibaroy','16','1668','166803'),(41667,'166803020','Tabon','16','1668','166803'),(41668,'166803021','Tumanan','16','1668','166803'),(41669,'166803022','Pamanlinan','16','1668','166803'),(41670,'166803023','Kahayag','16','1668','166803'),(41671,'166803024','Maharlika','16','1668','166803'),(41672,'166803025','Comawas','16','1668','166803'),(41673,'166804001','Aras-Asan','16','1668','166804'),(41674,'166804002','Bacolod','16','1668','166804'),(41675,'166804003','Bitaugan East','16','1668','166804'),(41676,'166804004','Bitaugan West','16','1668','166804'),(41677,'166804005','Tawagan','16','1668','166804'),(41678,'166804006','Lactudan','16','1668','166804'),(41679,'166804007','Mat-e','16','1668','166804'),(41680,'166804008','La Purisima (Palhe)','16','1668','166804'),(41681,'166804009','Poblacion','16','1668','166804'),(41682,'166804011','Unidad','16','1668','166804'),(41683,'166804012','Tubo-tubo','16','1668','166804'),(41684,'166805002','Bugsukan','16','1668','166805'),(41685,'166805003','Buntalid','16','1668','166805'),(41686,'166805004','Cabangahan','16','1668','166805'),(41687,'166805005','Cabas-an','16','1668','166805'),(41688,'166805006','Calagdaan','16','1668','166805'),(41689,'166805007','Consuelo','16','1668','166805'),(41690,'166805008','General Island','16','1668','166805'),(41691,'166805009','Lininti-an (Pob.)','16','1668','166805'),(41692,'166805010','Magasang','16','1668','166805'),(41693,'166805011','Magosilom (Pob.)','16','1668','166805'),(41694,'166805012','Pag-Antayan','16','1668','166805'),(41695,'166805013','Palasao','16','1668','166805'),(41696,'166805014','Parang','16','1668','166805'),(41697,'166805015','Tapi','16','1668','166805'),(41698,'166805016','Tigabong','16','1668','166805'),(41699,'166805017','Lobo','16','1668','166805'),(41700,'166805018','San Pedro','16','1668','166805'),(41701,'166806001','Antao','16','1668','166806'),(41702,'166806002','Cancavan','16','1668','166806'),(41703,'166806003','Carmen (Pob.)','16','1668','166806'),(41704,'166806004','Esperanza','16','1668','166806'),(41705,'166806005','Puyat','16','1668','166806'),(41706,'166806006','San Vicente','16','1668','166806'),(41707,'166806007','Santa Cruz','16','1668','166806'),(41708,'166806008','Hinapoyan','16','1668','166806'),(41709,'166807001','Adlay','16','1668','166807'),(41710,'166807002','Babuyan','16','1668','166807'),(41711,'166807003','Bacolod','16','1668','166807'),(41712,'166807004','Baybay (Pob.)','16','1668','166807'),(41713,'166807005','Bon-ot','16','1668','166807'),(41714,'166807006','Caglayag','16','1668','166807'),(41715,'166807007','Dahican','16','1668','166807'),(41716,'166807008','Doyos (Pob.)','16','1668','166807'),(41717,'166807009','Embarcadero (Pob.)','16','1668','166807'),(41718,'166807010','Gamuton','16','1668','166807'),(41719,'166807011','Panikian','16','1668','166807'),(41720,'166807012','Pantukan','16','1668','166807'),(41721,'166807013','Saca (Pob.)','16','1668','166807'),(41722,'166807014','Tag-Anito','16','1668','166807'),(41723,'166808001','Balibadon','16','1668','166808'),(41724,'166808002','Burgos','16','1668','166808'),(41725,'166808003','Capandan','16','1668','166808'),(41726,'166808004','Mabahin','16','1668','166808'),(41727,'166808005','Madrelino','16','1668','166808'),(41728,'166808006','Manlico','16','1668','166808'),(41729,'166808007','Matho','16','1668','166808'),(41730,'166808008','Poblacion','16','1668','166808'),(41731,'166808009','Tag-Anongan','16','1668','166808'),(41732,'166808010','Tigao','16','1668','166808'),(41733,'166808011','Tuboran','16','1668','166808'),(41734,'166808012','Uba','16','1668','166808'),(41735,'166809002','Baculin','16','1668','166809'),(41736,'166809004','Bigaan','16','1668','166809'),(41737,'166809005','Cambatong','16','1668','166809'),(41738,'166809006','Campa','16','1668','166809'),(41739,'166809009','Dugmanon','16','1668','166809'),(41740,'166809010','Harip','16','1668','166809'),(41741,'166809012','La Casa (Pob.)','16','1668','166809'),(41742,'166809014','Loyola','16','1668','166809'),(41743,'166809017','Maligaya','16','1668','166809'),(41744,'166809021','Pagtigni-an (Bitoon)','16','1668','166809'),(41745,'166809022','Pocto','16','1668','166809'),(41746,'166809023','Port Lamon','16','1668','166809'),(41747,'166809025','Roxas','16','1668','166809'),(41748,'166809026','San Juan','16','1668','166809'),(41749,'166809031','Sasa','16','1668','166809'),(41750,'166809034','Tagasaka','16','1668','166809'),(41751,'166809037','Talisay','16','1668','166809'),(41752,'166809038','Tarusan','16','1668','166809'),(41753,'166809039','Tidman','16','1668','166809'),(41754,'166809040','Tiwi','16','1668','166809'),(41755,'166809041','Benigno Aquino (Zone I Pob.)','16','1668','166809'),(41756,'166809042','Zone II (Pob.)','16','1668','166809'),(41757,'166809043','Zone III Maharlika (Pob.)','16','1668','166809'),(41758,'166809044','Tagbobonga','16','1668','166809'),(41759,'166810001','Agsam','16','1668','166810'),(41760,'166810003','Bocawe','16','1668','166810'),(41761,'166810004','Bunga','16','1668','166810'),(41762,'166810008','Gamuton','16','1668','166810'),(41763,'166810009','Habag','16','1668','166810'),(41764,'166810010','Mampi','16','1668','166810'),(41765,'166810011','Nurcia','16','1668','166810'),(41766,'166810015','Sibahay','16','1668','166810'),(41767,'166810016','Zone I (Pob.)','16','1668','166810'),(41768,'166810017','Pakwan','16','1668','166810'),(41769,'166810018','Zone II (Pob.)','16','1668','166810'),(41770,'166810019','Zone III (Pob.)','16','1668','166810'),(41771,'166810020','Zone IV (Pob.)','16','1668','166810'),(41772,'166811001','Anibongan','16','1668','166811'),(41773,'166811002','Banahao','16','1668','166811'),(41774,'166811003','Ban-as','16','1668','166811'),(41775,'166811004','Baucawe','16','1668','166811'),(41776,'166811005','Diatagon','16','1668','166811'),(41777,'166811006','Ganayon','16','1668','166811'),(41778,'166811007','Liatimco','16','1668','166811'),(41779,'166811008','Manyayay','16','1668','166811'),(41780,'166811009','Payasan','16','1668','166811'),(41781,'166811010','Poblacion','16','1668','166811'),(41782,'166811011','Saint Christine','16','1668','166811'),(41783,'166811012','San Isidro','16','1668','166811'),(41784,'166811013','San Pedro','16','1668','166811'),(41785,'166812001','Anibongan','16','1668','166812'),(41786,'166812002','Barcelona','16','1668','166812'),(41787,'166812003','Bongan','16','1668','166812'),(41788,'166812004','Bogak','16','1668','166812'),(41789,'166812005','Handamayan','16','1668','166812'),(41790,'166812006','Mahayahay','16','1668','166812'),(41791,'166812007','Mandus','16','1668','166812'),(41792,'166812008','Mansa-ilao','16','1668','166812'),(41793,'166812009','Pagtila-an','16','1668','166812'),(41794,'166812010','Palo Alto','16','1668','166812'),(41795,'166812011','Poblacion','16','1668','166812'),(41796,'166812012','Rajah Cabungso-an','16','1668','166812'),(41797,'166812013','Sabang','16','1668','166812'),(41798,'166812014','Salvacion','16','1668','166812'),(41799,'166812015','San Roque','16','1668','166812'),(41800,'166812016','Tagpoporan','16','1668','166812'),(41801,'166812017','Union','16','1668','166812'),(41802,'166812018','Valencia','16','1668','166812'),(41803,'166813001','Bagsac','16','1668','166813'),(41804,'166813002','Bayogo','16','1668','166813'),(41805,'166813003','Magsaysay','16','1668','166813'),(41806,'166813004','Manga','16','1668','166813'),(41807,'166813005','Panayogon','16','1668','166813'),(41808,'166813006','Patong Patong','16','1668','166813'),(41809,'166813007','Quirino (Pob.)','16','1668','166813'),(41810,'166813008','San Antonio','16','1668','166813'),(41811,'166813009','San Juan','16','1668','166813'),(41812,'166813010','San Roque','16','1668','166813'),(41813,'166813011','San Vicente','16','1668','166813'),(41814,'166813012','Songkit','16','1668','166813'),(41815,'166813013','Union','16','1668','166813'),(41816,'166813014','Linibonan','16','1668','166813'),(41817,'166814001','Alegria','16','1668','166814'),(41818,'166814002','Amontay','16','1668','166814'),(41819,'166814003','Antipolo','16','1668','166814'),(41820,'166814004','Arorogan','16','1668','166814'),(41821,'166814005','Bayan','16','1668','166814'),(41822,'166814006','Mahaba','16','1668','166814'),(41823,'166814007','Mararag','16','1668','166814'),(41824,'166814008','Poblacion','16','1668','166814'),(41825,'166814009','San Antonio','16','1668','166814'),(41826,'166814010','San Isidro','16','1668','166814'),(41827,'166814011','San Pedro','16','1668','166814'),(41828,'166814012','Santa Cruz','16','1668','166814'),(41829,'166815001','Bretania','16','1668','166815'),(41830,'166815002','Buatong','16','1668','166815'),(41831,'166815003','Buhisan','16','1668','166815'),(41832,'166815004','Gata','16','1668','166815'),(41833,'166815005','Hornasan','16','1668','166815'),(41834,'166815006','Janipaan','16','1668','166815'),(41835,'166815007','Kauswagan','16','1668','166815'),(41836,'166815008','Oteiza','16','1668','166815'),(41837,'166815009','Poblacion','16','1668','166815'),(41838,'166815010','Pong-on','16','1668','166815'),(41839,'166815011','Pongtod','16','1668','166815'),(41840,'166815012','Salvacion','16','1668','166815'),(41841,'166815013','Santo Niño','16','1668','166815'),(41842,'166816001','Bagyang','16','1668','166816'),(41843,'166816002','Baras','16','1668','166816'),(41844,'166816003','Bitaugan','16','1668','166816'),(41845,'166816004','Bolhoon','16','1668','166816'),(41846,'166816005','Calatngan','16','1668','166816'),(41847,'166816006','Carromata','16','1668','166816'),(41848,'166816007','Castillo','16','1668','166816'),(41849,'166816008','Libas Gua','16','1668','166816'),(41850,'166816009','Libas Sud','16','1668','166816'),(41851,'166816010','Magroyong','16','1668','166816'),(41852,'166816011','Mahayag (Maitum)','16','1668','166816'),(41853,'166816012','Patong','16','1668','166816'),(41854,'166816013','Poblacion','16','1668','166816'),(41855,'166816014','Sagbayan','16','1668','166816'),(41856,'166816016','San Roque','16','1668','166816'),(41857,'166816017','Siagao','16','1668','166816'),(41858,'166816018','Umalag','16','1668','166816'),(41859,'166816019','Tina','16','1668','166816'),(41860,'166817001','Batunan','16','1668','166817'),(41861,'166817002','Carpenito','16','1668','166817'),(41862,'166817003','Kahayagan','16','1668','166817'),(41863,'166817004','Lago','16','1668','166817'),(41864,'166817006','Maglambing','16','1668','166817'),(41865,'166817007','Maglatab','16','1668','166817'),(41866,'166817008','Magsaysay','16','1668','166817'),(41867,'166817009','Malixi','16','1668','166817'),(41868,'166817010','Manambia','16','1668','166817'),(41869,'166817011','Osmeña','16','1668','166817'),(41870,'166817012','Poblacion','16','1668','166817'),(41871,'166817013','Quezon','16','1668','166817'),(41872,'166817014','San Vicente','16','1668','166817'),(41873,'166817015','Santa Cruz','16','1668','166817'),(41874,'166817016','Santa Fe','16','1668','166817'),(41875,'166817017','Santa Juana','16','1668','166817'),(41876,'166817018','Santa Maria','16','1668','166817'),(41877,'166817019','Sayon','16','1668','166817'),(41878,'166817020','Soriano','16','1668','166817'),(41879,'166817021','Tagongon','16','1668','166817'),(41880,'166817022','Trinidad','16','1668','166817'),(41881,'166817023','Ugoban','16','1668','166817'),(41882,'166817024','Villaverde','16','1668','166817'),(41883,'166817025','Doña Carmen','16','1668','166817'),(41884,'166817026','Hinagdanan','16','1668','166817'),(41885,'166818001','Alba','16','1668','166818'),(41886,'166818002','Anahao Bag-o','16','1668','166818'),(41887,'166818003','Anahao Daan','16','1668','166818'),(41888,'166818004','Badong','16','1668','166818'),(41889,'166818005','Bajao','16','1668','166818'),(41890,'166818006','Bangsud','16','1668','166818'),(41891,'166818007','Cagdapao','16','1668','166818'),(41892,'166818008','Camagong','16','1668','166818'),(41893,'166818009','Caras-an','16','1668','166818'),(41894,'166818010','Cayale','16','1668','166818'),(41895,'166818011','Dayo-an','16','1668','166818'),(41896,'166818012','Gamut','16','1668','166818'),(41897,'166818013','Jubang','16','1668','166818'),(41898,'166818014','Kinabigtasan','16','1668','166818'),(41899,'166818015','Layog','16','1668','166818'),(41900,'166818016','Lindoy','16','1668','166818'),(41901,'166818017','Mercedes','16','1668','166818'),(41902,'166818018','Purisima (Pob.)','16','1668','166818'),(41903,'166818019','Sumo-sumo','16','1668','166818'),(41904,'166818020','Umbay','16','1668','166818'),(41905,'166818021','Unaban','16','1668','166818'),(41906,'166818022','Unidos','16','1668','166818'),(41907,'166818023','Victoria','16','1668','166818'),(41908,'166818024','Cabangahan','16','1668','166818'),(41909,'166819001','Awasian','16','1668','166819'),(41910,'166819002','Bagong Lungsod (Pob.)','16','1668','166819'),(41911,'166819003','Bioto','16','1668','166819'),(41912,'166819004','Buenavista','16','1668','166819'),(41913,'166819005','Bongtod Pob. (East West)','16','1668','166819'),(41914,'166819006','Dagocdoc (Pob.)','16','1668','166819'),(41915,'166819008','Mabua','16','1668','166819'),(41916,'166819009','Mabuhay','16','1668','166819'),(41917,'166819010','Maitum','16','1668','166819'),(41918,'166819011','Maticdum','16','1668','166819'),(41919,'166819012','Pandanon','16','1668','166819'),(41920,'166819013','Pangi','16','1668','166819'),(41921,'166819014','Quezon','16','1668','166819'),(41922,'166819015','Rosario','16','1668','166819'),(41923,'166819016','Salvacion','16','1668','166819'),(41924,'166819017','San Agustin Norte','16','1668','166819'),(41925,'166819018','San Agustin Sur','16','1668','166819'),(41926,'166819019','San Antonio','16','1668','166819'),(41927,'166819020','San Isidro','16','1668','166819'),(41928,'166819021','San Jose','16','1668','166819'),(41929,'166819022','Telaje','16','1668','166819'),(41930,'168501002','Catadman','16','1685','168501'),(41931,'168501003','Columbus','16','1685','168501'),(41932,'168501004','Coring','16','1685','168501'),(41933,'168501005','Cortes','16','1685','168501'),(41934,'168501006','Doña Helene','16','1685','168501'),(41935,'168501007','Ferdinand','16','1685','168501'),(41936,'168501008','Geotina','16','1685','168501'),(41937,'168501009','Imee (Bactasan)','16','1685','168501'),(41938,'168501010','Melgar','16','1685','168501'),(41939,'168501011','Montag','16','1685','168501'),(41940,'168501012','Navarro','16','1685','168501'),(41941,'168501013','Poblacion','16','1685','168501'),(41942,'168501014','Puerto Princesa','16','1685','168501'),(41943,'168501015','Rita Glenda','16','1685','168501'),(41944,'168501016','Roxas','16','1685','168501'),(41945,'168501017','Sering','16','1685','168501'),(41946,'168501018','Tag-abaca','16','1685','168501'),(41947,'168501019','Benglen','16','1685','168501'),(41948,'168501020','Diegas','16','1685','168501'),(41949,'168501021','Edera','16','1685','168501'),(41950,'168501022','New Nazareth','16','1685','168501'),(41951,'168501023','Roma','16','1685','168501'),(41952,'168501024','Santa Monica','16','1685','168501'),(41953,'168501025','Santo Niño','16','1685','168501'),(41954,'168501026','Sombrado','16','1685','168501'),(41955,'168501027','Villa Ecleo','16','1685','168501'),(41956,'168501028','Villa Pantinople','16','1685','168501'),(41957,'168502001','Boa','16','1685','168502'),(41958,'168502002','Cabunga-an','16','1685','168502'),(41959,'168502003','Del Pilar','16','1685','168502'),(41960,'168502004','Laguna','16','1685','168502'),(41961,'168502005','Legaspi','16','1685','168502'),(41962,'168502006','Ma-atas','16','1685','168502'),(41963,'168502007','Nueva Estrella','16','1685','168502'),(41964,'168502008','Poblacion','16','1685','168502'),(41965,'168502009','San Jose','16','1685','168502'),(41966,'168502010','Santa Rita','16','1685','168502'),(41967,'168502011','Tigbao','16','1685','168502'),(41968,'168502012','Valencia','16','1685','168502'),(41969,'168502013','Mabini (Borja)','16','1685','168502'),(41970,'168502014','R. Ecleo, Sr.','16','1685','168502'),(41971,'168503002','Cab-ilan','16','1685','168503'),(41972,'168503003','Cabayawan','16','1685','168503'),(41973,'168503004','Escolta (Pob.)','16','1685','168503'),(41974,'168503005','Gomez','16','1685','168503'),(41975,'168503007','Magsaysay','16','1685','168503'),(41976,'168503009','Mauswagon (Pob.)','16','1685','168503'),(41977,'168503012','White Beach (Pob.)','16','1685','168503'),(41978,'168503014','Bagumbayan','16','1685','168503'),(41979,'168503016','New Mabuhay','16','1685','168503'),(41980,'168503021','Wadas','16','1685','168503'),(41981,'168503022','Cayetano','16','1685','168503'),(41982,'168503023','Justiniana Edera','16','1685','168503'),(41983,'168504001','Albor (Pob.)','16','1685','168504'),(41984,'168504002','Arellano','16','1685','168504'),(41985,'168504003','Bayanihan','16','1685','168504'),(41986,'168504004','Doña Helen','16','1685','168504'),(41987,'168504005','Garcia','16','1685','168504'),(41988,'168504006','General Aguinaldo (Bolod-bolod)','16','1685','168504'),(41989,'168504007','Kanihaan','16','1685','168504'),(41990,'168504008','Magsaysay','16','1685','168504'),(41991,'168504009','Osmeña','16','1685','168504'),(41992,'168504010','Plaridel','16','1685','168504'),(41993,'168504011','Quezon','16','1685','168504'),(41994,'168504012','San Antonio (Pob.)','16','1685','168504'),(41995,'168504013','San Jose','16','1685','168504'),(41996,'168504014','Santo Niño','16','1685','168504'),(41997,'168504015','Llamera','16','1685','168504'),(41998,'168504016','Rosita','16','1685','168504'),(41999,'168505001','Carmen (Pob.)','16','1685','168505'),(42000,'168505002','Esperanza','16','1685','168505'),(42001,'168505003','Ferdinand','16','1685','168505'),(42002,'168505004','Helene','16','1685','168505'),(42003,'168505006','Liberty','16','1685','168505'),(42004,'168505008','Magsaysay','16','1685','168505'),(42005,'168505011','Panamaon','16','1685','168505'),(42006,'168505013','San Juan (Pob.)','16','1685','168505'),(42007,'168505015','Santa Cruz (Pob.)','16','1685','168505'),(42008,'168505017','Santiago (Pob.)','16','1685','168505'),(42009,'168506001','Aurelio','16','1685','168506'),(42010,'168506002','Cuarinta','16','1685','168506'),(42011,'168506003','Don Ruben Ecleo (Baltazar)','16','1685','168506'),(42012,'168506004','Jacquez','16','1685','168506'),(42013,'168506005','Justiniana Edera','16','1685','168506'),(42014,'168506006','Luna','16','1685','168506'),(42015,'168506007','Mahayahay','16','1685','168506'),(42016,'168506008','Matingbe','16','1685','168506'),(42017,'168506009','San Jose (Pob.)','16','1685','168506'),(42018,'168506010','San Juan','16','1685','168506'),(42019,'168506011','Santa Cruz','16','1685','168506'),(42020,'168506012','Wilson','16','1685','168506'),(42021,'168507001','Imelda','16','1685','168507'),(42022,'168507002','Mabini','16','1685','168507'),(42023,'168507003','Malinao','16','1685','168507'),(42024,'168507004','Navarro','16','1685','168507'),(42025,'168507005','Diaz (Romualdez)','16','1685','168507'),(42026,'168507006','Roxas','16','1685','168507'),(42027,'168507007','San Roque (Pob.)','16','1685','168507'),(42028,'168507008','San Vicente (Pob.)','16','1685','168507'),(42029,'168507009','Santa Cruz (Pob.)','16','1685','168507');
/*!40000 ALTER TABLE `refbrgy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refcitymun`
--

DROP TABLE IF EXISTS `refcitymun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refcitymun` (
  `id` int NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `citymunDesc` text,
  `regDesc` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  `citymunCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1648 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refcitymun`
--

LOCK TABLES `refcitymun` WRITE;
/*!40000 ALTER TABLE `refcitymun` DISABLE KEYS */;
INSERT INTO `refcitymun` VALUES (1,'012801000','ADAMS','01','0128','012801'),(2,'012802000','BACARRA','01','0128','012802'),(3,'012803000','BADOC','01','0128','012803'),(4,'012804000','BANGUI','01','0128','012804'),(5,'012805000','CITY OF BATAC','01','0128','012805'),(6,'012806000','BURGOS','01','0128','012806'),(7,'012807000','CARASI','01','0128','012807'),(8,'012808000','CURRIMAO','01','0128','012808'),(9,'012809000','DINGRAS','01','0128','012809'),(10,'012810000','DUMALNEG','01','0128','012810'),(11,'012811000','BANNA (ESPIRITU)','01','0128','012811'),(12,'012812000','LAOAG CITY (Capital)','01','0128','012812'),(13,'012813000','MARCOS','01','0128','012813'),(14,'012814000','NUEVA ERA','01','0128','012814'),(15,'012815000','PAGUDPUD','01','0128','012815'),(16,'012816000','PAOAY','01','0128','012816'),(17,'012817000','PASUQUIN','01','0128','012817'),(18,'012818000','PIDDIG','01','0128','012818'),(19,'012819000','PINILI','01','0128','012819'),(20,'012820000','SAN NICOLAS','01','0128','012820'),(21,'012821000','SARRAT','01','0128','012821'),(22,'012822000','SOLSONA','01','0128','012822'),(23,'012823000','VINTAR','01','0128','012823'),(24,'012901000','ALILEM','01','0129','012901'),(25,'012902000','BANAYOYO','01','0129','012902'),(26,'012903000','BANTAY','01','0129','012903'),(27,'012904000','BURGOS','01','0129','012904'),(28,'012905000','CABUGAO','01','0129','012905'),(29,'012906000','CITY OF CANDON','01','0129','012906'),(30,'012907000','CAOAYAN','01','0129','012907'),(31,'012908000','CERVANTES','01','0129','012908'),(32,'012909000','GALIMUYOD','01','0129','012909'),(33,'012910000','GREGORIO DEL PILAR (CONCEPCION)','01','0129','012910'),(34,'012911000','LIDLIDDA','01','0129','012911'),(35,'012912000','MAGSINGAL','01','0129','012912'),(36,'012913000','NAGBUKEL','01','0129','012913'),(37,'012914000','NARVACAN','01','0129','012914'),(38,'012915000','QUIRINO (ANGKAKI)','01','0129','012915'),(39,'012916000','SALCEDO (BAUGEN)','01','0129','012916'),(40,'012917000','SAN EMILIO','01','0129','012917'),(41,'012918000','SAN ESTEBAN','01','0129','012918'),(42,'012919000','SAN ILDEFONSO','01','0129','012919'),(43,'012920000','SAN JUAN (LAPOG)','01','0129','012920'),(44,'012921000','SAN VICENTE','01','0129','012921'),(45,'012922000','SANTA','01','0129','012922'),(46,'012923000','SANTA CATALINA','01','0129','012923'),(47,'012924000','SANTA CRUZ','01','0129','012924'),(48,'012925000','SANTA LUCIA','01','0129','012925'),(49,'012926000','SANTA MARIA','01','0129','012926'),(50,'012927000','SANTIAGO','01','0129','012927'),(51,'012928000','SANTO DOMINGO','01','0129','012928'),(52,'012929000','SIGAY','01','0129','012929'),(53,'012930000','SINAIT','01','0129','012930'),(54,'012931000','SUGPON','01','0129','012931'),(55,'012932000','SUYO','01','0129','012932'),(56,'012933000','TAGUDIN','01','0129','012933'),(57,'012934000','CITY OF VIGAN (Capital)','01','0129','012934'),(58,'013301000','AGOO','01','0133','013301'),(59,'013302000','ARINGAY','01','0133','013302'),(60,'013303000','BACNOTAN','01','0133','013303'),(61,'013304000','BAGULIN','01','0133','013304'),(62,'013305000','BALAOAN','01','0133','013305'),(63,'013306000','BANGAR','01','0133','013306'),(64,'013307000','BAUANG','01','0133','013307'),(65,'013308000','BURGOS','01','0133','013308'),(66,'013309000','CABA','01','0133','013309'),(67,'013310000','LUNA','01','0133','013310'),(68,'013311000','NAGUILIAN','01','0133','013311'),(69,'013312000','PUGO','01','0133','013312'),(70,'013313000','ROSARIO','01','0133','013313'),(71,'013314000','CITY OF SAN FERNANDO (Capital)','01','0133','013314'),(72,'013315000','SAN GABRIEL','01','0133','013315'),(73,'013316000','SAN JUAN','01','0133','013316'),(74,'013317000','SANTO TOMAS','01','0133','013317'),(75,'013318000','SANTOL','01','0133','013318'),(76,'013319000','SUDIPEN','01','0133','013319'),(77,'013320000','TUBAO','01','0133','013320'),(78,'015501000','AGNO','01','0155','015501'),(79,'015502000','AGUILAR','01','0155','015502'),(80,'015503000','CITY OF ALAMINOS','01','0155','015503'),(81,'015504000','ALCALA','01','0155','015504'),(82,'015505000','ANDA','01','0155','015505'),(83,'015506000','ASINGAN','01','0155','015506'),(84,'015507000','BALUNGAO','01','0155','015507'),(85,'015508000','BANI','01','0155','015508'),(86,'015509000','BASISTA','01','0155','015509'),(87,'015510000','BAUTISTA','01','0155','015510'),(88,'015511000','BAYAMBANG','01','0155','015511'),(89,'015512000','BINALONAN','01','0155','015512'),(90,'015513000','BINMALEY','01','0155','015513'),(91,'015514000','BOLINAO','01','0155','015514'),(92,'015515000','BUGALLON','01','0155','015515'),(93,'015516000','BURGOS','01','0155','015516'),(94,'015517000','CALASIAO','01','0155','015517'),(95,'015518000','DAGUPAN CITY','01','0155','015518'),(96,'015519000','DASOL','01','0155','015519'),(97,'015520000','INFANTA','01','0155','015520'),(98,'015521000','LABRADOR','01','0155','015521'),(99,'015522000','LINGAYEN (Capital)','01','0155','015522'),(100,'015523000','MABINI','01','0155','015523'),(101,'015524000','MALASIQUI','01','0155','015524'),(102,'015525000','MANAOAG','01','0155','015525'),(103,'015526000','MANGALDAN','01','0155','015526'),(104,'015527000','MANGATAREM','01','0155','015527'),(105,'015528000','MAPANDAN','01','0155','015528'),(106,'015529000','NATIVIDAD','01','0155','015529'),(107,'015530000','POZORRUBIO','01','0155','015530'),(108,'015531000','ROSALES','01','0155','015531'),(109,'015532000','SAN CARLOS CITY','01','0155','015532'),(110,'015533000','SAN FABIAN','01','0155','015533'),(111,'015534000','SAN JACINTO','01','0155','015534'),(112,'015535000','SAN MANUEL','01','0155','015535'),(113,'015536000','SAN NICOLAS','01','0155','015536'),(114,'015537000','SAN QUINTIN','01','0155','015537'),(115,'015538000','SANTA BARBARA','01','0155','015538'),(116,'015539000','SANTA MARIA','01','0155','015539'),(117,'015540000','SANTO TOMAS','01','0155','015540'),(118,'015541000','SISON','01','0155','015541'),(119,'015542000','SUAL','01','0155','015542'),(120,'015543000','TAYUG','01','0155','015543'),(121,'015544000','UMINGAN','01','0155','015544'),(122,'015545000','URBIZTONDO','01','0155','015545'),(123,'015546000','CITY OF URDANETA','01','0155','015546'),(124,'015547000','VILLASIS','01','0155','015547'),(125,'015548000','LAOAC','01','0155','015548'),(126,'020901000','BASCO (Capital)','02','0209','020901'),(127,'020902000','ITBAYAT','02','0209','020902'),(128,'020903000','IVANA','02','0209','020903'),(129,'020904000','MAHATAO','02','0209','020904'),(130,'020905000','SABTANG','02','0209','020905'),(131,'020906000','UYUGAN','02','0209','020906'),(132,'021501000','ABULUG','02','0215','021501'),(133,'021502000','ALCALA','02','0215','021502'),(134,'021503000','ALLACAPAN','02','0215','021503'),(135,'021504000','AMULUNG','02','0215','021504'),(136,'021505000','APARRI','02','0215','021505'),(137,'021506000','BAGGAO','02','0215','021506'),(138,'021507000','BALLESTEROS','02','0215','021507'),(139,'021508000','BUGUEY','02','0215','021508'),(140,'021509000','CALAYAN','02','0215','021509'),(141,'021510000','CAMALANIUGAN','02','0215','021510'),(142,'021511000','CLAVERIA','02','0215','021511'),(143,'021512000','ENRILE','02','0215','021512'),(144,'021513000','GATTARAN','02','0215','021513'),(145,'021514000','GONZAGA','02','0215','021514'),(146,'021515000','IGUIG','02','0215','021515'),(147,'021516000','LAL-LO','02','0215','021516'),(148,'021517000','LASAM','02','0215','021517'),(149,'021518000','PAMPLONA','02','0215','021518'),(150,'021519000','PEÑABLANCA','02','0215','021519'),(151,'021520000','PIAT','02','0215','021520'),(152,'021521000','RIZAL','02','0215','021521'),(153,'021522000','SANCHEZ-MIRA','02','0215','021522'),(154,'021523000','SANTA ANA','02','0215','021523'),(155,'021524000','SANTA PRAXEDES','02','0215','021524'),(156,'021525000','SANTA TERESITA','02','0215','021525'),(157,'021526000','SANTO NIÑO (FAIRE)','02','0215','021526'),(158,'021527000','SOLANA','02','0215','021527'),(159,'021528000','TUAO','02','0215','021528'),(160,'021529000','TUGUEGARAO CITY (Capital)','02','0215','021529'),(161,'023101000','ALICIA','02','0231','023101'),(162,'023102000','ANGADANAN','02','0231','023102'),(163,'023103000','AURORA','02','0231','023103'),(164,'023104000','BENITO SOLIVEN','02','0231','023104'),(165,'023105000','BURGOS','02','0231','023105'),(166,'023106000','CABAGAN','02','0231','023106'),(167,'023107000','CABATUAN','02','0231','023107'),(168,'023108000','CITY OF CAUAYAN','02','0231','023108'),(169,'023109000','CORDON','02','0231','023109'),(170,'023110000','DINAPIGUE','02','0231','023110'),(171,'023111000','DIVILACAN','02','0231','023111'),(172,'023112000','ECHAGUE','02','0231','023112'),(173,'023113000','GAMU','02','0231','023113'),(174,'023114000','ILAGAN CITY (Capital)','02','0231','023114'),(175,'023115000','JONES','02','0231','023115'),(176,'023116000','LUNA','02','0231','023116'),(177,'023117000','MACONACON','02','0231','023117'),(178,'023118000','DELFIN ALBANO (MAGSAYSAY)','02','0231','023118'),(179,'023119000','MALLIG','02','0231','023119'),(180,'023120000','NAGUILIAN','02','0231','023120'),(181,'023121000','PALANAN','02','0231','023121'),(182,'023122000','QUEZON','02','0231','023122'),(183,'023123000','QUIRINO','02','0231','023123'),(184,'023124000','RAMON','02','0231','023124'),(185,'023125000','REINA MERCEDES','02','0231','023125'),(186,'023126000','ROXAS','02','0231','023126'),(187,'023127000','SAN AGUSTIN','02','0231','023127'),(188,'023128000','SAN GUILLERMO','02','0231','023128'),(189,'023129000','SAN ISIDRO','02','0231','023129'),(190,'023130000','SAN MANUEL','02','0231','023130'),(191,'023131000','SAN MARIANO','02','0231','023131'),(192,'023132000','SAN MATEO','02','0231','023132'),(193,'023133000','SAN PABLO','02','0231','023133'),(194,'023134000','SANTA MARIA','02','0231','023134'),(195,'023135000','CITY OF SANTIAGO','02','0231','023135'),(196,'023136000','SANTO TOMAS','02','0231','023136'),(197,'023137000','TUMAUINI','02','0231','023137'),(198,'025001000','AMBAGUIO','02','0250','025001'),(199,'025002000','ARITAO','02','0250','025002'),(200,'025003000','BAGABAG','02','0250','025003'),(201,'025004000','BAMBANG','02','0250','025004'),(202,'025005000','BAYOMBONG (Capital)','02','0250','025005'),(203,'025006000','DIADI','02','0250','025006'),(204,'025007000','DUPAX DEL NORTE','02','0250','025007'),(205,'025008000','DUPAX DEL SUR','02','0250','025008'),(206,'025009000','KASIBU','02','0250','025009'),(207,'025010000','KAYAPA','02','0250','025010'),(208,'025011000','QUEZON','02','0250','025011'),(209,'025012000','SANTA FE','02','0250','025012'),(210,'025013000','SOLANO','02','0250','025013'),(211,'025014000','VILLAVERDE','02','0250','025014'),(212,'025015000','ALFONSO CASTANEDA','02','0250','025015'),(213,'025701000','AGLIPAY','02','0257','025701'),(214,'025702000','CABARROGUIS (Capital)','02','0257','025702'),(215,'025703000','DIFFUN','02','0257','025703'),(216,'025704000','MADDELA','02','0257','025704'),(217,'025705000','SAGUDAY','02','0257','025705'),(218,'025706000','NAGTIPUNAN','02','0257','025706'),(219,'030801000','ABUCAY','03','0308','030801'),(220,'030802000','BAGAC','03','0308','030802'),(221,'030803000','CITY OF BALANGA (Capital)','03','0308','030803'),(222,'030804000','DINALUPIHAN','03','0308','030804'),(223,'030805000','HERMOSA','03','0308','030805'),(224,'030806000','LIMAY','03','0308','030806'),(225,'030807000','MARIVELES','03','0308','030807'),(226,'030808000','MORONG','03','0308','030808'),(227,'030809000','ORANI','03','0308','030809'),(228,'030810000','ORION','03','0308','030810'),(229,'030811000','PILAR','03','0308','030811'),(230,'030812000','SAMAL','03','0308','030812'),(231,'031401000','ANGAT','03','0314','031401'),(232,'031402000','BALAGTAS (BIGAA)','03','0314','031402'),(233,'031403000','BALIUAG','03','0314','031403'),(234,'031404000','BOCAUE','03','0314','031404'),(235,'031405000','BULACAN','03','0314','031405'),(236,'031406000','BUSTOS','03','0314','031406'),(237,'031407000','CALUMPIT','03','0314','031407'),(238,'031408000','GUIGUINTO','03','0314','031408'),(239,'031409000','HAGONOY','03','0314','031409'),(240,'031410000','CITY OF MALOLOS (Capital)','03','0314','031410'),(241,'031411000','MARILAO','03','0314','031411'),(242,'031412000','CITY OF MEYCAUAYAN','03','0314','031412'),(243,'031413000','NORZAGARAY','03','0314','031413'),(244,'031414000','OBANDO','03','0314','031414'),(245,'031415000','PANDI','03','0314','031415'),(246,'031416000','PAOMBONG','03','0314','031416'),(247,'031417000','PLARIDEL','03','0314','031417'),(248,'031418000','PULILAN','03','0314','031418'),(249,'031419000','SAN ILDEFONSO','03','0314','031419'),(250,'031420000','CITY OF SAN JOSE DEL MONTE','03','0314','031420'),(251,'031421000','SAN MIGUEL','03','0314','031421'),(252,'031422000','SAN RAFAEL','03','0314','031422'),(253,'031423000','SANTA MARIA','03','0314','031423'),(254,'031424000','DOÑA REMEDIOS TRINIDAD','03','0314','031424'),(255,'034901000','ALIAGA','03','0349','034901'),(256,'034902000','BONGABON','03','0349','034902'),(257,'034903000','CABANATUAN CITY','03','0349','034903'),(258,'034904000','CABIAO','03','0349','034904'),(259,'034905000','CARRANGLAN','03','0349','034905'),(260,'034906000','CUYAPO','03','0349','034906'),(261,'034907000','GABALDON (BITULOK & SABANI)','03','0349','034907'),(262,'034908000','CITY OF GAPAN','03','0349','034908'),(263,'034909000','GENERAL MAMERTO NATIVIDAD','03','0349','034909'),(264,'034910000','GENERAL TINIO (PAPAYA)','03','0349','034910'),(265,'034911000','GUIMBA','03','0349','034911'),(266,'034912000','JAEN','03','0349','034912'),(267,'034913000','LAUR','03','0349','034913'),(268,'034914000','LICAB','03','0349','034914'),(269,'034915000','LLANERA','03','0349','034915'),(270,'034916000','LUPAO','03','0349','034916'),(271,'034917000','SCIENCE CITY OF MUÑOZ','03','0349','034917'),(272,'034918000','NAMPICUAN','03','0349','034918'),(273,'034919000','PALAYAN CITY (Capital)','03','0349','034919'),(274,'034920000','PANTABANGAN','03','0349','034920'),(275,'034921000','PEÑARANDA','03','0349','034921'),(276,'034922000','QUEZON','03','0349','034922'),(277,'034923000','RIZAL','03','0349','034923'),(278,'034924000','SAN ANTONIO','03','0349','034924'),(279,'034925000','SAN ISIDRO','03','0349','034925'),(280,'034926000','SAN JOSE CITY','03','0349','034926'),(281,'034927000','SAN LEONARDO','03','0349','034927'),(282,'034928000','SANTA ROSA','03','0349','034928'),(283,'034929000','SANTO DOMINGO','03','0349','034929'),(284,'034930000','TALAVERA','03','0349','034930'),(285,'034931000','TALUGTUG','03','0349','034931'),(286,'034932000','ZARAGOZA','03','0349','034932'),(287,'035401000','ANGELES CITY','03','0354','035401'),(288,'035402000','APALIT','03','0354','035402'),(289,'035403000','ARAYAT','03','0354','035403'),(290,'035404000','BACOLOR','03','0354','035404'),(291,'035405000','CANDABA','03','0354','035405'),(292,'035406000','FLORIDABLANCA','03','0354','035406'),(293,'035407000','GUAGUA','03','0354','035407'),(294,'035408000','LUBAO','03','0354','035408'),(295,'035409000','MABALACAT CITY','03','0354','035409'),(296,'035410000','MACABEBE','03','0354','035410'),(297,'035411000','MAGALANG','03','0354','035411'),(298,'035412000','MASANTOL','03','0354','035412'),(299,'035413000','MEXICO','03','0354','035413'),(300,'035414000','MINALIN','03','0354','035414'),(301,'035415000','PORAC','03','0354','035415'),(302,'035416000','CITY OF SAN FERNANDO (Capital)','03','0354','035416'),(303,'035417000','SAN LUIS','03','0354','035417'),(304,'035418000','SAN SIMON','03','0354','035418'),(305,'035419000','SANTA ANA','03','0354','035419'),(306,'035420000','SANTA RITA','03','0354','035420'),(307,'035421000','SANTO TOMAS','03','0354','035421'),(308,'035422000','SASMUAN (Sexmoan)','03','0354','035422'),(309,'036901000','ANAO','03','0369','036901'),(310,'036902000','BAMBAN','03','0369','036902'),(311,'036903000','CAMILING','03','0369','036903'),(312,'036904000','CAPAS','03','0369','036904'),(313,'036905000','CONCEPCION','03','0369','036905'),(314,'036906000','GERONA','03','0369','036906'),(315,'036907000','LA PAZ','03','0369','036907'),(316,'036908000','MAYANTOC','03','0369','036908'),(317,'036909000','MONCADA','03','0369','036909'),(318,'036910000','PANIQUI','03','0369','036910'),(319,'036911000','PURA','03','0369','036911'),(320,'036912000','RAMOS','03','0369','036912'),(321,'036913000','SAN CLEMENTE','03','0369','036913'),(322,'036914000','SAN MANUEL','03','0369','036914'),(323,'036915000','SANTA IGNACIA','03','0369','036915'),(324,'036916000','CITY OF TARLAC (Capital)','03','0369','036916'),(325,'036917000','VICTORIA','03','0369','036917'),(326,'036918000','SAN JOSE','03','0369','036918'),(327,'037101000','BOTOLAN','03','0371','037101'),(328,'037102000','CABANGAN','03','0371','037102'),(329,'037103000','CANDELARIA','03','0371','037103'),(330,'037104000','CASTILLEJOS','03','0371','037104'),(331,'037105000','IBA (Capital)','03','0371','037105'),(332,'037106000','MASINLOC','03','0371','037106'),(333,'037107000','OLONGAPO CITY','03','0371','037107'),(334,'037108000','PALAUIG','03','0371','037108'),(335,'037109000','SAN ANTONIO','03','0371','037109'),(336,'037110000','SAN FELIPE','03','0371','037110'),(337,'037111000','SAN MARCELINO','03','0371','037111'),(338,'037112000','SAN NARCISO','03','0371','037112'),(339,'037113000','SANTA CRUZ','03','0371','037113'),(340,'037114000','SUBIC','03','0371','037114'),(341,'037701000','BALER (Capital)','03','0377','037701'),(342,'037702000','CASIGURAN','03','0377','037702'),(343,'037703000','DILASAG','03','0377','037703'),(344,'037704000','DINALUNGAN','03','0377','037704'),(345,'037705000','DINGALAN','03','0377','037705'),(346,'037706000','DIPACULAO','03','0377','037706'),(347,'037707000','MARIA AURORA','03','0377','037707'),(348,'037708000','SAN LUIS','03','0377','037708'),(349,'041001000','AGONCILLO','04','0410','041001'),(350,'041002000','ALITAGTAG','04','0410','041002'),(351,'041003000','BALAYAN','04','0410','041003'),(352,'041004000','BALETE','04','0410','041004'),(353,'041005000','BATANGAS CITY (Capital)','04','0410','041005'),(354,'041006000','BAUAN','04','0410','041006'),(355,'041007000','CALACA','04','0410','041007'),(356,'041008000','CALATAGAN','04','0410','041008'),(357,'041009000','CUENCA','04','0410','041009'),(358,'041010000','IBAAN','04','0410','041010'),(359,'041011000','LAUREL','04','0410','041011'),(360,'041012000','LEMERY','04','0410','041012'),(361,'041013000','LIAN','04','0410','041013'),(362,'041014000','LIPA CITY','04','0410','041014'),(363,'041015000','LOBO','04','0410','041015'),(364,'041016000','MABINI','04','0410','041016'),(365,'041017000','MALVAR','04','0410','041017'),(366,'041018000','MATAASNAKAHOY','04','0410','041018'),(367,'041019000','NASUGBU','04','0410','041019'),(368,'041020000','PADRE GARCIA','04','0410','041020'),(369,'041021000','ROSARIO','04','0410','041021'),(370,'041022000','SAN JOSE','04','0410','041022'),(371,'041023000','SAN JUAN','04','0410','041023'),(372,'041024000','SAN LUIS','04','0410','041024'),(373,'041025000','SAN NICOLAS','04','0410','041025'),(374,'041026000','SAN PASCUAL','04','0410','041026'),(375,'041027000','SANTA TERESITA','04','0410','041027'),(376,'041028000','SANTO TOMAS','04','0410','041028'),(377,'041029000','TAAL','04','0410','041029'),(378,'041030000','TALISAY','04','0410','041030'),(379,'041031000','CITY OF TANAUAN','04','0410','041031'),(380,'041032000','TAYSAN','04','0410','041032'),(381,'041033000','TINGLOY','04','0410','041033'),(382,'041034000','TUY','04','0410','041034'),(383,'042101000','ALFONSO','04','0421','042101'),(384,'042102000','AMADEO','04','0421','042102'),(385,'042103000','BACOOR CITY','04','0421','042103'),(386,'042104000','CARMONA','04','0421','042104'),(387,'042105000','CAVITE CITY','04','0421','042105'),(388,'042106000','CITY OF DASMARIÑAS','04','0421','042106'),(389,'042107000','GENERAL EMILIO AGUINALDO','04','0421','042107'),(390,'042108000','GENERAL TRIAS','04','0421','042108'),(391,'042109000','IMUS CITY','04','0421','042109'),(392,'042110000','INDANG','04','0421','042110'),(393,'042111000','KAWIT','04','0421','042111'),(394,'042112000','MAGALLANES','04','0421','042112'),(395,'042113000','MARAGONDON','04','0421','042113'),(396,'042114000','MENDEZ (MENDEZ-NUÑEZ)','04','0421','042114'),(397,'042115000','NAIC','04','0421','042115'),(398,'042116000','NOVELETA','04','0421','042116'),(399,'042117000','ROSARIO','04','0421','042117'),(400,'042118000','SILANG','04','0421','042118'),(401,'042119000','TAGAYTAY CITY','04','0421','042119'),(402,'042120000','TANZA','04','0421','042120'),(403,'042121000','TERNATE','04','0421','042121'),(404,'042122000','TRECE MARTIRES CITY (Capital)','04','0421','042122'),(405,'042123000','GEN. MARIANO ALVAREZ','04','0421','042123'),(406,'043401000','ALAMINOS','04','0434','043401'),(407,'043402000','BAY','04','0434','043402'),(408,'043403000','CITY OF BIÑAN','04','0434','043403'),(409,'043404000','CABUYAO CITY','04','0434','043404'),(410,'043405000','CITY OF CALAMBA','04','0434','043405'),(411,'043406000','CALAUAN','04','0434','043406'),(412,'043407000','CAVINTI','04','0434','043407'),(413,'043408000','FAMY','04','0434','043408'),(414,'043409000','KALAYAAN','04','0434','043409'),(415,'043410000','LILIW','04','0434','043410'),(416,'043411000','LOS BAÑOS','04','0434','043411'),(417,'043412000','LUISIANA','04','0434','043412'),(418,'043413000','LUMBAN','04','0434','043413'),(419,'043414000','MABITAC','04','0434','043414'),(420,'043415000','MAGDALENA','04','0434','043415'),(421,'043416000','MAJAYJAY','04','0434','043416'),(422,'043417000','NAGCARLAN','04','0434','043417'),(423,'043418000','PAETE','04','0434','043418'),(424,'043419000','PAGSANJAN','04','0434','043419'),(425,'043420000','PAKIL','04','0434','043420'),(426,'043421000','PANGIL','04','0434','043421'),(427,'043422000','PILA','04','0434','043422'),(428,'043423000','RIZAL','04','0434','043423'),(429,'043424000','SAN PABLO CITY','04','0434','043424'),(430,'043425000','CITY OF SAN PEDRO','04','0434','043425'),(431,'043426000','SANTA CRUZ (Capital)','04','0434','043426'),(432,'043427000','SANTA MARIA','04','0434','043427'),(433,'043428000','CITY OF SANTA ROSA','04','0434','043428'),(434,'043429000','SINILOAN','04','0434','043429'),(435,'043430000','VICTORIA','04','0434','043430'),(436,'045601000','AGDANGAN','04','0456','045601'),(437,'045602000','ALABAT','04','0456','045602'),(438,'045603000','ATIMONAN','04','0456','045603'),(439,'045605000','BUENAVISTA','04','0456','045605'),(440,'045606000','BURDEOS','04','0456','045606'),(441,'045607000','CALAUAG','04','0456','045607'),(442,'045608000','CANDELARIA','04','0456','045608'),(443,'045610000','CATANAUAN','04','0456','045610'),(444,'045615000','DOLORES','04','0456','045615'),(445,'045616000','GENERAL LUNA','04','0456','045616'),(446,'045617000','GENERAL NAKAR','04','0456','045617'),(447,'045618000','GUINAYANGAN','04','0456','045618'),(448,'045619000','GUMACA','04','0456','045619'),(449,'045620000','INFANTA','04','0456','045620'),(450,'045621000','JOMALIG','04','0456','045621'),(451,'045622000','LOPEZ','04','0456','045622'),(452,'045623000','LUCBAN','04','0456','045623'),(453,'045624000','LUCENA CITY (Capital)','04','0456','045624'),(454,'045625000','MACALELON','04','0456','045625'),(455,'045627000','MAUBAN','04','0456','045627'),(456,'045628000','MULANAY','04','0456','045628'),(457,'045629000','PADRE BURGOS','04','0456','045629'),(458,'045630000','PAGBILAO','04','0456','045630'),(459,'045631000','PANUKULAN','04','0456','045631'),(460,'045632000','PATNANUNGAN','04','0456','045632'),(461,'045633000','PEREZ','04','0456','045633'),(462,'045634000','PITOGO','04','0456','045634'),(463,'045635000','PLARIDEL','04','0456','045635'),(464,'045636000','POLILLO','04','0456','045636'),(465,'045637000','QUEZON','04','0456','045637'),(466,'045638000','REAL','04','0456','045638'),(467,'045639000','SAMPALOC','04','0456','045639'),(468,'045640000','SAN ANDRES','04','0456','045640'),(469,'045641000','SAN ANTONIO','04','0456','045641'),(470,'045642000','SAN FRANCISCO (AURORA)','04','0456','045642'),(471,'045644000','SAN NARCISO','04','0456','045644'),(472,'045645000','SARIAYA','04','0456','045645'),(473,'045646000','TAGKAWAYAN','04','0456','045646'),(474,'045647000','CITY OF TAYABAS','04','0456','045647'),(475,'045648000','TIAONG','04','0456','045648'),(476,'045649000','UNISAN','04','0456','045649'),(477,'045801000','ANGONO','04','0458','045801'),(478,'045802000','CITY OF ANTIPOLO','04','0458','045802'),(479,'045803000','BARAS','04','0458','045803'),(480,'045804000','BINANGONAN','04','0458','045804'),(481,'045805000','CAINTA','04','0458','045805'),(482,'045806000','CARDONA','04','0458','045806'),(483,'045807000','JALA-JALA','04','0458','045807'),(484,'045808000','RODRIGUEZ (MONTALBAN)','04','0458','045808'),(485,'045809000','MORONG','04','0458','045809'),(486,'045810000','PILILLA','04','0458','045810'),(487,'045811000','SAN MATEO','04','0458','045811'),(488,'045812000','TANAY','04','0458','045812'),(489,'045813000','TAYTAY','04','0458','045813'),(490,'045814000','TERESA','04','0458','045814'),(491,'174001000','BOAC (Capital)','17','1740','174001'),(492,'174002000','BUENAVISTA','17','1740','174002'),(493,'174003000','GASAN','17','1740','174003'),(494,'174004000','MOGPOG','17','1740','174004'),(495,'174005000','SANTA CRUZ','17','1740','174005'),(496,'174006000','TORRIJOS','17','1740','174006'),(497,'175101000','ABRA DE ILOG','17','1751','175101'),(498,'175102000','CALINTAAN','17','1751','175102'),(499,'175103000','LOOC','17','1751','175103'),(500,'175104000','LUBANG','17','1751','175104'),(501,'175105000','MAGSAYSAY','17','1751','175105'),(502,'175106000','MAMBURAO (Capital)','17','1751','175106'),(503,'175107000','PALUAN','17','1751','175107'),(504,'175108000','RIZAL','17','1751','175108'),(505,'175109000','SABLAYAN','17','1751','175109'),(506,'175110000','SAN JOSE','17','1751','175110'),(507,'175111000','SANTA CRUZ','17','1751','175111'),(508,'175201000','BACO','17','1752','175201'),(509,'175202000','BANSUD','17','1752','175202'),(510,'175203000','BONGABONG','17','1752','175203'),(511,'175204000','BULALACAO (SAN PEDRO)','17','1752','175204'),(512,'175205000','CITY OF CALAPAN (Capital)','17','1752','175205'),(513,'175206000','GLORIA','17','1752','175206'),(514,'175207000','MANSALAY','17','1752','175207'),(515,'175208000','NAUJAN','17','1752','175208'),(516,'175209000','PINAMALAYAN','17','1752','175209'),(517,'175210000','POLA','17','1752','175210'),(518,'175211000','PUERTO GALERA','17','1752','175211'),(519,'175212000','ROXAS','17','1752','175212'),(520,'175213000','SAN TEODORO','17','1752','175213'),(521,'175214000','SOCORRO','17','1752','175214'),(522,'175215000','VICTORIA','17','1752','175215'),(523,'175301000','ABORLAN','17','1753','175301'),(524,'175302000','AGUTAYA','17','1753','175302'),(525,'175303000','ARACELI','17','1753','175303'),(526,'175304000','BALABAC','17','1753','175304'),(527,'175305000','BATARAZA','17','1753','175305'),(528,'175306000','BROOKE\'S POINT','17','1753','175306'),(529,'175307000','BUSUANGA','17','1753','175307'),(530,'175308000','CAGAYANCILLO','17','1753','175308'),(531,'175309000','CORON','17','1753','175309'),(532,'175310000','CUYO','17','1753','175310'),(533,'175311000','DUMARAN','17','1753','175311'),(534,'175312000','EL NIDO (BACUIT)','17','1753','175312'),(535,'175313000','LINAPACAN','17','1753','175313'),(536,'175314000','MAGSAYSAY','17','1753','175314'),(537,'175315000','NARRA','17','1753','175315'),(538,'175316000','PUERTO PRINCESA CITY (Capital)','17','1753','175316'),(539,'175317000','QUEZON','17','1753','175317'),(540,'175318000','ROXAS','17','1753','175318'),(541,'175319000','SAN VICENTE','17','1753','175319'),(542,'175320000','TAYTAY','17','1753','175320'),(543,'175321000','KALAYAAN','17','1753','175321'),(544,'175322000','CULION','17','1753','175322'),(545,'175323000','RIZAL (MARCOS)','17','1753','175323'),(546,'175324000','SOFRONIO ESPAÑOLA','17','1753','175324'),(547,'175901000','ALCANTARA','17','1759','175901'),(548,'175902000','BANTON','17','1759','175902'),(549,'175903000','CAJIDIOCAN','17','1759','175903'),(550,'175904000','CALATRAVA','17','1759','175904'),(551,'175905000','CONCEPCION','17','1759','175905'),(552,'175906000','CORCUERA','17','1759','175906'),(553,'175907000','LOOC','17','1759','175907'),(554,'175908000','MAGDIWANG','17','1759','175908'),(555,'175909000','ODIONGAN','17','1759','175909'),(556,'175910000','ROMBLON (Capital)','17','1759','175910'),(557,'175911000','SAN AGUSTIN','17','1759','175911'),(558,'175912000','SAN ANDRES','17','1759','175912'),(559,'175913000','SAN FERNANDO','17','1759','175913'),(560,'175914000','SAN JOSE','17','1759','175914'),(561,'175915000','SANTA FE','17','1759','175915'),(562,'175916000','FERROL','17','1759','175916'),(563,'175917000','SANTA MARIA (IMELDA)','17','1759','175917'),(564,'050501000','BACACAY','05','0505','050501'),(565,'050502000','CAMALIG','05','0505','050502'),(566,'050503000','DARAGA (LOCSIN)','05','0505','050503'),(567,'050504000','GUINOBATAN','05','0505','050504'),(568,'050505000','JOVELLAR','05','0505','050505'),(569,'050506000','LEGAZPI CITY (Capital)','05','0505','050506'),(570,'050507000','LIBON','05','0505','050507'),(571,'050508000','CITY OF LIGAO','05','0505','050508'),(572,'050509000','MALILIPOT','05','0505','050509'),(573,'050510000','MALINAO','05','0505','050510'),(574,'050511000','MANITO','05','0505','050511'),(575,'050512000','OAS','05','0505','050512'),(576,'050513000','PIO DURAN','05','0505','050513'),(577,'050514000','POLANGUI','05','0505','050514'),(578,'050515000','RAPU-RAPU','05','0505','050515'),(579,'050516000','SANTO DOMINGO (LIBOG)','05','0505','050516'),(580,'050517000','CITY OF TABACO','05','0505','050517'),(581,'050518000','TIWI','05','0505','050518'),(582,'051601000','BASUD','05','0516','051601'),(583,'051602000','CAPALONGA','05','0516','051602'),(584,'051603000','DAET (Capital)','05','0516','051603'),(585,'051604000','SAN LORENZO RUIZ (IMELDA)','05','0516','051604'),(586,'051605000','JOSE PANGANIBAN','05','0516','051605'),(587,'051606000','LABO','05','0516','051606'),(588,'051607000','MERCEDES','05','0516','051607'),(589,'051608000','PARACALE','05','0516','051608'),(590,'051609000','SAN VICENTE','05','0516','051609'),(591,'051610000','SANTA ELENA','05','0516','051610'),(592,'051611000','TALISAY','05','0516','051611'),(593,'051612000','VINZONS','05','0516','051612'),(594,'051701000','BAAO','05','0517','051701'),(595,'051702000','BALATAN','05','0517','051702'),(596,'051703000','BATO','05','0517','051703'),(597,'051704000','BOMBON','05','0517','051704'),(598,'051705000','BUHI','05','0517','051705'),(599,'051706000','BULA','05','0517','051706'),(600,'051707000','CABUSAO','05','0517','051707'),(601,'051708000','CALABANGA','05','0517','051708'),(602,'051709000','CAMALIGAN','05','0517','051709'),(603,'051710000','CANAMAN','05','0517','051710'),(604,'051711000','CARAMOAN','05','0517','051711'),(605,'051712000','DEL GALLEGO','05','0517','051712'),(606,'051713000','GAINZA','05','0517','051713'),(607,'051714000','GARCHITORENA','05','0517','051714'),(608,'051715000','GOA','05','0517','051715'),(609,'051716000','IRIGA CITY','05','0517','051716'),(610,'051717000','LAGONOY','05','0517','051717'),(611,'051718000','LIBMANAN','05','0517','051718'),(612,'051719000','LUPI','05','0517','051719'),(613,'051720000','MAGARAO','05','0517','051720'),(614,'051721000','MILAOR','05','0517','051721'),(615,'051722000','MINALABAC','05','0517','051722'),(616,'051723000','NABUA','05','0517','051723'),(617,'051724000','NAGA CITY','05','0517','051724'),(618,'051725000','OCAMPO','05','0517','051725'),(619,'051726000','PAMPLONA','05','0517','051726'),(620,'051727000','PASACAO','05','0517','051727'),(621,'051728000','PILI (Capital)','05','0517','051728'),(622,'051729000','PRESENTACION (PARUBCAN)','05','0517','051729'),(623,'051730000','RAGAY','05','0517','051730'),(624,'051731000','SAGÑAY','05','0517','051731'),(625,'051732000','SAN FERNANDO','05','0517','051732'),(626,'051733000','SAN JOSE','05','0517','051733'),(627,'051734000','SIPOCOT','05','0517','051734'),(628,'051735000','SIRUMA','05','0517','051735'),(629,'051736000','TIGAON','05','0517','051736'),(630,'051737000','TINAMBAC','05','0517','051737'),(631,'052001000','BAGAMANOC','05','0520','052001'),(632,'052002000','BARAS','05','0520','052002'),(633,'052003000','BATO','05','0520','052003'),(634,'052004000','CARAMORAN','05','0520','052004'),(635,'052005000','GIGMOTO','05','0520','052005'),(636,'052006000','PANDAN','05','0520','052006'),(637,'052007000','PANGANIBAN (PAYO)','05','0520','052007'),(638,'052008000','SAN ANDRES (CALOLBON)','05','0520','052008'),(639,'052009000','SAN MIGUEL','05','0520','052009'),(640,'052010000','VIGA','05','0520','052010'),(641,'052011000','VIRAC (Capital)','05','0520','052011'),(642,'054101000','AROROY','05','0541','054101'),(643,'054102000','BALENO','05','0541','054102'),(644,'054103000','BALUD','05','0541','054103'),(645,'054104000','BATUAN','05','0541','054104'),(646,'054105000','CATAINGAN','05','0541','054105'),(647,'054106000','CAWAYAN','05','0541','054106'),(648,'054107000','CLAVERIA','05','0541','054107'),(649,'054108000','DIMASALANG','05','0541','054108'),(650,'054109000','ESPERANZA','05','0541','054109'),(651,'054110000','MANDAON','05','0541','054110'),(652,'054111000','CITY OF MASBATE (Capital)','05','0541','054111'),(653,'054112000','MILAGROS','05','0541','054112'),(654,'054113000','MOBO','05','0541','054113'),(655,'054114000','MONREAL','05','0541','054114'),(656,'054115000','PALANAS','05','0541','054115'),(657,'054116000','PIO V. CORPUZ (LIMBUHAN)','05','0541','054116'),(658,'054117000','PLACER','05','0541','054117'),(659,'054118000','SAN FERNANDO','05','0541','054118'),(660,'054119000','SAN JACINTO','05','0541','054119'),(661,'054120000','SAN PASCUAL','05','0541','054120'),(662,'054121000','USON','05','0541','054121'),(663,'056202000','BARCELONA','05','0562','056202'),(664,'056203000','BULAN','05','0562','056203'),(665,'056204000','BULUSAN','05','0562','056204'),(666,'056205000','CASIGURAN','05','0562','056205'),(667,'056206000','CASTILLA','05','0562','056206'),(668,'056207000','DONSOL','05','0562','056207'),(669,'056208000','GUBAT','05','0562','056208'),(670,'056209000','IROSIN','05','0562','056209'),(671,'056210000','JUBAN','05','0562','056210'),(672,'056211000','MAGALLANES','05','0562','056211'),(673,'056212000','MATNOG','05','0562','056212'),(674,'056213000','PILAR','05','0562','056213'),(675,'056214000','PRIETO DIAZ','05','0562','056214'),(676,'056215000','SANTA MAGDALENA','05','0562','056215'),(677,'056216000','CITY OF SORSOGON (Capital)','05','0562','056216'),(678,'060401000','ALTAVAS','06','0604','060401'),(679,'060402000','BALETE','06','0604','060402'),(680,'060403000','BANGA','06','0604','060403'),(681,'060404000','BATAN','06','0604','060404'),(682,'060405000','BURUANGA','06','0604','060405'),(683,'060406000','IBAJAY','06','0604','060406'),(684,'060407000','KALIBO (Capital)','06','0604','060407'),(685,'060408000','LEZO','06','0604','060408'),(686,'060409000','LIBACAO','06','0604','060409'),(687,'060410000','MADALAG','06','0604','060410'),(688,'060411000','MAKATO','06','0604','060411'),(689,'060412000','MALAY','06','0604','060412'),(690,'060413000','MALINAO','06','0604','060413'),(691,'060414000','NABAS','06','0604','060414'),(692,'060415000','NEW WASHINGTON','06','0604','060415'),(693,'060416000','NUMANCIA','06','0604','060416'),(694,'060417000','TANGALAN','06','0604','060417'),(695,'060601000','ANINI-Y','06','0606','060601'),(696,'060602000','BARBAZA','06','0606','060602'),(697,'060603000','BELISON','06','0606','060603'),(698,'060604000','BUGASONG','06','0606','060604'),(699,'060605000','CALUYA','06','0606','060605'),(700,'060606000','CULASI','06','0606','060606'),(701,'060607000','TOBIAS FORNIER (DAO)','06','0606','060607'),(702,'060608000','HAMTIC','06','0606','060608'),(703,'060609000','LAUA-AN','06','0606','060609'),(704,'060610000','LIBERTAD','06','0606','060610'),(705,'060611000','PANDAN','06','0606','060611'),(706,'060612000','PATNONGON','06','0606','060612'),(707,'060613000','SAN JOSE (Capital)','06','0606','060613'),(708,'060614000','SAN REMIGIO','06','0606','060614'),(709,'060615000','SEBASTE','06','0606','060615'),(710,'060616000','SIBALOM','06','0606','060616'),(711,'060617000','TIBIAO','06','0606','060617'),(712,'060618000','VALDERRAMA','06','0606','060618'),(713,'061901000','CUARTERO','06','0619','061901'),(714,'061902000','DAO','06','0619','061902'),(715,'061903000','DUMALAG','06','0619','061903'),(716,'061904000','DUMARAO','06','0619','061904'),(717,'061905000','IVISAN','06','0619','061905'),(718,'061906000','JAMINDAN','06','0619','061906'),(719,'061907000','MA-AYON','06','0619','061907'),(720,'061908000','MAMBUSAO','06','0619','061908'),(721,'061909000','PANAY','06','0619','061909'),(722,'061910000','PANITAN','06','0619','061910'),(723,'061911000','PILAR','06','0619','061911'),(724,'061912000','PONTEVEDRA','06','0619','061912'),(725,'061913000','PRESIDENT ROXAS','06','0619','061913'),(726,'061914000','ROXAS CITY (Capital)','06','0619','061914'),(727,'061915000','SAPI-AN','06','0619','061915'),(728,'061916000','SIGMA','06','0619','061916'),(729,'061917000','TAPAZ','06','0619','061917'),(730,'063001000','AJUY','06','0630','063001'),(731,'063002000','ALIMODIAN','06','0630','063002'),(732,'063003000','ANILAO','06','0630','063003'),(733,'063004000','BADIANGAN','06','0630','063004'),(734,'063005000','BALASAN','06','0630','063005'),(735,'063006000','BANATE','06','0630','063006'),(736,'063007000','BAROTAC NUEVO','06','0630','063007'),(737,'063008000','BAROTAC VIEJO','06','0630','063008'),(738,'063009000','BATAD','06','0630','063009'),(739,'063010000','BINGAWAN','06','0630','063010'),(740,'063012000','CABATUAN','06','0630','063012'),(741,'063013000','CALINOG','06','0630','063013'),(742,'063014000','CARLES','06','0630','063014'),(743,'063015000','CONCEPCION','06','0630','063015'),(744,'063016000','DINGLE','06','0630','063016'),(745,'063017000','DUEÑAS','06','0630','063017'),(746,'063018000','DUMANGAS','06','0630','063018'),(747,'063019000','ESTANCIA','06','0630','063019'),(748,'063020000','GUIMBAL','06','0630','063020'),(749,'063021000','IGBARAS','06','0630','063021'),(750,'063022000','ILOILO CITY (Capital)','06','0630','063022'),(751,'063023000','JANIUAY','06','0630','063023'),(752,'063025000','LAMBUNAO','06','0630','063025'),(753,'063026000','LEGANES','06','0630','063026'),(754,'063027000','LEMERY','06','0630','063027'),(755,'063028000','LEON','06','0630','063028'),(756,'063029000','MAASIN','06','0630','063029'),(757,'063030000','MIAGAO','06','0630','063030'),(758,'063031000','MINA','06','0630','063031'),(759,'063032000','NEW LUCENA','06','0630','063032'),(760,'063034000','OTON','06','0630','063034'),(761,'063035000','CITY OF PASSI','06','0630','063035'),(762,'063036000','PAVIA','06','0630','063036'),(763,'063037000','POTOTAN','06','0630','063037'),(764,'063038000','SAN DIONISIO','06','0630','063038'),(765,'063039000','SAN ENRIQUE','06','0630','063039'),(766,'063040000','SAN JOAQUIN','06','0630','063040'),(767,'063041000','SAN MIGUEL','06','0630','063041'),(768,'063042000','SAN RAFAEL','06','0630','063042'),(769,'063043000','SANTA BARBARA','06','0630','063043'),(770,'063044000','SARA','06','0630','063044'),(771,'063045000','TIGBAUAN','06','0630','063045'),(772,'063046000','TUBUNGAN','06','0630','063046'),(773,'063047000','ZARRAGA','06','0630','063047'),(774,'064501000','BACOLOD CITY (Capital)','06','0645','064501'),(775,'064502000','BAGO CITY','06','0645','064502'),(776,'064503000','BINALBAGAN','06','0645','064503'),(777,'064504000','CADIZ CITY','06','0645','064504'),(778,'064505000','CALATRAVA','06','0645','064505'),(779,'064506000','CANDONI','06','0645','064506'),(780,'064507000','CAUAYAN','06','0645','064507'),(781,'064508000','ENRIQUE B. MAGALONA (SARAVIA)','06','0645','064508'),(782,'064509000','CITY OF ESCALANTE','06','0645','064509'),(783,'064510000','CITY OF HIMAMAYLAN','06','0645','064510'),(784,'064511000','HINIGARAN','06','0645','064511'),(785,'064512000','HINOBA-AN (ASIA)','06','0645','064512'),(786,'064513000','ILOG','06','0645','064513'),(787,'064514000','ISABELA','06','0645','064514'),(788,'064515000','CITY OF KABANKALAN','06','0645','064515'),(789,'064516000','LA CARLOTA CITY','06','0645','064516'),(790,'064517000','LA CASTELLANA','06','0645','064517'),(791,'064518000','MANAPLA','06','0645','064518'),(792,'064519000','MOISES PADILLA (MAGALLON)','06','0645','064519'),(793,'064520000','MURCIA','06','0645','064520'),(794,'064521000','PONTEVEDRA','06','0645','064521'),(795,'064522000','PULUPANDAN','06','0645','064522'),(796,'064523000','SAGAY CITY','06','0645','064523'),(797,'064524000','SAN CARLOS CITY','06','0645','064524'),(798,'064525000','SAN ENRIQUE','06','0645','064525'),(799,'064526000','SILAY CITY','06','0645','064526'),(800,'064527000','CITY OF SIPALAY','06','0645','064527'),(801,'064528000','CITY OF TALISAY','06','0645','064528'),(802,'064529000','TOBOSO','06','0645','064529'),(803,'064530000','VALLADOLID','06','0645','064530'),(804,'064531000','CITY OF VICTORIAS','06','0645','064531'),(805,'064532000','SALVADOR BENEDICTO','06','0645','064532'),(806,'067901000','BUENAVISTA','06','0679','067901'),(807,'067902000','JORDAN (Capital)','06','0679','067902'),(808,'067903000','NUEVA VALENCIA','06','0679','067903'),(809,'067904000','SAN LORENZO','06','0679','067904'),(810,'067905000','SIBUNAG','06','0679','067905'),(811,'071201000','ALBURQUERQUE','07','0712','071201'),(812,'071202000','ALICIA','07','0712','071202'),(813,'071203000','ANDA','07','0712','071203'),(814,'071204000','ANTEQUERA','07','0712','071204'),(815,'071205000','BACLAYON','07','0712','071205'),(816,'071206000','BALILIHAN','07','0712','071206'),(817,'071207000','BATUAN','07','0712','071207'),(818,'071208000','BILAR','07','0712','071208'),(819,'071209000','BUENAVISTA','07','0712','071209'),(820,'071210000','CALAPE','07','0712','071210'),(821,'071211000','CANDIJAY','07','0712','071211'),(822,'071212000','CARMEN','07','0712','071212'),(823,'071213000','CATIGBIAN','07','0712','071213'),(824,'071214000','CLARIN','07','0712','071214'),(825,'071215000','CORELLA','07','0712','071215'),(826,'071216000','CORTES','07','0712','071216'),(827,'071217000','DAGOHOY','07','0712','071217'),(828,'071218000','DANAO','07','0712','071218'),(829,'071219000','DAUIS','07','0712','071219'),(830,'071220000','DIMIAO','07','0712','071220'),(831,'071221000','DUERO','07','0712','071221'),(832,'071222000','GARCIA HERNANDEZ','07','0712','071222'),(833,'071223000','GUINDULMAN','07','0712','071223'),(834,'071224000','INABANGA','07','0712','071224'),(835,'071225000','JAGNA','07','0712','071225'),(836,'071226000','JETAFE','07','0712','071226'),(837,'071227000','LILA','07','0712','071227'),(838,'071228000','LOAY','07','0712','071228'),(839,'071229000','LOBOC','07','0712','071229'),(840,'071230000','LOON','07','0712','071230'),(841,'071231000','MABINI','07','0712','071231'),(842,'071232000','MARIBOJOC','07','0712','071232'),(843,'071233000','PANGLAO','07','0712','071233'),(844,'071234000','PILAR','07','0712','071234'),(845,'071235000','PRES. CARLOS P. GARCIA (PITOGO)','07','0712','071235'),(846,'071236000','SAGBAYAN (BORJA)','07','0712','071236'),(847,'071237000','SAN ISIDRO','07','0712','071237'),(848,'071238000','SAN MIGUEL','07','0712','071238'),(849,'071239000','SEVILLA','07','0712','071239'),(850,'071240000','SIERRA BULLONES','07','0712','071240'),(851,'071241000','SIKATUNA','07','0712','071241'),(852,'071242000','TAGBILARAN CITY (Capital)','07','0712','071242'),(853,'071243000','TALIBON','07','0712','071243'),(854,'071244000','TRINIDAD','07','0712','071244'),(855,'071245000','TUBIGON','07','0712','071245'),(856,'071246000','UBAY','07','0712','071246'),(857,'071247000','VALENCIA','07','0712','071247'),(858,'071248000','BIEN UNIDO','07','0712','071248'),(859,'072201000','ALCANTARA','07','0722','072201'),(860,'072202000','ALCOY','07','0722','072202'),(861,'072203000','ALEGRIA','07','0722','072203'),(862,'072204000','ALOGUINSAN','07','0722','072204'),(863,'072205000','ARGAO','07','0722','072205'),(864,'072206000','ASTURIAS','07','0722','072206'),(865,'072207000','BADIAN','07','0722','072207'),(866,'072208000','BALAMBAN','07','0722','072208'),(867,'072209000','BANTAYAN','07','0722','072209'),(868,'072210000','BARILI','07','0722','072210'),(869,'072211000','CITY OF BOGO','07','0722','072211'),(870,'072212000','BOLJOON','07','0722','072212'),(871,'072213000','BORBON','07','0722','072213'),(872,'072214000','CITY OF CARCAR','07','0722','072214'),(873,'072215000','CARMEN','07','0722','072215'),(874,'072216000','CATMON','07','0722','072216'),(875,'072217000','CEBU CITY (Capital)','07','0722','072217'),(876,'072218000','COMPOSTELA','07','0722','072218'),(877,'072219000','CONSOLACION','07','0722','072219'),(878,'072220000','CORDOVA','07','0722','072220'),(879,'072221000','DAANBANTAYAN','07','0722','072221'),(880,'072222000','DALAGUETE','07','0722','072222'),(881,'072223000','DANAO CITY','07','0722','072223'),(882,'072224000','DUMANJUG','07','0722','072224'),(883,'072225000','GINATILAN','07','0722','072225'),(884,'072226000','LAPU-LAPU CITY (OPON)','07','0722','072226'),(885,'072227000','LILOAN','07','0722','072227'),(886,'072228000','MADRIDEJOS','07','0722','072228'),(887,'072229000','MALABUYOC','07','0722','072229'),(888,'072230000','MANDAUE CITY','07','0722','072230'),(889,'072231000','MEDELLIN','07','0722','072231'),(890,'072232000','MINGLANILLA','07','0722','072232'),(891,'072233000','MOALBOAL','07','0722','072233'),(892,'072234000','CITY OF NAGA','07','0722','072234'),(893,'072235000','OSLOB','07','0722','072235'),(894,'072236000','PILAR','07','0722','072236'),(895,'072237000','PINAMUNGAHAN','07','0722','072237'),(896,'072238000','PORO','07','0722','072238'),(897,'072239000','RONDA','07','0722','072239'),(898,'072240000','SAMBOAN','07','0722','072240'),(899,'072241000','SAN FERNANDO','07','0722','072241'),(900,'072242000','SAN FRANCISCO','07','0722','072242'),(901,'072243000','SAN REMIGIO','07','0722','072243'),(902,'072244000','SANTA FE','07','0722','072244'),(903,'072245000','SANTANDER','07','0722','072245'),(904,'072246000','SIBONGA','07','0722','072246'),(905,'072247000','SOGOD','07','0722','072247'),(906,'072248000','TABOGON','07','0722','072248'),(907,'072249000','TABUELAN','07','0722','072249'),(908,'072250000','CITY OF TALISAY','07','0722','072250'),(909,'072251000','TOLEDO CITY','07','0722','072251'),(910,'072252000','TUBURAN','07','0722','072252'),(911,'072253000','TUDELA','07','0722','072253'),(912,'074601000','AMLAN (AYUQUITAN)','07','0746','074601'),(913,'074602000','AYUNGON','07','0746','074602'),(914,'074603000','BACONG','07','0746','074603'),(915,'074604000','BAIS CITY','07','0746','074604'),(916,'074605000','BASAY','07','0746','074605'),(917,'074606000','CITY OF BAYAWAN (TULONG)','07','0746','074606'),(918,'074607000','BINDOY (PAYABON)','07','0746','074607'),(919,'074608000','CANLAON CITY','07','0746','074608'),(920,'074609000','DAUIN','07','0746','074609'),(921,'074610000','DUMAGUETE CITY (Capital)','07','0746','074610'),(922,'074611000','CITY OF GUIHULNGAN','07','0746','074611'),(923,'074612000','JIMALALUD','07','0746','074612'),(924,'074613000','LA LIBERTAD','07','0746','074613'),(925,'074614000','MABINAY','07','0746','074614'),(926,'074615000','MANJUYOD','07','0746','074615'),(927,'074616000','PAMPLONA','07','0746','074616'),(928,'074617000','SAN JOSE','07','0746','074617'),(929,'074618000','SANTA CATALINA','07','0746','074618'),(930,'074619000','SIATON','07','0746','074619'),(931,'074620000','SIBULAN','07','0746','074620'),(932,'074621000','CITY OF TANJAY','07','0746','074621'),(933,'074622000','TAYASAN','07','0746','074622'),(934,'074623000','VALENCIA (LUZURRIAGA)','07','0746','074623'),(935,'074624000','VALLEHERMOSO','07','0746','074624'),(936,'074625000','ZAMBOANGUITA','07','0746','074625'),(937,'076101000','ENRIQUE VILLANUEVA','07','0761','076101'),(938,'076102000','LARENA','07','0761','076102'),(939,'076103000','LAZI','07','0761','076103'),(940,'076104000','MARIA','07','0761','076104'),(941,'076105000','SAN JUAN','07','0761','076105'),(942,'076106000','SIQUIJOR (Capital)','07','0761','076106'),(943,'082601000','ARTECHE','08','0826','082601'),(944,'082602000','BALANGIGA','08','0826','082602'),(945,'082603000','BALANGKAYAN','08','0826','082603'),(946,'082604000','CITY OF BORONGAN (Capital)','08','0826','082604'),(947,'082605000','CAN-AVID','08','0826','082605'),(948,'082606000','DOLORES','08','0826','082606'),(949,'082607000','GENERAL MACARTHUR','08','0826','082607'),(950,'082608000','GIPORLOS','08','0826','082608'),(951,'082609000','GUIUAN','08','0826','082609'),(952,'082610000','HERNANI','08','0826','082610'),(953,'082611000','JIPAPAD','08','0826','082611'),(954,'082612000','LAWAAN','08','0826','082612'),(955,'082613000','LLORENTE','08','0826','082613'),(956,'082614000','MASLOG','08','0826','082614'),(957,'082615000','MAYDOLONG','08','0826','082615'),(958,'082616000','MERCEDES','08','0826','082616'),(959,'082617000','ORAS','08','0826','082617'),(960,'082618000','QUINAPONDAN','08','0826','082618'),(961,'082619000','SALCEDO','08','0826','082619'),(962,'082620000','SAN JULIAN','08','0826','082620'),(963,'082621000','SAN POLICARPO','08','0826','082621'),(964,'082622000','SULAT','08','0826','082622'),(965,'082623000','TAFT','08','0826','082623'),(966,'083701000','ABUYOG','08','0837','083701'),(967,'083702000','ALANGALANG','08','0837','083702'),(968,'083703000','ALBUERA','08','0837','083703'),(969,'083705000','BABATNGON','08','0837','083705'),(970,'083706000','BARUGO','08','0837','083706'),(971,'083707000','BATO','08','0837','083707'),(972,'083708000','CITY OF BAYBAY','08','0837','083708'),(973,'083710000','BURAUEN','08','0837','083710'),(974,'083713000','CALUBIAN','08','0837','083713'),(975,'083714000','CAPOOCAN','08','0837','083714'),(976,'083715000','CARIGARA','08','0837','083715'),(977,'083717000','DAGAMI','08','0837','083717'),(978,'083718000','DULAG','08','0837','083718'),(979,'083719000','HILONGOS','08','0837','083719'),(980,'083720000','HINDANG','08','0837','083720'),(981,'083721000','INOPACAN','08','0837','083721'),(982,'083722000','ISABEL','08','0837','083722'),(983,'083723000','JARO','08','0837','083723'),(984,'083724000','JAVIER (BUGHO)','08','0837','083724'),(985,'083725000','JULITA','08','0837','083725'),(986,'083726000','KANANGA','08','0837','083726'),(987,'083728000','LA PAZ','08','0837','083728'),(988,'083729000','LEYTE','08','0837','083729'),(989,'083730000','MACARTHUR','08','0837','083730'),(990,'083731000','MAHAPLAG','08','0837','083731'),(991,'083733000','MATAG-OB','08','0837','083733'),(992,'083734000','MATALOM','08','0837','083734'),(993,'083735000','MAYORGA','08','0837','083735'),(994,'083736000','MERIDA','08','0837','083736'),(995,'083738000','ORMOC CITY','08','0837','083738'),(996,'083739000','PALO','08','0837','083739'),(997,'083740000','PALOMPON','08','0837','083740'),(998,'083741000','PASTRANA','08','0837','083741'),(999,'083742000','SAN ISIDRO','08','0837','083742'),(1000,'083743000','SAN MIGUEL','08','0837','083743'),(1001,'083744000','SANTA FE','08','0837','083744'),(1002,'083745000','TABANGO','08','0837','083745'),(1003,'083746000','TABONTABON','08','0837','083746'),(1004,'083747000','TACLOBAN CITY (Capital)','08','0837','083747'),(1005,'083748000','TANAUAN','08','0837','083748'),(1006,'083749000','TOLOSA','08','0837','083749'),(1007,'083750000','TUNGA','08','0837','083750'),(1008,'083751000','VILLABA','08','0837','083751'),(1009,'084801000','ALLEN','08','0848','084801'),(1010,'084802000','BIRI','08','0848','084802'),(1011,'084803000','BOBON','08','0848','084803'),(1012,'084804000','CAPUL','08','0848','084804'),(1013,'084805000','CATARMAN (Capital)','08','0848','084805'),(1014,'084806000','CATUBIG','08','0848','084806'),(1015,'084807000','GAMAY','08','0848','084807'),(1016,'084808000','LAOANG','08','0848','084808'),(1017,'084809000','LAPINIG','08','0848','084809'),(1018,'084810000','LAS NAVAS','08','0848','084810'),(1019,'084811000','LAVEZARES','08','0848','084811'),(1020,'084812000','MAPANAS','08','0848','084812'),(1021,'084813000','MONDRAGON','08','0848','084813'),(1022,'084814000','PALAPAG','08','0848','084814'),(1023,'084815000','PAMBUJAN','08','0848','084815'),(1024,'084816000','ROSARIO','08','0848','084816'),(1025,'084817000','SAN ANTONIO','08','0848','084817'),(1026,'084818000','SAN ISIDRO','08','0848','084818'),(1027,'084819000','SAN JOSE','08','0848','084819'),(1028,'084820000','SAN ROQUE','08','0848','084820'),(1029,'084821000','SAN VICENTE','08','0848','084821'),(1030,'084822000','SILVINO LOBOS','08','0848','084822'),(1031,'084823000','VICTORIA','08','0848','084823'),(1032,'084824000','LOPE DE VEGA','08','0848','084824'),(1033,'086001000','ALMAGRO','08','0860','086001'),(1034,'086002000','BASEY','08','0860','086002'),(1035,'086003000','CALBAYOG CITY','08','0860','086003'),(1036,'086004000','CALBIGA','08','0860','086004'),(1037,'086005000','CITY OF CATBALOGAN (Capital)','08','0860','086005'),(1038,'086006000','DARAM','08','0860','086006'),(1039,'086007000','GANDARA','08','0860','086007'),(1040,'086008000','HINABANGAN','08','0860','086008'),(1041,'086009000','JIABONG','08','0860','086009'),(1042,'086010000','MARABUT','08','0860','086010'),(1043,'086011000','MATUGUINAO','08','0860','086011'),(1044,'086012000','MOTIONG','08','0860','086012'),(1045,'086013000','PINABACDAO','08','0860','086013'),(1046,'086014000','SAN JOSE DE BUAN','08','0860','086014'),(1047,'086015000','SAN SEBASTIAN','08','0860','086015'),(1048,'086016000','SANTA MARGARITA','08','0860','086016'),(1049,'086017000','SANTA RITA','08','0860','086017'),(1050,'086018000','SANTO NIÑO','08','0860','086018'),(1051,'086019000','TALALORA','08','0860','086019'),(1052,'086020000','TARANGNAN','08','0860','086020'),(1053,'086021000','VILLAREAL','08','0860','086021'),(1054,'086022000','PARANAS (WRIGHT)','08','0860','086022'),(1055,'086023000','ZUMARRAGA','08','0860','086023'),(1056,'086024000','TAGAPUL-AN','08','0860','086024'),(1057,'086025000','SAN JORGE','08','0860','086025'),(1058,'086026000','PAGSANGHAN','08','0860','086026'),(1059,'086401000','ANAHAWAN','08','0864','086401'),(1060,'086402000','BONTOC','08','0864','086402'),(1061,'086403000','HINUNANGAN','08','0864','086403'),(1062,'086404000','HINUNDAYAN','08','0864','086404'),(1063,'086405000','LIBAGON','08','0864','086405'),(1064,'086406000','LILOAN','08','0864','086406'),(1065,'086407000','CITY OF MAASIN (Capital)','08','0864','086407'),(1066,'086408000','MACROHON','08','0864','086408'),(1067,'086409000','MALITBOG','08','0864','086409'),(1068,'086410000','PADRE BURGOS','08','0864','086410'),(1069,'086411000','PINTUYAN','08','0864','086411'),(1070,'086412000','SAINT BERNARD','08','0864','086412'),(1071,'086413000','SAN FRANCISCO','08','0864','086413'),(1072,'086414000','SAN JUAN (CABALIAN)','08','0864','086414'),(1073,'086415000','SAN RICARDO','08','0864','086415'),(1074,'086416000','SILAGO','08','0864','086416'),(1075,'086417000','SOGOD','08','0864','086417'),(1076,'086418000','TOMAS OPPUS','08','0864','086418'),(1077,'086419000','LIMASAWA','08','0864','086419'),(1078,'087801000','ALMERIA','08','0878','087801'),(1079,'087802000','BILIRAN','08','0878','087802'),(1080,'087803000','CABUCGAYAN','08','0878','087803'),(1081,'087804000','CAIBIRAN','08','0878','087804'),(1082,'087805000','CULABA','08','0878','087805'),(1083,'087806000','KAWAYAN','08','0878','087806'),(1084,'087807000','MARIPIPI','08','0878','087807'),(1085,'087808000','NAVAL (Capital)','08','0878','087808'),(1086,'097201000','DAPITAN CITY','09','0972','097201'),(1087,'097202000','DIPOLOG CITY (Capital)','09','0972','097202'),(1088,'097203000','KATIPUNAN','09','0972','097203'),(1089,'097204000','LA LIBERTAD','09','0972','097204'),(1090,'097205000','LABASON','09','0972','097205'),(1091,'097206000','LILOY','09','0972','097206'),(1092,'097207000','MANUKAN','09','0972','097207'),(1093,'097208000','MUTIA','09','0972','097208'),(1094,'097209000','PIÑAN (NEW PIÑAN)','09','0972','097209'),(1095,'097210000','POLANCO','09','0972','097210'),(1096,'097211000','PRES. MANUEL A. ROXAS','09','0972','097211'),(1097,'097212000','RIZAL','09','0972','097212'),(1098,'097213000','SALUG','09','0972','097213'),(1099,'097214000','SERGIO OSMEÑA SR.','09','0972','097214'),(1100,'097215000','SIAYAN','09','0972','097215'),(1101,'097216000','SIBUCO','09','0972','097216'),(1102,'097217000','SIBUTAD','09','0972','097217'),(1103,'097218000','SINDANGAN','09','0972','097218'),(1104,'097219000','SIOCON','09','0972','097219'),(1105,'097220000','SIRAWAI','09','0972','097220'),(1106,'097221000','TAMPILISAN','09','0972','097221'),(1107,'097222000','JOSE DALMAN (PONOT)','09','0972','097222'),(1108,'097223000','GUTALAC','09','0972','097223'),(1109,'097224000','BALIGUIAN','09','0972','097224'),(1110,'097225000','GODOD','09','0972','097225'),(1111,'097226000','BACUNGAN (Leon T. Postigo)','09','0972','097226'),(1112,'097227000','KALAWIT','09','0972','097227'),(1113,'097302000','AURORA','09','0973','097302'),(1114,'097303000','BAYOG','09','0973','097303'),(1115,'097305000','DIMATALING','09','0973','097305'),(1116,'097306000','DINAS','09','0973','097306'),(1117,'097307000','DUMALINAO','09','0973','097307'),(1118,'097308000','DUMINGAG','09','0973','097308'),(1119,'097311000','KUMALARANG','09','0973','097311'),(1120,'097312000','LABANGAN','09','0973','097312'),(1121,'097313000','LAPUYAN','09','0973','097313'),(1122,'097315000','MAHAYAG','09','0973','097315'),(1123,'097317000','MARGOSATUBIG','09','0973','097317'),(1124,'097318000','MIDSALIP','09','0973','097318'),(1125,'097319000','MOLAVE','09','0973','097319'),(1126,'097322000','PAGADIAN CITY (Capital)','09','0973','097322'),(1127,'097323000','RAMON MAGSAYSAY (LIARGO)','09','0973','097323'),(1128,'097324000','SAN MIGUEL','09','0973','097324'),(1129,'097325000','SAN PABLO','09','0973','097325'),(1130,'097327000','TABINA','09','0973','097327'),(1131,'097328000','TAMBULIG','09','0973','097328'),(1132,'097330000','TUKURAN','09','0973','097330'),(1133,'097332000','ZAMBOANGA CITY','09','0973','097332'),(1134,'097333000','LAKEWOOD','09','0973','097333'),(1135,'097337000','JOSEFINA','09','0973','097337'),(1136,'097338000','PITOGO','09','0973','097338'),(1137,'097340000','SOMINOT (DON MARIANO MARCOS)','09','0973','097340'),(1138,'097341000','VINCENZO A. SAGUN','09','0973','097341'),(1139,'097343000','GUIPOS','09','0973','097343'),(1140,'097344000','TIGBAO','09','0973','097344'),(1141,'098301000','ALICIA','09','0983','098301'),(1142,'098302000','BUUG','09','0983','098302'),(1143,'098303000','DIPLAHAN','09','0983','098303'),(1144,'098304000','IMELDA','09','0983','098304'),(1145,'098305000','IPIL (Capital)','09','0983','098305'),(1146,'098306000','KABASALAN','09','0983','098306'),(1147,'098307000','MABUHAY','09','0983','098307'),(1148,'098308000','MALANGAS','09','0983','098308'),(1149,'098309000','NAGA','09','0983','098309'),(1150,'098310000','OLUTANGA','09','0983','098310'),(1151,'098311000','PAYAO','09','0983','098311'),(1152,'098312000','ROSELLER LIM','09','0983','098312'),(1153,'098313000','SIAY','09','0983','098313'),(1154,'098314000','TALUSAN','09','0983','098314'),(1155,'098315000','TITAY','09','0983','098315'),(1156,'098316000','TUNGAWAN','09','0983','098316'),(1157,'099701000','CITY OF ISABELA','09','0997','099701'),(1158,'101301000','BAUNGON','10','1013','101301'),(1159,'101302000','DAMULOG','10','1013','101302'),(1160,'101303000','DANGCAGAN','10','1013','101303'),(1161,'101304000','DON CARLOS','10','1013','101304'),(1162,'101305000','IMPASUG-ONG','10','1013','101305'),(1163,'101306000','KADINGILAN','10','1013','101306'),(1164,'101307000','KALILANGAN','10','1013','101307'),(1165,'101308000','KIBAWE','10','1013','101308'),(1166,'101309000','KITAOTAO','10','1013','101309'),(1167,'101310000','LANTAPAN','10','1013','101310'),(1168,'101311000','LIBONA','10','1013','101311'),(1169,'101312000','CITY OF MALAYBALAY (Capital)','10','1013','101312'),(1170,'101313000','MALITBOG','10','1013','101313'),(1171,'101314000','MANOLO FORTICH','10','1013','101314'),(1172,'101315000','MARAMAG','10','1013','101315'),(1173,'101316000','PANGANTUCAN','10','1013','101316'),(1174,'101317000','QUEZON','10','1013','101317'),(1175,'101318000','SAN FERNANDO','10','1013','101318'),(1176,'101319000','SUMILAO','10','1013','101319'),(1177,'101320000','TALAKAG','10','1013','101320'),(1178,'101321000','CITY OF VALENCIA','10','1013','101321'),(1179,'101322000','CABANGLASAN','10','1013','101322'),(1180,'101801000','CATARMAN','10','1018','101801'),(1181,'101802000','GUINSILIBAN','10','1018','101802'),(1182,'101803000','MAHINOG','10','1018','101803'),(1183,'101804000','MAMBAJAO (Capital)','10','1018','101804'),(1184,'101805000','SAGAY','10','1018','101805'),(1185,'103501000','BACOLOD','10','1035','103501'),(1186,'103502000','BALOI','10','1035','103502'),(1187,'103503000','BAROY','10','1035','103503'),(1188,'103504000','ILIGAN CITY','10','1035','103504'),(1189,'103505000','KAPATAGAN','10','1035','103505'),(1190,'103506000','SULTAN NAGA DIMAPORO (KAROMATAN)','10','1035','103506'),(1191,'103507000','KAUSWAGAN','10','1035','103507'),(1192,'103508000','KOLAMBUGAN','10','1035','103508'),(1193,'103509000','LALA','10','1035','103509'),(1194,'103510000','LINAMON','10','1035','103510'),(1195,'103511000','MAGSAYSAY','10','1035','103511'),(1196,'103512000','MAIGO','10','1035','103512'),(1197,'103513000','MATUNGAO','10','1035','103513'),(1198,'103514000','MUNAI','10','1035','103514'),(1199,'103515000','NUNUNGAN','10','1035','103515'),(1200,'103516000','PANTAO RAGAT','10','1035','103516'),(1201,'103517000','POONA PIAGAPO','10','1035','103517'),(1202,'103518000','SALVADOR','10','1035','103518'),(1203,'103519000','SAPAD','10','1035','103519'),(1204,'103520000','TAGOLOAN','10','1035','103520'),(1205,'103521000','TANGCAL','10','1035','103521'),(1206,'103522000','TUBOD (Capital)','10','1035','103522'),(1207,'103523000','PANTAR','10','1035','103523'),(1208,'104201000','ALORAN','10','1042','104201'),(1209,'104202000','BALIANGAO','10','1042','104202'),(1210,'104203000','BONIFACIO','10','1042','104203'),(1211,'104204000','CALAMBA','10','1042','104204'),(1212,'104205000','CLARIN','10','1042','104205'),(1213,'104206000','CONCEPCION','10','1042','104206'),(1214,'104207000','JIMENEZ','10','1042','104207'),(1215,'104208000','LOPEZ JAENA','10','1042','104208'),(1216,'104209000','OROQUIETA CITY (Capital)','10','1042','104209'),(1217,'104210000','OZAMIS CITY','10','1042','104210'),(1218,'104211000','PANAON','10','1042','104211'),(1219,'104212000','PLARIDEL','10','1042','104212'),(1220,'104213000','SAPANG DALAGA','10','1042','104213'),(1221,'104214000','SINACABAN','10','1042','104214'),(1222,'104215000','TANGUB CITY','10','1042','104215'),(1223,'104216000','TUDELA','10','1042','104216'),(1224,'104217000','DON VICTORIANO CHIONGBIAN  (DON MARIANO MARCOS)','10','1042','104217'),(1225,'104301000','ALUBIJID','10','1043','104301'),(1226,'104302000','BALINGASAG','10','1043','104302'),(1227,'104303000','BALINGOAN','10','1043','104303'),(1228,'104304000','BINUANGAN','10','1043','104304'),(1229,'104305000','CAGAYAN DE ORO CITY (Capital)','10','1043','104305'),(1230,'104306000','CLAVERIA','10','1043','104306'),(1231,'104307000','CITY OF EL SALVADOR','10','1043','104307'),(1232,'104308000','GINGOOG CITY','10','1043','104308'),(1233,'104309000','GITAGUM','10','1043','104309'),(1234,'104310000','INITAO','10','1043','104310'),(1235,'104311000','JASAAN','10','1043','104311'),(1236,'104312000','KINOGUITAN','10','1043','104312'),(1237,'104313000','LAGONGLONG','10','1043','104313'),(1238,'104314000','LAGUINDINGAN','10','1043','104314'),(1239,'104315000','LIBERTAD','10','1043','104315'),(1240,'104316000','LUGAIT','10','1043','104316'),(1241,'104317000','MAGSAYSAY (LINUGOS)','10','1043','104317'),(1242,'104318000','MANTICAO','10','1043','104318'),(1243,'104319000','MEDINA','10','1043','104319'),(1244,'104320000','NAAWAN','10','1043','104320'),(1245,'104321000','OPOL','10','1043','104321'),(1246,'104322000','SALAY','10','1043','104322'),(1247,'104323000','SUGBONGCOGON','10','1043','104323'),(1248,'104324000','TAGOLOAN','10','1043','104324'),(1249,'104325000','TALISAYAN','10','1043','104325'),(1250,'104326000','VILLANUEVA','10','1043','104326'),(1251,'112301000','ASUNCION (SAUG)','11','1123','112301'),(1252,'112303000','CARMEN','11','1123','112303'),(1253,'112305000','KAPALONG','11','1123','112305'),(1254,'112314000','NEW CORELLA','11','1123','112314'),(1255,'112315000','CITY OF PANABO','11','1123','112315'),(1256,'112317000','ISLAND GARDEN CITY OF SAMAL','11','1123','112317'),(1257,'112318000','SANTO TOMAS','11','1123','112318'),(1258,'112319000','CITY OF TAGUM (Capital)','11','1123','112319'),(1259,'112322000','TALAINGOD','11','1123','112322'),(1260,'112323000','BRAULIO E. DUJALI','11','1123','112323'),(1261,'112324000','SAN ISIDRO','11','1123','112324'),(1262,'112401000','BANSALAN','11','1124','112401'),(1263,'112402000','DAVAO CITY','11','1124','112402'),(1264,'112403000','CITY OF DIGOS (Capital)','11','1124','112403'),(1265,'112404000','HAGONOY','11','1124','112404'),(1266,'112406000','KIBLAWAN','11','1124','112406'),(1267,'112407000','MAGSAYSAY','11','1124','112407'),(1268,'112408000','MALALAG','11','1124','112408'),(1269,'112410000','MATANAO','11','1124','112410'),(1270,'112411000','PADADA','11','1124','112411'),(1271,'112412000','SANTA CRUZ','11','1124','112412'),(1272,'112414000','SULOP','11','1124','112414'),(1273,'112501000','BAGANGA','11','1125','112501'),(1274,'112502000','BANAYBANAY','11','1125','112502'),(1275,'112503000','BOSTON','11','1125','112503'),(1276,'112504000','CARAGA','11','1125','112504'),(1277,'112505000','CATEEL','11','1125','112505'),(1278,'112506000','GOVERNOR GENEROSO','11','1125','112506'),(1279,'112507000','LUPON','11','1125','112507'),(1280,'112508000','MANAY','11','1125','112508'),(1281,'112509000','CITY OF MATI (Capital)','11','1125','112509'),(1282,'112510000','SAN ISIDRO','11','1125','112510'),(1283,'112511000','TARRAGONA','11','1125','112511'),(1284,'118201000','COMPOSTELA','11','1182','118201'),(1285,'118202000','LAAK (SAN VICENTE)','11','1182','118202'),(1286,'118203000','MABINI (DOÑA ALICIA)','11','1182','118203'),(1287,'118204000','MACO','11','1182','118204'),(1288,'118205000','MARAGUSAN (SAN MARIANO)','11','1182','118205'),(1289,'118206000','MAWAB','11','1182','118206'),(1290,'118207000','MONKAYO','11','1182','118207'),(1291,'118208000','MONTEVISTA','11','1182','118208'),(1292,'118209000','NABUNTURAN (Capital)','11','1182','118209'),(1293,'118210000','NEW BATAAN','11','1182','118210'),(1294,'118211000','PANTUKAN','11','1182','118211'),(1295,'118601000','DON MARCELINO','11','1186','118601'),(1296,'118602000','JOSE ABAD SANTOS (TRINIDAD)','11','1186','118602'),(1297,'118603000','MALITA','11','1186','118603'),(1298,'118604000','SANTA MARIA','11','1186','118604'),(1299,'118605000','SARANGANI','11','1186','118605'),(1300,'124701000','ALAMADA','12','1247','124701'),(1301,'124702000','CARMEN','12','1247','124702'),(1302,'124703000','KABACAN','12','1247','124703'),(1303,'124704000','CITY OF KIDAPAWAN (Capital)','12','1247','124704'),(1304,'124705000','LIBUNGAN','12','1247','124705'),(1305,'124706000','MAGPET','12','1247','124706'),(1306,'124707000','MAKILALA','12','1247','124707'),(1307,'124708000','MATALAM','12','1247','124708'),(1308,'124709000','MIDSAYAP','12','1247','124709'),(1309,'124710000','M\'LANG','12','1247','124710'),(1310,'124711000','PIGKAWAYAN','12','1247','124711'),(1311,'124712000','PIKIT','12','1247','124712'),(1312,'124713000','PRESIDENT ROXAS','12','1247','124713'),(1313,'124714000','TULUNAN','12','1247','124714'),(1314,'124715000','ANTIPAS','12','1247','124715'),(1315,'124716000','BANISILAN','12','1247','124716'),(1316,'124717000','ALEOSAN','12','1247','124717'),(1317,'124718000','ARAKAN','12','1247','124718'),(1318,'126302000','BANGA','12','1263','126302'),(1319,'126303000','GENERAL SANTOS CITY (DADIANGAS)','12','1263','126303'),(1320,'126306000','CITY OF KORONADAL (Capital)','12','1263','126306'),(1321,'126311000','NORALA','12','1263','126311'),(1322,'126312000','POLOMOLOK','12','1263','126312'),(1323,'126313000','SURALLAH','12','1263','126313'),(1324,'126314000','TAMPAKAN','12','1263','126314'),(1325,'126315000','TANTANGAN','12','1263','126315'),(1326,'126316000','T\'BOLI','12','1263','126316'),(1327,'126317000','TUPI','12','1263','126317'),(1328,'126318000','SANTO NIÑO','12','1263','126318'),(1329,'126319000','LAKE SEBU','12','1263','126319'),(1330,'126501000','BAGUMBAYAN','12','1265','126501'),(1331,'126502000','COLUMBIO','12','1265','126502'),(1332,'126503000','ESPERANZA','12','1265','126503'),(1333,'126504000','ISULAN (Capital)','12','1265','126504'),(1334,'126505000','KALAMANSIG','12','1265','126505'),(1335,'126506000','LEBAK','12','1265','126506'),(1336,'126507000','LUTAYAN','12','1265','126507'),(1337,'126508000','LAMBAYONG (MARIANO MARCOS)','12','1265','126508'),(1338,'126509000','PALIMBANG','12','1265','126509'),(1339,'126510000','PRESIDENT QUIRINO','12','1265','126510'),(1340,'126511000','CITY OF TACURONG','12','1265','126511'),(1341,'126512000','SEN. NINOY AQUINO','12','1265','126512'),(1342,'128001000','ALABEL (Capital)','12','1280','128001'),(1343,'128002000','GLAN','12','1280','128002'),(1344,'128003000','KIAMBA','12','1280','128003'),(1345,'128004000','MAASIM','12','1280','128004'),(1346,'128005000','MAITUM','12','1280','128005'),(1347,'128006000','MALAPATAN','12','1280','128006'),(1348,'128007000','MALUNGON','12','1280','128007'),(1349,'129804000','COTABATO CITY','12','1298','129804'),(1350,'133901000','TONDO I / II','13','1339','133901'),(1351,'133902000','BINONDO','13','1339','133902'),(1352,'133903000','QUIAPO','13','1339','133903'),(1353,'133904000','SAN NICOLAS','13','1339','133904'),(1354,'133905000','SANTA CRUZ','13','1339','133905'),(1355,'133906000','SAMPALOC','13','1339','133906'),(1356,'133907000','SAN MIGUEL','13','1339','133907'),(1357,'133908000','ERMITA','13','1339','133908'),(1358,'133909000','INTRAMUROS','13','1339','133909'),(1359,'133910000','MALATE','13','1339','133910'),(1360,'133911000','PACO','13','1339','133911'),(1361,'133912000','PANDACAN','13','1339','133912'),(1362,'133913000','PORT AREA','13','1339','133913'),(1363,'133914000','SANTA ANA','13','1339','133914'),(1364,'137401000','CITY OF MANDALUYONG','13','1374','137401'),(1365,'137402000','CITY OF MARIKINA','13','1374','137402'),(1366,'137403000','CITY OF PASIG','13','1374','137403'),(1367,'137404000','QUEZON CITY','13','1374','137404'),(1368,'137405000','CITY OF SAN JUAN','13','1374','137405'),(1369,'137501000','CALOOCAN CITY','13','1375','137501'),(1370,'137502000','CITY OF MALABON','13','1375','137502'),(1371,'137503000','CITY OF NAVOTAS','13','1375','137503'),(1372,'137504000','CITY OF VALENZUELA','13','1375','137504'),(1373,'137601000','CITY OF LAS PIÑAS','13','1376','137601'),(1374,'137602000','CITY OF MAKATI','13','1376','137602'),(1375,'137603000','CITY OF MUNTINLUPA','13','1376','137603'),(1376,'137604000','CITY OF PARAÑAQUE','13','1376','137604'),(1377,'137605000','PASAY CITY','13','1376','137605'),(1378,'137606000','PATEROS','13','1376','137606'),(1379,'137607000','TAGUIG CITY','13','1376','137607'),(1380,'140101000','BANGUED (Capital)','14','1401','140101'),(1381,'140102000','BOLINEY','14','1401','140102'),(1382,'140103000','BUCAY','14','1401','140103'),(1383,'140104000','BUCLOC','14','1401','140104'),(1384,'140105000','DAGUIOMAN','14','1401','140105'),(1385,'140106000','DANGLAS','14','1401','140106'),(1386,'140107000','DOLORES','14','1401','140107'),(1387,'140108000','LA PAZ','14','1401','140108'),(1388,'140109000','LACUB','14','1401','140109'),(1389,'140110000','LAGANGILANG','14','1401','140110'),(1390,'140111000','LAGAYAN','14','1401','140111'),(1391,'140112000','LANGIDEN','14','1401','140112'),(1392,'140113000','LICUAN-BAAY (LICUAN)','14','1401','140113'),(1393,'140114000','LUBA','14','1401','140114'),(1394,'140115000','MALIBCONG','14','1401','140115'),(1395,'140116000','MANABO','14','1401','140116'),(1396,'140117000','PEÑARRUBIA','14','1401','140117'),(1397,'140118000','PIDIGAN','14','1401','140118'),(1398,'140119000','PILAR','14','1401','140119'),(1399,'140120000','SALLAPADAN','14','1401','140120'),(1400,'140121000','SAN ISIDRO','14','1401','140121'),(1401,'140122000','SAN JUAN','14','1401','140122'),(1402,'140123000','SAN QUINTIN','14','1401','140123'),(1403,'140124000','TAYUM','14','1401','140124'),(1404,'140125000','TINEG','14','1401','140125'),(1405,'140126000','TUBO','14','1401','140126'),(1406,'140127000','VILLAVICIOSA','14','1401','140127'),(1407,'141101000','ATOK','14','1411','141101'),(1408,'141102000','BAGUIO CITY','14','1411','141102'),(1409,'141103000','BAKUN','14','1411','141103'),(1410,'141104000','BOKOD','14','1411','141104'),(1411,'141105000','BUGUIAS','14','1411','141105'),(1412,'141106000','ITOGON','14','1411','141106'),(1413,'141107000','KABAYAN','14','1411','141107'),(1414,'141108000','KAPANGAN','14','1411','141108'),(1415,'141109000','KIBUNGAN','14','1411','141109'),(1416,'141110000','LA TRINIDAD (Capital)','14','1411','141110'),(1417,'141111000','MANKAYAN','14','1411','141111'),(1418,'141112000','SABLAN','14','1411','141112'),(1419,'141113000','TUBA','14','1411','141113'),(1420,'141114000','TUBLAY','14','1411','141114'),(1421,'142701000','BANAUE','14','1427','142701'),(1422,'142702000','HUNGDUAN','14','1427','142702'),(1423,'142703000','KIANGAN','14','1427','142703'),(1424,'142704000','LAGAWE (Capital)','14','1427','142704'),(1425,'142705000','LAMUT','14','1427','142705'),(1426,'142706000','MAYOYAO','14','1427','142706'),(1427,'142707000','ALFONSO LISTA (POTIA)','14','1427','142707'),(1428,'142708000','AGUINALDO','14','1427','142708'),(1429,'142709000','HINGYON','14','1427','142709'),(1430,'142710000','TINOC','14','1427','142710'),(1431,'142711000','ASIPULO','14','1427','142711'),(1432,'143201000','BALBALAN','14','1432','143201'),(1433,'143206000','LUBUAGAN','14','1432','143206'),(1434,'143208000','PASIL','14','1432','143208'),(1435,'143209000','PINUKPUK','14','1432','143209'),(1436,'143211000','RIZAL (LIWAN)','14','1432','143211'),(1437,'143213000','CITY OF TABUK (Capital)','14','1432','143213'),(1438,'143214000','TANUDAN','14','1432','143214'),(1439,'143215000','TINGLAYAN','14','1432','143215'),(1440,'144401000','BARLIG','14','1444','144401'),(1441,'144402000','BAUKO','14','1444','144402'),(1442,'144403000','BESAO','14','1444','144403'),(1443,'144404000','BONTOC (Capital)','14','1444','144404'),(1444,'144405000','NATONIN','14','1444','144405'),(1445,'144406000','PARACELIS','14','1444','144406'),(1446,'144407000','SABANGAN','14','1444','144407'),(1447,'144408000','SADANGA','14','1444','144408'),(1448,'144409000','SAGADA','14','1444','144409'),(1449,'144410000','TADIAN','14','1444','144410'),(1450,'148101000','CALANASAN (BAYAG)','14','1481','148101'),(1451,'148102000','CONNER','14','1481','148102'),(1452,'148103000','FLORA','14','1481','148103'),(1453,'148104000','KABUGAO (Capital)','14','1481','148104'),(1454,'148105000','LUNA','14','1481','148105'),(1455,'148106000','PUDTOL','14','1481','148106'),(1456,'148107000','SANTA MARCELA','14','1481','148107'),(1457,'150702000','CITY OF LAMITAN','15','1507','150702'),(1458,'150703000','LANTAWAN','15','1507','150703'),(1459,'150704000','MALUSO','15','1507','150704'),(1460,'150705000','SUMISIP','15','1507','150705'),(1461,'150706000','TIPO-TIPO','15','1507','150706'),(1462,'150707000','TUBURAN','15','1507','150707'),(1463,'150708000','AKBAR','15','1507','150708'),(1464,'150709000','AL-BARKA','15','1507','150709'),(1465,'150710000','HADJI MOHAMMAD AJUL','15','1507','150710'),(1466,'150711000','UNGKAYA PUKAN','15','1507','150711'),(1467,'150712000','HADJI MUHTAMAD','15','1507','150712'),(1468,'150713000','TABUAN-LASA','15','1507','150713'),(1469,'153601000','BACOLOD-KALAWI (BACOLOD GRANDE)','15','1536','153601'),(1470,'153602000','BALABAGAN','15','1536','153602'),(1471,'153603000','BALINDONG (WATU)','15','1536','153603'),(1472,'153604000','BAYANG','15','1536','153604'),(1473,'153605000','BINIDAYAN','15','1536','153605'),(1474,'153606000','BUBONG','15','1536','153606'),(1475,'153607000','BUTIG','15','1536','153607'),(1476,'153609000','GANASSI','15','1536','153609'),(1477,'153610000','KAPAI','15','1536','153610'),(1478,'153611000','LUMBA-BAYABAO (MAGUING)','15','1536','153611'),(1479,'153612000','LUMBATAN','15','1536','153612'),(1480,'153613000','MADALUM','15','1536','153613'),(1481,'153614000','MADAMBA','15','1536','153614'),(1482,'153615000','MALABANG','15','1536','153615'),(1483,'153616000','MARANTAO','15','1536','153616'),(1484,'153617000','MARAWI CITY (Capital)','15','1536','153617'),(1485,'153618000','MASIU','15','1536','153618'),(1486,'153619000','MULONDO','15','1536','153619'),(1487,'153620000','PAGAYAWAN (TATARIKAN)','15','1536','153620'),(1488,'153621000','PIAGAPO','15','1536','153621'),(1489,'153622000','POONA BAYABAO (GATA)','15','1536','153622'),(1490,'153623000','PUALAS','15','1536','153623'),(1491,'153624000','DITSAAN-RAMAIN','15','1536','153624'),(1492,'153625000','SAGUIARAN','15','1536','153625'),(1493,'153626000','TAMPARAN','15','1536','153626'),(1494,'153627000','TARAKA','15','1536','153627'),(1495,'153628000','TUBARAN','15','1536','153628'),(1496,'153629000','TUGAYA','15','1536','153629'),(1497,'153630000','WAO','15','1536','153630'),(1498,'153631000','MAROGONG','15','1536','153631'),(1499,'153632000','CALANOGAS','15','1536','153632'),(1500,'153633000','BUADIPOSO-BUNTONG','15','1536','153633'),(1501,'153634000','MAGUING','15','1536','153634'),(1502,'153635000','PICONG (SULTAN GUMANDER)','15','1536','153635'),(1503,'153636000','LUMBAYANAGUE','15','1536','153636'),(1504,'153637000','BUMBARAN','15','1536','153637'),(1505,'153638000','TAGOLOAN II','15','1536','153638'),(1506,'153639000','KAPATAGAN','15','1536','153639'),(1507,'153640000','SULTAN DUMALONDONG','15','1536','153640'),(1508,'153641000','LUMBACA-UNAYAN','15','1536','153641'),(1509,'153801000','AMPATUAN','15','1538','153801'),(1510,'153802000','BULDON','15','1538','153802'),(1511,'153803000','BULUAN','15','1538','153803'),(1512,'153805000','DATU PAGLAS','15','1538','153805'),(1513,'153806000','DATU PIANG','15','1538','153806'),(1514,'153807000','DATU ODIN SINSUAT (DINAIG)','15','1538','153807'),(1515,'153808000','SHARIFF AGUAK (MAGANOY) (Capital)','15','1538','153808'),(1516,'153809000','MATANOG','15','1538','153809'),(1517,'153810000','PAGALUNGAN','15','1538','153810'),(1518,'153811000','PARANG','15','1538','153811'),(1519,'153812000','SULTAN KUDARAT (NULING)','15','1538','153812'),(1520,'153813000','SULTAN SA BARONGIS (LAMBAYONG)','15','1538','153813'),(1521,'153814000','KABUNTALAN (TUMBAO)','15','1538','153814'),(1522,'153815000','UPI','15','1538','153815'),(1523,'153816000','TALAYAN','15','1538','153816'),(1524,'153817000','SOUTH UPI','15','1538','153817'),(1525,'153818000','BARIRA','15','1538','153818'),(1526,'153819000','GEN. S. K. PENDATUN','15','1538','153819'),(1527,'153820000','MAMASAPANO','15','1538','153820'),(1528,'153821000','TALITAY','15','1538','153821'),(1529,'153822000','PAGAGAWAN','15','1538','153822'),(1530,'153823000','PAGLAT','15','1538','153823'),(1531,'153824000','SULTAN MASTURA','15','1538','153824'),(1532,'153825000','GUINDULUNGAN','15','1538','153825'),(1533,'153826000','DATU SAUDI-AMPATUAN','15','1538','153826'),(1534,'153827000','DATU UNSAY','15','1538','153827'),(1535,'153828000','DATU ABDULLAH SANGKI','15','1538','153828'),(1536,'153829000','RAJAH BUAYAN','15','1538','153829'),(1537,'153830000','DATU BLAH T. SINSUAT','15','1538','153830'),(1538,'153831000','DATU ANGGAL MIDTIMBANG','15','1538','153831'),(1539,'153832000','MANGUDADATU','15','1538','153832'),(1540,'153833000','PANDAG','15','1538','153833'),(1541,'153834000','NORTHERN KABUNTALAN','15','1538','153834'),(1542,'153835000','DATU HOFFER AMPATUAN','15','1538','153835'),(1543,'153836000','DATU SALIBO','15','1538','153836'),(1544,'153837000','SHARIFF SAYDONA MUSTAPHA','15','1538','153837'),(1545,'156601000','INDANAN','15','1566','156601'),(1546,'156602000','JOLO (Capital)','15','1566','156602'),(1547,'156603000','KALINGALAN CALUANG','15','1566','156603'),(1548,'156604000','LUUK','15','1566','156604'),(1549,'156605000','MAIMBUNG','15','1566','156605'),(1550,'156606000','HADJI PANGLIMA TAHIL (MARUNGGAS)','15','1566','156606'),(1551,'156607000','OLD PANAMAO','15','1566','156607'),(1552,'156608000','PANGUTARAN','15','1566','156608'),(1553,'156609000','PARANG','15','1566','156609'),(1554,'156610000','PATA','15','1566','156610'),(1555,'156611000','PATIKUL','15','1566','156611'),(1556,'156612000','SIASI','15','1566','156612'),(1557,'156613000','TALIPAO','15','1566','156613'),(1558,'156614000','TAPUL','15','1566','156614'),(1559,'156615000','TONGKIL','15','1566','156615'),(1560,'156616000','PANGLIMA ESTINO (NEW PANAMAO)','15','1566','156616'),(1561,'156617000','LUGUS','15','1566','156617'),(1562,'156618000','PANDAMI','15','1566','156618'),(1563,'156619000','OMAR','15','1566','156619'),(1564,'157001000','PANGLIMA SUGALA (BALIMBING)','15','1570','157001'),(1565,'157002000','BONGAO (Capital)','15','1570','157002'),(1566,'157003000','MAPUN (CAGAYAN DE TAWI-TAWI)','15','1570','157003'),(1567,'157004000','SIMUNUL','15','1570','157004'),(1568,'157005000','SITANGKAI','15','1570','157005'),(1569,'157006000','SOUTH UBIAN','15','1570','157006'),(1570,'157007000','TANDUBAS','15','1570','157007'),(1571,'157008000','TURTLE ISLANDS','15','1570','157008'),(1572,'157009000','LANGUYAN','15','1570','157009'),(1573,'157010000','SAPA-SAPA','15','1570','157010'),(1574,'157011000','SIBUTU','15','1570','157011'),(1575,'160201000','BUENAVISTA','16','1602','160201'),(1576,'160202000','BUTUAN CITY (Capital)','16','1602','160202'),(1577,'160203000','CITY OF CABADBARAN','16','1602','160203'),(1578,'160204000','CARMEN','16','1602','160204'),(1579,'160205000','JABONGA','16','1602','160205'),(1580,'160206000','KITCHARAO','16','1602','160206'),(1581,'160207000','LAS NIEVES','16','1602','160207'),(1582,'160208000','MAGALLANES','16','1602','160208'),(1583,'160209000','NASIPIT','16','1602','160209'),(1584,'160210000','SANTIAGO','16','1602','160210'),(1585,'160211000','TUBAY','16','1602','160211'),(1586,'160212000','REMEDIOS T. ROMUALDEZ','16','1602','160212'),(1587,'160301000','CITY OF BAYUGAN','16','1603','160301'),(1588,'160302000','BUNAWAN','16','1603','160302'),(1589,'160303000','ESPERANZA','16','1603','160303'),(1590,'160304000','LA PAZ','16','1603','160304'),(1591,'160305000','LORETO','16','1603','160305'),(1592,'160306000','PROSPERIDAD (Capital)','16','1603','160306'),(1593,'160307000','ROSARIO','16','1603','160307'),(1594,'160308000','SAN FRANCISCO','16','1603','160308'),(1595,'160309000','SAN LUIS','16','1603','160309'),(1596,'160310000','SANTA JOSEFA','16','1603','160310'),(1597,'160311000','TALACOGON','16','1603','160311'),(1598,'160312000','TRENTO','16','1603','160312'),(1599,'160313000','VERUELA','16','1603','160313'),(1600,'160314000','SIBAGAT','16','1603','160314'),(1601,'166701000','ALEGRIA','16','1667','166701'),(1602,'166702000','BACUAG','16','1667','166702'),(1603,'166704000','BURGOS','16','1667','166704'),(1604,'166706000','CLAVER','16','1667','166706'),(1605,'166707000','DAPA','16','1667','166707'),(1606,'166708000','DEL CARMEN','16','1667','166708'),(1607,'166710000','GENERAL LUNA','16','1667','166710'),(1608,'166711000','GIGAQUIT','16','1667','166711'),(1609,'166714000','MAINIT','16','1667','166714'),(1610,'166715000','MALIMONO','16','1667','166715'),(1611,'166716000','PILAR','16','1667','166716'),(1612,'166717000','PLACER','16','1667','166717'),(1613,'166718000','SAN BENITO','16','1667','166718'),(1614,'166719000','SAN FRANCISCO (ANAO-AON)','16','1667','166719'),(1615,'166720000','SAN ISIDRO','16','1667','166720'),(1616,'166721000','SANTA MONICA (SAPAO)','16','1667','166721'),(1617,'166722000','SISON','16','1667','166722'),(1618,'166723000','SOCORRO','16','1667','166723'),(1619,'166724000','SURIGAO CITY (Capital)','16','1667','166724'),(1620,'166725000','TAGANA-AN','16','1667','166725'),(1621,'166727000','TUBOD','16','1667','166727'),(1622,'166801000','BAROBO','16','1668','166801'),(1623,'166802000','BAYABAS','16','1668','166802'),(1624,'166803000','CITY OF BISLIG','16','1668','166803'),(1625,'166804000','CAGWAIT','16','1668','166804'),(1626,'166805000','CANTILAN','16','1668','166805'),(1627,'166806000','CARMEN','16','1668','166806'),(1628,'166807000','CARRASCAL','16','1668','166807'),(1629,'166808000','CORTES','16','1668','166808'),(1630,'166809000','HINATUAN','16','1668','166809'),(1631,'166810000','LANUZA','16','1668','166810'),(1632,'166811000','LIANGA','16','1668','166811'),(1633,'166812000','LINGIG','16','1668','166812'),(1634,'166813000','MADRID','16','1668','166813'),(1635,'166814000','MARIHATAG','16','1668','166814'),(1636,'166815000','SAN AGUSTIN','16','1668','166815'),(1637,'166816000','SAN MIGUEL','16','1668','166816'),(1638,'166817000','TAGBINA','16','1668','166817'),(1639,'166818000','TAGO','16','1668','166818'),(1640,'166819000','CITY OF TANDAG (Capital)','16','1668','166819'),(1641,'168501000','BASILISA (RIZAL)','16','1685','168501'),(1642,'168502000','CAGDIANAO','16','1685','168502'),(1643,'168503000','DINAGAT','16','1685','168503'),(1644,'168504000','LIBJO (ALBOR)','16','1685','168504'),(1645,'168505000','LORETO','16','1685','168505'),(1646,'168506000','SAN JOSE (Capital)','16','1685','168506'),(1647,'168507000','TUBAJON','16','1685','168507');
/*!40000 ALTER TABLE `refcitymun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refprovince`
--

DROP TABLE IF EXISTS `refprovince`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refprovince` (
  `id` int NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `provDesc` text,
  `regCode` varchar(255) DEFAULT NULL,
  `provCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refprovince`
--

LOCK TABLES `refprovince` WRITE;
/*!40000 ALTER TABLE `refprovince` DISABLE KEYS */;
INSERT INTO `refprovince` VALUES (1,'012800000','ILOCOS NORTE','01','0128'),(2,'012900000','ILOCOS SUR','01','0129'),(3,'013300000','LA UNION','01','0133'),(4,'015500000','PANGASINAN','01','0155'),(5,'020900000','BATANES','02','0209'),(6,'021500000','CAGAYAN','02','0215'),(7,'023100000','ISABELA','02','0231'),(8,'025000000','NUEVA VIZCAYA','02','0250'),(9,'025700000','QUIRINO','02','0257'),(10,'030800000','BATAAN','03','0308'),(11,'031400000','BULACAN','03','0314'),(12,'034900000','NUEVA ECIJA','03','0349'),(13,'035400000','PAMPANGA','03','0354'),(14,'036900000','TARLAC','03','0369'),(15,'037100000','ZAMBALES','03','0371'),(16,'037700000','AURORA','03','0377'),(17,'041000000','BATANGAS','04','0410'),(18,'042100000','CAVITE','04','0421'),(19,'043400000','LAGUNA','04','0434'),(20,'045600000','QUEZON','04','0456'),(21,'045800000','RIZAL','04','0458'),(22,'174000000','MARINDUQUE','17','1740'),(23,'175100000','OCCIDENTAL MINDORO','17','1751'),(24,'175200000','ORIENTAL MINDORO','17','1752'),(25,'175300000','PALAWAN','17','1753'),(26,'175900000','ROMBLON','17','1759'),(27,'050500000','ALBAY','05','0505'),(28,'051600000','CAMARINES NORTE','05','0516'),(29,'051700000','CAMARINES SUR','05','0517'),(30,'052000000','CATANDUANES','05','0520'),(31,'054100000','MASBATE','05','0541'),(32,'056200000','SORSOGON','05','0562'),(33,'060400000','AKLAN','06','0604'),(34,'060600000','ANTIQUE','06','0606'),(35,'061900000','CAPIZ','06','0619'),(36,'063000000','ILOILO','06','0630'),(37,'064500000','NEGROS OCCIDENTAL','06','0645'),(38,'067900000','GUIMARAS','06','0679'),(39,'071200000','BOHOL','07','0712'),(40,'072200000','CEBU','07','0722'),(41,'074600000','NEGROS ORIENTAL','07','0746'),(42,'076100000','SIQUIJOR','07','0761'),(43,'082600000','EASTERN SAMAR','08','0826'),(44,'083700000','LEYTE','08','0837'),(45,'084800000','NORTHERN SAMAR','08','0848'),(46,'086000000','SAMAR (WESTERN SAMAR)','08','0860'),(47,'086400000','SOUTHERN LEYTE','08','0864'),(48,'087800000','BILIRAN','08','0878'),(49,'097200000','ZAMBOANGA DEL NORTE','09','0972'),(50,'097300000','ZAMBOANGA DEL SUR','09','0973'),(51,'098300000','ZAMBOANGA SIBUGAY','09','0983'),(52,'099700000','CITY OF ISABELA','09','0997'),(53,'101300000','BUKIDNON','10','1013'),(54,'101800000','CAMIGUIN','10','1018'),(55,'103500000','LANAO DEL NORTE','10','1035'),(56,'104200000','MISAMIS OCCIDENTAL','10','1042'),(57,'104300000','MISAMIS ORIENTAL','10','1043'),(58,'112300000','DAVAO DEL NORTE','11','1123'),(59,'112400000','DAVAO DEL SUR','11','1124'),(60,'112500000','DAVAO ORIENTAL','11','1125'),(61,'118200000','COMPOSTELA VALLEY','11','1182'),(62,'118600000','DAVAO OCCIDENTAL','11','1186'),(63,'124700000','COTABATO (NORTH COTABATO)','12','1247'),(64,'126300000','SOUTH COTABATO','12','1263'),(65,'126500000','SULTAN KUDARAT','12','1265'),(66,'128000000','SARANGANI','12','1280'),(67,'129800000','COTABATO CITY','12','1298'),(68,'133900000','1ST DISTRICT','13','1339'),(70,'137400000','2ND DISTRICT','13','1374'),(71,'137500000','3RD DISTRICT','13','1375'),(72,'137600000','4TH DISTRICT','13','1376'),(73,'140100000','ABRA','14','1401'),(74,'141100000','BENGUET','14','1411'),(75,'142700000','IFUGAO','14','1427'),(76,'143200000','KALINGA','14','1432'),(77,'144400000','MOUNTAIN PROVINCE','14','1444'),(78,'148100000','APAYAO','14','1481'),(79,'150700000','BASILAN','15','1507'),(80,'153600000','LANAO DEL SUR','15','1536'),(81,'153800000','MAGUINDANAO','15','1538'),(82,'156600000','SULU','15','1566'),(83,'157000000','TAWI-TAWI','15','1570'),(84,'160200000','AGUSAN DEL NORTE','16','1602'),(85,'160300000','AGUSAN DEL SUR','16','1603'),(86,'166700000','SURIGAO DEL NORTE','16','1667'),(87,'166800000','SURIGAO DEL SUR','16','1668'),(88,'168500000','DINAGAT ISLANDS','16','1685');
/*!40000 ALTER TABLE `refprovince` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refregion`
--

DROP TABLE IF EXISTS `refregion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `refregion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `psgcCode` varchar(255) DEFAULT NULL,
  `regDesc` text,
  `regCode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refregion`
--

LOCK TABLES `refregion` WRITE;
/*!40000 ALTER TABLE `refregion` DISABLE KEYS */;
INSERT INTO `refregion` VALUES (1,'010000000','REGION I (ILOCOS REGION)','01'),(2,'020000000','REGION II (CAGAYAN VALLEY)','02'),(3,'030000000','REGION III (CENTRAL LUZON)','03'),(4,'040000000','REGION IV-A (CALABARZON)','04'),(5,'170000000','REGION IV-B (MIMAROPA)','17'),(6,'050000000','REGION V (BICOL REGION)','05'),(7,'060000000','REGION VI (WESTERN VISAYAS)','06'),(8,'070000000','REGION VII (CENTRAL VISAYAS)','07'),(9,'080000000','REGION VIII (EASTERN VISAYAS)','08'),(10,'090000000','REGION IX (ZAMBOANGA PENINSULA)','09'),(11,'100000000','REGION X (NORTHERN MINDANAO)','10'),(12,'110000000','REGION XI (DAVAO REGION)','11'),(13,'120000000','REGION XII (SOCCSKSARGEN)','12'),(14,'130000000','NCR','13'),(15,'140000000','CORDILLERA ADMINISTRATIVE REGION (CAR)','14'),(16,'150000000','AUTONOMOUS REGION IN MUSLIM MINDANAO (ARMM)','15'),(17,'160000000','REGION XIII (Caraga)','16');
/*!40000 ALTER TABLE `refregion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requestgrade_switch`
--

DROP TABLE IF EXISTS `requestgrade_switch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requestgrade_switch` (
  `switch_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `gstatus` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`switch_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requestgrade_switch`
--

LOCK TABLES `requestgrade_switch` WRITE;
/*!40000 ALTER TABLE `requestgrade_switch` DISABLE KEYS */;
INSERT INTO `requestgrade_switch` VALUES (1,'OPEN');
/*!40000 ALTER TABLE `requestgrade_switch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requirements`
--

DROP TABLE IF EXISTS `requirements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requirements` (
  `req_ID` int NOT NULL AUTO_INCREMENT,
  `reqname` varchar(68) NOT NULL,
  `isActive` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`req_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requirements`
--

LOCK TABLES `requirements` WRITE;
/*!40000 ALTER TABLE `requirements` DISABLE KEYS */;
INSERT INTO `requirements` VALUES (1,'Form 137A','ACTIVE'),(2,'Form 138','ACTIVE'),(3,'PSA Birth Certificate','ACTIVE'),(8,'Transcript of Records','ACTIVE');
/*!40000 ALTER TABLE `requirements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`role_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Admin'),(2,'User');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `schedId` int NOT NULL AUTO_INCREMENT,
  `sched_snum` varchar(255) NOT NULL,
  `sched_subj` varchar(64) NOT NULL,
  `sched_day` varchar(64) NOT NULL,
  `sched_time` varchar(64) NOT NULL,
  `sched_prof` varchar(100) NOT NULL,
  PRIMARY KEY (`schedId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'19-14677','Data Management System','MTTH','1:00am-4:00pm','John Doe'),(4,'18-46799','Intro to Computing','WF','1:00pm-3:30pm',''),(5,'19-14677','Video Editting','FS','3:30pm-6:30pm','Christian Maasin'),(9,'20-14789','IT Elective 4','M','7:30am-10:30am','Prof. Noel Gagolinan'),(10,'20-14789','Information Assurance and Security 2','W/S','1:00pm-3:30pm','Prof. Roy Arsenal'),(11,'20-14789','The Contemporary World','Th','02:00pm-5:00pm','Ms. Abegail Fulong'),(12,'20-14789','System Administration and Integration','F','7:30am-10:30am','Prof. Noel Gagolinan'),(13,'20-14789','Capstone Project 2','S','9:00am-12:00pm','Prof. Harold Lucero');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schoolyr`
--

DROP TABLE IF EXISTS `schoolyr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schoolyr` (
  `schoolyr_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `schoolyr` varchar(9) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `isVisible` int DEFAULT '1',
  PRIMARY KEY (`schoolyr_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolyr`
--

LOCK TABLES `schoolyr` WRITE;
/*!40000 ALTER TABLE `schoolyr` DISABLE KEYS */;
INSERT INTO `schoolyr` VALUES (1,' ',0,0),(2,'2021-2022',1,1),(3,'2022-2023',0,1),(4,'2023-2024',0,1);
/*!40000 ALTER TABLE `schoolyr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semester` (
  `semester_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `semester` varchar(68) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `isVisible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`semester_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester`
--

LOCK TABLES `semester` WRITE;
/*!40000 ALTER TABLE `semester` DISABLE KEYS */;
INSERT INTO `semester` VALUES (1,' ',0,0),(2,'First Semester',0,1),(3,'Second Semester',1,1),(4,'Summer',0,1);
/*!40000 ALTER TABLE `semester` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sentvia`
--

DROP TABLE IF EXISTS `sentvia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sentvia` (
  `sentvia_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `sentvia` varchar(68) NOT NULL,
  `isActive` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`sentvia_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentvia`
--

LOCK TABLES `sentvia` WRITE;
/*!40000 ALTER TABLE `sentvia` DISABLE KEYS */;
INSERT INTO `sentvia` VALUES (1,'Metrobank Account','ACTIVE'),(2,'Banco de Oro Account','ACTIVE'),(3,'Gcash','ACTIVE');
/*!40000 ALTER TABLE `sentvia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(128) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `mname` varchar(128) NOT NULL,
  `snum` varchar(8) NOT NULL,
  `yrlevel` tinyint unsigned NOT NULL,
  `dept_ID` tinyint unsigned NOT NULL,
  `course` tinyint unsigned NOT NULL,
  `gender` varchar(6) NOT NULL,
  `cstatus` varchar(20) NOT NULL,
  `bday` date NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cityadd` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(128) NOT NULL,
  `brgy` varchar(128) NOT NULL,
  `guardian` varchar(128) NOT NULL,
  `guardiancontact` varchar(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `vkey` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `dor` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `isAccepted` tinyint unsigned NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (39,'Muñoz','Jason','Beltran','20-14789',2,3,6,'Male','','1996-07-05','Filipino','09613397412','jasonwafuu@gmail.com','25 Milton St. Filinvest 2','13','1374','137404','137404010','Atty. Julia C. Bacay-Abad','09178297413','jmunoz123','962a7b688815c5285c7d9b41bad3fd40ef0f6ae5','3aab95dad7d0cf512a57d40bfa98f2b22d1e6507','Verified','2022-10-29 19:31:16',1),(44,'Taruc','Aila Marie','Boncacas','19-13781',4,1,6,'Female','','2001-03-22','Filipino','09155494035','tarucailamarie22@gmail.com','24 Milton St. Filinvest 2','13','1374','137404','137404010','Maria Teresa Taruc','09888232838','ailataruc22','21c63abd2f76cb416c334efe11915a05d6167c15','30fc0b036a20f244b6474e21071bd5afe4b2a054','Verified','2022-10-20 23:52:38',0),(46,'Munoz','Allison','Taruc','20-11111',1,1,6,'Female','Single','2022-12-05','Filipino','09212121212','allison@gmail.com','24 Milton St. Filinvest 2','13','1374','137404','137404010','Jason B. Munoz','09613397412','allisonqtqt','9cb54a07e3e93becc14b4e06668d39360c5dd2c8','338adaa5816e30123c4b47fd77122787c6585a86','Verified','2022-10-31 23:20:03',1);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studreq`
--

DROP TABLE IF EXISTS `studreq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `studreq` (
  `sr_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `req_ID` int NOT NULL,
  `date_submitted` varchar(20) NOT NULL,
  `validated` tinyint unsigned NOT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `date_validated` datetime DEFAULT NULL,
  PRIMARY KEY (`sr_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studreq`
--

LOCK TABLES `studreq` WRITE;
/*!40000 ALTER TABLE `studreq` DISABLE KEYS */;
/*!40000 ALTER TABLE `studreq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldocureq`
--

DROP TABLE IF EXISTS `tbldocureq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldocureq` (
  `reqdoc_ID` int unsigned NOT NULL AUTO_INCREMENT,
  `sid` int NOT NULL,
  `placeofbirth` blob NOT NULL,
  `stud_status` varchar(50) NOT NULL,
  `yearGrad` varchar(50) NOT NULL,
  `lastSchool` varchar(255) NOT NULL,
  `cert` blob,
  `tor_purpose` varchar(100) DEFAULT '-',
  `diploma` varchar(255) DEFAULT '-',
  `auth` blob,
  `deliver_add` blob,
  `receiver_name` varchar(255) DEFAULT NULL,
  `contactnum` varchar(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Sent',
  PRIMARY KEY (`reqdoc_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldocureq`
--

LOCK TABLES `tbldocureq` WRITE;
/*!40000 ALTER TABLE `tbldocureq` DISABLE KEYS */;
INSERT INTO `tbldocureq` VALUES (5,39,_binary 'Quezon City','Graduate','2022-2023','Sti',_binary 'Completion/Graduation','Copy For University Of Pangasinan','1st Copy',_binary 'Transcript of Records',_binary '4waawdwawa2','Pdeto','23433242343','Sent');
/*!40000 ALTER TABLE `tbldocureq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `terms` (
  `terms_ID` tinyint unsigned NOT NULL,
  `term` varchar(68) NOT NULL,
  `isActive` varchar(8) NOT NULL DEFAULT 'ACTIVE',
  `isVisible` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`terms_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terms`
--

LOCK TABLES `terms` WRITE;
/*!40000 ALTER TABLE `terms` DISABLE KEYS */;
INSERT INTO `terms` VALUES (1,'','ACTIVE',0),(2,'Full Payment','ACTIVE',1),(3,'Downpayment','ACTIVE',1),(4,'Prelim','ACTIVE',1),(5,'Midterm','ACTIVE',1),(6,'Finals','ACTIVE',1);
/*!40000 ALTER TABLE `terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vwannouncements`
--

DROP TABLE IF EXISTS `vwannouncements`;
/*!50001 DROP VIEW IF EXISTS `vwannouncements`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwannouncements` AS SELECT 
 1 AS `a_id`,
 1 AS `a_eid`,
 1 AS `dept`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `dept_ID`,
 1 AS `a_day`,
 1 AS `a_month`,
 1 AS `a_office`,
 1 AS `a_title`,
 1 AS `a_desc`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwassessment`
--

DROP TABLE IF EXISTS `vwassessment`;
/*!50001 DROP VIEW IF EXISTS `vwassessment`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwassessment` AS SELECT 
 1 AS `assess_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `fullname`,
 1 AS `dept`,
 1 AS `course`,
 1 AS `schoolyr`,
 1 AS `semester`,
 1 AS `email`,
 1 AS `date_submitted`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwclearance`
--

DROP TABLE IF EXISTS `vwclearance`;
/*!50001 DROP VIEW IF EXISTS `vwclearance`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwclearance` AS SELECT 
 1 AS `clr_ID`,
 1 AS `sid`,
 1 AS `reqdoc_ID`,
 1 AS `snum`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `email`,
 1 AS `course`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwcourses`
--

DROP TABLE IF EXISTS `vwcourses`;
/*!50001 DROP VIEW IF EXISTS `vwcourses`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwcourses` AS SELECT 
 1 AS `course_ID`,
 1 AS `dept`,
 1 AS `abbr`,
 1 AS `course`,
 1 AS `isVisible`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwdocreq`
--

DROP TABLE IF EXISTS `vwdocreq`;
/*!50001 DROP VIEW IF EXISTS `vwdocreq`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwdocreq` AS SELECT 
 1 AS `docreq_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `fullname`,
 1 AS `course`,
 1 AS `email`,
 1 AS `bday`,
 1 AS `gender`,
 1 AS `year_graduated`,
 1 AS `lastschool`,
 1 AS `requesteddocs`,
 1 AS `purpose`,
 1 AS `datereq`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwdocureq`
--

DROP TABLE IF EXISTS `vwdocureq`;
/*!50001 DROP VIEW IF EXISTS `vwdocureq`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwdocureq` AS SELECT 
 1 AS `reqdoc_ID`,
 1 AS `sid`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `email`,
 1 AS `bday`,
 1 AS `placeofbirth`,
 1 AS `presentaddress`,
 1 AS `mobile`,
 1 AS `stud_status`,
 1 AS `snum`,
 1 AS `course`,
 1 AS `yearGrad`,
 1 AS `lastSchool`,
 1 AS `cert`,
 1 AS `tor_purpose`,
 1 AS `diploma`,
 1 AS `deliver_add`,
 1 AS `receiver_name`,
 1 AS `contactnum`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwemployees`
--

DROP TABLE IF EXISTS `vwemployees`;
/*!50001 DROP VIEW IF EXISTS `vwemployees`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwemployees` AS SELECT 
 1 AS `id`,
 1 AS `empnum`,
 1 AS `empname`,
 1 AS `email`,
 1 AS `gender`,
 1 AS `mobile`,
 1 AS `dept`,
 1 AS `role`,
 1 AS `office`,
 1 AS `dept_email`,
 1 AS `position`,
 1 AS `username`,
 1 AS `pass`,
 1 AS `isActive`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwenroll_validate`
--

DROP TABLE IF EXISTS `vwenroll_validate`;
/*!50001 DROP VIEW IF EXISTS `vwenroll_validate`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwenroll_validate` AS SELECT 
 1 AS `ev_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `yrlevel`,
 1 AS `dept`,
 1 AS `course`,
 1 AS `email`,
 1 AS `mobile`,
 1 AS `schoolyr`,
 1 AS `semester`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwforenrollment_students`
--

DROP TABLE IF EXISTS `vwforenrollment_students`;
/*!50001 DROP VIEW IF EXISTS `vwforenrollment_students`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwforenrollment_students` AS SELECT 
 1 AS `enrollment_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `gender`,
 1 AS `bday`,
 1 AS `mobile`,
 1 AS `email`,
 1 AS `completeaddress`,
 1 AS `guardian`,
 1 AS `guardiancontact`,
 1 AS `yrlevel`,
 1 AS `dept`,
 1 AS `course`,
 1 AS `abbr`,
 1 AS `schoolyr`,
 1 AS `semester`,
 1 AS `username`,
 1 AS `password`,
 1 AS `date_assessed`,
 1 AS `date_enrolled`,
 1 AS `enrollment_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwgradereq`
--

DROP TABLE IF EXISTS `vwgradereq`;
/*!50001 DROP VIEW IF EXISTS `vwgradereq`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwgradereq` AS SELECT 
 1 AS `gradereq_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `fullname`,
 1 AS `yrlevel`,
 1 AS `course`,
 1 AS `schoolyr`,
 1 AS `semester`,
 1 AS `email`,
 1 AS `date_req`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwguest_enrollment`
--

DROP TABLE IF EXISTS `vwguest_enrollment`;
/*!50001 DROP VIEW IF EXISTS `vwguest_enrollment`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwguest_enrollment` AS SELECT 
 1 AS `gid`,
 1 AS `enroll_no`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `maiden_name`,
 1 AS `citizenship`,
 1 AS `gender`,
 1 AS `civil_status`,
 1 AS `dob`,
 1 AS `birthplace`,
 1 AS `mobile`,
 1 AS `email`,
 1 AS `cityadd`,
 1 AS `region`,
 1 AS `province`,
 1 AS `city`,
 1 AS `brgy`,
 1 AS `guardian`,
 1 AS `g_contact`,
 1 AS `app_status`,
 1 AS `course`,
 1 AS `previous_deg`,
 1 AS `sub_to_enroll`,
 1 AS `non_degree`,
 1 AS `enrollment_status`,
 1 AS `date_submitted`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwnotif`
--

DROP TABLE IF EXISTS `vwnotif`;
/*!50001 DROP VIEW IF EXISTS `vwnotif`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwnotif` AS SELECT 
 1 AS `notif_ID`,
 1 AS `sid`,
 1 AS `notification`,
 1 AS `icon`,
 1 AS `link`,
 1 AS `date`,
 1 AS `isSeen`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwpayverif`
--

DROP TABLE IF EXISTS `vwpayverif`;
/*!50001 DROP VIEW IF EXISTS `vwpayverif`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwpayverif` AS SELECT 
 1 AS `pv_ID`,
 1 AS `sid`,
 1 AS `snum`,
 1 AS `lname`,
 1 AS `fname`,
 1 AS `mname`,
 1 AS `yrlevel`,
 1 AS `course`,
 1 AS `abbr`,
 1 AS `tfeepayment`,
 1 AS `schoolyr`,
 1 AS `semester`,
 1 AS `term`,
 1 AS `email`,
 1 AS `mobile`,
 1 AS `particulars`,
 1 AS `particulars_total`,
 1 AS `gtotal`,
 1 AS `amtpaid`,
 1 AS `amtchange`,
 1 AS `sentvia`,
 1 AS `paymethod`,
 1 AS `note`,
 1 AS `date_paid`,
 1 AS `time_paid`,
 1 AS `date_sent`,
 1 AS `date_acknowledged`,
 1 AS `verif_code`,
 1 AS `date_verified`,
 1 AS `OR`,
 1 AS `AR`,
 1 AS `remarks`,
 1 AS `payment_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwstudents`
--

DROP TABLE IF EXISTS `vwstudents`;
/*!50001 DROP VIEW IF EXISTS `vwstudents`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwstudents` AS SELECT 
 1 AS `id`,
 1 AS `snum`,
 1 AS `fname`,
 1 AS `lname`,
 1 AS `mname`,
 1 AS `yrlevel`,
 1 AS `dept`,
 1 AS `course`,
 1 AS `gender`,
 1 AS `cstatus`,
 1 AS `bday`,
 1 AS `mobile`,
 1 AS `email`,
 1 AS `completeaddress`,
 1 AS `region`,
 1 AS `guardian`,
 1 AS `guardiancontact`,
 1 AS `username`,
 1 AS `pass`,
 1 AS `status`,
 1 AS `isAccepted`,
 1 AS `date_registered`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vwsubmittedreq`
--

DROP TABLE IF EXISTS `vwsubmittedreq`;
/*!50001 DROP VIEW IF EXISTS `vwsubmittedreq`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vwsubmittedreq` AS SELECT 
 1 AS `sr_ID`,
 1 AS `id`,
 1 AS `snum`,
 1 AS `studentname`,
 1 AS `reqname`,
 1 AS `date_submitted`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `yrlevel`
--

DROP TABLE IF EXISTS `yrlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `yrlevel` (
  `yrlevel_ID` tinyint unsigned NOT NULL AUTO_INCREMENT,
  `yrlevel` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'VISIBLE',
  PRIMARY KEY (`yrlevel_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `yrlevel`
--

LOCK TABLES `yrlevel` WRITE;
/*!40000 ALTER TABLE `yrlevel` DISABLE KEYS */;
INSERT INTO `yrlevel` VALUES (1,'1st Year','VISIBLE'),(2,'2nd Year','VISIBLE'),(3,'3rd Year','VISIBLE'),(4,'4th Year','VISIBLE');
/*!40000 ALTER TABLE `yrlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Current Database: `studentportal`
--

USE `studentportal`;

--
-- Final view structure for view `vwannouncements`
--

/*!50001 DROP VIEW IF EXISTS `vwannouncements`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwannouncements` AS select `announcements`.`a_id` AS `a_id`,`announcements`.`a_eid` AS `a_eid`,`departments`.`dept` AS `dept`,`employees`.`lname` AS `lname`,`employees`.`fname` AS `fname`,`employees`.`mname` AS `mname`,`employees`.`dept_ID` AS `dept_ID`,`announcements`.`a_day` AS `a_day`,`announcements`.`a_month` AS `a_month`,`announcements`.`a_office` AS `a_office`,`announcements`.`a_title` AS `a_title`,`announcements`.`a_desc` AS `a_desc` from ((`announcements` join `employees` on((`employees`.`id` = `announcements`.`a_eid`))) join `departments` on((`employees`.`dept_ID` = `departments`.`deptid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwassessment`
--

/*!50001 DROP VIEW IF EXISTS `vwassessment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwassessment` AS select `assessment`.`assess_ID` AS `assess_ID`,`students`.`id` AS `sid`,`students`.`snum` AS `snum`,concat(`students`.`lname`,', ',`students`.`fname`,' ',`students`.`mname`) AS `fullname`,`departments`.`dept` AS `dept`,`courses`.`course` AS `course`,`schoolyr`.`schoolyr` AS `schoolyr`,`semester`.`semester` AS `semester`,`students`.`email` AS `email`,date_format(`assessment`.`date_submitted`,'%m/%d/%Y') AS `date_submitted`,`assessment`.`status` AS `status` from (((((`assessment` join `students` on((`assessment`.`sid` = `students`.`id`))) join `departments` on((`departments`.`deptid` = `students`.`dept_ID`))) join `schoolyr` on((`assessment`.`schoolyr_ID` = `schoolyr`.`schoolyr_ID`))) join `semester` on((`assessment`.`semester_ID` = `semester`.`semester_ID`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwclearance`
--

/*!50001 DROP VIEW IF EXISTS `vwclearance`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwclearance` AS select `clearance`.`clr_ID` AS `clr_ID`,`clearance`.`sid` AS `sid`,`clearance`.`reqdoc_ID` AS `reqdoc_ID`,`students`.`snum` AS `snum`,`students`.`lname` AS `lname`,`students`.`fname` AS `fname`,`students`.`mname` AS `mname`,`students`.`email` AS `email`,`courses`.`course` AS `course`,`clearance`.`status` AS `status` from ((`clearance` join `students` on((`clearance`.`sid` = `students`.`id`))) join `courses` on((`students`.`course` = `courses`.`course_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwcourses`
--

/*!50001 DROP VIEW IF EXISTS `vwcourses`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwcourses` AS select `courses`.`course_ID` AS `course_ID`,`departments`.`dept` AS `dept`,`courses`.`abbr` AS `abbr`,`courses`.`course` AS `course`,`courses`.`visible` AS `isVisible` from (`courses` join `departments` on((`courses`.`deptid` = `departments`.`deptid`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwdocreq`
--

/*!50001 DROP VIEW IF EXISTS `vwdocreq`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwdocreq` AS select `docreq`.`docreq_ID` AS `docreq_ID`,`docreq`.`sid` AS `sid`,`students`.`snum` AS `snum`,concat(`students`.`fname`,' ',`students`.`lname`) AS `fullname`,`courses`.`course` AS `course`,`students`.`email` AS `email`,`students`.`bday` AS `bday`,`students`.`gender` AS `gender`,`docreq`.`year_graduated` AS `year_graduated`,`docreq`.`lastschool` AS `lastschool`,`docreq`.`requesteddocs` AS `requesteddocs`,`docreq`.`purpose` AS `purpose`,date_format(`docreq`.`date`,'%m/%d/%Y') AS `datereq`,`docreq`.`status` AS `status` from ((`docreq` join `students` on((`docreq`.`sid` = `students`.`id`))) join `courses` on((`courses`.`course_ID` = `docreq`.`course_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwdocureq`
--

/*!50001 DROP VIEW IF EXISTS `vwdocureq`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwdocureq` AS select `tbldocureq`.`reqdoc_ID` AS `reqdoc_ID`,`tbldocureq`.`sid` AS `sid`,`students`.`lname` AS `lname`,`students`.`fname` AS `fname`,`students`.`mname` AS `mname`,`students`.`email` AS `email`,`students`.`bday` AS `bday`,`tbldocureq`.`placeofbirth` AS `placeofbirth`,concat(`students`.`cityadd`,', ',convert(`refbrgy`.`brgyDesc` using utf8mb4),', ',convert(`refcitymun`.`citymunDesc` using utf8mb4),', ',convert(`refprovince`.`provDesc` using utf8mb4)) AS `presentaddress`,`students`.`mobile` AS `mobile`,`tbldocureq`.`stud_status` AS `stud_status`,`students`.`snum` AS `snum`,`courses`.`course` AS `course`,`tbldocureq`.`yearGrad` AS `yearGrad`,`tbldocureq`.`lastSchool` AS `lastSchool`,`tbldocureq`.`cert` AS `cert`,`tbldocureq`.`tor_purpose` AS `tor_purpose`,`tbldocureq`.`diploma` AS `diploma`,`tbldocureq`.`deliver_add` AS `deliver_add`,`tbldocureq`.`receiver_name` AS `receiver_name`,`tbldocureq`.`contactnum` AS `contactnum`,`tbldocureq`.`status` AS `status` from ((((((`tbldocureq` join `students` on((`students`.`id` = `tbldocureq`.`sid`))) join `refregion` on((`refregion`.`regCode` = `students`.`region`))) join `refprovince` on((`refprovince`.`provCode` = `students`.`province`))) join `refcitymun` on((`refcitymun`.`citymunCode` = `students`.`city`))) join `refbrgy` on((`refbrgy`.`brgyCode` = `students`.`brgy`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwemployees`
--

/*!50001 DROP VIEW IF EXISTS `vwemployees`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwemployees` AS select `employees`.`id` AS `id`,`employees`.`empnum` AS `empnum`,concat(`employees`.`fname`,' ',`employees`.`lname`) AS `empname`,`employees`.`email` AS `email`,`employees`.`Gender` AS `gender`,`employees`.`mobile` AS `mobile`,`departments`.`dept` AS `dept`,`role`.`role` AS `role`,`employees`.`office` AS `office`,`departments`.`dept_email` AS `dept_email`,`employees`.`position` AS `position`,`employees`.`username` AS `username`,`employees`.`pass` AS `pass`,`employees`.`isActive` AS `isActive` from ((`employees` join `departments` on((`employees`.`dept_ID` = `departments`.`deptid`))) join `role` on((`employees`.`permission_ID` = `role`.`role_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwenroll_validate`
--

/*!50001 DROP VIEW IF EXISTS `vwenroll_validate`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwenroll_validate` AS select `enrollment_validation`.`ev_ID` AS `ev_ID`,`enrollment_validation`.`sid` AS `sid`,`students`.`snum` AS `snum`,`students`.`lname` AS `lname`,`students`.`fname` AS `fname`,`students`.`mname` AS `mname`,`yrlevel`.`yrlevel` AS `yrlevel`,`departments`.`dept` AS `dept`,`courses`.`course` AS `course`,`students`.`email` AS `email`,`students`.`mobile` AS `mobile`,`schoolyr`.`schoolyr` AS `schoolyr`,`semester`.`semester` AS `semester`,`enrollment_validation`.`status` AS `status` from ((((((`enrollment_validation` join `students` on((`students`.`id` = `enrollment_validation`.`sid`))) join `schoolyr` on((`schoolyr`.`schoolyr_ID` = `enrollment_validation`.`schoolyr_ID`))) join `semester` on((`semester`.`semester_ID` = `enrollment_validation`.`semester_ID`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) join `departments` on((`departments`.`deptid` = `students`.`dept_ID`))) join `yrlevel` on((`yrlevel`.`yrlevel_ID` = `students`.`yrlevel`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwforenrollment_students`
--

/*!50001 DROP VIEW IF EXISTS `vwforenrollment_students`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwforenrollment_students` AS select `enrollment`.`enrollment_ID` AS `enrollment_ID`,`students`.`id` AS `sid`,`students`.`snum` AS `snum`,`students`.`lname` AS `lname`,`students`.`fname` AS `fname`,`students`.`mname` AS `mname`,`students`.`gender` AS `gender`,`students`.`bday` AS `bday`,`students`.`mobile` AS `mobile`,`students`.`email` AS `email`,concat(`students`.`cityadd`,', ',convert(`refbrgy`.`brgyDesc` using utf8mb4),', ',convert(`refcitymun`.`citymunDesc` using utf8mb4),', ',convert(`refprovince`.`provDesc` using utf8mb4),', ',convert(`refregion`.`regDesc` using utf8mb4)) AS `completeaddress`,`students`.`guardian` AS `guardian`,`students`.`guardiancontact` AS `guardiancontact`,`yrlevel`.`yrlevel` AS `yrlevel`,`departments`.`dept` AS `dept`,`courses`.`course` AS `course`,`courses`.`abbr` AS `abbr`,`schoolyr`.`schoolyr` AS `schoolyr`,`semester`.`semester` AS `semester`,`students`.`username` AS `username`,`students`.`pass` AS `password`,`enrollment`.`date_assessed` AS `date_assessed`,`enrollment`.`date_enrolled` AS `date_enrolled`,`enrollment`.`enrollment_status` AS `enrollment_status` from ((((((((((`enrollment` join `students` on((`enrollment`.`sid` = `students`.`id`))) join `refregion` on((`refregion`.`regCode` = `students`.`region`))) join `refprovince` on((`refprovince`.`provCode` = `students`.`province`))) join `refcitymun` on((`refcitymun`.`citymunCode` = `students`.`city`))) join `refbrgy` on((`refbrgy`.`brgyCode` = `students`.`brgy`))) join `courses` on((`courses`.`course_ID` = `enrollment`.`course_ID`))) join `schoolyr` on((`schoolyr`.`schoolyr_ID` = `enrollment`.`schoolyr_ID`))) join `semester` on((`semester`.`semester_ID` = `enrollment`.`semester_ID`))) join `departments` on((`departments`.`deptid` = `enrollment`.`dept_ID`))) join `yrlevel` on((`yrlevel`.`yrlevel_ID` = `students`.`yrlevel`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwgradereq`
--

/*!50001 DROP VIEW IF EXISTS `vwgradereq`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwgradereq` AS select `gradereq`.`gradereq_ID` AS `gradereq_ID`,`gradereq`.`sid` AS `sid`,`students`.`snum` AS `snum`,concat(`students`.`lname`,', ',`students`.`fname`,' ',`students`.`mname`) AS `fullname`,`yrlevel`.`yrlevel` AS `yrlevel`,`courses`.`course` AS `course`,`gradereq`.`schoolyr` AS `schoolyr`,`gradereq`.`semester` AS `semester`,`students`.`email` AS `email`,date_format(`gradereq`.`date_req`,'%m/%d/%Y') AS `date_req`,`gradereq`.`status` AS `status` from (((`gradereq` join `students` on((`gradereq`.`sid` = `students`.`id`))) join `yrlevel` on((`students`.`yrlevel` = `yrlevel`.`yrlevel_ID`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwguest_enrollment`
--

/*!50001 DROP VIEW IF EXISTS `vwguest_enrollment`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwguest_enrollment` AS select `guest_enrollment`.`gid` AS `gid`,`guest_enrollment`.`enroll_no` AS `enroll_no`,`guest_enrollment`.`lname` AS `lname`,`guest_enrollment`.`fname` AS `fname`,`guest_enrollment`.`mname` AS `mname`,`guest_enrollment`.`maiden_name` AS `maiden_name`,`guest_enrollment`.`citizenship` AS `citizenship`,`guest_enrollment`.`gender` AS `gender`,`guest_enrollment`.`civil_status` AS `civil_status`,`guest_enrollment`.`dob` AS `dob`,`guest_enrollment`.`birthplace` AS `birthplace`,`guest_enrollment`.`mobile` AS `mobile`,`guest_enrollment`.`email` AS `email`,`guest_enrollment`.`cityadd` AS `cityadd`,`refregion`.`regDesc` AS `region`,`refprovince`.`provDesc` AS `province`,`refcitymun`.`citymunDesc` AS `city`,`refbrgy`.`brgyDesc` AS `brgy`,`guest_enrollment`.`guardian` AS `guardian`,`guest_enrollment`.`g_contact` AS `g_contact`,`guest_enrollment`.`app_status` AS `app_status`,`courses`.`course` AS `course`,`guest_enrollment`.`previous_deg` AS `previous_deg`,`guest_enrollment`.`sub_to_enroll` AS `sub_to_enroll`,`guest_enrollment`.`non_degree` AS `non_degree`,`guest_enrollment`.`enrollment_status` AS `enrollment_status`,`guest_enrollment`.`date_submitted` AS `date_submitted` from (((((`guest_enrollment` join `refregion` on((`guest_enrollment`.`region` = `refregion`.`regCode`))) join `refprovince` on((`guest_enrollment`.`province` = `refprovince`.`provCode`))) join `refcitymun` on((`guest_enrollment`.`city` = `refcitymun`.`citymunCode`))) join `refbrgy` on((`guest_enrollment`.`brgy` = `refbrgy`.`brgyCode`))) join `courses` on((`guest_enrollment`.`course_ID` = `courses`.`course_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwnotif`
--

/*!50001 DROP VIEW IF EXISTS `vwnotif`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwnotif` AS select `notif`.`notif_ID` AS `notif_ID`,`notif`.`sid` AS `sid`,`notif`.`notification` AS `notification`,`notif`.`icon` AS `icon`,`notif`.`link` AS `link`,date_format(`notif`.`date`,'%b %e, %Y %r') AS `date`,`notif`.`isSeen` AS `isSeen` from `notif` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwpayverif`
--

/*!50001 DROP VIEW IF EXISTS `vwpayverif`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwpayverif` AS select `paymentverif`.`pv_ID` AS `pv_ID`,`students`.`id` AS `sid`,`students`.`snum` AS `snum`,`students`.`lname` AS `lname`,`students`.`fname` AS `fname`,`students`.`mname` AS `mname`,`yrlevel`.`yrlevel` AS `yrlevel`,`courses`.`course` AS `course`,`courses`.`abbr` AS `abbr`,format(`paymentverif`.`tfeeamount`,2) AS `tfeepayment`,`paymentverif`.`schoolyr` AS `schoolyr`,`semester`.`semester` AS `semester`,`terms`.`term` AS `term`,`students`.`email` AS `email`,`students`.`mobile` AS `mobile`,`paymentverif`.`particulars` AS `particulars`,format(`paymentverif`.`particulars_total`,2) AS `particulars_total`,format(`paymentverif`.`gtotal`,2) AS `gtotal`,concat('P',format(`paymentverif`.`amtpaid`,2)) AS `amtpaid`,(`paymentverif`.`amtpaid` - `paymentverif`.`gtotal`) AS `amtchange`,`sentvia`.`sentvia` AS `sentvia`,`paymethod`.`paymethod` AS `paymethod`,`paymentverif`.`note` AS `note`,date_format(`paymentverif`.`date_of_payment`,'%m/%d/%Y') AS `date_paid`,time_format(`paymentverif`.`time_of_payment`,'%h:%i:%s %p') AS `time_paid`,`paymentverif`.`date_sent` AS `date_sent`,`paymentverif`.`date_acknowledged` AS `date_acknowledged`,`paymentverif`.`verif_code` AS `verif_code`,`paymentverif`.`date_verified` AS `date_verified`,`paymentverif`.`OR_num` AS `OR`,`paymentverif`.`AR_num` AS `AR`,`paymentverif`.`remarks` AS `remarks`,`paymentverif`.`payment_status` AS `payment_status` from (((((((`paymentverif` join `students` on((`paymentverif`.`sid` = `students`.`id`))) join `yrlevel` on((`yrlevel`.`yrlevel_ID` = `students`.`yrlevel`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) join `semester` on((`semester`.`semester_ID` = `paymentverif`.`semester_ID`))) join `terms` on((`terms`.`terms_ID` = `paymentverif`.`terms_ID`))) join `sentvia` on((`sentvia`.`sentvia_ID` = `paymentverif`.`sentvia_ID`))) join `paymethod` on((`paymethod`.`paymethod_ID` = `paymentverif`.`paymethod_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwstudents`
--

/*!50001 DROP VIEW IF EXISTS `vwstudents`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwstudents` AS select `students`.`id` AS `id`,`students`.`snum` AS `snum`,`students`.`fname` AS `fname`,`students`.`lname` AS `lname`,`students`.`mname` AS `mname`,`yrlevel`.`yrlevel` AS `yrlevel`,`departments`.`dept` AS `dept`,`courses`.`course` AS `course`,`students`.`gender` AS `gender`,`students`.`cstatus` AS `cstatus`,`students`.`bday` AS `bday`,`students`.`mobile` AS `mobile`,`students`.`email` AS `email`,concat(`students`.`cityadd`,', ',convert(`refbrgy`.`brgyDesc` using utf8mb4),', ',convert(`refcitymun`.`citymunDesc` using utf8mb4),', ',convert(`refprovince`.`provDesc` using utf8mb4)) AS `completeaddress`,`refregion`.`regDesc` AS `region`,`students`.`guardian` AS `guardian`,`students`.`guardiancontact` AS `guardiancontact`,`students`.`username` AS `username`,`students`.`pass` AS `pass`,`students`.`status` AS `status`,`students`.`isAccepted` AS `isAccepted`,`students`.`dor` AS `date_registered` from (((((((`students` join `refregion` on((`refregion`.`regCode` = `students`.`region`))) join `refprovince` on((`refprovince`.`provCode` = `students`.`province`))) join `refcitymun` on((`refcitymun`.`citymunCode` = `students`.`city`))) join `refbrgy` on((`refbrgy`.`brgyCode` = `students`.`brgy`))) join `yrlevel` on((`yrlevel`.`yrlevel_ID` = `students`.`yrlevel`))) join `courses` on((`courses`.`course_ID` = `students`.`course`))) join `departments` on((`departments`.`deptid` = `students`.`dept_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vwsubmittedreq`
--

/*!50001 DROP VIEW IF EXISTS `vwsubmittedreq`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb3 */;
/*!50001 SET character_set_results     = utf8mb3 */;
/*!50001 SET collation_connection      = utf8mb3_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vwsubmittedreq` AS select `studreq`.`sr_ID` AS `sr_ID`,`students`.`id` AS `id`,`students`.`snum` AS `snum`,concat(`students`.`lname`,', ',`students`.`fname`,' ',`students`.`mname`) AS `studentname`,`requirements`.`reqname` AS `reqname`,`studreq`.`date_submitted` AS `date_submitted` from ((`studreq` join `students` on((`studreq`.`sid` = `students`.`id`))) join `requirements` on((`requirements`.`req_ID` = `studreq`.`req_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-08 12:44:52