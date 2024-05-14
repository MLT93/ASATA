<?php

namespace UsuarioBD;

require("./bd.php");

use DataB\DataB;

class UsuarioBD
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
    $cnx = new DataB("localhost", "root", "", "logexamen");
    $sqlQuery = "SELECT id FROM usuarios WHERE email = '$email';"; /* => id */
    $res = $cnx->myQuerySimple($sqlQuery);
    if (isset($res["id"])) {
      return $res["id"];
    } else {
      echo "No se ha encontrado el usuario";
      return 0;
    }
  }

  /* En las bases de datos SIEMPRE se guardan las password encriptadas */
  public static function actualizarPassword(string $email, string $password)
  {
    $cnx = new DataB("localhost", "root", "", "logexamen");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "UPDATE usuarios SET hashedPassword = '$hashedPassword' WHERE email = '$email';"; /* Modifico la password del usuario */
    $cnx->execute($sqlQuery);
  }

  public static function verificarUsuario(string $email, string $password)
  {
    // Conexión base de datos
    $cnx = new DataB("localhost", "root", "", "logexamen");
    // Sentencia para que me devuelva la password encriptada para verificarla
    $sqlQuery = "SELECT hashedPassword FROM usuarios WHERE email = '$email';";

    $res = $cnx->myQuerySimple($sqlQuery);
    // var_dump($res);
    $hashedPasswordFromDB = $res["hashedPassword"];
    $isVerifiedPassword = password_verify($password, $hashedPasswordFromDB);
    return $isVerifiedPassword;
  }

  public static function registrarUsuario(string $name, string $email, string $password){
    $cnx = new DataB("localhost", "root", "", "logexamen");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sqlQuery = "INSERT INTO usuarios (name, email, hashedPassword) VALUES ('$name','$email','$hashedPassword');";
    $cnx->execute($sqlQuery);
  }
}

print_r(UsuarioBD::mostrarIdUsuario("usuario3@example.com")); //=> 3

// UsuarioBD::actualizarPassword("usuario1@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario2@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario3@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario4@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario5@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario6@example.com", "1234");
// UsuarioBD::actualizarPassword("usuario7@example.com", "1234");

echo UsuarioBD::verificarUsuario("usuario3@example.com","1234"); //=> 1
echo UsuarioBD::verificarUsuario("usuario3@example.com", "1222"); //=> 0
