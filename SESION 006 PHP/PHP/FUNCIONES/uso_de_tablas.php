<?php

include("../FUNCIONES/crear_tablas.php");

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
$data = [
  ["1", "Pedro", "Martinez", "Lopez", "Perú", 22],
  ["2", "Ana", "Pérez", "Lopez", "Uganda", 33],
  ["3", "María", "Fernandez", "Lopez", "Chile", 23],
  ["4", "Lucía", "Clementina", "Del Nido", "España", 45],
];

tableWithTitlesAndMatrixData($titles, $data);

echo "<hr/>";
