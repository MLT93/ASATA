<?php

// if(  isset($_REQUEST["nombre"])  &&  isset($_REQUEST['pass'])  && isset($_REQUEST['tipo'])  ){

    echo "Hola ". $_REQUEST["nombre"]." eres un usuario de tipo ".$_REQUEST['tipo'];
    echo "<br/>";

    // echo "Hola ". $_POST["nombre"]." eres un usuario de tipo ".$_POST['tipo'];
    // echo "<br/>";
    echo "Hola ". $_GET["name"]." eres un usuario de tipo ".$_GET['tipo'];
// }


?>