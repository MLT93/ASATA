# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 18-06-2024 a las 07:59:28
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
# Base de datos: `gestion_fichajes`
#

DROP DATABASE IF EXISTS gestion_fichajes;

CREATE DATABASE IF NOT EXISTS gestion_fichajes;

ALTER DATABASE gestion_fichajes DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE gestion_fichajes;

# ############################

#
# Estructura de tabla para la tabla `fichajes`
#

CREATE TABLE `fichajes` (
  `id` int(11) NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `tipojornada_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `fichajes`
#

INSERT INTO `fichajes` (`id`, `trabajador_id`, `tipojornada_id`, `fecha`, `hora_entrada`, `hora_salida`) VALUES
(1, 1, 1, '2024-06-18', '08:00:00', '17:00:00'),
(2, 2, 2, '2024-06-18', '09:00:00', '13:00:00'),
(3, 3, 3, '2024-06-18', '22:00:00', '06:00:00'),
(4, 4, 4, '2024-06-18', '07:00:00', '15:00:00'),
(5, 5, 5, '2024-06-18', '14:00:00', '22:00:00'),
(6, 2, 2, '2024-06-12', '09:11:00', '12:11:00');

# ############################

#
# Estructura de tabla para la tabla `tipojornadas`
#

CREATE TABLE `tipojornadas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `tipojornadas`
#

INSERT INTO `tipojornadas` (`id`, `descripcion`) VALUES
(1, 'Jornada Completa'),
(2, 'Media Jornada'),
(3, 'Turno Nocturno'),
(4, 'Turno Mañana'),
(5, 'Turno Tarde');

# ############################

#
# Estructura de tabla para la tabla `trabajadores`
#

CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `trabajadores`
#

INSERT INTO `trabajadores` (`id`, `nombre`, `email`) VALUES
(1, 'Juan Pérez', 'juan.perez@example.com'),
(2, 'María García', 'maria.garcia@example.com'),
(3, 'Carlos Sánchez', 'carlos.sanchez@example.com'),
(4, 'Ana Fernández', 'ana.fernandez@example.com'),
(5, 'Luis Gómez', 'luis.gomez@example.com');

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `fichajes`
#
ALTER TABLE `fichajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajador_id` (`trabajador_id`),
  ADD KEY `tipojornada_id` (`tipojornada_id`);

#
# Indices de la tabla `tipojornadas`
#
ALTER TABLE `tipojornadas`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `trabajadores`
#
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `fichajes`
#
ALTER TABLE `fichajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

#
# AUTO_INCREMENT de la tabla `tipojornadas`
#
ALTER TABLE `tipojornadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# AUTO_INCREMENT de la tabla `trabajadores`
#
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `fichajes`
#
ALTER TABLE `fichajes`
  ADD CONSTRAINT `fichajes_ibfk_1` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajadores` (`id`),
  ADD CONSTRAINT `fichajes_ibfk_2` FOREIGN KEY (`tipojornada_id`) REFERENCES `tipojornadas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
