<?php
/* Esta clase va a gestionar la tabla `alertas` */

class Alerta
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
    $consultaSQL = "SELECT alertas.id AS alertaID, alertas.tipo_alerta, alertas.descripcion, alertas.fecha_inicio, alertas.fecha_fin, ubicaciones.id AS ubicacionID, ubicaciones.nombre AS nombreUbicacion, ubicaciones.latitud, ubicaciones.longitud, ubicaciones.pais, ubicaciones.ciudad 
    FROM alertas 
    INNER JOIN ubicaciones ON alertas.ubicacion_id = ubicaciones.id;"; // Aquí saco toda la información necesaria. Además de la info entre las tablas relacionadas por sus Foreign Keys 
    $registros = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos
    return $arrAssoc;
  }

  public function add($ubicacion_id, $tipo_alerta, $descripcion, $fecha_inicio = "", $fecha_fin) // Al tener en la DB una función que por defecto toma la fecha de registro, dejo `$fecha_inicio` con un valor por defecto vacío
  {
    $consultaSQL = "INSERT INTO alertas (ubicacion_id, tipo_alerta, descripcion, fecha_inicio, fecha_fin) VALUES 
    (?, ?, ?, ?, ?);"; // Para preparar esta consulta, los valores vacíos de VALUES deben escribirse como `?` porque utilizamos la class `\mysqli`

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
    $consultaPrepare->bind_param("issss", $ubicacion_id, $tipo_alerta, $descripcion, $fecha_inicio, $fecha_fin);

    return $consultaPrepare->execute(); // Ejecuto la consulta
  }

  public function getByIDQueryParams()
  {
    $id = intval($_GET['id']);
    $consultaSQL = "SELECT alertas.id AS alertaID, alertas.tipo_alerta, alertas.descripcion, alertas.fecha_inicio, alertas.fecha_fin, ubicaciones.id AS ubicacionID, ubicaciones.nombre AS nombreUbicacion, ubicaciones.latitud, ubicaciones.longitud, ubicaciones.pais, ubicaciones.ciudad 
    FROM alertas 
    INNER JOIN ubicaciones ON alertas.ubicacion_id = ubicaciones.id 
    WHERE alertas.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function getByIDPathVariables($id)
  {
    $consultaSQL = "SELECT alertas.id AS alertaID, alertas.tipo_alerta, alertas.descripcion, alertas.fecha_inicio, alertas.fecha_fin, ubicaciones.id AS ubicacionID, ubicaciones.nombre AS nombreUbicacion, ubicaciones.latitud, ubicaciones.longitud, ubicaciones.pais, ubicaciones.ciudad 
    FROM alertas 
    INNER JOIN ubicaciones ON alertas.ubicacion_id = ubicaciones.id 
    WHERE alertas.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  // Static Methods

}
