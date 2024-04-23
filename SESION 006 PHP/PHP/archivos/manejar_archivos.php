  <?php

  // ? `FOPEN()` ES EL MANEJADOR DE ARCHIVOS DE PHP

  // `fopen()` sirve para acceder a los archivos. Tiene 2 parámetros
  // 1 El archivo al que voy a acceder
  // 2 El método con el que voy a interactuar en el archivo (escribir al final: "a+", leer desde el principio: "r", )
  // Voy a abrir un archivo (.log, .txt, ...) para escribir en él
  $fichero = fopen("lorem_ipsum.txt", "a+");

  // ? `FWRITE()` ES EL QUE ESCRIBE EN LOS ARCHIVOS

  // `fwrite()` sirve para escribir en los archivos cuando he accedido a ellos. Tiene 2 parámetros
  // 1 El archivo con el método con el que voy a interactuar
  // 2 Lo que voy a escribir. Atento que en los archivos de texto los saltos de línea se realizan con `\r\n`
  // Voy a escribir
  $linea1 = 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenían pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.';
  $linea2 = 'Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer. Muchos paquetes de autoedición y editores de páginas web usan el Lorem Ipsum como su texto por defecto, y al hacer una búsqueda de "Lorem Ipsum" va a dar por resultado muchos sitios web que usan este texto si se encuentran en estado de desarrollo. Muchas versiones han evolucionado a través de los años, algunas veces por accidente, otras veces a propósito (por ejemplo insertándole humor y cosas por el estilo).';
  $linea3 = 'Al contrario del pensamiento popular, el texto de Lorem Ipsum no es simplemente texto aleatorio. Tiene sus raíces en una pieza clásica de la literatura del Latin, que data del año 45 antes de Cristo, haciendo que este adquiera mas de 2000 años de antiguedad. Richard McClintock, un profesor de Latin de la Universidad de Hampden-Sydney en Virginia, encontró una de las palabras más oscuras de la lengua del latín, "consecteur", en un pasaje de Lorem Ipsum, y al seguir leyendo distintos textos del latín, descubrió la fuente indudable. Lorem Ipsum viene de las secciones 1.10.32 y 1.10.33 de "de Finnibus Bonorum et Malorum" (Los Extremos del Bien y El Mal) por Cicero, escrito en el año 45 antes de Cristo. Este libro es un tratado de teoría de éticas, muy popular durante el Renacimiento. La primera linea del Lorem Ipsum, "Lorem ipsum dolor sit amet..", viene de una linea en la sección 1.10.32';
  $linea4 = 'El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es reproducido debajo para aquellos interesados. Las secciones 1.10.32 y 1.10.33 de "de Finibus Bonorum et Malorum" por Cicero son también reproducidas en su forma original exacta, acompañadas por versiones en Inglés de la traducción realizada en 1914 por H. Rackham.';

  fwrite($fichero, "\r\n $linea1 \r\n");
  fwrite($fichero, "$linea2 \r\n");
  fwrite($fichero, "$linea3 \r\n");
  fwrite($fichero, "$linea4 \r\n");

  // ? `FCLOSE()` ES EL QUE CIERRA EL PROCESO DE ESCRITURA

  // `fclose()` sirve para cerrar la escritura de archivos. Tiene 1 parámetro
  // 1 El archivo con el que estaba interactuando
  // Voy a dejar de escribir
  fclose($fichero);

  // ? AHORA LEEREMOS UN ARCHIVO

  echo "<h2>Información del archivo LOG</h2>";

  $doc = fopen("lorem_ipsum.txt", "r");

  // ? `FEOF()` NOS DICE SI ESTAMOS AL FINAL DEL ARCHIVO O NO

  // `feof()` devuelve true (1) cuando hemos llegado al final de archivo y false (0) si no lo hemos alcanzado todavía
  while (!feof($doc)) {

    // ? `FGETS()` TOMA UNA LINEA DEL ARCHIVO

    // `fgets()` obtiene una cadena . Tiene 2 parámetros
    // 1 El archivo de lectura
    // 2 Longitud de caracteres para leer. Si se omite, leerá hasta 1024 caracteres
    echo fgets($doc) . "<br />";
  }
