# Miembros: Almacena información sobre los miembros del polideportivo.
# Empleados: Almacena información sobre los empleados del polideportivo.
# Actividades: Almacena información sobre las actividades disponibles.
# Instalaciones: Almacena información sobre las instalaciones del polideportivo.
# Reservas: Registra las reservas de instalaciones realizadas por los miembros. [con pagos, con instalaciones, con empleados, con clientes, con actividades, con clases, con pagos]
# Entrenadores: Almacena información sobre los entrenadores.
# Clases: Registra las clases de actividades impartidas en el polideportivo. [con entrenadores, con asistencia, con miembros]
# Asistencia: Almacena información sobre la asistencia de los miembros a las clases. []
# Pagos: Registra los pagos realizados por los miembros.

/* Creación de database */
/** DATABASE (nombre en plural) */
DROP DATABASE IF EXISTS polideportivo;

CREATE DATABASE IF NOT EXISTS polideportivo;

ALTER DATABASE polideportivo DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE polideportivo;

/* Creación de tablas y agregado de información */
/** TABLE (nombre de la tabla en plural, nombre de los campos en singular) */
DROP TABLE IF EXISTS miembros;

# miembros
CREATE TABLE `polideportivo`.`miembros` (
    `miembros_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nombre` VARCHAR(255) NOT NULL,
    `apellidos` VARCHAR(255) NOT NULL,
    `email`VARCHAR(255) NOT NULL,
    `telefono`VARCHAR(255) NOT NULL,
    `fechaNacimiento` DATE NOT NULL,
    `fechaInscripcion` DATE NOT NULL,
    `direccion` VARCHAR(255) NOT NULL,
    `numTarjeta` INT(16) UNIQUE,
    `imagen` VARCHAR(255)
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO miembros (
    `nombre`,
    `apellidos`,
    `email`,
    `telefono`,
    `fechaNacimiento`,
    `fechaInscripcion`,
    `direccion`,
    `numTarjeta`
    `imagen`
) VALUES
("Alberto", "Puebla Ramirez", "user1@mail.com", "654654654", "2000-05-27", "2023-03-12", "C/ Almud, 7", 5252000044446545),
("Juan", "Puebla Ramirez", "user2@mail.com", "654654654", "2000-05-27", "2023-06-10", "C/ Almud, 7", 5252000044326545),
("Pedro", "Puebla Ramirez", "user3@mail.com", "654654654", "2000-05-27", "2023-02-12", "C/ Almud, 7", 5252000055446545),
("Casimiro", "Puebla Ramirez", "user4@mail.com", "654654654", "2000-05-27", "2023-05-15", "C/ Almud, 7", 5252000044446785),
("Jose", "Puebla Ramirez", "user5@mail.com", "654654654", "2000-05-27", "2022-03-12", "C/ Almud, 7", 5255000044446545),
("Alexei", "Puebla Ramirez", "user6@mail.com", "654654654", "2000-05-27", "2021-03-20", "C/ Almud, 7", 5352000044446545);
("Andrés", "Puebla Ramirez", "user7@mail.com", "654654654", "2000-05-27", "2021-07-19", "C/ Almud, 7", 5522000444046545);

# empleados
CREATE TABLE `empleados` (
  `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `dni` VARCHAR(255) NOT NULL,
  `nSS` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `fechaAlta` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `empleados` (
  `nombre`, 
  `apellidos`, 
  `dni`, 
  `nSS`, 
  `telefono`, 
  `direccion`, 
  `fechaAlta`
  ) VALUES
('Juan', 'Antunez Delariba', '33336666', '88895555', '66664444', 'calle alamos', '2016-10-10'),
('Juan', 'Miguelez García', '333365556', '8333555', '666647774', 'calle alegria', '2019-10-10'),
('Juan', 'Pérez Gómez', '12345678A', 'SS001', '666111222', 'Calle Falsa 123, Madrid', '2023-01-10'),
('Laura', 'Martín Ruiz', '23456789B', 'SS002', '666333444', 'Avenida Siempre Viva 45, Barcelona', '2023-01-11'),
('Carlos', 'Jiménez López', '34567890C', 'SS003', '666555666', 'Plaza Mayor 6, Valencia', '2023-01-12'),
('Ana', 'Morales Fernández', '45678901D', 'SS004', '666777888', 'Gran Vía 22, Bilbao', '2023-01-13'),
('David', 'García Torres', '56789012E', 'SS005', '666999000', 'Paseo de la Reforma 5, Sevilla', '2023-01-14');

/* Relación entre tablas */
/** FOREIGN KEY */
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

