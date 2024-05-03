<?php

abstract class Trabajador
{

  protected $nombre;
  protected $sueldo;


  function __construct($nombre)
  {
    $this->nombre = $nombre;
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  public function getNombre()
  {
    return $this->nombre;
  }

  public function getSueldo()
  {
    return $this->sueldo;
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  public function setNombre($newNombre)
  {
    $this->nombre = $newNombre;
  }

  public function setSueldo($newSueldo)
  {
    $this->sueldo = $newSueldo;
  }

  // `MÉTODOS` de la class
  function mostrarDatos()
  {
    echo "Nombre: " . $this->getNombre() . "<br/>";
    echo "Sueldo: " . $this->getSueldo() . "<br/>";
  }

  // `MÉTODOS ABSTRACTOS` crea un método que debe implementarse en las clases hijas
  abstract function calcularSueldo();
}

class Empleado extends Trabajador
{

  private $horasTrabajadas;
  private $costeHoras;

  function __construct($horasTrabajadas, $costeHoras = 10, $nombreTrabajador)
  {
    $this->horasTrabajadas = $horasTrabajadas;
    $this->costeHoras = $costeHoras;

    Trabajador::__construct($nombreTrabajador);
  }

  public function getHorasTrabajadas()
  {
    return $this->horasTrabajadas;
  }
  public function getCosteHoras()
  {
    return $this->costeHoras;
  }

  public function setHorasTrabajadas($newHorasTrabajadas)
  {
    $this->horasTrabajadas = $newHorasTrabajadas;
  }
  public function setCoteHoras($newCosteHoras)
  {
    $this->costeHoras = $this->$newCosteHoras;
  }

  function calcularSueldo()
  {
    $sueldo = $this->getHorasTrabajadas() * $this->getCosteHoras();

    $this->setSueldo($sueldo);
  }
}


$tecnicoMaquinaria = new Empleado(40, 12, "Alberto");
$tecnicoMaquinaria->calcularSueldo() . "<br/>";
$tecnicoMaquinaria->mostrarDatos();
