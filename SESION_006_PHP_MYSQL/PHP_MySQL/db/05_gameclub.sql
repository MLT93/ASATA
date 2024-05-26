/** DATABASE */
DROP DATABASE IF EXISTS gameclub;

CREATE DATABASE IF NOT EXISTS gameclub;

ALTER DATABASE gameclub DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE gameclub;

/* TABLE (nombre de la tabla en plural, nombre de los campos en singular) & INSERT  */
DROP TABLE IF EXISTS genero;

# Genres
CREATE TABLE `gameclub`.`genres` (
    `id_genre` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `description` TEXT NOT NULL
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO genres (
    `name`,
    `description`
) VALUES
("Shooter", "Juego en primera persona de disparos"),
('Arcade','Género en visión lateral de dos dimensiones'),
('Driver','Simulación de conducción'),
('Terror','Juegos de terror'),
('Sport','Juegos de simulación de deportes');

# Videogames
CREATE TABLE `gameclub`.`videogames` (
    `id_videogame` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL UNIQUE,
    `id_genre` INT (10) UNSIGNED,
    `description` TEXT,
    `id_developer` INT (10) UNSIGNED,
    `id_platform` INT (10) UNSIGNED,
    `id_pegi` INT (10) UNSIGNED,
    `releaseDate` DATE,
    `ISOCode` INT (10) UNSIGNED UNIQUE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO videogames (
    `name`,
    `id_genre`,
    `description`,
    `id_developer`,
    `id_platform`,
    `id_pegi`,
    `releaseDate`,
    `ISOCode`
) VALUES
("Counter-Strike", 1, "Videojuego de disparos táctico multijugador", 1, 1, 3, "2020-05-27", "20932"),
("Mario Bros", 1, "Videojuego arcade multijugador", 2, 3, 1, "2017-01-30", "20732");

# Developers
CREATE TABLE `gameclub`.`developers` (
    `id_developer` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `isIndie` BOOLEAN,
    `email` VARCHAR (200) NOT NULL,
    `country` VARCHAR (200) NOT NULL,
    `city` VARCHAR (200) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `zip` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO developers (
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

# Platforms
CREATE TABLE `gameclub`.`platforms` (
    `id_platform` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) NOT NULL,
    `motherCompany` VARCHAR (200) NOT NULL,
    `diskReader` VARCHAR (200) NOT NULL,
    `releaseDate` DATE,
    `isCollectable` BOOLEAN,
    `version` VARCHAR (255)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO platforms (
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

# Pegis
CREATE TABLE `gameclub`.`pegis` (
    `id_pegi` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `pegi` VARCHAR (200) NOT NULL, 
    `description` TEXT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO pegis (
    `pegi`, 
    `description`
) VALUES
('7','mayor de 7'),
('12','mayor de 12'),
('16','mayor de 16'),
('18','mayor de 18');

# Clients
CREATE TABLE `gameclub`.`clients` (
    `id_client` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
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

INSERT INTO clients (
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

# Rents
CREATE TABLE `gameclub`.`rents` (
    `id_rent` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `dateOfRent` DATE,
    `id_client` INT (10) UNSIGNED,
    `id_videogame` INT (10) UNSIGNED,
    `id_rate` INT (10) UNSIGNED,
    `dateOfDevolution` DATE,
    `id_employee` INT (10) UNSIGNED,
    `id_payment` INT (10) UNSIGNED
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO rents (
    `dateOfRent`,
    `id_client`,
    `id_videogame`,
    `id_rate`,
    `dateOfDevolution`,
    `id_employee`,
    `id_payment`
) VALUES
('2024-05-10',1,1,1,'2024-05-17',2,1),
('2024-05-09',2,2,1,'2024-05-17',2,1);

# Employees
CREATE TABLE `gameclub`.`employees` (
    `id_employee` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `surname1` VARCHAR (200) NOT NULL,
    `surname2` VARCHAR (200) NOT NULL,
    `dni` VARCHAR (200) NOT NULL,
    `nSS` VARCHAR (200) NOT NULL,
    `telephone` VARCHAR (50) NOT NULL,
    `direction` VARCHAR (200) NOT NULL,
    `id_category` INT (10) UNSIGNED, /* `UNSIGNED` se usa para que no se acepten signos en el texto escrito */
    `dateOfEntry` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO employees (
    `name`,
    `surname1`,
    `surname2`,
    `dni`,
    `nSS`,
    `telephone`,
    `direction`,
    `id_category`,
    `dateOfEntry`
) VALUES
('Juan', 'Andrajosa', 'Algarroba', '33336666-Y', '0079523452345555', '666644444', 'Calle Alamos', 2, '2016-10-10'),
('Alberto', 'Noriega', 'Suarez', '33337766-H', '0089543452345555', '666644444', 'Camino Alamos', 2, '2016-10-10'),
('Alicia', 'Navarro', 'Preciado', '56337766-Z', '0034543452345555', '666644444', 'Av. de la Algarroba', 2, '2016-10-10');

# Rates
CREATE TABLE `gameclub`.`rates` (
    `id_rate` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `typeOfRate` VARCHAR (200) NOT NULL,
    `price` VARCHAR (200) NOT NULL,
    `forPartner` TINYINT (1) NOT NULL, /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
    `isActive` TINYINT (1) NOT NULL, /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
    `partnerDiscount` FLOAT NOT NULL /* `FLOAT` es para decimales. En este caso lo usamos para el % de descuento => Ej. 0.2 */
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO rates (
    `typeOfRate`,
    `price`,
    `forPartner`,
    `isActive`,
    `partnerDiscount`
) VALUES
("Standard", 7.20, 0, 1, 0.7),
("Medium", 9.99, 1, 1, 0.3),
("Premium", 17.90, 0, 0, 0.1);

# Categories
CREATE TABLE `gameclub`.`categories` (
    `id_category` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `range` VARCHAR (200) NOT NULL,
    `category` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO categories (
    `range`,
    `category`
) VALUES
('Manager','Junior'),
('Manager','Senior'),
('Vendedor','Junior'),
('Vendedor','Senior'),
('Admin','N/A');

# Payment
CREATE TABLE `gameclub`.`payments` (
    `id_payment` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `method` VARCHAR (200) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO payments (
    `method`
) VALUES
("Tarjeta"),
("Transferencia bancaria"),
("Crypto");

# Points
CREATE TABLE `gameclub`.`points` (
    `id_point` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `id_rent` INT (10) UNSIGNED NOT NULL,
    `value` INT (5) UNSIGNED NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO points (
    `id_rent`, `value`
) VALUES
(1, 3),
(2, 4),
(1, 3),
(2, 5);

/** FOREIGN KEY */
# Altero la tabla para agregar una clave foránea después de crear todas las demás tablas. La relación debe ser entre valores `UNIQUE` o `PRIMARY KEY` y los campos de las otras tablas que se deseen conectar. Los datos que se relacionan deben tener la misma estructura, si el id principal de una tabla es `UNSIGNED`, también lo será en el campo que se relacionará en la otra tabla
# RECUERDA: en una tabla puede haber un solo `PRIMARY KEY` y un solo `AUTO_INCREMENT`, pero pueden existir varios `UNIQUE`
# CONSTRAINT FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas
# NORMALMENTE se pone siempre en la tabla de relación a muchos `n` (`n a 1` o `1 a n `) para crear la clave foránea entre dos tablas. Por ejemplo, una tabla clientes y una tabla pedidos. La relación será clientes `1` y pedidos `n` (porque 1 cliente puede realizar muchos pedidos, entonces es `1 a n`). Aquí la clave foránea se creará en la tabla pedidos enlazando la PRIMARY KEY de clientes con la FOREIGN KEY de pedidos (recuerda que deben tener siempre la misma estructura de datos)
#
# ALTER TABLE nombre_tabla
# ADD KEY key_asociativo (campo_de_la_tabla)
# ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;
#
# ALTER TABLE table_name
#   ADD KEY itemID (item_id),
#   ADD CONSTRAINT itemID FOREIGN KEY (item_id) REFERENCES items (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE videogames
  ADD KEY genreID (id_genre),
  ADD CONSTRAINT genreID FOREIGN KEY (id_genre) REFERENCES genres (id_genre) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY developerID (id_developer),
  ADD CONSTRAINT developerID FOREIGN KEY (id_developer) REFERENCES developers (id_developer) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY platformID (id_platform),
  ADD CONSTRAINT platformID FOREIGN KEY (id_platform) REFERENCES platforms (id_platform) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY pegiID (id_pegi),
  ADD CONSTRAINT pegiID FOREIGN KEY (id_pegi) REFERENCES pegis (id_pegi) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE rents
  ADD KEY clientID (id_client),
  ADD CONSTRAINT clientID FOREIGN KEY (id_client) REFERENCES clients (id_client) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY videogameID (id_videogame),
  ADD CONSTRAINT videogameID FOREIGN KEY (id_videogame) REFERENCES videogames (id_videogame) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY rateID (id_rate),
  ADD CONSTRAINT rateID FOREIGN KEY (id_rate) REFERENCES rates (id_rate) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY employeeID (id_employee),
  ADD CONSTRAINT employeeID FOREIGN KEY (id_employee) REFERENCES employees (id_employee) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY paymentID (id_payment),
  ADD CONSTRAINT paymentID FOREIGN KEY (id_payment) REFERENCES payments (id_payment) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE employees
  ADD KEY categoryID (id_category),
  ADD CONSTRAINT categoryID FOREIGN KEY (id_category) REFERENCES categories (id_category) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE points
  ADD KEY rentID (id_rent),
  ADD CONSTRAINT rentID FOREIGN KEY (id_rent) REFERENCES rents (id_rent) ON DELETE CASCADE ON UPDATE CASCADE;

/* CONSULTAS */
SELECT name, category FROM employees, categories WHERE employees.id_employee = categories.id_category;
