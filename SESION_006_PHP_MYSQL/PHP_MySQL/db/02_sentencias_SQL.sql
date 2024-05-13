/** DATABASE (nombre en plural) */
CREATE DATABASE IF NOT EXISTS biblioteca;

ALTER DATABASE biblioteca CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE biblioteca;

/** TABLE (nombre de la tabla en plural, nombre de los campos en singular) */
# Después de crear una tabla añadir inmediatamente registros en los campos

DROP TABLE IF EXISTS editoriales;

CREATE TABLE `biblioteca`.`editoriales` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `direction` VARCHAR(200) NOT NULL,
    `email` VARCHAR (180) NOT NULL,
    `phone` VARCHAR(200) NOT NULL
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO editoriales (
  name,
  direction,
  email,
  phone
) VALUES
("Editorial Planeta", "Diagonal, 33", "mail@planeta.com", "985660606"),
("Anagrama", "Paseo de la Castellana, 108", "mail@anagrama.com", "985655777");

DROP TABLE IF EXISTS libros;

CREATE TABLE `biblioteca`.`libros` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `author_id` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `editorial_id` INT(10) UNSIGNED
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO libros (
  title,
  author_id, 
  year,
  editorial_id
) VALUES
("Los Santos Inocentes", 1, 1981, 1),
("Don Quijote de la Mancha", 2, 1605, 2);

DROP TABLE IF EXISTS autores;

CREATE TABLE `biblioteca`.`autores` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `name` VARCHAR(200) NOT NULL,
    `surname` VARCHAR(200) NOT NULL,
    `pseudonym` INT (8),
    `nationality` VARCHAR(200),
    `language` VARCHAR(200)
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO autores (
  name,
  surname,
  pseudonym,
  nationality,
  language
) VALUES
("Miguel", "Delibes", "", "Española", "español"),
("Miguel", "de Cervantes", "", "Española", "español");

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

ALTER TABLE libros 
  ADD KEY autoresID (author_id),
  ADD CONSTRAINT autoresID FOREIGN KEY (author_id) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY editorialesID (editorial_id),
  ADD CONSTRAINT editorialesID FOREIGN KEY (editorial_id) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE;

/** DATABASE (nombre en plural) */
CREATE DATABASE IF NOT EXISTS tienda;

ALTER DATABASE tienda CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE tienda;

/** TABLE (nombre de la tabla en plural, nombre de los campos en singular) */
DROP TABLE IF EXISTS clientes;

CREATE TABLE `tienda`.`clientes` (
  `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `apellido1` VARCHAR(255) NOT NULL,
  `apellido2` VARCHAR(255) NOT NULL,
  `dni` VARCHAR(255) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(255) NOT NULL,
  `telefono` VARCHAR(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS proveedores;

CREATE TABLE `tienda`.`proveedores` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  `direction` VARCHAR(200) NOT NULL,
  `tel` INT (14),
  `cif` VARCHAR(50)
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS pedidos;

CREATE TABLE `tienda`.`pedidos` (
  `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `code` VARCHAR(200) NOT NULL UNIQUE,
  `total` DECIMAL (5,2), /* 5 dígitos, 2 decimales */
  `descuento` DECIMAL (5,2),
  `pvp` DECIMAL (5,2),
  `cliente_id` INT (10) UNSIGNED, /* `UNSIGNED` se usa para que no se acepten signos en el texto escrito */
  `date` DATE
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS tarifas;

CREATE TABLE `tienda`.`tarifas` (
  `id` INT(10) NOT NULL,
  `tipo` VARCHAR(255) NOT NULL,
  `coste` FLOAT NOT NULL, /* `FLOAT` es para decimales */
  `paraSocios` TINYINT(1) NOT NULL,
  `activa` TINYINT(1) NOT NULL, /* `TINYINT` se usa como un BOOLEAN. SQL convierte el tipo BOOLEAN a este. Devuelve 0 (false) o 1 (true) */
  `descuentoSocios` FLOAT NOT NULL COMMENT 'es un %' /* `COMMENT` se usa para poner un comentario por defecto al campo de la tabla */
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/** JOIN */
# `SELECCIONA(devuelve)` tabla_donde_busco.campo_buscado `DESDE` tabla_donde_busco `METODO JOIN` tabla_comparación `DONDE LOS ID ESTÉN RELACIONADOS(hay que ponerlo siempre)` tabla_donde_busco.campoID = tabla_comparación.campoID `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2 FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.campo_buscado1 = tabla_comparación.campo.ID WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECT tabla_donde_busco.* FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.campo_buscado1 = tabla_comparación.campo.ID WHERE tabla_comparación.campo_buscado2 = "asdf";

SELECT alquileres.id_cliente, clientes.nombre FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id

/** ALIAS */
# Asigna pseudónimos para facilitar las consultas
# Gracias a esto, puedo hacer las consultas como yo desee y que me devuelva la respuesta como yo lo quiera

SELECT /* Los campos que pido en el SELECT será lo que me devuelva la respuesta */
v.nombre AS NombreVideojuego, /* Aquí asigno el pseudónimo `NombreVideojuego` al campo `v.nombre` */
SELECT g.nombre AS NombreGenero,
FROM
videojuegos AS v /* Pseudónimo `v` a la tabla videojuegos */
INNER JOIN
genero AS g /* Pseudónimo `g` a la tabla genero */
ON
v.id_genero = g.id;

SELECT
a.fechaAlquiler AS FechaAlquiler, v.nombre AS NombreVideojuego
FROM 
alquileres AS a
INNER JOIN
videojuegos AS v
ON
a.id_videojuego = v.id;

SELECT
t.tipo, t.descuentoSocios AS descuento
FROM tarifas AS tabla
WHERE t.descuentoSocios >= 10;

/** FUNCIONES DE AGREGACIÓN PREESTABLECIDAS DE SQL */
# Funciones preestablecidas de SQL: COUNT(), MAX(), MIN(), AVG()

SELECT MAX(valoraciones.valoracion) FROM valoraciones; /*  */

SELECT MIN(valoraciones.valoracion) FROM valoraciones; /*  */

SELECT COUNT(valoraciones.valoracion) FROM valoraciones; /* Cuenta registros */

SELECT SUM(valoraciones.valoracion) FROM valoraciones; /* Suma registros */

SELECT AVG(valoraciones.valoracion) FROM valoraciones; /* Devuelve la media de los registros */

/* Devuelve la media de los registros */
SELECT SUM(valoraciones.valoracion) / SELECT COUNT(valoraciones.valoracion) FROM valoraciones;
SELECT AVG(valoraciones.valoracion) FROM valoraciones;

/* Devuelve la cantidad de registros */
SELECT valoraciones.valoracion, COUNT(*) AS numVotos FROM valoraciones;

/* Obtiene la cantidad de apellidos que aparecen en el campo, agrupándolos por apellido */
SELECT clientes.apellido1, COUNT(*) AS numVecesApellido1Repetido FROM clientes GROUP BY apellido1;

/* Obtener valores únicos de un campo */
SELECT clientes.apellido1, COUNT(*) AS numVecesApellido1Repetido FROM clientes GROUP BY apellido1 HAVING COUNT(*) > 1; /* `HAVING` es como un `WHERE` pero para agrupaciones */

/* Nos devuelve la media de la cantidad de votos hechos */
SELECT valoraciones.valoracion, COUNT(*) AS numVotos FROM valoraciones HAVING SUM(valoraciones.valoracion) / COUNT(valoraciones.valoracion);

/* Nos devuelve la cantidad de votos que supere la media */
SELECT valoraciones.valoracion, COUNT(*) AS numVotos FROM valoraciones HAVING valoraciones.valoracion > (SELECT AVG(valoraciones.valoracion) FROM valoraciones);

/** SUBCONSULTAS */
# Crear una consulta anidada (entre paréntesis) que se ejecuta primero, y después realiza la consulta principal
# Es un filtro dentro de un filtro, digamos

/* Aquí tomo un subconjunto de registros de la tabla tarifas que cumpla la condición que le doy en la sentencia SQL que hay dentro del FROM */
SELECT t.tipo, t.descuentoSocios AS descuentoFROM (SELECT * FROM tarifas WHERE tarifas.descuentoSocios > 10) as t;

/* Aquí tomo todos los registros de la tabla tarifas */
SELECT t.tipo, t.descuentos AS descuento
FROM tarifas AS t;

/* Calcular el valor medio de los descuentos */
SELECT AVG(descuentoSocios) FROM tarifas;

/* Subconsulta que devuelve los descuentos que superan el valor medio de descuento */
SELECT * FROM tarifas WHERE descuentoSocios > (SELECT AVG(descuentoSocios) FROM tarifas);

/* Subconsulta con patrones de texto */
# LIKE Supongamos que tiene que recuperar algunos registros basándose en si una columna contiene un determinado grupo de caracteres. Como sabe, en SQL la cláusula WHERE filtra los resultados de SELECT. Por sí misma, WHERE encuentra coincidencias exactas. ¿Pero qué pasa si necesita encontrar algo utilizando una coincidencia parcial? En ese caso, puede utilizar LIKE en SQL. Este operador busca en cadenas o subcadenas caracteres específicos y devuelve cualquier registro que coincida con ese patrón. (De ahí la coincidencia de patrones en SQL.)
# `%` o `_` Si no conoce el patrón exacto que está buscando, puede utilizar comodines para ayudarle a encontrarlo. Los comodines son símbolos de texto que denotan cuántos caracteres habrá en un lugar determinado dentro de la cadena. El estándar ANSI de SQL utiliza dos comodines, el porcentaje (%) y el guión bajo (_), que se utilizan de diferentes maneras. Cuando se utilizan comodines, se realiza una coincidencia parcial SQL en lugar de una coincidencia exacta SQL, ya que no se incluye una cadena exacta en la consulta.

SELECT * FROM videojuegos WHERE nombre LIKE "The%"; /* `LIKE` sirve para comparar un registro de campo con una cadena de texto. El `%` es un comodín para ayudar a encontrar la cadena si no se conoce el patrón exacto */

/* Filtrar los registros donde la descripción posea la palabra juego en alguna parte */
SELECT * FROM videojuegos WHERE descripcion LIKE "%juego%"; 

/* Filtrar los registros donde el isoCode empieza por JP */
SELECT * FROM videojuegos WHERE isoCode LIKE "jp%"; 

SELECT * FROM videojuegos WHERE fechaPublicacion >= "2000-01-01" AND fechaPublicacion <= "2015-12-31";
SELECT * FROM videojuegos WHERE fechaPublicacion BETWEEN "2000-01-01" AND "2015-12-31";

/* Devuelve lo mismo, a SQL no le importa el tipo de dato */
SELECT * FROM pegui WHERE pegui.pegui >= "12" AND pegui.pegui <= "18";
SELECT * FROM pegui WHERE pegui.pegui BETWEEN 12 AND 18;

/* Consulta para obtener registros específicos de distintas formas. Algunas serán exactas y otras contemplarán errores de escritura */
SELECT * FROM desarrolladores WHERE pais IN ("Argentina", "México");
SELECT * FROM desarrolladores WHERE pais = "Argentina" OR pais = "México";
SELECT * FROM desarrolladores WHERE pais = "Argentina" OR pais LIKE "mex%";

/* Aplicar una operación matemática para devolver los registros modificados */
SELECT tarifas.tipo, tarifas.coste * 0.5 AS costeAniversario FROM tarifas;

/* Devolver un número de registros limitados. Ahorra recursos */
SELECT * FROM videojuegos LIMIT 5; /* `LIMIT` devuelve los registros desde el índice 0 hasta el límite que le asigne */

/* Ordenar por por un campo la consulta */
SELECT * FROM videojuegos ORDER BY nombre ASC; /* `ORDER BY` ordena según el campo que le indique. puede ser `ASC`(ascendente) o `DESC`(descendente) */

SELECT nombre, apellido1 FROM empleados ORDER BY nombre ASC, apellido1 DESC;

/** CONDICIONES LÓGICAS */

SELECT *,
CASE 
  WHEN pais = "EU" OR pais = "mexico"
  THEN "Norteamerica"
END AS "continente"
FROM desarrolladores;

SELECT *,
CASE 
  WHEN nombre LIKE "%a"
  THEN "Mujer"

  WHEN nombre LIKE "%o" OR nombre LIKE "Jua%" OR nombre LIKE "%os" OR nombre LIKE "%id" OR nombre LIKE "%cas"
  THEN "Hombre"

  ELSE "No genre"
END AS "Genre"
FROM empleados;

/* Cuando la valoración sea mayor de 3, positiva, cuando sea menor suspenso */
SELECT valoraciones.valoracion,
CASE
    WHEN
        valoracion >= 3
    THEN "Positiva"
    ELSE "Negativa"
END AS puntuacion
FROM valoraciones;

/* 3 neutra */
SELECT valoraciones.valoracion,
CASE
    WHEN
        valoracion > 3
    THEN "Positiva"
    WHEN valoracion = 3
    THEN "Neutra"
    ELSE "Negativa"
END AS puntuacion
FROM valoraciones;

/* Actualización del registro del campo */
# En estas consultas es muy importante que figure el WHERE porque de lo contrario cambiará todos los campos de la tabla
UPDATE metodospago SET metodo='Cuenta bancaria' WHERE id=3;
