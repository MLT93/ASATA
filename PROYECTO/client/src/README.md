- [**Ejemplo de app con React y PHP (13_all)**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Ejemplo de app con React y PHP video (13_all)**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Ejemplo de Registro, Login y Logout hecho con React y PHP**](https://github.com/stutzerik/reactjs-php-login-system/blob/main/frontend/src/components/Register.jsx)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)

- [**Explicación de Formularios en React**](https://www.escuelafrontend.com/formularios-en-react)

- [**Explicación de uso de Axios**](https://www.freecodecamp.org/espanol/news/como-usar-axios-con-react/)

- [**Explicación del esquema de Response de Axios**](https://axios-http.com/es/docs/res_schema)

- [**Explicación de cómo se configura una Petición con Axios**](https://axios-http.com/es/docs/req_config)

- [**Explicación y ejemplo de peticiones simultáneas con Axios**](https://stackoverflow.com/questions/61385454/how-to-post-multiple-axios-requests-at-the-same-time)

- [**Ejemplo de petición POST con Axios**](https://axios-http.com/es/docs/post_example)

- [**Explicación de envío información desde React a PHP**](https://es.stackoverflow.com/questions/382885/api-php-no-recibe-valores-desde-axios)

- [**Explicación de la class FormData**](https://developer.mozilla.org/es/docs/Web/API/FormData)

- [**Explicación de uso de la class FormData para enviar información al Servidor**](https://es.javascript.info/formdata)

- [**Explicación de uso de la class FormData manejando Objects para enviar información al Servidor**](https://developer.mozilla.org/es/docs/Web/API/XMLHttpRequest_API/Using_FormData_Objects)

- [**Explicación de uso de CORS client y server**](https://stackoverflow.com/questions/65218218/react-php-blocked-my-cors-policy-only-in-post-request)

- [**Explicación de la solución a CORS. Usar un Proxy gratuito**](https://es.stackoverflow.com/questions/463756/error-cors-en-react-axios)

- [**Explicación de package React-Toastify**](https://github.com/urian121/Implementa-Alertas-con-React-Toastify)

- [**Explicación video de React-Toastify**](https://www.youtube.com/watch?v=hazBM39NL3s)

- [**Explicación video para crear tus propios Toastify**](https://www.youtube.com/watch?v=qlHSvwHpwaA)

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
header("Access-Control-Allow-Headers: X-, Content-Type, Authorization");

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

- **Como Acceder a los Datos de un Formulario y Funciones Relacionadas en React**

1. **`FormData`**:

   Es un constructor en JavaScript que se utiliza para crear un objeto de pares clave/valor que representan datos de un formulario HTML. Permite construir fácilmente un conjunto de datos que luego se puede enviar a través de una solicitud HTTP. Por ejemplo, una petición de tipo POST, PUT, etc.

   Esta clase, trabaja con `XMLHttpRequest`.

   Aquí tienes unos pasos a seguir:

   - **Creación de un objeto FormData**:

     Puedes crear un nuevo objeto FormData pasando un formulario HTML como argumento:

     ```jsx
     // Accede al formulario a través del DOM
     const formulario = document.getElementById("miFormulario");

     // Crea el objeto FromData con los datos obtenidos del DOM
     const formData = new FormData(formulario);
     ```

     ```jsx
     // Gestor de eventos
     const handleFormSubmit = (event) => {
       // Previene el comportamiento por defecto de enviar el formulario
       event.preventDefault();

       // Crea un objeto FormData con los datos del formulario
       const formData = new FormData(event.target);

       // Accede a los datos del formulario a través de formData
       // Recuerda que utiliza los atributos HTML `name` para acceder a la información de los inputs
       const data = {
         user: formData.get("user"),
         pass: formData.get("pass"),
         session: formData.get("session") === "on" ? true : false,
       };
     };
     ```

   - **Funciones útiles de FormData**:

     `FormData` posee varias funciones que pueden ser de grande ayuda a la hora de trabajar con este constructor:

     - `.get(key)`:

       Se utiliza para obtener el valor asociado a una key específica en un objeto FormData. `Retorna el primer valor` encontrado asociado a esa clave.

     - `.getAll(key)`:

       Esto nos `retorna` en todos los casos `un Array` con todos los valores asociados a la key que hayamos puesto entre paréntesis, aunque sea solo uno.
       En los objetos podemos tener varios objetos anidados a su vez al interno de una misma key, la cual podría ser generica, como por ejemplo los "intereses" en un formulario de 100 personas.

     - `.append(key, value)`:

       `Agrega un nuevo par key/value` al objeto FormData. Es especialmente útil cuando estás construyendo y enviando formularios a través de solicitudes HTTP, ya que permite añadir nuevos campos de manera dinámica.

     - `.set(key, value)`:

       Es una función que te permite `añadir o modificar valores para un campo específico en el objeto` FormData. Si la key especificada ya existe en el objeto, entonces el value asociado a esa key se actualizará con el nuevo value proporcionado, si no, crea un nuevo key/value.

     - `.delete(key)`:

       `Elimina` la key del objeto y, por lo tanto, también su valor. Esto es útil si deseas quitar un campo específico antes de enviar el formulario, por ejemplo.

     - `.has(key)`:

       Verifica si el objeto FormData contiene una key específica. Funciona como filtrado. `Devuelve un valor Boolean` (true o false) que indica si el campo existe o no.

   - **Enviar FormData a través de una solicitud HTTP**:

     Puedes usar `FormData` para enviar datos a través de una solicitud HTTP, como en una petición `fetch` o una petición `AJAX`.

     ```jsx
     const formulario = document.getElementById("miFormulario");
     const formData = new FormData(formulario);

     fetch("url_del_servidor", {
       method: "POST",
       body: formData,
     })
       .then((response) => response.json())
       .then((data) => {
         console.log("Respuesta del servidor:", data);
       })
       .catch((error) => console.error("Error:", error));
     ```

   En resumen, el método FormData, es uno de las formas más standard para conseguir datos de los formularios o trabajar con las peticiones HTTP. Necesita más código, pero es útil para formularios complejos o si necesitas enviar archivos adjuntos.

2. **`useRef`**:

   El acceso directo a los elementos HTML de un formulario se refiere a la posibilidad de interactuar con los campos de un formulario sin necesidad de utilizar el estado de React o cualquier otro método de manipulación del DOM.

   En React, esto puede hacerse a través de refs utilizando el hook `useRef`, que proporcionan una manera de acceder directamente a los elementos del DOM dentro de tus componentes. Esto es sumamente útil en los momentos en los cuales deseemos acceder a los elementos del DOM fuera de un gestor de eventos. A demás, hay librerías externas que nos piden una referencia directa a un elemento HTML para poder funcionar, como por ejemplo las librerías de mapas para su renderizado, o las librerías de animaciones que piden una referencia a un nodo DOM para poderlo animar.

   Es el caso de los formularios un ejemplo práctico en el cual podemos utilizar unas refs. Cuando cargamos la página web y tenemos un formulario login, a lo mejor deseamos que se haga un "focus" directo al primer campo del formulario donde el usuario introducirá el nombre/email y la password para poder efectuar el login. Esto lo podemos hacer con un `useRef`.

   Aquí tienes los pasos detallados para acceder directamente a los elementos HTML de un formulario en React:

   - **Crear una Ref**:

     En el componente de React donde se encuentra el formulario, primero debes crear una ref para el elemento que deseas acceder. Puedes hacer esto usando el hook `useRef`.

     ```jsx
     import { useRef } from "react";

     const MyComponent = () => {
       // Se inicializa useRef siempre en null porque no hace falta que tenga ningún valor inicial
       const inputRef = useRef(null);
       // ...
     };
     ```

   - **Asignar la Ref al Elemento**:

     Luego, debes asignar esta ref al elemento HTML dentro del JSX del formulario. Esto se hace utilizando el atributo `ref`.

     ```jsx
     <input ref={inputRef} name="username" type="text" />
     ```

     Ahora, `inputRef` apunta directamente al elemento `<input>` del formulario.

     Cuando estás utilizando `useRef` en un formulario de React, normalmente quieres asignarlo a elementos individuales dentro del formulario, como los elementos de entrada (<input>), para poder acceder a sus valores de manera más directa.

     Por ejemplo, si tienes un formulario con varios campos de entrada y deseas acceder a los valores de cada campo, puedes asignar un `useRef` a cada uno de los elementos de entrada. Esto te permitirá obtener y modificar los valores de manera más eficiente.

     ```jsx
     import React, { useRef } from "react";

     function MyForm() {
       const inputRef1 = useRef(null);
       const inputRef2 = useRef(null);

       const handleSubmit = (e) => {
         e.preventDefault();
         console.log(inputRef1.current.value); // Accediendo al valor del primer campo
         console.log(inputRef2.current.value); // Accediendo al valor del segundo campo
       };

       return (
         <form onSubmit={handleSubmit}>
           <input name="nombre" type="text" ref={inputRef1} />
           <input name="password" type="password" ref={inputRef2} />
           <button type="submit">Enviar</button>
         </form>
       );
     }

     export default MyForm;
     ```

   - **Acceder al Valor del Elemento**:

     Una vez que tienes la ref, puedes acceder al valor del elemento en cualquier parte de tu componente.

     ```jsx
     const handleButtonClick = () => {
       const valuePassword = inputRef2.current.value;
       console.log(valuePassword);
     };
     ```

     En este ejemplo, inputRef.current te da acceso al elemento <input> del formulario, y value contiene el valor del campo de entrada.

   - **Actualizar el Valor del Elemento**:

     Puedes usar la ref para actualizar el valor del elemento si es necesario.

     ```jsx
     inputRef1.current.value = "Nuevo nombre";
     ```

   - **Crear un Focus con useEffect y useRef a un nodo HTML**:

     Como mencionábamos antes, si tuviésemos un formulario de login en nuestra página web y deseáramos que el usuario pudiese escribir directamente al interno del campo correspondiente al login, sin necesidad de tener que mover el cursor hasta estos campos, deberíamos "focalizar" ese elemento HTML a penas la página web cargase. Para hacer esto, deberíamos crear una refs con `useRef` para recibir el valor del nodo HTML de dicho campo y a su vez añadir un `focus` a través de un `useEffect` para que se monte a penas carga el `document`.

     ```jsx
     import React, { useRef, useEffect } from "react";

     function MyForm() {
       const inputRef = useRef(null);
       // Utilizamos el useEffect para que se active el inputRef cuando ocurra algo.
       useEffect(() => {
         // Utilizamos el operador Optional Chaining `?` para verificar si la propiedad precedente al método 'focus()' posee el valor `null` o `undefined`. Si `inputRef.current` está definido, se continuará el código llamando al método `focus()`. Esta forma previene errores.
         inputRef.current?.focus();
       }, []); // Dejamos el array vacío para que se active el efecto cuando se monte el componente. En este caso, al cargar la página.

       const handleSubmit = (e) => {
         e.preventDefault();

         console.log(inputRef.current.value);
       };

       return (
         <form onSubmit={handleSubmit}>
           <input ref={inputRef} name="nombre" type="text" />
           <input name="password" type="password" />
           <button type="submit">Enviar</button>
         </form>
       );
     }

     export default MyForm;
     ```

   En resumen, cuando necesitas interactuar directamente con el DOM, las refs proporcionan una solución útil, aunque es importante tener en cuenta que el uso de refs para acceder directamente a los elementos del DOM debe hacerse con precaución, ya que puede llevar a un código menos declarativo y más propenso a errores. Por lo general, es preferible utilizar formularios controlados y manejar los valores a través del estado de React.

3. **`Gestor de eventos`**:

   Acceder a los datos de un formulario a través del gestor de eventos implica utilizar los datos proporcionados por el evento (como `onSubmit` o `onChange`) para obtener y manipular los valores de los campos del formulario.

   A continuación, te proporciono una guía detallada paso a paso:

   - **Agregar el Gestor de Eventos**:

     Primero, asegúrate de tener un formulario en tu componente de React y añade un gestor de eventos, como `onSubmit` y `onChange`.

     Aquí te explico la funcionalidad de cada uno:

     - `onSubmit`:

       Nos envía la información al servidor o simplemente nos devuelve un console.log() de lo que el utente envíe a través del formulario.

       ```jsx
       const handleSubmit = (event) => {
         // `event.preventDefault()` evita el comportamiento predeterminado del formulario (enviar una solicitud) y la recarga de la página
         event.preventDefault();

         // Aquí es donde accederemos y trabajaremos con los datos del formulario
       };

       return (
         <form onSubmit={handleSubmit}>
           {/* ...campos de formulario... */}
           <button type="submit">Enviar</button>
         </form>
       );
       ```

     - `onChange`:

       Nos permite realizar acciones a medida que el usuario escribe en el formulario, de este modo manejaremos los cambios en tiempo real. Es comúnmente utilizado al interno de formularios controlados.

       ```jsx
       const handleInputChange = (event) => {
         const { name, value, type, checked } = event.target;
         // `name` corresponde cada nombre de los campos HTML a los cuales hace referencia el event.target. En este caso serían "username", "password" y "session". `value` es el valor que le introduce el usuario a cada campo, el cual se verá reflejado inmediatamente cuando el usuario escriba.

         // El siguiente trozo de código corresponde a un pedazo del código de un hook `useState` para que vean cómo manejar varios campos contemporáneamente y el porqué tenemos `type` y `checked` desestructurados arriba... Si el campo es de `type` checkbox, me devuelve el valor `checked`, si no, me devuelve el valor `value` correspondiente a cada campo. Esto se hace porque checkbox trabaja con el valor `checked` y no con el valor `value`, entonces accedemos a él a través del tipo de input que es con `type`.
         type === "checkbox"
           ? setFormData({ ...formData, [name]: checked })
           : setFormData({ ...formData, [name]: value });
       };

       return (
         <form onSubmit={handleSubmit}>
           <input
             type="text"
             name="username"
             value={formData.username}
             onChange={handleInputChange}
           />
           <input
             type="password"
             name="password"
             value={formData.password}
             onChange={handleInputChange}
           />
           <input
             type="checkbox"
             name="session"
             value={formData.session}
             onChange={handleInputChange}
           />
           {/* Otros campos del formulario */}
           <button type="submit">Enviar</button>
         </form>
       );
       ```

       Aquí, handleChange se ejecutará cada vez que el usuario escriba en el campo.

   - **Obtener Datos del Evento**:

     Dentro del gestor de eventos, tendrás acceso al evento default `event`, el cual contiene información sobre la acción que se está llevando a cabo (por ejemplo, enviar el formulario). Usa `event.target` para acceder al formulario en sí.

     ```jsx
     const handleSubmit = (event) => {
       event.preventDefault();

       const formData = new FormData(event.target);
       // `formData` contiene todos los datos del formulario
     };
     ```

     Aquí estamos utilizando FormData para crear un objeto que contiene todos los campos del formulario y sus valores.

   - **Trabajar con los Datos**:

     Ahora que tienes los datos del formulario en formData, puedes manipularlos según tus necesidades. Por ejemplo, puedes acceder a un campo específico usando `formData.get('fieldName')`.

     ```jsx
     const handleSubmit = (event) => {
       event.preventDefault();

       const formData = new FormData(event.target);

       const data = {
         username: formData.get("username"),
         password: formData.get("password"),
         session: formData.get("session") === "on" ? true : false,
       };

       // Haz lo que necesites con data
       console.log(data);
     };
     ```

     ```jsx
     return (
       <form onSubmit={handleSubmit}>
         <input name="username" type="text"></input>
         <input name="password" type="password"></input>
         <input name="session" type="checkbox"></input>
         <button type="submit">Login</button>
         <button type="reset">Reset</button>
       </form>
     );
     ```

     Esto te da acceso directo a los valores de los campos del formulario.

   En resumen, estos pasos te permitirán acceder y trabajar con los datos del formulario a través de los gestores de eventos en React. Recuerda que es una práctica común utilizar formularios controlados siempre que sea posible para mantener un flujo de datos más predecible.

4. **`DOM`**:

   Acceder directamente a los elementos HTML de un formulario utilizando la API DOM implica seleccionar y manipular los elementos HTML usando métodos y propiedades proporcionados por el DOM.

   Aquí te explico detalladamente cómo hacerlo:

   - **Obtener una Referencia al Formulario**:

     Primero, necesitas obtener una referencia al formulario en tu código JavaScript. Puedes hacerlo utilizando métodos como `document.getElementById()`, `document.querySelector()`, `document.getElementsByName()`, o cualquier otro selector de elementos.

     Por ejemplo, si tu formulario tiene un ID como "myForm", puedes obtener una referencia de la siguiente manera:

     ```jsx
     const form = document.getElementById("myForm");
     ```

   - **Acceder a los Elementos del Formulario**:

     Una vez que tienes la referencia al formulario, ya sea por ID o por Name, puedes acceder a los elementos individuales dentro de él con `querySelector()` o con `getElementById()` (este último sólo para elementos específicos).

     Por ejemplo, si tienes un campo de texto con un nombre como "username", podrías acceder a él así:

     ```jsx
     const usernameInput = form.querySelector('[name="username"]');
     ```

   - **Obtener o Modificar los Valores de los Elementos**:

     Una vez que has accedido a un elemento, puedes obtener o modificar su valor utilizando las propiedades value o checked para los campos de texto y casillas de verificación, respectivamente.

     Por ejemplo, para obtener el valor de un campo de texto:

     ```jsx
     const usernameValue = usernameInput.value;
     ```

     Y para modificar el valor de un campo de texto:

     ```jsx
     usernameInput.value = "NuevoValor";
     ```

   - **Manipulación Adicional**:

     Puedes realizar otras manipulaciones en los elementos, como añadir o quitar clases, cambiar estilos, agregar eventos, etc.

     Por ejemplo, para añadir una clase a un elemento:

     ```jsx
     usernameInput.classList.add("miClase");
     ```

   En resumen, trabajar con el DOM es una forma común y eficaz para interactuar con los formularios. Esta técnica es especialmente útil para formularios simples o cuando necesitas una solución rápida y directa.

5. **`Acceso a través de bibliotecas o frameworks`**:

   En React, puedes acceder a los datos de los formularios utilizando bibliotecas y frameworks específicos que proporcionan funcionalidades adicionales y herramientas para el manejo de formularios. Aquí te presento dos de las bibliotecas más populares para este propósito:

- **Formik**:

  Formik es una biblioteca popular de gestión de formularios en React que simplifica el proceso de creación y validación de formularios. Ofrece una forma sencilla de manejar el estado y las validaciones de los formularios. Facilita la gestión de errores y mensajes de validación. Integra la lógica de envío de formularios con facilidad.

  ```jsx
  import { useFormik } from "formik";

  const MyForm = () => {
    const formik = useFormik({
      initialValues: {
        username: "",
        password: "",
      },
      onSubmit: (values) => {
        console.log(values);
      },
    });

    return (
      <form onSubmit={formik.handleSubmit}>
        <input
          type="text"
          name="username"
          onChange={formik.handleChange}
          value={formik.values.username}
        />
        <input
          type="password"
          name="password"
          onChange={formik.handleChange}
          value={formik.values.password}
        />
        <button type="submit">Submit</button>
      </form>
    );
  };
  ```

- **React Hook useForm**:

  React Hook Form es otra biblioteca popular que proporciona una forma eficiente de trabajar con formularios en React utilizando hooks. Utiliza hooks para un manejo eficiente de los formularios. Permite un control más granular sobre el estado y las validaciones de los formularios. Ofrece una fácil integración con React Native para el desarrollo de aplicaciones móviles.

  ```jsx
  import { useForm, Controller } from "react-hook-form";

  const MyForm = () => {
    const { handleSubmit, control } = useForm();

    const onSubmit = (data) => {
      console.log(data);
    };

    return (
      <form onSubmit={handleSubmit(onSubmit)}>
        <Controller
          name="username"
          control={control}
          defaultValue=""
          render={({ field }) => <input {...field} />}
        />
        <Controller
          name="password"
          control={control}
          defaultValue=""
          render={({ field }) => <input type="password" {...field} />}
        />
        <button type="submit">Submit</button>
      </form>
    );
  };
  ```

Ambas bibliotecas proporcionan herramientas poderosas para el manejo de formularios en React y permiten un desarrollo más eficiente y organizado. La elección entre Formik y React Hook Form dependerá de las necesidades específicas de tu proyecto y de tu preferencia personal.

Puedes considerar el uso de `Ajax` también.
