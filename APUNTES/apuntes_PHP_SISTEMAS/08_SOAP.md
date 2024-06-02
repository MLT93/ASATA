# ¿QUÉ ES SOAP?

- Protocolo basado en XML.

- La estructura que lleva es la siguiente:
1. Envoltorio (Envelope). Es como la etiqueta <html></html> que envuelve el Header y el Body. "<env:Envelope xmlns:env='http://www.w3.org/2003/05/soap-envelope'></env:Envelope>".
2. Encabezado (Header). Metadatos e información que se envía. "<env:Header></env:Header>".
3. Body (Body). El cuerpo del mensaje "<env:Body></env:Body>".

- Aunque comúnmente se utiliza sobre HTTP/HTTPS, SOAP puede funcionar sobre otros protocolos de transporte como SMTP, FTP o JMS. Esto le confiere una flexibilidad de transporte de la información.

- Uso de HTTP/HTTPS: La capacidad de funcionar sobre HTTP/HTTPS permite la integración con infraestructuras web existentes y facilita el paso a través de firewalls.

- Capacidad de Extensión: SOAP permite la extensión mediante el uso de encabezados personalizados que pueden incluir funcionalidades como seguridad, transacciones, etc.

- Modularidad: Los encabezados y cuerpos pueden ser extendidos sin romper la estructura básica del mensaje.

- Estándares de seguridad: 
1. WS-Security: SOAP soporta este estándar para proporcionar integridad, confidencialidad y autenticación en los mensajes.
2. Control de Acceso: Se puede integrar con tecnologías de autenticación y autorización para controlar el acceso a los servicios.

- Fiabilidad:
1. Mensajería Fiable: SOAP puede trabajar con protocolos ws-ReliableMessaging para garantizar la entrega de mensajes en entornos de red no confiables.
2. Transacciones Distribuidas: Soporte para WS-AtomicTransaction para asegurar la consistencia en transacciones distribuidas.

- Desacoplamiento:
1. Se desacoplan los Clientes y los Servicios: Los clientes no necesitan conocer la implementación del servicio, solo la interfaz se expone
2. Interoperabilidad: Permite que aplicaciones escritas en diferentes lenguajes ejecutadas en diferentes plataformas se comuniquen de manera efectiva.

- Posee modelo Síncrono y Asíncrono.

- Posee soporte para servicios complejos como transacciones distribuidas y procesos de negocio. También es compatible con estándares de orquestación como BPEL (Business Process Execution Language) para coordinar múltiples servicio.
