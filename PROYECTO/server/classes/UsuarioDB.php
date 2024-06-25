<?php

namespace UserDB;

// Importar archivos
require_once("../db/constantVariables.php");
require_once("../db/DB.php");

/**
 * Summary of User
 * @param string $username Nombre del nuevo usuario
 * @param string $email Email del nuevo usuario
 * @param string $password Password del nuevo usuario
 * 
 * Al crear una instancia transforma la password a del nuevo usuario a `hashedPassword`
 * Para registrar el nuevo usuario en la DB utiliza `User::registerUser`
 */
class User
{
  // Properties
  /**
   * Summary of properties
   * @var string $username Nickname del usuario
   * @var string $email Email del usuario
   * @var string $hashedPassword Password hashed del usuario
   */
  private string $username;
  private string $email;
  private string $hashedPassword;

  // Constructor
  /**
   * Summary of __construct
   * @param string $username Nombre del nuevo usuario
   * @param string $email Email del nuevo usuario
   * @param string $password Password del nuevo usuario
   * 
   * Transforma la password a `hashedPassword`
   */
  function __construct(string $username, string $email, string $password)
  {
    $this->username = $username;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  }

  // Getters y Setters
  protected function getName()
  {
    return $this->username;
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
    $this->username = $nombre;
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
  /**
   * Summary of verifyUser
   * @param string $email Email ingresada en el input
   * @param string $password Password ingresada en el input
   * @return bool Devuelve `true` si se encuentra el usuario y la password corresponde a la ingresada en el input. Si no, devuelve `false`
   */
  public static function verifyUser(string $email, string $password): bool
  {
    $SQL = "SELECT hashedPassword FROM usuarios WHERE email = '$email'";
    $response = GET($SQL);

    $hashedPassword = $response[0]["hashedPassword"];
    return password_verify($password, $hashedPassword);
  }

  /**
   * Summary of changePassword
   * @param string $email Email del usuario
   * @param string $password Password a cambiar
   * @return `void` No devuelve nada
   * 
   * Modifica la password a `hashedPassword` y guarda la información en la DB
   */
  public static function changePassword(string $email, string $password)
  {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    PUT("usuarios", ["hashedPassword"], [["$hashedPassword"]], "email = '$email'");
  }

  /**
   * Summary of registerUser
   * @param int $id_rol Número del ID correspondiente al rol en la DB: `1 => Admin`, `2 => User`
   * @param string $username Nombre del nuevo usuario
   * @param string $email Email del usuario
   * @param string $password Password que va a tener el usuario
   * @param mixed $imagen Imagen seleccionada. Alojada en `/repo/users_img/`
   * @return `void` No devuelve nada.
   * 
   * Registra el usuario en la DB
   */
  public static function registerUser(int $id_rol, string $username, string $email, string $password, $imagen)
  {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    POST("usuarios", ["id_rol", "username", "email", "hashedPassword", "imagen"], [[$id_rol, "$username", "$email", "$hashedPassword", "$imagen"]]);
  }

  /**
   * Summary of showUser
   * @param string $email Email para iniciar la búsqueda en la DB
   * @return `array | bool` Devuelve el `registro del usuario` o `false`
   * 
   * Obtiene el `registro del usuario` correspondiente a la propiedad de la función (email del usuario) contrastada en la DB
   * Si no se encuentra usuario, devuelve `false`
   */
  public static function showUser(string $email): array | bool
  {
    $SQL = "SELECT * FROM usuarios WHERE email = '$email'";
    $response = GET($SQL);
    if (isset($response[0]["id"])) {
      return $response[0];
    } else {
      return false;
    }
  }
}

// echo json_encode(["success" => true, "message" => User::changePassword("admin@mail.com", "1234")]);
// echo json_encode(["success" => true, "message" => User::changePassword("user1@mail.com", "1234")]);
// echo json_encode(["success" => true, "message" => User::changePassword("user2@mail.com", "1234")]);
// echo json_encode(["success" => true, "message" => User::changePassword("user3@mail.com", "1234")]);

// if (User::verifyUser("admin@mail.com", "1234")) {
//   echo json_encode(["success" => true, "message" => "VERIFIED"]);
// } else {
//   echo json_encode(["success" => true, "message" => "FAIL"]);
// }

// echo json_encode(["success" => true, "message" => User::registerUser(2, "pimpollo_09", "user4@mail.com", "1234", "/repo/users_img/user3.jpg")]);
