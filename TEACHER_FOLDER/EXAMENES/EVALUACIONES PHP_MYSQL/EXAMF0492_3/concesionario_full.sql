-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 01:44:09
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
-- Base de datos: `concesionario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alquileres`
--

INSERT INTO `alquileres` (`id`, `usuario_id`, `fecha`, `estado`) VALUES
(101, 1, '2024-06-06 15:52:56', 'En proceso'),
(102, 1, '2024-06-06 15:57:03', 'En proceso'),
(103, 1, '2024-06-06 15:59:01', 'En proceso'),
(104, 1, '2024-06-06 15:59:28', 'En proceso'),
(105, 1, '2024-06-06 15:59:01', 'En proceso'),
(106, 1, '2024-06-06 15:59:28', 'En proceso'),
(107, 1, '2024-06-06 16:04:28', 'En proceso'),
(108, 1, '2024-06-06 16:04:56', 'En proceso'),
(109, 1, '2024-06-06 16:21:06', 'En proceso'),
(110, 1, '2024-06-06 16:29:34', 'En proceso'),
(111, 1, '2024-06-06 16:31:00', 'En proceso'),
(112, 1, '2024-06-06 16:33:44', 'En proceso'),
(113, 1, '2024-06-06 16:49:41', 'En proceso'),
(114, 1, '2024-06-06 17:14:46', 'En proceso'),
(115, 1, '2024-06-06 17:14:53', 'En proceso'),
(116, 1, '2024-06-06 17:18:34', 'En proceso'),
(117, 2, '2024-06-06 17:23:29', 'En proceso'),
(118, 1, '2024-06-07 01:33:54', 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesalquileres`
--

CREATE TABLE `detallesalquileres` (
  `id` int(10) NOT NULL,
  `alquiler_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallesalquileres`
--

INSERT INTO `detallesalquileres` (`id`, `alquiler_id`, `producto_id`, `cantidad`, `subtotal`, `fechaEntrega`, `fechaDevolucion`) VALUES
(47, 101, 2, 5, 225.00, '2024-06-05', '2024-06-13'),
(48, 102, 3, 5, 325.00, '2024-06-05', '2024-06-13'),
(49, 103, 4, 5, 300.00, '2024-06-05', '2024-06-13'),
(50, 104, 5, 5, 275.00, '2024-06-05', '2024-06-13'),
(51, 105, 6, 5, 400.00, '2024-06-05', '2024-06-13'),
(52, 106, 1, 5, 200.00, '2024-06-11', '2024-06-19'),
(53, 107, 4, 3, 180.00, '2024-06-18', '2024-06-18'),
(54, 108, 6, 2, 160.00, '2024-06-13', '2024-06-28'),
(55, 109, 6, 3, 240.00, '2024-06-04', '2024-06-26'),
(56, 111, 5, 3, 165.00, '2024-06-07', '2024-06-20'),
(57, 112, 1, 3, 120.00, '2024-06-05', '2024-06-05'),
(58, 113, 2, 5, 225.00, '2024-06-05', '2024-06-05'),
(59, 116, 3, 3, 195.00, '2024-05-30', '2024-05-30'),
(60, 117, 2, 3, 135.00, '0000-00-00', '0000-00-00'),
(61, 118, 6, 4, 320.00, '2024-06-12', '2024-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Toyota Corolla', 'Un sedán compacto conocido por su excepcional confiabilidad y eficiencia de combustible.', 40.00, './repo/img/concesionario/toyota.jpg'),
(2, 'Ford F-150', 'Una camioneta robusta con alta capacidad de remolque y tecnología avanzada.', 45.00, './repo/img/concesionario/ford.jpg'),
(3, 'Tesla Model 3', 'Un sedán eléctrico con autonomía de hasta 353 millas y aceleración impresionante.', 65.00, './repo/img/concesionario/tesla.jpg'),
(4, 'Honda CR-V', 'Un SUV compacto con amplio espacio interior y características de seguridad avanzadas.', 60.00, './repo/img/concesionario/honda.jpg'),
(5, 'Chevrolet 1500', 'Una camioneta potente con múltiples opciones de motor y configuraciones de cabina.', 55.00, './repo/img/concesionario/chevrolet.jpg'),
(6, 'BMW X5', 'Un SUV de lujo con potente rendimiento, interiores premium y tecnología de vanguardia.', 80.00, './repo/img/concesionario/bmw.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `interaccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id`, `id_usuario`, `fecha`, `interaccion`) VALUES
(99, 1, '2024-05-27 17:57:54', 'LOG IN'),
(100, 1, '2024-05-27 18:34:18', 'LOG IN'),
(101, 1, '2024-05-27 18:44:13', 'LOG IN'),
(102, 1, '2024-05-27 18:55:57', 'LOG IN'),
(103, 1, '2024-06-05 17:36:03', 'LOG IN'),
(104, 1, '2024-06-05 18:07:50', 'LOG IN'),
(105, 1, '2024-06-06 11:58:55', 'LOG IN'),
(106, 1, '2024-06-06 11:59:23', 'LOG IN'),
(107, 1, '2024-06-06 13:04:49', 'LOG IN'),
(108, 1, '2024-06-06 14:05:00', 'LOG IN'),
(109, 1, '2024-06-06 14:28:13', 'LOG OUT'),
(110, 1, '2024-06-06 14:31:37', 'LOG IN'),
(111, 1, '2024-06-06 15:51:40', 'LOG IN'),
(112, 1, '2024-06-06 17:00:57', 'LOG IN'),
(113, 1, '2024-06-06 17:23:11', 'LOG OUT'),
(114, 2, '2024-06-06 17:23:19', 'LOG IN'),
(115, 1, '2024-06-06 20:10:36', 'LOG IN'),
(116, 1, '2024-06-07 01:33:42', 'LOG IN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashedPassword` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nickname`, `email`, `hashedPassword`, `telefono`, `direccion`) VALUES
(1, 'Schumacher', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor'),
(2, 'Alonso', 'use2@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioID` (`usuario_id`) USING BTREE;

--
-- Indices de la tabla `detallesalquileres`
--
ALTER TABLE `detallesalquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoID` (`alquiler_id`) USING BTREE,
  ADD KEY `productoID` (`producto_id`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteID` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT de la tabla `detallesalquileres`
--
ALTER TABLE `detallesalquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detallesalquileres`
--
ALTER TABLE `detallesalquileres`
  ADD CONSTRAINT `detallesalquileres_ibfk_1` FOREIGN KEY (`alquiler_id`) REFERENCES `alquileres` (`id`),
  ADD CONSTRAINT `detallesalquileres_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
