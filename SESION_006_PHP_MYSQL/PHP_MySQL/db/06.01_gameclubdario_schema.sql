-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2024 a las 12:21:19
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
(7, '2024-05-10', 1, 5, 1, '2024-05-17', 2, 1),
(8, '2024-05-09', 2, 6, 1, '2024-05-17', 2, 1);

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
(2, 'María', 'López', 'Diez', 'maria@mail.com', '1222', '777555', 'plaza mayor', '77788999-O', '4443333222', '2003-01-06', 0);

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
(2, 'ea', 0, 'EU', 'Los Angeles', '55555', 'Av numero 5', 'mail@ea.com');

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
(2, 'Juan', 'Miguelez', 'García', '333365556', '8333555', '666647774', 'calle alegria', 3, '2019-10-10');

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
(3, 'cuenat bancaria'),
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
(6, 'Mario Bros', 'juego plataformas', 1, 1, 1, 1, '1990-05-05', '556655');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `desarrolladores`
--
ALTER TABLE `desarrolladores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
