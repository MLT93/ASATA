<?php

// ! RECUERDA: los directorios de importación se tienen en cuenta desde este archivo porque todo se carga aquí

// DEFINO UNAS CONSTANTES CON LA INFORMACIÓN NECESARIA PARA CONECTARME A LA DB con `\mysqli`
// ? `DEFINE()` ESTRUCTURA NUEVAS VARIABLES CONSTANTES CON FORMATO CLAVE VALOR. POSEE 2 ARGUMENTOS
// 1. Key
// 1. Value
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gestion_almacen');

/*
  1. Este es el punto de entrada de mi aplicación desde el directorio raíz. Aquí se cargan todos los archivos
*/
require_once('./Router.php'); // Aquí llamo al enrutador para que gestione las rutas ("agente de tráfico")

$router = new Router();

// El método `addRoute()` añade un nuevo `Endpoint` a mi sitio
/*
  1. La ruta raíz o base, es el directorio base donde está alojado el proyecto (/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/gameclubExercise/)
  2. La ruta del host, es el servidor ('http://localhost')
  3. Por lo tanto, deberé escribir la ruta raíz más el `Endpoint` que yo desee (`/index`, `/create`, `/store`, `/detail{id}`) en el primer parámetro de `addRoute()`
  4. Elijo el controlador
  5. Elijo el método (action) 
*/
$router->addRoute( '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/', 'ProductoController', 'index');
$router->addRoute( '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/create', 'ProductoController', 'create');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/store', 'ProductoController', 'store');
$router->addRoute( '/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/detail/', 'ProductoController', 'queryParams'); // Aquí deberé pasarle el `Query Param` para que lo guarde en `$_GET`
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/productos/detail/{id}', 'ProductoController', 'pathVariables'); // Aquí deberé pasarle el `Path Variable`
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/', 'ProveedorController', 'index');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/create', 'ProveedorController', 'create');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/store', 'ProveedorController', 'store');
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/detail/', 'ProveedorController', 'queryParams'); // Aquí deberé pasarle el `Query Param` para que lo guarde en `$_GET`
$router->addRoute('/ASATA/TEACHER_FOLDER/SESIONES%20PHP/MVC/almacen/proveedores/detail/{id}', 'ProveedorController', 'pathVariables'); // Aquí deberé pasarle el `Path Variable`

// Obtener la ruta solicitada
$_SERVER["REQUEST_URI"]; // Esto devuelve toda la URI con las Query Params y todo
parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); // Esto devuelve un string con la URI sin Query Params
parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY); // Esto devuelve un string con los Query Params

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$query = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);

parse_str($query, $queryParams); // Esta función convierte el string en un array asociativo y lo guarda en la variable `$queryParams` que se asigna como segundo argumento
// print_r($queryParams);

// `dispatch` será el método que enrute la página y además maneje las `Query Params`
// $router->dispatch($uri); // Esta función ya no sirve porque utilizamos `dispatch2` que lo controla todo

// `dispatch2` será el método que enrute la página, además maneja las `Query Params` y las `Path Variables`
$router->dispatch2($uri);

// Si la variable `$queryParams` no está vacía, asocio los key/value que posea este array a la súper variable `$_GET` para que queden accesibles las Query Params en todo el proyecto
if (!empty($queryParams)) {
  foreach ($queryParams as $key => $value) {
    $_GET[$key] = $value;
  }
}
