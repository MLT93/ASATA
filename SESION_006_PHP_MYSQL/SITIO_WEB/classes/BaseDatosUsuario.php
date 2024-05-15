<?php

namespace BaseDatosUsuario;

require_once("./BaseDatos.php");

use BaseDatos\BaseDatos;

class BaseDatosUsuario
{
  // PROPERTIES
  private string $name;
  private string $email;
  private string $hashedPassword;

  // CONSTRUCTOR
  function __construct(string $name, string $email, string $password)
  {
    $this->name = $name;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  }

  // GETTERS Y SETTERS
  protected function getName(): string
  {
    return $this->name;
  }
  protected function getEmail(): string
  {
    return $this->email;
  }
  protected function getHashedPassword(): string
  {
    return $this->hashedPassword;
  }
  protected function setName($name)
  {
    $this->name = $name;
  }
  protected function setEmail($email)
  {
    $this->email = $email;
  }
  protected function setHashedPassword($hashedPassword)
  {
    $this->hashedPassword = $hashedPassword;
  }


  // STATIC METHODS
  public static function mostrarIdUsuario(string $email)
  {
    $cnx = new BaseDatos("localhost", "root", "", "gameclubdario");
    $sqlQuery = "SELECT id FROM clientes WHERE email = '$email';"; /* => id */
    $res = $cnx->myQuerySimple($sqlQuery);
    if (isset($res["id"])) {
      return $res["id"];
    } else {
      echo "No se ha encontrado el usuario" . "<br/>";
      return 0;
    }
  }

  /* En las bases de datos SIEMPRE se guardan las password encriptadas */
  public static function actualizarPassword(string $email, string $password)
  {
    $cnx = new BaseDatos("localhost", "root", "", "gameclubdario");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "UPDATE clientes SET hashedPassword = '$hashedPassword' WHERE email = '$email';"; /* Modifico la password del usuario */
    $cnx->execute($sqlQuery);
  }

  public static function verificarUsuario(string $email, string $password)
  {
    // Conexión base de datos
    $cnx = new BaseDatos("localhost", "root", "", "gameclubdario");
    // Sentencia para que me devuelva la password encriptada para verificarla
    $sqlQuery = "SELECT hashedPassword FROM clientes WHERE email = '$email';";

    $res = $cnx->myQuerySimple($sqlQuery);
    // var_dump($res);
    $hashedPasswordFromDB = $res["hashedPassword"];
    $isVerifiedPassword = password_verify($password, $hashedPasswordFromDB);
    return $isVerifiedPassword;
  }

  public static function registrarUsuario(string $name, string $email, string $password){
    $cnx = new BaseDatos("localhost", "root", "", "gameclubdario");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "INSERT INTO clientes (nombre, email, hashedPassword) VALUES ('$name','$email','$hashedPassword');";
    $cnx->execute($sqlQuery);
  }
}

print_r(BaseDatosUsuario::mostrarIdUsuario("user3@mail.com")); //=> 3

BaseDatosUsuario::actualizarPassword("user1@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user2@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user3@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user4@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user5@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user6@mail.com", "1234");
BaseDatosUsuario::actualizarPassword("user7@mail.com", "1234");

echo BaseDatosUsuario::verificarUsuario("user3@mail.com","1234"); //=> 1
echo BaseDatosUsuario::verificarUsuario("user3@mail.com", "1222"); //=> 0
