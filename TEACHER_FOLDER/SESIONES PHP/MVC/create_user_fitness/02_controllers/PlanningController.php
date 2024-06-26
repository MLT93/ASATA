<?php

// Importación de archivos
require_once("01_models/Usuario.php");
require_once("01_models/Actividad.php");
require_once("01_models/Planning.php");
require_once("01_models/Usuario.php");

class PlanningController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    // $planningModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    // $entrenamientos = $planningModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    $planningModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    $plannings = $planningModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/planning/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $activityModel = new Actividad(); // Instancia donde se realiza la conexión a la DB
    $actividades = $activityModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/planning/form_create.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {
      $id_actividad_prevista = intval($_POST['actividad']);
      $id_usuario = intval($_POST['user']);
      $fecha_prevista = date("Y-m-d", intval(strtotime("now")));
      $estado = 'A Realizar';
      
      // Variables para realizar cálculos
      $nDiasPorSemana = $_POST['nDiasPorSemana']; // La cantidad de registros a realizar
      $kcalMedPerSession = $_POST['kcalMedPerSession']; // En tabla objetivos buscar en la DB el objetivo, si está lo selecciono, si no, lo genero
      $minPerSession = $_POST['minPerSession'];
      /* 
      Duración del entrenamiento total = DuraciónMax = (KcalMed x MinPerSession) / nDias
        Calorías que se desean consumir = input de KcalMedPerSession
        */
      function calcularDuracionMaximaEntrenamiento($nDiasPorSemana, $kcalPerSession, $minPerSession)
      {
        if ($nDiasPorSemana <= 0) {
          return "El número de días por semana debe ser mayor que cero.";
        }
        
        $durationMax = ($kcalPerSession * $minPerSession ) / $nDiasPorSemana;
        
        return round($durationMax, 0);
      }
      
      $durationMaxEntrenamiento = calcularDuracionMaximaEntrenamiento($nDiasPorSemana, $kcalMedPerSession, $minPerSession);
      
      $id_objetivo = intval($durationMaxEntrenamiento);

      $planningModel = new Planning();
      $planningModel->add($id_actividad_prevista, $id_objetivo, $id_usuario, $fecha_prevista, $estado);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/planning/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $planningModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    $detail = $planningModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/planning/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $planningModel = new Planning(); // Instancia donde se realiza la conexión a la DB
    $detail = $planningModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/planning/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
