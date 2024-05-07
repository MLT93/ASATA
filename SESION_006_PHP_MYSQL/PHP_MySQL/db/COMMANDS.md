DROP TABLE IF EXISTS estudiantes;

CREATE TABLE `test`.`estudiantes` (
	`estudiante_id` INT UNSIGNED NOT NULL AUTO_INCREMENT , 
	`nombre` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
	`apellido` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
	`edad` INT(3) NOT NULL , 
	UNIQUE `id` (`estudiante_id`)
) ENGINE = InnoDB;

INSERT INTO `estudiantes` (`estudiante_id`, `estudiante_nombre`, `estudiante_apellido`, `estudiante_edad`) VALUES (NULL, 'Pedro', 'Gómez', '22');

INSERT INTO `estudiantes` (`estudiante_id`, `estudiante_nombre`, `estudiante_apellido`, `estudiante_edad`) VALUES (NULL, 'Laura', 'Del Mar', '25');

INSERT INTO estudiantes (estudiante_nombre, estudiante_apellido, estudiante_edad) VALUES ("Juan", "Pérez", 30);

INSERT INTO estudiantes (estudiante_nombre, estudiante_apellido, estudiante_edad) VALUES ("Pancho", "Villa", 42), ("Alberto", "Noriega", 36);

ALTER TABLE alumnos ADD materia VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

INSERT INTO estudiantes (estudiante_nombre, estudiante_apellido, estudiante_edad) VALUES ("Marquitos", "Feliz", 31);

SELECT * FROM `estudiantes`;

SELECT estudiante_nombre FROM `estudiantes`;

SELECT estudiante_nombre, estudiante_apellido FROM estudiantes WHERE estudiante_edad > 36;

SELECT * FROM estudiantes ORDER BY estudiante_edad DESC;

SELECT * FROM estudiantes ORDER BY estudiante_nombre ASC;

ALTER TABLE estudiantes RENAME TO alumnos;

ALTER TABLE estudiantes RENAME TO alumnos;

ALTER TABLE alumnos DROP COLUMN email;

# Eliminar tabla si existe
DROP TABLE IF EXISTS asignaturas;

# Crear tabla
CREATE TABLE `test`.`asignaturas` (
    `asignatura_id` INT(10) UNSIGNED AUTO_INCREMENT NOT NULL ,
    `asignatura_nombre` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    `n_creditos` INT(10) UNSIGNED NOT NULL , 
    `tutor` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL , 
    UNIQUE `id` (`asignatura_id`)
) ENGINE = InnoDB;

# Añadir campos a la tabla
ALTER TABLE asignaturas ADD escuela VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;

# Crear elementos en la tabla respetando el orden establecido en ella
INSERT INTO asignaturas ( 
    asignatura_nombre,
    n_creditos,
    tutor
) VALUES
("Matemáticas", 15, "Pedro López"),
("Física", 46, "Mario Narvaez"),
("Química", 33, "Bertha Alicia Navarro"),
("Ética", 46, "Juan Fernández"),
("Filosofía", 22, "Laura Gutiérrez");

# Modifica valores en la tabla según un id específico
UPDATE asignaturas SET asignatura_nombre = "Cambio 1", n_creditos = "22", tutor = "Cambio 2" WHERE asignatura_id = 1; 

# Muestra la tabla entera
SELECT * FROM asignaturas; 

# Cuenta la cantidad de elementos dentro de la tabla
SELECT COUNT(*) FROM asignaturas;

# Borra elementos de la tabla según un id específico
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
) ENGINE = InnoDB;

# Agregar valores a los campos de la tabla
INSERT INTO tutores (
	nombre,
    apellido,
    curso,
    materia
) VALUES
("Darío", "Martínez", "ASATA", "Desarrollo Web"),
("Pepe", "Suárez", "4 ESO", "Matemáticas"),
("Juan", "Álvarez", "3 ESO", "Plástica"),
("Jose", "Fernández", "BACHILLER", "Filosofía");

# Agrupa los elementos de la tabla por edad y nos dice cuántos elementos hay con esa edad
SELECT estudiante_edad, COUNT(*) FROM alumnos GROUP BY estudiante_edad;

# Selecciona la edad y cuenta los registros que hay en alumnos. Agrúpalos por edad y devuélve el grupo que tenga más de 1 elemento
SELECT estudiante_edad, COUNT(*) FROM alumnos GROUP BY estudiante_edad HAVING COUNT(*) > 1;

# Modifica el formato de codificación de caracteres Unicode de la base de datos
ALTER DATABASE database_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Modifica el formato de codificación de caracteres Unicode de toda la tabla
ALTER TABLE table_name CHARACTER SET utf8 COLLATE utf8_unicode_ci;

# Elimina una columna de la tabla
ALTER TABLE table_name DROP COLUMN column_name;

# Borra tabla si existe
DROP TABLE IF EXISTS clients;

# Crear tabla con clave primaria (primary key)
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
) ENGINE = InnoDB;

# Realizo una codificación de los caracteres en utf8 para toda la tabla
ALTER TABLE clients CHARACTER SET utf8 COLLATE utf8_unicode_ci;

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
("Darío", "Martínez", "Fernández", "34156896-Y", "1980-07-21", "dario.example@gmail.com", "C/ la Algarroba, 3", "679245312");
