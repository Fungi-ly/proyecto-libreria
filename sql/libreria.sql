CREATE DATABASE IF NOT EXISTS libreria;

USE libreria;

CREATE TABLE IF NOT EXISTS usuarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL,
    dirección VARCHAR(255) NOT NULL,
    teléfono VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS libros (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    cantidad_en_inventario INT NOT NULL
);

CREATE TABLE IF NOT EXISTS carrito (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    libro_id INT NOT NULL,
    cantidad INT NOT NULL,
    monto_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(ID),
    FOREIGN KEY (libro_id) REFERENCES libros(ID)
);
