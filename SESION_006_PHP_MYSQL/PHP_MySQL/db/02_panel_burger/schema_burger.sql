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
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
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
#   ADD KEY itemID (id_item),
#   ADD CONSTRAINT itemID FOREIGN KEY (id_item) REFERENCES items (id_item) ON DELETE CASCADE ON UPDATE CASCADE;

# Sintaxis 1
CREATE TABLE `biblioteca`.`libros` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED,
    CONSTRAINT autoresID FOREIGN KEY (id_author) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT editorialesID FOREIGN KEY (id_editorial) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Sintaxis 2
CREATE TABLE `biblioteca`.`libros` (
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT(4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED,
    FOREIGN KEY (`id_author`) REFERENCES `autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
