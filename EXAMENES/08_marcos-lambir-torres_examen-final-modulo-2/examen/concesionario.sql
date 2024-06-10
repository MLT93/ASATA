# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 10-06-2024 a las 12:08:25
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
# Base de datos: `concesionario`
#

DROP DATABASE IF EXISTS concesionario;

CREATE DATABASE IF NOT EXISTS concesionario;

ALTER DATABASE concesionario DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE concesionario;

# ############################

#
# Estructura de tabla para la tabla `alquileres`
#

CREATE TABLE `alquileres` (
  `id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `alquileres`
#

INSERT INTO `alquileres` (`id`, `usuario_id`, `fecha`, `estado`) VALUES
(1, 1, '2024-06-07 10:00:00', 'En proceso'),
(2, 1, '2024-06-07 10:00:01', 'En proceso'),
(3, 1, '2024-06-07 10:00:02', 'En proceso'),
(4, 1, '2024-06-07 10:00:03', 'En proceso'),
(5, 1, '2024-06-07 10:00:04', 'En proceso'),
(6, 1, '2024-06-07 10:00:05', 'En proceso'),
(7, 1, '2024-06-07 10:00:06', 'En proceso'),
(8, 1, '2024-06-07 10:00:07', 'En proceso'),
(9, 1, '2024-06-07 10:00:08', 'En proceso'),
(10, 1, '2024-06-07 10:00:09', 'En proceso'),
(11, 1, '2024-06-07 10:00:10', 'En proceso'),
(12, 1, '2024-06-10 10:36:16', 'En proceso'),
(13, 1, '2024-06-10 10:40:37', 'En proceso'),
(14, 1, '2024-06-10 10:40:42', 'En proceso'),
(15, 1, '2024-06-10 10:41:15', 'En proceso'),
(16, 1, '2024-06-10 10:41:54', 'En proceso'),
(17, 1, '2024-06-10 10:43:04', 'En proceso'),
(18, 1, '2024-06-10 10:43:15', 'En proceso'),
(19, 1, '2024-06-10 10:48:57', 'En proceso'),
(20, 1, '2024-06-10 10:50:18', 'En proceso'),
(21, 1, '2024-06-10 10:50:38', 'En proceso'),
(22, 1, '2024-06-10 10:51:39', 'En proceso'),
(23, 1, '2024-06-10 10:51:42', 'En proceso'),
(24, 1, '2024-06-10 10:52:10', 'En proceso'),
(25, 1, '2024-06-10 10:52:13', 'En proceso'),
(26, 1, '2024-06-10 10:52:17', 'En proceso'),
(27, 1, '2024-06-10 10:52:37', 'En proceso'),
(28, 1, '2024-06-10 10:52:40', 'En proceso'),
(29, 1, '2024-06-10 10:54:01', 'En proceso'),
(30, 1, '2024-06-10 10:54:04', 'En proceso'),
(31, 1, '2024-06-10 10:54:16', 'En proceso'),
(32, 1, '2024-06-10 10:54:39', 'En proceso'),
(33, 1, '2024-06-10 10:56:18', 'En proceso'),
(34, 1, '2024-06-10 10:56:19', 'En proceso'),
(35, 1, '2024-06-10 10:56:22', 'En proceso'),
(36, 1, '2024-06-10 10:56:36', 'En proceso'),
(37, 1, '2024-06-10 10:56:38', 'En proceso'),
(38, 1, '2024-06-10 10:56:40', 'En proceso'),
(39, 1, '2024-06-10 10:59:06', 'En proceso'),
(40, 1, '2024-06-10 10:59:51', 'En proceso'),
(41, 1, '2024-06-10 11:00:10', 'En proceso'),
(42, 1, '2024-06-10 11:00:54', 'En proceso'),
(43, 1, '2024-06-10 11:05:50', 'En proceso'),
(44, 1, '2024-06-10 11:05:52', 'En proceso'),
(45, 1, '2024-06-10 11:57:03', 'En proceso'),
(46, 1, '2024-06-10 11:57:46', 'En proceso'),
(47, 1, '2024-06-10 11:58:12', 'En proceso'),
(48, 1, '2024-06-10 11:58:15', 'En proceso'),
(49, 1, '2024-06-10 11:58:46', 'En proceso'),
(50, 1, '2024-06-10 11:59:06', 'En proceso'),
(51, 1, '2024-06-10 11:59:33', 'En proceso');

# ############################

#
# Estructura de tabla para la tabla `detallealquileres`
#

CREATE TABLE `detallealquileres` (
  `id` int(10) NOT NULL,
  `alquiler_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `cantidad` int(200) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `FechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `detallealquileres`
#

INSERT INTO `detallealquileres` (`id`, `alquiler_id`, `producto_id`, `cantidad`, `subtotal`, `fechaEntrega`, `FechaDevolucion`) VALUES
(1, 12, 5, 10, 550.00, '2024-06-10', '2024-06-06'),
(2, 13, 3, 10, 650.00, '2024-06-10', '2024-06-06'),
(3, 14, 5, 10, 550.00, '2024-06-10', '2024-06-06'),
(4, 15, 4, 10, 600.00, '2024-06-10', '2024-06-06'),
(5, 16, 2, 10, 450.00, '2024-06-10', '2024-06-06'),
(6, 17, 6, 10, 800.00, '2024-06-10', '2024-06-06'),
(7, 18, 1, 10, 400.00, '2024-06-10', '2024-06-06'),
(8, 19, 2, 10, 450.00, '2024-06-10', '2024-06-06'),
(9, 20, 3, 10, 650.00, '2024-06-10', '2024-06-06'),
(10, 21, 6, 5, 400.00, '2024-06-10', '2024-06-26'),
(11, 22, 1, 5, 200.00, '2024-06-10', '2024-06-26'),
(12, 23, 4, 5, 300.00, '2024-06-10', '2024-06-26'),
(13, 24, 3, 5, 325.00, '2024-06-10', '2024-06-26'),
(14, 25, 2, 5, 225.00, '2024-06-10', '2024-06-26'),
(15, 26, 6, 5, 400.00, '2024-06-10', '2024-06-26'),
(16, 27, 3, 5, 325.00, '2024-06-10', '2024-06-26'),
(17, 28, 1, 5, 200.00, '2024-06-10', '2024-06-26'),
(18, 29, 5, 5, 275.00, '2024-06-10', '2024-06-26'),
(19, 30, 2, 5, 225.00, '2024-06-10', '2024-06-26'),
(20, 31, 4, 5, 300.00, '2024-06-10', '2024-06-26'),
(21, 32, 1, 5, 200.00, '2024-06-10', '2024-06-26'),
(22, 33, 6, 5, 400.00, '2024-06-10', '2024-06-26'),
(23, 34, 3, 5, 325.00, '2024-06-10', '2024-06-26'),
(24, 35, 2, 5, 225.00, '2024-06-10', '2024-06-26'),
(25, 36, 2, 5, 225.00, '2024-06-10', '2024-06-26'),
(26, 37, 6, 5, 400.00, '2024-06-10', '2024-06-26'),
(27, 38, 1, 5, 200.00, '2024-06-10', '2024-06-26'),
(28, 39, 4, 10, 600.00, '2024-06-10', '2024-06-21'),
(29, 40, 1, 10, 400.00, '2024-06-10', '2024-06-21'),
(30, 41, 2, 10, 450.00, '2024-06-10', '2024-06-21'),
(31, 42, 6, 10, 800.00, '2024-06-10', '2024-06-21'),
(32, 43, 1, 10, 400.00, '2024-06-10', '2024-06-21'),
(33, 44, 5, 10, 550.00, '2024-06-10', '2024-06-21'),
(34, 45, 3, 7, 455.00, '2024-06-10', '2024-06-11'),
(35, 46, 5, 7, 385.00, '2024-06-10', '2024-06-11'),
(36, 47, 4, 7, 420.00, '2024-06-10', '2024-06-11'),
(37, 48, 2, 7, 315.00, '2024-06-10', '2024-06-11'),
(38, 49, 6, 7, 560.00, '2024-06-10', '2024-06-11'),
(39, 50, 1, 7, 280.00, '2024-06-10', '2024-06-11'),
(40, 51, 2, 20, 900.00, '2024-06-10', '2024-06-21');

# ############################

#
# Estructura de tabla para la tabla `productos`
#

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `productos`
#

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`) VALUES
(1, 'Toyota Corolla', 'Un sedán compacto conocido por su excepcional confiabilidad y eficiencia de combustible.', 40.00, './repo/img/concesionario/toyota.jpg'),
(2, 'Ford F-150', 'Una camioneta robusta con alta capacidad de remolque y tecnología avanzada.', 45.00, './repo/img/concesionario/ford.jpg'),
(3, 'Tesla Model 3', 'Un sedán eléctrico con autonomía de hasta 353 millas y aceleración impresionante.', 65.00, './repo/img/concesionario/tesla.jpg'),
(4, 'Honda CR-V', 'Un SUV compacto con amplio espacio interior y características de seguridad avanzadas.', 60.00, './repo/img/concesionario/honda.jpg'),
(5, 'Chevrolet 1500', 'Una camioneta potente con múltiples opciones de motor y configuraciones de cabina.', 55.00, './repo/img/concesionario/chevrolet.jpg'),
(6, 'BMW X5', 'Un SUV de lujo con potente rendimiento, interiores premium y tecnología de vanguardia.', 80.00, './repo/img/concesionario/bmw.jpg');

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
(116, 1, '2024-06-07 01:33:42', 'LOG IN'),
(117, 1, '2024-06-07 10:22:05', 'LOG IN'),
(118, 1, '2024-06-07 10:25:32', 'LOG OUT'),
(119, 1, '2024-06-07 10:25:36', 'LOG IN'),
(120, 1, '2024-06-07 11:30:13', 'LOG IN'),
(121, 1, '2024-06-10 10:07:35', 'LOG IN'),
(122, 1, '2024-06-10 11:37:37', 'LOG IN'),
(123, 1, '2024-06-10 11:41:26', 'LOG OUT'),
(124, 1, '2024-06-10 11:41:29', 'LOG IN'),
(125, 1, '2024-06-10 11:51:44', 'LOG OUT'),
(126, 1, '2024-06-10 11:51:56', 'LOG IN');

# ############################

#
# Estructura de tabla para la tabla `usuarios`
#

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashedPassword` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `usuarios`
#

INSERT INTO `usuarios` (`id`, `nickname`, `email`, `hashedPassword`, `telefono`, `direccion`) VALUES
(1, 'Schumacher', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor'),
(2, 'Alonso', 'use2@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor');

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `alquileres`
#
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

#
# Indices de la tabla `detallealquileres`
#
ALTER TABLE `detallealquileres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alquiler_id` (`alquiler_id`),
  ADD KEY `producto_id` (`producto_id`);

#
# Indices de la tabla `productos`
#
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clienteID` (`id_usuario`) USING BTREE;

#
# Indices de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `alquileres`
#
ALTER TABLE `alquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

#
# AUTO_INCREMENT de la tabla `detallealquileres`
#
ALTER TABLE `detallealquileres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

#
# AUTO_INCREMENT de la tabla `productos`
#
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

#
# AUTO_INCREMENT de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

#
# AUTO_INCREMENT de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `alquileres`
#
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `detallealquileres`
#
ALTER TABLE `detallealquileres`
  ADD CONSTRAINT `detallealquileres_ibfk_1` FOREIGN KEY (`alquiler_id`) REFERENCES `alquileres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallealquileres_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
