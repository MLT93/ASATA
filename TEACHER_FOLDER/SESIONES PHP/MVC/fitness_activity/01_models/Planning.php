<?php
/* Esta clase va a gestionar la tabla `plannings` */

class Planning
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
    $consultaSQL = "SELECT plannings.id, plannings.fecha_prevista, plannings.estado, actividades.descripcion, objetivos.consumo_Kcal_total, usuarios.nombre 
    FROM plannings
    INNER JOIN actividades ON plannings.id_actividad = actividades.id 
    INNER JOIN objetivos ON plannings.id_objetivo = objetivos.id 
    INNER JOIN usuarios ON plannings.id_usuario = usuarios.id;"; // Aquí saco toda la información necesaria. Además de la info entre las tablas relacionadas por sus Foreign Keys 
    $registros = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos
    return $arrAssoc;
  }

  public function add($id_actividad, $id_objetivo, $id_usuario, $fecha_prevista, $estado)
  {
    $consultaSQL = "INSERT INTO plannings (id_actividad, id_objetivo, id_usuario, fecha_prevista, estado) VALUES
    (?, ?, ?, ?, ?, ?);"; // Para preparar esta consulta, los valores vacíos de VALUES deben escribirse como `?` porque utilizamos la class `\mysqli`

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
    $consultaPrepare->bind_param("iiiiss", $id_actividad, $id_objetivo, $id_usuario, $fecha_prevista, $estado);

    return $consultaPrepare->execute(); // Ejecuto la consulta
  }

  public function getByIDQueryParams()
  {
    $id = intval($_GET['id']);
    $consultaSQL = "SELECT plannings.id, plannings.fecha_prevista, plannings.estado, actividades.descripcion, objetivos.consumo_Kcal_total, usuarios.nombre 
    FROM plannings
    INNER JOIN actividades ON plannings.id_actividad = actividades.id 
    INNER JOIN objetivos ON plannings.id_objetivo = objetivos.id 
    INNER JOIN usuarios ON plannings.id_usuario = usuarios.id 
    WHERE id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function getByIDPathVariables($id)
  {
    $consultaSQL = "SELECT plannings.id, plannings.fecha_prevista, plannings.estado, actividades.descripcion, objetivos.consumo_Kcal_total, usuarios.nombre 
    FROM plannings
    INNER JOIN actividades ON plannings.id_actividad = actividades.id 
    INNER JOIN objetivos ON plannings.id_objetivo = objetivos.id 
    INNER JOIN usuarios ON plannings.id_usuario = usuarios.id 
    WHERE id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  // Static Methods

}
