<?php

// En este archivo genero las rutas para que el controlador envíe los datos del modelo a la lista

// 1º
// Vamos a definir una clase:
class Router
{
    // Definimos un método estático para enrutar las peticiones
    public static function route($url)
    {
        // Mediante un switch el método seleccionará qué hacer según el caso, en función de la url que le pasemos
        switch ($url) {
            case "/":
                // 1. Llamo al controlador que quiero que gestione esa página
                require "controllers/videogamesControler.php";
                // 2. Genero una instancia
                $controller = new VideogamesControllers();
                // 3. Uso el método con el que renderizamos la página
                $controller->index();
                // 4. Para que salga del bucle:
                break;

                // 5. Para la lista detallada:
            case "/gamesdetail":
                require "controllers/videogamesControler.php";
                $controller = new VideogamesControllers();
                // Llamamos a método específico
                $controller->gamesDetail();
                break;

            case "/plataformas":
                // 6. Creamos un nuevo controlador para las plataformas. Lo correcto es un controlador por cada tabla
                require "controllers/platformsController.php";
                $controller = new PlatformsController();
                $controller->index();
                break;

            case "/game":
                // 7. Creamos un nuevo controlador para los juegos. Lo correcto es un controlador por cada tabla
                require "controllers/videogamesControler.php";
                $controller = new VideogamesController();
                $controller->index();
                break;

                // Si no encuentra la ruta:
            default:
                echo "404 - Página no encontrada";
                break;
        }
    }
}
