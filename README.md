Base de Datos en PostgreSQL:
============================

Usuario:
--------
root

Password:
---------
N/A

Crear base de datos: 
--------------------

CREATE DATABASE solati_php;

Crear tabla de productos:
-------------------------

CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

Crear registros en la tabla de productos de prueba:
---------------------------------------------------

INSERT INTO products (name, price) VALUES
    ('Producto 1', 123),
    ('Producto 2', 456),
    ('Producto 3', 789);






