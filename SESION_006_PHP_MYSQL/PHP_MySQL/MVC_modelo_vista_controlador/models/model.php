<?php


//1º
//define(), función con dos parámetros, clave y valor
//Defino unas constantes con la información necesaria para conectar a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gameclub');

// 2º
class Model
{

    // 3º
    //Propiedades
    private $connection;

    // 5º
    // Getters y setters
    protected function getConnection()
    {
        return $this->connection;
    }

    protected function gsetConnection($con)
    {
        $this->connection = $con;
    }

    // 4º
    //Constructor. Generará una conexión mediante la creación de una instancia de mysqli
    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Para gestionar posibles errores de conexión:
        if ($this->connection->connect_error) {
            'Error de conexión: ' . $this->connection->connect_error;
        }
    }

    // 6º
    public function getVideojuegos()
    {
        $SQLsentence = "SELECT * FROM videojuegos";
        // Llamamos al método query de la clase mysqli. Esto ejecuta la siguiente sentencia en nuestra base de datos
        $registers = $this->connection->query($SQLsentence);

        // ¿Devuelve algún registro? Vemos si el número de filas es mayor que 0
        if ($registers->num_rows > 0) {
            // Si al menos tiene una fila lo guardo en la variable games
            $games = [];
            // Usamos el método fetch_assoc, que permite obtener una fila de resultados como un array asociativo
            while ($row = $registers->fetch_assoc()) {
                $games[] = $row;
            }
            return $games;
        } else {
            return [];
        }
    }

    // 7º
    public function getPlataformas()
    {
        $SQLsentence = "SELECT * FROM plataformas";
        // Llamamos al método query de la clase mysqli. Esto ejecuta la siguiente sentencia en nuestra base de datos
        $registers = $this->connection->query($SQLsentence);

        // ¿Devuelve algún registro? Vemos si el número de filas es mayor que 0
        if ($registers->num_rows > 0) {
            // Si al menos tiene una fila lo guardo en la variable games
            $plataformas = [];
            // Usamos el método fetch_assoc, que permite obtener una fila de resultados como un array asociativo
            while ($row = $registers->fetch_assoc()) {
                $plataformas[] = $row;
            }
            return $plataformas;
        } else {
            return [];
        }
    }

    // 8º
    public function getGameById($id)
    {
        $SQLsentence = "SELECT * FROM videojuegos WHERE id = $id";
        // Llamamos al método query de la clase mysqli. Esto ejecuta la siguiente sentencia en nuestra base de datos
        $registers = $this->connection->query($SQLsentence);

        // ¿Devuelve algún registro? Vemos si el número de filas es mayor que 0
        if ($registers->num_rows > 0) {
            // Si al menos tiene una fila lo guardo en la variable games
            $games = [];
            // Usamos el método fetch_assoc, que permite obtener una fila de resultados como un array asociativo
            while ($row = $registers->fetch_assoc()) {
                $games[] = $row;
            }
            return $games;
        } else {
            return [];
        }
    }
}
