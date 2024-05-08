<?php

class Botones{

    var $shape;
    var $text;
    var $color;
    var $height;
    var $width;
    var $enable = true;
    var $font;
    var $border;
    var $backgroundColor;
    var $class;


    //eel contructor se ejecuta siempre al crear una instancia
    function __construct($color="red",$border="1 px",$height=50,$width=100){
        $this->color = $color;
        $this->border= $border;
        $this->height= $height;
        $this->width= $width;

    }


    function toggleEnable(){
        if($this->enable){
            $this->enable = false;
        }else{
            $this->enable = true;
        }
    }


    function changeColor($color){
        $this->color = $color;
    }

    function hover(){
        echo "Estas encima del botón.";
    }

    function setClass($newclass){
        //$this->class accede a la propiedad class dentro del propio objeto
        //$newclass es el valor de la nueva clase que le asigno a la propiedad class
        $this->class = $newclass;
    }
}
//creo una nueva instancia. 
$miboton = new Botones("red","1 px",50,100);//$miboton ss un objeto


echo $miboton->enable;echo"<br/>";
$miboton->changeColor("red");
echo $miboton->color;echo"<br/>";
$miboton->setClass("contraste");
echo $miboton->class;echo"<br/>";




?>