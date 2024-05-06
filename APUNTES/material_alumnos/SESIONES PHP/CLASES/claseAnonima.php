<?php


class  Car{

    private $statusEngine;

    public function setStatusEngine($statusEngine){
        $this->statusEngine = $statusEngine;
    }

    public function getStatusEngine(){
        return $this->statusEngine;
    }
}



//creo un instancia de coche;
$micoche = new Car();
$micoche2 = new Car();


$micoche->setStatusEngine(
    new class{
        //convierto la propiedad en una clase anonima con un método que es "start";
        public function start(){
            return "El motor esta arrancado.";
        }
        public function stop(){
            return "El motor esta parado.";
        }
        public $nivelDeposito = 40;
    }
);

echo $micoche->getStatusEngine()->start();echo "<br/>";
echo $micoche->getStatusEngine()->stop();echo "<br/>";
echo $micoche->getStatusEngine()->nivelDeposito;echo "<br/>";
echo $micoche->setStatusEngine("Estado actual");echo "<br/>";
echo $micoche->getStatusEngine();echo "<br/>";



// $micoche2->setStatusEngine(
//     new class{
//         //convierto la propiedad en una clase anonima con un método que es "start";
//         public function start(){
//             return "El motor esta apagado.";
//         }
//     }
// );
// echo $micoche2->getStatusEngine()->start();

?>