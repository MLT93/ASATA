<?php

trait Surtidor{
    private $litros;
    public function setLitros($litros){
        $this->litros = $litros;
    }
}

trait Deposito{
    private $coste;
    public function setCoste($costeDeposito){
        $this->coste = $costeDeposito;
    }

    public function getCoste(){
       return  $this->coste;
    }
}



class  Repostaje{
    use Surtidor, Deposito;
    function __construct($litros,$coste){
        $this->setLitros($litros);
        $this->setCoste($coste);
    }

}


$mirepostaje = new Repostaje(20,25);
echo $mirepostaje->getCoste();


?>