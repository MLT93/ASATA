<?php

namespace Keygen;

/**
 * Summary of AleatoryKeygen
 * @param int $length Elegir longitud de la clave
 * @param bool $isNumbers Elegir si va a poseer números o no
 * @param bool $isUpperCase Elegir si va a poseer letras mayúsculas o no
 * @param bool $isSymbol Elegir si va a poseer símbolos o no
 * 
 * Por defecto genera una clave aleatoria de 12 dígitos con minúsculas, mayúsculas, símbolos y números
 * 
 * Tabla ASCII de referencia: https://www.man7.org/linux/man-pages/man7/ascii.7.html
 */
class AleatoryKeygen
{

  // Properties
  /**
   * Summary of length
   * @var int $length Longitud de la clave
   * @var bool $isNumbers Tiene números?
   * @var bool $isUpperCase Tiene letras mayúsculas?
   * @var bool $isSymbol Tiene letras símbolos?
   * 
   * Para generar la clave utiliza el método `createKey`
   */
  private int $length;
  private bool $isNumbers;
  private bool $isUpperCase;
  private bool $isSymbol;

  // Constructor
  /**
   * Summary of __construct
   * @param int $length Elegir longitud de la clave. Por defecto `12`
   * @param bool $isNumbers Elegir si va a poseer números o no. Por defecto `true`
   * @param bool $isUpperCase Elegir si va a poseer letras mayúsculas o no. Por defecto `true`
   * @param bool $isSymbol Elegir si va a poseer símbolos o no. Por defecto `true`
   */
  public function __construct(int $length = 12, bool $isNumbers = true, bool $isUpperCase = true, bool $isSymbol = true)
  {
    $this->length = $length;
    $this->isNumbers = $isNumbers;
    $this->isUpperCase = $isUpperCase;
    $this->isSymbol = $isSymbol;
  }

  // Esto funciona al imprimir instancias. Te permite crear un `string` para ser devuelto cuando se utiliza `echo` o `print`
  function __toString(): string
  {
    return json_encode(["message" => "Created key " . ($this->getIsNumbers() && $this->getIsUpperCase() && $this->getIsSymbol() ? $this->createKey() : "not selected upper case, symbol and numbers ")]);
  }

  // Getters y Setters
  protected function getLength(): int
  {
    return $this->length;
  }
  protected function getIsNumbers(): bool
  {
    return $this->isNumbers;
  }
  protected function getIsUpperCase(): bool
  {
    return $this->isUpperCase;
  }
  protected function getIsSymbol(): bool
  {
    return $this->isSymbol;
  }
  protected function setLength(int $length)
  {
    $this->length = $length;
  }
  protected function setIsNumbers(bool $option)
  {
    $this->isNumbers = $option;
  }
  protected function setIsUpperCase(bool $option)
  {
    $this->isUpperCase = $option;
  }
  protected function setIsSymbol(bool $option)
  {
    $this->isSymbol = $option;
  }

  // Methods
  /**
   * Summary of createKey
   * @return string Devuelve clave aleatoria
   */
  public function createKey()
  {
    // Array vacío para añadir los caracteres que vayamos a usar para crear la clave
    $charterCodeASCII = [];

    // Por defecto tendremos todas la letras minúsculas
    for ($i = 97; $i <= 122; $i++) {  /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden a las letras minúsculas del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
      array_push($charterCodeASCII, $i);
    }

    // Si deseo que tenga números, los agrego
    if ($this->getIsNumbers()) {
      for ($i = 48; $i <= 57; $i++) {  /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden a los números del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
        // $caracteres[]=$i;
        array_push($charterCodeASCII, $i);
      }
    }

    // Si deseo que tenga letras mayúsculas, las agrego
    if ($this->getIsUpperCase()) {
      for ($i = 65; $i <= 90; $i++) { /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden a las letras mayúsculas del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
        array_push($charterCodeASCII, $i);
      }
    }

    // Si deseo que tenga símbolos, los agrego
    if ($this->getIsSymbol()) {
      for ($i = 33; $i <= 47; $i++) { /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden a los símbolos del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
        array_push($charterCodeASCII, $i);
      }

      for($j = 58; $j <= 64; $j++){
        array_push($charterCodeASCII, $j); /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden al otra categoría de símbolos del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
      }

      for ($k = 91; $k <= 96; $k++) {
        array_push($charterCodeASCII, $k); /* Itero el valor decimal mínimo y el valor decimal máximo que corresponden al resto de símbolos del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
      }
    }

    // Cuento los caracteres en el array
    $totalElements = count($charterCodeASCII);
    $clave = "";
    for ($i = 0; $i < $this->getLength(); $i++) {
      // ? `CHR()` DEVUELVE UN CARÁCTER ESPECÍFICO ESPECIFICADO POR UN CÓDIGO ASCII EN FORMATO DECIMAL
      // ? `RAND()` CREA VALORES ALEATORIOS ENTRE UN NÚMERO Y OTRO
      $clave .= chr($charterCodeASCII[rand(0, $totalElements - 1)]);
    }

    return $clave;
  }

  // Static Methods



}

// $newAleatoryKey = new AleatoryKeygen();
// echo $newAleatoryKey->createKey() . "<br/>";
