<?php

namespace Session;

class Session
{
  private bool $login;
  private string $user;

  function __construct()
  {
    session_start();
  }

  protected function getLogin(): bool
  {
    return $this->login;
  }
  protected function getUser(): string
  {
    return $this->user;
  }

  protected function setLogin(bool $login)
  {
    $this->login = $login;
  }
  protected function setUser(string $user)
  {
    $this->user = $user;
  }

  public function logIN($nombreUsuario)
  {
    if ($nombreUsuario != "") {
      $_SESSION["usuario"] = $nombreUsuario;
      $this->setUser($nombreUsuario);
      $this->setLogin(true);
    }
  }

  public function logOUT()
  {
    unset($_SESSION["usuario"]);
    $this->setUser("");
    $this->setLogin(false);
  }

  public function logState()
  {
    // ? CON ESTO VEO EL LOGIN DEL USUARIO
    $msg = "";
    $this->getLogin() == false ? $msg = "No Logged " : $msg = "Logged ";
    echo $this->getUser() . " $msg" . "<br/>";

    // ? `SESSION_STATUS()` DEVUELVE UN NÚMERO QUE CORRESPONDE AL ESTADO DE LA SESIÓN DEL USUARIO
    // PHP_SESSION_DISABLED = 0
    // PHP_SESSION_NONE = 1
    // PHP_SESSION_ACTIVE = 2
    echo "The session state: " . session_status() . "<br/>";
  }

  public function logCheck()
  {
    if (isset($_SESSION["usuario"])) {
      $this->setUser($_SESSION["usuario"]);
      $this->setLogin(true);
    } else {
      $this->setUser("");
      $this->setLogin(false);
    }
  }
}

$miSesion = new Session();
$miSesion->logIN("Alberto");
$miSesion->logState();
$miSesion->logOUT();
$miSesion->logState();
