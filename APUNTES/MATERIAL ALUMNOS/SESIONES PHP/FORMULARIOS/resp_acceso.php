<?php

$usuario="dario";
$pass="1234";


if(  isset($_REQUEST['nombre']) && isset($_REQUEST['pass']  ) ){

    if($_REQUEST['nombre']==$usuario && $_REQUEST['pass'] == $pass){

        
        echo "Bienvenido Dario";

    }
    else{
        echo "usuario no autorizado";
    }
}

// var_dump($_REQUEST);

?>
