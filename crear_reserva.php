<!DOCTYPE html>
<html>
<head>
	<title>Reserva</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estilo_formulario.css">	
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
</head>
<?php include 'plantilla/menu.php'; ?>
<body>
	<form method="post" action="">
		<h1>Calendario de Disponibilidad</h1> <br>
		<hr><br>
		<?php
			$habitacion="";
			$inicio="";
			$fin="";
			function getAvailability() {
				include 'php/conexion_bd.php';
				$data=[];    
				// Verificar conexión
				if ($conexion->connect_error) {
				die("Conexión fallida: " . $conexion->connect_error);
				}
				if (isset($_POST['crear_reserva_habitacion_numero'])) {
					$habitacion = $_POST['crear_reserva_habitacion_numero'];
					// Consulta para obtener los datos del huésped según la cédula
					$sql = "select fecha_inicio, fecha_fin from reserva where habitacion_numero=$habitacion;";
					$result = $conexion->query($sql);
					while ($row = $result->fetch_assoc()) {
					array_push($data, ['start' => strval($row["fecha_inicio"]), 'end' => strval($row["fecha_fin"])]);     
					}			
					$conexion->close(); 
					return $data;
				}
			}

			$availability = getAvailability();
			//verifica que no se crucen fechas
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$new_start = $_POST['start_date'];
				$new_end = $_POST['end_date'];

				$conflict = false;
				foreach ($availability as $existing) {
					if (($new_start >= $existing['start'] && $new_start <= $existing['end']) ||
						($new_end >= $existing['start'] && $new_end <= $existing['end'])) {
						$conflict = true;
						break;
					}
				}

				if (!$conflict) {
					echo "<h3>"."Disponible."."</h3>";
					$habitacion=$_POST['crear_reserva_habitacion_numero'];
					$inicio=$_POST['start_date'];
					$fin=$_POST['end_date'];

				} else {
					echo "<h3>"."NO disponible."."</h3>";;
				}
			}
		?>			
		<input type="text" name="crear_reserva_habitacion_numero" placeholder="Numero de Habitacion">
        <label for="start_date">Fecha de inicio:</label><br>
        <input type="date" name="start_date" >
        <label for="end_date">Fecha de fin:</label><br>
        <input type="date" name="end_date" >
        <input type="submit" value="Consultar"></button>
		<h3>Fechas Ocupadas</h3><br>
		<?php
		if (isset($_POST['crear_reserva_habitacion_numero'])) {
			foreach ($availability as $available) {
				echo "Del " . $available['start'] . " al " . $available['end'] . "<br>";
			}
		}
		?>
    </form>
    
	<!-- Formulario 2 -->
    <form  action="php/registro_reserva.php" method="POST" >
    	<h1>Reserva</h1><hr>
		<input type="text" name="crear_reserva_habitacion_numero" placeholder="Numero de Habitacion" value="<?php echo $habitacion; ?>" readonly>
        <label for="start_date">Fecha de inicio:</label><br>
        <input type="date" name="start_date" value="<?php echo $inicio; ?>" readonly>
        <label for="end_date">Fecha de fin:</label><br>
        <input type="date" name="end_date" value="<?php echo $fin; ?>" readonly>
		<input type="number" name="crear_reserva_foranea" placeholder="Cedula">     	
		<input type="text" name="crear_reserva_costo" placeholder="Costo">
		<br>
		<h4 class = "Estado"><br>Estado</h4>
		<br>		
		<select name="crear_reserva_estado_reserva">
			<option value="Pendiente">Pendiente</option>
			<option value="Pagado">Pagado</option>
		</select>
		<input type="submit" value="Registrar Reserva">		
    </form>
</body>



</html>



