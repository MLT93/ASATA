<?php

namespace Clave;

class ClaveAleatoria
{

    // Properties
    private int $longitud;
    private bool $numeros;
    private bool $mayusculas;

    // Constructor
    public function __construct(int $longitud = 12, bool $numeros = true, bool $mayusculas = true)
    {
        $this->longitud = $longitud;
        $this->numeros = $numeros;
        $this->mayusculas = $mayusculas;
    }

    // Getters y Setters
    protected function getLongitud()
    {
        return $this->longitud;
    }
    protected function getNumeros()
    {
        return $this->numeros;
    }
    protected function getMayusculas()
    {
        return $this->mayusculas;
    }

    // Methods
    protected function setLongitud(int $longitud)
    {
        $this->longitud = $longitud;
    }

    protected function setNumeros(bool $option)
    {
        $this->numeros = $option;
    }

    protected function setMayusculas(bool $option)
    {
        $this->mayusculas = $option;
    }

    public function generar()
    {

        //aqui añadiremos los caracteres que vaya a usar
        $codigoCaracteresASCII = [];

        //compruebo si numeros toma valor true y en ese caso los añado a mi clave
        if ($this->numeros) {
            for ($i = 48; $i <= 57; $i++) {
                // $caracteres[]=$i;
                array_push($codigoCaracteresASCII, $i); //añado codigo ASCII en decimal al aray de caracteres
            }
        }
        if ($this->mayusculas) {
            for ($i = 65; $i <= 90; $i++) {
                array_push($codigoCaracteresASCII, $i);
            }
        }
        for ($i = 97; $i <= 122; $i++) {
            array_push($codigoCaracteresASCII, $i);
        }


        //cuantos caracteres tengo en el array
        $total = count($codigoCaracteresASCII) - 1;
        $clave = "";

        for ($i = 0; $i < $this->longitud; $i++) {
            $clave = $clave . chr($codigoCaracteresASCII[rand(0, $total)]);
        }

        return $clave;
    }
}
