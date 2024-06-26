<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>REGISTRAR</title>
</head>

<body>

  <form action="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fitness_activity/store/" method="post" target="_self">

    <label for="nombreID">NOMBRE</label>
    <input type="text" name="nombre" id="nombreID" maxlength="10" max="120">

    <label for="apellidoID">APELLIDOS</label>
    <input type="text" name="apellido" id="apellidoID">

    <label for="nicknameID">CREA UN NICKNAME</label>
    <input type="text" name="nickname" id="nicknameID">

    <label for="password1ID">PASSWORD</label>
    <input type="password" name="password1" id="password1ID">

    <label for="password2ID">REPITE PASSWORD</label>
    <input type="password" name="password2" id="password2ID">

    <label for="emailID">EMAIL</label>
    <input type="email" name="email" id="emailID">

    <label for="fechaNacimientoID">FECHA DE NACIMIENTO</label>
    <input type="date" name="fechaNacimiento" id="fechaNacimientoID">

    <label for="pesoKgID">PESO EN KG</label>
    <input type="text" name="pesoKg" id="pesoKgID" min="20" max="400" maxlength="3">

    <label for="alturaCmID">ALTURA EN CM</label>
    <input type="number" name="alturaCm" id="alturaCmID" min="100" max="210" maxlength="3">

    <br />
    <input type="submit" name="registrar" value="REGISTRAR">

  </form>

  <br />
  <button><a href="/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/create_user_fitness/list/">VE A LA LISTA</a></button>

</body>

</html>
