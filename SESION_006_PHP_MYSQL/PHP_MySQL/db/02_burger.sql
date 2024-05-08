/* Creación de database */
CREATE DATABASE IF NOT EXISTS burger;

ALTER DATABASE burger CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE burger;

/* Creación de tablas */
DROP TABLE IF EXISTS empleados;

CREATE TABLE `burger`.`empleados` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `apellido1` VARCHAR(200) NOT NULL,
  `apellido2` VARCHAR(200),
  `rol` VARCHAR(200) NOT NULL,
  `fechaContratacion` DATE,
  `salario` DECIMAL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS categoriasMenu;

CREATE TABLE `burger`.`categoriasMenu` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombreCategoria` VARCHAR(100) NOT NULL,
  `descripcion` TEXT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS itemsMenu;

CREATE TABLE `burger`.`itemsMenu` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `category_id` INT(10) UNSIGNED,
  `nombre` VARCHAR(100),
  `precio` DECIMAL(5,2),
  `descripcion` TEXT,
  `disponible` BOOLEAN DEFAULT TRUE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS ingredientes;

CREATE TABLE `burger`.`ingredientes` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombreIngrediente` VARCHAR(100),
  `stock` INT DEFAULT 0,
  `costeUnitario` DECIMAL(5,2)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS recetas;

CREATE TABLE `burger`.`recetas` (
  `item_id` INT (10) UNSIGNED,
  `ingrediente_id` INT(10) UNSIGNED,
  `cantidadUsada` INT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS pedidos;

CREATE TABLE `burger`.`pedidos` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `empleado_id` INT(10) UNSIGNED,
  `fechaPedido` DATE,
  `total` DECIMAL(10,2)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

/* Relación entre tablas */
ALTER TABLE itemsMenu 
  ADD KEY itemsMenuID (category_id),
  ADD CONSTRAINT itemsMenuID FOREIGN KEY (category_id) REFERENCES categoriasMenu (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE recetas
  ADD KEY itemID (item_id),
  ADD CONSTRAINT itemID FOREIGN KEY (item_id) REFERENCES itemsMenu (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY ingredienteID (ingrediente_id),
  ADD CONSTRAINT ingredienteID FOREIGN KEY (ingrediente_id) REFERENCES ingredientes (id) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE pedidos 
  ADD KEY empleadoID (empleado_id),
  ADD CONSTRAINT empleadoID FOREIGN KEY (empleado_id) REFERENCES empleados (id) ON DELETE CASCADE ON UPDATE CASCADE;

/* Agregar información a las tablas */
INSERT INTO empleados(
  `nombre` ,
  `apellido1` ,
  `apellido2` ,
  `rol` ,
  `fechaContratacion` ,
  `salario`
) VALUES
("Juan", "Márquez", "de Luca", "Gerente", "2023-10-10", 1800.00),
("Fernando", "Kelm", "Delibes", "Cocinero", "2023-11-10", 1500.00),
("Miguel", "Márquez", "Fernández", "Camarero", "2023-12-10", 1200.00),
("Lucas", "Pelaez", "Gómez", "Camarero", "2023-12-10", 1200.00),
("Genaro", "Álvarez", "Delibes", "Camarero", "2023-12-10", 1200.00);

INSERT INTO categoriasMenu (nombreCategoria, descripcion) VALUES 
("Hamburguesas", "Las mejores hamburguesas de la ciudad"),
("Bebidas", "Refrescos, cafés, cervezas"),
("Hot Dogs", "Los mejores perritos calientes y acompañamientos");

# Tabla de muchos a muchos (de n id a n campos)
INSERT INTO ingredientes (nombreIngrediente, stock, costeUnitario) VALUES
("Carne picada", 12, 3),
("Frankfurt", 30, 0.70),
("Café", 90, 12),
("Pan Hamburguesas", 100, 0.95),
("Pan Perrito", 100, 0.35),
("Tomate", 80, 1.35),
("Cebolla", 100, 0.15),
("Ketchup", 100, 0.6),
("Mostaza", 100, 0.7),
("Queso Tierno", 100, 10),
("Pepinillos", 100, 0.5),
("Cola", 150, 0.4);

# Tabla de 1 a muchos (1 id a n campos)
INSERT INTO itemsMenu(category_id, nombre, precio, descripcion)
VALUES
(1, "Cheeseburger", 10, "Burger con queso"),
(1, "Double Cheese Burger", 16, "Doble hamburger con queso"),
(3, "Perrito Completo", 13, "Perrito completo"),
(3, "Perrito Simple", 8, "Perrito solo con salsa");
