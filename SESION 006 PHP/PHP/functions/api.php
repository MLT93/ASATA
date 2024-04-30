<?php

// ? CREACIÓN DE CRUD Y EXPLICACIÓN

function GET($URL_ENDPOINT)
{
  // Crea un nuevo recurso cURL con el que me voy a comunicar. Puede recibir parámetros o no
  $ch = curl_init();

  // Establece la URL y otras opciones apropiadas
  /* 1 Recurso cURL de comunicación */
  /* 2 Setter de las opciones de configuración */
  /* 3 Endpoint al cual acceder */
  curl_setopt($ch, CURLOPT_URL, $URL_ENDPOINT);

  // Establece la URL y otras opciones apropiadas
  /* 1 Recurso cURL de comunicación */
  /* 2 Setter de las opciones de configuración */
  /* 3 `0` o `1` como `false` o `true` */
  /* Con el método GET, no hace falta poner esto en `true` o `1` */
  curl_setopt($ch, CURLOPT_HEADER, false);

  // Establece la URL y otras opciones apropiadas
  /* 1 Recurso cURL de comunicación */
  /* 2 Setter de las opciones de configuración */
  /* 3 `0` o `1` como `false` o `true` */
  /* Devuelve `string` */
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  // Captura la URL y la envía al navegador
  $response = curl_exec($ch);

  // Convierte a `JSON` y lo parsea
  $data = json_decode($response, true); // Es un `JSON.stringify()` y `JSON.parse()` en JavaScript

  // Cerrar el recurso cURL y libera recursos del sistema
  curl_close($ch);

  // Devuelvo el resultado
  return $data;
};

function POST($URL_ENDPOINT)
{
  $response = "";
};

function PUT($URL_ENDPOINT)
{
  $response = "";
};

function DELETE($URL_ENDPOINT)
{
  $response = "";
};
