/* Creación de database */
CREATE DATABASE IF NOT EXISTS gameclub;

ALTER DATABASE gameclub DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE gameclub;

/* Creación de tablas y agregado de información */
DROP TABLE IF EXISTS genero;

# Genre
CREATE TABLE `gameclub`.`genre` (
    `genre_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `description` TEXT NOT NULL
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO genre (
    `name`,
    `description`
) VALUES
("Shooter", "Juego en primera persona de disparos"),
('Arcade','Género en visión lateral de dos dimensiones'),
('Driver','Simulación de conducción'),
('Terror','Juegos de terror'),
('Sport','Juegos de simulación de deportes');

# Videogame
CREATE TABLE `gameclub`.`videogame` (
    `videogame_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `genre_id` INT (10) UNSIGNED,
    `description` TEXT,
    `developer_id` INT (10) UNSIGNED,
    `platform_id` INT (10) UNSIGNED,
    `pegi_id` INT (10) UNSIGNED,
    `releaseDate` DATE,
    `ISOCode` INT (10) UNSIGNED UNIQUE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO videogame (
    `name`,
    `genre_id`,
    `description`,
    `developer_id`,
    `platform_id`,
    `pegi_id`,
    `releaseDate`,
    `ISOCode`
) VALUES
("Counter-Strike", 1, "Videojuego de disparos táctico multijugador", 1, 1, 3, "2020-05-27", "20932"),
("Mario Bros", 1, "Videojuego arcade multijugador", 2, 3, 1, "2017-01-30", "20732");

# Developer
CREATE TABLE `gameclub`.`developer` (
    `developer_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `isIndie` BOOLEAN,
    `email` VARCHAR (200) NOT NULL,
    `country` VARCHAR (200) NOT NULL,
    `city` VARCHAR (200) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `zip` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO developer (
    `name`,
    `isIndie`,
    `email`,
    `country`,
    `city`,
    `direction`,
    `zip`
) VALUES
('Ubisoft', false, 'mail@ubisoft.com', 'EU', 'San Francisco', 'C/ Alamos, 800', '55555'),
('EA', false, 'mail@ea.com', 'EU', 'Los Angeles', 'Av Pimienta, 5', '55555'),
('Valve', false, 'mail@valve.com', 'EU', 'Los Angeles', 'Av Pimienta, 5', '55555');

# Platform
CREATE TABLE `gameclub`.`platform` (
    `platform_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `motherCompany` VARCHAR (200) NOT NULL,
    `diskReader` VARCHAR (200) NOT NULL,
    `releaseDate` DATE,
    `isCollectable` BOOLEAN,
    `version` VARCHAR (255)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO platform (
    `name`,
    `motherCompany`,
    `diskReader`,
    `releaseDate`,
    `isCollectable`,
    `version`
) VALUES
('PlayStation 5', 'Sony', 'CD-rom', '2020-05-06', false, '1.0'),
('PlayStation 4','Sony', 'CD-rom', '2020-05-06', false, '1.0'),
('Xbox', 'Microsoft', 'CD-rom', '2012-05-06', false, '1.0'),
('Computer', 'Intel', 'CD-rom', '2012-05-06', false, '1.0');

# Pegi
CREATE TABLE `gameclub`.`pegi` (
    `pegi_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `pegi` VARCHAR (200) NOT NULL, 
    `description` TEXT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO pegi (
    `pegi`, 
    `description`
) VALUES
('7','mayor de 7'),
('12','mayor de 12'),
('16','mayor de 16'),
('18','mayor de 18');

# Client
CREATE TABLE `gameclub`.`client` (
    `client_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `surname1` VARCHAR (200) NOT NULL,
    `surname2` VARCHAR (200) NOT NULL,
    `email` VARCHAR (200) NOT NULL,
    `password` VARCHAR (200) NOT NULL,
    `telephone` VARCHAR (50) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `dni` VARCHAR (200) NOT NULL,
    `payCard` VARCHAR (200) NOT NULL,
    `birthday` DATE NOT NULL,
    `isPartner` TINYINT (1) NOT NULL /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO client (
    `name`,
    `surname1`,
    `surname2`,
    `email`,
    `password`,
    `telephone`,
    `direction`,
    `dni`,
    `payCard`,
    `birthday`,
    `isPartner`
) VALUES
("María", "López", "Reyes", "maria@example.com", "1234", "638094567", "Camino del Santo, 4", "56678732-H", "5333522323000001", "2002-06-13", 1),
("Alberto", "Fernández", "Montes", "maria@example.com", "1234", "678092347", "Av/ Santiago, 34", "56622732-K", "553525685002201", "2002-06-13", 1),
("Juan", "Pérez", "Suarez", "maria@example.com", "1234", "674654567", "C/ Piri, 40", "33678732-J", "5422524444000001", "2002-06-13", 0);

# Rent
CREATE TABLE `gameclub`.`rent` (
    `rent_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `dateOfRent` DATE,
    `client_id` INT (10) UNSIGNED,
    `videogame_id` INT (10) UNSIGNED,
    `rate_id` INT (10) UNSIGNED,
    `dateOfDevolution` DATE,
    `employee_id` INT (10) UNSIGNED,
    `payment_id` INT (10) UNSIGNED
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO rent (
    `dateOfRent`,
    `client_id`,
    `videogame_id`,
    `rate_id`,
    `dateOfDevolution`,
    `employee_id`,
    `payment_id`
) VALUES
('2024-05-10',1,1,1,'2024-05-17',2,1),
('2024-05-09',2,2,1,'2024-05-17',2,1);

# Employee
CREATE TABLE `gameclub`.`employee` (
    `employee_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` DATE,
    `surname1` VARCHAR (200) NOT NULL,
    `surname2` VARCHAR (200) NOT NULL,
    `dni` VARCHAR (200) NOT NULL,
    `nSS` VARCHAR (200) NOT NULL,
    `telephone` VARCHAR (50) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `category_id` INT (10) UNSIGNED,
    `dateOfEntry` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO employee (
    `name`,
    `surname1`,
    `surname2`,
    `dni`,
    `nSS`,
    `telephone`,
    `direction`,
    `category_id`,
    `dateOfEntry`
) VALUES
('Juan', 'Andrajosa', 'Algarroba', '33336666-Y', '0079523452345555', '666644444', 'Calle Alamos', 2, '2016-10-10'),
('Alberto', 'Noriega', 'Suarez', '33337766-H', '0089543452345555', '666644444', 'Camino Alamos', 2, '2016-10-10'),
('Alicia', 'Navarro', 'Preciado', '56337766-Z', '0034543452345555', '666644444', 'Av. de la Algarroba', 2, '2016-10-10');

# Rate
CREATE TABLE `gameclub`.`rate` (
    `rate_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `typeOfRate` VARCHAR (200) NOT NULL,
    `price` VARCHAR (200) NOT NULL,
    `forPartner` TINYINT (1) NOT NULL, /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
    `isActive` TINYINT (1) NOT NULL, /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
    `partnerDiscount` FLOAT NOT NULL /* `FLOAT` es para decimales. En este caso lo usamos para el % de descuento => Ej. 0.2 */
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO rate (
    `typeOfRate`,
    `price`,
    `forPartner`,
    `isActive`,
    `partnerDiscount`
) VALUES
("Standard", 7.20, 0, 1, 0.7),
("Medium", 9.99, 1, 1, 0.3),
("Premium", 17.90, 0, 0, 0.1);

# Category
CREATE TABLE `gameclub`.`category` (
    `category_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `range` VARCHAR (200) NOT NULL,
    `category` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO category (
    `range`,
    `category`
) VALUES
('Manager','Junior'),
('Manager','Senior'),
('Vendedor','Junior'),
('Vendedor','Senior'),
('Admin','N/A');

# Payment
CREATE TABLE `gameclub`.`payment` (
    `payment_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `method` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO payment (
    `method`
) VALUES
("Tarjeta"),
("Transferencia bancaria"),
("Crypto");

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

ALTER TABLE videogame 
  ADD KEY genreID (genre_id),
  ADD CONSTRAINT genreID FOREIGN KEY (genre_id) REFERENCES genre (genre_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY developerID (developer_id),
  ADD CONSTRAINT developerID FOREIGN KEY (developer_id) REFERENCES developer (developer_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY platformID (platform_id),
  ADD CONSTRAINT platformID FOREIGN KEY (platform_id) REFERENCES platform (platform_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY pegiID (pegi_id),
  ADD CONSTRAINT pegiID FOREIGN KEY (pegi_id) REFERENCES pegi (pegi_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE rent
  ADD KEY clientID (client_id),
  ADD CONSTRAINT clientID FOREIGN KEY (client_id) REFERENCES client (client_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY videogameID (videogame_id),
  ADD CONSTRAINT videogameID FOREIGN KEY (videogame_id) REFERENCES videogame (videogame_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY rateID (rate_id),
  ADD CONSTRAINT rateID FOREIGN KEY (rate_id) REFERENCES rate (rate_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY employeeID (employee_id),
  ADD CONSTRAINT employeeID FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY paymentID (payment_id),
  ADD CONSTRAINT paymentID FOREIGN KEY (payment_id) REFERENCES payment (payment_id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE employee
  ADD KEY categoryID (category_id),
  ADD CONSTRAINT categoryID FOREIGN KEY (category_id) REFERENCES category (category_id) ON DELETE CASCADE ON UPDATE CASCADE;

/*ToDo: hacer Joins */
SELECT employee.*, category.category FROM employee INNER JOIN employee ON employee.employee_id = category_id;
