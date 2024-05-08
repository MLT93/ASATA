<?php

namespace Album;

use DateTime;

class Album{

    private static $contador = 0;
    private $id;
    private $nombre;
    private $nImagenes;
    private $idUsuario;
    private $fechaCreacion;



function __construct($nombreAlbum,$idUsuario){
    self::$contador++;
    $this->id = self::$contador;
    $this->nombre = $nombreAlbum;
    $ahora = new DateTime();
    $this->fechaCreacion = $ahora->format("Y-m-d_Hisv");
    $this->idUsuario = $idUsuario;
}

//getters y setters
protected function getId(){

}
//get

protected function getNombre(){
 return $this->nombre;
}

///////////////////////////////



public function nombreAlbum(){
 return $this->getNombre();
}


public function comprobarAlbum($idAlbum, $idUsuario){
    if($this->id == $idAlbum && $this->idUsuario == $idUsuario){
        return true;
    }else{
        return false;
    }
}


public function agregarImagenes($imagenes){
    $this->nImagenes = $this->nImagenes + count($imagenes);
}


public function agregarImagen(){
    $this->nImagenes = $this->nImagenes + 1; 
}


}


?>