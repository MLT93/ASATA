# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 27-05-2024 a las 14:22:41
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
  `id_pedido` int(10) DEFAULT NULL,
  `id_producto` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `detallespedido`
#

INSERT INTO `detallespedido` (`id`, `id_pedido`, `id_producto`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 2),
(4, 1, 1),
(5, 1, 2),
(6, 1, 2),
(7, 1, 4),
(8, 1, 5),
(9, 1, 3),
(10, 1, 3),
(11, 1, 4),
(12, 2, 4),
(13, 2, 3),
(14, 3, 3),
(15, 3, 3),
(16, 4, 4),
(17, 1, 1),
(18, 2, 6),
(20, 1, 6),
(21, 1, 4),
(22, 1, 1),
(23, 1, 1),
(24, 2, 2),
(25, 1, 4);

# ############################

#
# Estructura de tabla para la tabla `ingredientes`
#

CREATE TABLE `ingredientes` (
  `id` int(10) NOT NULL,
  `nombreIngrediente` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `costeUnitario` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `ingredientes`
#

INSERT INTO `ingredientes` (`id`, `nombreIngrediente`, `stock`, `costeUnitario`) VALUES
(1, 'Frankfurt', 30, 0.70),
(2, 'Café', 90, 12.00),
(3, 'Pan Hamburguesas', 100, 0.95),
(4, 'Pan Perrito', 100, 0.35),
(5, 'Tomate', 80, 1.35),
(6, 'Cebolla', 100, 0.15),
(7, 'Ketchup', 100, 0.60),
(8, 'Mostaza', 100, 0.70),
(9, 'Queso Tierno', 100, 10.00),
(10, 'Pepinillos', 100, 0.50),
(11, 'Cola', 150, 0.40);

# ############################

#
# Estructura de tabla para la tabla `listaingredientes`
#

CREATE TABLE `listaingredientes` (
  `id` int(10) NOT NULL,
  `id_producto` int(10) DEFAULT NULL,
  `id_ingrediente` int(10) DEFAULT NULL,
  `cantidadUsada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `listaingredientes`
#

INSERT INTO `listaingredientes` (`id`, `id_producto`, `id_ingrediente`, `cantidadUsada`) VALUES
(1, 1, 2, 7),
(2, 1, 3, 7),
(3, 1, 4, 7),
(4, 1, 6, 7),
(5, 1, 7, 7),
(6, 1, 3, 7);

# ############################

#
# Estructura de tabla para la tabla `pedidos`
#

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) DEFAULT NULL,
  `fechaPedido` date DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `pedidos`
#

INSERT INTO `pedidos` (`id`, `id_usuario`, `fechaPedido`, `total`) VALUES
(1, 1, '2023-10-10', 15.00),
(2, 1, '2022-03-20', 30.00),
(3, 1, '2023-01-14', 15.00),
(4, 1, '2021-10-16', 20.00),
(5, 1, '2023-11-17', 15.00),
(6, 1, '2020-05-23', 10.00),
(7, 1, '2023-07-30', 15.00),
(8, 2, '2024-05-27', 2.50),
(9, 2, '2024-05-27', 5.00),
(10, 1, '2024-05-27', 2.50),
(11, 1, '2024-05-27', 2.50),
(12, 1, '2024-05-27', 2.50),
(13, 1, '2024-05-27', 5.00),
(14, 1, '2024-05-27', 5.00),
(15, 1, '2024-05-27', 5.00),
(16, 1, '2024-05-27', 5.00),
(17, 1, '2024-05-27', 5.00),
(18, 1, '2024-05-27', 2.50),
(19, 1, '2024-05-27', 7.90),
(20, 1, '2024-05-27', 7.90),
(21, 1, '2024-05-27', 5.00),
(22, 2, '2024-05-27', 5.00),
(23, 2, '2024-05-27', 7.90),
(24, 2, '2024-05-27', 7.90),
(25, 2, '2024-05-27', 7.90),
(26, 2, '2024-05-27', 5.00),
(27, 2, '2024-05-27', 3.75),
(28, 2, '2024-05-27', 1.50),
(29, 2, '2024-05-27', 1.50),
(30, 2, '2024-05-27', 1.50),
(31, 2, '2024-05-27', 1.50),
(32, 2, '2024-05-27', 1.50),
(33, 2, '2024-05-27', 1.50),
(34, 2, '2024-05-27', 5.00),
(35, 1, '2024-05-27', 3.75),
(36, 2, '2024-05-27', 3.75),
(37, 2, '2024-05-27', 2.50),
(38, 1, '2024-05-27', 5.00);

# ############################

#
# Estructura de tabla para la tabla `productos`
#

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

#
# Volcado de datos para la tabla `productos`
#

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`) VALUES
(1, 'Hamburguesa', 3.75, 'Las mejores hamburguesas de la ciudad'),
(2, 'Hot Dog', 2.5, 'Perrito caliente al estilo EEUU'),
(3, 'Pizza', 7.9, 'Pizza con la mejor mozzarella'),
(4, 'Kebab', 5, 'Auténtico Durum de Turquía'),
(5, 'Cerveza', 2.5, 'Cerveza Irlandesa'),
(6, 'Café', 1.5, 'Café colombiano'),
(7, 'Helado', 3.2, 'Refrescante');

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
(96, 2, '2024-05-27 12:05:40', 'LOG IN'),
(97, 1, '2024-05-27 13:12:27', 'LOG IN'),
(98, 1, '2024-05-27 13:16:40', 'LOG OUT'),
(99, 1, '2024-05-27 13:16:46', 'LOG IN'),
(100, 1, '2024-05-27 13:24:59', 'LOG OUT'),
(101, 1, '2024-05-27 13:25:04', 'LOG IN'),
(102, 1, '2024-05-27 13:25:56', 'LOG OUT'),
(103, 2, '2024-05-27 13:25:58', 'LOG IN'),
(104, 2, '2024-05-27 13:46:48', 'LOG OUT'),
(105, 1, '2024-05-27 13:47:15', 'LOG IN'),
(106, 1, '2024-05-27 13:47:49', 'LOG OUT'),
(107, 2, '2024-05-27 13:47:54', 'LOG IN'),
(108, 2, '2024-05-27 14:21:55', 'LOG OUT'),
(109, 1, '2024-05-27 14:22:00', 'LOG IN');

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
(2, 'use2', 'use2@mail.com', '$2y$10$N5h/AAPK23b3uvEiS/w4KeKsLzm9V1U8FOnuX56msvNeXmx5NEF4S', '777 555', 'calle menor');

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `detallespedido`
#
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoID` (`id_pedido`),
  ADD KEY `detalleProductoID` (`id_producto`);

#
# Indices de la tabla `ingredientes`
#
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `listaingredientes`
#
ALTER TABLE `listaingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoID` (`id_producto`),
  ADD KEY `ingredienteID` (`id_ingrediente`);

#
# Indices de la tabla `pedidos`
#
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioID` (`id_usuario`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

#
# AUTO_INCREMENT de la tabla `ingredientes`
#
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

#
# AUTO_INCREMENT de la tabla `listaingredientes`
#
ALTER TABLE `listaingredientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

#
# AUTO_INCREMENT de la tabla `pedidos`
#
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

#
# AUTO_INCREMENT de la tabla `productos`
#
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

#
# AUTO_INCREMENT de la tabla `sesiones`
#
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

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
  ADD CONSTRAINT `pedidoID` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productoPedidoID` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `listaingredientes`
#
ALTER TABLE `listaingredientes`
  ADD CONSTRAINT `listaingredientes_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `listaingredientes_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingredientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `pedidos`
#
ALTER TABLE `pedidos`
  ADD CONSTRAINT `usuarioID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

#
# Filtros para la tabla `sesiones`
#
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
