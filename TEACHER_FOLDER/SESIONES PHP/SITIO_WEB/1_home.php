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

 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");
 //añado la pagina de la clase usuario
 require_once("./classes/UsuarioDB.php");
 require_once("./classes/SesionDB.php");

 //incluir funciones
 require_once("functions/authentication.php");
 require_once("functions/multimedia.php");


//  use Firebase\JWT\JWT;

 //llamo a la clase usuario
 use UserDB\Usuario as Usuario;
 use SessionDB\Sesion as Sesion;
 //primer  elemento es el namespace
 //segundo elemento es la clase 
 //tercer  elemento el seudonimo de la clase

 //PARA EL FORMULARIO DEL LOGIN
 if( 
  isset($_REQUEST['email']) && 
  isset($_REQUEST['pass']) &&
  isset($_REQUEST['captcha']) &&
  isset($_REQUEST['loguear'])
  ){

    $email = $_REQUEST['email'];
    $password = $_REQUEST['pass'];

    //comprobar que el email y password estan en la BD y pertenecen al mismo usuario
    if(Usuario::verificarUsuario($email, $password)){

      //aqui genero instancia de sesion
      $misesion = new Sesion();
      
      if($_REQUEST['captcha'] == $_SESSION['captcha']){

        $message_footer = "El usuario se ha logueado correctamente";

        //aqui me logueo
        $misesion->inicioLogin($email);
    
        $info = [];
        $info['usuario']=$_REQUEST['email'];
        $info['password']=$_REQUEST['pass'];
        //creo JWT y lo devuelve en un array junto con la fecha de expiración
        $jwtArray = JWTCreation($info,"./");
        //CREO COOKIE CON JWT
        setcookie("jwt",$jwtArray['jwt'], $jwtArray['exp'],"/");
      
        header("Location: user_info.php");
        //inserto el formulario
        // require("./html_modules/form_picture_up.php");
    
      }
      else{
        echo "<h2 class='card'>El captcha NO es correcto</h2>";echo "<br/>";
      }

    }else{
      echo "<h2 class='card'>Acceso denegado. Credenciales incorrectas</h2>";echo "<br/>";
    }
}





 //PARA EL FORMULARIO DEL REGISTRO
 if(  isset($_REQUEST['registrar']) ){

//compruebo que este usuario no existe en la base de datos
if( Usuario::mostrarIdUsuario($_REQUEST['email']) == 0  ){
  //compruebo que el password se ha introducido correctamente en ambos campos
  if( $_REQUEST['pass']===$_REQUEST['pass2'] ){
    //compruebo que el captcha se ha introducido correctamente
    
    //Al hacer una instancia de sesion, estoy ejecutando session_start(); 
    $misesionReg = new Sesion();

    if( $_REQUEST['captcha']==$_SESSION['captcha']){

      $nombre = $_REQUEST['nombre'];
      $apellido1 = $_REQUEST['apellido1'];
      $apellido2 = $_REQUEST['apellido2'];
      $email = $_REQUEST['email'];
      $pasword = $_REQUEST['pass'];
      $telefono = $_REQUEST['tel'];
      $direccion = $_REQUEST['direccion'];
      $dni = $_REQUEST['dni'];
      $tarjeta = $_REQUEST['tjt'];
      $fechaNac = $_REQUEST['fechaNac'];
      $socio = $_REQUEST['socio'];
      $idRol = intval($_REQUEST['rol']);

      $nombreCompleto = $nombre.$apellido1;
      $nombreCompleto = limpiarCadena($nombreCompleto);

      //comprobamos que la imagen se ha cargado correctamente
      if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0 ){
        $fileName = $_FILES['imagen']['name'];
        $fileName = limpiarCadena($fileName);
        $origen = $_FILES['imagen']['tmp_name'];
        $fileSize = $_FILES['imagen']['size'];//esto me permitiria controlar el tamaño de la imagen que subo
        $fileType = $_FILES['imagen']['type'];
        $destino = "./repo/img/users/".$nombreCompleto."_".date('Y.m.d.His')."-".$fileName;
        
        redimensionarImagen($origen,$destino,50,50);

        Usuario::registrarUsuario(
          $nombre,
          $apellido1,
          $apellido2,
          $email,
          $pasword,
          $telefono,
          $direccion,
          $dni,
          $tarjeta,
          $fechaNac,
          $socio,
          $idRol,
          $destino
        );
        header("Location: user_info.php");
        
      }else{
        echo "<h2 class='card'> Error al subir el archivo de imagen </h2>";
      }

      $message_footer = "El usuario se ha registrado correctamente"; 

      //aqui me logueo y tengo que hacerlo despues del registro porque si no no encuentra el usuario en la base de datos
      $misesionReg->inicioLogin($_REQUEST['email']);

      $info = [];
      $info['usuario']=$_REQUEST['email'];
      $info['password']=$_REQUEST['pass'];
      //creo JWT
      $jwtArray = JWTCreation($info,"./");
      //CREO COOKIE CON JWT
      setcookie("jwt",$jwtArray['jwt'],  $jwtArray['exp'],"/");
 
      //inserto el formulario
      // require("./html_modules/form_picture_up.php");
 
      }else{
        echo "<h2 class='card'>El captcha NO es correcto</h2>";echo "<br/>";                        
      }
    }else{
      echo "<h2 class='card'>El password NO es correcto</h2>";echo "<br/>";    
    }
  }
  else{
    echo "<h2 class='card'>El correo electronico ya existe en la BD</h2>";echo "<br/>";
  }

 }




 require("./html_modules/footer.php");

?>

</body>
</html>
