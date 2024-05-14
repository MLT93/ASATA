/* Creación de database */
CREATE DATABASE IF NOT EXISTS foros;

ALTER DATABASE foros DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

USE foros;

/* Creación de tablas y agregado de información */
# USUARIOS
DROP TABLE IF EXISTS usuarios;
CREATE TABLE `foros`.`usuarios` (
    `user_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR (200) UNIQUE NOT NULL,
    `surname` VARCHAR (200) UNIQUE NOT NULL,
    `email` VARCHAR (200) NOT NULL,
    `password` VARCHAR (200) UNIQUE NOT NULL,
    `isModerador` BOOLEAN
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO usuarios (
    `name`,
    `surname`,
    `email`,
    `password`,
    `isModerador`
) VALUES
("User1", "SurnameUser1", "user1@example.com", "1234", false),
("User2", "SurnameUser2", "user2@example.com", "1235", true),
("User3", "SurnameUser3", "user3@example.com", "1236", false),
("User4", "SurnameUser4", "user3@example.com", "1237", false),
("User5", "SurnameUser5", "user3@example.com", "1238", false),
("User6", "SurnameUser6", "user3@example.com", "1239", false),
("User7", "SurnameUser7", "user3@example.com", "1233", true);

# TEMAS
DROP TABLE IF EXISTS temas;
CREATE TABLE `foros`.`temas` (
    `tema_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `genre` VARCHAR(200) NOT NULL,
    `isActive` BOOLEAN NOT NULL,
    `description` TEXT
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO temas (
    `genre`,
    `isActive`,
    `description`
) VALUES
("Food & Beverage", true, "Discusión sobre estilos de cocina"),
("Motor", false, "Apasionados de los motores relatan sus experiencias"),
("Medicina", false, "Expertos de medicina informan sobre las nuevas tendencias"),
("Gestión de recursos naturales", true, "Los recursos naturales forman parte del equilibrio de los sistemas naturales, y deben ser valorados como tales independientemente de la utilidad que les asigne en un momento especifico el usuario, o el mercado");

# COMENTARIOS
DROP TABLE IF EXISTS comentarios;
CREATE TABLE `foros`.`comentarios` (
    `comment_id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR (200) NOT NULL,
    `description` TEXT NOT NULL,
    `releaseDate` DATE NOT NULL,
    `tema_id` INT (10) UNSIGNED,
    `user_id` INT (10) UNSIGNED
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO comentarios (
    `title`,
    `description`,
    `releaseDate`,
    `tema_id`,
    `user_id`
) VALUES
('Audi RS5', 'Sistema de válvulas en el coche tienen poco espacio', '2016-10-10', 2, 1),
('La Carbonara', 'Diferencias de ejecución en distintas zonas de Italia', '2016-10-10', 1, 5),
('Las Cuencas Receptoras', 'Recuperación del medio natural en las cuencas receptoras y reducción de vertidos', '2016-10-10', 4, 3);

/* Relación entre tablas */
# Altero la tabla para agregar una clave foránea después de crear todas las demás tablas. La relación debe ser entre valores `UNIQUE` o `PRIMARY KEY` y los campos de las otras tablas que se deseen conectar. Los datos que se relacionan deben tener la misma estructura, si el id principal de una tabla es `UNSIGNED`, también lo será en el campo que se relacionará en la otra tabla
# RECUERDA: en una tabla puede haber un solo `PRIMARY KEY` y un solo `AUTO_INCREMENT`, pero pueden existir varios `UNIQUE`
# FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas */
#
# ALTER TABLE nombre_tabla
# ADD KEY key_asociativo (campo_de_la_tabla)
# ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE comentarios
  ADD KEY temaID (tema_id),
  ADD CONSTRAINT temaID FOREIGN KEY (tema_id) REFERENCES temas (tema_id) ON DELETE CASCADE ON UPDATE CASCADE,
   ADD KEY userID (user_id),
  ADD CONSTRAINT userID FOREIGN KEY (user_id) REFERENCES usuarios (user_id) ON DELETE CASCADE ON UPDATE CASCADE;

/* Consultas */
SELECT usuarios.name FROM usuarios INNER JOIN comentarios ON comentarios.user_id = usuarios.user_id LIMIT 0, 5;

SELECT temas.isActive, temas.genre,
CASE
    WHEN isActive = true
    THEN "Activo"
    WHEN isActive = false
    THEN "Cerrado"
END AS Tema FROM temas INNER JOIN comentarios ON comentarios.tema_id = temas.tema_id;
