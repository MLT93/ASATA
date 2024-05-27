-- SENTENCIA PARA INGRESAR 2 USUARIOS EN LA TABLA usuarios
INSERT INTO `usuarios` (`id`, `nickname`, `email`, `hashedPassword`, `telefono`, `direccion`) VALUES
(1, 'use1', 'use1@mail.com', '$2y$10$ocG4duDex0JETqxml4RnbuwUxGnKx0VCkvQDa8PUVeafr9OQjpYam', '555 555', 'plaza mayor'),
(2, 'use2', 'use2@mail.com', '$2y$10$N5h/AAPK23b3uvEiS/w4KeKsLzm9V1U8FOnuX56msvNeXmx5NEF4S', '777 555', 'calle menor');

-- SENTENCIA PARA INGRESAR 6 PRODUCTOS EN LA TABLA productos
INSERT INTO `productos` (`nombre`, `precio`, `descripcion`) VALUES
("Hamburguesa", 3.75, "Las mejores hamburguesas de la ciudad"),
("Hot Dog", 2.50, "Perrito caliente al estilo EEUU"),
("Pizza", 7.90, "Pizza con la mejor mozzarella"),
("Kebab", 5.00, "Auténtico Durum de Turquía"),
("Cerveza", 2.50, "Cerveza Irlandesa"),
("Café", 1.50, "Café colombiano"),
("Helado", 3.20, "Refrescante");

-- SENTENCIA PARA INGRESAR 6 INGREDIENTES EN LA TABLA ingredientes
INSERT INTO `ingredientes` (`nombreIngrediente`, `stock`, `costeUnitario`) VALUES
("Frankfurt", 30, 0.70),
("Café", 90, 12),
("Pan Hamburguesas", 100, 0.95),
("Pan Perrito", 100, 0.35),
("Tomate", 80, 1.35),
("Cebolla", 100, 0.15),
("Ketchup", 100, 0.6),
("Mostaza", 100, 0.7),
("Queso Tierno", 100, 10),
("Pepinillos", 100, 0.5),
("Cola", 150, 0.4);

-- SENTENCIA PARA INGRESAR 6 REGISTROS EN LA TABLA listaingredientes
INSERT INTO `listaIngredientes` (`id_producto`, `id_ingrediente`, `cantidadUsada`) VALUES
(1, 2, 7),
(1, 3, 7),
(1, 4, 7),
(1, 6, 7),
(1, 7, 7),
(1, 3, 7);

-- SENTENCIA PARA INGRESAR 6 PEDIDOS EN LA TABLA pedidos
INSERT INTO `pedidos` (`id_usuario`, `fechaPedido`, `total`) VALUES
(1, "2023-10-10", 15),
(1, "2022-03-20", 30),
(1, "2023-01-14", 15),
(1, "2021-10-16", 20),
(1, "2023-11-17", 15),
(1, "2020-05-23", 10),
(1, "2023-07-30", 15);

-- SENTENCIA PARA INGRESAR 6 REGISTROS EN LA TABLA detallespedido
INSERT INTO `detallesPedido` (`id_pedido`, `id_producto`) VALUES
(1, 2),
(2, 1),
(1, 2),
(2, 1),
(1, 2),
(1, 2);
