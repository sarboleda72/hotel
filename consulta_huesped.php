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
<?php
		include 'php/conexion_bd.php';
		// Verificar conexión
		if ($conexion->connect_error) {
			die("Conexión fallida: " . $conexion->connect_error);
		}else{
            $cedula="";
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
                $cedula="";
				$nombre = "";
				$apellidos = "";
				$pais = "";
				$departamento = "";
				$ciudad = "";
			}			
		}		
		$conexion->close();
	?>
	<form  method="POST">
        <h1>Consulta del huésped</h1><hr><br>
        <!-- ...En el futuro Radio buton consulta con numero de ticket... -->
        <input type="number" name="crear_huesped_cedula_huesped" placeholder="Cedula">
        <input type="submit" value="Consultar"> 
    </form> 
    <form>
		<h1>Cliente</h1><hr><br>
        Cedula:<input type="text" name="crear_huesped_nombre_huesped" value="<?php echo $cedula; ?>" readonly><br>       
        <br>Nombre:<input type="text" name="crear_huesped_nombre_huesped" value="<?php echo $nombre; ?>" readonly><br>
		<br> Apellidos:<input type="text" name="crear_huesped_apellidos_huesped" value="<?php echo $apellidos; ?>" readonly><br>
        <br> Pais:<input type="text" name="crear_huesped_pais_huesped" value="<?php echo $pais; ?>" readonly><br>
        <br> Departamento:<input type="text" name="crear_huesped_departamento_huesped" value="<?php echo $departamento; ?>" readonly><br>
        <br> Ciudad:<input type="text" name="crear_huesped_ciudad_huesped" value="<?php echo $ciudad; ?>" readonly>
    </form>
</body>

</html>



