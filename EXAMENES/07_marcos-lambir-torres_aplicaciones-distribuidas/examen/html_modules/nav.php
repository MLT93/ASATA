<nav>

    <?php
    require_once("../classes/UsuarioDB.php");
    require_once("../functions/authentication.php");
    require_once("../vendor/autoload.php");

    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();

    use GuzzleHttp\Client;

    // * Realizo petición a la API paypal para generar el access_token a través del user y password de la API. Esta info es enviada a través del Header con Basic Auth
    $client = new Client();

    // Guardo la info del Token en para poderla utilizar en más páginas
    // if (!isset($_SESSION['token'])) {
    // $_SESSION['token'] = $access_token;

    $clientID = 'AQ7BC8zbNCFXpLpmWON0D5ZYv6RzVFTHi9RL-jtSs_YIsEElMOIlTI1Nl8PCB7uTBRMYewSWvgJedkJ6';
    $clientSECRET = 'EHY1TneczlNLTwSQpLvV3HIW0fK6oJF4xXn37LN8Qv-oD2Nj8Qh3YgeZ0LC77izd6ljG_aQG07nOzuLm';

    // Aplico la estructura para codificar las credenciales para mandarlas como Basic Authentication
    // Codifico las credenciales en base64
    $credentials = $clientID . ":" . $clientSECRET;
    $encodeCredentials = base64_encode($credentials);

    // Definir Headers en un array
    $headers = [
        'Content-Type' => 'application/x-www-form-urlencode', // Al utilizar `x-www-form-urlencode` hay que pasar en el array `options` el `form_params => []` 
        'Authorization' => 'Basic ' . $encodeCredentials,
    ];

    // Juntar todo (si hubiese también un Body, lo juntaríamos en `$options`)
    $options = [
        'form_params' => [
            'grant_type' => 'client_credentials',
            'ignoreCache' => 'true'
        ],
        'headers' => $headers
    ];

    $URL_forAuth = 'https://api-m.sandbox.paypal.com/v1/oauth2/token';

    // Genero la petición
    $response = $client->request('POST', $URL_forAuth, $options);

    $data = $response->getBody();

    $data = json_decode($data);

    $access_token = $data->{'access_token'};
    // echo $access_token;

    //compruebo que el token existe en la cookie
    if (isset($_COOKIE['jwt'])) {

        //compruebo que las credenciales son correctas
        if (estadoAcceso($_COOKIE['jwt'], $_ENV['SIGNATURE_KEY'], $_ENV['CIPHER_KEY'])) {
            
            //agrego cookie del token para la API si el usuario es quien dice ser
            setcookie('token', $access_token, time() + 3600, "/"); // Duración de 1h (igual que la del usuario)

            $infoUsuario = \UserDB\Usuario::mostrarUsuario($_SESSION['usuario']);
            echo "<a href='./newpedido.php'>🍜 HAZ PEDIDO </a>";
            echo "<a href='./historial.php'>🗒️HISTORIAL PEDIDOS</a>";
            echo "<a href='./lista_facturas.php'>🗒️HISTORIAL FACTURAS</a>";
        }
    } else {
        echo "<a href='./0_login.php'> LOGIN</a>";
        echo "<a href='./0_registro.php'> REGISTRO</a>";
    }

    ?>


</nav>
