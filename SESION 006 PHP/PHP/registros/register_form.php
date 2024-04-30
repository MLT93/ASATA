<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Marcos Lambir Torres" />
  <meta name="description" content="JavaScript" />
  <meta name="keywords" content="Curso, Formación, Examen" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
  <link rel="shortcut icon" href="public/favicon.ico" type="image/x-icon" />
  <title>Registros</title>
</head>

<body>
  <header>
    <section>
      <div>
        <h1>REGISTRO DEL FORM PHP</h1>
      </div>
    </section>
  </header>

  <nav>
    <section>
      <div>
        <ul>
          <li>
            <a href="./log_register.php" title="Página Login">VER REGISTRO</a>
          </li>
        </ul>
      </div>
    </section>
  </nav>

  <main>
    <section>
      <div>
        <?php
        // Compruebo si las variables están definidas o no. Es para ver si el usuario ha escrito algo en los inputs
        if (isset($_REQUEST["user"]) && isset($_REQUEST["priority"]) && isset($_REQUEST["submit"])) {
          // Primero borro
          unset($user, $passwordUser, $captcha, $submitBtn);

          // Luego escribo
          $user = $_REQUEST["user"];
          $priority = $_REQUEST["priority"];
          $submitBtn = $_REQUEST["submit"];

          // Asigno el archivo subido a una variable para poderlo manejar más facilmente
          $archive = $_FILES["archive"];

          // ? `$_FILES`
          if ($_FILES["archive"]["error"] !== 0) {
            // Compruebo si el archivo se ha subido correctamente al servidor
            echo "Ha ocurrido un error al subir el archivo " . $archive["name"] . "<br/>";
          } else {
            // Ahora compruebo si el archivo es válido
            $archiveExtension = $archive["type"];

            if (
              strstr($archiveExtension, "jpg") == "jpg" ||
              strstr($archiveExtension, "jpeg") == "jpeg" ||
              strstr($archiveExtension, "png") == "png" ||
              strstr($archiveExtension, "gif") == "gif"
            ) {
              $archiveTemporalOriginLocation = $archive["tmp_name"];
              $archiveDestinyLocation = "./uploaded_img/" . date("d.m.y", intval(strtotime("now"))) . "_" . $archive["name"];

              // Copio desde el archivo temporal al de destino
              copy($archiveTemporalOriginLocation, $archiveDestinyLocation);

              echo "Has subido la imagen al servidor" . "<br/>";

              // Ahora escribo un `.log` para ver las acciones (subida/registro) realizadas
              $fichero = fopen("registro.log", "a+");

              $linea1 = "Usuario: " . $user;
              $linea2 = "Fecha: " . date("d/m/y", intval(strtotime("now")));
              $linea3 = "Archivo cargado: " .  $archive["name"];
              $linea4 = "Archivo origen: " .  $archive["tmp_name"];
              $linea5 = "Archivo destino: " . "./uploaded_img/";
              $linea6 = "*******************************************************************";

              fwrite($fichero, "$linea1 \r\n");
              fwrite($fichero, "$linea2 \r\n");
              fwrite($fichero, "$linea3 \r\n");
              fwrite($fichero, "$linea4 \r\n");
              fwrite($fichero, "$linea5 \r\n");
              fwrite($fichero, "$linea6 \r\n");

              fclose($fichero);
            }
          }
        }
        ?>
      </div>
    </section>
  </main>

  <script type="module" src="./js/script.js"></script>
</body>

</html>
