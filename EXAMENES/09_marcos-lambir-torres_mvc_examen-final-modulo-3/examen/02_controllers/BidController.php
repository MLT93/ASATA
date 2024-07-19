<?php

// Importación de archivos
require_once("01_models/Bid.php");
require_once("01_models/User.php");
require_once("01_models/Auction.php");

class BidController
{
  // Propiedades


  // Constructor


  // Getters y Setters


  // Methods
  public function list()
  {
    /* AQUÍ OBTENGO LA INFO PRINCIPAL DE LOS DE MI DB */
    $model = new Bid(); // Instancia donde se realiza la conexión a la DB
    $lists = $model->getAll(); // Obtengo la información de la DB y la envío a la View `list.ph

    require "03_views/bid/bid_list.php";
  }

  public function register() // Nos manda al formulario de registro
  {
    /* AQUÍ DEBO OBTENER LAS INFORMACIONES DE LAS DISTINTAS TABLAS DE LA DB PARA ENVIAR LA INFO A LA VIEW QUE TIENE EL FORM Y PODER REALIZAR UN NUEVO REGISTRO */
    $model = new Auction(); // Instancia donde se realiza la conexión a la DB
    $auctions = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    $model = new User(); // Instancia donde se realiza la conexión a la DB
    $users = $model->getAll(); // Obtengo la información de la DB y la envío a la View `form_create.php`

    require "03_views/bid/form_register.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function store() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['registrar'])) {

      $user_id = intval($_POST['user']);
      $auction_id = intval($_POST['auction']);
      $bid_amount = floatval($_POST['bid_amount']);
      $bid_time = strval($_POST['bid_time']);

      // Al tener en la DB una función que por defecto toma la fecha de registro, este input se utilizará si la fecha de inicio es distinta a la actual
      if (empty($bid_time)) {
        $bid_time = date("Y-m-d H:i:s", intval(strtotime("now")));
      }

      $model = new Bid();
      $model->add($user_id, $auction_id, $bid_amount, $bid_time);

      header("Location: /PHP/MF0493/bid/list/");
    }
  }

  public function queryParams() // Muestra a través del ID
  {
    $model = new Bid(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/bid/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function pathVariables($id) // Muestra a través del ID
  {
    $model = new Bid(); // Instancia donde se realiza la conexión a la DB
    $detail = $model->getByIDPathVariables($id); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/bid/detail.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function bidById() // Muestra a través del ID
  {
    $model = new Bid(); // Instancia donde se realiza la conexión a la DB
    $thisBid = $model->getThisBidByIDQueryParams(); // Obtengo la información de la DB y la envío a la View `detail.php`

    require "03_views/bid/singular_bid.php"; // Aquí estará disponible la variable sin utilizar
  }

  public function update() // Inserta en la DB y nos manda al `home | index` de nuestra página
  {
    if (isset($_POST['update'])) {
      $user_id = 0;
      $auction_id = 0;
      foreach ($_POST as $key => $value) {
        if ($key != "thisBidAmount" && $key != "thisBidTime" && $key != "update") {
          // Saco el ID del producto de esta forma porque el `name=""` es el ID, por eso necesito iterar `$_POST`
          // Si `name=""` no es "thisBidAmount", "thisBidTime" o "update", me quedan los ID
          $user_id = intval($key);
          $auction_id = intval($key);
        }
      }

      //   $user_id = intval($_POST['thisUser']);
      //   $auction_id = intval($_POST['thisAuction']);
      $bid_amount = floatval($_POST['thisBidAmount']);
      $bid_time = strval($_POST['thisBidTime']);

      // Al tener en la DB una función que por defecto toma la fecha de registro, este input se utilizará si la fecha de inicio es distinta a la actual
      if (empty($bid_time)) {
        $bid_time = date("Y-m-d H:i:s", intval(strtotime("now")));
      }

      $model = new Bid();
      $model->updateBid($user_id, $auction_id, $bid_amount, $bid_time);

      header("Location: /PHP/MF0493/bid/list/");
    }
  }

  // Static Methods
}
