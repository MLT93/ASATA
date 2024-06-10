<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGOUT "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>LOG OUT</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
  
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

 <?php

  ob_start();
  session_start();
  
  require("./html_modules/header.php");
  require("./html_modules/nav.php");

  require_once("./classes/SesionDB.php");
  
  use SessionDB\Sesion as Sesion;

  Sesion::cerrarSesion();
  setcookie("jwt","",time()-3600,"/");
  setcookie("PHPSESSID","",time()-3600,"/");

  header("Location:  0_login.php");
 ?>

</body>
</html>