CREATE DATABASE  IF NOT EXISTS `cafeteriagourmet` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_mysql500_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cafeteriagourmet`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: cafeteriagourmet
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(150) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `cpf_cliente_usuario` varchar(50) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `endereco` varchar(80) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `numero` int NOT NULL,
  `complemento` varchar(20) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb3_general_mysql500_ci DEFAULT 'Alagoas',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `cpf_cliente_usuario_UNIQUE` (`cpf_cliente_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Victor','127.231.584-38','Rua Manoel Nunes Neto',147,'Casa','Capiatã','Arapiraca','Alagoas');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id_compra` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `cpf_cliente_user` varchar(20) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `cliente_nome` varchar(50) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `product_name` varchar(50) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `cod_prod` int NOT NULL,
  `quantidade` int DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `data_compra` varchar(20) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`id_compra`),
  UNIQUE KEY `id_compra_UNIQUE` (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (11,1,'127.231.584-38','Victor','Pão de Queijo',7,1,11.00,11.00,'03-12-2023'),(12,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'03-12-2023'),(13,1,'127.231.584-38','Victor','Guaraná Antartica',8,1,5.00,5.00,'03-12-2023'),(14,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'03-12-2023'),(15,1,'127.231.584-38','Victor','Pastel de Frango',2,1,10.00,10.00,'03-12-2023'),(16,1,'127.231.584-38','Victor','Empada de Frango',1,1,8.00,8.00,'03-12-2023'),(17,1,'127.231.584-38','Victor','Empada de Frango',1,1,8.00,8.00,'03-12-2023'),(18,1,'127.231.584-38','Victor','Coxinha de Frango',4,1,8.00,8.00,'03-12-2023'),(19,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'03-12-2023'),(20,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'03-12-2023'),(21,1,'127.231.584-38','Victor','Empada de Frango',1,1,8.00,8.00,'03-12-2023'),(22,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'04-12-2023'),(23,1,'127.231.584-38','Victor','Pastel de Frango',2,1,10.00,10.00,'04-12-2023'),(24,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'04-12-2023'),(25,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'04-12-2023'),(26,1,'127.231.584-38','Victor','Pastel de Carne',3,1,10.00,10.00,'04-12-2023'),(27,1,'127.231.584-38','Victor','Pastel de Frango',2,1,10.00,10.00,'04-12-2023');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `product_description` varchar(200) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `preco` float(9,2) DEFAULT NULL,
  `quant_estoque` int DEFAULT NULL,
  `type_prod` varchar(200) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  `product_code` int NOT NULL,
  `imagem_prod` varchar(200) COLLATE utf8mb3_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`product_code`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'Empada de Frango','Recheio de frango',8.00,6,'Salgado',1,'empadadefrango'),(2,'Pastel de Frango','Recheio de Frango',10.00,3,'Salgado',2,'pasteldefrango'),(3,'Pastel de Carne','Recheio de Boi',10.00,12,'Salgado',3,'pasteldecarne'),(4,'Coxinha de Frango','Frango',8.00,19,'Salgado',4,'coxinhadefrango'),(5,'Coxinha de Charque','Charque',9.00,10,'Salgado',5,'coxinhadecharque'),(6,'Pão Pizza','Pão com sabor Pizza',10.00,8,'Salgado',6,'paopizza'),(7,'Pão de Queijo','Pão sabor queijo com cobertura de queijo ralado',11.00,18,'Salgado',7,'paodequeijo'),(8,'Guaraná Antartica',NULL,5.00,39,'Bebida',8,'guaranaantartica'),(9,'Coca-Cola Zero',NULL,5.00,34,'Bebida',9,'cocazero');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `CountProduct` AFTER INSERT ON `produtos` FOR EACH ROW begin
	call QuantProdutos();
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `qtprod`
--

DROP TABLE IF EXISTS `qtprod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qtprod` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qtprodutos` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qtprod`
--

LOCK TABLES `qtprod` WRITE;
/*!40000 ALTER TABLE `qtprod` DISABLE KEYS */;
INSERT INTO `qtprod` VALUES (1,9);
/*!40000 ALTER TABLE `qtprod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `cpf_cliente_user` varchar(20) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8mb3_general_mysql500_ci NOT NULL,
  `permissao` int NOT NULL DEFAULT '1',
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `cpf_cliente_user_UNIQUE` (`cpf_cliente_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Victor','127.231.584-38','123456',3),(2,'Daniel','124.321.587-95','123456789',3),(3,'Teste','224.531.987-98','123',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cafeteriagourmet'
--

--
-- Dumping routines for database 'cafeteriagourmet'
--
/*!50003 DROP PROCEDURE IF EXISTS `QuantProdutos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `QuantProdutos`()
begin
	declare x int;
    declare y int;
    
    set x = (select count(*) from produtos);
    set y = (select qtprodutos from qtprod where id = 1);
    
    if(y < x) then
		update qtprod set qtprod.qtprodutos = x where id = 1;
    end if; 
    
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-04 22:16:58
