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
    $arrTiposJornada = $TipoJornadaModel->getAllTiposJornada(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $trabajadorModel = new Trabajador(); // Instancia de `Trabajador` donde se realiza la conexión a la DB
    $arrTrabajadores = $trabajadorModel->getAllTrabajadores(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "views/form_create.php"; // Aquí existirá las variables `$arrTiposJornada` y `$arrTrabajadores`
  }

  public function store()
  {
    if (isset($_POST['registrar'])) {
      $trabajador = $_POST['trabajador'];
      $tipoJornada = $_POST['tipoJornada'];
      $fecha = $_POST['fecha'];
      $hora_entrada = $_POST['horaEntrada'];
      $hora_salida = $_POST['horaSalida'];

      $fichajeModel = new Fichaje();
      $fichajeModel->addFichaje($trabajador, $tipoJornada, $fecha, $hora_entrada, $hora_salida);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/");
    }
  }

  public function detail()
  {
    $detailModel = new Fichaje(); // Instancia de `Fichaje` donde se realiza la conexión a la DB
    $detail = $detailModel->getByID(); // Obtengo la información de la DB y la envío a la View `detail_fichaje.php`

    require "views/detail_fichaje.php"; // Aquí existirá las variables `$detail`
  }

  // Static Methods



}
