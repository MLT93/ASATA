<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad, no es un prototype
// Las clases siempre van en Upper Camel Case
class Gato
{
  // Variables de la class o `propiedades`
  var $nombre;
  var $color;
  var $rayado = true;

  // Método constructor. Sirve para darle unos valores por defecto a la instancia que cree con esta clase
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($name = "Félix", $col = "rgb(0,0,0)", $esRayado = false)
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->nombre = $name;
    $this->color = $col;
    $this->rayado = $esRayado;
  }

  // Métodos de la class `getters` y `setters`
  function maullar()
  {
    echo "Miau!" . "<br/>";
  }

  function maullar2($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tiene hambre." . "<br/>";
  }

  // Método destructor. Sirve para destruir las instancias creadas con esta clase una vez haya realizado y completado todos los procesos
  function __destruct()
  {
    $this->nombre = "dice: Adiós." . "<br/>";
  }
}

echo "<hr />";

// ? `NEW` INSTANCIA DE UNA CLASS
// `new` es una palabra clave para crear una instancia de una clase. Un "nuevo" objeto al fin y al cabo

new Gato(); // Esta instancia no está asociada a una variable, por lo tanto no es accesible
$gatoBaldomero = new Gato(); // Nueva instancia de la class `Gato`. Ahora tenemos un objeto con las propiedades accesibles de la clase

// Instancia (new Obj) sin parámetros
$gatoX = new Gato();
echo "$gatoX->nombre $gatoX->color $gatoX->rayado" . "<br/>"; //=> setNombreGato setColor setBoolean
$garfield = new Gato();
$gatito = new Gato();

// Instancia (new Obj) con parámetros
$minino = new Gato("Arturito", "Gris", true);
echo "$minino->nombre $minino->color $minino->rayado" . "<br/>"; //=> Arturito Gris 1

echo "<hr/>";

// ? `GET_DECLARED_CLASSES()` PARA VER TODAS LAS CLASES QUE HAY
// `get_declared_classes()` nos devuelve un array con todas las clases declaradas
/* $everyClasses = get_declared_classes();

foreach ($everyClasses as $key => $value) {
  echo $value. "<br/>";
} */

echo "<hr/>";

// ? `CLASS_EXISTS()` PARA VER SI UNA CLASE EXISTE
// `class_exists()` devuelve true (1) o false (0) si existe o no
class_exists("Gato"); // => 1

function isClassExists($className)
{
  if (class_exists($className)) {
    echo "La clase $className existe";
  } else {
    echo "La clase $className no existe";
  }
};
isClassExists("Gato"); //=> La clase Gato existe

echo "<hr/>";

// ? `METHOD_EXISTS()` PARA VER SI UNA CLASE EXISTE
// `method_exists()` devuelve true (1) o false (0) si existe o no. Recibe 2 parámetros
// 1 La class
// 2 El método
method_exists("Gato", "maullar"); // => 1

function isMethodExists($class, $method)
{
  if (method_exists($class, $method)) {
    echo "El método $method existe";
  } else {
    echo "El método $method no existe";
  }
};
isMethodExists("Gato", "maullar"); //=> El método maullar existe 

echo "<hr />";

// ? `GET_CLASS()` SABER A QUÉ CLASE PERTENECE UNA INSTANCIA
// `get_class()` nos devuelve el nombre de la clase a la cual pertenece la instancia (el objeto)
echo "Baldomero pertenece a la clase " . get_class($gatoBaldomero) . "<br/>";

echo "<hr/>";

// ToDo: crear un `extends` para adaptar get_parent_class() y is_subclass_of()
// ? `GET_PARENT_CLASS` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `get_parent_class()` nos dice quién es el padre de la class que ha sido extendida
echo get_parent_class("Sum") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Sub") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Multi") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Div") . "<br/>"; //=> ChargeOperation

echo "<hr/>";

// ? `IS_SUBCLASS_OF` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `is_subclass_of()` Comprueba si el objeto tiene esta clase como uno de sus padres o si la implementa. Devuelve true (1) si el objeto object pertenece a una clase que sea subclase de class_name, false (0) en caso contrario.
echo is_subclass_of("Div", "ChargeOperation");
echo is_subclass_of($myMultiplication, "Div");

echo "<hr />";

// ? `->` ACCEDE DESDE EL OBJETO INSTANCIADO A UN MÉTODO O PROPIEDAD DE LA PROPIA CLASE. Es como el `.` en los objetos de JavaScript
// `->` nos ayuda a acceder a un método o propiedad disponible en la class `Gato` desde el objeto que se ha instanciado
echo "Baldomero dice: ";
$gatoBaldomero->maullar() . "<br/>";
echo "Garfield dice: ";
$garfield->maullar() . "<br/>";

$gatoBaldomero->maullar2("Baldomero") . "<br/>";

$gatito->nombre = "Félix";
echo "El nuevo gatito se llama: $gatito->nombre" . "<br/>";

$gatoBaldomero->nombre = "Baldomero";
$gatoBaldomero->color = "gris";
echo "$gatoBaldomero->nombre tiene el color: $gatoBaldomero->color" . "<br/>";

$garfield->nombre = "Garfield";
$garfield->color = "naranja";
echo "$garfield->nombre tiene el color: $garfield->color" . "<br/>";

