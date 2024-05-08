


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




ALTER TABLE pedidos 
    ADD KEY `clienteID` (`cliente_id`),
    ADD CONSTRAINT `clienteID` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
