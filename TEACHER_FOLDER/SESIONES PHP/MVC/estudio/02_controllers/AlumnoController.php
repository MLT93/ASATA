<?php

// Importación de archivos
require_once("01_models/Alumno.php");
require_once("01_models/Grupo.php");

class AlumnoController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function index()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $listModel = new Alumno(); // Instancia donde se realiza la conexión a la DB
    $alumnos = $listModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    $createModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
    $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/alumno/list.php";
  }

  public function create()
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO FICHAJE */
    $createModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
    $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/alumno/form_create.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store()
  {
    if (isset($_POST['registrar'])) {
      $nombre = $_POST['nombre'];
      $apellido1 = $_POST['apellido1'];
      $apellido2 = $_POST['apellido2'];
      $dni = $_POST['dni'];
      $id_grupo = intval($_POST['grupo']);

      $fichajeModel = new Alumno();
      $fichajeModel->add($nombre, $apellido1, $apellido2, $dni, $id_grupo);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $detailModel = new Alumno(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/alumno/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $detailModel = new Alumno(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/alumno/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
