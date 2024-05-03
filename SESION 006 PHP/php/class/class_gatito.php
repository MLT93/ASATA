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
  public $nombre;
  public $color;
  public $rayado;

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

  // `MÉTODOS` de la class, `GETTERS` (devuelve la información) y `SETTERS` (transforma la información)
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

// Instancia (new Obj) utilizando los parámetros del constructor
$minino = new Gatito("Arturito", "Gris", true);
print $minino; //=> Arturito Gris true

$minino->setMaullar2("Pancho");
