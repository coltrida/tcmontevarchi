-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: tcmontevarchi2
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_04_05_164159_create_prenotaziones_table',1),(5,'2020_04_05_170608_create_notizias_table',1),(6,'2020_04_05_170950_create_socios_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notizie`
--

DROP TABLE IF EXISTS `notizie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notizie` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titolo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `pubblica` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notizie`
--

LOCK TABLES `notizie` WRITE;
/*!40000 ALTER TABLE `notizie` DISABLE KEYS */;
/*!40000 ALTER TABLE `notizie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prenotazioni`
--

DROP TABLE IF EXISTS `prenotazioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prenotazioni` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `campo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dataprenotazione` date NOT NULL,
  `oraon` tinyint(4) NOT NULL,
  `doppio` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prenotazioni_dataprenotazione_campo_oraon_index` (`dataprenotazione`,`campo`,`oraon`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prenotazioni`
--

LOCK TABLES `prenotazioni` WRITE;
/*!40000 ALTER TABLE `prenotazioni` DISABLE KEYS */;
INSERT INTO `prenotazioni` VALUES (1,'Cataniaaaaaa',NULL,NULL,NULL,'campo1','2020-04-19',10,0,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(2,'Cataniaaaaaa','Coltrioliiiii',NULL,NULL,'campo2','2020-04-19',13,0,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(3,'Cataniaaaaaa','Coltrioliiiii',NULL,NULL,'campo2','2020-04-19',14,0,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(4,'Cataniaaaaaa','Cataniaaaaaa','Cataniaaaaaa',NULL,'campo3','2020-04-19',10,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(5,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii','Coltrioliiiii','campo4','2020-04-19',10,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(6,'Cataniaaaaaa','Cataniaaaaaa',NULL,NULL,'campo3','2020-04-19',15,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(7,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii','Coltrioliiiii','campo1','2020-04-19',11,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(8,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii','Coltrioliiiii','campo1','2020-04-19',12,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(9,'Cataniaaaaaa','Cataniaaaaaa',NULL,'Coltrioliiiii','campo4','2020-04-19',13,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(10,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii',NULL,'campo4','2020-04-19',14,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(11,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii',NULL,'campo4','2020-04-19',15,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(12,'Cataniaaaaaa','Cataniaaaaaa',NULL,NULL,'campo4','2020-04-19',16,0,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(13,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii',NULL,'campo4','2020-04-19',17,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(14,'Cataniaaaaaa','Cataniaaaaaa','Coltrioliiiii',NULL,'campo3','2020-04-19',18,1,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(15,'Cataniaaaaaa',NULL,'Coltrioliiiii',NULL,'campo1','2020-04-19',14,1,'2020-04-19 08:02:10','2020-04-19 08:02:10');
/*!40000 ALTER TABLE `prenotazioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soci`
--

DROP TABLE IF EXISTS `soci`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soci` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anno` year(4) NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ricaricato` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `soci_nome_cognome_anno_index` (`nome`,`cognome`,`anno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soci`
--

LOCK TABLES `soci` WRITE;
/*!40000 ALTER TABLE `soci` DISABLE KEYS */;
INSERT INTO `soci` VALUES (1,'Davide','Coltrioliiiii','cacao2',2000,'0',0,'2020-04-19 08:02:09','2020-04-19 08:02:09'),(2,'Marco','Cataniaaaaaa','cacao',2000,'1',0,'2020-04-19 08:02:09','2020-04-19 08:02:09'),(3,'cacao3','pippo3',NULL,2000,'2',0,'2020-04-19 08:02:09','2020-04-19 08:02:09'),(4,'admin','admin',NULL,2000,'3',0,'2020-04-19 08:02:09','2020-04-19 08:02:09');
/*!40000 ALTER TABLE `soci` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cognome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credito` double(8,2) NOT NULL DEFAULT '0.00',
  `amici` tinyint(1) NOT NULL DEFAULT '1',
  `anno` year(4) NOT NULL,
  `privilegi` int(11) NOT NULL DEFAULT '0',
  `certificato` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_nome_cognome_anno_index` (`nome`,`cognome`,`anno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Davide','Coltrioliiiii','cacao2','123456',0.00,1,2000,0,'2020-01-01','cacao@cacao.it',NULL,'$2y$10$wqftLIWWqLhevSY7S1S2y.rHUfhoAzWONTX3iZfXKIkKJwoRz5IrK',NULL,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(2,'Marco','Cataniaaaaaa','cacao','123456',0.00,1,2000,0,'2020-01-01','cacao2@cacao.it',NULL,'$2y$10$nJyiMBmH6xC.jKjKZ0d1Suc.fChlldBNTd95UXkMwqyQIiXhvWw5q',NULL,'2020-04-19 08:02:10','2020-04-19 08:02:10'),(3,'admin','admin','admin','123456',0.00,1,2000,7,'2020-01-01','admin@admin.it',NULL,'$2y$10$o7oGuoO9FjLgDosXN1apBuF8WRRsna.7TfBuTzu3Zn8mW6anOvCGW',NULL,'2020-04-19 08:02:10','2020-04-19 08:02:10');
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

-- Dump completed on 2020-04-19  9:36:08
