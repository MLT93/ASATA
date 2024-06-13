- [**Explicación de 13_all**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Explicación video de 13_all**](https://github.com/urian121/como-enviar-formularios-desde-ReactJS-hacia-PHP-y-de-PHP-a-MySQL)

- [**Explicación video para conectar PHP con React**](https://www.youtube.com/watch?v=OC9_B0bPku8)

- [**Explicación de Formularios en React**](https://www.escuelafrontend.com/formularios-en-react)

- **Ejemplo de Uncontrolled Form React:**

import React from "react";

function Form() {
const [values, setValues] = React.useState({
email: "",
password: "",
});

function handleSubmit(evt) {
/_
Previene el comportamiento default de los
formularios el cual recarga el sitio
_/
evt.preventDefault();

    // Aquí puedes usar values para enviar la información

}

function handleChange(evt) {
/_
evt.target es el elemento que ejecuto el evento
name identifica el input y value describe el valor actual
_/
const { target } = evt;
const { name, value } = target;

    /*
      Este snippet:
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

- **Ejemplo de Controlled Form React:**

import React from "react";

function Form() {
const formRef = React.useRef();

function handleSubmit(evt) {
evt.preventDefault();
/_ 1. Usamos FormData para obtener la información 2. FormData requiere la referencia del DOM,
gracias al REF API podemos pasar esa referencia 3. Finalmente obtenemos los datos serializados
_/
const formData = new FormData(formRef.current);
const values = Object.fromEntries(formData);

    // Aquí puedes usar values para enviar la información

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

- **Validación de Form React:**

import React from "react";

const emailRegexp = new RegExp(/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/);

function Form() {
const [emailField, setEmailField] = React.useState({
value: "",
hasError: false,
});

function handleChange(evt) {
/_
Esta función es la misma usada
en la sección de componentes de
Componentes Controlados
_/
}

function handleBlur() {
/\* 1. Evaluamos de manera síncrona
si el valor del campo no es un correo valido.

      2. Recordar que este método se llama
      cada vez que abandonamos el campo y evita
      que el usuario reciba un error sin haber terminado
      de poner el valor.
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
onChange={handleChange}
{/_ onChange para sincronizar el valor del campo _/}
onBlur={handleBlur}
{/_ onBlur para sincronizar la validación del campo _/}
aria-errormessage="emailErrorID"
aria-invalid={emailField.hasError}
/>
{/_ 1. Solo muestra el mensaje de error cuando hasError sea true 2. Crea una relación lógica entre el campo y el mensaje de error,
favoreciendo la semántica y la accesibilidad del campo.
_/}
<p
id="msgID"
aria-live="assertive"
style={{ visibility: emailField.hasError ? "visible" : "hidden" }} >
Please enter a valid email
</p>
</form>
);
}

- **Ejemplo de código PHP**

<?php
// Establecer encabezados CORS para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

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
