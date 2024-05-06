<?php

namespace Comment;

use DateTime;

class Comentario
{

    private static $contador = 0;
    private $id;
    private $contenido;

    private $fechaCreacion;
    private $fechaEdicion;
    private $fechaEliminacion;
    private $fechaModeracion;
    private $usuarioId;
    private $fotoId;

    function __construct($contenido, $usuarioId)
    {
        self::$contador++;
        $this->id = self::$contador;
        $this->contenido = $contenido;
        $ahora = new DateTime();
        $this->fechaCreacion = $ahora->format("Y-m-d_Hisv");
        $this->usuarioId = $usuarioId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    public function getFechaEdicion()
    {
        return $this->fechaEdicion;
    }

    public function getFechaEliminacion()
    {
        return $this->fechaEliminacion;
    }

    public function getFechaModeracion()
    {
        return $this->fechaModeracion;
    }

    public function getUsuarioId()
    {
        return $this->usuarioId;
    }

    public function getFotoId()
    {
        return $this->fotoId;
    }


    ///setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function setFechaEdicion($fechaEdicion)
    {
        $this->fechaEdicion = $fechaEdicion;
    }

    public function setFechaEliminacion($fechaEliminacion)
    {
        $this->fechaEliminacion = $fechaEliminacion;
    }

    public function setFechaModeracion($fechaModeracion)
    {
        $this->fechaModeracion = $fechaModeracion;
    }

    public function setUsuarioId($usuarioId)
    {
        $this->usuarioId = $usuarioId;
    }

    public function setFotoId($fotoId)
    {
        $this->fotoId = $fotoId;
    }


    ///metodos

    //editarComentario
    //borrarComentario
    //moderarComentario

    public function editarComentario($newComentario)
    {

        $this->setContenido($newComentario);
        $comentarioEditado = $this->getContenido();
        $ahora = new DateTime();
        $this->setFechaEdicion( $ahora->format("Y-m-d_Hisv"));
        $fechaEdicion = $this->getFechaEdicion();
        return "{$comentarioEditado} - {$fechaEdicion}";
    }

    public function borrarComentario()
    {
        $ahora = new DateTime();
        $fechaBorrado = $this->fechaEliminacion = $ahora->format("Y-m-d_Hisv");

        return $fechaBorrado;
    }

    public function moderarComentario()
    {
        $ahora = new DateTime();
        $fechaModeracion = $this->fechaModeracion = $ahora->format("Y-m-d_Hisv");

        return  $fechaModeracion;
    }
}

$micoment = new Comentario("hola que ",2);
echo $micoment->editarComentario("nuevo comenta");