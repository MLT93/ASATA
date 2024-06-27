<?php

// Importación de archivos
require_once("01_models/Usuario.php");
require_once("01_models/Actividad.php");
require_once("01_models/Planning.php");
require_once("01_models/Usuario.php");
require_once("01_models/Objetivo.php");

class PlanningController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
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
      $id_actividad = intval($_POST['actividad']);
      $id_usuario = intval($_POST['user']);
      $fecha_prevista = date("Y-m-d", intval(strtotime("now")));
      $estado = 'A Realizar';

      // Variables para realizar cálculos
      $nDiasPorSemana = intval($_POST['nDiasPorSemana']); // La cantidad de registros a realizar
      $kcalPerSession = intval($_POST['kcalPerSession']); // En tabla objetivos buscar en la DB el objetivo, si está lo selecciono, si no, lo genero
      // $KcalPerMinPerSession = $kcalPerSession / 60; // Divido por 60 para calcular el gasto de Kcal por minuto
      $minPerSession = intval($_POST['minPerSession']);
      /* 
        Duración del entrenamiento total = DuraciónMax = (kcalPerSession x minPerSession) / nDiasPorSemana
        Calorías que se desean consumir = input de kcalPerHoraPerSession
      */
      function calcularDuracionMaximaEntrenamiento($nDiasPorSemana, $kcalPerSession, $minPerSession)
      {
        if ($nDiasPorSemana <= 0) {
          return "El número de días por semana debe ser mayor que cero";
        }

        $durationMaxOfSessionInMinutes = ($kcalPerSession * $minPerSession) / $nDiasPorSemana;

        return round($durationMaxOfSessionInMinutes, 0);
      }

      $durationMaxInMinutes = calcularDuracionMaximaEntrenamiento($nDiasPorSemana, $kcalPerSession, $minPerSession);

      /* 
        Objetivo de Kcal por sesión de entrenamiento = Regla de 3
        Si $kcalPerSession = 300Kcal/h
        Si $durationMaxInMinutes = 45min
        Si $nDiasPorSemana = 3nDias

        1h * 60 = 60 // Transformo $kcalPerSession en minutos (1*60) para poder calcular la regla de 3 usando minutos

               300Kcal         : 60min
        kcalPerMinutesTrained  : 45min

        $kcalPerMinutesTrained = (300 * 45) / 60 //=> 225Kcal cada 45min de entrenamiento
        $hoursTrainedPerWeek = 3 * 24 //=> 72h // Transformo los días a horas (3*24) para calcular el objetivo del entrenamiento
        $objetivo = 225 * 72 = 16200Kcal totales en todo el entrenamiento
      */
      $kcalPerMinutesTrained = ($kcalPerSession * $durationMaxInMinutes) / 60;
      $hoursTrainedPerWeek = $nDiasPorSemana * 24;
      $objetivo = $kcalPerMinutesTrained * $hoursTrainedPerWeek;
      $id_objetivo = 0; // Aquí pondré el valor del objetivo siempre que no lo encuentre en la DB

      $objetivoModel = new Objetivo();
      $objetivos = $objetivoModel->getAll();

      foreach ($objetivos as $key => $value) {
        if ($value['consumo_Kcal_total'] == $objetivo) {
          $id_objetivo = $value['id'];
        } else {
          $objetivoModel->add($objetivo);
          $objetivos = $objetivoModel->getLastOneByID();
          $id_objetivo = $objetivos[0]['id'];
        }
      }

      $planningModel = new Planning();
      $planningModel->add($id_actividad, $id_objetivo, $id_usuario, $fecha_prevista, $estado);

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
