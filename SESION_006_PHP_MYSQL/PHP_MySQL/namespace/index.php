<?php

// ? `INCLUDE` o `REQUIRE` IMPORTAN LOS ARCHIVOS QUE DESEO utilizar
// `include` o `require` no tienen casi diferencias. Lo único que cambia es el tipo de error que devuelven si no encuentran el archivo o está vacía la información
// Llamo a los archivos donde tengo la información que deseo utilizar
include("./core/database1.php");
require("./lib/database2.php");

// ? `USE`
// `use`
// Utilizar los namespace
// use Namespace\Class as CualquierPseudonimo
use Core\Database as CoreDatabase;
use Lib\Database as LibDatabase;

// Asigno una variable para poder usar las instancias más cómodamente
$coreDB = new CoreDatabase();
$libDB = new LibDatabase();

// Utilizo lo que deseo de las instancias
$coreDB->connect();
$libDB->connect();
