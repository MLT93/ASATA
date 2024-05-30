# POSTMAN

**Crear Workspace**

**Crear Collection (Collections)**
	Se pueden crear variables específicas para cada cliente, como claves de autenticación, la identificación del cliente, su token de acceso...	

**Crear entornos (Environments)**
	Se puede crear variables globales, como urls base (sin el endpoint). Recuerda que podemos añadir una parte de seguridad más a las passwords o credenciales creando variables secretas. Además las variables de entorno sobrescriben las variables de Collections.
	Los Environments hay que seleccionarlos en la parte superior dcha de Postman. Por defecto saldrá en 'No Environments'. Seleccionamos nuestro entorno y ya tendremos a disposición todas las variables globales de ese entorno, que serán accesible en las distintas peticiones que se realicen en ese entorno.

**Crear Request**
	Dentro de cada request tendremos una serie de recursos útiles para generar las peticiones: 
		`Params` (Query Params para GET), 
		`Authorization` (Es donde se configuran las autenticaciones del usuario. Esta es la forma cómoda hecha por Postman, pero de todas formas siempre se mandan a través del header en formato código. De hecho, si utilizamos Authorization y vamos al Header, veremos ahí el key del Authentication puesto), 
		`Headers` (Aquí está la información y metadatos que envío en la request para poder realizar la petición. Por ejemplo: el Content-Type, Cache-Control, Authorization, etc...), 
		`Body` (Aquí es donde se envían los POST y PUT), 
		`Scripts`, 
		`Tests`, 
		`Settings`.

* Para llamar a las variables se utilizan las dobles llaves `{{}}`.
* Para obtener las peticiones en código, en la parte dcha de la ventana de Postman, hay un botón con este símbolo `</>` este botón genera un desplegable con todos los lenguajes donde puedo obtener el código de esa petición.
* QUERY PARAMS -> En una dirección `https://www.api.com/example?key=value` la query param en este caso es `?key=value` y se utiliza en en el método GET para definir una respuesta específica o limitar la cantidad de información devuelta por la base de datos.
* PATH PARAMS -> También conocidas como variables de enrutamiento. Son variables como las query params pero sirven para ir a buscar exactamente (a través de un ID) la información que deseo obtener de la base de datos. Válido para POST y GET.
* Una vez que enviamos la petición, en la respuesta podemos guardar un ejemplo de la respuesta en el botón `Save as example` de la esquina dcha del recuadro propio de la respuesta (justo al lado del `Status Code`).
