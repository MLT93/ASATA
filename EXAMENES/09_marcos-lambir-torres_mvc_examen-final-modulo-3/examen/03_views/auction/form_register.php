<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR</title>
</head>

<body>

  <?php
  // var_dump($users);
  /* 
    ubicacion_id
    tipo_alerta
    descripcion
    fecha_inicio
    fecha_fin
  */
  ?>

  <!-- RECUERDA ENVIAR EL FORM AL ARCHIVO CORRESPONDIENTE (esto se procesa en el controlador correspondiente, dentro de la función `store`) -->
  <form action="/PHP/MF0493/auction/store/" method="post" target="_self">

    <label for="userID">USER</label>
    <select name="user" id="userID" required>
      <option value="0">Elige un usuario</option>
      <?php
      /* 
      1. El Controller (intermediario entre el Model y la View) Utiliza el Model (donde realiza la consulta a la DB) y envía la información (la variable) a la View (donde está lo que ve el usuario)
      2. Se encargará de enviar la variable que no se usa en el Controller
    */
      foreach ($users as $key => $value) { ?>
        <option value="<?= $value['id'] ?>"> <?= $value["username"] ?> </option>
      <?php
      }
      ?>
    </select>

    <label for="titleID">TITLE</label>
    <input type="text" name="title" id="titleID" required>

    <label for="descripcionID">DESCRIPCIÓN</label>
    <textarea name="descripcion" id="descripcionID" required></textarea>

    <label for="start_priceID">START PRICE</label>
    <input type="number" name="start_price" id="start_priceID" step="0.01" required> <!-- `step="0.01"` permite escribir decimales -->

    <label for="end_timeID">END TIME</label>
    <input type="datetime-local" name="end_time" id="end_timeID" required>


    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/PHP/MF0493/auction/list/">VE A LA LISTA</a></button>

  <button><a href="/PHP/MF0493/home/">HOME</a></button>

</body>

</html>
