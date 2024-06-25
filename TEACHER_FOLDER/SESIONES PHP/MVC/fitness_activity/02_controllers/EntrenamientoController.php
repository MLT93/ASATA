<?php

// Importación de archivos
require_once("01_models/Entrenamiento.php");
require_once("01_models/Actividad.php");
require_once("01_models/Planning.php");
require_once("01_models/Usuario.php");

class EntrenamientoController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $listModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $entrenamientos = $listModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    // $createModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    // $grupos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/entrenamiento/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO FICHAJE */
    $createModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $entrenamientos = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`
   
    $createModel = new Actividad(); // Instancia donde se realiza la conexión a la DB
    $actividades = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`
    
    $createModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    $plannings = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $createModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $createModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/entrenamiento/form_create.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {
      $usuario = $_POST['usuario'];
      $actividad = $_POST['actividad'];
      $planning = $_POST['planning'];
      $duracion = $_POST['duracion'];
      $fecha_inicio = $_POST['fechaInicio'];
      // $fecha_inicio = date("Y-m-d H:i:s", intval(strtotime("now")));

      $fichajeModel = new Entrenamiento();
      $fichajeModel->add($usuario, $actividad, $planning, $duracion, $fecha_inicio);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/list/");
    }
  }

  public function queryParams() // Muestra sólo 1 a través del ID
  {
    $detailModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/entrenamiento/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra sólo 1 a través del ID
  {
    $detailModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $detail = $detailModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/entrenamiento/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function mediaKcalMes()
  {


    require "03_views/entrenamiento/mediaKcalMes.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
