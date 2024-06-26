<?php

// Importación de archivos
require_once("01_models/Usuario.php");
require_once("01_models/Actividad.php");
require_once("01_models/Planning.php");
require_once("01_models/Usuario.php");

class UsuarioController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    // $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    // $entrenamientos = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.php`

    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/usuario/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $usuarios = $userModel->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/usuario/form_create.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $nickname = $_POST['nickname'];
      $password1 = $_POST['password1'];
      $password2 = $_POST['password2'];
      $password = "";
      if ($password1 === $password2) {
         $password = $password1;
      } else {
        echo json_encode(["success" => false, "message" => "Las passwords no coinciden"]);
      }
      $email = $_POST['email'];
      $fechaNacimiento = $_POST['fechaNacimiento'];
      $pesoKg = intval($_POST['pesoKg']);
      $alturaCm = intval($_POST['alturaCm']);

      $userModel = new Usuario();
      $userModel->add($nombre, $apellido, $nickname, $password, $email, $fechaNacimiento, $pesoKg, $alturaCm);

      header("Location: /ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $detail = $userModel->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/usuario/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $userModel = new Usuario(); // Instancia donde se realiza la conexión a la DB
    $detail = $userModel->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/usuario/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
