# Consultas entre tablas relacionadas con FOREIGN KEY

Las consultas JOIN en MySQL son esenciales para trabajar con bases de datos relacionales en MySQL. Permiten combinar datos de dos o más tablas relacionadas en función de una columna compartida (a menudo una clave primaria o foránea). De esta manera, puedes obtener resultados más completos e informativos que si consultaras una única tabla.

Usos habituales de las consultas JOIN

Fusionar información relacionada: Imagina que tienes tablas separadas para "clientes" y "pedidos". Un JOIN te permite combinar los detalles de los clientes (nombres, direcciones) con sus pedidos correspondientes (artículos comprados, cantidades) en un único conjunto de resultados.
Crear informes: Los JOIN son cruciales para generar informes que requieren datos de varias tablas. Por ejemplo, puedes unir una tabla de "productos" con una tabla de "ventas" para analizar las tendencias de ventas de productos específicos.
Filtrar datos: Los JOIN se pueden utilizar para filtrar datos en función de las relaciones. Por ejemplo, podrías unir una tabla de "clientes" con una tabla de "suscripciones" para encontrar clientes con suscripciones activas.
Tipos de JOIN en MySQL

MySQL ofrece varios tipos de JOIN para adaptarse a diferentes escenarios:

INNER JOIN (predeterminado): Devuelve solo las filas donde hay una coincidencia en ambas tablas según la condición de JOIN.
LEFT JOIN: Incluye todas las filas de la tabla izquierda (la especificada primero en la cláusula JOIN. "FROM videojuegos LEFT JOIN plataforma" en este caso sería "videojuegos") y las filas coincidentes de la tabla derecha. Si no hay coincidencia en el lado derecho, rellena las columnas correspondientes con valores NULL.
RIGHT JOIN: Similar a LEFT JOIN, pero incluye todas las filas de la tabla derecha y las filas coincidentes de la tabla izquierda, rellenando con valores NULL las filas no coincidentes de la izquierda.
FULL JOIN: Combina todas las filas de ambas tablas, independientemente de si hay una coincidencia en la otra tabla. Las columnas no coincidentes se rellenan con valores NULL.
Consejos adicionales para JOINs eficaces

Condiciones JOIN claras: Define una condición JOIN clara y específica usando la cláusula ON para asegurarte de recuperar los datos deseados.
Optimizar el rendimiento: Considera crear índices en las columnas involucradas en los JOIN para mejorar la velocidad de las consultas, especialmente para conjuntos de datos grandes.
Comprender los tipos de JOIN: Elige el tipo de JOIN adecuado (INNER, LEFT, RIGHT o FULL) según el resultado deseado (incluir o excluir filas no coincidentes).
Al dominar las consultas JOIN, aprovecharás al máximo el potencial de las bases de datos relacionales en MySQL, permitiéndote obtener y analizar datos de varias tablas sin problemas.

# Sintaxis Explícita
# `SELECCIONA(devuelve)` tabla_donde_busco.campo_buscado `DESDE` tabla_donde_busco `METODO JOIN` tabla_comparación `DONDE LOS ID ESTÉN RELACIONADOS(hay que ponerlo siempre)` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2 FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key  WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECT tabla_donde_busco.* FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <la tabla_A> RELACIONADA 'INNER, LEFT, RIGHT -> JOIN' <con la tabla_B> DONDE 'ON' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas>

# Sintaxis Implícita
# `SELECCIONA(devuelve)` campos_buscados `DESDE` tabla_donde_busco, tabla_comparación `DONDE ESTA CONDICIÓN SE CUMPLA` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2, tabla_comparación.campo_buscado1 FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECT * FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <tabla_A>, <tabla_B> DONDE 'WHERE' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas> Y 'AND' <más condiciones>;

# Ejemplos
/* Forma explícita */
SELECT videojuegos.* FROM videojuegos INNER JOIN genero ON videojuegos.id_genero = genero.id;
SELECT alquileres.* FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id AND clientes.socio = 1;
SELECT videojuegos.*, alquileres.fechaAlquiler FROM videojuegos INNER JOIN alquileres ON videojuegos.id = alquileres.id_videojuego;
SELECT alquileres.id_cliente, clientes.nombre FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id

/* Forma implícita */
SELECT videojuegos.*, alquileres.fechaAlquiler FROM videojuegos, alquileres WHERE videojuegos.id = alquileres.id_videojuego;
SELECT alquileres.id_cliente, clientes.nombre FROM alquileres, clientes WHERE alquileres.id_cliente = clientes.id;

/* Consulta con multiples tablas relacionadas */
SELECT productos.id, productos.nombre, productos.precio, productos.stock, categorias.nombre AS categoria, proveedores.nombre AS proveedor 
FROM productos 
INNER JOIN categorias ON productos.categoria_id = categorias.id 
INNER JOIN proveedores ON productos.proveedor_id = proveedores.id;

/* Consulta con tablas relacionadas + subconsulta */
SELECT 
    productos.id AS producto_id, 
    productos.nombre AS producto_nombre, 
    productos.precio, 
    categorias.nombre AS categoria,
    proveedores.nombre AS proveedor,
    (SELECT nombre FROM clientes WHERE clientes.id = productos.cliente_id) AS cliente_nombre
FROM 
    productos p
INNER JOIN categorias ON categorias.id = p.categoria_id
INNER JOIN proveedores ON proveedores.id = p.proveedor_id

/* Consulta de unión múltiple con clave foránea extendida */
SELECT 
    clases.id,
    cursos.nombreCurso,
    cursos.horas,
    cursos.nivel,
    aulas.tag AS aulaTag,
    aulas.planta,
    aulas.numeroAula,
    grupos.tag AS grupoTag,
    profesores.nombre AS nombreProfesor,
    horarios.horario,
    calendarios.id_convocatoria AS id_convocatoria, /* Es crucial añadir este ID para crear una foreign key extendida */
    calendarios.fecha AS fechaInicio
    convocatorias.anio AS anioConvocatoria,
FROM 
    clases 
    INNER JOIN cursos ON clases.id_curso = cursos.id
    INNER JOIN aulas ON clases.id_aula = aulas.id
    INNER JOIN grupos ON clases.id_grupo = grupos.id
    INNER JOIN profesores ON clases.id_profesor = profesores.id
    INNER JOIN horarios ON clases.id_horario = horarios.id
    INNER JOIN calendarios ON clases.id_calendario = calendarios.id
    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id
/** 
 ** # Esta consulta obtiene información detallada sobre los foreign key de clases con las demás tablas. Además, obtiene información extendiendo una foreign key
 **
 ** ### Explicación:
 **
 ** - La tabla 'calendarios' tiene una clave foránea que se relaciona con 'convocatorias'.
 ** - Al haber realizado previamente un JOIN entre 'clases' y 'calendarios', ya tenemos acceso a la información de 'calendarios'.
 ** - Esto nos permite "extender" la consulta para incluir información de 'convocatorias', aunque no esté directamente relacionada con 'clases'.
 **
 ** ### Tablas Involucradas:
 **
 ** 1. **clases**: Tabla principal que contiene información sobre las clases.
 ** 2. **cursos**: Información sobre los cursos.
 ** 3. **aulas**: Detalles sobre las aulas donde se imparten las clases.
 ** 4. **grupos**: Información sobre los grupos de estudiantes.
 ** 5. **profesores**: Datos de los profesores que imparten las clases.
 ** 6. **horarios**: Información sobre los horarios de las clases.
 ** 7. **calendarios**: Datos sobre el calendario académico.
 ** 8. **convocatorias**: Información sobre las convocatorias relacionadas con los calendarios.
 ** 
 ** ### Desglose de la Consulta:
 ** 
 ** 1. **SELECT**:
 **    - Se seleccionan columnas específicas de cada tabla, como el nombre del curso, el aula, el profesor, etc.
 ** 
 ** 2. **FROM y JOINs**:
 **    - Comienza con la tabla `clases`.
 **    - Se utilizan INNER JOINs para conectar `clases` con cada una de las otras tablas basándose en las claves foráneas.
 ** 
 ** ### Importancia del Último INNER JOIN:
 ** 
 ** - El último INNER JOIN conecta `calendarios` con `convocatorias`:
 **    ```sql
 **    INNER JOIN convocatorias ON calendarios.id_convocatoria = convocatorias.id
 **    ```
 ** - Aquí no estamos directamente conectando `clases` a `convocatorias`, sino que lo hacemos a través de `calendarios`.
 ** 
 ** ### Clave para Entender la Relación:
 ** 
 ** - Es crucial incluir el ID de `calendarios` (`id_convocatoria`) en la selección. Esto permite que la consulta funcione correctamente al enlazar toda la información.
 ** - Clave foránea extendida (Extended foreign key): Utiliza relaciones de clave foránea no solo directas, sino también indirectas o "extendidas" a través de tablas intermedias.
*/
