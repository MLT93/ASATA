<?php

// ? CREAR UNA CLASE igual que JavaScript, sólo que la creas de verdad, no es un prototype
// Las clases siempre van en Upper Camel Case
class Gato
{
  // ? `PUBLIC`, `PRIVATE` Y `PROTECTED`
  // `private` es unicamente accesible desde la propia clase
  // `protected` es accesible desde la propia clase y desde las clases hijas, pero no desde una instancia (obj)
  // `public` es accesible desde todos los lados

  // `PROPIEDADES` o variables de la class. Normalmente son siempre `private`
  private $propiedad;
  private $nombre;
  private $color;
  private $rayado = true;


  // `MÉTODO CONSTRUCTOR` es siempre público y se ejecuta inmediatamente al instanciar. Debemos pasarle unos valores al crear una instancia (obj) o ponérselos por defecto a los parámetros, así cuando creamos la instancia (obj) recibe esos valores
  // Nos facilita la vida al crear una nueva instancia (obj) sin acceder a cada método individualmente, proporcionando la información necesaria para que esa instancia (obj) exista
  // Cada constructor es único para cada clase, si hay un `extends` lo hereda, pero si creas uno en el nuevo instancia (obj), lo sobrescribe
  function __construct($parametro = "Parámetro del constructor por defecto")
  {
    // Igual que en JavaScript se accede con `this` a las propiedades y métodos de la clase, y se les asignan los parámetros de la función para poder proporcionárselos desde afuera
    // Si no le damos un valor por defecto, al crear una instancia sin parámetros me dará un error
    $this->propiedad = $parametro;
  }

  // ? `GETTERS` AND `SETTERS` SON MÉTODOS SINGULARES RELACIONADOS CON LAS PROPIEDADES PARA OBTENER VALORES Y ASIGNARLES VALORES
  // `getters` su función es permitir obtener el valor (protegido o privado) de una propiedad de la clase y así poder utilizar dicho valor en diferentes métodos y desde afuera de la clase
  // `setters` su función permite brindar acceso a propiedades especificas para poder asignar un valor desde afuera de la clase

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  protected function getPropiedad()
  {
    return $this->propiedad;
  }
  protected function getNombre()
  {
    return $this->nombre;
  }
  protected function getColor()
  {
    return $this->color;
  }
  protected function getRayado()
  {
    return $this->rayado;
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  protected function setPropiedad($parametro)
  {
    $this->propiedad = $parametro;
  }
  protected function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }
  protected function setColor($color)
  {
    $this->color = $color;
  }
  protected function setRayado($rayado)
  {
    $this->rayado = $rayado;
  }

  // `MÉTODOS` (utilizan los setters y getters para acceder a la información)
  public function nombre()
  {
    return $this->getNombre();
  }
  public function color()
  {
    return $this->getColor();
  }
  public function rayado()
  {
    return $this->getRayado();
  }
  public function cambiarColor($color)
  {
    $this->setColor($color);
    return $this->getColor();
  }
  public function cambiarNombre($nombre)
  {
    $this->setNombre($nombre);
    return $this->getNombre();
  }
  public function showProp()
  {
    return $this->getPropiedad();
  }
  public function maullar()
  {
    echo "Miau!" . "<br/>";
  }
  public function maullar2($nombreGato)
  {
    echo "$nombreGato dice: \"Miau!\" Tengo hambre.";
  }

  // `MÉTODO DESTRUCTOR`. Sirve para destruir las instancias creadas con esta clase una vez haya realizado y completado todos los procesos
  // function __destruct()
  // {
  //   $this->nombre = "dice: Adiós." . "<br/>";
  // }
}

echo "<hr />";

// ? `NEW` CREA UNA INSTANCIA DE UNA CLASS. UNA INSTANCIA ES LA MATERIALIZACIÓN DE UNA CLASE
// `new` es una palabra clave para crear una instancia de una clase. Un "nuevo" objeto al fin y al cabo
new Gato(); // Esta instancia no está asociada a una variable, por lo tanto no es accesible
$gatoBaldomero = new Gato(); // Nueva instancia de la class `Gato`. Ahora tenemos un objeto con las propiedades accesibles de la clase
// Instancia (obj) sin parámetros
$gatoX = new Gato();
echo $gatoX->showProp() . "<br/>"; //=> Parámetro del constructor por defecto
$gatito = new Gato();
// Instancia (obj) utilizando los parámetros del constructor
$minino = new Gato("Parámetro del constructor asignado en la instancia");
echo $minino->showProp() . "<br/>"; //=> El gato se llama: Arturito

echo "<hr/>";

// ? `GET_DECLARED_CLASSES()` PARA VER TODAS LAS CLASES QUE HAY
// `get_declared_classes()` nos devuelve un array con todas las clases declaradas
$everyClasses = get_declared_classes();
foreach ($everyClasses as $key => $value) {
  echo $value . "<br/>";
}

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

echo "<hr />";

// ? `->` ACCEDE DESDE EL OBJETO INSTANCIADO A UN MÉTODO O PROPIEDAD DE LA PROPIA CLASE. Es como el `.` en los objetos de JavaScript
// `->` nos ayuda a acceder a un método o propiedad disponible en la class `Gato` desde el objeto que se ha instanciado
echo "Baldomero dice: ";
$gatoBaldomero->maullar() . "<br/>";
$gatoBaldomero->maullar2("Baldomero") . "<br/>";

$gatito->cambiarNombre("Félix");
echo "El nuevo gatito se llama: {$gatito->nombre()}" . "<br/>";

$gatoBaldomero->cambiarNombre("Baldomero");
$gatoBaldomero->cambiarColor("gris");
echo "{$gatoBaldomero->nombre()} tiene el color: {$gatoBaldomero->color()}" . "<br/>";


echo "<hr/>";

// ? `EXTENDS` SIRVE PARA CREAR UNA CLASE HIJA DE OTRA CLASE
// `extends` hace uso del principio de herencia y visibilidad. La nueva clase heredará todas sus propiedades y métodos públicos y protegidos del padre, pudiendo agregar más funcionalidades. Los métodos privados de una clase padre no son accesibles para una clase hija. Atento! Lo que se hereda no se puede modificar
class GatoGordo extends Gato
{
  // Sin hacer nada hemos heredado todos los métodos públicos y protegidos de la class Gato
  // Si la clase hija no encuentra un constructor propio, utilizará el constructor del padre. Cada constructor es único para cada clase

  // constructor
  function __construct($nombre, $color, $rayado, $parametro)
  {
    $this->setNombre($nombre);
    $this->setColor($color);
    $this->setRayado($rayado);
    $this->setPropiedad($parametro);

    // ? `NAME_FATHER_CLASS::__CONSTRUCT()` LLAMA AL CONSTRUCTOR PADRE PARA FUSIONAR LOS DOS CONSTRUCTORES. RECUERDA PASAR LOS PARÁMETROS DEL CONSTRUCTOR PADRE EN EL CONSTRUCTOR HIJO TAMBIÉN
    // `Gato::__construct()` nos ayuda a utilizar el constructor de la class padre dentro del constructor de la class hija
    Gato::__construct($parametro);
  }

  // getters

  // setters

  // methods
  public function info()
  {
    $msg = "";
    $this->getRayado() ? $msg .= "Si" : $msg .= "No";

    echo "Es un gato atigrado?" . " $msg" . "<br/>";
    echo "Tiene un color " . $this->getColor() . "<br/>";
    echo "A " . $this->getNombre() . " le gusta la lasaña" . "<br/>";
    echo $this->maullar2($this->getNombre()) . "<br/>";
    echo "Es perezoso pero de todas formas es un " . $this->getPropiedad() . "<br/>"; // puedo acceder a esta función porque es protected, si fuere private no podría porque estamos dentro de una clase hija
  }
};

$garfield = new GatoGordo("Garfield", "Naranja", true, "buen gato");
echo $garfield->info() . "<br/>";
echo $garfield->showProp() . "<br/>"; // Puedo acceder desde la instancia porque es un método público
/* echo $this->getPropiedad() ."<br/>"; */ // No puedo acceder desde la instancia a un método protegido
/* echo $this->nombre ."<br/>"; */ // No puedo acceder desde la instancia o desde la clase hija a una propiedad privada

echo "<hr/>";

// ? `IS_SUBCLASS_OF()` SIRVE PARA COMPROBAR SI UNA CLASE O UNA INSTANCIA (OBJ) ES HIJA DE OTRA. DEVUELVE TRUE (1) O FALSE (0)
// `is_subclass_of()` Comprueba si una clase o una instancia (obj) tiene una clase en particular como uno de sus padres o si la implementa. Devuelve true (1) si pertenece a la classe del segundo parámetro, false (0) en caso contrario. Tiene 3 argumentos
// 1 Un nombre de clase o una instancia de objeto
// 2 El nombre de clase a comprobar
// 3 Booleano que impide que se llame al cargador automático. Es opcional
echo is_subclass_of("GatoGordo", "Gato") . "<br/>"; //=> 1
echo is_subclass_of($garfield, "Gato") . "<br/>"; //=> 1

echo "<hr/>";

// ? `GET_PARENT_CLASS` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `get_parent_class()` nos dice quién es el padre de la class que ha sido extendida
echo get_parent_class("GatoGordo") . "<br/>"; //=> Gato
