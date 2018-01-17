-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: epermit
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `activity_log_details`
--

DROP TABLE IF EXISTS `activity_log_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_log_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=928 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log_details`
--

LOCK TABLES `activity_log_details` WRITE;
/*!40000 ALTER TABLE `activity_log_details` DISABLE KEYS */;
INSERT INTO `activity_log_details` VALUES (1,'Mulai log masuk',1,NULL,'2017-11-05 15:39:36','2017-11-05 15:39:36'),(2,'Tambah Negeri Test Negeri',1,NULL,'2017-11-05 15:40:10','2017-11-05 15:40:10'),(3,'Tambah Daerah Test Daerah',1,NULL,'2017-11-05 15:40:36','2017-11-05 15:40:36'),(4,'Tambah Gunung Test Gunung',1,NULL,'2017-11-05 15:41:03','2017-11-05 15:41:03'),(5,'Log Keluar',1,NULL,'2017-11-05 15:41:51','2017-11-05 15:41:51'),(6,'Mulai log masuk',2,NULL,'2017-11-05 15:42:38','2017-11-05 15:42:38'),(7,'Mulai log masuk',3,NULL,'2017-11-05 23:00:22','2017-11-05 23:00:22'),(8,'Mulai log masuk',4,NULL,'2017-11-06 07:42:17','2017-11-06 07:42:17'),(9,'Mulai log masuk',5,NULL,'2017-11-06 09:12:01','2017-11-06 09:12:01'),(10,'Log Keluar',5,NULL,'2017-11-06 09:21:45','2017-11-06 09:21:45'),(11,'Mulai log masuk',6,NULL,'2017-11-06 09:23:03','2017-11-06 09:23:03'),(12,'Mulai log masuk',7,NULL,'2017-11-06 09:25:47','2017-11-06 09:25:47'),(13,'Tambah Negeri Terengganu',7,NULL,'2017-11-06 09:26:06','2017-11-06 09:26:06'),(14,'Hapus Negeri Test Negeri',7,NULL,'2017-11-06 09:26:10','2017-11-06 09:26:10'),(15,'Tambah Negeri Perak',7,NULL,'2017-11-06 09:26:27','2017-11-06 09:26:27'),(16,'Tambah Negeri Pahang',7,NULL,'2017-11-06 09:26:34','2017-11-06 09:26:34'),(17,'Tambah Taman Eko-Rimba Taman Eko Rimba Paya Laut Matang',7,NULL,'2017-11-06 09:27:58','2017-11-06 09:27:58'),(18,'Tambah Taman Eko-Rimba Taman Eko Rimba Kuala Who',7,NULL,'2017-11-06 09:28:15','2017-11-06 09:28:15'),(19,'Tambah Taman Eko-Rimba Taman Eko Rimba Tali Kail',7,NULL,'2017-11-06 09:28:32','2017-11-06 09:28:32'),(20,'Tambah Taman Eko-Rimba Taman Eko Rimba Ulu Kenas',7,NULL,'2017-11-06 09:28:46','2017-11-06 09:28:46'),(21,'Mulai log masuk',8,NULL,'2017-11-06 09:36:40','2017-11-06 09:36:40'),(22,'Mulai log masuk',9,NULL,'2017-11-06 09:39:17','2017-11-06 09:39:17'),(23,'Mulai log masuk',10,NULL,'2017-11-06 09:39:22','2017-11-06 09:39:22'),(24,'Log Keluar',7,NULL,'2017-11-06 09:48:57','2017-11-06 09:48:57'),(25,'Mulai log masuk',11,NULL,'2017-11-06 09:49:04','2017-11-06 09:49:04'),(26,'Log Keluar',11,NULL,'2017-11-06 09:50:10','2017-11-06 09:50:10'),(27,'Mulai log masuk',12,NULL,'2017-11-06 09:56:22','2017-11-06 09:56:22'),(28,'Mulai log masuk',13,NULL,'2017-11-06 09:56:24','2017-11-06 09:56:24'),(29,'Mulai log masuk',14,NULL,'2017-11-06 09:56:26','2017-11-06 09:56:26'),(30,'Mulai log masuk',15,NULL,'2017-11-06 09:56:34','2017-11-06 09:56:34'),(31,'Tambah Daerah Terengganu Utara',13,NULL,'2017-11-06 10:08:47','2017-11-06 10:08:47'),(32,'Tambah Daerah Terengganu Selatan',13,NULL,'2017-11-06 10:09:00','2017-11-06 10:09:00'),(33,'Tambah Pengguna ali bin abu',12,NULL,'2017-11-06 10:09:01','2017-11-06 10:09:01'),(34,'Tambah Daerah Terengganu Barat',13,NULL,'2017-11-06 10:09:13','2017-11-06 10:09:13'),(35,'Tambah Daerah Kuala Kangsar',13,NULL,'2017-11-06 10:09:29','2017-11-06 10:09:29'),(36,'Mulai log masuk',16,NULL,'2017-11-06 10:09:47','2017-11-06 10:09:47'),(37,'Tambah Daerah Perak Selatan',13,NULL,'2017-11-06 10:09:54','2017-11-06 10:09:54'),(38,'Tambah Daerah Larut Matang',13,NULL,'2017-11-06 10:10:32','2017-11-06 10:10:32'),(39,'Tambah Pengguna aminah bin abdullah',12,NULL,'2017-11-06 10:10:33','2017-11-06 10:10:33'),(40,'Tambah Daerah Hulu Perak',13,NULL,'2017-11-06 10:10:44','2017-11-06 10:10:44'),(41,'Tambah Daerah Kinta / Manjung',13,NULL,'2017-11-06 10:10:54','2017-11-06 10:10:54'),(42,'Tambah Pengguna 123456',15,NULL,'2017-11-06 10:11:23','2017-11-06 10:11:23'),(43,'Log Keluar',16,NULL,'2017-11-06 10:12:21','2017-11-06 10:12:21'),(44,'Update Pengguna Ali bin abu',13,NULL,'2017-11-06 10:12:36','2017-11-06 10:12:36'),(45,'Tambah Pengguna Aman A',14,NULL,'2017-11-06 10:15:11','2017-11-06 10:15:11'),(46,'Update Pengguna Aman A',14,NULL,'2017-11-06 10:18:24','2017-11-06 10:18:24'),(47,'Hapus Pengguna Ali bin abu',12,NULL,'2017-11-06 10:19:52','2017-11-06 10:19:52'),(48,'Update Pengguna aminah bin abdullah',12,NULL,'2017-11-06 10:20:29','2017-11-06 10:20:29'),(49,'Update Pengguna Aman A',14,NULL,'2017-11-06 10:20:33','2017-11-06 10:20:33'),(50,'Mulai log masuk',17,NULL,'2017-11-06 10:20:41','2017-11-06 10:20:41'),(51,'Tambah Pengguna Ali bin abu',12,NULL,'2017-11-06 10:22:22','2017-11-06 10:22:22'),(52,'Mulai log masuk',18,NULL,'2017-11-06 10:24:35','2017-11-06 10:24:35'),(53,'Update Pengguna Aman A',14,NULL,'2017-11-06 10:25:21','2017-11-06 10:25:21'),(54,'Log Keluar',9,NULL,'2017-11-06 10:29:32','2017-11-06 10:29:32'),(55,'Mulai log masuk',19,NULL,'2017-11-06 10:39:57','2017-11-06 10:39:57'),(56,'Tambah Negeri Wilayah Persekutuan',13,NULL,'2017-11-06 11:24:17','2017-11-06 11:24:17'),(57,'Hapus Negeri Pahang',13,NULL,'2017-11-06 11:24:42','2017-11-06 11:24:42'),(58,'Tambah Daerah Test',13,NULL,'2017-11-06 11:26:09','2017-11-06 11:26:09'),(59,'Update Daerah Test2',13,NULL,'2017-11-06 11:26:21','2017-11-06 11:26:21'),(60,'Hapus Daerah Test2',13,NULL,'2017-11-06 11:26:31','2017-11-06 11:26:31'),(61,'Tambah Taman Eko-Rimba Taman Eko Rimba Sekayu',13,NULL,'2017-11-06 11:27:50','2017-11-06 11:27:50'),(62,'Tambah Taman Eko-Rimba Taman Eko-Rimba Kledang Saiong',18,NULL,'2017-11-06 11:28:16','2017-11-06 11:28:16'),(63,'Hapus Daerah Kinta / Manjung',13,NULL,'2017-11-06 11:31:05','2017-11-06 11:31:05'),(64,'Mulai log masuk',20,NULL,'2017-11-06 11:33:43','2017-11-06 11:33:43'),(65,'Update Taman Eko-Rimba Taman Eko Rimba Kuala Woh',13,NULL,'2017-11-06 11:36:29','2017-11-06 11:36:29'),(66,'Tambah Hutan Simpan Kekal Gunung Tebu',13,NULL,'2017-11-06 11:40:09','2017-11-06 11:40:09'),(67,'Mulai log masuk',21,NULL,'2017-11-06 11:44:14','2017-11-06 11:44:14'),(68,'Update Taman Eko-Rimba Sekayu',13,NULL,'2017-11-06 11:46:49','2017-11-06 11:46:49'),(69,'Hapus Taman Eko-Rimba Taman Eko Rimba Kuala Woh',13,NULL,'2017-11-06 11:47:18','2017-11-06 11:47:18'),(70,'Tambah Gunung Gunung Tebu',13,NULL,'2017-11-06 11:56:32','2017-11-06 11:56:32'),(71,'Mulai log masuk',22,NULL,'2017-11-06 12:27:29','2017-11-06 12:27:29'),(72,'Mulai log masuk',23,NULL,'2017-11-06 12:28:25','2017-11-06 12:28:25'),(73,'Hapus Taman Eko-Rimba Taman Eko Rimba Paya Laut Matang',13,NULL,'2017-11-06 13:35:58','2017-11-06 13:35:58'),(74,'Hapus Taman Eko-Rimba Taman Eko Rimba Tali Kail',13,NULL,'2017-11-06 13:36:02','2017-11-06 13:36:02'),(75,'Hapus Taman Eko-Rimba Sekayu',13,NULL,'2017-11-06 13:36:20','2017-11-06 13:36:20'),(76,'Tambah Taman Eko-Rimba Paya Laut Matang',13,NULL,'2017-11-06 13:37:00','2017-11-06 13:37:00'),(77,'Tambah Taman Eko-Rimba Pulau Tali Kail',13,NULL,'2017-11-06 13:37:26','2017-11-06 13:37:26'),(78,'Tambah Taman Eko-Rimba Pulau Tali Kail',13,NULL,'2017-11-06 13:37:26','2017-11-06 13:37:26'),(79,'Tambah Taman Eko-Rimba Kuala Woh',13,NULL,'2017-11-06 13:37:54','2017-11-06 13:37:54'),(80,'Hapus Taman Eko-Rimba Taman Eko-Rimba Kledang Saiong',13,NULL,'2017-11-06 13:38:00','2017-11-06 13:38:00'),(81,'Hapus Taman Eko-Rimba Pulau Tali Kail',13,NULL,'2017-11-06 13:38:13','2017-11-06 13:38:13'),(82,'Tambah Negeri Kelantan',13,NULL,'2017-11-06 13:38:35','2017-11-06 13:38:35'),(83,'Tambah Negeri Kedah',13,NULL,'2017-11-06 13:38:40','2017-11-06 13:38:40'),(84,'Tambah Negeri Negeri Sembilan',13,NULL,'2017-11-06 13:38:52','2017-11-06 13:38:52'),(85,'Tambah Taman Eko-Rimba Pasir Tengkorak',13,NULL,'2017-11-06 13:39:11','2017-11-06 13:39:11'),(86,'Tambah Taman Eko-Rimba Sungai Teroi',13,NULL,'2017-11-06 13:39:26','2017-11-06 13:39:26'),(87,'Tambah Taman Eko-Rimba Bukit Hijau',13,NULL,'2017-11-06 13:39:37','2017-11-06 13:39:37'),(88,'Tambah Taman Eko-Rimba Jeram Linang',13,NULL,'2017-11-06 13:39:55','2017-11-06 13:39:55'),(89,'Tambah Taman Eko-Rimba Bukit Bakar',13,NULL,'2017-11-06 13:40:08','2017-11-06 13:40:08'),(90,'Mulai log masuk',24,NULL,'2017-11-06 13:40:09','2017-11-06 13:40:09'),(91,'Tambah Taman Eko-Rimba Gunung Stong',13,NULL,'2017-11-06 13:40:28','2017-11-06 13:40:28'),(92,'Tambah Taman Eko-Rimba Ulu Bendul',13,NULL,'2017-11-06 13:40:46','2017-11-06 13:40:46'),(93,'Tambah Taman Eko-Rimba Batu Maloi',13,NULL,'2017-11-06 13:41:00','2017-11-06 13:41:00'),(94,'Tambah Taman Eko-Rimba Tengkek',13,NULL,'2017-11-06 13:41:10','2017-11-06 13:41:10'),(95,'Tambah Taman Eko-Rimba De Bana',13,NULL,'2017-11-06 13:41:21','2017-11-06 13:41:21'),(96,'Tambah Gunung Liang',24,NULL,'2017-11-06 13:42:24','2017-11-06 13:42:24'),(97,'Tambah Taman Eko-Rimba Air Menderu',13,NULL,'2017-11-06 13:42:57','2017-11-06 13:42:57'),(98,'Tambah Taman Eko-Rimba Bandar Bukit Bauk',13,NULL,'2017-11-06 13:43:14','2017-11-06 13:43:14'),(99,'Tambah Gunung Bah Gading',24,NULL,'2017-11-06 13:43:17','2017-11-06 13:43:17'),(100,'Tambah Taman Eko-Rimba Chemerong',13,NULL,'2017-11-06 13:43:25','2017-11-06 13:43:25'),(101,'Tambah Taman Eko-Rimba Jambu Bongkok',13,NULL,'2017-11-06 13:43:36','2017-11-06 13:43:36'),(102,'Tambah Taman Eko-Rimba Sekayu',13,NULL,'2017-11-06 13:43:45','2017-11-06 13:43:45'),(103,'Tambah Taman Eko-Rimba Lata Payung',13,NULL,'2017-11-06 13:43:56','2017-11-06 13:43:56'),(104,'Tambah Taman Eko-Rimba Lata Tembakah',13,NULL,'2017-11-06 13:44:09','2017-11-06 13:44:09'),(105,'Tambah Taman Eko-Rimba Lata Belatan',13,NULL,'2017-11-06 13:44:20','2017-11-06 13:44:20'),(106,'Tambah Gunung Batu Putih',24,NULL,'2017-11-06 13:45:56','2017-11-06 13:45:56'),(107,'Tambah Tempah Kemudahan ',24,NULL,'2017-11-06 14:02:26','2017-11-06 14:02:26'),(108,'Tambah Gunung Kinjang',24,NULL,'2017-11-06 14:04:08','2017-11-06 14:04:08'),(109,'Update Gunung Liang',24,NULL,'2017-11-06 14:04:18','2017-11-06 14:04:18'),(110,'Tambah Gunung Tumang Batak',24,NULL,'2017-11-06 14:05:12','2017-11-06 14:05:12'),(111,'Tambah Gunung Bujang Melaka',24,NULL,'2017-11-06 14:05:39','2017-11-06 14:05:39'),(112,'Tambah Gunung Ulu Sungkai',24,NULL,'2017-11-06 14:07:42','2017-11-06 14:07:42'),(113,'Tambah Gunung Ulu Kinjor',24,NULL,'2017-11-06 14:08:14','2017-11-06 14:08:14'),(114,'Tambah Gunung Sanggul',24,NULL,'2017-11-06 14:08:41','2017-11-06 14:08:41'),(115,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 14:09:23','2017-11-06 14:09:23'),(116,'Tambah Gunung Inas & Bintang Hijau',24,NULL,'2017-11-06 14:09:55','2017-11-06 14:09:55'),(117,'Update Tempah Kemudahan ',13,NULL,'2017-11-06 14:14:26','2017-11-06 14:14:26'),(118,'Update Tempah Kemudahan ',13,NULL,'2017-11-06 14:14:46','2017-11-06 14:14:46'),(119,'Log Keluar',24,NULL,'2017-11-06 14:16:21','2017-11-06 14:16:21'),(120,'Mulai log masuk',25,NULL,'2017-11-06 14:17:04','2017-11-06 14:17:04'),(121,'Hapus Tempah Kemudahan ',13,NULL,'2017-11-06 14:18:36','2017-11-06 14:18:36'),(122,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 14:22:16','2017-11-06 14:22:16'),(123,'Update Tempah Kemudahan ',13,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(124,'Log Keluar',25,NULL,'2017-11-06 14:23:13','2017-11-06 14:23:13'),(125,'Mulai log masuk',26,NULL,'2017-11-06 14:23:21','2017-11-06 14:23:21'),(126,'Log Keluar',26,NULL,'2017-11-06 14:25:15','2017-11-06 14:25:15'),(127,'Mulai log masuk',27,NULL,'2017-11-06 14:37:18','2017-11-06 14:37:18'),(128,'Hapus Gunung Test Gunung',13,NULL,'2017-11-06 14:41:13','2017-11-06 14:41:13'),(129,'Status Permohonan Diluluskan',13,NULL,'2017-11-06 14:44:27','2017-11-06 14:44:27'),(130,'Log Keluar',19,NULL,'2017-11-06 14:51:06','2017-11-06 14:51:06'),(131,'Log Keluar',20,NULL,'2017-11-06 15:00:14','2017-11-06 15:00:14'),(132,'Mulai log masuk',28,NULL,'2017-11-06 15:00:41','2017-11-06 15:00:41'),(133,'Tambah Pengguna PHD Sekayu',13,NULL,'2017-11-06 15:14:57','2017-11-06 15:14:57'),(134,'Log Keluar',28,NULL,'2017-11-06 15:15:11','2017-11-06 15:15:11'),(135,'Mulai log masuk',29,NULL,'2017-11-06 15:16:55','2017-11-06 15:16:55'),(136,'Mulai log masuk',30,NULL,'2017-11-06 15:16:57','2017-11-06 15:16:57'),(137,'Mulai log masuk',31,NULL,'2017-11-06 15:17:02','2017-11-06 15:17:02'),(138,'Log Keluar',31,NULL,'2017-11-06 15:18:52','2017-11-06 15:18:52'),(139,'Mulai log masuk',32,NULL,'2017-11-06 15:19:49','2017-11-06 15:19:49'),(140,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(141,'Log Keluar',27,NULL,'2017-11-06 15:35:14','2017-11-06 15:35:14'),(142,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(143,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(144,'Tambah Tempah Kemudahan ',13,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19'),(145,'Log Keluar',29,NULL,'2017-11-06 15:46:58','2017-11-06 15:46:58'),(146,'Mulai log masuk',33,NULL,'2017-11-06 15:47:08','2017-11-06 15:47:08'),(147,'Mulai log masuk',34,NULL,'2017-11-06 15:54:39','2017-11-06 15:54:39'),(148,'Log Keluar',33,NULL,'2017-11-06 16:34:01','2017-11-06 16:34:01'),(149,'Mulai log masuk',35,NULL,'2017-11-06 17:03:05','2017-11-06 17:03:05'),(150,'Tambah Negeri Melaka',35,NULL,'2017-11-06 17:08:09','2017-11-06 17:08:09'),(151,'Tambah Negeri Pulau Pinang',35,NULL,'2017-11-06 17:09:10','2017-11-06 17:09:10'),(152,'Tambah Negeri Perlis',35,NULL,'2017-11-06 17:09:22','2017-11-06 17:09:22'),(153,'Tambah Negeri Wilayah Persekutuan Kuala Lumpur',35,NULL,'2017-11-06 17:09:43','2017-11-06 17:09:43'),(154,'Tambah Negeri Pahang',35,NULL,'2017-11-06 17:13:37','2017-11-06 17:13:37'),(155,'Tambah Negeri Selangor',35,NULL,'2017-11-06 17:13:56','2017-11-06 17:13:56'),(156,'Tambah Negeri IPJPSM',35,NULL,'2017-11-06 17:14:27','2017-11-06 17:14:27'),(157,'Hapus Daerah Test Daerah',35,NULL,'2017-11-06 17:15:57','2017-11-06 17:15:57'),(158,'Update Negeri Johor',35,NULL,'2017-11-06 17:19:51','2017-11-06 17:19:51'),(159,'Tambah Daerah Johor Selatan',35,NULL,'2017-11-06 17:28:01','2017-11-06 17:28:01'),(160,'Tambah Daerah Johor Tengah',35,NULL,'2017-11-06 17:28:11','2017-11-06 17:28:11'),(161,'Tambah Daerah Johor Timur',35,NULL,'2017-11-06 17:28:22','2017-11-06 17:28:22'),(162,'Tambah Daerah Johor Utara',35,NULL,'2017-11-06 17:28:33','2017-11-06 17:28:33'),(163,'Tambah Daerah Kedah Selatan',35,NULL,'2017-11-06 17:28:49','2017-11-06 17:28:49'),(164,'Tambah Daerah Kedah Tengah',35,NULL,'2017-11-06 17:29:01','2017-11-06 17:29:01'),(165,'Tambah Daerah Kedah Utara',35,NULL,'2017-11-06 17:29:12','2017-11-06 17:29:12'),(166,'Tambah Daerah Jajahan Kelantan Barat',35,NULL,'2017-11-06 17:29:32','2017-11-06 17:29:32'),(167,'Tambah Daerah Jajahan Kelantan Selatan',35,NULL,'2017-11-06 17:29:42','2017-11-06 17:29:42'),(168,'Tambah Daerah Jajahan Kelantan Timur',35,NULL,'2017-11-06 17:29:51','2017-11-06 17:29:51'),(169,'Tambah Daerah Melaka',35,NULL,'2017-11-06 17:30:00','2017-11-06 17:30:00'),(170,'Tambah Daerah Negeri Sembilan Barat',35,NULL,'2017-11-06 17:30:15','2017-11-06 17:30:15'),(171,'Tambah Daerah Negeri Sembilan Timur',35,NULL,'2017-11-06 17:30:24','2017-11-06 17:30:24'),(172,'Tambah Daerah Negeri Sembilan Utara',35,NULL,'2017-11-06 17:30:34','2017-11-06 17:30:34'),(173,'Tambah Daerah Pulau Pinang',35,NULL,'2017-11-06 17:31:03','2017-11-06 17:31:03'),(174,'Tambah Daerah Perlis',35,NULL,'2017-11-06 17:31:12','2017-11-06 17:31:12'),(175,'Tambah Daerah Hulu Selangor',35,NULL,'2017-11-06 17:31:28','2017-11-06 17:31:28'),(176,'Tambah Daerah Pantai Klang',35,NULL,'2017-11-06 17:31:42','2017-11-06 17:31:42'),(177,'Tambah Daerah Selangor Tengah',35,NULL,'2017-11-06 17:31:56','2017-11-06 17:31:56'),(178,'Tambah Hutan Simpan Kekal Hulu Telemong',35,NULL,'2017-11-06 17:41:50','2017-11-06 17:41:50'),(179,'Tambah Hutan Simpan Kekal Hulu Terengganu',35,NULL,'2017-11-06 17:42:09','2017-11-06 17:42:09'),(180,'Tambah Hutan Simpan Kekal Jerangau',35,NULL,'2017-11-06 17:42:20','2017-11-06 17:42:20'),(181,'Tambah Hutan Simpan Kekal Pasir Raja Barat',35,NULL,'2017-11-06 17:42:33','2017-11-06 17:42:33'),(182,'Tambah Hutan Simpan Kekal Petuang',35,NULL,'2017-11-06 17:42:46','2017-11-06 17:42:46'),(183,'Tambah Hutan Simpan Kekal Tembat',35,NULL,'2017-11-06 17:42:57','2017-11-06 17:42:57'),(184,'Tambah Hutan Simpan Kekal Hulu Terengganu Tambahan',35,NULL,'2017-11-06 17:43:23','2017-11-06 17:43:23'),(185,'Tambah Hutan Simpan Kekal Bukit Chanat',35,NULL,'2017-11-06 17:43:43','2017-11-06 17:43:43'),(186,'Mulai log masuk',36,NULL,'2017-11-06 17:51:47','2017-11-06 17:51:47'),(187,'Tambah Pengguna Ikhwan',35,NULL,'2017-11-06 19:17:18','2017-11-06 19:17:18'),(188,'Log Keluar',36,NULL,'2017-11-06 19:17:59','2017-11-06 19:17:59'),(189,'Mulai log masuk',37,NULL,'2017-11-06 19:18:36','2017-11-06 19:18:36'),(190,'Mulai log masuk',38,NULL,'2017-11-06 20:53:49','2017-11-06 20:53:49'),(191,'Mulai log masuk',39,NULL,'2017-11-06 22:29:57','2017-11-06 22:29:57'),(192,'Mulai log masuk',40,NULL,'2017-11-06 22:46:40','2017-11-06 22:46:40'),(193,'Log Keluar',40,NULL,'2017-11-06 22:47:04','2017-11-06 22:47:04'),(194,'Mulai log masuk',41,NULL,'2017-11-06 22:51:35','2017-11-06 22:51:35'),(195,'Mulai log masuk',42,NULL,'2017-11-06 23:46:05','2017-11-06 23:46:05'),(196,'Mulai log masuk',43,NULL,'2017-11-07 09:32:10','2017-11-07 09:32:10'),(197,'Log Keluar',43,NULL,'2017-11-07 09:58:00','2017-11-07 09:58:00'),(198,'Mulai log masuk',44,NULL,'2017-11-07 09:58:08','2017-11-07 09:58:08'),(199,'Mulai log masuk',45,NULL,'2017-11-07 10:18:33','2017-11-07 10:18:33'),(200,'Mulai log masuk',46,NULL,'2017-11-07 10:18:54','2017-11-07 10:18:54'),(201,'Log Keluar',45,NULL,'2017-11-07 10:21:33','2017-11-07 10:21:33'),(202,'Log Keluar',46,NULL,'2017-11-07 10:21:53','2017-11-07 10:21:53'),(203,'Mulai log masuk',47,NULL,'2017-11-07 10:26:53','2017-11-07 10:26:53'),(204,'Mulai log masuk',48,NULL,'2017-11-07 10:27:15','2017-11-07 10:27:15'),(205,'Mulai log masuk',49,NULL,'2017-11-07 10:27:44','2017-11-07 10:27:44'),(206,'Mulai log masuk',50,NULL,'2017-11-07 10:33:46','2017-11-07 10:33:46'),(207,'Mulai log masuk',51,NULL,'2017-11-07 10:55:11','2017-11-07 10:55:11'),(208,'Tambah Hutan Simpan Kekal Piah',44,NULL,'2017-11-07 10:56:06','2017-11-07 10:56:06'),(209,'Mulai log masuk',52,NULL,'2017-11-07 10:56:45','2017-11-07 10:56:45'),(210,'Mulai log masuk',53,NULL,'2017-11-07 12:04:18','2017-11-07 12:04:18'),(211,'Log Keluar',53,NULL,'2017-11-07 12:06:30','2017-11-07 12:06:30'),(212,'Mulai log masuk',54,NULL,'2017-11-07 12:13:16','2017-11-07 12:13:16'),(213,'Mulai log masuk',55,NULL,'2017-11-07 13:59:34','2017-11-07 13:59:34'),(214,'Tambah Hutan Simpan Kekal Behrang',55,NULL,'2017-11-07 14:01:22','2017-11-07 14:01:22'),(215,'Mulai log masuk',56,NULL,'2017-11-07 14:12:15','2017-11-07 14:12:15'),(216,'Tambah Hutan Simpan Kekal Behrang',55,NULL,'2017-11-07 14:31:01','2017-11-07 14:31:01'),(217,'Mulai log masuk',57,NULL,'2017-11-07 14:34:55','2017-11-07 14:34:55'),(218,'Mulai log masuk',58,NULL,'2017-11-07 15:59:59','2017-11-07 15:59:59'),(219,'Log Keluar',58,NULL,'2017-11-07 16:02:26','2017-11-07 16:02:26'),(220,'Mulai log masuk',59,NULL,'2017-11-07 16:57:57','2017-11-07 16:57:57'),(221,'Mulai log masuk',60,NULL,'2017-11-07 18:07:15','2017-11-07 18:07:15'),(222,'Mulai log masuk',61,NULL,'2017-11-07 18:48:22','2017-11-07 18:48:22'),(223,'Mulai log masuk',62,NULL,'2017-11-07 18:52:16','2017-11-07 18:52:16'),(224,'Update Taman Eko-Rimba Taman Eko Rimba Ulu Kenas',62,NULL,'2017-11-07 18:54:14','2017-11-07 18:54:14'),(225,'Update Taman Eko-Rimba Sekayu',61,NULL,'2017-11-07 19:08:48','2017-11-07 19:08:48'),(226,'Mulai log masuk',63,NULL,'2017-11-07 21:29:31','2017-11-07 21:29:31'),(227,'Mulai log masuk',64,NULL,'2017-11-07 22:56:08','2017-11-07 22:56:08'),(228,'Tambah Gunung Gunung Tebu',64,NULL,'2017-11-07 23:08:40','2017-11-07 23:08:40'),(229,'Update Gunung Inas & Bintang Hijau',64,NULL,'2017-11-07 23:09:52','2017-11-07 23:09:52'),(230,'Mulai log masuk',65,NULL,'2017-11-08 08:42:43','2017-11-08 08:42:43'),(231,'Log Keluar',65,NULL,'2017-11-08 08:45:49','2017-11-08 08:45:49'),(232,'Mulai log masuk',66,NULL,'2017-11-08 08:48:16','2017-11-08 08:48:16'),(233,'Mulai log masuk',67,NULL,'2017-11-08 09:42:10','2017-11-08 09:42:10'),(234,'Mulai log masuk',68,NULL,'2017-11-08 11:47:08','2017-11-08 11:47:08'),(235,'Mulai log masuk',69,NULL,'2017-11-08 15:09:53','2017-11-08 15:09:53'),(236,'Mulai log masuk',70,NULL,'2017-11-08 15:30:09','2017-11-08 15:30:09'),(237,'Log Keluar',70,NULL,'2017-11-08 15:30:12','2017-11-08 15:30:12'),(238,'Mulai log masuk',71,NULL,'2017-11-08 15:30:48','2017-11-08 15:30:48'),(239,'Log Keluar',71,NULL,'2017-11-08 15:31:42','2017-11-08 15:31:42'),(240,'Mulai log masuk',72,NULL,'2017-11-08 16:12:07','2017-11-08 16:12:07'),(241,'Mulai log masuk',73,NULL,'2017-11-08 16:19:06','2017-11-08 16:19:06'),(242,'Log Keluar',73,NULL,'2017-11-08 16:26:39','2017-11-08 16:26:39'),(243,'Mulai log masuk',74,NULL,'2017-11-08 16:35:04','2017-11-08 16:35:04'),(244,'Mulai log masuk',75,NULL,'2017-11-08 18:49:55','2017-11-08 18:49:55'),(245,'Hapus Pengguna Ikhwan',75,NULL,'2017-11-08 18:50:31','2017-11-08 18:50:31'),(246,'Tambah Pengguna Ikhwan',75,NULL,'2017-11-08 18:51:28','2017-11-08 18:51:28'),(247,'Mulai log masuk',76,NULL,'2017-11-08 18:52:49','2017-11-08 18:52:49'),(248,'Log Keluar',76,NULL,'2017-11-08 18:53:59','2017-11-08 18:53:59'),(249,'Mulai log masuk',77,NULL,'2017-11-08 18:54:13','2017-11-08 18:54:13'),(250,'Status Permohonan Diluluskan',77,NULL,'2017-11-08 18:55:09','2017-11-08 18:55:09'),(251,'Status Permohonan Selesai',77,NULL,'2017-11-08 18:55:14','2017-11-08 18:55:14'),(252,'Mulai log masuk',78,NULL,'2017-11-08 23:11:06','2017-11-08 23:11:06'),(253,'Mulai log masuk',79,NULL,'2017-11-09 00:19:36','2017-11-09 00:19:36'),(254,'Log Keluar',79,NULL,'2017-11-09 00:21:12','2017-11-09 00:21:12'),(255,'Mulai log masuk',80,NULL,'2017-11-09 00:21:16','2017-11-09 00:21:16'),(256,'Log Keluar',80,NULL,'2017-11-09 00:23:00','2017-11-09 00:23:00'),(257,'Mulai log masuk',81,NULL,'2017-11-09 00:23:04','2017-11-09 00:23:04'),(258,'Mulai log masuk',82,NULL,'2017-11-09 00:34:09','2017-11-09 00:34:09'),(259,'Mulai log masuk',83,NULL,'2017-11-09 09:43:37','2017-11-09 09:43:37'),(260,'Log Keluar',83,NULL,'2017-11-09 09:44:13','2017-11-09 09:44:13'),(261,'Mulai log masuk',84,NULL,'2017-11-09 10:18:00','2017-11-09 10:18:00'),(262,'Mulai log masuk',85,NULL,'2017-11-09 10:21:21','2017-11-09 10:21:21'),(263,'Log Keluar',85,NULL,'2017-11-09 10:28:24','2017-11-09 10:28:24'),(264,'Mulai log masuk',86,NULL,'2017-11-09 10:28:55','2017-11-09 10:28:55'),(265,'Mulai log masuk',87,NULL,'2017-11-09 10:34:19','2017-11-09 10:34:19'),(266,'Mulai log masuk',88,NULL,'2017-11-09 10:48:58','2017-11-09 10:48:58'),(267,'Mulai log masuk',89,NULL,'2017-11-09 10:58:37','2017-11-09 10:58:37'),(268,'Mulai log masuk',90,NULL,'2017-11-09 11:26:37','2017-11-09 11:26:37'),(269,'Log Keluar',90,NULL,'2017-11-09 11:29:56','2017-11-09 11:29:56'),(270,'Mulai log masuk',91,NULL,'2017-11-09 11:30:04','2017-11-09 11:30:04'),(271,'Log Keluar',91,NULL,'2017-11-09 11:30:54','2017-11-09 11:30:54'),(272,'Mulai log masuk',92,NULL,'2017-11-09 11:30:58','2017-11-09 11:30:58'),(273,'Log Keluar',92,NULL,'2017-11-09 11:32:37','2017-11-09 11:32:37'),(274,'Mulai log masuk',93,NULL,'2017-11-09 11:32:42','2017-11-09 11:32:42'),(275,'Log Keluar',93,NULL,'2017-11-09 11:33:30','2017-11-09 11:33:30'),(276,'Mulai log masuk',94,NULL,'2017-11-09 11:33:34','2017-11-09 11:33:34'),(277,'Log Keluar',94,NULL,'2017-11-09 11:37:28','2017-11-09 11:37:28'),(278,'Mulai log masuk',95,NULL,'2017-11-09 11:37:35','2017-11-09 11:37:35'),(279,'Log Keluar',86,NULL,'2017-11-09 12:19:19','2017-11-09 12:19:19'),(280,'Mulai log masuk',96,NULL,'2017-11-09 12:19:25','2017-11-09 12:19:25'),(281,'Status Permohonan Dibatalkan',96,NULL,'2017-11-09 12:21:41','2017-11-09 12:21:41'),(282,'Mulai log masuk',97,NULL,'2017-11-09 14:44:28','2017-11-09 14:44:28'),(283,'Log Keluar',97,NULL,'2017-11-09 14:45:35','2017-11-09 14:45:35'),(284,'Mulai log masuk',98,NULL,'2017-11-09 14:45:38','2017-11-09 14:45:38'),(285,'Update Gunung Gunung Tebu',98,NULL,'2017-11-09 14:46:53','2017-11-09 14:46:53'),(286,'Update Gunung Liang',98,NULL,'2017-11-09 14:47:08','2017-11-09 14:47:08'),(287,'Log Keluar',98,NULL,'2017-11-09 14:48:10','2017-11-09 14:48:10'),(288,'Mulai log masuk',99,NULL,'2017-11-09 14:48:16','2017-11-09 14:48:16'),(289,'Log Keluar',99,NULL,'2017-11-09 14:50:36','2017-11-09 14:50:36'),(290,'Mulai log masuk',100,NULL,'2017-11-09 14:50:41','2017-11-09 14:50:41'),(291,'Mulai log masuk',101,NULL,'2017-11-09 15:17:29','2017-11-09 15:17:29'),(292,'Mulai log masuk',102,NULL,'2017-11-09 16:05:43','2017-11-09 16:05:43'),(293,'Log Keluar',102,NULL,'2017-11-09 16:06:02','2017-11-09 16:06:02'),(294,'Mulai log masuk',103,NULL,'2017-11-09 16:06:07','2017-11-09 16:06:07'),(295,'Mulai log masuk',104,NULL,'2017-11-09 17:26:15','2017-11-09 17:26:15'),(296,'Log Keluar',104,NULL,'2017-11-09 17:33:30','2017-11-09 17:33:30'),(297,'Mulai log masuk',105,NULL,'2017-11-09 17:33:34','2017-11-09 17:33:34'),(298,'Log Keluar',105,NULL,'2017-11-09 17:33:41','2017-11-09 17:33:41'),(299,'Mulai log masuk',106,NULL,'2017-11-09 17:33:45','2017-11-09 17:33:45'),(300,'Log Keluar',106,NULL,'2017-11-09 17:33:55','2017-11-09 17:33:55'),(301,'Mulai log masuk',107,NULL,'2017-11-09 17:34:00','2017-11-09 17:34:00'),(302,'Mulai log masuk',108,NULL,'2017-11-09 20:03:20','2017-11-09 20:03:20'),(303,'Log Keluar',108,NULL,'2017-11-09 22:06:30','2017-11-09 22:06:30'),(304,'Mulai log masuk',109,NULL,'2017-11-09 22:06:36','2017-11-09 22:06:36'),(305,'Mulai log masuk',110,NULL,'2017-11-10 00:26:25','2017-11-10 00:26:25'),(306,'Mulai log masuk',111,NULL,'2017-11-10 09:45:07','2017-11-10 09:45:07'),(307,'Mulai log masuk',112,NULL,'2017-11-10 10:35:05','2017-11-10 10:35:05'),(308,'Log Keluar',111,NULL,'2017-11-10 11:25:08','2017-11-10 11:25:08'),(309,'Mulai log masuk',113,NULL,'2017-11-10 11:26:07','2017-11-10 11:26:07'),(310,'Mulai log masuk',114,NULL,'2017-11-10 11:26:25','2017-11-10 11:26:25'),(311,'Mulai log masuk',115,NULL,'2017-11-10 12:06:51','2017-11-10 12:06:51'),(312,'Log Keluar',115,NULL,'2017-11-10 12:09:22','2017-11-10 12:09:22'),(313,'Mulai log masuk',116,NULL,'2017-11-10 12:10:01','2017-11-10 12:10:01'),(314,'Mulai log masuk',117,NULL,'2017-11-10 12:12:51','2017-11-10 12:12:51'),(315,'Mulai log masuk',118,NULL,'2017-11-10 14:55:35','2017-11-10 14:55:35'),(316,'Mulai log masuk',119,NULL,'2017-11-10 21:19:52','2017-11-10 21:19:52'),(317,'Mulai log masuk',120,NULL,'2017-11-10 21:21:35','2017-11-10 21:21:35'),(318,'Status Permohonan Diluluskan',119,NULL,'2017-11-10 21:26:30','2017-11-10 21:26:30'),(319,'Status Permohonan Selesai',119,NULL,'2017-11-10 21:27:56','2017-11-10 21:27:56'),(320,'Log Keluar',119,NULL,'2017-11-10 22:40:03','2017-11-10 22:40:03'),(321,'Mulai log masuk',121,NULL,'2017-11-10 23:08:21','2017-11-10 23:08:21'),(322,'Mulai log masuk',122,NULL,'2017-11-11 10:36:58','2017-11-11 10:36:58'),(323,'Log Keluar',122,NULL,'2017-11-11 10:58:52','2017-11-11 10:58:52'),(324,'Mulai log masuk',123,NULL,'2017-11-11 10:59:08','2017-11-11 10:59:08'),(325,'Mulai log masuk',124,NULL,'2017-11-11 21:34:12','2017-11-11 21:34:12'),(326,'Mulai log masuk',125,NULL,'2017-11-12 01:01:05','2017-11-12 01:01:05'),(327,'Mulai log masuk',126,NULL,'2017-11-12 13:36:44','2017-11-12 13:36:44'),(328,'Log Keluar',126,NULL,'2017-11-12 18:27:31','2017-11-12 18:27:31'),(329,'Mulai log masuk',127,NULL,'2017-11-12 18:27:38','2017-11-12 18:27:38'),(330,'Export Pdf: Lain-lain aktiviti',127,NULL,'2017-11-12 18:27:48','2017-11-12 18:27:48'),(331,'Export Excel: Lain-lain aktiviti',127,NULL,'2017-11-12 18:27:51','2017-11-12 18:27:51'),(332,'Export Excel: Lain-lain aktiviti',127,NULL,'2017-11-12 18:27:52','2017-11-12 18:27:52'),(333,'Log Keluar',127,NULL,'2017-11-12 18:31:04','2017-11-12 18:31:04'),(334,'Mulai log masuk',128,NULL,'2017-11-12 18:31:40','2017-11-12 18:31:40'),(335,'Log Keluar',128,NULL,'2017-11-12 18:31:51','2017-11-12 18:31:51'),(336,'Mulai log masuk',129,NULL,'2017-11-12 18:35:18','2017-11-12 18:35:18'),(337,'Status Permohonan Diluluskan',129,NULL,'2017-11-12 19:00:03','2017-11-12 19:00:03'),(338,'Mulai log masuk',130,NULL,'2017-11-12 19:11:46','2017-11-12 19:11:46'),(339,'Log Keluar',130,NULL,'2017-11-12 19:11:58','2017-11-12 19:11:58'),(340,'Status Permohonan Selesai',129,NULL,'2017-11-12 19:13:48','2017-11-12 19:13:48'),(341,'Mulai log masuk',131,NULL,'2017-11-12 19:16:53','2017-11-12 19:16:53'),(342,'Log Keluar',131,NULL,'2017-11-12 19:17:23','2017-11-12 19:17:23'),(343,'Mulai log masuk',132,NULL,'2017-11-12 19:17:30','2017-11-12 19:17:30'),(344,'Log Keluar',132,NULL,'2017-11-12 19:17:41','2017-11-12 19:17:41'),(345,'Mulai log masuk',133,NULL,'2017-11-12 19:17:45','2017-11-12 19:17:45'),(346,'Mulai log masuk',134,NULL,'2017-11-12 19:18:23','2017-11-12 19:18:23'),(347,'Log Keluar',134,NULL,'2017-11-12 19:22:06','2017-11-12 19:22:06'),(348,'Mulai log masuk',135,NULL,'2017-11-12 19:23:01','2017-11-12 19:23:01'),(349,'Mulai log masuk',136,NULL,'2017-11-12 21:41:58','2017-11-12 21:41:58'),(350,'Export Excel: Lain-lain aktiviti',136,NULL,'2017-11-12 21:42:10','2017-11-12 21:42:10'),(351,'Export Excel: Lain-lain aktiviti',136,NULL,'2017-11-12 21:42:11','2017-11-12 21:42:11'),(352,'Log Keluar',136,NULL,'2017-11-12 21:49:53','2017-11-12 21:49:53'),(353,'Mulai log masuk',137,NULL,'2017-11-12 21:50:03','2017-11-12 21:50:03'),(354,'Log Keluar',137,NULL,'2017-11-12 21:54:33','2017-11-12 21:54:33'),(355,'Mulai log masuk',138,NULL,'2017-11-12 21:54:53','2017-11-12 21:54:53'),(356,'Mulai log masuk',139,NULL,'2017-11-13 11:22:56','2017-11-13 11:22:56'),(357,'Log Keluar',139,NULL,'2017-11-13 12:29:11','2017-11-13 12:29:11'),(358,'Mulai log masuk',140,NULL,'2017-11-13 12:29:15','2017-11-13 12:29:15'),(359,'Mulai log masuk',141,NULL,'2017-11-13 12:29:17','2017-11-13 12:29:17'),(360,'Log Keluar',141,NULL,'2017-11-13 12:29:28','2017-11-13 12:29:28'),(361,'Mulai log masuk',142,NULL,'2017-11-13 12:30:36','2017-11-13 12:30:36'),(362,'Log Keluar',140,NULL,'2017-11-13 13:12:42','2017-11-13 13:12:42'),(363,'Mulai log masuk',143,NULL,'2017-11-13 13:12:48','2017-11-13 13:12:48'),(364,'Mulai log masuk',144,NULL,'2017-11-13 15:59:57','2017-11-13 15:59:57'),(365,'Log Keluar',144,NULL,'2017-11-13 16:03:54','2017-11-13 16:03:54'),(366,'Mulai log masuk',145,NULL,'2017-11-13 16:03:59','2017-11-13 16:03:59'),(367,'Update Taman Eko-Rimba Lata Tembakah',145,NULL,'2017-11-13 16:06:45','2017-11-13 16:06:45'),(368,'Tambah Hutan Simpan Kekal Pelagat',145,NULL,'2017-11-13 16:08:03','2017-11-13 16:08:03'),(369,'Update Taman Eko-Rimba Lata Belatan',145,NULL,'2017-11-13 16:08:28','2017-11-13 16:08:28'),(370,'Log Keluar',145,NULL,'2017-11-13 16:27:38','2017-11-13 16:27:38'),(371,'Mulai log masuk',146,NULL,'2017-11-13 16:27:48','2017-11-13 16:27:48'),(372,'Mulai log masuk',147,NULL,'2017-11-13 17:51:24','2017-11-13 17:51:24'),(373,'Mulai log masuk',148,NULL,'2017-11-13 18:54:40','2017-11-13 18:54:40'),(374,'Tambah Hutan Simpan Kekal Hulu Terengganu (Tambahan)',148,NULL,'2017-11-13 18:59:31','2017-11-13 18:59:31'),(375,'Hapus Hutan Simpan Kekal Hulu Terengganu (Tambahan)',148,NULL,'2017-11-13 18:59:59','2017-11-13 18:59:59'),(376,'Update Taman Eko-Rimba Sekayu',148,NULL,'2017-11-13 19:00:46','2017-11-13 19:00:46'),(377,'Log Keluar',148,NULL,'2017-11-13 19:01:15','2017-11-13 19:01:15'),(378,'Mulai log masuk',149,NULL,'2017-11-13 19:01:17','2017-11-13 19:01:17'),(379,'Log Keluar',149,NULL,'2017-11-13 19:05:00','2017-11-13 19:05:00'),(380,'Mulai log masuk',150,NULL,'2017-11-13 19:05:06','2017-11-13 19:05:06'),(381,'Tambah Daerah Wilayah Persekutuan',150,NULL,'2017-11-13 19:06:17','2017-11-13 19:06:17'),(382,'Tambah Hutan Simpan Kekal Bukit Lagong Tambahan',150,NULL,'2017-11-13 19:07:16','2017-11-13 19:07:16'),(383,'Tambah Hutan Simpan Kekal Bukit Nanas',150,NULL,'2017-11-13 19:07:48','2017-11-13 19:07:48'),(384,'Tambah Hutan Simpan Kekal Sungai Besi',150,NULL,'2017-11-13 19:08:03','2017-11-13 19:08:03'),(385,'Tambah Hutan Simpan Kekal Bukit Sungei Putih',150,NULL,'2017-11-13 19:08:23','2017-11-13 19:08:23'),(386,'Log Keluar',150,NULL,'2017-11-13 19:08:37','2017-11-13 19:08:37'),(387,'Mulai log masuk',151,NULL,'2017-11-13 19:08:40','2017-11-13 19:08:40'),(388,'Mulai log masuk',152,NULL,'2017-11-13 22:00:34','2017-11-13 22:00:34'),(389,'Mulai log masuk',153,NULL,'2017-11-14 00:09:18','2017-11-14 00:09:18'),(390,'Tambah Tempah Kemudahan ',153,NULL,'2017-11-14 00:10:25','2017-11-14 00:10:25'),(391,'Log Keluar',153,NULL,'2017-11-14 00:10:49','2017-11-14 00:10:49'),(392,'Mulai log masuk',154,NULL,'2017-11-14 00:10:56','2017-11-14 00:10:56'),(393,'Mulai log masuk',155,NULL,'2017-11-14 03:41:14','2017-11-14 03:41:14'),(394,'Mulai log masuk',156,NULL,'2017-11-14 08:24:44','2017-11-14 08:24:44'),(395,'Tambah Tempah Kemudahan ',156,NULL,'2017-11-14 08:25:43','2017-11-14 08:25:43'),(396,'Tambah Tempah Kemudahan ',156,NULL,'2017-11-14 08:26:33','2017-11-14 08:26:33'),(397,'Update Tempah Kemudahan ',156,NULL,'2017-11-14 08:26:45','2017-11-14 08:26:45'),(398,'Tambah Tempah Kemudahan ',156,NULL,'2017-11-14 08:27:43','2017-11-14 08:27:43'),(399,'Log Keluar',156,NULL,'2017-11-14 08:35:06','2017-11-14 08:35:06'),(400,'Mulai log masuk',157,NULL,'2017-11-14 08:35:09','2017-11-14 08:35:09'),(401,'Mulai log masuk',158,NULL,'2017-11-14 11:15:18','2017-11-14 11:15:18'),(402,'Log Keluar',158,NULL,'2017-11-14 11:15:26','2017-11-14 11:15:26'),(403,'Mulai log masuk',159,NULL,'2017-11-14 11:15:30','2017-11-14 11:15:30'),(404,'Log Keluar',157,NULL,'2017-11-14 11:56:06','2017-11-14 11:56:06'),(405,'Mulai log masuk',160,NULL,'2017-11-14 11:56:12','2017-11-14 11:56:12'),(406,'Tambah Hutan Simpan Kekal Gunung Arong',160,NULL,'2017-11-14 12:07:18','2017-11-14 12:07:18'),(407,'Tambah Hutan Simpan Kekal Kluang',160,NULL,'2017-11-14 12:07:37','2017-11-14 12:07:37'),(408,'Tambah Hutan Simpan Kekal Panti',160,NULL,'2017-11-14 12:07:50','2017-11-14 12:07:50'),(409,'Tambah Hutan Simpan Kekal Gunong Pulai',160,NULL,'2017-11-14 12:08:11','2017-11-14 12:08:11'),(410,'Tambah Hutan Simpan Kekal Soga',160,NULL,'2017-11-14 12:08:24','2017-11-14 12:08:24'),(411,'Tambah Hutan Simpan Kekal Labis',160,NULL,'2017-11-14 12:08:42','2017-11-14 12:08:42'),(412,'Tambah Taman Eko-Rimba Gunung Arong',160,NULL,'2017-11-14 12:10:03','2017-11-14 12:10:03'),(413,'Tambah Taman Eko-Rimba Gunung Belum',160,NULL,'2017-11-14 12:10:27','2017-11-14 12:10:27'),(414,'Tambah Taman Eko-Rimba Panti',160,NULL,'2017-11-14 12:11:00','2017-11-14 12:11:00'),(415,'Tambah Taman Eko-Rimba Gunung Pulai 2',160,NULL,'2017-11-14 12:11:24','2017-11-14 12:11:24'),(416,'Tambah Taman Eko-Rimba Gunung Pulai 1',160,NULL,'2017-11-14 12:11:46','2017-11-14 12:11:46'),(417,'Tambah Daerah Ulu Perak',160,NULL,'2017-11-14 12:13:40','2017-11-14 12:13:40'),(418,'Tambah Hutan Simpan Kekal Belum',160,NULL,'2017-11-14 12:14:38','2017-11-14 12:14:38'),(419,'Tambah Hutan Simpan Kekal Bintang Hijau (Hulu Perak)',160,NULL,'2017-11-14 12:15:31','2017-11-14 12:15:31'),(420,'Tambah Hutan Simpan Kekal Bukit Larut (Larut/Matang)',160,NULL,'2017-11-14 12:15:58','2017-11-14 12:15:58'),(421,'Tambah Hutan Simpan Kekal Jebong',160,NULL,'2017-11-14 12:16:15','2017-11-14 12:16:15'),(422,'Tambah Hutan Simpan Kekal Bubu (Kuala Kangsar)',160,NULL,'2017-11-14 12:16:38','2017-11-14 12:16:38'),(423,'Tambah Daerah Kinta / Manjung',160,NULL,'2017-11-14 12:17:17','2017-11-14 12:17:17'),(424,'Update Daerah Larut / Matang',160,NULL,'2017-11-14 12:17:35','2017-11-14 12:17:35'),(425,'Tambah Hutan Simpan Kekal Kledang Saiong (Kinta / Manjung)',160,NULL,'2017-11-14 12:20:14','2017-11-14 12:20:14'),(426,'Tambah Hutan Simpan Kekal Bukit Kinta',160,NULL,'2017-11-14 12:20:37','2017-11-14 12:20:37'),(427,'Tambah Hutan Simpan Kekal Bubu (Kinta / Manjung)',160,NULL,'2017-11-14 12:21:36','2017-11-14 12:21:36'),(428,'Tambah Hutan Simpan Kekal Segari Melintang',160,NULL,'2017-11-14 12:21:59','2017-11-14 12:21:59'),(429,'Tambah Hutan Simpan Kekal Pangkor Laut',160,NULL,'2017-11-14 12:22:15','2017-11-14 12:22:15'),(430,'Tambah Hutan Simpan Kekal Bujang Melaka (Kinta/Manjung)',160,NULL,'2017-11-14 12:22:50','2017-11-14 12:22:50'),(431,'Tambah Hutan Simpan Kekal Bukit Tapah',160,NULL,'2017-11-14 12:23:15','2017-11-14 12:23:15'),(432,'Update Taman Eko-Rimba Kuala Woh',160,NULL,'2017-11-14 12:24:39','2017-11-14 12:24:39'),(433,'Update Taman Eko-Rimba Pulau Tali Kail',160,NULL,'2017-11-14 12:25:33','2017-11-14 12:25:33'),(434,'Update Taman Eko-Rimba Lata Kekabu',160,NULL,'2017-11-14 12:26:38','2017-11-14 12:26:38'),(435,'Log Keluar',160,NULL,'2017-11-14 12:27:06','2017-11-14 12:27:06'),(436,'Mulai log masuk',161,NULL,'2017-11-14 12:27:08','2017-11-14 12:27:08'),(437,'Log Keluar',161,NULL,'2017-11-14 13:22:48','2017-11-14 13:22:48'),(438,'Mulai log masuk',162,NULL,'2017-11-14 13:22:55','2017-11-14 13:22:55'),(439,'Mulai log masuk',163,NULL,'2017-11-14 13:26:17','2017-11-14 13:26:17'),(440,'Mulai log masuk',164,NULL,'2017-11-14 13:26:29','2017-11-14 13:26:29'),(441,'Log Keluar',164,NULL,'2017-11-14 13:28:58','2017-11-14 13:28:58'),(442,'Mulai log masuk',165,NULL,'2017-11-14 13:29:03','2017-11-14 13:29:03'),(443,'Log Keluar',165,NULL,'2017-11-14 13:29:32','2017-11-14 13:29:32'),(444,'Mulai log masuk',166,NULL,'2017-11-14 13:29:33','2017-11-14 13:29:33'),(445,'Log Keluar',166,NULL,'2017-11-14 13:34:54','2017-11-14 13:34:54'),(446,'Mulai log masuk',167,NULL,'2017-11-14 13:35:06','2017-11-14 13:35:06'),(447,'Log Keluar',163,NULL,'2017-11-14 13:35:32','2017-11-14 13:35:32'),(448,'Mulai log masuk',168,NULL,'2017-11-14 13:35:38','2017-11-14 13:35:38'),(449,'Log Keluar',167,NULL,'2017-11-14 13:35:42','2017-11-14 13:35:42'),(450,'Mulai log masuk',169,NULL,'2017-11-14 13:35:51','2017-11-14 13:35:51'),(451,'Tambah Taman Eko-Rimba Pusat Eko-Pelajaran',169,NULL,'2017-11-14 13:36:27','2017-11-14 13:36:27'),(452,'Tambah Taman Eko-Rimba Ulu Kenas',169,NULL,'2017-11-14 13:38:24','2017-11-14 13:38:24'),(453,'Tambah Hutan Simpan Kekal Gunung Bongsu',169,NULL,'2017-11-14 13:40:55','2017-11-14 13:40:55'),(454,'Tambah Hutan Simpan Kekal Gunung Inas',169,NULL,'2017-11-14 13:41:14','2017-11-14 13:41:14'),(455,'Tambah Hutan Simpan Kekal Rimba Teloi Selatan',169,NULL,'2017-11-14 13:41:37','2017-11-14 13:41:37'),(456,'Tambah Hutan Simpan Kekal Bukit Enggang',169,NULL,'2017-11-14 13:41:54','2017-11-14 13:41:54'),(457,'Tambah Hutan Simpan Kekal Bukit Perak',169,NULL,'2017-11-14 13:42:11','2017-11-14 13:42:11'),(458,'Tambah Hutan Simpan Kekal Gunung Jerai',169,NULL,'2017-11-14 13:42:27','2017-11-14 13:42:27'),(459,'Tambah Hutan Simpan Kekal Rimba Teloi Tengah',169,NULL,'2017-11-14 13:43:02','2017-11-14 13:43:02'),(460,'Tambah Hutan Simpan Kekal Bukit Perangin',169,NULL,'2017-11-14 13:43:25','2017-11-14 13:43:25'),(461,'Update Taman Eko-Rimba Ulu Paip',169,NULL,'2017-11-14 13:44:29','2017-11-14 13:44:29'),(462,'Update Taman Eko-Rimba Bukit Hijau',169,NULL,'2017-11-14 13:45:07','2017-11-14 13:45:07'),(463,'Update Taman Eko-Rimba Sungai Sedim',169,NULL,'2017-11-14 13:45:38','2017-11-14 13:45:38'),(464,'Log Keluar',169,NULL,'2017-11-14 13:46:21','2017-11-14 13:46:21'),(465,'Mulai log masuk',170,NULL,'2017-11-14 13:46:23','2017-11-14 13:46:23'),(466,'Log Keluar',170,NULL,'2017-11-14 13:50:43','2017-11-14 13:50:43'),(467,'Mulai log masuk',171,NULL,'2017-11-14 13:51:10','2017-11-14 13:51:10'),(468,'Log Keluar',171,NULL,'2017-11-14 13:55:13','2017-11-14 13:55:13'),(469,'Mulai log masuk',172,NULL,'2017-11-14 13:55:19','2017-11-14 13:55:19'),(470,'Log Keluar',172,NULL,'2017-11-14 14:01:30','2017-11-14 14:01:30'),(471,'Mulai log masuk',173,NULL,'2017-11-14 14:04:50','2017-11-14 14:04:50'),(472,'Log Keluar',173,NULL,'2017-11-14 14:07:08','2017-11-14 14:07:08'),(473,'Mulai log masuk',174,NULL,'2017-11-14 14:07:14','2017-11-14 14:07:14'),(474,'Log Keluar',168,NULL,'2017-11-14 14:45:35','2017-11-14 14:45:35'),(475,'Mulai log masuk',175,NULL,'2017-11-14 14:45:39','2017-11-14 14:45:39'),(476,'Mulai log masuk',176,NULL,'2017-11-14 15:18:18','2017-11-14 15:18:18'),(477,'Log Keluar',176,NULL,'2017-11-14 16:32:24','2017-11-14 16:32:24'),(478,'Mulai log masuk',177,NULL,'2017-11-14 16:32:31','2017-11-14 16:32:31'),(479,'Log Keluar',177,NULL,'2017-11-14 16:33:48','2017-11-14 16:33:48'),(480,'Mulai log masuk',178,NULL,'2017-11-14 16:33:51','2017-11-14 16:33:51'),(481,'Mulai log masuk',179,NULL,'2017-11-14 16:55:42','2017-11-14 16:55:42'),(482,'Update Hutan Simpan Kekal Gunung Tebu',179,NULL,'2017-11-14 16:55:51','2017-11-14 16:55:51'),(483,'Log Keluar',179,NULL,'2017-11-14 16:55:57','2017-11-14 16:55:57'),(484,'Mulai log masuk',180,NULL,'2017-11-14 16:56:02','2017-11-14 16:56:02'),(485,'Log Keluar',178,NULL,'2017-11-14 16:59:01','2017-11-14 16:59:01'),(486,'Mulai log masuk',181,NULL,'2017-11-14 16:59:07','2017-11-14 16:59:07'),(487,'Log Keluar',180,NULL,'2017-11-14 17:01:56','2017-11-14 17:01:56'),(488,'Mulai log masuk',182,NULL,'2017-11-14 17:02:19','2017-11-14 17:02:19'),(489,'Log Keluar',181,NULL,'2017-11-14 17:39:15','2017-11-14 17:39:15'),(490,'Mulai log masuk',183,NULL,'2017-11-14 17:39:17','2017-11-14 17:39:17'),(491,'Log Keluar',183,NULL,'2017-11-14 18:38:55','2017-11-14 18:38:55'),(492,'Mulai log masuk',184,NULL,'2017-11-14 18:40:49','2017-11-14 18:40:49'),(493,'Mulai log masuk',185,NULL,'2017-11-14 21:28:29','2017-11-14 21:28:29'),(494,'Mulai log masuk',186,NULL,'2017-11-15 02:00:10','2017-11-15 02:00:10'),(495,'Mulai log masuk',187,NULL,'2017-11-15 03:44:11','2017-11-15 03:44:11'),(496,'Log Keluar',187,NULL,'2017-11-15 03:44:50','2017-11-15 03:44:50'),(497,'Mulai log masuk',188,NULL,'2017-11-15 03:44:54','2017-11-15 03:44:54'),(498,'Mulai log masuk',189,NULL,'2017-11-15 03:56:08','2017-11-15 03:56:08'),(499,'Export Pdf: Lain-lain aktiviti',189,NULL,'2017-11-15 03:56:16','2017-11-15 03:56:16'),(500,'Mulai log masuk',190,NULL,'2017-11-15 10:16:48','2017-11-15 10:16:48'),(501,'Log Keluar',190,NULL,'2017-11-15 10:17:45','2017-11-15 10:17:45'),(502,'Mulai log masuk',191,NULL,'2017-11-15 10:17:51','2017-11-15 10:17:51'),(503,'Update Hutan Simpan Kekal Piah',191,NULL,'2017-11-15 10:18:09','2017-11-15 10:18:09'),(504,'Update Hutan Simpan Kekal Gunung Tebu',191,NULL,'2017-11-15 10:19:14','2017-11-15 10:19:14'),(505,'Update Gunung Gunung Tebu',191,NULL,'2017-11-15 10:19:31','2017-11-15 10:19:31'),(506,'Update Hutan Simpan Kekal Gunung Tebu',191,NULL,'2017-11-15 10:22:00','2017-11-15 10:22:00'),(507,'Update Gunung Gunung Tebu',191,NULL,'2017-11-15 10:22:33','2017-11-15 10:22:33'),(508,'Update Gunung Gunung Tebu',191,NULL,'2017-11-15 10:22:51','2017-11-15 10:22:51'),(509,'Mulai log masuk',192,NULL,'2017-11-15 10:26:45','2017-11-15 10:26:45'),(510,'Update Hutan Simpan Kekal Gunung Tebu',191,NULL,'2017-11-15 10:27:51','2017-11-15 10:27:51'),(511,'Update Gunung Gunung Tebu',192,NULL,'2017-11-15 10:28:57','2017-11-15 10:28:57'),(512,'Update Gunung Gunung Tebu',191,NULL,'2017-11-15 10:32:17','2017-11-15 10:32:17'),(513,'Update Gunung Gunung Tebu',191,NULL,'2017-11-15 10:32:59','2017-11-15 10:32:59'),(514,'Update Hutan Simpan Kekal Gunung Tebu',191,NULL,'2017-11-15 10:33:37','2017-11-15 10:33:37'),(515,'Log Keluar',191,NULL,'2017-11-15 12:26:50','2017-11-15 12:26:50'),(516,'Mulai log masuk',193,NULL,'2017-11-15 12:26:53','2017-11-15 12:26:53'),(517,'Mulai log masuk',194,NULL,'2017-11-15 14:35:44','2017-11-15 14:35:44'),(518,'Mulai log masuk',195,NULL,'2017-11-15 15:14:48','2017-11-15 15:14:48'),(519,'Log Keluar',193,NULL,'2017-11-15 16:12:56','2017-11-15 16:12:56'),(520,'Mulai log masuk',196,NULL,'2017-11-15 16:13:05','2017-11-15 16:13:05'),(521,'Mulai log masuk',197,NULL,'2017-11-15 16:16:55','2017-11-15 16:16:55'),(522,'Log Keluar',196,NULL,'2017-11-15 16:18:27','2017-11-15 16:18:27'),(523,'Log Keluar',197,NULL,'2017-11-15 16:19:05','2017-11-15 16:19:05'),(524,'Mulai log masuk',198,NULL,'2017-11-15 16:19:09','2017-11-15 16:19:09'),(525,'Log Keluar',198,NULL,'2017-11-15 16:27:09','2017-11-15 16:27:09'),(526,'Mulai log masuk',199,NULL,'2017-11-15 16:27:14','2017-11-15 16:27:14'),(527,'Log Keluar',199,NULL,'2017-11-15 16:27:50','2017-11-15 16:27:50'),(528,'Mulai log masuk',200,NULL,'2017-11-15 16:27:57','2017-11-15 16:27:57'),(529,'Mulai log masuk',201,NULL,'2017-11-15 17:38:47','2017-11-15 17:38:47'),(530,'Log Keluar',201,NULL,'2017-11-15 17:40:04','2017-11-15 17:40:04'),(531,'Mulai log masuk',202,NULL,'2017-11-15 22:52:18','2017-11-15 22:52:18'),(532,'Mulai log masuk',203,NULL,'2017-11-16 10:28:30','2017-11-16 10:28:30'),(533,'Mulai log masuk',204,NULL,'2017-11-16 12:32:11','2017-11-16 12:32:11'),(534,'Mulai log masuk',205,NULL,'2017-11-16 14:31:56','2017-11-16 14:31:56'),(535,'Mulai log masuk',206,NULL,'2017-11-16 14:47:41','2017-11-16 14:47:41'),(536,'Log Keluar',206,NULL,'2017-11-16 14:49:11','2017-11-16 14:49:11'),(537,'Mulai log masuk',207,NULL,'2017-11-16 14:49:15','2017-11-16 14:49:15'),(538,'Mulai log masuk',208,NULL,'2017-11-20 10:38:11','2017-11-20 10:38:11'),(539,'Mulai log masuk',209,NULL,'2017-11-21 15:34:47','2017-11-21 15:34:47'),(540,'Mulai log masuk',210,NULL,'2017-11-21 15:35:10','2017-11-21 15:35:10'),(541,'Log Keluar',210,NULL,'2017-11-21 15:35:33','2017-11-21 15:35:33'),(542,'Log Keluar',209,NULL,'2017-11-21 15:41:07','2017-11-21 15:41:07'),(543,'Mulai log masuk',211,NULL,'2017-11-23 10:19:05','2017-11-23 10:19:05'),(544,'Mulai log masuk',212,NULL,'2017-11-23 10:24:37','2017-11-23 10:24:37'),(545,'Log Keluar',212,NULL,'2017-11-23 10:26:07','2017-11-23 10:26:07'),(546,'Mulai log masuk',213,NULL,'2017-11-23 10:32:49','2017-11-23 10:32:49'),(547,'Log Keluar',213,NULL,'2017-11-23 10:35:09','2017-11-23 10:35:09'),(548,'Log Keluar',213,NULL,'2017-11-23 10:35:09','2017-11-23 10:35:09'),(549,'Mulai log masuk',214,NULL,'2017-11-23 10:35:41','2017-11-23 10:35:41'),(550,'Mulai log masuk',215,NULL,'2017-11-23 10:36:53','2017-11-23 10:36:53'),(551,'Log Keluar',215,NULL,'2017-11-23 10:37:14','2017-11-23 10:37:14'),(552,'Mulai log masuk',216,NULL,'2017-11-23 10:37:22','2017-11-23 10:37:22'),(553,'Log Keluar',214,NULL,'2017-11-23 11:14:19','2017-11-23 11:14:19'),(554,'Mulai log masuk',217,NULL,'2017-11-23 11:14:23','2017-11-23 11:14:23'),(555,'Tambah Tempah Kemudahan ',217,NULL,'2017-11-23 11:26:10','2017-11-23 11:26:10'),(556,'Tambah Tempah Kemudahan ',217,NULL,'2017-11-23 11:27:10','2017-11-23 11:27:10'),(557,'Log Keluar',217,NULL,'2017-11-23 11:27:18','2017-11-23 11:27:18'),(558,'Mulai log masuk',218,NULL,'2017-11-23 11:27:21','2017-11-23 11:27:21'),(559,'Log Keluar',218,NULL,'2017-11-23 12:32:17','2017-11-23 12:32:17'),(560,'Mulai log masuk',219,NULL,'2017-11-23 12:32:25','2017-11-23 12:32:25'),(561,'Status Permohonan Diluluskan',219,NULL,'2017-11-23 12:33:22','2017-11-23 12:33:22'),(562,'Log Keluar',219,NULL,'2017-11-23 14:13:45','2017-11-23 14:13:45'),(563,'Mulai log masuk',220,NULL,'2017-11-23 14:13:47','2017-11-23 14:13:47'),(564,'Log Keluar',220,NULL,'2017-11-23 14:49:55','2017-11-23 14:49:55'),(565,'Mulai log masuk',221,NULL,'2017-11-23 14:50:05','2017-11-23 14:50:05'),(566,'Log Keluar',216,NULL,'2017-11-23 14:52:41','2017-11-23 14:52:41'),(567,'Mulai log masuk',222,NULL,'2017-11-23 14:53:29','2017-11-23 14:53:29'),(568,'Log Keluar',221,NULL,'2017-11-23 15:51:24','2017-11-23 15:51:24'),(569,'Mulai log masuk',223,NULL,'2017-11-23 15:51:33','2017-11-23 15:51:33'),(570,'Mulai log masuk',224,NULL,'2017-11-23 16:08:07','2017-11-23 16:08:07'),(571,'Log Keluar',223,NULL,'2017-11-23 16:09:03','2017-11-23 16:09:03'),(572,'Mulai log masuk',225,NULL,'2017-11-23 16:09:05','2017-11-23 16:09:05'),(573,'Mulai log masuk',226,NULL,'2017-11-24 09:57:44','2017-11-24 09:57:44'),(574,'Update Hutan Simpan Kekal Behrang',226,NULL,'2017-11-24 09:58:39','2017-11-24 09:58:39'),(575,'Update Hutan Simpan Kekal Behrang',226,NULL,'2017-11-24 09:58:57','2017-11-24 09:58:57'),(576,'Mulai log masuk',227,NULL,'2017-11-24 10:00:14','2017-11-24 10:00:14'),(577,'Update Hutan Simpan Kekal Bintang Hijau (Hulu Perak)',227,NULL,'2017-11-24 10:00:38','2017-11-24 10:00:38'),(578,'Update Hutan Simpan Kekal Bukit Perak',227,NULL,'2017-11-24 10:00:52','2017-11-24 10:00:52'),(579,'Update Hutan Simpan Kekal Belum',227,NULL,'2017-11-24 10:01:19','2017-11-24 10:01:19'),(580,'Mulai log masuk',228,NULL,'2017-11-24 10:03:27','2017-11-24 10:03:27'),(581,'Mulai log masuk',229,NULL,'2017-11-24 10:14:29','2017-11-24 10:14:29'),(582,'Mulai log masuk',230,NULL,'2017-11-24 10:15:00','2017-11-24 10:15:00'),(583,'Mulai log masuk',231,NULL,'2017-11-24 10:15:12','2017-11-24 10:15:12'),(584,'Tambah Hutan Simpan Kekal Bukit Slim',230,NULL,'2017-11-24 10:19:52','2017-11-24 10:19:52'),(585,'Tambah Hutan Simpan Kekal Bujang Melaka (Perak Selatan)',230,NULL,'2017-11-24 10:21:00','2017-11-24 10:21:00'),(586,'Hapus Hutan Simpan Kekal Behrang',230,NULL,'2017-11-24 10:21:12','2017-11-24 10:21:12'),(587,'Update Hutan Simpan Kekal Petuang',227,NULL,'2017-11-24 10:21:37','2017-11-24 10:21:37'),(588,'Update Gunung Liang',230,NULL,'2017-11-24 10:23:01','2017-11-24 10:23:01'),(589,'Update Gunung Liang',230,NULL,'2017-11-24 10:25:16','2017-11-24 10:25:16'),(590,'Update Gunung Gunung Tebu',230,NULL,'2017-11-24 10:25:34','2017-11-24 10:25:34'),(591,'Update Gunung Liang',230,NULL,'2017-11-24 10:28:35','2017-11-24 10:28:35'),(592,'Update Gunung Bah Gading',230,NULL,'2017-11-24 10:28:53','2017-11-24 10:28:53'),(593,'Update Gunung Batu Putih',230,NULL,'2017-11-24 10:29:15','2017-11-24 10:29:15'),(594,'Update Gunung Kinjang',230,NULL,'2017-11-24 10:29:32','2017-11-24 10:29:32'),(595,'Update Gunung Tumang Batak',230,NULL,'2017-11-24 10:29:50','2017-11-24 10:29:50'),(596,'Update Gunung Ulu Sungkai',230,NULL,'2017-11-24 10:30:26','2017-11-24 10:30:26'),(597,'Update Gunung Ulu Kinjor',230,NULL,'2017-11-24 10:30:39','2017-11-24 10:30:39'),(598,'Update Gunung Bujang Melaka',230,NULL,'2017-11-24 10:30:55','2017-11-24 10:30:55'),(599,'Tambah Hutan Simpan Kekal Korbu',230,NULL,'2017-11-24 10:32:54','2017-11-24 10:32:54'),(600,'Tambah Hutan Simpan Kekal Bubu (Larut Matang)',230,NULL,'2017-11-24 10:33:45','2017-11-24 10:33:45'),(601,'Tambah Hutan Simpan Kekal Bintang Hijau',230,NULL,'2017-11-24 10:34:32','2017-11-24 10:34:32'),(602,'Mulai log masuk',232,NULL,'2017-11-24 10:34:55','2017-11-24 10:34:55'),(603,'Tambah Hutan Simpan Kekal Korbu (Hulu Perak)',230,NULL,'2017-11-24 10:35:26','2017-11-24 10:35:26'),(604,'Tambah Hutan Simpan Kekal Kenderong',230,NULL,'2017-11-24 10:36:11','2017-11-24 10:36:11'),(605,'Tambah Hutan Simpan Kekal Piah (Hulu Perak)',230,NULL,'2017-11-24 10:36:43','2017-11-24 10:36:43'),(606,'Update Gunung Inas & Bintang Hijau',230,NULL,'2017-11-24 10:37:08','2017-11-24 10:37:08'),(607,'Tambah Gunung Bukit Larut',230,NULL,'2017-11-24 10:38:40','2017-11-24 10:38:40'),(608,'Update Gunung Bukit Larut',230,NULL,'2017-11-24 10:38:56','2017-11-24 10:38:56'),(609,'Tambah Pengguna Muhammad Firdaus Khadlan',232,NULL,'2017-11-24 10:39:27','2017-11-24 10:39:27'),(610,'Tambah Gunung Pecah Batu',230,NULL,'2017-11-24 10:40:22','2017-11-24 10:40:22'),(611,'Mulai log masuk',233,NULL,'2017-11-24 10:40:29','2017-11-24 10:40:29'),(612,'Update Gunung Pecah Batu',230,NULL,'2017-11-24 10:40:59','2017-11-24 10:40:59'),(613,'Tambah Gunung Ulu Jernih',230,NULL,'2017-11-24 10:42:04','2017-11-24 10:42:04'),(614,'Tambah Gunung Gunung Hijau',230,NULL,'2017-11-24 10:43:03','2017-11-24 10:43:03'),(615,'Update Hutan Simpan Kekal Korbu (Hulu Perak)',230,NULL,'2017-11-24 10:44:41','2017-11-24 10:44:41'),(616,'Tambah Gunung Chamah & Ulu Sepat',230,NULL,'2017-11-24 10:45:47','2017-11-24 10:45:47'),(617,'Status Permohonan Diluluskan',233,NULL,'2017-11-24 10:47:55','2017-11-24 10:47:55'),(618,'Log Keluar',232,NULL,'2017-11-24 10:48:59','2017-11-24 10:48:59'),(619,'Tambah Gunung Kenderong',230,NULL,'2017-11-24 10:49:09','2017-11-24 10:49:09'),(620,'Mulai log masuk',234,NULL,'2017-11-24 10:49:24','2017-11-24 10:49:24'),(621,'Tambah Gunung Gerah',230,NULL,'2017-11-24 10:52:32','2017-11-24 10:52:32'),(622,'Tambah Gunung Korbu & Gayong (Korga)',230,NULL,'2017-11-24 10:55:20','2017-11-24 10:55:20'),(623,'Update Gunung Korbu & Gayong (Korga)',230,NULL,'2017-11-24 10:55:52','2017-11-24 10:55:52'),(624,'Update Gunung Korbu & Gayong (Korga)',230,NULL,'2017-11-24 10:56:12','2017-11-24 10:56:12'),(625,'Status Permohonan Selesai',233,NULL,'2017-11-24 11:05:05','2017-11-24 11:05:05'),(626,'Tambah Gunung Suku',230,NULL,'2017-11-24 11:05:28','2017-11-24 11:05:28'),(627,'Tambah Gunung Trans Suku (Jegreng)',230,NULL,'2017-11-24 11:07:22','2017-11-24 11:07:22'),(628,'Update Gunung Trans Suku (Jegreng)',230,NULL,'2017-11-24 11:07:59','2017-11-24 11:07:59'),(629,'Update Gunung Trans Suku (Jegreng)',230,NULL,'2017-11-24 11:08:34','2017-11-24 11:08:34'),(630,'Update Gunung Trans Suku (Jegreng)',230,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(631,'Tambah Gunung Chabang',230,NULL,'2017-11-24 11:11:42','2017-11-24 11:11:42'),(632,'Tambah Gunung Bujang Melaka',230,NULL,'2017-11-24 11:27:10','2017-11-24 11:27:10'),(633,'Log Keluar',233,NULL,'2017-11-24 11:29:02','2017-11-24 11:29:02'),(634,'Tambah Gunung Relau',230,NULL,'2017-11-24 11:29:35','2017-11-24 11:29:35'),(635,'Mulai log masuk',235,NULL,'2017-11-24 11:30:07','2017-11-24 11:30:07'),(636,'Tambah Pengguna Pegawai Hutan Daerah Perak Selatan',235,NULL,'2017-11-24 11:31:15','2017-11-24 11:31:15'),(637,'Log Keluar',235,NULL,'2017-11-24 11:31:23','2017-11-24 11:31:23'),(638,'Mulai log masuk',236,NULL,'2017-11-24 11:31:49','2017-11-24 11:31:49'),(639,'Tambah Gunung Peninjau',230,NULL,'2017-11-24 11:32:10','2017-11-24 11:32:10'),(640,'Status Permohonan Diluluskan',236,NULL,'2017-11-24 11:33:46','2017-11-24 11:33:46'),(641,'Tambah Hutan Simpan Kekal Piah (Kuala Kangsar)',230,NULL,'2017-11-24 11:36:20','2017-11-24 11:36:20'),(642,'Tambah Hutan Simpan Kekal Korbu (Kuala Kangsar)',230,NULL,'2017-11-24 11:36:52','2017-11-24 11:36:52'),(643,'Tambah Hutan Simpan Kekal Bubu (Kuala Kangsar)',230,NULL,'2017-11-24 11:37:08','2017-11-24 11:37:08'),(644,'Hapus Hutan Simpan Kekal Piah (Kuala Kangsar)',230,NULL,'2017-11-24 11:37:52','2017-11-24 11:37:52'),(645,'Tambah Gunung Ulu Sepat (Gerik)',230,NULL,'2017-11-24 11:39:02','2017-11-24 11:39:02'),(646,'Update Gunung Ulu Sepat (Gerik)',230,NULL,'2017-11-24 11:39:32','2017-11-24 11:39:32'),(647,'Update Gunung Ulu Sepat (Gerik)',230,NULL,'2017-11-24 11:39:54','2017-11-24 11:39:54'),(648,'Log Keluar',236,NULL,'2017-11-24 11:39:56','2017-11-24 11:39:56'),(649,'Mulai log masuk',237,NULL,'2017-11-24 11:40:04','2017-11-24 11:40:04'),(650,'Update Gunung Ulu Sepat (Gerik)',230,NULL,'2017-11-24 11:40:14','2017-11-24 11:40:14'),(651,'Update Gunung Ulu Sepat (Gerik)',230,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(652,'Tambah Gunung Ulu Sepat (Sg. Siput)',230,NULL,'2017-11-24 11:41:49','2017-11-24 11:41:49'),(653,'Update Gunung Ulu Sepat (Sg. Siput)',230,NULL,'2017-11-24 11:42:52','2017-11-24 11:42:52'),(654,'Update Gunung Ulu Sepat (Sg. Siput)',230,NULL,'2017-11-24 11:43:29','2017-11-24 11:43:29'),(655,'Tambah Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:48:26','2017-11-24 11:48:26'),(656,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:49:14','2017-11-24 11:49:14'),(657,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:49:16','2017-11-24 11:49:16'),(658,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:49:36','2017-11-24 11:49:36'),(659,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:50:12','2017-11-24 11:50:12'),(660,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:50:41','2017-11-24 11:50:41'),(661,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:50:45','2017-11-24 11:50:45'),(662,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:51:30','2017-11-24 11:51:30'),(663,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:52:09','2017-11-24 11:52:09'),(664,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:52:51','2017-11-24 11:52:51'),(665,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:53:31','2017-11-24 11:53:31'),(666,'Update Gunung Gunung Tebu',237,NULL,'2017-11-24 11:53:51','2017-11-24 11:53:51'),(667,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:54:17','2017-11-24 11:54:17'),(668,'Update Hutan Simpan Kekal Gunung Tebu',237,NULL,'2017-11-24 11:54:23','2017-11-24 11:54:23'),(669,'Update Gunung Gunung Tebu',237,NULL,'2017-11-24 11:55:25','2017-11-24 11:55:25'),(670,'Update Gunung Ulu Sepat & Chamah',230,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(671,'Tambah Gunung Yong Yap',230,NULL,'2017-11-24 11:59:04','2017-11-24 11:59:04'),(672,'Tambah Gunung Yong Yap',230,NULL,'2017-11-24 11:59:05','2017-11-24 11:59:05'),(673,'Update Gunung Yong Yap',230,NULL,'2017-11-24 12:00:49','2017-11-24 12:00:49'),(674,'Update Gunung Yong Yap',230,NULL,'2017-11-24 12:00:54','2017-11-24 12:00:54'),(675,'Update Gunung Yong Yap',230,NULL,'2017-11-24 12:01:42','2017-11-24 12:01:42'),(676,'Update Gunung Yong Yap',230,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(677,'Update Hutan Simpan Kekal Bubu (Kuala Kangsar)',230,NULL,'2017-11-24 12:05:00','2017-11-24 12:05:00'),(678,'Hapus Hutan Simpan Kekal Bubu (Kuala Kangsar)',230,NULL,'2017-11-24 12:05:11','2017-11-24 12:05:11'),(679,'Tambah Gunung Bubu',230,NULL,'2017-11-24 12:06:06','2017-11-24 12:06:06'),(680,'Update Gunung Bubu',230,NULL,'2017-11-24 12:06:43','2017-11-24 12:06:43'),(681,'Tambah Gunung Gerah',230,NULL,'2017-11-24 12:07:42','2017-11-24 12:07:42'),(682,'Update Gunung Gerah',230,NULL,'2017-11-24 12:08:19','2017-11-24 12:08:19'),(683,'Update Gunung Gerah',230,NULL,'2017-11-24 12:08:36','2017-11-24 12:08:36'),(684,'Update Gunung Gerah',230,NULL,'2017-11-24 12:08:54','2017-11-24 12:08:54'),(685,'Update Gunung Gerah',230,NULL,'2017-11-24 12:09:24','2017-11-24 12:09:24'),(686,'Update Gunung Gerah',230,NULL,'2017-11-24 12:09:43','2017-11-24 12:09:43'),(687,'Update Gunung Gerah',230,NULL,'2017-11-24 12:10:08','2017-11-24 12:10:08'),(688,'Update Gunung Gerah',230,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(689,'Mulai log masuk',238,NULL,'2017-11-24 15:02:24','2017-11-24 15:02:24'),(690,'Log Keluar',230,NULL,'2017-11-24 16:26:51','2017-11-24 16:26:51'),(691,'Mulai log masuk',239,NULL,'2017-11-24 16:26:57','2017-11-24 16:26:57'),(692,'Mulai log masuk',240,NULL,'2017-11-28 11:04:19','2017-11-28 11:04:19'),(693,'Mulai log masuk',241,NULL,'2017-11-29 10:42:40','2017-11-29 10:42:40'),(694,'Mulai log masuk',242,NULL,'2017-11-29 15:50:50','2017-11-29 15:50:50'),(695,'Log Keluar',242,NULL,'2017-11-29 15:55:44','2017-11-29 15:55:44'),(696,'Mulai log masuk',243,NULL,'2017-11-29 15:58:45','2017-11-29 15:58:45'),(697,'Log Keluar',243,NULL,'2017-11-29 16:03:04','2017-11-29 16:03:04'),(698,'Mulai log masuk',244,NULL,'2017-11-29 16:03:28','2017-11-29 16:03:28'),(699,'Log Keluar',244,NULL,'2017-11-29 16:09:34','2017-11-29 16:09:34'),(700,'Mulai log masuk',245,NULL,'2017-11-29 16:09:42','2017-11-29 16:09:42'),(701,'Log Keluar',245,NULL,'2017-11-29 16:20:25','2017-11-29 16:20:25'),(702,'Mulai log masuk',246,NULL,'2017-11-29 16:20:30','2017-11-29 16:20:30'),(703,'Mulai log masuk',247,NULL,'2017-11-30 10:44:55','2017-11-30 10:44:55'),(704,'Mulai log masuk',248,NULL,'2017-11-30 12:06:34','2017-11-30 12:06:34'),(705,'Mulai log masuk',249,NULL,'2017-11-30 13:43:38','2017-11-30 13:43:38'),(706,'Mulai log masuk',250,NULL,'2017-12-04 09:25:24','2017-12-04 09:25:24'),(707,'Mulai log masuk',251,NULL,'2017-12-04 09:50:58','2017-12-04 09:50:58'),(708,'Log Keluar',250,NULL,'2017-12-04 09:53:55','2017-12-04 09:53:55'),(709,'Mulai log masuk',252,NULL,'2017-12-04 09:54:02','2017-12-04 09:54:02'),(710,'Status Permohonan Diluluskan',252,NULL,'2017-12-04 09:54:15','2017-12-04 09:54:15'),(711,'Mulai log masuk',253,NULL,'2017-12-04 14:45:22','2017-12-04 14:45:22'),(712,'Mulai log masuk',254,NULL,'2017-12-04 14:53:30','2017-12-04 14:53:30'),(713,'Mulai log masuk',255,NULL,'2017-12-04 23:18:36','2017-12-04 23:18:36'),(714,'Mulai log masuk',256,NULL,'2017-12-11 17:19:21','2017-12-11 17:19:21'),(715,'Log Keluar',256,NULL,'2017-12-11 17:19:29','2017-12-11 17:19:29'),(716,'Mulai log masuk',257,NULL,'2017-12-11 17:21:25','2017-12-11 17:21:25'),(717,'Mulai log masuk',258,NULL,'2017-12-12 14:40:59','2017-12-12 14:40:59'),(718,'Mulai log masuk',259,NULL,'2017-12-12 16:39:48','2017-12-12 16:39:48'),(719,'Mulai log masuk',260,NULL,'2017-12-13 11:43:37','2017-12-13 11:43:37'),(720,'Hapus Gunung Gunung Tebu',260,NULL,'2017-12-13 11:44:24','2017-12-13 11:44:24'),(721,'Update Gunung Gunung Tebu',260,NULL,'2017-12-13 11:44:51','2017-12-13 11:44:51'),(722,'Log Keluar',260,NULL,'2017-12-13 11:44:57','2017-12-13 11:44:57'),(723,'Mulai log masuk',261,NULL,'2017-12-13 11:45:02','2017-12-13 11:45:02'),(724,'Mulai log masuk',262,NULL,'2017-12-13 11:46:00','2017-12-13 11:46:00'),(725,'Update Gunung Gunung Tebu',262,NULL,'2017-12-13 11:46:33','2017-12-13 11:46:33'),(726,'Mulai log masuk',263,NULL,'2017-12-13 15:51:47','2017-12-13 15:51:47'),(727,'Mulai log masuk',264,NULL,'2017-12-13 16:19:14','2017-12-13 16:19:14'),(728,'Mulai log masuk',265,NULL,'2017-12-13 16:19:56','2017-12-13 16:19:56'),(729,'Status Permohonan Diluluskan',265,NULL,'2017-12-13 16:20:52','2017-12-13 16:20:52'),(730,'Status Permohonan Selesai',265,NULL,'2017-12-13 16:23:46','2017-12-13 16:23:46'),(731,'Log Keluar',265,NULL,'2017-12-13 16:35:18','2017-12-13 16:35:18'),(732,'Mulai log masuk',266,NULL,'2017-12-13 16:35:28','2017-12-13 16:35:28'),(733,'Log Keluar',266,NULL,'2017-12-13 16:35:53','2017-12-13 16:35:53'),(734,'Mulai log masuk',267,NULL,'2017-12-14 09:46:03','2017-12-14 09:46:03'),(735,'Mulai log masuk',268,NULL,'2017-12-14 14:01:00','2017-12-14 14:01:00'),(736,'Log Keluar',268,NULL,'2017-12-14 14:09:38','2017-12-14 14:09:38'),(737,'Mulai log masuk',269,NULL,'2017-12-14 14:09:45','2017-12-14 14:09:45'),(738,'Mulai log masuk',270,NULL,'2017-12-14 16:20:45','2017-12-14 16:20:45'),(739,'Mulai log masuk',271,NULL,'2017-12-14 16:27:00','2017-12-14 16:27:00'),(740,'Mulai log masuk',272,NULL,'2017-12-14 16:41:33','2017-12-14 16:41:33'),(741,'Mulai log masuk',273,NULL,'2017-12-15 09:40:31','2017-12-15 09:40:31'),(742,'Tambah Pengguna Diah',273,NULL,'2017-12-15 10:21:23','2017-12-15 10:21:23'),(743,'Log Keluar',273,NULL,'2017-12-15 10:21:38','2017-12-15 10:21:38'),(744,'Mulai log masuk',274,NULL,'2017-12-15 10:21:46','2017-12-15 10:21:46'),(745,'Update Pengguna Diah',274,NULL,'2017-12-15 10:36:48','2017-12-15 10:36:48'),(746,'Hapus Pengguna Diah',274,NULL,'2017-12-15 10:46:06','2017-12-15 10:46:06'),(747,'Log Keluar',274,NULL,'2017-12-15 13:09:40','2017-12-15 13:09:40'),(748,'Mulai log masuk',275,NULL,'2017-12-16 10:48:58','2017-12-16 10:48:58'),(749,'Log Keluar',275,NULL,'2017-12-16 10:52:16','2017-12-16 10:52:16'),(750,'Mulai log masuk',276,NULL,'2017-12-16 10:52:24','2017-12-16 10:52:24'),(751,'Status Permohonan Diluluskan',276,NULL,'2017-12-16 11:09:09','2017-12-16 11:09:09'),(752,'Mulai log masuk',277,NULL,'2017-12-16 16:45:45','2017-12-16 16:45:45'),(753,'Mulai log masuk',278,NULL,'2017-12-16 16:49:13','2017-12-16 16:49:13'),(754,'Log Keluar',278,NULL,'2017-12-16 16:50:58','2017-12-16 16:50:58'),(755,'Mulai log masuk',279,NULL,'2017-12-16 16:52:31','2017-12-16 16:52:31'),(756,'Mulai log masuk',280,NULL,'2017-12-17 16:23:32','2017-12-17 16:23:32'),(757,'Mulai log masuk',281,NULL,'2017-12-17 17:38:01','2017-12-17 17:38:01'),(758,'Log Keluar',281,NULL,'2017-12-17 17:39:42','2017-12-17 17:39:42'),(759,'Mulai log masuk',282,NULL,'2017-12-17 17:40:46','2017-12-17 17:40:46'),(760,'Status Permohonan Diluluskan',282,NULL,'2017-12-17 17:42:56','2017-12-17 17:42:56'),(761,'Log Keluar',282,NULL,'2017-12-17 17:54:05','2017-12-17 17:54:05'),(762,'Mulai log masuk',283,NULL,'2017-12-17 17:54:11','2017-12-17 17:54:11'),(763,'Log Keluar',283,NULL,'2017-12-17 18:01:36','2017-12-17 18:01:36'),(764,'Mulai log masuk',284,NULL,'2017-12-17 18:01:57','2017-12-17 18:01:57'),(765,'Log Keluar',284,NULL,'2017-12-17 18:02:16','2017-12-17 18:02:16'),(766,'Mulai log masuk',285,NULL,'2017-12-17 18:02:21','2017-12-17 18:02:21'),(767,'Update Pengguna Ikhwan',285,NULL,'2017-12-17 18:02:43','2017-12-17 18:02:43'),(768,'Log Keluar',285,NULL,'2017-12-17 18:02:46','2017-12-17 18:02:46'),(769,'Mulai log masuk',286,NULL,'2017-12-17 18:02:58','2017-12-17 18:02:58'),(770,'Log Keluar',286,NULL,'2017-12-17 18:18:15','2017-12-17 18:18:15'),(771,'Mulai log masuk',287,NULL,'2017-12-17 18:18:22','2017-12-17 18:18:22'),(772,'Mulai log masuk',288,NULL,'2017-12-18 06:28:20','2017-12-18 06:28:20'),(773,'Mulai log masuk',289,NULL,'2017-12-18 07:41:15','2017-12-18 07:41:15'),(774,'Mulai log masuk',290,NULL,'2017-12-18 09:27:44','2017-12-18 09:27:44'),(775,'Log Keluar',290,NULL,'2017-12-18 09:36:50','2017-12-18 09:36:50'),(776,'Log Keluar',289,NULL,'2017-12-18 09:38:44','2017-12-18 09:38:44'),(777,'Mulai log masuk',291,NULL,'2017-12-18 09:38:50','2017-12-18 09:38:50'),(778,'Mulai log masuk',292,NULL,'2017-12-18 09:47:40','2017-12-18 09:47:40'),(779,'Mulai log masuk',293,NULL,'2017-12-18 10:48:06','2017-12-18 10:48:06'),(780,'Tambah Taman Eko-Rimba test',293,NULL,'2017-12-18 10:48:32','2017-12-18 10:48:32'),(781,'Tambah Taman Eko-Rimba Test q123123123',293,NULL,'2017-12-18 10:48:57','2017-12-18 10:48:57'),(782,'Hapus Taman Eko-Rimba Test q123123123',293,NULL,'2017-12-18 10:49:06','2017-12-18 10:49:06'),(783,'Hapus Taman Eko-Rimba test',293,NULL,'2017-12-18 10:49:12','2017-12-18 10:49:12'),(784,'Status Permohonan Selesai',293,NULL,'2017-12-18 11:32:54','2017-12-18 11:32:54'),(785,'Status Permohonan Selesai',293,NULL,'2017-12-18 11:38:13','2017-12-18 11:38:13'),(786,'Mulai log masuk',294,NULL,'2017-12-18 12:30:05','2017-12-18 12:30:05'),(787,'Status Permohonan Diluluskan',294,NULL,'2017-12-18 12:30:19','2017-12-18 12:30:19'),(788,'Status Permohonan Diluluskan',294,NULL,'2017-12-18 12:30:22','2017-12-18 12:30:22'),(789,'Status Permohonan Selesai',294,NULL,'2017-12-18 12:30:36','2017-12-18 12:30:36'),(790,'Log Keluar',292,NULL,'2017-12-18 12:31:21','2017-12-18 12:31:21'),(791,'Mulai log masuk',295,NULL,'2017-12-18 12:31:23','2017-12-18 12:31:23'),(792,'Log Keluar',294,NULL,'2017-12-18 12:36:48','2017-12-18 12:36:48'),(793,'Mulai log masuk',296,NULL,'2017-12-18 12:36:54','2017-12-18 12:36:54'),(794,'Log Keluar',296,NULL,'2017-12-18 12:37:00','2017-12-18 12:37:00'),(795,'Mulai log masuk',297,NULL,'2017-12-18 12:37:56','2017-12-18 12:37:56'),(796,'Log Keluar',295,NULL,'2017-12-18 13:07:03','2017-12-18 13:07:03'),(797,'Mulai log masuk',298,NULL,'2017-12-18 13:07:11','2017-12-18 13:07:11'),(798,'Status Permohonan Selesai',298,NULL,'2017-12-18 13:07:44','2017-12-18 13:07:44'),(799,'Status Permohonan Selesai',298,NULL,'2017-12-18 13:07:47','2017-12-18 13:07:47'),(800,'Log Keluar',297,NULL,'2017-12-18 13:09:08','2017-12-18 13:09:08'),(801,'Mulai log masuk',299,NULL,'2017-12-18 13:09:17','2017-12-18 13:09:17'),(802,'Log Keluar',298,NULL,'2017-12-18 13:17:36','2017-12-18 13:17:36'),(803,'Mulai log masuk',300,NULL,'2017-12-18 13:17:38','2017-12-18 13:17:38'),(804,'Log Keluar',299,NULL,'2017-12-18 13:22:13','2017-12-18 13:22:13'),(805,'Mulai log masuk',301,NULL,'2017-12-18 13:26:01','2017-12-18 13:26:01'),(806,'Mulai log masuk',302,NULL,'2017-12-18 13:30:02','2017-12-18 13:30:02'),(807,'Mulai log masuk',303,NULL,'2017-12-18 16:20:49','2017-12-18 16:20:49'),(808,'Log Keluar',302,NULL,'2017-12-18 18:42:01','2017-12-18 18:42:01'),(809,'Mulai log masuk',304,NULL,'2017-12-18 18:42:09','2017-12-18 18:42:09'),(810,'Status Permohonan Diluluskan',304,NULL,'2017-12-18 18:42:28','2017-12-18 18:42:28'),(811,'Status Permohonan Diluluskan',304,NULL,'2017-12-18 18:42:31','2017-12-18 18:42:31'),(812,'Status Permohonan Selesai',304,NULL,'2017-12-18 18:42:59','2017-12-18 18:42:59'),(813,'Log Keluar',304,NULL,'2017-12-18 18:43:20','2017-12-18 18:43:20'),(814,'Mulai log masuk',305,NULL,'2017-12-18 18:43:22','2017-12-18 18:43:22'),(815,'Mulai log masuk',306,NULL,'2017-12-18 20:05:48','2017-12-18 20:05:48'),(816,'Mulai log masuk',307,NULL,'2017-12-18 20:09:54','2017-12-18 20:09:54'),(817,'Log Keluar',306,NULL,'2017-12-18 20:23:26','2017-12-18 20:23:26'),(818,'Mulai log masuk',308,NULL,'2017-12-18 20:23:41','2017-12-18 20:23:41'),(819,'Update Taman Eko-Rimba Sekayu',308,NULL,'2017-12-18 20:24:34','2017-12-18 20:24:34'),(820,'Log Keluar',307,NULL,'2017-12-18 21:24:28','2017-12-18 21:24:28'),(821,'Mulai log masuk',309,NULL,'2017-12-18 21:24:37','2017-12-18 21:24:37'),(822,'Status Permohonan Diluluskan',309,NULL,'2017-12-18 21:32:44','2017-12-18 21:32:44'),(823,'Status Permohonan Selesai',309,NULL,'2017-12-18 21:36:14','2017-12-18 21:36:14'),(824,'Status Permohonan Diluluskan',309,NULL,'2017-12-18 21:36:44','2017-12-18 21:36:44'),(825,'Log Keluar',309,NULL,'2017-12-18 21:46:57','2017-12-18 21:46:57'),(826,'Mulai log masuk',310,NULL,'2017-12-18 21:46:59','2017-12-18 21:46:59'),(827,'Mulai log masuk',311,NULL,'2017-12-19 12:11:29','2017-12-19 12:11:29'),(828,'Log Keluar',311,NULL,'2017-12-19 12:11:41','2017-12-19 12:11:41'),(829,'Mulai log masuk',312,NULL,'2017-12-19 12:13:58','2017-12-19 12:13:58'),(830,'Mulai log masuk',313,NULL,'2017-12-19 12:40:20','2017-12-19 12:40:20'),(831,'Mulai log masuk',314,NULL,'2017-12-19 12:41:54','2017-12-19 12:41:54'),(832,'Mulai log masuk',315,NULL,'2017-12-19 13:44:59','2017-12-19 13:44:59'),(833,'Log Keluar',315,NULL,'2017-12-19 13:45:06','2017-12-19 13:45:06'),(834,'Mulai log masuk',316,NULL,'2017-12-19 13:45:11','2017-12-19 13:45:11'),(835,'Log Keluar',316,NULL,'2017-12-19 15:20:22','2017-12-19 15:20:22'),(836,'Log Keluar',316,NULL,'2017-12-19 15:20:22','2017-12-19 15:20:22'),(837,'Mulai log masuk',317,NULL,'2017-12-19 15:20:32','2017-12-19 15:20:32'),(838,'Log Keluar',317,NULL,'2017-12-19 16:32:11','2017-12-19 16:32:11'),(839,'Log Keluar',317,NULL,'2017-12-19 16:32:12','2017-12-19 16:32:12'),(840,'Mulai log masuk',318,NULL,'2017-12-19 16:32:16','2017-12-19 16:32:16'),(841,'Mulai log masuk',319,NULL,'2017-12-19 17:32:15','2017-12-19 17:32:15'),(842,'Log Keluar',319,NULL,'2017-12-19 18:10:05','2017-12-19 18:10:05'),(843,'Mulai log masuk',320,NULL,'2017-12-19 18:10:12','2017-12-19 18:10:12'),(844,'Mulai log masuk',321,NULL,'2017-12-19 21:58:56','2017-12-19 21:58:56'),(845,'Log Keluar',321,NULL,'2017-12-19 22:29:07','2017-12-19 22:29:07'),(846,'Mulai log masuk',322,NULL,'2017-12-19 22:29:13','2017-12-19 22:29:13'),(847,'Log Keluar',322,NULL,'2017-12-19 22:30:55','2017-12-19 22:30:55'),(848,'Mulai log masuk',323,NULL,'2017-12-19 22:31:44','2017-12-19 22:31:44'),(849,'Mulai log masuk',324,NULL,'2017-12-19 23:45:53','2017-12-19 23:45:53'),(850,'Mulai log masuk',325,NULL,'2017-12-20 09:24:14','2017-12-20 09:24:14'),(851,'Log Keluar',325,NULL,'2017-12-20 09:24:18','2017-12-20 09:24:18'),(852,'Mulai log masuk',326,NULL,'2017-12-20 09:24:50','2017-12-20 09:24:50'),(853,'Log Keluar',326,NULL,'2017-12-20 09:46:59','2017-12-20 09:46:59'),(854,'Mulai log masuk',327,NULL,'2017-12-20 09:47:03','2017-12-20 09:47:03'),(855,'Mulai log masuk',328,NULL,'2017-12-20 10:46:09','2017-12-20 10:46:09'),(856,'Mulai log masuk',329,NULL,'2017-12-20 14:00:42','2017-12-20 14:00:42'),(857,'Mulai log masuk',330,NULL,'2017-12-20 15:09:17','2017-12-20 15:09:17'),(858,'Log Keluar',328,NULL,'2017-12-20 17:35:20','2017-12-20 17:35:20'),(859,'Mulai log masuk',331,NULL,'2017-12-20 17:35:30','2017-12-20 17:35:30'),(860,'Mulai log masuk',332,NULL,'2017-12-20 17:48:49','2017-12-20 17:48:49'),(861,'Mulai log masuk',333,NULL,'2017-12-20 18:47:15','2017-12-20 18:47:15'),(862,'Mulai log masuk',334,NULL,'2017-12-20 21:09:44','2017-12-20 21:09:44'),(863,'Log Keluar',334,NULL,'2017-12-20 21:39:29','2017-12-20 21:39:29'),(864,'Mulai log masuk',335,NULL,'2017-12-20 21:39:35','2017-12-20 21:39:35'),(865,'Mulai log masuk',336,NULL,'2017-12-20 21:40:34','2017-12-20 21:40:34'),(866,'Log Keluar',335,NULL,'2017-12-20 21:44:00','2017-12-20 21:44:00'),(867,'Mulai log masuk',337,NULL,'2017-12-20 21:45:30','2017-12-20 21:45:30'),(868,'Log Keluar',336,NULL,'2017-12-20 22:11:56','2017-12-20 22:11:56'),(869,'Mulai log masuk',338,NULL,'2017-12-20 22:12:04','2017-12-20 22:12:04'),(870,'Mulai log masuk',339,NULL,'2017-12-21 17:03:16','2017-12-21 17:03:16'),(871,'Log Keluar',339,NULL,'2017-12-21 17:03:33','2017-12-21 17:03:33'),(872,'Mulai log masuk',340,NULL,'2017-12-21 17:12:54','2017-12-21 17:12:54'),(873,'Log Keluar',340,NULL,'2017-12-21 17:28:57','2017-12-21 17:28:57'),(874,'Mulai log masuk',341,NULL,'2017-12-21 17:29:10','2017-12-21 17:29:10'),(875,'Mulai log masuk',342,NULL,'2017-12-21 17:29:44','2017-12-21 17:29:44'),(876,'Mulai log masuk',343,NULL,'2017-12-21 20:33:02','2017-12-21 20:33:02'),(877,'Log Keluar',343,NULL,'2017-12-21 20:43:52','2017-12-21 20:43:52'),(878,'Mulai log masuk',344,NULL,'2017-12-21 20:44:17','2017-12-21 20:44:17'),(879,'Log Keluar',344,NULL,'2017-12-21 20:56:47','2017-12-21 20:56:47'),(880,'Mulai log masuk',345,NULL,'2017-12-21 20:56:53','2017-12-21 20:56:53'),(881,'Log Keluar',345,NULL,'2017-12-21 20:58:31','2017-12-21 20:58:31'),(882,'Mulai log masuk',346,NULL,'2017-12-21 20:58:37','2017-12-21 20:58:37'),(883,'Log Keluar',346,NULL,'2017-12-21 21:13:47','2017-12-21 21:13:47'),(884,'Mulai log masuk',347,NULL,'2017-12-21 21:13:58','2017-12-21 21:13:58'),(885,'Log Keluar',347,NULL,'2017-12-21 21:18:48','2017-12-21 21:18:48'),(886,'Mulai log masuk',348,NULL,'2017-12-21 21:18:55','2017-12-21 21:18:55'),(887,'Log Keluar',348,NULL,'2017-12-21 21:19:02','2017-12-21 21:19:02'),(888,'Mulai log masuk',349,NULL,'2017-12-21 23:38:08','2017-12-21 23:38:08'),(889,'Log Keluar',349,NULL,'2017-12-21 23:39:08','2017-12-21 23:39:08'),(890,'Mulai log masuk',350,NULL,'2017-12-21 23:39:21','2017-12-21 23:39:21'),(891,'Mulai log masuk',351,NULL,'2017-12-22 08:27:44','2017-12-22 08:27:44'),(892,'Log Keluar',351,NULL,'2017-12-22 08:27:57','2017-12-22 08:27:57'),(893,'Mulai log masuk',352,NULL,'2017-12-22 08:28:09','2017-12-22 08:28:09'),(894,'Log Keluar',352,NULL,'2017-12-22 08:33:11','2017-12-22 08:33:11'),(895,'Mulai log masuk',353,NULL,'2017-12-22 08:33:19','2017-12-22 08:33:19'),(896,'Log Keluar',353,NULL,'2017-12-22 08:35:36','2017-12-22 08:35:36'),(897,'Mulai log masuk',354,NULL,'2017-12-22 08:35:41','2017-12-22 08:35:41'),(898,'Log Keluar',354,NULL,'2017-12-22 08:39:31','2017-12-22 08:39:31'),(899,'Mulai log masuk',355,NULL,'2017-12-22 08:39:34','2017-12-22 08:39:34'),(900,'Mulai log masuk',356,NULL,'2017-12-22 08:42:39','2017-12-22 08:42:39'),(901,'Log Keluar',355,NULL,'2017-12-22 08:46:00','2017-12-22 08:46:00'),(902,'Mulai log masuk',357,NULL,'2017-12-22 08:46:11','2017-12-22 08:46:11'),(903,'Update Pengguna PHD Sekayu',357,NULL,'2017-12-22 08:46:25','2017-12-22 08:46:25'),(904,'Mulai log masuk',358,NULL,'2017-12-22 08:47:09','2017-12-22 08:47:09'),(905,'Update Hutan Simpan Kekal Gunung Tebu',357,NULL,'2017-12-22 08:51:34','2017-12-22 08:51:34'),(906,'Log Keluar',357,NULL,'2017-12-22 08:51:53','2017-12-22 08:51:53'),(907,'Mulai log masuk',359,NULL,'2017-12-22 08:52:04','2017-12-22 08:52:04'),(908,'Log Keluar',359,NULL,'2017-12-22 08:52:15','2017-12-22 08:52:15'),(909,'Log Keluar',358,NULL,'2017-12-22 08:52:19','2017-12-22 08:52:19'),(910,'Mulai log masuk',360,NULL,'2017-12-22 08:52:49','2017-12-22 08:52:49'),(911,'Log Keluar',360,NULL,'2017-12-22 08:53:03','2017-12-22 08:53:03'),(912,'Mulai log masuk',361,NULL,'2017-12-22 08:53:09','2017-12-22 08:53:09'),(913,'Log Keluar',356,NULL,'2017-12-22 08:58:00','2017-12-22 08:58:00'),(914,'Mulai log masuk',362,NULL,'2017-12-22 08:58:10','2017-12-22 08:58:10'),(915,'Log Keluar',362,NULL,'2017-12-22 08:58:49','2017-12-22 08:58:49'),(916,'Mulai log masuk',363,NULL,'2017-12-22 08:58:55','2017-12-22 08:58:55'),(917,'Log Keluar',363,NULL,'2017-12-22 08:59:19','2017-12-22 08:59:19'),(918,'Mulai log masuk',364,NULL,'2017-12-22 08:59:27','2017-12-22 08:59:27'),(919,'Mulai log masuk',365,NULL,'2017-12-22 09:00:33','2017-12-22 09:00:33'),(920,'Log Keluar',365,NULL,'2017-12-22 09:08:37','2017-12-22 09:08:37'),(921,'Mulai log masuk',366,NULL,'2017-12-22 09:08:41','2017-12-22 09:08:41'),(922,'Log Keluar',364,NULL,'2017-12-22 09:24:30','2017-12-22 09:24:30'),(923,'Mulai log masuk',367,NULL,'2017-12-22 09:24:35','2017-12-22 09:24:35'),(924,'Log Keluar',367,NULL,'2017-12-22 09:27:07','2017-12-22 09:27:07'),(925,'Mulai log masuk',368,NULL,'2017-12-22 09:27:13','2017-12-22 09:27:13'),(926,'Log Keluar',368,NULL,'2017-12-22 09:27:58','2017-12-22 09:27:58'),(927,'Mulai log masuk',369,NULL,'2017-12-22 09:28:03','2017-12-22 09:28:03');
/*!40000 ALTER TABLE `activity_log_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_logs`
--

DROP TABLE IF EXISTS `activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_logs`
--

LOCK TABLES `activity_logs` WRITE;
/*!40000 ALTER TABLE `activity_logs` DISABLE KEYS */;
INSERT INTO `activity_logs` VALUES (1,1,'::1','2017-11-05 22:39:36','2017-11-05 22:41:51',NULL,'2017-11-05 15:39:36','2017-11-05 15:41:51'),(2,9,'::1','2017-11-05 22:42:37','0000-00-00 00:00:00',NULL,'2017-11-05 15:42:37','2017-11-05 15:42:37'),(3,1,'112.215.151.238','2017-11-05 23:00:22','0000-00-00 00:00:00',NULL,'2017-11-05 23:00:22','2017-11-05 23:00:22'),(4,1,'60.50.122.129','2017-11-06 07:42:17','0000-00-00 00:00:00',NULL,'2017-11-06 07:42:17','2017-11-06 07:42:17'),(5,1,'203.62.1.16','2017-11-06 09:12:01','2017-11-06 09:21:45',NULL,'2017-11-06 09:12:01','2017-11-06 09:21:45'),(6,10,'203.62.1.16','2017-11-06 09:23:03','0000-00-00 00:00:00',NULL,'2017-11-06 09:23:03','2017-11-06 09:23:03'),(7,1,'203.62.1.16','2017-11-06 09:25:47','2017-11-06 09:48:57',NULL,'2017-11-06 09:25:47','2017-11-06 09:48:57'),(8,1,'112.215.151.238','2017-11-06 09:36:40','0000-00-00 00:00:00',NULL,'2017-11-06 09:36:40','2017-11-06 09:36:40'),(9,10,'203.62.1.16','2017-11-06 09:39:17','2017-11-06 10:29:32',NULL,'2017-11-06 09:39:17','2017-11-06 10:29:32'),(10,1,'112.215.151.238','2017-11-06 09:39:22','0000-00-00 00:00:00',NULL,'2017-11-06 09:39:22','2017-11-06 09:39:22'),(11,2,'203.62.1.16','2017-11-06 09:49:04','2017-11-06 09:50:10',NULL,'2017-11-06 09:49:04','2017-11-06 09:50:10'),(12,2,'202.60.56.233','2017-11-06 09:56:22','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:22','2017-11-06 09:56:22'),(13,2,'203.62.1.16','2017-11-06 09:56:24','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:24','2017-11-06 09:56:24'),(14,2,'202.60.56.233','2017-11-06 09:56:26','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:26','2017-11-06 09:56:26'),(15,2,'203.62.1.16','2017-11-06 09:56:34','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:34','2017-11-06 09:56:34'),(16,2,'202.60.56.233','2017-11-06 10:09:47','2017-11-06 10:12:21',NULL,'2017-11-06 10:09:47','2017-11-06 10:12:21'),(17,14,'202.60.56.233','2017-11-06 10:20:41','0000-00-00 00:00:00',NULL,'2017-11-06 10:20:41','2017-11-06 10:20:41'),(18,2,'202.60.56.233','2017-11-06 10:24:35','0000-00-00 00:00:00',NULL,'2017-11-06 10:24:35','2017-11-06 10:24:35'),(19,10,'203.62.1.16','2017-11-06 10:39:57','2017-11-06 14:51:06',NULL,'2017-11-06 10:39:57','2017-11-06 14:51:06'),(20,2,'202.60.56.233','2017-11-06 11:33:43','2017-11-06 15:00:14',NULL,'2017-11-06 11:33:43','2017-11-06 15:00:14'),(21,14,'42.153.43.186','2017-11-06 11:44:14','0000-00-00 00:00:00',NULL,'2017-11-06 11:44:14','2017-11-06 11:44:14'),(22,14,'42.153.43.186','2017-11-06 12:27:29','0000-00-00 00:00:00',NULL,'2017-11-06 12:27:29','2017-11-06 12:27:29'),(23,1,'112.215.151.238','2017-11-06 12:28:25','0000-00-00 00:00:00',NULL,'2017-11-06 12:28:25','2017-11-06 12:28:25'),(24,1,'112.215.151.238','2017-11-06 13:40:09','2017-11-06 14:16:21',NULL,'2017-11-06 13:40:09','2017-11-06 14:16:21'),(25,9,'112.215.151.238','2017-11-06 14:17:04','2017-11-06 14:23:13',NULL,'2017-11-06 14:17:04','2017-11-06 14:23:13'),(26,1,'112.215.151.238','2017-11-06 14:23:21','2017-11-06 14:25:15',NULL,'2017-11-06 14:23:21','2017-11-06 14:25:15'),(27,1,'112.215.151.238','2017-11-06 14:37:18','2017-11-06 15:35:14',NULL,'2017-11-06 14:37:18','2017-11-06 15:35:14'),(28,10,'203.62.1.16','2017-11-06 15:00:41','2017-11-06 15:15:11',NULL,'2017-11-06 15:00:41','2017-11-06 15:15:11'),(29,19,'202.60.56.233','2017-11-06 15:16:55','2017-11-06 15:46:58',NULL,'2017-11-06 15:16:55','2017-11-06 15:46:58'),(30,2,'202.60.56.233','2017-11-06 15:16:57','0000-00-00 00:00:00',NULL,'2017-11-06 15:16:57','2017-11-06 15:16:57'),(31,18,'203.62.1.16','2017-11-06 15:17:02','2017-11-06 15:18:52',NULL,'2017-11-06 15:17:02','2017-11-06 15:18:52'),(32,10,'203.62.1.16','2017-11-06 15:19:49','0000-00-00 00:00:00',NULL,'2017-11-06 15:19:49','2017-11-06 15:19:49'),(33,2,'202.60.56.233','2017-11-06 15:47:08','2017-11-06 16:34:01',NULL,'2017-11-06 15:47:08','2017-11-06 16:34:01'),(34,2,'203.62.1.16','2017-11-06 15:54:39','0000-00-00 00:00:00',NULL,'2017-11-06 15:54:39','2017-11-06 15:54:39'),(35,2,'60.50.122.129','2017-11-06 17:03:05','0000-00-00 00:00:00',NULL,'2017-11-06 17:03:05','2017-11-06 17:03:05'),(36,10,'60.50.122.129','2017-11-06 17:51:47','2017-11-06 19:17:59',NULL,'2017-11-06 17:51:47','2017-11-06 19:17:59'),(37,20,'60.50.122.129','2017-11-06 19:18:36','0000-00-00 00:00:00',NULL,'2017-11-06 19:18:36','2017-11-06 19:18:36'),(38,10,'60.50.122.129','2017-11-06 20:53:49','0000-00-00 00:00:00',NULL,'2017-11-06 20:53:49','2017-11-06 20:53:49'),(39,1,'112.215.151.238','2017-11-06 22:29:57','0000-00-00 00:00:00',NULL,'2017-11-06 22:29:57','2017-11-06 22:29:57'),(40,1,'112.215.151.238','2017-11-06 22:46:40','2017-11-06 22:47:04',NULL,'2017-11-06 22:46:40','2017-11-06 22:47:04'),(41,10,'112.215.151.238','2017-11-06 22:51:35','0000-00-00 00:00:00',NULL,'2017-11-06 22:51:35','2017-11-06 22:51:35'),(42,1,'60.50.122.129','2017-11-06 23:46:05','0000-00-00 00:00:00',NULL,'2017-11-06 23:46:05','2017-11-06 23:46:05'),(43,10,'203.62.1.16','2017-11-07 09:32:10','2017-11-07 09:58:00',NULL,'2017-11-07 09:32:10','2017-11-07 09:58:00'),(44,2,'202.60.56.233','2017-11-07 09:58:08','0000-00-00 00:00:00',NULL,'2017-11-07 09:58:08','2017-11-07 09:58:08'),(45,2,'202.60.56.233','2017-11-07 10:18:33','2017-11-07 10:21:33',NULL,'2017-11-07 10:18:33','2017-11-07 10:21:33'),(46,2,'202.60.56.233','2017-11-07 10:18:54','2017-11-07 10:21:53',NULL,'2017-11-07 10:18:54','2017-11-07 10:21:53'),(47,21,'202.60.56.233','2017-11-07 10:26:53','0000-00-00 00:00:00',NULL,'2017-11-07 10:26:53','2017-11-07 10:26:53'),(48,21,'202.60.56.233','2017-11-07 10:27:15','0000-00-00 00:00:00',NULL,'2017-11-07 10:27:15','2017-11-07 10:27:15'),(49,21,'202.60.56.233','2017-11-07 10:27:44','0000-00-00 00:00:00',NULL,'2017-11-07 10:27:44','2017-11-07 10:27:44'),(50,10,'203.62.1.16','2017-11-07 10:33:46','0000-00-00 00:00:00',NULL,'2017-11-07 10:33:46','2017-11-07 10:33:46'),(51,14,'203.62.1.16','2017-11-07 10:55:11','0000-00-00 00:00:00',NULL,'2017-11-07 10:55:11','2017-11-07 10:55:11'),(52,14,'203.62.1.16','2017-11-07 10:56:45','0000-00-00 00:00:00',NULL,'2017-11-07 10:56:45','2017-11-07 10:56:45'),(53,2,'203.62.1.16','2017-11-07 12:04:18','2017-11-07 12:06:30',NULL,'2017-11-07 12:04:18','2017-11-07 12:06:30'),(54,1,'112.215.200.65','2017-11-07 12:13:16','0000-00-00 00:00:00',NULL,'2017-11-07 12:13:16','2017-11-07 12:13:16'),(55,1,'203.62.1.16','2017-11-07 13:59:34','0000-00-00 00:00:00',NULL,'2017-11-07 13:59:34','2017-11-07 13:59:34'),(56,1,'112.215.200.65','2017-11-07 14:12:15','0000-00-00 00:00:00',NULL,'2017-11-07 14:12:15','2017-11-07 14:12:15'),(57,10,'203.62.1.16','2017-11-07 14:34:55','0000-00-00 00:00:00',NULL,'2017-11-07 14:34:55','2017-11-07 14:34:55'),(58,2,'202.60.56.233','2017-11-07 15:59:59','2017-11-07 16:02:26',NULL,'2017-11-07 15:59:59','2017-11-07 16:02:26'),(59,2,'60.50.122.129','2017-11-07 16:57:57','0000-00-00 00:00:00',NULL,'2017-11-07 16:57:57','2017-11-07 16:57:57'),(60,1,'112.215.200.65','2017-11-07 18:07:15','0000-00-00 00:00:00',NULL,'2017-11-07 18:07:15','2017-11-07 18:07:15'),(61,2,'60.50.122.129','2017-11-07 18:48:22','0000-00-00 00:00:00',NULL,'2017-11-07 18:48:22','2017-11-07 18:48:22'),(62,1,'112.215.200.65','2017-11-07 18:52:16','0000-00-00 00:00:00',NULL,'2017-11-07 18:52:16','2017-11-07 18:52:16'),(63,1,'112.215.200.65','2017-11-07 21:29:31','0000-00-00 00:00:00',NULL,'2017-11-07 21:29:31','2017-11-07 21:29:31'),(64,2,'60.50.122.129','2017-11-07 22:56:08','0000-00-00 00:00:00',NULL,'2017-11-07 22:56:08','2017-11-07 22:56:08'),(65,2,'202.60.56.233','2017-11-08 08:42:43','2017-11-08 08:45:49',NULL,'2017-11-08 08:42:43','2017-11-08 08:45:49'),(66,14,'202.60.56.233','2017-11-08 08:48:16','0000-00-00 00:00:00',NULL,'2017-11-08 08:48:16','2017-11-08 08:48:16'),(67,1,'60.53.243.95','2017-11-08 09:42:10','0000-00-00 00:00:00',NULL,'2017-11-08 09:42:10','2017-11-08 09:42:10'),(68,10,'60.53.243.95','2017-11-08 11:47:08','0000-00-00 00:00:00',NULL,'2017-11-08 11:47:08','2017-11-08 11:47:08'),(69,2,'121.122.43.73','2017-11-08 15:09:53','0000-00-00 00:00:00',NULL,'2017-11-08 15:09:53','2017-11-08 15:09:53'),(70,1,'112.215.170.8','2017-11-08 15:30:09','2017-11-08 15:30:12',NULL,'2017-11-08 15:30:09','2017-11-08 15:30:12'),(71,2,'121.122.43.73','2017-11-08 15:30:48','2017-11-08 15:31:42',NULL,'2017-11-08 15:30:48','2017-11-08 15:31:42'),(72,9,'112.215.170.8','2017-11-08 16:12:07','0000-00-00 00:00:00',NULL,'2017-11-08 16:12:07','2017-11-08 16:12:07'),(73,2,'121.122.43.73','2017-11-08 16:19:06','2017-11-08 16:26:39',NULL,'2017-11-08 16:19:06','2017-11-08 16:26:39'),(74,9,'175.142.248.78','2017-11-08 16:35:04','0000-00-00 00:00:00',NULL,'2017-11-08 16:35:04','2017-11-08 16:35:04'),(75,2,'175.143.193.80','2017-11-08 18:49:55','0000-00-00 00:00:00',NULL,'2017-11-08 18:49:55','2017-11-08 18:49:55'),(76,9,'175.143.193.80','2017-11-08 18:52:49','2017-11-08 18:53:59',NULL,'2017-11-08 18:52:49','2017-11-08 18:53:59'),(77,23,'175.143.193.80','2017-11-08 18:54:13','0000-00-00 00:00:00',NULL,'2017-11-08 18:54:13','2017-11-08 18:54:13'),(78,1,'175.143.193.80','2017-11-08 23:11:06','0000-00-00 00:00:00',NULL,'2017-11-08 23:11:06','2017-11-08 23:11:06'),(79,1,'112.215.170.8','2017-11-09 00:19:36','2017-11-09 00:21:12',NULL,'2017-11-09 00:19:36','2017-11-09 00:21:12'),(80,9,'112.215.170.8','2017-11-09 00:21:16','2017-11-09 00:23:00',NULL,'2017-11-09 00:21:16','2017-11-09 00:23:00'),(81,1,'112.215.170.8','2017-11-09 00:23:04','0000-00-00 00:00:00',NULL,'2017-11-09 00:23:04','2017-11-09 00:23:04'),(82,1,'112.215.170.8','2017-11-09 00:34:09','0000-00-00 00:00:00',NULL,'2017-11-09 00:34:09','2017-11-09 00:34:09'),(83,1,'112.215.170.225','2017-11-09 09:43:37','2017-11-09 09:44:13',NULL,'2017-11-09 09:43:37','2017-11-09 09:44:13'),(84,2,'203.62.1.16','2017-11-09 10:18:00','0000-00-00 00:00:00',NULL,'2017-11-09 10:18:00','2017-11-09 10:18:00'),(85,9,'203.62.1.16','2017-11-09 10:21:21','2017-11-09 10:28:24',NULL,'2017-11-09 10:21:21','2017-11-09 10:28:24'),(86,9,'203.62.1.16','2017-11-09 10:28:55','2017-11-09 12:19:19',NULL,'2017-11-09 10:28:55','2017-11-09 12:19:19'),(87,9,'112.215.170.225','2017-11-09 10:34:19','0000-00-00 00:00:00',NULL,'2017-11-09 10:34:19','2017-11-09 10:34:19'),(88,9,'112.215.170.225','2017-11-09 10:48:58','0000-00-00 00:00:00',NULL,'2017-11-09 10:48:58','2017-11-09 10:48:58'),(89,14,'42.153.56.93','2017-11-09 10:58:37','0000-00-00 00:00:00',NULL,'2017-11-09 10:58:37','2017-11-09 10:58:37'),(90,1,'112.215.170.225','2017-11-09 11:26:37','2017-11-09 11:29:56',NULL,'2017-11-09 11:26:37','2017-11-09 11:29:56'),(91,9,'112.215.170.225','2017-11-09 11:30:04','2017-11-09 11:30:54',NULL,'2017-11-09 11:30:04','2017-11-09 11:30:54'),(92,1,'112.215.170.225','2017-11-09 11:30:58','2017-11-09 11:32:37',NULL,'2017-11-09 11:30:58','2017-11-09 11:32:37'),(93,9,'112.215.170.225','2017-11-09 11:32:42','2017-11-09 11:33:30',NULL,'2017-11-09 11:32:42','2017-11-09 11:33:30'),(94,1,'112.215.170.225','2017-11-09 11:33:34','2017-11-09 11:37:28',NULL,'2017-11-09 11:33:34','2017-11-09 11:37:28'),(95,9,'112.215.170.225','2017-11-09 11:37:34','0000-00-00 00:00:00',NULL,'2017-11-09 11:37:34','2017-11-09 11:37:34'),(96,2,'203.62.1.16','2017-11-09 12:19:25','0000-00-00 00:00:00',NULL,'2017-11-09 12:19:25','2017-11-09 12:19:25'),(97,9,'112.215.170.225','2017-11-09 14:44:28','2017-11-09 14:45:35',NULL,'2017-11-09 14:44:28','2017-11-09 14:45:35'),(98,1,'112.215.170.225','2017-11-09 14:45:38','2017-11-09 14:48:10',NULL,'2017-11-09 14:45:38','2017-11-09 14:48:10'),(99,9,'112.215.170.225','2017-11-09 14:48:16','2017-11-09 14:50:36',NULL,'2017-11-09 14:48:16','2017-11-09 14:50:36'),(100,1,'112.215.170.225','2017-11-09 14:50:41','0000-00-00 00:00:00',NULL,'2017-11-09 14:50:41','2017-11-09 14:50:41'),(101,9,'175.143.64.145','2017-11-09 15:17:29','0000-00-00 00:00:00',NULL,'2017-11-09 15:17:29','2017-11-09 15:17:29'),(102,1,'112.215.170.225','2017-11-09 16:05:43','2017-11-09 16:06:02',NULL,'2017-11-09 16:05:43','2017-11-09 16:06:02'),(103,9,'112.215.170.225','2017-11-09 16:06:07','0000-00-00 00:00:00',NULL,'2017-11-09 16:06:07','2017-11-09 16:06:07'),(104,9,'112.215.170.225','2017-11-09 17:26:15','2017-11-09 17:33:30',NULL,'2017-11-09 17:26:15','2017-11-09 17:33:30'),(105,1,'112.215.170.225','2017-11-09 17:33:34','2017-11-09 17:33:41',NULL,'2017-11-09 17:33:34','2017-11-09 17:33:41'),(106,2,'112.215.170.225','2017-11-09 17:33:45','2017-11-09 17:33:55',NULL,'2017-11-09 17:33:45','2017-11-09 17:33:55'),(107,2,'175.143.193.80','2017-11-09 17:34:00','0000-00-00 00:00:00',NULL,'2017-11-09 17:34:00','2017-11-09 17:34:00'),(108,9,'175.143.193.80','2017-11-09 20:03:20','2017-11-09 22:06:30',NULL,'2017-11-09 20:03:20','2017-11-09 22:06:30'),(109,2,'175.143.193.80','2017-11-09 22:06:36','0000-00-00 00:00:00',NULL,'2017-11-09 22:06:36','2017-11-09 22:06:36'),(110,9,'112.215.170.225','2017-11-10 00:26:25','0000-00-00 00:00:00',NULL,'2017-11-10 00:26:25','2017-11-10 00:26:25'),(111,9,'121.122.43.73','2017-11-10 09:45:07','2017-11-10 11:25:08',NULL,'2017-11-10 09:45:07','2017-11-10 11:25:08'),(112,9,'112.215.238.151','2017-11-10 10:35:05','0000-00-00 00:00:00',NULL,'2017-11-10 10:35:05','2017-11-10 10:35:05'),(113,9,'121.122.43.73','2017-11-10 11:26:07','0000-00-00 00:00:00',NULL,'2017-11-10 11:26:07','2017-11-10 11:26:07'),(114,9,'121.122.43.73','2017-11-10 11:26:25','0000-00-00 00:00:00',NULL,'2017-11-10 11:26:25','2017-11-10 11:26:25'),(115,9,'121.122.43.73','2017-11-10 12:06:51','2017-11-10 12:09:22',NULL,'2017-11-10 12:06:51','2017-11-10 12:09:22'),(116,9,'121.122.43.73','2017-11-10 12:10:01','0000-00-00 00:00:00',NULL,'2017-11-10 12:10:01','2017-11-10 12:10:01'),(117,9,'121.122.43.73','2017-11-10 12:12:51','0000-00-00 00:00:00',NULL,'2017-11-10 12:12:51','2017-11-10 12:12:51'),(118,9,'112.215.238.151','2017-11-10 14:55:35','0000-00-00 00:00:00',NULL,'2017-11-10 14:55:35','2017-11-10 14:55:35'),(119,2,'175.143.193.80','2017-11-10 21:19:52','2017-11-10 22:40:03',NULL,'2017-11-10 21:19:52','2017-11-10 22:40:03'),(120,10,'175.143.193.80','2017-11-10 21:21:35','0000-00-00 00:00:00',NULL,'2017-11-10 21:21:35','2017-11-10 21:21:35'),(121,2,'175.143.193.80','2017-11-10 23:08:21','0000-00-00 00:00:00',NULL,'2017-11-10 23:08:21','2017-11-10 23:08:21'),(122,2,'175.143.193.80','2017-11-11 10:36:58','2017-11-11 10:58:52',NULL,'2017-11-11 10:36:58','2017-11-11 10:58:52'),(123,10,'175.143.193.80','2017-11-11 10:59:08','0000-00-00 00:00:00',NULL,'2017-11-11 10:59:08','2017-11-11 10:59:08'),(124,10,'175.143.193.80','2017-11-11 21:34:12','0000-00-00 00:00:00',NULL,'2017-11-11 21:34:12','2017-11-11 21:34:12'),(125,9,'175.143.193.80','2017-11-12 01:01:05','0000-00-00 00:00:00',NULL,'2017-11-12 01:01:05','2017-11-12 01:01:05'),(126,10,'175.143.193.80','2017-11-12 13:36:44','2017-11-12 18:27:31',NULL,'2017-11-12 13:36:44','2017-11-12 18:27:31'),(127,2,'175.143.193.80','2017-11-12 18:27:38','2017-11-12 18:31:04',NULL,'2017-11-12 18:27:38','2017-11-12 18:31:04'),(128,2,'175.143.193.80','2017-11-12 18:31:40','2017-11-12 18:31:51',NULL,'2017-11-12 18:31:40','2017-11-12 18:31:51'),(129,23,'175.143.193.80','2017-11-12 18:35:18','0000-00-00 00:00:00',NULL,'2017-11-12 18:35:18','2017-11-12 18:35:18'),(130,1,'112.215.239.16','2017-11-12 19:11:46','2017-11-12 19:11:58',NULL,'2017-11-12 19:11:46','2017-11-12 19:11:58'),(131,9,'112.215.239.16','2017-11-12 19:16:53','2017-11-12 19:17:23',NULL,'2017-11-12 19:16:53','2017-11-12 19:17:23'),(132,1,'112.215.239.16','2017-11-12 19:17:30','2017-11-12 19:17:41',NULL,'2017-11-12 19:17:30','2017-11-12 19:17:41'),(133,9,'112.215.239.16','2017-11-12 19:17:45','0000-00-00 00:00:00',NULL,'2017-11-12 19:17:45','2017-11-12 19:17:45'),(134,23,'175.143.193.80','2017-11-12 19:18:23','2017-11-12 19:22:06',NULL,'2017-11-12 19:18:23','2017-11-12 19:22:06'),(135,23,'175.143.193.80','2017-11-12 19:23:01','0000-00-00 00:00:00',NULL,'2017-11-12 19:23:01','2017-11-12 19:23:01'),(136,23,'175.143.193.80','2017-11-12 21:41:58','2017-11-12 21:49:53',NULL,'2017-11-12 21:41:58','2017-11-12 21:49:53'),(137,1,'175.143.193.80','2017-11-12 21:50:03','2017-11-12 21:54:33',NULL,'2017-11-12 21:50:03','2017-11-12 21:54:33'),(138,23,'175.143.193.80','2017-11-12 21:54:53','0000-00-00 00:00:00',NULL,'2017-11-12 21:54:53','2017-11-12 21:54:53'),(139,1,'112.215.45.116','2017-11-13 11:22:56','2017-11-13 12:29:11',NULL,'2017-11-13 11:22:56','2017-11-13 12:29:11'),(140,10,'121.122.43.73','2017-11-13 12:29:15','2017-11-13 13:12:42',NULL,'2017-11-13 12:29:15','2017-11-13 13:12:42'),(141,1,'112.215.45.116','2017-11-13 12:29:17','2017-11-13 12:29:28',NULL,'2017-11-13 12:29:17','2017-11-13 12:29:28'),(142,9,'112.215.45.116','2017-11-13 12:30:36','0000-00-00 00:00:00',NULL,'2017-11-13 12:30:36','2017-11-13 12:30:36'),(143,2,'121.122.43.73','2017-11-13 13:12:48','0000-00-00 00:00:00',NULL,'2017-11-13 13:12:48','2017-11-13 13:12:48'),(144,10,'121.122.43.73','2017-11-13 15:59:57','2017-11-13 16:03:54',NULL,'2017-11-13 15:59:57','2017-11-13 16:03:54'),(145,2,'121.122.43.73','2017-11-13 16:03:59','2017-11-13 16:27:38',NULL,'2017-11-13 16:03:59','2017-11-13 16:27:38'),(146,10,'121.122.43.73','2017-11-13 16:27:48','0000-00-00 00:00:00',NULL,'2017-11-13 16:27:48','2017-11-13 16:27:48'),(147,2,'121.122.43.73','2017-11-13 17:51:24','0000-00-00 00:00:00',NULL,'2017-11-13 17:51:24','2017-11-13 17:51:24'),(148,2,'118.100.42.246','2017-11-13 18:54:40','2017-11-13 19:01:15',NULL,'2017-11-13 18:54:40','2017-11-13 19:01:15'),(149,10,'118.100.42.246','2017-11-13 19:01:17','2017-11-13 19:05:00',NULL,'2017-11-13 19:01:17','2017-11-13 19:05:00'),(150,2,'118.100.42.246','2017-11-13 19:05:06','2017-11-13 19:08:37',NULL,'2017-11-13 19:05:06','2017-11-13 19:08:37'),(151,10,'118.100.42.246','2017-11-13 19:08:40','0000-00-00 00:00:00',NULL,'2017-11-13 19:08:40','2017-11-13 19:08:40'),(152,10,'118.100.42.246','2017-11-13 22:00:34','0000-00-00 00:00:00',NULL,'2017-11-13 22:00:34','2017-11-13 22:00:34'),(153,1,'112.215.171.32','2017-11-14 00:09:18','2017-11-14 00:10:49',NULL,'2017-11-14 00:09:18','2017-11-14 00:10:49'),(154,9,'112.215.171.32','2017-11-14 00:10:56','0000-00-00 00:00:00',NULL,'2017-11-14 00:10:56','2017-11-14 00:10:56'),(155,1,'112.215.235.148','2017-11-14 03:41:14','0000-00-00 00:00:00',NULL,'2017-11-14 03:41:14','2017-11-14 03:41:14'),(156,2,'118.100.42.246','2017-11-14 08:24:44','2017-11-14 08:35:06',NULL,'2017-11-14 08:24:44','2017-11-14 08:35:06'),(157,10,'118.100.42.246','2017-11-14 08:35:09','2017-11-14 11:56:06',NULL,'2017-11-14 08:35:09','2017-11-14 11:56:06'),(158,9,'112.215.171.79','2017-11-14 11:15:18','2017-11-14 11:15:26',NULL,'2017-11-14 11:15:18','2017-11-14 11:15:26'),(159,1,'112.215.171.79','2017-11-14 11:15:30','0000-00-00 00:00:00',NULL,'2017-11-14 11:15:30','2017-11-14 11:15:30'),(160,2,'121.122.43.73','2017-11-14 11:56:12','2017-11-14 12:27:06',NULL,'2017-11-14 11:56:12','2017-11-14 12:27:06'),(161,10,'121.122.43.73','2017-11-14 12:27:08','2017-11-14 13:22:48',NULL,'2017-11-14 12:27:08','2017-11-14 13:22:48'),(162,2,'121.122.43.73','2017-11-14 13:22:55','0000-00-00 00:00:00',NULL,'2017-11-14 13:22:55','2017-11-14 13:22:55'),(163,9,'112.215.171.79','2017-11-14 13:26:17','2017-11-14 13:35:32',NULL,'2017-11-14 13:26:17','2017-11-14 13:35:32'),(164,10,'121.122.43.73','2017-11-14 13:26:29','2017-11-14 13:28:58',NULL,'2017-11-14 13:26:29','2017-11-14 13:28:58'),(165,2,'121.122.43.73','2017-11-14 13:29:03','2017-11-14 13:29:32',NULL,'2017-11-14 13:29:03','2017-11-14 13:29:32'),(166,10,'121.122.43.73','2017-11-14 13:29:33','2017-11-14 13:34:54',NULL,'2017-11-14 13:29:33','2017-11-14 13:34:54'),(167,10,'121.122.43.73','2017-11-14 13:35:06','2017-11-14 13:35:42',NULL,'2017-11-14 13:35:06','2017-11-14 13:35:42'),(168,10,'112.215.171.79','2017-11-14 13:35:38','2017-11-14 14:45:35',NULL,'2017-11-14 13:35:38','2017-11-14 14:45:35'),(169,2,'121.122.43.73','2017-11-14 13:35:51','2017-11-14 13:46:21',NULL,'2017-11-14 13:35:51','2017-11-14 13:46:21'),(170,10,'121.122.43.73','2017-11-14 13:46:23','2017-11-14 13:50:43',NULL,'2017-11-14 13:46:23','2017-11-14 13:50:43'),(171,10,'121.122.43.73','2017-11-14 13:51:10','2017-11-14 13:55:13',NULL,'2017-11-14 13:51:10','2017-11-14 13:55:13'),(172,2,'121.122.43.73','2017-11-14 13:55:19','2017-11-14 14:01:30',NULL,'2017-11-14 13:55:19','2017-11-14 14:01:30'),(173,10,'121.122.43.73','2017-11-14 14:04:50','2017-11-14 14:07:08',NULL,'2017-11-14 14:04:50','2017-11-14 14:07:08'),(174,2,'121.122.43.73','2017-11-14 14:07:14','0000-00-00 00:00:00',NULL,'2017-11-14 14:07:14','2017-11-14 14:07:14'),(175,1,'112.215.171.79','2017-11-14 14:45:39','0000-00-00 00:00:00',NULL,'2017-11-14 14:45:39','2017-11-14 14:45:39'),(176,10,'121.122.43.73','2017-11-14 15:18:18','2017-11-14 16:32:24',NULL,'2017-11-14 15:18:18','2017-11-14 16:32:24'),(177,2,'121.122.43.73','2017-11-14 16:32:31','2017-11-14 16:33:48',NULL,'2017-11-14 16:32:31','2017-11-14 16:33:48'),(178,10,'121.122.43.73','2017-11-14 16:33:51','2017-11-14 16:59:01',NULL,'2017-11-14 16:33:51','2017-11-14 16:59:01'),(179,1,'112.215.200.230','2017-11-14 16:55:42','2017-11-14 16:55:57',NULL,'2017-11-14 16:55:42','2017-11-14 16:55:57'),(180,9,'112.215.200.230','2017-11-14 16:56:02','2017-11-14 17:01:56',NULL,'2017-11-14 16:56:02','2017-11-14 17:01:56'),(181,2,'121.122.43.73','2017-11-14 16:59:07','2017-11-14 17:39:15',NULL,'2017-11-14 16:59:07','2017-11-14 17:39:15'),(182,1,'112.215.200.230','2017-11-14 17:02:19','0000-00-00 00:00:00',NULL,'2017-11-14 17:02:19','2017-11-14 17:02:19'),(183,10,'121.122.43.73','2017-11-14 17:39:17','2017-11-14 18:38:55',NULL,'2017-11-14 17:39:17','2017-11-14 18:38:55'),(184,10,'210.195.251.232','2017-11-14 18:40:49','0000-00-00 00:00:00',NULL,'2017-11-14 18:40:49','2017-11-14 18:40:49'),(185,9,'112.215.152.69','2017-11-14 21:28:29','0000-00-00 00:00:00',NULL,'2017-11-14 21:28:29','2017-11-14 21:28:29'),(186,9,'112.215.151.194','2017-11-15 02:00:10','0000-00-00 00:00:00',NULL,'2017-11-15 02:00:10','2017-11-15 02:00:10'),(187,9,'112.215.151.194','2017-11-15 03:44:11','2017-11-15 03:44:50',NULL,'2017-11-15 03:44:11','2017-11-15 03:44:50'),(188,1,'112.215.151.194','2017-11-15 03:44:54','0000-00-00 00:00:00',NULL,'2017-11-15 03:44:54','2017-11-15 03:44:54'),(189,1,'112.215.151.194','2017-11-15 03:56:08','0000-00-00 00:00:00',NULL,'2017-11-15 03:56:08','2017-11-15 03:56:08'),(190,10,'175.143.64.145','2017-11-15 10:16:48','2017-11-15 10:17:45',NULL,'2017-11-15 10:16:48','2017-11-15 10:17:45'),(191,2,'175.143.64.145','2017-11-15 10:17:51','2017-11-15 12:26:50',NULL,'2017-11-15 10:17:51','2017-11-15 12:26:50'),(192,1,'112.215.239.34','2017-11-15 10:26:45','0000-00-00 00:00:00',NULL,'2017-11-15 10:26:45','2017-11-15 10:26:45'),(193,10,'175.143.64.145','2017-11-15 12:26:53','2017-11-15 16:12:56',NULL,'2017-11-15 12:26:53','2017-11-15 16:12:56'),(194,1,'112.215.239.34','2017-11-15 14:35:44','0000-00-00 00:00:00',NULL,'2017-11-15 14:35:44','2017-11-15 14:35:44'),(195,9,'112.215.239.34','2017-11-15 15:14:48','0000-00-00 00:00:00',NULL,'2017-11-15 15:14:48','2017-11-15 15:14:48'),(196,10,'175.143.64.145','2017-11-15 16:13:05','2017-11-15 16:18:27',NULL,'2017-11-15 16:13:05','2017-11-15 16:18:27'),(197,9,'112.215.239.34','2017-11-15 16:16:55','2017-11-15 16:19:05',NULL,'2017-11-15 16:16:55','2017-11-15 16:19:05'),(198,10,'112.215.239.34','2017-11-15 16:19:09','2017-11-15 16:27:09',NULL,'2017-11-15 16:19:09','2017-11-15 16:27:09'),(199,1,'112.215.239.34','2017-11-15 16:27:14','2017-11-15 16:27:50',NULL,'2017-11-15 16:27:14','2017-11-15 16:27:50'),(200,10,'112.215.239.34','2017-11-15 16:27:57','0000-00-00 00:00:00',NULL,'2017-11-15 16:27:57','2017-11-15 16:27:57'),(201,10,'210.195.251.232','2017-11-15 17:38:47','2017-11-15 17:40:04',NULL,'2017-11-15 17:38:47','2017-11-15 17:40:04'),(202,10,'210.195.251.232','2017-11-15 22:52:18','0000-00-00 00:00:00',NULL,'2017-11-15 22:52:18','2017-11-15 22:52:18'),(203,10,'42.153.47.7','2017-11-16 10:28:30','0000-00-00 00:00:00',NULL,'2017-11-16 10:28:30','2017-11-16 10:28:30'),(204,9,'112.215.45.48','2017-11-16 12:32:11','0000-00-00 00:00:00',NULL,'2017-11-16 12:32:11','2017-11-16 12:32:11'),(205,10,'121.122.43.73','2017-11-16 14:31:56','0000-00-00 00:00:00',NULL,'2017-11-16 14:31:56','2017-11-16 14:31:56'),(206,9,'112.215.45.48','2017-11-16 14:47:41','2017-11-16 14:49:11',NULL,'2017-11-16 14:47:41','2017-11-16 14:49:11'),(207,10,'112.215.45.48','2017-11-16 14:49:15','0000-00-00 00:00:00',NULL,'2017-11-16 14:49:15','2017-11-16 14:49:15'),(208,10,'121.122.43.73','2017-11-20 10:38:11','0000-00-00 00:00:00',NULL,'2017-11-20 10:38:11','2017-11-20 10:38:11'),(209,1,'112.215.235.105','2017-11-21 15:34:47','2017-11-21 15:41:07',NULL,'2017-11-21 15:34:47','2017-11-21 15:41:07'),(210,10,'121.122.43.73','2017-11-21 15:35:10','2017-11-21 15:35:33',NULL,'2017-11-21 15:35:10','2017-11-21 15:35:33'),(211,2,'121.122.43.73','2017-11-23 10:19:05','0000-00-00 00:00:00',NULL,'2017-11-23 10:19:05','2017-11-23 10:19:05'),(212,10,'121.122.43.73','2017-11-23 10:24:37','2017-11-23 10:26:07',NULL,'2017-11-23 10:24:37','2017-11-23 10:26:07'),(213,9,'112.215.236.15','2017-11-23 10:32:49','2017-11-23 10:35:09',NULL,'2017-11-23 10:32:49','2017-11-23 10:35:09'),(214,10,'121.122.43.73','2017-11-23 10:35:41','2017-11-23 11:14:19',NULL,'2017-11-23 10:35:41','2017-11-23 11:14:19'),(215,9,'112.215.236.15','2017-11-23 10:36:53','2017-11-23 10:37:14',NULL,'2017-11-23 10:36:53','2017-11-23 10:37:14'),(216,10,'112.215.236.15','2017-11-23 10:37:22','2017-11-23 14:52:41',NULL,'2017-11-23 10:37:22','2017-11-23 14:52:41'),(217,2,'121.122.43.73','2017-11-23 11:14:23','2017-11-23 11:27:18',NULL,'2017-11-23 11:14:23','2017-11-23 11:27:18'),(218,10,'121.122.43.73','2017-11-23 11:27:21','2017-11-23 12:32:17',NULL,'2017-11-23 11:27:21','2017-11-23 12:32:17'),(219,2,'121.122.43.73','2017-11-23 12:32:25','2017-11-23 14:13:45',NULL,'2017-11-23 12:32:25','2017-11-23 14:13:45'),(220,10,'121.122.43.73','2017-11-23 14:13:47','2017-11-23 14:49:55',NULL,'2017-11-23 14:13:47','2017-11-23 14:49:55'),(221,2,'121.122.43.73','2017-11-23 14:50:05','2017-11-23 15:51:24',NULL,'2017-11-23 14:50:05','2017-11-23 15:51:24'),(222,1,'112.215.65.1','2017-11-23 14:53:29','0000-00-00 00:00:00',NULL,'2017-11-23 14:53:29','2017-11-23 14:53:29'),(223,1,'121.122.43.73','2017-11-23 15:51:33','2017-11-23 16:09:03',NULL,'2017-11-23 15:51:33','2017-11-23 16:09:03'),(224,9,'112.215.65.1','2017-11-23 16:08:07','0000-00-00 00:00:00',NULL,'2017-11-23 16:08:07','2017-11-23 16:08:07'),(225,10,'121.122.43.73','2017-11-23 16:09:05','0000-00-00 00:00:00',NULL,'2017-11-23 16:09:05','2017-11-23 16:09:05'),(226,2,'203.62.1.16','2017-11-24 09:57:44','0000-00-00 00:00:00',NULL,'2017-11-24 09:57:44','2017-11-24 09:57:44'),(227,2,'203.62.1.16','2017-11-24 10:00:14','0000-00-00 00:00:00',NULL,'2017-11-24 10:00:14','2017-11-24 10:00:14'),(228,10,'203.62.1.16','2017-11-24 10:03:27','0000-00-00 00:00:00',NULL,'2017-11-24 10:03:27','2017-11-24 10:03:27'),(229,21,'202.60.56.233','2017-11-24 10:14:29','0000-00-00 00:00:00',NULL,'2017-11-24 10:14:29','2017-11-24 10:14:29'),(230,1,'112.215.239.143','2017-11-24 10:15:00','2017-11-24 16:26:51',NULL,'2017-11-24 10:15:00','2017-11-24 16:26:51'),(231,14,'202.60.56.233','2017-11-24 10:15:12','0000-00-00 00:00:00',NULL,'2017-11-24 10:15:12','2017-11-24 10:15:12'),(232,2,'202.60.56.233','2017-11-24 10:34:55','2017-11-24 10:48:59',NULL,'2017-11-24 10:34:55','2017-11-24 10:48:59'),(233,25,'202.60.56.233','2017-11-24 10:40:29','2017-11-24 11:29:02',NULL,'2017-11-24 10:40:29','2017-11-24 11:29:02'),(234,21,'202.60.56.233','2017-11-24 10:49:24','0000-00-00 00:00:00',NULL,'2017-11-24 10:49:24','2017-11-24 10:49:24'),(235,2,'202.60.56.233','2017-11-24 11:30:07','2017-11-24 11:31:23',NULL,'2017-11-24 11:30:07','2017-11-24 11:31:23'),(236,26,'202.60.56.233','2017-11-24 11:31:49','2017-11-24 11:39:56',NULL,'2017-11-24 11:31:49','2017-11-24 11:39:56'),(237,2,'202.60.56.233','2017-11-24 11:40:04','0000-00-00 00:00:00',NULL,'2017-11-24 11:40:04','2017-11-24 11:40:04'),(238,10,'175.143.64.145','2017-11-24 15:02:24','0000-00-00 00:00:00',NULL,'2017-11-24 15:02:24','2017-11-24 15:02:24'),(239,9,'112.215.45.239','2017-11-24 16:26:57','0000-00-00 00:00:00',NULL,'2017-11-24 16:26:57','2017-11-24 16:26:57'),(240,10,'121.122.43.73','2017-11-28 11:04:19','0000-00-00 00:00:00',NULL,'2017-11-28 11:04:19','2017-11-28 11:04:19'),(241,10,'121.122.43.73','2017-11-29 10:42:40','0000-00-00 00:00:00',NULL,'2017-11-29 10:42:40','2017-11-29 10:42:40'),(242,27,'112.215.171.211','2017-11-29 15:50:50','2017-11-29 15:55:44',NULL,'2017-11-29 15:50:50','2017-11-29 15:55:44'),(243,27,'112.215.171.211','2017-11-29 15:58:45','2017-11-29 16:03:04',NULL,'2017-11-29 15:58:45','2017-11-29 16:03:04'),(244,10,'112.215.171.211','2017-11-29 16:03:28','2017-11-29 16:09:34',NULL,'2017-11-29 16:03:28','2017-11-29 16:09:34'),(245,27,'112.215.171.211','2017-11-29 16:09:42','2017-11-29 16:20:25',NULL,'2017-11-29 16:09:42','2017-11-29 16:20:25'),(246,10,'112.215.171.211','2017-11-29 16:20:30','0000-00-00 00:00:00',NULL,'2017-11-29 16:20:30','2017-11-29 16:20:30'),(247,10,'112.215.65.245','2017-11-30 10:44:55','0000-00-00 00:00:00',NULL,'2017-11-30 10:44:55','2017-11-30 10:44:55'),(248,10,'112.215.65.245','2017-11-30 12:06:34','0000-00-00 00:00:00',NULL,'2017-11-30 12:06:34','2017-11-30 12:06:34'),(249,10,'112.215.65.245','2017-11-30 13:43:38','0000-00-00 00:00:00',NULL,'2017-11-30 13:43:38','2017-11-30 13:43:38'),(250,10,'42.153.62.205','2017-12-04 09:25:24','2017-12-04 09:53:55',NULL,'2017-12-04 09:25:24','2017-12-04 09:53:55'),(251,9,'112.215.200.250','2017-12-04 09:50:58','0000-00-00 00:00:00',NULL,'2017-12-04 09:50:58','2017-12-04 09:50:58'),(252,2,'42.153.62.205','2017-12-04 09:54:02','0000-00-00 00:00:00',NULL,'2017-12-04 09:54:02','2017-12-04 09:54:02'),(253,9,'112.215.200.250','2017-12-04 14:45:22','0000-00-00 00:00:00',NULL,'2017-12-04 14:45:22','2017-12-04 14:45:22'),(254,9,'112.215.200.250','2017-12-04 14:53:30','0000-00-00 00:00:00',NULL,'2017-12-04 14:53:30','2017-12-04 14:53:30'),(255,10,'42.153.62.205','2017-12-04 23:18:36','0000-00-00 00:00:00',NULL,'2017-12-04 23:18:36','2017-12-04 23:18:36'),(256,9,'112.215.45.124','2017-12-11 17:19:21','2017-12-11 17:19:29',NULL,'2017-12-11 17:19:21','2017-12-11 17:19:29'),(257,10,'112.215.45.124','2017-12-11 17:21:25','0000-00-00 00:00:00',NULL,'2017-12-11 17:21:25','2017-12-11 17:21:25'),(258,9,'112.215.201.144','2017-12-12 14:40:59','0000-00-00 00:00:00',NULL,'2017-12-12 14:40:59','2017-12-12 14:40:59'),(259,9,'112.215.201.144','2017-12-12 16:39:48','0000-00-00 00:00:00',NULL,'2017-12-12 16:39:48','2017-12-12 16:39:48'),(260,1,'211.24.103.26','2017-12-13 11:43:37','2017-12-13 11:44:57',NULL,'2017-12-13 11:43:37','2017-12-13 11:44:57'),(261,10,'211.24.103.26','2017-12-13 11:45:02','0000-00-00 00:00:00',NULL,'2017-12-13 11:45:02','2017-12-13 11:45:02'),(262,1,'211.24.103.26','2017-12-13 11:46:00','0000-00-00 00:00:00',NULL,'2017-12-13 11:46:00','2017-12-13 11:46:00'),(263,10,'121.122.43.73','2017-12-13 15:51:47','0000-00-00 00:00:00',NULL,'2017-12-13 15:51:47','2017-12-13 15:51:47'),(264,2,'121.122.43.73','2017-12-13 16:19:14','0000-00-00 00:00:00',NULL,'2017-12-13 16:19:14','2017-12-13 16:19:14'),(265,1,'121.122.43.73','2017-12-13 16:19:56','2017-12-13 16:35:18',NULL,'2017-12-13 16:19:56','2017-12-13 16:35:18'),(266,1,'121.122.43.73','2017-12-13 16:35:28','2017-12-13 16:35:53',NULL,'2017-12-13 16:35:28','2017-12-13 16:35:53'),(267,1,'121.122.43.73','2017-12-14 09:46:03','0000-00-00 00:00:00',NULL,'2017-12-14 09:46:03','2017-12-14 09:46:03'),(268,10,'121.122.43.73','2017-12-14 14:01:00','2017-12-14 14:09:38',NULL,'2017-12-14 14:01:00','2017-12-14 14:09:38'),(269,2,'121.122.43.73','2017-12-14 14:09:45','0000-00-00 00:00:00',NULL,'2017-12-14 14:09:45','2017-12-14 14:09:45'),(270,9,'112.215.65.174','2017-12-14 16:20:45','0000-00-00 00:00:00',NULL,'2017-12-14 16:20:45','2017-12-14 16:20:45'),(271,10,'121.122.43.73','2017-12-14 16:27:00','0000-00-00 00:00:00',NULL,'2017-12-14 16:27:00','2017-12-14 16:27:00'),(272,10,'121.122.43.73','2017-12-14 16:41:33','0000-00-00 00:00:00',NULL,'2017-12-14 16:41:33','2017-12-14 16:41:33'),(273,1,'121.122.43.73','2017-12-15 09:40:31','2017-12-15 10:21:38',NULL,'2017-12-15 09:40:31','2017-12-15 10:21:38'),(274,1,'121.122.43.73','2017-12-15 10:21:46','2017-12-15 13:09:40',NULL,'2017-12-15 10:21:46','2017-12-15 13:09:40'),(275,10,'203.80.16.228','2017-12-16 10:48:58','2017-12-16 10:52:16',NULL,'2017-12-16 10:48:58','2017-12-16 10:52:16'),(276,2,'203.80.16.228','2017-12-16 10:52:24','0000-00-00 00:00:00',NULL,'2017-12-16 10:52:24','2017-12-16 10:52:24'),(277,10,'110.159.157.27','2017-12-16 16:45:45','0000-00-00 00:00:00',NULL,'2017-12-16 16:45:45','2017-12-16 16:45:45'),(278,1,'112.215.201.119','2017-12-16 16:49:13','2017-12-16 16:50:58',NULL,'2017-12-16 16:49:13','2017-12-16 16:50:58'),(279,10,'112.215.201.119','2017-12-16 16:52:31','0000-00-00 00:00:00',NULL,'2017-12-16 16:52:31','2017-12-16 16:52:31'),(280,10,'110.159.157.27','2017-12-17 16:23:32','0000-00-00 00:00:00',NULL,'2017-12-17 16:23:32','2017-12-17 16:23:32'),(281,2,'110.159.157.27','2017-12-17 17:38:01','2017-12-17 17:39:42',NULL,'2017-12-17 17:38:01','2017-12-17 17:39:42'),(282,23,'110.159.157.27','2017-12-17 17:40:46','2017-12-17 17:54:05',NULL,'2017-12-17 17:40:46','2017-12-17 17:54:05'),(283,2,'110.159.157.27','2017-12-17 17:54:11','2017-12-17 18:01:36',NULL,'2017-12-17 17:54:11','2017-12-17 18:01:36'),(284,23,'110.159.157.27','2017-12-17 18:01:57','2017-12-17 18:02:16',NULL,'2017-12-17 18:01:57','2017-12-17 18:02:16'),(285,2,'110.159.157.27','2017-12-17 18:02:21','2017-12-17 18:02:46',NULL,'2017-12-17 18:02:21','2017-12-17 18:02:46'),(286,23,'110.159.157.27','2017-12-17 18:02:58','2017-12-17 18:18:15',NULL,'2017-12-17 18:02:58','2017-12-17 18:18:15'),(287,2,'110.159.157.27','2017-12-17 18:18:22','0000-00-00 00:00:00',NULL,'2017-12-17 18:18:22','2017-12-17 18:18:22'),(288,10,'110.159.157.27','2017-12-18 06:28:20','0000-00-00 00:00:00',NULL,'2017-12-18 06:28:20','2017-12-18 06:28:20'),(289,10,'112.215.239.30','2017-12-18 07:41:15','2017-12-18 09:38:44',NULL,'2017-12-18 07:41:15','2017-12-18 09:38:44'),(290,10,'121.122.43.73','2017-12-18 09:27:44','2017-12-18 09:36:50',NULL,'2017-12-18 09:27:44','2017-12-18 09:36:50'),(291,1,'112.215.239.30','2017-12-18 09:38:50','0000-00-00 00:00:00',NULL,'2017-12-18 09:38:50','2017-12-18 09:38:50'),(292,1,'121.122.43.73','2017-12-18 09:47:40','2017-12-18 12:31:21',NULL,'2017-12-18 09:47:40','2017-12-18 12:31:21'),(293,1,'112.215.171.235','2017-12-18 10:48:06','0000-00-00 00:00:00',NULL,'2017-12-18 10:48:06','2017-12-18 10:48:06'),(294,1,'112.215.171.235','2017-12-18 12:30:05','2017-12-18 12:36:48',NULL,'2017-12-18 12:30:05','2017-12-18 12:36:48'),(295,10,'121.122.43.73','2017-12-18 12:31:23','2017-12-18 13:07:03',NULL,'2017-12-18 12:31:23','2017-12-18 13:07:03'),(296,9,'112.215.171.235','2017-12-18 12:36:54','2017-12-18 12:37:00',NULL,'2017-12-18 12:36:54','2017-12-18 12:37:00'),(297,10,'112.215.171.235','2017-12-18 12:37:56','2017-12-18 13:09:08',NULL,'2017-12-18 12:37:56','2017-12-18 13:09:08'),(298,2,'121.122.43.73','2017-12-18 13:07:11','2017-12-18 13:17:36',NULL,'2017-12-18 13:07:11','2017-12-18 13:17:36'),(299,1,'112.215.171.235','2017-12-18 13:09:17','2017-12-18 13:22:13',NULL,'2017-12-18 13:09:17','2017-12-18 13:22:13'),(300,10,'121.122.43.73','2017-12-18 13:17:38','0000-00-00 00:00:00',NULL,'2017-12-18 13:17:38','2017-12-18 13:17:38'),(301,10,'112.215.171.235','2017-12-18 13:26:01','0000-00-00 00:00:00',NULL,'2017-12-18 13:26:01','2017-12-18 13:26:01'),(302,10,'121.122.43.73','2017-12-18 13:30:02','2017-12-18 18:42:01',NULL,'2017-12-18 13:30:02','2017-12-18 18:42:01'),(303,9,'112.215.171.235','2017-12-18 16:20:49','0000-00-00 00:00:00',NULL,'2017-12-18 16:20:49','2017-12-18 16:20:49'),(304,2,'110.159.157.27','2017-12-18 18:42:09','2017-12-18 18:43:20',NULL,'2017-12-18 18:42:09','2017-12-18 18:43:20'),(305,10,'110.159.157.27','2017-12-18 18:43:22','0000-00-00 00:00:00',NULL,'2017-12-18 18:43:22','2017-12-18 18:43:22'),(306,10,'110.159.157.27','2017-12-18 20:05:48','2017-12-18 20:23:26',NULL,'2017-12-18 20:05:48','2017-12-18 20:23:26'),(307,10,'110.159.157.27','2017-12-18 20:09:54','2017-12-18 21:24:28',NULL,'2017-12-18 20:09:54','2017-12-18 21:24:28'),(308,2,'110.159.157.27','2017-12-18 20:23:41','0000-00-00 00:00:00',NULL,'2017-12-18 20:23:41','2017-12-18 20:23:41'),(309,2,'110.159.157.27','2017-12-18 21:24:37','2017-12-18 21:46:57',NULL,'2017-12-18 21:24:37','2017-12-18 21:46:57'),(310,10,'110.159.157.27','2017-12-18 21:46:59','0000-00-00 00:00:00',NULL,'2017-12-18 21:46:59','2017-12-18 21:46:59'),(311,9,'112.215.45.72','2017-12-19 12:11:29','2017-12-19 12:11:41',NULL,'2017-12-19 12:11:29','2017-12-19 12:11:41'),(312,10,'112.215.45.72','2017-12-19 12:13:58','0000-00-00 00:00:00',NULL,'2017-12-19 12:13:58','2017-12-19 12:13:58'),(313,2,'121.122.43.73','2017-12-19 12:40:20','0000-00-00 00:00:00',NULL,'2017-12-19 12:40:20','2017-12-19 12:40:20'),(314,10,'121.122.43.73','2017-12-19 12:41:54','0000-00-00 00:00:00',NULL,'2017-12-19 12:41:54','2017-12-19 12:41:54'),(315,10,'112.215.45.72','2017-12-19 13:44:59','2017-12-19 13:45:06',NULL,'2017-12-19 13:44:59','2017-12-19 13:45:06'),(316,1,'112.215.45.72','2017-12-19 13:45:11','2017-12-19 15:20:22',NULL,'2017-12-19 13:45:11','2017-12-19 15:20:22'),(317,10,'112.215.45.72','2017-12-19 15:20:32','2017-12-19 16:32:12',NULL,'2017-12-19 15:20:32','2017-12-19 16:32:12'),(318,1,'112.215.45.72','2017-12-19 16:32:16','0000-00-00 00:00:00',NULL,'2017-12-19 16:32:16','2017-12-19 16:32:16'),(319,10,'110.159.157.27','2017-12-19 17:32:15','2017-12-19 18:10:05',NULL,'2017-12-19 17:32:15','2017-12-19 18:10:05'),(320,2,'110.159.157.27','2017-12-19 18:10:12','0000-00-00 00:00:00',NULL,'2017-12-19 18:10:12','2017-12-19 18:10:12'),(321,10,'112.215.152.44','2017-12-19 21:58:56','2017-12-19 22:29:07',NULL,'2017-12-19 21:58:56','2017-12-19 22:29:07'),(322,1,'112.215.152.44','2017-12-19 22:29:13','2017-12-19 22:30:55',NULL,'2017-12-19 22:29:13','2017-12-19 22:30:55'),(323,10,'112.215.152.44','2017-12-19 22:31:44','0000-00-00 00:00:00',NULL,'2017-12-19 22:31:44','2017-12-19 22:31:44'),(324,9,'112.215.152.44','2017-12-19 23:45:53','0000-00-00 00:00:00',NULL,'2017-12-19 23:45:53','2017-12-19 23:45:53'),(325,1,'112.215.151.185','2017-12-20 09:24:14','2017-12-20 09:24:18',NULL,'2017-12-20 09:24:14','2017-12-20 09:24:18'),(326,10,'112.215.151.185','2017-12-20 09:24:50','2017-12-20 09:46:59',NULL,'2017-12-20 09:24:50','2017-12-20 09:46:59'),(327,1,'112.215.151.185','2017-12-20 09:47:03','0000-00-00 00:00:00',NULL,'2017-12-20 09:47:03','2017-12-20 09:47:03'),(328,10,'203.62.1.16','2017-12-20 10:46:09','2017-12-20 17:35:19',NULL,'2017-12-20 10:46:09','2017-12-20 17:35:19'),(329,10,'112.215.151.185','2017-12-20 14:00:42','0000-00-00 00:00:00',NULL,'2017-12-20 14:00:42','2017-12-20 14:00:42'),(330,9,'175.142.164.62','2017-12-20 15:09:17','0000-00-00 00:00:00',NULL,'2017-12-20 15:09:17','2017-12-20 15:09:17'),(331,10,'203.62.1.16','2017-12-20 17:35:30','0000-00-00 00:00:00',NULL,'2017-12-20 17:35:30','2017-12-20 17:35:30'),(332,10,'112.215.151.185','2017-12-20 17:48:49','0000-00-00 00:00:00',NULL,'2017-12-20 17:48:49','2017-12-20 17:48:49'),(333,10,'110.159.157.27','2017-12-20 18:47:15','0000-00-00 00:00:00',NULL,'2017-12-20 18:47:15','2017-12-20 18:47:15'),(334,10,'110.159.157.27','2017-12-20 21:09:44','2017-12-20 21:39:29',NULL,'2017-12-20 21:09:44','2017-12-20 21:39:29'),(335,2,'110.159.157.27','2017-12-20 21:39:35','2017-12-20 21:44:00',NULL,'2017-12-20 21:39:35','2017-12-20 21:44:00'),(336,9,'112.215.151.185','2017-12-20 21:40:34','2017-12-20 22:11:56',NULL,'2017-12-20 21:40:34','2017-12-20 22:11:56'),(337,10,'110.159.157.27','2017-12-20 21:45:30','0000-00-00 00:00:00',NULL,'2017-12-20 21:45:30','2017-12-20 21:45:30'),(338,10,'112.215.152.14','2017-12-20 22:12:04','0000-00-00 00:00:00',NULL,'2017-12-20 22:12:04','2017-12-20 22:12:04'),(339,10,'203.62.1.16','2017-12-21 17:03:16','2017-12-21 17:03:33',NULL,'2017-12-21 17:03:16','2017-12-21 17:03:33'),(340,23,'203.62.1.16','2017-12-21 17:12:54','2017-12-21 17:28:57',NULL,'2017-12-21 17:12:54','2017-12-21 17:28:57'),(341,1,'112.215.65.118','2017-12-21 17:29:10','0000-00-00 00:00:00',NULL,'2017-12-21 17:29:10','2017-12-21 17:29:10'),(342,23,'203.62.1.16','2017-12-21 17:29:44','0000-00-00 00:00:00',NULL,'2017-12-21 17:29:44','2017-12-21 17:29:44'),(343,23,'112.215.65.118','2017-12-21 20:33:02','2017-12-21 20:43:52',NULL,'2017-12-21 20:33:02','2017-12-21 20:43:52'),(344,1,'112.215.65.118','2017-12-21 20:44:17','2017-12-21 20:56:47',NULL,'2017-12-21 20:44:17','2017-12-21 20:56:47'),(345,9,'112.215.65.118','2017-12-21 20:56:53','2017-12-21 20:58:31',NULL,'2017-12-21 20:56:53','2017-12-21 20:58:31'),(346,1,'112.215.65.118','2017-12-21 20:58:37','2017-12-21 21:13:47',NULL,'2017-12-21 20:58:37','2017-12-21 21:13:47'),(347,23,'112.215.65.118','2017-12-21 21:13:58','2017-12-21 21:18:48',NULL,'2017-12-21 21:13:58','2017-12-21 21:18:48'),(348,1,'112.215.65.118','2017-12-21 21:18:55','2017-12-21 21:19:02',NULL,'2017-12-21 21:18:55','2017-12-21 21:19:02'),(349,2,'110.159.157.27','2017-12-21 23:38:08','2017-12-21 23:39:08',NULL,'2017-12-21 23:38:08','2017-12-21 23:39:08'),(350,10,'110.159.157.27','2017-12-21 23:39:21','0000-00-00 00:00:00',NULL,'2017-12-21 23:39:21','2017-12-21 23:39:21'),(351,23,'203.62.1.16','2017-12-22 08:27:44','2017-12-22 08:27:57',NULL,'2017-12-22 08:27:44','2017-12-22 08:27:57'),(352,18,'203.62.1.16','2017-12-22 08:28:09','2017-12-22 08:33:11',NULL,'2017-12-22 08:28:09','2017-12-22 08:33:11'),(353,2,'203.62.1.16','2017-12-22 08:33:19','2017-12-22 08:35:36',NULL,'2017-12-22 08:33:19','2017-12-22 08:35:36'),(354,1,'203.62.1.16','2017-12-22 08:35:41','2017-12-22 08:39:31',NULL,'2017-12-22 08:35:41','2017-12-22 08:39:31'),(355,10,'203.62.1.16','2017-12-22 08:39:34','2017-12-22 08:46:00',NULL,'2017-12-22 08:39:34','2017-12-22 08:46:00'),(356,1,'112.215.151.101','2017-12-22 08:42:39','2017-12-22 08:58:00',NULL,'2017-12-22 08:42:39','2017-12-22 08:58:00'),(357,1,'203.62.1.16','2017-12-22 08:46:11','2017-12-22 08:51:53',NULL,'2017-12-22 08:46:11','2017-12-22 08:51:53'),(358,18,'203.62.1.16','2017-12-22 08:47:09','2017-12-22 08:52:19',NULL,'2017-12-22 08:47:09','2017-12-22 08:52:19'),(359,18,'203.62.1.16','2017-12-22 08:52:04','2017-12-22 08:52:15',NULL,'2017-12-22 08:52:04','2017-12-22 08:52:15'),(360,10,'203.62.1.16','2017-12-22 08:52:49','2017-12-22 08:53:03',NULL,'2017-12-22 08:52:49','2017-12-22 08:53:03'),(361,1,'203.62.1.16','2017-12-22 08:53:09','0000-00-00 00:00:00',NULL,'2017-12-22 08:53:09','2017-12-22 08:53:09'),(362,10,'112.215.151.101','2017-12-22 08:58:10','2017-12-22 08:58:49',NULL,'2017-12-22 08:58:10','2017-12-22 08:58:49'),(363,1,'112.215.151.101','2017-12-22 08:58:55','2017-12-22 08:59:19',NULL,'2017-12-22 08:58:55','2017-12-22 08:59:19'),(364,10,'112.215.151.101','2017-12-22 08:59:27','2017-12-22 09:24:30',NULL,'2017-12-22 08:59:27','2017-12-22 09:24:30'),(365,10,'203.62.1.16','2017-12-22 09:00:33','2017-12-22 09:08:37',NULL,'2017-12-22 09:00:33','2017-12-22 09:08:37'),(366,23,'203.62.1.16','2017-12-22 09:08:41','0000-00-00 00:00:00',NULL,'2017-12-22 09:08:41','2017-12-22 09:08:41'),(367,1,'112.215.151.101','2017-12-22 09:24:35','2017-12-22 09:27:07',NULL,'2017-12-22 09:24:35','2017-12-22 09:27:07'),(368,9,'112.215.151.101','2017-12-22 09:27:13','2017-12-22 09:27:58',NULL,'2017-12-22 09:27:13','2017-12-22 09:27:58'),(369,1,'112.215.151.101','2017-12-22 09:28:03','0000-00-00 00:00:00',NULL,'2017-12-22 09:28:03','2017-12-22 09:28:03');
/*!40000 ALTER TABLE `activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_convenience_declarations`
--

DROP TABLE IF EXISTS `applicant_convenience_declarations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_convenience_declarations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_number` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_date` datetime NOT NULL,
  `applicant_convenience_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_convenience_declarations`
--

LOCK TABLES `applicant_convenience_declarations` WRITE;
/*!40000 ALTER TABLE `applicant_convenience_declarations` DISABLE KEYS */;
INSERT INTO `applicant_convenience_declarations` VALUES (1,'Mohd Arizan Ali','820621115411','2017-12-22 00:00:00',1,NULL,'2017-12-22 08:41:20','2017-12-22 08:41:20');
/*!40000 ALTER TABLE `applicant_convenience_declarations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_convenience_people`
--

DROP TABLE IF EXISTS `applicant_convenience_people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_convenience_people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_convenience_id` int(11) NOT NULL,
  `person` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_convenience_people`
--

LOCK TABLES `applicant_convenience_people` WRITE;
/*!40000 ALTER TABLE `applicant_convenience_people` DISABLE KEYS */;
/*!40000 ALTER TABLE `applicant_convenience_people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_convenience_units`
--

DROP TABLE IF EXISTS `applicant_convenience_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_convenience_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_convenience_id` int(11) NOT NULL,
  `convenience_sub_category_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_convenience_units`
--

LOCK TABLES `applicant_convenience_units` WRITE;
/*!40000 ALTER TABLE `applicant_convenience_units` DISABLE KEYS */;
INSERT INTO `applicant_convenience_units` VALUES (1,1,2,NULL,'2017-12-22 08:41:20','2017-12-22 08:41:20');
/*!40000 ALTER TABLE `applicant_convenience_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_conveniences`
--

DROP TABLE IF EXISTS `applicant_conveniences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_conveniences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `convenience_id` int(11) NOT NULL,
  `starting_date` datetime NOT NULL,
  `ending_date` datetime NOT NULL,
  `days_total` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eco_park_type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eco_park_id` int(11) NOT NULL,
  `convenience_category_id` int(11) NOT NULL,
  `nationality` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_conveniences`
--

LOCK TABLES `applicant_conveniences` WRITE;
/*!40000 ALTER TABLE `applicant_conveniences` DISABLE KEYS */;
INSERT INTO `applicant_conveniences` VALUES (1,2,2,2,'2018-01-22 00:00:00','2018-01-24 00:00:00','2','2',160.00,4,'convenience','ter',27,1,'0',NULL,'2017-12-22 08:41:20','2017-12-22 08:41:20');
/*!40000 ALTER TABLE `applicant_conveniences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_other_activities`
--

DROP TABLE IF EXISTS `applicant_other_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_other_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation_id` int(11) NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `amount` decimal(20,2) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_other_activities`
--

LOCK TABLES `applicant_other_activities` WRITE;
/*!40000 ALTER TABLE `applicant_other_activities` DISABLE KEYS */;
INSERT INTO `applicant_other_activities` VALUES (1,2,2,'ter',27,'',1,0.00,NULL,'2017-12-20 22:10:08','2017-12-20 22:10:08'),(2,2,2,'ter',27,'',2,0.00,NULL,'2017-12-21 20:58:20','2017-12-21 20:58:20'),(3,2,2,'ter',27,'',3,0.00,NULL,'2017-12-21 23:40:55','2017-12-21 23:40:55');
/*!40000 ALTER TABLE `applicant_other_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_other_activity_declarations`
--

DROP TABLE IF EXISTS `applicant_other_activity_declarations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_other_activity_declarations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_date` datetime NOT NULL,
  `applicant_other_activity_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_other_activity_declarations`
--

LOCK TABLES `applicant_other_activity_declarations` WRITE;
/*!40000 ALTER TABLE `applicant_other_activity_declarations` DISABLE KEYS */;
INSERT INTO `applicant_other_activity_declarations` VALUES (1,'Mohd Arizan Ali','820621115411','2017-12-20 00:00:00',1,NULL,'2017-12-20 22:10:08','2017-12-20 22:10:08'),(2,'Aris Munandar','930603115071','2017-12-21 00:00:00',2,NULL,'2017-12-21 20:58:20','2017-12-21 20:58:20'),(3,'Mohd Arizan Ali','820621115411','2017-12-21 00:00:00',3,NULL,'2017-12-21 23:40:55','2017-12-21 23:40:55');
/*!40000 ALTER TABLE `applicant_other_activity_declarations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicant_other_activity_details`
--

DROP TABLE IF EXISTS `applicant_other_activity_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicant_other_activity_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_other_activity_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `starting_date` datetime NOT NULL,
  `ending_date` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `program_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participant` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicant_other_activity_details`
--

LOCK TABLES `applicant_other_activity_details` WRITE;
/*!40000 ALTER TABLE `applicant_other_activity_details` DISABLE KEYS */;
INSERT INTO `applicant_other_activity_details` VALUES (1,1,'dfdf','werwer','2312312','test@gmail.cpm','23123123','wrwr','24244','werwer',8,130,'2018-01-20 00:00:00','2018-01-22 00:00:00','fsfsf','1513779008.pdf','1513779008.pdf','100','2',NULL,'2017-12-20 22:10:08','2017-12-20 22:10:08'),(2,2,'Test','aasd','123','arismunandardev@gmail.com','123','asd','123','asd',2,130,'2018-01-21 00:00:00','2018-01-25 00:00:00','asd','1513861100.pdf','1513861100.pdf','5','4',NULL,'2017-12-21 20:58:20','2017-12-21 20:58:20'),(3,3,'ghfghf','gdfgd','46436346','test@gmail.com','463463','36346346','67666','fhfh',2,130,'2018-01-22 00:00:00','2018-01-23 00:00:00','tetertert','1513870855.pdf','1513870855.pdf','400','1',NULL,'2017-12-21 23:40:55','2017-12-21 23:42:13');
/*!40000 ALTER TABLE `applicant_other_activity_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `applicants`
--

DROP TABLE IF EXISTS `applicants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `applicants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `receipt_number` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `applicants`
--

LOCK TABLES `applicants` WRITE;
/*!40000 ALTER TABLE `applicants` DISABLE KEYS */;
INSERT INTO `applicants` VALUES (1,'LA20122017-01',10,'processed','other',0.00,NULL,'2017-12-21 23:38:42','2017-12-20 22:10:08','2017-12-21 23:38:42'),(2,'LA21122017-01',9,'processed','other',0.00,NULL,'2017-12-21 23:38:39','2017-12-21 20:58:20','2017-12-21 23:38:39'),(3,'LA21122017-01',10,'processed','other',0.00,NULL,NULL,'2017-12-21 23:40:55','2017-12-21 23:40:55'),(4,'TK22122017-01',10,'processed','convenience',160.00,NULL,NULL,'2017-12-22 08:41:20','2017-12-22 08:41:20'),(5,'AP22122017-01',10,'processed','hiking',200.00,NULL,NULL,'2017-12-22 08:45:21','2017-12-22 09:24:20');
/*!40000 ALTER TABLE `applicants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (2,'Terengganu Utara',2,NULL,'2017-11-06 10:08:47','2017-11-06 10:08:47'),(3,'Terengganu Selatan',2,NULL,'2017-11-06 10:09:00','2017-11-06 10:09:00'),(4,'Terengganu Barat',2,NULL,'2017-11-06 10:09:13','2017-11-06 10:09:13'),(5,'Kuala Kangsar',3,NULL,'2017-11-06 10:09:29','2017-11-06 10:09:29'),(6,'Perak Selatan',3,NULL,'2017-11-06 10:09:54','2017-11-06 10:09:54'),(7,'Larut / Matang',3,NULL,'2017-11-06 10:10:32','2017-11-14 12:17:35'),(8,'Hulu Perak',3,NULL,'2017-11-06 10:10:44','2017-11-06 10:10:44'),(11,'Johor Selatan',5,NULL,'2017-11-06 17:28:01','2017-11-06 17:28:01'),(12,'Johor Tengah',5,NULL,'2017-11-06 17:28:11','2017-11-06 17:28:11'),(13,'Johor Timur',5,NULL,'2017-11-06 17:28:22','2017-11-06 17:28:22'),(14,'Johor Utara',5,NULL,'2017-11-06 17:28:33','2017-11-06 17:28:33'),(15,'Kedah Selatan',7,NULL,'2017-11-06 17:28:49','2017-11-06 17:28:49'),(16,'Kedah Tengah',7,NULL,'2017-11-06 17:29:01','2017-11-06 17:29:01'),(17,'Kedah Utara',7,NULL,'2017-11-06 17:29:12','2017-11-06 17:29:12'),(18,'Jajahan Kelantan Barat',6,NULL,'2017-11-06 17:29:32','2017-11-06 17:29:32'),(19,'Jajahan Kelantan Selatan',6,NULL,'2017-11-06 17:29:42','2017-11-06 17:29:42'),(20,'Jajahan Kelantan Timur',6,NULL,'2017-11-06 17:29:51','2017-11-06 17:29:51'),(21,'Melaka',9,NULL,'2017-11-06 17:30:00','2017-11-06 17:30:00'),(22,'Negeri Sembilan Barat',8,NULL,'2017-11-06 17:30:15','2017-11-06 17:30:15'),(23,'Negeri Sembilan Timur',8,NULL,'2017-11-06 17:30:24','2017-11-06 17:30:24'),(24,'Negeri Sembilan Utara',8,NULL,'2017-11-06 17:30:34','2017-11-06 17:30:34'),(25,'Pulau Pinang',10,NULL,'2017-11-06 17:31:03','2017-11-06 17:31:03'),(26,'Perlis',11,NULL,'2017-11-06 17:31:12','2017-11-06 17:31:12'),(27,'Hulu Selangor',14,NULL,'2017-11-06 17:31:28','2017-11-06 17:31:28'),(28,'Pantai Klang',14,NULL,'2017-11-06 17:31:42','2017-11-06 17:31:42'),(29,'Selangor Tengah',14,NULL,'2017-11-06 17:31:56','2017-11-06 17:31:56'),(30,'Wilayah Persekutuan',12,NULL,'2017-11-13 19:06:17','2017-11-13 19:06:17'),(31,'Ulu Perak',3,NULL,'2017-11-14 12:13:40','2017-11-14 12:13:40'),(32,'Kinta / Manjung',3,NULL,'2017-11-14 12:17:17','2017-11-14 12:17:17');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacity_categories`
--

DROP TABLE IF EXISTS `capacity_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacity_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacity_categories`
--

LOCK TABLES `capacity_categories` WRITE;
/*!40000 ALTER TABLE `capacity_categories` DISABLE KEYS */;
INSERT INTO `capacity_categories` VALUES (1,'10','2017-11-06 14:19:16','2017-11-06 12:36:37','2017-11-06 14:19:16'),(2,'Orang',NULL,'2017-11-06 13:59:43','2017-11-06 13:59:43'),(3,'Unit',NULL,'2017-11-06 13:59:48','2017-11-06 13:59:48');
/*!40000 ALTER TABLE `capacity_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenience_categories`
--

DROP TABLE IF EXISTS `convenience_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenience_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenience_categories`
--

LOCK TABLES `convenience_categories` WRITE;
/*!40000 ALTER TABLE `convenience_categories` DISABLE KEYS */;
INSERT INTO `convenience_categories` VALUES (1,'Chalet',NULL,'2017-11-13 16:41:47','2017-11-13 16:41:47'),(2,'Asrama',NULL,'2017-11-13 16:41:55','2017-11-13 16:41:55'),(3,'Tapak Perkhemahan',NULL,'2017-11-13 16:42:04','2017-11-13 16:42:04'),(4,'Dewan',NULL,'2017-11-13 16:42:14','2017-11-13 16:42:14'),(5,'Log Cabin',NULL,'2017-11-13 16:42:23','2017-11-13 16:42:23'),(6,'Padang Bola',NULL,'2017-11-23 14:54:09','2017-11-23 14:54:09'),(7,'Padang',NULL,'2017-11-23 14:54:59','2017-11-23 14:54:59'),(8,'Tempat Letak Kereta',NULL,'2017-11-23 14:55:30','2017-11-23 14:55:30'),(9,'Pengambaran Komersial',NULL,'2017-11-23 14:56:16','2017-11-23 14:56:16'),(10,'Gelanggang Permainan',NULL,'2017-11-23 14:56:33','2017-11-23 14:56:33');
/*!40000 ALTER TABLE `convenience_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenience_prices`
--

DROP TABLE IF EXISTS `convenience_prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenience_prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `convenience_id` int(11) NOT NULL,
  `price_category_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenience_prices`
--

LOCK TABLES `convenience_prices` WRITE;
/*!40000 ALTER TABLE `convenience_prices` DISABLE KEYS */;
INSERT INTO `convenience_prices` VALUES (1,1,1,10.00,NULL,'2017-11-06 14:02:26','2017-11-06 14:02:26'),(2,1,2,0.00,NULL,'2017-11-06 14:02:26','2017-11-06 14:02:26'),(9,2,1,0.00,NULL,'2017-11-06 14:14:46','2017-11-06 14:14:46'),(10,2,2,0.00,NULL,'2017-11-06 14:14:46','2017-11-06 14:14:46'),(11,2,3,100.00,NULL,'2017-11-06 14:14:46','2017-11-06 14:14:46'),(17,3,1,0.00,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(18,3,2,0.00,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(19,3,3,0.00,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(20,3,5,30.00,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(21,3,6,0.00,NULL,'2017-11-06 14:22:38','2017-11-06 14:22:38'),(22,4,1,0.00,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(23,4,2,0.00,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(24,4,3,150.00,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(25,4,5,0.00,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(26,4,6,0.00,NULL,'2017-11-06 15:32:51','2017-11-06 15:32:51'),(27,5,1,0.00,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(28,5,2,0.00,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(29,5,3,0.00,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(30,5,5,10.00,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(31,5,6,0.00,NULL,'2017-11-06 15:39:25','2017-11-06 15:39:25'),(32,6,1,0.00,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(33,6,2,0.00,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(34,6,3,0.00,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(35,6,5,0.00,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(36,6,6,30.00,NULL,'2017-11-06 15:42:46','2017-11-06 15:42:46'),(37,7,1,0.00,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19'),(38,7,2,0.00,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19'),(39,7,3,10.00,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19'),(40,7,5,0.00,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19'),(41,7,6,0.00,NULL,'2017-11-06 15:44:19','2017-11-06 15:44:19');
/*!40000 ALTER TABLE `convenience_prices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `convenience_sub_categories`
--

DROP TABLE IF EXISTS `convenience_sub_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `convenience_sub_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `convenience_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `convenience_sub_categories`
--

LOCK TABLES `convenience_sub_categories` WRITE;
/*!40000 ALTER TABLE `convenience_sub_categories` DISABLE KEYS */;
INSERT INTO `convenience_sub_categories` VALUES (1,'Chalet A',1,NULL,'2017-11-14 00:10:25','2017-11-14 00:10:25'),(2,'Biasa (Berhawa Dingin)',2,NULL,'2017-11-14 08:25:43','2017-11-14 08:26:45'),(3,'Biasa',3,NULL,'2017-11-14 08:26:33','2017-11-14 08:26:33'),(4,'Ekslusif',4,NULL,'2017-11-14 08:27:43','2017-11-14 08:27:43'),(5,'A-Frame (Tiada Bilik)',5,NULL,'2017-11-23 11:26:10','2017-11-23 11:26:10'),(6,'Executive Chalet',6,NULL,'2017-11-23 11:27:10','2017-11-23 11:27:10');
/*!40000 ALTER TABLE `convenience_sub_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conveniences`
--

DROP TABLE IF EXISTS `conveniences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conveniences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `convenience_category_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `type` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eco_park_id` int(11) NOT NULL,
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conveniences`
--

LOCK TABLES `conveniences` WRITE;
/*!40000 ALTER TABLE `conveniences` DISABLE KEYS */;
INSERT INTO `conveniences` VALUES (1,1,2,2,'ter',27,'10',10.00,NULL,'2017-11-14 00:10:25','2017-11-14 00:10:25'),(2,1,2,2,'ter',27,'10',80.00,NULL,'2017-11-14 08:25:43','2017-11-14 08:25:43'),(3,1,2,2,'ter',27,'10',60.00,NULL,'2017-11-14 08:26:33','2017-11-14 08:26:33'),(4,1,2,2,'ter',27,'2',150.00,NULL,'2017-11-14 08:27:43','2017-11-14 08:27:43'),(5,1,3,6,'ter',10,'2',50.00,NULL,'2017-11-23 11:26:10','2017-11-23 11:26:10'),(6,1,3,6,'ter',10,'2',150.00,NULL,'2017-11-23 11:27:10','2017-11-23 11:27:10');
/*!40000 ALTER TABLE `conveniences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AFGHANISTAN','AF',NULL,NULL,NULL),(2,'ALBANIA','AL',NULL,NULL,NULL),(3,'ALGERIA','DZ',NULL,NULL,NULL),(4,'AMERICAN SAMOA','AS',NULL,NULL,NULL),(5,'ANDORRA','AD',NULL,NULL,NULL),(6,'ANGOLA','AO',NULL,NULL,NULL),(7,'ANGUILLA','AI',NULL,NULL,NULL),(8,'ANTARCTICA','AQ',NULL,NULL,NULL),(9,'ANTIGUA AND BARBUDA','AG',NULL,NULL,NULL),(10,'ARGENTINA','AR',NULL,NULL,NULL),(11,'ARMENIA','AM',NULL,NULL,NULL),(12,'ARUBA','AW',NULL,NULL,NULL),(13,'AUSTRALIA','AU',NULL,NULL,NULL),(14,'AUSTRIA','AT',NULL,NULL,NULL),(15,'AZERBAIJAN','AZ',NULL,NULL,NULL),(16,'BAHAMAS','BS',NULL,NULL,NULL),(17,'BAHRAIN','BH',NULL,NULL,NULL),(18,'BANGLADESH','BD',NULL,NULL,NULL),(19,'BARBADOS','BB',NULL,NULL,NULL),(20,'BELARUS','BY',NULL,NULL,NULL),(21,'BELGIUM','BE',NULL,NULL,NULL),(22,'BELIZE','BZ',NULL,NULL,NULL),(23,'BENIN','BJ',NULL,NULL,NULL),(24,'BERMUDA','BM',NULL,NULL,NULL),(25,'BHUTAN','BT',NULL,NULL,NULL),(26,'BOLIVIA','BO',NULL,NULL,NULL),(27,'BOSNIA AND HERZEGOVINA','BA',NULL,NULL,NULL),(28,'BOTSWANA','BW',NULL,NULL,NULL),(29,'BOUVET ISLAND','BV',NULL,NULL,NULL),(30,'BRAZIL','BR',NULL,NULL,NULL),(31,'BRITISH INDIAN OCEAN TERRITORY','IO',NULL,NULL,NULL),(32,'BRUNEI DARUSSALAM','BN',NULL,NULL,NULL),(33,'BULGARIA','BG',NULL,NULL,NULL),(34,'BURKINA FASO','BF',NULL,NULL,NULL),(35,'BURUNDI','BI',NULL,NULL,NULL),(36,'CAMBODIA','KH',NULL,NULL,NULL),(37,'CAMEROON','CM',NULL,NULL,NULL),(38,'CANADA','CA',NULL,NULL,NULL),(39,'CAPE VERDE','CV',NULL,NULL,NULL),(40,'CAYMAN ISLANDS','KY',NULL,NULL,NULL),(41,'CENTRAL AFRICAN REPUBLIC','CF',NULL,NULL,NULL),(42,'CHAD','TD',NULL,NULL,NULL),(43,'CHILE','CL',NULL,NULL,NULL),(44,'CHINA','CN',NULL,NULL,NULL),(45,'CHRISTMAS ISLAND','CX',NULL,NULL,NULL),(46,'COCOS (KEELING) ISLANDS','CC',NULL,NULL,NULL),(47,'COLOMBIA','CO',NULL,NULL,NULL),(48,'COMOROS','KM',NULL,NULL,NULL),(49,'CONGO','CG',NULL,NULL,NULL),(50,'CONGO, THE DEMOCRATIC REPUBLIC OF THE','CD',NULL,NULL,NULL),(51,'COOK ISLANDS','CK',NULL,NULL,NULL),(52,'COSTA RICA','CR',NULL,NULL,NULL),(53,'COTE D IVOIRE','CI',NULL,NULL,NULL),(54,'CROATIA','HR',NULL,NULL,NULL),(55,'CUBA','CU',NULL,NULL,NULL),(56,'CYPRUS','CY',NULL,NULL,NULL),(57,'CZECH REPUBLIC','CZ',NULL,NULL,NULL),(58,'DENMARK','DK',NULL,NULL,NULL),(59,'DJIBOUTI','DJ',NULL,NULL,NULL),(60,'DOMINICA','DM',NULL,NULL,NULL),(61,'DOMINICAN REPUBLIC','DO',NULL,NULL,NULL),(62,'EAST TIMOR','TP',NULL,NULL,NULL),(63,'ECUADOR','EC',NULL,NULL,NULL),(64,'EGYPT','EG',NULL,NULL,NULL),(65,'EL SALVADOR','SV',NULL,NULL,NULL),(66,'EQUATORIAL GUINEA','GQ',NULL,NULL,NULL),(67,'ERITREA','ER',NULL,NULL,NULL),(68,'ESTONIA','EE',NULL,NULL,NULL),(69,'ETHIOPIA','ET',NULL,NULL,NULL),(70,'FALKLAND ISLANDS (MALVINAS)','FK',NULL,NULL,NULL),(71,'FAROE ISLANDS','FO',NULL,NULL,NULL),(72,'FIJI','FJ',NULL,NULL,NULL),(73,'FINLAND','FI',NULL,NULL,NULL),(74,'FRANCE','FR',NULL,NULL,NULL),(75,'FRENCH GUIANA','GF',NULL,NULL,NULL),(76,'FRENCH POLYNESIA','PF',NULL,NULL,NULL),(77,'FRENCH SOUTHERN TERRITORIES','TF',NULL,NULL,NULL),(78,'GABON','GA',NULL,NULL,NULL),(79,'GAMBIA','GM',NULL,NULL,NULL),(80,'GEORGIA','GE',NULL,NULL,NULL),(81,'GERMANY','DE',NULL,NULL,NULL),(82,'GHANA','GH',NULL,NULL,NULL),(83,'GIBRALTAR','GI',NULL,NULL,NULL),(84,'GREECE','GR',NULL,NULL,NULL),(85,'GREENLAND','GL',NULL,NULL,NULL),(86,'GRENADA','GD',NULL,NULL,NULL),(87,'GUADELOUPE','GP',NULL,NULL,NULL),(88,'GUAM','GU',NULL,NULL,NULL),(89,'GUATEMALA','GT',NULL,NULL,NULL),(90,'GUINEA','GN',NULL,NULL,NULL),(91,'GUINEA-BISSAU','GW',NULL,NULL,NULL),(92,'GUYANA','GY',NULL,NULL,NULL),(93,'HAITI','HT',NULL,NULL,NULL),(94,'HEARD ISLAND AND MCDONALD ISLANDS','HM',NULL,NULL,NULL),(95,'HOLY SEE (VATICAN CITY STATE)','VA',NULL,NULL,NULL),(96,'HONDURAS','HN',NULL,NULL,NULL),(97,'HONG KONG','HK',NULL,NULL,NULL),(98,'HUNGARY','HU',NULL,NULL,NULL),(99,'ICELAND','IS',NULL,NULL,NULL),(100,'INDIA','IN',NULL,NULL,NULL),(101,'INDONESIA','ID',NULL,NULL,NULL),(102,'IRAN, ISLAMIC REPUBLIC OF','IR',NULL,NULL,NULL),(103,'IRAQ','IQ',NULL,NULL,NULL),(104,'IRELAND','IE',NULL,NULL,NULL),(105,'ISRAEL','IL',NULL,NULL,NULL),(106,'ITALY','IT',NULL,NULL,NULL),(107,'JAMAICA','JM',NULL,NULL,NULL),(108,'JAPAN','JP',NULL,NULL,NULL),(109,'JORDAN','JO',NULL,NULL,NULL),(110,'KAZAKSTAN','KZ',NULL,NULL,NULL),(111,'KENYA','KE',NULL,NULL,NULL),(112,'KIRIBATI','KI',NULL,NULL,NULL),(113,'KOREA DEMOCRATIC PEOPLES REPUBLIC OF','KP',NULL,NULL,NULL),(114,'KOREA REPUBLIC OF','KR',NULL,NULL,NULL),(115,'KUWAIT','KW',NULL,NULL,NULL),(116,'KYRGYZSTAN','KG',NULL,NULL,NULL),(117,'LAO PEOPLES DEMOCRATIC REPUBLIC','LA',NULL,NULL,NULL),(118,'LATVIA','LV',NULL,NULL,NULL),(119,'LEBANON','LB',NULL,NULL,NULL),(120,'LESOTHO','LS',NULL,NULL,NULL),(121,'LIBERIA','LR',NULL,NULL,NULL),(122,'LIBYAN ARAB JAMAHIRIYA','LY',NULL,NULL,NULL),(123,'LIECHTENSTEIN','LI',NULL,NULL,NULL),(124,'LITHUANIA','LT',NULL,NULL,NULL),(125,'LUXEMBOURG','LU',NULL,NULL,NULL),(126,'MACAU','MO',NULL,NULL,NULL),(127,'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF','MK',NULL,NULL,NULL),(128,'MADAGASCAR','MG',NULL,NULL,NULL),(129,'MALAWI','MW',NULL,NULL,NULL),(130,'MALAYSIA','MY',NULL,NULL,NULL),(131,'MALDIVES','MV',NULL,NULL,NULL),(132,'MALI','ML',NULL,NULL,NULL),(133,'MALTA','MT',NULL,NULL,NULL),(134,'MARSHALL ISLANDS','MH',NULL,NULL,NULL),(135,'MARTINIQUE','MQ',NULL,NULL,NULL),(136,'MAURITANIA','MR',NULL,NULL,NULL),(137,'MAURITIUS','MU',NULL,NULL,NULL),(138,'MAYOTTE','YT',NULL,NULL,NULL),(139,'MEXICO','MX',NULL,NULL,NULL),(140,'MICRONESIA, FEDERATED STATES OF','FM',NULL,NULL,NULL),(141,'MOLDOVA, REPUBLIC OF','MD',NULL,NULL,NULL),(142,'MONACO','MC',NULL,NULL,NULL),(143,'MONGOLIA','MN',NULL,NULL,NULL),(144,'MONTSERRAT','MS',NULL,NULL,NULL),(145,'MOROCCO','MA',NULL,NULL,NULL),(146,'MOZAMBIQUE','MZ',NULL,NULL,NULL),(147,'MYANMAR','MM',NULL,NULL,NULL),(148,'NAMIBIA','NA',NULL,NULL,NULL),(149,'NAURU','NR',NULL,NULL,NULL),(150,'NEPAL','NP',NULL,NULL,NULL),(151,'NETHERLANDS','NL',NULL,NULL,NULL),(152,'NETHERLANDS ANTILLES','AN',NULL,NULL,NULL),(153,'NEW CALEDONIA','NC',NULL,NULL,NULL),(154,'NEW ZEALAND','NZ',NULL,NULL,NULL),(155,'NICARAGUA','NI',NULL,NULL,NULL),(156,'NIGER','NE',NULL,NULL,NULL),(157,'NIGERIA','NG',NULL,NULL,NULL),(158,'NIUE','NU',NULL,NULL,NULL),(159,'NORFOLK ISLAND','NF',NULL,NULL,NULL),(160,'NORTHERN MARIANA ISLANDS','MP',NULL,NULL,NULL),(161,'NORWAY','NO',NULL,NULL,NULL),(162,'OMAN','OM',NULL,NULL,NULL),(163,'PAKISTAN','PK',NULL,NULL,NULL),(164,'PALAU','PW',NULL,NULL,NULL),(165,'PALESTINIAN TERRITORY, OCCUPIED','PS',NULL,NULL,NULL),(166,'PANAMA','PA',NULL,NULL,NULL),(167,'PAPUA NEW GUINEA','PG',NULL,NULL,NULL),(168,'PARAGUAY','PY',NULL,NULL,NULL),(169,'PERU','PE',NULL,NULL,NULL),(170,'PHILIPPINES','PH',NULL,NULL,NULL),(171,'PITCAIRN','PN',NULL,NULL,NULL),(172,'POLAND','PL',NULL,NULL,NULL),(173,'PORTUGAL','PT',NULL,NULL,NULL),(174,'PUERTO RICO','PR',NULL,NULL,NULL),(175,'QATAR','QA',NULL,NULL,NULL),(176,'REUNION','RE',NULL,NULL,NULL),(177,'ROMANIA','RO',NULL,NULL,NULL),(178,'RUSSIAN FEDERATION','RU',NULL,NULL,NULL),(179,'RWANDA','RW',NULL,NULL,NULL),(180,'SAINT HELENA','SH',NULL,NULL,NULL),(181,'SAINT KITTS AND NEVIS','KN',NULL,NULL,NULL),(182,'SAINT LUCIA','LC',NULL,NULL,NULL),(183,'SAINT PIERRE AND MIQUELON','PM',NULL,NULL,NULL),(184,'SAINT VINCENT AND THE GRENADINES','VC',NULL,NULL,NULL),(185,'SAMOA','WS',NULL,NULL,NULL),(186,'SAN MARINO','SM',NULL,NULL,NULL),(187,'SAO TOME AND PRINCIPE','ST',NULL,NULL,NULL),(188,'SAUDI ARABIA','SA',NULL,NULL,NULL),(189,'SENEGAL','SN',NULL,NULL,NULL),(190,'SEYCHELLES','SC',NULL,NULL,NULL),(191,'SIERRA LEONE','SL',NULL,NULL,NULL),(192,'SINGAPORE','SG',NULL,NULL,NULL),(193,'SLOVAKIA','SK',NULL,NULL,NULL),(194,'SLOVENIA','SI',NULL,NULL,NULL),(195,'SOLOMON ISLANDS','SB',NULL,NULL,NULL),(196,'SOMALIA','SO',NULL,NULL,NULL),(197,'SOUTH AFRICA','ZA',NULL,NULL,NULL),(198,'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS','GS',NULL,NULL,NULL),(199,'SPAIN','ES',NULL,NULL,NULL),(200,'SRI LANKA','LK',NULL,NULL,NULL),(201,'SUDAN','SD',NULL,NULL,NULL),(202,'SURINAME','SR',NULL,NULL,NULL),(203,'SVALBARD AND JAN MAYEN','SJ',NULL,NULL,NULL),(204,'SWAZILAND','SZ',NULL,NULL,NULL),(205,'SWEDEN','SE',NULL,NULL,NULL),(206,'SWITZERLAND','CH',NULL,NULL,NULL),(207,'SYRIAN ARAB REPUBLIC','SY',NULL,NULL,NULL),(208,'TAIWAN, PROVINCE OF CHINA','TW',NULL,NULL,NULL),(209,'TAJIKISTAN','TJ',NULL,NULL,NULL),(210,'TANZANIA, UNITED REPUBLIC OF','TZ',NULL,NULL,NULL),(211,'THAILAND','TH',NULL,NULL,NULL),(212,'TOGO','TG',NULL,NULL,NULL),(213,'TOKELAU','TK',NULL,NULL,NULL),(214,'TONGA','TO',NULL,NULL,NULL),(215,'TRINIDAD AND TOBAGO','TT',NULL,NULL,NULL),(216,'TUNISIA','TN',NULL,NULL,NULL),(217,'TURKEY','TR',NULL,NULL,NULL),(218,'TURKMENISTAN','TM',NULL,NULL,NULL),(219,'TURKS AND CAICOS ISLANDS','TC',NULL,NULL,NULL),(220,'TUVALU','TV',NULL,NULL,NULL),(221,'UGANDA','UG',NULL,NULL,NULL),(222,'UKRAINE','UA',NULL,NULL,NULL),(223,'UNITED ARAB EMIRATES','AE',NULL,NULL,NULL),(224,'UNITED KINGDOM','GB',NULL,NULL,NULL),(225,'UNITED STATES','US',NULL,NULL,NULL),(226,'UNITED STATES MINOR OUTLYING ISLANDS','UM',NULL,NULL,NULL),(227,'URUGUAY','UY',NULL,NULL,NULL),(228,'UZBEKISTAN','UZ',NULL,NULL,NULL),(229,'VANUATU','VU',NULL,NULL,NULL),(230,'VENEZUELA','VE',NULL,NULL,NULL),(231,'VIET NAM','VN',NULL,NULL,NULL),(232,'VIRGIN ISLANDS, BRITISH','VG',NULL,NULL,NULL),(233,'VIRGIN ISLANDS, U.S.','VI',NULL,NULL,NULL),(234,'WALLIS AND FUTUNA','WF',NULL,NULL,NULL),(235,'WESTERN SAHARA','EH',NULL,NULL,NULL),(236,'YEMEN','YE',NULL,NULL,NULL),(237,'YUGOSLAVIA','YU',NULL,NULL,NULL),(238,'ZAMBIA','ZM',NULL,NULL,NULL),(239,'ZIMBABWE','ZW',NULL,NULL,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eco_parks`
--

DROP TABLE IF EXISTS `eco_parks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eco_parks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `area_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `capacity` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_forest_id` int(11) DEFAULT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eco_parks`
--

LOCK TABLES `eco_parks` WRITE;
/*!40000 ALTER TABLE `eco_parks` DISABLE KEYS */;
INSERT INTO `eco_parks` VALUES (1,'Taman Eko Rimba Paya Laut Matang',0.00,0,3,'0',NULL,NULL,'1','2017-11-06 13:35:58','2017-11-06 09:27:58','2017-11-06 13:35:58'),(2,'Taman Eko Rimba Kuala Woh',0.00,1,3,'0',NULL,NULL,'1','2017-11-06 11:47:18','2017-11-06 09:28:15','2017-11-06 11:47:18'),(3,'Taman Eko Rimba Tali Kail',0.00,0,3,'0',NULL,NULL,'1','2017-11-06 13:36:02','2017-11-06 09:28:32','2017-11-06 13:36:02'),(4,'Taman Eko Rimba Ulu Kenas',0.00,6,3,'0','ter',11,'1',NULL,'2017-11-06 09:28:46','2017-11-07 18:54:14'),(5,'Sekayu',10.00,4,2,'0',NULL,NULL,'1','2017-11-06 13:36:20','2017-11-06 11:27:50','2017-11-06 13:36:20'),(6,'Taman Eko-Rimba Kledang Saiong',0.00,6,3,'0',NULL,NULL,'1','2017-11-06 13:38:00','2017-11-06 11:28:16','2017-11-06 13:38:00'),(7,'Lata Kekabu',0.00,31,3,'0','ter',26,'1',NULL,'2017-11-06 13:37:00','2017-11-14 12:26:38'),(8,'Pulau Tali Kail',0.00,0,3,'0',NULL,NULL,'1','2017-11-06 13:38:13','2017-11-06 13:37:26','2017-11-06 13:38:13'),(9,'Pulau Tali Kail',0.00,31,3,'0','ter',25,'1',NULL,'2017-11-06 13:37:26','2017-11-14 12:25:33'),(10,'Kuala Woh',0.00,6,3,'0','ter',36,'1',NULL,'2017-11-06 13:37:54','2017-11-14 12:24:39'),(11,'Ulu Paip',0.00,15,7,'0','ter',37,'1',NULL,'2017-11-06 13:39:11','2017-11-14 13:44:29'),(12,'Bukit Hijau',0.00,15,7,'0','ter',38,'1',NULL,'2017-11-06 13:39:26','2017-11-14 13:45:07'),(13,'Sungai Sedim',0.00,15,7,'0','ter',38,'1',NULL,'2017-11-06 13:39:37','2017-11-14 13:45:38'),(14,'Jeram Linang',0.00,0,6,'0',NULL,NULL,'1',NULL,'2017-11-06 13:39:55','2017-11-06 13:39:55'),(15,'Bukit Bakar',0.00,0,6,'0',NULL,NULL,'1',NULL,'2017-11-06 13:40:08','2017-11-06 13:40:08'),(16,'Gunung Stong',0.00,0,6,'0',NULL,NULL,'1',NULL,'2017-11-06 13:40:28','2017-11-06 13:40:28'),(17,'Ulu Bendul',0.00,0,8,'0',NULL,NULL,'1',NULL,'2017-11-06 13:40:46','2017-11-06 13:40:46'),(18,'Batu Maloi',0.00,0,8,'0',NULL,NULL,'1',NULL,'2017-11-06 13:41:00','2017-11-06 13:41:00'),(19,'Tengkek',0.00,0,8,'0',NULL,NULL,'1',NULL,'2017-11-06 13:41:10','2017-11-06 13:41:10'),(20,'De Bana',0.00,0,8,'0',NULL,NULL,'1',NULL,'2017-11-06 13:41:21','2017-11-06 13:41:21'),(21,'Air Menderu',0.00,0,2,'0',NULL,NULL,'1',NULL,'2017-11-06 13:42:57','2017-11-06 13:42:57'),(22,'Bandar Bukit Bauk',0.00,0,2,'0',NULL,NULL,'1',NULL,'2017-11-06 13:43:14','2017-11-06 13:43:14'),(23,'Chemerong',0.00,0,2,'0',NULL,NULL,'1',NULL,'2017-11-06 13:43:25','2017-11-06 13:43:25'),(24,'Jambu Bongkok',0.00,0,2,'0',NULL,NULL,'1',NULL,'2017-11-06 13:43:36','2017-11-06 13:43:36'),(25,'Sekayu',0.00,4,2,'10','ter',8,'1',NULL,'2017-11-06 13:43:45','2017-12-18 20:24:34'),(26,'Lata Payung',0.00,0,2,'0',NULL,NULL,'1',NULL,'2017-11-06 13:43:56','2017-11-06 13:43:56'),(27,'Lata Tembakah',0.00,2,2,'0','ter',1,'1',NULL,'2017-11-06 13:44:09','2017-11-13 16:06:45'),(28,'Lata Belatan',0.00,2,2,'0','ter',13,'1',NULL,'2017-11-06 13:44:20','2017-11-13 16:08:28'),(29,'Gunung Arong',0.00,13,5,'0','ter',19,'1',NULL,'2017-11-14 12:10:03','2017-11-14 12:10:03'),(30,'Gunung Belum',0.00,12,5,'0','ter',20,'1',NULL,'2017-11-14 12:10:27','2017-11-14 12:10:27'),(31,'Panti',0.00,11,5,'0','ter',21,'1',NULL,'2017-11-14 12:11:00','2017-11-14 12:11:00'),(32,'Gunung Pulai 2',0.00,12,5,'0','ter',22,'0',NULL,'2017-11-14 12:11:24','2017-11-14 12:11:24'),(33,'Gunung Pulai 1',0.00,12,5,'0','ter',22,'1',NULL,'2017-11-14 12:11:46','2017-11-14 12:11:46'),(34,'Pusat Eko-Pelajaran',0.00,7,3,'0','ter',28,'1',NULL,'2017-11-14 13:36:27','2017-11-14 13:36:27'),(35,'Ulu Kenas',0.00,5,3,'0','ter',29,'1',NULL,'2017-11-14 13:38:24','2017-11-14 13:38:24'),(36,'test',0.00,2,2,'10','ter',1,'1','2017-12-18 10:49:12','2017-12-18 10:48:32','2017-12-18 10:49:12'),(37,'Test q123123123',0.00,2,2,'50','ter',1,'1','2017-12-18 10:49:06','2017-12-18 10:48:57','2017-12-18 10:49:06');
/*!40000 ALTER TABLE `eco_parks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_biodatas`
--

DROP TABLE IF EXISTS `hiking_biodatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_biodatas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` datetime NOT NULL,
  `age` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hiking_participant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_biodatas`
--

LOCK TABLES `hiking_biodatas` WRITE;
/*!40000 ALTER TABLE `hiking_biodatas` DISABLE KEYS */;
INSERT INTO `hiking_biodatas` VALUES (1,'Zulkifli Othman','740202115411','1974-02-02 00:00:00','43','M','1','013121212121','Bangi, Selangor','Selangor','50400',5,10,0,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_biodatas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_campgrounds`
--

DROP TABLE IF EXISTS `hiking_campgrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_campgrounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `mountain_campground_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_campgrounds`
--

LOCK TABLES `hiking_campgrounds` WRITE;
/*!40000 ALTER TABLE `hiking_campgrounds` DISABLE KEYS */;
INSERT INTO `hiking_campgrounds` VALUES (1,5,236,'0','1',NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_campgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_declarations`
--

DROP TABLE IF EXISTS `hiking_declarations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_declarations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ic_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hiking_participant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_declarations`
--

LOCK TABLES `hiking_declarations` WRITE;
/*!40000 ALTER TABLE `hiking_declarations` DISABLE KEYS */;
INSERT INTO `hiking_declarations` VALUES (1,'Zulkifli Othman','740202115411','2017-12-22 00:00:00',5,10,0,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_declarations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_emergencies`
--

DROP TABLE IF EXISTS `hiking_emergencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_emergencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hiking_participant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_emergencies`
--

LOCK TABLES `hiking_emergencies` WRITE;
/*!40000 ALTER TABLE `hiking_emergencies` DISABLE KEYS */;
INSERT INTO `hiking_emergencies` VALUES (1,'Intan Abu','012344444444','Bangi Selangor','','Selangor','50400',5,10,0,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_emergencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_health_details`
--

DROP TABLE IF EXISTS `hiking_health_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_health_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiking_health_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_health_details`
--

LOCK TABLES `hiking_health_details` WRITE;
/*!40000 ALTER TABLE `hiking_health_details` DISABLE KEYS */;
INSERT INTO `hiking_health_details` VALUES (1,'treatment','','N','-','1',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(2,'hospital','','N','-','2',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(3,'blacked','','N','-','3',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(4,'fits','','N','-','4',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(5,'migraine','','N','-','5',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(6,'diabetes','','N','-','6',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(7,'highblood','','N','-','7',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(8,'cardiovascular','','N','-','8',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(9,'fever','','N','-','9',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(10,'malaria','','N','-','10',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(11,'asthma','','N','-','11',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(12,'drycough','','N','-','12',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(13,'urine','','N','-','13',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(14,'surgical','','N','-','14',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(15,'limb','','N','-','15',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(16,'deformities','','N','-','16',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(17,'anaemia','','N','-','17',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(18,'smoking','','N','-','18',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(19,'other','','N','-','19',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21'),(20,'pregnant','','N','-','20',1,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_health_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_healths`
--

DROP TABLE IF EXISTS `hiking_healths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_healths` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hiking_participant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_healths`
--

LOCK TABLES `hiking_healths` WRITE;
/*!40000 ALTER TABLE `hiking_healths` DISABLE KEYS */;
INSERT INTO `hiking_healths` VALUES (1,5,10,0,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_healths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_informations`
--

DROP TABLE IF EXISTS `hiking_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permanent_forest_id` int(11) DEFAULT NULL,
  `mountain_id` int(11) NOT NULL,
  `starting_date` datetime NOT NULL,
  `starting_time` datetime NOT NULL,
  `ending_date` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `mountain_guide` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `participants_total` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(20,2) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_informations`
--

LOCK TABLES `hiking_informations` WRITE;
/*!40000 ALTER TABLE `hiking_informations` DISABLE KEYS */;
INSERT INTO `hiking_informations` VALUES (1,0,2,'2018-01-24 00:00:00','2017-12-22 08:45:21','2018-01-26 00:00:00','2017-12-22 08:45:21','Ismail Isa','20','2',200.00,5,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_insurances`
--

DROP TABLE IF EXISTS `hiking_insurances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_insurances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hiking_participant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_insurances`
--

LOCK TABLES `hiking_insurances` WRITE;
/*!40000 ALTER TABLE `hiking_insurances` DISABLE KEYS */;
INSERT INTO `hiking_insurances` VALUES (1,'Takaful Al Ikhlas','T0342344',5,10,0,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_insurances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_locations`
--

DROP TABLE IF EXISTS `hiking_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_locations`
--

LOCK TABLES `hiking_locations` WRITE;
/*!40000 ALTER TABLE `hiking_locations` DISABLE KEYS */;
INSERT INTO `hiking_locations` VALUES (1,2,2,5,NULL,'2017-12-22 08:45:21','2017-12-22 08:45:21');
/*!40000 ALTER TABLE `hiking_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hiking_participants`
--

DROP TABLE IF EXISTS `hiking_participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hiking_participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hiking_participants`
--

LOCK TABLES `hiking_participants` WRITE;
/*!40000 ALTER TABLE `hiking_participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `hiking_participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1620 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1580,'2014_10_12_000000_create_users_table',1),(1581,'2014_10_12_100000_create_password_resets_table',1),(1582,'2017_06_22_061405_laratrust_setup_tables',1),(1583,'2017_07_03_070624_create_user_profiles_table',1),(1584,'2017_07_10_130853_create_modes_table',1),(1585,'2017_07_10_132456_create_mode_roles_table',1),(1586,'2017_10_16_065237_create_states_table',1),(1587,'2017_10_16_073731_create_areas_table',1),(1588,'2017_10_16_080535_create_permanent_forests_table',1),(1589,'2017_10_16_081019_create_eco_parks_table',1),(1590,'2017_10_17_042522_create_conveniences_table',1),(1591,'2017_10_17_042547_create_others_activities_table',1),(1592,'2017_10_17_083503_create_state_forestries_table',1),(1593,'2017_10_17_125601_create_regional_forestries_table',1),(1594,'2017_10_17_131907_create_mountains_table',1),(1595,'2017_10_19_053906_create_applicants_table',1),(1596,'2017_10_19_060719_create_hiking_locations_table',1),(1597,'2017_10_19_060758_create_hiking_informations_table',1),(1598,'2017_10_19_061009_create_hiking_biodatas_table',1),(1599,'2017_10_19_061043_create_hiking_emergencies_table',1),(1600,'2017_10_19_061217_create_hiking_healths_table',1),(1601,'2017_10_19_061309_create_hiking_declarations_table',1),(1602,'2017_10_19_070649_create_hiking_health_details_table',1),(1603,'2017_10_19_073926_create_hiking_insurances_table',1),(1604,'2017_10_20_042207_create_applicant_conveniences_table',1),(1605,'2017_10_22_074142_create_applicant_other_activities_table',1),(1606,'2017_10_23_045719_create_settings_table',1),(1607,'2017_10_23_045808_create_sliders_table',1),(1608,'2017_10_23_181608_create_hiking_participants_table',1),(1609,'2017_10_24_152915_create_user_locations_table',1),(1610,'2017_10_29_060009_create_user_access_logs_table',1),(1611,'2017_10_29_065906_create_activity_logs_table',1),(1612,'2017_10_29_071114_create_activity_log_details_table',1),(1613,'2017_11_03_122651_create_price_categories_table',1),(1614,'2017_11_03_123918_create_convenience_categories_table',1),(1615,'2017_11_03_123929_create_convenience_sub_categories_table',1),(1616,'2017_11_03_143805_create_capacity_categories_table',1),(1617,'2017_11_03_145328_create_convenience_prices_table',1),(1618,'2017_11_05_152639_create_mountain_campgrounds_table',1),(1619,'2017_11_05_175237_create_hiking_campgrounds_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mode_role`
--

DROP TABLE IF EXISTS `mode_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mode_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mode_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mode_role_mode_id_foreign` (`mode_id`),
  KEY `mode_role_role_id_foreign` (`role_id`),
  CONSTRAINT `mode_role_mode_id_foreign` FOREIGN KEY (`mode_id`) REFERENCES `modes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mode_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mode_role`
--

LOCK TABLES `mode_role` WRITE;
/*!40000 ALTER TABLE `mode_role` DISABLE KEYS */;
INSERT INTO `mode_role` VALUES (1,1,1),(2,1,2),(3,1,7),(4,1,8),(5,2,4),(6,2,5),(7,3,6);
/*!40000 ALTER TABLE `mode_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modes`
--

DROP TABLE IF EXISTS `modes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `modes_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modes`
--

LOCK TABLES `modes` WRITE;
/*!40000 ALTER TABLE `modes` DISABLE KEYS */;
INSERT INTO `modes` VALUES (1,'admin','Admin','Admin','2017-11-05 15:38:42','2017-11-05 15:38:42'),(2,'customer','Customer','Customer','2017-11-05 15:38:42','2017-11-05 15:38:42'),(3,'pemohon','Pemohon','Pemohon','2017-11-05 15:38:42','2017-11-05 15:38:42');
/*!40000 ALTER TABLE `modes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mountain_campgrounds`
--

DROP TABLE IF EXISTS `mountain_campgrounds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mountain_campgrounds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mountain_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mountain_campgrounds`
--

LOCK TABLES `mountain_campgrounds` WRITE;
/*!40000 ALTER TABLE `mountain_campgrounds` DISABLE KEYS */;
INSERT INTO `mountain_campgrounds` VALUES (1,'Kem Syafiqah','30',1,'2017-11-06 14:13:18','2017-11-05 15:41:29','2017-11-06 14:13:18'),(2,'Kem Seroja','70',1,'2017-11-06 14:13:15','2017-11-05 15:41:41','2017-11-06 14:13:15'),(14,'Tapak Khemah1','10',13,NULL,'2017-11-15 10:22:51','2017-11-15 10:22:51'),(15,'Tapak Khemah2','10',13,NULL,'2017-11-15 10:22:51','2017-11-15 10:22:51'),(16,'Kem Sama Gagah','10',12,NULL,'2017-11-24 10:37:08','2017-11-24 10:37:08'),(17,'Kem Gempak Kijang','30',12,NULL,'2017-11-24 10:37:08','2017-11-24 10:37:08'),(18,'Puncak Titiwangsa','10',12,NULL,'2017-11-24 10:37:08','2017-11-24 10:37:08'),(19,'Puncak Gunung Inas','30',12,NULL,'2017-11-24 10:37:08','2017-11-24 10:37:08'),(25,'Kem Syafiqah','20',21,NULL,'2017-11-24 10:56:12','2017-11-24 10:56:12'),(26,'Kem Seroja','70',21,NULL,'2017-11-24 10:56:12','2017-11-24 10:56:12'),(27,'Kem Kijang','15',21,NULL,'2017-11-24 10:56:12','2017-11-24 10:56:12'),(28,'Puncak Gunung','30',21,NULL,'2017-11-24 10:56:12','2017-11-24 10:56:12'),(29,'Puncak Gunung','15',22,NULL,'2017-11-24 11:05:28','2017-11-24 11:05:28'),(39,'Kem Bear','30',23,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(40,'Puncak Suku','15',23,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(41,'Puncak Yellow','15',23,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(42,'Puncak Irau','25',23,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(43,'Puncak Pas','20',23,NULL,'2017-11-24 11:09:04','2017-11-24 11:09:04'),(44,'Puncak Botak','20',24,NULL,'2017-11-24 11:11:42','2017-11-24 11:11:42'),(45,'Puncak Gunung','25',24,NULL,'2017-11-24 11:11:42','2017-11-24 11:11:42'),(46,'Kem Lebah','70',25,NULL,'2017-11-24 11:27:10','2017-11-24 11:27:10'),(47,'Puncak Gunung','30',25,NULL,'2017-11-24 11:27:10','2017-11-24 11:27:10'),(48,'Puncak Gunung','40',26,NULL,'2017-11-24 11:29:35','2017-11-24 11:29:35'),(49,'Kem Sekupang (LWP)','20',27,NULL,'2017-11-24 11:32:10','2017-11-24 11:32:10'),(50,'Puncak Gunung','40',27,NULL,'2017-11-24 11:32:10','2017-11-24 11:32:10'),(65,'Kem Trojan (Gerik)','0',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(66,'Pos Kemar (KOA)','30',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(67,'Kg. Leriar','0',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(68,'Kem Siakap','40',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(69,'Kem Leweng','30',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(70,'Puncak Gunung Ulu Sepat','30',28,NULL,'2017-11-24 11:40:38','2017-11-24 11:40:38'),(76,'Kg. Lasah','0',29,NULL,'2017-11-24 11:43:29','2017-11-24 11:43:29'),(77,'Kg. Leriar','0',29,NULL,'2017-11-24 11:43:29','2017-11-24 11:43:29'),(78,'Kem Pondok (LWP)','40',29,NULL,'2017-11-24 11:43:29','2017-11-24 11:43:29'),(79,'Puncak Gunung Ulu Sepat','30',29,NULL,'2017-11-24 11:43:29','2017-11-24 11:43:29'),(155,'Puncak Gunung Ulu Sepat','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(156,'Kem Sg. Leper','20',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(157,'Kem Sempadan','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(158,'Kem Maggi','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(159,'Kem Peres','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(160,'Trek Balak','0',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(161,'Kem Rekom (KOA)','50',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(162,'Kem Pakma','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(163,'Kem Tengah','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(164,'Kem Tongkat Ali (LWP)','20',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(165,'Anak Chamah','0',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(166,'Puncak Gunung Chamah','30',30,NULL,'2017-11-24 11:55:29','2017-11-24 11:55:29'),(167,'Kuala Mu (KOA)','20',31,NULL,'2017-11-24 11:59:04','2017-11-24 11:59:04'),(168,'Kem Pondok','30',31,NULL,'2017-11-24 11:59:04','2017-11-24 11:59:04'),(181,'Kuala Mu (KOA)','20',32,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(182,'Kem Pondok','30',32,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(183,'Kem Sungai','30',32,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(184,'LWP','0',32,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(185,'Puncak Gunung','40',32,NULL,'2017-11-24 12:02:08','2017-11-24 12:02:08'),(188,'Kem Sg. Gading','30',33,NULL,'2017-11-24 12:06:43','2017-11-24 12:06:43'),(189,'Ulu Sg. Gading','40',33,NULL,'2017-11-24 12:06:43','2017-11-24 12:06:43'),(190,'Puncak Gunung Bubu','40',33,NULL,'2017-11-24 12:06:43','2017-11-24 12:06:43'),(226,'Kg. Masjid Kg. Lasah','0',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(227,'Kg. Lasah','0',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(228,'Pos Kemar (KOA)','30',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(229,'Kg. Leriar','0',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(230,'Kem Siakap','40',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(231,'Kg. Agek (KOA)','40',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(232,'Kem Perodua','40',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(233,'Kem Sarsi','30',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(234,'Puncak Gunung','0',34,NULL,'2017-11-24 12:10:26','2017-11-24 12:10:26'),(236,'Kem Puncak','50',2,NULL,'2017-12-13 11:46:33','2017-12-13 11:46:33');
/*!40000 ALTER TABLE `mountain_campgrounds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mountains`
--

DROP TABLE IF EXISTS `mountains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mountains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campground` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `other_price` decimal(20,2) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `permanent_forest_id` int(11) DEFAULT NULL,
  `travel_day` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `travel_night` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mountains`
--

LOCK TABLES `mountains` WRITE;
/*!40000 ALTER TABLE `mountains` DISABLE KEYS */;
INSERT INTO `mountains` VALUES (1,'Test Gunung','test','Y','10',0.00,0.00,1,1,0,'1','2','1','2017-11-06 14:41:13','2017-11-05 15:41:03','2017-11-06 14:41:13'),(2,'Gunung Tebu','','Y','20',10.00,0.00,2,2,1,'2','1','1',NULL,'2017-11-06 11:56:32','2017-12-13 11:46:33'),(3,'Liang','Behrang','N','0',10.00,0.00,3,6,11,'2','1','1',NULL,'2017-11-06 13:42:24','2017-11-24 10:28:35'),(4,'Bah Gading','Bukit Tapah','Y','40',10.00,0.00,3,6,36,'3','2','1',NULL,'2017-11-06 13:43:17','2017-11-24 10:28:53'),(5,'Batu Putih','Bukit Tapah','Y','30',10.00,0.00,3,6,36,'3','2','1',NULL,'2017-11-06 13:45:56','2017-11-24 10:29:15'),(6,'Kinjang','Bukit Tapah','N','0',10.00,0.00,3,6,36,'2','1','1',NULL,'2017-11-06 14:04:08','2017-11-24 10:29:32'),(7,'Tumang Batak','Bukit Slim','N','10',0.00,0.00,3,6,45,'2','1','1',NULL,'2017-11-06 14:05:12','2017-11-24 10:29:50'),(8,'Bujang Melaka','Bujang Melaka','Y','20',0.00,0.00,3,6,46,'1','0','1',NULL,'2017-11-06 14:05:39','2017-11-24 10:30:55'),(9,'Ulu Sungkai','Bukit Slim','N','0',10.00,0.00,3,6,45,'1','0','1',NULL,'2017-11-06 14:07:42','2017-11-24 10:30:26'),(10,'Ulu Kinjor','Bukit Tapah','N','0',10.00,0.00,3,6,36,'2','1','1',NULL,'2017-11-06 14:08:14','2017-11-24 10:30:39'),(11,'Sanggul','','N','0',10.00,0.00,3,6,0,'0','0','1',NULL,'2017-11-06 14:08:41','2017-11-06 14:08:41'),(12,'Inas & Bintang Hijau','Korbu','Y','30',10.00,0.00,3,7,47,'2','1','1',NULL,'2017-11-06 14:09:55','2017-11-24 10:37:08'),(13,'Gunung Tebu','','Y','0',0.00,0.00,2,2,0,'3','2','1','2017-12-13 11:44:24','2017-11-07 23:08:40','2017-12-13 11:44:24'),(14,'Bukit Larut','Bukit Larut','N','0',20.00,NULL,3,7,27,'1','1','1',NULL,'2017-11-24 10:38:40','2017-11-24 10:38:56'),(15,'Pecah Batu','Bubu','N','0',20.00,NULL,3,7,48,'2','1','1',NULL,'2017-11-24 10:40:22','2017-11-24 10:40:59'),(16,'Ulu Jernih','BIntang Hijau','N','0',20.00,NULL,3,7,49,'1','1','1',NULL,'2017-11-24 10:42:04','2017-11-24 10:42:04'),(17,'Gunung Hijau','Bintang Hijau','N','20',20.00,NULL,3,7,49,'2','1','1',NULL,'2017-11-24 10:43:03','2017-11-24 10:43:03'),(18,'Chamah & Ulu Sepat','Korbu','N','30',0.00,NULL,3,8,50,'3','2','1',NULL,'2017-11-24 10:45:47','2017-11-24 10:45:47'),(19,'Kenderong','Kenderong','N','40',20.00,NULL,3,8,51,'2','0','1',NULL,'2017-11-24 10:49:09','2017-11-24 10:49:09'),(20,'Gerah','Piah','N','35',20.00,NULL,3,8,52,'4','3','1',NULL,'2017-11-24 10:52:32','2017-11-24 10:52:32'),(21,'Korbu & Gayong (Korga)','Bukit Kinta','Y','145',20.00,NULL,3,32,31,'4','3','1',NULL,'2017-11-24 10:55:20','2017-11-24 10:55:20'),(22,'Suku','Bukit Kinta','Y','15',20.00,NULL,3,7,27,'1','1','1',NULL,'2017-11-24 11:05:28','2017-11-24 11:05:28'),(23,'Trans Suku (Jegreng)','Bukit Kinta','Y','105',20.00,NULL,3,32,31,'4','3','1',NULL,'2017-11-24 11:07:22','2017-11-24 11:07:22'),(24,'Chabang','Bukit Kinta','Y','45',20.00,NULL,3,32,31,'3','2','1',NULL,'2017-11-24 11:11:42','2017-11-24 11:11:42'),(25,'Bujang Melaka','Bujang Melaka','Y','100',20.00,NULL,3,32,35,'2','1','1',NULL,'2017-11-24 11:27:10','2017-11-24 11:27:10'),(26,'Relau','Bujang Melaka','Y','40',20.00,NULL,3,32,35,'1','1','1',NULL,'2017-11-24 11:29:35','2017-11-24 11:29:35'),(27,'Peninjau','Kledang Saiong','Y','60',20.00,NULL,3,32,30,'1','1','1',NULL,'2017-11-24 11:32:10','2017-11-24 11:32:10'),(28,'Ulu Sepat (Gerik)','Piah','Y','130',20.00,NULL,3,5,10,'4','3','1',NULL,'2017-11-24 11:39:01','2017-11-24 11:39:01'),(29,'Ulu Sepat (Sg. Siput)','Piah','Y','70',20.00,NULL,3,5,10,'4','3','1',NULL,'2017-11-24 11:41:49','2017-11-24 11:41:49'),(30,'Ulu Sepat & Chamah','Korbu','Y','300',20.00,NULL,3,5,54,'8','7','1',NULL,'2017-11-24 11:48:26','2017-11-24 11:48:26'),(31,'Yong Yap','Korbu','Y','120',20.00,NULL,3,5,54,'3','2','1',NULL,'2017-11-24 11:59:04','2017-11-24 11:59:04'),(32,'Yong Yap','Korbu','Y','120',20.00,NULL,3,5,54,'3','2','1',NULL,'2017-11-24 11:59:05','2017-11-24 11:59:05'),(33,'Bubu','Bubu','Y','110',20.00,NULL,3,5,29,'3','2','1',NULL,'2017-11-24 12:06:06','2017-11-24 12:06:06'),(34,'Gerah','Piah','Y','190',20.00,NULL,3,5,10,'4','3','1',NULL,'2017-11-24 12:07:42','2017-11-24 12:07:42');
/*!40000 ALTER TABLE `mountains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `others_activities`
--

DROP TABLE IF EXISTS `others_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `others_activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `capacity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `others_activities`
--

LOCK TABLES `others_activities` WRITE;
/*!40000 ALTER TABLE `others_activities` DISABLE KEYS */;
/*!40000 ALTER TABLE `others_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('ikhwan5441@gmail.com','$2y$10$.Ahwqn.Ywgh31AIfNI0DkO/HZEo7RjB/HuUbltrztigSRxvb4qPQC','2017-11-06 10:29:48');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permanent_forests`
--

DROP TABLE IF EXISTS `permanent_forests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permanent_forests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `capacity` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permanent_forests`
--

LOCK TABLES `permanent_forests` WRITE;
/*!40000 ALTER TABLE `permanent_forests` DISABLE KEYS */;
INSERT INTO `permanent_forests` VALUES (1,'Gunung Tebu',5.00,2,2,'100',NULL,'2017-11-06 11:40:09','2017-12-22 08:51:34'),(2,'Hulu Telemong',0.00,4,2,'0',NULL,'2017-11-06 17:41:50','2017-11-06 17:41:50'),(3,'Hulu Terengganu',0.00,4,2,'0',NULL,'2017-11-06 17:42:09','2017-11-06 17:42:09'),(4,'Jerangau',0.00,4,2,'0',NULL,'2017-11-06 17:42:20','2017-11-06 17:42:20'),(5,'Pasir Raja Barat',0.00,4,2,'0',NULL,'2017-11-06 17:42:33','2017-11-06 17:42:33'),(6,'Petuang',10.00,4,2,'0',NULL,'2017-11-06 17:42:46','2017-11-24 10:21:37'),(7,'Tembat',0.00,4,2,'0',NULL,'2017-11-06 17:42:57','2017-11-06 17:42:57'),(8,'Hulu Terengganu Tambahan',0.00,4,2,'0',NULL,'2017-11-06 17:43:23','2017-11-06 17:43:23'),(9,'Bukit Chanat',0.00,4,2,'0',NULL,'2017-11-06 17:43:43','2017-11-06 17:43:43'),(10,'Piah',10.00,5,3,'0',NULL,'2017-11-07 10:56:06','2017-11-15 10:18:09'),(11,'Behrang',10.00,6,3,'0',NULL,'2017-11-07 14:01:22','2017-11-24 09:58:39'),(13,'Pelagat',0.00,2,2,'0',NULL,'2017-11-13 16:08:03','2017-11-13 16:08:03'),(15,'Bukit Lagong Tambahan',0.00,30,12,'0',NULL,'2017-11-13 19:07:16','2017-11-13 19:07:16'),(16,'Bukit Nanas',0.00,30,12,'0',NULL,'2017-11-13 19:07:48','2017-11-13 19:07:48'),(17,'Sungai Besi',0.00,30,12,'0',NULL,'2017-11-13 19:08:03','2017-11-13 19:08:03'),(18,'Bukit Sungei Putih',0.00,30,12,'0',NULL,'2017-11-13 19:08:23','2017-11-13 19:08:23'),(19,'Gunung Arong',0.00,13,5,'0',NULL,'2017-11-14 12:07:18','2017-11-14 12:07:18'),(20,'Kluang',0.00,12,5,'0',NULL,'2017-11-14 12:07:37','2017-11-14 12:07:37'),(21,'Panti',0.00,11,5,'0',NULL,'2017-11-14 12:07:50','2017-11-14 12:07:50'),(22,'Gunong Pulai',0.00,12,5,'0',NULL,'2017-11-14 12:08:11','2017-11-14 12:08:11'),(23,'Soga',0.00,12,5,'0',NULL,'2017-11-14 12:08:24','2017-11-14 12:08:24'),(24,'Labis',0.00,14,5,'0',NULL,'2017-11-14 12:08:42','2017-11-14 12:08:42'),(25,'Belum',10.00,31,3,'0',NULL,'2017-11-14 12:14:38','2017-11-24 10:01:19'),(26,'Bintang Hijau (Hulu Perak)',10.00,31,3,'0',NULL,'2017-11-14 12:15:31','2017-11-24 10:00:38'),(27,'Bukit Larut (Larut/Matang)',0.00,7,3,'0',NULL,'2017-11-14 12:15:58','2017-11-14 12:15:58'),(28,'Jebong',0.00,7,3,'0',NULL,'2017-11-14 12:16:15','2017-11-14 12:16:15'),(29,'Bubu (Kuala Kangsar)',10.00,5,3,'0',NULL,'2017-11-14 12:16:38','2017-11-24 12:05:00'),(30,'Kledang Saiong (Kinta / Manjung)',0.00,32,3,'0',NULL,'2017-11-14 12:20:14','2017-11-14 12:20:14'),(31,'Bukit Kinta',0.00,32,3,'0',NULL,'2017-11-14 12:20:37','2017-11-14 12:20:37'),(32,'Bubu (Kinta / Manjung)',0.00,32,3,'0',NULL,'2017-11-14 12:21:36','2017-11-14 12:21:36'),(33,'Segari Melintang',0.00,32,3,'0',NULL,'2017-11-14 12:21:59','2017-11-14 12:21:59'),(34,'Pangkor Laut',0.00,32,3,'0',NULL,'2017-11-14 12:22:15','2017-11-14 12:22:15'),(35,'Bujang Melaka (Kinta/Manjung)',0.00,32,3,'0',NULL,'2017-11-14 12:22:50','2017-11-14 12:22:50'),(36,'Bukit Tapah',0.00,6,3,'0',NULL,'2017-11-14 12:23:15','2017-11-14 12:23:15'),(37,'Gunung Bongsu',0.00,15,7,'0',NULL,'2017-11-14 13:40:55','2017-11-14 13:40:55'),(38,'Gunung Inas',0.00,15,7,'0',NULL,'2017-11-14 13:41:14','2017-11-14 13:41:14'),(39,'Rimba Teloi Selatan',0.00,15,7,'0',NULL,'2017-11-14 13:41:37','2017-11-14 13:41:37'),(40,'Bukit Enggang',0.00,16,7,'0',NULL,'2017-11-14 13:41:54','2017-11-14 13:41:54'),(41,'Bukit Perak',10.00,16,7,'0',NULL,'2017-11-14 13:42:11','2017-11-24 10:00:52'),(42,'Gunung Jerai',0.00,16,7,'0',NULL,'2017-11-14 13:42:27','2017-11-14 13:42:27'),(43,'Rimba Teloi Tengah',0.00,16,7,'0',NULL,'2017-11-14 13:43:02','2017-11-14 13:43:02'),(44,'Bukit Perangin',0.00,17,7,'0',NULL,'2017-11-14 13:43:25','2017-11-14 13:43:25'),(45,'Bukit Slim',10.00,6,3,'0',NULL,'2017-11-24 10:19:52','2017-11-24 10:19:52'),(46,'Bujang Melaka (Perak Selatan)',10.00,6,3,'0',NULL,'2017-11-24 10:21:00','2017-11-24 10:21:00'),(47,'Korbu',10.00,7,3,'0',NULL,'2017-11-24 10:32:54','2017-11-24 10:32:54'),(48,'Bubu (Larut Matang)',10.00,7,3,'0',NULL,'2017-11-24 10:33:45','2017-11-24 10:33:45'),(49,'Bintang Hijau',10.00,7,3,'0',NULL,'2017-11-24 10:34:32','2017-11-24 10:34:32'),(50,'Korbu (Hulu Perak)',10.00,8,3,'0',NULL,'2017-11-24 10:35:26','2017-11-24 10:44:41'),(51,'Kenderong',10.00,8,3,'0',NULL,'2017-11-24 10:36:11','2017-11-24 10:36:11'),(52,'Piah (Hulu Perak)',10.00,8,3,'0',NULL,'2017-11-24 10:36:43','2017-11-24 10:36:43'),(54,'Korbu (Kuala Kangsar)',10.00,5,3,'0',NULL,'2017-11-24 11:36:52','2017-11-24 11:36:52');
/*!40000 ALTER TABLE `permanent_forests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(5,2),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2),(35,2),(36,2),(37,2),(38,2),(39,2),(40,2),(41,2),(42,2),(43,2),(44,2),(45,2),(46,2),(9,3),(10,3),(11,3),(12,3),(14,3),(15,3),(17,3),(18,3),(31,3),(32,3),(33,3),(34,3),(35,3),(36,3),(37,3),(38,3),(14,4),(15,4),(17,4),(18,4),(14,5),(15,5),(47,6),(43,7),(44,7),(45,7),(46,7);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_user` (
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`,`user_id`,`user_type`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_user`
--

LOCK TABLES `permission_user` WRITE;
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'create-module-roles','Create Module-roles','Create Module-roles','2017-11-05 15:38:23','2017-11-05 15:38:23'),(2,'read-module-roles','Read Module-roles','Read Module-roles','2017-11-05 15:38:23','2017-11-05 15:38:23'),(3,'update-module-roles','Update Module-roles','Update Module-roles','2017-11-05 15:38:24','2017-11-05 15:38:24'),(4,'delete-module-roles','Delete Module-roles','Delete Module-roles','2017-11-05 15:38:24','2017-11-05 15:38:24'),(5,'create-module-admins','Create Module-admins','Create Module-admins','2017-11-05 15:38:24','2017-11-05 15:38:24'),(6,'read-module-admins','Read Module-admins','Read Module-admins','2017-11-05 15:38:24','2017-11-05 15:38:24'),(7,'update-module-admins','Update Module-admins','Update Module-admins','2017-11-05 15:38:24','2017-11-05 15:38:24'),(8,'delete-module-admins','Delete Module-admins','Delete Module-admins','2017-11-05 15:38:24','2017-11-05 15:38:24'),(9,'create-module-users','Create Module-users','Create Module-users','2017-11-05 15:38:25','2017-11-05 15:38:25'),(10,'read-module-users','Read Module-users','Read Module-users','2017-11-05 15:38:25','2017-11-05 15:38:25'),(11,'update-module-users','Update Module-users','Update Module-users','2017-11-05 15:38:25','2017-11-05 15:38:25'),(12,'delete-module-users','Delete Module-users','Delete Module-users','2017-11-05 15:38:25','2017-11-05 15:38:25'),(13,'create-module-home','Create Module-home','Create Module-home','2017-11-05 15:38:25','2017-11-05 15:38:25'),(14,'read-module-home','Read Module-home','Read Module-home','2017-11-05 15:38:25','2017-11-05 15:38:25'),(15,'update-module-home','Update Module-home','Update Module-home','2017-11-05 15:38:25','2017-11-05 15:38:25'),(16,'delete-module-home','Delete Module-home','Delete Module-home','2017-11-05 15:38:25','2017-11-05 15:38:25'),(17,'read-module-profile','Read Module-profile','Read Module-profile','2017-11-05 15:38:26','2017-11-05 15:38:26'),(18,'update-module-profile','Update Module-profile','Update Module-profile','2017-11-05 15:38:26','2017-11-05 15:38:26'),(19,'create-role-super','Create Role-super','Create Role-super','2017-11-05 15:38:26','2017-11-05 15:38:26'),(20,'read-role-super','Read Role-super','Read Role-super','2017-11-05 15:38:26','2017-11-05 15:38:26'),(21,'update-role-super','Update Role-super','Update Role-super','2017-11-05 15:38:26','2017-11-05 15:38:26'),(22,'delete-role-super','Delete Role-super','Delete Role-super','2017-11-05 15:38:26','2017-11-05 15:38:26'),(23,'create-role-admin','Create Role-admin','Create Role-admin','2017-11-05 15:38:26','2017-11-05 15:38:26'),(24,'read-role-admin','Read Role-admin','Read Role-admin','2017-11-05 15:38:27','2017-11-05 15:38:27'),(25,'update-role-admin','Update Role-admin','Update Role-admin','2017-11-05 15:38:27','2017-11-05 15:38:27'),(26,'delete-role-admin','Delete Role-admin','Delete Role-admin','2017-11-05 15:38:27','2017-11-05 15:38:27'),(27,'create-role-officer','Create Role-officer','Create Role-officer','2017-11-05 15:38:27','2017-11-05 15:38:27'),(28,'read-role-officer','Read Role-officer','Read Role-officer','2017-11-05 15:38:27','2017-11-05 15:38:27'),(29,'update-role-officer','Update Role-officer','Update Role-officer','2017-11-05 15:38:28','2017-11-05 15:38:28'),(30,'delete-role-officer','Delete Role-officer','Delete Role-officer','2017-11-05 15:38:28','2017-11-05 15:38:28'),(31,'create-role-customer','Create Role-customer','Create Role-customer','2017-11-05 15:38:28','2017-11-05 15:38:28'),(32,'read-role-customer','Read Role-customer','Read Role-customer','2017-11-05 15:38:28','2017-11-05 15:38:28'),(33,'update-role-customer','Update Role-customer','Update Role-customer','2017-11-05 15:38:28','2017-11-05 15:38:28'),(34,'delete-role-customer','Delete Role-customer','Delete Role-customer','2017-11-05 15:38:29','2017-11-05 15:38:29'),(35,'create-role-tester','Create Role-tester','Create Role-tester','2017-11-05 15:38:29','2017-11-05 15:38:29'),(36,'read-role-tester','Read Role-tester','Read Role-tester','2017-11-05 15:38:29','2017-11-05 15:38:29'),(37,'update-role-tester','Update Role-tester','Update Role-tester','2017-11-05 15:38:29','2017-11-05 15:38:29'),(38,'delete-role-tester','Delete Role-tester','Delete Role-tester','2017-11-05 15:38:29','2017-11-05 15:38:29'),(39,'create-role-jabatan_perhutanan_negeri','Create Role-jabatan_perhutanan_negeri','Create Role-jabatan_perhutanan_negeri','2017-11-05 15:38:29','2017-11-05 15:38:29'),(40,'read-role-jabatan_perhutanan_negeri','Read Role-jabatan_perhutanan_negeri','Read Role-jabatan_perhutanan_negeri','2017-11-05 15:38:29','2017-11-05 15:38:29'),(41,'update-role-jabatan_perhutanan_negeri','Update Role-jabatan_perhutanan_negeri','Update Role-jabatan_perhutanan_negeri','2017-11-05 15:38:30','2017-11-05 15:38:30'),(42,'delete-role-jabatan_perhutanan_negeri','Delete Role-jabatan_perhutanan_negeri','Delete Role-jabatan_perhutanan_negeri','2017-11-05 15:38:30','2017-11-05 15:38:30'),(43,'create-role-pegawai_hutan_daerah','Create Role-pegawai_hutan_daerah','Create Role-pegawai_hutan_daerah','2017-11-05 15:38:30','2017-11-05 15:38:30'),(44,'read-role-pegawai_hutan_daerah','Read Role-pegawai_hutan_daerah','Read Role-pegawai_hutan_daerah','2017-11-05 15:38:30','2017-11-05 15:38:30'),(45,'update-role-pegawai_hutan_daerah','Update Role-pegawai_hutan_daerah','Update Role-pegawai_hutan_daerah','2017-11-05 15:38:30','2017-11-05 15:38:30'),(46,'delete-role-pegawai_hutan_daerah','Delete Role-pegawai_hutan_daerah','Delete Role-pegawai_hutan_daerah','2017-11-05 15:38:30','2017-11-05 15:38:30'),(47,'-module-home',' Module-home',' Module-home','2017-11-05 15:38:39','2017-11-05 15:38:39');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_categories`
--

DROP TABLE IF EXISTS `price_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_categories`
--

LOCK TABLES `price_categories` WRITE;
/*!40000 ALTER TABLE `price_categories` DISABLE KEYS */;
INSERT INTO `price_categories` VALUES (1,'Pelajar',NULL,'2017-11-06 14:01:27','2017-11-06 14:01:27'),(2,'Foreigner',NULL,'2017-11-06 14:01:35','2017-11-06 14:01:35'),(3,'Biasa',NULL,'2017-11-06 14:08:52','2017-11-06 14:08:52'),(4,'Orang Tempatan','2017-11-06 14:21:01','2017-11-06 14:20:50','2017-11-06 14:21:01'),(5,'Orang Tempatan',NULL,'2017-11-06 14:20:56','2017-11-06 14:20:56'),(6,'Warga Asing',NULL,'2017-11-06 14:21:11','2017-11-06 14:21:11');
/*!40000 ALTER TABLE `price_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regional_forestries`
--

DROP TABLE IF EXISTS `regional_forestries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regional_forestries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regional_forestries`
--

LOCK TABLES `regional_forestries` WRITE;
/*!40000 ALTER TABLE `regional_forestries` DISABLE KEYS */;
INSERT INTO `regional_forestries` VALUES (1,'Pegawai Hutan Daerah Terengganu Utara','N','N',2,2,NULL,'2017-11-06 17:17:04','2017-11-06 17:17:04'),(2,'Pegawai Hutan Daerah Terengganu Selatan','N','N',2,3,NULL,'2017-11-06 17:17:43','2017-11-06 17:17:43'),(3,'Pegawai Daerah Hutan Terengganu Selatan','N','N',2,3,NULL,'2017-11-06 17:18:07','2017-11-06 17:18:07'),(4,'Pegawai Hutan Daerah Kuala Kangsar','N','N',3,5,NULL,'2017-11-06 17:36:19','2017-11-06 17:36:19'),(5,'Pegawai Hutan Daerah Perak Selatan','N','N',3,6,NULL,'2017-11-06 17:36:42','2017-11-06 17:36:42'),(6,'Pegawai Hutan Daerah Larut Matang','N','N',3,7,NULL,'2017-11-06 17:36:58','2017-11-06 17:36:58'),(7,'Pegawai Hutan Daerah Hulu Perak','N','N',3,8,NULL,'2017-11-06 17:37:23','2017-11-06 17:37:23'),(8,'Pegawai Hutan Daerah Johor Selatan','N','N',5,11,NULL,'2017-11-06 17:38:01','2017-11-06 17:38:01'),(9,'Pegawai Hutan Daerah Johor Tengah','N','N',5,12,NULL,'2017-11-06 17:38:15','2017-11-06 17:38:15'),(10,'Pegawai Hutan Daerah Johor Timur','N','N',5,13,NULL,'2017-11-06 17:38:28','2017-11-06 17:38:28'),(11,'Pegawai Hutan Daerah Johor Utara','N','N',5,14,NULL,'2017-11-06 17:38:42','2017-11-06 17:38:42'),(12,'Pegawai Hutan Daerah Jajahan Kelantan Barat','N','N',6,18,NULL,'2017-11-06 17:39:04','2017-11-06 17:39:04'),(13,'Pegawai Hutan Daerah Jajahan Kelantan Selatan','N','N',6,19,NULL,'2017-11-06 17:39:24','2017-11-06 17:39:24'),(14,'Pegawai Hutan Daerah Jajahan Kelantan Timur','N','N',6,20,NULL,'2017-11-06 17:39:42','2017-11-06 17:39:42'),(15,'Pegawai Hutan Daerah Kedah Selatan','N','N',7,15,NULL,'2017-11-06 17:39:57','2017-11-06 17:39:57'),(16,'Pegawai Hutan Daerah Tengah','N','N',7,16,NULL,'2017-11-06 17:40:07','2017-11-06 17:40:07'),(17,'Pegawai Hutan Daerah Kedah Utara','N','N',7,17,NULL,'2017-11-06 17:40:21','2017-11-06 17:40:21');
/*!40000 ALTER TABLE `regional_forestries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,'App\\Models\\User'),(2,2,'App\\Models\\User'),(3,3,'App\\Models\\User'),(4,4,'App\\Models\\User'),(5,5,'App\\Models\\User'),(6,6,'App\\Models\\User'),(9,6,'App\\Models\\User'),(10,6,'App\\Models\\User'),(14,6,'App\\Models\\User'),(17,6,'App\\Models\\User'),(19,6,'App\\Models\\User'),(21,6,'App\\Models\\User'),(22,6,'App\\Models\\User'),(24,6,'App\\Models\\User'),(27,6,'App\\Models\\User'),(7,7,'App\\Models\\User'),(13,7,'App\\Models\\User'),(15,7,'App\\Models\\User'),(16,7,'App\\Models\\User'),(23,7,'App\\Models\\User'),(8,8,'App\\Models\\User'),(12,8,'App\\Models\\User'),(18,8,'App\\Models\\User'),(25,8,'App\\Models\\User'),(26,8,'App\\Models\\User');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'super','Super','Super','2017-11-05 15:38:23','2017-11-05 15:38:23'),(2,'admin','Admin','Admin','2017-11-05 15:38:32','2017-11-05 15:38:32'),(3,'officer','Officer','Officer','2017-11-05 15:38:36','2017-11-05 15:38:36'),(4,'customer','Customer','Customer','2017-11-05 15:38:38','2017-11-05 15:38:38'),(5,'tester','Tester','Tester','2017-11-05 15:38:39','2017-11-05 15:38:39'),(6,'pemohon','Pemohon','Pemohon','2017-11-05 15:38:39','2017-11-05 15:38:39'),(7,'jabatan_perhutanan_negeri','Jabatan Perhutanan Negeri','Jabatan Perhutanan Negeri','2017-11-05 15:38:40','2017-11-05 15:38:40'),(8,'pegawai_hutan_daerah','Pegawai Hutan Daerah','Pegawai Hutan Daerah','2017-11-05 15:38:41','2017-11-05 15:38:41');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'homepage','<p><b><span style=\"font-size: 18px;\">Langkah-langkah</span></b></p>\r\n        			<ol><li><span style=\"font-size: 12px;\">﻿Pengguna perlu melayari </span><a href=\"http://www.e-permit.gov.my\">www.e-permit.gov.my</a><span style=\"font-size: 12px;\"> (sample)</span></li><li><span style=\"font-size: 12px;\">Untuk memohon e-permit, pengguna perlu mendaftar sebagai ahli sebelum memohon permit secara online.</span></li><li><span style=\"font-size: 12px;\">Pengguna perlu menekan butang <b>\"Daftar\" </b>bagi memohon e-permit memasuki hutan.<br></span><b><span style=\"font-size: 18px;\"><br></span></b></li></ol>',NULL,NULL,'2017-12-18 10:37:05'),(2,'footer','<p style=\"text-align: center; \">Sebarang pertanyaan sila hubungi:</p><p style=\"text-align: center; \">Jabatan Perhutanan Semenanjung Malaysia (JPSM)</p><p style=\"text-align: center; \"><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; text-align: left;\">Jalan Sultan Salahhudin, Kuala Lumpur</span></p><p style=\"text-align: center; \"><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; text-align: left;\">50480 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</span></p><p style=\"text-align: center; \"><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; text-align: left;\">Tel : 03-2616 4488</span></p><p style=\"text-align: center; \"><span style=\"color: rgb(34, 34, 34); font-family: arial, sans-serif; font-size: 13px; text-align: left;\">Faks : 03-2692 5657</span></p>',NULL,NULL,'2017-12-18 10:39:40'),(3,'logs_id','',NULL,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'1513905903.jpg','http://epermit.aidansystem.com/img/slider/1513905903.jpg','JPSM',NULL,'2017-11-06 09:54:00','2017-12-22 09:25:03'),(2,'1513905918.jpg','http://epermit.aidansystem.com/img/slider/1513905918.jpg','Slider 2',NULL,'2017-11-06 09:54:22','2017-12-22 09:25:18'),(3,'1513905929.jpg','http://epermit.aidansystem.com/img/slider/1513905929.jpg','Slider 3',NULL,'2017-11-06 09:54:35','2017-12-22 09:25:29'),(4,'1513905969.jpg','http://epermit.aidansystem.com/img/slider/1513905969.jpg','Slider 4',NULL,'2017-11-06 09:54:52','2017-12-22 09:26:09');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state_forestries`
--

DROP TABLE IF EXISTS `state_forestries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state_forestries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state_forestries`
--

LOCK TABLES `state_forestries` WRITE;
/*!40000 ALTER TABLE `state_forestries` DISABLE KEYS */;
INSERT INTO `state_forestries` VALUES (1,'Jabatan Perhutanan Negeri Terengganu','N','N',2,NULL,'2017-11-06 17:10:23','2017-11-06 17:10:23'),(2,'Jabatan Perhutanan Negeri Perak','N','N',3,NULL,'2017-11-06 17:10:35','2017-11-06 17:10:35'),(3,'Jabatan Perhutanan Negeri Johor','N','N',5,NULL,'2017-11-06 17:23:03','2017-11-06 17:23:03'),(4,'Jabatan Perhutanan Negeri Kelantan','N','N',6,NULL,'2017-11-06 17:23:20','2017-11-06 17:23:20'),(5,'Jabatan Perhutanan Negeri Kedah','N','N',7,NULL,'2017-11-06 17:23:29','2017-11-06 17:23:29'),(6,'Jabatan Perhutanan Negeri Negeri Sembilan','N','N',8,NULL,'2017-11-06 17:23:40','2017-11-06 17:23:40'),(7,'Jabatan Perhutanan Negeri Melaka','N','N',9,NULL,'2017-11-06 17:23:54','2017-11-06 17:23:54'),(8,'Jabatan Perhutanan Negeri Pulau Pinang','N','N',10,NULL,'2017-11-06 17:25:18','2017-11-06 17:25:18'),(9,'Jabatan Perhutanan Negeri Perlis','N','N',11,NULL,'2017-11-06 17:25:30','2017-11-06 17:25:30'),(10,'Jabatan Perhutanan Negeri Wilayah Persekutuan Kuala Lumpur','N','N',12,NULL,'2017-11-06 17:25:46','2017-11-06 17:25:46'),(11,'Jabatan Perhutanan Negeri Pahang','N','N',13,NULL,'2017-11-06 17:25:57','2017-11-06 17:25:57'),(12,'Jabatan Perhutanan Negeri Selangor','N','N',14,NULL,'2017-11-06 17:26:07','2017-11-06 17:26:07'),(13,'Jabatan Perhutanan Negeri IPJPSM','N','N',15,NULL,'2017-11-06 17:26:28','2017-11-06 17:26:28');
/*!40000 ALTER TABLE `state_forestries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Test Negeri','2017-11-06 09:26:10','2017-11-05 15:40:10','2017-11-06 09:26:10'),(2,'Terengganu',NULL,'2017-11-06 09:26:06','2017-11-06 09:26:06'),(3,'Perak',NULL,'2017-11-06 09:26:27','2017-11-06 09:26:27'),(4,'Pahang','2017-11-06 11:24:42','2017-11-06 09:26:34','2017-11-06 11:24:42'),(5,'Johor',NULL,'2017-11-06 11:24:17','2017-11-06 17:19:51'),(6,'Kelantan',NULL,'2017-11-06 13:38:35','2017-11-06 13:38:35'),(7,'Kedah',NULL,'2017-11-06 13:38:40','2017-11-06 13:38:40'),(8,'Negeri Sembilan',NULL,'2017-11-06 13:38:52','2017-11-06 13:38:52'),(9,'Melaka',NULL,'2017-11-06 17:08:09','2017-11-06 17:08:09'),(10,'Pulau Pinang',NULL,'2017-11-06 17:09:10','2017-11-06 17:09:10'),(11,'Perlis',NULL,'2017-11-06 17:09:22','2017-11-06 17:09:22'),(12,'Wilayah Persekutuan Kuala Lumpur',NULL,'2017-11-06 17:09:43','2017-11-06 17:09:43'),(13,'Pahang',NULL,'2017-11-06 17:13:37','2017-11-06 17:13:37'),(14,'Selangor',NULL,'2017-11-06 17:13:56','2017-11-06 17:13:56'),(15,'IPJPSM',NULL,'2017-11-06 17:14:27','2017-11-06 17:14:27');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_access_logs`
--

DROP TABLE IF EXISTS `user_access_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_access_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=370 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_access_logs`
--

LOCK TABLES `user_access_logs` WRITE;
/*!40000 ALTER TABLE `user_access_logs` DISABLE KEYS */;
INSERT INTO `user_access_logs` VALUES (1,1,'2017-11-05 22:39:36','2017-11-05 22:41:51',NULL,'2017-11-05 15:39:36','2017-11-05 15:41:51'),(2,9,'2017-11-05 22:42:37','0000-00-00 00:00:00',NULL,'2017-11-05 15:42:37','2017-11-05 15:42:37'),(3,1,'2017-11-05 23:00:22','0000-00-00 00:00:00',NULL,'2017-11-05 23:00:22','2017-11-05 23:00:22'),(4,1,'2017-11-06 07:42:17','0000-00-00 00:00:00',NULL,'2017-11-06 07:42:17','2017-11-06 07:42:17'),(5,1,'2017-11-06 09:12:01','2017-11-06 09:21:45',NULL,'2017-11-06 09:12:01','2017-11-06 09:21:45'),(6,10,'2017-11-06 09:23:03','0000-00-00 00:00:00',NULL,'2017-11-06 09:23:03','2017-11-06 09:23:03'),(7,1,'2017-11-06 09:25:47','2017-11-06 09:48:57',NULL,'2017-11-06 09:25:47','2017-11-06 09:48:57'),(8,1,'2017-11-06 09:36:40','0000-00-00 00:00:00',NULL,'2017-11-06 09:36:40','2017-11-06 09:36:40'),(9,10,'2017-11-06 09:39:17','2017-11-06 10:29:32',NULL,'2017-11-06 09:39:17','2017-11-06 10:29:32'),(10,1,'2017-11-06 09:39:22','0000-00-00 00:00:00',NULL,'2017-11-06 09:39:22','2017-11-06 09:39:22'),(11,2,'2017-11-06 09:49:04','2017-11-06 09:50:10',NULL,'2017-11-06 09:49:04','2017-11-06 09:50:10'),(12,2,'2017-11-06 09:56:22','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:22','2017-11-06 09:56:22'),(13,2,'2017-11-06 09:56:24','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:24','2017-11-06 09:56:24'),(14,2,'2017-11-06 09:56:26','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:26','2017-11-06 09:56:26'),(15,2,'2017-11-06 09:56:34','0000-00-00 00:00:00',NULL,'2017-11-06 09:56:34','2017-11-06 09:56:34'),(16,2,'2017-11-06 10:09:47','2017-11-06 10:12:21',NULL,'2017-11-06 10:09:47','2017-11-06 10:12:21'),(17,14,'2017-11-06 10:20:41','0000-00-00 00:00:00',NULL,'2017-11-06 10:20:41','2017-11-06 10:20:41'),(18,2,'2017-11-06 10:24:35','0000-00-00 00:00:00',NULL,'2017-11-06 10:24:35','2017-11-06 10:24:35'),(19,10,'2017-11-06 10:39:57','2017-11-06 14:51:06',NULL,'2017-11-06 10:39:57','2017-11-06 14:51:06'),(20,2,'2017-11-06 11:33:43','2017-11-06 15:00:14',NULL,'2017-11-06 11:33:43','2017-11-06 15:00:14'),(21,14,'2017-11-06 11:44:14','0000-00-00 00:00:00',NULL,'2017-11-06 11:44:14','2017-11-06 11:44:14'),(22,14,'2017-11-06 12:27:29','0000-00-00 00:00:00',NULL,'2017-11-06 12:27:29','2017-11-06 12:27:29'),(23,1,'2017-11-06 12:28:25','0000-00-00 00:00:00',NULL,'2017-11-06 12:28:25','2017-11-06 12:28:25'),(24,1,'2017-11-06 13:40:09','2017-11-06 14:16:21',NULL,'2017-11-06 13:40:09','2017-11-06 14:16:21'),(25,9,'2017-11-06 14:17:04','2017-11-06 14:23:13',NULL,'2017-11-06 14:17:04','2017-11-06 14:23:13'),(26,1,'2017-11-06 14:23:21','2017-11-06 14:25:15',NULL,'2017-11-06 14:23:21','2017-11-06 14:25:15'),(27,1,'2017-11-06 14:37:18','2017-11-06 15:35:14',NULL,'2017-11-06 14:37:18','2017-11-06 15:35:14'),(28,10,'2017-11-06 15:00:41','2017-11-06 15:15:11',NULL,'2017-11-06 15:00:41','2017-11-06 15:15:11'),(29,19,'2017-11-06 15:16:55','2017-11-06 15:46:58',NULL,'2017-11-06 15:16:55','2017-11-06 15:46:58'),(30,2,'2017-11-06 15:16:57','0000-00-00 00:00:00',NULL,'2017-11-06 15:16:57','2017-11-06 15:16:57'),(31,18,'2017-11-06 15:17:02','2017-11-06 15:18:52',NULL,'2017-11-06 15:17:02','2017-11-06 15:18:52'),(32,10,'2017-11-06 15:19:49','0000-00-00 00:00:00',NULL,'2017-11-06 15:19:49','2017-11-06 15:19:49'),(33,2,'2017-11-06 15:47:08','2017-11-06 16:34:01',NULL,'2017-11-06 15:47:08','2017-11-06 16:34:01'),(34,2,'2017-11-06 15:54:39','0000-00-00 00:00:00',NULL,'2017-11-06 15:54:39','2017-11-06 15:54:39'),(35,2,'2017-11-06 17:03:05','0000-00-00 00:00:00',NULL,'2017-11-06 17:03:05','2017-11-06 17:03:05'),(36,10,'2017-11-06 17:51:47','2017-11-06 19:17:59',NULL,'2017-11-06 17:51:47','2017-11-06 19:17:59'),(37,20,'2017-11-06 19:18:36','0000-00-00 00:00:00',NULL,'2017-11-06 19:18:36','2017-11-06 19:18:36'),(38,10,'2017-11-06 20:53:49','0000-00-00 00:00:00',NULL,'2017-11-06 20:53:49','2017-11-06 20:53:49'),(39,1,'2017-11-06 22:29:57','0000-00-00 00:00:00',NULL,'2017-11-06 22:29:57','2017-11-06 22:29:57'),(40,1,'2017-11-06 22:46:40','2017-11-06 22:47:04',NULL,'2017-11-06 22:46:40','2017-11-06 22:47:04'),(41,10,'2017-11-06 22:51:35','0000-00-00 00:00:00',NULL,'2017-11-06 22:51:35','2017-11-06 22:51:35'),(42,1,'2017-11-06 23:46:05','0000-00-00 00:00:00',NULL,'2017-11-06 23:46:05','2017-11-06 23:46:05'),(43,10,'2017-11-07 09:32:10','2017-11-07 09:58:00',NULL,'2017-11-07 09:32:10','2017-11-07 09:58:00'),(44,2,'2017-11-07 09:58:08','0000-00-00 00:00:00',NULL,'2017-11-07 09:58:08','2017-11-07 09:58:08'),(45,2,'2017-11-07 10:18:33','2017-11-07 10:21:33',NULL,'2017-11-07 10:18:33','2017-11-07 10:21:33'),(46,2,'2017-11-07 10:18:54','2017-11-07 10:21:53',NULL,'2017-11-07 10:18:54','2017-11-07 10:21:53'),(47,21,'2017-11-07 10:26:53','0000-00-00 00:00:00',NULL,'2017-11-07 10:26:53','2017-11-07 10:26:53'),(48,21,'2017-11-07 10:27:15','0000-00-00 00:00:00',NULL,'2017-11-07 10:27:15','2017-11-07 10:27:15'),(49,21,'2017-11-07 10:27:43','0000-00-00 00:00:00',NULL,'2017-11-07 10:27:43','2017-11-07 10:27:43'),(50,10,'2017-11-07 10:33:46','0000-00-00 00:00:00',NULL,'2017-11-07 10:33:46','2017-11-07 10:33:46'),(51,14,'2017-11-07 10:55:11','0000-00-00 00:00:00',NULL,'2017-11-07 10:55:11','2017-11-07 10:55:11'),(52,14,'2017-11-07 10:56:45','0000-00-00 00:00:00',NULL,'2017-11-07 10:56:45','2017-11-07 10:56:45'),(53,2,'2017-11-07 12:04:18','2017-11-07 12:06:30',NULL,'2017-11-07 12:04:18','2017-11-07 12:06:30'),(54,1,'2017-11-07 12:13:16','0000-00-00 00:00:00',NULL,'2017-11-07 12:13:16','2017-11-07 12:13:16'),(55,1,'2017-11-07 13:59:34','0000-00-00 00:00:00',NULL,'2017-11-07 13:59:34','2017-11-07 13:59:34'),(56,1,'2017-11-07 14:12:15','0000-00-00 00:00:00',NULL,'2017-11-07 14:12:15','2017-11-07 14:12:15'),(57,10,'2017-11-07 14:34:55','0000-00-00 00:00:00',NULL,'2017-11-07 14:34:55','2017-11-07 14:34:55'),(58,2,'2017-11-07 15:59:59','2017-11-07 16:02:26',NULL,'2017-11-07 15:59:59','2017-11-07 16:02:26'),(59,2,'2017-11-07 16:57:57','0000-00-00 00:00:00',NULL,'2017-11-07 16:57:57','2017-11-07 16:57:57'),(60,1,'2017-11-07 18:07:15','0000-00-00 00:00:00',NULL,'2017-11-07 18:07:15','2017-11-07 18:07:15'),(61,2,'2017-11-07 18:48:22','0000-00-00 00:00:00',NULL,'2017-11-07 18:48:22','2017-11-07 18:48:22'),(62,1,'2017-11-07 18:52:16','0000-00-00 00:00:00',NULL,'2017-11-07 18:52:16','2017-11-07 18:52:16'),(63,1,'2017-11-07 21:29:31','0000-00-00 00:00:00',NULL,'2017-11-07 21:29:31','2017-11-07 21:29:31'),(64,2,'2017-11-07 22:56:08','0000-00-00 00:00:00',NULL,'2017-11-07 22:56:08','2017-11-07 22:56:08'),(65,2,'2017-11-08 08:42:43','2017-11-08 08:45:49',NULL,'2017-11-08 08:42:43','2017-11-08 08:45:49'),(66,14,'2017-11-08 08:48:16','0000-00-00 00:00:00',NULL,'2017-11-08 08:48:16','2017-11-08 08:48:16'),(67,1,'2017-11-08 09:42:10','0000-00-00 00:00:00',NULL,'2017-11-08 09:42:10','2017-11-08 09:42:10'),(68,10,'2017-11-08 11:47:08','0000-00-00 00:00:00',NULL,'2017-11-08 11:47:08','2017-11-08 11:47:08'),(69,2,'2017-11-08 15:09:53','0000-00-00 00:00:00',NULL,'2017-11-08 15:09:53','2017-11-08 15:09:53'),(70,1,'2017-11-08 15:30:09','2017-11-08 15:30:12',NULL,'2017-11-08 15:30:09','2017-11-08 15:30:12'),(71,2,'2017-11-08 15:30:48','2017-11-08 15:31:42',NULL,'2017-11-08 15:30:48','2017-11-08 15:31:42'),(72,9,'2017-11-08 16:12:07','0000-00-00 00:00:00',NULL,'2017-11-08 16:12:07','2017-11-08 16:12:07'),(73,2,'2017-11-08 16:19:06','2017-11-08 16:26:39',NULL,'2017-11-08 16:19:06','2017-11-08 16:26:39'),(74,9,'2017-11-08 16:35:04','0000-00-00 00:00:00',NULL,'2017-11-08 16:35:04','2017-11-08 16:35:04'),(75,2,'2017-11-08 18:49:55','0000-00-00 00:00:00',NULL,'2017-11-08 18:49:55','2017-11-08 18:49:55'),(76,9,'2017-11-08 18:52:49','2017-11-08 18:53:59',NULL,'2017-11-08 18:52:49','2017-11-08 18:53:59'),(77,23,'2017-11-08 18:54:13','0000-00-00 00:00:00',NULL,'2017-11-08 18:54:13','2017-11-08 18:54:13'),(78,1,'2017-11-08 23:11:06','0000-00-00 00:00:00',NULL,'2017-11-08 23:11:06','2017-11-08 23:11:06'),(79,1,'2017-11-09 00:19:36','2017-11-09 00:21:12',NULL,'2017-11-09 00:19:36','2017-11-09 00:21:12'),(80,9,'2017-11-09 00:21:16','2017-11-09 00:23:00',NULL,'2017-11-09 00:21:16','2017-11-09 00:23:00'),(81,1,'2017-11-09 00:23:04','0000-00-00 00:00:00',NULL,'2017-11-09 00:23:04','2017-11-09 00:23:04'),(82,1,'2017-11-09 00:34:09','0000-00-00 00:00:00',NULL,'2017-11-09 00:34:09','2017-11-09 00:34:09'),(83,1,'2017-11-09 09:43:37','2017-11-09 09:44:13',NULL,'2017-11-09 09:43:37','2017-11-09 09:44:13'),(84,2,'2017-11-09 10:18:00','0000-00-00 00:00:00',NULL,'2017-11-09 10:18:00','2017-11-09 10:18:00'),(85,9,'2017-11-09 10:21:21','2017-11-09 10:28:24',NULL,'2017-11-09 10:21:21','2017-11-09 10:28:24'),(86,9,'2017-11-09 10:28:55','2017-11-09 12:19:19',NULL,'2017-11-09 10:28:55','2017-11-09 12:19:19'),(87,9,'2017-11-09 10:34:19','0000-00-00 00:00:00',NULL,'2017-11-09 10:34:19','2017-11-09 10:34:19'),(88,9,'2017-11-09 10:48:58','0000-00-00 00:00:00',NULL,'2017-11-09 10:48:58','2017-11-09 10:48:58'),(89,14,'2017-11-09 10:58:37','0000-00-00 00:00:00',NULL,'2017-11-09 10:58:37','2017-11-09 10:58:37'),(90,1,'2017-11-09 11:26:37','2017-11-09 11:29:56',NULL,'2017-11-09 11:26:37','2017-11-09 11:29:56'),(91,9,'2017-11-09 11:30:04','2017-11-09 11:30:54',NULL,'2017-11-09 11:30:04','2017-11-09 11:30:54'),(92,1,'2017-11-09 11:30:58','2017-11-09 11:32:37',NULL,'2017-11-09 11:30:58','2017-11-09 11:32:37'),(93,9,'2017-11-09 11:32:42','2017-11-09 11:33:30',NULL,'2017-11-09 11:32:42','2017-11-09 11:33:30'),(94,1,'2017-11-09 11:33:34','2017-11-09 11:37:28',NULL,'2017-11-09 11:33:34','2017-11-09 11:37:28'),(95,9,'2017-11-09 11:37:34','0000-00-00 00:00:00',NULL,'2017-11-09 11:37:34','2017-11-09 11:37:34'),(96,2,'2017-11-09 12:19:25','0000-00-00 00:00:00',NULL,'2017-11-09 12:19:25','2017-11-09 12:19:25'),(97,9,'2017-11-09 14:44:28','2017-11-09 14:45:35',NULL,'2017-11-09 14:44:28','2017-11-09 14:45:35'),(98,1,'2017-11-09 14:45:38','2017-11-09 14:48:10',NULL,'2017-11-09 14:45:38','2017-11-09 14:48:10'),(99,9,'2017-11-09 14:48:16','2017-11-09 14:50:36',NULL,'2017-11-09 14:48:16','2017-11-09 14:50:36'),(100,1,'2017-11-09 14:50:41','0000-00-00 00:00:00',NULL,'2017-11-09 14:50:41','2017-11-09 14:50:41'),(101,9,'2017-11-09 15:17:29','0000-00-00 00:00:00',NULL,'2017-11-09 15:17:29','2017-11-09 15:17:29'),(102,1,'2017-11-09 16:05:43','2017-11-09 16:06:02',NULL,'2017-11-09 16:05:43','2017-11-09 16:06:02'),(103,9,'2017-11-09 16:06:07','0000-00-00 00:00:00',NULL,'2017-11-09 16:06:07','2017-11-09 16:06:07'),(104,9,'2017-11-09 17:26:15','2017-11-09 17:33:30',NULL,'2017-11-09 17:26:15','2017-11-09 17:33:30'),(105,1,'2017-11-09 17:33:34','2017-11-09 17:33:41',NULL,'2017-11-09 17:33:34','2017-11-09 17:33:41'),(106,2,'2017-11-09 17:33:45','2017-11-09 17:33:55',NULL,'2017-11-09 17:33:45','2017-11-09 17:33:55'),(107,2,'2017-11-09 17:34:00','0000-00-00 00:00:00',NULL,'2017-11-09 17:34:00','2017-11-09 17:34:00'),(108,9,'2017-11-09 20:03:20','2017-11-09 22:06:30',NULL,'2017-11-09 20:03:20','2017-11-09 22:06:30'),(109,2,'2017-11-09 22:06:36','0000-00-00 00:00:00',NULL,'2017-11-09 22:06:36','2017-11-09 22:06:36'),(110,9,'2017-11-10 00:26:25','0000-00-00 00:00:00',NULL,'2017-11-10 00:26:25','2017-11-10 00:26:25'),(111,9,'2017-11-10 09:45:07','2017-11-10 11:25:08',NULL,'2017-11-10 09:45:07','2017-11-10 11:25:08'),(112,9,'2017-11-10 10:35:05','0000-00-00 00:00:00',NULL,'2017-11-10 10:35:05','2017-11-10 10:35:05'),(113,9,'2017-11-10 11:26:07','0000-00-00 00:00:00',NULL,'2017-11-10 11:26:07','2017-11-10 11:26:07'),(114,9,'2017-11-10 11:26:25','0000-00-00 00:00:00',NULL,'2017-11-10 11:26:25','2017-11-10 11:26:25'),(115,9,'2017-11-10 12:06:51','2017-11-10 12:09:22',NULL,'2017-11-10 12:06:51','2017-11-10 12:09:22'),(116,9,'2017-11-10 12:10:01','0000-00-00 00:00:00',NULL,'2017-11-10 12:10:01','2017-11-10 12:10:01'),(117,9,'2017-11-10 12:12:51','0000-00-00 00:00:00',NULL,'2017-11-10 12:12:51','2017-11-10 12:12:51'),(118,9,'2017-11-10 14:55:35','0000-00-00 00:00:00',NULL,'2017-11-10 14:55:35','2017-11-10 14:55:35'),(119,2,'2017-11-10 21:19:52','2017-11-10 22:40:03',NULL,'2017-11-10 21:19:52','2017-11-10 22:40:03'),(120,10,'2017-11-10 21:21:35','0000-00-00 00:00:00',NULL,'2017-11-10 21:21:35','2017-11-10 21:21:35'),(121,2,'2017-11-10 23:08:21','0000-00-00 00:00:00',NULL,'2017-11-10 23:08:21','2017-11-10 23:08:21'),(122,2,'2017-11-11 10:36:58','2017-11-11 10:58:52',NULL,'2017-11-11 10:36:58','2017-11-11 10:58:52'),(123,10,'2017-11-11 10:59:08','0000-00-00 00:00:00',NULL,'2017-11-11 10:59:08','2017-11-11 10:59:08'),(124,10,'2017-11-11 21:34:12','0000-00-00 00:00:00',NULL,'2017-11-11 21:34:12','2017-11-11 21:34:12'),(125,9,'2017-11-12 01:01:05','0000-00-00 00:00:00',NULL,'2017-11-12 01:01:05','2017-11-12 01:01:05'),(126,10,'2017-11-12 13:36:44','2017-11-12 18:27:31',NULL,'2017-11-12 13:36:44','2017-11-12 18:27:31'),(127,2,'2017-11-12 18:27:38','2017-11-12 18:31:04',NULL,'2017-11-12 18:27:38','2017-11-12 18:31:04'),(128,2,'2017-11-12 18:31:40','2017-11-12 18:31:51',NULL,'2017-11-12 18:31:40','2017-11-12 18:31:51'),(129,23,'2017-11-12 18:35:18','0000-00-00 00:00:00',NULL,'2017-11-12 18:35:18','2017-11-12 18:35:18'),(130,1,'2017-11-12 19:11:46','2017-11-12 19:11:58',NULL,'2017-11-12 19:11:46','2017-11-12 19:11:58'),(131,9,'2017-11-12 19:16:53','2017-11-12 19:17:23',NULL,'2017-11-12 19:16:53','2017-11-12 19:17:23'),(132,1,'2017-11-12 19:17:30','2017-11-12 19:17:41',NULL,'2017-11-12 19:17:30','2017-11-12 19:17:41'),(133,9,'2017-11-12 19:17:45','0000-00-00 00:00:00',NULL,'2017-11-12 19:17:45','2017-11-12 19:17:45'),(134,23,'2017-11-12 19:18:23','2017-11-12 19:22:06',NULL,'2017-11-12 19:18:23','2017-11-12 19:22:06'),(135,23,'2017-11-12 19:23:01','0000-00-00 00:00:00',NULL,'2017-11-12 19:23:01','2017-11-12 19:23:01'),(136,23,'2017-11-12 21:41:58','2017-11-12 21:49:53',NULL,'2017-11-12 21:41:58','2017-11-12 21:49:53'),(137,1,'2017-11-12 21:50:03','2017-11-12 21:54:33',NULL,'2017-11-12 21:50:03','2017-11-12 21:54:33'),(138,23,'2017-11-12 21:54:53','0000-00-00 00:00:00',NULL,'2017-11-12 21:54:53','2017-11-12 21:54:53'),(139,1,'2017-11-13 11:22:56','2017-11-13 12:29:11',NULL,'2017-11-13 11:22:56','2017-11-13 12:29:11'),(140,10,'2017-11-13 12:29:15','2017-11-13 13:12:42',NULL,'2017-11-13 12:29:15','2017-11-13 13:12:42'),(141,1,'2017-11-13 12:29:17','2017-11-13 12:29:28',NULL,'2017-11-13 12:29:17','2017-11-13 12:29:28'),(142,9,'2017-11-13 12:30:36','0000-00-00 00:00:00',NULL,'2017-11-13 12:30:36','2017-11-13 12:30:36'),(143,2,'2017-11-13 13:12:48','0000-00-00 00:00:00',NULL,'2017-11-13 13:12:48','2017-11-13 13:12:48'),(144,10,'2017-11-13 15:59:57','2017-11-13 16:03:54',NULL,'2017-11-13 15:59:57','2017-11-13 16:03:54'),(145,2,'2017-11-13 16:03:59','2017-11-13 16:27:38',NULL,'2017-11-13 16:03:59','2017-11-13 16:27:38'),(146,10,'2017-11-13 16:27:48','0000-00-00 00:00:00',NULL,'2017-11-13 16:27:48','2017-11-13 16:27:48'),(147,2,'2017-11-13 17:51:24','0000-00-00 00:00:00',NULL,'2017-11-13 17:51:24','2017-11-13 17:51:24'),(148,2,'2017-11-13 18:54:40','2017-11-13 19:01:15',NULL,'2017-11-13 18:54:40','2017-11-13 19:01:15'),(149,10,'2017-11-13 19:01:17','2017-11-13 19:05:00',NULL,'2017-11-13 19:01:17','2017-11-13 19:05:00'),(150,2,'2017-11-13 19:05:06','2017-11-13 19:08:37',NULL,'2017-11-13 19:05:06','2017-11-13 19:08:37'),(151,10,'2017-11-13 19:08:40','0000-00-00 00:00:00',NULL,'2017-11-13 19:08:40','2017-11-13 19:08:40'),(152,10,'2017-11-13 22:00:34','0000-00-00 00:00:00',NULL,'2017-11-13 22:00:34','2017-11-13 22:00:34'),(153,1,'2017-11-14 00:09:18','2017-11-14 00:10:49',NULL,'2017-11-14 00:09:18','2017-11-14 00:10:49'),(154,9,'2017-11-14 00:10:56','0000-00-00 00:00:00',NULL,'2017-11-14 00:10:56','2017-11-14 00:10:56'),(155,1,'2017-11-14 03:41:14','0000-00-00 00:00:00',NULL,'2017-11-14 03:41:14','2017-11-14 03:41:14'),(156,2,'2017-11-14 08:24:44','2017-11-14 08:35:06',NULL,'2017-11-14 08:24:44','2017-11-14 08:35:06'),(157,10,'2017-11-14 08:35:09','2017-11-14 11:56:06',NULL,'2017-11-14 08:35:09','2017-11-14 11:56:06'),(158,9,'2017-11-14 11:15:18','2017-11-14 11:15:26',NULL,'2017-11-14 11:15:18','2017-11-14 11:15:26'),(159,1,'2017-11-14 11:15:30','0000-00-00 00:00:00',NULL,'2017-11-14 11:15:30','2017-11-14 11:15:30'),(160,2,'2017-11-14 11:56:12','2017-11-14 12:27:06',NULL,'2017-11-14 11:56:12','2017-11-14 12:27:06'),(161,10,'2017-11-14 12:27:08','2017-11-14 13:22:48',NULL,'2017-11-14 12:27:08','2017-11-14 13:22:48'),(162,2,'2017-11-14 13:22:55','0000-00-00 00:00:00',NULL,'2017-11-14 13:22:55','2017-11-14 13:22:55'),(163,9,'2017-11-14 13:26:17','2017-11-14 13:35:32',NULL,'2017-11-14 13:26:17','2017-11-14 13:35:32'),(164,10,'2017-11-14 13:26:29','2017-11-14 13:28:58',NULL,'2017-11-14 13:26:29','2017-11-14 13:28:58'),(165,2,'2017-11-14 13:29:03','2017-11-14 13:29:32',NULL,'2017-11-14 13:29:03','2017-11-14 13:29:32'),(166,10,'2017-11-14 13:29:33','2017-11-14 13:34:54',NULL,'2017-11-14 13:29:33','2017-11-14 13:34:54'),(167,10,'2017-11-14 13:35:06','2017-11-14 13:35:42',NULL,'2017-11-14 13:35:06','2017-11-14 13:35:42'),(168,10,'2017-11-14 13:35:38','2017-11-14 14:45:35',NULL,'2017-11-14 13:35:38','2017-11-14 14:45:35'),(169,2,'2017-11-14 13:35:51','2017-11-14 13:46:21',NULL,'2017-11-14 13:35:51','2017-11-14 13:46:21'),(170,10,'2017-11-14 13:46:23','2017-11-14 13:50:43',NULL,'2017-11-14 13:46:23','2017-11-14 13:50:43'),(171,10,'2017-11-14 13:51:10','2017-11-14 13:55:13',NULL,'2017-11-14 13:51:10','2017-11-14 13:55:13'),(172,2,'2017-11-14 13:55:19','2017-11-14 14:01:30',NULL,'2017-11-14 13:55:19','2017-11-14 14:01:30'),(173,10,'2017-11-14 14:04:50','2017-11-14 14:07:08',NULL,'2017-11-14 14:04:50','2017-11-14 14:07:08'),(174,2,'2017-11-14 14:07:14','0000-00-00 00:00:00',NULL,'2017-11-14 14:07:14','2017-11-14 14:07:14'),(175,1,'2017-11-14 14:45:39','0000-00-00 00:00:00',NULL,'2017-11-14 14:45:39','2017-11-14 14:45:39'),(176,10,'2017-11-14 15:18:18','2017-11-14 16:32:24',NULL,'2017-11-14 15:18:18','2017-11-14 16:32:24'),(177,2,'2017-11-14 16:32:31','2017-11-14 16:33:48',NULL,'2017-11-14 16:32:31','2017-11-14 16:33:48'),(178,10,'2017-11-14 16:33:51','2017-11-14 16:59:01',NULL,'2017-11-14 16:33:51','2017-11-14 16:59:01'),(179,1,'2017-11-14 16:55:42','2017-11-14 16:55:57',NULL,'2017-11-14 16:55:42','2017-11-14 16:55:57'),(180,9,'2017-11-14 16:56:02','2017-11-14 17:01:56',NULL,'2017-11-14 16:56:02','2017-11-14 17:01:56'),(181,2,'2017-11-14 16:59:07','2017-11-14 17:39:15',NULL,'2017-11-14 16:59:07','2017-11-14 17:39:15'),(182,1,'2017-11-14 17:02:19','0000-00-00 00:00:00',NULL,'2017-11-14 17:02:19','2017-11-14 17:02:19'),(183,10,'2017-11-14 17:39:17','2017-11-14 18:38:55',NULL,'2017-11-14 17:39:17','2017-11-14 18:38:55'),(184,10,'2017-11-14 18:40:49','0000-00-00 00:00:00',NULL,'2017-11-14 18:40:49','2017-11-14 18:40:49'),(185,9,'2017-11-14 21:28:29','0000-00-00 00:00:00',NULL,'2017-11-14 21:28:29','2017-11-14 21:28:29'),(186,9,'2017-11-15 02:00:10','0000-00-00 00:00:00',NULL,'2017-11-15 02:00:10','2017-11-15 02:00:10'),(187,9,'2017-11-15 03:44:11','2017-11-15 03:44:50',NULL,'2017-11-15 03:44:11','2017-11-15 03:44:50'),(188,1,'2017-11-15 03:44:54','0000-00-00 00:00:00',NULL,'2017-11-15 03:44:54','2017-11-15 03:44:54'),(189,1,'2017-11-15 03:56:08','0000-00-00 00:00:00',NULL,'2017-11-15 03:56:08','2017-11-15 03:56:08'),(190,10,'2017-11-15 10:16:48','2017-11-15 10:17:45',NULL,'2017-11-15 10:16:48','2017-11-15 10:17:45'),(191,2,'2017-11-15 10:17:51','2017-11-15 12:26:50',NULL,'2017-11-15 10:17:51','2017-11-15 12:26:50'),(192,1,'2017-11-15 10:26:45','0000-00-00 00:00:00',NULL,'2017-11-15 10:26:45','2017-11-15 10:26:45'),(193,10,'2017-11-15 12:26:53','2017-11-15 16:12:56',NULL,'2017-11-15 12:26:53','2017-11-15 16:12:56'),(194,1,'2017-11-15 14:35:44','0000-00-00 00:00:00',NULL,'2017-11-15 14:35:44','2017-11-15 14:35:44'),(195,9,'2017-11-15 15:14:48','0000-00-00 00:00:00',NULL,'2017-11-15 15:14:48','2017-11-15 15:14:48'),(196,10,'2017-11-15 16:13:05','2017-11-15 16:18:27',NULL,'2017-11-15 16:13:05','2017-11-15 16:18:27'),(197,9,'2017-11-15 16:16:55','2017-11-15 16:19:05',NULL,'2017-11-15 16:16:55','2017-11-15 16:19:05'),(198,10,'2017-11-15 16:19:09','2017-11-15 16:27:09',NULL,'2017-11-15 16:19:09','2017-11-15 16:27:09'),(199,1,'2017-11-15 16:27:14','2017-11-15 16:27:50',NULL,'2017-11-15 16:27:14','2017-11-15 16:27:50'),(200,10,'2017-11-15 16:27:57','0000-00-00 00:00:00',NULL,'2017-11-15 16:27:57','2017-11-15 16:27:57'),(201,10,'2017-11-15 17:38:47','2017-11-15 17:40:04',NULL,'2017-11-15 17:38:47','2017-11-15 17:40:04'),(202,10,'2017-11-15 22:52:18','0000-00-00 00:00:00',NULL,'2017-11-15 22:52:18','2017-11-15 22:52:18'),(203,10,'2017-11-16 10:28:30','0000-00-00 00:00:00',NULL,'2017-11-16 10:28:30','2017-11-16 10:28:30'),(204,9,'2017-11-16 12:32:11','0000-00-00 00:00:00',NULL,'2017-11-16 12:32:11','2017-11-16 12:32:11'),(205,10,'2017-11-16 14:31:56','0000-00-00 00:00:00',NULL,'2017-11-16 14:31:56','2017-11-16 14:31:56'),(206,9,'2017-11-16 14:47:41','2017-11-16 14:49:11',NULL,'2017-11-16 14:47:41','2017-11-16 14:49:11'),(207,10,'2017-11-16 14:49:15','0000-00-00 00:00:00',NULL,'2017-11-16 14:49:15','2017-11-16 14:49:15'),(208,10,'2017-11-20 10:38:11','0000-00-00 00:00:00',NULL,'2017-11-20 10:38:11','2017-11-20 10:38:11'),(209,1,'2017-11-21 15:34:47','2017-11-21 15:41:07',NULL,'2017-11-21 15:34:47','2017-11-21 15:41:07'),(210,10,'2017-11-21 15:35:10','2017-11-21 15:35:33',NULL,'2017-11-21 15:35:10','2017-11-21 15:35:33'),(211,2,'2017-11-23 10:19:05','0000-00-00 00:00:00',NULL,'2017-11-23 10:19:05','2017-11-23 10:19:05'),(212,10,'2017-11-23 10:24:37','2017-11-23 10:26:07',NULL,'2017-11-23 10:24:37','2017-11-23 10:26:07'),(213,9,'2017-11-23 10:32:49','2017-11-23 10:35:09',NULL,'2017-11-23 10:32:49','2017-11-23 10:35:09'),(214,10,'2017-11-23 10:35:41','2017-11-23 11:14:19',NULL,'2017-11-23 10:35:41','2017-11-23 11:14:19'),(215,9,'2017-11-23 10:36:53','2017-11-23 10:37:14',NULL,'2017-11-23 10:36:53','2017-11-23 10:37:14'),(216,10,'2017-11-23 10:37:22','2017-11-23 14:52:41',NULL,'2017-11-23 10:37:22','2017-11-23 14:52:41'),(217,2,'2017-11-23 11:14:23','2017-11-23 11:27:18',NULL,'2017-11-23 11:14:23','2017-11-23 11:27:18'),(218,10,'2017-11-23 11:27:21','2017-11-23 12:32:17',NULL,'2017-11-23 11:27:21','2017-11-23 12:32:17'),(219,2,'2017-11-23 12:32:25','2017-11-23 14:13:45',NULL,'2017-11-23 12:32:25','2017-11-23 14:13:45'),(220,10,'2017-11-23 14:13:47','2017-11-23 14:49:55',NULL,'2017-11-23 14:13:47','2017-11-23 14:49:55'),(221,2,'2017-11-23 14:50:05','2017-11-23 15:51:24',NULL,'2017-11-23 14:50:05','2017-11-23 15:51:24'),(222,1,'2017-11-23 14:53:29','0000-00-00 00:00:00',NULL,'2017-11-23 14:53:29','2017-11-23 14:53:29'),(223,1,'2017-11-23 15:51:33','2017-11-23 16:09:03',NULL,'2017-11-23 15:51:33','2017-11-23 16:09:03'),(224,9,'2017-11-23 16:08:07','0000-00-00 00:00:00',NULL,'2017-11-23 16:08:07','2017-11-23 16:08:07'),(225,10,'2017-11-23 16:09:05','0000-00-00 00:00:00',NULL,'2017-11-23 16:09:05','2017-11-23 16:09:05'),(226,2,'2017-11-24 09:57:44','0000-00-00 00:00:00',NULL,'2017-11-24 09:57:44','2017-11-24 09:57:44'),(227,2,'2017-11-24 10:00:14','0000-00-00 00:00:00',NULL,'2017-11-24 10:00:14','2017-11-24 10:00:14'),(228,10,'2017-11-24 10:03:27','0000-00-00 00:00:00',NULL,'2017-11-24 10:03:27','2017-11-24 10:03:27'),(229,21,'2017-11-24 10:14:29','0000-00-00 00:00:00',NULL,'2017-11-24 10:14:29','2017-11-24 10:14:29'),(230,1,'2017-11-24 10:15:00','2017-11-24 16:26:51',NULL,'2017-11-24 10:15:00','2017-11-24 16:26:51'),(231,14,'2017-11-24 10:15:12','0000-00-00 00:00:00',NULL,'2017-11-24 10:15:12','2017-11-24 10:15:12'),(232,2,'2017-11-24 10:34:55','2017-11-24 10:48:59',NULL,'2017-11-24 10:34:55','2017-11-24 10:48:59'),(233,25,'2017-11-24 10:40:29','2017-11-24 11:29:02',NULL,'2017-11-24 10:40:29','2017-11-24 11:29:02'),(234,21,'2017-11-24 10:49:24','0000-00-00 00:00:00',NULL,'2017-11-24 10:49:24','2017-11-24 10:49:24'),(235,2,'2017-11-24 11:30:07','2017-11-24 11:31:23',NULL,'2017-11-24 11:30:07','2017-11-24 11:31:23'),(236,26,'2017-11-24 11:31:49','2017-11-24 11:39:56',NULL,'2017-11-24 11:31:49','2017-11-24 11:39:56'),(237,2,'2017-11-24 11:40:04','0000-00-00 00:00:00',NULL,'2017-11-24 11:40:04','2017-11-24 11:40:04'),(238,10,'2017-11-24 15:02:24','0000-00-00 00:00:00',NULL,'2017-11-24 15:02:24','2017-11-24 15:02:24'),(239,9,'2017-11-24 16:26:57','0000-00-00 00:00:00',NULL,'2017-11-24 16:26:57','2017-11-24 16:26:57'),(240,10,'2017-11-28 11:04:19','0000-00-00 00:00:00',NULL,'2017-11-28 11:04:19','2017-11-28 11:04:19'),(241,10,'2017-11-29 10:42:40','0000-00-00 00:00:00',NULL,'2017-11-29 10:42:40','2017-11-29 10:42:40'),(242,27,'2017-11-29 15:50:50','2017-11-29 15:55:44',NULL,'2017-11-29 15:50:50','2017-11-29 15:55:44'),(243,27,'2017-11-29 15:58:45','2017-11-29 16:03:04',NULL,'2017-11-29 15:58:45','2017-11-29 16:03:04'),(244,10,'2017-11-29 16:03:28','2017-11-29 16:09:34',NULL,'2017-11-29 16:03:28','2017-11-29 16:09:34'),(245,27,'2017-11-29 16:09:42','2017-11-29 16:20:25',NULL,'2017-11-29 16:09:42','2017-11-29 16:20:25'),(246,10,'2017-11-29 16:20:30','0000-00-00 00:00:00',NULL,'2017-11-29 16:20:30','2017-11-29 16:20:30'),(247,10,'2017-11-30 10:44:55','0000-00-00 00:00:00',NULL,'2017-11-30 10:44:55','2017-11-30 10:44:55'),(248,10,'2017-11-30 12:06:34','0000-00-00 00:00:00',NULL,'2017-11-30 12:06:34','2017-11-30 12:06:34'),(249,10,'2017-11-30 13:43:38','0000-00-00 00:00:00',NULL,'2017-11-30 13:43:38','2017-11-30 13:43:38'),(250,10,'2017-12-04 09:25:24','2017-12-04 09:53:55',NULL,'2017-12-04 09:25:24','2017-12-04 09:53:55'),(251,9,'2017-12-04 09:50:58','0000-00-00 00:00:00',NULL,'2017-12-04 09:50:58','2017-12-04 09:50:58'),(252,2,'2017-12-04 09:54:02','0000-00-00 00:00:00',NULL,'2017-12-04 09:54:02','2017-12-04 09:54:02'),(253,9,'2017-12-04 14:45:22','0000-00-00 00:00:00',NULL,'2017-12-04 14:45:22','2017-12-04 14:45:22'),(254,9,'2017-12-04 14:53:30','0000-00-00 00:00:00',NULL,'2017-12-04 14:53:30','2017-12-04 14:53:30'),(255,10,'2017-12-04 23:18:36','0000-00-00 00:00:00',NULL,'2017-12-04 23:18:36','2017-12-04 23:18:36'),(256,9,'2017-12-11 17:19:21','2017-12-11 17:19:29',NULL,'2017-12-11 17:19:21','2017-12-11 17:19:29'),(257,10,'2017-12-11 17:21:25','0000-00-00 00:00:00',NULL,'2017-12-11 17:21:25','2017-12-11 17:21:25'),(258,9,'2017-12-12 14:40:59','0000-00-00 00:00:00',NULL,'2017-12-12 14:40:59','2017-12-12 14:40:59'),(259,9,'2017-12-12 16:39:48','0000-00-00 00:00:00',NULL,'2017-12-12 16:39:48','2017-12-12 16:39:48'),(260,1,'2017-12-13 11:43:37','2017-12-13 11:44:57',NULL,'2017-12-13 11:43:37','2017-12-13 11:44:57'),(261,10,'2017-12-13 11:45:02','0000-00-00 00:00:00',NULL,'2017-12-13 11:45:02','2017-12-13 11:45:02'),(262,1,'2017-12-13 11:46:00','0000-00-00 00:00:00',NULL,'2017-12-13 11:46:00','2017-12-13 11:46:00'),(263,10,'2017-12-13 15:51:47','0000-00-00 00:00:00',NULL,'2017-12-13 15:51:47','2017-12-13 15:51:47'),(264,2,'2017-12-13 16:19:14','0000-00-00 00:00:00',NULL,'2017-12-13 16:19:14','2017-12-13 16:19:14'),(265,1,'2017-12-13 16:19:56','2017-12-13 16:35:18',NULL,'2017-12-13 16:19:56','2017-12-13 16:35:18'),(266,1,'2017-12-13 16:35:28','2017-12-13 16:35:53',NULL,'2017-12-13 16:35:28','2017-12-13 16:35:53'),(267,1,'2017-12-14 09:46:03','0000-00-00 00:00:00',NULL,'2017-12-14 09:46:03','2017-12-14 09:46:03'),(268,10,'2017-12-14 14:01:00','2017-12-14 14:09:38',NULL,'2017-12-14 14:01:00','2017-12-14 14:09:38'),(269,2,'2017-12-14 14:09:45','0000-00-00 00:00:00',NULL,'2017-12-14 14:09:45','2017-12-14 14:09:45'),(270,9,'2017-12-14 16:20:45','0000-00-00 00:00:00',NULL,'2017-12-14 16:20:45','2017-12-14 16:20:45'),(271,10,'2017-12-14 16:27:00','0000-00-00 00:00:00',NULL,'2017-12-14 16:27:00','2017-12-14 16:27:00'),(272,10,'2017-12-14 16:41:33','0000-00-00 00:00:00',NULL,'2017-12-14 16:41:33','2017-12-14 16:41:33'),(273,1,'2017-12-15 09:40:31','2017-12-15 10:21:38',NULL,'2017-12-15 09:40:31','2017-12-15 10:21:38'),(274,1,'2017-12-15 10:21:46','2017-12-15 13:09:40',NULL,'2017-12-15 10:21:46','2017-12-15 13:09:40'),(275,10,'2017-12-16 10:48:58','2017-12-16 10:52:16',NULL,'2017-12-16 10:48:58','2017-12-16 10:52:16'),(276,2,'2017-12-16 10:52:24','0000-00-00 00:00:00',NULL,'2017-12-16 10:52:24','2017-12-16 10:52:24'),(277,10,'2017-12-16 16:45:45','0000-00-00 00:00:00',NULL,'2017-12-16 16:45:45','2017-12-16 16:45:45'),(278,1,'2017-12-16 16:49:13','2017-12-16 16:50:58',NULL,'2017-12-16 16:49:13','2017-12-16 16:50:58'),(279,10,'2017-12-16 16:52:31','0000-00-00 00:00:00',NULL,'2017-12-16 16:52:31','2017-12-16 16:52:31'),(280,10,'2017-12-17 16:23:32','0000-00-00 00:00:00',NULL,'2017-12-17 16:23:32','2017-12-17 16:23:32'),(281,2,'2017-12-17 17:38:01','2017-12-17 17:39:42',NULL,'2017-12-17 17:38:01','2017-12-17 17:39:42'),(282,23,'2017-12-17 17:40:46','2017-12-17 17:54:05',NULL,'2017-12-17 17:40:46','2017-12-17 17:54:05'),(283,2,'2017-12-17 17:54:11','2017-12-17 18:01:36',NULL,'2017-12-17 17:54:11','2017-12-17 18:01:36'),(284,23,'2017-12-17 18:01:57','2017-12-17 18:02:16',NULL,'2017-12-17 18:01:57','2017-12-17 18:02:16'),(285,2,'2017-12-17 18:02:21','2017-12-17 18:02:46',NULL,'2017-12-17 18:02:21','2017-12-17 18:02:46'),(286,23,'2017-12-17 18:02:58','2017-12-17 18:18:15',NULL,'2017-12-17 18:02:58','2017-12-17 18:18:15'),(287,2,'2017-12-17 18:18:22','0000-00-00 00:00:00',NULL,'2017-12-17 18:18:22','2017-12-17 18:18:22'),(288,10,'2017-12-18 06:28:20','0000-00-00 00:00:00',NULL,'2017-12-18 06:28:20','2017-12-18 06:28:20'),(289,10,'2017-12-18 07:41:15','2017-12-18 09:38:44',NULL,'2017-12-18 07:41:15','2017-12-18 09:38:44'),(290,10,'2017-12-18 09:27:44','2017-12-18 09:36:50',NULL,'2017-12-18 09:27:44','2017-12-18 09:36:50'),(291,1,'2017-12-18 09:38:50','0000-00-00 00:00:00',NULL,'2017-12-18 09:38:50','2017-12-18 09:38:50'),(292,1,'2017-12-18 09:47:40','2017-12-18 12:31:21',NULL,'2017-12-18 09:47:40','2017-12-18 12:31:21'),(293,1,'2017-12-18 10:48:06','0000-00-00 00:00:00',NULL,'2017-12-18 10:48:06','2017-12-18 10:48:06'),(294,1,'2017-12-18 12:30:05','2017-12-18 12:36:48',NULL,'2017-12-18 12:30:05','2017-12-18 12:36:48'),(295,10,'2017-12-18 12:31:23','2017-12-18 13:07:03',NULL,'2017-12-18 12:31:23','2017-12-18 13:07:03'),(296,9,'2017-12-18 12:36:54','2017-12-18 12:37:00',NULL,'2017-12-18 12:36:54','2017-12-18 12:37:00'),(297,10,'2017-12-18 12:37:56','2017-12-18 13:09:08',NULL,'2017-12-18 12:37:56','2017-12-18 13:09:08'),(298,2,'2017-12-18 13:07:11','2017-12-18 13:17:36',NULL,'2017-12-18 13:07:11','2017-12-18 13:17:36'),(299,1,'2017-12-18 13:09:17','2017-12-18 13:22:13',NULL,'2017-12-18 13:09:17','2017-12-18 13:22:13'),(300,10,'2017-12-18 13:17:38','0000-00-00 00:00:00',NULL,'2017-12-18 13:17:38','2017-12-18 13:17:38'),(301,10,'2017-12-18 13:26:01','0000-00-00 00:00:00',NULL,'2017-12-18 13:26:01','2017-12-18 13:26:01'),(302,10,'2017-12-18 13:30:02','2017-12-18 18:42:01',NULL,'2017-12-18 13:30:02','2017-12-18 18:42:01'),(303,9,'2017-12-18 16:20:49','0000-00-00 00:00:00',NULL,'2017-12-18 16:20:49','2017-12-18 16:20:49'),(304,2,'2017-12-18 18:42:09','2017-12-18 18:43:20',NULL,'2017-12-18 18:42:09','2017-12-18 18:43:20'),(305,10,'2017-12-18 18:43:22','0000-00-00 00:00:00',NULL,'2017-12-18 18:43:22','2017-12-18 18:43:22'),(306,10,'2017-12-18 20:05:48','2017-12-18 20:23:26',NULL,'2017-12-18 20:05:48','2017-12-18 20:23:26'),(307,10,'2017-12-18 20:09:54','2017-12-18 21:24:28',NULL,'2017-12-18 20:09:54','2017-12-18 21:24:28'),(308,2,'2017-12-18 20:23:41','0000-00-00 00:00:00',NULL,'2017-12-18 20:23:41','2017-12-18 20:23:41'),(309,2,'2017-12-18 21:24:37','2017-12-18 21:46:57',NULL,'2017-12-18 21:24:37','2017-12-18 21:46:57'),(310,10,'2017-12-18 21:46:59','0000-00-00 00:00:00',NULL,'2017-12-18 21:46:59','2017-12-18 21:46:59'),(311,9,'2017-12-19 12:11:29','2017-12-19 12:11:41',NULL,'2017-12-19 12:11:29','2017-12-19 12:11:41'),(312,10,'2017-12-19 12:13:58','0000-00-00 00:00:00',NULL,'2017-12-19 12:13:58','2017-12-19 12:13:58'),(313,2,'2017-12-19 12:40:20','0000-00-00 00:00:00',NULL,'2017-12-19 12:40:20','2017-12-19 12:40:20'),(314,10,'2017-12-19 12:41:54','0000-00-00 00:00:00',NULL,'2017-12-19 12:41:54','2017-12-19 12:41:54'),(315,10,'2017-12-19 13:44:59','2017-12-19 13:45:06',NULL,'2017-12-19 13:44:59','2017-12-19 13:45:06'),(316,1,'2017-12-19 13:45:11','2017-12-19 15:20:22',NULL,'2017-12-19 13:45:11','2017-12-19 15:20:22'),(317,10,'2017-12-19 15:20:32','2017-12-19 16:32:12',NULL,'2017-12-19 15:20:32','2017-12-19 16:32:12'),(318,1,'2017-12-19 16:32:16','0000-00-00 00:00:00',NULL,'2017-12-19 16:32:16','2017-12-19 16:32:16'),(319,10,'2017-12-19 17:32:15','2017-12-19 18:10:05',NULL,'2017-12-19 17:32:15','2017-12-19 18:10:05'),(320,2,'2017-12-19 18:10:12','0000-00-00 00:00:00',NULL,'2017-12-19 18:10:12','2017-12-19 18:10:12'),(321,10,'2017-12-19 21:58:56','2017-12-19 22:29:07',NULL,'2017-12-19 21:58:56','2017-12-19 22:29:07'),(322,1,'2017-12-19 22:29:13','2017-12-19 22:30:55',NULL,'2017-12-19 22:29:13','2017-12-19 22:30:55'),(323,10,'2017-12-19 22:31:44','0000-00-00 00:00:00',NULL,'2017-12-19 22:31:44','2017-12-19 22:31:44'),(324,9,'2017-12-19 23:45:53','0000-00-00 00:00:00',NULL,'2017-12-19 23:45:53','2017-12-19 23:45:53'),(325,1,'2017-12-20 09:24:14','2017-12-20 09:24:18',NULL,'2017-12-20 09:24:14','2017-12-20 09:24:18'),(326,10,'2017-12-20 09:24:50','2017-12-20 09:46:59',NULL,'2017-12-20 09:24:50','2017-12-20 09:46:59'),(327,1,'2017-12-20 09:47:03','0000-00-00 00:00:00',NULL,'2017-12-20 09:47:03','2017-12-20 09:47:03'),(328,10,'2017-12-20 10:46:09','2017-12-20 17:35:19',NULL,'2017-12-20 10:46:09','2017-12-20 17:35:19'),(329,10,'2017-12-20 14:00:42','0000-00-00 00:00:00',NULL,'2017-12-20 14:00:42','2017-12-20 14:00:42'),(330,9,'2017-12-20 15:09:17','0000-00-00 00:00:00',NULL,'2017-12-20 15:09:17','2017-12-20 15:09:17'),(331,10,'2017-12-20 17:35:30','0000-00-00 00:00:00',NULL,'2017-12-20 17:35:30','2017-12-20 17:35:30'),(332,10,'2017-12-20 17:48:49','0000-00-00 00:00:00',NULL,'2017-12-20 17:48:49','2017-12-20 17:48:49'),(333,10,'2017-12-20 18:47:15','0000-00-00 00:00:00',NULL,'2017-12-20 18:47:15','2017-12-20 18:47:15'),(334,10,'2017-12-20 21:09:44','2017-12-20 21:39:29',NULL,'2017-12-20 21:09:44','2017-12-20 21:39:29'),(335,2,'2017-12-20 21:39:35','2017-12-20 21:44:00',NULL,'2017-12-20 21:39:35','2017-12-20 21:44:00'),(336,9,'2017-12-20 21:40:34','2017-12-20 22:11:56',NULL,'2017-12-20 21:40:34','2017-12-20 22:11:56'),(337,10,'2017-12-20 21:45:30','0000-00-00 00:00:00',NULL,'2017-12-20 21:45:30','2017-12-20 21:45:30'),(338,10,'2017-12-20 22:12:04','0000-00-00 00:00:00',NULL,'2017-12-20 22:12:04','2017-12-20 22:12:04'),(339,10,'2017-12-21 17:03:15','2017-12-21 17:03:33',NULL,'2017-12-21 17:03:15','2017-12-21 17:03:33'),(340,23,'2017-12-21 17:12:54','2017-12-21 17:28:57',NULL,'2017-12-21 17:12:54','2017-12-21 17:28:57'),(341,1,'2017-12-21 17:29:10','0000-00-00 00:00:00',NULL,'2017-12-21 17:29:10','2017-12-21 17:29:10'),(342,23,'2017-12-21 17:29:44','0000-00-00 00:00:00',NULL,'2017-12-21 17:29:44','2017-12-21 17:29:44'),(343,23,'2017-12-21 20:33:02','2017-12-21 20:43:52',NULL,'2017-12-21 20:33:02','2017-12-21 20:43:52'),(344,1,'2017-12-21 20:44:17','2017-12-21 20:56:47',NULL,'2017-12-21 20:44:17','2017-12-21 20:56:47'),(345,9,'2017-12-21 20:56:53','2017-12-21 20:58:31',NULL,'2017-12-21 20:56:53','2017-12-21 20:58:31'),(346,1,'2017-12-21 20:58:37','2017-12-21 21:13:47',NULL,'2017-12-21 20:58:37','2017-12-21 21:13:47'),(347,23,'2017-12-21 21:13:58','2017-12-21 21:18:48',NULL,'2017-12-21 21:13:58','2017-12-21 21:18:48'),(348,1,'2017-12-21 21:18:55','2017-12-21 21:19:02',NULL,'2017-12-21 21:18:55','2017-12-21 21:19:02'),(349,2,'2017-12-21 23:38:08','2017-12-21 23:39:08',NULL,'2017-12-21 23:38:08','2017-12-21 23:39:08'),(350,10,'2017-12-21 23:39:21','0000-00-00 00:00:00',NULL,'2017-12-21 23:39:21','2017-12-21 23:39:21'),(351,23,'2017-12-22 08:27:44','2017-12-22 08:27:57',NULL,'2017-12-22 08:27:44','2017-12-22 08:27:57'),(352,18,'2017-12-22 08:28:09','2017-12-22 08:33:11',NULL,'2017-12-22 08:28:09','2017-12-22 08:33:11'),(353,2,'2017-12-22 08:33:19','2017-12-22 08:35:36',NULL,'2017-12-22 08:33:19','2017-12-22 08:35:36'),(354,1,'2017-12-22 08:35:41','2017-12-22 08:39:31',NULL,'2017-12-22 08:35:41','2017-12-22 08:39:31'),(355,10,'2017-12-22 08:39:34','2017-12-22 08:46:00',NULL,'2017-12-22 08:39:34','2017-12-22 08:46:00'),(356,1,'2017-12-22 08:42:39','2017-12-22 08:58:00',NULL,'2017-12-22 08:42:39','2017-12-22 08:58:00'),(357,1,'2017-12-22 08:46:11','2017-12-22 08:51:53',NULL,'2017-12-22 08:46:11','2017-12-22 08:51:53'),(358,18,'2017-12-22 08:47:09','2017-12-22 08:52:19',NULL,'2017-12-22 08:47:09','2017-12-22 08:52:19'),(359,18,'2017-12-22 08:52:04','2017-12-22 08:52:15',NULL,'2017-12-22 08:52:04','2017-12-22 08:52:15'),(360,10,'2017-12-22 08:52:49','2017-12-22 08:53:03',NULL,'2017-12-22 08:52:49','2017-12-22 08:53:03'),(361,1,'2017-12-22 08:53:09','0000-00-00 00:00:00',NULL,'2017-12-22 08:53:09','2017-12-22 08:53:09'),(362,10,'2017-12-22 08:58:10','2017-12-22 08:58:49',NULL,'2017-12-22 08:58:10','2017-12-22 08:58:49'),(363,1,'2017-12-22 08:58:55','2017-12-22 08:59:19',NULL,'2017-12-22 08:58:55','2017-12-22 08:59:19'),(364,10,'2017-12-22 08:59:27','2017-12-22 09:24:30',NULL,'2017-12-22 08:59:27','2017-12-22 09:24:30'),(365,10,'2017-12-22 09:00:33','2017-12-22 09:08:37',NULL,'2017-12-22 09:00:33','2017-12-22 09:08:37'),(366,23,'2017-12-22 09:08:41','0000-00-00 00:00:00',NULL,'2017-12-22 09:08:41','2017-12-22 09:08:41'),(367,1,'2017-12-22 09:24:35','2017-12-22 09:27:07',NULL,'2017-12-22 09:24:35','2017-12-22 09:27:07'),(368,9,'2017-12-22 09:27:13','2017-12-22 09:27:58',NULL,'2017-12-22 09:27:13','2017-12-22 09:27:58'),(369,1,'2017-12-22 09:28:03','0000-00-00 00:00:00',NULL,'2017-12-22 09:28:03','2017-12-22 09:28:03');
/*!40000 ALTER TABLE `user_access_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_locations`
--

DROP TABLE IF EXISTS `user_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_locations`
--

LOCK TABLES `user_locations` WRITE;
/*!40000 ALTER TABLE `user_locations` DISABLE KEYS */;
INSERT INTO `user_locations` VALUES (1,11,3,0,NULL,'2017-11-06 10:09:02','2017-11-06 10:09:02'),(2,12,3,6,NULL,'2017-11-06 10:10:33','2017-11-06 10:10:33'),(3,13,2,0,NULL,'2017-11-06 10:11:23','2017-11-06 10:11:23'),(4,15,2,0,NULL,'2017-11-06 10:15:11','2017-11-06 10:15:11'),(5,16,3,0,NULL,'2017-11-06 10:22:22','2017-11-06 10:22:22'),(6,18,2,2,NULL,'2017-11-06 15:14:57','2017-12-22 08:46:25'),(7,20,2,2,NULL,'2017-11-06 19:17:18','2017-11-06 19:17:18'),(8,23,2,0,NULL,'2017-11-08 18:51:28','2017-12-17 18:02:43'),(9,25,2,4,NULL,'2017-11-24 10:39:27','2017-11-24 10:39:27'),(10,26,3,6,NULL,'2017-11-24 11:31:15','2017-11-24 11:31:15'),(11,28,0,0,NULL,'2017-12-15 10:21:23','2017-12-15 10:21:23');
/*!40000 ALTER TABLE `user_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nokp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `citizen` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,'/avatars/cd896cdf261006c5412242a6e28a28cc.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:31','2017-11-05 15:38:31'),(2,2,'/avatars/68434eb21dca0b30fb1621b05764e7f4.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:35','2017-11-05 15:38:35'),(3,3,'/avatars/b43049917c2353a3724f26b936fc9288.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:37','2017-11-05 15:38:37'),(4,4,'/avatars/bdfd3f8c48c93b5f725fb969b5dea82e.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:38','2017-11-05 15:38:38'),(5,5,'/avatars/37531f32c14fdebb28dc70ee29b96bf6.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:39','2017-11-05 15:38:39'),(6,6,'/avatars/938e75f0ea9d6caf4e81de8c4c4a9f02.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:40','2017-11-05 15:38:40'),(7,7,'/avatars/12a6c066d6b419d592a6caa55741ebe1.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:41','2017-11-05 15:38:41'),(8,8,'/avatars/5732ed4594346c542fcdd68cc533fac9.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-05 15:38:41','2017-11-05 15:38:41'),(9,9,'','asd','','123','test','2','1','930603115071','930603115071','24','+60','123','','','1993-06-03 00:00:00','1','2017-11-05 15:42:04','2017-11-24 16:27:13'),(10,10,'','Test','','','','','','820621115411','820621115411','35','+60','122444442','','','1970-01-01 00:00:00','1','2017-11-06 09:22:23','2017-11-10 21:21:58'),(12,12,'/avatars/3b8de3ec65988cca337976d1d9137b85.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-06 10:10:33','2017-11-06 10:10:33'),(13,13,'/avatars/9a7c445488051bf02b43f1b46b2e6a98.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-06 10:11:23','2017-11-06 10:11:23'),(14,14,'','NO. 28, JALAN 3/12, SERDANG JAYA, 43300 SERI KEMBANGAN, SELANGOR DARUL EHSAN','','','','','','870911145649','870911145649','30','+60','132726771','','','1987-11-09 00:00:00','1','2017-11-06 10:14:12','2017-11-06 10:14:12'),(15,15,'/avatars/6a4d06c515ed64c1b740b8d66d758ad6.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-06 10:15:11','2017-11-06 10:15:11'),(16,16,'/avatars/1aedb8d9dc4751e229a335e371db8058.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-06 10:22:22','2017-11-06 10:22:22'),(17,17,'','jpsm sutan salahudin 51100 kl','','','','','','811009086082','811009086082','36','+60','0172131251','','','1981-09-10 00:00:00','1','2017-11-06 15:08:51','2017-11-06 15:08:51'),(18,18,'/avatars/921133fac5ca63320e65badd9f7bb86c.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-06 15:14:57','2017-11-06 15:14:57'),(19,19,'','sentul 51000 kuala lumpur','','','','','','811009145555','811009145555','36','+60','0172525255','','','1981-09-10 00:00:00','1','2017-11-06 15:16:03','2017-11-06 15:16:03'),(21,21,'','B-17-23, Apartment Vista Pinggiran,\r\nTaman Pinggiran Putra,\r\n43300 Seri Kembangan','','','','','','871123035179','871123035179','29','+60','128751518','','','1970-01-01 07:30:00','1','2017-11-07 10:24:31','2017-11-07 10:24:31'),(22,22,'','Jabatan Perhutanan Semenjung Malaysia,\r\nJalan  Sultan Salahuddin,\r\n50660 Kuala Lumpur','','','','','','850204025308','850204025308','32','+60','175118201','','','1985-04-02 00:00:00','1','2017-11-08 08:41:13','2017-11-08 08:41:13'),(23,23,'/avatars/f1d5b4d1d0f05c9de176405f954ebe3e.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-08 18:51:28','2017-11-08 18:51:28'),(24,24,'','sfsfs','','','','','','801101135555','801101135555','37','+60','13123125','','','1980-01-11 00:00:00','1','2017-11-12 00:53:51','2017-11-12 00:53:51'),(25,25,'/avatars/4405c6146898e9fedf1a2631babb98d7.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-24 10:39:27','2017-11-24 10:39:27'),(26,26,'/avatars/d1c5e2bc00af3cc982f9996f3adbef52.png','',NULL,'','','','',NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,'2017-11-24 11:31:15','2017-11-24 11:31:15'),(27,27,'','asdasd','','123123','Kuala Lumpur','3','130','930603115072','930603115072','24','+60','085','','','1993-03-06 00:00:00','1','2017-11-29 15:48:29','2017-11-29 15:48:29');
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Super','super','super@app.com','$2y$10$5L2Y3b5D96lAGogZ9tUWf.8uWBR5LS7qiL.GylGaHyrT3mMlWEjvK','1','0c4SEgQF0ib0TmYCQwvcpLsKhuJqqqILMsSYMNZ8OgteGcEorqdi9KsevAiX','2017-11-05 15:38:31','2017-12-22 09:22:02'),(2,'Admin','admin','admin@app.com','$2y$10$aHoNLZHLN1Odxt.us1bE1uPbKjY1txMNCmN7wz/2zRPX3gSrjS4C.','1','rXS7b7iq08Z9i7LfrQG4rmeaPKV4JRpfff3YruYGyHvyovZC8YvyFv4goBlb','2017-11-05 15:38:35','2017-11-05 15:38:35'),(3,'Officer','officer','officer@app.com','$2y$10$OBKCrbY0Xb1s7fl/WzjfOe.jMVnwRm94CfgMt/YJlL19R4DpWoNQm','1','3UhNS34YQy','2017-11-05 15:38:37','2017-11-05 15:38:37'),(4,'Customer','customer','customer@app.com','$2y$10$Oj7BMlYX3DIlXp9Ii8LL7O3OKfm63eFTu/IyGn9xFQfRSEVMnc4Nu','1','fpwP59T6SC','2017-11-05 15:38:38','2017-11-05 15:38:38'),(5,'Tester','tester','tester@app.com','$2y$10$Mmve44rLMgZ3s5x23O6BWuF0pL4UaUAwapLRXToGJfKn4bfLFMvB.','1','M2igNvIKQW','2017-11-05 15:38:39','2017-11-05 15:38:39'),(6,'Pemohon','pemohon','pemohon@app.com','$2y$10$zQoLP/Bgmv7JzAGm4.i.fu6h5q4rXXRz.bT/Y6pMi6g6Tn1vKLQVK','1','cZe40zf7Ma','2017-11-05 15:38:40','2017-11-05 15:38:40'),(7,'Jabatan Perhutanan Negeri','jabatan_perhutanan_negeri','jabatan_perhutanan_negeri@app.com','$2y$10$HUUZwn5KnxVFzsA3xx6RROwWYGQyCg8X07l4X3K.uLu3nxjCipgv6','1','nnADYDvTd5','2017-11-05 15:38:41','2017-11-05 15:38:41'),(8,'Pegawai Hutan Daerah','pegawai_hutan_daerah','pegawai_hutan_daerah@app.com','$2y$10$W8bako2mHmVCTnHRifFo0O1nBX.CTW81.KqSAqzKLvXGNOCNjqJI6','1','DP3vTQ9AyO','2017-11-05 15:38:41','2017-11-05 15:38:41'),(9,'Aris Munandar','930603115071','arismunandardev@gmail.com','$2y$10$CI8Wve1NAaSA3pJUhxb2lu.rGJqv2JRO5LDXiVt2zSLVGupuPkzqe','1','R6aQk1ZBfsKulpyANAbZ86cQfdmFQNrxTUIdRmFlHA3iWg4s5Q0gU40tRCLl','2017-11-05 15:42:04','2017-11-05 15:42:33'),(10,'Mohd Arizan Ali','820621115411','ikhwan5441@gmail.com','$2y$10$/bVNmTdu59jAOeObdU6iZej6StEi.OHfUzlUcg6WDQFuaQN5ozerm','1','tsvT2eH9xPfqyfWU6VafYMl3ix6Ey5dMvlZ42rJwuaxi13VuAkLI0xWSbLPj','2017-11-06 09:22:23','2017-11-10 21:21:58'),(12,'aminah bin abdullah','811002023333','ojie.1981@gmail.com','$2y$10$d1MknwHANDNSMZGsK0fBk.xgN0O5gLIkWvaeBETjMV1OHmnuoz.tO','1',NULL,'2017-11-06 10:10:33','2017-11-06 10:20:29'),(13,'123456','dewa','shahril.dewa@gmail.com','$2y$10$swdzhnM87B2oPmutVNqf.uUEi/rsSEvRQ6fq2BGylln1boTA./W7S','1',NULL,'2017-11-06 10:11:23','2017-11-06 10:11:23'),(14,'MUHAMMAD FIRDAUS BIN KHADLAN','870911145649','auskywalker_flickr@yahoo.com','$2y$10$VwvKF1LHYHYlKGAMIJ.KnuWtVQ.uDusdA23Iu7sdljsiV7dvteuNW','1',NULL,'2017-11-06 10:14:12','2017-11-07 10:57:09'),(15,'Aman A','710717105077','rahman_hutan@yahoo.com','$2y$10$fjVivswpnTVE9dCMHm9lReyzKPkQ.0abKJ0WwltvzAgEJRoVKl3aK','1',NULL,'2017-11-06 10:15:11','2017-11-06 10:25:21'),(16,'Ali bin abu','811023265556','test@gmail.com','$2y$10$2hgn3pYLbt8z4wEJUvaUK.eBo.MfCd.R8Woiip54.6/ZgKPF8lFPS','1',NULL,'2017-11-06 10:22:22','2017-11-06 10:22:22'),(17,'fauziah gaos','811009086082','fauziah@gmail.com','$2y$10$VVd/vt0.K2dXzvzsdWfuQOPs1TM8fP2qXXsvlqXm70/9JVl3vfAKa','0',NULL,'2017-11-06 15:08:51','2017-11-06 15:08:51'),(18,'PHD Sekayu','701010115515','ikhwan@mailinator.com','$2y$10$Z3Dos.hNay8Nj2vM49kblOUoTk21Ekn2vmohI0qBvggUW6oSqHhB2','1','um4UhiSabSDu8j31RyYQAUYun1Wg1eQiJu9wQuBYH5XaDouGvrxD5uN2eh60','2017-11-06 15:14:57','2017-11-06 15:14:57'),(19,'fauziah latiff','811009145555','fauziah@mailinator.com','$2y$10$VV39mq.T.GvPRbNCP.q7UOr3q0.PgevBikwnlILVNtSwwZNxMp3Um','1','8ackj8BU1wf3odkXlcsxMlgb5caPxftbEW2ROLtBIUydvlaGNcbPoCbIEJAI','2017-11-06 15:16:03','2017-11-06 15:16:20'),(21,'Shahril bin Mohamad','871123035179','shahrilmohamad@hotmail.com','$2y$10$61KM0HO98qN3r/yR12kX2.PsnUCgHSplK56n9mDqrLsVMSr2J8N3C','1','X9rshk3QbNwQLfuswL5xQxi7Wo1lxTurZxcb8kHm9KEYG4nRWGMraljZpbRy','2017-11-07 10:24:31','2017-11-24 10:13:13'),(22,'zaida binti zakaria','850204025308','zaida@forestry.gov.my','$2y$10$9It1zRenBH0wn60ehuWKvewi3hU0fKOhCdT5KqETxMwGGBHLyKHpq','0',NULL,'2017-11-08 08:41:13','2017-11-08 08:41:13'),(23,'Ikhwan','881205115411','ikhwan.zaini@aidan.my','$2y$10$xz2As1WO.qzp17Bk1.ir1e0c3b6xnA/5BMbXA24ROl7/ItdQVGmJq','1','uKsoLmAtnclwiV5SfTn3AWtAgw9sjUgGtrLPDSmPfALec1eqK5BAIh3Xadnc','2017-11-08 18:51:28','2017-12-21 17:13:09'),(24,'qweqweqwe','801101135555','av@gmail.com','$2y$10$z1ywLpZCQMUZU0162PJP6.gvJgMDaaqUiPS6fLiF7VG4TOkd0aRJa','0',NULL,'2017-11-12 00:53:51','2017-11-12 00:53:51'),(25,'Muhammad Firdaus Khadlan','874521015544','aus@mailinator.com','$2y$10$ejqMX.u2lXNa4mhORtfxyuwZiVh1Hjm21A2ipEQLgMPBYGsdN.mTm','1','a6SBZDv6kh6BIZFoH63kGiPL3z5wj4TB77jzbhQ3DsZDQidD8nFGCCPtSPjZ','2017-11-24 10:39:27','2017-11-24 10:39:27'),(26,'Pegawai Hutan Daerah Perak Selatan','871123123456','phdperakselatan@mailinator.com','$2y$10$vjaFbSh3ziFW.d7bPsM6NOJhSLpJJCG0YjP/VVwf3/QoNIrRJAyTe','1','ZbCmp47Lnrcaw7RFl6xBKXOUIkZeVs6I5uEbRTBjRrA4g1vuFR4EL7zRdT5m','2017-11-24 11:31:15','2017-11-24 11:31:15'),(27,'Aris Munandar','930603115072','contact@arisdev.id','$2y$10$x/lSBxdSHIpuFhrqyrlQ2u9nq4uLwDJNfRoO6ZbJk7LRLgAsLnF/y','1','EHzX2v8QLnM121uFfPB9f3LTrxcTnnnlYt64jZHrWiyMVBVKfftZXMOEPgC3','2017-11-29 15:48:29','2017-11-29 15:50:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-22  1:57:19
