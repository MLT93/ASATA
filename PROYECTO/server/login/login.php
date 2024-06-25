<?php
// LOGIN

require_once("db/DB.php");
require_once("classes/UsuarioDB.php");
require_once("classes/SesionDB.php");

if (isset($_POST['login'])) {

  $email = json_decode($_POST['email']);
  $password = json_decode($_POST['password']);
  // $captcha = json_decode($_POST['captcha']);

  // Verifico existencia del usuario en la base de datos
  if (\UserDB\User::verifyUser($email, $password)) {

    // Aquí se inicia una nueva sesión y se crea la variable `$_SESSION['usuario']` sin valor
    $mySession = new \SessionDB\Session();

    // Aquí se comprobaría con un `if` si el usuario ha realizado correctamente el captcha
    // Para hacer esto, primero debe haber una imagen captcha guardada en una variable de sesión `$_SESSION` y comprobar esa información con la que envía el usuario. Si corresponden, entonces podrá loguearse, registrarse, etc
    // Si la imagen captcha no se ve en la página, dentro del archivo `php.ini` (en la carpeta php), descomentar esto `extension=gd` para poder verlo en la página web
    // if ($captcha == $_SESSION['captcha']) {

      // echo "<h3>Se ha realizado el login correctamente</h3>" . "<br/>";
      // $msgFooter = "Se ha realizado el login correctamente"; //=> Conexión con el footer

      // Una vez verificado el usuario y comprobado el captcha, se comprueba en la base de datos la información del usuario y logueo el usuario asignándole a la variable de sesión la info del usuario
      $mySession->startLogin($email);

      // Ahora creo un array para almacenar una lista de variables que pasaré a la función `JWTCreation` para crear el JWT token con la info del usuario
      $info = [];
      $info["usuario"] = $email;
      $info["password"] = $pass;
      // Creo JWT token y devuelve un array junto con la fecha de expiración
      $jwtArray = JWTCreation($info, "./");
      // Creo cookie con JWT encriptada, y utilizo la info de `jwtArray`
      setcookie("jwt", $jwtArray['jwt'], $jwtArray['exp'], "/");

      // Inserto el formulario otra página
      // require("./html_modules/form_picture_up.php");

      // Envío el cliente a otra página o la recargo
      header("Location: user_info.php");
    // } else {
    //       echo json_encode(["success" => false, "data" => "Incorrect captcha"]);
    // }
  } else {
    echo json_encode(["success" => false, "data" => "Incorrect credentials"]);
  }
}
