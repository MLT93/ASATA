<?php

// Este es el punto de entrada de mi aplicación desde el directorio raÍz

// Aquí llamo al enrutador para que gestione las rutas ( "agente de trafico" )
require_once('Router.php');

// Aquí obtengo al URL. Si no, le paso la URL por defecto de la página principal (En este caso equivale a `""`)
// Para obtener esta variable, deberé pasar una Query Param con esa clave: `?url=<ruta_deseada>`
$url_pagina = isset($_GET['url']) ? $_GET['url'] : "";

// Llamo al método que gestiona las rutas propiamente ( "direccion del trafico")
Router::route($url_pagina);
