<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Menu</title>
	<link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">
	<!-- Estilos Menu desplegable--> 
	<link rel="stylesheet" href="./css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<body>
	<?php include 'plantilla/menu.php'; ?>
	<?php
		include 'php/conexion_bd.php';
		// Verificar conexión
		if ($conexion->connect_error) {
			die("Conexión fallida: " . $conexion->connect_error);
		}else{
			$nombre = "";
			$apellidos = "";
			$pais = "";
			$departamento = "";
			$ciudad = "";
		}

		if (isset($_POST['crear_huesped_cedula_huesped'])) {
			$cedula = $_POST['crear_huesped_cedula_huesped'];

			// Consulta para obtener los datos del huésped según la cédula
			$sql = "SELECT id_usuario,nombre, apellidos, pais, departamento, ciudad FROM huesped WHERE cedula = '$cedula'";
			$result = $conexion->query($sql);

			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();				
				$nombre = $row['nombre'];
				$apellidos = $row['apellidos'];
				$pais = $row['pais'];
				$departamento = $row['departamento'];
				$ciudad = $row['ciudad'];
			} else {
				// No se encontraron resultados
				$nombre = "";
				$apellidos = "";
				$pais = "";
				$departamento = "";
				$ciudad = "";
			}			
		}		
		$conexion->close();
	?>
	<form action="menu.php" method="POST">
        <h1>Consulta del huésped</h1><hr><br>
        <!-- ...En el futuro Radio buton consulta con numero de ticket... -->
        <input type="number" name="crear_huesped_cedula_huesped" placeholder="Cedula">
        <input type="submit" value="Consultar"> 
    </form> 
    <form>
		<h1>Cliente</h1><hr><br>       
        Nombre:<input type="text" name="crear_huesped_nombre_huesped" value="<?php echo $nombre; ?>" readonly><br>
		<br> Apellidos:<input type="text" name="crear_huesped_apellidos_huesped" value="<?php echo $apellidos; ?>" readonly><br>
        <br> Pais:<input type="text" name="crear_huesped_pais_huesped" value="<?php echo $pais; ?>" readonly><br>
        <br> Departamento:<input type="text" name="crear_huesped_departamento_huesped" value="<?php echo $departamento; ?>" readonly><br>
        <br> Ciudad:<input type="text" name="crear_huesped_ciudad_huesped" value="<?php echo $ciudad; ?>" readonly>
    </form>
	<form class="tabla_reserva">
    	<h1>Reservas</h1><hr><br>
		<table class="tabla" border="1">
				<tr>
					<th>Ticket</th>            
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Habitación Número</th>
					<th>Costo</th>
					<th>Estado Reserva</th>
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
						reserva.id_reserva, reserva.fecha_inicio, reserva.fecha_fin,reserva.habitacion_numero,reserva.costo,reserva.estado_reserva
						from huesped
						inner join reserva on huesped.id_huesped = reserva.id_huesped	
						where huesped.cedula=$cedula;					
						";
						$result = $conexion->query($sql);
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["id_reserva"] . "</td>";					
							echo "<td>" . $row["fecha_inicio"] . "</td>";
							echo "<td>" . $row["fecha_fin"] . "</td>";
							echo "<td>" . $row["habitacion_numero"] . "</td>";
							$costo=number_format($row["costo"], 0, "'", '.');
							echo "<td>$" . $costo . "</td>";
							echo "<td>" . $row["estado_reserva"] . "</td>";
							echo "</tr>";
						}				
					}
					$conexion->close();
				?>
		</table>		
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
				where huesped.cedula=$cedula;
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
	<form action="php/pago_facturacion.php" class="tabla_pedido" method="POST">
    	<h1>Facturación</h1><hr><br>
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
			$total=0 ;
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
				where estado_pedido ='Pendiente';
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
					$total+=$row["costo"];			
				}						
			}			
			$conexion->close();
        ?>
    </table>
	<br>
	<table class="tabla" border="1">
				<tr>
					<th>Ticket</th>            
					<th>Fecha Inicio</th>
					<th>Fecha Fin</th>
					<th>Habitación Número</th>
					<th>Costo</th>
					<th>Estado Reserva</th>
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
						reserva.id_reserva, reserva.fecha_inicio, reserva.fecha_fin,reserva.habitacion_numero,reserva.costo,reserva.estado_reserva
						from huesped
						inner join reserva on huesped.id_huesped = reserva.id_huesped	
						where huesped.cedula=$cedula and reserva.estado_reserva='Pendiente';					
						";
						$result = $conexion->query($sql);
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["id_reserva"] . "</td>";					
							echo "<td>" . $row["fecha_inicio"] . "</td>";
							echo "<td>" . $row["fecha_fin"] . "</td>";
							echo "<td>" . $row["habitacion_numero"] . "</td>";
							$costo=number_format($row["costo"], 0, "'", '.');
							echo "<td>$" . $costo . "</td>";
							echo "<td>" . $row["estado_reserva"] . "</td>";
							echo "</tr>";
							$total+=$row["costo"];	
						}				
					}
					$conexion->close();
				?>
		</table>		
	Total:<input type="text" value="<?php echo '$'.number_format($total, 0, "'", '.'); ?>" readonly>
	<input class="boton_pago" type="submit" value="Realizar Pago">
	</form>
</body>
</html>