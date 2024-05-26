<?php

namespace Comentario;

class Comentario
{
  // properties
  private $contador = 0; // Con esto el ID se creará automáticamente en la instancia sin posibilidad de modificarse posteriormente
  private $id;
  private $comentario;
  private $fechaCreation;
  private $fechaEdition;
  private $fechaDeleted;
  private $fechaModeration;
  private $usuarioId;
  private $fotoId;

  // construct
  function __construct($comentario, $usuarioId, $fotoId)
  {
    self::$contador++;
    $this->id = self::$contador;
    $this->comentario = $comentario;
    $this->fechaCreation = date("_d-m-Y_H.i.s_", intval(strtotime("now")));;
    $this->usuarioId = $usuarioId;
    $this->fotoId = $fotoId;
  }

  // getters
  public function getId()
  {
    return $this->id;
  }
  public function getComentario()
  {
    return $this->comentario;
  }
  public function getFechaCreation()
  {
    return $this->fechaCreation;
  }
  public function getFechaEdition()
  {
    return $this->fechaEdition;
  }
  public function getFechaDeleted()
  {
    return $this->fechaDeleted;
  }
  public function getFechaModeration()
  {
    return $this->fechaModeration;
  }
  public function getUsuarioId()
  {
    return $this->usuarioId;
  }
  public function getFotoId()
  {
    return $this->fotoId;
  }

  // setters
  public function setId($id)
  {
    $this->id = $id;
  }
  public function setComentario($comentario)
  {
    $this->comentario = $comentario;
  }
  public function setFechaCreation($fechaCreation)
  {
    $this->fechaCreation = $fechaCreation;
  }
  public function setFechaEdition($fechaEdition)
  {
    $this->fechaEdition = $fechaEdition;
  }
  public function setFechaDeleted($fechaDeleted)
  {
    $this->fechaDeleted = $fechaDeleted;
  }
  public function setFechaModeration($fechaModeration)
  {
    $this->fechaModeration = $fechaModeration;
  }
  public function setUsuarioId($usuarioId)
  {
    $this->usuarioId = $usuarioId;
  }
  public function setFotoId($fotoId)
  {
    $this->fotoId = $fotoId;
  }

  // methods
  function editarComentario($id, $msg, $chartDelete)
  {
    $original = $this->getComentario();
    $nuevo = "Nuevas modificaciones en $original: " . "$msg " . "<br/>" . "En la fecha: " . date("_d-m-Y_H.i.s_", intval(strtotime("now"))) . "<br/>";
    array_splice($original, $id, $chartDelete, $nuevo);
    echo $original . "<br>";
    $this->setComentario($nuevo);
    $this->setFechaEdition(date("_d-m-Y_H.i.s_", intval(strtotime("now"))));
    echo $nuevo . "<br>";
  }

  function eliminarComentario($id, $database)
  {
    array_splice($database, $id, 1, "La fecha de eliminación es: " . date("_d-m-Y_H.i.s_", intval(strtotime("now"))));
    $this->setFechaDeleted(date("_d-m-Y_H.i.s_", intval(strtotime("now"))));
  }

  function moderarComentario($id, $database)
  {
    array_splice($database, $id, 1, "La fecha de moderación es: " . date("_d-m-Y_H.i.s_", intval(strtotime("now"))));
    $this->setFechaModeration(date("_d-m-Y_H.i.s_", intval(strtotime("now"))));
  }
}
