<?php

namespace Database;

class DB
{

  /**
   * Summary of Properties
   * @var string $db_host Host name
   * @var string $db_user User of database
   * @var string $db_password User password of database
   * @var string $db_name Name of database
   * @var \mysqli $connection La conexión realizada 
   
   */
  private string $db_host;
  private string $db_user;
  private string $db_password;
  private string $db_name;
  private \mysqli $connection;


  // Defino los valores por defecto del usuario `root` y el `localhost` en conexión con la base de datos `test`
  public function __construct(string $db_host = "127.0.0.1", string $db_user = "root", string $db_password = "", string $db_name = "test")
  {
    $this->db_host = $db_host;
    $this->db_user = $db_user;
    $this->db_password = $db_password;
    $this->db_name = $db_name;

    // Aquí tengo una instancia de una clase (APIs o Interfaz de programación de aplicaciones) de la cual heredaré todas sus funcionalidades que representa una conexión entre PHP y una base de datos MySQL
    $newConnection = new \mysqli($this->db_host, $this->db_user, $this->db_password, $this->db_name, /* Port */ /* Socket */);

    if ($newConnection->connect_error) {
      die("Error de conexión " . $newConnection->connect_error);
    } else {
      // Hago que me devuelva la respuesta en formato UTF-8 Unicode
      $newConnection->query("SET CHARSET utf8");
      $this->connection = $newConnection;
      // Realiza la conexión a la base de datos
      $this->getConnection();
    }
  }

  // Getters & Setters
  protected function getHost(): string
  {
    return $this->db_host;
  }
  protected function getUser(): string
  {
    return $this->db_user;
  }
  protected function getPassword(): string
  {
    return $this->db_password;
  }
  protected function getDbName(): string
  {
    return $this->db_name;
  }
  protected function getConnection(): \mysqli
  {
    return $this->connection;
  }
  protected function setHost(string $host)
  {
    $this->db_host = $host;
  }
  protected function setUser(string $user)
  {
    $this->db_user = $user;
  }
  protected function setPassword(string $password)
  {
    $this->db_password = $password;
  }
  protected function setDbName(string $dbname)
  {
    $this->db_name = $dbname;
  }
  protected function setConnection(\mysqli $connection)
  {
    $this->connection = $connection;
  }

  // Methods
  public function myQueryCodeUnique($SQLQueryCode, $isAssociativeArray = true)
  {
    $registers = [];
    if ($SQLQueryCode != "") {
      // Código SQL
      $response = $this->getConnection()->query($SQLQueryCode);
      if ($isAssociativeArray) {
        // Devuelve una línea de la respuesta usando la estructura de un array asociativo y lo guarda en el array de registros
        array_push($registers, $response->fetch_assoc());
      } else {
        array_push($registers, $response->fetch_row());
      }
    }
    return $registers;
  }

  public function myQueryCodeMultiple($SQLQueryCode, $isAssociativeArray = true)
  {
    $regs = [];
    if ($SQLQueryCode != "") {
      // Código SQL
      $resp = $this->getConnection()->query($SQLQueryCode);
      if ($isAssociativeArray) {

        while ($resp->fetch_assoc()) {
          // Devuelve toda la respuesta usando la estructura de un array asociativo y lo guarda en el array de registros
          array_push($regs, $resp->fetch_assoc());
        }
      } else {
        while ($resp->fetch_row()) {
          array_push($regs, $resp->fetch_row());
        }
      }
    }
    return $regs;
  }

  public function execute($SQLQueryCode)
  {
    if ($SQLQueryCode != "") {
      // Código SQL
      $this->getConnection()->query($SQLQueryCode);
      echo "<h3>Has ejecutado código SQL en tu base de datos</h3>";
    }
  }

  public function closeConnection()
  {
    $this->getConnection()->close();
  }
}
/* // Instance
$myConnection = new DB();

// Arrays asociativos
print_r($myConnection->myQueryCodeUnique("SELECT * FROM alumnos")) . "<br/>";
print_r($myConnection->myQueryCodeMultiple("SELECT * FROM alumnos")) . "<br/>";

echo "<hr/>";

// Arrays normales
print_r($myConnection->myQueryCodeUnique("SELECT * FROM alumnos", false)) . "<br/>";
print_r($myConnection->myQueryCodeMultiple("SELECT * FROM alumnos", false)) . "<br/>";

echo "<hr/>";

// Ejecutar un query SQL
print_r($myConnection->execute("ALTER TABLE alumnos DROP COLUMN estudiante_edad")) . "<br/>";

// Cerrar la conexión a la base de datos
$myConnection->closeConnection(); */
