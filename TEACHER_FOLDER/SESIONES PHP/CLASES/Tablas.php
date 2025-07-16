<?php
require_once ("../vendor/autoload.php");
use Faker\Factory as Factory;

class Tabla
{
    private int $filas;//titulos + filas con datos
    private int $columnas;
    private array $titulos = [];
    private array $datos = [];
    private int $nRegistros;//filas con datos

    public function __construct($titulos,$nRegistros)
    {
        $this->titulos = $titulos;
        $this->nRegistros = $nRegistros;
    }

    protected function getFilas()
    {
        return $this->filas;
    }

    protected function setFilas($filas)
    {
        $this->filas = $filas;
    }

    protected function getColumnas()
    {
        return $this->columnas;
    }

    protected function setColumnas($columnas)
    {
        $this->columnas = $columnas;
    }

    protected function getDatos()
    {
        return $this->datos;
    }


    protected function setDatos($datos)
    {
        $this->datos = $datos;

    }

 
    protected function getTitulos()
    {
        return $this->titulos;
    }


    protected function setTitulos($titulos)
    {
        $this->titulos = $titulos;

    }

    protected function getNRegistros()
    {
        return $this->nRegistros ;

    }


    public function tablaFakeUsuarios($titulos,$nregistros){

        $faker = Factory::create();

        echo "<table border=1 cellspacing=0 >";

        echo "<tr>";
        for ($i=0; $i<count($titulos);$i++){
            echo "<th>$titulos[$i]</th>";
        }
        echo "</tr>";

        for ($i=1; $i<=$nregistros; $i++){//recorrer el numero de filas que le paso en $f
            
            echo "<tr>";

            echo "<td>".$faker->firstName() ."</td>";
            echo "<td>".$faker->lastName() ."</td>";
            echo "<td>".$faker->email() ."</td>";

            echo "</tr>";
        };

        echo "</table>";


    }


    public function tablaFakeUsuarios2(){

        $faker = Factory::create();

        echo "<table border=1 cellspacing=0 >";

        echo "<tr>";
        for ($i=0; $i<count($this->getTitulos());$i++){
            echo "<th>".$this->getTitulos()[$i]."</th>";
        }
        echo "</tr>";

        for ($i=1; $i<=$this->getNRegistros(); $i++){//recorrer el numero de filas que le paso en $f
            
            echo "<tr>";

            echo "<td>".$faker->firstName() ."</td>";
            echo "<td>".$faker->lastName() ."</td>";
            echo "<td>".$faker->email() ."</td>";

            echo "</tr>";
        };

        echo "</table>";

    }

}

$titulos = ["Nombre","Apellido","Email"];

$mitabla = new Tabla($titulos,9);
$mitabla->tablaFakeUsuarios2();




?>