<?php

// ? `ABSTRACT` CREA UNA CLASE ABSTRACTA. LAS CLASES ABSTRACTAS ÚNICAMENTE SE EXTIENDEN PARA CREAR OTRAS CLASES. IMPOSIBLE CREAR UNA INSTANCIA
// `abstract` es la palabra clave para crear una clase abstracta. Esta tipología de clase es imposible de instanciar
// Podemos crear una base con métodos y propiedades comunes que deberán implementarse obligatoriamente en cada extensión de la clase madre, conservando la misma visibilidad (o con una menos restrictiva) en la clase hija
abstract class ChargeOperation
{
  // `PROPIEDADES` o variables de la class. Normalmente son siempre `private`
  private $number1;
  private $number2;
  private $result;

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  protected function setNumber1($num)
  {
    $this->number1 = $num;
  }
  protected function setNumber2($num)
  {
    $this->number2 = $num;
  }
  protected function setResult($result)
  {
    $this->result = $result;
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  protected function getNumber1()
  {
    return $this->number1;
  }
  protected function getNumber2()
  {
    return $this->number2;
  }
  protected function getResult()
  {
    echo $this->result;
  }

  // `MÉTODOS` (utilizan los setters y getters para acceder a la información)
  public function loadNum1($num){
    $this->setNumber1($num);
  }
  public function loadNum2($num)
  {
    $this->setNumber2($num);
  }
  public function showResult(){
    echo $this->getResult();
  }
}

// ? `EXTENDS` SIRVE PARA CREAR UNA CLASE HIJA DE OTRA CLASE
// `extends` hace uso del principio de herencia y visibilidad. La nueva clase heredará todas sus propiedades y métodos públicos y protegidos del padre, pudiendo agregar más funcionalidades. Los métodos privados de una clase padre no son accesibles para una clase hija. Atento! Lo que se hereda no se puede modificar
class Sum extends ChargeOperation
{
  function sum()
  {
    $value = $this->getNumber1() + $this->getNumber2();
    $this->setResult($value);
  }
};

// Al poseer todas las propiedades y métodos de la class `ChargeOperation` más la nueva funcionalidad creada en la class `Sum` podré realizar una operación de suma
$mySum = new Sum();
$mySum->loadNum1(25);
$mySum->loadNum2(17);
$mySum->sum();
$mySum->showResult(); //=> 42

echo "<hr/>";

class Sub extends ChargeOperation
{
  function sub()
  {
    $value = $this->getNumber1() - $this->getNumber2();
    $this->setResult($value);
  }
};

$mySubtraction = new Sub();
$mySubtraction->loadNum1(32);
$mySubtraction->loadNum2(13);
$mySubtraction->sub();
$mySubtraction->showResult(); //=> 19

echo "<hr/>";

class Multi extends ChargeOperation
{
  function multi()
  {
    $value = $this->getNumber1() * $this->getNumber2();
    $this->setResult($value);
  }
};

$myMultiplication = new Multi();
$myMultiplication->loadNum1(44);
$myMultiplication->loadNum2(7);
$myMultiplication->multi();
$myMultiplication->showResult(); //=> 308

echo "<hr/>";

class Div extends ChargeOperation
{
  function div()
  {
    $value = $this->getNumber1() / $this->getNumber2();
    $this->setResult($value);
  }
};

$myDivision = new Div();
$myDivision->loadNum1(66);
$myDivision->loadNum2(2);
$myDivision->div();
$myDivision->showResult(); //=> 33

echo "<hr/>";

// ? `GET_PARENT_CLASS()` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `get_parent_class()` nos dice quién es el padre de la clase que ha sido extendida
echo get_parent_class("Sum") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Sub") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Multi") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Div") . "<br/>"; //=> ChargeOperation

echo "<hr/>";

// ? `IS_SUBCLASS_OF()` SIRVE PARA COMPROBAR SI UNA CLASE O UNA INSTANCIA (OBJ) ES HIJA DE OTRA. DEVUELVE TRUE (1) O FALSE (0)
// `is_subclass_of()` Comprueba si una clase o una instancia (obj) tiene una clase en particular como uno de sus padres o si la implementa. Devuelve true (1) si pertenece a la classe del segundo parámetro, false (0) en caso contrario. Tiene 3 argumentos
// 1 Un nombre de clase o una instancia de objeto
// 2 El nombre de clase a comprobar
// 3 Booleano que impide que se llame al cargador automático. Es opcional
echo is_subclass_of("Div", "ChargeOperation"); //=> 1
echo is_subclass_of($myMultiplication, "Div"); //=> 0
