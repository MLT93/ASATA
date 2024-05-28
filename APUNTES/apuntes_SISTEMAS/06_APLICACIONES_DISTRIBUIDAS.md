# ARQUITECTURA ORIENTADA A SERVICIOS (SOA)

- Modelo conceptual para desarrollar aplicaciones web distribuidas (conjunto de nodos de computo comunicados entre sí) que actúan como una única unidad (me da igual que el cómputo se realice en un nodo o en otro). Estos sistemas interactúan entre sí mediante mensajes.

# SERVICIO WEB

- Servicio interoperable de máquina a máquina a través de una red (local o remota). Tiene una interfaz descrita en un formato que se procesa por máquina (WSDL).

- Otros sistemas interactúan con el servicio web de la manera prescrita con SOAP a través de https.

# COMPUTACIÓN PARALELA

- `Ejecución simultánea` de múltiples cálculos o procesos. Es el hecho de `dividir una tarea grande en sub-tareas más pequeñas` que pueden ejecutarse simultáneamente en diferentes procesadores. `Requiere múltiples` núcleos o `procesadores` (hardware) para funcionar eficazmente. Se utiliza principalmente en cálculos intensivos que pueden dividirse en partes independientes.

# COMPUTACIÓN CONCURRENTE

- Capacidad de un sistema para `manejar múltiples tareas al mismo tiempo, pero no necesariamente se ejecutan simultáneamente`. Es la` intercalación de las tareas en pequeños intervalos de tiempo`. `Un solo procesador puede gestionar múltiples tareas que no son independientes entre sí`. Gestión de múltiples tareas en sistemas donde la interacción y la latencia son críticas.

# CARACTERÍSTICAS DE UN SISTEMA DISTRIBUIDO

- `Transparencia de Acceso`: Los usuarios interactúan con el sistema sin preocuparse por la ubicación de los recurso (en cualquier nodo porque toda la aplicación trabaja como una unidad).

- `Transparencia de Ubicación`: Los recursos pueden estar en cualquier lugar de la red.

- `Transparencia de Migración`: Los recursos pueden moverse sin afectar el funcionamiento del sistema.

- `Transparencia de Replicación`: Los usuarios no perciben la existencia de múltiples copias de recursos.

- `Escalabilidad`: La escalabilidad es un gran punto a favor cuando se trata de construir un sistema distribuido. Con más nodos replicados, es más fácil escalar al agregar más bases de datos, servidores o servicios según lo exijan las demandas. Las plataformas bancarias, puntos de venta o cualquier diseño que no puede tolerar un fallo o una interrupción (sistemas de misión crítica) son los principales casos de uso de la redundancia, pues ésta ayuda a prevenir la pérdida de datos críticos.
Visita: `https://www.juntadeandalucia.es/servicios/madeja/contenido/recurso/220`

- `Escalabilidad Horizontal`: Capacidad para agregar más nodos al sistema. Consiste en potenciar el rendimiento del sistema desde un aspecto de mejora global, a diferencia de aumentar la potencia de una única parte del mismo

- `Escalabilidad Vertical`: Capacidad para mejorar el rendimiento de los nodos en sí (aumentar el tiempo de respuesta, el hardware, la comunicación de red). El escalar hacia arriba un sistema viene a significar una migración de todo el sistema a un nuevo hardware que es mas potente y eficaz que el actual.

- `Redundancia`: Uso de componentes redundantes para evitar fallos en el sistema (es aplicable a hardware y a software). Implica tener varias copias de aplicaciones que se ejecutan en varios sistemas. (ej. con una redundancia de red: Este tipo de redundancia implica tener múltiples copias de redes y sus componentes, como routers y switches).

- `Recuperación Automática`: Capacidad del sistema para recuperarse automáticamente de fallos.

- `Balanceo de Carga`: Distribución eficiente de la carga de trabajo entre los nodos.

- `Adaptabilidad`: Capacidad del sistema para adaptarse a cambios en la carga de trabajo en el entorno.

- `Extensibilidad`: Facilidad para agregar nuevas funcionalidades o nodos al sistema. Capacidad de un sistema o software para adaptarse fácilmente a cambios y adiciones sin requerir modificaciones o reescrituras significativas. Para se extensible debe estar bien modularizado (conlleva más trabajo, pero para el mantenimiento es mucho más fácil).

- `Diversidad de Componentes`: Capacidad de integrar diferentes tipos de hardware y software

- ``:

- `Autenticación`: Verificación de la identidad de usuarios y nodos ("Este usuario o esta máquina es quien dice ser").

- `Autorización`: Control de acceso a recursos según políticas definidas. Cuánto más crítico es el material al que se accede, menos personas tendrán acceso a él.

- `Cifrado`: Protección de datos en tránsito y en reposo. Ocultar o encriptar los datos.

- `Integridad`: Aseguramiento de que los datos no han sido alterados (ej. el JSON WEB TOKEN tiene una clave de cifrado para cifrar la información, y tiene una clave de firma que asegura la integridad).

- `Consistencia de Datos`: Garantía de que todas las copias de los datos son iguales en todos los nodos (que los datos no sean dispares ni para los nodos, ni para los usuarios).

- `Protocolos de Consenso`: Mecanismos para asegurar la consistencia en decisiones distribuidas. Aseguran la consistencia de los datos.

- `Latencia`: Tiempo de respuesta del sistema. A mayor latencia, más tarda en responder el sistema. Depende del estado de la red o de la parte física (la distancia con el servidor y de los procesos que tenga que realizar para devolver la información). También depende de los proveedores (de red y de host).

- `Ancho de Banda`: Capacidad de transferencia simultánea de datos del sistema. Es la máxima cantidad de datos transmitidos a través de una conexión a internet. Es el volumen de información que se puede enviar a través de una conexión en una cantidad medida de megabits por segundo (Mbps).

- `Throughput`: Cantidad de trabajo que el sistema puede manejar en un tiempo determinado. La tasa de transferencia efectiva (throughput) es el volumen de trabajo o de información neto que fluye a través de un sistema.

- `Procesamiento Concurrente`: Capacidad para manejar múltiples tareas al mismo tiempo.

- `Sincronización`: 

# ARQUITECTURA DE MICROSERVICIOS

Es un conjunto de servicios pequeños e independientes que se comunican entre sí.

# ARQUITECTURA DE RESTFUL

Servicios que siguen el estilo arquitectónico REST (Representational State Transfer) como API de Twitter, Google Maps API, etc.
