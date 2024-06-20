/* Database */
DROP DATABASE IF EXISTS hippoclothes;

CREATE DATABASE IF NOT EXISTS hippoclothes;

ALTER DATABASE hippoclothes DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

USE hippoclothes;

/* Tabla roles */
DROP TABLE IF EXISTS roles;

CREATE TABLE
  `roles` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    rol VARCHAR(5) DEFAULT 'User' COMMENT 'Admin, User',
    descripcion TEXT
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `roles` (id, rol)
VALUES
  (1, 'Admin'),
  (2, 'User'),
  (3, 'User');

/* Tabla metodos_pago */
DROP TABLE IF EXISTS metodos_pago;

CREATE TABLE
  `metodos_pago` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    metodo VARCHAR(100) DEFAULT 'PayPal' COMMENT 'PayPal, Tarjeta, Transferencia bancaria, Crypto'
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `metodos_pago` (id, metodo)
VALUES
  (1, 'PayPal'),
  (2, 'Tarjeta'),
  (3, 'Transferencia bancaria'),
  (4, 'Crypto');

/* Tabla usuarios */
DROP TABLE IF EXISTS usuarios;

CREATE TABLE
  `usuarios` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_rol INT (10) NOT NULL,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    hashedPassword VARCHAR(255) NOT NULL,
    imagen VARCHAR(255),
    FOREIGN KEY (id_rol) REFERENCES roles (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `usuarios` (id_rol, username, email, hashedPassword, imagen)
VALUES
  (
    1,
    'admin',
    'admin@mail.com',
    '1234',
    ''
  ),
  (
    2,
    'panchu89',
    'user1@mail.com',
    '1234',
    ''
  ),
  (
    2,
    'juani23',
    'user2@mail.com',
    '1234',
    ''
  );

/* Tabla sesiones */
DROP TABLE IF EXISTS sesiones;

CREATE TABLE
  `sesiones` (
    id INT (10) NOT NULL,
    id_usuario INT (10) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    estado VARCHAR(255) NOT NULL COMMENT 'LOG IN, LOG OUT',
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla clientes */
DROP TABLE IF EXISTS clientes;

CREATE TABLE
  `clientes` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT (10) NOT NULL,
    tipo_documento VARCHAR(20) NOT NULL COMMENT 'DNI, NIE, Pasaporte',
    num_documento VARCHAR(20) NOT NULL,
    direccion VARCHAR(70) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `clientes` (
    id_usuario,
    tipo_documento,
    num_documento,
    direccion,
    telefono,
    fecha_nacimiento
  )
VALUES
  (
    1,
    'DNI',
    '98979866-P',
    'C/ Admin, 1',
    '654654654',
    '2024-01-01'
  ),
  (
    2,
    'Pasaporte',
    'ZAB000254',
    'C/ User, 1',
    '693693693',
    '2024-01-01'
  ),
  (
    3,
    'NIE',
    'X-1234567-P',
    'C/ User, 2',
    '684684684',
    '2024-01-01'
  );

/* Tabla tarjetas */
DROP TABLE IF EXISTS tarjetas;

CREATE TABLE
  `tarjetas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT (10) NOT NULL,
    nombre_completo_tarjeta VARCHAR(100) NOT NULL,
    red_pago VARCHAR(50) NOT NULL COMMENT 'Mastercard, Visa, American Express',
    num_tarjeta VARCHAR(16),
    cvv_tarjeta INT (3),
    fecha_caducidad DATE NOT NULL,
    isPrincipal TINYINT (1) NOT NULL COMMENT 'Es la tarjeta de pago por defecto',
    FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `tarjetas` (
    id_cliente,
    nombre_completo_tarjeta,
    red_pago,
    num_tarjeta,
    cvv_tarjeta,
    fecha_caducidad,
    isPrincipal
  )
VALUES
  (
    1,
    "Admin Master Main",
    'American Express',
    '5555444400008888',
    '111',
    '2100-01-01',
    1
  ),
  (
    2,
    "User1 User1 User1",
    'Visa',
    '5532444400005555',
    '222',
    '2070-01-01',
    1
  ),
  (
    3,
    "User2 User2 User2",
    'Master Card',
    '5885333300007777',
    '333',
    '2070-01-01',
    0
  );

/* Tabla  */
DROP TABLE IF EXISTS bancos;

CREATE TABLE
  `bancos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT (10) NOT NULL,
    iban_bancario VARCHAR(32) NOT NULL,
    swift_bic VARCHAR(11),
    FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  `bancos` (id_cliente, iban_bancario, swift_bic)
VALUES
  (1, "ES6112343456420457323531", ''),
  (2, "ES6112343456400006323532", ''),
  (3, "ES6112343450400016323533", '');

/* Tabla cryptos */
DROP TABLE IF EXISTS cryptos;

CREATE TABLE
  `cryptos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT (10) NOT NULL,
    moneda_crypto VARCHAR(3) DEFAULT 'BNB' COMMENT 'BNB, ETH, BTC, USDT',
    FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla proveedores */
DROP TABLE IF EXISTS proveedores;

CREATE TABLE
  `proveedores` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    tipo_proveedor VARCHAR(20) NOT NULL COMMENT 'Empresa, Autónomo',
    nombre VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    nombre_comercial VARCHAR(100),
    tipo_documento VARCHAR(20) NOT NULL COMMENT 'Cif, DNI, Pasaporte',
    num_documento VARCHAR(20) NOT NULL,
    direccion VARCHAR(70) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla temporadas */
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

/* Tabla categorias */
DROP TABLE IF EXISTS categorias;

CREATE TABLE
  `categorias` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR (255) NOT NULL COMMENT 'Gorras, T-Shirts, Sudaderas, Gadgets, Zapatillas',
    imagen VARCHAR (255)
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  categorias (categoria, imagen)
VALUES
  ('Gorras', ''),
  ('T-Shirts', ''),
  ('Sudaderas', ''),
  ('Gadgets', ''),
  ('Zapatillas', '');

/* Tabla articulos */
DROP TABLE IF EXISTS articulos;

CREATE TABLE
  `articulos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_categoria INT (10) NOT NULL,
    id_temporada INT (10) NOT NULL,
    codigo_SKU VARCHAR(8) NOT NULL UNIQUE COMMENT 'Código alfanumérico que referencia el producto en la tienda',
    codigo_EAN VARCHAR(13) NOT NULL UNIQUE COMMENT 'Código de barras del producto',
    color VARCHAR(50) NOT NULL,
    talla VARCHAR(5) NOT NULL COMMENT 'XS, S, M, L, XL, XXL, XXXL',
    precio_venta DECIMAL(10, 2) NOT NULL,
    stock INT (10) NOT NULL,
    descripcion TEXT,
    estado VARCHAR(30) NOT NULL COMMENT 'Disponible, Agotado, Defectuoso, En transito',
    imagen VARCHAR (255),
    FOREIGN KEY (id_categoria) REFERENCES categorias (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_temporada) REFERENCES temporadas (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

INSERT INTO
  articulos (
    id_categoria,
    id_temporada,
    codigo_SKU,
    codigo_EAN,
    color,
    talla,
    precio_venta,
    stock,
    descripcion,
    estado,
    imagen
  )
VALUES
  (
    1,
    1,
    'A1111111',
    '0000000089087',
    'Azul Marino',
    'M',
    18.00,
    30,
    'Gorra Hippo Negra con visera plana. Estilo Hip Hop. Logo central',
    'Disponible',
    ''
  ),
  (
    2,
    1,
    'B1111111',
    '0000059089087',
    'Blanca',
    'M',
    24.99,
    40,
    'Camiseta con logo central Hippo',
    'Disponible',
    ''
  ),
  (
    3,
    1,
    'C1111111',
    '0000079569082',
    'Beige',
    'L',
    29.99,
    25,
    'Sudadera Hip Hop con capucha',
    'Disponible',
    ''
  ),
  (
    4,
    1,
    'D1111111',
    '0000089089583',
    'Color Aleatorio',
    'M',
    7.90,
    50,
    'Porta llaves standard Hippo',
    'Agotado',
    ''
  );

/* Tabla recepciones_almacen */
DROP TABLE IF EXISTS recepciones_almacen;

CREATE TABLE
  `recepciones_almacen` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_proveedor INT (10) NOT NULL,
    num_albaran VARCHAR(20) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    impuesto DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL COMMENT 'Recibido, Pendiente, Devuelto',
    FOREIGN KEY (id_proveedor) REFERENCES proveedores (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_recepcion_almacen */
DROP TABLE IF EXISTS detalles_recepcion_almacen;

CREATE TABLE
  `detalles_recepcion_almacen` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_recepcion_almacen INT (10) NOT NULL,
    id_articulo INT (10) NOT NULL,
    cantidad INT (10) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_recepcion_almacen) REFERENCES recepciones_almacen (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_articulo) REFERENCES articulos (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla pedidos */
DROP TABLE IF EXISTS pedidos;

CREATE TABLE
  `pedidos` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT (10) NOT NULL,
    id_metodo_pago INT (10) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    impuesto DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL COMMENT 'Procesado, En tránsito, Entregado, Cancelado',
    FOREIGN KEY (id_cliente) REFERENCES clientes (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_metodo_pago) REFERENCES metodos_pago (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_pedido */
DROP TABLE IF EXISTS detalles_pedido;

CREATE TABLE
  `detalles_pedido` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_pedido INT (10) NOT NULL,
    id_articulo INT (10) NOT NULL,
    cantidad INT (10) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    descuento DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedidos (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_articulo) REFERENCES articulos (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla facturas */
DROP TABLE IF EXISTS facturas;

CREATE TABLE
  `facturas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    num_factura VARCHAR(10) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    impuesto DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_facturas */
DROP TABLE IF EXISTS detalles_facturas;

CREATE TABLE
  `detalles_facturas` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_factura INT (10) NOT NULL,
    id_detalle_pedido INT (10) NOT NULL,
    FOREIGN KEY (id_factura) REFERENCES facturas (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_detalle_pedido) REFERENCES detalles_pedido (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla tickets */
DROP TABLE IF EXISTS tickets;

CREATE TABLE
  `tickets` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    num_ticket VARCHAR(10) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    impuesto DECIMAL(10, 2) NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    estado VARCHAR(20) NOT NULL
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;

/* Tabla detalles_tickets */
DROP TABLE IF EXISTS detalles_tickets;

CREATE TABLE
  `detalles_tickets` (
    id INT (10) PRIMARY KEY AUTO_INCREMENT,
    id_ticket INT (10) NOT NULL,
    id_detalle_pedido INT (10) NOT NULL,
    FOREIGN KEY (id_ticket) REFERENCES tickets (id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_detalle_pedido) REFERENCES detalles_pedido (id) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;
