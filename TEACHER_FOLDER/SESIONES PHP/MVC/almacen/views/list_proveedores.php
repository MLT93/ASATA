<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>LISTA PROVEEDORES</title>
</head>

<body>

  <?php
  // var_dump($proveedores);
  ?>

  <h1>LISTA DE PROVEEDORES</h1>

  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/create">REGISTRA UN NUEVO PROVEEDOR</a></button>

  <table>
    <th>ID</th>
    <th>NOMBRE</th>
    <th>CONTACTO</th>
    <th>ENLACE</th>
    </tr>
    <?php
    foreach ($proveedores as $key => $value) {
      echo "<tr>";
      echo "<td>" . $value['id'] . "</td>";
      echo "<td>" . $value['nombre'] . "</td>";
      echo "<td>" . $value['contacto'] . "</td>";
      echo "<td><a href='/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/detail?id=" . $value['id'] . "'" . ">Detalle</a></td>";
      echo "</tr>";
    }
    ?>
  </table>

</body>

</html>
