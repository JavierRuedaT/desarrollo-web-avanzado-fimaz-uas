CREATE DATABASE IF NOT EXISTS futbol_db;
USE futbol_db;

CREATE TABLE futbolistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    posicion VARCHAR(50) NOT NULL,
    numero INT NOT NULL,
    edad INT NOT NULL,
    equipo VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO futbolistas (nombre, posicion, numero, edad, equipo) VALUES
('Lionel Messi', 'Delantero', 10, 36, 'Inter Miami'),
('Cristiano Ronaldo', 'Delantero', 7, 39, 'Al Nassr'),
('Kevin De Bruyne', 'Mediocampista', 17, 33, 'Manchester City');