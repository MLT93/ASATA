# MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
#
# Host: 127.0.0.1    Database: gameclubdario
# ###########################
# Server version	8.0.36-0ubuntu0.22.04.1

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

#
# Database structure of `gameclubdario`
#
DROP DATABASE gameclubdario;

CREATE DATABASE IF NOT EXISTS gameclubdario;

ALTER DATABASE gameclubdario CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE gameclubdario;

#
# Table structure for table `alquileres`
#
DROP TABLE IF EXISTS `alquileres`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `alquileres` (
    `id` int NOT NULL AUTO_INCREMENT,
    `fechaAlquiler` date NOT NULL,
    `id_cliente` int NOT NULL,
    `id_videojuego` int NOT NULL,
    `id_tarifas` int NOT NULL,
    `fechaDevolucion` date NOT NULL,
    `id_empleado` int NOT NULL,
    `id_metodoPago` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `clienteID` (`id_cliente`),
    KEY `empleadoID` (`id_empleado`),
    KEY `metodopagoID` (`id_metodoPago`),
    KEY `tarifasID` (`id_tarifas`),
    KEY `videojuegoID` (`id_videojuego`),
    CONSTRAINT `clienteID` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `empleadoID` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `metodopagoID` FOREIGN KEY (`id_metodoPago`) REFERENCES `metodospago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `tarifasID` FOREIGN KEY (`id_tarifas`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `videojuegoID` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 85 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `alquileres`
#
LOCK TABLES `alquileres` WRITE;

/*!40000 ALTER TABLE `alquileres` DISABLE KEYS */;

INSERT INTO
  `alquileres`
VALUES
  (1, '2024-05-10', 1, 5, 1, '2024-05-17', 2, 1),
  (2, '2024-05-09', 2, 6, 1, '2024-05-17', 2, 1),
  (3, '2024-05-10', 1, 58, 1, '2024-05-17', 6, 1),
  (4, '2024-05-09', 4, 59, 1, '2024-05-18', 8, 2),
  (5, '2024-05-09', 5, 60, 1, '2024-05-19', 7, 3),
  (6, '2024-05-03', 6, 61, 1, '2024-05-11', 11, 4),
  (7, '2024-05-09', 7, 62, 1, '2024-05-17', 12, 5),
  (8, '2024-05-09', 9, 62, 1, '2024-05-17', 4, 1),
  (9, '2024-05-04', 8, 63, 1, '2024-05-17', 8, 2),
  (10, '2024-05-08', 3, 64, 1, '2024-05-17', 3, 3),
  (11, '2024-05-07', 2, 66, 1, '2024-05-17', 2, 3),
  (13, '2024-05-09', 3, 67, 1, '2024-05-17', 10, 4),
  (83, '2024-05-17', 1, 74, 2, '2024-05-22', 11, 4),
  (84, '2024-05-17', 1, 65, 1, '2024-05-19', 11, 4);

/*!40000 ALTER TABLE `alquileres` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `categorias`
#
DROP TABLE IF EXISTS `categorias`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `categorias` (
    `id` int NOT NULL AUTO_INCREMENT,
    `categoria` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'vendedor / manager / administrador',
    `rango` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'jr / sr ',
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `categorias`
#
LOCK TABLES `categorias` WRITE;

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;

INSERT INTO
  `categorias`
VALUES
  (1, 'manager', 'junior'),
  (2, 'manager', 'senior'),
  (3, 'vendedor', 'junior'),
  (4, 'vendedor', 'senior'),
  (5, 'administrador', 'na');

/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `clientes`
#
DROP TABLE IF EXISTS `clientes`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `clientes` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `apellido1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `apellido2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `hashedPassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `numTarjeta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `fechaNacimiento` date NOT NULL,
    `socio` tinyint (1) NOT NULL,
    `id_rol` int NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    KEY `rolID` (`id_rol`),
    CONSTRAINT `rolID` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `clientes`
#
LOCK TABLES `clientes` WRITE;

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;

INSERT INTO
  `clientes`
VALUES
  (
    1,
    'Pedro',
    'López',
    'Diez',
    'user1@mail.com',
    '$2y$10$4ac1xDDSIkqlF4SxPnQwVeex/NxuKOvZOUCrM.Umr9Fw361.Zleba',
    '666555',
    'plaza mayor',
    '88888999-O',
    '444555222',
    '2000-01-06',
    1,
    1
  ),
  (
    2,
    'María',
    'López',
    'Diez',
    'user2@mail.com',
    '$2y$10$p1PED/xF9yYL3XLBGTyDR.Zvq7W7mUaKS/nIpUIC1e1kg0kd7BqB2',
    '777555',
    'plaza mayor',
    '77788999-O',
    '4443333222',
    '2003-01-06',
    0,
    1
  ),
  (
    3,
    'Lucas',
    'Gómez',
    'de la Serna',
    'user3@mail.com',
    '$2y$10$EWfJmzYVgs4iOZKdu6dGmODKSHs9BfCe9e498TW6wloo7qxWNajum',
    '666555',
    'plaza mayor',
    '88888699-O',
    '444555222',
    '2000-01-06',
    1,
    1
  ),
  (
    4,
    'Ramiro',
    'Cervantes',
    'Saavedra',
    'user4@mail.com',
    '$2y$10$5PmmA.aMm1GQv/zeO.IINOemfV9yYvtRFY.wm7tPKrSb.DbARmOUi',
    '777555',
    'plaza mayor',
    '77788499-O',
    '4443333222',
    '2003-01-06',
    0,
    1
  ),
  (
    5,
    'Jesús',
    'García',
    'Márquez',
    'user5@mail.com',
    '$2y$10$Fe2O.My1MgagnhQGSzrBLuGhXyzQ.B6W.aD8BCEiQ7n8oHR5aeFHG',
    '666555',
    'plaza mayor',
    '88848999-O',
    '444555222',
    '2000-01-06',
    1,
    1
  ),
  (
    6,
    'Ana',
    'Menéndez',
    'Pidal',
    'user6@mail.com',
    '$2y$10$EHpFIpG/jVR48lla7RGnDOlrtG3Jqnalpxyv5.DJEDmzpHKKXJLwS',
    '777555',
    'plaza mayor',
    '77784999-O',
    '4443333222',
    '2003-01-06',
    1,
    1
  ),
  (
    7,
    'Marino',
    'Pérez',
    'Galdós',
    'user7@mail.com',
    '$2y$10$Xa87r.K6Vmwn24mZLjidqOTPLkPEaKRpZZa1Aio2i.GHBrUpTmV8.',
    '666555',
    'plaza mayor',
    '84488699-O',
    '444555222',
    '2000-01-06',
    1,
    1
  ),
  (
    8,
    'Edelmiro',
    'Otero',
    'Pedrayo',
    'user8@mail.com',
    '$2y$10$jTBe.HaR2riR40RFu1YjTepr.4IUnB87.DZhsCtgR6rjmmPWd3wpu',
    '777555',
    'plaza mayor',
    '44488699-O',
    '4443333222',
    '2003-01-06',
    0,
    1
  ),
  (
    9,
    'Rocío',
    'Pardo',
    'Bazán',
    'user9@mail.com',
    '$2y$10$ZQ5JfzDD1A.9ec7NcWDAruuwtIa1in/ajN8KCVjk6hqCn2LlvoP0C',
    '666555',
    'plaza mayor',
    '86888969-O',
    '444555222',
    '2000-01-06',
    1,
    1
  ),
  (
    10,
    'Oriol',
    'Sánchez',
    'Dragó',
    'user10@mail.com',
    '$2y$10$sKlvuKbV.mVdNgLMMuCem.JP/YuHYkkpX8j0hBAwHjDoVMYWuthdm',
    '777555',
    'plaza mayor',
    '7688999-O',
    '4443333222',
    '2003-01-06',
    0,
    1
  ),
  (
    11,
    'UsuarioUno',
    'Lopez',
    'Pepito',
    'user11@mail.com',
    '$2y$10$f6zAeFZInzmseeI/BapisuEJz1VeV51GRP3CKHHKW6R6CHDGuHPkS',
    '609098898',
    'C/ Almería, 5',
    '62658479-R',
    '5555000044440000',
    '2024-05-07',
    1,
    1
  );

/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `desarrolladores`
#
DROP TABLE IF EXISTS `desarrolladores`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `desarrolladores` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `indie` tinyint (1) NOT NULL,
    `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `ciudad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 18 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `desarrolladores`
#
LOCK TABLES `desarrolladores` WRITE;

/*!40000 ALTER TABLE `desarrolladores` DISABLE KEYS */;

INSERT INTO
  `desarrolladores`
VALUES
  (
    1,
    'ubisoft',
    0,
    'EU',
    'San Francisco',
    '55555',
    'calle Alamos',
    'mail@ubisoft.com'
  ),
  (
    2,
    'ea',
    0,
    'EU',
    'Los Angeles',
    '55555',
    'Av numero 5',
    'mail@ea.com'
  ),
  (
    3,
    'Desarrollador Uno',
    1,
    'España',
    'Madrid',
    '28001',
    'Calle Falsa 123',
    'desarrollador1@ejemplo.com'
  ),
  (
    4,
    'Desarrollador Dos',
    0,
    'México',
    'Ciudad de México',
    '01000',
    'Avenida Siempre Viva 456',
    'desarrollador2@ejemplo.com'
  ),
  (
    5,
    'Desarrollador Tres',
    1,
    'Argentina',
    'Buenos Aires',
    'C1001',
    'Calle Perdida 789',
    'desarrollador3@ejemplo.com'
  ),
  (
    6,
    'Desarrollador Cuatro',
    0,
    'Chile',
    'Santiago',
    '8320000',
    'Gran Avenida 101',
    'desarrollador4@ejemplo.com'
  ),
  (
    7,
    'Desarrollador Cinco',
    1,
    'Colombia',
    'Bogotá',
    '110111',
    'Carrera 7 #245',
    'desarrollador5@ejemplo.com'
  ),
  (
    8,
    'Desarrollador Seis',
    0,
    'Perú',
    'Lima',
    '15001',
    'Jirón Zorritos 1420',
    'desarrollador6@ejemplo.com'
  ),
  (
    9,
    'Desarrollador Siete',
    1,
    'Venezuela',
    'Caracas',
    '1010',
    'Avenida Universidad 515',
    'desarrollador7@ejemplo.com'
  ),
  (
    10,
    'Desarrollador Ocho',
    0,
    'Brasil',
    'São Paulo',
    '01001-000',
    'Rua Libero Badaró 192',
    'desarrollador8@ejemplo.com'
  ),
  (
    11,
    'Desarrollador Nueve',
    1,
    'Uruguay',
    'Montevideo',
    '11200',
    'Bulevar Artigas 1601',
    'desarrollador9@ejemplo.com'
  ),
  (
    12,
    'Desarrollador Diez',
    0,
    'Paraguay',
    'Asunción',
    '1536',
    'Calle Palma 455',
    'desarrollador10@ejemplo.com'
  ),
  (
    13,
    'Desarrollador Once',
    1,
    'España',
    'Barcelona',
    '08001',
    'Paseo de Gracia 50',
    'desarrollador11@ejemplo.com'
  ),
  (
    14,
    'Desarrollador Doce',
    0,
    'México',
    'Guadalajara',
    '44100',
    'Avenida Chapultepec 230',
    'desarrollador12@ejemplo.com'
  ),
  (
    15,
    'Desarrollador Trece',
    1,
    'Argentina',
    'Córdoba',
    '5000',
    'Avenida Vélez Sarsfield 562',
    'desarrollador13@ejemplo.com'
  ),
  (
    16,
    'Desarrollador Catorce',
    0,
    'Chile',
    'Valparaíso',
    '2340000',
    'Avenida Argentina 111',
    'desarrollador14@ejemplo.com'
  ),
  (
    17,
    'Desarrollador Quince',
    1,
    'Colombia',
    'Medellín',
    '050021',
    'Carrera 80 #45-120',
    'desarrollador15@ejemplo.com'
  );

/*!40000 ALTER TABLE `desarrolladores` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `empleados`
#
DROP TABLE IF EXISTS `empleados`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `empleados` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `apellido1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `apellido2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `nSS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `id_categoria` int NOT NULL,
    `fechaAlta` date NOT NULL,
    PRIMARY KEY (`id`),
    KEY `categoriaID` (`id_categoria`),
    CONSTRAINT `categoriaID` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 13 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `empleados`
#
LOCK TABLES `empleados` WRITE;

/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;

INSERT INTO
  `empleados`
VALUES
  (
    1,
    'Juan',
    'Antunez',
    'Delariba',
    '33336666',
    '88895555',
    '66664444',
    'calle alamos',
    2,
    '2016-10-10'
  ),
  (
    2,
    'Juan',
    'Miguelez',
    'García',
    '333365556',
    '8333555',
    '666647774',
    'calle alegria',
    3,
    '2019-10-10'
  ),
  (
    3,
    'Juan',
    'Pérez',
    'Gómez',
    '12345678A',
    'SS001',
    '666111222',
    'Calle Falsa 123, Madrid',
    1,
    '2023-01-10'
  ),
  (
    4,
    'Laura',
    'Martín',
    'Ruiz',
    '23456789B',
    'SS002',
    '666333444',
    'Avenida Siempre Viva 45, Barcelona',
    2,
    '2023-01-11'
  ),
  (
    5,
    'Carlos',
    'Jiménez',
    'López',
    '34567890C',
    'SS003',
    '666555666',
    'Plaza Mayor 6, Valencia',
    3,
    '2023-01-12'
  ),
  (
    6,
    'Ana',
    'Morales',
    'Fernández',
    '45678901D',
    'SS004',
    '666777888',
    'Gran Vía 22, Bilbao',
    2,
    '2023-01-13'
  ),
  (
    7,
    'David',
    'García',
    'Torres',
    '56789012E',
    'SS005',
    '666999000',
    'Paseo de la Reforma 5, Sevilla',
    1,
    '2023-01-14'
  ),
  (
    8,
    'Sofía',
    'López',
    'Moreno',
    '67890123F',
    'SS006',
    '666111333',
    'Carrera 7 50, Zaragoza',
    3,
    '2023-01-15'
  ),
  (
    9,
    'Marco',
    'Alonso',
    'Pozo',
    '78901234G',
    'SS007',
    '666444555',
    'Calle Nueva 32, Málaga',
    1,
    '2023-01-16'
  ),
  (
    10,
    'Clara',
    'Sanz',
    'Molina',
    '89012345H',
    'SS008',
    '666666777',
    'Avenida de América 19, Granada',
    2,
    '2023-01-17'
  ),
  (
    11,
    'Lucas',
    'Gómez',
    'Blanco',
    '90123456I',
    'SS009',
    '666888999',
    'Ronda de Atocha 8, Salamanca',
    3,
    '2023-01-18'
  ),
  (
    12,
    'Marta',
    'Nieto',
    'Vidal',
    '01234567J',
    'SS010',
    '666000111',
    'Camino Real 4, Córdoba',
    1,
    '2023-01-19'
  );

/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `genero`
#
DROP TABLE IF EXISTS `genero`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `genero` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `nombreGenero` (`nombre`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 13 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `genero`
#
LOCK TABLES `genero` WRITE;

/*!40000 ALTER TABLE `genero` DISABLE KEYS */;

INSERT INTO
  `genero`
VALUES
  (
    1,
    'plataformas',
    'género en visón lateral de 2 dimensiones'
  ),
  (2, 'conducción', 'simulación de conducción'),
  (3, 'terror', 'juegos de terror'),
  (
    4,
    'shooter',
    'juegos en primera persona donde se usan armas'
  ),
  (5, 'deportivo', 'juegos simulación deportes');

/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `metodospago`
#
DROP TABLE IF EXISTS `metodospago`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `metodospago` (
    `id` int NOT NULL AUTO_INCREMENT,
    `metodo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 6 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `metodospago`
#
LOCK TABLES `metodospago` WRITE;

/*!40000 ALTER TABLE `metodospago` DISABLE KEYS */;

INSERT INTO
  `metodospago`
VALUES
  (1, 'paypal'),
  (2, 'tarjeta bancaria'),
  (3, 'Cuenta bancaria'),
  (4, 'contado'),
  (5, 'bitcoins');

/*!40000 ALTER TABLE `metodospago` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `pegui`
#
DROP TABLE IF EXISTS `pegui`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `pegui` (
    `id` int NOT NULL AUTO_INCREMENT,
    `pegui` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `pegui`
#
LOCK TABLES `pegui` WRITE;

/*!40000 ALTER TABLE `pegui` DISABLE KEYS */;

INSERT INTO
  `pegui`
VALUES
  (1, '7', 'mayor de 7'),
  (2, '12', 'mayor de 12'),
  (3, '16', 'mayor de 16'),
  (4, '18', 'mayor de 18');

/*!40000 ALTER TABLE `pegui` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `plataformas`
#
DROP TABLE IF EXISTS `plataformas`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `plataformas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `empresaMatriz` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `tipoLector` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `fechaLanzamiento` date NOT NULL,
    `coleccionista` tinyint (1) NOT NULL,
    `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `plataformas`
#
LOCK TABLES `plataformas` WRITE;

/*!40000 ALTER TABLE `plataformas` DISABLE KEYS */;

INSERT INTO
  `plataformas`
VALUES
  (
    1,
    'PlayStation 5',
    'Sony',
    'CD-rom',
    '2020-05-06',
    0,
    '1.0'
  ),
  (
    2,
    'PlayStation 4',
    'Sony',
    'CD-rom',
    '2016-05-06',
    0,
    '1.0'
  ),
  (
    3,
    'Xbox',
    'Microsoft',
    'CD-rom',
    '2012-05-06',
    0,
    '1.0'
  ),
  (
    4,
    'PlayStation 2',
    'Sony',
    'CD-rom',
    '2008-05-06',
    0,
    '1.0'
  );

/*!40000 ALTER TABLE `plataformas` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `roles`
#
DROP TABLE IF EXISTS `roles`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `roles` (
    `id` int NOT NULL AUTO_INCREMENT,
    `rol` varchar(7) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Limited, Full',
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `roles`
#
LOCK TABLES `roles` WRITE;

/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO
  `roles`
VALUES
  (1, 'Limited'),
  (2, 'Full');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `sesiones`
#
DROP TABLE IF EXISTS `sesiones`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `sesiones` (
    `id` int NOT NULL AUTO_INCREMENT,
    `id_cliente` int NOT NULL,
    `fecha` datetime DEFAULT NULL,
    `interaccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    KEY `clienteSesionesID` (`id_cliente`),
    CONSTRAINT `clienteSesionesID` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 20 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `sesiones`
#
LOCK TABLES `sesiones` WRITE;

/*!40000 ALTER TABLE `sesiones` DISABLE KEYS */;

INSERT INTO
  `sesiones`
VALUES
  (1, 1, '2024-05-17 08:32:05', 'LOG IN'),
  (2, 1, '2024-05-17 08:32:08', 'LOG OUT'),
  (3, 1, '2024-05-17 08:41:11', 'LOG IN'),
  (4, 1, '2024-05-17 08:41:18', 'LOG OUT'),
  (5, 1, '2024-05-17 08:53:44', 'LOG IN'),
  (6, 1, '2024-05-17 08:54:41', 'LOG IN'),
  (7, 1, '2024-05-17 08:55:21', 'LOG OUT'),
  (8, 1, '2024-05-17 08:56:04', 'LOG IN'),
  (9, 11, '2024-05-17 08:57:51', 'LOG IN'),
  (10, 11, '2024-05-17 08:57:55', 'LOG OUT'),
  (11, 1, '2024-05-17 09:31:47', 'LOG IN'),
  (12, 1, '2024-05-17 09:32:04', 'LOG OUT'),
  (13, 1, '2024-05-17 10:17:24', 'LOG IN'),
  (14, 1, '2024-05-17 11:28:08', 'LOG IN'),
  (15, 1, '2024-05-17 11:28:32', 'LOG IN'),
  (16, 1, '2024-05-17 11:28:40', 'LOG IN'),
  (17, 1, '2024-05-17 11:28:46', 'LOG IN'),
  (18, 1, '2024-05-17 12:22:41', 'LOG IN'),
  (19, 1, '2024-05-17 13:23:03', 'LOG IN');

/*!40000 ALTER TABLE `sesiones` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `tarifas`
#
DROP TABLE IF EXISTS `tarifas`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `tarifas` (
    `id` int NOT NULL AUTO_INCREMENT,
    `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `coste` float NOT NULL,
    `paraSocios` tinyint (1) NOT NULL,
    `activa` tinyint (1) NOT NULL,
    `descuentoSocios` float NOT NULL COMMENT 'es un %',
    PRIMARY KEY (`id`)
  ) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `tarifas`
#
LOCK TABLES `tarifas` WRITE;

/*!40000 ALTER TABLE `tarifas` DISABLE KEYS */;

INSERT INTO
  `tarifas`
VALUES
  (1, 'standard', 2, 0, 1, 30),
  (2, 'premium', 3, 0, 1, 40),
  (3, 'verano2024', 1, 1, 0, 0);

/*!40000 ALTER TABLE `tarifas` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `valoraciones`
#
DROP TABLE IF EXISTS `valoraciones`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `valoraciones` (
    `id` int NOT NULL AUTO_INCREMENT,
    `valoracion` int NOT NULL,
    `id_alquiler` int NOT NULL,
    PRIMARY KEY (`id`),
    KEY `alquilerID` (`id_alquiler`),
    CONSTRAINT `alquilerID` FOREIGN KEY (`id_alquiler`) REFERENCES `alquileres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `valoraciones`
#
LOCK TABLES `valoraciones` WRITE;

/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;

INSERT INTO
  `valoraciones`
VALUES
  (1, 3, 1),
  (2, 0, 2),
  (3, 1, 3),
  (4, 2, 4),
  (5, 3, 5),
  (6, 4, 6),
  (7, 5, 7),
  (8, 2, 8),
  (9, 3, 9),
  (10, 4, 10),
  (12, 5, 13),
  (17, 5, 83),
  (18, 3, 84);

/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;

UNLOCK TABLES;

#
# Table structure for table `videojuegos`
#
DROP TABLE IF EXISTS `videojuegos`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;

/*!50503 SET character_set_client = utf8mb4 */;

CREATE TABLE
  `videojuegos` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
    `id_genero` int NOT NULL,
    `id_desarrollador` int NOT NULL,
    `id_plataforma` int NOT NULL,
    `id_pegui` int NOT NULL,
    `fechaPublicacion` date NOT NULL,
    `isoCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `isoCode` (`isoCode`),
    KEY `desarrolladorID` (`id_desarrollador`),
    KEY `generoID` (`id_genero`),
    KEY `peguiID` (`id_pegui`),
    KEY `plataformaID` (`id_plataforma`),
    CONSTRAINT `desarrolladorID` FOREIGN KEY (`id_desarrollador`) REFERENCES `desarrolladores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `generoID` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `peguiID` FOREIGN KEY (`id_pegui`) REFERENCES `pegui` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `plataformaID` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB AUTO_INCREMENT = 83 DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/*!40101 SET character_set_client = @saved_cs_client */;

#
# Dumping data for table `videojuegos`
#
LOCK TABLES `videojuegos` WRITE;

/*!40000 ALTER TABLE `videojuegos` DISABLE KEYS */;

INSERT INTO
  `videojuegos`
VALUES
  (
    5,
    'Fifa 2020',
    'juego de futbol',
    5,
    2,
    1,
    1,
    '2020-05-05',
    '555555'
  ),
  (
    6,
    'Mario Bros',
    'juego plataformas',
    1,
    1,
    1,
    1,
    '2000-01-01',
    '556655'
  ),
  (
    58,
    'Elden Ring',
    'Un juego de rol y acción en un mundo abierto, creado por FromSoftware.',
    1,
    1,
    1,
    4,
    '2022-02-25',
    'US01'
  ),
  (
    59,
    'The Witcher 3',
    'Juego de rol de mundo abierto basado en la serie de libros The Witcher.',
    1,
    2,
    2,
    3,
    '2015-05-19',
    'US02'
  ),
  (
    60,
    'Cyberpunk 2077',
    'Juego de rol de mundo abierto situado en el metrópolis futurista Night City.',
    1,
    2,
    1,
    2,
    '2020-12-10',
    'US03'
  ),
  (
    61,
    'Horizon Forbidden West',
    'Aventura de acción en un mundo postapocalíptico con máquinas dominantes.',
    3,
    3,
    3,
    2,
    '2022-02-18',
    'US04'
  ),
  (
    62,
    'God of War',
    'Acción y aventura que sigue la historia de Kratos en el mundo de los dioses nórdicos.',
    3,
    3,
    3,
    2,
    '2018-04-20',
    'US05'
  ),
  (
    63,
    'Fortnite',
    'Battle Royale y sandbox donde los jugadores pueden construir estructuras.',
    4,
    4,
    4,
    3,
    '2017-07-21',
    'US06'
  ),
  (
    64,
    'Valorant',
    'FPS táctico centrado en personajes con habilidades únicas.',
    2,
    5,
    1,
    1,
    '2020-06-02',
    'US07'
  ),
  (
    65,
    'Minecraft',
    'Sandbox que permite a los jugadores construir y explorar mundos generados.',
    4,
    6,
    4,
    1,
    '2011-11-18',
    'US08'
  ),
  (
    66,
    'Apex Legends',
    'Battle Royale de disparos en primera persona con elementos futuristas.',
    4,
    7,
    4,
    1,
    '2019-02-04',
    'US09'
  ),
  (
    67,
    'Overwatch',
    'FPS centrado en equipos con personajes heroicos.',
    2,
    8,
    1,
    1,
    '2016-05-24',
    'US10'
  ),
  (
    68,
    'FIFA 23',
    'Simulador de fútbol con licencias oficiales de ligas y equipos globales.',
    5,
    9,
    1,
    3,
    '2022-09-30',
    'US11'
  ),
  (
    69,
    'NBA 2K23',
    'Simulador de baloncesto que captura la cultura y emociones del deporte.',
    5,
    10,
    1,
    3,
    '2022-09-09',
    'US12'
  ),
  (
    70,
    'Dark Souls III',
    'Juego de acción y rol con un alto grado de dificultad y mundo oscuro.',
    1,
    1,
    1,
    4,
    '2016-03-24',
    'JP13'
  ),
  (
    71,
    'Animal Crossing: New Horizons',
    'Simulador de vida donde los jugadores pueden crear y gestionar su propia isla.',
    2,
    11,
    3,
    3,
    '2020-03-20',
    'JP14'
  ),
  (
    72,
    'Super Mario Odyssey',
    'Juego de plataformas y aventuras protagonizado por Mario.',
    2,
    11,
    3,
    3,
    '2017-10-27',
    'JP15'
  ),
  (
    73,
    'The Legend of Zelda: Breath of the Wild',
    'Juego de aventuras en un vasto mundo abierto.',
    3,
    11,
    3,
    4,
    '2017-03-03',
    'JP16'
  ),
  (
    74,
    'Halo Infinite',
    'FPS con un vasto mundo abierto y una rica narrativa.',
    2,
    12,
    1,
    2,
    '2021-12-08',
    'US17'
  );

/*!40000 ALTER TABLE `videojuegos` ENABLE KEYS */;

UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

# Dump completed on 2024-05-18 15:07:54
