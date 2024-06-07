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
    $cnx = new Db("localhost", "root", "", "concesionario");
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
    $cnx = new Db("localhost", "root", "", "concesionario");
    $sentenciaSQL = "SELECT usuarios.hashedPassword FROM usuarios WHERE usuarios.email= '$email'";
    $respuesta = $cnx->myQuerySimple($sentenciaSQL,true);//devuelve un array asociactivo
    $hashedPassword = $respuesta["hashedPassword"];
    return password_verify($password,$hashedPassword);

}


public static function actualizarContrasenia(string $email, string $password){
    $cnx = new Db("localhost", "root", "", "concesionario");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sentenciaSQL = "UPDATE usuarios SET hashedPassword = '$hashedPassword' WHERE usuarios.email = '$email' ";
    $cnx->execute($sentenciaSQL);
}


public static function registrarUsuario(string $nickname, string $email, string $password, string $telefono, string $direccion){

    $cnx = new Db("localhost","root","","concesionario");
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


    $sentenciaSQL = "INSERT INTO usuarios (nickname, email, hashedPassword, telefono, direccion) VALUES ('$nickname','$email','$hashedPassword','$telefono','$direccion')";
    $cnx->execute($sentenciaSQL);
}



public static function mostrarUsuario(string $email){
    $cnx = new Db("localhost", "root", "", "concesionario");
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

?>