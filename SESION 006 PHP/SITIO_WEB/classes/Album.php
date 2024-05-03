<?php
// ! PROPIEDADES `PRIVATE`, GETTERS Y SETTERS `PROTECTED` Y MÉTODOS `PUBLIC` o `STATIC` (serán estáticos siempre que no estén relacionados directamente con las propiedades y los métodos de la clase. Un método estático debe recibir algún parámetro desde afuera de la clase para trabajar con la información, como una instancia (obj) o un )

namespace Album;

use DateTime;

class Album{
  private static $instance = null;
  //id
  private $id;
  //nombre
  private $nombre;
  //nImagenes
  private $nImagenes;
  //idUsuario
  private $idUsuario;
  //fechaCrecion
  private $fechaCreacion;

  function __construct( $nombreAlbum, $idUsuario ){
    self::$instance++;
    $this->id = self::$instance;
    $this->nombre = $nombreAlbum;
    $ahora = new DateTime();
    $this->fechaCreacion = $ahora->format("Y-m-d_His");
  }

  //getters
  protected function getId(){
    return $this->id;
  }
  protected function getNombre()
  {
    return $this->nombre;
  }
  protected function getNImagenes(){
    return $this->nImagenes;
  }
  protected function getIdUsuario()
  {
    return $this->idUsuario;
  }
  protected function getFechaCreacion(){
    return $this->fechaCreacion;
  }

  //setters
  protected function setId($id)
  {
    $this->id = $id;
  }
  protected function setNombre($nombre){
    $this->nombre = $nombre;
  }
  protected function setNImagenes($nImagenes)
  {
    $this->nImagenes = $nImagenes;
  }
  protected function setIdUsuario($idUsuario)
  {
    $this->idUsuario = $idUsuario;
  }
  protected function setFechaCreacion($fechaCreacion)
  {
      $this->fechaCreacion = $fechaCreacion;
  }

  //métodos
  public function nombreAlbum(){
    return $this->getNombre();
  }
  public function comprobarAlbum($idAlbum, $idUsuario) {
    if($this->id = $idAlbum && $this->idUsuario == $idUsuario){
      return true;
    }else {
      return false;
    };
  }
  public function agregarImagenes(array $img){
    if(count($img) > 1){
      $this->nImagenes = $this->nImagenes + count($img);
    }
  }
  public function agregarImagen()
  {
    return $this->nImagenes + 1;
  }
}


?>
