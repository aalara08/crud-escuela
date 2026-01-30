USE escuela;

CREATE TABLE productos (
    clave INT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    existencias INT NOT NULL,
    fecha_caducidad DATE NULL,
    descripcion TEXT
);
