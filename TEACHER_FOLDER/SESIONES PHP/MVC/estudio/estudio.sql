# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 24#06#2024 a las 09:22:52
# Versión del servidor: 10.4.32#MariaDB
# Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

#
# Base de datos: `estudio`
#

DROP DATABASE IF EXISTS estudio;

CREATE DATABASE IF NOT EXISTS estudio;

ALTER DATABASE estudio DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

USE estudio;

# ############################

#
# Estructura de tabla para la tabla `alumnos`
#

CREATE TABLE `alumnos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `id_grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `aulas`
#

CREATE TABLE `aulas` (
  `id` int(10) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `planta` varchar(255) NOT NULL,
  `numeroAula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `calendarios`
#

CREATE TABLE `calendarios` (
  `id` int(10) NOT NULL,
  `id_convocatoria` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `calificaciones`
#

CREATE TABLE `calificaciones` (
  `id` int(10) NOT NULL,
  `id_alumno` int(10) NOT NULL,
  `id_evaluacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `clases`
#

CREATE TABLE `clases` (
  `id` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_aula` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `id_profesor` int(10) NOT NULL,
  `id_horario` int(10) NOT NULL,
  `id_calendario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `convocatorias`
#

CREATE TABLE `convocatorias` (
  `id` int(10) NOT NULL,
  `anio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `cursos`
#

CREATE TABLE `cursos` (
  `id` int(10) NOT NULL,
  `nombreCurso` varchar(255) NOT NULL,
  `horas` int(10) NOT NULL,
  `nivel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `evaluaciones`
#

CREATE TABLE `evaluaciones` (
  `id` int(10) NOT NULL,
  `id_calendario` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `horaRealizacion` time NOT NULL,
  `duracion` int(10) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `grupos`
#

CREATE TABLE `grupos` (
  `id` int(10) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `horarios`
#

CREATE TABLE `horarios` (
  `id` int(10) NOT NULL,
  `horario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

#
# Estructura de tabla para la tabla `profesores`
#

CREATE TABLE `profesores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `alumnos`
#
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupoID` (`id_grupo`);

#
# Indices de la tabla `aulas`
#
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `calendarios`
#
ALTER TABLE `calendarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `convocatoriaID` (`id_convocatoria`);

#
# Indices de la tabla `calificaciones`
#
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumnoID` (`id_alumno`),
  ADD KEY `evaluacionID` (`id_evaluacion`);

#
# Indices de la tabla `clases`
#
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aulaIDclase` (`id_aula`),
  ADD KEY `calendarioIDclase` (`id_calendario`),
  ADD KEY `cursoIDclase` (`id_curso`),
  ADD KEY `grupoIDclase` (`id_grupo`),
  ADD KEY `horarioIDclase` (`id_horario`),
  ADD KEY `profesorIDclase` (`id_profesor`);

#
# Indices de la tabla `convocatorias`
#
ALTER TABLE `convocatorias`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `cursos`
#
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `evaluaciones`
#
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calendarioID` (`id_calendario`),
  ADD KEY `cursoID` (`id_curso`),
  ADD KEY `grupoIDeval` (`id_grupo`);

#
# Indices de la tabla `grupos`
#
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `horarios`
#
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `profesores`
#
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `alumnos`
#
ALTER TABLE `alumnos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `aulas`
#
ALTER TABLE `aulas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `calendarios`
#
ALTER TABLE `calendarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `calificaciones`
#
ALTER TABLE `calificaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `clases`
#
ALTER TABLE `clases`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `convocatorias`
#
ALTER TABLE `convocatorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `cursos`
#
ALTER TABLE `cursos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `evaluaciones`
#
ALTER TABLE `evaluaciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `grupos`
#
ALTER TABLE `grupos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `horarios`
#
ALTER TABLE `horarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# AUTO_INCREMENT de la tabla `profesores`
#
ALTER TABLE `profesores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `alumnos`
#
ALTER TABLE `alumnos`
  ADD CONSTRAINT `grupoID` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `calendarios`
#
ALTER TABLE `calendarios`
  ADD CONSTRAINT `convocatoriaID` FOREIGN KEY (`id_convocatoria`) REFERENCES `convocatorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `calificaciones`
#
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `alumnoID` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluacionID` FOREIGN KEY (`id_evaluacion`) REFERENCES `evaluaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `clases`
#
ALTER TABLE `clases`
  ADD CONSTRAINT `aulaIDclase` FOREIGN KEY (`id_aula`) REFERENCES `aulas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calendarioIDclase` FOREIGN KEY (`id_calendario`) REFERENCES `calendarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursoIDclase` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupoIDclase` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horarioIDclase` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesorIDclase` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `evaluaciones`
#
ALTER TABLE `evaluaciones`
  ADD CONSTRAINT `calendarioID` FOREIGN KEY (`id_calendario`) REFERENCES `calendarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursoID` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupoIDeval` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
