<?php

// ? `NEW CLASS` CREA UNA CLASE ANÓNIMA
// `new class` crea una class personalizada para una instancia definida. Es útil para agregar métodos y propiedades sencillas asociadas a una instancia en particular
// Es una class pasada como argumento de un `setter` o método que setea algo, dentro de la instancia (obj)
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
