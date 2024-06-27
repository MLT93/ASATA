# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 27-06-2024 a las 09:16:01
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
# Base de datos: `fitness_activity`
#

DROP DATABASE IF EXISTS fitness_activity;

CREATE DATABASE IF NOT EXISTS fitness_activity;

ALTER DATABASE fitness_activity DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE fitness_activity;

# ############################

#
# Estructura de tabla para la tabla `objetivos`
#

DROP TABLE IF EXISTS `objetivos`;

CREATE TABLE `objetivos` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `consumo_Kcal_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `objetivos`
#

INSERT INTO `objetivos` (`id`, `consumo_Kcal_total`) VALUES
(1, 2600),
(2, 3000),
(3, 1800);

# ############################

#
# Estructura de tabla para la tabla `tipos_actividad`
#

DROP TABLE IF EXISTS `tipos_actividad`;

CREATE TABLE `tipos_actividad` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `tipo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `tipos_actividad`
#

INSERT INTO `tipos_actividad` (`id`, `tipo`, `descripcion`) VALUES
(1, 'Ciclismo', 'Spinning'),
(2, 'Musculación', 'Levantamiento de pesas');

# ############################

#
# Estructura de tabla para la tabla `usuarios`
#

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `usuarios`
#

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nickname`, `hashed_password`, `email`, `fecha_nacimiento`, `peso`, `altura`) VALUES
(1, 'Casimiro', 'De Martín', 'Cas_23', '1234', 'user1@mail.com', '1990-05-06', 85, 175),
(2, 'Norberto', 'Fernández', 'Norbe_24', '1234', 'user2@mail.com', '1992-05-20', 90, 170),
(3, 'Freud', 'Sigmund', 'freSi_89', '1234', 'user4@mail.com', '1989-06-07', 90, 170);

# ############################

#
# Estructura de tabla para la tabla `actividades`
#

DROP TABLE IF EXISTS `actividades`;

CREATE TABLE `actividades` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_tipo_actividad` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `consumo_Kcal_hora` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  FOREIGN KEY (id_tipo_actividad) REFERENCES tipos_actividad (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `actividades`
#

INSERT INTO `actividades` (`id`, `id_tipo_actividad`, `nombre`, `consumo_Kcal_hora`, `descripcion`) VALUES
(1, 1, 'Maratón', '400', 'Realizar maratón'),
(2, 1, '5000m', '420', 'Correr 5000m lisos'),
(3, 2, '1000m', '450', 'Correr 1000m lisos'),
(4, 2, 'Triatlon', '630', 'Realizar triatlon');

# ############################

#
# Estructura de tabla para la tabla `plannings`
#

DROP TABLE IF EXISTS `plannings`;

CREATE TABLE `plannings` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_actividad` int(10) NOT NULL,
  `id_objetivo` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha_prevista` date NOT NULL,
  `estado` varchar(255) NOT NULL COMMENT 'A realizar, Completada, Cancelada, Aplazada, Modificada',
  FOREIGN KEY (id_actividad) REFERENCES actividades (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_objetivo) REFERENCES objetivos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `plannings`
#

INSERT INTO `plannings` (`id`, `id_actividad`, `id_objetivo`, `id_usuario`, `fecha_prevista`, `estado`) VALUES
(1, 1, 3, 1, '2024-06-30', 'A Realizar'),
(2, 2, 3, 2, '2024-06-30', 'A Realizar'),
(3, 1, 3, 1, '2024-06-30', 'A Realizar'),
(4, 2, 3, 2, '2024-06-30', 'A Realizar'),
(5, 3, 1, 1, '2024-06-30', 'A Realizar'),
(6, 4, 2, 2, '2024-06-30', 'A Realizar');

# ############################

#
# Estructura de tabla para la tabla `entrenamientos`
#

DROP TABLE IF EXISTS `entrenamientos`;

CREATE TABLE `entrenamientos` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `id_actividad` int(10) NOT NULL,
  `id_planning` int(10) NOT NULL,
  `duracion` int(10) NOT NULL COMMENT 'Duración en minutos',
  `fecha_inicio` datetime NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_actividad) REFERENCES actividades (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_planning) REFERENCES plannings (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `entrenamientos`
#

INSERT INTO `entrenamientos` (`id`, `id_usuario`, `id_actividad`, `id_planning`, `duracion`, `fecha_inicio`) VALUES
(1, 1, 3, 2, 60, '2024-06-29 13:51:00');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
