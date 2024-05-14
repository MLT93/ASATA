<?php

namespace SesionBD;

require_once("./bd.php");
require_once("./usuarioBd.php");

use DataB\DataB;
use UsuarioBD\UsuarioBD;
use DateTime;

class SesionBD
{

  // PROPERTIES
  private bool $login;
  private string $usuario;

  // CONSTRUCTOR
  function __construct()
  {
    session_start();
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
    $cnx = new DataB("localhost", "root", "", "logexamen");
    $idUsuario = UsuarioBD::mostrarIdUsuario($emailUsuario);

    if ($idUsuario > 0) {
      $_SESSION['usuario'] = $emailUsuario;
      $this->setUsuario($emailUsuario);
      $this->setLogin(true);

      $now = new DateTime();
      $fecha = $now->format("Y-m-d H:i:s");
      $sqlQuery = "INSERT INTO sesiones (id_usuario, fecha, interaccion) VALUES ('$idUsuario','$fecha','LOG IN');";
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
      unset($this->usuario);
      $this->setLogin(false);
    }
  }

  // Verificar si el usuario está logueado
  public static function estaLogueado()
  {
    session_start();
    return isset($_SESSION['usuario']);
  }

  // Cerrar la sesión del usuario
  public static function cerrarSesion()
  {
    $cnx = new DataB('localhost', 'root', '', 'logexamen');
    $idUsuario = UsuarioBD::mostrarIdUsuario($_SESSION['usuario']);

    $now = new DateTime();
    $fecha = $now->format('Y-m-d H:i:s');
    $sqlQuery = "INSERT INTO sesiones (id_usuario, fecha, interaccion) VALUES ('$idUsuario','$fecha','LOG OUT');";
    $cnx->execute($sqlQuery);

    $cnx->closeConnectionDb();

    session_unset();  // Limpiar todas las variables de sesión
    session_destroy();  // Destruir la sesión
  }
}

$miSesion = new SesionBD();
echo $miSesion->inicioLogin("usuario1@example.com");
