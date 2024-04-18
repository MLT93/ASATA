<?php

// ? CREAR UNA FUNCIÓN QUE PERMITE CREAR TABLAS HTML

include("./fechas.php");

function table($rows, $cols)
{
  echo "
  <table border=1 cellspacing=0>";
  // Creo tantas filas como el número de $rows
  for ($i = 0; $i < $rows; $i++) {
    echo "
    <tr>";
    $indexRow = twoDigit($i);
    // Recorrer el número de columnas que le paso en $cols
    for ($j = 0; $j < $cols; $j++) {
      $indexCol = twoDigit($j);
      echo "
      <td>
        Fila $indexRow
        <br/>
        Columna $indexCol
      </td>";
    }
    echo "
    </tr>";
  }
  echo "
  </table>";
};

function registerTable($rows, $cols)
{
  for ($i = 0; $i < $rows; $i++) {
    echo "
    <tr>";
    $indexRow = twoDigit($i);
    for ($j = 0; $j < $cols; $j++) {
      $indexCol = twoDigit($j);
      echo "
      <td>
        Fila $indexRow
        <br/>
        Columna $indexCol
      </td>";
    }
    echo "
    </tr>";
  }
};

function tablaWithTitles($arrTitles, $numRegisters)
{
  echo "
  <table border=1 cellspacing=0>";
  echo "
    <tr>";
  // Creo tantas celdas como títulos en el array
  for ($i = 0; $i < count($arrTitles); $i++) {
    echo "
      <th>
        $arrTitles[$i]
      </th>";
  }
  echo "
    </tr>";
  registerTable($numRegisters, count($arrTitles));
  echo "
  </table>
  ";
}
