<?php

// ? `NAMESPACE` SE USA PARA DEFINIR EL NOMBRE DE LA CARPETA O ESPACIO DONDE ESTOY
// `namespace` define el nombre del espacio (carpeta) donde estoy trabajando. Se define con Upper Camel Case
// Esto nos sirve para invocar clases desde otros archivos
// Básicamente sirven de contenedores para el código de PHP, de modo que cuando creemos elementos del lenguaje como constantes, funciones o clases, se queden en un ámbito más restringido, evitando colisiones o conflictos de nombres con otros elementos que puedas crear tú más adelante, otras personas de tu equipo o incluso otros desarrolladores
namespace Lib;

class Database
{
  public function connect()
  {
    echo "Conectado con la base de datos usando Lib/Database" . "<br/>";
  }
}
