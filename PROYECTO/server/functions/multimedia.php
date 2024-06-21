<?php

function redimensionarImagen($rutaOriginal, $rutaDestino, $nuevoAncho, $nuevoAlto){

    //obtengo las dimensiones originales de la imagen
    //asigno a 3 variables usando la función list
    list($anchoOriginal, $altoOriginal, $tipoImagen) = getimagesize($rutaOriginal);


    //crea una nueva imagen vacia
    $imagenRedimensionada = imagecreatetruecolor($nuevoAncho,$nuevoAlto);


    //crear una imagen desde el archivo original segun el tipo de imagen
    // $tipoImagen puede tomar distintos valores
    //  IMAGETYPE_JPEG
    //  IMAGETYPE_PNG
    //  IMAGETYPE_GIF

    switch($tipoImagen){
        case IMAGETYPE_JPEG:
            $imagenOriginal = imagecreatefromjpeg($rutaOriginal);
            break;
        case IMAGETYPE_PNG:
            $imagenOriginal = imagecreatefrompng($rutaOriginal);
            break;
        case IMAGETYPE_GIF:
            $imagenOriginal = imagecreatefromgif($rutaOriginal);
            break;
        default:
            echo "tipo imagen no soportado";
    }

    //redimensionamos la imagen original y la copiamos a la nueva imagen
    imagecopyresampled($imagenRedimensionada, $imagenOriginal, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $altoOriginal);
    //la variable $imagenRedimensionada, ya tiene la imagen en el formato deseado

    //guardamos esa imagen en la ruta destino según el tipo de imagen
    switch($tipoImagen){
        case IMAGETYPE_JPEG:
            imagejpeg($imagenRedimensionada, $rutaDestino);
            break;
        case IMAGETYPE_PNG:
            imagepng($imagenRedimensionada, $rutaDestino);
            break;
        case IMAGETYPE_GIF:
            imagegif($imagenRedimensionada, $rutaDestino);
            break;
        default:
            echo "Tipo de imagen no soportado";

    }

    //liberarmemoria
    imagedestroy($imagenOriginal);
    imagedestroy($imagenRedimensionada);

}

function redimensionarYCortarImagen($rutaOriginal, $rutaDestino, $tamañoCuadrado){

    //obtengo las dimensiones originales de la imagen
    //asigno a 3 variables usando la función list
    list($anchoOriginal, $altoOriginal, $tipoImagen) = getimagesize($rutaOriginal);

    // Calculo la relación de aspecto
    $ratioOriginal = $anchoOriginal / $altoOriginal;

    // Calculo el nuevo tamaño manteniendo la relación de aspecto
    if ($ratioOriginal > 1) {
        // La imagen es más ancha que alta
        $nuevoAlto = $tamañoCuadrado;
        $nuevoAncho = $tamañoCuadrado * $ratioOriginal;
    } else {
        // La imagen es más alta que ancha
        $nuevoAncho = $tamañoCuadrado;
        $nuevoAlto = $tamañoCuadrado / $ratioOriginal;
    }
    
    //crea una nueva imagen vacia
    $imagenRedimensionada = imagecreatetruecolor($nuevoAncho,$nuevoAlto);


    //crear una imagen desde el archivo original segun el tipo de imagen
    // $tipoImagen puede tomar distintos valores
    //  IMAGETYPE_JPEG
    //  IMAGETYPE_PNG
    //  IMAGETYPE_GIF

    switch($tipoImagen){
        case IMAGETYPE_JPEG:
            $imagenOriginal = imagecreatefromjpeg($rutaOriginal);
            break;
        case IMAGETYPE_PNG:
            $imagenOriginal = imagecreatefrompng($rutaOriginal);
            break;
        case IMAGETYPE_GIF:
            $imagenOriginal = imagecreatefromgif($rutaOriginal);
            break;
        default:
            echo "tipo imagen no soportado";
    }

   // Redimensionamos la imagen original y la copiamos a la nueva imagen
   imagecopyresampled($imagenRedimensionada, $imagenOriginal, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $altoOriginal);

   // Calcular las coordenadas para recortar una sección cuadrada centrada
   $xRecorte = ($nuevoAncho - $tamañoCuadrado) / 2;
   $yRecorte = ($nuevoAlto - $tamañoCuadrado) / 2;

   // Crea una nueva imagen cuadrada
   $imagenCuadrada = imagecreatetruecolor($tamañoCuadrado, $tamañoCuadrado);

   // Copiar y recortar la sección cuadrada centrada de la imagen redimensionada
   imagecopyresampled($imagenCuadrada, $imagenRedimensionada, 0, 0, $xRecorte, $yRecorte, $tamañoCuadrado, $tamañoCuadrado, $tamañoCuadrado, $tamañoCuadrado);

    //guardamos esa imagen en la ruta destino según el tipo de imagen
    switch($tipoImagen){
        case IMAGETYPE_JPEG:
            imagejpeg($imagenRedimensionada, $rutaDestino);
            break;
        case IMAGETYPE_PNG:
            imagepng($imagenRedimensionada, $rutaDestino);
            break;
        case IMAGETYPE_GIF:
            imagegif($imagenRedimensionada, $rutaDestino);
            break;
        default:
            echo "Tipo de imagen no soportado";

    }

    //liberarmemoria
    imagedestroy($imagenOriginal);
    imagedestroy($imagenRedimensionada);
    imagedestroy($imagenCuadrada);
}

function limpiarCadena($cadena) {
 // Reemplazar letras con tildes por letras sin tildes
 $acentos = array(
     'á' => 'a', 'é' => 'e', 'í' => 'i', 'ó' => 'o', 'ú' => 'u',
     'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
     'ñ' => 'n', 'Ñ' => 'N'
 );
 $cadena = strtr($cadena, $acentos);

 // Eliminar espacios y caracteres extraños que no sean letras del alfabeto latino básico o números
 $cadena = preg_replace('/[^a-zA-Z0-9.]/', '', $cadena);

 return $cadena;
}

?>