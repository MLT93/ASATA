<?php

// ? `ABSTRACT` LAS CLASES ABSTRACTAS NO CREAN INSTANCIAS, SE EXTIENDEN ÚNICAMENTE PARA CREAR OTRAS CLASES
// `abstract` es la palabra clave para crear una clase abstracta que no se puede instanciar
// Esto es útil para crear una clase con métodos y propiedades comunes para otras clases que, posteriormente, se particularizarán
abstract class ChargeOperation
{
  // `PROPIEDADES` o variables de la class. Normalmente son siempre `protected` o `private`
  public $number1;
  public $number2;
  public $result;

  // `MÉTODOS` de la class, 
  // `GETTERS` (devuelve la información)
  // `SETTERS` (transforma la información)
  function setNumber1($num)
  {
    $this->number1 = $num;
  }

  function setNumber2($num)
  {
    $this->number2 = $num;
  }

  // `GETTERS` (devuelve la información de una propiedad)
  function getResult()
  {
    echo $this->result;
  }
}

// ? `EXTENDS` SIRVE PARA EXTENDER (CLONAR) UNA CLASE Y CREAR OTRA
// `extends` clona una nueva clase. La nueva clase hereda todas sus propiedades y métodos, pudiendo agregar más funcionalidades. Atento! Lo que se hereda no se puede modificar
class Sum extends ChargeOperation
{
  function sum()
  {
    $this->result = $this->number1 + $this->number2;
  }
};

// Al poseer todas las propiedades y métodos de la class `ChargeOperation` más la nueva funcionalidad creada en la class `Sum` podré realizar una operación de suma
$mySum = new Sum();
$mySum->setNumber1(25);
$mySum->setNumber2(17);
$mySum->sum();
$mySum->getResult(); //=> 42

echo "<hr/>";

class Sub extends ChargeOperation
{
  function sub()
  {
    $this->result = $this->number1 - $this->number2;
  }
};

$mySubtraction = new Sub();
$mySubtraction->setNumber1(32);
$mySubtraction->setNumber2(13);
$mySubtraction->sub();
$mySubtraction->getResult(); //=> 19

echo "<hr/>";

class Multi extends ChargeOperation
{
  function multi()
  {
    $this->result = $this->number1 * $this->number2;
  }
};

$myMultiplication = new Multi();
$myMultiplication->setNumber1(44);
$myMultiplication->setNumber2(7);
$myMultiplication->multi();
$myMultiplication->getResult(); //=> 308

echo "<hr/>";

class Div extends ChargeOperation
{
  function div()
  {
    $this->result = $this->number1 / $this->number2;
  }
};

$myDivision = new Div();
$myDivision->setNumber1(66);
$myDivision->setNumber2(2);
$myDivision->div();
$myDivision->getResult(); //=> 33

echo "<hr/>";

// ? `GET_PARENT_CLASS()` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `get_parent_class()` nos dice quién es el padre de la class que ha sido extendida
echo get_parent_class("Sum") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Sub") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Multi") . "<br/>"; //=> ChargeOperation
echo get_parent_class("Div") . "<br/>"; //=> ChargeOperation

echo "<hr/>";

// ? `IS_SUBCLASS_OF()` SIRVE PARA SABER CUÁL ES EL PADRE Y SABER A LO QUE PUEDO ACCEDER
// `is_subclass_of()` Comprueba si el objeto tiene esta clase como uno de sus padres o si la implementa. Devuelve true (1) si el objeto object pertenece a una clase que sea subclase de class_name, false (0) en caso contrario.
echo is_subclass_of("Div", "ChargeOperation");
echo is_subclass_of($myMultiplication, "Div");
