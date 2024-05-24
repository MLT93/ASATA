# consultas a la DB gameclubdario

# 1. Todos los campos de alquileres hechos por socios
# 2. Todos los campos de empleados manager
# 3. Devolver nombre, apellido1, de empleados junior
# 4. Me devuelva todos los campos de alquiler más todos los campos de tarifas
# 5. Realiza una consulta que devuelva los videojuegos que han sido alquilados y su fecha de alquiler

# Sintaxis Explícita
# `SELECCIONA(devuelve)` tabla_donde_busco.campo_buscado `DESDE` tabla_donde_busco `METODO JOIN` tabla_comparación `DONDE LOS ID ESTÉN RELACIONADOS(hay que ponerlo siempre)` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2 FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key  WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECT tabla_donde_busco.* FROM tabla_donde_busco INNER JOIN tabla_comparación ON tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key WHERE tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <la tabla_A> RELACIONADA 'INNER, LEFT, RIGHT JOIN' <con la tabla_B> DONDE 'ON' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas>

# Sintaxis Implícita
# `SELECCIONA(devuelve)` campos_buscados `DESDE` tabla_donde_busco, tabla_comparación `DONDE ESTA CONDICIÓN SE CUMPLA` tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key `+ CONDICIONES (opcional)` (se usa `AND`, `OR` para agregar condiciones);
# SELECT tabla_donde_busco.campo_buscado1, tabla_donde_busco.campo_buscado2, tabla_comparación.campo_buscado1 FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECT * FROM tabla_donde_busco, tabla_comparación WHERE tabla_donde_busco.id_campo_foreign_key = tabla_comparación.campo.primary_key AND tabla_comparación.campo_buscado2 = "asdf";
# SELECCIONA 'SELECT' <los campos que quieras> ENTRE 'FROM' <tabla_A>,  <tabla_B> DONDE 'WHERE' <exista la conexión entre el FOREIGN KEY y la PRIMARY KEY de las tablas> Y 'AND' <más condiciones>;

# Ejemplos
SELECT videojuegos.* FROM videojuegos INNER JOIN genero ON videojuegos.id_genero = genero.id;

SELECT videojuegos.id, videojuegos.nombre, videojuegos.descripcion, videojuegos.id_genero, videojuegos.id_desarrollador, videojuegos.id_plataforma, videojuegos.id_pegui, videojuegos.fechaPublicacion, videojuegos.isoCode, genero.nombre, genero.descripcion FROM videojuegos LEFT JOIN genero ON videojuegos.id_genero = genero.id;

SELECT videojuegos.* FROM videojuegos RIGHT JOIN genero ON videojuegos.id_genero = genero.id;

SELECT alquileres.id_cliente, clientes.nombre FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id

# Ejercicio 1
SELECT alquileres.* FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id AND clientes.socio = 1;

SELECT alquileres.* FROM alquileres INNER JOIN clientes ON alquileres.id_cliente = clientes.id WHERE clientes.socio = 1; 

# Ejercicio 2
SELECT empleados.* FROM empleados INNER JOIN categorias ON empleados.id_categoria = categorias.id AND categorias.categoria = "manager";

# Ejercicio 3
SELECT empleados.nombre, empleados.apellido1 FROM empleados INNER JOIN categorias ON empleados.id_categoria = categorias.id AND categorias.rango = "junior";

# Ejercicio 4
SELECT alquileres.*, tarifas.* FROM alquileres INNER JOIN tarifas ON alquileres.id_tarifas = tarifas.id;

# Ejercicio 5
SELECT videojuegos.nombre, alquileres.fechaAlquiler FROM videojuegos INNER JOIN alquileres ON alquileres.id_videojuego = videojuegos.id;
