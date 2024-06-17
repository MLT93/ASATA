<?php

// Aquí genero las rutas para que el controlador envíe los datos del modelo a la vista

class Router
{

    // Definimos un método estatico para enrutar las peticiones
    public static function route($url_pagina)
    {
        // Mediante un switch el método seleccionara que hacer dependiendo de la url que le pase

        /* 
            1. Si tuviésemos un Path Variable en una URL como `/game/:id`, donde `:id` puede tener el número de ID que sea, necesitaremos dividir esa URL
            2. Entonces utilizamos `explode` para dividir las partes de la URL y obtener las distintas partes
            3. Dividimos las partes de las rutas URL para poder acceder a los ID si los hubiera quitándole la barra inclinada y asignando los valores a un array
        */
        $arrPartsURL = explode("/", $url_pagina); // Array iterativo

        switch ($arrPartsURL[0]) {

            case "":
                // Llamo al controlador que quiero que gestione esa página
                require "controllers/VideogamesController.php";
                // Genero una instancia
                $controller = new VideogamesController();
                // Uso el método con el que renderizar la página
                $controller->index(); // Esto carga la view `home.php`
                break;

            case "gamesdetail":
                require "controllers/VideogamesController.php";
                $controller = new VideogamesController();
                $controller->gamesDetail(); // Esto carga la view `detaillist.php`
                break;

            case "plataformas":
                require "controllers/PlatformsController.php";
                $controller = new PlatformsController();
                $controller->index(); // Esto carga la view `plataformas.php`
                break;

            case "game":
                if (isset($arrPartsURL[1])) {
                    require "controllers/VideogamesController.php";
                    $controller = new VideogamesController();
                    $controller->game($arrPartsURL[1]); // Esto carga la view `game.php`
                    break;
                }

            case "plataforma":
                if (isset($arrPartsURL[1])) {
                    require "controllers/PlatformsController.php";
                    $controller = new PlatformsController();
                    $controller->plataforma($arrPartsURL[1]); // Esto carga la view `plataforma.php`
                    break;
                }

            default:
                echo "404 - Página no encontrada";
                break;
        }
    }
}
