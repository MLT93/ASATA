# ¿QUÉ ES UN SERVIDOR?

- Software que hay que instalar y configurar para que sea operativo (ej. Apache IIS).

# ¿QUÉ ES UNA BASE DE DATOS?

- Recopilación de datos sistemática y almacenada electrónicamente. Es un software también.

# ¿QUÉ ES UNA APLICACIÓN WEB?

- Software que está instalado en el servidor, a la escucha de peticiones por parte del cliente.

# ¿QUÉ ES UN FTP?

- Para subir archivos al servidor es común utilizar un servidor FTP, al cual se accederá con programas tales como FileZilla.

# ¿QUÉ ES UN ENTORNO DE DESARROLLO?

- Entorno sobre el cual se desarrolla la aplicación,
realizándose sobre el mismo la mayor parte de las pruebas.

# ¿QUÉ ES UN ENTORNO DE PREPRODUCCIÓN?

- Entorno muy parecido al de producción. Resulta esencial
cuando no se tiene la certeza de que una aplicación funcione en producción, por circunstancias diversas (ej. el hardware puede cambiar sustancialmente).

# ¿QUÉ ES UN ENTORNO DE PRODUCCIÓN?

- Entorno en el cual el software/aplicación se pone a
disposición del usuario final. Un producto erróneo que alcance un entorno de producción puede tener drásticas consecuencias.

# ¿QUÉ ES UNA INTERFAZ?

- Medio a través del cual el usuario interactúa con un dispositivo tecnológico.

# CICLOS DE VIDA DE UN SOFTWARE

1. Cascada 

- Enfoque sistemático y secuencial de desarrollo que comienza con la ingeniería del sistema y
progresa a través del análisis, diseño, codificación, pruebas y mantenimiento.
- Planificación sencilla.
- Válido para pequeños/medios desarrollos.
- No se ven resultados hasta una fase avanzada del ciclo.
- Los errores son altamente penalizados.
- Desarrollos no excesivamente complejos, sin entregas parciales y requisitos claramente definidos.

2. Iterativo

- Serie de repeticiones del modelo en cascada. En cada una de las
iteraciones se genera una versión del software, la cual será evaluada y servirá como
punto de partida para la siguiente iteración.
- Se ofrecen versiones intermedias, evaluables por el cliente.
- Las numerosas versiones pueden encarecer el desarrollo.
- Desarrollos para los cuales no se tienen suficientemente claros los requisitos o bien estos son cambiantes. Este modelo favorece la creación de prototipos e involucra al cliente desde el principio. 

3. Incremental

- Tiene la base del modelo iterativo, sólo que en cada nueva iteración se genera una nueva funcionalidad en forma de módulo.
- Entregas rápidas con funcionalidad creciente.
- Es difícil establecer el coste y tiempo finales de desarrollo.
- No es válido para cualquier software (software con alta funcionalidad inicial, trabajo en sistemas distribuidos, trabajo en tiempo real, altos requerimientos de
seguridad, etc.).
- Recomendable para software que no requiera toda su funcionalidad de manera inicial y cuando se precisen entregas rápidas.

4. En V

- Igual que el modelo en cascada, sólo que implementa una constante verificación y validación.
- Las nuevas etapas facilitan la depuración y el control de fallos.
- El cliente no recibirá el producto hasta avanzado el desarrollo.
- Las pruebas pueden disparar el coste de desarrollo.
- Desarrollos que requieran gran robustez y confiabilidad. Por ejemplo, software que precise de operaciones constantes sobre una base de datos.

5. Basado en componentes (CBSE)

- `Szypersky-1998`: “Un componente es una unidad de composición de aplicaciones software, que posee un conjunto de interfaces y un conjunto de requisitos, y que ha de poder ser desarrollado, adquirido, incorporado al sistema y compuesto con otros componentes de forma independiente, en tiempo y espacio”.
Reutilización de software.
- Se puede reducir el tiempo de desarrollo.
- Simplifica las pruebas y mejora la calidad.
- El desarrollo depende de las limitaciones de los componentes.
- El componente, al ser externo, puede no ser actualizado durante la vida del software.
- Hay que realizar pruebas exhaustivas.
- Aplicable a desarrollos que han contemplado en su diseño la incorporación de componentes comerciales, siempre que se pueda afrontar su coste. 

6. Desarrollo rápido (RAD)

- Fusiona las fases de análisis y diseño,
requiriendo la colaboración absoluta del cliente. Este recibirá muchos prototipos o partes funcionales de su software en cortos espacios de tiempo, evaluando el
producto para dar lugar a una retroalimentación en el equipo de desarrollo. De ahí que surja el concepto de adaptación incremental, puesto que se espera que los requisitos cambien (y lo harán, sin duda).
- Resultados rápidamente visibles.
- Permite la reusabilidad de código.
- Gran coste en herramientas y entornos de desarrollo.
- Si el proyecto es grande, son necesarios varios equipos de trabajo.
- Desarrollos rápidos, siempre que se disponga de suficiente equipo para hacer frente y cumplir los plazos.

# ¿QUÉ ES LA PROGRAMACIÓN IMPERATIVA?

- El programa detalla los pasos a seguir, en forma de
conjunto de instrucciones, para llevar a cabo una tarea. Es decir, se le dice al programa qué hacer.

# ¿QUÉ ES LA PROGRAMACIÓN DECLARATIVA?

- El programa describe los mecanismos a utilizar y el
resultado a obtener, pero no implementa los pasos a seguir. Es el tipo de programación utilizada en lenguajes de Inteligencia Artificial y en lenguajes de
consulta sobre base de datos.

# PRINCIPIOS BÁSICOS DEL DESARROLLO DE SOFTWARES

- Los siete principios básicos del desarrollo software, que fueron desarrollados por `Barry Boehm` con el fin de concretar en ellos una larga lista de aforismos y buenas costumbres:

- Usar un plan de desarrollo basado en un ciclo de vida
- Realizar una continua validación
- Mantener un control del producto
- Usar técnicas de programación modernas
- Mantener un control de resultados
- Mucha gente no garantiza un mejor proyecto
- Comprometerse a mejorar el proceso de desarrollo

# ESTRUCTURAS DE CONTROL. TEOREMA DEL PROGRAMA ESTRUCTURADO POR BÖHM Y JACOPINI

1. Secuencia
Ejecución secuencial de una serie de
instrucciones (flujo normal).

2. Selección
Se evalúa una condición para determinar por dónde continuará el flujo del programa (condicional).

3. Iteración
En este bloque de control, se repite la ejecución de una
instrucción mientras se cumpla cierta condición (bucle).

# ¿QUÉ ES LA VERIFICACIÓN?

- Conjunto de actividades que aseguran que el software realice su funcionalidad de manera correcta. Pregunta: ¿Realiza el producto correctamente?

# ¿QUÉ ES LA VALIDACIÓN?

- Se encarga de asegurar que el software cumpla la funcionalidad requerida por el cliente. Pregunta: ¿Está haciendo el producto requerido?

# ¿DIFERENCIA ENTRE ROM Y RAM?

- RAM es la memoria es la que guarda información mientras está conectada a la electricidad. Como el session storage en el navegador
- ROM es la memoria que guarda la info permanentemente como el local storage en el navegador. Además, es la que proporciona el creador

# Sectores, Cilindros, Cláusters

- Son partes del disco duro de un PC
