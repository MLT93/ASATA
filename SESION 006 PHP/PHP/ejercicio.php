<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>Ejercicio con Array</h2>

  <?php
  $array = [1, 3, 7, 2, 6, 8, 12, 13, 15, 14, 18];

  echo "<br/> <h3>Array:</h3> <br/>";
  echo "[";
  for ($i = 0; $i < 11; $i++) {
    echo "$array[$i], ";
  };
  echo "]";

  echo "<br/> <h3>Impares:</h3> <br/>";

  for ($i = 0; $i < 11; $i++) {
    if ($array[$i] % 2 === 1) {
      echo "El número en la posición $i es: $array[$i] <br/>";
    }
  };

  echo "<br/> <h3>Pares:</h3> <br/>";

  for ($i = 0; $i < 11; $i++) {
    if ($array[$i] % 2 === 0) {
      echo "El número en la posición $i es: $array[$i] <br/>";
    }
  };

  echo "<br/>";

  $section = count($array) / 3;

  echo "$section <br/>";

  for ($i=0; $i < count($array); $i++) { 
    $array[$i] = $array[$i] / 3;
    if ($array[$i]%2 === 0 ) {
      echo "$array[$i], ";
    }
  }
  ?>

</body>

</html>
