<?php

namespace User;

class Usuario
{

    private static $usuarios = [];
    private static int $contador = 5;
    private int $id;
    private string $nombre;
    private string $email;
    private string $hashedPassword;

    // Base de datos ficticia en forma de matriz con passwords encriptadas
    public static function init()
    {
        self::$usuarios = [
            [
                "id" => 1,
                "mail" => "usuario1@example.com",
                "nombre" => "UsuarioUno",
                "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
            ],
            [
                "id" => 2,
                "mail" => "usuario2@example.com",
                "nombre" => "Usuario Dos",
                "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
            ],
            [
                "id" => 3,
                "mail" => "usuario3@example.com",
                "nombre" => "Usuario Tres",
                "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
            ],
            [
                "id" => 4,
                "mail" => "usuario4@example.com",
                "nombre" => "Usuario Cuatro",
                "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
            ],
            [
                "id" => 5,
                "mail" => "usuario5@example.com",
                "nombre" => "Usuario Cinco",
                "hashedPassword" => password_hash("pass11", PASSWORD_DEFAULT)
            ]
        ];
    }



    function __construct(string $nombre, string $email, string $password)
    {
        $this->init();
        if (!isset(self::$usuarios[$email])) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            self::$contador++;
            $nuevoUsuario = [
                'id' => self::$contador,
                'mail' => $email,
                'nombre' => $nombre,
                'hashedPassword' => $hashedPassword,
            ];
            array_push(self::$usuarios, $nuevoUsuario);

            $this->id = self::$contador;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->hashedPassword = $hashedPassword;

            echo "Has creado un nuevo usuario" . "<br/>"; // Usuario nuevo
        } else {
            echo "El usuario ya existe" . "<br/>";  // Usuario ya existe
        }
    }

    //GETTERS Y SETTERS
    protected function getUsuarios(): array
    {
        return self::$usuarios;
    }
    protected function getId(): int
    {
        return $this->id;
    }
    protected function getNom(): string
    {
        return $this->nombre;
    }
    protected function getEmail(): string
    {
        return $this->email;
    }
    protected function getPassword(): string
    {
        return $this->hashedPassword;
    }

    protected function setUsuarios(string $nombre, string $email, string $password)
    {
        $this->init();
        $indexOfSearchedUser = array_search($nombre, self::$usuarios);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        self::$contador++;
        $usuarioModificado = [
            'id' => self::$contador,
            'mail' => $email,
            'nombre' => $nombre,
            'hashedPassword' => $hashedPassword,
        ];
        array_splice(self::$usuarios, $indexOfSearchedUser, 1, $usuarioModificado);


        $this->id = self::$contador;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->hashedPassword = $hashedPassword;

        echo "Has modificado el usuario" . "<br/>"; // Usuario modificado
    }
    protected function setId(int $id)
    {
        $this->id = $id;
    }
    protected function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    protected function setEmail(string $email)
    {
        $this->email = $email;
    }
    protected function setPassword(string $hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }

    //2 MÉTODOS estáticos

    public static function mostrarIdUsuario(string $nombreUsuario)
    {
        // for ($i = 0; $i < count(self::$usuarios); $i++) {
        //     if (isset(self::$usuarios[$i]["mail"]) && self::$usuarios[$i]["nombre"] == $nombreUsuario) {
        //         return "El usuario tiene el siguiente id: " . self::$usuarios[$i]["id"] . "<br/>";
        //     }
        // }

        foreach (self::$usuarios as $i => $element) {
            if (isset(self::$usuarios[$i]["mail"]) && self::$usuarios[$i]["nombre"] == $nombreUsuario) {
                return "El usuario tiene el siguiente id: " . self::$usuarios[$i]["id"] . "<br/>";
            } elseif ($i == count(self::$usuarios) - 1) {
                return false;
            }
        }
    }

    public static function verificarUsuario(string $email, string $password)
    {
        // for ($i = 0; $i < count(self::$usuarios); $i++) {
        //     if (password_verify($password, self::$usuarios[$i]["hashedPassword"])) {
        //         echo "Password correcta." . "<br/>";
        //         break;
        //     } elseif ($email == self::$usuarios[$i]["mail"]) {
        //         return "La email es correcta." . "<br/>";
        //     } elseif ($i == count(self::$usuarios) - 1) {
        //         echo "Email o password incorrectos." . "<br/>";
        //     }
        // }

        foreach (self::$usuarios as $key => $value) {
            if (self::$usuarios[$key]["email"] == $email) {
                $msg = "";
                password_verify($password, self::$usuarios[$key]["hashedPassword"]) ? $msg = "OK" : $msg = "None";
                return $msg;
            } elseif ($key == count(self::$usuarios) - 1) {
                echo "<h3>Email o password incorrectos</h3>" . "<br/>";
            }
        }
    }
}

// $usuario6 = new Usuario("Pepe", "pepe@example.com", "123");
// $idUsuario6 = Usuario::mostrarIdUsuario("Pepe");
// $idUsuario5 = Usuario::mostrarIdUsuario("Usuario Cinco");
// echo $idUsuario5;
// echo $idUsuario6;
// Usuario::verificarUsuario("pepe@example.com", "123");
// Usuario::verificarUsuario("usuario5@example.com", "pass11");
