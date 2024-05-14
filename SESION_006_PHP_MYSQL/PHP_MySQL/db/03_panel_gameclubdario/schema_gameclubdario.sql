-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2024 a las 12:56:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gameclubdario`
--

CREATE DATABASE IF NOT EXISTS gameclubdario;

ALTER DATABASE gameclubdario CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE gameclubdario;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `id` int(10) NOT NULL,
  `fechaAlquiler` date NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `id_videojuego` int(10) NOT NULL,
  `id_tarifas` int(10) NOT NULL,
  `fechaDevolucion` date NOT NULL,
  `id_empleado` int(10) NOT NULL,
  `id_metodoPago` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alquileres`
--

INSERT INTO `alquileres` (`id`, `fechaAlquiler`, `id_cliente`, `id_videojuego`, `id_tarifas`, `fechaDevolucion`, `id_empleado`, `id_metodoPago`) VALUES
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
(12, '2024-05-09', 1, 67, 1, '2024-05-17', 11, 2),
(13, '2024-05-09', 3, 67, 1, '2024-05-17', 10, 4),
(14, '2024-05-09', 7, 64, 1, '2024-05-17', 9, 4),
(15, '2024-05-09', 4, 60, 1, '2024-05-17', 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `categoria` varchar(255) NOT NULL COMMENT 'vendedor / manager / administrador',
  `rango` varchar(255) NOT NULL COMMENT 'jr / sr '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `rango`) VALUES
(1, 'manager', 'junior'),
(2, 'manager', 'senior'),
(3, 'vendedor', 'junior'),
(4, 'vendedor', 'senior'),
(5, 'administrador', 'na');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `dni` varchar(255) NOT NULL,
  `numTarjeta` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `socio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido1`, `apellido2`, `email`, `password`, `telefono`, `direccion`, `dni`, `numTarjeta`, `fechaNacimiento`, `socio`) VALUES
(1, 'Pedro', 'López', 'Diez', 'pedro@mail.com', '1111', '666555', 'plaza mayor', '88888999-O', '444555222', '2000-01-06', 1),
(2, 'María', 'López', 'Diez', 'maria@mail.com', '1222', '777555', 'plaza mayor', '77788999-O', '4443333222', '2003-01-06', 0),
(3, 'Lucas', 'Gómez', 'de la Serna', 'pedro@mail.com', '1111', '666555', 'plaza mayor', '88888699-O', '444555222', '2000-01-06', 1),
(4, 'Ramiro', 'Cervantes', 'Saavedra', 'maria@mail.com', '1222', '777555', 'plaza mayor', '77788499-O', '4443333222', '2003-01-06', 0),
(5, 'Jesús', 'García', 'Márquez', 'pedro@mail.com', '1111', '666555', 'plaza mayor', '88848999-O', '444555222', '2000-01-06', 1),
(6, 'Ana', 'Menéndez', 'Pidal', 'maria@mail.com', '1222', '777555', 'plaza mayor', '77784999-O', '4443333222', '2003-01-06', 1),
(7, 'Marino', 'Pérez', 'Galdós', 'pedro@mail.com', '1111', '666555', 'plaza mayor', '84488699-O', '444555222', '2000-01-06', 1),
(8, 'Edelmiro', 'Otero', 'Pedrayo', 'maria@mail.com', '1222', '777555', 'plaza mayor', '44488699-O', '4443333222', '2003-01-06', 0),
(9, 'Rocío', 'Pardo', 'Bazán', 'pedro@mail.com', '1111', '666555', 'plaza mayor', '86888969-O', '444555222', '2000-01-06', 1),
(10, 'Oriol', 'Sánchez', 'Dragó', 'maria@mail.com', '1222', '777555', 'plaza mayor', '7688999-O', '4443333222', '2003-01-06', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladores`
--

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

--
-- Volcado de datos para la tabla `desarrolladores`
--

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

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

--
-- Volcado de datos para la tabla `empleados`
--

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
(12, 'Marta', 'Nieto', 'Vidal', '01234567J', 'SS010', '666000111', 'Camino Real 4, Córdoba', 1, '2023-01-19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`, `descripcion`) VALUES
(1, 'plataformas', 'género en visón lateral de 2 dimensiones'),
(2, 'conducción', 'simulación de conducción'),
(3, 'terror', 'juegos de terror'),
(4, 'shooter', 'juegos en primera persona donde se usan armas'),
(5, 'deportivo', 'juegos simulación deportes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodospago`
--

CREATE TABLE `metodospago` (
  `id` int(10) NOT NULL,
  `metodo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `metodospago`
--

INSERT INTO `metodospago` (`id`, `metodo`) VALUES
(1, 'paypal'),
(2, 'tarjeta bancaria'),
(3, 'Cuenta bancaria'),
(4, 'contado'),
(5, 'bitcoins');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pegui`
--

CREATE TABLE `pegui` (
  `id` int(10) NOT NULL,
  `pegui` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pegui`
--

INSERT INTO `pegui` (`id`, `pegui`, `descripcion`) VALUES
(1, '7', 'mayor de 7'),
(2, '12', 'mayor de 12'),
(3, '16', 'mayor de 16'),
(4, '18', 'mayor de 18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `empresaMatriz` varchar(255) NOT NULL,
  `tipoLector` varchar(255) NOT NULL,
  `fechaLanzamiento` date NOT NULL,
  `coleccionista` tinyint(1) NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre`, `empresaMatriz`, `tipoLector`, `fechaLanzamiento`, `coleccionista`, `version`) VALUES
(1, 'PlayStation 5', 'Sony', 'CD-rom', '2020-05-06', 0, '1.0'),
(2, 'PlayStation 4', 'Sony', 'CD-rom', '2016-05-06', 0, '1.0'),
(3, 'Xbox', 'Microsoft', 'CD-rom', '2012-05-06', 0, '1.0'),
(4, 'PlayStation 2', 'Sony', 'CD-rom', '2008-05-06', 0, '1.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(10) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `coste` float NOT NULL,
  `paraSocios` tinyint(1) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  `descuentoSocios` float NOT NULL COMMENT 'es un %'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`id`, `tipo`, `coste`, `paraSocios`, `activa`, `descuentoSocios`) VALUES
(1, 'standard', 2, 0, 1, 30),
(2, 'premium', 3, 0, 1, 40),
(3, 'verano2024', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int(11) NOT NULL,
  `valoracion` int(10) NOT NULL,
  `id_alquiler` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

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
(14, 5, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_genero` int(10) NOT NULL,
  `id_desarrollador` int(10) NOT NULL,
  `id_plataforma` int(10) NOT NULL,
  `id_pegui` int(10) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `isoCode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre`, `descripcion`, `id_genero`, `id_desarrollador`, `id_plataforma`, `id_pegui`, `fechaPublicacion`, `isoCode`) VALUES
(5, 'Fifa 2020', 'juego de futbol', 5, 2, 1, 1, '2020-05-05', '555555'),
(6, 'Mario Bros', 'juego plataformas', 1, 1, 1, 1, '2000-01-01', '556655'),
(58, 'Elden Ring', 'Un juego de rol y acción en un mundo abierto, creado por FromSoftware.', 1, 1, 1, 4, '2022-02-25', 'US01'),
(59, 'The Witcher 3', 'Juego de rol de mundo abierto basado en la serie de libros The Witcher.', 1, 2, 2, 3, '2015-05-19', 'US02'),
(60, 'Cyberpunk 2077', 'Juego de rol de mundo abierto situado en el metrópolis futurista Night City.', 1, 2, 1, 2, '2020-12-10', 'US03'),
(61, 'Horizon Forbidden West', 'Aventura de acción en un mundo postapocalíptico con máquinas dominantes.', 3, 3, 3, 2, '2022-02-18', 'US04'),
(62, 'God of War', 'Acción y aventura que sigue la historia de Kratos en el mundo de los dioses nórdicos.', 3, 3, 3, 2, '2018-04-20', 'US05'),
(63, 'Fortnite', 'Battle Royale y sandbox donde los jugadores pueden construir estructuras.', 4, 4, 4, 3, '2017-07-21', 'US06'),
(64, 'Valorant', 'FPS táctico centrado en personajes con habilidades únicas.', 2, 5, 1, 1, '2020-06-02', 'US07'),
(65, 'Minecraft', 'Sandbox que permite a los jugadores construir y explorar mundos generados.', 4, 6, 4, 1, '2011-11-18', 'US08'),
(66, 'Apex Legends', 'Battle Royale de disparos en primera persona con elementos futuristas.', 4, 7, 4, 1, '2019-02-04', 'US09'),
(67, 'Overwatch', 'FPS centrado en equipos con personajes heroicos.', 2, 8, 1, 1, '2016-05-24', 'US10'),
(68, 'FIFA 23', 'Simulador de fútbol con licencias oficiales de ligas y equipos globales.', 5, 9, 1, 3, '2022-09-30', 'US11'),
(69, 'NBA 2K23', 'Simulador de baloncesto que captura la cultura y emociones del deporte.', 5, 10, 1, 3, '2022-09-09', 'US12'),
(70, 'Dark Souls III', 'Juego de acción y rol con un alto grado de dificultad y mundo oscuro.', 1, 1, 1, 4, '2016-03-24', 'JP13'),
(71, 'Animal Crossing: New Horizons', 'Simulador de vida donde los jugadores pueden crear y gestionar su propia isla.', 2, 11, 3, 3, '2020-03-20', 'JP14'),
(72, 'Super Mario Odyssey', 'Juego de plataformas y aventuras protagonizado por Mario.', 2, 11, 3, 3, '2017-10-27', 'JP15'),
(73, 'The Legend of Zelda: Breath of the Wild', 'Juego de aventuras en un vasto mundo abierto.', 3, 11, 3, 4, '2017-03-03', 'JP16'),
(74, 'Halo Infinite', 'FPS con un vasto mundo abierto y una rica narrativa.', 2, 12, 1, 2, '2021-12-08', 'US17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteID` (`id_cliente`),
  ADD KEY `empleadoID` (`id_empleado`),
  ADD KEY `metodopagoID` (`id_metodoPago`),
  ADD KEY `tarifasID` (`id_tarifas`),
  ADD KEY `videojuegoID` (`id_videojuego`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoriaID` (`id_categoria`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombreGenero` (`nombre`);

--
-- Indices de la tabla `metodospago`
--
ALTER TABLE `metodospago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pegui`
--
ALTER TABLE `pegui`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alquilerID` (`id_alquiler`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isoCode` (`isoCode`),
  ADD KEY `desarrolladorID` (`id_desarrollador`),
  ADD KEY `generoID` (`id_genero`),
  ADD KEY `peguiID` (`id_pegui`),
  ADD KEY `plataformaID` (`id_plataforma`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `metodospago`
--
ALTER TABLE `metodospago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pegui`
--
ALTER TABLE `pegui`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `clienteID` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleadoID` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `metodopagoID` FOREIGN KEY (`id_metodoPago`) REFERENCES `metodospago` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarifasID` FOREIGN KEY (`id_tarifas`) REFERENCES `tarifas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `videojuegoID` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `categoriaID` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `alquilerID` FOREIGN KEY (`id_alquiler`) REFERENCES `alquileres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `desarrolladorID` FOREIGN KEY (`id_desarrollador`) REFERENCES `desarrolladores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `generoID` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peguiID` FOREIGN KEY (`id_pegui`) REFERENCES `pegui` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plataformaID` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
