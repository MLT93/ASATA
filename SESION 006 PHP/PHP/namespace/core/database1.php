<?php

// ? `NAMESPACE` SE USA PARA DEFINIR EL NOMBRE DE LA CARPETA O ESPACIO DONDE ESTOY
// `namespace` define el nombre del espacio (carpeta) donde estoy trabajando. Se define con Upper Camel Case
namespace Core;

class Database {
  public function connect(){
    echo "Conectado con la base de datos usando Core/Database" . "<br/>";
  }
}
