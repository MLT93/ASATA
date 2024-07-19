<?php
/* Esta clase va a gestionar la tabla correspondiente en la DB */

class Bid
{
  // Propiedades
  private $connection;

  // Constructor
  public function __construct()
  {
    // Instanciamos `\mysqli` para crear conexión a la base de datos
    $this->connection = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); // Utilizo las variables constantes declaradas en `index.php`

    // ESTO ES PARA GESTIONAR POSIBLES ERRORES DE CONEXIÓN
    if ($this->connection->connect_error) {
      echo 'Error de conexión: ' . $this->connection->connect_error;
    }
  }

  // Getters y Setters
  protected function getConnection()
  {
    return $this->connection;
  }
  protected function setConnection($connection)
  {
    $this->connection = $connection;
  }

  // Methods
  public function getAll()
  {
    $consultaSQL = "SELECT auctions.id AS auctionID, auctions.descripcion, auctions.start_price, auctions.current_price, auctions.end_time, users.username, bids.bid_amount, bids.bid_time FROM bids 
    INNER JOIN auctions ON bids.auction_id = auctions.id
    INNER JOIN users ON bids.user_id = users.id;";
    $registros = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos
    return $arrAssoc;
  }

  public function add($auction_id, $user_id, $bid_amount, $bid_time = "") // Al tener en la DB una función que por defecto toma la fecha de registro, dejo `$bid_time` con un valor por defecto vacío
  {
    $consultaSQL = "INSERT INTO bids (auction_id, user_id, bid_amount, bid_time) VALUES (?, ?, ?, ?);"; // Para preparar esta consulta, los valores vacíos de VALUES deben escribirse como `?` porque utilizamos la class `\mysqli`

    $consultaPrepare = $this->getConnection()->prepare($consultaSQL); // Toma la consulta y la prepara para vincularle los VALUES a través de otro método 

    /* 
      1. Agrega variables a una sentencia preparada como sus VALUES
      2. Recibe parámetros:
          1. Type (Una cadena que contiene uno o más caracteres que especifican los tipos para el correspondiente enlazado de variables)
            `i`	la variable correspondiente es de tipo entero
            `d`	la variable correspondiente es de tipo double
            `s`	la variable correspondiente es de tipo string
            `b`	la variable correspondiente es un blob y se envía en paquetes
          2. Las variables correspondientes a la cantidad de VALUES a ingresar en la consulta
    */
    $consultaPrepare->bind_param("iids", $auction_id, $user_id, $bid_amount, $bid_time);

    return $consultaPrepare->execute(); // Ejecuto la consulta

    // $consultaSQL = "INSERT INTO bids (auction_id, user_id, bid_amount, bid_time) VALUES ($auction_id, $user_id, $bid_amount, '$bid_time');";
    // $this->connection->query($consultaSQL);
  }

  public function getByIDQueryParams()
  {
    $id = intval($_GET['id']);
    $consultaSQL = "SELECT auctions.id AS auctionID, auctions.title, auctions.descripcion, auctions.start_price, auctions.current_price, auctions.end_time, users.id AS userID, users.username, bids.bid_amount, bids.bid_time FROM bids 
    INNER JOIN auctions ON bids.auction_id = auctions.id
    INNER JOIN users ON bids.user_id = users.id
     WHERE bids.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function getByIDPathVariables($id)
  {
    $consultaSQL = "SELECT auctions.id AS auctionID, auctions.title, auctions.descripcion, auctions.start_price, auctions.current_price, auctions.end_time, users.id AS userID, users.username, bids.bid_amount, bids.bid_time FROM bids 
    INNER JOIN auctions ON bids.auction_id = auctions.id
    INNER JOIN users ON bids.user_id = users.id
     WHERE bids.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function getThisBidByIDQueryParams()
  {
    $thisId = intval($_GET['thisBidId']);
    $consultaSQL = "SELECT auctions.id AS auctionID, auctions.title, auctions.descripcion, auctions.start_price, auctions.current_price, auctions.end_time, users.id AS userID, users.username, bids.bid_amount, bids.bid_time FROM bids 
    INNER JOIN auctions ON bids.auction_id = auctions.id
    INNER JOIN users ON bids.user_id = users.id
     WHERE bids.id = $thisId;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function updateBid($auction_id, $user_id, $bid_amount, $bid_time = "") // Al tener en la DB una función que por defecto toma la fecha de registro, dejo `$bid_time` con un valor por defecto vacío
  {
    $consultaSQL = "UPDATE bids SET auction_id = $auction_id, user_id = $user_id, bid_amount = $bid_amount, bid_time = '$bid_time';";

    $sql = "SELECT current_price FROM auctions WHERE id = $auction_id";

    $reg = $this->getConnection()->query($sql);
    $arrAssoc = $reg->fetch_all(MYSQLI_ASSOC);

    $current_price = $arrAssoc['current_price'];

    $consultaSQL2 = "UPDATE auctions SET current_price = $bid_amount + $current_price;";

    $this->connection->query($consultaSQL);
    $this->connection->query($consultaSQL2);
  }

  // Static Methods

}
