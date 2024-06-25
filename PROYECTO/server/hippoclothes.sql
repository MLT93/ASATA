-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: hippoclothes
-- ------------------------------------------------------
-- Server version	8.0.37-0ubuntu0.22.04.3

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
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `id_temporada` int NOT NULL,
  `codigo_SKU` varchar(8) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Código alfanumérico que referencia el producto en la tienda',
  `codigo_EAN` varchar(13) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Código de barras del producto',
  `color` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `talla` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'XS, S, M, L, XL, XXL, XXXL',
  `precio_venta` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  `descripcion` text COLLATE utf8mb3_unicode_ci,
  `estado` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Disponible, Agotado, Defectuoso, En transito',
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo_SKU` (`codigo_SKU`),
  UNIQUE KEY `codigo_EAN` (`codigo_EAN`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_temporada` (`id_temporada`),
  CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `articulos_ibfk_2` FOREIGN KEY (`id_temporada`) REFERENCES `temporadas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,1,1,'A1111111','0000000089087','Azul Marino','M',18.00,30,'Gorra Hippo Negra con visera plana. Estilo Hip Hop. Logo central','Disponible',''),(2,2,1,'B1111111','0000059089087','Blanca','M',24.99,40,'Camiseta con logo central Hippo','Disponible',''),(3,3,1,'C1111111','0000079569082','Beige','L',29.99,25,'Sudadera Hip Hop con capucha','Disponible',''),(4,4,1,'D1111111','0000089089583','Color Aleatorio','M',7.90,50,'Porta llaves standard Hippo','Agotado','');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bancos`
--

DROP TABLE IF EXISTS `bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bancos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `iban_bancario` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `swift_bic` varchar(11) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `bancos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bancos`
--

LOCK TABLES `bancos` WRITE;
/*!40000 ALTER TABLE `bancos` DISABLE KEYS */;
INSERT INTO `bancos` VALUES (1,1,'ES6112343456420457323531',''),(2,2,'ES6112343456400006323532',''),(3,3,'ES6112343450400016323533','');
/*!40000 ALTER TABLE `bancos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Gorras, T-Shirts, Sudaderas, Gadgets, Zapatillas',
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Gorras',''),(2,'T-Shirts',''),(3,'Sudaderas',''),(4,'Gadgets',''),(5,'Zapatillas','');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `tipo_documento` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'DNI, NIE, Pasaporte',
  `num_documento` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,1,'DNI','98979866-P','C/ Admin, 1','654654654','2024-01-01'),(2,2,'Pasaporte','ZAB000254','C/ User, 1','693693693','2024-01-01'),(3,3,'NIE','X-1234567-P','C/ User, 2','684684684','2024-01-01');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cryptos`
--

DROP TABLE IF EXISTS `cryptos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cryptos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `moneda_crypto` varchar(3) COLLATE utf8mb3_unicode_ci DEFAULT 'BNB' COMMENT 'BNB, ETH, BTC, USDT',
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `cryptos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cryptos`
--

LOCK TABLES `cryptos` WRITE;
/*!40000 ALTER TABLE `cryptos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cryptos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_facturas`
--

DROP TABLE IF EXISTS `detalles_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_facturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_factura` int NOT NULL,
  `id_detalle_pedido` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_factura` (`id_factura`),
  KEY `id_detalle_pedido` (`id_detalle_pedido`),
  CONSTRAINT `detalles_facturas_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `facturas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_facturas_ibfk_2` FOREIGN KEY (`id_detalle_pedido`) REFERENCES `detalles_pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_facturas`
--

LOCK TABLES `detalles_facturas` WRITE;
/*!40000 ALTER TABLE `detalles_facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_pedido`
--

DROP TABLE IF EXISTS `detalles_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_pedido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `id_articulo` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pedido` (`id_pedido`),
  KEY `id_articulo` (`id_articulo`),
  CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_pedido`
--

LOCK TABLES `detalles_pedido` WRITE;
/*!40000 ALTER TABLE `detalles_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_recepcion_almacen`
--

DROP TABLE IF EXISTS `detalles_recepcion_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_recepcion_almacen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_recepcion_almacen` int NOT NULL,
  `id_articulo` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_recepcion_almacen` (`id_recepcion_almacen`),
  KEY `id_articulo` (`id_articulo`),
  CONSTRAINT `detalles_recepcion_almacen_ibfk_1` FOREIGN KEY (`id_recepcion_almacen`) REFERENCES `recepciones_almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_recepcion_almacen_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_recepcion_almacen`
--

LOCK TABLES `detalles_recepcion_almacen` WRITE;
/*!40000 ALTER TABLE `detalles_recepcion_almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_recepcion_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalles_tickets`
--

DROP TABLE IF EXISTS `detalles_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalles_tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ticket` int NOT NULL,
  `id_detalle_pedido` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ticket` (`id_ticket`),
  KEY `id_detalle_pedido` (`id_detalle_pedido`),
  CONSTRAINT `detalles_tickets_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detalles_tickets_ibfk_2` FOREIGN KEY (`id_detalle_pedido`) REFERENCES `detalles_pedido` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalles_tickets`
--

LOCK TABLES `detalles_tickets` WRITE;
/*!40000 ALTER TABLE `detalles_tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalles_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturas`
--

DROP TABLE IF EXISTS `facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_factura` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturas`
--

LOCK TABLES `facturas` WRITE;
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metodos_pago`
--

DROP TABLE IF EXISTS `metodos_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metodos_pago` (
  `id` int NOT NULL AUTO_INCREMENT,
  `metodo` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT 'PayPal' COMMENT 'PayPal, Tarjeta, Transferencia bancaria, Crypto',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metodos_pago`
--

LOCK TABLES `metodos_pago` WRITE;
/*!40000 ALTER TABLE `metodos_pago` DISABLE KEYS */;
INSERT INTO `metodos_pago` VALUES (1,'PayPal'),(2,'Tarjeta'),(3,'Transferencia bancaria'),(4,'Crypto');
/*!40000 ALTER TABLE `metodos_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `id_metodo_pago` int NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Procesado, En tránsito, Entregado, Cancelado',
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_metodo_pago` (`id_metodo_pago`),
  CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_proveedor` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Empresa, Autónomo',
  `nombre` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nombre_comercial` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Cif, DNI, Pasaporte',
  `num_documento` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recepciones_almacen`
--

DROP TABLE IF EXISTS `recepciones_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recepciones_almacen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_proveedor` int NOT NULL,
  `num_albaran` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Recibido, Pendiente, Devuelto',
  PRIMARY KEY (`id`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `recepciones_almacen_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recepciones_almacen`
--

LOCK TABLES `recepciones_almacen` WRITE;
/*!40000 ALTER TABLE `recepciones_almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `recepciones_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rol` varchar(5) COLLATE utf8mb3_unicode_ci DEFAULT 'User' COMMENT 'Admin, User',
  `descripcion` text COLLATE utf8mb3_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin',NULL),(2,'User',NULL),(3,'User',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesiones`
--

DROP TABLE IF EXISTS `sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sesiones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'LOG IN, LOG OUT',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesiones`
--

LOCK TABLES `sesiones` WRITE;
/*!40000 ALTER TABLE `sesiones` DISABLE KEYS */;
INSERT INTO `sesiones` VALUES (1,1,'2024-06-23 13:08:39','LOG IN'),(2,1,'2024-06-23 13:13:17','LOG IN'),(3,1,'2024-06-23 13:14:02','LOG IN'),(4,1,'2024-06-23 13:16:46','LOG IN'),(5,1,'2024-06-23 13:16:46','LOG OUT'),(6,1,'2024-06-23 13:42:26','LOG IN'),(7,1,'2024-06-23 13:42:26','LOG OUT'),(8,1,'2024-06-23 13:42:37','LOG IN'),(9,1,'2024-06-23 13:42:37','LOG OUT'),(10,1,'2024-06-23 14:15:42','LOG IN'),(11,1,'2024-06-23 14:17:15','LOG IN'),(12,1,'2024-06-23 14:21:48','LOG IN'),(13,1,'2024-06-23 14:27:56','LOG IN'),(14,1,'2024-06-23 14:27:58','LOG IN'),(15,1,'2024-06-23 14:28:00','LOG IN'),(16,1,'2024-06-23 14:28:01','LOG IN'),(17,1,'2024-06-23 14:28:02','LOG IN'),(18,1,'2024-06-23 14:28:03','LOG IN'),(19,1,'2024-06-23 14:35:25','LOG IN'),(20,1,'2024-06-23 14:35:28','LOG IN'),(21,1,'2024-06-23 14:35:36','LOG IN'),(22,1,'2024-06-23 14:36:45','LOG IN'),(23,1,'2024-06-23 14:37:20','LOG IN'),(24,1,'2024-06-23 14:38:13','LOG IN'),(25,1,'2024-06-23 14:38:23','LOG IN'),(26,1,'2024-06-23 14:38:23','LOG OUT'),(27,1,'2024-06-23 14:38:24','LOG IN'),(28,1,'2024-06-23 14:38:24','LOG OUT'),(29,1,'2024-06-23 22:44:21','LOG IN'),(30,1,'2024-06-23 22:44:21','LOG OUT'),(31,1,'2024-06-23 22:59:24','LOG IN'),(32,1,'2024-06-23 22:59:24','LOG OUT');
/*!40000 ALTER TABLE `sesiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarjetas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_cliente` int NOT NULL,
  `nombre_completo_tarjeta` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `red_pago` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Mastercard, Visa, American Express',
  `num_tarjeta` varchar(16) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cvv_tarjeta` int DEFAULT NULL,
  `fecha_caducidad` date NOT NULL,
  `isPrincipal` tinyint(1) NOT NULL COMMENT 'Es la tarjeta de pago por defecto',
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
INSERT INTO `tarjetas` VALUES (1,1,'Admin Master Main','American Express','5555444400008888',111,'2100-01-01',1),(2,2,'User1 User1 User1','Visa','5532444400005555',222,'2070-01-01',1),(3,3,'User2 User2 User2','Master Card','5885333300007777',333,'2070-01-01',0);
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temporadas`
--

DROP TABLE IF EXISTS `temporadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `temporadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb3_unicode_ci,
  `anualidad` int NOT NULL COMMENT 'Es la fecha (ej. 2024). Esto filtrará el catalogo por temporada',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temporadas`
--

LOCK TABLES `temporadas` WRITE;
/*!40000 ALTER TABLE `temporadas` DISABLE KEYS */;
INSERT INTO `temporadas` VALUES (1,'Summer','Ropa de verano',2024),(2,'Autumn','Ropa de otoño',2024),(3,'Winter','Ropa de invierno',2024),(4,'Spring','Ropa de primavera',2024);
/*!40000 ALTER TABLE `temporadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_ticket` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rol` int NOT NULL COMMENT '1 o 2',
  `username` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `hashedPassword` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,1,'admin','admin@mail.com','$2y$10$seeYqHgAbIdke8sXPNLHO.YRFemW0zQLm41A2AfEY0AUFaiLEST/.',''),(2,2,'panchu89','user1@mail.com','$2y$10$NrykHDkBrMg8q/x.Gy05i.Hfn3HB.eetnfEgAqIogGS7KflQxjqy6',''),(3,2,'juani23','user2@mail.com','$2y$10$g9KErPxjWQCQ1TsE2pV.zumFy4eKD12A3mJdcu4F6w27unc.wx5Y6',''),(4,3,'albi07','user3@mail.com','$2y$10$bR71nv1LVJNHLTseZb.oze118OTA00K/mhTvHXxtkkS2v3bEsOu2O',''),(5,2,'pimpollo_09','user4@mail.com','$2y$10$1IwkCZR.yHBacap6kY0EjeJ..XJNhXHFwUSX/FKFiuiFPJYwdpMri','/repo/users_img/user3.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-25 18:01:43
