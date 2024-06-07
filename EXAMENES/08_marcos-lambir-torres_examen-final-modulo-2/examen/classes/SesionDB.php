<?php

namespace SessionDB;

require_once("db.php");
require_once("UsuarioDB.php");
use Database\Db as Db;
use DateTime;
use UserDB\Usuario as Usuario;


class Sesion {

    private bool $login;
    private string $usuario;

    function __construct(){
        // session_start();
        $this->verificarLogin();
    }

    protected function setLogin($opcion){
        $this->login = $opcion;
    }
    protected function setUsuario($usuario){
        $this->usuario = $usuario;
    }


    protected function getLogin(){
        return $this->login ;
    }
    protected function getUsuario(){
        return $this->usuario ;
    }


    public function inicioLogin(string $emailUsuario){// email de Usuario 
       
        $cnx = new Db("localhost","root","","concesionario");
        $idUsuario = Usuario::mostrarIdUsuario($emailUsuario);
        if($idUsuario > 0){      
            
            $_SESSION['usuario'] = $emailUsuario;
            $this->setUsuario($emailUsuario);
            $this->setLogin(true);

            $now = new DateTime();
            $fecha = $now->format('Y-m-d  H:i:s');
            $sentenciaSQL = "INSERT INTO sesiones (id_usuario, fecha, interaccion) VALUES ($idUsuario,'$fecha', 'LOG IN')";
            $cnx->execute($sentenciaSQL);
        }
        $cnx->close();
    }



    public function verificarLogin(){
        if(isset($_SESSION['usuario'])){
            $this->setUsuario($_SESSION['usuario']);
            $this->setLogin(true);
        }else{
            unset($this->usuario);
            $this->setLogin(false);
        }
    }


    // Verificar si el usuario está logueado
    public static function estaLogueado() {
     return $_SESSION['usuario']!="";

    }


    // Cerrar la sesión del usuario
    public static function cerrarSesion() {

        if(isset($_SESSION['usuario'])){

            $cnx = new Db("localhost","root","","concesionario");
            $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);
            if($idUsuario > 0 ){
                $now = new DateTime();
                $fecha = $now->format('Y-m-d  H:i:s');
                $sentenciaSQL = "INSERT INTO sesiones (id_usuario, fecha, interaccion) VALUES ($idUsuario,'$fecha', 'LOG OUT')";
                $cnx->execute($sentenciaSQL);
            }
            $cnx->close();
        }
        session_unset();  // Limpiar todas las variables de sesión
        session_destroy();  // Destruir la sesión
    }

}


?>