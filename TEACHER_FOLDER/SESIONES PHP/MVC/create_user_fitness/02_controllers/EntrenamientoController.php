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
    // $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    // $entrenamientos = $trainingModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/entrenamiento/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $entrenamientos = $trainingModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $activityModel = new Actividad(); // Instancia donde se realiza la conexión a la DB
    $actividades = $activityModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $planningModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    $plannings = $planningModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

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

      $trainingModel = new Entrenamiento();
      $trainingModel->add($usuario, $actividad, $planning, $duracion, $fecha_inicio);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $detail = $trainingModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $entrenamientosPorUsuario = $trainingModel->getAllByUserId($_GET['id']); // Este ID se lo asigno directamente porque necesita un parámetro y esta función recibe `$_GET` de todas formas. Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/entrenamiento/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    // $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    // $detail = $trainingModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $entrenamientosPorUsuario = $trainingModel->getAllByUserId($id); // Obtengo la información de la DB y la envío a la View `list.ph`

    require "03_views/entrenamiento/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function mediaKcalMes()
  {
    $trainingModel = new Entrenamiento(); // Instancia donde se realiza la conexión a la DB
    $medias = $trainingModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `list.ph`

    require "03_views/entrenamiento/mediaKcalMes.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
