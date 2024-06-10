<nav>

 <?php
    require_once("./classes/UsuarioDB.php");
    require_once("./functions/authentication.php");
    require_once("../vendor/autoload.php");

    use UserDB\Usuario as Usuario;
    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    //compruebo que el token existe en la cookie
    if(isset($_COOKIE['jwt'])){
            //compruebo que las credenciales son correctas
        if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){
            $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
            // echo "<a href='./reg_alquiler.php'>🔑 ALQUILA</a>";
            echo "<a href='./garaje.php'>🚙 GARAJE</a>";
            echo "<a href='./lista_alquileres.php'>🗒️HISTORIAL ALQUILERES</a>";
            echo "<a href='./lista_facturas.php'>🗒️HISTORIAL FACTURAS</a>";
        }
    }else{
        echo "<a href='./0_login.php'> LOGIN</a>";
        echo "<a href='./0_registro.php'> REGISTRO</a>";
    }

?>

 
</nav>
