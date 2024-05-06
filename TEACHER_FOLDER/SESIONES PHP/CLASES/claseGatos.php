<?php

class Gatos{

//PROPIEDADES DE LA CLASE
var $nombre;
var $colorPelo;
var $rayado = true;


//MÉTODOS DE LA CLASE
//constructor
function __construct()
{
    
}

// Un método de la clase Gatos.
function maullar(){
    echo "Miauuuu";echo"<br/>";
}

function maullar2($nombreGato){
    echo "$nombreGato dice Miauuuu";echo"<br/>";
}


}


//hago una instancia de la clase Gatos;
//creo al objeto $baldomero que pertenece a la clase gatos
$baldomero = new Gatos(); //pelo marrón
$garfield = new Gatos(); //pelo naranja
$gatito = new Gatos(); //pelo negro

echo "baldomero pertenece a la clase ".get_class($baldomero);echo"<br/>";


//Accedo a uno de los métodos de la clase a la que pertenece el objeto $baldomero
echo "Baldomero maulla y dice: ";$baldomero->maullar();
echo "Garfield maulla y dice: ";$garfield->maullar();

//Accedo a uno de los métodos de la clase a la que pertenece el objeto $baldomero
// $nombre = "Baldomero";
$baldomero->maullar2("Baldomero");


echo "El nombre de gatito es: ";echo $gatito->nombre;echo"<br/>";
$gatito->nombre = "felix";

echo "El nombre de gatito es: ";echo $gatito->nombre;echo"<br/>";
$baldomero->nombre = "noBaldomero";
echo "El nombre de Baldomero es: ";echo $baldomero->nombre;echo"<br/>";
$baldomero->$colorPelo = "marrón";
echo "El color de Baldomero es: ";echo $baldomero->colorPelo;
$gardfield->$colorPelo = "naranja";
$gatito->$colorPelo = "negro";





//1. Para ver las clases que tengo
$clases = get_declared_classes();
foreach($clases as $clase){
    // echo $clase."<br/>";
}


//2. Para ver si una clase existe
function claseExiste($nombreClase){
    if(class_exists($nombreClase)){
        echo "La clase $nombreClase existe";
    }else{
        echo "La clase $nombreClase No existe";
    }
}
claseExiste("Gatos");echo"<br/>";


//3. Para saber si un método existe
function metodoExiste($nombreClase,$nombreMetodo){
    if(method_exists($nombreClase,$nombreMetodo)){
        echo "El método $nombreMetodo existe dentro de la clase $nombreClase.";
    }else{
        echo "El método $nombreMetodo NO existe dentro de la clase $nombreClase.";
    }
}
metodoExiste("Gatos","maullar");echo"<br/>";

?>