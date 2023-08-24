<!DOCTYPE html>
<html>
<head>
	<title>Consultar Huesped</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<?php include 'plantilla/menu.php'; ?>
<body>
    <form  method="POST">
        <h1>Consulta del huésped</h1><hr><br>
        <!-- ...En el futuro Radio buton consulta con numero de ticket... -->
        <input type="number" name="crear_huesped_cedula_huesped" placeholder="Cedula">
        <input type="submit" value="Consultar"> 
    </form> 
	<form class="tabla_pedido">
    	<h1>Pedidos</h1><hr><br>
		<table class="tabla" border="1">
			<tr>
				<th>Habitacion número</th>            
				<th>Fecha pedido</th>
				<th>Descripción</th>
				<th>Costo</th>
				<th>Estado pedido</th>				
			</tr>
			<?php
			include 'php/conexion_bd.php';
			// Verificar conexión
			if ($conexion->connect_error) {
				die("Conexión fallida: " . $conexion->connect_error);
			}
			if (isset($_POST['crear_huesped_cedula_huesped'])) {
				$cedula = $_POST['crear_huesped_cedula_huesped'];
				// Consulta para obtener los datos del huésped según la cédula
				$sql = "select
				pedidos.habitacion_numero, pedidos.fecha_pedido, pedidos.descripcion,pedidos.costo,pedidos.estado_pedido
				from huesped
				inner join pedidos on huesped.id_huesped=pedidos.id_huesped
				";
				$result = $conexion->query($sql);
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["habitacion_numero"] . "</td>";					
					echo "<td>" . $row["fecha_pedido"] . "</td>";
					echo "<td>" . $row["descripcion"] . "</td>";
					$costo=number_format($row["costo"], 0, "'", '.');
					echo "<td>$" . $costo . "</td>";
					echo "<td>" . $row["estado_pedido"] . "</td>";					
					echo "</tr>";
				}				
			}
			$conexion->close();
        ?>
    </table>		
    </form>
</body>
</html>



