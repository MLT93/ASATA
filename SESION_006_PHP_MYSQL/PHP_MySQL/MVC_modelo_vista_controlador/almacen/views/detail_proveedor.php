<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>DETALLE PROVEEDOR</title>
</head>

<body>

  <?php
  // var_dump($arrProveedores);
  ?>

  <h1>DETALLE PROVEEDOR</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/">VUELVE A LA LISTA</a></button>

  <table>
    <tr>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CONTACTO</th>
    </tr>
    <?php
    echo "<tr>";
    echo "<td>" . $arrProveedores[0]['id'] . "</td>";
    echo "<td>" . $arrProveedores[0]['nombre'] . "</td>";
    echo "<td>" . $arrProveedores[0]['contacto'] . "</td>";
    echo "</tr>";
    ?>
  </table>

</body>

</html>
