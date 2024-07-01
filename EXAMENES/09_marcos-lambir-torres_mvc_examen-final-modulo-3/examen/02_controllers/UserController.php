<?php

// Importación de archivos
require_once("01_models/User.php");
require_once("01_models/Auction.php");

class UserController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $lists = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/user/list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $registers = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/user/register.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $username = strval($_POST['username']);
      $pass = strval($_POST['pass']);
      $email = strval($_POST['email']);
      $createdAt = strval($_POST['createdAt']);

      var_dump($pass);

      if (empty($createdAt)) {
        $createdAt = date("Y-m-d H:i:s", intval(strtotime("now")));
      }

      $model = new User();
      $model->add("$username", "$pass", "$email", "$createdAt");

      header("Location: /PHP/MF0493/user/list/"); // Después de registrar me manda a la lista de usuarios
    }
  }

  public function login() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $logins = $model->getAll(); // Obtengo la información de la DB y la envío a la View `login.php`

    require "03_views/user/login.php";
  }

  public function checkUser()
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $logins = $model->getAll(); // Obtengo la información de la DB y la envío a la View `login.php`

    if (isset($_POST['login'])) {

      $username = strval($_POST['username']);
      $pass = strval($_POST['pass']);

      if ($logins[0]['username'] == $username && $logins[0]['pass'] == $pass) {
        header("Location: /PHP/MF0493/home/");
      }
    }
  }

  public function home()
  {
    require("03_views/user/home.php");
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/user/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/user/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
