<?php

// ! RECUERDA: los directorios de importación se tienen en cuenta desde este archivo porque todo se carga aquí

// DEFINO UNAS CONSTANTES CON LA INFORMACIÓN NECESARIA PARA CONECTARME A LA DB con `\mysqli`
// ? `DEFINE()` ESTRUCTURA NUEVAS VARIABLES CONSTANTES CON FORMATO CLAVE VALOR. POSEE 2 ARGUMENTOS
// 1. Key
// 1. Value
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gameclub');

/*
  1. Este es el punto de entrada de mi aplicación desde el directorio raíz. Aquí se cargan todos los archivos
*/
require_once('./Router.php'); // Aquí llamo al enrutador para que gestione las rutas ("agente de tráfico")

/* 
  1. Aquí obtengo al URL. Si no, le paso la URL por defecto de la página principal (En este caso equivale a `""`)
  2. Para obtener esta variable deberé pasar a la URL una Query Param con esa key: `?url=<value_de_la_ruta_deseada>`
*/
$url_pagina = isset($_GET['url']) ? $_GET['url'] : "";


Router::route($url_pagina); // Llamo al método que gestiona las rutas propiamente ("dirección del tráfico")
