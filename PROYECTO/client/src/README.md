- [**Ejemplo de app con React y PHP (13_all)**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Ejemplo de app con React y PHP video (13_all)**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Ejemplo de Registro, Login y Logout hecho con React y PHP**](https://github.com/stutzerik/reactjs-php-login-system/blob/main/frontend/src/components/Register.jsx)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)

- [**Explicación de Formularios en React**](https://www.escuelafrontend.com/formularios-en-react)

- [**Explicación de uso de Axios**](https://www.freecodecamp.org/espanol/news/como-usar-axios-con-react/)

- [**Explicación del esquema de Response de Axios**](https://axios-http.com/es/docs/res_schema)

- [**Explicación y ejemplo de peticiones simultáneas con Axios**](https://stackoverflow.com/questions/61385454/how-to-post-multiple-axios-requests-at-the-same-time)

- [**Ejemplo de petición POST con Axios**](https://axios-http.com/es/docs/post_example)

- [**Explicación de envío información desde React a PHP**](https://es.stackoverflow.com/questions/382885/api-php-no-recibe-valores-desde-axios)

- [**Explicación de uso de CORS client y server**](https://stackoverflow.com/questions/65218218/react-php-blocked-my-cors-policy-only-in-post-request)

- [**Explicación de package REACT-TOASTIFY**](https://github.com/urian121/Implementa-Alertas-con-React-Toastify)

- [**Explicación video de react-toastify**](https://www.youtube.com/watch?v=hazBM39NL3s)

- [**Explicación video para crear tus propios toastify**](https://www.youtube.com/watch?v=qlHSvwHpwaA)

- **Ejemplo de Uncontrolled Form React:**

```typescript
import React, { ChangeEvent } from "react";

export function UncontrolledForm() {
  const [values, setValues] = React.useState({
    email: "",
    password: "",
  });

  const handleSubmit = (evt: {
    target: EventTarget;
    preventDefault: () => void;
  }) => {
    /*
      1. Previene el comportamiento default de los formularios el cual recarga el sitio
    */
    evt.preventDefault();

    /* Aquí puedes usar values para enviar la información */
    console.log(values);
  };

  function handleChange(evt: ChangeEvent<HTMLInputElement>) {
    /*
      1. evt.target es el elemento que ejecuto el evento name identifica el input y value describe el valor actual
    */
    const { target } = evt;
    const { name, value } = target;

    /*
      1. Clona el estado actual
      2. Reemplaza solo el valor del
         input que ejecutó el evento
    */
    const newValues = {
      ...values,
      [name]: value,
    };

    // Sincroniza el estado de nuevo
    setValues(newValues);
  }

  return (
    <form onSubmit={handleSubmit}>
      <label htmlFor="email">Email</label>
      <input
        id="email"
        name="email"
        type="email"
        value={values.email}
        onChange={handleChange}
      />
      <label htmlFor="password">Password</label>
      <input
        id="password"
        name="password"
        type="password"
        value={values.password}
        onChange={handleChange}
      />
      <button type="submit">Sign Up</button>
    </form>
  );
}
```

- **Ejemplo de Controlled Form React:**

```typescript
import React, { FormEvent } from "react";

export function ControlledForm() {
  const formRef = React.useRef<HTMLFormElement>(null);

  function handleSubmit(evt: FormEvent<HTMLFormElement>) {
    evt.preventDefault();

    if (formRef.current) {
      /* 
        1. Usamos FormData para obtener la información
        2. FormData requiere la referencia del DOM, gracias al REF API podemos pasar esa referencia
        3. Finalmente obtenemos los datos serializados
      */
      const formData = new FormData(formRef.current);
      const values = Object.fromEntries(formData.entries());

      // Aquí puedes usar values para enviar la información
      console.log(values);
    }
  }

  return (
    <form onSubmit={handleSubmit} ref={formRef}>
      <label htmlFor="email">Email</label>
      <input id="email" name="email" type="email" />
      <label htmlFor="password">Password</label>
      <input id="password" name="password" type="password" />
      <button type="submit">Submit</button>
    </form>
  );
}
```

- **Validación de Form React:**

```typescript
import React, { ChangeEvent } from "react";

const emailRegexp = new RegExp(/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/);

export function Form() {
  const [emailField, setEmailField] = React.useState({
    value: "",
    hasError: false,
  });

  function handleChange(evt: ChangeEvent<HTMLInputElement>) {
    /*
      1. evt.target es el elemento que ejecuta el evento y obtiene los valores de los inputs (por eso lo desestructuramos)
      2. `name` identifica el atributo name del input, `value` describe el valor actual, `type` es el tipo de input y `checked` es el valor booleano que adquieren los checkbox
    */
    const { name, value, type, checked } = evt.target;

    /*
      3. Clona el estado actual
      4. Reemplaza solo el valor del
         input que ejecutó el evento
      5. Sincroniza el estado del nuevo valor con `setUser`
    */
    type === "checkbox"
      ? setEmailField({ ...emailField, [name]: checked })
      : setEmailField({ ...emailField, [name]: value });
  }

  function handleBlur() {
    /* 
      1. Evaluamos de manera sincrona si el valor del campo no es un correo valido.
      2. Recordar que este método se llama cada vez que abandonamos el campo y evita
      que el usuario reciba un error sin haber terminado de poner el valor.
    */

    const hasError = !emailRegexp.test(emailField.value);
    setEmailField((prevState) => ({ ...prevState, hasError }));
  }

  return (
    <form>
      <label htmlFor="email">Email</label>
      <input
        id="email"
        name="email"
        value={emailField.value}
        onChange={handleChange} // onChange para sincronizar el valor del campo
        onBlur={handleBlur} // onBlur para sincronizar la validación del campo
        aria-errormessage="emailErrorID"
        aria-invalid={emailField.hasError}
      />
      {/* 1. Solo muestra el mensaje de error cuando hasError sea true 2. Crea una relación lógica entre el campo y el mensaje de error, favoreciendo la semántica y la accesibilidad del campo */}
      <p
        id="msgID"
        aria-live="assertive"
        style={{ visibility: emailField.hasError ? "visible" : "hidden" }}>
        Please enter a valid email
      </p>
    </form>
  );
}
```

- **Ejemplo de código PHP 1**

```php
<?php
// Establecer encabezados CORS para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application, X-API-KEY, Access-Control-Request-Method");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");

require('configBD.php');
$metodo = $_SERVER['REQUEST_METHOD'];
$tbl_amigos = 'tbl_amigos';
$dirLocal = "fotos_amigos";
$extensionesPermitidas = array("jpg", "jpeg", "png", "gif");

switch ($metodo) {
    case 'GET':
        $query = "SELECT * FROM $tbl_amigos ORDER BY id DESC";
        $resultado = mysqli_query($con, $query);

        $usuarios = array();
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $usuarios[] = $fila;
        }
        echo json_encode($usuarios);
        break;

    case 'POST':
        if (isset($_FILES['avatar'])) {
            $archivoTemporal = $_FILES['avatar']['tmp_name'];
            $nombreArchivo = $_FILES['avatar']['name'];

            $extension = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));

            if (in_array($extension, $extensionesPermitidas)) {
                // Generar un nombre único y seguro para el archivo
                $nombreArchivo = substr(md5(uniqid(rand())), 0, 10) . "." . $extension;
                $rutaDestino = $dirLocal . '/' . $nombreArchivo;

                // Mover el archivo a la ubicación deseada
                if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
                    $nombre = ucwords($_POST['nombre']);
                    $email = trim($_POST['email']);
                    $telefono = trim($_POST['telefono']);

                    $query = "INSERT INTO $tbl_amigos (nombre, email, telefono, avatar) VALUES ('$nombre', '$email', '$telefono', '$nombreArchivo')";
                    if (mysqli_query($con, $query)) {
                        // Consultar el último amigo insertado
                        $lastInsertedId = mysqli_insert_id($con);
                        $selectQuery = "SELECT * FROM $tbl_amigos WHERE id = $lastInsertedId";
                        $result = mysqli_query($con, $selectQuery);
                        $lastAmigo = mysqli_fetch_assoc($result);

                        // Devolver los detalles del último amigo como JSON
                        echo json_encode($lastAmigo);
                    } else {
                        echo json_encode(array('error' => 'Error al crear amigo: ' . mysqli_error($con)));
                    }
                } else {
                    echo json_encode(array('error' => 'Error al mover el archivo'));
                }
            } else {
                echo json_encode(array('error' => 'Tipo de archivo no permitido'));
            }
        }
        break;
}
mysqli_close($con);
```

- **Ejemplo de código PHP 2:**

```php
<?php
//* PERMITO CORS DE UNA DIRECCIÓN URL ESPECÍFICA */
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token, Origin, Application, X-API-KEY, Access-Control-Request-Method");
header("Allow: GET, POST, PUT, PATCH, DELETE, OPTIONS");

//* OBTENGO LA INFORMACIÓN DEL SERVIDOR */
// var_dump($_SERVER);

//* OBTENGO LAS CREDENCIALES AUTH Y LA INFO AGREGADA EN EL HEADER */
if (isset($_SERVER)) {
  echo $_SERVER["PHP_AUTH_USER"] . "<br/>";
  echo $_SERVER["PHP_AUTH_PW"] . "<br/>";
  echo $_SERVER["HTTP_EMAIL"] . "<br/>";
} else {
  echo "<h3>No se ha recibido información</h3>";
}

$method = $_SERVER['REQUEST_METHOD'];
// var_dump($metodo);

switch ($method) {
  case 'GET':
    # code...
    break;
  case 'POST':
    # code...
    break;
  case 'PUT':
    # code...
    break;
  case 'DELETE':
    # code...
    break;

  default:
    # code...
    break;
}
```

- **Configurar CORS:**

Para realizar peticiones HTTP entre una aplicación React y un servidor PHP sin incurrir en problemas de CORS (Cross-Origin Resource Sharing), hay varias soluciones que puedes implementar. A continuación, se presentan algunas estrategias comunes:

1. `Configuración del Servidor PHP para Permitir CORS`

La forma más directa de resolver problemas de CORS es configurando el servidor PHP para permitir las solicitudes de origen cruzado. Puedes hacerlo agregando encabezados CORS en tu archivo PHP:

```php
<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

// Tu lógica de manejo de solicitudes aquí
?>
```

2. `Uso de un Proxy`

Otra forma de evitar problemas de CORS es configurando un proxy en tu servidor de desarrollo. Esto implica redirigir las solicitudes de tu aplicación React a través de un servidor proxy que hace la solicitud real al servidor PHP. Puedes configurar un proxy en tu proyecto `React` modificando el archivo `package.json` para redirigir las solicitudes de la API:

```json
{
  "name": "mi-app",
  "version": "1.0.0",
  "private": true,
  "dependencies": {
    "react": "^17.0.2",
    "react-dom": "^17.0.2",
    "react-scripts": "4.0.3"
  },
  "scripts": {
    "start": "react-scripts start",
    "build": "react-scripts build",
    "test": "react-scripts test",
    "eject": "react-scripts eject"
  },
  "proxy": "http://localhost:80" // Cambia esto por la URL de tu servidor PHP
}
```

3. `Uso de Nginx o Apache como Proxy`

Si tienes control sobre tu servidor web (por ejemplo, Nginx o Apache), puedes configurarlo para que actúe como un proxy inverso, redirigiendo las solicitudes desde tu aplicación React al servidor PHP.

- Configuración de Nginx

```nginx
server {
    listen 80;
    server_name tu_dominio.com;

    location / {
        proxy_pass http://localhost:3000; # Puerto donde corre tu app React
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection 'upgrade';
        proxy_set_header Host $host;
        proxy_cache_bypass $http_upgrade;
    }

    location /api/ {
        proxy_pass http://localhost:80; # Puerto donde corre tu servidor PHP
    }
}
```

- Configuración de Apache

En tu archivo `.htaccess` o en la configuración de tu servidor Apache:

```apache
<IfModule mod_proxy.c>
    ProxyRequests Off
    <Proxy *>
        Order deny,allow
        Allow from all
    </Proxy>

    ProxyPass /api/ http://localhost:80/
    ProxyPassReverse /api/ http://localhost:80/
</IfModule>
```

4. `Hacer las Solicitudes desde el Mismo Dominio`

Si es posible, considera servir tanto tu aplicación React como tu servidor PHP desde el mismo dominio. Esto puede implicar configurar tu servidor web para servir ambos, el frontend y el backend, desde la misma raíz.

Ejemplo de Código React

A continuación, un ejemplo de cómo puedes realizar una solicitud HTTP desde React utilizando `axios`:

```typescript
import React, { useEffect, useState } from "react";
import axios from "axios";

const MyComponent: React.FC = () => {
  const [data, setData] = useState<any>(null);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await axios.get(
          "http://localhost/api/my-endpoint.php",
        );
        setData(response.data);
      } catch (err) {
        if (err instanceof Error) {
          setError(err.message);
        }
      }
    };

    fetchData();
  }, []);

  if (error) return <div>Error: {error}</div>;
  if (!data) return <div>Loading...</div>;

  return (
    <div>
      <h1>Data from PHP:</h1>
      <pre>{JSON.stringify(data, null, 2)}</pre>
    </div>
  );
};

export default MyComponent;
```
