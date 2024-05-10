


DROP DATABASE mitienda;
CREATE DATABASE mitienda;

USE mitienda;
CREATE TABLE proveedores (
id int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(255) NOT NULL,
direccion varchar(255),
telefono varchar(255),
cif varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE pedidos(
id int(10) AUTO_INCREMENT PRIMARY KEY,
codigo varchar(255) NOT NULL UNIQUE,
total DECIMAL(5,2) ,
descuento DECIMAL(5,2),
PVP DECIMAL(5,2),
cliente_id int(10),
fecha DATE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE clientes(
id int(10) AUTO_INCREMENT PRIMARY KEY,
nombre varchar(255) NOT NULL,
apellido1 varchar(255),
apellido2 varchar(255) ,
dni varchar(255),
fecha_nacimiento date,
correo_electronico varchar(255),
direccion varchar(255),
telefono varchar(255)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/* Relación entre tablas */
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

ALTER TABLE pedidos 
    ADD KEY `clienteID` (`cliente_id`),
    ADD CONSTRAINT `clienteID` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
