DROP DATABASE IF EXISTS biblioteca;

CREATE DATABASE biblioteca;

ALTER DATABASE biblioteca DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE biblioteca;

DROP TABLE IF EXISTS editoriales;

CREATE TABLE `biblioteca`.`editoriales` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `direction` VARCHAR(200) NOT NULL,
    `email` VARCHAR (180) NOT NULL,
    `phone` VARCHAR(200) NOT NULL
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS libros;

CREATE TABLE `biblioteca`.`libros` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `author_id` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `editorial_id` INT(10) UNSIGNED
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS autores;

CREATE TABLE `biblioteca`.`autores` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `surname` VARCHAR(200) NOT NULL,
    `pseudonym` INT (8),
    `nationality` VARCHAR(200),
    `language` VARCHAR(200)
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

/* Relación entre tablas */
# Altero la tabla para agregar una clave foránea después de crear todas las demás tablas. La relación debe ser entre valores `UNIQUE` o `PRIMARY KEY` y los campos de las otras tablas que se deseen conectar. Los datos que se relacionan deben tener la misma estructura, si el id principal de una tabla es `UNSIGNED`, también lo será en el campo que se relacionará en la otra tabla
# RECUERDA: en una tabla puede haber un solo `PRIMARY KEY` y un solo `AUTO_INCREMENT`, pero pueden existir varios `UNIQUE`
# FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas */
#
# ALTER TABLE nombre_tabla
# ADD KEY key_asociativo (campo_de_la_tabla)
# ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;
#
# ALTER TABLE table_name
#   ADD KEY itemID (item_id),
#   ADD CONSTRAINT itemID FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE libros 
  ADD KEY autoresID (author_id),
  ADD CONSTRAINT autoresID FOREIGN KEY (author_id) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY editorialesID (editorial_id),
  ADD CONSTRAINT editorialesID FOREIGN KEY (editorial_id) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE;

/* ToDo: fijarse porqué me devuelve error esto */
INSERT INTO editoriales (
  name,
  direction,
  email,
  phone
) VALUES
("Editorial Planeta", "Diagonal, 33", "mail@planeta.com", "985660606"),
("Anagrama", "Paseo de la Castellana, 108", "mail@anagrama.com", "985655777");

INSERT INTO libros (
  title,
  author_id, 
  year,
  editorial_id
) VALUES
("Los Santos Inocentes", 1, 1981, 1),
("Don Quijote de la Mancha", 2, 1605, 2);

INSERT INTO autores(
  name,
  surname,
  pseudonym,
  nationality,
  language
) VALUES
("Miguel", "Delibes", "", "Española", "español"),
("Miguel", "de Cervantes", "", "Española", "español");

DROP DATABASE IF EXISTS tienda;

CREATE DATABASE tienda;

ALTER DATABASE tienda CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE tienda;

DROP TABLE IF EXISTS clientes;

CREATE TABLE `tienda`.`clientes` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) ,
  `apellido2` varchar(255) ,
  `dni` varchar(255) ,
  `fecha_nacimiento` DATE ,
  `email` varchar(255) ,
  `direccion` varchar(255) ,
  `telefono` varchar(255) 
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS proveedores;

CREATE TABLE `tienda`.`proveedores` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `direction` VARCHAR(200) NOT NULL,
  `tel` INT (14),
  `cif` VARCHAR(50)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS pedidos;

CREATE TABLE `tienda`.`pedidos` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `code` VARCHAR(200) NOT NULL UNIQUE,
  /* 5 dígitos, 2 decimales */
  `total` DECIMAL (5,2),
  `descuento` DECIMAL (5,2),
  `pvp` DECIMAL (5,2),
  `cliente_id` INT (10) UNSIGNED,
  `date` DATE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

ALTER TABLE pedidos
  ADD KEY clienteID (cliente_id),
  ADD CONSTRAINT clienteID FOREIGN KEY (cliente_id) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE CASCADE;
