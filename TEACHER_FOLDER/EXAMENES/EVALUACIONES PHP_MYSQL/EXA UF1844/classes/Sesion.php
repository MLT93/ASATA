<?php

namespace Session;

class Sesion {

    private bool $login;
    private string $usuario;

    function __construct(){
        session_start();
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


    public function inicioLogin(string $nombreUsuario){
        if($nombreUsuario!=""){
            $_SESSION['usuario'] = $nombreUsuario;
            $this->setUsuario($nombreUsuario);
            $this->setLogin(true);
        }
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
     session_start();
     return isset($_SESSION['usuario']);
 }
    // Cerrar la sesión del usuario
    public static function cerrarSesion() {
     session_start();
     session_unset();  // Limpiar todas las variables de sesión
     session_destroy();  // Destruir la sesión
 }




}



// $misesion = new Sesion();
// $misesion->inicioLogin("pedro");
// echo $misesion->estadoLogin();echo"<br/>";
// $misesion->finLogin();
// echo $misesion->estadoLogin();echo"<br/>";
// $misesion->inicioLogin("pedro");
// echo $misesion->estadoLogin();echo"<br/>";


?>
