<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad
// Las clases siempre van en Upper Camel Case
class Gatito
{
  // ? `PUBLIC`, `PRIVATE` Y `PROTECTED`
  // `private` Solo accesible desde la clase en la cual se declara
  // `protected` Solo accesible desde la propia clase y desde sus hijas, pero no desde una instancia (obj)
  // `public` Accesible por todos los lados

  // Variables de la class o `propiedades`
  private $nombre;
  protected $color;
  public $rayado;

  // Método constructor. Sirve para darle unos valores por defecto a la instancia que cree con esta clase
  public function __construct($name = "Minino", $col = "gray", $esRayado = true)
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->nombre = $name;
    $this->color = $col;
    $this->rayado = $esRayado;
  }

  // Métodos de la class `getters` y `setters`
  protected function setName($newName)
  {
    $this->nombre = $newName; // PROTECTED //=> Accessible from original class and extended classes

    $this->setMaullar($this->nombre);
  }

  private function setMaullar($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tiene hambre." . "<br/>"; // PRIVATE //=> Only accessible from original class
  }

  public function getName()
  {
    echo $this->nombre;
  }
}

class GatoSphynx extends Gatito
{
  public $pelo;

  public function setNameSphynx($newSphynxName)
  {
    $this->setName($newSphynxName); // PROTECTED
  }
};

$minino = new Gatito();

/* $minino->setMaullar("Pancho"); */ // PRIVATE //=> Fatal Error `setMaullar()` is only accessible from original class
/* $minino->setName("Pancho"); */ // PROTECTED //=> Fatal Error `setName()` is only accessible from original class and extended classes
$minino->getName(); // PUBLIC //=> Minino (default value) `getName()` is accessible from everywhere

echo "<br/>";

$gatoEgipcio = new GatoSphynx();
$gatoEgipcio->setNameSphynx("Gato Pelón"); // PUBLIC //=> Gato Pelón
$gatoEgipcio->getName();
