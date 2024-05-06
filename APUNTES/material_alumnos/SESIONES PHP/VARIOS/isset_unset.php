<?php

$nombre = "Antonio";
unset($nombre);

if(isset($nombre)){
    echo "El nombre existe";
}
else{
    echo "el nombre no existe";
}


echo "*******************************<br/>";

// FUNCIONES PARA EVALUAR EL TIPO DE DATO QUE TENGO.

$precioTotal = 980;
$precioIVA  = $precioTotal * 1.21;
$respuesta = "El precio total de mi compra es:";
$productos = array("queso","agua", "huevos", "azucar");

echo "El precio total es un entero? ".is_integer($precioTotal);echo"<br/>";
echo "El precio con IVA es un double?".is_double($precioIVA);echo"<br/>";
echo "La variable respuesta es un string?".is_string($respuesta);echo"<br/>";
echo "La variable productos es una array?".is_array($productos);echo"<br/>";


echo "*******************************<br/>";

// FUNCIONES PARA PARSEAR EL TIPO DE DATO

$cadena = "200";//tipo de dato texto
echo "Es un entero? ".is_integer(   $cadena     );echo"<br/>";

echo "Es un entero? ".is_integer(   intval($cadena)   );echo"<br/>";
//intval parsea datos en cadena de texto a enteros si es posible
//is_integer pregunta si algo es entero
echo "Es un entero? ".is_double(   floatval($cadena)   );echo"<br/>";
//floatval parsea datos en cadena de texto a numeros decimales si es posible
//is_double pregunta si algo es un numero decimal


$auxiliar = floatval($cadena);//auxiliar es un dato número decimal
echo "Es un string? ".is_string(      $auxiliar              ) ;echo"<br/>";    
echo "Es un string? ".is_string(         strval($auxiliar)       ) ;echo"<br/>";   



echo "*******************************<br/>";

//CONSTANTES

define ("numeroPI", 3.141592 );
define ("IFCD0210", "Curso de desarrollo de aplicaciones en entorno Web");

echo numeroPI;echo"<br/>";  
echo IFCD0210;echo"<br/>";  


//PARA SABER SI UNA CONSTANTE ESTA DEFINIDA

echo defined("numeroPI");echo"<br/>";  
echo defined("numeroE");echo"<br/>";  


?>