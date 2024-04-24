<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad
// Las clases siempre van en Upper Camel Case
class Gatito
{
  // Variables de la class o `propiedades`
  var $nombre;
  var $color;
  var $rayado;

  // Método constructor. Sirve para darle unos valores por defecto a la instancia que cree con esta clase
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($name = "Minino", $col = "gray", $esRayado = true)
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->nombre = $name;
    $this->color = $col;
    $this->rayado = $esRayado;
  }

  // Métodos de la class `getters` y `setters`
  function getMaullar()
  {
    echo "Miau!" . "<br/>";
  }

  function setMaullar2($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tiene hambre." . "<br/>";
  }
}

// Instancia (new Obj) sin parámetros
$gatoX = new Gatito(); //=> Minino Color Boolean

// Instancia (new Obj) con parámetros
$minino = new Gatito("Arturito", "Gris", true);
echo $minino; //=> Arturito Gris true

$minino->setMaullar2("Pancho");
