CREATE DATABASE  IF NOT EXISTS `bd-project-butterfly` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd-project-butterfly`;
-- MySQL dump 10.13  Distrib 5.7.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd-project-butterfly
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.24-MariaDB

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
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(45) NOT NULL,
  `number` varchar(45) NOT NULL,
  `cep` varchar(45) NOT NULL,
  `country` varchar(45) NOT NULL,
  `idUser` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `udate_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_addresses_users_idx` (`idUser`),
  CONSTRAINT `fk_addresses_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dtborn` DATE,
  `avatar` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `type` char(1) NOT NULL DEFAULT 'U',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Regis Brasil','regisbrasil@gmail.com','12345678', '2004/02/11', NULL, 'Rei da Quebrada', 'U' ,NULL, NULL),
                            (2,'Luis Roberto','roberto@gmail.com','32323232', '2004/02/11', NULL, 'robertin', 'U', NULL, NULL),
                            (3,'Van Gogh','arte@gmail.com','12344321', '2004/02/11', NULL, 'Gogh', 'U', NULL, NULL),
                            (4, 'Regis Bernardo A. Brasil', 're@gmail.com', '$2y$10$lrGIBWHjfuHTi3uH8KBCvuTTt41yCA.mrhf9lXXD.OQnRUC5hcABW', '2004/02/11', NULL, 'RegisWolf', 'U', NULL, NULL);
    
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workArt`
--

DROP TABLE IF EXISTS `workArt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `workArt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(64000),
  `info` varchar(255) NOT NULL,
  `idState` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
PRIMARY KEY (`id`),
KEY `fk_projects_category1_idx` (`idCategory`),
CONSTRAINT `fk_projects_category1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
KEY `fk_projects_state1_idx` (`idState`),
CONSTRAINT `fk_projects_state1` FOREIGN KEY (`idState`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `workArt` WRITE;
/*!40000 ALTER TABLE `workArt` DISABLE KEYS */;
INSERT INTO `workArt` VALUES (13, 'Death...',
                              'storage/images/2023/01/938eae9dc71d91fc60e3b7a224cd2ab3.jpg',
                              'Cada vez mais tenho a sensação de incertezas e inseguranças e tento me manter firme apesar disso. Algumas coisas parecem dar certo e maioria não, tipo você.',
                              2, 1, '2022-09-16 20:15:09', NULL),
                              (15, 'Hold my Ballons',
                              'storage/images/2023/01/2aff597547aa39ae311f13bf33ac3e38.jpg',
                              'Não sei o que aconteceu, só seu que tu me prendeu. E prendeu de uma maneira estranha, como quando a gente ama.',
                              1, 3, '2022-09-17 12:55:35', NULL),
                              (17, 'No time',
                              'storage/images/2023/01/4ff71a3cdde4891f801d821ec252d9a3.jpg',
                              'É tão difícil se sentir um ser invisível diante das pessoas.',
                              2, 2, '2022-09-17 13:07:23', NULL),
                              (20, 'Monstro do Amor',
                              'storage/images/2023/01/1292ea4f20127a78fa44c184cde4615e.jpg',
                              'O tempo não para. E daqui a uns 10 anos estarei lendo este texto e sentindo saudades dos meus 23 anos… E assim será até morrer. Saudades de anos atrás, de vidas passadas.',
                              1, 5, '2022-09-17 14:00:00', NULL),
                              (21, 'No Face',
                              'storage/images/2023/01/8e11ebb64bf1f662f04ebe9b52749146.jpg',
                              'E em meio a tantos problemas que rodeiam a minha vida, existe um único problema, que me desliga de todos os outros, que faz rolar lágrimas sofridas de meu rosto. Esse é ficar sem você.',
                              1, 3, '2022-09-17 14:04:06', NULL),
                              (22, 'Waiting for you my love',
                              'storage/images/2023/01/69de6ea83a6f7ba67fda7f64c69685cd.jpg',
                              'Penso em você, mesmo sabendo o quão longe está de mim, sinto aquele amor que continua a me desgraçar intensamente a cada dia, e penso quando enfim poderei te ter comigo. Sei lá, o café chega ao fim e trago a ultima ponta, nada muda. É como se eu fosse passar por isso mais uns longos anos a frente.',
                              1, 4, '2022-09-17 16:40:56', NULL);

/*!40000 ALTER TABLE `workArt` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Pinturas'),
                                (2,'Desenhos'),
                                (3,'Designs'),
                                (4,'Fotógrafias'),
                                (5,'Esculturas');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` varchar(255) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Disponível'),
                            (2,'Indisponível'),
                            (3,'Em Andamento');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `question` text NOT NULL,
                        `answer` text NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
                        `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Como submeter um projeto?','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ','2022-09-08 16:34:59',NULL),(2,'Como fazer o cadastro?','The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.','2022-09-08 16:34:59',NULL),(3,'Quais os dias do evento?','Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.','2022-09-08 16:34:59',NULL),(4,'Com são realizadas as avaliações','Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).','2022-09-08 16:34:59',NULL);
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `write_work`
--

DROP TABLE IF EXISTS `write_work`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `write_work` (
                                  `id` int(11) NOT NULL AUTO_INCREMENT,
                                  `idWork` int(11) NOT NULL,
                                  `idUser` int(11) NOT NULL,
                                  PRIMARY KEY (`id`),
                                  KEY `fk_authors_has_projects_projects1_idx` (`idWork`),
                                  KEY `fk_write_project_users1_idx` (`idUser`),
                                  CONSTRAINT `fk_authors_has_projects_projects` FOREIGN KEY (`idWork`) REFERENCES `workart` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
                                  CONSTRAINT `fk_write_work_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `write_work`
--

LOCK TABLES `write_work` WRITE;
/*!40000 ALTER TABLE `write_work` DISABLE KEYS */;
INSERT INTO `write_work` VALUES (1,13,1),
                                (2,15,2),
                                (3,17,4),
                                (4,20,4),
                                (5,21,4),
                                (6,22,4);
/*!40000 ALTER TABLE `write_work` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'avogado6', 'avogado6@gmail.com', '$2y$10$lrGIBWHjfuHTi3uH8KBCvuTTt41yCA.mrhf9lXXD.OQnRUC5hcABW');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-10 11:15:04
