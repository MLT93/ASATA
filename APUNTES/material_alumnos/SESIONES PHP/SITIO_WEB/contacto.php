<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content="LOGIN "/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>CONTACTO</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>


<body>

 <?php
//activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
  ob_start();
  require_once("../vendor/autoload.php");


  require("./html_modules/header.php");
  require("./html_modules/nav.php");

    //Inicializo dompdf y genero una instancia
    use Dompdf\Dompdf;
    // instantiate and use the dompdf class
    $dompdf = new Dompdf();



    //creo un contenido para mi página HTML
    $html = "<html><body><h1>Hola mundo</h1><p>PDF generado desde HTML</p>  </body></html>";
    //lo cargo en la instancia
    $dompdf->loadHtml($html);

    //defino formato del PDF y su orientación
    $dompdf->setPaper("A4",'portrait');

    //renderizo el documento
    $dompdf->render();

    echo '<h2>Se ha generado un pdf en: "repo/pdf/contacto".date("Y-m-d.His").".pdf"</h2>'; 
    file_put_contents("repo/pdf/contacto".date('Y-m-d.His').".pdf", $dompdf->output()   );





  require("./html_modules/footer.php");
 ?>

</body>
</html>