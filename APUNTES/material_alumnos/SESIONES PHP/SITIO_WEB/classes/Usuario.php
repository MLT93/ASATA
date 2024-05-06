<?php

namespace User;


class Usuario{

private static $contador = 0;
private $id;
private $nombre;
private $email;
private $password;

function __construct($nombre,$email,$password){
    self::$contador++;
    $this->id = self::$contador;
    $this->nombre = $nombre;
    $this->email = $email;
    $this->password = $password;
}


protected function getId(){
    return $this->id;
}

public function getNombre(){
    return $this->nombre;
}

public function getEmail(){
    return $this->email;
}

public function getPassword(){
    return $this->password;
}


public function setId($id){
    $this->id = $id;
}

public function setNombre($nombre){
    $this->nombre = $nombre;
}

public function setEmail($email){
    $this->email = $email;
}

protected function setPassword($password){
    $this->password = $password;
}

public function mostrarInfo(){

 return "{$this->id} - {$this->nombre}";
}


public static function getIdUsuario($usuario){//el usuario es un objeto
    return $usuario->getId();
}




}
?>