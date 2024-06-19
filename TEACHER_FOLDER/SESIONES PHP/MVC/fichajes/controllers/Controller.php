<?php

// Importación de archivos
require_once("models/Fichaje.php");
require_once("models/TipoJornada.php");
require_once("models/Trabajador.php");

class Controller
{
  // Propiedades



  // Constructor



  // Getters y Setters



  // Methods
  public function index()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $productModel = new Fichaje(); // Instancia de `Fichaje` donde se realiza la conexión a la DB
    $fichajes = $productModel->getAllFichajes(); // Obtengo la información de la DB y la envío a la View `list_fichajes.php`

    require "views/list_fichajes.php";
  }

  public function create()
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO FICHAJE */
    $TipoJornadaModel = new TipoJornada(); // Instancia de `TipoJornada` donde se realiza la conexión a la DB
    $arrTiposJornada = $TipoJornadaModel->getAllTiposJornada(); // Obtengo la información de la DB y la envío a la View `form_producto.php`

    $trabajadorModel = new Trabajador(); // Instancia de `Trabajador` donde se realiza la conexión a la DB
    $arrTrabajadores = $trabajadorModel->getAllTrabajadores(); // Obtengo la información de la DB y la envío a la View `form_producto.php`

    require "views/form_create.php"; // Aquí existirá las variables `$categorias` y `$proveedores`
  }

  /* public function store()
  {
    if (isset($_POST['registrar'])) {
      $nombre = $_POST['nombre'];
      $categoria = $_POST['categoria'];
      $proveedor = $_POST['proveedor'];
      $precio = floatval($_POST['precio']);
      $stock = intval($_POST['stock']);

      $productoModel = new Producto();
      $productoModel->addProducto($nombre, $categoria, $proveedor, $precio, $stock);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/");
    }
  } */

  // Static Methods



}
