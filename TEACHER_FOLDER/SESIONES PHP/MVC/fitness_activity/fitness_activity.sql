# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 25-06-2024 a las 13:59:13
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
# Estructura de tabla para la tabla `actividades`
#

CREATE TABLE `actividades` (
  `id` int(10) NOT NULL,
  `id_tipo` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `consumo_Kcal_hora` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `actividades`
#

INSERT INTO `actividades` (`id`, `id_tipo`, `nombre`, `consumo_Kcal_hora`, `descripcion`) VALUES
(1, 1, 'Maratón', '400', 'Realizar maratón'),
(2, 1, '5000m', '420', 'Correr 5000m lisos'),
(3, 2, '1000m', '450', 'Correr 1000m lisos'),
(4, 2, 'Triatlon', '630', 'Realizar triatlon');

# ############################

#
# Estructura de tabla para la tabla `entrenamientos`
#

CREATE TABLE `entrenamientos` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_actividad` int(10) NOT NULL,
  `id_planning` int(10) NOT NULL,
  `duracion` int(10) NOT NULL COMMENT 'Duración en minutos',
  `fecha_inicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `entrenamientos`
#

INSERT INTO `entrenamientos` (`id`, `id_usuario`, `id_actividad`, `id_planning`, `duracion`, `fecha_inicio`) VALUES
(1, 1, 3, 2, 60, '2024-06-29 13:51:00');

# ############################

#
# Estructura de tabla para la tabla `objetivos`
#

CREATE TABLE `objetivos` (
  `id` int(10) NOT NULL,
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
# Estructura de tabla para la tabla `plannings`
#

CREATE TABLE `plannings` (
  `id` int(10) NOT NULL,
  `id_actividad_prevista` int(10) NOT NULL,
  `id_objetivo` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha_prevista` date NOT NULL,
  `estado` varchar(255) NOT NULL COMMENT 'A realizar, Completada, Cancelada, Aplazada, Modificada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Volcado de datos para la tabla `plannings`
#

INSERT INTO `plannings` (`id`, `id_actividad_prevista`, `id_objetivo`, `id_usuario`, `fecha_prevista`, `estado`) VALUES
(1, 1, 3, 1, '2024-06-30', 'A Realizar'),
(2, 2, 3, 2, '2024-06-30', 'A Realizar'),
(3, 1, 3, 1, '2024-06-30', 'A Realizar'),
(4, 2, 3, 2, '2024-06-30', 'A Realizar'),
(5, 3, 1, 1, '2024-06-30', 'A Realizar'),
(6, 4, 2, 2, '2024-06-30', 'A Realizar');

# ############################

#
# Estructura de tabla para la tabla `tipos_actividad`
#

CREATE TABLE `tipos_actividad` (
  `id` int(10) NOT NULL,
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

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
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
(2, 'Norberto', 'Fernández', 'Norbe_24', '1234', 'user2@mail.com', '1992-05-20', 90, 170);

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `actividades`
#
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTipo` (`id_tipo`);

#
# Indices de la tabla `entrenamientos`
#
ALTER TABLE `entrenamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idActivicdad` (`id_actividad`),
  ADD KEY `idUsuario` (`id_usuario`),
  ADD KEY `idPlanning` (`id_planning`);

#
# Indices de la tabla `objetivos`
#
ALTER TABLE `objetivos`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `plannings`
#
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idActividadPrevista` (`id_actividad_prevista`),
  ADD KEY `idObjetivo` (`id_objetivo`),
  ADD KEY `idUsuario2` (`id_usuario`);

#
# Indices de la tabla `tipos_actividad`
#
ALTER TABLE `tipos_actividad`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `actividades`
#
ALTER TABLE `actividades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

#
# AUTO_INCREMENT de la tabla `entrenamientos`
#
ALTER TABLE `entrenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

#
# AUTO_INCREMENT de la tabla `objetivos`
#
ALTER TABLE `objetivos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

#
# AUTO_INCREMENT de la tabla `plannings`
#
ALTER TABLE `plannings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

#
# AUTO_INCREMENT de la tabla `tipos_actividad`
#
ALTER TABLE `tipos_actividad`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

#
# AUTO_INCREMENT de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `actividades`
#
ALTER TABLE `actividades`
  ADD CONSTRAINT `idTipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_actividad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `entrenamientos`
#
ALTER TABLE `entrenamientos`
  ADD CONSTRAINT `idActivicdad` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idPlanning` FOREIGN KEY (`id_planning`) REFERENCES `plannings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `plannings`
#
ALTER TABLE `plannings`
  ADD CONSTRAINT `idActividadPrevista` FOREIGN KEY (`id_actividad_prevista`) REFERENCES `actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idObjetivo` FOREIGN KEY (`id_objetivo`) REFERENCES `objetivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUsuario2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
