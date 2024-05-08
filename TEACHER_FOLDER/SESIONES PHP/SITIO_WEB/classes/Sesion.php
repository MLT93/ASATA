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

    public function finLogin(){
        unset($_SESSION['usuario']);
        unset($this->usuario);
        $this->login=false;
    }

    public function estadoLogin(){
        if(isset($_SESSION['usuario'])){
            return "{$this->getUsuario()} : {$this->getLogin()} ";
        }else{
            return "SIN USUARIO LOGUEADO.";
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
}



$misesion = new Sesion();
$misesion->inicioLogin("pedro");
echo $misesion->estadoLogin();
$misesion->finLogin();
echo $misesion->estadoLogin();
$misesion->inicioLogin("pedro");
echo $misesion->estadoLogin();


?>