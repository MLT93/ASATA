<?php

//un "template" para futuras clases que implementen de la interfaz
interface Humano {

public function getNombre();
public function getColorPelo();
public function getSexo();
public function getPeso();

public function setNombre(string $nombre);
public function setColorPelo(string $color);
public function setSexo(string $sexo);
public function setPeso(int $peso);


}



class SerHumano implements Humano {

    private $nombre;
    private $colorPelo;
    private $sexo;
    private $peso;

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
}


$adan = new SerHumano();

$adan->setPeso(80);
echo $adan->getPeso();


?>