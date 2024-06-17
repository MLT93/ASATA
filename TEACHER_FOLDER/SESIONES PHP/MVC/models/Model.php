<?php


// DEFINO UNAS CONSTANTES CON LA INFORMACIÓN NECESARIA PARA CONECTARME A LA BD con `\mysqli`

// ? `DEFINE()` ESTRUCTURA NUEVAS VARIABLES CONSTANTES CON FORMATO CLAVE VALOR. POSEE 2 ARGUMENTOS
// 1. Key
// 1. Value
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gameclub');

class Model
{

    // propiedades
    private $connection;

    // getters y setters

    protected function getConnection()
    {
        return $this->connection;
    }
    protected function setConnection($con)
    {
        $this->connection = $con;
    }


    // constructor

    public function __construct()
    {

        // Instanciamos `\mysqli`
        $this->connection = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // ESTO ES PARA GESTIONAR POSIBLES ERRORES DE CONEXIÓN
        if ($this->connection->connect_error) {
            echo 'Error de conexión: ' . $this->connection->connect_error;
        }
    }

    public function getVideojuegos()
    {
        $SQLsentence = "SELECT videojuegos.imagen, videojuegos.nombre, videojuegos.descripcion, generos.nombre AS gennombre, plataformas.nombre AS platnombre FROM videojuegos 
        INNER JOIN generos ON videojuegos.id_genero = generos.id 
        INNER JOIN plataformas ON videojuegos.id_plataforma = plataformas.id;";
        $registers = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($registers->num_rows > 0) { // Indica que me devuelve algun registro
            $games = [];
            while ($row = $registers->fetch_assoc()) { // Devuelve cada uno de los registros en forma de array asociativo
                $games[] = $row;
            }
            return $games; // Juegos en forma matriz

        } else {
            return [];
        }
    }


    public function getPlataformas()
    {
        $SQLsentence = "SELECT * FROM plataformas";
        $registers = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($registers->num_rows > 0) { // Indica que me devuelve algun registro
            $platforms = [];
            while ($row = $registers->fetch_assoc()) { // Devuelve cada uno de los registros en forma de array asociativo
                $platforms[] = $row;
            }
            return $platforms; // Juegos en forma matriz

        } else {
            return [];
        }
    }


    public function getGameById($id)
    {
        $SQLsentence = "SELECT * FROM videojuegos WHERE id = $id";
        $register = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($register->num_rows > 0) { // Indica que me devuelve algun registro

            return $register->fetch_assoc(); // Devuelve el registro en forma de array asociativo

        } else {
            return null;
        }
    }


    public function getPlataformaById($id)
    {
        $SQLsentence = "SELECT * FROM plataformas WHERE id = $id";
        $register = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($register->num_rows > 0) { // Indica que me devuelve algun registro

            return $register->fetch_assoc(); // Devuelve el registro en forma de array asociativo

        } else {
            return null;
        }
    }
}
