POSTMAN

Crear Workspace:

Crear Collection (Collections):
	Se pueden crear variables de entorno específicas para cada cliente, como claves de autenticación, la identificación del cliente, su token de acceso...	

Crear entornos (Enviroments)
	Se puede crear variables globales, como urls base (sin el endpoint)...
	Los Enviroments hay que seleccionarlos en la parte superiror dcha de Postman. Por defecto saldrá en 'No Enviroments'. Seleccionamos nuestro entorno y ya tendremos a disposición todas las variables globales de ese entorno, que serán accesible en las distintas peticiones que se realicen en ese entorno.

Crear Request:
	Dentro de cada request tendremos una serie de recursos, como: Params (Query Params), Authorization (donde se configuran las autenticaciones del usuario. De todas formas se pueden mandar en el header), Headers (la información y metadatos que envío en la request para realizar la petición. Por ejemplo: el Content-Type, Cache-Control, Authorization, etc...), Body (donde se envían los POST y PUT), Scripts, Tests, Settings.

*Para llamar a las variables se utilizan las dobles llaves '{{}}'.
*Para obtener las peticiones en código, en la parte dcha de la ventana de Postman, hay un botón con este símbolo '</>' este botón genera un desplegable con todos los lenguajes donde puedo obtener el código de esa petición.
*QUERY PARAMS -> En una dirección 'https://www.api.com/example?key=value' la query param en este caso es '?key=value' y corresponde la variable en métodos GET que se le pasan a las peticiones para enviar información o limitar la respuesta de la base de datos.
*PATH VARIABLES -> También conocidas como variables de enrutamiento. Son variables como las query params pero sirven para ir a buscar exáctamente (a través de un ID) la información que deseo obtener de la base de datos.
