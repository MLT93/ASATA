<?php

// ? `NEW CLASS` SIRVE PARA CREAR UNA CLASE ANÓNIMA DENTRO DE UN MÉTODO EN UNA INSTANCIA (OBJ)
// `new class` crea una class personalizada para un método de una instancia definida. Es útil para agregar métodos y propiedades sencillos y únicos asociadas a una instancia en particular
// Se crea pasando una class como argumento de un `setter` o de un método que establece algo dentro de esa instancia (obj). Esto particulariza la misma instancia
class Car
{
  private $statusEngine;

  public function setStatusEngine($newStatusEngine)
  {
    $this->statusEngine = $newStatusEngine;
  }

  public function getStatusEngine()
  {
    // Llamo el método que crearé a través de la clase anónima
    return $this->statusEngine->start();
  }
}

$newCar = new Car();

// Convierto la propiedad en una clase anónima con un método que se llama `start()`
$newCar->setStatusEngine(
  new class
  {
    public function start()
    {
      return "El motor está arrancado";
    }
    public function stop()
    {
      return "El motor está parado";
    }
  }
);

echo $newCar->getStatusEngine()->start();
echo $newCar->getStatusEngine()->stop();
