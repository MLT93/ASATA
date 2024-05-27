<?php
require_once("classes/db.php");
use Database\Db as Db;
$cnx = new Db("localhost","root","","gameclub");
?>


<form class='form_justificado' action="1_home.php" method="post" >  


<label for="nickname">NICKNAME</label>
<input type="text" name="nickname" id="nicknameid">

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


<!-- <div id="imgcaptcha"> <img src="./assets/img/captcha_login_register.php"> </div>
<input type="text" name="captcha" id="captcha"> -->


<input type="submit" name="registrar" value="REGISTRARSE">

</form>