<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>SUBIR ARCHIVOS</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">  
</head>

<body>
<header></header>

<h1>Formulario solicitud</h1>

<form action="registro.php" method="post" enctype="multipart/form-data">

<label for="usuario" >USUARIO</label>
<input type="text" name="usuario">

<label for="prioridad" >PRIORIDAD</label>
<input type="radio" name="prioridad" value="Alta" checked/>Alta
<input type="radio" name="prioridad" value="Media"/>Media
<input type="radio" name="prioridad" value="Baja"/>Baja

<br/>

<label for="archivo" ></label>
<input type="file" name="archivo">

<input type="submit" name="enviar" value="Enviar">

</form>

<a href="log_registro.php">VER REGISTROS</a>

</body>


</html>