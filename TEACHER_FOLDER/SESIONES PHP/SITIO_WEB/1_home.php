<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>HOME</title>     
 <link href="./css/styles.css" rel="stylesheet" type="text/css" />
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

 //incluir el autoloader del composer
 require_once("../../../SESION_006_PHP/vendor/autoload.php");
 //añado la pagina de la clase usuario
 require_once("./classes/Usuario.php");
 //incluir funciones
 require("functions/authentication.php");

//  use Firebase\JWT\JWT;

 //llamo a la clase usuario
 use User\Usuario as Usuario;
 //primer  elemento es el namespace
 //segundo elemento es la clase 
 //tercer  elemento el seudonimo de la clase

 //INFO DE USUARIOS DE MI BASE DE DATOS
 $usuariosBD = [
  ["miguelCD", "1234", "miguel@mail.com"],
  ["Pedro36",  "1234", "pedro@mail.com"],
  ["juan_mar", "1234", "juan@mail.com"]
 ];


 //PARA EL FORMULARIO DEL LOGIN
 if( 
  isset($_REQUEST['nombre']) && 
  isset($_REQUEST['pass']) &&
  isset($_REQUEST['captcha']) &&
  isset($_REQUEST['loguear'])
  ){
  // && $_REQUEST['captcha'] == $_SESSION['captcha']

  $existeUsuario =false;

  //COMPRUEBO QUE LOS DATOS DE MI USUARIO ESTAN EN MI BD
  for($i=0; $i<count($usuariosBD);$i++){

   if($_REQUEST['nombre']==$usuariosBD[$i][0] &&  $_REQUEST['pass']==$usuariosBD[$i][1] ){
    echo "<p>Usuario en la BD</p>";echo "<br/>";
    $existeUsuario =true;
    break;//salgo del bucle
   }
   elseif($i==count($usuariosBD)-1){
    echo "<h2 class='card' >EL USUARIO Y/O LAS CREDENCIALES NO ESTAN EN LA BD</h2>";echo "<br/>";
   }
  }



  if($existeUsuario){
   if($_REQUEST['captcha'] == $_SESSION['captcha']){
    echo "<p>El captcha es correcto</p>";echo "<br/>";

    $info = [];
    $info['nombre']=$_REQUEST['nombre'];
    $info['password']=$_REQUEST['pass'];
    //creo JWT
    $jwtArray = JWTCreation($info, "./_example.env");
    //CREO COOKIE CON JWT
    setcookie("jwt",$jwtArray['jwt'], $jwtArray['exp'],"/");
  
    //inserto el formulario
    require("./html_modules/form_picture_up.php");

   }
   else{
    echo "<p>El captcha NO es correcto</p>";echo "<br/>";
   }
  }
}


 //PARA EL FORMULARIO DEL REGISTRO
 if(
  isset($_REQUEST['nombre'])  && 
  isset($_REQUEST['email'])   && 
  isset($_REQUEST['pass'])    &&
  isset($_REQUEST['pass2'])   &&
  isset($_REQUEST['captcha']) &&
  isset($_REQUEST['registrar'])
  ){


  //COMPRUEBO QUE LOS DATOS DE MI USUARIO ESTAN EN MI BD
  $existeUsuario =false;

  for($i=0; $i<count($usuariosBD);$i++){
   if( $_REQUEST['nombre'] == $usuariosBD[$i][0] || $_REQUEST['email'] == $usuariosBD[$i][2] ){
    echo "<h2 class='card' >EL USUARIO Y/O EL CORREO ELECTRONICO YA EXISTEN EN LA BD</h2>";echo "<br/>";
    $existeUsuario =true;
   }
  }

  if(!$existeUsuario 
  // && !isset($_REQUEST['subir'])
  ){

   if($_REQUEST['pass']===$_REQUEST['pass2']){
    echo "<p>Password correcto</p>";
    if($_REQUEST['captcha'] == $_SESSION['captcha']){
     echo "<p>El captcha es correcto</p>";echo "<br/>";


     $info = [];
     $info['nombre']=$_REQUEST['nombre'];
     $info['password']=$_REQUEST['pass'];
     //creo JWT
     $jwtArray = JWTCreation($info, "./");
     //CREO COOKIE CON JWT
     setcookie("jwt",$jwtArray['jwt'],  $jwtArray['exp'],"/");
     //CREO USUARIO
     $usuario = new Usuario($_REQUEST['nombre'],$_REQUEST['email'],$_REQUEST['pass']);
     echo $usuario->mostrarInfo();echo "<br/>";   

     //inserto el formulario
     require("./html_modules/form_picture_up.php");

    }else{
     echo "<p>El captcha NO es correcto</p>";echo "<br/>";                        
    }
   }else{
    echo "<p>El password NO es correcto</p>";echo "<br/>";     
   }
  }
  

 }




 require("./html_modules/footer.php");

?>

</body>
</html>
