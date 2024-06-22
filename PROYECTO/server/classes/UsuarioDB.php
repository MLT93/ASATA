<?php

namespace UserDB;

// Importar archivos
require_once("../db/constantVariables.php");

class Usuario
{

  // Properties
  private string $name;
  private string $email;
  private string $hashedPassword;

  // Constructor
  function __construct(string $nombre, string $email, string $password)
  {

    $this->name = $nombre;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  }

  // Getters y Setters
  protected function getName()
  {
    return $this->name;
  }
  protected function getEmail()
  {
    return $this->email;
  }
  protected function getHashedPassword()
  {
    return $this->hashedPassword;
  }
  protected function setName($nombre)
  {
    $this->name = $nombre;
  }
  protected function setEmail($email)
  {
    $this->email = $email;
  }
  protected function setHashedPassword($hashedPassword)
  {
    $this->hashedPassword = $hashedPassword;
  }

  // Methods



  // Static Methods
  public static function mostrarIdUsuario(string $email)
  {
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $SQL =   "SELECT id FROM usuarios WHERE usuarios.email = '$email'";
    $stmt = $cnx->query($SQL);
    // $respuesta = $stmt->fetch_all(MYSQLI_ASSOC); // Matriz asociativa
    $respuesta = $stmt->fetch_assoc(); // Matriz asociativa
    if (isset($respuesta["id"])) {
      $id = $respuesta["id"];
      return $id;
    } else {
      // return "!existe";
      return 0;
    }
  }

  public static function verificarUsuario(string $email, string $password)
  {
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $SQL = "SELECT hashedPassword FROM usuarios WHERE email = '$email'";
    $stmt = $cnx->query($SQL);
    // $respuesta = $stmt->fetch_all(MYSQLI_ASSOC); // Matriz asociativa
    $respuesta = $stmt->fetch_assoc(); // Array asociativo
    $hashedPassword = $respuesta["hashedPassword"];
    return password_verify($password, $hashedPassword);
  }

  public static function actualizarPassword(string $email, string $password)
  {
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $SQL = "UPDATE usuarios SET hashedPassword = '$hashedPassword' WHERE email = '$email' ";
    $cnx->query($SQL);
  }

  public static function registrarUsuario(int $id_rol, string $username, string $email, string $password, $imagen)
  {

    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $SQL = "INSERT INTO usuarios (id_rol, username, email, hashedPassword, imagen) VALUES ('$id_rol','$username','$email','$hashedPassword','$imagen')";
    $cnx->query($SQL);
  }

  public static function mostrarUsuario(string $email)
  {
    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $SQL =   "SELECT * FROM usuarios WHERE usuarios.email = '$email'";
    // $cnx->connect();
    $stmt = $cnx->query($SQL);
    // $respuesta = $stmt->fetch_all(MYSQLI_ASSOC); // Matriz Asociativa
    $respuesta = $stmt->fetch_assoc(); // Array Asociativo
    if (isset($respuesta["id"])) {
      return $respuesta;
    } else {
      // Aquí entro si no existe ese registro
      // echo "Error";
      return 0;
    }
  }
}

// echo Usuario::mostrarIdUsuario("usuario3@mail.com");
// Usuario::actualizarPassword("use1@mail.com","1234");
// Usuario::actualizarPassword("use2@mail.com","1234");
// Usuario::actualizarPassword("use3@mail.com","1234");
// Usuario::actualizarPassword("use4@mail.com","1234");
// Usuario::actualizarPassword("use5@mail.com","1234");
// Usuario::actualizarPassword("use6@mail.com","1234");
// Usuario::actualizarPassword("use7@mail.com","1234");
// Usuario::actualizarPassword("use8@mail.com","1234");
// Usuario::actualizarPassword("use9@mail.com","1234");
// Usuario::actualizarPassword("use10@mail.com","1234");
// echo Usuario::verificarUsuario("usuario1@mail.com","1234")?"VERIFICADO":"FAIL"  ;echo"<br/>";//true
// echo Usuario::verificarUsuario("usuario1@mail.com","1222")?"VERIFICADO":"FAIL"  ;echo"<br/>";//false
// Usuario::registrarUsuario("newuser","newuser@mail.com","1234");
