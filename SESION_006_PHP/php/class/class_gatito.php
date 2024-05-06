<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad
// Las clases siempre van en Upper Camel Case
class Gatito
{
  // ? `PUBLIC`, `PRIVATE` Y `PROTECTED`
  // `private` es unicamente accesible desde la propia clase
  // `protected` es accesible desde la propia clase y desde las clases hijas, pero no desde una instancia (obj)
  // `public` es accesible desde todos los lados

  // `PROPIEDADES` o variables de la class. Normalmente son siempre `private`
  var $nombre;
  var $color;
  var $rayado;

  // `MÉTODO CONSTRUCTOR` es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($name = "Minino", $col = "gray", $esRayado = true)
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->nombre = $name;
    $this->color = $col;
    $this->rayado = $esRayado;
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  function getNombre(){
    return $this->nombre;
  }
  function getColor()
  {
    return $this->color;
  }
  function getRayado(){
    return $this->rayado;
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  function setNombre($nombre){
    $this->nombre = $nombre;
  }
  function setColor($color)
  {
    $this->color = $color;
  }
  function setRayado($rayado)
  {
    $this->rayado = $rayado;
  }

  // `MÉTODOS` (utilizan los setters y getters para acceder a la información)
  function maullar()
  {
    echo "Miau!" . "<br/>";
  }
  function maullar2($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tiene hambre." . "<br/>";
  }
}

// Instancia (new Obj) sin parámetros
$gatoX = new Gatito(); //=> Minino gray 1

// Instancia (new Obj) utilizando los parámetros del constructor
$minino = new Gatito("Arturito", "Gris", true);
print $minino; //=> Arturito Gris 1

$minino->maullar2("Pancho");
