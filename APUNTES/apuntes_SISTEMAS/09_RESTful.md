# ¿QUÉ ES RESTful?

- Se refiere a los servicios web que siguen los principios del estilo REST (Representational State Transfer). Es una forma de diseñar sistemas de software para comunicarse a través de HTTP o HTTPS. Es muy utilizada en APIs esta arquitectura porque sirve para comunicar datos entre interfaces.

- ¿Qué es una URI?
1. Una URI es el HOST (URL) más los ENDPOINTS (URN)
2. URL + URN = URI;
3. Las siglas URI, URL y URN suelen confundirse, porque, aparte de sonar muy parecidas, se refieren a tres conceptos muy similares en términos técnicos. El URL o (Uniform Resource Locator) se utiliza para indicar dónde se encuentra un recurso. Por lo tanto, también sirve para acceder a algunas páginas web por Internet. Por el contrario, el URN (Uniform Resource Name) es independiente de la ubicación y designa un recurso de forma permanente. Por lo tanto, si el URL se conoce principalmente como una forma de identificar un dominio web, el URN también puede tratarse de un ISBN que identifique un libro de manera indefinida.
4. El URL y el URN presentan la misma sintaxis que el URI. Ambos tipos de identificadores son, por lo tanto, subcategorías del URI. Los URL y URN son un tipo de URI. Del mismo modo, ni URL ni URN son identificadores uniformes recursos.

- Uso de HTTP Y URL:
1. Protocolos Estándar: RESTful utiliza HTTP/HTTPS para comunicaciones entre Cliente y Servidor.
2. Recursos Identificados por URLs: Cada recurso se identifica mediante una URL (Uniform Resource Locator), que actúa como un identificador único.

- Operaciones CRUD (Create Read Update Delete) a través de llamadas HTTP:
1. GET: Recupera / Lee un recurso. Es innecesario utilizar cuerpo (Body) en la petición.
2. POST: Crea un nuevo recurso. Utiliza cuerpo (Body) en la petición. Es necesario reemplazar el recurso con todos los campos que posee por completo, aunque tengan la misma información, porque es imposible actualizar solo una parte del recurso. Si se hiciera, se eliminaría todo el recurso del servidor.
3. PUT: Actualiza el recurso existente. Utiliza cuerpo (Body) en la petición.
4. PATCH: Actualiza el recurso parcialmente. Utiliza cuerpo (body) en la petición. Aquí es posible actualizar parcialmente los campos del recurso.
5. DELETE: Borra el recurso. Es innecesario utilizar cuerpo (Body) en la petición.

- Interacción Sin Estado (Stateless):
1. El servidor es agnóstico (no tiene porqué conocer el estado del cliente). Esto significa que el cliente puede enviar esa petición en cualquier momento, independientemente de la condición o estado que el cliente posea en ese momento (que esté logueado o no, que haya una sesión activa, etc...). Lo único realmente necesario será que SIEMPRE se le pase toda la información a la petición (el Header, y el Body siempre que sea necesario).

- Los formatos aceptados en las peticiones (el más utilizado es JSON):
1. JSON
2. HTML
3. TXT
4. XML
5. BLOB
