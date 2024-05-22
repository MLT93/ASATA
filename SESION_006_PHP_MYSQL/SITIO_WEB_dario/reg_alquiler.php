<!DOCTYPE html>
<html>
<head>
 <meta charset="utf8"/>
 <meta name="author" content="DMA"/>
 <meta name="description" content=""/>
 <meta name="keywords" content="cursos, formación, desarrollo software"/>
 <title>REG ALQUILER</title>     
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 
 <!-- esta 4 etiquetas evitan que trabaje con los archivos js y css en caché -->
 <meta http-equiv="Expires" content="0">
 <meta http-equiv="Last-Modified" content="0">
 <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 <meta http-equiv="Pragma" content="no-cache">
 
 <script src="https://www.paypal.com/sdk/js?client-id=AXeihtzYXsJuQ7OixXB9JBVHsckwpCmg_oBrq1A5QU3CssXJuPzDOiBny7T3rOs3pTOfO42cR63gepCz>d"></script>
</head>


<body>

<?php
//activar el almacenamiento en búfer de salida. Esto recoge toda la salida del script hasta que decidas enviarla al navegador, permitiendo modificar las cabeceras en cualquier momento del script. 
 ob_start();
 //inicio una sesion
 session_start();

 //cabecera y nav
 require_once("./html_modules/header.php");
 require_once("./html_modules/nav.php");
 require_once("./classes/db.php");
 require_once("./classes/UsuarioDB.php");


 require_once("./functions/authentication.php");
 //incluir el autoloader del composer
 require_once("../vendor/autoload.php");

 use UserDB\Usuario as Usuario;
 use Database\Db as Db;

 
 if(isset($_COOKIE['jwt'])){


    if(estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])){


        //EL CONTENIDO DE MI PÁGINA IRIA DENTRO DE ESTE IF  
        //INICIA AQUI


        require_once("./html_modules/form_alquiler.php");

        if(isset($_REQUEST['alquilar'])){

            $idVideojuego = intval($_REQUEST['videojuego']);
            $idTarifa = $_REQUEST['tarifa']?2:1;
            $idMetodoPago= intval($_REQUEST['mpago']);

            $now = new DateTime();
            $fechaAlquiler = $now->format('Y-m-d');

            if($idTarifa == 1 ){
                $diaDevolucion =  $now->getTimestamp() + (2*24*60*60);
                $fechaDevolucion = date('Y-m-d', $diaDevolucion);
            }else{
                $diaDevolucion =  $now->getTimestamp() + (5*24*60*60);
                $fechaDevolucion = date('Y-m-d', $diaDevolucion);
            }

            $idUsuario = Usuario::mostrarIdUsuario($_SESSION['usuario']);

            $diaSemana = date('N');
            $idEmpleado = 0;

            switch($diaSemana){
                case 1:
                    $idEmpleado = 2;
                    break;
                case 2:
                    $idEmpleado = 5;
                    break;
                case 3:
                    $idEmpleado = 8;
                    break;
                case 4:
                    $idEmpleado = 11;
                    break;
                case 5:
                    $idEmpleado = 13;
                    break;
                case 6:
                    $idEmpleado = 11;
                    break;
                case 7:
                    $idEmpleado = 13;
                    break;
            }

            $cnx2 = new Db("localhost","root","","gameclubdario");
            $campos = ['fechaAlquiler', "id_usuario", "id_videojuego", "id_tarifas", "fechaDevolucion", "id_empleado", "id_metodoPago"];
            $data = [$fechaAlquiler,$idUsuario, $idVideojuego, $idTarifa, $fechaDevolucion,$idEmpleado,$idMetodoPago ];
            $cnx2->insertSingleRegister("alquileres",$campos,$data);

            header("Location: lista_alquileres.php");

            }
            //TERMINA AQUI
        }

    

 }else{
  http_response_code(401);//No autorizado.
  echo "<h2 class='card' >Acceso denegado. No se ha proporcionado un Token.</h2>";echo "<br/>";
 }


 require("./html_modules/footer.php");

 ?>

 </body>

</html>
