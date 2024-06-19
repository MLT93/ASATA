<?php

// ! RECUERDA: los directorios de importación se tienen en cuenta desde este archivo porque todo se carga aquí

// DEFINO UNAS CONSTANTES CON LA INFORMACIÓN NECESARIA PARA CONECTARME A LA DB con `\mysqli`
// ? `DEFINE()` ESTRUCTURA NUEVAS VARIABLES CONSTANTES CON FORMATO CLAVE VALOR. POSEE 2 ARGUMENTOS
// 1. Key
// 1. Value
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gestion_fichajes');

/*
  1. Este es el punto de entrada de mi aplicación desde el directorio raíz. Aquí se cargan todos los archivos
*/
require_once('./Router.php'); // Aquí llamo al enrutador para que gestione las rutas ("agente de tráfico")

$router = new Router();

// El método `addRoute` añade una nuevo endpoint a mi sitio
/*
  1. La ruta principal comienza desde la ruta raíz de mi proyecto (desde el host del servidor). En este caso es 'localhost'
  2. elijo el controlador
  3. elijo el método (action) 
*/
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/', 'Controller', 'index');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/create', 'Controller', 'create');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/store', 'Controller', 'store');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/fichajes/detail', 'Controller', 'detail');

// Obtener la ruta solicitada
$_SERVER["REQUEST_URI"]; // Esto devuelve toda la URI con las Query Params y todo
parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); // Esto devuelve la URI sin Query Params
parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY); // Esto devuelve un string con los Query Params

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$query = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);

// `dispatch` será el método que enrute la página
$router->dispatch($uri);

// Si la variable `$queryParams` no está vacía, asocio los key/value que posea el array a la súper variable `$_GET` para que queden accesibles en todo el proyecto
if (!empty($queryParams)) {
  foreach ($queryParams as $key => $value) {
    $_GET[$key] = $value;
  }
}
