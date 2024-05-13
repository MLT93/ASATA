<?php

namespace User;
// require_once '../db/usuarios.php';
// $usuarios = mostrarUsuariosBD();

class Usuario{

private static $usuarios = [];
private static int $contador = 0;
private int $id;
private string $nombre;
private string $email;
private string $hashedPassword;


public static function init() {
 self::$usuarios = [
     [
         "id" => 1,
         "mail" => "usuario1@example.com",
         "nombre" => "UsuarioUno",
         "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
     ],
     [
         "id" => 2,
         "mail" => "usuario2@example.com",
         "nombre" => "Usuario Dos",
         "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
     ],
     [
         "id" => 3,
         "mail" => "usuario3@example.com",
         "nombre" => "Usuario Tres",
         "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
     ],
     [
         "id" => 4,
         "mail" => "usuario4@example.com",
         "nombre" => "Usuario Cuatro",
         "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
     ],
     [
         "id" => 5,
         "mail" => "usuario5@example.com",
         "nombre" => "Usuario Cinco",
         "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
     ]
 ];
}



function __construct(string $nombre,string $email,string $password){
 $this->init();
 if(!isset(self::$usuarios[$email])){

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  self::$contador++;
  $nuevoUsuario = [
   'id' => self::$contador,
   'mail' => $email,
   'nombre' => $nombre,
   'hashedPassword' => $hashedPassword,
  ];
  array_push(self::$usuarios,$nuevoUsuario);


  $this->id = self::$contador;
  $this->nombre = $nombre;
  $this->email = $email;
  $this->hashedPassword = $hashedPassword;

  return true; // Usuario nuevo
 }else{
  return false;  // Usuario ya existe
 }
}

//GETTERS Y SETTERS

protected function getId(){
    return $this->id;
}

protected function getNombre(){
    return $this->nombre;
}

protected function getEmail(){
    return $this->email;
}

protected function getHashedPassword(){
    return $this->hashedPassword;
}


protected function setId($id){
    $this->id = $id;
}

protected function setNombre($nombre){
    $this->nombre = $nombre;
}

protected function setEmail($email){
    $this->email = $email;
}

protected function setHashedPassword($hashedPassword){
    $this->hashedPassword = $hashedPassword;
}


//2 MÉTODOS estaticos

public static function mostrarIdUsuario(string $nombreUsuario){//el usuario es un objeto
 foreach (self::$usuarios as $key => $usuario){
  if(self::$usuarios[$key]['nombre'] == $nombreUsuario){
   return $nombreUsuario." - ".$usuario['id']." - ".$usuario['hashedPassword'];
  }
 }
 return "Usuario no encontrado en la BD";
}

// Método para verificar las credenciales de un usuario
public static function verificarUsuario(string $email, string $password) {
 foreach (self::$usuarios as $key => $usuario){
  if (self::$usuarios[$key]['mail']==$email) {
   return password_verify($password, self::$usuarios[$key]['hashedPassword'])?"OK":"KO";
  }elseif($key == (count(self::$usuarios)-1)){
   return false;
  }
 }
}

}

// $user1 = new Usuario("pedrito","mail@mail.com","1234");
// echo Usuario::mostrarIdUsuario("pedrito");echo"<br/>";
// echo Usuario::verificarUsuario("mail@mail.com","1234");echo"<br/>";



?>
