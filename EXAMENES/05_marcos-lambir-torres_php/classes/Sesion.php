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
    $this->verificarLogin();
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
    if ($nombreUsuario != "" || strlen($nombreUsuario) > 0) {
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

  static function cerrarSession()
  {
    session_unset();
    session_destroy();
    echo "<h3>La sesión se ha cerrado</h3>" . "<br/>";
  }
}

// $mySession = new Session();
// $mySession->inicioLogin("Alberto");
// $mySession->verificarLogin();
// Session::estaLogueado($mySession, "Alberto");
// Session::cerrarSession($mySession);
