<?php

$texto = "lorem ipsum";  //11
$palabra = "cosa";  //4
$mensaje = "Esto es un mensaje."; //19
$inputRegistro = "       mimail@mail.com es este ";
$listaTexto = "matematicas, lengua, musica, ciencias";



//strlen  cuenta el número de caracteres de una cadena
echo strlen($texto);   echo "<br/>";
echo strlen($palabra); echo "<br/>";
echo strlen($mensaje); echo "<br/>";

//substr devuelve parte de una cadena
echo substr($mensaje,5); echo "<br/>";//coge la cadena a partir de la posicion 5
echo substr($mensaje,5,5); echo "<br/>";//coge la cadena a partir de la posicion 5


echo substr($mensaje,-5);  echo "<br/>";
echo substr($mensaje,-14,5);echo "<br/>";
echo substr($mensaje,-14,-9);echo "<br/>";
echo substr($mensaje,9,-4);echo "<br/>";


//trim quita espacios en blanco al inico y al final de un string
echo "TETXO:".$inputRegistro."FINAL";echo "<br/>";
echo "TETXO:".trim($inputRegistro)."FINAL";echo "<br/>";

//explode pasa de cadena de caracteres a array
$listaArray = explode(", ",$listaTexto);
print_r($listaArray);


//strtolower convierte en minuscula
$textoMayuscula = "HOLA, ¿QUE TAL?";
echo strtolower($textoMayuscula);echo "<br/>";

$textoMinuscula = "buenos dias";
echo strtoupper($textoMinuscula);echo "<br/>";

$textoMinuscula = "buenos dias";
echo ucfirst($textoMinuscula);echo "<br/>";
echo ucwords($textoMinuscula);echo "<br/>";






?>