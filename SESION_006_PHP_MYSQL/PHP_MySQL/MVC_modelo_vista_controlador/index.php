<?php



// Este es el punto de entrada de mi aplicación desde el directorio raíz

// 1º Aquí llamo al enrutador para que gestione las rutas (como si fuera un agente de tráfico)
require_once('Router.php');

// 3º Aquí obtengo la url y si no que obtenga por defecto el valor del directorio principal
$url = isset($_GET['url']) ? $_GET['url'] : "/";

// 2º Llamo al método que gestona las rutas apropiuadamente (dirección del tráfico)
// Al ser un método estático lo llamamos simplemente así:
// En este caso no tenemos  $_GET['url'], sino  "/"
Router::route($url);
