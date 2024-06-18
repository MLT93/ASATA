# phpMyAdmin SQL Dump
# version 5.2.1
# https://www.phpmyadmin.net/
#
# Servidor: 127.0.0.1
# Tiempo de generación: 18-06-2024 a las 07:59:14
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
# Base de datos: `gestion_almacen`
#

DROP DATABASE IF EXISTS gestion_almacen;

CREATE DATABASE IF NOT EXISTS gestion_almacen;

ALTER DATABASE gestion_almacen DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE gestion_almacen;

# ############################

#
# Estructura de tabla para la tabla `categorias`
#

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `categorias`
#

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Electrónica'),
(2, 'Ropa'),
(3, 'Alimentos'),
(4, 'Muebles'),
(5, 'Juguetes');

# ############################

#
# Estructura de tabla para la tabla `productos`
#

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `productos`
#

INSERT INTO `productos` (`id`, `nombre`, `categoria_id`, `proveedor_id`, `precio`, `stock`) VALUES
(1, 'Laptop', 1, 1, 1200.00, 10),
(2, 'Camiseta', 2, 2, 20.00, 50),
(3, 'Manzana', 3, 3, 1.50, 100),
(4, 'Sofá', 4, 4, 550.00, 5),
(5, 'Pelota', 5, 5, 15.00, 30),
(6, 'yrtrty', 2, 2, 33.00, 44);

# ############################

#
# Estructura de tabla para la tabla `proveedores`
#

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

#
# Volcado de datos para la tabla `proveedores`
#

INSERT INTO `proveedores` (`id`, `nombre`, `contacto`) VALUES
(1, 'Proveedor A', 'contactoA@example.com'),
(2, 'Proveedor B', 'contactoB@example.com'),
(3, 'Proveedor C', 'contactoC@example.com'),
(4, 'Proveedor D', 'contactoD@example.com'),
(5, 'Proveedor E', 'contactoE@example.com');

#
# Índices para tablas volcadas
#

#
# Indices de la tabla `categorias`
#
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

#
# Indices de la tabla `productos`
#
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `proveedor_id` (`proveedor_id`);

#
# Indices de la tabla `proveedores`
#
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

#
# AUTO_INCREMENT de las tablas volcadas
#

#
# AUTO_INCREMENT de la tabla `categorias`
#
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# AUTO_INCREMENT de la tabla `productos`
#
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

#
# AUTO_INCREMENT de la tabla `proveedores`
#
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

#
# Restricciones para tablas volcadas
#

#
# Filtros para la tabla `productos`
#
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
