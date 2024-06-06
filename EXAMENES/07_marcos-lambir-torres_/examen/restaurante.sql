# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 06-06-2024 a las 09:02:04
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
# Base de datos: `restaurante`
#

DROP DATABASE IF EXISTS restaurante;

CREATE DATABASE IF NOT EXISTS restaurante;

ALTER DATABASE restaurante DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE restaurante;

# ############################

#
# Estructura de tabla para la tabla `detallespedido`
#

CREATE TABLE `detallespedido` (
  `id` int(10) NOT NULL,
  `pedido_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `detallespedido`
#

INSERT INTO `detallespedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 63, 1, 1, 20.00),
(2, 64, 2, 1, 15.00),
(3, 65, 3, 1, 60.00),
(4, 66, 4, 1, 50.00),
(5, 67, 5, 1, 30.00),
(6, 67, 6, 1, 40.00),
(25, 68, 6, 1, 35.00),
(26, 68, 7, 1, 10.00),
(27, 68, 8, 1, 15.00),
(28, 69, 2, 1, 15.00),
(29, 69, 3, 1, 20.00),
(30, 69, 4, 1, 25.00);

# ############################

#
# Estructura de tabla para la tabla `ingredientes`
#

CREATE TABLE `ingredientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `ingredientes`
#

INSERT INTO `ingredientes` (`id`, `nombre`) VALUES
(1, 'Ramen'),
(2, 'Caldo de soja'),
(3, 'Brotes de bambú'),
(4, 'cebollin'),
(5, 'alga nori'),
(6, 'chashu (cerdo asado)'),
(7, 'caldo de miso'),
(8, 'maiz'),
(9, 'mantequilla'),
(10, 'menna'),
(11, 'caldo salado claro'),
(12, 'huevo marinado'),
(13, 'fideos gruesos'),
(14, 'tofu'),
(15, 'caldo de cerdo espeso'),
(16, 'kikurage'),
(17, 'bok choy'),
(18, 'zanahoria'),
(19, 'setas'),
(20, 'camarones'),
(21, 'calamares'),
(22, 'cangrejo'),
(23, 'caldo de pollo'),
(24, 'pollo asado'),
(25, 'pollo frito japones'),
(26, 'limon'),
(27, 'mayonesa'),
(28, 'empanadillas rellenas de carne de cerdo y vegetales'),
(29, 'salsa de soja'),
(30, 'arroz'),
(31, 'rodajas de cerdo asado'),
(32, 'huevo poché'),
(33, 'salsa tare ( dulce)'),
(34, 'caldo de verduras');

# ############################

#
# Estructura de tabla para la tabla `listaingredientes`
#

CREATE TABLE `listaingredientes` (
  `producto_id` int(10) NOT NULL,
  `ingrediente_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `listaingredientes`
#

INSERT INTO `listaingredientes` (`producto_id`, `ingrediente_id`, `cantidad`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 10, 1),
(2, 4, 1),
(2, 6, 1),
(2, 7, 1),
(2, 8, 1),
(2, 9, 1),
(2, 10, 1),
(3, 4, 1),
(3, 5, 1),
(3, 6, 1),
(3, 11, 1),
(3, 12, 1),
(4, 4, 1),
(4, 6, 1),
(4, 12, 1),
(4, 15, 1),
(4, 16, 1),
(5, 4, 1),
(5, 14, 1),
(5, 17, 1),
(5, 18, 1),
(5, 19, 1),
(5, 34, 1);

# ############################

#
# Estructura de tabla para la tabla `pedidos`
#

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `pedidos`
#

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha`, `estado`) VALUES
(63, 2, '2024-05-02 00:00:00', 'Pendiente'),
(64, 1, '2024-05-25 00:00:00', 'Pendiente'),
(65, 1, '2024-05-25 00:00:00', 'Completado'),
(66, 1, '2024-05-25 00:00:00', 'Pendiente'),
(67, 1, '2024-05-25 00:00:00', 'En proceso'),
(68, 1, '2024-05-27 11:57:28', 'En proceso'),
(69, 1, '2024-05-28 09:11:55', 'En proceso');

# ############################

#
# Estructura de tabla para la tabla `productos`
#

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `productos`
#

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Shoyu Ramen', 'Ramen en caldo de soja, con fideos, menma (brotes de bambú), cebollín, nori (alga), y chashu (cerdo asado).', 10.00),
(2, 'Miso Ramen', 'Ramen en caldo de miso, con fideos, maíz, mantequilla, menma, cebollín, y chashu', 15.00),
(3, 'Shio Ramen', 'Ramen en caldo salado claro, con fideos, nori, cebollín, huevo marinado, y chashu.', 12.50),
(4, 'Tonkotsu Ramen', 'Ramen en caldo de cerdo espeso, con fideos, cebollín, kikurage (setas de madera), huevo marinado, y chashu.\r\n', 16.00),
(5, 'Vegetarian Ramen', 'Ramen en caldo de verduras, con fideos, tofu, bok choy, zanahorias, setas y cebollín', 11.00),
(6, 'Spicy Ramen', 'Ramen picante en caldo de cerdo o pollo, con fideos, cebollín, menma, huevo marinado, y chashu.', 13.50),
(7, 'Tsukemen', 'Ramen frío para mojar, con caldo aparte, fideos gruesos, cebollín, nori, y chashu.', 14.95),
(8, 'Seafood Ramen', 'Ramen en caldo de mariscos, con fideos, camarones, calamares, cangrejo, cebollín, y nori.', 17.00),
(9, 'Chicken Ramen', 'Ramen en caldo de pollo, con fideos, huevo marinado, cebollín, y pollo asado.', 15.50),
(10, 'Karaage', 'Pollo frito japonés, marinado y crujiente, servido con limón y mayonesa japonesa.', 18.00),
(11, 'Gyoza', 'Empanadillas japonesas rellenas de carne de cerdo y vegetales, servidas con salsa de soja.', 9.00),
(12, 'Chashu Don', 'Tazón de arroz con rodajas de cerdo asado, cebollín, huevo poché y salsa tare (salsa dulce)', 9.50);

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
(99, 1, '2024-05-27 13:15:04', 'LOG OUT'),
(100, 1, '2024-05-27 13:40:25', 'LOG IN'),
(101, 1, '2024-05-27 13:48:10', 'LOG IN'),
(102, 1, '2024-05-28 08:05:07', 'LOG IN'),
(103, 1, '2024-05-28 09:11:49', 'LOG IN'),
(104, 1, '2024-06-06 08:07:45', 'LOG IN');

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
(1, 'use1', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor'),
(2, 'use2', 'use2@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor');

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `detallespedido`
#
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoID` (`pedido_id`) USING BTREE,
  ADD KEY `productoID` (`producto_id`) USING BTREE;

#
# Indices de la tabla `ingredientes`
#
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `listaingredientes`
#
ALTER TABLE `listaingredientes`
  ADD PRIMARY KEY (`producto_id`,`ingrediente_id`),
  ADD KEY `ingredienteID` (`ingrediente_id`) USING BTREE;

#
# Indices de la tabla `pedidos`
#
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioID` (`usuario_id`) USING BTREE;

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
# AUTO_INCREMENT de la tabla `detallespedido`
#
ALTER TABLE `detallespedido`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

#
# AUTO_INCREMENT de la tabla `ingredientes`
#
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

#
# AUTO_INCREMENT de la tabla `pedidos`
#
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

#
# AUTO_INCREMENT de la tabla `productos`
#
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

#
# AUTO_INCREMENT de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

#
# AUTO_INCREMENT de la tabla `usuarios`
#
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `detallespedido`
#
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

#
# Filtros para la tabla `listaingredientes`
#
ALTER TABLE `listaingredientes`
  ADD CONSTRAINT `listaingredientes_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `listaingredientes_ibfk_2` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

#
# Filtros para la tabla `pedidos`
#
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

#
# Filtros para la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
