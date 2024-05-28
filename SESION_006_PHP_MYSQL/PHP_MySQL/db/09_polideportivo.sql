/** DATABASE */
/* Creación de database */
# Crear base de datos
DROP DATABASE IF EXISTS polideportivo;

CREATE DATABASE IF NOT EXISTS polideportivo;

ALTER DATABASE polideportivo DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE polideportivo;

/* Creación de tablas y agregado de información */
/** TABLE (nombre de la tabla en plural, nombre de los campos en singular) */
# Tabla de miembros
CREATE TABLE miembros (
    miembro_id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE,
    genero CHAR(1),
    direccion VARCHAR(255),
    telefono VARCHAR(15),
    email VARCHAR(100),
    fecha_registro DATE NOT NULL,
    PRIMARY KEY (miembro_id)
);

# Tabla de empleados
CREATE TABLE empleados (
    empleado_id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    puesto VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(100),
    fecha_contratacion DATE NOT NULL,
    PRIMARY KEY (empleado_id)
);

# Tabla de actividades
CREATE TABLE actividades (
    actividad_id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    cupo_maximo INT NOT NULL,
    costo DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (actividad_id)
);

# Tabla de instalaciones
CREATE TABLE instalaciones (
    instalacion_id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    capacidad INT,
    PRIMARY KEY (instalacion_id)
);

# Tabla de reservas
CREATE TABLE reservas (
    reserva_id INT AUTO_INCREMENT,
    miembro_id INT NOT NULL,
    instalacion_id INT NOT NULL,
    fecha_reserva DATETIME NOT NULL,
    duracion INT NOT NULL, # Duración en minutos
    PRIMARY KEY (reserva_id),
    FOREIGN KEY (miembro_id) REFERENCES miembros(miembro_id),
    FOREIGN KEY (instalacion_id) REFERENCES instalaciones(instalacion_id)
);

# Tabla de entrenadores
CREATE TABLE entrenadores (
    entrenador_id INT AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    apellido VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100),
    telefono VARCHAR(15),
    email VARCHAR(100),
    PRIMARY KEY (entrenador_id)
);

# Tabla de clases
CREATE TABLE clases (
    clase_id INT AUTO_INCREMENT,
    actividad_id INT NOT NULL,
    entrenador_id INT NOT NULL,
    fecha_clase DATETIME NOT NULL,
    duracion INT NOT NULL, # Duración en minutos
    cupo INT NOT NULL,
    PRIMARY KEY (clase_id),
    FOREIGN KEY (actividad_id) REFERENCES actividades(actividad_id),
    FOREIGN KEY (entrenador_id) REFERENCES entrenadores(entrenador_id)
);

# Tabla de asistencia
CREATE TABLE asistencia (
    asistencia_id INT AUTO_INCREMENT,
    clase_id INT NOT NULL,
    miembro_id INT NOT NULL,
    fecha_asistencia DATE NOT NULL,
    PRIMARY KEY (asistencia_id),
    FOREIGN KEY (clase_id) REFERENCES clases(clase_id),
    FOREIGN KEY (miembro_id) REFERENCES miembros(miembro_id)
);

# Tabla de pagos
CREATE TABLE pagos (
    pago_id INT AUTO_INCREMENT,
    miembro_id INT NOT NULL,
    fecha_pago DATE NOT NULL,
    monto DECIMAL(10, 2) NOT NULL,
    metodo_pago VARCHAR(50),
    PRIMARY KEY (pago_id),
    FOREIGN KEY (miembro_id) REFERENCES miembros(miembro_id)
);
