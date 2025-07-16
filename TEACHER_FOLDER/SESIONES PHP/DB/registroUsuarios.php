<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Marcos Lambir Torres" />
    <meta name="description" content="JavaScript" />
    <meta name="keywords" content="Curso, Formación, Examen" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
    <title>Curso ASATA - MYSQL</title>
  </head>

  <body>

    <h1>FORMULARIO</h1>

    <form action="registroUsuarios.php" method="post" >

      <label for="nombre">NOMBRE</label>
      <input type="text" name="nombre" id="nombre" />

      <label for="apellido1">APELLIDO 1</label>
      <input type="text" name="apellido1" id="appellido1" />

      <label for="apellido2">APELLIDO 2</label>
      <input type="text" name="apellido2" id="apellido2" />

      <label for="dni">DNI</label>
      <input type="text" name="dni" id="dni" />

      <label for="fecha_nacimiento">FECHA DE NACIMIENTO</label>
      <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" />

      <label for="correo_electronico">CORREO ELECTRÓNICO</label>
      <input type="email" name="correo_electronico" id="correo_electronico" />

      <label for="direccion">DIRECCIÓN</label>
      <input type="text" name="direccion" id="direccion" />

      <label for="telefono">TELÉFONO</label>
      <input type="text" name="telefono" id="telefono" />

      <input type="submit" name="submit" id="submit" value="send" />
    </form>
  </body>
</html>


<?php

require_once("../CLASES/bd.php");
use Database\Db as Db;



if( 
  isset($_REQUEST['nombre']) && 
  isset($_REQUEST['apellido1']) &&   
  isset($_REQUEST['apellido2']) &&   
  isset($_REQUEST['dni']) &&   
  isset($_REQUEST['correo_electronico']) &&   
  isset($_REQUEST['fecha_nacimiento']) &&   
  isset($_REQUEST['telefono']) &&   
  isset($_REQUEST['direccion']) &&
  isset($_REQUEST['submit'])
  ){

    $micnx = new Db("localhost","root","","mitienda");


    $regNombre = $_REQUEST['nombre'];
    $regApellido1 = $_REQUEST['apellido1'];
    $regApellido2 = $_REQUEST['apellido2'];
    $regDNI = $_REQUEST['dni'];

    $regFechaNac = $_REQUEST['fecha_nacimiento'];
    $regEmail = $_REQUEST['correo_electronico'];
    $regDireccion = $_REQUEST['direccion'];
    $regTelefono = $_REQUEST['telefono'];


    $sentenciaSQL = "INSERT INTO clientes (`nombre`, `apellido1`, `apellido2`, `dni`, `fecha_nacimiento` , `correo_electronico`, `direccion`, `telefono`) VALUES ( '$regNombre','$regApellido1','$regApellido2','$regDNI', '$regFechaNac','$regEmail','$regDireccion','$regTelefono')";

    $micnx->execute($sentenciaSQL);

    header("Location: registroUsuarios.php");

  }






?>