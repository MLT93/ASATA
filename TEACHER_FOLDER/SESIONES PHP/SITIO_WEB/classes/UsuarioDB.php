<?php

namespace UserDB;

require_once("db.php");
use Database\Db as Db;


class Usuario{

private string $name;
private string $email;
private string $hashedPassword;


function __construct(string $nombre, string $email, string $password){

    $this->name = $nombre;
    $this->email = $email;
    $this->hashedPassword = password_hash($password, PASSWORD_DEFAULT);


}


//GETTERS Y SETTERS
protected function getName(){
    return $this->name;
}

protected function getEmail(){
    return $this->email;
}

protected function getHashedPassword(){
    return $this->hashedPassword;
}


protected function setName($nombre){
    $this->name = $nombre;
}

protected function setEmail($email){
    $this->email = $email;
}

protected function setHashedPassword($hashedPassword){
    $this->hashedPassword = $hashedPassword;
}



public static function mostrarIdUsuario(string $email){
    $cnx = new Db("localhost", "root", "", "gameclub");
    $sentenciaSQL =   "SELECT usuarios.id FROM usuarios WHERE usuarios.email = '$email'";
    // $cnx->connect();
    $respuesta = $cnx->myQuerySimple($sentenciaSQL,true);
    if(isset($respuesta["id"])){
        $id = $respuesta["id"];
        return $id;
    }
    else{
        // return "!existe";
        return 0;
    }
}

public static function verificarUsuario(string $email, string $password) {
    $cnx = new Db("localhost", "root", "", "gameclub");
    $sentenciaSQL = "SELECT usuarios.hashedPassword FROM usuarios WHERE usuarios.email= '$email'";
    $respuesta = $cnx->myQuerySimple($sentenciaSQL,true);//devuelve un array asociactivo
    $hashedPassword = $respuesta["hashedPassword"];
    return password_verify($password,$hashedPassword);

}


public static function actualizarContrasenia(string $email, string $password){
    $cnx = new Db("localhost", "root", "", "gameclub");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sentenciaSQL = "UPDATE usuarios SET hashedPassword = '$hashedPassword' WHERE usuarios.email = '$email' ";
    $cnx->execute($sentenciaSQL);
}


public static function registrarUsuario(string $name, string $apellido1, string $apellido2, string $email, string $password, string $telefono, string $direccion, string $dni, string $numTarjeta, $date, bool $socio, $idRol, $imagen){

    $cnx = new Db("localhost","root","","gameclub");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sentenciaSQL = "INSERT INTO usuarios (nombre, apellido1, apellido2, email, hashedPassword, telefono, direccion, dni, numTarjeta, fechaNacimiento, socio, id_rol, imagen) VALUES ('$name','$apellido1','$apellido2','$email','$hashedPassword','$telefono','$direccion','$dni','$numTarjeta','$date',$socio, $idRol, '$imagen')";
    $cnx->execute($sentenciaSQL);
}



public static function mostrarUsuario(string $email){
    $cnx = new Db("localhost", "root", "", "gameclub");
    $sentenciaSQL =   "SELECT * FROM usuarios WHERE usuarios.email = '$email'";
    // $cnx->connect();
    $respuesta = $cnx->myQuerySimple($sentenciaSQL,true);
    if(isset($respuesta["id"])){
        return $respuesta;
    }
    else{
        //aqui entro si no existe ese registro
        echo "E";
        return 0;
    }
}


}


// echo Usuario::mostrarIdUsuario("usuario3@mail.com");
// Usuario::actualizarContrasenia("use1@mail.com","1234");
// Usuario::actualizarContrasenia("use2@mail.com","1234");
// Usuario::actualizarContrasenia("use3@mail.com","1234");
// Usuario::actualizarContrasenia("use4@mail.com","1234");
// Usuario::actualizarContrasenia("use5@mail.com","1234");
// Usuario::actualizarContrasenia("use6@mail.com","1234");
// Usuario::actualizarContrasenia("use7@mail.com","1234");
// Usuario::actualizarContrasenia("use8@mail.com","1234");
// Usuario::actualizarContrasenia("use9@mail.com","1234");
// Usuario::actualizarContrasenia("use10@mail.com","1234");
// echo Usuario::verificarUsuario("usuario1@mail.com","1234")?"VERIFICADO":"FAIL"  ;echo"<br/>";//true
// echo Usuario::verificarUsuario("usuario1@mail.com","1222")?"VERIFICADO":"FAIL"  ;echo"<br/>";//false
// Usuario::registrarUsuario("newuser","newuser@mail.com","1234");

?>