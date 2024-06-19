<?php

// Importación de archivos
require_once('models/Model.php');


class PlatformsController
{

    public function index()
    {
        $model = new Model();
        $plataformas = $model->getPlataformas(); // La variable existirá en la view `plataformas.php`
        require("views/plataformas.php");
    }

    public function plataforma($id)
    {
        $model = new Model();
        $plataformaID = $model->getPlataformaById($id); // La variable existirá en la view `plataforma.php`
        require("views/plataforma.php");
    }
}
