<?php

//llamo a los archivos donde estaran las clases que quiero utilizar
require('lib/database.php');
require('core/database.php');

//esto llama a la clase database de lib
use Lib\Database as LibDatabase;
//esto llama a la clase database de core
use Core\Database as CoreDatabase;


$libdb = new LibDatabase();
$coredb = new CoreDatabase();

$libdb->connect();
$coredb->connect();

?>