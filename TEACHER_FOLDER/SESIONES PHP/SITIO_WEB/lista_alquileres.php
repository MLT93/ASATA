<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA ALQUILERES</title>
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

  require_once("./functions/authentication.php");

  require_once("../vendor/autoload.php");


  use Database\Db as Db;
  use UserDB\Usuario;


  //ESTAS 2 lineas permiten extraer las variables de entorno del archivo .env
  $dotenv = Dotenv\Dotenv::createImmutable("./"); // Busco el directorio del archivo `.env`
  $dotenv->load();


  //comprueba si la cookie con el token existe
  if (isset($_COOKIE['jwt'])) {

    //compruebos si tengo credenciales de acceso en el token y coincide con la variable de sesion
    if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {

      $cnx = new Db("localhost", "root", "", "gameclub");
      $id = Usuario::mostrarIdUsuario($_SESSION['usuario']);

      //creamos una sentencia SQL para hacer la consulta a mi base de datos

      $sqlQuery = "SELECT * FROM alquileres WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC";

      $sqlQueryAlquileresClientes = "SELECT usuarios.nombre, usuarios.apellido1, usuarios.apellido2 FROM alquileres LEFT JOIN usuarios ON alquileres.id_usuario = usuarios.id WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC";

      $sqlQueryAlquileresVideojuegos = "SELECT videojuegos.nombre, videojuegos.imagen FROM alquileres LEFT JOIN videojuegos ON alquileres.id_videojuego = videojuegos.id WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC";

      // $sqlQueryAlquileresTarifas = "SELECT tarifas.tipo FROM videojuegos LEFT JOIN tarifas ON videojuegos.id_tarifas = tarifas.id WHERE videojuegos.id_usuario = $id ORDER BY videojuegos.id DESC" ;

      $sqlQueryAlquileresEmpleados = "SELECT empleados.nombre, empleados.apellido1, empleados.apellido2 FROM alquileres LEFT JOIN empleados ON alquileres.id_empleado = empleados.id WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC";

      $sqlQueryAlquileresMetodoPago = "SELECT metodospago.metodo FROM alquileres LEFT JOIN metodospago ON alquileres.id_metodoPago = metodospago.id WHERE alquileres.id_usuario = $id ORDER BY alquileres.id DESC";


      $registrosAlquileres = $cnx->myQueryMultiple($sqlQuery, false);
      $registrosAlquileresClientes = $cnx->myQueryMultiple($sqlQueryAlquileresClientes, true);
      $registrosAlquileresVideojuegos = $cnx->myQueryMultiple($sqlQueryAlquileresVideojuegos, true);
      // $registrosAlquileresTarifas = $cnx->myQueryMultiple($sqlQueryAlquileresTarifas, true);
      $registrosAlquileresEmpleados = $cnx->myQueryMultiple($sqlQueryAlquileresEmpleados, true);
      $registrosAlquileresMetodoPago = $cnx->myQueryMultiple($sqlQueryAlquileresMetodoPago, true);


      echo "<div class='container_separator'>";
      echo "<table> 
    <tr>
    <th>FECHA ALQUILER</th> 
    <th>FECHA DEVOLUCIÓN</th> 

    <th>MÉTODO PAGO</th> 
    <th>IMG</th> 
    <th>VIDEOJUEGO</th> 
    <th>VENDEDOR</th> 
    </tr>";
      foreach ($registrosAlquileres as $key => $value) {
        echo "<tr>" .
          // "<td>".$value[0]."</td>".//id
          "<td>" . $value[1] . "</td>" . //fecha alquiler
          "<td>" . $value[4] . "</td>" .
          // "<td>".$registrosAlquileresClientes[$key]['nombre']." ".$registrosAlquileresClientes[$key]['apellido1']." ".$registrosAlquileresClientes[$key]['apellido2']." "."</td>".
          // "<td>".$registrosAlquileresTarifas[$key]['tipo']."</td>".
          "<td>" . $registrosAlquileresMetodoPago[$key]['metodo'] . "</td>" .
          "<td><img class ='redondeado' src='" . $registrosAlquileresVideojuegos[$key]['imagen'] . "'></td>" .
          "<td>" . $registrosAlquileresVideojuegos[$key]['nombre'] . "</td>" .
          "<td>" . $registrosAlquileresEmpleados[$key]['nombre'] . " " . $registrosAlquileresEmpleados[$key]['apellido1'] . " " . $registrosAlquileresEmpleados[$key]['apellido2'] . " " . "</td>" .
          "</tr>";
      }
      echo "</table>";
      echo "</div>";
    }
  } else {
    http_response_code(401); //No autorizado.
    echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";
    echo "<br/>";
  }


  require("./html_modules/footer.php");
  ?>

</body>

</html>
