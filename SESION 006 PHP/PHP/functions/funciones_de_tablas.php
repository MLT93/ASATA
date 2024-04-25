<?php

// ? CREAR UNA FUNCIÓN QUE PERMITE CREAR TABLAS HTML

include("funciones_de_fechas.php");

function table($rows, $cols)
{
  echo "<table border=1 cellspacing=0>";
  // Creo tantas filas como el número de $rows
  for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    $indexRow = twoDigit($i);
    // Recorrer el número que le paso en $cols para obtener el contenido
    for ($j = 0; $j < $cols; $j++) {
      $indexCol = twoDigit($j);
      echo "
      <td>
        Fila $indexRow
        <br/>
        Columna $indexCol
      </td>";
    }
    echo "</tr>";
  }
  echo "</table>";
};

function contentTable($rows, $cols)
{
  // Filas
  for ($i = 0; $i < $rows; $i++) {
    echo "<tr>";
    $indexRow = twoDigit($i);
    // Contenido
    for ($j = 0; $j < $cols; $j++) {
      $indexCol = twoDigit($j);
      echo "
      <td>
        Fila $indexRow
        <br/>
        Columna $indexCol
      </td>";
    }
    echo "</tr>";
  }
};

function tablaWithTitles($arrTitles, $numRegisters)
{
  echo "<table border=1 cellspacing=0>";
  echo "<tr>";
  // Creo tantas celdas como títulos en el array
  for ($i = 0; $i < count($arrTitles); $i++) {
    echo "<th>" . $arrTitles[$i] . "</th>";
  }
  echo "</tr>";
  // Contenido
  contentTable($numRegisters, count($arrTitles));
  echo "</table>";
}

function tablaMultiplicarHastaDiez()
{
  echo "<table border=1 cellspacing=1>";
  echo "<tr>";
  // Creo los títulos de las filas
  for ($i = 0; $i <= 10; $i++) {

    if ($i !== 0) {
      // No pinto el 0
      echo "<th>" . $i . "</th>";
    } else {
      // Dibuja el primer título vacío
      echo "<th></th>";
    }
  }
  echo "</tr>";
  // Creo 10 filas
  for ($i = 1; $i <= 10; $i++) {
    echo "<tr>";
    // Creo hasta 10 columnas para pintar el contenido
    for ($j = 0; $j <= 10; $j++) {

      $multiplication = $i * $j;

      // No pinto el 0
      if ($j !== 0) {
        // Pinto las celdas
        echo "<td>" . $multiplication . "</td>";
      } else {
        // Dibuja los títulos de las filas
        echo "<td class='row-titles'>" . $i . "</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
};

function tableWithTitlesAndMatrixData($arrTitles, $matrixData)
{
  echo "
  <table border=1 cellspacing=0>";
  // Necesito una sola fila para todos los títulos
  echo
  "<tr>";
  // Creo títulos
  for ($i = 0; $i < count($arrTitles); $i++) {
    echo "<th>" . $arrTitles[$i] . "</th>";
  }
  echo "</tr>";
  // Contenido
  contentTableData($matrixData);
  echo "</table>";
};

function contentTableData($matrix)
{
  // Itero el primer array de la Matriz para generar las filas
  for ($rows = 0; $rows < count($matrix); $rows++) {
    echo "<tr>";
    // Itero los demás arrays para generar el contenido
    for ($cols = 0; $cols < count($matrix[$rows]); $cols++) {
      echo "<td>" . $matrix[$rows][$cols] . "</td>";
    }
    echo "</tr>";
  }
};
