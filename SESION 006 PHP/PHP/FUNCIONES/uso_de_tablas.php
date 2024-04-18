<?php

include("./crear_tablas.php");

table(6, 10);

echo "<hr/>";

$titles = [
  "id",
  "nombre",
  "apellido 1",
  "apellido 2",
  "país",
  "edad",
];


tablaWithTitles($titles, 20);

echo "<hr/>";
