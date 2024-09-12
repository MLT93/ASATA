<?php

// ? `STATIC` NO DEPENDE DE NINGUNA PROPIEDAD O MÉTODO DE LA INSTANCIA O CLASE DEFINIDA, PERO TIENE RELACIÓN CON ELLA Y PUEDE SER UTILIZADA A TRAVÉS DE LAS INSTANCIAS
// Sólo puede ser estático si no tiene relación con las propiedades o métodos de la clase o instancia establecida, pero sí tiene que ver con ella y puede ser utilizada a través de las instancias
/* Ejemplo: una clase `Agente` nos informará sobre el tipo de agente, su grado, especialidad, el cuerpo al cual pertenece, etc... Pero también poseerá un método `estático` que será `comprobar documentación` que no utiliza los métodos o las propiedades ya definidas pero sí tiene que ver con la clase. El método estático puede ser utilizado por cada agente (la instancia) [instance (obj)] o directamente a través de la clase [class Agente] */
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

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
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

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
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
  /* ... */

  // Métodos estáticos
  public static function genoma($DNA)
  {
    if ($DNA !== "humano") {
      echo "Isn't human DNA";
    } else {
      echo "Correct Human DNA";
    }
  }
}

$martina = new SerHumano("Martina", "Mujer", "Rubia", 65);

// ? `$INSTANCE_OR_CLASS::STATIC_FUNCION()` PARA LLAMAR UNA FUNCIÓN ESTÁTICA
// `$NameClass::staticFunction()` llama a la función estática desde la propia clase. Se utilizan 4 puntitos en vez de una flecha porque es un método sin relación con los métodos o las propiedades de la clase
// `$martina::genoma()` llama a la función estática desde la instancia creada. Se utilizan 4 puntitos en vez de una flecha porque es un método sin relación con los métodos o las propiedades de la clase
$martina::genoma("humano");
