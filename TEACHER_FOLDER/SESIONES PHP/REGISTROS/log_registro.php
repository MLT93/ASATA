<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>LOG REGISTRO</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">  
</head>

<body>
<header></header>

<h1>REGISTRO</h1>

<?php

$fichero = fopen("registros.txt","r");
while( !feof($fichero)  ){

    $linea=fgets($fichero);
    echo $linea."</br>";

}

fclose($fichero);


?>

</body>
</html>

