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

# Sintaxis
`SELECCIONA(devuelve)` tabla_donde_busco.campo_buscado `DESDE` tabla_donde_busco `METODO JOIN` tabla_comparación `DONDE LOS ID ESTÉN RELACIONADOS(hay que ponerlo siempre)` tabla_donde_busco.campoID = tabla_comparación.campoID `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);

SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2 FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.campo_buscado1 = tabla_comparación.campo.ID WHERE tabla_comparación.campo_buscado2 = "asdf";

SELECT tabla_donde_busco.* FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.campo_buscado1 = tabla_comparación.campo.ID WHERE tabla_comparación.campo_buscado2 = "asdf";

SELECT tabla_donde_busco.campo_buscado 

# Ejemplos
SELECT videojuegos.* FROM videojuegos INNER JOIN genero ON videojuegos.id_genero = genero.id;

SELECT alquileres.* FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id AND clientes.socio = 1;

SELECT videojuegos.*, alquileres.fechaAlquiler FROM videojuegos INNER JOIN alquileres ON videojuegos.id = alquileres.id_videojuego;

SELECT alquileres.id_cliente, clientes.nombre FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id
