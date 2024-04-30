<?php

// ? `PUBLIC`, `PRIVATE` Y `PROTECTED`
// `private` es unicamente accesible desde la propia clase
// `protected` es accesible desde la propia clase y desde las clases hijas, pero no desde una instancia (obj)
// `public` es accesible desde todos los lados
class Gatito
{
  // `PROPIEDADES` o variables de la class. Normalmente son siempre `protected` o `private`
  private $nombre;
  protected $color;
  public $rayado;

  function __construct($name = "Minino", $col = "gray", $esRayado = true)
  {
    $this->nombre = $name;
    $this->color = $col;
    $this->rayado = $esRayado;
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase)
  protected function setName($newName)
  {
    $this->nombre = $newName; // PROTECTED //=> Accessible from original class and extended classes

    $this->setMaullar($this->nombre);
  }

  private function setMaullar($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tiene hambre." . "<br/>"; // PRIVATE //=> Only accessible from original class
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class)
  public function getName()
  {
    echo $this->nombre;
  }
}

class GatoSphynx extends Gatito
{
  public $pelo;

  public function setNameSphynx($newSphynxName,)
  {
    $this->setName($newSphynxName); // PUBLIC //=> Accessible from everywhere
  }
};

$minino = new Gatito();

/* $minino->setMaullar("Pancho"); */ // PRIVATE //=> Fatal Error `setMaullar()` is only accessible from original class
/* $minino->setName("Pancho"); */ // PROTECTED //=> Fatal Error `setName()` is only accessible from original class and extended classes
$minino->getName(); // PUBLIC //=> Minino (default value) `getName()` is accessible from everywhere

echo "<br/>";

$gatoEgipcio = new GatoSphynx();
$gatoEgipcio->setNameSphynx("Axy"); // PUBLIC //=> Axy es un gato egipciano pelón
$gatoEgipcio->getName();
