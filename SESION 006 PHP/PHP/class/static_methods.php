<?php

// ? MÉTODO QUE NO DEPENDE DE NINGUNA PROPIEDAD O MÉTODO DE LA CLASE DEFINIDA PERO TIENE RELACIÓN CON ELLA Y PUEDE SER UTILIZADA EN SUS INSTANCIAS
// Sólo puede ser estático si no tiene relación con las propiedades o métodos de la clase establecida pero sí tiene que ver con ella y puede ser utilizada por sus instancias
/* Ejemplo: una clase `Agente` nos informará sobre el agente con su grado, especialidad, el cuerpo al cual pertenece, etc... Pero también poseerá un método `estático` que será `comprobar documentación` que no utiliza sus métodos o sus propiedades pero sí tiene que ver con la clase y puede ser utilizada por cada agente [instancia (obj)] */
class SerHumano
{
  protected $name;
  protected $gender;
  protected $weight;
  protected $hairColor;

  // constructor
  function __construct($name, $gender, $weight, $hairColor)
  {
    $this->name = $name;
    $this->gender = $gender;
    $this->weight = $weight;
    $this->hairColor = $hairColor;
  }

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

  // Métodos

  // Métodos estáticos
  public static function genoma($DNA)
  {
    if ($DNA !== "humano") {
      echo "No es ADN humano";
    } else {
      echo "Es ADN humano";
    }
  }
}

$martina = new SerHumano("Martina", "Mujer", "Rubia", 65);

// ? `$INSTANCIA::STATIC_FUNCION()` PARA LLAMAR UNA FUNCIÓN ESTÁTICA
// `$martina::genoma()` llama a la función estática desde la instancia creada
$martina::genoma("humano");
