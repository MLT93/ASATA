<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="ejercicio_form.php" method="post" target="_self">

    <label for="nameID">User</label>
    <input type="text" id="nameID" name="name">

    <label for="mailID">Email</label>
    <input type="email" id="mailID" name="mail">

    <label for="passwordID">Password</label>
    <input type="password" id="passwordID" name="pass">

    <button type="submit">Enviar</button>
  </form>

  <?php

  if (isset($_REQUEST["name"]) && isset($_REQUEST["mail"]) && isset($_REQUEST["pass"])) {
    // Borro
    unset($num, $name, $email, $password);
    // Veo la información del formulario
    echo "<br/>";
    echo "<p><strong>Información general del formulario: </strong></p>";
    var_dump($_REQUEST);
    echo "<hr/>";
    // Escribo
    $name = $_REQUEST["name"];
    $email = $_REQUEST["mail"];
    $password = $_REQUEST["pass"];

    // ? DETERMINADA UNA BASE DE DATOS, SI LOS USUARIOS SON CORRECTOS DALE ACCESO

    $usuarios = [
      ["Pedro", "pedro@example.com", "1233"],
      ["Juan", "jun.alv@example.com", "2345"],
      ["Antonio", "anto@example.com", "5762"],
      ["Norberto", "norbe@example.com", "2346"],
      ["Miguel", "miguel@example.com", "7894"],
    ];

    // ! ATENCIÓN 
    // * SI LE DECIMOS AL ÍNDICE (QUE COMIENZA EN EL NÚMERO 0) QUE VAYA EXACTAMENTE HASTA EL NÚMERO 5 (LA CANTIDAD DE ELEMENTOS DENTRO DEL ARRAY), NO LO ENCONTRARÁ Y NOS DARÁ ERROR
    // * ESTO OCURRE PORQUE "$i" EMPIEZA A CONTAR DESDE EL NÚMERO 0 HASTA EL FINAL DEL ARRAY, QUE SEGÚN "$i" VALE 4 (PORQUE TODO ARRAY EMPIEZA A CONTAR DESDE EL 0)
    // * ENTONCES, SI LE DECIMOS QUE CUENTE HASTA 5 UTILIZANDO EL OPERADOR "<=", OBTENDREMOS UN ERROR PORQUE TRATARÁ DE IGUALAR SIEMPRE EL VALOR

    echo "<h4>Forma incorrecta en cuanto al orden de ingreso en los INPUTS</h4>";

    // `count()` sirve para contar la cantidad de elementos dentro de un objeto iterable. Como `length` en JavaScript
    for ($i = 0; $i < (count($usuarios)); $i++) {
      // Esta forma no es válida porque no identifica el orden de los "inputs"
      if (in_array($name, $usuarios[$i]) && in_array($password, $usuarios[$i]) || in_array($email, $usuarios[$i]) && in_array($password, $usuarios[$i])) {
        echo "<p>Index: $i | <strong>201 - Se ha encontrado el usuario</strong></p>";
      } else {
        echo "<p> Index: $i | 404 - Not Found</p>";
      }
    }

    echo "<h4>Forma Correcta en cuanto al orden de ingreso en los INPUTS</h4>";

    // `count()` sirve para contar la cantidad de elementos dentro de un objeto iterable. Como `length` en JavaScript
    for ($i = 0; $i < (count($usuarios)); $i++) {
      // Esta forma es mejor porque identifica exactamente cada "input"
      if ($name === $usuarios[$i][0] && $password === $usuarios[$i][2] || $email === $usuarios[$i][1] && $password === $usuarios[$i][2]) {
        echo "<p>Index: $i | <strong>201 - Se ha encontrado el usuario</strong></p>";
      } else {
        echo "<p> Index: $i | 404 - Not Found</p>";
      }
    }
  }

  // * EJEMPLO
  $miArrayEjemplo = ["blanco", "azul", "negro"];
  // Función para buscar en un array: recibe dos parámetros. Lo que deseo buscar y el array donde buscarlo
  in_array("verde", $miArrayEjemplo); //=> 0
  ?>
</body>

</html>
