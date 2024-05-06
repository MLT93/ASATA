<?php

class PizzaMargarita{

    private $masa = true;
    private $tomate = true;
    private $mozzarella = true;
    public $albahaca;
    public $aceitePicante;
    //ponemos 2 contadores estaticos se actualizan con cada instancia o con cada clonación.
    private static $contadorCON = 0;
    private static $contadorSIN = 0;


    function __construct($albahaca=false, $aceitePicante=false){
        $this->albahaca = $albahaca;
        $this->aceitePicante = $aceitePicante;

        $albahaca? self::$contadorCON++ : self::$contadorCON;
        $albahaca? self::$contadorSIN   : self::$contadorSIN++;
    }

    function mostrarIngredientes(){
        echo $this->masa?"masa <br/>":"";
        echo $this->tomate?"tomate <br/>":"";
        echo $this->mozzarella?"mozzarella <br/>":"";
        echo $this->albahaca?"albahaca <br/>":"";
        echo $this->aceitePicante?"aceitePicante <br/>":"";
    }

    function __clone(){
        // $this->albahaca? self::$contadorCON++ : self::$contadorCON;
        // $this->albahaca? self::$contadorSIN   : self::$contadorSIN++;
    }


    static function estadoPedidos(){
        echo "Pedidos sin Albahaca: ".self::$contadorSIN;echo "<br/>";
        echo "Pedidos con Albahaca: ".self::$contadorCON;echo "<br/>";
    }

}

$primerPedido = new PizzaMargarita();
$Pedido2 = new PizzaMargarita(true);
$Pedido3 = new PizzaMargarita(true);
$Pedido4 = clone $Pedido3;
$Pedido5 = clone $primerPedido;


$primerPedido->mostrarIngredientes();
echo "<br/><br/>";
$Pedido2->mostrarIngredientes();
echo "<br/><br/>";
$Pedido3->mostrarIngredientes();
echo "<br/><br/>";
$Pedido4->mostrarIngredientes();
echo "<br/><br/>";
$Pedido5->mostrarIngredientes();
echo "<br/><br/>";
PizzaMargarita::estadoPedidos();

?>