<?php
class Table
{
  // `PROPIEDADES` o variables de la class. Normalmente son siempre `protected` o `private`
  protected $rows;
  protected $cols;
  protected $titles; // Array
  protected $matrixData; // Matriz
  protected $creationDate;

  /**
   * Summary of __construct
   * @param int $rows 5
   * @param int $cols 3
   * @param array $titles ["title1, title2, title3]
   * @param array $data ["1", "Pedro", "Martinez", "Lopez", "Perú", 22]
   * @param string $creationDate 20 May 1993 | now
   * 
   */
  function __construct(int $rows, int $cols, array $titles, array $data, string $creationDate)
  {
    $this->rows = $rows;
    $this->cols = $cols;
    $this->titles = $titles;
    $this->matrixData = array($data);
    $this->creationDate = strtotime($creationDate); // timestamp
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase)
  public function setRows(int $newRows)
  {
    $this->rows = $newRows;
  }

  public function setCols(int $newCols)
  {
    $this->cols = $newCols;
  }

  public function setTitles(array $newTitles)
  {
    $this->titles = array($newTitles);
  }

  public function setData(array $newData)
  {
    $this->matrixData = array($newData);
  }

  public function setCreationDate(string $newCreationDate)
  {
    $this->creationDate = strtotime($newCreationDate);
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class)
  public function getRows()
  {
    return $this->rows;
  }

  public function getCols()
  {
    return $this->cols;
  }

  public function getTitles()
  {
    return $this->titles;
  }

  public function getData()
  {
    return $this->matrixData;
  }

  public function getCreationDate()
  {
    $formattedDate = date("d-m-y  H:i:s", intval(strtotime($this->creationDate)));
    return $formattedDate;
  }

  // `MÉTODOS` de la class (utilizan los setters y getters para acceder a la información)
  function table()
  {
    echo "<table border=1 cellspacing=0>";
    // Creo tantas filas como el número de $rows
    for ($i = 0; $i < $this->getRows(); $i++) {
      echo "<tr>";
      $indexRow = Table::twoDigit($i);
      // Recorrer el número que le paso en $cols para obtener el contenido
      for ($j = 0; $j < $this->getCols(); $j++) {
        $indexCol = Table::twoDigit($j);
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
  }

  function tableWithTitlesAndMatrixData()
  {
    echo "
    <table border=1 cellspacing=0>";
    // Necesito una sola fila para todos los títulos
    echo
    "<tr>";
    // Creo títulos
    for ($i = 0; $i < count($this->titles); $i++) {
      echo "<th>" . $this->titles[$i] . "</th>";
    }
    echo "</tr>";
    // Contenido
    Table::contentTableData($this->getData());
    echo "</table>";
  }

  // `MÉTODOS ESTÁTICOS`
  public static function twoDigit(int $num)
  {
    if (!is_nan($num)) {
      $msg = "";

      $num < 10 ? $msg = "0$num" : $msg = "$num";

      return $msg;
    } else {
      echo "Tiene que escribir un número";
    }
  }

  public function contentTableData($matrix)
  {
    // Itero el primer array de la Matriz para generar las filas
    for ($i = 0; $i < count($matrix); $i++) {
      echo "<tr>";
      // Itero los demás arrays para generar el contenido
      for ($j = 0; $j < count($matrix[$i]); $j++) {
        echo "<td>" . $matrix[$i][$j] . "</td>";
      }
      echo "</tr>";
    }
  }
}

$miTabla = new Table(10,6, [], []);
