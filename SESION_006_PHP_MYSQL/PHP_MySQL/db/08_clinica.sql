# Pacientes: Almacena información sobre los pacientes.
# Medicos: Almacena información sobre los médicos.
# Análisis: Almacena información sobre los tipos de análisis clínicos.
# Citas: Registra las citas de los pacientes con los médicos.
# Muestras: Almacena información sobre las muestras tomadas para los análisis.
# Resultados: Almacena los resultados de los análisis realizados a las muestras.
# Facturas: Registra las facturas generadas para los pacientes.
# DetalleFacturas: Almacena los detalles de los análisis incluidos en cada factura.
# Administradores: Almacena información sobre los administradores del sistema.


/* Creación de database */
/** DATABASE (nombre en plural) */
DROP DATABASE IF EXISTS clinica;

CREATE DATABASE IF NOT EXISTS clinica;

ALTER DATABASE clinica DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE clinica;

/* Creación de tablas y agregado de información */
/** TABLE (nombre de la tabla en plural, nombre de los campos en singular) */
DROP TABLE IF EXISTS pacientes;

# pacientes
CREATE TABLE `clinica`.`pacientes` (
    `pacientes_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `nombre` VARCHAR(200) NOT NULL,
    `apellidos` VARCHAR (200) NOT NULL,
    `email` VARCHAR (200) NOT NULL UNIQUE,
    `telefono` VARCHAR(200) NOT NULL,
    `fechaNacimiento` DATE NOT NULL,
    `fechaIngreso` DATE NOT NULL,
    `numHistoriaClinica` INT(10) NOT NULL UNIQUE
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO pacientes (
    `nombre`,
    `apellidos`,
    `email`,
    `telefono`,
    `fechaNacimiento`,
    `fechaIngreso`,
    `numHistoriaClinica`
) VALUES
("Alberto", "Puebla Ramirez", "user1@mail.com", "654654654", "2000-05-27", "2023-03-12", 0005556561),
("Juan", "Puebla Ramirez", "user2@mail.com", "654654654", "2000-05-27", "2023-06-10", 0005556562),
("Pedro", "Puebla Ramirez", "user3@mail.com", "654654654", "2000-05-27", "2023-02-12", 0005556563),
("Casimiro", "Puebla Ramirez", "user4@mail.com", "654654654", "2000-05-27", "2023-05-15", 0005556564),
("Jose", "Puebla Ramirez", "user5@mail.com", "654654654", "2000-05-27", "2022-03-12", 0005556565),
("Alexei", "Puebla Ramirez", "user6@mail.com", "654654654", "2000-05-27", "2021-03-20", 0005556566);
("Andrés", "Puebla Ramirez", "user7@mail.com", "654654654", "2000-05-27", "2021-07-19", 0005556567);

# medicos
CREATE TABLE `clinica`.`medicos` {

} ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

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

