/* Database */
DROP DATABASE IF EXISTS hippoclothes;

CREATE DATABASE IF NOT EXISTS hippoclothes;

ALTER DATABASE hippoclothes DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

USE hippoclothes;

/* Tabla roles */
CREATE TABLE
  `roles` (
    id_rol INT (10) PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(5) DEFAULT 'User' COMMENT 'Admin, User, Proveedor',
    descripcion TEXT
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla métodos pago */
CREATE TABLE
  `metodos_pago` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    metodo VARCHAR(100) NOT NULL DEFAULT 'PayPal' COMMENT 'PayPal, Tarjeta, Transferencia bancaria, Crypto, Contado',
    tipo_documento_asociado VARCHAR(20) NOT NULL,
    num_documento_asociado VARCHAR(20) UNIQUE NOT NULL,
    direccion VARCHAR(70) NOT NULL,
    num_tarjeta VARCHAR(16),
    cvv_tarjeta INT(3),
    iban_bancario VARCHAR(24),
    swift_bic VARCHAR(11),
    moneda_crypto VARCHAR(3) DEFAULT 'BNB' COMMENT 'BNB, ETH, BTC, USDT',
    telefono VARCHAR(20),
    fecha_nacimiento DATE NOT NULL
  )

  /* Tabla usuarios */
CREATE TABLE
  `usuarios` (
    id_usuario INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_rol INT (10) NOT NULL,
    id_metodo_pago INT (10) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    hashedPassword VARCHAR(16) NOT NULL,
    imagen varchar(255) NOT NULL,
    FOREIGN KEY (id_rol) REFERENCES rol (id_rol),
    FOREIGN KEY (id_metodo_pago) REFERENCES metodos_pago (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla proveedores */
CREATE TABLE
  `proveedores` (
    id_persona INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_rol INT (10) NOT NULL,
    tipo_proveedor VARCHAR(20) NOT NULL COMMENT 'Empresa, Autónomo',
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100),
    nombre_comercial VARCHAR(100),
    tipo_documento VARCHAR(20) null COMMENT 'Cif, DNI, Pasaporte',
    num_documento VARCHAR(20) null,
    direccion VARCHAR(70) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla categorías */
DROP TABLE IF EXISTS temporadas;

CREATE TABLE
  `temporadas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL UNIQUE,
    descripcion TEXT,
    anualidad INT (4) NOT NULL COMMENT 'Es la fecha (ej. 2024). Esto filtrará el catalogo por temporada'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  temporadas (nombre, descripcion, anualidad)
VALUES
  ('Summer', 'Ropa de verano', 2024),
  ('Autumn', 'Ropa de otoño', 2024),
  ('Winter', 'Ropa de invierno', 2024),
  ('Spring', 'Ropa de primavera', 2024);

/* Tabla artículos */
DROP TABLE IF EXISTS articulos;

CREATE TABLE
  `articulos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT (10) NOT NULL,
    codigo_referencia VARCHAR(50) NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    precio_venta DECIMAL(10, 2) NOT NULL,
    stock INT (10) NOT NULL,
    descripcion TEXT,
    estado VARCHAR(30) COMMENT 'Disponible, Defectuoso, En transito',
    FOREIGN KEY (id_categoria) REFERENCES categorias (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla recepciones_almacen */
CREATE TABLE
  `recepciones_almacen` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_proveedor INT (10) NOT NULL,
    num_albaran VARCHAR(20) NOT NULL,
    fecha datetime NOT NULL,
    impuesto decimal(4, 2) NOT NULL,
    total decimal(11, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL COMMENT 'Recibido, Pendiente, Devuelto',
    FOREIGN KEY (id_proveedor) REFERENCES proveedores (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalle_recepciones_almacen */
CREATE TABLE
  `detalle_recepciones_almacen` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_recepcion_almacen INT (10) NOT NULL,
    id_articulo INT (10) NOT NULL,
    cantidad INT (10) NOT NULL,
    precio decimal(11, 2) NOT NULL,
    FOREIGN KEY (id_recepcion_almacen) REFERENCES recepciones_almacen (id) ON DELETE CASCADE,
    FOREIGN KEY (id_articulo) REFERENCES articulos (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla pedidos */
CREATE TABLE
  `pedidos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT (10) NOT NULL,
    id_factura tipo_comprobante VARCHAR(20) NOT NULL COMMENT 'Factura, Ticket, Ticket nominal',
    num_comprobante VARCHAR(10) NOT NULL,
    fecha_hora datetime NOT NULL,
    impuesto decimal(4, 2) NOT NULL,
    total decimal(11, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_pedido */
CREATE TABLE
  `detalles_pedido` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT (10) NOT NULL,
    id_articulos INT (10) NOT NULL,
    cantidad INT (10) NOT NULL,
    precio decimal(11, 2) NOT NULL,
    descuento decimal(11, 2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id) ON DELETE CASCADE,
    FOREIGN KEY (id_articulos) REFERENCES articulos (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla facturas */
CREATE TABLE
  `facturas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT (10) NOT NULL,
    num_factura VARCHAR(10) NOT NULL,
    fecha_hora datetime NOT NULL,
    impuesto decimal(4, 2) NOT NULL,
    total decimal(11, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_facturas */
CREATE TABLE
  `detalles_facturas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_detalle_pedido INT (10) NOT NULL,
    FOREIGN KEY (id_articulos) REFERENCES articulos (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla tickets */
CREATE TABLE
  `tickets` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT (10) NOT NULL,
    num_factura VARCHAR(10) NOT NULL,
    fecha_hora datetime NOT NULL,
    impuesto decimal(4, 2) NOT NULL,
    total decimal(11, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_tickets */
CREATE TABLE
  `detalles_tickets` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_detalle_pedido INT (10) NOT NULL,
    FOREIGN KEY (id_articulos) REFERENCES articulos (id)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla sesiones */
CREATE TABLE
  `sesiones` (
    `id` int (10) NOT NULL,
    `id_usuario` int (10) NOT NULL,
    `fecha` datetime NOT NULL,
    `interaccion` varchar(255) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
