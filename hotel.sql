drop database hotel;
create database hotel;
use hotel;

create table usuario(
    id_usuario int PRIMARY key AUTO_INCREMENT,
    nombre_usuario varchar(45),
    contrasena VARCHAR(45),
    tipo_usuario VARCHAR(45)
);

create table huesped (
    id_huesped int PRIMARY key AUTO_INCREMENT,
    nombre VARCHAR(45),
    apellidos VARCHAR(45),
    cedula VARCHAR(20),
    pais VARCHAR(50),
    departamento VARCHAR(50),
    ciudad VARCHAR(50),
    id_usuario int,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)

);

CREATE TABLE reserva (|
    id_reserva INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    habitacion_numero INT,
    estado_reserva VARCHAR(20),
    costo int,
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);

CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    habitacion_numero INT,
    fecha_pedido DATETIME,
    descripcion TEXT,
    estado_pedido VARCHAR(20),
    costo int,
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);

CREATE TABLE facturacion (
    id_factura INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,    
    fecha_factura DATE,
    total_servicios DECIMAL(10, 2),
    estado_pago VARCHAR(20),
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);

CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255),
    categoria VARCHAR(50),
    precio DECIMAL(10, 2)
);
INSERT INTO productos (nombre, categoria, precio) VALUES
    ('Hamburguesa', 'Comida', 25000.00),
    ('Pizza', 'Comida', 28000.00),
    ('Sándwich de pollo', 'Comida', 18000.00),
    ('Ceviche', 'Comida', 22000.00),
    ('Ensalada', 'Comida', 15000.00),
    ('Café americano', 'Bebida', 4500.00),
    ('Capuccino', 'Bebida', 6000.00),
    ('Gaseosa', 'Bebida', 4000.00),
    ('Cerveza nacional', 'Bebida', 8000.00),
    ('Coctel Pasion', 'Bebida', 12000.00);


select
reserva.id_reserva, reserva.fecha_inicio, reserva.fecha_fin,reserva.habitacion_numero,reserva.estado_reserva
from huesped
inner join reserva on huesped.id_huesped = reserva.id_huesped

select
pedidos.habitacion_numero, pedidos.fecha_pedido, pedidos.descripcion,pedidos.estado_pedido
from huesped
inner join pedidos on huesped.id_huesped=pedidos.id_huesped
where estado_pedido ='Pendiente'

select fecha_inicio, fecha_fin from reserva where habitacion_numero='101';