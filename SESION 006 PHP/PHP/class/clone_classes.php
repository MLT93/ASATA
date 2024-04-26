<?php

class ObraArtistica
{

  private $id;
  protected $dimensiones;
  protected $precio;
  protected $autor;
  protected $nombreObra;
  protected $fechaDeLaObra;
  private static $contadorID = 1000;

  function __construct($autor, $nombreObra, $precio, $fechaDeLaObra)
  {
    $this->autor = $autor;
    $this->nombreObra = $nombreObra;
    $this->precio = $precio;
    $this->fechaDeLaObra = $fechaDeLaObra;

    // ? `SELF::METHOD_OR_PROPERTY` SIRVE PARA ACCEDER A MÉTODOS O PROPIEDADES ESTÁTICAS DENTRO DE LA CLASE
    // `self::methodOrProperty` para acceder a propiedades o métodos dentro de la clase. Es el `this` de las propiedades o métodos estáticos
    // En este caso, aumenta el ID con cada instancia
    $this->id = self::$contadorID++;
  }

  // ? `__CLONE()` PERMITE CREAR CLONES DE UNA INSTANCIA (OBJ) Y MODIFICARLE COSAS ESPECÍFICAS EN LA NUEVA CLONACIÓN
  // `__clone()` se utiliza para crear clones de una instancia (obj) en las cuales deseo agregar o modificar cosas en la nueva instancia (obj)
  // Nunca recibe parámetros. A priori debo indicar cómo será la clonación
  public function __clone()
  {
    // Aumenta el ID aunque sea un clon
    $this->id = self::$contadorID++;
  }

  public function mostrarInfo()
  {
    echo "ID: " . $this->id . "<br/>";
    echo "Nombre: " . $this->nombreObra . "<br/>";
    echo "Autor: " . $this->autor . "<br/>";
    echo "Año: " . $this->fechaDeLaObra . "<br/>";
    echo "Precio: " . $this->precio . "<br/>";
  }
}

// Crear una obra artística original
$obraOriginal = new ObraArtistica("Richard Hamilton", "Las Meninas de Picasso", "100k", 1973);
$obraOriginal->mostrarInfo();
echo "<br/>";
$obraOriginal2 = new ObraArtistica("Picasso", "Guernica", "120k", 1937);
$obraOriginal2->mostrarInfo();
echo "<br/>";
// Clonación
$obraClonada = clone $obraOriginal;
$obraClonada->mostrarInfo();
echo "<br/>";

class PizzaBase
{
  private $pasta = true;
  private $pomodoro = true;
  private $mozzarella = true;
  protected $basilico;
  protected $olioPiccante;
  static private $counterWITH = 0;
  static private $counterWITHOUT = 0;

  function __construct($basilico = false, $olioPiccante = false)
  {
    $this->basilico = $basilico;
    $this->olioPiccante = $olioPiccante;

    // ? `SELF::METHOD_OR_PROPERTY` SIRVE PARA ACCEDER A MÉTODOS O PROPIEDADES ESTÁTICAS DENTRO DE LA CLASE
    // `self::methodOrProperty` para acceder a propiedades o métodos dentro de la clase. Es el `this` de las propiedades o métodos estáticos
    $basilico ? self::$counterWITH++ : self::$counterWITH;
    $basilico ? self::$counterWITHOUT : self::$counterWITHOUT++;
  }

  function getPasta()
  {
    return $this->pasta;
  }

  function getPomodoro()
  {
    return $this->pomodoro;
  }

  function getMozzarella()
  {
    return $this->mozzarella;
  }

  function getBasilico()
  {
    return $this->basilico;
  }

  function getOlioPiccante()
  {
    return $this->olioPiccante;
  }

  function showIngredients()
  {
    echo "<h3>La pizza c'ha: </h3>" . "<br/>";
    echo $this->getPasta() ? "Impasto con farina 0'0 <br/>" : "";
    echo $this->getPomodoro() ? "Pomodoro <br/>" : "";
    echo $this->getMozzarella() ? "Mozzarella stracciatella <br/>" : "";
    echo $this->getBasilico() ? "Basilico <br/>" : "";
    echo $this->getOlioPiccante() ? "Olio con peperoncino <br/>" : "";
  }

  // ? `__CLONE()` PERMITE CREAR CLONES DE UNA INSTANCIA (OBJ) Y MODIFICARLE COSAS ESPECÍFICAS EN LA NUEVA CLONACIÓN
  // `__clone()` se utiliza para crear clones de una instancia (obj) en las cuales deseo agregar o modificar cosas en la nueva instancia (obj)
  function __clone()
  {
    $this->basilico ? self::$counterWITH++ : self::$counterWITH;
    $this->basilico ? self::$counterWITHOUT : self::$counterWITHOUT++;
  }

  static function  deliveryState()
  {
    echo "Senza basilico: " . self::$counterWITHOUT . "<br/>";
    echo "Con basilico: " . self::$counterWITH . "<br/>";
  }
};

$pizza = new PizzaBase();
$pizza->showIngredients();
echo "<br/>";
$pizzaMargherita = new PizzaBase(true);
$pizzaMargherita->showIngredients();
echo "<br/>";
$pizzaMargheritaPiccante = new PizzaBase(true);
$pizzaMargheritaPiccante->showIngredients();
echo "<br/>";
$deliveryPizza = clone $pizza;
$deliveryPizza->showIngredients();

// ? `$INSTANCE_OR_CLASS::STATIC_FUNCION()` PARA LLAMAR UNA FUNCIÓN ESTÁTICA
// `$PizzaBase::deliveryState()` llama a la función estática desde la instancia creada
echo "<h3>Estado de los pedidos</h3>";
PizzaBase::deliveryState();
