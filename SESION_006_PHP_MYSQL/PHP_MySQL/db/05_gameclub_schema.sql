/* Creación de database */
CREATE DATABASE IF NOT EXISTS gameclub;

ALTER DATABASE gameclub CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE gameclub;

/* Creación de tablas */
DROP TABLE IF EXISTS genero;

CREATE TABLE `gameclub`.`genre` (
    `genre_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `description` TEXT NOT NULL
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `gameclub`.`videogame` (
    `videogame_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `genre_id` INT (10) UNSIGNED,
    `description` TEXT,
    `developer_id` INT (10) UNSIGNED,
    `platform_id` INT (10) UNSIGNED,
    `peghi_id` INT (10) UNSIGNED,
    `releaseDate` DATE,
    `ISOCode` INT (10) UNSIGNED UNIQUE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `gameclub`.`developer` (
    `developer_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `indie` BOOLEAN,
    `email` VARCHAR (200) NOT NULL,
    `country` VARCHAR (200) NOT NULL,
    `city` VARCHAR (200) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `zip` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `gameclub`.`platform` (
    `platform_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `motherCompany` VARCHAR (200) NOT NULL,
    `diskReader` VARCHAR (200) NOT NULL,
    `releaseDate` DATE,
    `isCollectable` BOOLEAN,
    `version` VARCHAR (255)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `gameclub`.`peghi` (
    `peghi_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `peghi` VARCHAR (200) NOT NULL, 
    `description` TEXT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

/* Relación entre tablas */
/* Altero la tabla para agregar una clave foránea después de crear todas las demás tablas. La relación debe ser entre valores UNIQUE O PRIMARY KEY. Los datos que se relacionan deben tener la misma estructura, si es UNSIGNED también lo debe ser en la id que se relaciona */
/* Recuerda: en una tabla puede haber un solo PRIMARY KEY y un solo AUTO_INCREMENT */
/* FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas */
/**
 * ALTER TABLE nombre_tabla
 * ADD KEY key_asociativo (campo_de_la_tabla)
 * ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;
 *
 */
ALTER TABLE table_name
  ADD KEY itemID (campo_de_la_tabla),
  ADD CONSTRAINT itemID FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE videogame 
  ADD KEY genreID (genre_id),
  ADD CONSTRAINT genreID FOREIGN KEY (genre_id) REFERENCES genre (id) ON DELETE CASCADE ON UPDATE CASCADE;

