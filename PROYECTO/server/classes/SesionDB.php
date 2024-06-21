<?php

namespace SessionDB;

// Importar archivos
require_once("UsuarioDB.php");
require_once("../DB/constantVariables.php");

use DateTime;

class Session
{

    private bool $login;
    private string $usuario;

    function __construct()
    {
        session_start();
        $this->verificarLogin();
    }

    protected function setLogin($opcion)
    {
        $this->login = $opcion;
    }
    protected function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }


    protected function getLogin()
    {
        return $this->login;
    }
    protected function getUsuario()
    {
        return $this->usuario;
    }


    public function inicioLogin(string $emailUsuario)
    { // email de Usuario 

        $cnx = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $idUsuario = \UserDB\Usuario::mostrarIdUsuario($emailUsuario);
        if ($idUsuario > 0) {

            $_SESSION['usuario'] = $emailUsuario;
            $this->setUsuario($emailUsuario);
            $this->setLogin(true);

            $now = new DateTime();
            $fecha = $now->format('Y-m-d H:i:s');
            $SQL = "INSERT INTO sesiones (id_usuario, fecha, estado) VALUES ($idUsuario,'$fecha', 'LOG IN')";
            $cnx->query($SQL);
        }
        $cnx->close();
    }



    public function verificarLogin()
    {
        if (isset($_SESSION['usuario'])) {
            $this->setUsuario($_SESSION['usuario']);
            $this->setLogin(true);
        } else {
            unset($this->usuario);
            $this->setLogin(false);
        }
    }


    // Verificar si el usuario está logueado
    public static function estaLogueado()
    {
        return $_SESSION['usuario'] != ""; // Devuelvo la variable de sesión creada
    }


    // Cerrar la sesión del usuario
    public static function closeSession()
    {

        if (isset($_SESSION['usuario'])) {

            $cnx = new \Database\Db(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $idUsuario = \UserDB\Usuario::mostrarIdUsuario($_SESSION['usuario']);
            if ($idUsuario > 0) {
                $now = new DateTime();
                $fecha = $now->format('Y-m-d  H:i:s');
                $SQL = "INSERT INTO sesiones (id_usuario, fecha, estado) VALUES ($idUsuario,'$fecha', 'LOG OUT')";
                $cnx->execute($SQL);
            }
            $cnx->close();
        }

        session_unset();  // Limpiar todas las variables de sesión
        session_destroy();  // Destruir la sesión
    }
}

// $misesion = new Sesion();
// $misesion->inicioLogin("usuario1@mail.com");
// echo $misesion->estadoLogin();echo"<br/>";
// $misesion->finLogin();
// echo $misesion->estadoLogin();echo"<br/>";
// $misesion->inicioLogin("pedro");
// echo $misesion->estadoLogin();echo"<br/>";
