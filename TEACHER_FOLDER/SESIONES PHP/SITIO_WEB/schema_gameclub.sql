# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 06-06-2024 a las 08:26:29
# Versión del servidor: 10.4.32-MariaDB
# Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

#
# Base de datos: `gameclub`
#

# ############################

#
# Estructura de tabla para la tabla `alquileres`
#

CREATE TABLE `alquileres` (
  `id` int(10) NOT NULL,
  `fechaAlquiler` date NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_videojuego` int(10) NOT NULL,
  `fechaDevolucion` date NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `id_metodoPago` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `alquileres`
#

INSERT INTO `alquileres` (`id`, `fechaAlquiler`, `id_usuario`, `id_videojuego`, `fechaDevolucion`, `id_empleado`, `id_metodoPago`) VALUES
(1, '2024-05-10', 1, 5, '2024-05-17', 2, 1),
(2, '2024-05-09', 2, 6, '2024-05-17', 2, 1),
(3, '2024-05-10', 1, 58, '2024-05-17', 6, 1),
(4, '2024-05-09', 4, 59, '2024-05-18', 8, 2),
(5, '2024-05-09', 5, 60, '2024-05-19', 7, 3),
(6, '2024-05-03', 6, 61, '2024-05-11', 11, 4),
(7, '2024-05-09', 7, 62, '2024-05-17', 12, 5),
(8, '2024-05-09', 9, 62, '2024-05-17', 4, 1),
(9, '2024-05-04', 8, 63, '2024-05-17', 8, 2),
(10, '2024-05-08', 3, 64, '2024-05-17', 3, 3),
(11, '2024-05-07', 2, 66, '2024-05-17', 2, 3),
(12, '2024-05-09', 1, 67, '2024-05-17', 11, 2),
(13, '2024-05-09', 3, 67, '2024-05-17', 10, 4),
(14, '2024-05-09', 7, 64, '2024-05-17', 9, 4),
(15, '2024-05-09', 4, 60, '2024-05-17', 7, 2),
(74, '2024-05-17', 1, 58, '2024-05-22', 13, 1),
(75, '2024-05-17', 10, 58, '2024-05-19', 13, 3),
(76, '2024-05-17', 9, 5, '2024-05-22', 13, 1),
(77, '2024-05-17', 1, 6, '2024-05-19', 10, 2),
(78, '2024-05-17', 1, 5, '2024-05-22', 13, 2),
(79, '2024-05-17', 1, 59, '2024-05-22', 13, 5),
(80, '2024-05-21', 1, 6, '2024-05-23', 5, 1),
(81, '2024-05-21', 1, 6, '2024-05-23', 5, 1),
(82, '2024-05-21', 1, 61, '2024-05-23', 5, 3),
(83, '2024-05-22', 2, 6, '2024-05-24', 8, 1),
(84, '2024-05-22', 2, 65, '2024-05-27', 8, 1),
(85, '2024-05-22', 18, 74, '2024-05-27', 8, 1),
(86, '2024-05-22', 18, 74, '2024-05-24', 8, 4);

# ############################

#
# Estructura de tabla para la tabla `categorias`
#

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `categoria` varchar(255) NOT NULL COMMENT 'vendedor / manager / administrador',
  `rango` varchar(255) NOT NULL COMMENT 'jr / sr '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `categorias`
#

INSERT INTO `categorias` (`id`, `categoria`, `rango`) VALUES
(1, 'manager', 'junior'),
(2, 'manager', 'senior'),
(3, 'vendedor', 'junior'),
(4, 'vendedor', 'senior'),
(5, 'administrador', 'na');

# ############################

#
# Estructura de tabla para la tabla `desarrolladores`
#

CREATE TABLE `desarrolladores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `indie` tinyint(1) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `desarrolladores`
#

INSERT INTO `desarrolladores` (`id`, `nombre`, `indie`, `pais`, `ciudad`, `zip`, `direccion`, `email`) VALUES
(1, 'ubisoft', 0, 'EU', 'San Francisco', '55555', 'calle Alamos', 'mail@ubisoft.com'),
(2, 'ea', 0, 'EU', 'Los Angeles', '55555', 'Av numero 5', 'mail@ea.com'),
(3, 'Desarrollador Uno', 1, 'España', 'Madrid', '28001', 'Calle Falsa 123', 'desarrollador1@ejemplo.com'),
(4, 'Desarrollador Dos', 0, 'México', 'Ciudad de México', '01000', 'Avenida Siempre Viva 456', 'desarrollador2@ejemplo.com'),
(5, 'Desarrollador Tres', 1, 'Argentina', 'Buenos Aires', 'C1001', 'Calle Perdida 789', 'desarrollador3@ejemplo.com'),
(6, 'Desarrollador Cuatro', 0, 'Chile', 'Santiago', '8320000', 'Gran Avenida 101', 'desarrollador4@ejemplo.com'),
(7, 'Desarrollador Cinco', 1, 'Colombia', 'Bogotá', '110111', 'Carrera 7 #245', 'desarrollador5@ejemplo.com'),
(8, 'Desarrollador Seis', 0, 'Perú', 'Lima', '15001', 'Jirón Zorritos 1420', 'desarrollador6@ejemplo.com'),
(9, 'Desarrollador Siete', 1, 'Venezuela', 'Caracas', '1010', 'Avenida Universidad 515', 'desarrollador7@ejemplo.com'),
(10, 'Desarrollador Ocho', 0, 'Brasil', 'São Paulo', '01001-000', 'Rua Libero Badaró 192', 'desarrollador8@ejemplo.com'),
(11, 'Desarrollador Nueve', 1, 'Uruguay', 'Montevideo', '11200', 'Bulevar Artigas 1601', 'desarrollador9@ejemplo.com'),
(12, 'Desarrollador Diez', 0, 'Paraguay', 'Asunción', '1536', 'Calle Palma 455', 'desarrollador10@ejemplo.com'),
(13, 'Desarrollador Once', 1, 'España', 'Barcelona', '08001', 'Paseo de Gracia 50', 'desarrollador11@ejemplo.com'),
(14, 'Desarrollador Doce', 0, 'México', 'Guadalajara', '44100', 'Avenida Chapultepec 230', 'desarrollador12@ejemplo.com'),
(15, 'Desarrollador Trece', 1, 'Argentina', 'Córdoba', '5000', 'Avenida Vélez Sarsfield 562', 'desarrollador13@ejemplo.com'),
(16, 'Desarrollador Catorce', 0, 'Chile', 'Valparaíso', '2340000', 'Avenida Argentina 111', 'desarrollador14@ejemplo.com'),
(17, 'Desarrollador Quince', 1, 'Colombia', 'Medellín', '050021', 'Carrera 80 #45-120', 'desarrollador15@ejemplo.com');

# ############################

#
# Estructura de tabla para la tabla `empleados`
#

CREATE TABLE `empleados` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `nSS` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `fechaAlta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `empleados`
#

INSERT INTO `empleados` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `nSS`, `telefono`, `direccion`, `id_categoria`, `fechaAlta`) VALUES
(1, 'Juan', 'Antunez', 'Delariba', '33336666', '88895555', '66664444', 'calle alamos', 2, '2016-10-10'),
(2, 'Juan', 'Miguelez', 'García', '333365556', '8333555', '666647774', 'calle alegria', 3, '2019-10-10'),
(3, 'Juan', 'Pérez', 'Gómez', '12345678A', 'SS001', '666111222', 'Calle Falsa 123, Madrid', 1, '2023-01-10'),
(4, 'Laura', 'Martín', 'Ruiz', '23456789B', 'SS002', '666333444', 'Avenida Siempre Viva 45, Barcelona', 2, '2023-01-11'),
(5, 'Carlos', 'Jiménez', 'López', '34567890C', 'SS003', '666555666', 'Plaza Mayor 6, Valencia', 3, '2023-01-12'),
(6, 'Ana', 'Morales', 'Fernández', '45678901D', 'SS004', '666777888', 'Gran Vía 22, Bilbao', 2, '2023-01-13'),
(7, 'David', 'García', 'Torres', '56789012E', 'SS005', '666999000', 'Paseo de la Reforma 5, Sevilla', 1, '2023-01-14'),
(8, 'Sofía', 'López', 'Moreno', '67890123F', 'SS006', '666111333', 'Carrera 7 50, Zaragoza', 3, '2023-01-15'),
(9, 'Marco', 'Alonso', 'Pozo', '78901234G', 'SS007', '666444555', 'Calle Nueva 32, Málaga', 1, '2023-01-16'),
(10, 'Clara', 'Sanz', 'Molina', '89012345H', 'SS008', '666666777', 'Avenida de América 19, Granada', 2, '2023-01-17'),
(11, 'Lucas', 'Gómez', 'Blanco', '90123456I', 'SS009', '666888999', 'Ronda de Atocha 8, Salamanca', 3, '2023-01-18'),
(12, 'Marta', 'Nieto', 'Vidal', '01234567J', 'SS010', '666000111', 'Camino Real 4, Córdoba', 1, '2023-01-19'),
(13, 'Antonio', 'del Pino', 'Gómez', '36363636J', '363636933', '555555', 'Calle Mayor', 3, '2024-05-05');

# ############################

#
# Estructura de tabla para la tabla `facturas`
#

CREATE TABLE `facturas` (
  `id` int(10) NOT NULL,
  `n_factura` varchar(255) NOT NULL COMMENT 'El que proporciona la API de PayPal',
  `fechaCreacion` datetime NOT NULL,
  `fechaActualizacion` datetime NOT NULL COMMENT 'Cuando cambia el estado',
  `estado` varchar(255) NOT NULL COMMENT 'El que proporciona la API de PayPal',
  `total` decimal(10,2) NOT NULL,
  `emisor` varchar(255) NOT NULL COMMENT 'El nombre del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `facturas`
#

INSERT INTO `facturas` (`id`, `n_factura`, `fechaCreacion`, `fechaActualizacion`, `estado`, `total`, `emisor`) VALUES
(8, 'INV2-SHXW-GHZT-BKBV-45ZR', '2024-06-04 13:58:11', '2024-06-04 13:58:41', 'DRAFT', 123.25, 'PEDRO'),
(9, 'INV2-54EQ-EHF3-FCP4-F6BU', '2024-06-04 14:18:31', '2024-06-04 14:19:01', 'DRAFT', 120.00, 'PEDRO'),
(10, 'INV2-WPRH-ZH3W-5GX3-F4NW', '2024-06-04 14:29:46', '2024-06-04 14:30:16', 'DRAFT', 123.00, 'PEDRO'),
(11, 'INV2-PTGT-G8RY-VB55-MA5P', '2024-06-05 08:37:16', '2024-06-05 08:37:46', 'DRAFT', 32.00, 'PEDRO'),
(12, 'INV2-ZL6J-NWG7-96HL-UMWN', '2024-06-05 09:06:59', '2024-06-05 09:07:29', 'DRAFT', 121.00, 'PEDRO'),
(13, 'INV2-C6TQ-LGLD-YQ69-FXRZ', '2024-06-05 09:17:30', '2024-06-05 09:18:00', 'DRAFT', 24.90, 'PEDRO'),
(14, 'INV2-W6ZM-SSNM-X8EE-XUNR', '2024-06-05 09:28:28', '2024-06-05 09:28:58', 'DRAFT', 23.00, 'PEDRO'),
(15, 'INV2-HFEB-E3DK-2TZZ-37BF', '2024-06-05 09:36:48', '2024-06-05 09:37:18', 'DRAFT', 300.00, 'PEDRO'),
(16, 'INV2-JQ9R-C28M-EY3M-JP4D', '2024-06-05 09:37:21', '2024-06-05 09:37:51', 'DRAFT', 233.00, 'PEDRO'),
(17, 'INV2-ZVKE-FM42-VQ3P-HU66', '2024-06-05 10:42:39', '2024-06-05 10:43:09', 'DRAFT', 21.99, 'ADMIN'),
(18, 'INV2-6KHM-RKA9-NLAH-Y475', '2024-06-05 11:44:04', '2024-06-05 11:44:34', 'DRAFT', 123.23, 'ADMIN'),
(19, 'INV2-NANM-53ZF-C242-TF96', '2024-06-05 12:45:31', '2024-06-05 12:46:01', 'DRAFT', 122.00, 'ADMIN'),
(20, 'INV2-Z5MJ-X4KS-E4FD-VBPL', '2024-06-05 13:46:01', '2024-06-05 13:46:31', 'DRAFT', 11.00, 'ADMIN');

# ############################

#
# Estructura de tabla para la tabla `generos`
#

CREATE TABLE `generos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `generos`
#

INSERT INTO `generos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'plataformas', 'género en visón lateral de 2 dimensiones'),
(2, 'conducción', 'simulación de conducción'),
(3, 'terror', 'juegos de terror'),
(4, 'shooter', 'juegos en primera persona donde se usan armas'),
(5, 'deportivo', 'juegos simulación deportes'),
(6, 'aventura', 'juegos de aventura y exploración'),
(7, 'puzzle', 'juegos de rompecabezas y lógica'),
(8, 'estrategia', 'juegos de planificación y estrategia'),
(9, 'RPG', 'juegos de rol y aventuras épicas'),
(10, 'música', 'juegos de ritmo y música'),
(11, 'simulación', 'juegos de simulación de vida y negocios'),
(12, 'arcade', 'juegos de acción rápida y puntuaciones altas'),
(13, 'educativos', 'juegos diseñados para el aprendizaje'),
(14, 'carreras', 'juegos de carreras de autos y otros vehículos'),
(15, 'peleas', 'juegos de lucha y combate'),
(16, 'plataforma', 'juegos de plataformas en 2D y 3D'),
(17, 'sandbox', 'juegos de mundo abierto y exploración libre'),
(18, 'horror', 'juegos de horror y supervivencia'),
(19, 'MMO', 'juegos multijugador masivos en línea'),
(20, 'acción-aventura', 'juegos que combinan acción y aventura'),
(21, 'táctica', 'juegos de estrategia táctica por turnos'),
(22, 'stealth', 'juegos de sigilo y espionaje'),
(23, 'party', 'juegos de fiesta y multijugador local'),
(24, 'casual', 'juegos simples y accesibles para todos'),
(25, 'educación', 'juegos que enseñan conceptos educativos y habilidades');

# ############################

#
# Estructura de tabla para la tabla `metodospago`
#

CREATE TABLE `metodospago` (
  `id` int(10) NOT NULL,
  `metodo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `metodospago`
#

INSERT INTO `metodospago` (`id`, `metodo`) VALUES
(1, 'paypal'),
(2, 'tarjeta bancaria'),
(3, 'cuenta bancaria'),
(4, 'contado'),
(5, 'bitcoins');

# ############################

#
# Estructura de tabla para la tabla `ordenespago`
#

CREATE TABLE `ordenespago` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `intent` varchar(255) NOT NULL COMMENT 'CAPTURE, AUTHORIZE',
  `currencycode` varchar(3) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `fechaOrden` datetime NOT NULL,
  `estado` varchar(255) NOT NULL COMMENT 'GENERADA, EN PROCESO, COMPLETADA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `ordenespago`
#

INSERT INTO `ordenespago` (`id`, `id_usuario`, `intent`, `currencycode`, `value`, `fechaOrden`, `estado`) VALUES
(2, 18, 'CAPTURE', 'EUR', 47.97, '2024-06-03 11:24:15', 'GENERADA'),
(3, 18, 'CAPTURE', 'EUR', 47.97, '2024-06-03 11:49:12', 'GENERADA'),
(4, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 11:54:42', 'GENERADA'),
(5, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 11:58:10', 'GENERADA'),
(6, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:00:05', 'GENERADA'),
(7, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:01:17', 'GENERADA'),
(8, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:04:37', 'GENERADA'),
(9, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:04:47', 'GENERADA'),
(10, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:09:07', 'GENERADA'),
(11, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:19:11', 'GENERADA'),
(12, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:19:28', 'GENERADA'),
(13, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:19:33', 'GENERADA'),
(14, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:21:37', 'GENERADA'),
(15, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:21:40', 'GENERADA'),
(16, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:22:06', 'GENERADA'),
(17, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:22:09', 'GENERADA'),
(18, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:22:16', 'GENERADA'),
(19, 18, 'CAPTURE', 'EUR', 36.98, '2024-06-03 12:22:23', 'GENERADA'),
(20, 18, 'CAPTURE', 'EUR', 36.98, '2024-06-03 12:26:14', 'GENERADA'),
(21, 18, 'CAPTURE', 'EUR', 36.98, '2024-06-03 12:26:21', 'GENERADA'),
(22, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:26:31', 'GENERADA'),
(23, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:26:57', 'GENERADA'),
(24, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:27:02', 'GENERADA'),
(25, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:27:08', 'GENERADA'),
(26, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:28:15', 'GENERADA'),
(27, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:28:35', 'GENERADA'),
(28, 18, 'CAPTURE', 'EUR', 68.96, '2024-06-03 12:28:41', 'GENERADA'),
(29, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:28:58', 'GENERADA'),
(30, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:32:49', 'GENERADA'),
(31, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:36:16', 'GENERADA'),
(32, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:43:27', 'GENERADA'),
(33, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:48:00', 'GENERADA'),
(34, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:51:37', 'GENERADA'),
(35, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 12:54:43', 'GENERADA'),
(36, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:01:42', 'GENERADA'),
(37, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:03:56', 'GENERADA'),
(38, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:11:48', 'GENERADA'),
(39, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:13:35', 'GENERADA'),
(40, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:14:27', 'GENERADA'),
(41, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:17:13', 'GENERADA'),
(42, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:17:57', 'GENERADA'),
(43, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:19:11', 'GENERADA'),
(44, 18, 'CAPTURE', 'EUR', 31.98, '2024-06-03 13:20:20', 'GENERADA'),
(45, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:06:27', 'GENERADA'),
(46, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:07:02', 'GENERADA'),
(47, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:09:08', 'GENERADA'),
(48, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:12:27', 'GENERADA'),
(49, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:12:45', 'GENERADA'),
(50, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:13:12', 'GENERADA'),
(51, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:14:22', 'GENERADA'),
(52, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:14:59', 'GENERADA'),
(53, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:15:40', 'GENERADA'),
(54, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:16:01', 'GENERADA'),
(55, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:16:27', 'GENERADA'),
(56, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:16:38', 'GENERADA'),
(57, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:19:32', 'GENERADA'),
(58, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:20:06', 'GENERADA'),
(59, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:20:39', 'GENERADA'),
(60, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:21:22', 'GENERADA'),
(61, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:23:47', 'GENERADA'),
(62, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:23:53', 'GENERADA'),
(63, 18, 'CAPTURE', 'EUR', 7.50, '2024-06-03 14:28:16', 'GENERADA'),
(64, 18, 'CAPTURE', 'EUR', 18.49, '2024-06-04 13:38:57', 'GENERADA');

# ############################

#
# Estructura de tabla para la tabla `pegui`
#

CREATE TABLE `pegui` (
  `id` int(10) NOT NULL,
  `pegui` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `pegui`
#

INSERT INTO `pegui` (`id`, `pegui`, `descripcion`) VALUES
(1, '7', 'mayor de 7'),
(2, '12', 'mayor de 12'),
(3, '16', 'mayor de 16'),
(4, '18', 'mayor de 18'),
(5, '0', 'todos los públicos');

# ############################

#
# Estructura de tabla para la tabla `plataformas`
#

CREATE TABLE `plataformas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `empresaMatriz` varchar(255) NOT NULL,
  `tipoLector` varchar(255) NOT NULL,
  `fechaLanzamiento` date NOT NULL,
  `coleccionista` tinyint(1) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `plataformas`
#

INSERT INTO `plataformas` (`id`, `nombre`, `empresaMatriz`, `tipoLector`, `fechaLanzamiento`, `coleccionista`, `version`) VALUES
(1, 'PlayStation 5', 'Sony', 'CD-rom', '2020-05-06', 0, '1.0'),
(2, 'PlayStation 4', 'Sony', 'CD-rom', '2016-05-06', 0, '1.0'),
(3, 'Xbox', 'Microsoft', 'CD-rom', '2012-05-06', 0, '1.0'),
(4, 'PlayStation 2', 'Sony', 'CD-rom', '2008-05-06', 0, '1.0'),
(5, 'Xbox 360', 'Microsoft', 'DVD', '2005-11-22', 0, '1.0'),
(6, 'Xbox One', 'Microsoft', 'Blu-ray', '2013-11-22', 0, '1.0'),
(7, 'Nintendo Switch', 'Nintendo', 'Cartridge', '2017-03-03', 0, '1.0'),
(8, 'Wii', 'Nintendo', 'DVD', '2006-11-19', 0, '1.0'),
(9, 'Wii U', 'Nintendo', 'Blu-ray', '2012-11-18', 0, '1.0'),
(10, 'PlayStation 3', 'Sony', 'Blu-ray', '2006-11-11', 0, '1.0'),
(11, 'PlayStation', 'Sony', 'CD-rom', '1994-12-03', 0, '1.0'),
(12, 'GameCube', 'Nintendo', 'MiniDVD', '2001-09-14', 0, '1.0'),
(13, 'Dreamcast', 'Sega', 'GD-rom', '1998-11-27', 0, '1.0'),
(14, 'Xbox Series X', 'Microsoft', 'Blu-ray', '2020-11-10', 0, '1.0'),
(15, 'PlayStation Portable', 'Sony', 'UMD', '2004-12-12', 0, '1.0'),
(16, 'Nintendo 64', 'Nintendo', 'Cartridge', '1996-06-23', 0, '1.0'),
(17, 'Super Nintendo', 'Nintendo', 'Cartridge', '1990-11-21', 0, '1.0'),
(18, 'NES', 'Nintendo', 'Cartridge', '1983-07-15', 0, '1.0'),
(19, 'Genesis', 'Sega', 'Cartridge', '1988-10-29', 0, '1.0'),
(20, 'Saturn', 'Sega', 'CD-rom', '1994-11-22', 0, '1.0'),
(21, 'Game Boy', 'Nintendo', 'Cartridge', '1989-04-21', 0, '1.0'),
(22, 'Game Boy Advance', 'Nintendo', 'Cartridge', '2001-03-21', 0, '1.0'),
(23, 'Nintendo DS', 'Nintendo', 'Cartridge', '2004-11-21', 0, '1.0'),
(24, 'Nintendo 3DS', 'Nintendo', 'Cartridge', '2011-02-26', 0, '1.0'),
(25, 'PlayStation Vita', 'Sony', 'Cartridge', '2011-12-17', 0, '1.0'),
(26, 'Neo Geo', 'SNK', 'Cartridge', '1990-04-26', 0, '1.0'),
(27, 'TurboGrafx-16', 'NEC', 'HuCard', '1987-10-30', 0, '1.0'),
(28, 'Atari 2600', 'Atari', 'Cartridge', '1977-09-11', 0, '1.0'),
(29, 'Atari 5200', 'Atari', 'Cartridge', '1982-11-01', 0, '1.0'),
(30, 'Intellivision', 'Mattel', 'Cartridge', '1980-12-03', 0, '1.0'),
(31, 'ColecoVision', 'Coleco', 'Cartridge', '1982-08-01', 0, '1.0'),
(32, 'Magnavox Odyssey', 'Magnavox', 'Cartridge', '1972-09-01', 0, '1.0'),
(33, 'Commodore 64', 'Commodore', 'Cassette', '1982-08-01', 0, '1.0'),
(34, 'Amiga', 'Commodore', 'Floppy Disk', '1985-07-23', 0, '1.0'),
(35, 'ZX Spectrum', 'Sinclair', 'Cassette', '1982-04-23', 0, '1.0'),
(36, 'Apple II', 'Apple', 'Floppy Disk', '1977-04-16', 0, '1.0'),
(37, 'Master System', 'Sega', 'Cartridge', '1985-10-20', 0, '1.0'),
(38, 'Vectrex', 'GCE', 'Cartridge', '1982-11-01', 0, '1.0'),
(39, '3DO', 'Panasonic', 'CD-rom', '1993-10-04', 0, '1.0'),
(40, 'Jaguar', 'Atari', 'Cartridge', '1993-11-23', 0, '1.0'),
(41, 'Lynx', 'Atari', 'Cartridge', '1989-09-01', 0, '1.0'),
(42, 'Neo Geo Pocket', 'SNK', 'Cartridge', '1998-10-28', 0, '1.0'),
(43, 'WonderSwan', 'Bandai', 'Cartridge', '1999-03-04', 0, '1.0'),
(44, 'PC Engine', 'NEC', 'HuCard', '1987-10-30', 0, '1.0'),
(45, 'Mega Drive', 'Sega', 'Cartridge', '1988-10-29', 0, '1.0'),
(46, 'Dreamcast 2', 'Sega', 'GD-rom', '2025-11-27', 0, '1.0'),
(47, 'PlayStation 6', 'Sony', 'Blu-ray', '2026-11-15', 0, '1.0'),
(48, 'Xbox Series Z', 'Microsoft', 'Blu-ray', '2027-11-20', 0, '1.0'),
(49, 'Switch Pro', 'Nintendo', 'Cartridge', '2025-03-03', 0, '1.0'),
(50, 'Steam Deck', 'Valve', 'Digital', '2022-02-25', 0, '1.0'),
(51, 'Amiga CD32', 'Commodore', 'CD-rom', '1993-09-17', 0, '1.0'),
(52, 'Philips CD-i', 'Philips', 'CD-rom', '1991-12-03', 0, '1.0'),
(53, 'Neo Geo CD', 'SNK', 'CD-rom', '1994-09-09', 0, '1.0'),
(54, 'N-Gage', 'Nokia', 'MMC', '2003-10-07', 0, '1.0');

# ############################

#
# Estructura de tabla para la tabla `roles`
#

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `roles`
#

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'cliente');

# ############################

#
# Estructura de tabla para la tabla `sesiones`
#

CREATE TABLE `sesiones` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `interaccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `sesiones`
#

INSERT INTO `sesiones` (`id`, `id_usuario`, `fecha`, `interaccion`) VALUES
(1, 1, '2024-05-15 10:25:26', 'LOG IN'),
(2, 1, '2024-05-15 11:40:39', 'LOG IN'),
(3, 1, '2024-05-15 13:25:36', 'LOG IN'),
(4, 1, '2024-05-15 13:56:45', 'LOG IN'),
(5, 1, '2024-05-15 13:57:03', 'LOG IN'),
(7, 1, '2024-05-16 09:14:49', 'LOG IN'),
(8, 1, '2024-05-16 09:40:52', 'LOG IN'),
(9, 1, '2024-05-16 11:26:48', 'LOG IN'),
(10, 1, '2024-05-16 12:39:58', 'LOG IN'),
(11, 1, '2024-05-16 14:05:42', 'LOG IN'),
(12, 1, '2024-05-16 14:10:41', 'LOG IN'),
(13, 1, '2024-05-16 14:17:24', 'LOG IN'),
(14, 1, '2024-05-16 14:18:06', 'LOG OUT'),
(15, 1, '2024-05-17 08:22:27', 'LOG IN'),
(16, 1, '2024-05-17 08:23:41', 'LOG OUT'),
(17, 1, '2024-05-17 08:50:22', 'LOG IN'),
(20, 1, '2024-05-17 09:24:21', 'LOG IN'),
(21, 1, '2024-05-17 09:24:32', 'LOG IN'),
(22, 1, '2024-05-17 09:31:25', 'LOG OUT'),
(23, 1, '2024-05-17 09:34:21', 'LOG IN'),
(24, 1, '2024-05-17 09:41:24', 'LOG OUT'),
(25, 1, '2024-05-17 10:44:17', 'LOG IN'),
(26, 1, '2024-05-17 10:44:32', 'LOG IN'),
(27, 1, '2024-05-17 10:44:37', 'LOG IN'),
(28, 1, '2024-05-17 10:45:05', 'LOG IN'),
(29, 1, '2024-05-17 12:02:15', 'LOG IN'),
(30, 1, '2024-05-17 12:02:51', 'LOG IN'),
(31, 1, '2024-05-17 12:03:05', 'LOG IN'),
(32, 1, '2024-05-17 13:07:41', 'LOG IN'),
(33, 1, '2024-05-20 08:24:52', 'LOG IN'),
(44, 1, '2024-05-20 12:38:10', 'LOG IN'),
(45, 1, '2024-05-20 12:39:15', 'LOG IN'),
(46, 1, '2024-05-20 12:40:30', 'LOG IN'),
(47, 1, '2024-05-20 14:05:37', 'LOG IN'),
(48, 1, '2024-05-21 08:24:57', 'LOG IN'),
(49, 1, '2024-05-21 09:36:14', 'LOG IN'),
(50, 2, '2024-05-21 10:46:16', 'LOG IN'),
(51, 1, '2024-05-21 10:49:12', 'LOG IN'),
(52, 1, '2024-05-21 12:01:56', 'LOG IN'),
(53, 1, '2024-05-21 12:58:52', 'LOG OUT'),
(54, 1, '2024-05-21 12:59:32', 'LOG IN'),
(55, 1, '2024-05-21 13:05:50', 'LOG OUT'),
(56, 1, '2024-05-21 13:07:38', 'LOG IN'),
(57, 1, '2024-05-21 13:12:47', 'LOG OUT'),
(58, 1, '2024-05-21 13:13:15', 'LOG IN'),
(59, 2, '2024-05-21 16:22:57', 'LOG IN'),
(60, 3, '2024-05-21 16:23:47', 'LOG IN'),
(61, 4, '2024-05-21 16:24:16', 'LOG IN'),
(62, 5, '2024-05-21 16:24:40', 'LOG IN'),
(63, 6, '2024-05-21 16:25:42', 'LOG IN'),
(64, 7, '2024-05-21 16:26:02', 'LOG IN'),
(65, 8, '2024-05-21 16:26:48', 'LOG IN'),
(66, 9, '2024-05-21 16:27:12', 'LOG IN'),
(67, 10, '2024-05-21 16:27:35', 'LOG IN'),
(68, 1, '2024-05-21 16:28:17', 'LOG IN'),
(69, 10, '2024-05-21 16:28:36', 'LOG IN'),
(70, 5, '2024-05-21 17:32:35', 'LOG IN'),
(71, 5, '2024-05-21 17:51:49', 'LOG OUT'),
(72, 1, '2024-05-21 17:52:11', 'LOG IN'),
(73, 1, '2024-05-21 18:03:32', 'LOG OUT'),
(74, 9, '2024-05-21 18:05:33', 'LOG IN'),
(75, 6, '2024-05-21 19:07:04', 'LOG IN'),
(76, 3, '2024-05-21 20:07:16', 'LOG IN'),
(77, 1, '2024-05-21 20:18:35', 'LOG IN'),
(78, 1, '2024-05-21 20:50:40', 'LOG IN'),
(79, 1, '2024-05-21 21:00:30', 'LOG IN'),
(80, 1, '2024-05-21 21:44:06', 'LOG IN'),
(81, 1, '2024-05-21 22:01:05', 'LOG OUT'),
(82, 2, '2024-05-21 22:01:25', 'LOG IN'),
(83, 1, '2024-05-21 23:54:42', 'LOG IN'),
(84, 1, '2024-05-21 23:58:36', 'LOG OUT'),
(85, 2, '2024-05-21 23:58:45', 'LOG IN'),
(86, 1, '2024-05-22 06:50:00', 'LOG IN'),
(87, 1, '2024-05-22 08:35:06', 'LOG IN'),
(88, 1, '2024-05-22 08:43:51', 'LOG OUT'),
(89, 2, '2024-05-22 08:44:02', 'LOG IN'),
(90, 2, '2024-05-22 08:45:16', 'LOG OUT'),
(91, 1, '2024-05-22 08:45:26', 'LOG IN'),
(92, 1, '2024-05-22 09:31:55', 'LOG IN'),
(93, 1, '2024-05-22 10:36:25', 'LOG IN'),
(94, 1, '2024-05-22 11:42:20', 'LOG IN'),
(95, 1, '2024-05-22 12:08:57', 'LOG OUT'),
(96, 1, '2024-05-22 12:09:14', 'LOG IN'),
(97, 1, '2024-05-22 13:07:12', 'LOG OUT'),
(98, 18, '2024-05-22 13:08:30', 'LOG IN'),
(99, 18, '2024-05-22 13:11:45', 'LOG OUT'),
(100, 1, '2024-05-22 13:11:57', 'LOG IN'),
(101, 1, '2024-05-22 13:12:28', 'LOG OUT'),
(102, 2, '2024-05-22 13:12:33', 'LOG IN'),
(103, 2, '2024-05-22 13:12:37', 'LOG OUT'),
(104, 18, '2024-05-22 13:12:47', 'LOG IN'),
(105, 18, '2024-05-22 13:24:54', 'LOG OUT'),
(106, 18, '2024-05-22 13:24:59', 'LOG IN'),
(107, 18, '2024-05-22 14:09:06', 'LOG OUT'),
(108, 2, '2024-05-22 14:09:17', 'LOG IN'),
(109, 2, '2024-05-22 14:16:51', 'LOG OUT'),
(110, 18, '2024-05-22 14:16:56', 'LOG IN'),
(111, 18, '2024-05-22 14:22:31', 'LOG OUT'),
(112, 2, '2024-05-22 14:22:37', 'LOG IN'),
(113, 18, '2024-05-23 08:34:08', 'LOG IN'),
(114, 18, '2024-05-23 08:58:00', 'LOG OUT'),
(115, 18, '2024-05-23 08:58:04', 'LOG IN'),
(116, 18, '2024-05-23 10:04:02', 'LOG IN'),
(117, 18, '2024-05-23 10:06:05', 'LOG OUT'),
(118, 18, '2024-05-23 10:06:11', 'LOG IN'),
(119, 18, '2024-05-23 10:15:47', 'LOG OUT'),
(120, 18, '2024-05-23 10:15:50', 'LOG IN'),
(121, 18, '2024-05-23 12:03:55', 'LOG IN'),
(122, 18, '2024-05-23 12:14:46', 'LOG OUT'),
(123, 18, '2024-05-23 12:14:57', 'LOG IN'),
(124, 18, '2024-06-03 11:05:07', 'LOG IN'),
(125, 18, '2024-06-03 12:08:59', 'LOG IN'),
(126, 18, '2024-06-03 12:28:51', 'LOG IN'),
(127, 18, '2024-06-03 14:06:19', 'LOG IN'),
(128, 18, '2024-06-04 08:25:29', 'LOG IN'),
(129, 18, '2024-06-04 08:32:40', 'LOG OUT'),
(130, 18, '2024-06-04 08:32:53', 'LOG IN'),
(131, 18, '2024-06-04 10:30:57', 'LOG IN'),
(132, 18, '2024-06-04 12:06:22', 'LOG IN'),
(133, 18, '2024-06-04 12:41:30', 'LOG OUT'),
(134, 18, '2024-06-04 12:41:36', 'LOG IN'),
(135, 18, '2024-06-04 12:45:53', 'LOG OUT'),
(136, 18, '2024-06-04 12:45:56', 'LOG IN'),
(137, 1, '2024-06-04 13:50:43', 'LOG IN'),
(138, 1, '2024-06-05 08:37:07', 'LOG IN'),
(139, 1, '2024-06-05 09:37:13', 'LOG IN'),
(140, 18, '2024-06-05 10:42:26', 'LOG IN'),
(141, 18, '2024-06-05 11:43:47', 'LOG IN'),
(142, 18, '2024-06-05 11:49:45', 'LOG OUT'),
(143, 18, '2024-06-05 11:50:49', 'LOG IN'),
(144, 18, '2024-06-05 11:50:56', 'LOG OUT'),
(145, 18, '2024-06-05 11:51:07', 'LOG IN'),
(146, 18, '2024-06-05 12:52:41', 'LOG IN'),
(147, 18, '2024-06-05 13:52:55', 'LOG IN'),
(148, 18, '2024-06-06 08:26:05', 'LOG IN');

# ############################

#
# Estructura de tabla para la tabla `tarifas`
#

CREATE TABLE `tarifas` (
  `id` int(10) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `coste` float NOT NULL,
  `paraSocios` tinyint(1) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `descuentoSocios` float NOT NULL COMMENT 'es un %'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `tarifas`
#

INSERT INTO `tarifas` (`id`, `tipo`, `coste`, `paraSocios`, `activa`, `descuentoSocios`) VALUES
(1, 'standard', 2.5, 0, 1, 30),
(2, 'premium', 3.45, 0, 1, 40),
(3, 'verano2024', 2.2, 1, 0, 0);

# ############################

#
# Estructura de tabla para la tabla `usuarios`
#

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashedPassword` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `numTarjeta` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `socio` tinyint(1) NOT NULL,
  `id_rol` int(10) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `usuarios`
#

INSERT INTO `usuarios` (`id`, `nombre`, `apellido1`, `apellido2`, `email`, `hashedPassword`, `telefono`, `direccion`, `dni`, `numTarjeta`, `fechaNacimiento`, `socio`, `id_rol`, `imagen`) VALUES
(1, 'Pedro', 'López', 'Diez', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '666555', 'plaza mayor', '88888999-O', '444555222', '2000-01-06', 1, 1, './repo/img/users/PedroLópez_2024.05.20.140629-antonio.png'),
(2, 'María', 'López', 'Diez', 'use2@mail.com', '$2y$10$N5h/AAPK23b3uvEiS/w4KeKsLzm9V1U8FOnuX56msvNeXmx5NEF4S', '777555', 'plaza mayor', '77788999-O', '4443333222', '2003-01-06', 0, 2, './repo/img/users/MaríaLópez_2024.05.21.162320-f2.jpg'),
(3, 'Lucas', 'Gómez', 'de la Serna', 'use3@mail.com', '$2y$10$NxXN8ybG6sYo0qUejG35q.0gdgKhwjY5yEwaUh.pgPR1DQt3.KcMm', '666555', 'plaza mayor', '88888699-O', '444555222', '2000-01-06', 1, 2, './repo/img/users/LucasGómez_2024.05.21.162353-h1.jpg'),
(4, 'Ramiro', 'Lorenzo', 'del Campo', 'use4@mail.com', '$2y$10$2qK/Nvtg.MC8qo6Z.brB1OVOjNQg2pXaW48UBbC2DOdC7AcpHHU8K', '777555', 'plaza mayor', '77788499-O', '4443333222', '2003-01-06', 0, 2, './repo/img/users/RamiroLorenzo_2024.05.21.162423-h2.jpg'),
(5, 'Jesús', 'Ruiz', 'Ruiz', 'use5@mail.com', '$2y$10$H9sMNHjyrNZ5.lrnZTWL4O/SIR6Ntef4/V9m.dEhMcbTW8bBrU5qu', '666555', 'plaza mayor', '88848999-O', '444555222', '2000-01-06', 1, 2, './repo/img/users/JesúsRuiz_2024.05.21.162451-h4.jpg'),
(6, 'Ana', 'García', 'Ruiz', 'use6@mail.com', '$2y$10$joYsovT2LZekyHV7NDZK0OLMz0FnUcRv3TaHYsqXDdT7.a/qIRmF2', '777555', 'plaza mayor', '77784999-O', '4443333222', '2003-01-06', 1, 2, './repo/img/users/AnaGarcía_2024.05.21.162549-f3.jpg'),
(7, 'Marino', 'Ménendez', 'Rubiera', 'use7@mail.com', '$2y$10$jGsQxNEMSWINFUjrAUUWx.NvaPhf0G0JNIPpPe2roebaz7pkPk4mO', '666555', 'plaza mayor', '84488699-O', '444555222', '2000-01-06', 1, 2, './repo/img/users/MarinoMénendez_2024.05.21.162613-h7.jpg'),
(8, 'Edelmiro', 'Marquez', 'Herrero', 'use8@mail.com', '$2y$10$HdQg/9A6is00weQQKhfw6u50/z0UkT0DHIzJeUiqki371cOVji8ki', '777555', 'plaza mayor', '44488699-O', '4443333222', '2003-01-06', 0, 2, './repo/img/users/EdelmiroMarquez_2024.05.21.162658-h5.jpg'),
(9, 'Rocío', 'Hernán', 'Guardiola', 'use9@mail.com', '$2y$10$mOyiSOs7er6TtedWu6XR2.EWnFneu/W.FuZ6B/gCbVO3X/agrMeIO', '666555', 'plaza mayor', '86888969-O', '444555222', '2000-01-06', 1, 2, './repo/img/users/RocíoHernán_2024.05.21.162718-f1.jpg'),
(10, 'Oriol', 'Sanchez', 'del Pino', 'use10@mail.com', '$2y$10$qFO7.50lUCVX1PArPRAyLOXBP8G0E5fwVuB.Bg68T1p878wYQmiHe', '777555', 'plaza mayor', '7688999-O', '4443333222', '2003-01-06', 0, 2, './repo/img/users/OriolSanchez_2024.05.21.162842-h6.jpg'),
(18, 'Admin', 'Master', 'Main', 'admin@mail.com', '$2y$10$cti5v3CKNmaCInkhg.OO..IIGNj/MwVpc.PoF6gCRAmdc7i2qsClW', '654654654', 'C/ Belderraín, 5', '65696589-C', '5555000044448888', '2000-02-02', 1, 1, './repo/img/users/AdminMaster_2024.06.04.133846-mario.png');

# ############################

#
# Estructura de tabla para la tabla `valoraciones`
#

CREATE TABLE `valoraciones` (
  `id` int(10) NOT NULL,
  `valoracion` int(10) NOT NULL,
  `id_alquiler` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `valoraciones`
#

INSERT INTO `valoraciones` (`id`, `valoracion`, `id_alquiler`) VALUES
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
(11, 5, 12),
(12, 5, 13),
(13, 5, 14),
(14, 5, 15),
(24, 3, 79),
(30, 3, 76),
(31, 2, 82),
(32, 4, 83),
(33, 5, 84),
(34, 5, 86);

# ############################

#
# Estructura de tabla para la tabla `videojuegos`
#

CREATE TABLE `videojuegos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_desarrollador` int(10) NOT NULL,
  `id_plataforma` int(10) NOT NULL,
  `id_pegui` int(10) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `isoCode` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_tarifa` int(10) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `videojuegos`
#

INSERT INTO `videojuegos` (`id`, `nombre`, `descripcion`, `id_genero`, `id_desarrollador`, `id_plataforma`, `id_pegui`, `fechaPublicacion`, `isoCode`, `imagen`, `id_tarifa`, `precio`) VALUES
(5, 'Fifa 2020', 'juego de futbol', 5, 2, 1, 1, '2020-05-05', '555555', './repo/img/videogames/Fifa2020_2024.05.22.105301.png', 1, 15.99),
(6, 'Mario Bros', 'juego plataformas', 1, 1, 1, 1, '2000-01-01', '556655', './repo/img/videogames/MarioBros_2024.05.21.201641-mario.png', 1, 15.99),
(58, 'Elden Ring', 'Un juego de rol y acción en un mundo abierto, creado por FromSoftware.', 1, 1, 1, 4, '2022-02-25', 'US01', './repo/img/videogames/EldenRing_2024.05.21.201634-elden-ring-new-header-mobile.jpg', 1, 15.99),
(59, 'The Witcher 3', 'Juego de rol de mundo abierto basado en la serie de libros The Witcher.', 1, 2, 2, 3, '2015-05-19', 'US02', './repo/img/videogames/TheWitcher3_2024.05.21.201628-The_Witcher_3-_Wild_Hunt_Cover.jpg', 1, 15.99),
(60, 'Cyberpunk 2077', 'Juego de rol de mundo abierto situado en el metrópolis futurista Night City.', 1, 2, 1, 2, '2020-12-10', 'US03', './repo/img/videogames/Cyberpunk2077_2024.05.21.201621-_Cyberpunk_2077.jpg', 1, 15.99),
(61, 'Horizon Forbidden West', 'Aventura de acción en un mundo postapocalíptico con máquinas dominantes.', 3, 3, 3, 2, '2022-02-18', 'US04', './repo/img/videogames/HorizonForbiddenWest_2024.05.21.201613-Horizon-Forbidden-West_20220302113822.jpg', 1, 15.99),
(62, 'God of War', 'Acción y aventura que sigue la historia de Kratos en el mundo de los dioses nórdicos.', 3, 3, 3, 2, '2018-04-20', 'US05', './repo/img/videogames/GodofWar_2024.05.21.201406-god-of-war-pictures-83rush6v76r4v0ul.jpg', 1, 15.99),
(63, 'Fortnite', 'Battle Royale y sandbox donde los jugadores pueden construir estructuras.', 4, 4, 4, 3, '2017-07-21', 'US06', './repo/img/videogames/Fortnite_2024.05.21.201400-Blade_2560x1440_2560x1440-95718a8046a942675a0bc4d27560e2bb.jpg', 1, 15.99),
(64, 'Valorant', 'FPS táctico centrado en personajes con habilidades únicas.', 2, 5, 1, 1, '2020-06-02', 'US07', './repo/img/videogames/Valorant_2024.05.21.201353-IMAGE_4.jpg', 1, 15.99),
(65, 'Minecraft', 'Sandbox que permite a los jugadores construir y explorar mundos generados.', 4, 6, 4, 1, '2011-11-18', 'US08', './repo/img/videogames/Minecraft_2024.05.21.201347-XLTE2PAXLJAJPPLQUO6W7542SY.jpg', 1, 15.99),
(66, 'Apex Legends', 'Battle Royale de disparos en primera persona con elementos futuristas.', 4, 7, 4, 1, '2019-02-04', 'US09', './repo/img/videogames/ApexLegends_2024.05.21.201340-apex-featured-image-16x9.jpg.adapt.crop191x100.1200w.jpg', 1, 15.99),
(67, 'Overwatch', 'FPS centrado en equipos con personajes heroicos.', 2, 8, 1, 1, '2016-05-24', 'US10', './repo/img/videogames/Overwatch_2024.05.21.201129-images.png', 1, 15.99),
(68, 'FIFA 23', 'Simulador de fútbol con licencias oficiales de ligas y equipos globales.', 5, 9, 1, 3, '2022-09-30', 'US11', './repo/img/videogames/FIFA23_2024.05.21.201123-1276415.jpg', 1, 15.99),
(69, 'NBA 2K23', 'Simulador de baloncesto que captura la cultura y emociones del deporte.', 5, 10, 1, 3, '2022-09-09', 'US12', './repo/img/videogames/NBA2K23_2024.05.21.201117-images (1).jpg', 1, 15.99),
(70, 'Dark Souls III', 'Juego de acción y rol con un alto grado de dificultad y mundo oscuro.', 1, 1, 1, 4, '2016-03-24', 'JP13', './repo/img/videogames/DarkSoulsIII_2024.05.21.201112-ds3_game-thumbnail.jpg', 1, 15.99),
(71, 'Animal Crossing: New Horizons', 'Simulador de vida donde los jugadores pueden crear y gestionar su propia isla.', 2, 11, 3, 3, '2020-03-20', 'JP14', './repo/img/videogames/AnimalCrossingNewHorizons_2024.05.22.104959.png', 1, 15.99),
(72, 'Super Mario Odyssey', 'Juego de plataformas y aventuras protagonizado por Mario.', 2, 11, 3, 3, '2017-10-27', 'JP15', './repo/img/videogames/SuperMarioOdyssey_2024.05.21.201105-alfabetajuega_super_mario_odyssey_3_0.jpg', 1, 15.99),
(73, 'The Legend of Zelda: Breath of the Wild', 'Juego de aventuras en un vasto mundo abierto con protagonista un elfo, Zelda.', 3, 11, 3, 4, '2017-03-03', 'JP16', './repo/img/videogames/TheLegendofZeldaBreathoftheWild_2024.05.22.114253.jpeg', 1, 15.99),
(74, 'HALO INFINITE WAR', 'FPS con un vasto mundo abierto y una rica narrativa inherente a una guerra por el \"anillo\", el Halo.', 20, 9, 1, 3, '2021-06-28', 'US19', './repo/img/videogames/HALOINFINITEWAR_2024.05.23.090125.jpeg', 1, 15.99);

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `alquileres`
#
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteID` (`id_usuario`),
  ADD KEY `empleadoID` (`id_empleado`),
  ADD KEY `metodopagoID` (`id_metodoPago`),
  ADD KEY `videojuegoID` (`id_videojuego`);

#
# Indices de la tabla `categorias`
#
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `desarrolladores`
#
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `empleados`
#
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`id_categoria`);

#
# Indices de la tabla `facturas`
#
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `generos`
#
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreGenero` (`nombre`);

#
# Indices de la tabla `metodospago`
#
ALTER TABLE `metodospago`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `ordenespago`
#
ALTER TABLE `ordenespago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

#
# Indices de la tabla `pegui`
#
ALTER TABLE `pegui`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `plataformas`
#
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `roles`
#
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteID` (`id_usuario`) USING BTREE;

#
# Indices de la tabla `tarifas`
#
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tarifaID` (`tipo`);

#
# Indices de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rolID` (`id_rol`);

#
# Indices de la tabla `valoraciones`
#
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_alquiler` (`id_alquiler`);

#
# Indices de la tabla `videojuegos`
#
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isoCode` (`isoCode`),
  ADD KEY `desarrolladorID` (`id_desarrollador`),
  ADD KEY `generoID` (`id_genero`),
  ADD KEY `peguiID` (`id_pegui`),
  ADD KEY `plataformaID` (`id_plataforma`),
  ADD KEY `tarifaVideojuegoID` (`id_tarifa`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `alquileres`
#
ALTER TABLE `alquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

#
# AUTO_INCREMENT de la tabla `categorias`
#
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# AUTO_INCREMENT de la tabla `desarrolladores`
#
ALTER TABLE `desarrolladores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

#
# AUTO_INCREMENT de la tabla `empleados`
#
ALTER TABLE `empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

#
# AUTO_INCREMENT de la tabla `facturas`
#
ALTER TABLE `facturas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

#
# AUTO_INCREMENT de la tabla `generos`
#
ALTER TABLE `generos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

#
# AUTO_INCREMENT de la tabla `metodospago`
#
ALTER TABLE `metodospago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# AUTO_INCREMENT de la tabla `ordenespago`
#
ALTER TABLE `ordenespago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

#
# AUTO_INCREMENT de la tabla `pegui`
#
ALTER TABLE `pegui`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# AUTO_INCREMENT de la tabla `plataformas`
#
ALTER TABLE `plataformas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

#
# AUTO_INCREMENT de la tabla `roles`
#
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

#
# AUTO_INCREMENT de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

#
# AUTO_INCREMENT de la tabla `tarifas`
#
ALTER TABLE `tarifas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

#
# AUTO_INCREMENT de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

#
# AUTO_INCREMENT de la tabla `valoraciones`
#
ALTER TABLE `valoraciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

#
# AUTO_INCREMENT de la tabla `videojuegos`
#
ALTER TABLE `videojuegos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `alquileres`
#
ALTER TABLE `alquileres`
  ADD CONSTRAINT `clienteID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleadoID` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `metodopagoID` FOREIGN KEY (`id_metodoPago`) REFERENCES `metodospago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videojuegoID` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `empleados`
#
ALTER TABLE `empleados`
  ADD CONSTRAINT `categoriaID` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `ordenespago`
#
ALTER TABLE `ordenespago`
  ADD CONSTRAINT `ordenespago_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `usuarios`
#
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rolID` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `valoraciones`
#
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `alquilerID` FOREIGN KEY (`id_alquiler`) REFERENCES `alquileres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `videojuegos`
#
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `desarrolladorID` FOREIGN KEY (`id_desarrollador`) REFERENCES `desarrolladores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generoID` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peguiID` FOREIGN KEY (`id_pegui`) REFERENCES `pegui` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plataformaID` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarifaVideojuegoID` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
