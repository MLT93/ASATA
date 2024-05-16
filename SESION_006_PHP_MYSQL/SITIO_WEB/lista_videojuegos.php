<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LOGIN " />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>HOME</title>
  <link href="./css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

  <?php
  // Activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. Permite hacer `require` después de cargar la página
  ob_start();
  // Inicio una sesión
  session_start();

  // Cabecera y nav
  require_once("./html_modules/header.php");
  require_once("./html_modules/nav.php");

  // Añado el archivo de la base de datos
  require_once("./classes/BaseDatos.php");

  // Llamo a la clase usuario
  // Primer  elemento es el namespace
  // Segundo elemento es la clase 
  // Tercer  elemento el pseudonimo de la clase
  use BaseDatos\BaseDatos as BD;

  // Creo las sentencias SQL y uso un LEFT JOIN para que me devuelva todos los registros de la tabla videojuegos para que me devuelva el mismo número de registros en todas las consultas (aunque estén vacíos). De esta forma evito errores
  $cnx = new BD("localhost", "root", "", "gameclubdario");
  $sqlQuery = "SELECT * FROM videojuegos ORDER BY videojuegos.id";
  $sqlQueryVideojuegosDesarrollador = "SELECT desarrolladores.nombre FROM videojuegos LEFT JOIN desarrolladores ON videojuegos.id_desarrollador = desarrolladores.id ORDER BY videojuegos.id";
  $sqlQueryVideojuegosPlataforma = "SELECT plataformas.nombre FROM videojuegos LEFT JOIN plataformas ON videojuegos.id_plataforma = plataformas.id ORDER BY videojuegos.id";
  $sqlQueryVideojuegosGenero = "SELECT genero.nombre FROM videojuegos LEFT JOIN genero ON videojuegos.id_genero = genero.id ORDER BY videojuegos.id";
  $sqlQueryVideojuegosPegui = "SELECT pegui.pegui FROM videojuegos LEFT JOIN pegui ON videojuegos.id_pegui = pegui.id ORDER BY videojuegos.id";

  // Creo array
  $registrosVideoJuegos = $cnx->myQueryMultiple($sqlQuery, false); //=> Devuelve un array con índices
  // Creo una matrices de registros
  $registrosVideoJuegosDesarrolladores = $cnx->myQueryMultiple($sqlQueryVideojuegosDesarrollador); //=> Devuelve una matriz asociativa
  $registrosVideoJuegosPlataformas = $cnx->myQueryMultiple($sqlQueryVideojuegosPlataforma); //=> Devuelve una matriz asociativa
  $registrosVideoJuegosGeneros = $cnx->myQueryMultiple($sqlQueryVideojuegosGenero); //=> Devuelve una matriz asociativa
  $registrosVideoJuegosPeguis = $cnx->myQueryMultiple($sqlQueryVideojuegosPegui); //=> Devuelve una matriz asociativa

  /* 
    <table> (esta será una parte fija)
      <tr>   <th></th>   <th></th>   <th></th>   </tr> (esta será una parte fija)

      <tr>   <td></td>   <td></td>   <td></td>   </tr>
      <tr>   <td></td>   <td></td>   <td></td>   </tr>
      <tr>   <td></td>   <td></td>   <td></td>   </tr>
      <tr>   <td></td>   <td></td>   <td></td>   </tr>

    </table> (esta será una parte fija)
  */

  echo "<table>";
  echo "<tr>   <th>id</th>   <th>nombre</th>   <th>descripcion</th>   <th>fechaPublicacion</th>   <th>isoCode</th>   <th>genero</th>   <th>desarrolladores</th>   <th>plataforma</th>   <th>pegui</th>   </tr>";

  foreach ($registrosVideoJuegos as $key => $value) {
    echo "<tr>" .
     "<td>" . $value[0] . "</td>" . 
     "<td>" . $value[1] . "</td>" . 
     "<td>" . $value[2] . "</td>" . 
     "<td>" . $value[7] . "</td>" . 
     "<td>" . $value[8] . "</td>" . 
     "<td>" . $registrosVideoJuegosDesarrolladores[$key]['nombre'] . "</td>" . 
     "<td>" . $registrosVideoJuegosPlataformas[$key]['nombre'] . "</td>" . 
     "<td>" . $registrosVideoJuegosGeneros[$key]['nombre'] . "</td>" . 
     "<td>" . $registrosVideoJuegosPeguis[$key]['pegui'] . "</td>" . 
     "</tr>";
  }

  echo "</table>";

  // require("./html_modules/footer.php");
  ?>

</body>

</html>
