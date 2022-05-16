-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: webshop
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `size` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (2,'Nike Air Monarch IV','imagesp/0_0.webp',0,'S',1469000),(3,'Nike Air Monarch IV','imagesp/0_0.webp',0,'M',1469000),(4,'Nike Air Monarch IV','imagesp/0_0.webp',0,'L',1469000),(5,'Nike Air Monarch IV','imagesp/0_0.webp',0,'XL',1469000),(6,'Nike Air Max 90','imagesp/2_0.webp',0,'S',500000),(7,'Nike Air Max 90','imagesp/2_0.webp',0,'M',500000),(8,'Nike Air Max 90','imagesp/2_0.webp',0,'L',500000),(9,'Nike Air Max 90','imagesp/2_0.webp',0,'XL',500000),(10,'Nike Force 1 LV8','imagesp/3_0.webp',0,'S',840000),(11,'Nike Force 1 LV8','imagesp/3_0.webp',0,'M',840000),(12,'Nike Force 1 LV8','imagesp/3_0.webp',0,'L',840000),(13,'Nike Force 1 LV8','imagesp/3_0.webp',0,'XL',840000),(14,'Nike Revolution','imagesp/4_0.jpg',0,'S',1000000),(15,'Nike Revolution','imagesp/4_0.jpg',0,'M',1000000),(16,'Nike Revolution','imagesp/4_0.jpg',0,'L',1000000),(17,'Nike Revolution','imagesp/4_0.jpg',0,'XL',1000000);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orderdetail` (
  `productid` int NOT NULL,
  `orderid` int NOT NULL,
  `number` int NOT NULL,
  `priceEach` int NOT NULL,
  KEY `orderid_idx` (`orderid`),
  KEY `orderid_idx1` (`orderid`),
  KEY `productid` (`productid`),
  CONSTRAINT `orderid` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  CONSTRAINT `productid` FOREIGN KEY (`productid`) REFERENCES `cart` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
INSERT INTO `orderdetail` VALUES (2,1,1,1469000),(3,1,1,1469000),(4,1,1,1469000),(5,1,1,1469000),(2,2,1,1469000),(3,2,1,1469000),(4,2,1,1469000),(5,2,1,1469000),(2,3,1,1469000),(3,3,1,1469000),(4,3,1,1469000),(5,3,1,1469000),(2,4,1,1469000),(3,4,1,1469000),(4,4,1,1469000),(5,4,1,1469000),(2,5,1,1469000),(3,5,1,1469000),(4,5,1,1469000),(5,5,1,1469000),(2,6,1,1469000),(3,6,1,1469000),(4,6,1,1469000),(5,6,1,1469000),(2,7,1,1469000),(3,7,1,1469000),(4,7,1,1469000),(5,7,1,1469000),(2,8,1,1469000),(3,8,1,1469000),(4,8,1,1469000),(5,8,1,1469000),(2,9,1,1469000),(3,9,1,1469000),(4,9,1,1469000),(5,9,1,1469000),(2,10,1,1469000),(3,10,1,1469000),(4,10,1,1469000),(5,10,1,1469000),(2,11,1,1469000),(3,11,1,1469000),(4,11,1,1469000),(5,11,1,1469000),(2,12,1,1469000),(3,12,1,1469000),(4,12,1,1469000),(5,12,1,1469000),(2,13,1,1469000),(3,13,1,1469000),(4,13,1,1469000),(5,13,1,1469000),(2,14,1,1469000),(3,14,1,1469000),(4,14,1,1469000),(5,14,2,1469000),(2,15,1,1469000),(3,15,1,1469000),(4,15,2,1469000),(5,15,2,1469000),(2,16,1,1469000),(3,16,1,1469000),(4,16,2,1469000),(5,16,2,1469000),(2,17,1,1469000),(3,17,1,1469000),(4,17,2,1469000),(5,17,2,1469000),(2,18,1,1469000),(3,18,1,1469000),(4,18,2,1469000),(5,18,2,1469000),(2,19,1,1469000),(3,19,1,1469000),(4,19,2,1469000),(5,19,2,1469000),(2,20,1,1469000),(3,20,1,1469000),(4,20,2,1469000),(5,20,2,1469000),(2,21,1,1469000),(3,21,1,1469000),(4,21,2,1469000),(5,21,2,1469000),(2,22,1,1469000),(3,22,1,1469000),(4,22,2,1469000),(5,22,2,1469000),(2,23,1,1469000),(3,23,1,1469000),(4,23,2,1469000),(5,23,2,1469000),(2,24,1,1469000),(3,24,1,1469000),(4,24,2,1469000),(5,24,2,1469000),(2,25,1,1469000),(3,25,1,1469000),(4,25,2,1469000),(5,25,2,1469000),(17,25,1,1000000),(2,26,1,1469000),(3,26,1,1469000),(4,26,2,1469000),(5,26,2,1469000),(16,26,1,1000000),(17,26,1,1000000),(17,27,1,1000000),(5,28,1,1469000),(15,28,1,1000000),(15,29,1,1000000),(17,29,1,1000000),(5,30,1,1469000),(16,31,1,1000000),(12,32,1,840000),(3,33,1,1469000),(3,34,1,1469000),(2,35,1,1469000),(4,36,1,1469000),(9,37,1,500000),(5,39,1,1469000),(7,40,1,500000),(13,41,1,840000),(5,42,1,1469000),(2,43,1,1469000),(5,44,1,1469000),(9,44,1,500000),(5,45,1,1469000);
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordermethod`
--

DROP TABLE IF EXISTS `ordermethod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordermethod` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordermethod`
--

LOCK TABLES `ordermethod` WRITE;
/*!40000 ALTER TABLE `ordermethod` DISABLE KEYS */;
INSERT INTO `ordermethod` VALUES (1,'tiền mặt',1);
/*!40000 ALTER TABLE `ordermethod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ordermethodid` int NOT NULL,
  `userid` int NOT NULL,
  `orderdate` date NOT NULL,
  `requireddate` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ordermethodid_idx` (`ordermethodid`),
  KEY `userid_idx` (`userid`),
  CONSTRAINT `ordermethodid` FOREIGN KEY (`ordermethodid`) REFERENCES `ordermethod` (`id`),
  CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,8,'2022-05-15','2022-05-15','Nam Định',0),(2,1,8,'2022-05-15','2022-05-15','Nam Định',0),(3,1,8,'2022-05-15','2022-05-15','Nam Định',0),(4,1,8,'2022-05-15','2022-05-15','Nam Định',0),(5,1,8,'2022-05-15','2022-05-15','Nam Định',0),(6,1,8,'2022-05-15','2022-05-15','Nam Định',0),(7,1,8,'2022-05-15','2022-05-15','Nam Định',0),(8,1,8,'2022-05-15','2022-05-15','Nam Định',0),(9,1,8,'2022-05-15','2022-05-15','Nam Định',0),(10,1,8,'2022-05-15','2022-05-15','Nam Định',0),(11,1,8,'2022-05-15','2022-05-15','Nam Định',0),(12,1,8,'2022-05-15','2022-05-15','Nam Định',0),(13,1,8,'2022-05-15','2022-05-15','Nam Định',0),(14,1,8,'2022-05-15','2022-05-15','Nam Định',0),(15,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(16,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(17,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(18,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(19,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(20,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(21,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(22,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(23,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(24,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(25,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(26,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(27,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(28,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(29,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(30,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(31,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(32,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(33,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(34,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(35,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(36,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(37,1,2,'2022-05-15','2022-05-15','Hà Nội',0),(38,1,2,'2022-05-15','2022-05-15','Hà Nội',1),(39,1,9,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',1),(40,1,9,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',0),(41,1,9,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',0),(42,1,9,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',1),(43,1,9,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',0),(44,1,10,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',1),(45,1,10,'2022-05-16','2022-05-16','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'namnam1130','Pham Quang Nam','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Hà Nội'),(3,'nampham3005','Nam Tô Phạm','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Nam Định'),(4,'nam1911nam','Pham Quang Nam','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Nam Định'),(5,'Nampham123','Pham Quang Nam','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Hà Nội'),(6,'hahahahaha','Phạm Quang Nam','ee5e89bd69e38e24678af2f01a7e6f40','548573847265','awildquangtien@gmail.com','Hà Nội'),(7,'hghghghghgh','nam nam nam nam','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Nam Định'),(8,'namnamnam1911','Nam Tô Phạm','ee5e89bd69e38e24678af2f01a7e6f40','0849161588','awildquangtien@gmail.com','Nam Định'),(9,'nampham30051','Phạm Quang Nam','ee5e89bd69e38e24678af2f01a7e6f40','0878284100','awildquangtien@gmail.com','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định'),(10,'nampham1911','Trần Trung Hiếu','ee5e89bd69e38e24678af2f01a7e6f40','0878284100','awildquangtien@gmail.com','113, Thị trấn Thịnh Long, Hải Hậu, Nam Định');
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

-- Dump completed on 2022-05-16 10:41:31
