<?php

// ? `TRAIT` CREA RASGOS Y CARACTERÍSTICAS ESPECÍFICAS PARA UNA AÑADIRLOS A UNA CLASE
// `trait` añade rasgos específicos a una clase, le añade funcionalidades ad-hoc
/* A veces es mejor añadir funcionalidades específicas en vez de modificar una clase ya creada */
trait Surtidor
{
  private $litros;
  public function setLitros(int $litros)
  {
    $this->litros = $litros;
  }

  public function getLitros(): int
  {
    return $this->litros;
  }
}

trait CargarDeposit
{
  private $coste;
  public function setCoste(float $coste)
  {
    $this->coste = $coste;
  }
  public function getCoste(): float
  {
    return $this->coste;
  }
}

class Repostar
{
  use Surtidor, CargarDeposit;

  function __construct($litros, $coste)
  {
    $this->setCoste($coste);
    $this->setLitros($litros);
  }
}

$repostar = new Repostar(20, 0.75);
echo $repostar->getLitros() . "<br/>";
echo $repostar->getCoste() . "<br/>";
