# MICROSERVICIOS

- La aplicación se divide en pequeños servicios, cada uno responsable de una única funcionalidad o dominio de negocio. Esta modularidad facilita el desarrollo, mantenimiento y escalabilidad.

- Los microservicios son independientes entre sí, lo que significa que los cambios en unos no afectan a otros. Permite a los equipos de trabajo operar de manera autónoma en diferentes servicios.

- Los microservicios se comunican entre sí a través de interfaces estándar, como APIs RESTful o protocolos de mensajería (como AMQP).
La comunicación suele ser a través de HTTP/HTTPS, gRPC o mensajes asíncronos.

- Cada microservicio puede ser implementado, desplegado y escalado de manera independiente
Permite la utilización de diferentes lenguajes de programación.

- Los microservicios pueden escalarse individualmente, lo que permite una utilización eficiente.
Se puede aumentar la capacidad de solo aquellos servicios que lo necesitan

- Posee fallos aislados porque está modularizado.

- Tienen ciclos de vida independientes, porque pueden ser construidos usando distintas tecnologías y frameworks que sean más adecuados para cada caso. Facilita la utilización de las mejores herramientas y prácticas disponibles. Puedo actualizar funcionalidades sin afectar a la aplicación en general.
