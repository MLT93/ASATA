<?php
/* Esta clase va a gestionar la tabla `tipojornadas` */

class TipoJornada
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



  // Methods
  public function getAllTiposJornada()
  {
    $consultaSQL = "SELECT * FROM tipojornadas;"; // Aquí saco todos los productos y sus Foreign Keys asociados
    $registros = $this->connection->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    // $arrAssoc = $registros->fetch_assoc(); // Convertimos cada uno de los registros en forma de array asociativo
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de array asociativo
    return $arrAssoc;
  }

  // Static Methods



}
