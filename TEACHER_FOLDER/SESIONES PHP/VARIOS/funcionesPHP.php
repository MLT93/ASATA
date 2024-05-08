<?php

$a = 5;
$b = 0;
$c;
$e = null;

//EMPTY
//Una variable se considera vacía si no existe o si su valor es igual a false.
echo 'empty($a) '; echo empty($a)?"Vacio":"No vacio";  echo"<br/>"; //existe y NO vacia
echo 'empty($b) '; echo empty($b)?"Vacio":"No vacio";  echo"<br/>"; //existe y SI vacia. interpreta el 0 como FALSE
echo 'empty($c) '; echo empty($c)?"Vacio":"No vacio";  echo"<br/>"; //existe y SI vacia
echo 'empty($d) '; echo empty($d)?"Vacio":"No vacio";  echo"<br/>"; //no existe. aunque no este declarada interpreta como FALSE
echo"<br/>";
echo"<br/>";

//ISSET
//Determina si una variable está definida y no es null.
echo 'isset($a) '; echo isset($a)?"Existe":"No existe";  echo"<br/>"; //existe y no es null
echo 'isset($b) '; echo isset($b)?"Existe":"No existe";  echo"<br/>"; //existe y no es null
echo 'isset($c) '; echo isset($c)?"Existe":"No existe";  echo"<br/>"; //existe y ES null
echo 'isset($d) '; echo isset($d)?"Existe":"No existe";  echo"<br/>"; //no existe
echo"<br/>";
echo"<br/>";

//IS_NULL
echo 'is_null($a) '; echo is_null($a)?"Null":"No Null";  echo"<br/>"; // NO ES NULL
echo 'is_null($b) '; echo is_null($b)?"Null":"No Null";  echo"<br/>"; // NO ES NULL
echo 'is_null($c) '; echo is_null($c)?"Null":"No Null";  echo"<br/>"; // FALLA porque no tiene ningun valor
echo 'is_null($d) '; echo is_null($d)?"Null":"No Null";  echo"<br/>"; // FALLA porque no tiene ningun valor
echo 'is_null($e) '; echo is_null($e)?"Null":"No Null";  echo"<br/>"; // ES NULL
echo"<br/>";
echo"<br/>";

$texto = "lorem ipsum";
$entero = 3;
$decimal = 3.4;
$lista = ["casa","piso","cabaña"];

// $obj = new stdClass();
// $obj->students = array('Kalle', 'Ross', 'Felipe');
// echo is_object($obj);

echo 'is_integer($texto)  '; echo is_integer($texto);echo"<br/>";
echo 'is_integer($entero)  '; echo is_integer($entero);echo"<br/>";
echo 'is_integer($decimal)  '; echo is_integer($decimal);echo"<br/>";
echo 'is_integer($lista)  '; echo is_integer($lista);echo"<br/>";
echo"<br/>";

echo 'is_float($texto)  ';echo is_float($texto);echo"<br/>";
echo 'is_float($entero)  ';echo is_float($entero);echo"<br/>";
echo 'is_float($decimal)  ';echo is_float($decimal);echo"<br/>";
echo 'is_float($lista)  ';echo is_float($lista);echo"<br/>";
echo"<br/>";

echo 'is_numeric($texto)  ';echo is_numeric($texto);echo"<br/>";
echo 'is_numeric($entero)  ';echo is_numeric($entero);echo"<br/>";
echo 'is_numeric($decimal)  ';echo is_numeric($decimal);echo"<br/>";
echo 'is_numeric($lista)  ';echo is_numeric($lista);echo"<br/>";
echo"<br/>";

echo 'is_array($texto)  ';echo is_array($texto);echo"<br/>";
echo 'is_array($entero)  ';echo is_array($entero);echo"<br/>";
echo 'is_array($decimal)  ';echo is_array($decimal);echo"<br/>";
echo 'is_array($lista)  ';echo is_array($lista);echo"<br/>";
echo"<br/>";

echo 'is_string($texto)  ';echo is_string($texto);echo"<br/>";
echo 'is_string($entero)  ';echo is_string($entero);echo"<br/>";
echo 'is_string($decimal)  ';echo is_string($decimal);echo"<br/>";
echo 'is_string($lista)  ';echo is_string($lista);echo"<br/>";
echo"<br/>";

?>