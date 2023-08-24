<!DOCTYPE html>
<html>
<head>
	<title>Registrar Pedido</title>
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
    <form action="php/registro_pedido.php" method="POST" >
    	<h1>Pedido</h1><hr>        
		<br>Cedula:<input type="number" name="crear_pedido_foranea" placeholder="Cedula" value="<?php echo $cedula = $_POST['crear_huesped_cedula_huesped']; ?>"readonly> <br>     	
		<br>Número de habitación:<br><select name="crear_pedido_habitacion_numero" >
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
						reserva.habitacion_numero
						from huesped
						inner join reserva on huesped.id_huesped = reserva.id_huesped	
						where huesped.cedula=$cedula;					
						";
						$result = $conexion->query($sql);
						while ($row = $result->fetch_assoc()) {							
							echo "<option value='" . $row["habitacion_numero"] ."'>". $row["habitacion_numero"] . "</option>";							
						}				
					}
					$conexion->close();
				?>
		</select><br>
        
		Descripción:<br><select name="crear_pedido_descripcion" >
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
						productos.nombre from productos;					
						";
						$result = $conexion->query($sql);
						while ($row = $result->fetch_assoc()) {							
							echo "<option value='" . $row["nombre"] ."'>". $row["nombre"] . "</option>";							
						}				
					}
					$conexion->close();
				?>
		</select>
        <br>Costo:<input type="number" name="crear_pedido_costo" placeholder="Costo">        
        <br>
        <h4 class = "estado_pedido"> <br> Estado del pedido</h4>
        <br>		
		<select name="crear_pedido_estado_pedido" id="estado_pedido">
			<option value="Pendiente">Pendiente</option>
			<option value="Pagado">Pagado</option>
		</select>
        <input type="submit" value="Crear">
    </form>
</body>
</html>



