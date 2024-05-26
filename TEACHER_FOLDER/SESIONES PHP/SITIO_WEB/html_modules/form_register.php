<?php
require_once("classes/db.php");
use Database\Db as Db;
$cnx = new Db("localhost","root","","gameclub");
?>

<!-- el atributo "enctype" me permite subir archivos con un input tipo file -->
<form class='form_justificado' action="1_home.php" method="post"  enctype="multipart/form-data">  


<label for="nombre">NOMBRE</label>
<input type="text" name="nombre" id="nombreid">

<label for="apellido1">APELLIDO 1</label>
<input type="text" name="apellido1" id="apellido1id">

<label for="apellido2">APELLIDO 2</label>
<input type="text" name="apellido2" id="apellido2id">


<label for="email">EMAIL</label>
<input type="email" name="email" id="email">

<label for="pass">PASSWORD</label>
<input type="password" name="pass" id="pass">

<label for="pass2">REPETIR PASSWORD</label>
<input type="password" name="pass2" id="pass2">

<label for="tel">TELEFONO</label>
<input type="text" name="tel" id="tel">

<label for="direccion">DIRECCION</label>
<input type="text" name="direccion" id="direccion">

<label for="dni">DNI</label>
<input type="text" name="dni" id="dni">

<label for="tjt">NUM TARJETA</label>
<input type="text" name="tjt" id="tjt">

<label for="fechaNac">FECHA NACIMIENTO</label>
<input type="date" name="fechaNac" id="fechaNac">

<label for="socio">SOCIO</label>
<input type="checkbox" name="socio" id="socio" checked/>
<br/>

<div id="imgcaptcha"> <img src="./assets/img/captcha_login_register.php"> </div>
<input type="text" name="captcha" id="captcha">

<label for="rol" >ROL</label>
<select name="rol">
    <?php 
        $sentenciaSQL = "SELECT roles.id, roles.rol FROM roles";
        $itemsLista = $cnx->myQueryMultiple($sentenciaSQL, false);
    ?>
    <option value="0">Escoge un rol</option>
    <?php
        foreach($itemsLista as $key => $value){
            ?>
            <option value="<?=$value[0]?>"><?=$value[1]?></option>
            <?php
        }
    ?>
</select>
<br/>

<label for="imagen">IMAGEN</label>
<input type="file" name="imagen">

<input type="submit" name="registrar" value="REGISTRARSE">

</form>