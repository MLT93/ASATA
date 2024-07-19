<?php

// Importación de archivos
require_once("01_models/Auction.php");
require_once("01_models/User.php");

class AuctionController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $model = new Auction(); // Instancia donde se realiza la conexión a la DB
    $lists = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/auction/list_auctions.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $users = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/auction/form_register.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $title = strval($_POST['title']);
      $descripcion = strval($_POST['descripcion']);
      $start_price = floatval($_POST['start_price']);
      $current_price = $start_price;
      $end_time = strval($_POST['end_time']);
      $user = intval($_POST['user']);

      $model = new Auction();
      $model->add($title, $descripcion, $start_price, $current_price, $end_time, $user);

      header("Location: /PHP/MF0493/auction/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new Auction(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/auction/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new Auction(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/auction/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  // Static Methods
}
