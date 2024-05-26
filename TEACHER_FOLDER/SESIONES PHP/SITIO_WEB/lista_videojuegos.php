<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
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
  use UserDB\Usuario;

  $cnx = new Db("localhost","root","","gameclub");

  //creamos una sentencia SQL para hacer la consulta a mi base de datos

    $sqlQuery = "SELECT * FROM videojuegos ORDER BY videojuegos.id DESC" ;
    $sqlQueryVideojuegosDesarrolladores = "SELECT desarrolladores.nombre FROM videojuegos LEFT JOIN desarrolladores ON videojuegos.id_desarrollador = desarrolladores.id ORDER BY videojuegos.id DESC" ;
    $sqlQueryVideojuegosPlataformas = "SELECT plataformas.nombre FROM videojuegos LEFT JOIN plataformas ON videojuegos.id_plataforma = plataformas.id ORDER BY videojuegos.id DESC" ;
    $sqlQueryVideojuegosGeneros = "SELECT generos.nombre FROM videojuegos LEFT JOIN generos ON videojuegos.id_genero = generos.id ORDER BY videojuegos.id DESC" ;
    $sqlQueryVideojuegosPegui = "SELECT pegui.pegui FROM videojuegos LEFT JOIN pegui ON videojuegos.id_pegui = pegui.id ORDER BY videojuegos.id DESC" ;

  //recibo la informacion en la matriz registrs VIdeojuegos
  $registrosVideojuegos                = $cnx->myQueryMultiple($sqlQuery, false);
  $registrosVideojuegosDesarrolladores = $cnx->myQueryMultiple($sqlQueryVideojuegosDesarrolladores, true);
  $registrosVideojuegosPlataformas     = $cnx->myQueryMultiple($sqlQueryVideojuegosPlataformas, true);
  $registrosVideojuegosGeneros         = $cnx->myQueryMultiple($sqlQueryVideojuegosGeneros, true);
  $registrosVideojuegosPegui           = $cnx->myQueryMultiple($sqlQueryVideojuegosPegui, true);
  
  $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
  if($infoUsuario['id_rol'] == 1){
   echo"<div class='btn' id='addVideojuego'><a href='./reg_videojuego.php'>AÑADIR VIDEOJUEGO<a></div>";
  }
  echo "<table> 
  <tr>";
  $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
  if($infoUsuario['id_rol']==1){
    echo "<th>🔄</th>";
  }
  echo "<th>IMG</th> <th>NOMBRE</th> <th>DESCRIPCIÓN</th> <th>PUBLICACIÓN</th> 
  <th>DESARROLLADOR</th> <th>PLATAFORMA</th> <th>GÉNERO</th> <th>PEGUI</th> 
  </tr>";
  foreach($registrosVideojuegos as $key => $value){
    echo "<tr>";
    if($infoUsuario['id_rol']==1){
      echo "<td>
      <form id='update_videojuego' action='actual_videojuego.php' method='post' >
      <input type='hidden' id='videojuegoId' name='videojuegoId' value='".$value[0]."' />
      <input type='hidden' id='videojuegoName' name='videojuegoName' value='".$value[1]."'/>
      <input type='hidden' id='videojuegoDescripcion' name='videojuegoDescripcion' value='".$value[2]."'/>
      <input type='hidden' id='genero' name='genero' value='".$value[3]."'/>
      <input type='hidden' id='desarrollador' name='desarrollador' value='".$value[4]."'/>
      <input type='hidden' id='plataforma' name='plataforma' value='".$value[5]."'/>
      <input type='hidden' id='pegui' name='pegui' value='".$value[6]."'/>
      <input type='hidden' id='fechaPub' name='fechaPub' value='".$value[7]."'/>
      <input type='hidden' id='isocode' name='isocode' value='".$value[8]."'/>
      <input id='update_videojuego' type='submit' name='actualizarVideojuego' value='ACTUALIZAR'>
      </form>
      </td>";
    }
    echo "<td><img  class='redondeado' src='".$value[9]."'></td>".
    "<td>".$value[1]."</td>".
    "<td>".$value[2]."</td>".
    "<td>".$value[7]."</td>".
    // "<td>".$value[8]."</td>".
    "<td>".$registrosVideojuegosDesarrolladores[$key]['nombre']."</td>".
    "<td>".$registrosVideojuegosPlataformas[$key]['nombre']."</td>".
    "<td>".$registrosVideojuegosGeneros[$key]['nombre']."</td>".
    "<td>".$registrosVideojuegosPegui[$key]['pegui']."</td>".
    "</tr>";
  }
  echo "</table>";



  require("./html_modules/footer.php");
 ?>

</body>
</html>