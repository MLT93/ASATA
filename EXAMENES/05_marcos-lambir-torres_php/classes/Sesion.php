<?php

namespace Session;

class Session
{
  // propiedades
  private bool $login;
  private string $user;

  // constructor
  function __construct()
  {
    session_start();
  }

  // getters y setters
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

  // métodos
  function inicioLogin(string $nombreUsuario)
  {
    if ($nombreUsuario != "") {
      $_SESSION["usuario"] = $nombreUsuario;
      $this->setUser($nombreUsuario);
      $this->setLogin(true);
    }
  }
  function verificarLogin()
  { {
      if (isset($_SESSION["usuario"])) {
        $this->setUser($_SESSION["usuario"]);
        $this->setLogin(true);
      } else {
        $this->setUser("");
        $this->setLogin(false);
      }
    }
  }

  // métodos estáticos
  static function estaLogueado($instancia, $nombreUsuario)
  {
    if ($nombreUsuario == $instancia->getUser()) {

      $msg = "";
      $instancia->getLogin() == false ? $msg = "No Logged " : $msg = "Logged ";
      echo $instancia->getUser() . " $msg" . "<br/>";

      echo "The session state: " . session_status() . "<br/>";
    }
  }

  static function cerrarSession($instancia)
  {
    unset($_SESSION["usuario"]);
    unset($instancia->getUser());
    $instancia->setLogin(false);
    echo "La sesión se ha cerrado." . "<br/>";
  }
}

// $mySession = new Session();
// $mySession->inicioLogin("Alberto");
// $mySession->verificarLogin();
// Session::estaLogueado($mySession, "Alberto");
// Session::cerrarSession($mySession);
