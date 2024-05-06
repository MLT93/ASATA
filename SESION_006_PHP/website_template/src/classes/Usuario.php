<?php

namespace Usuario;

class Usuario
{
  // Properties
  private static $contador = 0; // Con esto el ID se creará automáticamente en la instancia sin posibilidad de modificarse posteriormente
  private $id;
  private $nombre;
  private $email;
  private $password;

  // Construct
  function __construct($nombre, $password, $email)
  {
    self::$contador++;
    $this->id = self::$contador;
    $this->nombre = $nombre;
    $this->email = $email;
    $this->password = $password;
  }

  // Getters
  public function getId()
  {
    return $this->id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getPassword()
  {
    return $this->password;
  }

  // Setters
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  // Methods
  public function showInfo(): void
  {
    echo "<h3>Info del usuario registrado: </h3>" . "<br/>";
    echo "El usuario es: " . $this->getNombre() . "<br/>";
    echo "Su ID es: " . $this->getId() . "<br/>";
    echo "La email es: " . $this->getEmail() . "<br/>";
    echo "Su password es: " . $this->getPassword() . "<br/>";
  }
}
