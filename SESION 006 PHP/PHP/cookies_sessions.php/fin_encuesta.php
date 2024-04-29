<?php

// Compruebo si las variables están definidas o no
if (isset($_REQUEST["name"]) && isset($_REQUEST["preg01"]) && isset($_REQUEST["preg02"]) && isset($_REQUEST["preg03"]) && isset($_REQUEST["preg04"]) && isset($_REQUEST["submit"])) {

  // Primero borro
  unset($name, $preg01, $preg02, $preg03, $preg04);

  // Luego escribo
  // ? `$_COOKIE`
  // `$_COOKIE` devuelve el valor que posee la cookie
  $name = $_REQUEST["name"];
  $preg01 = $_REQUEST["preg01"];
  $preg02 = $_REQUEST["preg02"];
  $preg03 = $_REQUEST["preg03"];
  $preg04 = $_REQUEST["preg04"];

  echo "<h3>RESPUESTAS</h3>";
  echo "$name ha respondido con:" . "<br/>";
  echo "Pregunta 1: $preg01" . "<br/>";
  echo "Pregunta 2: $preg02" . "<br/>";
  echo "Pregunta 3: $preg03" . "<br/>";
  echo "Pregunta 4: $preg04" . "<br/>";

  setcookie("name", $name, time() + 3600, "/");
  setcookie("preg01", $preg01, time() + 3600, "/");
  setcookie("preg02", $preg02, time() + 3600, "/");
  setcookie("preg03", $preg03, time() + 3600, "/");
  setcookie("preg04", $preg04, time() + 3600, "/");

  // Borro cookies dejando el parámetro 2 vacío y el parámetro 3 en negativo
  setcookie("name", "", time() - 1000, "/");
  setcookie("preg01", "", time() - 1000, "/");
  setcookie("preg02", "", time() - 1000, "/");
  setcookie("preg03", "", time() - 1000, "/");
  setcookie("preg04", "", time() - 1000, "/");
}
