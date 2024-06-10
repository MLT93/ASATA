-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2024 a las 18:09:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS restaurante;

USE restaurante;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `id` int(10) NOT NULL,
  `pedido_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallespedido`
--

INSERT INTO `detallespedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 63, 1, 1, 20.00),
(2, 64, 2, 1, 15.00),
(3, 65, 3, 1, 60.00),
(4, 66, 4, 1, 50.00),
(5, 67, 5, 1, 30.00),
(6, 67, 6, 1, 40.00),
(25, 69, 12, 1, 35.00),
(26, 70, 12, 1, 35.00),
(27, 71, 11, 1, 30.00),
(28, 72, 4, 1, 25.00),
(29, 73, 5, 1, 30.00),
(30, 73, 12, 1, 35.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`) VALUES
(1, 'Ingrediente 1'),
(2, 'Ingrediente 2'),
(3, 'Ingrediente 3'),
(4, 'Ingrediente 4'),
(5, 'Ingrediente 5'),
(6, 'Ingrediente 6'),
(7, 'Ingrediente 1'),
(8, 'Ingrediente 2'),
(9, 'Ingrediente 3'),
(10, 'Ingrediente 4'),
(11, 'Ingrediente 5'),
(12, 'Ingrediente 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listaingredientes`
--

CREATE TABLE `listaingredientes` (
  `producto_id` int(10) NOT NULL,
  `ingrediente_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `listaingredientes`
--

INSERT INTO `listaingredientes` (`producto_id`, `ingrediente_id`, `cantidad`) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 3, 3),
(2, 4, 2),
(3, 5, 1),
(3, 6, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha`, `estado`) VALUES
(63, 2, '2024-05-02 00:00:00', 'Pendiente'),
(64, 1, '2024-05-25 00:00:00', 'Pendiente'),
(65, 1, '2024-05-25 00:00:00', 'Completado'),
(66, 1, '2024-05-25 00:00:00', 'Pendiente'),
(67, 1, '2024-05-25 00:00:00', 'En proceso'),
(68, 1, '2024-05-27 18:14:43', 'En proceso'),
(69, 1, '2024-05-27 18:40:15', 'En proceso'),
(70, 1, '2024-05-27 18:41:35', 'En proceso'),
(71, 1, '2024-05-27 18:44:42', 'En proceso'),
(72, 1, '2024-05-27 18:49:54', 'En proceso'),
(73, 1, '2024-06-05 17:36:12', 'En proceso'),
(74, 1, '2024-06-05 18:05:27', 'En proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Producto 1', 'Descripción del Producto 1', 10.00),
(2, 'Producto 2', 'Descripción del Producto 2', 15.00),
(3, 'Producto 3', 'Descripción del Producto 3', 20.00),
(4, 'Producto 4', 'Descripción del Producto 4', 25.00),
(5, 'Producto 5', 'Descripción del Producto 5', 30.00),
(6, 'Producto 6', 'Descripción del Producto 6', 35.00),
(7, 'Producto 1', 'Descripción del Producto 1', 10.00),
(8, 'Producto 2', 'Descripción del Producto 2', 15.00),
(9, 'Producto 3', 'Descripción del Producto 3', 20.00),
(10, 'Producto 4', 'Descripción del Producto 4', 25.00),
(11, 'Producto 5', 'Descripción del Producto 5', 30.00),
(12, 'Producto 6', 'Descripción del Producto 6', 35.00);

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
(104, 1, '2024-06-05 18:07:50', 'LOG IN');

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
(1, 'use1', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor'),
(2, 'use2', 'use2@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoID` (`pedido_id`) USING BTREE,
  ADD KEY `productoID` (`producto_id`) USING BTREE;

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `listaingredientes`
--
ALTER TABLE `listaingredientes`
  ADD PRIMARY KEY (`producto_id`,`ingrediente_id`),
  ADD KEY `ingredienteID` (`ingrediente_id`) USING BTREE;

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioID` (`usuario_id`) USING BTREE;

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
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `listaingredientes`
--
ALTER TABLE `listaingredientes`
  ADD CONSTRAINT `listaingredientes_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `listaingredientes_ibfk_2` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesionID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
