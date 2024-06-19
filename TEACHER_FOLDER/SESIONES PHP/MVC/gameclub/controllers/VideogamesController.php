<?php

// Importación de archivos
require_once('models/Model.php');


class VideogamesController
{

    // Creo un método para enlazar el model con la vista
    public function index()
    {
        // Creamos una instancia de Model
        $model = new Model();
        // Obtener los datos usando el modelo y lso guardo en una variable
        $games = $model->getVideojuegos(); // La variable existirá en la view `home.php`
        // Requerir la vista (página) a renderizar
        require("views/home.php");
    }

    public function gamesDetail()
    {
        $model = new Model();
        $gamesDetail = $model->getVideojuegos(); // La variable existirá en la view `detaillist.php`
        require("views/detaillist.php");
    }

    public function game($id)
    {
        $model = new Model();
        $gameID = $model->getGameById($id); // La variable existirá en la view `game.php`
        require("views/game.php");
    }
}
