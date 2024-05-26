<?php

namespace Picture;

use DateTime;


class Foto{

    private static $contador = 0;
    private $id;
    private $ruta;
    private $titulo;
    private $descripcion;
    private $fechaSubida;
    private $usuarioId;

public function __construct($ruta,$titulo,$descripcion,$usuarioId){

    self::$contador++;
    $this->id = self::$contador;
    $this->ruta = $ruta;
    $this->titulo = $titulo;
    $this->descripcion = $descripcion;
    $ahora = new DateTime();
    $this->fechaSubida = $ahora->format("Y-m-d_Hisv");
    $this->usuarioId = $usuarioId;

}

/**getters y settters */
public function getId(){
    return $this->id;
}
public function getRuta(){
    return $this->ruta;
}
public function getTitulo(){
    return $this->titulo;
}
public function getDescripcion(){
    return $this->descripcion;
}
public function getFechaSubida(){
    return $this->fechaSubida;
}
public function getUsuarioId(){
    return $this->usuarioId;
}

public function setId($id){
   $this->id = $id;
}
public function setRuta($ruta){
    $this->ruta= $ruta;
}
public function setTitulo($titulo){
    $this->titulo= $titulo;
}
public function setDescripcion($descripcion){
    $this->descripcion= $descripcion;
}
public function setFechaSubida($fechaSubida){
    $this->fechaSubida= $fechaSubida;
}
public function setUsuarioId($usuarioId){
    $this->usuarioId= $usuarioId;
}

public function mostrarInfo(){

    return "{$this->titulo} - {$this->descripcion}";
}



}




?>