<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">
    <link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<?php include 'plantilla/menu.php'; ?>
<body>
    <form action="php/registro_facturacion.php" method="POST" >
    	<h1>Factura</h1>
        <input type="number" name="crear_facturacion_id_huesped" placeholder="id huesped">
    	<input type="number" name="crear_facturacion_habitacion" placeholder="habitación">
    	<input type="date" name="crear_facturacion_Fecha_de_facturacion" placeholder="fecha">
    	<input type="number" name="crear_facturacion_Total_de_servicios" placeholder="Total">
        <input type="text" name="crear_facturacion_Estado_de_pago" placeholder="Estado de pago">
        <input type="submit" placeholder="consultar"> 
    </form>
</body>


</html>

<!--
CREATE TABLE facturacion (
    id_factura INT PRIMARY KEY AUTO_INCREMENT,
    id_huesped INT,
    habitacion_numero INT,
    fecha_factura DATE,
    total_servicios DECIMAL(10, 2),
    estado_pago VARCHAR(20),
    FOREIGN KEY (id_huesped) REFERENCES huesped(id_huesped)
);-->
