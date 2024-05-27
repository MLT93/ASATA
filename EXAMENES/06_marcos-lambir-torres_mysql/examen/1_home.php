<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>HOME</title>     
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
 require_once("./classes/SesionDB.php");
 
 require_once("../vendor/autoload.php");

 require_once("functions/authentication.php");
 require_once("functions/multimedia.php");


//  use Firebase\JWT\JWT;

 use UserDB\Usuario as Usuario;
 use SessionDB\Sesion as Sesion;


 //PARA EL FORMULARIO DEL LOGIN
 if(   isset($_REQUEST['loguear'])  ){

    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];

    //comprobar que el email y password estan en la BD y pertenecen al mismo usuario
    if(Usuario::verificarUsuario($email,$password)){

      
      $misesion = new Sesion();//aqui genero instancia de sesion
      $misesion->inicioLogin($email);//aqui me logueo
  
      $info = [];
      $info['usuario']=$_REQUEST['email'];
      $info['password']=$_REQUEST['pass'];
      
      $jwtArray = JWTCreation($info,"./");//creo JWT y lo devuelve en un array junto con la fecha de expiración
      setcookie("jwt",$jwtArray['jwt'], $jwtArray['exp'],"/");//CREO COOKIE CON JWT
    
      header("Location: newpedido.php");

    }else{
      echo "<h2 class='card'>Acceso denegado. Credenciales incorrectas</h2>";echo "<br/>";
    }
}


//PARA EL FORMULARIO DEL REGISTRO
if(  isset($_REQUEST['registrar']) ){

  if( Usuario::mostrarIdUsuario($_REQUEST['email']) == 0  ){

    if( $_REQUEST['pass']===$_REQUEST['pass2'] ){

      $misesionReg = new Sesion();
      $nombre = $_REQUEST['nickname'];
      $email = $_REQUEST['email'];
      $pasword = $_REQUEST['pass'];
      $telefono = $_REQUEST['tel'];
      $direccion = $_REQUEST['direccion'];

      Usuario::registrarUsuario(
        $nombre,
        $email,
        $pasword,
        $telefono,
        $direccion
      );
      header("Location: newpedido.php");

      //aqui me logueo y tengo que hacerlo despues del registro porque si no no encuentra el usuario en la base de datos
      $misesionReg->inicioLogin($_REQUEST['email']);

      $info = [];
      $info['usuario']=$_REQUEST['email'];
      $info['password']=$_REQUEST['pass'];
      
      $jwtArray = JWTCreation($info,"./");//creo JWT
      setcookie("jwt",$jwtArray['jwt'],  $jwtArray['exp'],"/");//CREO COOKIE CON JWT

    }else{
      echo "<h2 class='card'>El password NO es correcto</h2>";echo "<br/>";    
    }
  }
  else{
    echo "<h2 class='card'>El correo electronico ya existe en la BD</h2>";echo "<br/>";
  }

}



?>

</body>
</html>