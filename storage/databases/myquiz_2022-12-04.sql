# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.5-10.4.21-MariaDB)
# Database: myquiz
# Generation Time: 2022-12-04 21:25:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `correct` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_answers` (`question_id`),
  CONSTRAINT `question_answers` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;

INSERT INTO `answers` (`id`, `question_id`, `title`, `correct`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,1,'New York',b'0','2022-11-30 15:39:23',NULL,NULL),
	(2,1,'Miami',b'0','2022-11-30 15:39:23',NULL,NULL),
	(3,1,'Washington DC',b'1',NULL,NULL,NULL),
	(4,1,'Los Angeles',b'0','2022-11-30 15:39:23',NULL,NULL),
	(5,2,'27',b'0','2022-11-30 15:40:51',NULL,NULL),
	(6,2,'50',b'1','2022-11-30 15:42:15',NULL,NULL),
	(7,2,'17',b'0',NULL,NULL,NULL),
	(8,2,'51',b'0','2022-11-30 15:42:18',NULL,NULL),
	(9,3,'Sweden',b'0',NULL,NULL,NULL),
	(10,3,'Armenia',b'0',NULL,NULL,NULL),
	(11,3,'North Korea',b'1',NULL,NULL,NULL),
	(12,3,'Moldova',b'0','2022-11-30 15:44:34',NULL,NULL),
	(13,4,'Tunisia',b'1',NULL,NULL,NULL),
	(14,4,'Cyprus',b'0',NULL,NULL,NULL),
	(15,4,'Spain',b'0',NULL,NULL,NULL),
	(16,4,'Malta',b'0','2022-11-30 15:47:10',NULL,NULL);

/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'English',NULL,NULL,'2022-11-25 10:50:24',NULL,NULL),
	(2,'History',NULL,NULL,'2022-11-25 10:50:24',NULL,NULL),
	(3,'Geography',NULL,'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRrP0HtG15L8BtJqKCgWTQAPEb0hCc1IXjFXg&usqp=CAU','2022-11-25 11:13:04',NULL,NULL),
	(4,'Government',NULL,NULL,'2022-12-04 15:40:36',NULL,NULL),
	(5,'Music',NULL,NULL,'2022-11-25 10:50:24',NULL,NULL);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `category_id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,3,'What is the capital of the USA?',NULL,'2022-11-25 10:52:15',NULL,NULL),
	(2,3,'How many States inside of USA?',NULL,'2022-11-30 15:43:12',NULL,NULL),
	(3,3,'Which of these countries borders Russia?',NULL,'2022-11-30 15:48:44',NULL,NULL),
	(4,3,'Which of these countries is not European?',NULL,'2022-11-30 15:46:02',NULL,NULL);

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_answers`;

CREATE TABLE `user_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user_answers` WRITE;
/*!40000 ALTER TABLE `user_answers` DISABLE KEYS */;

INSERT INTO `user_answers` (`id`, `category_id`, `user_id`, `question_id`, `answer_id`, `is_correct`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(17,3,2,1,1,0,'2022-12-04 21:22:27','2022-12-04 21:22:27',NULL),
	(18,3,2,2,8,0,'2022-12-04 21:22:27','2022-12-04 21:22:27',NULL),
	(19,3,2,3,10,0,'2022-12-04 21:22:27','2022-12-04 21:22:27',NULL),
	(20,3,2,4,14,0,'2022-12-04 21:22:27','2022-12-04 21:22:27',NULL);

/*!40000 ALTER TABLE `user_answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'diyor','djabbarovdiyor@gmail.com',NULL,'$2y$10$RS0i3FmFyhXajHWSWnhxcO3AIODY/A4oqLbzW8Ta0EM.pv/ep/fW2',NULL,'2022-12-04 20:31:13','2022-12-04 20:31:13'),
	(2,'Jon Toshmatov','info@myitedu.us',NULL,'$2y$10$tmsTUuerKM/VdPU/zjIz0e0iH.UDpGgA48aj8gHZY5zXKHtvIh4y6',NULL,'2022-12-04 20:57:34','2022-12-04 20:57:34');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
