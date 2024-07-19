<?php

// Importación de archivos
require_once("models/Game.php");
require_once("models/Genero.php");
require_once("models/Desarrollador.php");
require_once("models/Plataforma.php");
require_once("models/Pegui.php");
require_once("models/Tarifa.php");

class Controller
{
  // Propiedades



  // Constructor



  // Getters y Setters



  // Methods
  public function index()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $modelGame = new Game(); // Instancia de `Game` donde se realiza la conexión a la DB
    $arrGames = $modelGame->getAll(); // Obtengo la información de la DB y la envío a la View `games_list.php`

    require "views/games_list.php";
  }

  public function create()
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $modelGame = new Game(); // Instancia de `Game` donde se realiza la conexión a la DB
    $modelGenero = new Genero(); // Instancia de `Genero` donde se realiza la conexión a la DB
    $modelDesarrollador = new Desarrollador(); // Instancia de `Desarrollador` donde se realiza la conexión a la DB
    $modelPlataforma = new Plataforma(); // Instancia de `Plataforma` donde se realiza la conexión a la DB
    $modelPegui = new Pegui(); // Instancia de `Pegui` donde se realiza la conexión a la DB
    $modelTarifa = new Tarifa(); // Instancia de `Tarifa` donde se realiza la conexión a la DB
    $arrGames = $modelGame->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`
    $arrGeneros = $modelGenero->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`
    $arrDesarrolladores = $modelDesarrollador->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`
    $arrPlataformas = $modelPlataforma->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`
    $arrPeguis = $modelPegui->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`
    $arrTarifas = $modelTarifa->getAll(); // Obtengo la información de la DB y la envío a la View `game_form_create.php`

    require "views/game_form_create.php"; // Aquí existirá las variables `$arrGames`, `$arrGeneros`, `$arrDesarrolladores`, `$arrPlataformas`, `$arrPeguis`, `$arrTarifas`
  }

  // public function store()
  // {
  //   if (isset($_POST['registrarVideojuego'])) {
  //     $trabajador = $_POST['trabajador'];
  //     $tipoJornada = $_POST['tipoJornada'];
  //     $fecha = $_POST['fecha'];
  //     $hora_entrada = $_POST['horaEntrada'];
  //     $hora_salida = $_POST['horaSalida'];

  //     $fichajeModel = new Fichaje();
  //     $fichajeModel->addFichaje($trabajador, $tipoJornada, $fecha, $hora_entrada, $hora_salida);

  //     header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/");
  //   }
  // }

  // public function queryParams()// Muestra a través del ID
  // {
  //   $model = new Game(); // Instancia de `Game` donde se realiza la conexión a la DB
  //   $arrDetailByQueryParam = $model->getByIDQueryParam(); // Obtengo la información de la DB y la envío a la View `game_detail.php`

  //   require "views/game_detail.php"; // Aquí existirá las variables `$detailByQueryParam`
  // }

  public function pathVariables($id) // Muestra a través del ID
  {
    $modelGame = new Game(); // Instancia de `Videojuego` donde se realiza la conexión a la DB
    $arrDetailByPathVariable = $modelGame->getByIDPathVariable($id); // Obtengo la información de la DB y la envío a la View `game_detail.php`

    require "views/game_detail.php"; // Aquí existirá las variables `$detailByPathVariable`
  }

  // Static Methods



}
