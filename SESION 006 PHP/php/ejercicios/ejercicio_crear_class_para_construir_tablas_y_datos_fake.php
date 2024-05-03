<?php

namespace Table;

require_once("../../vendor/autoload.php");

use Faker\Factory;

$faker = Factory::create();

class Table
{
  // `PROPIEDADES` o variables de la class. Normalmente son siempre `private`
  private int $rows;
  private int $cols;
  private array $titles; // Array
  private array $matrixData; // Matriz
  private string $creationDate;

  /**
   * Summary of __construct
   * @param int $rows 5
   * @param int $cols 3
   * @param array $titles ["title1, title2, title3]
   * @param array $data ["1", "Pedro", "Martinez", "Lopez", "Perú", 22]
   * 
   */
  function __construct(int $rows, int $cols, array $titles, array $data)
  {
    $this->rows = $rows;
    $this->cols = $cols;
    $this->titles = $titles;
    $this->matrixData = $data;
    $this->creationDate = date("d-m-y_His", intval(strtotime("now")));
  }

  // `SETTERS` (transforma la información de una propiedad desde afuera de la clase). Normalmente son siempre `protected`
  protected function setRows(int $newRows)
  {
    $this->rows = $newRows;
  }

  protected function setCols(int $newCols)
  {
    $this->cols = $newCols;
  }

  protected function setTitles(array $newTitles)
  {
    $this->titles = array($newTitles);
  }

  protected function setData(array $newData)
  {
    $this->matrixData = array($newData);
  }

  protected function setCreationDate(string $newCreationDate)
  {
    $this->creationDate = strtotime($newCreationDate);
  }

  // `GETTERS` (devuelve la información de una propiedad para usarla en un método y desde afuera de la class). Normalmente son siempre `protected`
  protected function getRows()
  {
    return $this->rows;
  }

  protected function getCols()
  {
    return $this->cols;
  }

  protected function getTitles()
  {
    return $this->titles;
  }

  protected function getData()
  {
    return $this->matrixData;
  }

  protected function getCreationDate()
  {
    $formattedDate = date("d-m-y  H:i:s", intval(strtotime($this->creationDate)));
    return $formattedDate;
  }

  // `MÉTODOS` (utilizan los setters y getters para acceder a la información)
  public function table()
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

  public function tableWithTitlesAndMatrixData()
  {
    echo "
    <table border=1 cellspacing=0>";
    // Necesito una sola fila para todos los títulos
    echo
    "<tr>";
    // Creo títulos
    for ($i = 0; $i < count($this->getTitles()); $i++) {
      echo "<th>" . $this->getTitles()[$i] . "</th>";
    }
    echo "</tr>";
    // Contenido
    Table::contentTableData($this->getData());
    echo "</table>";
  }

  public function contentTableData(array $matrix)
  {
    // Itero el primer array de la Matriz para generar las filas
    for (
      $i = 0;
      $i < count($matrix);
      $i++
    ) {
      echo "<tr>";
      // Itero los demás arrays para generar el contenido
      for ($j = 0; $j < count($matrix[$i]); $j++) {
        echo "<td>" . $matrix[$i][$j] . "</td>";
      }
      echo "</tr>";
    }
  }

  // `MÉTODOS ESTÁTICOS` (serán estáticos siempre que no estén relacionados directamente con las propiedades y los métodos de la clase. Un método estático debe recibir algún parámetro desde afuera de la clase para trabajar con la información, como una instancia (obj) de la clase)
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
}

// `INSTANCIAS` (materialización de una clase. Una instancia puede tener o va a tener estado, comportamiento e identidad. El estado va a representar los valores de cada característica o atributo del objeto. El comportamiento son las acciones o métodos que va a poder realizar la instancia. La identidad es el nombre único que permite reconocer al objeto y diferenciarlo de otros)
$data = [
  ["Pedro", 24, "prueba@123.com"],
  [$faker->name(), $faker->passthrough(rand(1, 99)), $faker->email()],
  [$faker->name(), $faker->passthrough(rand(1, 99)), $faker->email()],
  [$faker->name(), $faker->passthrough(rand(1, 99)), $faker->email()],
  [$faker->name(), $faker->passthrough(rand(1, 99)), $faker->email()],
  [$faker->name(), $faker->passthrough(rand(1, 99)), $faker->email()]
];

$myTable = new Table(5, 3, ["Nombre", "Edad", "Email"], $data);

$myTable->tableWithTitlesAndMatrixData();
