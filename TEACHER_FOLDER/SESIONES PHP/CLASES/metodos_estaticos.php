<?php

class SerHumano2 {

    private $nombre;
    private $colorPelo;
    private $sexo;
    private $peso;


    function __construct($nombre, $colorPelo,$sexo,$peso){

        $this->nombre = $nombre;
        $this->colorPelo = $colorPelo;
        $this->sexo = $sexo;
        $this->peso = $peso;

    }



    public function getNombre(){
        return $this->nombre;  
    }
    public function getColorPelo(){
        return $this->colorPelo;  
    }
    public function getSexo(){
        return $this->sexo;  
    }
    public function getPeso(){
        return $this->peso;  
    }



    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setColorPelo($color){
        $this->colorPelo = $color;
    }
    public function setSexo($sexo){
        $this->sexo = $sexo;
    }
    public function setPeso($peso){
        $this->peso = $peso;
    }



    public static function genoma($muestraADN){
        if($muestraADN == "humano"){
            echo "Es la muestra de ADN de un ser Humano.";
        }else{
            echo "No es la muestra de ADN de un ser Humano.";
        }
    }


}

$lucy = new SerHumano2("Lucy","negro","mujer",60);
$lucy::genoma("humano");//asi llamo a los metodos estaticos


?>