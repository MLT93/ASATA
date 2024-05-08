-- Eliminar una base de datos
DROP DATABASE biblioteca;


-- Crear una base de datos
CREATE DATABASE biblioteca;
-- alterar el set de caracteres en la base de datos
ALTER DATABASE biblioteca CHARACTER SET utf8 COLLATE utf8_unicode_ci;


-- Crear una tabla EN BIBLIOTECA
USE biblioteca;

CREATE TABLE libros (
id int(10) AUTO_INCREMENT PRIMARY KEY,
titulo varchar(255) NOT NULL,
autor_id int(10),
anio int,
editorial_id int(10)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--CREAR un tabla de editoriales

USE biblioteca;

CREATE TABLE editoriales(

id int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(255) NOT NULL,
direccion varchar(255),
correo_electronico varchar(255) NOT NULL,
telefono varchar(255) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--crear la tabla autores

USE biblioteca;

CREATE TABLE autores(

id int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(255) NOT NULL,
apellido1 varchar(255) NOT NULL,
apellido2 varchar(255),
pseudonimo varchar(255),
nacionalidad varchar(255),
idioma varchar(255)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






-- iNSERTAR AUTORES EN LA TABLA

INSERT INTO autores (nombre, apellido1, apellido2, pseudonimo, nacionalidad, idioma)  VALUES

('Miguel','Delibes',"Setién","","española","español"),
('Miguel',"de Cervantes","Saavedra","","española","español");


-- -insertar editoriales

INSERT INTO editoriales (nombre, direccion, correo_electronico, telefono) VALUES
("Editorial Planeta", "Diagonal, 33","mail@planeta.com","555555"),
("Anagrama", "Paseo de la castellana, 108","mail@anagrama.com","554455");

-- iNSERTAR libros EN LA TABLA

INSERT INTO libros (titulo,autor_id, anio, editorial_id) VALUES 
("Los santos inocentes", 1, 1981, 1),
("Don Quijote de la mancha", 2,1605, 2);



-- Indices de la tabla `libros`
--
ALTER TABLE `libros`  
  ADD PRIMARY KEY (`id`),
  ADD KEY `autoresID` (`autor_id`), -- ESTO PERMITE CREAR UN INDICE QUE USARÉ EN LA CLAVE FORANEA.
  ADD KEY `editorialID` (`editorial_id`);


-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `autoresID` FOREIGN KEY (`autor_id`) REFERENCES `autores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `editorialID` FOREIGN KEY (`editorial_id`) REFERENCES `editoriales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;



