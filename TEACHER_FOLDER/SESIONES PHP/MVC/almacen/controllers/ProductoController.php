<?php

// Importo clases
require_once("models/Categoria.php");
require_once("models/Proveedor.php");
require_once("models/Producto.php");

class ProductoController
{
  // Propiedades



  // Constructor



  // Getters y Setters



  // Methods
  public function index()
  {
    $productModel = new Producto(); // Instancia de `Producto` donde se realiza la conexión a la DB
    $productos = $productModel->getAllProductos(); // Obtengo la información de la DB y la envío a la View `list_productos.php`

    require "views/list_productos.php";
  }

  public function create()
  {

    $categoriaModel = new Categoria(); // Instancia de `Categoria` donde se realiza la conexión a la DB
    $categorias = $categoriaModel->getAllCategorias(); // Obtengo la información de la DB y la envío a la View `form_producto.php`

    $proveedorModel = new Proveedor(); // Instancia de `Proveedor` donde se realiza la conexión a la DB
    $proveedores = $proveedorModel->getAllProveedores(); // Obtengo la información de la DB y la envío a la View `form_producto.php`

    require "views/form_producto.php"; // Aquí existirá las variables `$categorias` y `$proveedores`
  }

  // Static Methods



}
