
DROP DATABASE burger;
CREATE DATABASE IF NOT EXISTS burger;

USE burger;

CREATE TABLE empleados (

    id int(10) AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(255) NOT NULL,
    apellido1 varchar(255) NOT NULL,
    apellido2 varchar(255),
    rol varchar(255) NOT NULL,
    fechaContratacion DATE,
    salario DECIMAL (10,2)

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE categoriasMenu (

    id int(10) AUTO_INCREMENT PRIMARY KEY,
    nombreCategoria varchar(100) NOT NULL,
    descripcion TEXT

)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE itemsMenu (

    id int(10) AUTO_INCREMENT PRIMARY KEY,
    categoria_id int (10) NOT NULL,
    nombre varchar (100) NOT NULL,
    precio DECIMAL (5,2),
    descripcion TEXT,
    disponible BOOLEAN DEFAULT TRUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE ingredientes (
    id int(10) AUTO_INCREMENT PRIMARY KEY,
    nombreIngrediente VARCHAR (100) NOT NULL,
    stock int DEFAULT 0,
    costeUnitario DECIMAL (5, 2)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;





CREATE TABLE pedidos(
    id int(10) AUTO_INCREMENT PRIMARY KEY,
    empleado_id int(10),
    fechaPedido DATE,
    total DECIMAL (10,2)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE recetas(
    item_id int(10),
    ingrediente_id int(10),
    cantidadUsada int
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



ALTER TABLE pedidos 
    ADD KEY `empleadoID` (`empleado_id`),
    ADD CONSTRAINT `empleadoID` FOREIGN KEY (`empleado_id`) REFERENCES `empleados`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE itemsMenu 
    ADD KEY `categoriaID` (`categoria_id`),
    ADD CONSTRAINT `categoriaID` FOREIGN KEY (`categoria_id`) REFERENCES `categoriasMenu`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;




ALTER TABLE recetas 
    ADD KEY `itemID` (`item_id`),
    ADD KEY `ingredienteID` (`ingrediente_id`),

    ADD CONSTRAINT `ingredienteID` FOREIGN KEY (`ingrediente_id`) REFERENCES `ingredientes`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `itemID` FOREIGN KEY (`item_id`) REFERENCES `itemsMenu`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO empleados (nombre, apellido1,apellido2, rol, fechaContratacion, salario) VALUES 
('Juan',"Marques","Marquez","gerente","2023-10-10", 1800.00),
('Fernando', "López","López", "cocinero", "2023-11-10", 1500.00),
('Miguel', "López","Martinez", "camarero", "2023-12-10", 1200.00),
('Lucas', "López","Gómez", "camarero", "2023-12-12", 1200.00),
('Genaro', "López","Pérez", "camarero", "2023-12-18", 1200.00);




INSERT INTO categoriasMenu (nombreCategoria, descripcion) VALUES
("Hamburguesas", "Las mejores hamburguesas de la ciudad."),
("Bebidas", "Refrescos, cafés y bebidas isotonicas."),
("Perritos", "Los mejores perritos y acompañamientos.");



INSERT INTO ingredientes (nombreIngrediente,stock,costeUnitario) VALUES
("carnePicada",12,3),
("frankfurts",30,0.7),
("café",90,10),
("panhamburguesa",100,0.5),
("panperrito",100,0.5),
("tomate",80,1.5),
("cebolla",70,1),
("keptchup",300,0.6),
("mostaza",300,0.7),
("queso",200,10),
("pepinillos",100,0.5),
("cola",150,0.5);



INSERT INTO  itemsMenu (categoria_id,nombre,precio,descripcion) VALUES
(1,"cheese burguer", 10, "Burguer con queso."),
(1,"doble burguer", 16, "Doble Burguer."),
(3,"perrito completo", 12, "Perrito completo."),
(3,"perrito simple", 8, "Perrito solo con salsa.");



