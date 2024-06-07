/* ALQUILERES */
DROP TABLE IF EXISTS alquileres;

CREATE TABLE `concesionario`.`alquileres` (
  `id` INT (10) AUTO_INCREMENT PRIMARY KEY,
  `usuario_id` INT(10) NOT NULL,
  `fecha` DATE NOT NULL,
  `estado` VARCHAR (50) NOT NULL,
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* DETALLE ALQUILERES */
DROP TABLE IF EXISTS detallealquileres;

CREATE TABLE `concesionario`.`detallealquileres` (
  `id` INT (10) AUTO_INCREMENT PRIMARY KEY,
  `alquiler_id` INT(10) NOT NULL,
  `producto_id` INT (10) NOT NULL,
  `cantidad` INT (200) NOT NULL,
  `subtotal` DECIMAL (10,2) NOT NULL,
  `fechaEntrega` DATE NOT NULL,
  `FechaDevolucion` DATE NOT NULL,
  FOREIGN KEY (`alquiler_id`) REFERENCES `alquileres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
