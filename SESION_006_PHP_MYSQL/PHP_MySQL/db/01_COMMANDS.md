# DATABASE
DRIP DATABASE IF EXISTS test;

CREATE DATABASE IF NOT EXISTS test;

ALTER DATABASE test CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE test;

# TABLE (nombre de la tabla en plural, nombre de los campos en singular) 
DROP TABLE IF EXISTS estudiantes;

CREATE TABLE `test`.`estudiantes` (
	`id_estudiante` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
	`apellido` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
	`edad` INT(3) NOT NULL , 
	UNIQUE `id` (`id_estudiante`)
) ENGINE = InnoDB;

INSERT INTO `estudiantes` (`id_estudiante`, `estudiante_nombre`, `estudiante_apellido`, `estudiante_edad`) VALUES 
(NULL, 'Pedro', 'Gómez', '22'),
(NULL, 'Laura', 'Del Mar', '25');

ALTER TABLE alumnos ADD materia VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

INSERT INTO estudiantes (estudiante_nombre, estudiante_apellido, estudiante_edad) VALUES ("Marquitos", "Feliz", 31);

SELECT * FROM `estudiantes`;

SELECT estudiantes.nombre FROM `estudiantes`;

SELECT estudiantes.nombre, estudiante_apellido FROM `estudiantes` WHERE estudiante_edad > 36;

SELECT * FROM estudiantes ORDER BY edad DESC;

SELECT * FROM estudiantes ORDER BY estudiantes.nombre ASC;

ALTER TABLE estudiantes RENAME TO alumnos;

ALTER TABLE alumnos DROP COLUMN email;

# Eliminar tabla si existe
DROP TABLE IF EXISTS asignaturas;

# Crear tabla
CREATE TABLE `test`.`asignaturas` (
    `asignatura_id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL ,
    `asignatura_nombre` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `n_credits` INT(10) UNSIGNED NOT NULL , 
    `tutor` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    UNIQUE `id` (`asignatura_id`)
) ENGINE = InnoDB;

# Añadir campos a la tabla
ALTER TABLE asignaturas ADD escuela VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

# Añadir registros en la tabla respetando el orden establecido en ella
INSERT INTO asignaturas ( 
    asignatura_nombre,
    n_credits,
    tutor
) VALUES
("Matemáticas", 15, "Pedro López"),
("Física", 46, "Mario Narvaez"),
("Química", 33, "Bertha Alicia Navarro"),
("Ética", 46, "Juan Fernández"),
("Filosofía", 22, "Laura Gutiérrez");

# Modifica valores en la tabla según un id específico
UPDATE asignaturas SET asignatura_nombre = "Cambio 1", n_credits = "22", tutor = "Cambio 2" WHERE asignatura_id = 1; 

# Muestra la tabla entera
SELECT * FROM asignaturas; 

# Cuenta la cantidad de registros dentro de la tabla
SELECT COUNT(*) FROM asignaturas;

# Borra registros de la tabla según un id específico
DELETE FROM asignaturas WHERE asignatura_id = 3;

# Borra tabla si existe
DROP TABLE IF EXISTS tutores;

# Crear tabla con clave primaria (primary key)
CREATE TABLE `test`.`tutores` (
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    `nombre` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `apellido` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `curso` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `materia` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Agregar valores a los campos de la tabla
INSERT INTO tutores (
	nombre,
    apellido,
    curso,
    materia
) VALUES
("Dario", "Martínez", "ASATA", "Desarrollo Web"),
("Pepe", "Suárez", "4 ESO", "Matemáticas"),
("Juan", "Álvarez", "3 ESO", "Plástica"),
("Jose", "Fernández", "BACHILLER", "Filosofía");

# Agrupa los elementos de la tabla por edad y nos dice cuántos elementos hay con esa edad
SELECT estudiante_edad, COUNT(*) FROM alumnos GROUP BY estudiante_edad;

# Selecciona la edad y cuenta los registros que hay en alumnos. Agrúpalos por edad y devuelve el grupo que tenga más de 1 elemento
SELECT estudiante_edad, COUNT(*) FROM alumnos GROUP BY estudiante_edad HAVING COUNT(*) > 1;

# Modifica el formato de codificación de caracteres Unicode de la base de datos
ALTER DATABASE database_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Modifica el formato de codificación de caracteres Unicode de toda la tabla
ALTER TABLE table_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Elimina una columna de la tabla
ALTER TABLE table_name DROP COLUMN column_name;

# Borra tabla si existe
DROP TABLE IF EXISTS clients;

# Crear tabla con clave primaria (primary key) y codificación Unicode utf8
CREATE TABLE `test`.`clients` (
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL ,
    `nombre` VARCHAR(200) NOT NULL , 
    `apellido1` VARCHAR(200) NOT NULL , 
    `apellido2` VARCHAR(200) NOT NULL , 
    `dni` VARCHAR(20) NOT NULL,
    `birthday` DATE NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `direction` VARCHAR(20) NOT NULL,
    `phone` VARCHAR(50) NOT NULL
) ENGINE = InnoDB CHARSET = utf8 COLLATE utf8_unicode_ci;

# Agregar valores a los campos de la tabla
INSERT INTO clients (
    nombre,
    apellido1,
    apellido2,
    dni,
    birthday,
    email,
    direction,
    phone
) VALUES
("Dario", "Martínez", "Fernández", "34156896-Y", "1980-07-21", "dario.example@gmail.com", "C/ la Algarroba, 3", "679245312");

# Claves foráneas. Conexión entre tablas. Foreign key
/* Relación entre tablas */
Altero la tabla para agregar una clave foránea después de crear todas las demás tablas. La relación debe ser entre valores `UNIQUE` o `PRIMARY KEY` y los campos de las otras tablas que se deseen conectar. Los datos que se relacionan deben tener la misma estructura, si el id principal de una tabla es `UNSIGNED`, también lo será en el campo que se relacionará en la otra tabla
RECUERDA: en una tabla puede haber un solo `PRIMARY KEY` y un solo `AUTO_INCREMENT`, pero pueden existir varios `UNIQUE`
CONSTRAINT FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas
NORMALMENTE se pone siempre en la tabla de relación a muchos `n` (`n a 1` o `1 a n `) para crear la clave foránea entre dos tablas. Por ejemplo, una tabla clientes y una tabla pedidos. La relación será clientes `1` y pedidos `n` (porque 1 cliente puede realizar muchos pedidos, entonces es `1 a n`). Aquí la clave foránea se creará en la tabla pedidos enlazando la PRIMARY KEY de clientes con la FOREIGN KEY de pedidos (recuerda que deben tener siempre la misma estructura de datos)

/**
  *
  * ALTER TABLE nombre_tabla
  *   ADD KEY key_asociativo (campo_de_la_tabla)
  *   ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;
  *
  * ALTER TABLE table_name
  *   ADD KEY itemID (item_id),
  *   ADD CONSTRAINT itemID FOREIGN KEY (item_id) REFERENCES item (id) ON DELETE CASCADE ON UPDATE CASCADE;
  *
  */

ALTER TABLE libros 
  ADD KEY autoresID (author_id),
  ADD CONSTRAINT autoresID FOREIGN KEY (author_id) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY editorialesID (editorial_id),
  ADD CONSTRAINT editorialesID FOREIGN KEY (editorial_id) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE;

CREATE TABLE `biblioteca`.`libros` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED,
    ADD CONSTRAINT autoresID FOREIGN KEY (id_author) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT editorialesID FOREIGN KEY (id_editorial) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE `biblioteca`.`libros` (
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT(4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED,
    FOREIGN KEY (`id_author`) REFERENCES `autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
