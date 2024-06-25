<?php

// Importación de archivos
require_once("01_models/Grupo.php");
require_once("01_models/Alumno.php");

class GrupoController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function index()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $createModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
    $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/grupo/list.php";
  }

  // public function create()
  // {
  //   /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO FICHAJE */
  //   $createModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
  //   $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

  //   require "03_views/grupo/form_create.php"; // Aquí estará disponible la variable sin utilizar
  // }

  // public function store()
  // {
  //   if (isset($_POST['registrar'])) {
  //     $nombre = $_POST['nombre'];
  //     $apellido1 = $_POST['apellido1'];
  //     $apellido2 = $_POST['apellido2'];
  //     $dni = $_POST['dni'];
  //     $id_grupo = intval($_POST['grupo']);

  //     $fichajeModel = new Alumno();
  //     $fichajeModel->add($nombre, $apellido1, $apellido2, $dni, $id_grupo);

  //     header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/estudio/clase/");
  //   }
  // }

  public function queryParams() // Muestra sólo 1 a través del ID
  {
    $detailModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    switch ($detail[0]['tag']) {
      case 'Grupo A':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo B':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo C':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo D':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo E':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo F':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;

      default:
        # code...
        break;
    }

    require "03_views/grupo/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra sólo 1 a través del ID
  {
    $detailModel = new Grupo(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    switch ($detail[0]['tag']) {
      case 'Grupo A':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo B':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo C':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo D':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo E':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;
      case 'Grupo F':
        $alumnosByGroupTag = $detailModel->getAlumnosByGroupTag($detail[0]['tag']);
        break;

      default:
        # code...
        break;
    }
    require "03_views/grupo/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
