<?php

// Importación de archivos
require_once("models/Categoria.php");
require_once("models/Proveedor.php");
require_once("models/Producto.php");

class ProveedorController
{
  // Propiedades



  // Constructor



  // Getters y Setters



  // Methods
  public function index() // Muestra la lista de la DB
  {
    $proveedorModel = new Proveedor(); // Instancia de `Proveedor` donde se realiza la conexión a la DB
    $proveedores = $proveedorModel->getAllProveedores(); // Obtengo la información de la DB y la envío a la View `list_proveedores.php`

    require "views/list_proveedores.php";
  }

  public function create() // Crea el formulario
  {
    // $proveedorModel = new Proveedor(); // Instancia de `Proveedor` donde se realiza la conexión a la DB
    // $arrProveedores = $proveedorModel->getAllProveedores(); // Obtengo la información de la DB y la envío a la View `form_proveedor.php`

    require "views/form_proveedor.php"; // Aquí existirá las variables `$arrProveedores`
  }

  public function store() // Almacena los datos del formulario en la DB
  {
    if (isset($_POST['registrarProveedor'])) {
      $nombre = $_POST['nombre'];
      $contacto = $_POST['contacto'];

      $proveedorModel = new Proveedor();
      $proveedorModel->addProveedor($nombre, $contacto);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $proveedorModel = new Proveedor(); // Instancia de `Proveedor` donde se realiza la conexión a la DB
    $arrProveedores = $proveedorModel->getProveedorByID(); // Obtengo la información de la DB y la envío a la View `detail_proveedor.php`

    require "views/detail_proveedor.php"; // Aquí existirá las variables `$arrProveedores`
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $productoModel = new Proveedor(); // Instancia de `Proveedor` donde se realiza la conexión a la DB
    $arrProveedores = $productoModel->getProveedorByID2($id); // Obtengo la información de la DB y la envío a la View `detail_proveedor.php`

    require "views/detail_proveedor.php"; // Aquí existirá las variables `$arrProveedores`
  }

  // Static Methods



}
