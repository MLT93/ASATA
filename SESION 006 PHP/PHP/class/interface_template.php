<?php

// ? `INTERFACE` SIRVE PARA DEFINIR UNA CLASS Y OBLIGA A QUE SE RESPETE UNA ESTRUCTURA DEFINIDA
// `interface` es una plantilla (template) para crear una class

interface Humano
{

  public function getName();
  public function getHairColor();
  public function getGender();
  public function getWeight();

  public function setName(string $name);
  public function setHairColor(string $hairColor);
  public function setGender(string $gender);
  public function setWeight(int $weight);
}

// ?
// ``

// ? `IMPLEMENTS`
// `implements`
class HomoSapiens implements Humano
{
  protected $name;
  protected $gender;
  protected $weight;
  protected $hairColor;

  // Getters
  public function getName(): string
  {
    return $this->name;
  }

  public function getGender(): string
  {
    return $this->gender;
  }

  public function getWeight(): int
  {
    return $this->weight;
  }

  public function getHairColor(): string
  {
    return $this->hairColor;
  }

  // Setters
  public function setName(string $name)
  {
    $this->name = strval($name);
  }

  public function setGender(string $gender)
  {
    $this->gender = strval($gender);
  }

  public function setWeight(int $weight)
  {
    $this->weight = intval($weight);
  }

  public function setHairColor(string $hairColor)
  {
    $this->hairColor = strval($hairColor);
  }
}

$eva = new HomoSapiens();

$eva->setWeight(68);
echo $eva->getWeight();
