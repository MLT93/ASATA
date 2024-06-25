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
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `id_grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `alumnos` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`, `id_grupo`) VALUES
(1, 'Juan', 'García', 'Pérez', '12345679A', 1),
(2, 'María', 'López', 'Martínez', '98765432B', 1),
(3, 'Pedro', 'Fernández', 'Sánchez', '56789012C', 1),
(4, 'Ana', 'Rodríguez', 'Gómez', '34567890D', 2),
(5, 'Carlos', 'Martín', 'Hernández', '78901234E', 2),
(6, 'Laura', 'Pérez', 'González', '23456789F', 2),
(7, 'David', 'Sanz', 'Ruiz', '89012345G', 3),
(8, 'Elena', 'Gómez', 'Jiménez', '45678901H', 3),
(9, 'Javier', 'Muñoz', 'López', '01234567I', 3),
(10, 'Sara', 'Ortega', 'Vega', '67890123J', 4),
(11, "Luis", "Ramirez", "Fernández", "33789545-K", 4),
(12, "Jose", "Ayala", "De Martín", "90599545-Y", 4);

# ############################

#
# Estructura de tabla para la tabla `aulas`
#

CREATE TABLE `aulas` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `planta` varchar(255) NOT NULL,
  `numeroAula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `aulas` (`id`, `tag`, `planta`, `numeroAula`) VALUES
(1, 'Aula A', 1, 10),
(2, 'Aula B', 1, 11),
(3, 'Aula C', 1, 12),
(4, 'Aula D', 2, 13),
(5, 'Aula E', 2, 14),
(6, 'Aula F', 2, 15);

# ############################

#
# Estructura de tabla para la tabla `convocatorias`
#

CREATE TABLE `convocatorias` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `anio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `convocatorias` (`id`, `anio`) VALUES
(1, '2005'),
(2, '2006'),
(3, '2007'),
(4, '2008'),
(5, '2016'),
(6, '2017'),
(7, '2018'),
(8, '2019'),
(9, '2021'),
(10, '2023'),
(11, '2024');

# ############################

#
# Estructura de tabla para la tabla `calendarios`
#

CREATE TABLE `calendarios` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_convocatoria` int(10) NOT NULL,
  `fecha` date NOT NULL,
  FOREIGN KEY (id_convocatoria) REFERENCES convocatorias (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `calendarios` (`id`, `id_convocatoria`, `fecha`) VALUES
(1, 1, '2005-06-23'),
(2, 11, '2006-06-13'),
(3, 4, '2007-06-25'),
(4, 5, '2008-05-28'),
(5, 4, '2016-06-12'),
(6, 6, '2017-06-04'),
(7, 9, '2018-06-30'),
(8, 7, '2019-07-03'),
(9, 8, '2021-06-15'),
(10, 10, '2023-06-28'),
(11, 2, '2024-06-20');

# ############################

#
# Estructura de tabla para la tabla `cursos`
#

CREATE TABLE `cursos` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombreCurso` varchar(255) NOT NULL,
  `horas` int(10) NOT NULL,
  `nivel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cursos` (`id`, `nombreCurso`, `horas`, `nivel`) VALUES
(1, 'Aplicaciones Web', 600, 3),
(2, 'Inglés B1', 260, 2),
(3, 'Inglés B2', 300, 3),
(4, 'Ofimática', 260, 1),
(5, 'Introducción a bases de datos', 480, 2),
(6, 'Economía', 720, 3),
(7, 'Gestión administrativa', 370, 1);

# ############################

#
# Estructura de tabla para la tabla `grupos`
#

CREATE TABLE `grupos` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

# ############################

INSERT INTO `grupos` (`id`, `tag`) VALUES
(1, 'Grupo A'),
(2, 'Grupo B'),
(3, 'Grupo C'),
(4, 'Grupo D'),
(5, 'Grupo E'),
(6, 'Grupo F');

#
# Estructura de tabla para la tabla `horarios`
#

CREATE TABLE `horarios` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `horario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `horarios` (`id`, `horario`) VALUES
(1, 'Mañana'),
(2, 'Tarde');

# ############################

#
# Estructura de tabla para la tabla `profesores`
#

CREATE TABLE `profesores` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `profesores` (`id`, `nombre`, `apellido1`, `apellido2`, `dni`) VALUES
(1, 'Juan', 'García', 'Pérez', '12345678-A'),
(2, 'María', 'López', 'Martínez', '98765432-B'),
(3, 'Pedro', 'Fernández', 'Sánchez', '56789012-C'),
(4, 'Ana', 'Rodríguez', 'Gómez', '34567890-D'),
(5, 'Carlos', 'Martín', 'Hernández', '78901234-E');

# ############################

#
# Estructura de tabla para la tabla `evaluaciones`
#

CREATE TABLE `evaluaciones` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_calendario` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `horaRealizacion` time NOT NULL,
  `duracion` int(10) NOT NULL COMMENT 'El número corresponde a las horas',
  `tipo` varchar(255) NOT NULL,
  FOREIGN KEY (id_calendario) REFERENCES calendarios (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_curso) REFERENCES cursos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_grupo) REFERENCES grupos (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `evaluaciones` (`id`, `id_calendario`, `id_curso`, `id_grupo`, `horaRealizacion`, `duracion`, `tipo`) VALUES
(1, 1, 1, 3, '08:00', 6, ''),
(2, 3, 3, 3, '08:30', 4, ''),
(3, 4, 2, 3, '16:00', 4, ''),
(4, 2, 5, 3, '17:00', 4, ''),
(5, 11, 7, 3, '08:15', 4, ''),
(6, 9, 6, 3, '08:00', 6, ''),
(7, 6, 4, 3, '09:30', 4, '');

# ############################

#
# Estructura de tabla para la tabla `calificaciones`
#

CREATE TABLE `calificaciones` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_alumno` int(10) NOT NULL,
  `id_evaluacion` int(10) NOT NULL,
  FOREIGN KEY (id_alumno) REFERENCES alumnos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_evaluacion) REFERENCES evaluaciones (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `calificaciones` (`id`, `id_alumno`, `id_evaluacion`) VALUES
(1, 1, 1),
(2, 6, 5),
(3, 5, 3),
(4, 7, 6),
(5, 11, 4),
(6, 4, 2),
(7, 3, 7);

# ############################

#
# Estructura de tabla para la tabla `clases`
#

CREATE TABLE `clases` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT,
  `id_curso` int(10) NOT NULL,
  `id_aula` int(10) NOT NULL,
  `id_grupo` int(10) NOT NULL,
  `id_profesor` int(10) NOT NULL,
  `id_horario` int(10) NOT NULL,
  `id_calendario` int(10) NOT NULL,
  FOREIGN KEY (id_curso) REFERENCES cursos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_aula) REFERENCES aulas (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_grupo) REFERENCES grupos (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_profesor) REFERENCES profesores (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_horario) REFERENCES horarios (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_calendario) REFERENCES calendarios (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clases` (`id`, `id_curso`, `id_aula`, `id_grupo`, `id_profesor`, `id_horario`, `id_calendario`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 4, 5, 3, 2, 2, 4),
(3, 2, 3, 5, 3, 1, 7),
(4, 7, 6, 2, 4, 2, 10),
(5, 6, 4, 4, 5, 1, 11),
(6, 3, 2, 6, 3, 1, 10);

# ############################

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
