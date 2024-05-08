<?php

class Gatos{

    //PROPIEDADES DE LA CLASE
    private $nombre;
    public $colorPelo;
    public $rayado;

    //MÉTODOS DE LA CLASE
    //constructor
    //Los parametros que yo le ponga al constructor he de pasarselo al hacer una nueva instancia o si no he de darle un valor por defecto al parametro en el propio contructor
    function __construct($nombreGato="Felix", $color="negro", $apellidoGato="Suarez", $rayas=true)
    {
        //bautizamos al gato con el nombre que le pase al crear la instancia o con el valor por defecto
        $this->nombre = $nombreGato." ".$apellidoGato;
        $this->colorPelo = $color;
        $this->rayado = $rayas;
    }

    // function __destruct(){
    //     print $this->nombre." dice: Adios.<br/>";
    // }

    // Un método de la clase Gatos.
    public function maullar(){
        echo "Miauuuu";echo"<br/>";
    }

    public function maullar2($nombreGato){
        echo "$nombreGato dice Miauuuu";echo"<br/>";
    }

    protected function cambiarNombre($nuevoNombre){
        $this->nombre = $nuevoNombre;
    }

    public function verNombre(){
        echo $this->nombre;
    }


}//fin de la clase Gatos


class GatosSphynx extends Gatos{
    public $colorPiel;

    public function CambiarNombreSphynx($nuevoNombre){
        $this->cambiarNombre($nuevoNombre);
    }

    public function maullar(){
        echo "Dice Miauuuu Miauuu";echo"<br/>";
    }

}








$minino = new Gatos("Federico","negro", "lopez", false);
// echo $minino->nombre;echo"<br/>";
// $minino->CambiarNombreSphynx("gatoNuevo");echo"<br/>";
// $minino->verNombre();echo"<br/>";

// echo $minino->colorPelo;echo"<br/>";
// echo $minino->rayado;echo"<br/>";

// $gatin = new Gatos("lucas","naranja");
// // echo $gatin->nombre;echo"<br/>";
// echo $gatin->colorPelo;echo"<br/>";

// $gatete = new Gatos();
// // echo $gatete->nombre;echo"<br/>";
// echo $gatete->colorPelo;echo"<br/>";


$gatopelon = new GatosSphynx();
// $gatopelon->CambiarNombreSphynx("romero");
// $gatopelon->CambiarNombre("romero");
// $gatopelon->verNombre();


$ultimoGato = new GatosSphynx();
$ultimoGato->maullar();

?>