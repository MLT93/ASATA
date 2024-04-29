<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>

<body>
  <h1>RESPUESTA GET_POST</h1>

  <?php

  // Database

  /* ... */

  // Compruebo si las variables están definidas o no
  if (isset($_REQUEST["name"]) && isset($_REQUEST["password"]) && isset($_REQUEST["userType"])) {
    // Primero borro
    unset($user, $passwordUser, $userType);

    // Luego escribo
    // ? `$_REQUEST`
    // `$_REQUEST` devuelve un array con toda la info del formulario, por eso se identifican individualmente
    // Para obtener la información individualmente, se escribe el valor del atributo `name=""` del input HTML al que se desea acceder
    // Mezcla entre POST y GET
    $user = $_REQUEST["name"];
    $passwordUser = $_REQUEST["password"];
    $userType = $_REQUEST["userType"];

    // ? `$_POST`
    // `$_POST` es igual al antiguo `$_REQUEST` pero sin `$_GET`. No recibe esa información
    // Es más seguro y queda oculto al usuario
    $user2 = $_POST["name"];
    $userType2 = $_REQUEST["userType"];

    // ? `$_GET`
    // `$_GET` es el método que recibe información a través de las `Query Params`
    // Para crear una `Query Param` (variable en la URL) se utiliza un `?clave=valor` y para concatenar variables se usa `&`
    // Para recibir la variable debemos poner el nombre de la variable para obtener su valor
    $clave = $_GET["key"];
    $type = $_GET["type"];

    echo "201 - Correct!" . "<br/>";
    echo '$_REQUEST ' . "Hola $user. Eres un usuario de tipo $userType" . "<br/>";
    echo '$_POST ' . "Hola $user2. Eres un usuario de tipo $userType2" . "<br/>";
    echo '$_GET ' . "Hola $clave. Eres un usuario de tipo $type" . "<br/>";
  }

  ?>

</body>

</html>
