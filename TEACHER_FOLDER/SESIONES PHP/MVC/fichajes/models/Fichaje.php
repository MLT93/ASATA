<?php
/* Esta clase va a gestionar la tabla `fichajes` */

class Fichaje
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
  public function getAllFichajes()
  {
    $consultaSQL = "SELECT fichajes.id, trabajadores.nombre, tipojornadas.descripcion, fichajes.fecha, fichajes.hora_entrada, fichajes.hora_salida 
    FROM fichajes 
    INNER JOIN trabajadores ON fichajes.trabajador_id = trabajadores.id
    INNER JOIN tipojornadas ON fichajes.tipojornada_id = tipojornadas.id;"; // Aquí saco todos los productos y sus Foreign Keys asociados
    $registros = $this->connection->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    // $arrAssoc = $registros->fetch_assoc(); // Convertimos cada uno de los registros en forma de array asociativo
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de array asociativo
    return $arrAssoc;
  }

  public function addFichaje($trabajador, $tipoJornada, $fecha, $hora_entrada, $hora_salida)
  {
    $consultaSQL = "INSERT INTO fichajes (trabajador_id, tipojornada_id, fecha, hora_entrada, hora_salida) VALUES
    (?, ?, ?, ?, ?);"; // Para preparar esta consulta, los valores vacíos de VALUES deben escribirse como `?` porque utilizamos la class `\mysqli`

    $consultaPrepare = $this->connection->prepare($consultaSQL); // Toma la consulta y la prepara para vincularle los VALUES a través de otro método 
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
    $consultaPrepare->bind_param("", $trabajador, $tipoJornada, $fecha, $hora_entrada, $hora_salida);

    return $consultaPrepare->execute(); // Ejecuto la consulta
  }

  // Static Methods



}
