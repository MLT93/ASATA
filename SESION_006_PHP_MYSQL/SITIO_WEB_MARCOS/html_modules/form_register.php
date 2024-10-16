   <?php
    require_once("./classes/BaseDatos.php");

    use BaseDatos\BaseDatos;

    // $cnx = new BaseDatos("localhost", "root", "mysql", "gameclub");
    $cnx = new BaseDatos("localhost", "root", "", "gameclub");
    ?>

   <form action="1_home.php" method="post">

     <label for="nombreId">NOMBRE</label>
     <input type="text" name="nombre" id="nombreId">

     <label for="apellido1Id">PRIMER APELLIDO</label>
     <input type="text" name="apellido1" id="apellido1Id">

     <label for="apellido2Id">SEGUNDO APELLIDO</label>
     <input type="text" name="apellido2" id="apellido2Id">

     <label for="emailId">EMAIL</label>
     <input type="email" name="email" id="emailId">

     <label for="passId">PASSWORD</label>
     <input type="password" name="pass" id="passId">

     <label for="pass2Id">REPETIR PASSWORD</label>
     <input type="password" name="pass2" id="pass2Id">

     <label for="telId">TELÉFONO</label>
     <input type="tel" name="tel" id="telId">

     <label for="direccionId">DIRECCIÓN</label>
     <input type="text" name="direccion" id="direccionId">

     <label for="dniId">DNI</label>
     <input type="text" name="dni" id="dniId">

     <label for="numTarjetaId">NUM TARJETA</label>
     <input type="text" name="numTarjeta" id="numTarjetaId">

     <label for="fNacimientoId">FECHA NACIMIENTO</label>
     <input type="date" name="fNacimiento" id="fNacimientoId">

     <label for="isSocioId">¿ES SOCIO?</label>
     <input type="checkbox" name="isSocio" id="isSocioId">

     <label for="rolId">ROL</label>
     <select name="rol" id="rolId">
       <?php
        $sentenciaSQL = "SELECT roles.id, roles.rol FROM roles";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
        ?>
       <option value="0">Escoge un rol</option>
       <?php
        foreach ($itemsLista as $key => $value) {
        ?>
         <option value="<?= $value[0] ?>"><?= $value[1] ?></option>
       <?php
        }
        ?>
     </select>
     <br />

     <label for="imagenId">IMAGEN</label>
     <input type="file" name="imagen" id="imagenId">

     <div id="imgcaptcha"> <img src="./assets/img/captcha_login_register.php"> </div>
     <input type="text" name="captcha" id="captcha">

     <input type="submit" name="registrar" value="REGISTRARSE">

   </form>
