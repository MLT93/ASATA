<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8" />
 <meta name="author" content="DMA" />
 <meta name="description" content="" />
 <meta name="keywords" content="cursos, formación, desarrollo software" />
 <title>LISTA VALORACIONES</title>
 <link href="css/styles.css" rel="stylesheet" type="text/css" />

  <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
 
</head>

<body>

 <?php
  session_start();

 require("./html_modules/header.php");
 require("./html_modules/nav.php");
 require_once("./classes/db.php");
 require_once("./classes/UsuarioDB.php");
 // require_once("./classes/SesionDB.php");
 require_once("./functions/authentication.php");
 require_once("../vendor/autoload.php");

 use Database\Db as Db;
 use UserDB\Usuario as Usuario;

 //para puede extraer las variables de entorno del archivo .env
 $dotenv = Dotenv\Dotenv::createImmutable("./");
 $dotenv->load();

 //si el cookie exist
  if (isset($_COOKIE["jwt"])) {

   //prubar acceso 
   //comprube si el token concidi con el variabnle de secion
   if (estadoAcceso($_COOKIE["jwt"], $_ENV['SIGNATURE_KEY'], $_ENV["CIPHER_KEY"])) {


    $cnx = new Db("localhost", "root", "", "gameclub");
    $idUsuario = Usuario::mostrarIdUsuario($_SESSION["usuario"]);

    $sentanciaQuery = "SELECT alquileres.id, usuarios.nombre , videojuegos.nombre , alquileres.fechaDevolucion , valoraciones.valoracion , videojuegos.imagen 
    FROM alquileres, valoraciones , videojuegos, usuarios
    WHERE alquileres.id_usuario = $idUsuario
    AND alquileres.id_videojuego = videojuegos.id
    AND valoraciones.id_alquiler = alquileres.id
    AND usuarios.id = alquileres.id_usuario  ORDER BY alquileres.id DESC";

    //realizar la consulta
    $registrosAlquilerDelUsuario = $cnx->myQueryMultiple($sentanciaQuery, false);


    echo "<table> 
    <tr>
    <th>FECHA DEVOLUCIÓN</th> 
    <th>IMG</th> 
    <th>VIDEOJUEGO</th>
    <th>VALORACIÓN</th> 
    </tr>";

    foreach ($registrosAlquilerDelUsuario as $key => $value) {
     echo "<tr>" .
     // "<td>" . $registrosAlquilerDelUsuario[$key][0] . "</td>" .
     // "<td>" . $registrosAlquilerDelUsuario[$key][1] . "</td>" .
     "<td>" . $registrosAlquilerDelUsuario[$key][3] . "</td>" .
     "<td><img class='redondeado' src='" . $registrosAlquilerDelUsuario[$key][5] . "'></td>" .
     "<td>" . $registrosAlquilerDelUsuario[$key][2] . "</td>" .
     "<td>" . $registrosAlquilerDelUsuario[$key][4] . "</td>" .
     "</tr>";
    }
    echo "</table>";
    }

   } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
   }

   require("./html_modules/footer.php");


  ?>

</body>

</html>