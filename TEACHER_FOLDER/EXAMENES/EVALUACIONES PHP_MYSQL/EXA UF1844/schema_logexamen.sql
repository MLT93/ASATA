-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2024 a las 08:32:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS logexamen;

ALTER DATABASE logexamen DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE logexamen;

CREATE TABLE `sesiones` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `interaccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'log in / log out'
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

CREATE TABLE `usuarios` (
  `id` int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hashedPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuarios` (
  `name`, `email`, `hashedPassword`
) VALUES
("Usuario1", "usuario1@example.com", "pass11"),
("Usuario2", "usuario2@example.com", "pass11"),
("Usuario3", "usuario3@example.com", "pass11"),
("Usuario4", "usuario4@example.com", "pass11"),
("Usuario5", "usuario5@example.com", "pass11"),
("Usuario6", "usuario6@example.com", "pass11"),
("Usuario6", "usuario7@example.com", "pass11");

ALTER TABLE `sesiones`
  ADD KEY `usuarioID` (`id_usuario`),
  ADD CONSTRAINT `usuarioID` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- SELECT id FROM usuarios WHERE email = "usuario3@example.com"; /* => 3 */
-- UPDATE usuarios SET hashedPassword = "444" WHERE email = "usuario3@example.com"; /* Modifico la password del usuario */
-- SELECT hashedPassword FROM `usuarios` WHERE id = 3; /* Veo la modificación de la password realizada */
