<header >
<a href="./0_login.php">    
 <img id='logo' height='100px' src='./assets/img/logo.webp'/>
</a>


<?php
require_once("./classes/UsuarioDB.php");
require_once("./functions/authentication.php");
require_once("../vendor/autoload.php");

use UserDB\Usuario as Usuario;
$dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
$dotenv->load();

//compruebo que el token existe en la cookie
if(isset($_COOKIE['jwt'])){

 //compruebo que las credenciales son correctas
 if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){
  $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
  echo "<a href='user_info.php'><span id='nombreheader'>".$infoUsuario['nickname']."</span></a>";
  echo "<a href='./0_logout.php'>LOG OUT<a>";
 }
}


?>


</header>
