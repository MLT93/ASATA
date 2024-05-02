<?php

// ? `INCLUDE` o `REQUIRE` IMPORTAN LOS ARCHIVOS QUE DESEO utilizar
// `include` o `require` no tienen casi diferencias. Lo único que cambia es el tipo de error que devuelven si no encuentran el archivo o está vacía la información
// Llamo a los archivos donde tengo la información que deseo utilizar
include("./core/database1.php");
require("./lib/database2.php");

// ? `USE`
// `use`
// Utilizar los namespace
// use Namespace\Class as NombreCualquieraPseudonimo
use Core\Database as CoreDatabase;
use Lib\Database as LibDatabase;

// Les asigno una variable para poder usarlas más cómodamente
$coreDB = new CoreDatabase();
$libDB = new LibDatabase();

// Utilizo lo que deseo
$coreDB->connect();
$libDB->connect();
