<?php


class ObraArtistica{

    private $id;
    public $dimensiones;
    public $precio;
    public $autor;
    public $nombre;
    public $año;
    private static $contadorID = 1000;

    public function __construct($autor,$nombre,$precio,$año){
        $this->autor = $autor;
        $this->nombre = $nombre;
        $this->precio= $precio;
        $this->año = $año;
        //como tengo una propiedad estatica. 
        //Para acceder a esa propiedad he de hacerlo en el propio objeto a traves de "self::"
        // $this->id = self::$contadorID++;
        $this->id = 0;
    }
    public function __clone(){
        //asegura que cada clon tenga un ID único;
        $this->id = self::$contadorID++;
    }
    public function mostrarInfo(){
        echo "ID: {$this->id}, Nombre: {$this->nombre}, Autor: {$this->autor}, Año: {$this->año}";echo "<br/>";
    }

}

//crear una obra artistica original
$obraOriginal = new ObraArtistica("Richard Hamilton","las meninas de Picasso",100000,1973);
$obraOriginal->mostrarInfo();


$obraClonada1 = clone  $obraOriginal;
$obraClonada1->mostrarInfo();

$obraClonada2 = clone  $obraOriginal;
$obraClonada2->mostrarInfo();

$obraOriginal2 = new ObraArtistica("Richard Hamilton","las meninas de Picasso",100000,1973);
$obraOriginal2->mostrarInfo();


$obraOriginal3 = new ObraArtistica("Picasso","El guernica",100000,1937);
$obraOriginal3->mostrarInfo();
$obraClonadaPic = clone  $obraOriginal3;
$obraClonadaPic->mostrarInfo();
?>