CREATE DATABASE  IF NOT EXISTS `barroco` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `barroco`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: barroco
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `calle_fiscal` varchar(45) DEFAULT NULL,
  `num_ext_fiscal` varchar(45) DEFAULT NULL,
  `num_int_fiscal` varchar(45) DEFAULT NULL,
  `colonia_fiscal` varchar(45) DEFAULT NULL,
  `cp_fiscal` varchar(45) DEFAULT NULL,
  `municipio_fiscal` varchar(45) DEFAULT NULL,
  `estado_fiscal` varchar(45) DEFAULT NULL,
  `calle_envio` varchar(45) DEFAULT NULL,
  `num_ext_envio` varchar(45) DEFAULT NULL,
  `num_int_envio` varchar(45) DEFAULT NULL,
  `colonia_envio` varchar(45) DEFAULT NULL,
  `cp_envio` varchar(45) DEFAULT NULL,
  `municipio_envio` varchar(45) DEFAULT NULL,
  `estado_envio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Materiales del Valle','12635485','ejemplo@hotmail.com','Pepe','9611236541','calle fiscal','54','2','colonia 2','29000','Tuxtla','Chiapas','Calle envio','10','11','colonia 2','29000','Tuxtla Gutierrez','Chiapas'),(2,'Home Depot México','458565241','home_depot@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'Ferretería Mandiola','56548','ejemplo@hotmail.com','José','9615452326','Oaxaca','20','A','Residencial Hacienda','29000','Tuxtla Gutiérrez','Chiapas','1a. norte poniente','443','B','Centro','29000','Tuxtla Gutiérrez','Chiapas'),(4,'Herrajes Finos Copico',NULL,'herrajes@copico.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'Ferretería Miguelito','mig809026jfg','miguelito@hotmail.com',NULL,NULL,'calle fiscal','20',NULL,'centro',NULL,NULL,NULL,'calle envio','50',NULL,'teran',NULL,NULL,NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_entrega`
--

DROP TABLE IF EXISTS `compra_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_entrega` (
  `id_compra_entrega` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_compra_entrega`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_entrega`
--

LOCK TABLES `compra_entrega` WRITE;
/*!40000 ALTER TABLE `compra_entrega` DISABLE KEYS */;
INSERT INTO `compra_entrega` VALUES (1,'Dirección Cliente'),(2,'Sucursal'),(3,'CDIS'),(4,'Otro');
/*!40000 ALTER TABLE `compra_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_entrada`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada`
--

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrada_producto`
--

DROP TABLE IF EXISTS `entrada_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada_producto` (
  `id_entrada` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_entrada`,`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrada_producto`
--

LOCK TABLES `entrada_producto` WRITE;
/*!40000 ALTER TABLE `entrada_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrada_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forma_pago`
--

DROP TABLE IF EXISTS `forma_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forma_pago` (
  `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_forma_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forma_pago`
--

LOCK TABLES `forma_pago` WRITE;
/*!40000 ALTER TABLE `forma_pago` DISABLE KEYS */;
INSERT INTO `forma_pago` VALUES (1,'Contado'),(2,'Crédito');
/*!40000 ALTER TABLE `forma_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compra`
--

DROP TABLE IF EXISTS `orden_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_compra` (
  `id_orden_compra` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `id_forma_pago` int(11) DEFAULT NULL,
  `id_compra_entrega` int(11) DEFAULT NULL,
  `nota` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_orden_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra`
--

LOCK TABLES `orden_compra` WRITE;
/*!40000 ALTER TABLE `orden_compra` DISABLE KEYS */;
INSERT INTO `orden_compra` VALUES (1,1,'2015-01-31 00:00:00','0000-00-00',1,NULL,NULL),(2,4,'2015-01-31 00:00:00','2017-07-20',1,NULL,NULL),(3,1,'2015-01-31 00:00:00','2017-05-01',1,NULL,NULL),(14,3,'2017-07-26 14:55:41','2017-07-24',1,NULL,NULL),(15,2,'2017-07-26 15:05:59','2017-07-01',1,NULL,'buscar al propietario');
/*!40000 ALTER TABLE `orden_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compra_producto`
--

DROP TABLE IF EXISTS `orden_compra_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_compra_producto` (
  `id_orden_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(8,2) NOT NULL,
  `precio_venta` decimal(8,2) NOT NULL,
  `descuento` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id_orden_compra`,`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compra_producto`
--

LOCK TABLES `orden_compra_producto` WRITE;
/*!40000 ALTER TABLE `orden_compra_producto` DISABLE KEYS */;
INSERT INTO `orden_compra_producto` VALUES (14,2,50.00,2500.00,NULL),(14,4,25.00,100.00,NULL),(15,2,89.00,1000.00,NULL);
/*!40000 ALTER TABLE `orden_compra_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `unidad` varchar(45) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  `id_producto_categoria` int(11) DEFAULT NULL,
  `costo` decimal(8,2) DEFAULT NULL,
  `precio_venta` decimal(8,2) DEFAULT NULL,
  `num_factura` varchar(45) DEFAULT NULL,
  `cantidad` decimal(8,2) DEFAULT NULL,
  `especificaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Cemento',NULL,'bolsas',NULL,2,20.00,150.00,'00003',2.00,NULL),(2,'Grava','Costales de cemento','costales',NULL,2,123.00,1000.00,'000000',2.00,'completos'),(3,'Varillas',NULL,'Pieza',NULL,3,NULL,78.00,'00002',2.00,NULL),(4,'Arena',NULL,'Tonelada',NULL,3,NULL,80.00,'00005',1.00,NULL),(5,'Gyplast','Descripción general','bultos',NULL,NULL,60.00,80.00,NULL,NULL,'Especificaciones técnicas'),(6,'Gyplast','Descripción general','bultos',NULL,1,60.00,100.00,NULL,500.00,'Especificaciones técnicas');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_categoria`
--

DROP TABLE IF EXISTS `producto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_categoria` (
  `id_producto_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_producto_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_categoria`
--

LOCK TABLES `producto_categoria` WRITE;
/*!40000 ALTER TABLE `producto_categoria` DISABLE KEYS */;
INSERT INTO `producto_categoria` VALUES (1,'Acabados'),(2,'Material Eléctrico'),(3,'Material Constucción'),(4,'Herreria'),(5,'Cementantes');
/*!40000 ALTER TABLE `producto_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador'),(2,'Ventas'),(3,'Almacén');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `id_salida` int(11) NOT NULL AUTO_INCREMENT,
  `id_salida_tipo` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id_salida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida`
--

LOCK TABLES `salida` WRITE;
/*!40000 ALTER TABLE `salida` DISABLE KEYS */;
/*!40000 ALTER TABLE `salida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida_producto`
--

DROP TABLE IF EXISTS `salida_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida_producto` (
  `id_salida` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_salida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida_producto`
--

LOCK TABLES `salida_producto` WRITE;
/*!40000 ALTER TABLE `salida_producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `salida_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salida_tipo`
--

DROP TABLE IF EXISTS `salida_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida_tipo` (
  `id_salida_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_salida_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salida_tipo`
--

LOCK TABLES `salida_tipo` WRITE;
/*!40000 ALTER TABLE `salida_tipo` DISABLE KEYS */;
INSERT INTO `salida_tipo` VALUES (1,'Orden Compra'),(2,'Muestreo');
/*!40000 ALTER TABLE `salida_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Raúl González','raul@gmail.com','hola',2),(4,'Raymundo Emilio Sol','sol6902@hotmail.com','hola',3),(5,'Ramiro Jiménez Aréchar','ramiro.arechar@gmail.com','hola',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-31 11:26:59
