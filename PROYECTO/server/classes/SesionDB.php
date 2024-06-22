<?php

namespace SessionDB;

// Importar archivos
require_once("UsuarioDB.php");
require_once("../db/constantVariables.php");
require_once("../db/DB.php");

use DateTime;

class Session
{

  // Properties
  private bool $login;
  private string $usuario;

  // Constructor
  function __construct()
  {
    session_start();
    $this->verificarLogin();
  }

  // Getters y Setters
  protected function setLogin(bool $login)
  {
    $this->login = $login;
  }
  protected function setUsuario(string $usuario)
  {
    $this->usuario = $usuario;
  }
  protected function getLogin()
  {
    return $this->login;
  }
  protected function getUsuario()
  {
    return $this->usuario;
  }

  // Methods
  public function inicioLogin(string $emailUsuario): void
  { // Email de Usuario 

    $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $idUsuario = \UserDB\Usuario::mostrarIdUsuario($emailUsuario);
    if ($idUsuario > 0) {

      $_SESSION['usuario'] = $emailUsuario;
      $this->setUsuario($emailUsuario);
      $this->setLogin(true);

      $now = new DateTime();
      $fecha = $now->format('Y-m-d H:i:s');
      // $SQL = "INSERT INTO sesiones (id_usuario, fecha, estado) VALUES ($idUsuario,'$fecha', 'LOG IN')";
      // $cnx->query($SQL);
      POST("sesiones", ["id_usuario", "fecha", "estado"], [[$idUsuario, "$fecha", "LOG OUT"]]);
    }
    $cnx->close();
  }

  public function verificarLogin(): void
  {
    if (isset($_SESSION['usuario'])) {
      $this->setUsuario($_SESSION['usuario']);
      $this->setLogin(true);
    } else {
      unset($this->usuario);
      $this->setLogin(false);
    }
  }

  public static function isLogged() // Verificar si el usuario posee un login activo
  {
    /* 
      1. Devuelve `true` si $_SESSION['usuario'] contiene algo distinto de una cadena vacía 
      2. Devuelve `false` si $_SESSION['usuario'] es una cadena vacía.
    */
    return $_SESSION['usuario'] != "";
  }

  public static function closeSession() // Cerrar la sesión del usuario
  {
    if (isset($_SESSION['usuario'])) {

      $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $idUsuario = \UserDB\Usuario::mostrarIdUsuario($_SESSION['usuario']);
      if ($idUsuario > 0) {
        $now = new DateTime();
        $fecha = $now->format('Y-m-d H:i:s');
        // $SQL = "INSERT INTO sesiones (id_usuario, fecha, estado) VALUES ($idUsuario, '$fecha', 'LOG OUT')";
        // $cnx->query($SQL);
        POST("sesiones", ["id_usuario", "fecha", "estado"], [[$idUsuario, "$fecha", "LOG OUT"]]);
      }
      $cnx->close();
    }

    session_unset();  // Limpiar todas las variables de sesión
    session_destroy();  // Destruir la sesión
  }

  // Static Methods



}

// $mySession = new Session();
// $mySession->inicioLogin("usuario1@mail.com");
// echo $mySession->estadoLogin();echo"<br/>";
// $mySession->finLogin();
// echo $mySession->estadoLogin();echo"<br/>";
// $mySession->inicioLogin("pedro");
// echo $mySession->estadoLogin();echo"<br/>";
