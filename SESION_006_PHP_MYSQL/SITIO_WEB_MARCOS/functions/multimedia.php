<?php

function redimensionarImagen($rutaOriginal, $rutaDestino, $nuevoAncho, $nuevoAlto)
{
  // Obtengo las dimensiones originales de la imagen
  // Asigno a 3 variables usando la función list
  list($anchoOriginal, $altoOriginal, $tipoImagen) = getimagesize($rutaOriginal);

  //crea una nueva imagen vacía
  $imagenRedimensionada = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

  // Crear una imagen desde el archivo original según el tipo de imagen
  // `$tipoImagen` puede tomar distintos valores: `IMAGETYPE_JPEG`, `IMAGETYPE_PNG`, `IMAGETYPE_GIF`
  switch ($tipoImagen) {
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
      echo "<h2 class='card'>Tipo de imagen no soportado</h2>" . "<br/>";
  }

  // Redimensionamos la imagen original y la copiamos a la nueva imagen
  imagecopyresampled($imagenRedimensionada, $imagenOriginal, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $altoOriginal);
  // `$imagenRedimensionada`, ya tiene la imagen en el formato deseado

  // Guardamos esa imagen en la ruta destino según el tipo de imagen
  switch ($tipoImagen) {
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
      echo "<h2 class='card'>Tipo de imagen no soportado</h2>" . "<br/>";
  }

  // Liberar memoria
  imagedestroy($imagenOriginal);
  imagedestroy($imagenRedimensionada);
}
