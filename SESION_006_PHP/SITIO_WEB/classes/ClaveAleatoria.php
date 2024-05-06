<?php

namespace Clave;

class ClaveAleatoria
{
  private int $longitud;
  private bool $numeros;
  private bool $mayusculas;

  // constructor
  public function __construct(int $longitud = 12, bool $numeros = true, bool $mayusculas = true)
  {
    $this->longitud = $longitud;
    $this->numeros = $numeros;
    $this->mayusculas = $mayusculas;
  }

  // getters
  protected function getLongitud(): int
  {
    return $this->longitud;
  }
  protected function getNumeros(): bool
  {
    return $this->numeros;
  }
  protected function getMayusculas(): bool
  {
    return $this->mayusculas;
  }

  // setters
  protected function setLongitud(int $longitud)
  {
    $this->longitud = $longitud;
  }
  protected function setNumeros(bool $option)
  {
    $this->mayusculas = $option;
  }
  protected function setMayusculas(bool $option)
  {
    $this->mayusculas = $option;
  }

  // métodos
  public function generar()
  {
    
    // aquí añadiremos los caracteres que vaya a usar (letras mayúsculas y minúsculas)
    $codigoCaracteresASCII = [];
    
    // por defecto tendremos letras minúsculas
    for ($i = 97; $i < 122; $i++) {
      array_push($codigoCaracteresASCII, $i); /* Añado los valores en decimal que corresponden a las letras mayúsculas del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
    }
    // compruebo si la prop números toma el valor true y, en ese caso, los añado a mi clave los números
    if ($this->getNumeros()) {
      for ($i = 48; $i < 57; $i++) {
        array_push($codigoCaracteresASCII, $i); /* Añado los valores en decimal que corresponden a las letras mayúsculas del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
      }
    }
    // compruebo si la prop de mayúsculas toma el valor true y, en ese caso, los añado a mi clave las letras mayúsculas
    if ($this->getMayusculas()) {
      for ($i = 65; $i < 90; $i++) {
        array_push($codigoCaracteresASCII, $i); /* Añado los valores en decimal que corresponden a las letras mayúsculas del código ASCII (ver tabla ASCII). https://www.man7.org/linux/man-pages/man7/ascii.7.html */
      }
    }
    
    // cuántos caracteres tengo en el array?
    $totalElements = count($codigoCaracteresASCII);
    $clave = "";
    for ($i = 0; $i < $this->longitud; $i++) {
      // ? `CHR()` DEVUELVE UN CARACTER ESPECÍFICO ESPECIFICADO POR UN CÓDIGO ASCII EN FORMATO DECIMAL
      // ? `RAND()` CREA VALORES ALEATORIOS ENTRE UN NÚMERO Y OTRO
      $clave .= chr($codigoCaracteresASCII[rand(0, $totalElements - 1)]);
    }
    return $clave;
  }
}
