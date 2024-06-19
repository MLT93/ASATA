<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>DETALLE PRODUCTO</title>
</head>

<body>

  <?php
  // var_dump($producto);
  ?>

  <h1>DETALLE PRODUCTO</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CATEGORIA</th>
      <th>PROVEEDOR</th>
      <th>PRECIO</th>
      <th>STOCK</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $producto[0]['id'] . "</td>";
    echo "<td>" . $producto[0]['nombre'] . "</td>";
    echo "<td>" . $producto[0]['categoria'] . "</td>";
    echo "<td>" . $producto[0]['proveedor'] . "</td>";
    echo "<td>" . $producto[0]['precio'] . "</td>";
    echo "<td>" . $producto[0]['stock'] . "</td>";
    echo "</tr>";
    ?>
  </table>

</body>

</html>
