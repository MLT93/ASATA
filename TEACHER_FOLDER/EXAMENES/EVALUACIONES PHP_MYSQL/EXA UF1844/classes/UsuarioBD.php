<?php

namespace Usr;

require("./db.php");

use Db\Database;

class User
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


  // MÉTODOS ESTÁTICOS
  public static function mostrarIdUsuario(string $email)
  {
    $cnx = new Database("localhost", "root", "", "logexamen");
    $sqlQuery = "SELECT id FROM usuarios WHERE email = '$email';"; /* => id */
    $res = $cnx->myQuerySimple($sqlQuery);
    return $res;
  }

  /* En las bases de datos SIEMPRE se guardan las password encriptadas */
  public static function actualizarPassword(string $email, string $password)
  {
    $cnx = new Database("localhost", "root", "", "logexamen");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "UPDATE usuarios SET hashedPassword = '$hashedPassword' WHERE email = '$email';"; /* Modifico la password del usuario */
    $cnx->execute($sqlQuery);
  }

  public static function verificarUsuario(string $email, string $password)
  {
    // Conexión base de datos
    $cnx = new Database("localhost", "root", "", "logexamen");
    // Sentencia para que me devuelva la password encriptada para verificarla
    $sqlQuery = "SELECT hashedPassword WHERE email = '$email';";
    $res = $cnx->myQuerySimple($sqlQuery);
    $hashedPasswordFromDB = $res["hashedPassword"];
    $isVerifiedPassword = password_verify($password, $hashedPasswordFromDB);
    return $isVerifiedPassword;
  }
}

print_r(User::mostrarIdUsuario("usuario3@example.com")); //=> 3

User::actualizarPassword("usuario1@example.com", "1234");
User::actualizarPassword("usuario2@example.com", "1234");
User::actualizarPassword("usuario3@example.com", "1234");
User::actualizarPassword("usuario4@example.com", "1234");
User::actualizarPassword("usuario5@example.com", "1234");
User::actualizarPassword("usuario6@example.com", "1234");
User::actualizarPassword("usuario7@example.com", "1234");

User::verificarUsuario("usuario3@example.com","1234"); //=> 1
User::verificarUsuario("usuario3@example.com", "1222"); //=> 0
