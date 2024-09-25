/** DATABASE */
DROP DATABASE IF EXISTS biblioteca;

CREATE DATABASE IF NOT EXISTS biblioteca;

ALTER DATABASE biblioteca DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
    `id_author` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO libros (
  title,
  id_author, 
  year,
  id_editorial
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
# CONSTRAINT FOREIGN KEY relaciona un campo con otro campo de una tabla. Normalmente se utiliza para los ID de las tablas
# NORMALMENTE se pone siempre en la tabla de relación a muchos `n` (`n a 1` o `1 a n `) para crear la clave foránea entre dos tablas. Por ejemplo, una tabla clientes y una tabla pedidos. La relación será clientes `1` y pedidos `n` (porque 1 cliente puede realizar muchos pedidos, entonces es `1 a n`). Aquí la clave foránea se creará en la tabla pedidos enlazando la PRIMARY KEY de clientes con la FOREIGN KEY de pedidos (recuerda que deben tener siempre la misma estructura de datos)
#
# ALTER TABLE nombre_tabla
#   ADD KEY key_asociativo (campo_de_la_tabla)
#   ADD CONSTRAINT key_asociativo FOREIGN KEY (campo_de_la_tabla) REFERENCES tabla_a_relacionar (primary_key_de_la_tabla_a_relacionar) ON DELETE CASCADE ON UPDATE CASCADE;
#
# ALTER TABLE table_name
#   ADD KEY itemID (id_item),
#   ADD CONSTRAINT itemID FOREIGN KEY (id_item) REFERENCES items (id_item) ON DELETE CASCADE ON UPDATE CASCADE;

# Sintaxis 1 (Con esta forma es siempre recomendable alterar las tablas al final del archivo)
CREATE TABLE `biblioteca`.`libros` (
    `id` INT (10) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT (4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED
  ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

ALTER TABLE libros 
  ADD KEY autoresID (id_author),
  ADD CONSTRAINT autoresID FOREIGN KEY (id_author) REFERENCES autores (id) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD KEY editorialesID (id_editorial),
  ADD CONSTRAINT editorialesID FOREIGN KEY (id_editorial) REFERENCES editoriales (id) ON DELETE CASCADE ON UPDATE CASCADE;  

# Sintaxis 2  (Con esta forma es recomendable dejar la creación de las tablas con claves foráneas al final)
CREATE TABLE `biblioteca`.`libros` (
    `id` INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(200) NOT NULL,
    `id_author` INT(10) UNSIGNED,
    `year` INT(4) NOT NULL,
    `id_editorial` INT(10) UNSIGNED,
    FOREIGN KEY (`id_author`) REFERENCES `autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_editorial`) REFERENCES `editoriales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Ejemplo easy
USE `gameclub`;

DROP TABLE IF EXISTS `ordenespago`;

CREATE TABLE `ordenespago` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `intent` varchar(255) NOT NULL COMMENT 'Capture, Authorize',
  `currencycode` varchar(3) NOT NULL,
  `value` decimal(10, 2) NOT NULL,
  `fechaOrden` date NOT NULL,
  `estado` varchar(255) NOT NULL COMMENT 'Generada, En proceso, Completada',
   FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Ejemplo completo con clave foránea
DROP DATABASE if EXISTS prueba;

CREATE DATABASE IF NOT EXISTS prueba;

ALTER DATABASE prueba DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE prueba;

DROP TABLE IF EXISTS alfabetos;

create table prueba.letras (
	id_letra INT (10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    letra VARCHAR (1) NOT NULL,
    descripcion TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO prueba.letras (letra, descripcion) VALUES 
('a', 'letra principal del alfabeto'),
('b', 'letra secundaria del alfabeto'),
('c', 'letra terciaria del alfabeto');

create table prueba.alfabetos (
	id_alfabeto INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR (100) NOT NULL,
    id_letra INT (10) UNIQUE NOT NULL,
    FOREIGN KEY (id_letra) REFERENCES letras (id_letra) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO prueba.alfabetos (nombre, id_letra) VALUES 
('alfabeto griego', 1),
('alfabeto latino', 2),
('alfabeto chino', 3);

SHOW TABLES FROM prueba;

SHOW COLUMNS FROM prueba.alfabetos;

/** DATABASE */
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

/** MODIFICAR TABLAS Y BASES DE DATOS */
# Nuevo campo en una tabla
ALTER TABLE alumnos ADD materia VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
# Agregar registros a una tabla
INSERT INTO estudiantes (estudiante_nombre, estudiante_apellido, estudiante_edad) VALUES ("Marquitos", "Feliz", 31);
# Devolver datos de una tabla
SELECT * FROM `estudiantes`;
# Devolver datos de una tabla añadiendo condiciones
SELECT estudiantes.nombre, estudiante_apellido FROM `estudiantes` WHERE estudiante_edad > 36;
# Devolver datos de una tabla ordenándola
SELECT * FROM estudiantes ORDER BY edad DESC;
SELECT * FROM estudiantes ORDER BY estudiantes.nombre ASC;
# Renombrar campo de una tabla
ALTER TABLE estudiantes RENAME TO alumnos;
# Eliminar tabla si existe
DROP TABLE IF EXISTS asignaturas;
# Modifica valores en la tabla según un id específico
UPDATE asignaturas SET asignatura_nombre = "Cambio 1", n_credits = "22", tutor = "Cambio 2" WHERE id_asignatura = 1; 
# Borra registros de la tabla según un id específico
DELETE FROM asignaturas WHERE id_asignatura = 3;
# Cuenta la cantidad de registros dentro de la tabla
SELECT COUNT(*) FROM asignaturas;

/** JOIN */
# Sintaxis Explícita
# `SELECCIONA(devuelve)` tabla_donde_busco.campo_buscado `DESDE` tabla_donde_busco `METODO JOIN` tabla_comparación `DONDE LOS ID ESTÉN RELACIONADOS(hay que ponerlo siempre)` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2 FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key  WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECT tabla_donde_busco.* FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <la tabla_A> RELACIONADA 'INNER, LEFT, RIGHT -> JOIN' <con la tabla_B> DONDE 'ON' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas>

# Sintaxis Implícita
# `SELECCIONA(devuelve)` campos_buscados `DESDE` tabla_donde_busco, tabla_comparación `DONDE ESTA CONDICIÓN SE CUMPLA` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2, tabla_comparación.campo_buscado1 FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECT * FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <tabla_A>, <tabla_B> DONDE 'WHERE' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas> Y 'AND' <más condiciones>;

/* Forma explícita */
SELECT videojuegos.* FROM videojuegos INNER JOIN genero ON videojuegos.id_genero = genero.id;
SELECT alquileres.* FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id AND clientes.socio = 1;
SELECT videojuegos.*, alquileres.fechaAlquiler FROM videojuegos INNER JOIN alquileres ON videojuegos.id = alquileres.id_videojuego;
SELECT alquileres.id_cliente, clientes.nombre FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id

/* Forma implícita */
SELECT videojuegos.*, alquileres.fechaAlquiler FROM videojuegos, alquileres WHERE videojuegos.id = alquileres.id_videojuego;
SELECT alquileres.id_cliente, clientes.nombre FROM alquileres, clientes WHERE alquileres.id_cliente = clientes.id;

/* Consulta con multiples tablas relacionadas */
SELECT productos.id, productos.nombre, productos.precio, productos.stock, categorias.nombre AS categoria, proveedores.nombre AS proveedor 
FROM productos 
INNER JOIN categorias ON productos.categoria_id = categorias.id 
INNER JOIN proveedores ON productos.proveedor_id = proveedores.id;

/* Consulta con tablas relacionadas + subconsulta */
SELECT 
    productos.id AS producto_id, 
    productos.nombre AS producto_nombre, 
    productos.precio, 
    categorias.nombre AS categoria,
    proveedores.nombre AS proveedor,
    (SELECT nombre FROM clientes WHERE clientes.id = productos.cliente_id) AS cliente_nombre
FROM 
    productos p
INNER JOIN categorias ON categorias.id = p.categoria_id
INNER JOIN proveedores ON proveedores.id = p.proveedor_id

/* Consulta de unión múltiple con clave foránea extendida */
SELECT 
    clases.id,
    cursos.nombreCurso,
    cursos.horas,
    cursos.nivel,
    aulas.tag AS aulaTag,
    aulas.planta,
    aulas.numeroAula,
    grupos.tag AS grupoTag,
    profesores.nombre AS nombreProfesor,
    horarios.horario,
    calendarios.id_convocatoria AS id_convocatoria, /* Es crucial añadir este ID para crear una foreign key extendida */
    calendarios.fecha AS fechaInicio
    convocatorias.anio AS anioConvocatoria,
FROM 
    clases 
    INNER JOIN cursos ON clases.id_curso = cursos.id
    INNER JOIN aulas ON clases.id_aula = aulas.id
    INNER JOIN grupos ON clases.id_grupo = grupos.id
    INNER JOIN profesores ON clases.id_profesor = profesores.id
    INNER JOIN horarios ON clases.id_horario = horarios.id
    INNER JOIN calendarios ON clases.id_calendario = calendarios.id
    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id
/** 
 ** # Esta consulta obtiene información detallada sobre los foreign key de clases con las demás tablas. Además, obtiene información extendiendo una foreign key
 ** 
 ** ### Explicación:
 **
 ** - La tabla 'calendarios' tiene una clave foránea que se relaciona con 'convocatorias'.
 ** - Al haber realizado previamente un JOIN entre 'clases' y 'calendarios', ya tenemos acceso a la información de 'calendarios'.
 ** - Esto nos permite "extender" la consulta para incluir información de 'convocatorias', aunque no esté directamente relacionada con 'clases'.
 **
 ** ### Tablas Involucradas:
 ** 
 ** 1. **clases**: Tabla principal que contiene información sobre las clases.
 ** 2. **cursos**: Información sobre los cursos.
 ** 3. **aulas**: Detalles sobre las aulas donde se imparten las clases.
 ** 4. **grupos**: Información sobre los grupos de estudiantes.
 ** 5. **profesores**: Datos de los profesores que imparten las clases.
 ** 6. **horarios**: Información sobre los horarios de las clases.
 ** 7. **calendarios**: Datos sobre el calendario académico.
 ** 8. **convocatorias**: Información sobre las convocatorias relacionadas con los calendarios.
 ** 
 ** ### Desglose de la Consulta:
 ** 
 ** 1. **SELECT**:
 **    - Se seleccionan columnas específicas de cada tabla, como el nombre del curso, el aula, el profesor, etc.
 ** 
 ** 2. **FROM y JOINs**:
 **    - Comienza con la tabla `clases`.
 **    - Se utilizan INNER JOINs para conectar `clases` con cada una de las otras tablas basándose en las claves foráneas.
 ** 
 ** ### Importancia del Último INNER JOIN:
 ** 
 ** - El último INNER JOIN conecta `calendarios` con `convocatorias`:
 **    ```sql
 **    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id
 **    ```
 ** - Aquí no estamos directamente conectando `clases` a `convocatorias`, sino que lo hacemos a través de `calendarios`.
 ** 
 ** ### Clave para Entender la Relación:
 ** 
 ** - Es crucial incluir el ID de `calendarios` (`id_convocatoria`) en la selección. Esto permite que la consulta funcione correctamente al enlazar toda la información.
 ** - Clave foránea extendida (Extended foreign key): Utiliza relaciones de clave foránea no solo directas, sino también indirectas o "extendidas" a través de tablas intermedias.
*/


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
SELECT t.tipo, t.descuentoSocios AS descuento FROM (SELECT * FROM tarifas WHERE tarifas.descuentoSocios > 10) as t;

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

/* LIMIT & OFFSET */
# Las cláusulas LIMIT y `OFFSET` se usan para restringir los registros que se retornan en una consulta SELECT.
# La cláusula LIMIT recibe un argumento numérico positivo que indica el número máximo de registros a retornar; la cláusula offset indica el número del primer registro a retornar. El número de registro inicial es 0 (no 1).
# Si el LIMIT supera la cantidad de registros de la tabla, se limita hasta el último registro.

SELECT * FROM videojuegos LIMIT 3;

-- Desplazamiento desde el primer registro
SELECT * FROM videojuegos LIMIT 3 OFFSET 5;

/* CLAVES UNIQUE */
# La restricción UNIQUE en SQL se utiliza para evitar que se inserten valores duplicados en una columna o combinación de columnas que participen en la restricción UNIQUE. Nunca formará parte de una PRIMARY KEY (estas claves normalmente se asignan únicamente a los id principales de una tabla)

ALTER TABLE tarifas ADD UNIQUE KEY `tarifaID` (`tipo`);


/* UNION ALL */
# Devuelve los campos de dos o más tablas en una sola. Deben tener la misma cantidad de campos
SELECT id, nombre FROM videojuegos
UNION ALL
SELECT id, nombre FROM desarrolladores;


/* SHOW y DESCRIBE */
# Lista de todas las bases de datos
SHOW DATABASES;

# Muestra tablas de una base de datos
SHOW TABLES FROM pruebas;

# Describe la estructura de la tabla
SHOW COLUMNS FROM database.attribute;
DESCRIBE database.attribute;

# Get a list of databases (Microsoft SQL Server)
SELECT name FROM sys.databases;
