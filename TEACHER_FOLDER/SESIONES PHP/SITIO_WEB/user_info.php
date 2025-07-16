<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>INFO USUARIO</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

<?php
//activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
 ob_start();
 //inicio una sesion
 session_start();

 //cabecera y nav
 require_once("./html_modules/header.php");
 require_once("./html_modules/nav.php");
 require_once("./classes/UsuarioDB.php");
 require_once("./classes/db.php");

 require_once("./functions/authentication.php");
 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");

 use UserDB\Usuario as Usuario;
 use Database\Db as Db;

 $dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
 $dotenv->load();

 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI
        $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
        // $idUsuario = $infoUsuario['id'];
        $idRol = $infoUsuario['id_rol'];

        $sentenciaSQL = "SELECT rol FROM roles WHERE roles.id = $idRol";
        // $sentenciaSQL = "SELECT roles.rol FROM usuarios LEFT JOIN roles ON usuarios.id_rol = roles.id WHERE usuarios.id = $idUsuario";
        $cnx = new Db("localhost","root","","gameclub");
        $registroRol = $cnx->myQuerySimple($sentenciaSQL, true);


        echo "<table> 
        <tr>
        <th>🔄</th> <th>IMG</th> <th>NOMBRE</th> <th>APELLIDO 1</th> <th>APELLIDO 2</th> <th>E-MAIL</th> 
        <th>TÉLEFONO</th> <th>DIRECCIÓN</th> <th>DNI</th> 
        <th>Nº TARJETA</th> <th>FECHA NACIMIENTO</th> <th>SOCIO</th> <th>ROL</th>
        </tr>";
        echo "<tr>";
        echo "<td><a href='actual_user.php'><img class='redondeado' src='./assets/img/update.png'></a></td>";
        // echo "<td><a href='actual_user.php'>🔄</a></td>";

        echo "<td><img  class='redondeado' src='".$infoUsuario['imagen']."' ></td>";

        foreach($infoUsuario as $key => $value){
            if($key != "hashedPassword" && $key!="imagen" && $key!="id" && $key!="socio" && $key!="id_rol"){
                echo "<td>".$value."</td>";
            }
            if($key==="socio"){
                $esSocio = $value ?"SI":"NO";
                echo "<td>".$esSocio."</td>";
            }
            if($key=="id_rol"){
                echo "<td>".$registroRol['rol']."</td>";
            }


        }
        echo "</tr>";
        echo "</table>";  

        //TERMINA AQUI

    }

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }
 require("./html_modules/footer.php");

 ?>
 
 </body>

</html>
