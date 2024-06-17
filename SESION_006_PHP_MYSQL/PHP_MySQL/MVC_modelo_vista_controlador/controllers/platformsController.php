<?php
// 1º
// Poner a disposición del controlador el modelo
require_once('models/model.php');


// OJO A LA RUTAS, EL PUNTO DESDE EL QUE SE CARGAN SON EL INDEX
// 2º
// Clase
class PlatformsController
{
    // Creamos un método para enlazar el modelo con la vista
    public function index()
    {
        // 1. Creamos una instancia de Model
        $model = new Model();
        // 2. Obtener los datos usando el modelo y los guardo en una variables. Utlizamos el método getVideojuegos
        $plataformas = $model->getPlataformas();

        // 3º Requerir la vista (página) a renderizar
        require("views/home.php");
    }

    // 4º Para la lista detallada:
    public function plataformasDetail()
    {
        $model = new Model();
        $plataformasDetail = $model->getVideojuegos();
        require("views/detaillist.php");
    }

    // 5º Lista de plataformas
    public function plataformas()
    {
        $model = new Model();
        $gamesDetail = $model->getPlataformas();
        require("views/plataformas.php");
    }
}
