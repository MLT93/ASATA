-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 12:10:11
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fitness_activity`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plannings`
--

CREATE TABLE `plannings` (
  `id` int(10) NOT NULL,
  `id_actividad_prevista` int(10) NOT NULL,
  `id_objetivo` int(10) NOT NULL,
  `fecha_prevista` date NOT NULL,
  `estado` varchar(255) NOT NULL COMMENT 'A realizar, Completada, Cancelada, Aplazada, Modificada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plannings`
--

INSERT INTO `plannings` (`id`, `id_actividad_prevista`, `id_objetivo`, `fecha_prevista`, `estado`) VALUES
(1, 1, 3, '2024-06-30', 'A Realizar'),
(2, 2, 3, '2024-06-30', 'A Realizar'),
(3, 1, 3, '2024-06-30', 'A Realizar'),
(4, 2, 3, '2024-06-30', 'A Realizar'),
(5, 3, 1, '2024-06-30', 'A Realizar'),
(6, 4, 2, '2024-06-30', 'A Realizar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idActividadPrevista` (`id_actividad_prevista`),
  ADD KEY `idObjetivo` (`id_objetivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plannings`
--
ALTER TABLE `plannings`
  ADD CONSTRAINT `idActividadPrevista` FOREIGN KEY (`id_actividad_prevista`) REFERENCES `actividades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idObjetivo` FOREIGN KEY (`id_objetivo`) REFERENCES `objetivos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
