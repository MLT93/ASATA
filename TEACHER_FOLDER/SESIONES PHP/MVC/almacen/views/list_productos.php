<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LISTA PRODUCTOS</title>
</head>

<body>

  <h1>LISTA DE PRODUCTOS</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/create">REGISTRA UN NUEVO PRODUCTO</a></button>

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
    foreach ($productos as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['categoria'] . "</td>";
      echo "<td>" . $value['proveedor'] . "</td>";
      echo "<td>" . $value['precio'] . "</td>";
      echo "<td>" . $value['stock'] . "</td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
