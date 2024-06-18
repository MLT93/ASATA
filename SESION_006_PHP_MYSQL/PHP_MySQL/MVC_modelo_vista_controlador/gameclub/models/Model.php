<?php

class Model
{
    // Propiedades
    private $connection;

    // Constructor
    public function __construct()
    {

        // Instanciamos `\mysqli` para crear conexión a la base de datos
        $this->connection = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // ESTO ES PARA GESTIONAR POSIBLES ERRORES DE CONEXIÓN
        if ($this->connection->connect_error) {
            echo 'Error de conexión: ' . $this->connection->connect_error;
        }
    }

    // Getters y Setters
    protected function getConnection()
    {
        return $this->connection;
    }
    protected function setConnection($con)
    {
        $this->connection = $con;
    }

    // Methods
    public function getVideojuegos()
    {
        $SQLsentence = "SELECT videojuegos.id, videojuegos.imagen, videojuegos.nombre, videojuegos.descripcion, generos.nombre AS gennombre, plataformas.nombre AS platnombre FROM videojuegos 
        INNER JOIN generos ON videojuegos.id_genero = generos.id 
        INNER JOIN plataformas ON videojuegos.id_plataforma = plataformas.id;";
        $registers = $this->connection->query($SQLsentence); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta solo la sentencia

        if ($registers->num_rows > 0) { // Si es mayor que 0 indica que devuelve algun registro
            $games = [];
            while ($row = $registers->fetch_assoc()) { // Convertimos cada uno de los registros en forma de array asociativo
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
        $registers = $this->connection->query($SQLsentence); // Utilizamos los métodos de la instancia `\mysqli`. `query` ejecuta la sentencia y devuelve cosas, `execute` ejecuta la sentencia solamente

        if ($registers->num_rows > 0) { // Si es mayor que 0 indica que devuelve algun registro
            $platforms = [];
            while ($row = $registers->fetch_assoc()) { // Convertimos cada uno de los registros en forma de array asociativo
                $platforms[] = $row;
            }
            return $platforms; // Devolvemos en forma de Matriz
        } else {
            return [];
        }
    }


    public function getGameById($id)
    {
        $SQLsentence = "SELECT * FROM videojuegos WHERE id = $id";
        $register = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($register->num_rows > 0) { // Si es mayor que 0 indica que devuelve algun registro

            return $register->fetch_assoc(); // Devuelve el registro en forma de array asociativo

        } else {
            return null;
        }
    }


    public function getPlataformaById($id)
    {
        $SQLsentence = "SELECT * FROM plataformas WHERE id = $id";
        $register = $this->connection->query($SQLsentence); // El método query es un método de la clase `\mysqli`

        if ($register->num_rows > 0) { // Si es mayor que 0 indica que devuelve algun registro

            return $register->fetch_assoc(); // Devuelve el registro en forma de array asociativo

        } else {
            return null;
        }
    }
}
