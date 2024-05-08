<?php

abstract class Trabajador{

    protected $nombre;
    protected $sueldo;

    //este constructor lo usaré dentro de los constructores de las clases de las hijas
    function __construct($nombreTrabajador){
        $this->nombre = $nombreTrabajador;
    }

    //getter
    function getNombre(){
        return $this->nombre;
    }
    function getSueldo(){
        return $this->sueldo;
    }

    //setter
    function setNombre($nombreNuevo){
        $this->nombre = $nombreNuevo;
    }
    function setSueldo($sueldoNuevo){
        $this->sueldo = $sueldoNuevo;
    }

    function nostrarDatos(){
        echo "Nombre: ".$this->getNombre()."<br/>";
        echo "Sueldo: ".$this->getSueldo()."<br/>";
    }
    //método abstracto que permite crear diferentes métodos en las clases hijas
    abstract function calcularSueldo();
}


class Empleado extends Trabajador{


    private $horasTrabajadas;
    private $costeHora;

    function __construct($nombreTrabajador,$horasTrabajadas,$costeHora=10){
        // Trabajador::__construct($n);
        parent::__construct($nombreTrabajador);
        $this->horasTrabajadas = $horasTrabajadas;
        $this->costeHora = $costeHora;
    }

    //setters 
    function setHorasTrabajadas($nhoras){
        $this->horasTrabajadas = $nhoras;
    }
    function setCosteHora($coste){
        $this->costeHora = $coste;
    }

    //getters
    function getHorasTrabajadas(){
        return $this->horasTrabajadas;
    }
    function getCosteHora(){
        return $this->costeHora;
    }

    function calcularSueldo()
    {
        $this->setSueldo(  $this->getCosteHora() * $this->getHorasTrabajadas()  );
    }                           //   12                            40

}


$operadorMaquina = new Empleado("Pedro",40,12);
$operadorMaquina->calcularSueldo();
echo $operadorMaquina->getSueldo();



?>