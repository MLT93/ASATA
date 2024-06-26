<?php

// Importación de archivos
require_once("01_models/Clase.php");
// require_once("01_models/Grupo.php");

class ClaseController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function index()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $listModel = new Clase(); // Instancia donde se realiza la conexión a la DB
    $clases = $listModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    require "03_views/clase/list.php";
  }

  public function create()
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $createModel = new Clase(); // Instancia donde se realiza la conexión a la DB
    $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/clase/form_create.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store()
  {
    if (isset($_POST['registrar'])) {
      $nombre = $_POST['nombre'];
      $apellido1 = $_POST['apellido1'];
      $apellido2 = $_POST['apellido2'];
      $dni = $_POST['dni'];
      $id_grupo = intval($_POST['grupo']);

      $fichajeModel = new Clase();
      $fichajeModel->add($nombre, $apellido1, $apellido2, $dni, $id_grupo);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/");
    }
  }

  public function queryParams()
  {
    $detailModel = new Clase(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/clase/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id)
  {
    $detailModel = new Clase(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/clase/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
