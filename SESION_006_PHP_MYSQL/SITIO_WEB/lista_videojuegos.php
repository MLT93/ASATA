<!DOCTYPE html>
<html>

<head>
  <meta charset="utf8" />
  <meta name="author" content="DMA" />
  <meta name="description" content="LISTA VIDEOJUEGOS" />
  <meta name="keywords" content="cursos, formación, desarrollo software" />
  <title>LISTA VIDEOJUEGOS</title>
  <link rel="stylesheet" href="./css/estilos.css">

  <!-- Estas 4 etiquetas 'meta' evitan que se guarden en la memoria Caché los archivos JS y CSS. De este modo nos aseguramos que al realizar cambios, los busque y actualice la información -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
</head>


<body>

  <?php
  // Activar almacenamiento en el búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script
  // Permite modificar las cabeceras en cualquier momento
  ob_start();

  // Inicio una sesión para poder trabajar con la información de la super-variable `$_SESSION` correspondiente al captcha
  // Inicio una sesión. Siempre iniciar una sesión en las páginas que reciben o manejan información del usuario
  // session_start(); //=> Aquí no hace falta iniciar la sesión porque es una página pública y no hay que comprobar si hay una variable de sesión y un JWT con la info del usuario

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

  // Conexión a la base de datos
  $cnx = new BD("localhost", "root", "", "gameclubdario");

  // Creo las sentencias SQL y uso un LEFT JOIN para que me devuelva todos los registros de la tabla videojuegos para que me devuelva el mismo número de registros en todas las consultas (aunque estén vacíos). De esta forma evito errores
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
  echo "<tr>   <th>ID</th>   <th>Nombre</th>   <th>Descripción</th>   <th>Fecha Publicación</th>   <th>ISO</th>   <th>Género</th>   <th>Desarrolladores</th>   <th>Plataforma</th>   <th>PEGI</th>   </tr>";

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

  require("./html_modules/footer.php");
  ?>

</body>

</html>
