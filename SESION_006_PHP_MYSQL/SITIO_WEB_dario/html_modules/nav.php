<nav>

    <!-- <a href="./lista_videojuegos.php">VIDEOJUEGOS</a> -->
    <!-- <a href="./actual_user.php">ACTUALIZAR USUARIO</a> -->
    <!-- <a href="./user_info.php"> INFO USUARIO</a> -->
    <!-- <a href="./lista_alquileres.php">LISTA ALQUILERES</a> -->
    <!-- <a href="./lista_valoraciones.php">LISTA VALORACIONES</a> -->
    <!-- <a href="./0_logout.php"> LOG OUT</a> -->
    <!-- <a href="./contacto.php"> CONTACTO</a> -->
    <!-- <a href="./reg_videojuego.php">REG VIDEOJUEGO</a> -->
    <!-- <a href="./reg_alquiler.php">REG ALQUILER</a> -->
    <!-- <a href="./reg_valoracion.php">REG VALORACION</a> -->


    <?php
    require_once("./classes/UsuarioDB.php");
    require_once("./functions/authentication.php");
    require_once("../vendor/autoload.php");

    use UserDB\Usuario as Usuario;

    $dotenv = Dotenv\Dotenv::createImmutable("./");
    $dotenv->load();

    // //compruebo que el token existe en la cookie
    if (isset($_COOKIE['jwt'])) {
        //     //compruebo que las credenciales son correctas
        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {
            $infoUsuario = Usuario::mostrarUsuario($_SESSION['usuario']);
            echo "<a href='./lista_alquileres.php'>✔️ Alquileres " . $infoUsuario['nombre'] . "</a>";
            echo "<a href='./lista_valoraciones.php'>🗳️ Valoraciones " . $infoUsuario['nombre'] . "</a>";
            echo "<a href='./lista_videojuegos.php'>🎮 VIDEOJUEGOS</a>";
            // echo "<a href='./reg_alquiler2.php'>⏏️ ALQUILAR</a>";
            // echo "<a href='./reg_compra.php'>⏏️ COMPRAR</a>";
            echo "<a href='./catalogo.php'>⏏️ CATALOGO</a>";
            echo "<a href='./reg_valoracion.php'>⏏️ VALORACIÓN</a>";


            if ($infoUsuario['id_rol'] == 1) {
                echo "<a href='./reg_videojuego.php'>⏏️ VIDEOJUEGO</a>";
            }

            
            // echo "<a href='./paypal.php'>💲 PAYPAL</a>";
        }
    } else {
        echo "<a href='./0_login.php'> LOGIN</a>";
        echo "<a href='./0_registro.php'> REGISTRO</a>";
    }

    ?>


</nav>
