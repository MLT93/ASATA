<?php

namespace BaseDatosSession;

use UserDB\Usuario;

require_once("BaseDatos.php");
require_once("BaseDatosUsuario.php");

use BaseDatos\BaseDatos;
use BaseDatosUsuario\BaseDatosUsuario;
use DateTime;

class BaseDatosSession
{

  // PROPERTIES
  private bool $login;
  private string $usuario;

  // CONSTRUCTOR
  function __construct()
  {
    // session_start();
    $this->verificarLogin();
  }

  // GETTERS Y SETTERS
  protected function getLogin(): bool
  {
    return $this->login;
  }
  protected function getUsuario(): string
  {
    return $this->usuario;
  }
  protected function setLogin(bool $option)
  {
    $this->login = $option;
  }
  protected function setUsuario(string $usuario)
  {
    $this->usuario = $usuario;
  }

  // METHODS
  public function inicioLogin(string $emailUsuario)
  {
    $cnx = new BaseDatos("localhost", "root", "mysql", "gameclub");
    $idUsuario = BaseDatosUsuario::mostrarIdUsuario($emailUsuario);

    if ($idUsuario > 0) {
      $_SESSION['usuario'] = $emailUsuario;
      $this->setUsuario($emailUsuario);
      $this->setLogin(true);

      $now = new DateTime();
      $fecha = $now->format("Y-m-d H:i:s");
      $sqlQuery = "INSERT INTO sesiones (id_cliente, fecha, interaccion) VALUES ('$idUsuario','$fecha','LOG IN');";
      $cnx->execute($sqlQuery);
    }

    $cnx->closeConnectionDb();
  }

  public function verificarLogin()
  {
    if (isset($_SESSION['usuario'])) {
      $this->setUsuario($_SESSION['usuario']);
      $this->setLogin(true);
    } else {
      // unset($this->usuario);
      $this->setLogin(false);
    }
  }

  // Verificar si el usuario está logueado
  public static function estaLogueado()
  {
    // session_start();
    // return isset($_SESSION['usuario']);
    return $_SESSION['usuario'] != "";
  }

  // Cerrar la sesión del usuario
  public static function cerrarSesion()
  {
    if (isset($_SESSION['usuario'])) {

      $cnx = new BaseDatos('localhost', 'root', 'mysql', 'gameclub');
      $idUsuario = BaseDatosUsuario::mostrarIdUsuario($_SESSION['usuario']);

      if ($idUsuario > 0) {
        $now = new DateTime();
        $fecha = $now->format('Y-m-d H:i:s');
        $sqlQuery = "INSERT INTO sesiones (id_cliente, fecha, interaccion) VALUES ('$idUsuario','$fecha','LOG OUT');";
        $cnx->execute($sqlQuery);
      }

      $cnx->closeConnectionDb();
    }

    session_unset();  // Limpiar todas las variables de sesión
    session_destroy();  // Destruir la sesión
  }
}

// $miSesion = new BaseDatosSession();
// echo $miSesion->inicioLogin("user1@mail.com");
