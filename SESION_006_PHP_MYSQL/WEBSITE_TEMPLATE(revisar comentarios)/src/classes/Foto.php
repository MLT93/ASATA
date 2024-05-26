<?php

namespace Foto;

class Foto
{
  // properties
  private static $contador = 0; // Con esto el ID se creará automáticamente en la instancia sin posibilidad de modificarse posteriormente
  private $id;
  private $title;
  private $description;
  private $fechaSubida;
  private $idUsuario;
  private $ruta;

  // construct
  function __construct($title, $description, $idUsuario, $ruta)
  {
    self::$contador++;
    $this->id = self::$contador;
    $this->title = $title;
    $this->description = $description;
    $this->fechaSubida = date("_d-m-Y_H.i.s_", intval(strtotime("now")));
    $this->idUsuario = $idUsuario;
    $this->ruta = $ruta;
  }

  // getters
  public function getId()
  {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function getFechaSubida()
  {
    return $this->fechaSubida;
  }

  public function getIdUsuario()
  {
    return $this->idUsuario;
  }

  public function getRuta()
  {
    return $this->ruta;
  }

  // setters
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setFechaSubida($fechaSubida)
  {
    $this->fechaSubida = $fechaSubida;
  }

  public function setIdUsuario($idUsuario)
  {
    $this->idUsuario = $idUsuario;
  }

  public function setRuta($ruta)
  {
    $this->ruta = $ruta;
  }

  // Methods
  public function showInfoFoto(): void
  {
    echo "<h3>Info del usuario registrado: </h3>" . "<br/>";
    echo "La foto es: " . $this->getTitle() . "<br/>";
    echo "Su Descripción es: " . $this->getDescription() . "<br/>";
    echo "Se subió el día: " . $this->getFechaSubida() . "<br/>";
    echo "Lo subió el usuario con ID: " . $this->getIdUsuario() . "<br/>";
    echo "Está en la ruta: " . $this->getRuta() . "<br/>";
  }
}

$newDate = new Foto("lala", "asdfaasdf", 4, "C://we./");

$newDate->showInfoFoto();

