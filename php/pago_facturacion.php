<?php
	include 'conexion_bd.php';	
	// Verificar conexión
	if ($conexion->connect_error) {
		die("Conexión fallida: " . $conexion->connect_error);
	}	
		// Consulta para obtener los datos del huésped según la cédula
		$sql = "UPDATE pedidos
        INNER JOIN huesped ON pedidos.id_huesped = huesped.id_huesped
        SET pedidos.estado_pedido = 'Pagado'
        WHERE pedidos.estado_pedido = 'Pendiente';
		";       				
		$ejecutar=mysqli_query($conexion,$sql);
		$sql = "UPDATE reserva
        INNER JOIN huesped ON reserva.id_huesped = huesped.id_huesped
        SET reserva.estado_reserva = 'Pagado'
        WHERE reserva.estado_reserva = 'Pendiente';
		"; 
		$ejecutar=mysqli_query($conexion,$sql);
		if($ejecutar){
			echo "
				<script>
					alert('usuario pago correctamente');
					window.location='../menu.php';
				</script>
			";
		}else{        
			echo "
				<script>
					alert('No pago correctamente');     
					window.location='../menu.php';           
				</script>
			";
		}	
								
	$conexion->close();
?>