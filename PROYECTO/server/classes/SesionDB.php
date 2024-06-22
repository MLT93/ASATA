<?php

namespace SessionDB;

// Importar archivos
require_once(__DIR__ . "/UsuarioDB.php");
require_once(__DIR__ . "/../db/DB.php");

use \DateTime;

class Session
{
  // Properties
  /**
   * Summary of properties
   * @var bool $login Valor para identificar si el usuario tiene login activo o no
   * @var string $usuario El usuario vigente
   */
  private bool $login;
  private string $usuario;

  // Constructor
  /**
   * Summary of __construct
   * @param mixed $log Valor por defecto `false`
   * @param mixed $user Valor por defecto `empty string`
   * 
   * Al crear una instancia:
   * 
   * Se guardan los valores por defecto en las props de la clase
   * 
   * Inicia una sesión con `session_start()`
   * 
   * Si `$_SESSION['usuario']` está definida, guarda el valor de en la prop `$usuario`
   * Si no, elimina el valor de `$usuario`
   */
  function __construct()
  {
    session_start();
    $this->verifyLogin();
  }

  // Esto funciona al imprimir instancias. Te permite crear un `string` para ser devuelto cuando se utiliza `echo` o `print`
  function __toString(): string
  {
    // CREAR UN SWITCH CON RESPUESTAS
    return json_encode(["login" => $this->getLogin(), "message" => "Usuario " . (!empty($this->getUsuario()) ? $this->getUsuario() : "not exists")]);
  }

  // Getters y Setters
  protected function getLogin(): bool
  {
    return $this->login;
  }
  protected function getUsuario(): string
  {
    return $this->usuario;
  }
  protected function setLogin(bool $login)
  {
    $this->login = $login;
  }
  protected function setUsuario(string $usuario)
  {
    $this->usuario = $usuario;
  }

  // Methods
  /**
   * Summary of startLogin
   * @param string $emailUsuario Email recibido a través de un input 
   * @return `void` No devuelve nada. Crea un log en la tabla `sesiones` de la DB
   * 
   * Búsqueda del email del usuario en la DB:
   * 
   * En caso de encontrar el usuario, se actualizan las propiedades con el valor encontrado
   */
  public function startLogin(string $emailUsuario): void
  {
    $usuario = \UserDB\User::showUser($emailUsuario);
    $idUsuario = $usuario['id'];

    if (isset($usuario['id']) && intval($idUsuario) > 0) {
      
      $_SESSION['usuario'] = $emailUsuario;

      $this->setUsuario($emailUsuario);
      $this->setLogin(true);

      $now = new DateTime();
      $fecha = $now->format('Y-m-d H:i:s');
      POST("sesiones", ["id_usuario", "fecha_hora", "estado"], [[$idUsuario, "$fecha", "LOG IN"]]);
    }
  }

  /**
   * Summary of verifyLogin
   * @return `void` No devuelve nada. Comprueba si `$_SESSION['usuario']` existe
   * 
   * Si no existe, elimina cualquier valor de la propiedad `$usuario` de la clase
   * Si existe, almacena el valor en esa propiedad
   */
  public function verifyLogin(): void
  {
    if (isset($_SESSION['usuario'])) {
      $this->setUsuario($_SESSION['usuario']);
      $this->setLogin(true);
    } else {
      unset($this->usuario);
      $this->setLogin(false);
    }
  }

  /**
   * Summary of isSessionActive
   * @return bool Devuelve `true` o `false`
   * 
   * Comprueba si `$_SESSION['usuario']` contiene algo distinto de una cadena vacía
   * Si está vacía, `$_SESSION['usuario']` no estará disponible
   */
  public static function isSessionActive(): bool
  {
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] != "";
  }

  /**
   * Summary of closeSession
   * @return `void` No devuelve nada. Crea un log en la tabla `sesiones` de la DB
   * 
   * Cierra la sesión activa del usuario
   */
  public static function closeSession(): void
  {
    if (isset($_SESSION['usuario'])) {
      $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      $usuario = \UserDB\User::showUser($_SESSION['usuario']);
      $idUsuario = $usuario['id'];
      $idUsuario = intval($idUsuario);

      if (isset($usuario['id']) && intval($idUsuario) > 0) {
        $now = new DateTime();
        $fecha = $now->format('Y-m-d H:i:s');
        POST("sesiones", ["id_usuario", "fecha_hora", "estado"], [[$idUsuario, "$fecha", "LOG OUT"]]);
      }
      $cnx->close();
    }

    session_unset();
    session_destroy();
  }
}

$mySession = new Session();
$mySession->startLogin("admin@mail.com") . "<br/>";

echo $mySession;
