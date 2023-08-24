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

CREATE TABLE reserva (
    id_reserva INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    fecha_inicio DATE,
    fecha_fin DATE,
    habitacion_numero INT,
    estado_reserva VARCHAR(20),
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);

CREATE TABLE pedidos (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    habitacion_numero INT,
    fecha_pedido DATETIME,
    descripcion TEXT,
    estado_pedido VARCHAR(20),
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);

CREATE TABLE facturacion (
    id_factura INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    habitacion_numero INT,
    fecha_factura DATE,
    total_servicios DECIMAL(10, 2),
    estado_pago VARCHAR(20),
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);
