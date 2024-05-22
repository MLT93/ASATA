<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA VIDEOJUEGOS</title>
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

  use Database\Db as Db;
  use UserDB\Usuario as Usuario;

  $cnx = new Db("localhost", "root", "", "gameclubdario");

  //creamos una sentencia SQL para hacer la consulta a mi base de datos

  $sqlQuery = "SELECT * FROM videojuegos ORDER BY videojuegos.id DESC";
  $sqlQueryVideojuegosDesarrolladores = "SELECT desarrolladores.nombre FROM videojuegos LEFT JOIN desarrolladores ON videojuegos.id_desarrollador = desarrolladores.id ORDER BY videojuegos.id DESC";
  $sqlQueryVideojuegosPlataformas = "SELECT plataformas.nombre FROM videojuegos LEFT JOIN plataformas ON videojuegos.id_plataforma = plataformas.id ORDER BY videojuegos.id DESC";
  $sqlQueryVideojuegosGeneros = "SELECT generos.nombre FROM videojuegos LEFT JOIN generos ON videojuegos.id_genero = generos.id ORDER BY videojuegos.id DESC";
  $sqlQueryVideojuegosPegui = "SELECT pegui.pegui FROM videojuegos LEFT JOIN pegui ON videojuegos.id_pegui = pegui.id ORDER BY videojuegos.id DESC";

  //recibo la información en la matriz registros Videojuegos
  $registrosVideojuegos                = $cnx->myQueryMultiple($sqlQuery, false);
  $registrosVideojuegosDesarrolladores = $cnx->myQueryMultiple($sqlQueryVideojuegosDesarrolladores, true);
  $registrosVideojuegosPlataformas     = $cnx->myQueryMultiple($sqlQueryVideojuegosPlataformas, true);
  $registrosVideojuegosGeneros         = $cnx->myQueryMultiple($sqlQueryVideojuegosGeneros, true);
  $registrosVideojuegosPegui           = $cnx->myQueryMultiple($sqlQueryVideojuegosPegui, true);

  echo "<table> 
  <tr>";

  // Si es admin, puede cambiar los videojuegos
  $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
  if ($infoUsuario['id_rol'] == 1) {
    echo "<th>🔄</th>";
  }

  echo "<th>IMG</th> <th>NOMBRE</th> <th>DESCRIPCIÓN</th> <th>PUBLICACIÓN</th> 
  <th>DESARROLLADOR</th> <th>PLATAFORMA</th> <th>GÉNERO</th> <th>PEGI</th> 
  </tr>";
  foreach ($registrosVideojuegos as $key => $value) {
    echo "<tr>";

    // Si es admin, puede cambiar los videojuegos
    if ($infoUsuario['id_rol'] == 1) {
      echo "<td>
      " . /* PARTE 1: Este formulario es auxiliar. Envía todo a `actual_videojuego` pero se procesa en `form_updateVideojuego` porque este último archivo se carga en `actual_videojuego`, por lo tanto recibe toda esta información.
      Se procesa la info de la base de datos, además de la imagen que carga el cliente */ "
      <form id='update_videojuego' action='actual_videojuego.php' method='post'>
      <input type='hidden' id='videojuegoId' name='videojuegoId' value='" . $value[0] . "' />
      <input type='hidden' id='videojuegoName' name='videojuegoName' value='" . $value[1] . "' />
      <input type='hidden' id='videojuegoDescripcion' name='videojuegoDescripcion' value='" . $value[2] . "' />
      <input type='hidden' id='videojuegoGenero' name='videojuegoGenero' value='" . $value[3] . "' />
      <input type='hidden' id='videojuegoDesarrollador' name='videojuegoDesarrollador' value='" . $value[4] . "' />
      <input type='hidden' id='videojuegoPlataforma' name='videojuegoPlataforma' value='" . $value[5] . "' />
      <input type='hidden' id='videojuegoPegui' name='videojuegoPegui' value='" . $value[6] . "' />
      <input type='hidden' id='videojuegoFechaPub' name='videojuegoFechaPub' value='" . $value[7] . "' />
      <input type='hidden' id='videojuegoIsoCode' name='videojuegoIsoCode' value='" . $value[8] . "' />
    <br/>
    <input type='submit' id='update_videojuego' name='actualizarVideojuego' value='ACTUALIZAR' />
    </form>
    </td>";
    }

    echo "<td><img  class='redondeado' src='" . $value[9] . "'></td>" .
      "<td>" . $value[1] . "</td>" .
      "<td>" . $value[2] . "</td>" .
      "<td>" . $value[7] . "</td>" .
      // "<td>".$value[8]."</td>".
      "<td>" . $registrosVideojuegosDesarrolladores[$key]['nombre'] . "</td>" .
      "<td>" . $registrosVideojuegosPlataformas[$key]['nombre'] . "</td>" .
      "<td>" . $registrosVideojuegosGeneros[$key]['nombre'] . "</td>" .
      "<td>" . $registrosVideojuegosPegui[$key]['pegui'] . "</td>" .
      "</tr>";
  }
  echo "</table>";



  require("./html_modules/footer.php");
  ?>

</body>

</html>
