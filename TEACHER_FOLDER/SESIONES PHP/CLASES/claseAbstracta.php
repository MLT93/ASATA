<?php

//un clase abstaracta mo se puede instanciar
abstract class Operacion{

    var $numero1;//25
    var $numero2;//17
    var $resultado;


    function __construct($n1=5,$n2=9){
        $this->numero1 = $n1;
        $this->numero2 = $n2;
    }
    function cargar1($num){
        $this->numero1 = $num;
    }
    function cargar2($num){
        $this->numero2 = $num;
    }
    function imprimirResultado(){
        echo $this->resultado;echo"<br/>";
    }



    
    
}



//Suma hereda de la clase Operación
class Suma extends Operacion{
    function __construct($n1=3){
        $this->numero1 = $n1;
        // $this->numero2 = $n2;
    }

    function operar(){
        $this->resultado = $this->numero1 + $this->numero2;
    }
}

class Resta extends Operacion{
    function operar(){
        $this->resultado = $this->numero1 - $this->numero2;
    }
}

class Division extends Operacion{
    function operar(){
        $this->resultado = $this->numero1 / $this->numero2;
    }
}

class Multiplicacion extends Operacion{
    function operar(){
        $this->resultado = $this->numero1 * $this->numero2;
    }
}


$misuma = new Suma();
// $misuma->cargar1(25);
// $misuma->cargar2(17);
$misuma->operar();
$misuma->imprimirResultado();

// $miresta = new Resta();
// $miresta->cargar1(32);
// $miresta->cargar2(13);
// $miresta->operar();
// $miresta->imprimirResultado();

//mira si una clase es padre de otra
echo get_parent_class("Suma");echo"<br/>";
echo get_parent_class("Resta");echo"<br/>";
echo get_parent_class("Division");echo"<br/>";
echo get_parent_class("Multiplicacion");echo"<br/>";
echo get_parent_class("Operacion");


//mira si una clase es padre de la clase de un objeto
echo is_subclass_of($miresta,"Operacion");//esto me devuelve 1 pq Operacion es padre de $miresta
echo is_subclass_of($miresta,"Resta");//esto me devuelve 0 pq Resta no es padre de $miresta





?>