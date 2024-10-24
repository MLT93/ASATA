<?php
/* Esta clase va a gestionar la tabla `clases` */

class Clase
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
    $consultaSQL = "SELECT clases.id, cursos.nombreCurso, cursos.horas, cursos.nivel, aulas.tag AS aulaTag, aulas.planta, aulas.numeroAula, grupos.tag AS grupoTag, profesores.nombre AS nombreProfesor, profesores.apellido1, profesores.apellido2, profesores.dni, horarios.horario, calendarios.id_convocatoria AS id_convocatoria, convocatorias.anio AS anioConvocatoria, calendarios.fecha AS fechaInicio
    FROM clases 
    INNER JOIN cursos ON clases.id_curso = cursos.id
    INNER JOIN aulas ON clases.id_aula = aulas.id
    INNER JOIN grupos ON clases.id_grupo = grupos.id
    INNER JOIN profesores ON clases.id_profesor = profesores.id
    INNER JOIN horarios ON clases.id_horario = horarios.id
    INNER JOIN calendarios ON clases.id_calendario = calendarios.id
    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id;"; // Aquí saco toda la información necesaria. Además de la info entre las tablas relacionadas por sus Foreign Keys (el último INNER JOIN va exactamente después del Foreign key de clases con calendarios para poder utilizar el Foreign Key anidado en la tabla calendarios y así poder obtener toda la información por completo. `Esto funciona porque al tener un INNER JOIN previo ya enlazado entre clases y calendarios donde devolvemos su ID` (HAY QUE DEVOLVER ESE ID PARA PODER REALIZAR LA CONSULTA), conseguimos esa relación. Entonces simplemente realizamos la consulta entre convocatorias y calendarios)
    $registros = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registros->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos
    return $arrAssoc;
  }

  public function add($nombre, $apellido1, $apellido2, $dni, $id_grupo)
  {
    $consultaSQL = "INSERT INTO alumnos (nombre, apellido1, apellido2, dni, id_grupo) VALUES
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
    $consultaPrepare->bind_param("ssssi", $nombre, $apellido1, $apellido2, $dni, $id_grupo);

    return $consultaPrepare->execute(); // Ejecuto la consulta
  }

  public function getByIDQueryParams()
  {
    $id = intval($_GET['id']);
    $consultaSQL = "SELECT clases.id, cursos.nombreCurso, cursos.horas, cursos.nivel, aulas.tag AS aulaTag, aulas.planta, aulas.numeroAula, grupos.tag AS grupoTag, profesores.nombre AS nombreProfesor, profesores.apellido1, profesores.apellido2, profesores.dni, horarios.horario, calendarios.id_convocatoria AS id_convocatoria, convocatorias.anio AS anioConvocatoria, calendarios.fecha AS fechaInicio
    FROM clases 
    INNER JOIN cursos ON clases.id_curso = cursos.id
    INNER JOIN aulas ON clases.id_aula = aulas.id
    INNER JOIN grupos ON clases.id_grupo = grupos.id
    INNER JOIN profesores ON clases.id_profesor = profesores.id
    INNER JOIN horarios ON clases.id_horario = horarios.id
    INNER JOIN calendarios ON clases.id_calendario = calendarios.id
    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id 
    WHERE clases.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  public function getByIDPathVariables($id)
  {
    $consultaSQL = "SELECT clases.id, cursos.nombreCurso, cursos.horas, cursos.nivel, aulas.tag AS aulaTag, aulas.planta, aulas.numeroAula, grupos.tag AS grupoTag, profesores.nombre AS nombreProfesor, profesores.apellido1, profesores.apellido2, profesores.dni, horarios.horario, calendarios.id_convocatoria AS id_convocatoria, convocatorias.anio AS anioConvocatoria, calendarios.fecha AS fechaInicio
    FROM clases 
    INNER JOIN cursos ON clases.id_curso = cursos.id
    INNER JOIN aulas ON clases.id_aula = aulas.id
    INNER JOIN grupos ON clases.id_grupo = grupos.id
    INNER JOIN profesores ON clases.id_profesor = profesores.id
    INNER JOIN horarios ON clases.id_horario = horarios.id
    INNER JOIN calendarios ON clases.id_calendario = calendarios.id
    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id 
    WHERE clases.id = $id;"; // Aquí saco la info a través de su ID y sus Foreign Keys asociados
    $registro = $this->getConnection()->query($consultaSQL); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia
    $arrAssoc = $registro->fetch_all(MYSQLI_ASSOC); // Convertimos cada uno de los registros en forma de matriz numérica con arrays asociativos (que tendrá sólo 1 elemento)
    return $arrAssoc;
  }

  // Static Methods



}
